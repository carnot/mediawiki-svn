package org.wikimedia.lsearch.interoperability;

import java.io.IOException;
import java.rmi.NotBoundException;
import java.rmi.RemoteException;
import java.rmi.registry.LocateRegistry;
import java.rmi.registry.Registry;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collection;
import java.util.HashMap;
import java.util.HashSet;
import java.util.Hashtable;
import java.util.Set;

import org.apache.log4j.Logger;
import org.apache.lucene.analysis.Token;
import org.apache.lucene.index.Term;
import org.apache.lucene.search.Query;
import org.wikimedia.lsearch.beans.IndexReportCard;
import org.wikimedia.lsearch.beans.SearchHost;
import org.wikimedia.lsearch.beans.SearchResults;
import org.wikimedia.lsearch.config.GlobalConfiguration;
import org.wikimedia.lsearch.config.IndexId;
import org.wikimedia.lsearch.highlight.Highlight;
import org.wikimedia.lsearch.highlight.HighlightResult;
import org.wikimedia.lsearch.index.IndexUpdateRecord;
import org.wikimedia.lsearch.search.HighlightPack;
import org.wikimedia.lsearch.search.NamespaceFilterWrapper;
import org.wikimedia.lsearch.search.SearcherCache;
import org.wikimedia.lsearch.search.SuffixFilterWrapper;
import org.wikimedia.lsearch.search.SuffixNamespaceWrapper;
import org.wikimedia.lsearch.search.Wildcards;
import org.wikimedia.lsearch.spell.SuggestQuery;

/**
 * Invokes procedures on a remote RMIMessenger.
 * 
 * @author rainman
 *
 */
public class RMIMessengerClient {	
	static org.apache.log4j.Logger log = Logger.getLogger(RMIMessengerClient.class);
	protected static Hashtable<String,Registry> registryCache = new Hashtable<String,Registry>();
	protected static Hashtable<String,RMIMessenger> messengerCache = new Hashtable<String,RMIMessenger>();
	protected static RMIMessengerImpl localMessenger = null;
	protected static GlobalConfiguration global = null;
	protected static SearcherCache cache = null;
	protected boolean alwaysRemote;

	public RMIMessengerClient(){
		this(false);		
	}

	/** if alwaysRemote == true, we always use a remote instance of RMIMessenger, even for localhost */
	public RMIMessengerClient(boolean alwaysRemote){
		if(localMessenger == null)
			localMessenger = RMIMessengerImpl.getInstance();
		if(global == null)
			global = GlobalConfiguration.getInstance();
		
		this.alwaysRemote = alwaysRemote;		
	}
	
	/** notify remote hosts that a local search index is changes (to reload remote object) */
	public void notifyIndexUpdated(IndexId iid, Collection<String> hosts){
		if(cache == null)
			cache = SearcherCache.getInstance();
		if(iid.isSingle())
			return; // no need to notify if this is not split index
		GlobalConfiguration global = GlobalConfiguration.getInstance();
		Set<SearchHost> deadHosts = cache.getDeadHosts();
		String myhost = global.getLocalhost();
		if(myhost == null){
			log.error("Local hostname is null in notifyIndexUpdated(). Probably a bug.");
			return;
		}
		for(String host : hosts){
			if(global.isLocalhost(host) || host.equals("localhost") || host.equals("127.0.0.1") || host.equals(""))
				continue; // don't notify localhost
			if(deadHosts.contains(new SearchHost(iid,host)))
				continue;
			try {
				RMIMessenger r = messengerFromCache(host);				
				log.debug("Calling remotely indexUpdate("+myhost+","+iid+") on "+host);
				r.indexUpdated(myhost,iid.toString());
			} catch (Exception e) {
				log.warn("Error invoking remote method notifyIndexUpdated() on host "+host+" : "+e.getMessage());
				continue;
			}			
		}
	}
	
