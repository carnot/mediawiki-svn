/* Copyright (c) 2008 River Tarnell <river@wikimedia.org>. */
/*
 * Permission is granted to anyone to use this software for any purpose,
 * including commercial applications, and to alter it and redistribute it
 * freely. This software is provided 'as-is', without any express or implied
 * warranty.
 */
/* $Id$ */

#include	<string>
#include	<fstream>
#include	<cerrno>

#include	<boost/format.hpp>
#include	<boost/tokenizer.hpp>
#include	<boost/assign/list_of.hpp>
#include	<boost/bind.hpp>
using boost::format;

#include	<log4cxx/logger.h>

#include	"config.h"

config mainconf;

configuration_loader::configuration_loader()
	: logger(log4cxx::Logger::getLogger("switchboard.config"))
{
}

bool
configuration_loader::load(std::string const &filename, config &newconf)
{
	std::string line;
	std::ifstream file(filename.c_str());

	lineno_ = 0;
	file_ = filename;

	if (!file) {
		LOG4CXX_ERROR(logger, 
			format("cannot open configuration file \"%s\": %s")
			% filename % std::strerror(errno));
		return false;
	}

	while (std::getline(file, line)) {
		lineno_++;

		if (line.empty() || line[0] == '#')
			continue;

		if (!parse_config_line(line, newconf))
			return false;
	}

	LOG4CXX_INFO(logger,
		format("read configuration from \"%s\"")
		% filename);

	return true;
}

std::map<std::string, configuration_loader::confline_t>
	configuration_loader::conflines =
	boost::assign::map_list_of
		("listen", boost::bind(&configuration_loader::f_listen, _1, _2, _3))
		("logconf", boost::bind(&configuration_loader::f_logconf, _1, _2, _3))
		("sockdir", boost::bind(&configuration_loader::f_sockdir, _1, _2, _3))
	;

bool
configuration_loader::parse_config_line(
		std::string const &line,
		config &newconf)
{
	boost::escaped_list_separator<char> sep('\\', ' ', '"');
	boost::tokenizer<boost::escaped_list_separator<char> > tok(line, sep);
	std::vector<std::string> fields;

	std::copy(tok.begin(), tok.end(), std::back_inserter(fields));

	if (fields.empty())
		return false;

	std::map<std::string, confline_t>::iterator it =
		conflines.find(fields[0]);

	if ((it = conflines.find(fields[0])) == conflines.end()) {
		LOG4CXX_ERROR(logger,
			format("\"%s\", line %d: unknown directive: \"%s\"")
			% file_ % lineno_ % fields[0]);
		return false;
	}

	it->second(this, fields, newconf);

	return true;
}

bool
configuration_loader::f_listen(
		std::vector<std::string> &fields,
		config &newconf)
{
	if (fields.size() != 3) {
		LOG4CXX_ERROR(logger,
			format("\"%s\", line %d: usage: listen <address> <port>\n")
			% file_ % lineno_);
		return false;
	}

	conf_listener lsnr;
	lsnr.host = fields[1];
	lsnr.port = fields[2];
	newconf.listeners.push_back(lsnr);
	return true;
}

bool
configuration_loader::f_logconf(
		std::vector<std::string> &fields,
		config &newconf)
{
	if (fields.size() != 2) {
		LOG4CXX_ERROR(logger,
			format("\"%s\", line %d: usage: logconf <file>\n")
			% file_ % lineno_);
		return false;
	}

	newconf.logconf = fields[1];
	return true;
}

bool
configuration_loader::f_sockdir(
		std::vector<std::string> &fields,
		config &newconf)
{
	if (fields.size() != 2) {
		LOG4CXX_ERROR(logger,
			format("\"%s\", line %d: usage: sockdir <directory>\n")
			% file_ % lineno_);
		return false;
	}

	newconf.sockdir = fields[1];
	return true;
}

