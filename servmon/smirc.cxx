#include "smstdinc.hxx"
#include "smirc.hxx"
#include "smutl.hxx"
#include "smcfg.hxx"
#include "smnet.hxx"

namespace smirc {

class ircclnt {
public:
	ircclnt(std::string const& serv, int port) {
		std::cerr << "ircclnt: connecting to "<<serv<<":"<<port<<"...\n";
		sckt = smnet::inetclntp(new smnet::inetclnt);
		sckt->svc(lexical_cast<std::string>(port));
		sckt->endpt(serv);
		sckt->connect();
		boost::function<void(smnet::inetclntp, int)> f = 
			boost::bind(&ircclnt::data_cb, this, _2);
		SMI(smnet::smpx)->add(f, sckt, smnet::smpx::srd /*| smnet::smpx::swr*/);
		cip = true;
	}
	void data_cb(int what) {
		std::cerr << "data_cb: what="<<what<<'\n';
		if (what == smnet::smpx::srd && cip) {
			std::cerr << "read possible\n";
			std::string line;
			if (!rdline(line)) return;
			std::cerr << "read line: [" << line << "]\n";
		}
	}

	bool rdline(strr l) {
		char c;
		std::cerr << "read: [";
		try {
			c = sckt->rd1();
			if (c != '\r' && c != '\n') linebuf += c;
			else { l = linebuf; linebuf = ""; return true; }
			std::cerr << c << "] - ";
		} catch (smnet::sckterr& e) {
			std::cerr << "read error: " << e.what();
		}
		return false;
		std::cerr << "\n";
	}
	
private:
	std::string linebuf;
	bool cip;
	smnet::inetclntp sckt;
};

void
cfg::initialise(void)
{
	SMI(smtmr::evthdlr)->install(smtmr::evtp(
			new smtmr::evt("IRC: connection status", 5, true, b::bind(&cfg::chk, SMI(cfg)))));
}

void
cfg::chk(void)
{
	std::cerr << "checking irc status. cip="<<cip<<" connected="<<connected<<"\n";
	if (cip or connected) return; cip = true;

	if (next_server()) {
		connect();
	}
	cip = false;
}

bool
cfg::next_server(void)
{
	std::cerr << "next_server empty="<<servers.empty()<<"\n";
	if (servers.empty()) get_servers();
	if (servers.empty()) return false;
	return true;
}

void
cfg::get_servers(void)
{
	try {
		std::cerr << "get_servers; servers:\n";
		servers = SMI(smcfg::cfg)->fetchlist("/irc/servers");
		srv_iter = servers.begin();
		for_each(servers.begin(), servers.end(), std::cerr << bl::_1 << "\n");
		std::cerr << "okay\n";
	} catch (smcfg::nokey&) {}
}

void
cfg::connect(void)
{
	std::cerr << "connect\n";
	if (srv_iter == servers.end()) return;
	std::cerr << "got some servers\n";
	try {
		connection = ircclntp(new ircclnt(*srv_iter, getkeyint(*srv_iter, "port")));
		connected = true;
	} catch (smcfg::nokey&) { std::cerr << "exception\n"; }
	return;
}

void
cfg::newserv_or_chgnick(str server, str nick)
{
	if (!SMI(smcfg::cfg)->listhas("/irc/servers", server)) {
		SMI(smcfg::cfg)->addlist("/irc/servers", server);
		setkeyint(server, "port", 6667);
	}
	setkeystr(server, "nickname", nick);
}

void 
cfg::server_set_secnick(str server, str nick)
{
	if (!SMI(smcfg::cfg)->listhas("/irc/servers", server))
		return;
	setkeystr(server, "secnickname", nick);
}

bool 
cfg::server_exists(str server)
{
	return SMI(smcfg::cfg)->listhas("/irc/servers", server);
}

void 
cfg::remove_server(str server)
{
	try {
		SMI(smcfg::cfg)->dellist("/irc/servers", server);
	} catch (smcfg::nokey&) {
	}
}

void 
cfg::enable_server(str server, bool ebl) 
{
	setkeybool(server, "enabled", ebl);
}

bool 
cfg::server_enabled(str server)
{
	try {
		return getkeybool(server, "enabled");
	} catch (smcfg::nokey&) {
		return false;
	}
}

int 
cfg::getkeyint(str server, str key)
{
	return SMI(smcfg::cfg)->fetchint(b::str(format("/irc/server/%s/%s")
		% server % key));
}

bool 
cfg::getkeybool(str server, str key)
{
	return SMI(smcfg::cfg)->fetchbool(b::str(format("/irc/server/%s/%s")
		% server % key));
}

str
cfg::getkeystr(str server, str key)
{
	return SMI(smcfg::cfg)->fetchstr(b::str(format("/irc/server/%s/%s")
		% server % key));
}

void
cfg::setkeyint(str server, str key, int value)
{
	SMI(smcfg::cfg)->storeint(b::str(format("/irc/server/%s/%s")
		% server % key), value);
}

void
cfg::setkeystr(str server, str key, str value)
{
	SMI(smcfg::cfg)->storestr(b::str(format("/irc/server/%s/%s")
		% server % key), value);
}

void
cfg::setkeybool(str server, str key, bool value)
{
	SMI(smcfg::cfg)->storebool(b::str(format("/irc/server/%s/%s")
		% server % key), value);
}

} // namespace smirc