	private RMIMessenger messengerFromCache(String host) throws RemoteException, NotBoundException {
		// if trying to talk to localhost, return the local RMI object
		if(!alwaysRemote && (global.isLocalhost(host) || host.equals("localhost") || host.equals("127.0.0.1") || host.equals(""))){
			log.debug("Getting a local RMI messenger for "+host);
			return localMessenger;
		}
		try{
			RMIMessenger r;
			r = messengerCache.get(host);
			if(r != null){
				log.debug("Getting RMI messenger for "+host+" from cache.");
				return r;
			}
			
			Registry registry = registryCache.get(host);
			if(registry == null){
				registry = LocateRegistry.getRegistry(host);				
				registryCache.put(host,registry);
			}
			r = (RMIMessenger) registry.lookup("RMIMessenger");
			log.debug("Got new RMI messenger for host "+host);
			return r;
		} catch (RemoteException e) {
			log.warn("Cannot contact RMI registry for host "+host+" : "+e.getMessage());
			throw e;
		} catch (NotBoundException e) {
			log.warn("No RMIMessenger instance at host "+host+" : "+e.getMessage());
			throw e;
		}
	}

	public long[] getIndexTimestamp(Collection<IndexId> iids, String host){
		// convert iids to string repesentations
		String[] dbroles = new String[iids.size()];
		int i=0;
		for(IndexId iid : iids){
			dbroles[i++] = iid.toString();
		}
		// make the rmi request
		try {
			RMIMessenger r = messengerFromCache(host);
			log.debug("Calling getIndexTime("+Arrays.toString(dbroles)+") on "+host);
			long[] res = r.getIndexTimestamp(dbroles);
			log.debug(" \\-> got: "+Arrays.toString(res));
			return res;
		} catch (Exception e) {
			//e.printStackTrace();
			log.warn("Error invoking remote method getIndexTimestamp() on host "+host+" : "+e.getMessage());
		}
		return null;
	}
	
	public void enqueueUpdateRecords(IndexUpdateRecord[] records, String host) throws Exception{
		try {
			RMIMessenger r = messengerFromCache(host);
			log.debug("Calling enqueueUpdateRecords("+records.length+" records) on "+host);
			r.enqueueUpdateRecords(records);
		} catch (Exception e) {
			log.warn("Error invoking remote method enqueueUpdateRecords() on host "+host+" : "+e.getMessage());
			throw e;
		}
	}
	
	public void enqueueFrontend(IndexUpdateRecord[] records, String host) throws Exception{
		try {
			RMIMessenger r = messengerFromCache(host);
			log.debug("Calling enqueueFrontend("+records.length+" records) on "+host);
			r.enqueueFrontend(records);
		} catch (Exception e) {
			log.warn("Error invoking remote method enqueueFrontend() on host "+host+" : "+e.getMessage());
			throw e;
		}
	}
	
	public void sendReports(IndexReportCard[] cards, String host){
		try {
			RMIMessenger r = messengerFromCache(host);
			log.debug("Calling reportBack("+cards.length+" records) on "+host);
			r.reportBack(cards);
		} catch (Exception e) {
			log.warn("Error invoking remote method sendReports on host "+host+" : "+e.getMessage());
		}
	}
	
	public HighlightPack searchPart(IndexId iid, String searchterm, Query query, NamespaceFilterWrapper filter, int offset, int limit, boolean explain, String host){
		try {
			RMIMessenger r = messengerFromCache(host);
			log.debug("Calling searchPart("+iid+",("+query+"),"+offset+","+limit+") on "+host);
			HighlightPack res = r.searchPart(iid.toString(),searchterm,query,filter,offset,limit,explain);
			log.debug(" \\-> got: "+res);
			return res;
		} catch (Exception e) {
			// invalidate the searcher cache
			if(cache == null)
				cache = SearcherCache.getInstance();
			cache.invalidateSearchable(iid,host);
			HighlightPack pack = new HighlightPack(new SearchResults());
			pack.res.retry();			
			log.warn("Error invoking remote method searchPart on host "+host+" : "+e.getMessage());
			e.printStackTrace();
			return pack;
		}
	}
	
