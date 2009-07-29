-- --------------------------------------------------------

--
-- Table structure for table `wah_jobqueue`
--

CREATE TABLE IF NOT EXISTS `wah_jobqueue` (
  `job_id` int(12) unsigned NOT NULL auto_increment,
  `job_set_id` int(12) unsigned NOT NULL,
  `job_last_assigned_time` int(14) default NULL,
  `job_last_assigned_user_id` int(11) unsigned default NULL,
  `job_done_time` int(14) default NULL,
  `job_done_user_id` int(11) unsigned default NULL,
  `job_assign_count` int(4) unsigned NOT NULL default '0',
  `job_json` blob NOT NULL,
  PRIMARY KEY  (`job_id`),
  KEY `job_set_id` (`job_set_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `wah_jobset`
--

CREATE TABLE IF NOT EXISTS `wah_jobset` (
  `set_id` int(10) unsigned NOT NULL auto_increment,
  `set_namespace` int(11) default NULL,
  `set_title` varchar(255) default NULL,
  `set_jobs_count` int(11) unsigned NOT NULL,
  `set_encodekey` varchar(40) default NULL,
  `job_creation_time` int(14) NOT NULL,
  `set_done_time` int(14) default NULL,
  `set_client_count` int(5) NOT NULL default '0',
  PRIMARY KEY  (`set_id`),
  KEY `set_namespace` (`set_namespace`,`set_title`),
  KEY `set_done_time` (`set_done_time`),
  KEY `set_client_count` (`set_client_count`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;
