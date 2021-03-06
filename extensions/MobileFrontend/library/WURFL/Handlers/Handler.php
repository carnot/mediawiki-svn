<?php
/**
 * WURFL API
 *
 * LICENSE
 *
 * This file is released under the GNU General Public License. Refer to the
 * COPYING file distributed with this package.
 *
 * Copyright (c) 2008-2009, WURFL-Pro S.r.l., Rome, Italy
 *
 *
 *
 * @category   WURFL
 * @package    WURFL_Handlers
 * @copyright  WURFL-PRO SRL, Rome, Italy
 * @license
 * @version    $id$
 */

/**
 * UserAgentHandler is the base class that combines the classification of
 * the user agents and the matching process.
 *
 * @category   WURFL
 * @package    WURFL_Handlers
 * @copyright  WURFL-PRO SRL, Rome, Italy
 * @license
 * @version    $id$
 */
abstract class WURFL_Handlers_Handler implements WURFL_Handlers_Filter, WURFL_Handlers_Matcher {
	
	private $nextHandler;
	
	private $userAgentNormalizer;
	
	protected $prefix;
	
	protected $userAgentsWithDeviceID;
	
	protected $persistenceProvider;
	
	// Log
	protected $logger;
	protected $undetectedDeviceLogger;
	
	function __construct($wurflContext, $userAgentNormalizer = null) {
		
		if (is_null ( $userAgentNormalizer )) {
			$this->userAgentNormalizer = new WURFL_Request_UserAgentNormalizer_Null ();
		} else {
			$this->userAgentNormalizer = $userAgentNormalizer;
		}
		$this->logger = $wurflContext->logger;
		//$this->undtectedDeviceLogger = $wurflContext->undetectedDeviceLogger;
		

		$this->persistenceProvider = $wurflContext->persistenceProvider;
	}
	
	/**
	 * Sets the next Handler
	 *
	 * @param WURFL_Handlers_UserAgentHandler $handler
	 */
	public function setNextHandler($handler) {
		$this->nextHandler = $handler;
	}
	
	public function getName() {
		return $this->getPrefix ();
	}
	
	abstract function canHandle($userAgent);
	
	//********************************************************
	//
	//     Classification of the User Agents
	//
	//********************************************************
	/**
	 *
	 * @param string $userAgent
	 * @param string $deviceID
	 */
	function filter($userAgent, $deviceID) {
		if ($this->canHandle ( $userAgent )) {
			$this->updateUserAgentsWithDeviceIDMap ( $this->normalizeUserAgent($userAgent), $deviceID );
			return;
		}
		if (isset ( $this->nextHandler )) {
			return $this->nextHandler->filter ( $userAgent, $deviceID );
		}
	}
	
	/**
	 * Updates the map containing the classified user agents
	 * Before adding the user agent to the map it normalizes by using the normalizeUserAgent
	 * function.
	 *
	 * If you need to normalize the user agent you need to override the funcion in
	 * the speficific user agent handler
	 *
	 *
	 * @param string $userAgent
	 * @param string $deviceID
	 */
	final function updateUserAgentsWithDeviceIDMap($userAgent, $deviceID) {
		$this->userAgentsWithDeviceID [$this->normalizeUserAgent ( $userAgent )] = $deviceID;
	}
	
	public function normalizeUserAgent($userAgent) {
		return $this->userAgentNormalizer->normalize ( $userAgent );
	}
	
	//********************************************************
	//	Persisting The classified user agents
	//
	//********************************************************
	/**
	 * Persists the classified user agents on the filesystem
	 *
	 */
	function persistData() {
		// we sort the array first, useful for doing ris match
		if (! empty ( $this->userAgentsWithDeviceID )) {
			ksort ( $this->userAgentsWithDeviceID );
			$this->persistenceProvider->save ( $this->getPrefix (), $this->userAgentsWithDeviceID );
		}
	}
	
