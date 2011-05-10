<?php 
/**
 * Simple job runner demon suitable to be run from the can be run from the command line with a 
 * virtual session using a unix utility such as screen.
 * 
 * This could be replaced by a cron job shell script that did something similar. 
 */

// Check if the script is already running
// threads ( number of simultaneous jobs to run ) 
// wait 5 seconds and confirm job is running.
$wgMaintenancePath = dirname( __FILE__ ) . '/../../../maintenance';
require_once( "$wgMaintenancePath/Maintenance.php" );

class WebVideoJobRunner extends Maintenance {
	// Default number of simultaneous transcoding threads  
	var $threads = 2;
	
	// Default time for a transcode to time out: 4 hours, 
	// ( should be increased if we add long form content to wikimedia )  
	var $transcodeTimeout = 14400;
	
	// How often the script checks for $threads transcode jobs to be active. 
	var $checkJobsFrequency = 5;
	
	public function __construct() {
		parent::__construct();
		$this->addOption( "threads", "The number of simultaneous transcode threads to run", false, true );
		$this->addOption( "checkJobsFrequency", "How often the script checks for job threads to be active", false, true );
		$this->mDescription = "Transcode job running demon, continuously runs transcode jobs";
	}
	public function execute() {		
		if ( $this->hasOption( "threads" ) ) {
			$this->threads = $this->getOption( 'threads' ) ;
		}
		
		// Check if WebVideoJobRuner is already running:
		foreach( $this->getProcessList() as $pid => $proc ){
			if( strpos( $proc['args'], 'WebVideoJobRunner.php' ) !== false ){
				$this->error( "WebVideoJobRunner.php is already running on this box with pid $pid" );
			}
		}
		
		// Main runCheckJobThreadsLoop 
		while( true ){		
			$this->runCheckJobThreadsLoop();
			// Check again in $checkJobsFrequency seconds:
			sleep( $this->checkJobsFrequency );
		}		
	}
	function runCheckJobThreadsLoop(){
		global $wgMaintenancePath;
		// Check if we have $threads number of webTranscode jobs running else sleep
		$runingJobsCount = 0;
		foreach( $this->getProcessList() as $pid => $proc ){
			// Check that the process is a "runJobs.php" action with type webVideoTranscode argument  			
			if( strpos( $proc['args'], 'runJobs.php' ) !== false && 
				strpos( $proc['args'], '--type webVideoTranscode' ) !== false 
			){
				if( TimedMediaHandler::parseTimeString( $proc['time'] ) > $this->transcodeTimeout ){	
					
				} else {
					// Job is oky add to count: 
					$runingJobsCount++;
				}				
			}
		}
		if( $runingJobsCount < $this->threads ){			
			// Add one process:
			$cmd = "php $wgMaintenancePath/runJobs.php --type webVideoTranscode --maxjobs 1 --maxtime {$this->transcodeTimeout}";
			$status = $this->runBackgroundProc( $cmd );
			$this->output( "$runingJobsCount existing job runners, Starting new transcode job runner \n\n $status " );
		} else {
			// Just output a "tick"
			$this->output( "$runingJobsCount transcode jobs active" );
		}
	}
	
	function runBackgroundProc($command, $priority = 19 ){
		$out = wfShellExec("nohup nice -n $priority $command > /dev/null & echo $!");
		return trim( $out );
	}
	
	/**
	 * Gets a list of php process
	 */
	function getProcessList(){
		// Get all the php process except for 
		$pList = wfShellExec( 'ps axo pid,etime,args | grep php | grep -v grep' );
		$pList = explode("\n", $pList );
		$namedProccessList = array();		
		foreach( $pList as $key => $val ){
			if( trim( $val) == '' )
				continue;
				
			// Split the process id			
			//$matchStatus = preg_match('/\s([0-9]+)\s+([0-9]+:?[0-9]+:[0-9]+)+\s+([^\s]+)\s(.*)/', $val, $matches);
			$matchStatus = preg_match('/\s*([0-9]+)\s+([0-9]+:?[0-9]+:[0-9]+)+\s+([^\s]+)\s(.*)/', $val, $matches);
			if( !$matchStatus ){
				continue;
			}
			$namedProccessList[ $matches[1] ] = array(
				'pid' => $matches[1],
				'time' => $matches[2],
				'args' => $matches[4],				 			
			);
		}
		return $namedProccessList;
	}	
}

$maintClass = "WebVideoJobRunner";
require_once( RUN_MAINTENANCE_IF_MAIN );

