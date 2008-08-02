
from zope.interface import implements

from twisted.internet import reactor, interfaces, task
import bgp #, radix

import datetime, random

class BGPDebug(object):
    implements(interfaces.IConsumer)

    def __init__(self):
        #self.prefixes = radix.Radix()
        self.nlriCount = 0
        self.withdrawnCount = 0
        
        # HACK
        self.advertised = False

    def registerProducer(self, producer, streaming):
        self.producer = producer
        
        #ask.LoopingCall(self.printStats).start(5.0)
    
    def unregisterProducer(self):
        pass

    def write(self, data):
        withdrawnPrefixes, attrSet, nlri = data
        
        self.withdrawnCount += len(withdrawnPrefixes)
        self.nlriCount += len(nlri)
        
        # DEBUG
        print "UPDATE:", withdrawnPrefixes, nlri
        for a in attrSet:
            print a.name, a


        # Hack
        if not self.advertised:
            advertisements = [bgp.IPPrefix('127.127.127.127/32')]
            attrSet = bgp.AttributeSet([bgp.OriginAttribute(), bgp.ASPathAttribute([(2, [64600])]), bgp.NextHopAttribute('192.168.255.254')])
            
            # Send UPDATE
            self.producer.estabProtocol.sendUpdate([], attrSet, advertisements)
            
            self.advertised = True

        # Add internal attribute 'last update'
#        attrSet.add(bgp.LastUpdateIntAttribute((0, bgp.ATTR_TYPE_INT_LAST_UPDATE, datetime.datetime.now())))
#        
#        for prefix in withdrawnPrefixes:
#            try:
#                self.prefixes.delete(str(prefix))
#                #del self.prefixes[prefix]
#            except KeyError:
#                print "withdrawn prefix", prefix, "not found."
#
#        for prefix in nlri:
#            #self.prefixes[prefix] = attrSet
#            p = self.prefixes.add(str(prefix))
#            p.data["attributes"] = attrSet
#            #print prefix, p.prefix

    def printStats(self):
        print "Now %d prefixes in table, %d total nlri, %d withdrawals" % (len(self.prefixes.prefixes()), self.nlriCount, self.withdrawnCount)
        
        #p = bgp.IPPrefix('145.97.32/20')
        try:
            p = random.choice(self.prefixes.nodes())
            attrSet = p.data["attributes"]
            print p.prefix
            for a in attrSet:
                print "\t", a.name, a                
        except: pass


#bgpprot = bgp.BGP(myASN=14907, bgpId=1)

#print [ord(i) for i in bgpprot.constructOpen()]

peers = {}

peering = bgp.BGPPeering()
peering.peerAddr = '91.198.174.247'

peers[peering.peerAddr] = peering

peering2 = bgp.BGPPeering()
peering2.peerAddr = '127.0.0.1'

#peers[peering2.peerAddr] = peering2

peering3 = bgp.BGPPeering()
peering3.peerAddr = '192.168.37.1'


#peers[peering3.peerAddr] = peering3

for peer in peers.values():
    peer.myASN = 64600
    peer.bgpId = 111
    peer.registerConsumer(BGPDebug())
    

bgpServer = bgp.BGPServerFactory(peers)
reactor.listenTCP(1000+bgp.PORT, bgpServer)

for p in peers.itervalues(): p.manualStart()

reactor.run()