	function getUserAgentsWithDeviceId() {
		if (! isset ( $this->userAgentsWithDeviceID )) {
			$this->userAgentsWithDeviceID = $this->persistenceProvider->load ( $this->getPrefix () );
		}
		return $this->userAgentsWithDeviceID;
	}
	
	//********************************************************
	//	Matching
	//
	//********************************************************
	/**
	 * Finds the device id for the given request.
	 * if it is not found it delegates to the next available handler
	 *
	 *
	 * @param WURFL_GenericRequest $request
	 * @return string
	 */
	public function match(WURFL_Request_GenericRequest $request) {
		$userAgent = $request->userAgent;
		if ($this->canHandle ( $userAgent )) {
			return $this->applyMatch ( $request );
		}
		
		if (isset ( $this->nextHandler )) {
			return $this->nextHandler->match ( $request );
		}
		
		return WURFL_Constants::GENERIC;
	}
	
	/**
	 * Template method
	 *
	 * @param string $userAgent
	 * @return string
	 */
	function applyMatch(WURFL_Request_GenericRequest $request) {
		$userAgent = $this->normalizeUserAgent ( $request->userAgent );
		$this->logger->debug ( "START: Matching For  " . $userAgent );
		
		// Get The data associated with this current handler
		$this->userAgentsWithDeviceID = $this->persistenceProvider->load ( $this->getPrefix () );
		if (! is_array ( $this->userAgentsWithDeviceID )) {
			$this->userAgentsWithDeviceID = array ();
		}
		$deviceID = NULL;
		// we start with direct match
		if (array_key_exists ( $userAgent, $this->userAgentsWithDeviceID )) {
			return $this->userAgentsWithDeviceID [$userAgent];
		}
		
		// Try with the conclusive Match
		$this->logger->debug ( "$this->prefix :Applying Conclusive Match for ua: $userAgent" );
		$deviceID = $this->applyConclusiveMatch ( $userAgent );
		
		if ($this->isBlankOrGeneric ( $deviceID )) {
			// Log the ua and the ua profile
			//$this->logger->debug ( $request );
			$this->logger->debug ( "$this->prefix :Applying Recovery Match for ua: $userAgent" );
			$deviceID = $this->applyRecoveryMatch ( $userAgent );
		}
		// Try with catch all recovery Match
		if ($this->isBlankOrGeneric ( $deviceID )) {
			$this->logger->debug ( "$this->prefix :Applying Catch All Recovery Match for ua: $userAgent" );
			$deviceID = $this->applyRecoveryCatchAllMatch ( $userAgent );
		}
		
		if ($this->isBlankOrGeneric ( $deviceID )) {
			$deviceID = WURFL_Constants::GENERIC;
		}
		
		$this->logger->debug ( "END: Matching For  " . $userAgent );
		
		return $deviceID;
	}
	/**
	 * @param deviceID
	 */
	private function isBlankOrGeneric($deviceID) {
		return $deviceID == NULL || strcmp ( $deviceID, "generic" ) === 0 || strlen ( trim ( $deviceID ) ) == 0;
	}
	
	/**
	 
	 * @param string $userAgent
	 * @return string
	 */
	function applyConclusiveMatch($userAgent) {
		$match = $this->lookForMatchingUserAgent ( $userAgent );
		
		if (! empty ( $match )) {
			return $this->userAgentsWithDeviceID [$match];
		}
		
		return NULL;
	
	}
	
	/**
	 * Override this method to give an alternative way to do the matching
	 *
	 * @param string $userAgent
	 * @return string
	 */
	function lookForMatchingUserAgent($userAgent) {
		$tollerance = WURFL_Handlers_Utils::firstSlash ( $userAgent );
		return WURFL_Handlers_Utils::risMatch ( array_keys ( $this->userAgentsWithDeviceID ), $userAgent, $tollerance );
	}
	