	public boolean requestFlushAndNotify(String dbname, String host){
		try {
			RMIMessenger r = messengerFromCache(host);
			log.debug("Calling requestFlushAndNotify("+dbname+" records) on "+host);
			return r.requestFlushAndNotify(dbname);
		} catch (Exception e) {
			log.warn("Error invoking remote method requestFlushAndNotify on host "+host+" : "+e.getMessage());
			return false;
		}
	}
	
	public Boolean isSuccessfulFlush(String dbname, String host) throws IOException {
		try {
			RMIMessenger r = messengerFromCache(host);
			log.debug("Calling isSuccessfulFlush("+dbname+" records) on "+host);
			return r.isSuccessfulFlush(dbname);
		} catch (Exception e) {
			log.warn("Error invoking remote method isSuccessfulFlush on host "+host+" : "+e.getMessage());
			throw new IOException("Remote error");
		}
	}
	
	public int getIndexerQueueSize(String host){
		try {
			RMIMessenger r = messengerFromCache(host);
			log.debug("Calling searchPart() on "+host);
			int size = r.getIndexerQueueSize();
			log.debug(" \\-> got: "+size);
			return size;
		} catch (Exception e) {
			log.warn("Error invoking remote method getIndexerQueueSize on host "+host+" : "+e.getMessage());
			return -1;
		}	
	}
	
	public ArrayList<String> getTerms(String host, String dbrole, String wildcard, boolean exactCase) throws RemoteException {
		try{
			RMIMessenger r = messengerFromCache(host);
			return r.getTerms(dbrole,wildcard,exactCase);
		} catch(Exception e){
			e.printStackTrace();
			return new ArrayList<String>();
		}
	}
	
	public Highlight.ResultSet highlight(String host, ArrayList<String> hits, String dbrole, Term[] terms, int df[], int maxDoc, ArrayList<String> words, boolean exactCase){
		try{
			RMIMessenger r = messengerFromCache(host);
			return r.highlight(hits,dbrole,terms,df,maxDoc,words,exactCase);
		} catch(Exception e){
			e.printStackTrace();
			return new Highlight.ResultSet(new HashMap<String,HighlightResult>(),new HashSet<String>(),new HashSet<String>(),false);
		}		
	}
	
	public SearchResults searchTitles(String host, String dbrole, String searchterm, ArrayList<String> words, Query query, SuffixNamespaceWrapper filter, int offset, int limit, boolean explain) {
		try{
			RMIMessenger r = messengerFromCache(host);
			return r.searchTitles(dbrole,searchterm,words,query,filter,offset,limit,explain);
		} catch(Exception e){
			e.printStackTrace();
			if(cache == null)
				cache = SearcherCache.getInstance();
			cache.invalidateSearchable(IndexId.get(dbrole),host);
			SearchResults res = new SearchResults();
			res.setErrorMsg("Error searching titles: "+e.getMessage());			
			log.warn("Error invoking remote method searchTitles on host "+host+" : "+e.getMessage());
			return res;
		}
	}
	
	public SuggestQuery suggest(String host, String dbrole, String searchterm, ArrayList<Token> tokens, HashSet<String> phrases, HashSet<String> foundInContext){
		try{
			RMIMessenger r = messengerFromCache(host);
			return r.suggest(dbrole,searchterm,tokens,phrases,foundInContext);
		} catch(Exception e){
			e.printStackTrace();
			if(cache == null)
				cache = SearcherCache.getInstance();
			cache.invalidateSearchable(IndexId.get(dbrole),host);			
			log.warn("Error invoking suggest() on "+host+" : "+e.getMessage());
			return null;
		}		
	}
}