	protected function applyRisWithTollerance($userAgetsList, $target, $tollerance) {
		return WURFL_Handlers_Utils::risMatch ( $userAgetsList, $target, $tollerance );
	}
	
	
	private $catchAllIds = array(
		 // Openwave
            "UP.Browser/7.2" => "opwv_v72_generic",
            "UP.Browser/7" => "opwv_v7_generic",
            "UP.Browser/6.2" => "opwv_v62_generic",
            "UP.Browser/6" => "opwv_v6_generic",
            "UP.Browser/5" => "upgui_generic",
            "UP.Browser/4" => "uptext_generic",
            "UP.Browser/3" => "uptext_generic",


            // Series 60
            "Series60" => "nokia_generic_series60",

            // Access/Net Front
            "NetFront/3.0" => "generic_netfront_ver3",
            "ACS-NF/3.0" => "generic_netfront_ver3",
            "NetFront/3.1" => "generic_netfront_ver3_1",
            "ACS-NF/3.1" => "generic_netfront_ver3_1",
            "NetFront/3.2" => "generic_netfront_ver3_2",
            "ACS-NF/3.2" => "generic_netfront_ver3_2",
            "NetFront/3.3" => "generic_netfront_ver3_3",
            "ACS-NF/3.3" => "generic_netfront_ver3_3",
            "NetFront/3.4" => "generic_netfront_ver3_4",
            "NetFront/3.5" => "generic_netfront_ver3_5",
            "NetFront/4.0" => "generic_netfront_ver4",
            "NetFront/4.1" => "generic_netfront_ver4_1",


            // Windows CE
            "Windows CE" => "generic_ms_mobile",


            // web browsers?
            "Mozilla/4.0" => "generic_web_browser",
            "Mozilla/5.0" => "generic_web_browser",
            "Mozilla/5.0" => "generic_web_browser",

            // Generic XHTML
            "Mozilla/" => WURFL_Constants::GENERIC_XHTML,
            "ObigoInternetBrowser/Q03C"=> WURFL_Constants::GENERIC_XHTML,
           	"AU-MIC/2"=> WURFL_Constants::GENERIC_XHTML,
	        "AU-MIC-"=>  WURFL_Constants::GENERIC_XHTML,
            "AU-OBIGO/"=>  WURFL_Constants::GENERIC_XHTML,
            "Obigo/Q03"=>  WURFL_Constants::GENERIC_XHTML,
            "Obigo/Q04" =>  WURFL_Constants::GENERIC_XHTML,
            "ObigoInternetBrowser/2"=>  WURFL_Constants::GENERIC_XHTML,
            "Teleca Q03B1"=>  WURFL_Constants::GENERIC_XHTML,


            // Opera Mini
            "Opera Mini/1" => "browser_opera_mini_release1",
            "Opera Mini/2" => "browser_opera_mini_release2",
            "Opera Mini/3" => "browser_opera_mini_release3",
            "Opera Mini/4" => "browser_opera_mini_release4",
            "Opera Mini/5" => "browser_opera_mini_release5",

            // DoCoMo
            "DoCoMo" => "docomo_generic_jap_ver1",
            "KDDI" => "docomo_generic_jap_ver1",
	);
	/**
	 * Applies Recovery Match
	 *
	 * @param string $userAgent
	 */
	function applyRecoveryMatch($userAgent) {
	}
	
	function applyRecoveryCatchAllMatch($userAgent) {
		foreach ($this->catchAllIds as $key => $deviceId) {
			if(WURFL_Handlers_Utils::checkIfContains($userAgent, $key)) {
				return $deviceId;
			}
		}
		
		return WURFL_Constants::GENERIC;
	}
	
	public function getPrefix() {
		return $this->prefix . "_DEVICEIDS";
	}
	
	/**
	 * @param deviceId
	 */
	protected function isDeviceExist($deviceId) {
		$ids = array_values ( $this->userAgentsWithDeviceID );
		if (in_array ( $deviceId, $ids )) {
			return true;
		}
		return false;
	}

}

