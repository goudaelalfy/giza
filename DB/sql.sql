-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.1.33-community - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4206
-- Date/time:                    2015-12-21 19:44:01
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table giza.alumni
CREATE TABLE IF NOT EXISTS `alumni` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `home_address` varchar(255) DEFAULT NULL,
  `home_city` varchar(255) DEFAULT NULL,
  `home_postal_code` varchar(255) DEFAULT NULL,
  `home_country_id` int(11) DEFAULT '0',
  `home_phone` varchar(255) DEFAULT NULL,
  `home_mobile` varchar(255) DEFAULT NULL,
  `home_email` varchar(255) DEFAULT NULL,
  `current_position` varchar(255) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `work_address` varchar(255) DEFAULT NULL,
  `work_postal_code` varchar(255) DEFAULT NULL,
  `work_city` varchar(255) DEFAULT NULL,
  `work_country_id` int(11) unsigned DEFAULT '0',
  `work_phone` varchar(255) DEFAULT NULL,
  `work_mobile` varchar(255) DEFAULT NULL,
  `work_email` varchar(255) DEFAULT NULL,
  `giza_year_joined` date DEFAULT NULL,
  `giza_starting_position` varchar(255) DEFAULT NULL,
  `giza_department` varchar(255) DEFAULT NULL,
  `giza_year_left` date DEFAULT NULL,
  `giza_final_position` varchar(255) DEFAULT NULL,
  `giza_final_department` varchar(255) DEFAULT NULL,
  `giza_total_years` varchar(255) DEFAULT NULL,
  `reference_contacts` varchar(500) DEFAULT NULL,
  `interests` varchar(500) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `active_code` varchar(50) DEFAULT NULL,
  `registeration_datetime` datetime NOT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.alumni: 1 rows
/*!40000 ALTER TABLE `alumni` DISABLE KEYS */;
INSERT INTO `alumni` (`id`, `username`, `password`, `title`, `firstname`, `lastname`, `gender`, `birthdate`, `home_address`, `home_city`, `home_postal_code`, `home_country_id`, `home_phone`, `home_mobile`, `home_email`, `current_position`, `organization`, `work_address`, `work_postal_code`, `work_city`, `work_country_id`, `work_phone`, `work_mobile`, `work_email`, `giza_year_joined`, `giza_starting_position`, `giza_department`, `giza_year_left`, `giza_final_position`, `giza_final_department`, `giza_total_years`, `reference_contacts`, `interests`, `active`, `active_code`, `registeration_datetime`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'a1', 'a1', 'MR', 'Gouda', 'Elalfy', 'Male', '0000-00-00', '', '', '', 228, '', '', 'gouda@4jawaly.com', '', 'ewewe', '', '', '', 234, '', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '', 'Home Phone', 'Receive corporate newsletter,Giza Systems Publications', 1, 'JRwNjyK3OH8oCmB', '2013-04-11 14:06:10', 0, 0, NULL, NULL);
/*!40000 ALTER TABLE `alumni` ENABLE KEYS */;


-- Dumping structure for table giza.award
CREATE TABLE IF NOT EXISTS `award` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `alias` varchar(250) DEFAULT NULL,
  `image_thumbs` text,
  `images` text,
  `image_thumb_selected` tinytext,
  `image_selected` tinytext,
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `seo_words` tinytext,
  `seo_words_ar` tinytext,
  `body` text,
  `body_ar` text,
  `award_file` tinytext,
  `sort` tinyint(4) DEFAULT '0',
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.award: ~3 rows (approximately)
/*!40000 ALTER TABLE `award` DISABLE KEYS */;
INSERT INTO `award` (`id`, `alias`, `image_thumbs`, `images`, `image_thumb_selected`, `image_selected`, `name`, `name_ar`, `seo_words`, `seo_words_ar`, `body`, `body_ar`, `award_file`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(14, 'ISO 9001', '/added/uploads/award/1363675142_thumb.jpg', '/added/uploads/award/1363675142.jpg', '/added/uploads/award/1363675142_thumb.jpg', '/added/uploads/award/1363675142.jpg', 'ISO 9001', 'ISO 9001', '', '', '<p>ISO 9001/2008</p>\r\n<p>ISO 14001</p>\r\n<p>OHSAS 18001</p>', '<p>ISO 9001/2008</p>\r\n<p>ISO 14001</p>\r\n<p>OHSAS 18001</p>', '/added/uploads/award/1363675142award.pdf', 3, 1, 0, 1, '2013-03-19 08:39:02'),
	(15, 'TM Forum Membership', '/added/uploads/award/1363675336_thumb.jpg', '/added/uploads/award/1363675336.jpg', '/added/uploads/award/1363675336_thumb.jpg', '/added/uploads/award/1363675336.jpg', 'TM Forum Membership', 'TM Forum Membership', '', '', '', '', '', 1, 1, 0, 1, '2013-04-15 10:15:29'),
	(16, 'CMMI', '/added/uploads/award/1363675389_thumb.jpg', '/added/uploads/award/1363675389.jpg', '/added/uploads/award/1363675389_thumb.jpg', '/added/uploads/award/1363675389.jpg', 'CMMI', 'CMMI', '', '', '<p>&nbsp;Level 3</p>', '<p>&nbsp;Level 3</p>', '', 2, 1, 0, 1, '2013-04-15 10:15:16');
/*!40000 ALTER TABLE `award` ENABLE KEYS */;


-- Dumping structure for table giza.case_study
CREATE TABLE IF NOT EXISTS `case_study` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(250) NOT NULL DEFAULT '0',
  `client_id` int(11) unsigned DEFAULT '0',
  `country_id` int(11) unsigned DEFAULT '0',
  `banner_image_thumbs` text,
  `banner_files` text,
  `banner_image_thumb_selected` tinytext,
  `banner_file_selected` tinytext,
  `title` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `seo_words` varchar(1000) DEFAULT NULL,
  `seo_words_ar` varchar(1000) DEFAULT NULL,
  `end_user` varchar(1000) DEFAULT NULL,
  `end_user_ar` varchar(1000) DEFAULT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `project_name_ar` varchar(255) DEFAULT NULL,
  `business_unit` varchar(255) DEFAULT NULL,
  `business_unit_ar` varchar(255) DEFAULT NULL,
  `project_leader` varchar(255) DEFAULT NULL,
  `project_leader_ar` varchar(255) DEFAULT NULL,
  `client_issue` text,
  `client_issue_ar` text,
  `work_scope` text,
  `work_scope_ar` text,
  `outcome` text,
  `outcome_ar` text,
  `team_members` text,
  `team_members_ar` text,
  `testimonial` text,
  `testimonial_ar` text,
  `sort` int(11) unsigned DEFAULT '0',
  `approved` tinyint(3) unsigned DEFAULT '0',
  `deleted` tinyint(3) unsigned DEFAULT '0',
  `last_user_id` int(10) unsigned DEFAULT '0',
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.case_study: 22 rows
/*!40000 ALTER TABLE `case_study` DISABLE KEYS */;
INSERT INTO `case_study` (`id`, `alias`, `client_id`, `country_id`, `banner_image_thumbs`, `banner_files`, `banner_image_thumb_selected`, `banner_file_selected`, `title`, `title_ar`, `seo_words`, `seo_words_ar`, `end_user`, `end_user_ar`, `project_name`, `project_name_ar`, `business_unit`, `business_unit_ar`, `project_leader`, `project_leader_ar`, `client_issue`, `client_issue_ar`, `work_scope`, `work_scope_ar`, `outcome`, `outcome_ar`, `team_members`, `team_members_ar`, `testimonial`, `testimonial_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(3, 'Shabab 1000 MW and Damietta 500 MW Simple Cycle Power Plants', 17, 193, '', '', '', '', 'Shabab 1000 MW and Damietta 500 MW Simple Cycle Power Plants', 'Shabab 1000 MW and Damietta 500 MW Simple Cycle Power Plants', 'Shabab 1000 MW and Damietta 500 MW Simple Cycle Power Plants', 'Shabab 1000 MW and Damietta 500 MW Simple Cycle Power Plants', 'Egyptian Electricity Holding Company (EEHC)', 'Egyptian Electricity Holding Company (EEHC)', 'Shabab 1000 MW and Damietta 500 MW Simple Cycle Power Plants – DCS', 'Shabab 1000 MW and Damietta 500 MW Simple Cycle Power Plants – DCS', 'GS Business Unit Name', 'GS Business Unit Name', 'The project leader name', 'The project leader name', '<p>Kharafi National awarded Giza Systems its project for the Egyptian Electricity Holding Company on a turnkey basis. The project entailed injecting 1500MW to the Egyptian Grid as part of a national initiative to decrease power leakages especially during the months of summer. &nbsp;</p>\r\n<div id="cke_pastebin">Kharafi National commissioned Giza Systems for its unique understanding of the intricacies involved in such a project, as well as its ability to fulfill the requirements within the very tight timeframe set. Giza Systems&rsquo; technical know-how and proficiency in the power sector have positioned us as the leading system integrators in the field equipped to handle vast and complex projects.&nbsp;</div>', '<p>Kharafi National awarded Giza Systems its project for the Egyptian Electricity Holding Company on a turnkey basis. The project entailed injecting 1500MW to the Egyptian Grid as part of a national initiative to decrease power leakages especially during the months of summer. &nbsp;</p>\r\n<div id="cke_pastebin">Kharafi National commissioned Giza Systems for its unique understanding of the intricacies involved in such a project, as well as its ability to fulfill the requirements within the very tight timeframe set. Giza Systems&rsquo; technical know-how and proficiency in the power sector have positioned us as the leading system integrators in the field equipped to handle vast and complex projects.&nbsp;</div>', '<p>In a period of three months, Giza Systems was contracted to design, engineer, and install the necessary DCS systems and its infrastructure at the Shabab and Damietta power plants to inject the Egyptian Grid with 1500MW.&nbsp;</p>\r\n<div id="cke_pastebin">The challenge of this project involved the strict time schedule set for its delivery. Our scope of work for this project was multifaceted, as it dealt with all the stages for the start-up of the operations.&nbsp;</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin">Our scope included:&nbsp;</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin">&bull;Engineering</div>\r\n<div id="cke_pastebin">&bull;Supply</div>\r\n<div id="cke_pastebin">&bull;DCS and Cables Procurement</div>\r\n<div id="cke_pastebin">&bull;FAT</div>\r\n<div id="cke_pastebin">&bull;Installation</div>\r\n<div id="cke_pastebin">&bull;Training</div>\r\n<div id="cke_pastebin">&bull;Testing and Commissioning for the Distributed Control Systems (DCS)</div>\r\n<div id="cke_pastebin">&bull;Interface with Turbine Control</div>\r\n<div id="cke_pastebin">&bull;Substation Automation</div>\r\n<div id="cke_pastebin">&bull;Water Treatment Plant Control&nbsp;</div>\r\n<div id="cke_pastebin">&bull;Balance of Plant monitoring and control</div>\r\n<div id="cke_pastebin">&bull;MV &amp; LV Switchgear Control</div>', '<p>In a period of three months, Giza Systems was contracted to design, engineer, and install the necessary DCS systems and its infrastructure at the Shabab and Damietta power plants to inject the Egyptian Grid with 1500MW.&nbsp;</p>\r\n<div id="cke_pastebin">The challenge of this project involved the strict time schedule set for its delivery. Our scope of work for this project was multifaceted, as it dealt with all the stages for the start-up of the operations.&nbsp;</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin">Our scope included:&nbsp;</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin">&bull;Engineering</div>\r\n<div id="cke_pastebin">&bull;Supply</div>\r\n<div id="cke_pastebin">&bull;DCS and Cables Procurement</div>\r\n<div id="cke_pastebin">&bull;FAT</div>\r\n<div id="cke_pastebin">&bull;Installation</div>\r\n<div id="cke_pastebin">&bull;Training</div>\r\n<div id="cke_pastebin">&bull;Testing and Commissioning for the Distributed Control Systems (DCS)</div>\r\n<div id="cke_pastebin">&bull;Interface with Turbine Control</div>\r\n<div id="cke_pastebin">&bull;Substation Automation</div>\r\n<div id="cke_pastebin">&bull;Water Treatment Plant Control&nbsp;</div>\r\n<div id="cke_pastebin">&bull;Balance of Plant monitoring and control</div>\r\n<div id="cke_pastebin">&bull;MV &amp; LV Switchgear Control</div>', '<p>The necessary systems were successfully designed, engineered and installed and the infrastructure was set up at the Shabab and Damietta power plants to inject the Egyptian Grid with 1500MW.&nbsp;</p>\r\n<div id="cke_pastebin">For further information on this case study, please contact xxx (preferably the PM) at email or on +mobile number</div>', '<p>The necessary systems were successfully designed, engineered and installed and the infrastructure was set up at the Shabab and Damietta power plants to inject the Egyptian Grid with 1500MW.&nbsp;</p>\r\n<div id="cke_pastebin">For further information on this case study, please contact xxx (preferably the PM) at email or on +mobile number</div>', '', '', '', '', 4, 1, 0, 1, '2013-05-17 19:02:52'),
	(4, 'SCADA System for Great Cairo – DCS', 3, 65, '', '', '', '', 'SCADA System for Great Cairo – DCS', 'SCADA System for Great Cairo – DCS', 'SCADA System for Great Cairo – DCS', 'SCADA System for Great Cairo – DCS', 'Construction Authority of Water & Wastewater Projects (CAWWP)', 'Construction Authority of Water & Wastewater Projects (CAWWP)', 'SCADA System for Great Cairo – DCS', 'SCADA System for Great Cairo – DCS', 'IA', 'IA', 'Test Project Leader', 'Test Project Leader', '<p>&nbsp;</p>\r\n<p>Our client Construction Authority of Water &amp; Wastewater Projects (CAWWP) commissioned Giza Systems to design, supply, engineer, train, and start-up a central control room at the Road El Farag plant. The project consisted of the creation of a central information system to monitor data acquired from over 80 sites in Greater Cairo, as well as the construction of a central leak detection system to supervise the water network.</p>\r\n<p>Giza Systems was selected to execute the project because of its comprehensive experience in the integration of the various systems and processes, which include SCADA, GIS, billing, and network inventory. In addition to our diversified know-how, the availability of our local support and strategic partnerships has positioned us as the leading integrators able to deliver the job on a turnkey basis.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p>Our client Construction Authority of Water &amp; Wastewater Projects (CAWWP) commissioned Giza Systems to design, supply, engineer, train, and start-up a central control room at the Road El Farag plant. The project consisted of the creation of a central information system to monitor data acquired from over 80 sites in Greater Cairo, as well as the construction of a central leak detection system to supervise the water network.</p>\r\n<p>Giza Systems was selected to execute the project because of its comprehensive experience in the integration of the various systems and processes, which include SCADA, GIS, billing, and network inventory. In addition to our diversified know-how, the availability of our local support and strategic partnerships has positioned us as the leading integrators able to deliver the job on a turnkey basis.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p>To create the Road El Farag Control Center, the infrastructure needed was based on Supervisory Control and Data Acquisition (SCADA) system applications and RTUs to link the 80 sites distributed amongst 11 water plants using DNP3 protocol. The central leak detection system reinforces the function of the Control Center by monitoring the operations of the water network and enabling the operator to take necessary measures in the case of disruption to the network. The execution of the project required complete metering and measuring instruments to be spread over the 80 sites for data acquisition and control.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>The objectives of the project encompassed real-time monitoring, improvement of efficiency, performance of maintenance, and the generation of reports.</p>\r\n<p>Understanding our client&rsquo;s needs entails adding value to the engineering process, as well as ensuring compatibility and flexibility throughout the operation. Our scope of work included:</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Design input preparation</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply of Supervisory Control and Data Acquisition (SCADA)</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Data acquisition and communication servers</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DNP3 communication protocol</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Remote Terminal Units (RTU)</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Microwave links</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Automatic leak detection center</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UPS</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Field instruments</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Procurement</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Engineering</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FAT</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Training</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Installation</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Testing and commissioning</p>', '<p>&nbsp;</p>\r\n<p>To create the Road El Farag Control Center, the infrastructure needed was based on Supervisory Control and Data Acquisition (SCADA) system applications and RTUs to link the 80 sites distributed amongst 11 water plants using DNP3 protocol. The central leak detection system reinforces the function of the Control Center by monitoring the operations of the water network and enabling the operator to take necessary measures in the case of disruption to the network. The execution of the project required complete metering and measuring instruments to be spread over the 80 sites for data acquisition and control.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>The objectives of the project encompassed real-time monitoring, improvement of efficiency, performance of maintenance, and the generation of reports.</p>\r\n<p>Understanding our client&rsquo;s needs entails adding value to the engineering process, as well as ensuring compatibility and flexibility throughout the operation. Our scope of work included:</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Design input preparation</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply of Supervisory Control and Data Acquisition (SCADA)</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Data acquisition and communication servers</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DNP3 communication protocol</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Remote Terminal Units (RTU)</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Microwave links</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Automatic leak detection center</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UPS</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Field instruments</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Procurement</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Engineering</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FAT</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Training</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Installation</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Testing and commissioning</p>', '<p>&nbsp;</p>\r\n<p>The Road El Farag Control Center was successfully designed, engineered, set up, started up and tested for optimum functionality.</p>', '<p>&nbsp;</p>\r\n<p>The Road El Farag Control Center was successfully designed, engineered, set up, started up and tested for optimum functionality.</p>', '', '', '', '', 3, 1, 0, 1, '2013-05-17 19:04:16'),
	(5, 'Al-Hassa Irrigation and Drainage Project', 15, 193, '', '', '', '', 'Al-Hassa Irrigation and Drainage Project', 'Al-Hassa Irrigation and Drainage Project', 'Al-Hassa Irrigation and Drainage Project', 'Al-Hassa Irrigation and Drainage Project', 'Al-Hassa Irrigation and Drainage Authority', 'Al-Hassa Irrigation and Drainage Authority', 'Al-Hassa Irrigation and Drainage Project – SCADA System', 'Al-Hassa Irrigation and Drainage Project – SCADA System', 'IA', 'IA', '', '', '<p>&nbsp;</p>\r\n<p>Our client Civil Works Company (CWC) contracted Giza Systems to partner with it in a project for Al-Ahsa Irrigation and Drainage Authority. The project involved supply, engineering, commissioning, and start-up for the operation, monitoring, and control of 3090 farmer outlets in Al-Ahsa irrigation.</p>\r\n<p>Giza Systems&rsquo; expertise in systems integration underlies our grasp of the essential principles of water management and infrastructure. Our transfer of knowledge, regional experience in the Middle East, and our offices located in Riyadh and Al-Khobar, positioned us as the ideal systems integration provider to cooperate with our client to fulfill the requirements of the project. &nbsp;</p>', '<p>&nbsp;</p>\r\n<p>Our client Civil Works Company (CWC) contracted Giza Systems to partner with it in a project for Al-Ahsa Irrigation and Drainage Authority. The project involved supply, engineering, commissioning, and start-up for the operation, monitoring, and control of 3090 farmer outlets in Al-Ahsa irrigation.</p>\r\n<p>Giza Systems&rsquo; expertise in systems integration underlies our grasp of the essential principles of water management and infrastructure. Our transfer of knowledge, regional experience in the Middle East, and our offices located in Riyadh and Al-Khobar, positioned us as the ideal systems integration provider to cooperate with our client to fulfill the requirements of the project. &nbsp;</p>', '<p>&nbsp;</p>\r\n<p>Giza Systems was invited to jump on board in the implementation of Al-Ahsa irrigation control project due to its comprehensive experience in the integration of the many systems rudimentary to the delivery of this project. The scope of work included setting up SCADA, PLC, communication systems, and instrumentation.</p>\r\n<p>&nbsp;</p>\r\n<p>We strive to enhance the operations of our clients by streamlining the engineering process and ensuring that compatibility and flexibility are incorporated in the integration process. Our scope of work included the supply, design, engineering, procurement, training, commissioning, and start-up for:</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Instrumentation</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Valves</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hydrometers</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; RTUs</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Design input preparation</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply of Supervisory Control and Data Acquisition (SCADA)</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Field Instruments</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Procurement</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Engineering</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FAT</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Training</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Installation</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Testing and Commissioning</p>', '<p>&nbsp;</p>\r\n<p>Giza Systems was invited to jump on board in the implementation of Al-Ahsa irrigation control project due to its comprehensive experience in the integration of the many systems rudimentary to the delivery of this project. The scope of work included setting up SCADA, PLC, communication systems, and instrumentation.</p>\r\n<p>&nbsp;</p>\r\n<p>We strive to enhance the operations of our clients by streamlining the engineering process and ensuring that compatibility and flexibility are incorporated in the integration process. Our scope of work included the supply, design, engineering, procurement, training, commissioning, and start-up for:</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Instrumentation</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Valves</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hydrometers</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; RTUs</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Design input preparation</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply of Supervisory Control and Data Acquisition (SCADA)</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Field Instruments</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Procurement</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Engineering</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FAT</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Training</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Installation</p>\r\n<p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Testing and Commissioning</p>', '<p>&nbsp;</p>\r\n<p>Al-Hassa irrigation control system was successfully designed, engineered, commissioned, and tested for the operation, monitoring, and control of 3090 farmer outlets in Al-Hassa irrigation.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p>Al-Hassa irrigation control system was successfully designed, engineered, commissioned, and tested for the operation, monitoring, and control of 3090 farmer outlets in Al-Hassa irrigation.&nbsp;</p>', '', '', '', '', 5, 1, 0, 1, '2013-05-17 19:02:37'),
	(6, 'Water Management System Project', 11, 65, '', '', '', '', 'Water Management System Project', 'Water Management System Project', 'Water Management System Project', 'Water Management System Project', 'Great Cairo Drinking Water Co.', 'Great Cairo Drinking Water Co.', 'SCADA and Telecommunication System', 'SCADA and Telecommunication System', 'IA', 'IA', '', '', '', '', '<p>&nbsp;</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supplying, installation and operation of 80 RTUs located in different 42 remote sites in greater Cairo.</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Installing and Operation of the instrumentation.</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cabling works between the instrumentation and RTU&rsquo;s</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Establishing communication link with mokattam<br /> via VHF</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rehabilitation of inspection chambers for instrumentation in each remote site</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Building or rehabilitation of inspection chambers for instrumentation in each remote site</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply and erection of cables between the instrumentation and RTU&rsquo;s and interfacing with MCCs</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply and install junction boxes</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply and install conduits</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply and install cable trays</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Flow measurements, installation &amp; operation of flow meter instruments to collect readings from water treatment plants (12 Plants) within 10 months</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply and install SCADA system software and servers, work stations, training console and leak detection software.</p>\r\n<p>Supply and install fire fighting system</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply &amp; install central air conditioning system</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply &amp; install necessary electrical devices<br /> ( UPS, Distribution panel&hellip; etc)</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Repair floor, ceiling, glass&hellip; etc</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Replacement of any necessary defective parts</p>\r\n<p>&nbsp;</p>\r\n<p>Challenges</p>\r\n<p  1in;">q&nbsp; Lack of Drawings and Data</p>\r\n<p  1in;">q&nbsp; High Capacity Population for Sites</p>\r\n<p  1in;">q&nbsp; New Technology Transfer and Customer Training</p>\r\n<p  1in;">q&nbsp; MCCs under Tension Modification</p>\r\n<p>&nbsp;</p>\r\n<p>Advantages</p>\r\n<p  1in;">q&nbsp; Redundant Server for SCADA to ensure high reliability</p>\r\n<p  1in;">q&nbsp; DNP3 time stamped protocol and the buffering feature to avoid loosing of data.</p>\r\n<p  1in;">q&nbsp; Unix operating systems for Server and Windows for Operating Station</p>\r\n<p  1in;">q&nbsp; VHF for communication, no running cost, no need for line of sight,40km, 9.6KBPs</p>\r\n<p  1in;">q&nbsp; Redundant MW communication between Mokatam and CCR</p>', '<p>&nbsp;</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supplying, installation and operation of 80 RTUs located in different 42 remote sites in greater Cairo.</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Installing and Operation of the instrumentation.</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cabling works between the instrumentation and RTU&rsquo;s</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Establishing communication link with mokattam<br /> via VHF</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Rehabilitation of inspection chambers for instrumentation in each remote site</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Building or rehabilitation of inspection chambers for instrumentation in each remote site</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply and erection of cables between the instrumentation and RTU&rsquo;s and interfacing with MCCs</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply and install junction boxes</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply and install conduits</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply and install cable trays</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Flow measurements, installation &amp; operation of flow meter instruments to collect readings from water treatment plants (12 Plants) within 10 months</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply and install SCADA system software and servers, work stations, training console and leak detection software.</p>\r\n<p>Supply and install fire fighting system</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply &amp; install central air conditioning system</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply &amp; install necessary electrical devices<br /> ( UPS, Distribution panel&hellip; etc)</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Repair floor, ceiling, glass&hellip; etc</p>\r\n<p>&bull;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Replacement of any necessary defective parts</p>\r\n<p>&nbsp;</p>\r\n<p>Challenges</p>\r\n<p  1in;">q&nbsp; Lack of Drawings and Data</p>\r\n<p  1in;">q&nbsp; High Capacity Population for Sites</p>\r\n<p  1in;">q&nbsp; New Technology Transfer and Customer Training</p>\r\n<p  1in;">q&nbsp; MCCs under Tension Modification</p>\r\n<p>&nbsp;</p>\r\n<p>Advantages</p>\r\n<p  1in;">q&nbsp; Redundant Server for SCADA to ensure high reliability</p>\r\n<p  1in;">q&nbsp; DNP3 time stamped protocol and the buffering feature to avoid loosing of data.</p>\r\n<p  1in;">q&nbsp; Unix operating systems for Server and Windows for Operating Station</p>\r\n<p  1in;">q&nbsp; VHF for communication, no running cost, no need for line of sight,40km, 9.6KBPs</p>\r\n<p  1in;">q&nbsp; Redundant MW communication between Mokatam and CCR</p>', '', '', '', '', '', '', 6, 1, 0, 1, '2013-05-17 19:03:17'),
	(7, 'Telecom Egypt Hardware Maintenance', 9, 65, '', '', '', '', 'Telecom Egypt Hardware Maintenance', 'Telecom Egypt Hardware Maintenance', 'Telecom Egypt Hardware Maintenance', 'Telecom Egypt Hardware Maintenance', 'Telecom Egypt', 'Telecom Egypt', 'Telecom Egypt Hardware Maintenance', 'Telecom Egypt Hardware Maintenance', 'Telecom', 'Telecom', 'Waleed Farouk', 'Waleed Farouk', '<p>&nbsp;</p>\r\n<p class="CM4"  .0001pt; text-align: justify;"><span  12px;"><span  Arial, sans-serif;">Due to unplanned change from the customer&rsquo;s side, one of the new billing cluster nodes was completely lost. No backup was performed before this incident. </span></span></p>\r\n<p class="Default"><span  12px;"><span  Arial, sans-serif;">The new billing cluster was then working in a degraded status and the high availability solution no longer existed.</span></span></p>\r\n<p class="Default"><span  11pt; font-family: Arial, sans-serif;">&nbsp;</span></p>', '<p>&nbsp;</p>\r\n<p class="CM4"  .0001pt; text-align: justify;"><span  12px;"><span  Arial, sans-serif;">Due to unplanned change from the customer&rsquo;s side, one of the new billing cluster nodes was completely lost. No backup was performed before this incident. </span></span></p>\r\n<p class="Default"><span  12px;"><span  Arial, sans-serif;">The new billing cluster was then working in a degraded status and the high availability solution no longer existed.</span></span></p>\r\n<p class="Default"><span  11pt; font-family: Arial, sans-serif;">&nbsp;</span></p>', '<p>&nbsp;</p>\r\n<p>Installing a new fresh installation of HP-UX on the server and retrieving the configuration files one by one form a networked backup for the file system, with no impact on customer data.</p>', '<p>&nbsp;</p>\r\n<p>Installing a new fresh installation of HP-UX on the server and retrieving the configuration files one by one form a networked backup for the file system, with no impact on customer data.</p>', '<p>&nbsp;</p>\r\n<p class="Default"><span  11pt; font-family: Arial, sans-serif;">The client&rsquo;s work processes were not hindered during working hours. After the installation, the system recovered and worked well without any reconfiguration or loss of data.&nbsp;</span></p>', '<p>&nbsp;</p>\r\n<p class="Default"><span  11pt; font-family: Arial, sans-serif;">The client&rsquo;s work processes were not hindered during working hours. After the installation, the system recovered and worked well without any reconfiguration or loss of data.&nbsp;</span></p>', '<p><span  12px;"><span  Arial, sans-serif; text-align: justify;">Amr El-Sayed, Ahmed El-Hosary, Muhammad Khaled, Mohammed El-Kenany.</span></span></p>', '<p><span  12px;"><span  Arial, sans-serif; text-align: justify;">Amr El-Sayed, Ahmed El-Hosary, Muhammad Khaled, Mohammed El-Kenany.</span></span></p>', '', '', 7, 1, 0, 1, '2013-05-17 19:01:22'),
	(8, 'Telecom Egypt Data Collection', 9, 65, '', '', '', '', 'Telecom Egypt Data Collection', 'Telecom Egypt Data Collection', 'Telecom Egypt Data Collection', 'Telecom Egypt Data Collection', 'Telecom Egypt', 'Telecom Egypt', 'Data Collection', 'Data Collection', 'Telecom', 'Telecom', 'Waleed Farouk', 'Waleed Farouk', '<p>&nbsp;</p>\r\n<p>Because of unstable power supplies at the opera central sun storage disks, master records were unreadable at the storage management units, which rendered the disks invisible to the storage. They were marked as &ldquo;disabled&rdquo;, causing corruptions in the VERITAS configuration.</p>\r\n<p>Hint: the product sun storage 6020 is an obsolete product with no known support system.</p>\r\n<p>Opera site was totally dysfunctional, which prevented data collection files from being sent to the mediation and billing systems.</p>', '<p>&nbsp;</p>\r\n<p>Because of unstable power supplies at the opera central sun storage disks, master records were unreadable at the storage management units, which rendered the disks invisible to the storage. They were marked as &ldquo;disabled&rdquo;, causing corruptions in the VERITAS configuration.</p>\r\n<p>Hint: the product sun storage 6020 is an obsolete product with no known support system.</p>\r\n<p>Opera site was totally dysfunctional, which prevented data collection files from being sent to the mediation and billing systems.</p>', '<p>&nbsp;</p>\r\n<p>Fixing all the problems that occurred due to the power cutoff as listed below:</p>\r\n<p  .5in;">1.&nbsp;&nbsp;&nbsp;&nbsp; Transforming storage disks from the disabled state to the enabled and ready state.</p>\r\n<p  .5in;">2.&nbsp;&nbsp;&nbsp;&nbsp; Reassigning the LUNs to the Hosts, to be accessible once again.</p>\r\n<p  .5in;">3.&nbsp;&nbsp;&nbsp;&nbsp; Making the VERITAS Volume Manager ready for mounting to be accessible for application.</p>', '<p>&nbsp;</p>\r\n<p>Fixing all the problems that occurred due to the power cutoff as listed below:</p>\r\n<p  .5in;">1.&nbsp;&nbsp;&nbsp;&nbsp; Transforming storage disks from the disabled state to the enabled and ready state.</p>\r\n<p  .5in;">2.&nbsp;&nbsp;&nbsp;&nbsp; Reassigning the LUNs to the Hosts, to be accessible once again.</p>\r\n<p  .5in;">3.&nbsp;&nbsp;&nbsp;&nbsp; Making the VERITAS Volume Manager ready for mounting to be accessible for application.</p>', '<p>&nbsp;</p>\r\n<p>Opera site was once again working normally, with the files being transferred to mediation and billing systems successfully.</p>', '<p>&nbsp;</p>\r\n<p>Opera site was once again working normally, with the files being transferred to mediation and billing systems successfully.</p>', '<p>&nbsp;</p>\r\n<p>Amr El-Sayed, Ahmed El-Hosary, Muhammad Khaled.</p>', '<p>&nbsp;</p>\r\n<p>Amr El-Sayed, Ahmed El-Hosary, Muhammad Khaled.</p>', '', '', 8, 1, 0, 1, '2013-05-17 19:01:10'),
	(9, 'Telecom Egypt Data Center Installation', 9, 65, '', '', '', '', 'Telecom Egypt Data Center Installation', 'Telecom Egypt Data Center Installation', 'Telecom Egypt Data Center Installation', 'Telecom Egypt Data Center Installation', 'Telecom Egypt', 'Telecom Egypt', 'Telecom Egypt Data Center Installation', 'Telecom Egypt Data Center Installation', 'Telecom', 'Telecom', '', '', '<p>&nbsp;</p>\r\n<p>Telecom Egypt decided to install a new data center for newly purchased applications (including a billing system) and thus replacing the old system distributed all over the country.</p>', '<p>&nbsp;</p>\r\n<p>Telecom Egypt decided to install a new data center for newly purchased applications (including a billing system) and thus replacing the old system distributed all over the country.</p>', '<p>&nbsp;</p>\r\n<p>The following tasks were performed:</p>\r\n<p  .5in;">1.&nbsp;&nbsp;&nbsp;&nbsp; Installation of all the necessary hardware, including Racks, HP RX Servers, HP Superdomes, Storage Systems and Tape Libraries.</p>\r\n<p  .5in;">2.&nbsp;&nbsp;&nbsp;&nbsp; Deployment of the appropriate Operating System on each machine (HP-UX, RHEL and Windows.)</p>\r\n<p  .5in;">3.&nbsp;&nbsp;&nbsp;&nbsp; Configuration of Service Guard Cluster on HP-UX Operating Systems.</p>\r\n<p  .5in;">4.&nbsp;&nbsp;&nbsp;&nbsp; Installation of the network connecting servers and switches.</p>\r\n<p  .5in;">5.&nbsp;&nbsp;&nbsp;&nbsp; Configuration of a High Availability Solution on Network Cards (network teaming.)</p>\r\n<p  .5in;">6.&nbsp;&nbsp;&nbsp;&nbsp; Installation of a fiber-optic channel connection between servers and storage systems.</p>\r\n<p  .5in;">7.&nbsp;&nbsp;&nbsp;&nbsp; Configuration of a High Availability Solution on HBAs (EMC power path.)</p>\r\n<p  .5in;">8.&nbsp;&nbsp;&nbsp;&nbsp; Configuration of Symmetrix Storage System and assigning disk spaces to hosts.</p>\r\n<p  .5in;">9.&nbsp;&nbsp;&nbsp;&nbsp; Configuration of ADiC I2K and ADIC i500 tape libraries and connecting them to Backup Servers.</p>\r\n<p  .5in;">10.&nbsp; Configuration of EMC networker solution to be used in data backup.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p>The following tasks were performed:</p>\r\n<p  .5in;">1.&nbsp;&nbsp;&nbsp;&nbsp; Installation of all the necessary hardware, including Racks, HP RX Servers, HP Superdomes, Storage Systems and Tape Libraries.</p>\r\n<p  .5in;">2.&nbsp;&nbsp;&nbsp;&nbsp; Deployment of the appropriate Operating System on each machine (HP-UX, RHEL and Windows.)</p>\r\n<p  .5in;">3.&nbsp;&nbsp;&nbsp;&nbsp; Configuration of Service Guard Cluster on HP-UX Operating Systems.</p>\r\n<p  .5in;">4.&nbsp;&nbsp;&nbsp;&nbsp; Installation of the network connecting servers and switches.</p>\r\n<p  .5in;">5.&nbsp;&nbsp;&nbsp;&nbsp; Configuration of a High Availability Solution on Network Cards (network teaming.)</p>\r\n<p  .5in;">6.&nbsp;&nbsp;&nbsp;&nbsp; Installation of a fiber-optic channel connection between servers and storage systems.</p>\r\n<p  .5in;">7.&nbsp;&nbsp;&nbsp;&nbsp; Configuration of a High Availability Solution on HBAs (EMC power path.)</p>\r\n<p  .5in;">8.&nbsp;&nbsp;&nbsp;&nbsp; Configuration of Symmetrix Storage System and assigning disk spaces to hosts.</p>\r\n<p  .5in;">9.&nbsp;&nbsp;&nbsp;&nbsp; Configuration of ADiC I2K and ADIC i500 tape libraries and connecting them to Backup Servers.</p>\r\n<p  .5in;">10.&nbsp; Configuration of EMC networker solution to be used in data backup.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p>Telecom Egypt teams are now working on the application installed, with 99.99999% availability for all the installed systems.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p>Telecom Egypt teams are now working on the application installed, with 99.99999% availability for all the installed systems.&nbsp;</p>', '<p><span  12px;"><span  115%; font-family: Arial, sans-serif;">Amr EL-Sayed, Ahmed EL-Hosary, Muhammad Khaled, Mohamed El-Kenany.&nbsp;</span></span></p>', '<p><span  12px;"><span  115%; font-family: Arial, sans-serif;">Amr EL-Sayed, Ahmed EL-Hosary, Muhammad Khaled, Mohamed El-Kenany.&nbsp;</span></span></p>', '', '', 9, 1, 0, 1, '2013-05-17 19:00:46'),
	(10, 'Upgrading CX700 to CX4', 9, 0, '', '', '', '', 'Upgrading CX700 to CX4', 'Upgrading CX700 to CX4', 'Upgrading CX700 to CX4', 'Upgrading CX700 to CX4', '', '', 'Upgrading CX700 to CX4', 'Upgrading CX700 to CX4', 'Telecom', 'Telecom', 'Ahmed Abdelmoneim', 'Ahmed Abdelmoneim', '<p>&nbsp;</p>\r\n<p>EMC CLARIION CX700 is an old model of CLARIION storage systems. The client needed to increase both the speed of data transfer and the space available for storage.</p>', '<p>&nbsp;</p>\r\n<p>EMC CLARIION CX700 is an old model of CLARIION storage systems. The client needed to increase both the speed of data transfer and the space available for storage.</p>', '<p>&nbsp;</p>\r\n<p>Investigation and survey were performed on the storage systems to protect the customer&rsquo;s data using the newer procedure from EMC and the latest FLARE operating environment. This ensured the reliability and accessibility of the customer&rsquo;s data at all times.</p>', '<p>&nbsp;</p>\r\n<p>Investigation and survey were performed on the storage systems to protect the customer&rsquo;s data using the newer procedure from EMC and the latest FLARE operating environment. This ensured the reliability and accessibility of the customer&rsquo;s data at all times.</p>', '<p>&nbsp;</p>\r\n<p>The customer gained the below benefits from the previous upgrade:</p>\r\n<p  .5in;">1.&nbsp;&nbsp;&nbsp;&nbsp; Machine model of CLARIION had been upgraded to the new version (data on place).</p>\r\n<p  .5in;">2.&nbsp;&nbsp;&nbsp;&nbsp; Cost of upgrade was reduced due to the usage of old enclosure in the old CX700.</p>\r\n<p  .5in;">3.&nbsp;&nbsp;&nbsp;&nbsp; Time was saved in the upgrade and transfer of data from the old enclosure.</p>\r\n<p  .5in;">4.&nbsp;&nbsp;&nbsp;&nbsp; Any possible loss of data was completely avoided.</p>', '<p>&nbsp;</p>\r\n<p>The customer gained the below benefits from the previous upgrade:</p>\r\n<p  .5in;">1.&nbsp;&nbsp;&nbsp;&nbsp; Machine model of CLARIION had been upgraded to the new version (data on place).</p>\r\n<p  .5in;">2.&nbsp;&nbsp;&nbsp;&nbsp; Cost of upgrade was reduced due to the usage of old enclosure in the old CX700.</p>\r\n<p  .5in;">3.&nbsp;&nbsp;&nbsp;&nbsp; Time was saved in the upgrade and transfer of data from the old enclosure.</p>\r\n<p  .5in;">4.&nbsp;&nbsp;&nbsp;&nbsp; Any possible loss of data was completely avoided.</p>', '<p>&nbsp;</p>\r\n<p>Amr El-Sayed, Ahmed El-Hosary, Muhammad Khaled.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p>Amr El-Sayed, Ahmed El-Hosary, Muhammad Khaled.&nbsp;</p>', '', '', 10, 1, 0, 1, '2013-05-17 19:00:28'),
	(11, 'Kafr El Dawar Thermal Power Plant Rehabilitation Project', 14, 65, '', '', '', '', 'Kafr El Dawar Thermal Power Plant Rehabilitation Project', 'Kafr El Dawar Thermal Power Plant Rehabilitation Project', 'Kafr El Dawar Thermal Power Plant Rehabilitation Project', 'Kafr El Dawar Thermal Power Plant Rehabilitation Project', 'West Delta Electricity Production Company', 'West Delta Electricity Production Company', 'Kafr El Dawar Unit 3, 110 MW Thermal Power Plant Rehabilitation Project', 'Kafr El Dawar Unit 3, 110 MW Thermal Power Plant Rehabilitation Project', 'IA', 'IA', '', '', '<p>&nbsp;</p>\r\n<p>West Delta Electricity Production Company approached Giza Systems for a complex project involving the rehabilitation of a very old thermal power plant in Kafr El Dawar. The main challenges facing the project were the lack of site documentation and the fact that the control system to be replaced dated back to the 1970s.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p>West Delta Electricity Production Company approached Giza Systems for a complex project involving the rehabilitation of a very old thermal power plant in Kafr El Dawar. The main challenges facing the project were the lack of site documentation and the fact that the control system to be replaced dated back to the 1970s.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p>The rehabilitation of the control system in unit 3 necessitated the replacement of the control system with a state-of-the-art DCS to control theBoiler, Balance of Plant, Turbine Control Systems, Instrumentation, Burner Devices, Valves, Actuators and Field Cables.</p>', '<p>&nbsp;</p>\r\n<p>The rehabilitation of the control system in unit 3 necessitated the replacement of the control system with a state-of-the-art DCS to control theBoiler, Balance of Plant, Turbine Control Systems, Instrumentation, Burner Devices, Valves, Actuators and Field Cables.</p>', '<p>&nbsp;</p>\r\n<p>The unit was successfully rehabilitated and upgraded to fully function in sync with advanced technologies at hand, utilizing state-of-the-art DCS.</p>', '<p>&nbsp;</p>\r\n<p>The unit was successfully rehabilitated and upgraded to fully function in sync with advanced technologies at hand, utilizing state-of-the-art DCS.</p>', '', '', '', '', 11, 1, 0, 1, '2013-05-17 18:59:13'),
	(12, 'Replacement of four Burners and Burner Management System Project', 8, 65, '', '', '', '', 'Replacement of four Burners and Burner Management System Project', 'Replacement of four Burners and Burner Management System Project', 'Replacement of four Burners and Burner Management System Project', 'Replacement of four Burners and Burner Management System Project', 'El Baida Textile', 'El Baida Textile', 'Replacement of four Burners and Burner Management System Project', 'Replacement of four Burners and Burner Management System Project', 'IA', 'IA', '', '', '<p>Our client El Baida Textile awarded Giza Systems the project of the replacement of four burners and the associated burner management system at the power plant. Giza Systems was selected for its comprehensive knowledge in both the mechanical and control aspects required for the execution of this project. &nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Giza Systems&rsquo; extensive knowledge of the sequence of operations requisite for the efficient running of power plants and burner processes rendered us the most adept systems integrator for the task. In addition, our strategic choice of partners enables us to ensure that the highest quality and the most advanced solutions are infused throughout the implementation.</p>', '<p>Our client El Baida Textile awarded Giza Systems the project of the replacement of four burners and the associated burner management system at the power plant. Giza Systems was selected for its comprehensive knowledge in both the mechanical and control aspects required for the execution of this project. &nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Giza Systems&rsquo; extensive knowledge of the sequence of operations requisite for the efficient running of power plants and burner processes rendered us the most adept systems integrator for the task. In addition, our strategic choice of partners enables us to ensure that the highest quality and the most advanced solutions are infused throughout the implementation.</p>', '<p>&nbsp;</p>\r\n<p>In order to yield the desired production rate of 50 ton/hour, Giza Systems was commissioned to replace four Mazout Burners with four Natural Gas burners. The underlying tasks for the project involved a wide range of services and solutions to ensure the development and reinforcement of the power plant. The replacement of the burners entailed modifications to the control valves and instruments, as well as the set-up for a Burner Management Control System at El Baida textile power plant. For the execution of this project, our scope included:</p>\r\n<p  39.0pt;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Design</p>\r\n<p  39.0pt;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Engineering</p>\r\n<p  39.0pt;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Procurement</p>\r\n<p  39.0pt;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Installation</p>\r\n<p  39.0pt;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Testing and Commissioning</p>', '<p>&nbsp;</p>\r\n<p>In order to yield the desired production rate of 50 ton/hour, Giza Systems was commissioned to replace four Mazout Burners with four Natural Gas burners. The underlying tasks for the project involved a wide range of services and solutions to ensure the development and reinforcement of the power plant. The replacement of the burners entailed modifications to the control valves and instruments, as well as the set-up for a Burner Management Control System at El Baida textile power plant. For the execution of this project, our scope included:</p>\r\n<p  39.0pt;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Design</p>\r\n<p  39.0pt;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Engineering</p>\r\n<p  39.0pt;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Procurement</p>\r\n<p  39.0pt;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Installation</p>\r\n<p  39.0pt;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Testing and Commissioning</p>', '<p>&nbsp;</p>\r\n<p>Theburners were successfully replaced and tested to aid obtaining the desired production rate of 50 ton/hour at El Baida Textile power plant.</p>', '<p>&nbsp;</p>\r\n<p>Theburners were successfully replaced and tested to aid obtaining the desired production rate of 50 ton/hour at El Baida Textile power plant.</p>', '', '', '', '', 12, 1, 0, 1, '2013-05-17 18:58:40'),
	(13, 'Alpha Server Replacement by Virtualization', 7, 0, NULL, NULL, NULL, NULL, 'Alpha Server Replacement by Virtualization', 'Alpha Server Replacement by Virtualization', 'Alpha Server Replacement by Virtualization', 'Alpha Server Replacement by Virtualization', 'Ezz Dkekhila Steel (EZDK)', 'Ezz Dkekhila Steel (EZDK)', 'Alpha Server Replacement by Virtualization', 'Alpha Server Replacement by Virtualization', 'IA', 'IA', 'Fadel Salama', 'Fadel Salama', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	EZDK has two Alpha servers running Tru64 Unix and special applications for LAB and SMP departments. There was no concern about the applications or the Operating Systems, but the main problem came from the hardware which had become obsolete. It was becoming more difficult to get its spares and support. The hardware problems became more severe and more critical by time, because the probability of hardware failure dramatically increased as the systems became older by time. A prompt action was due to avoid the imminent risk.</p>\r\n<p>\r\n	Due to the fact that the LAB and SMP systems were not standalone servers, but they rather worked online with the other systems, and communicated using special protocols, the challenge became more difficult than it seemed.&nbsp;</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	EZDK has two Alpha servers running Tru64 Unix and special applications for LAB and SMP departments. There was no concern about the applications or the Operating Systems, but the main problem came from the hardware which had become obsolete. It was becoming more difficult to get its spares and support. The hardware problems became more severe and more critical by time, because the probability of hardware failure dramatically increased as the systems became older by time. A prompt action was due to avoid the imminent risk.</p>\r\n<p>\r\n	Due to the fact that the LAB and SMP systems were not standalone servers, but they rather worked online with the other systems, and communicated using special protocols, the challenge became more difficult than it seemed.&nbsp;</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	The proposed solution from Giza Systems was to replace the two systems with virtual machines that run on the latest hardware technology, so EZDK could still use the same applications. The solution addressed the core of the problem and eradicated it from its root. The advantages using such solution were:</p>\r\n<p>\r\n	&nbsp;1- Saving the existing investments in the applications.</p>\r\n<p>\r\n	&nbsp;2- Saving the existing investments in staff training and preserving staff expertise.</p>\r\n<p>\r\n	&nbsp;3- Minimizing down time during the replacement period compared to any alternative solution.</p>\r\n<p>\r\n	&nbsp;4- Making use of the latest technology in the hardware arena, through the following:</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp; a- Increasing availability due to redundant components and more reliable parts.</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp; b- Increasing storage capacity.</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp; c- Enhancing performance.</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp; d- Enriching features.</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp; e- Increasing expandability.</p>\r\n<p>\r\n	5- Avoiding any additional replacements or modifications of any other systems rather than SMP and LAB, rendering it the most economical and practical replacement of LAB and SMP.</p>\r\n<p>\r\n	Because of the above benefits, this solution was carefully chosen as the optimum solution and Giza Systems was the right partner to do it.</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	The proposed solution from Giza Systems was to replace the two systems with virtual machines that run on the latest hardware technology, so EZDK could still use the same applications. The solution addressed the core of the problem and eradicated it from its root. The advantages using such solution were:</p>\r\n<p>\r\n	&nbsp;1- Saving the existing investments in the applications.</p>\r\n<p>\r\n	&nbsp;2- Saving the existing investments in staff training and preserving staff expertise.</p>\r\n<p>\r\n	&nbsp;3- Minimizing down time during the replacement period compared to any alternative solution.</p>\r\n<p>\r\n	&nbsp;4- Making use of the latest technology in the hardware arena, through the following:</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp; a- Increasing availability due to redundant components and more reliable parts.</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp; b- Increasing storage capacity.</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp; c- Enhancing performance.</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp; d- Enriching features.</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp; e- Increasing expandability.</p>\r\n<p>\r\n	5- Avoiding any additional replacements or modifications of any other systems rather than SMP and LAB, rendering it the most economical and practical replacement of LAB and SMP.</p>\r\n<p>\r\n	Because of the above benefits, this solution was carefully chosen as the optimum solution and Giza Systems was the right partner to do it.</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>1-&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>Hardware replacement for two Alpha systems</strong></p>\r\n<p>\r\n	This was the main goal of the project. Two Alpha servers were replaced with two brand new HP servers running windows 2003.</p>\r\n<p>\r\n	<strong>2-&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>Software migration to the new platform</strong></p>\r\n<p>\r\n	This was a key step in the project. The software including the Operating Systems and the applications was migrated from the old Alpha servers, to the new servers.</p>\r\n<p>\r\n	<strong>3-&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>Communications with other systems</strong></p>\r\n<p>\r\n	After being migrated from the old systems to the new systems, the software was reconfigured to be able to seamlessly communicate with other systems. None of the operators and users had to change any of their operation steps.</p>\r\n<p>\r\n	<strong>4-&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>Improvements due to the new hardware</strong></p>\r\n<p>\r\n	The new solution came with many enhancements in the capacity, performance and flexibility of the operation. These enhancements were to be noticed during virtual systems startup, applications startup, as well as normal operation activities.</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>1-&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>Hardware replacement for two Alpha systems</strong></p>\r\n<p>\r\n	This was the main goal of the project. Two Alpha servers were replaced with two brand new HP servers running windows 2003.</p>\r\n<p>\r\n	<strong>2-&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>Software migration to the new platform</strong></p>\r\n<p>\r\n	This was a key step in the project. The software including the Operating Systems and the applications was migrated from the old Alpha servers, to the new servers.</p>\r\n<p>\r\n	<strong>3-&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>Communications with other systems</strong></p>\r\n<p>\r\n	After being migrated from the old systems to the new systems, the software was reconfigured to be able to seamlessly communicate with other systems. None of the operators and users had to change any of their operation steps.</p>\r\n<p>\r\n	<strong>4-&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>Improvements due to the new hardware</strong></p>\r\n<p>\r\n	The new solution came with many enhancements in the capacity, performance and flexibility of the operation. These enhancements were to be noticed during virtual systems startup, applications startup, as well as normal operation activities.</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Mohamed Saad, Amr Nasr.</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Mohamed Saad, Amr Nasr.</p>\r\n', '', '', 13, 1, 0, 1, '0000-00-00 00:00:00'),
	(14, 'µXL DCS System upgrade to Centum VP', 1, 65, '', '', '', '', 'µXL DCS System upgrade to Centum VP', 'µXL DCS System upgrade to Centum VP', 'µXL DCS System upgrade to Centum VP', 'µXL DCS System upgrade to Centum VP', 'Chevron Lubricants Egypt', 'Chevron Lubricants Egypt', 'µXL DCS System upgrade to Centum VP', 'µXL DCS System upgrade to Centum VP', 'IA', 'IA', 'Alaa Hanafy (Project Manager), Ayman Sadek (Team Leader)', 'Alaa Hanafy (Project Manager), Ayman Sadek (Team Leader)', '', '', '<p>&nbsp;</p>\r\n<p>Providing the following:</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Over all Project Management covering all PM responsibilities.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Engineering, design, documentations and configuration for the control system according to clients&rsquo; specifications,</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply of field instruments, level, temperature, pressure, and differential pressure transmitters.&nbsp;</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply of buyout materials such as systems, marshalling, and power distribution cabinets.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply of system peripherals such as computer workstations, network switches, printers, UPS, and control room furniture.</p>', '<p>&nbsp;</p>\r\n<p>Providing the following:</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Over all Project Management covering all PM responsibilities.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Engineering, design, documentations and configuration for the control system according to clients&rsquo; specifications,</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply of field instruments, level, temperature, pressure, and differential pressure transmitters.&nbsp;</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply of buyout materials such as systems, marshalling, and power distribution cabinets.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply of system peripherals such as computer workstations, network switches, printers, UPS, and control room furniture.</p>', '<p>&nbsp;</p>\r\n<p class="Default"  justify;"><span  10.0pt;">Project was under monitoring of Yokogawa USA as well as Yokogawa Bahrain; as this project is under the global agreement between Yokogawa and Chevron World Wide. Giza Systems is acting as the main focal point for this project on behalf of Yokogawa Middle East. Being a local company (based in Egypt), interface with the client was efficient in terms of documents handling (submittal, clarification discussions, and approvals) moreover the response time for any calls for meeting is being handled efficiently. We proved our capabilities in managing the project in a good manner and delivered the system and all the additional requirements in an optimum time.&nbsp;</span></p>', '<p>&nbsp;</p>\r\n<p class="Default"  justify;"><span  10.0pt;">Project was under monitoring of Yokogawa USA as well as Yokogawa Bahrain; as this project is under the global agreement between Yokogawa and Chevron World Wide. Giza Systems is acting as the main focal point for this project on behalf of Yokogawa Middle East. Being a local company (based in Egypt), interface with the client was efficient in terms of documents handling (submittal, clarification discussions, and approvals) moreover the response time for any calls for meeting is being handled efficiently. We proved our capabilities in managing the project in a good manner and delivered the system and all the additional requirements in an optimum time.&nbsp;</span></p>', '<p>&nbsp;</p>\r\n<p class="CM4"  .0001pt; text-align: justify;"><span  10.0pt; color: black;">Dina Yousif, Mohamed Adel.</span></p>', '<p>&nbsp;</p>\r\n<p class="CM4"  .0001pt; text-align: justify;"><span  10.0pt; color: black;">Dina Yousif, Mohamed Adel.</span></p>', '', '', 14, 1, 0, 1, '2013-05-17 18:58:03'),
	(15, 'Basement Processing Unit (BPU) Phase I Project', 4, 246, '', '', '', '', 'Basement Processing Unit (BPU) Phase I Project', 'Basement Processing Unit (BPU) Phase I Project', 'Basement Processing Unit (BPU) Phase I Project', 'Basement Processing Unit (BPU) Phase I Project', 'Enppi / Total Exploration and Petroleum Yemen (TEPY)', 'Enppi / Total Exploration and Petroleum Yemen (TEPY)', 'Basement Processing Unit (BPU) Phase I Project', 'Basement Processing Unit (BPU) Phase I Project', 'IA', 'IA', 'Alaa Hanafy (Project Manager), Waleed Abdel Alim Mohamed (Team Leader)', 'Alaa Hanafy (Project Manager), Waleed Abdel Alim Mohamed (Team Leader)', '', '', '<p>&nbsp;</p>\r\n<p>Providing the following:</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Over all Project Management covering all PM responsibilities.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Engineering, design, documentations and configuration for the control, shutdown, and fire and gas systems according to clients&rsquo; specifications,</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply of buyout materials such as systems, marshalling, and power distribution cabinets.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply of system peripherals such as computer workstations, network switches, optical fiber components, printers, and control room furniture.</p>', '<p>&nbsp;</p>\r\n<p>Providing the following:</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Over all Project Management covering all PM responsibilities.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Engineering, design, documentations and configuration for the control, shutdown, and fire and gas systems according to clients&rsquo; specifications,</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply of buyout materials such as systems, marshalling, and power distribution cabinets.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Supply of system peripherals such as computer workstations, network switches, optical fiber components, printers, and control room furniture.</p>', '<p>&nbsp;</p>\r\n<p class="Default"><span  10.0pt;">Giza Systems is acting as the main focal point for this project on behalf of Yokogawa Middle East. Being a local company (based in Egypt), interface with the client (Enppi) is efficient in terms of documents handling (submittal, clarification discussions, and approvals) moreover the response time for any calls for meeting is being handled efficiently. We proved our capabilities in managing the project in a good manner and delivered the systems and all the additional requirements in an optimum time (change orders received while doing the Factory Acceptance Test).&nbsp;</span></p>', '<p>&nbsp;</p>\r\n<p class="Default"><span  10.0pt;">Giza Systems is acting as the main focal point for this project on behalf of Yokogawa Middle East. Being a local company (based in Egypt), interface with the client (Enppi) is efficient in terms of documents handling (submittal, clarification discussions, and approvals) moreover the response time for any calls for meeting is being handled efficiently. We proved our capabilities in managing the project in a good manner and delivered the systems and all the additional requirements in an optimum time (change orders received while doing the Factory Acceptance Test).&nbsp;</span></p>', '<p><span  arial;"><span  10pt; line-height: 115%;">Dina Yousif, Khaled Mostafa, Mahmoud Shalaby.</span></span></p>', '<p><span  arial;"><span  10pt; line-height: 115%;">Dina Yousif, Khaled Mostafa, Mahmoud Shalaby.</span></span></p>', '', '', 15, 1, 0, 1, '2013-05-17 18:55:59'),
	(16, 'Operation and Support for (Number Portability Clearing House)', 3, 193, '', '', '', '', 'Operation and Support for (Number Portability Clearing House)', 'Operation and Support for (Number Portability Clearing House)', 'Operation and Support for (Number Portability Clearing House)', 'Operation and Support for (Number Portability Clearing House)', 'Communication and Information Technology Commission (CITC)', 'Communication and Information Technology Commission (CITC)', 'Operation and Support for (Number Portability Clearing House)', 'Operation and Support for (Number Portability Clearing House)', 'Telecom', 'Telecom', 'Ahmed Fouad', 'Ahmed Fouad', '<p>&nbsp;</p>\r\n<p class="CM3"  .0001pt; text-align: justify;"><span  10.0pt;">CITC is the telecommunication regulatory authority in Saudi Arabia. Their rules to qualify for a license as a GSM Network Operator contain complying with Number portability. CITC needs to control this operation and maintain the necessary audit of transactions among the operators.&nbsp;</span></p>', '<p>&nbsp;</p>\r\n<p class="CM3"  .0001pt; text-align: justify;"><span  10.0pt;">CITC is the telecommunication regulatory authority in Saudi Arabia. Their rules to qualify for a license as a GSM Network Operator contain complying with Number portability. CITC needs to control this operation and maintain the necessary audit of transactions among the operators.&nbsp;</span></p>', '<p>&nbsp;</p>\r\n<p class="CM4"  .0001pt; text-align: justify;"><span  10.0pt;">Giza Systems is providing the implementation and support services for the number portability clearinghouse. The systems from Telcordia (The worldwide leader in the OSS for Telecom industry) provide the solutions for this case and have been selected by Giza Systems and approved by CITC.</span></p>', '<p>&nbsp;</p>\r\n<p class="CM4"  .0001pt; text-align: justify;"><span  10.0pt;">Giza Systems is providing the implementation and support services for the number portability clearinghouse. The systems from Telcordia (The worldwide leader in the OSS for Telecom industry) provide the solutions for this case and have been selected by Giza Systems and approved by CITC.</span></p>', '<p>&nbsp;</p>\r\n<p class="Default"><span  10.0pt;">Giza Systems\' technical team was able to finalize the project successfully and now CITC is capable to monitor and audit the number portability transactions within Saudi Arabia. The quality of service and commitments that Giza Systems shows convinced CITC to be fully dependent on our technical team to even operate and give the future support of this project.&nbsp;</span></p>', '<p>&nbsp;</p>\r\n<p class="Default"><span  10.0pt;">Giza Systems\' technical team was able to finalize the project successfully and now CITC is capable to monitor and audit the number portability transactions within Saudi Arabia. The quality of service and commitments that Giza Systems shows convinced CITC to be fully dependent on our technical team to even operate and give the future support of this project.&nbsp;</span></p>', '<p>&nbsp;</p>\r\n<p>Ahmed Fouad, PMP, Ragheb Aggag,&nbsp;Khaled Mohamed,&nbsp;Mahmoud El Deeb.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p>Ahmed Fouad, PMP, Ragheb Aggag,&nbsp;Khaled Mohamed,&nbsp;Mahmoud El Deeb.&nbsp;</p>', '', '', 16, 1, 0, 1, '2013-05-17 18:55:20'),
	(17, 'Flow Control of Gas Consumers', 13, 115, NULL, NULL, NULL, NULL, 'Flow Control of Gas Consumers', 'Flow Control of Gas Consumers', 'Flow Control of Gas Consumers', 'Flow Control of Gas Consumers', 'FAJR Gas Company', 'FAJR Gas Company', 'Flow Control of Gas Consumers', 'Flow Control of Gas Consumers', 'IA', 'IA', 'Amr Fathi', 'Amr Fathi', '<p>\r\n	FAJR decided to go for implementing flow control modules for the current gas consumers on the installed SCADA System to monitor and control the hourly gas flow rate for each Gas consumer. &nbsp;</p>\r\n', '<p>\r\n	FAJR decided to go for implementing flow control modules for the current gas consumers on the installed SCADA System to monitor and control the hourly gas flow rate for each Gas consumer. &nbsp;</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Our approach was to integrate the gas metering stations (installed @ each gas consumer) to the existing SCADA system by supplying the followings:</p>\r\n<p style="margin-left:.75in;">\r\n	&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SCADA software licenses</p>\r\n<p style="margin-left:.75in;">\r\n	&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Remote terminal units</p>\r\n<p style="margin-left:.75in;">\r\n	&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fiber Transmission equipments (SDHs &amp; transceivers)</p>\r\n<p style="margin-left:.75in;">\r\n	&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Power units (UPSs &amp; Battery chargers)</p>\r\n<p style="margin-left:.75in;">\r\n	&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Leak detection system licenses</p>\r\n<p style="margin-left:.75in;">\r\n	&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; System fabrication, FAT&amp; SAT</p>\r\n<p style="margin-left:.75in;">\r\n	&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Implementation, training and support&nbsp;</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Our approach was to integrate the gas metering stations (installed @ each gas consumer) to the existing SCADA system by supplying the followings:</p>\r\n<p style="margin-left:.75in;">\r\n	&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SCADA software licenses</p>\r\n<p style="margin-left:.75in;">\r\n	&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Remote terminal units</p>\r\n<p style="margin-left:.75in;">\r\n	&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fiber Transmission equipments (SDHs &amp; transceivers)</p>\r\n<p style="margin-left:.75in;">\r\n	&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Power units (UPSs &amp; Battery chargers)</p>\r\n<p style="margin-left:.75in;">\r\n	&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Leak detection system licenses</p>\r\n<p style="margin-left:.75in;">\r\n	&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; System fabrication, FAT&amp; SAT</p>\r\n<p style="margin-left:.75in;">\r\n	&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Implementation, training and support&nbsp;</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p style="margin-left:.75in;">\r\n	&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Integration of gas consumers to SCADA system</p>\r\n<p style="margin-left:.75in;">\r\n	&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Monitor and control the hourly gas flow rate for each Gas Consumer.</p>\r\n<p style="margin-left:.75in;">\r\n	&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Gas Leak detection</p>\r\n<p style="margin-left:.75in;">\r\n	&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Reduces the risk of loss of sensitive data by consolidating multiple permissions and security models into a single structure.&nbsp;</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p style="margin-left:.75in;">\r\n	&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Integration of gas consumers to SCADA system</p>\r\n<p style="margin-left:.75in;">\r\n	&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Monitor and control the hourly gas flow rate for each Gas Consumer.</p>\r\n<p style="margin-left:.75in;">\r\n	&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Gas Leak detection</p>\r\n<p style="margin-left:.75in;">\r\n	&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Reduces the risk of loss of sensitive data by consolidating multiple permissions and security models into a single structure.&nbsp;</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Mohamed Abdallah,&nbsp;Ayman Metwally,&nbsp;Ammar Yasser,&nbsp;Eyad Abdel Alim.&nbsp;</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Mohamed Abdallah,&nbsp;Ayman Metwally,&nbsp;Ammar Yasser,&nbsp;Eyad Abdel Alim.&nbsp;</p>\r\n', '', '', 17, 1, 0, 1, '0000-00-00 00:00:00'),
	(18, 'Oracle Enterprise Resource Planning (ERP) Implementation, Training and Support', 12, 193, '', '', '', '', 'Oracle Enterprise Resource Planning (ERP) Implementation, Training and Support', 'Oracle Enterprise Resource Planning (ERP) Implementation, Training and Support', 'Oracle Enterprise Resource Planning (ERP) Implementation, Training and Support', 'Oracle Enterprise Resource Planning (ERP) Implementation, Training and Support', 'Etihad Etisalat Company (Mobily)', 'Etihad Etisalat Company (Mobily)', 'Oracle Enterprise Resource Planning (ERP) Implementation, Training and Support', 'Oracle Enterprise Resource Planning (ERP) Implementation, Training and Support', 'Telecom', 'Telecom', 'Ahmed Fouad', 'Ahmed Fouad', '<p>&nbsp;</p>\r\n<p>Mobily &nbsp;was decided to go for implementing Oracle e-business Suite for its recent acquired Bayanat Al-Oula (A Saudi Telecommunication Operator providing data services and a trademark of Samsung Wi-Max for its new services) as part of automating all of its business processes.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p>Mobily &nbsp;was decided to go for implementing Oracle e-business Suite for its recent acquired Bayanat Al-Oula (A Saudi Telecommunication Operator providing data services and a trademark of Samsung Wi-Max for its new services) as part of automating all of its business processes.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p>Our approach was built on PMI methodology in project management to deliver the following:</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Oracle ERP software licenses (Financial Intelligence, Inventory Management, Purchasing, Project Costing, Financial, Human Resources and Payroll)</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Implementation, training and support of GL, AP, AR, CM and FA</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Implementation, training and support of Logistics modules.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p>Our approach was built on PMI methodology in project management to deliver the following:</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Oracle ERP software licenses (Financial Intelligence, Inventory Management, Purchasing, Project Costing, Financial, Human Resources and Payroll)</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Implementation, training and support of GL, AP, AR, CM and FA</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Implementation, training and support of Logistics modules.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Integration among different functional areas to ensure proper communication, productivity and efficiency</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Order tracking, from acceptance through fulfillment</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Managing inter-dependencies of complex processes bill of materials&nbsp;</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Permits control of business processes that cross functional boundaries</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Shorten production leadtime and delivery time</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Reduces the risk of loss of sensitive data by consolidating multiple permissions and security models into a single structure.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Integration among different functional areas to ensure proper communication, productivity and efficiency</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Order tracking, from acceptance through fulfillment</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Managing inter-dependencies of complex processes bill of materials&nbsp;</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Permits control of business processes that cross functional boundaries</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Shorten production leadtime and delivery time</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Reduces the risk of loss of sensitive data by consolidating multiple permissions and security models into a single structure.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p>Mahmoud Ragab,&nbsp;Mohamed Shawky,&nbsp;Nader Sief,&nbsp;Tamer Ezzat.</p>', '<p>&nbsp;</p>\r\n<p>Mahmoud Ragab,&nbsp;Mohamed Shawky,&nbsp;Nader Sief,&nbsp;Tamer Ezzat.</p>', '', '', 18, 1, 0, 1, '2013-05-17 18:54:50'),
	(19, 'Wadi Al Dawaser Water Treatment Plant SCADA System Extension', 0, 193, '', '', '', '', 'Wadi Al Dawaser Water Treatment Plant SCADA System Extension', 'Wadi Al Dawaser Water Treatment Plant SCADA System Extension', 'Wadi Al Dawaser Water Treatment Plant SCADA System Extension', 'Wadi Al Dawaser Water Treatment Plant SCADA System Extension', 'Ministry of Water and Electricity', 'Ministry of Water and Electricity', 'Wadi Al Dawaser Water Treatment Plant SCADA System Extension', 'Wadi Al Dawaser Water Treatment Plant SCADA System Extension', 'IA', 'IA', 'Mohamed Abdallah', 'Mohamed Abdallah', '<p>&nbsp;</p>\r\n<p>Ministry of Water and Electricity decided to integrate the electrical sub-stations and generators with the installed SCADA System to monitor and control the electrical network in Area of Wadi Al-Dawaser.</p>', '<p>&nbsp;</p>\r\n<p>Ministry of Water and Electricity decided to integrate the electrical sub-stations and generators with the installed SCADA System to monitor and control the electrical network in Area of Wadi Al-Dawaser.</p>', '<p>&nbsp;</p>\r\n<p  .75in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SCADA software licenses</p>\r\n<p  .75in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Remote terminal units</p>\r\n<p  .75in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fiber Transmission equipments (switches &amp; transceivers)</p>\r\n<p  .75in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Power units (UPSs &amp; Battery chargers)</p>\r\n<p  .75in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; System fabrication, FAT&amp; SAT</p>\r\n<p  .75in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Implementation, training and support.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p  .75in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SCADA software licenses</p>\r\n<p  .75in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Remote terminal units</p>\r\n<p  .75in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fiber Transmission equipments (switches &amp; transceivers)</p>\r\n<p  .75in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Power units (UPSs &amp; Battery chargers)</p>\r\n<p  .75in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; System fabrication, FAT&amp; SAT</p>\r\n<p  .75in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Implementation, training and support.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p  .75in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Integration of electrical network to SCADA system</p>\r\n<p  .75in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Monitor and control the electrical network from WTP SCADA &nbsp;</p>\r\n<p  .75in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Reduces the risk of loss of sensitive data by consolidating multiple permissions and security models into a single structure.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p  .75in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Integration of electrical network to SCADA system</p>\r\n<p  .75in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Monitor and control the electrical network from WTP SCADA &nbsp;</p>\r\n<p  .75in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Reduces the risk of loss of sensitive data by consolidating multiple permissions and security models into a single structure.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p>Ahmed Yousef,&nbsp;Amr-El-Taweel.</p>', '<p>&nbsp;</p>\r\n<p>Ahmed Yousef,&nbsp;Amr-El-Taweel.</p>', '', '', 19, 1, 0, 1, '2013-05-17 18:53:21'),
	(20, 'GPRS Link Monitoring', 5, 193, '', '', '', '', 'GPRS Link Monitoring', 'GPRS Link Monitoring', 'GPRS Link Monitoring', 'GPRS Link Monitoring', 'Saudi Telecom Company (STC)', 'Saudi Telecom Company (STC)', 'GPRS Link Monitoring', 'GPRS Link Monitoring', 'Telecom', 'Telecom', 'Ahmed Fouad', 'Ahmed Fouad', '<p>&nbsp;</p>\r\n<p>STC as the largest GSM Operator in The KSA had the need to monitor the performance and measure the quality of service for the GPRS services as one of the important services that STC as a GSM operator delivers to its customers to expand the services and applications to cover 3G capabilities.</p>', '<p>&nbsp;</p>\r\n<p>STC as the largest GSM Operator in The KSA had the need to monitor the performance and measure the quality of service for the GPRS services as one of the important services that STC as a GSM operator delivers to its customers to expand the services and applications to cover 3G capabilities.</p>', '<p>&nbsp;</p>\r\n<p>Giza Systems approached the customer&rsquo;s need along with reputable partners like Agilent, the world leader in signal monitoring to provide the solution and full project scope resulting in full monitoring for the services using Agilent&rsquo;s GPRS monitoring solution along with Giza Systems&rsquo; highly qualified team and using PMI methodologies. The project team implemented the solution and made sure that all the customer&rsquo;s needs were met.</p>', '<p>&nbsp;</p>\r\n<p>Giza Systems approached the customer&rsquo;s need along with reputable partners like Agilent, the world leader in signal monitoring to provide the solution and full project scope resulting in full monitoring for the services using Agilent&rsquo;s GPRS monitoring solution along with Giza Systems&rsquo; highly qualified team and using PMI methodologies. The project team implemented the solution and made sure that all the customer&rsquo;s needs were met.</p>', '<p>&nbsp;</p>\r\n<p>STC is now monitoring the service over all the links making sure of their quality of service, and troubleshooting any threat to their business insuring business continuity and their customer satisfaction, our success story didn&rsquo;t end upon successfully implementing the solution, Giza Systems still support STC who is now &nbsp;looking forward to upgrade the system after the success it saw in order to cover any future links as well as accommodate the dramatic increase of the number of subscribers and daily transactions which insures the customer&rsquo;s satisfaction on STC&rsquo;s quality of services.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p>STC is now monitoring the service over all the links making sure of their quality of service, and troubleshooting any threat to their business insuring business continuity and their customer satisfaction, our success story didn&rsquo;t end upon successfully implementing the solution, Giza Systems still support STC who is now &nbsp;looking forward to upgrade the system after the success it saw in order to cover any future links as well as accommodate the dramatic increase of the number of subscribers and daily transactions which insures the customer&rsquo;s satisfaction on STC&rsquo;s quality of services.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p>Ahmed Fouad,&nbsp;Sherif El Shamy,&nbsp;Haytham Badr,&nbsp;Mohamed Zaitoun,&nbsp;Yehya Zakaria,&nbsp;Walid Atef.</p>', '<p>&nbsp;</p>\r\n<p>Ahmed Fouad,&nbsp;Sherif El Shamy,&nbsp;Haytham Badr,&nbsp;Mohamed Zaitoun,&nbsp;Yehya Zakaria,&nbsp;Walid Atef.</p>', '', '', 20, 1, 0, 1, '2013-05-17 18:52:49'),
	(21, 'Product Lifecycle Management (PLM) Pilot Project', 5, 193, '', '', '', '', 'Product Lifecycle Management (PLM) Pilot Project', 'Product Lifecycle Management (PLM) Pilot Project', 'Product Lifecycle Management (PLM) Pilot Project', 'Product Lifecycle Management (PLM) Pilot Project', 'Saudi Telecom Company (STC)', 'Saudi Telecom Company (STC)', 'Product Lifecycle Management (PLM) Pilot Project', 'Product Lifecycle Management (PLM) Pilot Project', 'Telecom', 'Telecom', 'Ahmed Fouad', 'Ahmed Fouad', '<p>&nbsp;</p>\r\n<p>STC as the largest Operator in The KSA was facing a lot of challenges that wasted time and money, like:</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Communication issues in designing, developing and launching products.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Information silosthat complicate the products lifecycle.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Redundancies and duplicationsin services that form products.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Time To marketgreatly increasing which decreases the competitive edge of the organization.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cuttingcosts of products was mandatory for business continuity.</p>', '<p>&nbsp;</p>\r\n<p>STC as the largest Operator in The KSA was facing a lot of challenges that wasted time and money, like:</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Communication issues in designing, developing and launching products.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Information silosthat complicate the products lifecycle.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Redundancies and duplicationsin services that form products.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Time To marketgreatly increasing which decreases the competitive edge of the organization.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cuttingcosts of products was mandatory for business continuity.</p>', '<p>&nbsp;</p>\r\n<p>We at Giza Systems understood STC&rsquo;s challenges and knew that they need a solution that can:</p>\r\n<p>&nbsp;</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Realizethat clearly defining the product is the first requirement for effective and automated lifecycle management.&nbsp;</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Specifya new product.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Modelits performance profile.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Understand and executethe product introduction process.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Managehow and when products are to be retired or withdrawn.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Doall this at the same time as managing customer satisfaction.</p>\r\n<p>Giza Systems found all these requirements within the portfolio of our partner Tribold so we presented the PLM solution.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Giza Systems&nbsp;conducted a pilot project on an STC product &ldquo;Jood Plus&rdquo; which bundles the services of fixed line and ADSL and successfully integrated the solution with various systems like billing, CRM, network inventory and provisioning system over STC&rsquo;s integration bus.</p>', '<p>&nbsp;</p>\r\n<p>We at Giza Systems understood STC&rsquo;s challenges and knew that they need a solution that can:</p>\r\n<p>&nbsp;</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Realizethat clearly defining the product is the first requirement for effective and automated lifecycle management.&nbsp;</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Specifya new product.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Modelits performance profile.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Understand and executethe product introduction process.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Managehow and when products are to be retired or withdrawn.</p>\r\n<p  .5in;">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Doall this at the same time as managing customer satisfaction.</p>\r\n<p>Giza Systems found all these requirements within the portfolio of our partner Tribold so we presented the PLM solution.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Giza Systems&nbsp;conducted a pilot project on an STC product &ldquo;Jood Plus&rdquo; which bundles the services of fixed line and ADSL and successfully integrated the solution with various systems like billing, CRM, network inventory and provisioning system over STC&rsquo;s integration bus.</p>', '<p>&nbsp;</p>\r\n<p>STC&nbsp;realized how much complicated the current product management is and how far can Giza Systems enhance STC&lsquo;s operations with Tribold&rsquo;s PLM.</p>', '<p>&nbsp;</p>\r\n<p>STC&nbsp;realized how much complicated the current product management is and how far can Giza Systems enhance STC&lsquo;s operations with Tribold&rsquo;s PLM.</p>', '<p><span  #ffffff;"><span  #4a4a4a; font-family: Arial; font-size: 13px; text-align: left;">Ahmed Fouad,&nbsp;Sherif El Shamy,&nbsp;Haytham Badr,&nbsp;Mohamed Zaitoun,&nbsp;Yehya Zakaria,&nbsp;Walid Atef.</span> </span></p>', '<p><span  #ffffff;"><span  #4a4a4a; font-family: Arial; font-size: 13px; text-align: left;">Ahmed Fouad,&nbsp;Sherif El Shamy,&nbsp;Haytham Badr,&nbsp;Mohamed Zaitoun,&nbsp;Yehya Zakaria,&nbsp;Walid Atef.</span> </span></p>', '', '', 21, 1, 0, 1, '2013-05-17 18:52:25'),
	(22, 'Zain NPG (Number Portability Gateway)', 2, 193, '', '', '', '', 'Zain NPG (Number Portability Gateway)', 'Zain NPG (Number Portability Gateway)', 'Zain NPG (Number Portability Gateway)', 'Zain NPG (Number Portability Gateway)', 'Zain', 'Zain', 'Zain NPG (Number Portability Gateway)', 'Zain NPG (Number Portability Gateway)', 'Telecom', 'Telecom', 'Ahmed Fouad', 'Ahmed Fouad', '<p>&nbsp;</p>\r\n<p class="CM3"  .0001pt; text-align: justify;">Telecom National regulators apply a restrictive rule to the various network operators to comply with the number portability, which is a very sensitive feature especially that is touch the interoperability among the operators. The system implementer should be highly qualified to be accepted.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p class="CM3"  .0001pt; text-align: justify;">Telecom National regulators apply a restrictive rule to the various network operators to comply with the number portability, which is a very sensitive feature especially that is touch the interoperability among the operators. The system implementer should be highly qualified to be accepted.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p class="CM4"  .0001pt; text-align: justify;">Very few systems integrators are capable to provide this service. Giza System is a premier in the market to serve this niche projects. With Telcordia (worldwide leader in Telecom OSS solutions), we were capable to successfully finalize the project and enable Zain to comply with the regulator requirement. All Software and Hardware provided and implemented and Giza Systems provide the operation and support for subsequent three years.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p class="CM4"  .0001pt; text-align: justify;">Very few systems integrators are capable to provide this service. Giza System is a premier in the market to serve this niche projects. With Telcordia (worldwide leader in Telecom OSS solutions), we were capable to successfully finalize the project and enable Zain to comply with the regulator requirement. All Software and Hardware provided and implemented and Giza Systems provide the operation and support for subsequent three years.&nbsp;</p>', '<p>&nbsp;</p>\r\n<p class="Default"><span  10.0pt;">ZAIN Saudi is now complied the regulator conditions and terms and our team is providing the operation and support for three years which reflects the confident and trust ZAIN consider with Giza Systems.&nbsp;</span></p>', '<p>&nbsp;</p>\r\n<p class="Default"><span  10.0pt;">ZAIN Saudi is now complied the regulator conditions and terms and our team is providing the operation and support for three years which reflects the confident and trust ZAIN consider with Giza Systems.&nbsp;</span></p>', '<p>Mahmoud Yousry,&nbsp;Haytham El-Shoul.&nbsp;</p>', '<p>Mahmoud Yousry,&nbsp;Haytham El-Shoul.&nbsp;</p>', '', '', 22, 1, 0, 1, '2013-05-17 18:52:09'),
	(23, 'test 1', 39, 247, '/added/uploads/banner/casestudy/1368804910_thumb.jpg', '/added/uploads/banner/casestudy/1368804910.jpg', '/added/uploads/banner/casestudy/1368804910_thumb.jpg', '/added/uploads/banner/casestudy/1368804910.jpg', 'test', 'test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 23, 1, 1, 1, '2013-05-17 18:50:33'),
	(24, 'xdasdasd', 34, 232, '', '', '', '', 'sasasas', 'sasasas', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 24, 1, 1, 1, '2013-05-17 18:50:33');
/*!40000 ALTER TABLE `case_study` ENABLE KEYS */;


-- Dumping structure for table giza.case_study_industries
CREATE TABLE IF NOT EXISTS `case_study_industries` (
  `case_study_id` int(10) DEFAULT NULL,
  `industry_id` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table giza.case_study_industries: 26 rows
/*!40000 ALTER TABLE `case_study_industries` DISABLE KEYS */;
INSERT INTO `case_study_industries` (`case_study_id`, `industry_id`) VALUES
	(23, 4),
	(23, 6),
	(23, 7),
	(24, 3),
	(24, 2),
	(22, 8),
	(21, 8),
	(20, 8),
	(19, 2),
	(18, 7),
	(16, 8),
	(15, 7),
	(14, 7),
	(12, 2),
	(11, 2),
	(10, 8),
	(9, 8),
	(8, 8),
	(7, 8),
	(5, 2),
	(3, 2),
	(6, 2),
	(4, 7),
	(4, 6),
	(4, 4),
	(4, 2);
/*!40000 ALTER TABLE `case_study_industries` ENABLE KEYS */;


-- Dumping structure for table giza.case_study_solutions
CREATE TABLE IF NOT EXISTS `case_study_solutions` (
  `case_study_id` int(10) DEFAULT NULL,
  `solution_id` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table giza.case_study_solutions: 16 rows
/*!40000 ALTER TABLE `case_study_solutions` DISABLE KEYS */;
INSERT INTO `case_study_solutions` (`case_study_id`, `solution_id`) VALUES
	(23, 8),
	(23, 9),
	(24, 7),
	(19, 7),
	(18, 12),
	(15, 12),
	(14, 12),
	(12, 7),
	(11, 7),
	(5, 7),
	(3, 7),
	(6, 7),
	(4, 12),
	(4, 8),
	(4, 7),
	(4, 6);
/*!40000 ALTER TABLE `case_study_solutions` ENABLE KEYS */;


-- Dumping structure for table giza.ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table giza.ci_sessions: 5 rows
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
	('bab59ef7a592afce2f621147fa443e9e', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:43.0) Gecko/20100101 Firefox/43.0', 1450719639, 'a:2:{s:9:"user_data";s:0:"";s:12:"user_session";O:8:"stdClass":13:{s:2:"id";s:1:"1";s:8:"username";s:5:"admin";s:8:"password";s:5:"admin";s:4:"name";s:12:"Gouda Elalfy";s:6:"mobile";s:11:"01119793075";s:9:"telephone";s:11:"23232323232";s:5:"email";s:17:"gouda@4jawaly.com";s:7:"address";s:28:"Marsafa -- Banaha -- Kaiobia";s:13:"user_group_id";s:1:"1";s:5:"admin";s:1:"1";s:7:"deleted";s:1:"0";s:12:"last_user_id";s:1:"1";s:16:"last_modify_date";s:19:"2013-03-02 08:48:24";}}'),
	('4b8bd9a69fd987a51b1810c130c3be44', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:30.0) Gecko/20100101 Firefox/30.0', 1410600761, ''),
	('86918eaa4cc29366824a3b6f23dd3493', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:30.0) Gecko/20100101 Firefox/30.0', 1410600761, ''),
	('5a4666e2d00bde4e66d30927809991af', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:30.0) Gecko/20100101 Firefox/30.0', 1410600761, 'a:2:{s:9:"user_data";s:0:"";s:12:"user_session";O:8:"stdClass":13:{s:2:"id";s:1:"1";s:8:"username";s:5:"admin";s:8:"password";s:5:"admin";s:4:"name";s:12:"Gouda Elalfy";s:6:"mobile";s:11:"01119793075";s:9:"telephone";s:11:"23232323232";s:5:"email";s:17:"gouda@4jawaly.com";s:7:"address";s:28:"Marsafa -- Banaha -- Kaiobia";s:13:"user_group_id";s:1:"1";s:5:"admin";s:1:"1";s:7:"deleted";s:1:"0";s:12:"last_user_id";s:1:"1";s:16:"last_modify_date";s:19:"2013-03-02 08:48:24";}}'),
	('84b076f17c38c89071a3ef774af0c2a0', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:35.0) Gecko/20100101 Firefox/35.0', 1428216872, 'a:2:{s:9:"user_data";s:0:"";s:12:"user_session";O:8:"stdClass":13:{s:2:"id";s:1:"1";s:8:"username";s:5:"admin";s:8:"password";s:5:"admin";s:4:"name";s:12:"Gouda Elalfy";s:6:"mobile";s:11:"01119793075";s:9:"telephone";s:11:"23232323232";s:5:"email";s:17:"gouda@4jawaly.com";s:7:"address";s:28:"Marsafa -- Banaha -- Kaiobia";s:13:"user_group_id";s:1:"1";s:5:"admin";s:1:"1";s:7:"deleted";s:1:"0";s:12:"last_user_id";s:1:"1";s:16:"last_modify_date";s:19:"2013-03-02 08:48:24";}}');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;


-- Dumping structure for table giza.client
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `brief` tinytext,
  `project_name` varchar(255) DEFAULT NULL,
  `project_contract_value` varchar(255) DEFAULT NULL,
  `project_duration` varchar(255) DEFAULT NULL,
  `testimony` text,
  `feedback` text,
  `logo` varchar(255) DEFAULT NULL,
  `contact_title` varchar(255) DEFAULT NULL,
  `contact_firstname` varchar(255) DEFAULT NULL,
  `contact_lastname` varchar(255) DEFAULT NULL,
  `contact_position` varchar(255) DEFAULT NULL,
  `contact_mobile` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `interests` varchar(500) DEFAULT NULL,
  `registeration_datetime` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `active_code` varchar(50) NOT NULL DEFAULT '0',
  `approved` tinyint(4) NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `last_user_id` int(11) NOT NULL,
  `last_modify_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.client: ~44 rows (approximately)
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` (`id`, `name`, `username`, `password`, `website`, `address`, `phone`, `brief`, `project_name`, `project_contract_value`, `project_duration`, `testimony`, `feedback`, `logo`, `contact_title`, `contact_firstname`, `contact_lastname`, `contact_position`, `contact_mobile`, `contact_email`, `interests`, `registeration_datetime`, `active`, `active_code`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'Chevron Lubricants Egypt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(2, 'Zain', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(3, 'Communication and Information Technology Commission (CITC)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(4, 'Enppi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(5, 'Saudi Telecom Company (STC)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(6, 'Total Exploration and Petroleum Yemen (TEPY)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(7, 'Ezz DKekhila Steel (EZDK)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(8, 'El Baida Textile', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(9, 'Telecom Egypt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(11, 'Great Cairo Drinking Water Co.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(12, 'Etihad Etisalat Company (Mobily)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(13, 'FAJR Gas Company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(14, 'West Delta Electricity Production Company', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(15, 'Al-Hassa Irrigation and Drainage Authority', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(16, 'Construction Authority of Water & Wastewater Projects (CAWWP)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(17, 'Egyptian Electricity Holding Company (EEHC)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(20, 'Evergrow Fertilizers', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(21, 'NARSS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(22, 'Gupco', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(23, 'El-Nasr Fertilizers Co.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(25, 'Holding Co. for Water & Waste Water', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(26, 'Alstom Grid for Electrical Networks', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(27, 'Signal Dept.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(28, 'Misr Spinning & Weaving-Kafr El Dawar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(29, 'West Delta Electrical Co.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(30, 'Abu Zaabal Fertilizers', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(32, 'Qatar Telecom (Qtel)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(33, 'DU NPG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(34, 'Kharafi National', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(35, 'Reinforced Concrete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(36, 'Petrojet', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(37, 'Convergys EMEA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(39, 'TCI Sanmar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(40, 'MSAD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(41, 'Pharaoh Comm. Networks', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(42, 'ANRPC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(43, 'EETC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(44, 'Aricent Technologies', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(45, 'Nawras', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(46, 'NTRA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', 1, 0, 1, '2013-04-11 11:14:31'),
	(47, 'Ministry of Water and Electricity', 'admin', '11111', '', '', '', '', '', '', '', '', '', '/added/uploads/logo/client/1365673072_logo.jpg', '', '', '', '', '', '', '', '2013-04-11 11:37:52', 1, 'admin', 1, 0, 1, '2013-04-11 11:37:52'),
	(48, '534', '5341uX', '72beNsf', '', '345', '345345345', '534', '4534534', '', '', '', '', '/added/uploads/logo/client/1365676546_logo.jpg', '4534534', '543534', '5345', '345345', '4534534', 'gouda@4jawaly.com', 'New Projects / Awards,Giza Systems Publications', '2013-04-11 12:39:19', 1, 'bjFxwg9c5UlpAtD', 0, 0, 1, '2013-04-11 12:38:06'),
	(49, 'c1', 'c1', 'c1', '', 'address', '42342343434', 'fgdgdfg', 'fdfgdfgdf', '', '', '', '', '/added/uploads/logo/client/1365677644_logo.jpg', 'fdfd', 'fdff', 'dfdf', 'df', '32423', 'goudaelalfy@hotmail.com', 'New Projects / Awards,Receive corporate newsletter,CSR projects', '2013-04-11 12:54:04', 1, 'b6nLz7FO5Bp31YD', 0, 0, 0, '0000-00-00 00:00:00'),
	(50, 'ffewfw', 'ffewfwgsv', 'bvfsVxW', '', 'rwe', '24234234', '4234234', '234234234', '', '', '', '', '/added/uploads/logo/client/1365677845_logo.jpg', 'ewr', 'werwer', 'werwerwerwe', 'rwerwe', '324234234', 'gouda@4jawaly.com', 'Giza Systems Publications', '2013-04-11 12:57:25', 0, 'vPoNqeCEDFbxm7K', 0, 0, 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;


-- Dumping structure for table giza.client_industries
CREATE TABLE IF NOT EXISTS `client_industries` (
  `client_id` int(10) DEFAULT NULL,
  `industry_id` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table giza.client_industries: 9 rows
/*!40000 ALTER TABLE `client_industries` DISABLE KEYS */;
INSERT INTO `client_industries` (`client_id`, `industry_id`) VALUES
	(1, 9),
	(1, 4),
	(1, 3),
	(1, 2),
	(2, 8),
	(48, 8),
	(48, 9),
	(48, 2),
	(50, 6);
/*!40000 ALTER TABLE `client_industries` ENABLE KEYS */;


-- Dumping structure for table giza.client_project_industries
CREATE TABLE IF NOT EXISTS `client_project_industries` (
  `client_id` int(10) DEFAULT NULL,
  `industry_id` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table giza.client_project_industries: 6 rows
/*!40000 ALTER TABLE `client_project_industries` DISABLE KEYS */;
INSERT INTO `client_project_industries` (`client_id`, `industry_id`) VALUES
	(2, 7),
	(2, 6),
	(48, 3),
	(48, 4),
	(49, 7),
	(50, 9);
/*!40000 ALTER TABLE `client_project_industries` ENABLE KEYS */;


-- Dumping structure for table giza.client_solutions
CREATE TABLE IF NOT EXISTS `client_solutions` (
  `client_id` int(10) DEFAULT NULL,
  `solution_id` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table giza.client_solutions: 0 rows
/*!40000 ALTER TABLE `client_solutions` DISABLE KEYS */;
/*!40000 ALTER TABLE `client_solutions` ENABLE KEYS */;


-- Dumping structure for table giza.client_survey
CREATE TABLE IF NOT EXISTS `client_survey` (
  `client_id` int(10) unsigned NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(1000) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`client_id`,`question_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table giza.client_survey: 6 rows
/*!40000 ALTER TABLE `client_survey` DISABLE KEYS */;
INSERT INTO `client_survey` (`client_id`, `question_id`, `answer`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(49, 5, 'yes', 0, 0, NULL, '2013-05-07 22:47:48'),
	(49, 4, 'yes', 0, 0, NULL, '2013-05-07 22:47:48'),
	(49, 3, 'no', 0, 0, NULL, '2013-05-07 22:47:48'),
	(49, 2, '9', 0, 0, NULL, '2013-05-07 22:47:48'),
	(49, 1, '5', 0, 0, NULL, '2013-05-07 22:47:48'),
	(49, 6, 'no', 0, 0, NULL, '2013-05-07 22:47:48');
/*!40000 ALTER TABLE `client_survey` ENABLE KEYS */;


-- Dumping structure for table giza.client_survey_answer
CREATE TABLE IF NOT EXISTS `client_survey_answer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `question_id` int(10) NOT NULL DEFAULT '0',
  `name` varchar(1000) DEFAULT NULL,
  `name_ar` varchar(1000) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.client_survey_answer: 10 rows
/*!40000 ALTER TABLE `client_survey_answer` DISABLE KEYS */;
INSERT INTO `client_survey_answer` (`id`, `question_id`, `name`, `name_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 1, 'Less than 6 months', 'Less than 6 months', 1, 1, 0, 1, '2013-05-05 09:25:49'),
	(2, 1, '6-12 months', '6-12 months', 2, 1, 0, 1, '2013-05-05 09:25:49'),
	(3, 1, '1-2 years', '1-2 years', 3, 1, 0, 1, '2013-05-05 09:25:49'),
	(4, 1, ' 3-4 years', ' 3-4 years', 4, 1, 0, 1, '2013-05-05 09:25:49'),
	(5, 1, ' 5 years or more', ' 5 years or more', 5, 1, 0, 1, '2013-05-05 09:25:49'),
	(6, 2, 'one', '', 1, 1, 0, 1, '2013-05-05 09:27:18'),
	(7, 2, 'two', '', 2, 1, 0, 1, '2013-05-05 09:27:18'),
	(8, 2, 'tree', '', 3, 1, 0, 1, '2013-05-05 09:27:18'),
	(9, 2, 'More than three', '', 4, 1, 0, 1, '2013-05-05 09:27:18'),
	(10, 2, ' Can\'t remember', '', 5, 1, 0, 1, '2013-05-05 09:27:18');
/*!40000 ALTER TABLE `client_survey_answer` ENABLE KEYS */;


-- Dumping structure for table giza.client_survey_question
CREATE TABLE IF NOT EXISTS `client_survey_question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` tinytext,
  `question_ar` tinytext,
  `answer_type` enum('yes_no','true_false','choose_answer','multi_choice','small_text','large_text') DEFAULT NULL,
  `page_no` int(11) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.client_survey_question: 6 rows
/*!40000 ALTER TABLE `client_survey_question` DISABLE KEYS */;
INSERT INTO `client_survey_question` (`id`, `question`, `question_ar`, `answer_type`, `page_no`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, ' 1. When did you become Giza Systems\' client?\r\n', ' 1. When did you become Giza Systems\' client?', 'choose_answer', 1, 1, 1, 0, 1, '2013-05-05 09:25:49'),
	(2, ' 2. How many purchase orders did you issue for Giza Systems\' solutions/services?', ' 2. How many purchase orders did you issue for Giza Systems\' solutions/services?', 'choose_answer', 1, 2, 1, 0, 1, '2013-05-05 09:27:18'),
	(3, ' 3. Do you currently have a project under implementation?', ' 3. Do you currently have a project under implementation?', 'yes_no', 1, 3, 1, 0, 1, '2013-05-05 09:28:02'),
	(4, '  5. Would you work with Giza Systems in the future? ', '  5. Would you work with Giza Systems in the future? ', 'yes_no', 2, 4, 1, 0, 1, '2013-05-05 09:31:25'),
	(5, ' 6. Would you recommend Giza Systems to others?', '6. Would you recommend Giza Systems to others? ', 'yes_no', 3, 5, 1, 0, 1, '2013-05-05 09:31:41'),
	(6, ' 8. Are you satisfied with the team?', ' 8. Are you satisfied with the team?', 'yes_no', 4, 6, 1, 0, 1, '2013-05-05 09:32:32');
/*!40000 ALTER TABLE `client_survey_question` ENABLE KEYS */;


-- Dumping structure for table giza.collaborate
CREATE TABLE IF NOT EXISTS `collaborate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `message` text,
  `approved` tinyint(4) NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `last_user_id` int(11) NOT NULL,
  `last_modify_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.collaborate: ~7 rows (approximately)
/*!40000 ALTER TABLE `collaborate` DISABLE KEYS */;
INSERT INTO `collaborate` (`id`, `name`, `email`, `type`, `message`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'Footer Articles Menu 2', 'goudaelalfy@hotmail.com', 'Inspiring Change', 'grerterte ertert ere', 1, 0, 1, '2013-04-23 10:42:43'),
	(2, 'Footer Articles Menu 2', 'goudaelalfy@hotmail.com', 'Inspiring Change', 'grerterte ertert ere', 1, 0, 1, '2013-04-24 10:08:46'),
	(3, 'Gouda Elalfy', 'gouda@4jawaly.com', 'Going Green', 'message', 1, 0, 1, '2013-04-24 10:08:43'),
	(4, 'Gouda Elalfy', 'goudagg@yahoo.com', 'Going Green', '<p>Message</p>', 1, 0, 1, '2013-04-24 10:08:05'),
	(5, 'test', 'efdfdfd@ddsdsd.cvcv', 'Driving Innovation', '<p>messsage</p>', 1, 1, 1, '2013-04-23 10:45:01'),
	(6, 'Message from admin panel', 'dsdsdsd@dsdsds.dsd', 'Inspiring Change', '<p>mesage text</p>', 1, 1, 1, '2013-04-23 10:43:44'),
	(7, 'Gouda Elalfy', 'gouda@4jawaly.com', 'Driving Innovation', '<p>Message</p>', 1, 0, 1, '2013-04-24 10:08:34');
/*!40000 ALTER TABLE `collaborate` ENABLE KEYS */;


-- Dumping structure for table giza.content_setting
CREATE TABLE IF NOT EXISTS `content_setting` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `default_page_banners` text,
  `default_page_banner_selected` tinytext,
  `default_industry_banners` text,
  `default_industry_banner_selected` tinytext,
  `default_solution_banners` text,
  `default_solution_banner_selected` tinytext,
  `last_user_id` int(10) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.content_setting: 1 rows
/*!40000 ALTER TABLE `content_setting` DISABLE KEYS */;
INSERT INTO `content_setting` (`id`, `default_page_banners`, `default_page_banner_selected`, `default_industry_banners`, `default_industry_banner_selected`, `default_solution_banners`, `default_solution_banner_selected`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'dfsdfsdfsd', NULL, 'dsdsdsdsd', NULL, 'dsdsdsdsdsd', NULL, NULL, NULL);
/*!40000 ALTER TABLE `content_setting` ENABLE KEYS */;


-- Dumping structure for table giza.controller
CREATE TABLE IF NOT EXISTS `controller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `name_ar` varchar(50) NOT NULL,
  `url` varchar(250) NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `last_user_id` int(11) NOT NULL,
  `last_modify_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.controller: 21 rows
/*!40000 ALTER TABLE `controller` DISABLE KEYS */;
INSERT INTO `controller` (`id`, `name`, `name_ar`, `url`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'Pages', 'صفحة', 'page', 0, 1, '0000-00-00 00:00:00'),
	(2, 'Industries', 'صناعة', 'industry', 0, 1, '0000-00-00 00:00:00'),
	(3, 'Solutions', 'حل', 'solution', 0, 1, '0000-00-00 00:00:00'),
	(4, 'Awards', 'شهادة', 'award', 0, 1, '0000-00-00 00:00:00'),
	(5, 'Management Team', 'فريق الادارة', 'managementteam', 0, 1, '0000-00-00 00:00:00'),
	(6, 'Subsidiaries', 'الشركات التابعة', 'subsidiary', 0, 1, '0000-00-00 00:00:00'),
	(7, 'Media Sections Categories', 'تصنيفات اقسام الميديا', 'mediasectioncategory', 0, 1, '0000-00-00 00:00:00'),
	(8, 'Media Sections', 'اقسام الميديا', 'mediasection', 0, 1, '0000-00-00 00:00:00'),
	(9, 'Media Items', 'ميديا', 'mediaitem', 0, 1, '0000-00-00 00:00:00'),
	(10, 'Offices', 'المكاتب', 'office', 0, 1, '0000-00-00 00:00:00'),
	(11, 'Offices Events', 'احداث المكاتب', 'officeevent', 0, 1, '0000-00-00 00:00:00'),
	(12, 'Pages Categories', 'تصنيفات الصفحات', 'pagecategory', 1, 1, '0000-00-00 00:00:00'),
	(13, 'Alumnies', 'الموظفين', 'alumni', 0, 1, '0000-00-00 00:00:00'),
	(14, 'Clients', 'العملاء', 'client', 0, 1, '0000-00-00 00:00:00'),
	(15, 'Partners', 'المساهمين', 'partner', 0, 1, '0000-00-00 00:00:00'),
	(16, 'Careers', 'التوظيف', 'career', 0, 1, '0000-00-00 00:00:00'),
	(17, 'Collaborate with us', 'تعاون معنا', 'collaborate', 0, 1, '0000-00-00 00:00:00'),
	(18, 'Gallery', 'البوم الصور', 'gallery', 0, 1, '0000-00-00 00:00:00'),
	(19, 'Jobs', 'الوظائف', 'job', 0, 1, '0000-00-00 00:00:00'),
	(20, 'Candidates', 'الباحثين عن وظائف', 'candidate', 0, 1, '0000-00-00 00:00:00'),
	(21, 'Contacts', 'اتصل بنا', 'contact', 0, 1, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `controller` ENABLE KEYS */;


-- Dumping structure for table giza.country
CREATE TABLE IF NOT EXISTS `country` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=249 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.country: ~247 rows (approximately)
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` (`id`, `name`, `name_ar`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, '	British Indian Ocean Territory', '	British Indian Ocean Territory', 1, 0, 1, '2013-04-11 09:16:50'),
	(2, '	Cocos (Keeling) Islands', '	Cocos (Keeling) Islands', 1, 0, 1, '2013-04-11 09:16:50'),
	(3, '	Democratic Republic of the Congo (Kinshasa)', '	Democratic Republic of the Congo (Kinshasa)', 1, 0, 1, '2013-04-11 09:16:50'),
	(4, '	French Southern Territories', '	French Southern Territories', 1, 0, 1, '2013-04-11 09:16:50'),
	(5, '	Lao, People\'s Democratic Republic', '	Lao, People\'s Democratic Republic', 1, 0, 1, '2013-04-11 09:16:50'),
	(6, '	Palestinian National Authority', '	Palestinian National Authority', 1, 0, 1, '2013-04-11 09:16:50'),
	(7, '	Turks and Caicos Islands', '	Turks and Caicos Islands', 1, 0, 1, '2013-04-11 09:16:50'),
	(8, 'Afghanistan', 'Afghanistan', 1, 0, 1, '2013-04-11 09:16:50'),
	(9, 'Albania', 'Albania', 1, 0, 1, '2013-04-11 09:16:50'),
	(10, 'Algeria', 'Algeria', 1, 0, 1, '2013-04-11 09:16:50'),
	(11, 'American Samoa', 'American Samoa', 1, 0, 1, '2013-04-11 09:16:50'),
	(12, 'Andorra', 'Andorra', 1, 0, 1, '2013-04-11 09:16:50'),
	(13, 'Angola', 'Angola', 1, 0, 1, '2013-04-11 09:16:50'),
	(14, 'Anguilla', 'Anguilla', 1, 0, 1, '2013-04-11 09:16:50'),
	(15, 'Antarctica', 'Antarctica', 1, 0, 1, '2013-04-11 09:16:50'),
	(16, 'Antigua and Barbuda', 'Antigua and Barbuda', 1, 0, 1, '2013-04-11 09:16:50'),
	(17, 'Argentina', 'Argentina', 1, 0, 1, '2013-04-11 09:16:50'),
	(18, 'Armenia', 'Armenia', 1, 0, 1, '2013-04-11 09:16:50'),
	(19, 'Aruba', 'Aruba', 1, 0, 1, '2013-04-11 09:16:50'),
	(20, 'Ascension Island', 'Ascension Island', 1, 0, 1, '2013-04-11 09:16:50'),
	(21, 'Australia', 'Australia', 1, 0, 1, '2013-04-11 09:16:50'),
	(22, 'Austria', 'Austria', 1, 0, 1, '2013-04-11 09:16:50'),
	(23, 'Azerbaijan', 'Azerbaijan', 1, 0, 1, '2013-04-11 09:16:50'),
	(24, 'Bahamas', 'Bahamas', 1, 0, 1, '2013-04-11 09:16:50'),
	(25, 'Bahrain', 'Bahrain', 1, 0, 1, '2013-04-11 09:16:50'),
	(26, 'Bangladesh', 'Bangladesh', 1, 0, 1, '2013-04-11 09:16:50'),
	(27, 'Barbados', 'Barbados', 1, 0, 1, '2013-04-11 09:16:50'),
	(28, 'Belarus', 'Belarus', 1, 0, 1, '2013-04-11 09:16:50'),
	(29, 'Belgium', 'Belgium', 1, 0, 1, '2013-04-11 09:16:50'),
	(30, 'Belize', 'Belize', 1, 0, 1, '2013-04-11 09:16:50'),
	(31, 'Benin', 'Benin', 1, 0, 1, '2013-04-11 09:16:50'),
	(32, 'Bermuda', 'Bermuda', 1, 0, 1, '2013-04-11 09:16:50'),
	(33, 'Bhutan', 'Bhutan', 1, 0, 1, '2013-04-11 09:16:50'),
	(34, 'Bolivia', 'Bolivia', 1, 0, 1, '2013-04-11 09:16:50'),
	(35, 'Bosnia and Herzegovina', 'Bosnia and Herzegovina', 1, 0, 1, '2013-04-11 09:16:50'),
	(36, 'Botswana', 'Botswana', 1, 0, 1, '2013-04-11 09:16:50'),
	(37, 'Bouvet Island', 'Bouvet Island', 1, 0, 1, '2013-04-11 09:16:50'),
	(38, 'Brazil', 'Brazil', 1, 0, 1, '2013-04-11 09:16:50'),
	(39, 'Brunei Darussalam', 'Brunei Darussalam', 1, 0, 1, '2013-04-11 09:16:50'),
	(40, 'Bulgaria', 'Bulgaria', 1, 0, 1, '2013-04-11 09:16:50'),
	(41, 'Burkina Faso', 'Burkina Faso', 1, 0, 1, '2013-04-11 09:16:50'),
	(42, 'Burundi', 'Burundi', 1, 0, 1, '2013-04-11 09:16:50'),
	(43, 'Cambodia', 'Cambodia', 1, 0, 1, '2013-04-11 09:16:50'),
	(44, 'Cameroon', 'Cameroon', 1, 0, 1, '2013-04-11 09:16:50'),
	(45, 'Canada', 'Canada', 1, 0, 1, '2013-04-11 09:16:50'),
	(46, 'Cape Verde', 'Cape Verde', 1, 0, 1, '2013-04-11 09:16:50'),
	(47, 'Cayman Islands', 'Cayman Islands', 1, 0, 1, '2013-04-11 09:16:50'),
	(48, 'Central African Republic', 'Central African Republic', 1, 0, 1, '2013-04-11 09:16:50'),
	(49, 'Chad', 'Chad', 1, 0, 1, '2013-04-11 09:16:50'),
	(50, 'Chile', 'Chile', 1, 0, 1, '2013-04-11 09:16:50'),
	(51, 'China', 'China', 1, 0, 1, '2013-04-11 09:16:50'),
	(52, 'Christmas Island', 'Christmas Island', 1, 0, 1, '2013-04-11 09:16:50'),
	(53, 'Colombia', 'Colombia', 1, 0, 1, '2013-04-11 09:16:50'),
	(54, 'Comoros', 'Comoros', 1, 0, 1, '2013-04-11 09:16:50'),
	(55, 'Congo, Republic of (Brazzaville)', 'Congo, Republic of (Brazzaville)', 1, 0, 1, '2013-04-11 09:16:50'),
	(56, 'Cook Islands', 'Cook Islands', 1, 0, 1, '2013-04-11 09:16:50'),
	(57, 'Costa Rica', 'Costa Rica', 1, 0, 1, '2013-04-11 09:16:50'),
	(58, 'Croatia', 'Croatia', 1, 0, 1, '2013-04-11 09:16:50'),
	(59, 'Cuba', 'Cuba', 1, 0, 1, '2013-04-11 09:16:50'),
	(60, 'Cyprus', 'Cyprus', 1, 0, 1, '2013-04-11 09:16:50'),
	(61, 'Czech Republic', 'Czech Republic', 1, 0, 1, '2013-04-11 09:16:50'),
	(62, 'Denmark', 'Denmark', 1, 0, 1, '2013-04-11 09:16:50'),
	(63, 'Djibouti', 'Djibouti', 1, 0, 1, '2013-04-11 09:16:50'),
	(64, 'Dominica', 'Dominica', 1, 0, 1, '2013-04-11 09:16:50'),
	(65, 'Dominican Republic', 'Dominican Republic', 1, 0, 1, '2013-04-11 09:16:50'),
	(66, 'East Timor Timor-Leste', 'East Timor Timor-Leste', 1, 0, 1, '2013-04-11 09:16:50'),
	(67, 'Ecuador', 'Ecuador', 1, 0, 1, '2013-04-11 09:16:50'),
	(68, 'Egypt', 'Egypt', 1, 0, 1, '2013-04-11 09:16:50'),
	(69, 'El Salvador', 'El Salvador', 1, 0, 1, '2013-04-11 09:16:50'),
	(70, 'Equatorial Guinea', 'Equatorial Guinea', 1, 0, 1, '2013-04-11 09:16:50'),
	(71, 'Eritrea', 'Eritrea', 1, 0, 1, '2013-04-11 09:16:50'),
	(72, 'Estonia', 'Estonia', 1, 0, 1, '2013-04-11 09:16:50'),
	(73, 'Ethiopia', 'Ethiopia', 1, 0, 1, '2013-04-11 09:16:50'),
	(74, 'Falkland Islands', 'Falkland Islands', 1, 0, 1, '2013-04-11 09:16:50'),
	(75, 'Faroe Islands', 'Faroe Islands', 1, 0, 1, '2013-04-11 09:16:50'),
	(76, 'Fiji', 'Fiji', 1, 0, 1, '2013-04-11 09:16:50'),
	(77, 'Finland', 'Finland', 1, 0, 1, '2013-04-11 09:16:50'),
	(78, 'France', 'France', 1, 0, 1, '2013-04-11 09:16:50'),
	(79, 'French Guiana', 'French Guiana', 1, 0, 1, '2013-04-11 09:16:50'),
	(80, 'French Metropolitan', 'French Metropolitan', 1, 0, 1, '2013-04-11 09:16:50'),
	(81, 'French Polynesia', 'French Polynesia', 1, 0, 1, '2013-04-11 09:16:50'),
	(82, 'Gabon', 'Gabon', 1, 0, 1, '2013-04-11 09:16:50'),
	(83, 'Gambia', 'Gambia', 1, 0, 1, '2013-04-11 09:16:50'),
	(84, 'Georgia', 'Georgia', 1, 0, 1, '2013-04-11 09:16:50'),
	(85, 'Germany', 'Germany', 1, 0, 1, '2013-04-11 09:16:50'),
	(86, 'Ghana', 'Ghana', 1, 0, 1, '2013-04-11 09:16:50'),
	(87, 'Gibraltar', 'Gibraltar', 1, 0, 1, '2013-04-11 09:16:50'),
	(88, 'Great Britain', 'Great Britain', 1, 0, 1, '2013-04-11 09:16:50'),
	(89, 'Greece', 'Greece', 1, 0, 1, '2013-04-11 09:16:50'),
	(90, 'Greenland', 'Greenland', 1, 0, 1, '2013-04-11 09:16:50'),
	(91, 'Grenada', 'Grenada', 1, 0, 1, '2013-04-11 09:16:50'),
	(92, 'Guadeloupe', 'Guadeloupe', 1, 0, 1, '2013-04-11 09:16:50'),
	(93, 'Guam', 'Guam', 1, 0, 1, '2013-04-11 09:16:50'),
	(94, 'Guatemala', 'Guatemala', 1, 0, 1, '2013-04-11 09:16:50'),
	(95, 'Guernsey', 'Guernsey', 1, 0, 1, '2013-04-11 09:16:50'),
	(96, 'Guinea', 'Guinea', 1, 0, 1, '2013-04-11 09:16:50'),
	(97, 'Guinea-Bissau', 'Guinea-Bissau', 1, 0, 1, '2013-04-11 09:16:50'),
	(98, 'Guyana', 'Guyana', 1, 0, 1, '2013-04-11 09:16:50'),
	(99, 'Haiti', 'Haiti', 1, 0, 1, '2013-04-11 09:16:50'),
	(100, 'Heard and Mc Donald Islands', 'Heard and Mc Donald Islands', 1, 0, 1, '2013-04-11 09:16:50'),
	(101, 'Holy See', 'Holy See', 1, 0, 1, '2013-04-11 09:16:50'),
	(102, 'Honduras', 'Honduras', 1, 0, 1, '2013-04-11 09:16:50'),
	(103, 'Hong Kong', 'Hong Kong', 1, 0, 1, '2013-04-11 09:16:50'),
	(104, 'Hungary', 'Hungary', 1, 0, 1, '2013-04-11 09:16:50'),
	(105, 'Iceland', 'Iceland', 1, 0, 1, '2013-04-11 09:16:50'),
	(106, 'India', 'India', 1, 0, 1, '2013-04-11 09:16:50'),
	(107, 'Indonesia', 'Indonesia', 1, 0, 1, '2013-04-11 09:16:50'),
	(108, 'Iran (Islamic Republic of)', 'Iran (Islamic Republic of)', 1, 0, 1, '2013-04-11 09:16:50'),
	(109, 'Iraq', 'Iraq', 1, 0, 1, '2013-04-11 09:16:50'),
	(110, 'Ireland', 'Ireland', 1, 0, 1, '2013-04-11 09:16:50'),
	(111, 'Isle of Man', 'Isle of Man', 1, 0, 1, '2013-04-11 09:16:50'),
	(112, 'Italy', 'Italy', 1, 0, 1, '2013-04-11 09:16:50'),
	(113, 'Ivory Coast', 'Ivory Coast', 1, 0, 1, '2013-04-11 09:16:50'),
	(114, 'Jamaica', 'Jamaica', 1, 0, 1, '2013-04-11 09:16:50'),
	(115, 'Japan', 'Japan', 1, 0, 1, '2013-04-11 09:16:50'),
	(116, 'Jersey', 'Jersey', 1, 0, 1, '2013-04-11 09:16:50'),
	(117, 'Jordan', 'Jordan', 1, 0, 1, '2013-04-11 09:16:50'),
	(118, 'Kazakhstan', 'Kazakhstan', 1, 0, 1, '2013-04-11 09:16:50'),
	(119, 'Kenya', 'Kenya', 1, 0, 1, '2013-04-11 09:16:50'),
	(120, 'Kiribati', 'Kiribati', 1, 0, 1, '2013-04-11 09:16:50'),
	(121, 'Korea, Democratic People\'s Rep. (North Korea)', 'Korea, Democratic People\'s Rep. (North Korea)', 1, 0, 1, '2013-04-11 09:16:50'),
	(122, 'Korea, Republic of (South Korea)', 'Korea, Republic of (South Korea)', 1, 0, 1, '2013-04-11 09:16:50'),
	(123, 'Kuwait', 'Kuwait', 1, 0, 1, '2013-04-11 09:16:50'),
	(124, 'Kyrgyzstan', 'Kyrgyzstan', 1, 0, 1, '2013-04-11 09:16:50'),
	(125, 'Latvia', 'Latvia', 1, 0, 1, '2013-04-11 09:16:50'),
	(126, 'Lebanon', 'Lebanon', 1, 0, 1, '2013-04-11 09:16:50'),
	(127, 'Lesotho', 'Lesotho', 1, 0, 1, '2013-04-11 09:16:50'),
	(128, 'Liberia', 'Liberia', 1, 0, 1, '2013-04-11 09:16:50'),
	(129, 'Libya', 'Libya', 1, 0, 1, '2013-04-11 09:16:50'),
	(130, 'Liechtenstein', 'Liechtenstein', 1, 0, 1, '2013-04-11 09:16:50'),
	(131, 'Lithuania', 'Lithuania', 1, 0, 1, '2013-04-11 09:16:50'),
	(132, 'Luxembourg', 'Luxembourg', 1, 0, 1, '2013-04-11 09:16:50'),
	(133, 'Macau', 'Macau', 1, 0, 1, '2013-04-11 09:16:50'),
	(134, 'Macedonia, Rep. of', 'Macedonia, Rep. of', 1, 0, 1, '2013-04-11 09:16:50'),
	(135, 'Madagascar', 'Madagascar', 1, 0, 1, '2013-04-11 09:16:50'),
	(136, 'Malawi', 'Malawi', 1, 0, 1, '2013-04-11 09:16:50'),
	(137, 'Malaysia', 'Malaysia', 1, 0, 1, '2013-04-11 09:16:50'),
	(138, 'Maldives', 'Maldives', 1, 0, 1, '2013-04-11 09:16:50'),
	(139, 'Mali', 'Mali', 1, 0, 1, '2013-04-11 09:16:50'),
	(140, 'Malta', 'Malta', 1, 0, 1, '2013-04-11 09:16:50'),
	(141, 'Marshall Islands', 'Marshall Islands', 1, 0, 1, '2013-04-11 09:16:50'),
	(142, 'Martinique', 'Martinique', 1, 0, 1, '2013-04-11 09:16:50'),
	(143, 'Mauritania', 'Mauritania', 1, 0, 1, '2013-04-11 09:16:50'),
	(144, 'Mauritius', 'Mauritius', 1, 0, 1, '2013-04-11 09:16:50'),
	(145, 'Mayotte', 'Mayotte', 1, 0, 1, '2013-04-11 09:16:50'),
	(146, 'Mexico', 'Mexico', 1, 0, 1, '2013-04-11 09:16:50'),
	(147, 'Micronesia, Federal States of', 'Micronesia, Federal States of', 1, 0, 1, '2013-04-11 09:16:50'),
	(148, 'Moldova, Republic of', 'Moldova, Republic of', 1, 0, 1, '2013-04-11 09:16:50'),
	(149, 'Monaco', 'Monaco', 1, 0, 1, '2013-04-11 09:16:50'),
	(150, 'Mongolia', 'Mongolia', 1, 0, 1, '2013-04-11 09:16:50'),
	(151, 'Montenegro', 'Montenegro', 1, 0, 1, '2013-04-11 09:16:50'),
	(152, 'Montserrat', 'Montserrat', 1, 0, 1, '2013-04-11 09:16:50'),
	(153, 'Morocco', 'Morocco', 1, 0, 1, '2013-04-11 09:16:50'),
	(154, 'Mozambique', 'Mozambique', 1, 0, 1, '2013-04-11 09:16:50'),
	(155, 'Myanmar, Burma', 'Myanmar, Burma', 1, 0, 1, '2013-04-11 09:16:50'),
	(156, 'Namibia', 'Namibia', 1, 0, 1, '2013-04-11 09:16:50'),
	(157, 'Nauru', 'Nauru', 1, 0, 1, '2013-04-11 09:16:50'),
	(158, 'Nepal', 'Nepal', 1, 0, 1, '2013-04-11 09:16:50'),
	(159, 'Netherlands', 'Netherlands', 1, 0, 1, '2013-04-11 09:16:50'),
	(160, 'Netherlands Antilles', 'Netherlands Antilles', 1, 0, 1, '2013-04-11 09:16:50'),
	(161, 'New Caledonia', 'New Caledonia', 1, 0, 1, '2013-04-11 09:16:50'),
	(162, 'New Zealand', 'New Zealand', 1, 0, 1, '2013-04-11 09:16:50'),
	(163, 'Nicaragua', 'Nicaragua', 1, 0, 1, '2013-04-11 09:16:50'),
	(164, 'Niger', 'Niger', 1, 0, 1, '2013-04-11 09:16:50'),
	(165, 'Nigeria', 'Nigeria', 1, 0, 1, '2013-04-11 09:16:50'),
	(166, 'Niue', 'Niue', 1, 0, 1, '2013-04-11 09:16:50'),
	(167, 'Norfolk Island', 'Norfolk Island', 1, 0, 1, '2013-04-11 09:16:50'),
	(168, 'Northern Mariana Islands', 'Northern Mariana Islands', 1, 0, 1, '2013-04-11 09:16:50'),
	(169, 'Norway', 'Norway', 1, 0, 1, '2013-04-11 09:16:50'),
	(170, 'Oman', 'Oman', 1, 0, 1, '2013-04-11 09:16:50'),
	(171, 'Pakistan', 'Pakistan', 1, 0, 1, '2013-04-11 09:16:50'),
	(172, 'Palastine', 'Palastine', 1, 0, 1, '2013-04-11 09:16:50'),
	(173, 'Palau', 'Palau', 1, 0, 1, '2013-04-11 09:16:50'),
	(174, 'Panama', 'Panama', 1, 0, 1, '2013-04-11 09:16:50'),
	(175, 'Papua New Guinea', 'Papua New Guinea', 1, 0, 1, '2013-04-11 09:16:50'),
	(176, 'Paraguay', 'Paraguay', 1, 0, 1, '2013-04-11 09:16:50'),
	(177, 'Peru', 'Peru', 1, 0, 1, '2013-04-11 09:16:50'),
	(178, 'Philippines', 'Philippines', 1, 0, 1, '2013-04-11 09:16:50'),
	(179, 'Pitcairn Island', 'Pitcairn Island', 1, 0, 1, '2013-04-11 09:16:50'),
	(180, 'Poland', 'Poland', 1, 0, 1, '2013-04-11 09:16:50'),
	(181, 'Portugal', 'Portugal', 1, 0, 1, '2013-04-11 09:16:50'),
	(182, 'Puerto Rico', 'Puerto Rico', 1, 0, 1, '2013-04-11 09:16:50'),
	(183, 'Qatar', 'Qatar', 1, 0, 1, '2013-04-11 09:16:50'),
	(184, 'Reunion Island', 'Reunion Island', 1, 0, 1, '2013-04-11 09:16:50'),
	(185, 'Romania', 'Romania', 1, 0, 1, '2013-04-11 09:16:50'),
	(186, 'Russian Federation', 'Russian Federation', 1, 0, 1, '2013-04-11 09:16:50'),
	(187, 'Rwanda', 'Rwanda', 1, 0, 1, '2013-04-11 09:16:50'),
	(188, 'Saint Helena', 'Saint Helena', 1, 0, 1, '2013-04-11 09:16:50'),
	(189, 'Saint Kitts and Nevis', 'Saint Kitts and Nevis', 1, 0, 1, '2013-04-11 09:16:50'),
	(190, 'Saint Lucia', 'Saint Lucia', 1, 0, 1, '2013-04-11 09:16:50'),
	(191, 'Saint Vincent and the Grenadines', 'Saint Vincent and the Grenadines', 1, 0, 1, '2013-04-11 09:16:50'),
	(192, 'Samoa', 'Samoa', 1, 0, 1, '2013-04-11 09:16:50'),
	(193, 'San Marino', 'San Marino', 1, 0, 1, '2013-04-11 09:16:50'),
	(194, 'Sao Tome and PrÃ­ncipe', 'Sao Tome and PrÃ­ncipe', 1, 0, 1, '2013-04-11 09:16:50'),
	(195, 'Saudi Arabia', 'Saudi Arabia', 1, 0, 1, '2013-04-11 09:16:50'),
	(196, 'Senegal', 'Senegal', 1, 0, 1, '2013-04-11 09:16:50'),
	(197, 'Serbia', 'Serbia', 1, 0, 1, '2013-04-11 09:16:50'),
	(198, 'Seychelles', 'Seychelles', 1, 0, 1, '2013-04-11 09:16:50'),
	(199, 'Sierra Leone', 'Sierra Leone', 1, 0, 1, '2013-04-11 09:16:50'),
	(200, 'Singapore', 'Singapore', 1, 0, 1, '2013-04-11 09:16:50'),
	(201, 'Slovakia (Slovak Republic)', 'Slovakia (Slovak Republic)', 1, 0, 1, '2013-04-11 09:16:50'),
	(202, 'Slovenia', 'Slovenia', 1, 0, 1, '2013-04-11 09:16:50'),
	(203, 'Solomon Islands', 'Solomon Islands', 1, 0, 1, '2013-04-11 09:16:50'),
	(204, 'Somalia', 'Somalia', 1, 0, 1, '2013-04-11 09:16:50'),
	(205, 'South Africa', 'South Africa', 1, 0, 1, '2013-04-11 09:16:50'),
	(206, 'South Georgia and South Sandwich Islands', 'South Georgia and South Sandwich Islands', 1, 0, 1, '2013-04-11 09:16:50'),
	(207, 'Spain', 'Spain', 1, 0, 1, '2013-04-11 09:16:50'),
	(208, 'Sri Lanka', 'Sri Lanka', 1, 0, 1, '2013-04-11 09:16:50'),
	(209, 'St. Pierre and Miquelon', 'St. Pierre and Miquelon', 1, 0, 1, '2013-04-11 09:16:50'),
	(210, 'Sudan', 'Sudan', 1, 0, 1, '2013-04-11 09:16:50'),
	(211, 'Suriname', 'Suriname', 1, 0, 1, '2013-04-11 09:16:50'),
	(212, 'Svalbard and Jan Mayen Islands', 'Svalbard and Jan Mayen Islands', 1, 0, 1, '2013-04-11 09:16:50'),
	(213, 'Swaziland', 'Swaziland', 1, 0, 1, '2013-04-11 09:16:50'),
	(214, 'Sweden', 'Sweden', 1, 0, 1, '2013-04-11 09:16:50'),
	(215, 'Switzerland', 'Switzerland', 1, 0, 1, '2013-04-11 09:16:50'),
	(216, 'Syria, Syrian Arab Republic', 'Syria, Syrian Arab Republic', 1, 0, 1, '2013-04-11 09:16:50'),
	(217, 'Taiwan (Republic of China)', 'Taiwan (Republic of China)', 1, 0, 1, '2013-04-11 09:16:50'),
	(218, 'Tajikistan', 'Tajikistan', 1, 0, 1, '2013-04-11 09:16:50'),
	(219, 'Tanzania', 'Tanzania', 1, 0, 1, '2013-04-11 09:16:50'),
	(220, 'Thailand', 'Thailand', 1, 0, 1, '2013-04-11 09:16:50'),
	(221, 'Tibet', 'Tibet', 1, 0, 1, '2013-04-11 09:16:50'),
	(222, 'Timor-Leste (East Timor)', 'Timor-Leste (East Timor)', 1, 0, 1, '2013-04-11 09:16:50'),
	(223, 'Togo', 'Togo', 1, 0, 1, '2013-04-11 09:16:50'),
	(224, 'Tokelau', 'Tokelau', 1, 0, 1, '2013-04-11 09:16:50'),
	(225, 'Tonga', 'Tonga', 1, 0, 1, '2013-04-11 09:16:50'),
	(226, 'Trinidad and Tobago', 'Trinidad and Tobago', 1, 0, 1, '2013-04-11 09:16:50'),
	(227, 'Tunisia', 'Tunisia', 1, 0, 1, '2013-04-11 09:16:50'),
	(228, 'Turkey', 'Turkey', 1, 0, 1, '2013-04-11 09:16:50'),
	(229, 'Turkmenistan', 'Turkmenistan', 1, 0, 1, '2013-04-11 09:16:50'),
	(230, 'Tuvalu', 'Tuvalu', 1, 0, 1, '2013-04-11 09:16:50'),
	(231, 'U.S. Minor Outlying Islands', 'U.S. Minor Outlying Islands', 1, 0, 1, '2013-04-11 09:16:50'),
	(232, 'Uganda', 'Uganda', 1, 0, 1, '2013-04-11 09:16:50'),
	(233, 'Ukraine', 'Ukraine', 1, 0, 1, '2013-04-11 09:16:50'),
	(234, 'United Arab Emirates', 'United Arab Emirates', 1, 0, 1, '2013-04-11 09:16:50'),
	(235, 'United Kingdom', 'United Kingdom', 1, 0, 1, '2013-04-11 09:16:50'),
	(236, 'United States', 'United States', 1, 0, 1, '2013-04-11 09:16:50'),
	(237, 'Uruguay', 'Uruguay', 1, 0, 1, '2013-04-11 09:16:50'),
	(238, 'Uzbekistan', 'Uzbekistan', 1, 0, 1, '2013-04-11 09:16:50'),
	(239, 'Vanuatu', 'Vanuatu', 1, 0, 1, '2013-04-11 09:16:50'),
	(240, 'Venezuela', 'Venezuela', 1, 0, 1, '2013-04-11 09:16:50'),
	(241, 'Vietnam', 'Vietnam', 1, 0, 1, '2013-04-11 09:16:50'),
	(242, 'Virgin Islands (British)', 'Virgin Islands (British)', 1, 0, 1, '2013-04-11 09:16:50'),
	(243, 'Virgin Islands (U.S.)', 'Virgin Islands (U.S.)', 1, 0, 1, '2013-04-11 09:16:50'),
	(244, 'Wallis and Futuna Islands', 'Wallis and Futuna Islands', 1, 0, 1, '2013-04-11 09:16:50'),
	(245, 'Western Sahara', 'Western Sahara', 1, 0, 1, '2013-04-11 09:16:50'),
	(246, 'Yemen', 'Yemen', 1, 0, 1, '2013-04-11 09:16:50'),
	(247, 'Zambia', 'Zambia', 1, 0, 1, '2013-04-11 09:16:50'),
	(248, 'Zimbabwe', 'Zimbabwe', 1, 0, 1, '2013-04-11 09:16:50');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;


-- Dumping structure for table giza.email_setting
CREATE TABLE IF NOT EXISTS `email_setting` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email_sender_type` varchar(50) DEFAULT NULL,
  `smtp_server` varchar(100) DEFAULT NULL,
  `smtp_port` int(10) DEFAULT NULL,
  `smtp_account` varchar(100) DEFAULT NULL,
  `smtp_password` varchar(250) DEFAULT NULL,
  `website_mail` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.email_setting: ~1 rows (approximately)
/*!40000 ALTER TABLE `email_setting` DISABLE KEYS */;
INSERT INTO `email_setting` (`id`, `email_sender_type`, `smtp_server`, `smtp_port`, `smtp_account`, `smtp_password`, `website_mail`) VALUES
	(1, 'smtp', 'smtp.gmail.com', 465, 'goudaelalfy@gmail.com', 'MTMzMDQ4MjY5NDY=', 'lara.shawky@gizasystems.com');
/*!40000 ALTER TABLE `email_setting` ENABLE KEYS */;


-- Dumping structure for table giza.email_template
CREATE TABLE IF NOT EXISTS `email_template` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `purpose` varchar(250) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `subject_ar` varchar(250) DEFAULT NULL,
  `body` text,
  `body_ar` text,
  `active` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.email_template: ~8 rows (approximately)
/*!40000 ALTER TABLE `email_template` DISABLE KEYS */;
INSERT INTO `email_template` (`id`, `purpose`, `subject`, `subject_ar`, `body`, `body_ar`, `active`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'partner_signup', 'Giza Systems Partners', NULL, '<p>Giza Systems</p>\r\n<table cellspacing="0" cellpadding="0">\r\n<tbody>\r\n<tr>\r\n<td align="center" valign="top">\r\n<table cellspacing="0" cellpadding="0">\r\n<tbody>\r\n<tr>\r\n<td height="20">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align="center" valign="top"><img src="http://108.167.160.115/images/imgemailtemp.jpg" alt="" border="0" /></td>\r\n</tr>\r\n<tr>\r\n<td height="20">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align="left" valign="top">\r\n<table cellspacing="0" cellpadding="0">\r\n<tbody>\r\n<tr>\r\n<td height="20">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align="left" valign="top"><span>#@#@#@</span></td>\r\n</tr>\r\n<tr>\r\n<td height="20">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align="center" valign="top">\r\n<div>Thank you for registering on the Giza Systems website. Your account has been created.</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td height="20">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align="left" valign="top"><span>#&amp;#&amp;#&amp;</span></td>\r\n</tr>\r\n<tr>\r\n<td height="10">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align="left" valign="top"><span>#*#*#*</span></td>\r\n</tr>\r\n<tr>\r\n<td height="10">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align="left" valign="top"><span>#%#%#%</span></td>\r\n</tr>\r\n<tr>\r\n<td height="20">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align="left" valign="top">\r\n<div>#!#!#!</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td height="20">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align="left" valign="top">\r\n<div>info@gizasystems.com</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td height="40">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align="left" valign="top">\r\n<div>Giza Systems Team</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td height="40">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align="left" valign="top">\r\n<div>Plot No. 176, Second Sector, City Center | New Cairo 11835, Egypt</div>\r\n<div>Fax +(202) 26146001</div>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td height="40">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td align="left" valign="top">\r\n<div>www.gizasystems.com is the number one systems integrator in Egypt and the Middle East providing a wide range of industry specific technology solutions in the Telecom, Utilities, Oil &amp; Gas, and Manufacturing industries. We have been shaping the IT industry and corporate agendas since 1974. Our consultancy practice provides industry focused services that enhance value for our clients by streamlining operational and business processes. Operating in the Middle East through Giza Arabia <a href="www.gizaarabia.com">www.gizaarabia.com</a>, our group of companies is focused on contributing to the local and regional development with our technology solutions, commitment and outstanding customer service. Our team of 700 professionals enables us to extend our geographic footprint delivering diverse projects and connecting us with clients in the Middle East, Africa, Europe, Latin America and Russia.</div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', NULL, 1, 0, 1, '2013-04-09 16:51:42'),
	(2, 'client_signup', 'Giza Systems Clients', NULL, NULL, NULL, 1, 0, 1, '2013-04-09 16:14:50'),
	(3, 'alumni_signup', 'Giza Systems Alumnies', NULL, NULL, NULL, 1, 0, 1, '2013-04-09 16:14:49'),
	(4, 'partner_forget_password', 'Giza Systems Partners', NULL, NULL, NULL, 1, 0, 1, NULL),
	(5, 'client_forget_password', 'Giza Systems Clients', NULL, NULL, NULL, 1, 0, 1, NULL),
	(6, 'alumni_forget_password', 'Giza Systems Alumnies', NULL, NULL, NULL, 1, 0, 1, NULL),
	(7, 'candidate_signup', 'Giza Systems Candidate', NULL, NULL, NULL, 1, 0, 1, NULL),
	(8, 'candidate_forget_password', 'Giza Systems Candidate', NULL, NULL, NULL, 1, 0, 1, NULL);
/*!40000 ALTER TABLE `email_template` ENABLE KEYS */;


-- Dumping structure for table giza.gallery
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `alias` varchar(250) NOT NULL,
  `icon` tinytext,
  `banner_image_thumbs` text,
  `banner_files` text,
  `banner_image_thumb_selected` tinytext,
  `banner_file_selected` tinytext,
  `title` varchar(250) DEFAULT NULL,
  `title_ar` varchar(250) DEFAULT NULL,
  `seo_words` tinytext,
  `seo_words_ar` tinytext,
  `brief` text,
  `brief_ar` text,
  `body` text,
  `body_ar` text,
  `temp` tinyint(4) DEFAULT '0',
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.gallery: 8 rows
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` (`id`, `alias`, `icon`, `banner_image_thumbs`, `banner_files`, `banner_image_thumb_selected`, `banner_file_selected`, `title`, `title_ar`, `seo_words`, `seo_words_ar`, `brief`, `brief_ar`, `body`, `body_ar`, `temp`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'GSMA, Barcelona 2012', '', '', '', '', '', 'GSMA, Barcelona 2012', 'GSMA, Barcelona 2012', '', '', '', '', '', '', 0, 1, 0, 1, '2013-03-20 23:25:48'),
	(24, 'Gallery Temp', '', '', '', '', '', 'Temp Gallery', 'Temp Gallery', '', '', '', '', '', '', 1, 1, 0, 1, '2013-04-09 14:25:02'),
	(2, 'Schneider', '/added/uploads/banner/gallery/1365188222_icon.jpg', '', '', '', '', 'Schneider', 'Schneider', '', '', '', '', '', '', 0, 1, 0, 1, '2013-04-05 20:57:02'),
	(5, 'GS Free Zone Accreditation ISO 14001 OHSAS 18001 ISO 9001', NULL, NULL, NULL, NULL, NULL, 'GS Free Zone Accreditation ISO 14001 OHSAS 18001 ISO 9001', 'GS Free Zone Accreditation ISO 14001 OHSAS 18001 ISO 9001', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, NULL, NULL),
	(3, 'Honeywell', '', '', '', '', '', 'Honeywell', 'Honeywell', '', '', '', '', '', '', 1, 1, 0, 1, '2013-03-20 23:25:21'),
	(6, 'Presidential elections awareness sessions', NULL, NULL, NULL, NULL, NULL, 'Presidential elections awareness sessions', 'Presidential elections awareness sessions', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, NULL, NULL),
	(7, ' GSF Training Sessions', NULL, NULL, NULL, NULL, NULL, ' GSF Training Sessions', ' GSF Training Sessions', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, NULL, NULL),
	(4, 'Injaz Volunteer Recognition', '/added/uploads/banner/gallery/1365188204_icon.jpg', '', '', '', '', 'Injaz Volunteer Recognition', 'Injaz Volunteer Recognition', '', '', '', '', '', '', 0, 1, 0, 1, '2013-04-05 20:56:44');
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;


-- Dumping structure for table giza.home_box
CREATE TABLE IF NOT EXISTS `home_box` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `alias` varchar(250) NOT NULL,
  `icon` tinytext,
  `banner_image_thumbs` text,
  `banner_files` text,
  `banner_image_thumb_selected` tinytext,
  `banner_file_selected` tinytext,
  `title` varchar(250) DEFAULT NULL,
  `title_ar` varchar(250) DEFAULT NULL,
  `seo_words` tinytext,
  `seo_words_ar` tinytext,
  `brief` text,
  `brief_ar` text,
  `body` text,
  `body_ar` text,
  `sort` tinyint(4) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.home_box: 3 rows
/*!40000 ALTER TABLE `home_box` DISABLE KEYS */;
INSERT INTO `home_box` (`id`, `alias`, `icon`, `banner_image_thumbs`, `banner_files`, `banner_image_thumb_selected`, `banner_file_selected`, `title`, `title_ar`, `seo_words`, `seo_words_ar`, `brief`, `brief_ar`, `body`, `body_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'Corporate Factsheet ', '/added/uploads/banner/home_box/1363954665_icon.png', '/added/uploads/banner/home_box/1363954665_thumb.jpg', '/added/uploads/banner/home_box/1363954665.jpg', '/added/uploads/banner/home_box/1363954665_thumb.jpg', '/added/uploads/banner/home_box/1363954665.jpg', 'Corporate Factsheet ', 'Corporate Factsheet ', 'Corporate Factsheet ', 'Corporate Factsheet ', '<p>Giza Systems, a leading systems integrator &amp; solution provider, supplies the Middle East market with the latest technologies. We cover a wide spectrum of the economic sectors,</p>', '<p>Giza Systems, a leading systems integrator &amp; solution provider, supplies the Middle East market with the latest technologies. We cover a wide spectrum of the economic sectors,</p>', '<p  justify;"><span  #34abdd;">Who We Are</span></p>\r\n<p  justify;">Giza Systems is the number one systems integrator in Egypt and the Middle East providing a wide range of industry specific technology solutions in the Utilities, Telecom, Oil &amp; Gas, Real Estate, Hospitality and Manufacturing industries.</p>\r\n<div id="cke_pastebin">We have been shaping the IT industry and corporate agendas since 1974. Our consultancy practice provides industry focused services that enhance value for our clients by streamlining operational and business processes.</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin">Operating in the Middle East through our offices and group of companies, we are focused on contributing to the local and regional development with our technology solutions, commitment and outstanding customer service.</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin">Our team of 600 professionals enables us to extend our geographic footprint delivering diverse projects and connecting us with clients in the Middle East, Africa, Europe, Latin America and Russia.</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin"><span  #34abdd;">What We Do</span></div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin">We deliver a comprehensive scope and range of end-to-end industry specific solutions that meet customer demand for streamlining operational and business efficiencies.</div>\r\n<div id="cke_pastebin">Our technical capabilities, extensive experience and knowledge of the market, as well as our partnership with global leaders in the areas of automation systems, communication solutions and metering infrastructure enable us to develop integrated solutions that can work with and build on the evolving technologies, as well as meet the dynamicity of our customers&rsquo; needs.</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin">In our pursuit to constantly enhance existing resources and create new capabilities, we drive forward the growth of our company, our customers, our people, and our communities.</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin"><span  #34abdd;">Capabilities</span></div>\r\n<div>&nbsp;</div>\r\n<div id="cke_pastebin">With steady growth in our client base all over the Middle East, we have established local and regional offices to respond to the demands of our clients, as well as leverage the company&rsquo;s success and proven track record in the different sectors.</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin"><span  #34abdd;">Year Founded:</span> 1974</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin"><span  #34abdd;">Headquarters:</span> New Cairo, Egypt</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin"><span  #34abdd;">Offices:</span> Egypt, Kingdom of Saudi Arabia (KSA), United Arab Emirates (UAE), Qatar</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin"><span  #34abdd;">Our Team:</span> 600 professionals</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin"><span  #34abdd;">Accreditations:</span></div>\r\n<div>&nbsp;</div>\r\n<div id="cke_pastebin">ISO 9001:2008</div>\r\n<div id="cke_pastebin">ISO 14001:2004</div>\r\n<div id="cke_pastebin">OHSAS 18001:2007</div>\r\n<div>&nbsp;</div>\r\n<div id="cke_pastebin"><span  #34abdd;">Our Subsidiaries:&nbsp;</span>Giza Arabia, Giza Systems Services &amp; Distribution (GSD), Giza Systems Free Zone, Giza Systems JLT, Giza Systems Gulf, Giza Systems School of Technology (GSST)</div>', '<p  justify;"><span  #34abdd;">Who We Are</span></p>\r\n<p  justify;">Giza Systems is the number one systems integrator in Egypt and the Middle East providing a wide range of industry specific technology solutions in the Utilities, Telecom, Oil &amp; Gas, Real Estate, Hospitality and Manufacturing industries.</p>\r\n<div id="cke_pastebin">We have been shaping the IT industry and corporate agendas since 1974. Our consultancy practice provides industry focused services that enhance value for our clients by streamlining operational and business processes.</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin">Operating in the Middle East through our offices and group of companies, we are focused on contributing to the local and regional development with our technology solutions, commitment and outstanding customer service.</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin">Our team of 600 professionals enables us to extend our geographic footprint delivering diverse projects and connecting us with clients in the Middle East, Africa, Europe, Latin America and Russia.</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin"><span  #34abdd;">What We Do</span></div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin">We deliver a comprehensive scope and range of end-to-end industry specific solutions that meet customer demand for streamlining operational and business efficiencies.</div>\r\n<div id="cke_pastebin">Our technical capabilities, extensive experience and knowledge of the market, as well as our partnership with global leaders in the areas of automation systems, communication solutions and metering infrastructure enable us to develop integrated solutions that can work with and build on the evolving technologies, as well as meet the dynamicity of our customers&rsquo; needs.</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin">In our pursuit to constantly enhance existing resources and create new capabilities, we drive forward the growth of our company, our customers, our people, and our communities.</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin"><span  #34abdd;">Capabilities</span></div>\r\n<div>&nbsp;</div>\r\n<div id="cke_pastebin">With steady growth in our client base all over the Middle East, we have established local and regional offices to respond to the demands of our clients, as well as leverage the company&rsquo;s success and proven track record in the different sectors.</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin"><span  #34abdd;">Year Founded:</span> 1974</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin"><span  #34abdd;">Headquarters:</span> New Cairo, Egypt</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin"><span  #34abdd;">Offices:</span> Egypt, Kingdom of Saudi Arabia (KSA), United Arab Emirates (UAE), Qatar</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin"><span  #34abdd;">Our Team:</span> 600 professionals</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin"><span  #34abdd;">Accreditations:</span></div>\r\n<div>&nbsp;</div>\r\n<div id="cke_pastebin">ISO 9001:2008</div>\r\n<div id="cke_pastebin">ISO 14001:2004</div>\r\n<div id="cke_pastebin">OHSAS 18001:2007</div>\r\n<div>&nbsp;</div>\r\n<div id="cke_pastebin"><span  #34abdd;">Our Subsidiaries:&nbsp;</span>Giza Arabia, Giza Systems Services &amp; Distribution (GSD), Giza Systems Free Zone, Giza Systems JLT, Giza Systems Gulf, Giza Systems School of Technology (GSST)</div>', 1, 1, 0, 1, '2013-03-22 14:17:45'),
	(2, 'Smart Grids - Automatic Metering Infrastructure', '/added/uploads/banner/home_box/1363954778_icon.png', '/added/uploads/banner/home_box/1363954778_thumb.jpg', '/added/uploads/banner/home_box/1363954778.jpg', '/added/uploads/banner/home_box/1363954778_thumb.jpg', '/added/uploads/banner/home_box/1363954778.jpg', 'Smart Grids - Automatic Metering Infrastructure ', 'Smart Grids - Automatic Metering Infrastructure ', 'Smart Grids - Automatic Metering Infrastructure ', 'Smart Grids - Automatic Metering Infrastructure ', '<p>To deliver the latest green solutions and cutting-edge building solutions, Giza Systems\' portfolio provides its clients with solutions, project management, and consultancy services to cater to the needs of our clients.</p>', '<p>To deliver the latest green solutions and cutting-edge building solutions, Giza Systems\' portfolio provides its clients with solutions, project management, and consultancy services to cater to the needs of our clients.</p>', '<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin">Our years of experience in the utilities and telecom sectors allow us to leverage&nbsp;our proficiencies to guide the industry through the different levels in order</div>\r\n<div id="cke_pastebin">to achieve a smooth transition towards a truly smart grid Giza Systems identifies&nbsp;smart metering, or advanced metering infrastructure, as the enabler and</div>\r\n<div id="cke_pastebin">driver for the Smart Grid resulting in the advancement of a technology today&nbsp;that is both future-proof and competitive in price.</div>', '<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin">&nbsp;</div>\r\n<div id="cke_pastebin">Our years of experience in the utilities and telecom sectors allow us to leverage&nbsp;our proficiencies to guide the industry through the different levels in order</div>\r\n<div id="cke_pastebin">to achieve a smooth transition towards a truly smart grid Giza Systems identifies&nbsp;smart metering, or advanced metering infrastructure, as the enabler and</div>\r\n<div id="cke_pastebin">driver for the Smart Grid resulting in the advancement of a technology today&nbsp;that is both future-proof and competitive in price.</div>', 2, 1, 0, 1, '2013-03-22 14:19:38'),
	(3, ' Security Solutions', '/added/uploads/banner/home_box/1363954899_icon.png', '/added/uploads/banner/home_box/1363954899_thumb.jpg', '/added/uploads/banner/home_box/1363954899.jpg', '/added/uploads/banner/home_box/1363954899_thumb.jpg', '/added/uploads/banner/home_box/1363954899.jpg', ' Security Solutions ', ' Security Solutions ', ' Security Solutions ', ' Security Solutions ', '<p>Check out Giza Systems\' latest offerings in security solutions</p>', '<p>Check out Giza Systems\' latest offerings in security solutions</p>', '<div id="cke_pastebin"  justify;">These solutions enable passive and active network monitoring and analysis.&nbsp;The user(s) can seamlessly intercept complete data from target activity, including&nbsp;real-time target definitions, activation and removal, real-time collection, on-the-fly&nbsp;analysis, non-intrusive operation and full packet capturing. These solutions also create&nbsp;advanced targeting and capture systems that meet the requirements of many national&nbsp;regulatory agencies and an expanding base of potential customers. In addition, they&nbsp;represent a viable legal intercept alternative to customers currently using other products&nbsp;anywhere in the world.&nbsp;</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The features of these solutions include: email targeting via wild-cards or domains, IRC chat&nbsp;username targeting, telnet login name targeting and capture, MGCP targeting, SIP-based&nbsp;instant messenger targeting, HTTP URL targeting, keyword targeting, targeting based on&nbsp;usage thresholds, multiple administrative users, case archiving, case unarchiving, and&nbsp;case purging.</div>', '<div id="cke_pastebin"  justify;">These solutions enable passive and active network monitoring and analysis.&nbsp;The user(s) can seamlessly intercept complete data from target activity, including&nbsp;real-time target definitions, activation and removal, real-time collection, on-the-fly&nbsp;analysis, non-intrusive operation and full packet capturing. These solutions also create&nbsp;advanced targeting and capture systems that meet the requirements of many national&nbsp;regulatory agencies and an expanding base of potential customers. In addition, they&nbsp;represent a viable legal intercept alternative to customers currently using other products&nbsp;anywhere in the world.&nbsp;</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The features of these solutions include: email targeting via wild-cards or domains, IRC chat&nbsp;username targeting, telnet login name targeting and capture, MGCP targeting, SIP-based&nbsp;instant messenger targeting, HTTP URL targeting, keyword targeting, targeting based on&nbsp;usage thresholds, multiple administrative users, case archiving, case unarchiving, and&nbsp;case purging.</div>', 3, 1, 0, 1, '2013-03-22 14:21:39');
/*!40000 ALTER TABLE `home_box` ENABLE KEYS */;


-- Dumping structure for table giza.hr_business_line
CREATE TABLE IF NOT EXISTS `hr_business_line` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `solution_id` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.hr_business_line: 44 rows
/*!40000 ALTER TABLE `hr_business_line` DISABLE KEYS */;
INSERT INTO `hr_business_line` (`id`, `name`, `name_ar`, `solution_id`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'CRM', NULL, 2, 1, 1, 0, NULL, NULL),
	(2, 'Billing & Collections', NULL, 2, 2, 1, 0, NULL, NULL),
	(3, 'Trouble Ticketing', NULL, 2, 3, 1, 0, NULL, NULL),
	(4, 'GIS', NULL, 2, 4, 1, 0, NULL, NULL),
	(5, 'Supply Chain Management', NULL, 2, 5, 1, 0, NULL, NULL),
	(6, 'Settlement', NULL, 2, 6, 1, 0, NULL, NULL),
	(7, 'Workforce Management', NULL, 2, 7, 1, 0, NULL, NULL),
	(8, 'Tracking Solutions', NULL, 2, 8, 1, 0, NULL, NULL),
	(9, 'Knowledge Management', NULL, 2, 9, 1, 0, NULL, NULL),
	(10, 'Revenue Assurance', NULL, 2, 10, 1, 0, NULL, NULL),
	(11, 'Fraud Management', NULL, 2, 11, 1, 0, NULL, NULL),
	(12, 'Asset Management', NULL, 2, 12, 1, 0, NULL, NULL),
	(13, 'Business Process Management', NULL, 2, 13, 1, 0, NULL, NULL),
	(14, 'Enterprise Applications Integration', NULL, 2, 14, 1, 0, NULL, NULL),
	(15, 'Mediation', NULL, 6, 15, 1, 0, NULL, NULL),
	(16, 'Traffic Management', NULL, 6, 16, 1, 0, NULL, NULL),
	(17, 'Activation', NULL, 6, 17, 1, 0, NULL, NULL),
	(18, 'Network Management', NULL, 6, 18, 1, 0, NULL, NULL),
	(19, 'Network Inventory', NULL, 6, 19, 1, 0, NULL, NULL),
	(20, 'Performance Management', NULL, 6, 20, 1, 0, NULL, NULL),
	(21, 'Telecoms Network Components', NULL, 6, 21, 1, 0, NULL, NULL),
	(22, 'DCS', NULL, 4, 22, 1, 0, NULL, NULL),
	(23, 'Safety Systems', NULL, 4, 23, 1, 0, NULL, NULL),
	(24, 'Advanced Process Solutions', NULL, 4, 24, 1, 0, NULL, NULL),
	(25, 'Operator Training System', NULL, 4, 25, 1, 0, NULL, NULL),
	(26, 'Turbine Control Systems', NULL, 4, 27, 1, 0, NULL, NULL),
	(27, 'AMI', NULL, 5, 26, 1, 0, NULL, NULL),
	(28, 'Leak Detection', NULL, 5, 28, 1, 0, NULL, NULL),
	(29, 'SCADA', NULL, 5, 29, 1, 0, NULL, NULL),
	(30, 'PLC', NULL, 5, 30, 1, 0, NULL, NULL),
	(31, 'PLC Smart Buildings', NULL, 6, 31, 1, 0, NULL, NULL),
	(32, 'BMS', NULL, 6, 32, 1, 0, NULL, NULL),
	(33, 'Fire Fighting', NULL, 6, 33, 1, 0, NULL, NULL),
	(34, 'Access & Security', NULL, 6, 34, 1, 0, NULL, NULL),
	(35, 'Home Automation', NULL, 6, 35, 1, 0, NULL, NULL),
	(36, 'Power Protection', NULL, 9, 36, 1, 0, NULL, NULL),
	(37, 'Power Distribution Panel', NULL, 9, 37, 1, 0, NULL, NULL),
	(38, 'Power Line Carrier', NULL, 9, 38, 1, 0, NULL, NULL),
	(39, 'OPGW', NULL, 9, 39, 1, 0, NULL, NULL),
	(40, 'Overhead Transmission Lines', NULL, 9, 40, 1, 0, NULL, NULL),
	(41, 'Data Center  Solutions', NULL, 11, 41, 1, 0, NULL, NULL),
	(42, 'Contact Centers', NULL, 11, 42, 1, 0, NULL, NULL),
	(43, 'Telecom Infrastructure', NULL, 11, 43, 1, 0, NULL, NULL),
	(44, 'Field Solutions', NULL, 10, 44, 1, 0, NULL, NULL);
/*!40000 ALTER TABLE `hr_business_line` ENABLE KEYS */;


-- Dumping structure for table giza.hr_candidate
CREATE TABLE IF NOT EXISTS `hr_candidate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `nationality_id` int(11) unsigned DEFAULT '0',
  `country_id` int(11) unsigned DEFAULT '0',
  `address` tinytext,
  `p_o_box` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `maritalstatus_id` int(11) unsigned DEFAULT '0',
  `dependants_count` int(11) unsigned DEFAULT '0',
  `militarystatus_id` int(11) unsigned DEFAULT '0',
  `car_owner` enum('Yes','No') DEFAULT NULL,
  `driving_license` enum('Yes','No') DEFAULT NULL,
  `communication_channel_id` int(11) unsigned DEFAULT '0',
  `position_apply_for` varchar(50) DEFAULT NULL,
  `employment_type_id` int(11) unsigned DEFAULT '0',
  `how_soon_can_you_join` int(11) DEFAULT NULL,
  `giza_city_id` int(11) unsigned DEFAULT '0',
  `willing_to_travel` enum('Yes','No') DEFAULT NULL,
  `contact_with_giza_by_id` int(11) unsigned DEFAULT '0',
  `degree_id` int(11) DEFAULT '0',
  `university_id` int(11) DEFAULT '0',
  `faculty_id` int(11) DEFAULT '0',
  `major_id` int(11) DEFAULT '0',
  `university_completion_date` date DEFAULT NULL,
  `grade_id` varchar(50) DEFAULT NULL,
  `postgraduate_name1` varchar(255) DEFAULT NULL,
  `postgraduate_field1` varchar(255) DEFAULT NULL,
  `postgraduate_date1` date DEFAULT NULL,
  `postgraduate_certificate1` varchar(255) DEFAULT NULL,
  `postgraduate_country1_id` int(11) DEFAULT '0',
  `postgraduate_name2` varchar(255) DEFAULT NULL,
  `postgraduate_field2` varchar(255) DEFAULT NULL,
  `postgraduate_date2` date DEFAULT NULL,
  `postgraduate_certificate2` varchar(255) DEFAULT NULL,
  `postgraduate_country2_id` int(11) unsigned DEFAULT '0',
  `postgraduate_name3` varchar(255) DEFAULT NULL,
  `postgraduate_field3` varchar(255) DEFAULT NULL,
  `postgraduate_date3` date DEFAULT NULL,
  `postgraduate_certificate3` varchar(255) DEFAULT NULL,
  `postgraduate_country_id3` int(11) DEFAULT '0',
  `other_qualifications` text,
  `other_academic_education` text,
  `line_of_business_id` int(11) DEFAULT NULL,
  `line_of_business_experience_year` varchar(50) DEFAULT NULL,
  `industry_id` int(11) DEFAULT NULL,
  `expertise_industry_experience_year` varchar(50) DEFAULT NULL,
  `language1_id` int(11) DEFAULT NULL,
  `language_level1_id` int(11) DEFAULT NULL,
  `language2_id` int(11) DEFAULT NULL,
  `language_level2_id` int(11) DEFAULT NULL,
  `language3_id` int(11) DEFAULT NULL,
  `language_level3_id` int(11) DEFAULT NULL,
  `computer_skills` text,
  `training_course1_name` varchar(200) DEFAULT NULL,
  `training_course1_location` varchar(200) DEFAULT NULL,
  `training_course1_duration` varchar(200) DEFAULT NULL,
  `training_course2_name` varchar(200) DEFAULT NULL,
  `training_course2_location` varchar(200) DEFAULT NULL,
  `training_course2_duration` varchar(200) DEFAULT NULL,
  `training_course3_name` varchar(200) DEFAULT NULL,
  `training_course3_location` varchar(200) DEFAULT NULL,
  `training_course3_duration` varchar(200) DEFAULT NULL,
  `professional_experience_years` int(11) unsigned DEFAULT '0',
  `student_internship_experience_years` int(11) unsigned DEFAULT '0',
  `job1_title` varchar(200) DEFAULT NULL,
  `job1_employer` varchar(200) DEFAULT NULL,
  `job1_duration` varchar(200) DEFAULT NULL,
  `job1_duties` text,
  `job2_title` varchar(50) DEFAULT NULL,
  `job2_employer` varchar(50) DEFAULT NULL,
  `job2_duration` varchar(50) DEFAULT NULL,
  `job2_duties` text,
  `job3_title` varchar(50) DEFAULT NULL,
  `job3_employer` varchar(50) DEFAULT NULL,
  `job3_duration` varchar(50) DEFAULT NULL,
  `job3_duties` text,
  `reference1_name` varchar(50) DEFAULT NULL,
  `reference1_position` varchar(50) DEFAULT NULL,
  `reference1_organization` varchar(50) DEFAULT NULL,
  `reference1_phone` varchar(50) DEFAULT NULL,
  `reference1_email` varchar(50) DEFAULT NULL,
  `reference2_name` varchar(50) DEFAULT NULL,
  `reference2_position` varchar(50) DEFAULT NULL,
  `reference2_organization` varchar(50) DEFAULT NULL,
  `reference2_phone` varchar(50) DEFAULT NULL,
  `reference2_email` varchar(50) DEFAULT NULL,
  `reference3_name` varchar(50) DEFAULT NULL,
  `reference3_position` varchar(50) DEFAULT NULL,
  `reference3_organization` varchar(50) DEFAULT NULL,
  `reference3_phone` varchar(50) DEFAULT NULL,
  `reference3_email` varchar(50) DEFAULT NULL,
  `relative1_name` varchar(50) DEFAULT NULL,
  `relative1_department` varchar(50) DEFAULT NULL,
  `relative2_name` varchar(50) DEFAULT NULL,
  `relative2_department` varchar(50) DEFAULT NULL,
  `reason_for_leaving_current_employer` tinytext,
  `commit_years` enum('Yes','No') DEFAULT NULL,
  `immigrate` enum('Yes','No') DEFAULT NULL,
  `immigrate_yes` varchar(250) DEFAULT NULL,
  `relocating` enum('Yes','No') DEFAULT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `hobbies` text,
  `professional_memberships` text,
  `extra_activities` text,
  `cv_file` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `job_notification_mail` tinyint(4) DEFAULT NULL,
  `registeration_datetime` datetime NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `active_code` varchar(50) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.hr_candidate: 7 rows
/*!40000 ALTER TABLE `hr_candidate` DISABLE KEYS */;
INSERT INTO `hr_candidate` (`id`, `username`, `password`, `firstname`, `middlename`, `lastname`, `gender`, `birthdate`, `nationality_id`, `country_id`, `address`, `p_o_box`, `city`, `phone`, `mobile`, `email`, `maritalstatus_id`, `dependants_count`, `militarystatus_id`, `car_owner`, `driving_license`, `communication_channel_id`, `position_apply_for`, `employment_type_id`, `how_soon_can_you_join`, `giza_city_id`, `willing_to_travel`, `contact_with_giza_by_id`, `degree_id`, `university_id`, `faculty_id`, `major_id`, `university_completion_date`, `grade_id`, `postgraduate_name1`, `postgraduate_field1`, `postgraduate_date1`, `postgraduate_certificate1`, `postgraduate_country1_id`, `postgraduate_name2`, `postgraduate_field2`, `postgraduate_date2`, `postgraduate_certificate2`, `postgraduate_country2_id`, `postgraduate_name3`, `postgraduate_field3`, `postgraduate_date3`, `postgraduate_certificate3`, `postgraduate_country_id3`, `other_qualifications`, `other_academic_education`, `line_of_business_id`, `line_of_business_experience_year`, `industry_id`, `expertise_industry_experience_year`, `language1_id`, `language_level1_id`, `language2_id`, `language_level2_id`, `language3_id`, `language_level3_id`, `computer_skills`, `training_course1_name`, `training_course1_location`, `training_course1_duration`, `training_course2_name`, `training_course2_location`, `training_course2_duration`, `training_course3_name`, `training_course3_location`, `training_course3_duration`, `professional_experience_years`, `student_internship_experience_years`, `job1_title`, `job1_employer`, `job1_duration`, `job1_duties`, `job2_title`, `job2_employer`, `job2_duration`, `job2_duties`, `job3_title`, `job3_employer`, `job3_duration`, `job3_duties`, `reference1_name`, `reference1_position`, `reference1_organization`, `reference1_phone`, `reference1_email`, `reference2_name`, `reference2_position`, `reference2_organization`, `reference2_phone`, `reference2_email`, `reference3_name`, `reference3_position`, `reference3_organization`, `reference3_phone`, `reference3_email`, `relative1_name`, `relative1_department`, `relative2_name`, `relative2_department`, `reason_for_leaving_current_employer`, `commit_years`, `immigrate`, `immigrate_yes`, `relocating`, `salary`, `hobbies`, `professional_memberships`, `extra_activities`, `cv_file`, `image`, `job_notification_mail`, `registeration_datetime`, `active`, `active_code`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, '215o', '1KBybi3', '2', '2', '2', 'Male', '0000-00-00', 0, 0, '2', '2', '2', '2', '2', 'gouda@4jawaly.com', 1, 2, 1, 'Yes', 'Yes', 0, '', 0, 0, 0, 'Yes', 0, 2, 24, 2, 2, '2013-04-23', '3', '', '', '2013-04-15', '', 0, '', '', '0000-00-00', '', 0, '', '', '0000-00-00', '', 0, '', '', 0, '9', 6, '8', 1, 3, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'Yes', '', 'Yes', '', '', '', '', '', '', 0, '2013-04-26 21:52:57', 1, 'admin', 1, 0, 1, '2013-04-26 21:52:57'),
	(2, 'sasasmkl', 'mg74bw1', 'sasas', 'sasa', 'sasas', 'Male', '0000-00-00', 0, 0, '2', '2', '2', '2', '2', 'gouda@4jawaly.com', 2, 2, 1, 'Yes', 'Yes', 2, '2', 0, 0, 0, 'Yes', 0, 3, 25, 1, 1, '0000-00-00', '2', '', '', '0000-00-00', '', 0, '', '', '0000-00-00', '', 0, '', '', '0000-00-00', '', 0, '', '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'Yes', '', 'Yes', '', '', '', '', '', '', 0, '2013-04-26 17:24:18', 0, '0nt5JHvcUy2YSN9', 0, 1, 1, '2013-04-26 21:28:32'),
	(3, '', '', 'ssssss', 'ssssss', 'sssssss', 'Female', '2013-04-09', 246, 243, '2', '2', '2', '2', '2', 'goudaelalfy@rereer.com', 2, 2, 1, 'Yes', 'Yes', 0, '2', 0, 0, 0, 'Yes', 0, 3, 11, 2, 2, '0000-00-00', '3', '', '', '0000-00-00', '', 0, '', '', '0000-00-00', '', 0, '', '', '0000-00-00', '', 0, '', '', 20, '9', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'Yes', '', 'Yes', '', '', '', '', NULL, NULL, 0, '2013-04-26 21:52:17', 1, 'admin', 1, 0, 1, '2013-04-26 21:52:17'),
	(4, 'gouda2bu', 'MBNlKWe', 'gouda', 'g', 'Elalfy', 'Male', '2013-04-16', 245, 245, 'address', '', 'ddfd', '212', '2', 'goudaelalfy@hotmail.comd', 3, 12, 1, 'Yes', 'Yes', 0, '', 0, 0, 0, 'Yes', 0, 2, 24, 1, 2, '0000-00-00', '3', '', '', '0000-00-00', '', 0, '', '', '0000-00-00', '', 0, '', '', '0000-00-00', '', 0, '', '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'Yes', '', 'Yes', '', '', '', '', '', '', 0, '2013-04-26 21:55:19', 0, 'ngGwQWFCabOylct', 0, 0, NULL, NULL),
	(5, 'goudaSVn', 'chDO2Y5', 'gouda', '2', '2', 'Male', '0000-00-00', 0, 0, '2', '2', '2', '2', '2', 'goudaelalfy@hotmail.comd', 3, 2, 1, 'Yes', 'Yes', 0, '2', 0, 0, 0, 'Yes', 0, 3, 24, 1, 1, '0000-00-00', '3', '', '', '0000-00-00', '', 0, '', '', '0000-00-00', '', 0, '', '', '0000-00-00', '', 0, '', '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'Yes', '', 'Yes', '', '', '', '', '', '', 0, '2013-04-26 21:58:16', 0, 'RZzp21fqEDAB6Wx', 0, 0, NULL, NULL),
	(6, 'goudakSc', 'NsG6Vao', 'gouda', '2', '2', 'Male', '0000-00-00', 0, 0, '2', '2', '2', '2', '2', 'goudaelalfy@hotmail.comd', 3, 2, 1, 'Yes', 'Yes', 0, '2', 0, 0, 0, 'Yes', 0, 3, 24, 1, 1, '0000-00-00', '3', '', '', '0000-00-00', '', 0, '', '', '0000-00-00', '', 0, '', '', '0000-00-00', '', 0, '', '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'Yes', '', 'Yes', '', '', '', '', '', '', 0, '2013-04-26 21:58:57', 0, '1IHDCSy3tFdbfhq', 0, 0, NULL, NULL),
	(7, 'c1', 'c1', '2', '2', '2', 'Male', '0000-00-00', 0, 245, '2', '2', '2', '2', '2', 'goudaelalfy@hotmail.com', 3, 2, 1, 'Yes', 'Yes', 0, '', 0, 0, 0, 'Yes', 0, 2, 26, 1, 2, '0000-00-00', '3', '', '', '0000-00-00', '', 0, '', '', '0000-00-00', '', 0, '', '', '0000-00-00', '', 0, '', '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'Yes', '', 'Yes', '', '', '', '', '', '', 0, '2013-04-26 22:02:01', 1, 'v6oLxiCSABNlFyt', 1, 0, 1, '2013-04-28 23:06:13');
/*!40000 ALTER TABLE `hr_candidate` ENABLE KEYS */;


-- Dumping structure for table giza.hr_candidate_job
CREATE TABLE IF NOT EXISTS `hr_candidate_job` (
  `candidate_id` int(10) NOT NULL,
  `job_id` int(10) NOT NULL,
  PRIMARY KEY (`candidate_id`,`job_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table giza.hr_candidate_job: 2 rows
/*!40000 ALTER TABLE `hr_candidate_job` DISABLE KEYS */;
INSERT INTO `hr_candidate_job` (`candidate_id`, `job_id`) VALUES
	(7, 1),
	(7, 2);
/*!40000 ALTER TABLE `hr_candidate_job` ENABLE KEYS */;


-- Dumping structure for table giza.hr_city_preferred_to_work
CREATE TABLE IF NOT EXISTS `hr_city_preferred_to_work` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.hr_city_preferred_to_work: 7 rows
/*!40000 ALTER TABLE `hr_city_preferred_to_work` DISABLE KEYS */;
INSERT INTO `hr_city_preferred_to_work` (`id`, `name`, `name_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'Al Doha', NULL, 6, 1, 0, 1, '2013-04-21 21:47:40'),
	(2, 'Al Khobar', NULL, 5, 1, 0, 1, '2013-04-21 21:47:24'),
	(3, 'Cairo', NULL, 4, 1, 0, 1, '2013-04-21 10:19:12'),
	(4, 'Dubai', NULL, 3, 1, 0, 1, '2013-04-21 09:31:27'),
	(5, 'Jeddah', 'Jeddah', 2, 1, 0, 1, '2013-04-21 21:58:04'),
	(6, 'Riyadh', '', 1, 1, 0, 1, '2013-04-21 21:11:24'),
	(7, 'Giza', 'Giza', NULL, 1, 1, 1, '2013-04-21 21:57:28');
/*!40000 ALTER TABLE `hr_city_preferred_to_work` ENABLE KEYS */;


-- Dumping structure for table giza.hr_communication_channel
CREATE TABLE IF NOT EXISTS `hr_communication_channel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.hr_communication_channel: 2 rows
/*!40000 ALTER TABLE `hr_communication_channel` DISABLE KEYS */;
INSERT INTO `hr_communication_channel` (`id`, `name`, `name_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'Mail', NULL, NULL, 1, 0, 1, '2013-04-21 21:43:38'),
	(2, 'Phone', NULL, NULL, 1, 0, 1, '2013-04-21 21:39:12');
/*!40000 ALTER TABLE `hr_communication_channel` ENABLE KEYS */;


-- Dumping structure for table giza.hr_contact_with_giza_by
CREATE TABLE IF NOT EXISTS `hr_contact_with_giza_by` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.hr_contact_with_giza_by: 2 rows
/*!40000 ALTER TABLE `hr_contact_with_giza_by` DISABLE KEYS */;
INSERT INTO `hr_contact_with_giza_by` (`id`, `name`, `name_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'Event', NULL, NULL, 1, 0, 1, '2013-04-21 21:45:36'),
	(2, 'Friend', NULL, NULL, 1, 0, 1, '2013-04-21 21:44:37');
/*!40000 ALTER TABLE `hr_contact_with_giza_by` ENABLE KEYS */;


-- Dumping structure for table giza.hr_degree
CREATE TABLE IF NOT EXISTS `hr_degree` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.hr_degree: 3 rows
/*!40000 ALTER TABLE `hr_degree` DISABLE KEYS */;
INSERT INTO `hr_degree` (`id`, `name`, `name_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'Doctorate', NULL, NULL, 1, 0, 1, '2013-04-21 21:58:27'),
	(2, 'Masters', NULL, NULL, 1, 0, 1, '2013-04-21 21:58:27'),
	(3, 'Bachelors', NULL, NULL, 1, 0, 1, '2013-04-21 21:58:27');
/*!40000 ALTER TABLE `hr_degree` ENABLE KEYS */;


-- Dumping structure for table giza.hr_department
CREATE TABLE IF NOT EXISTS `hr_department` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.hr_department: 5 rows
/*!40000 ALTER TABLE `hr_department` DISABLE KEYS */;
INSERT INTO `hr_department` (`id`, `name`, `name_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'Administration', NULL, NULL, 1, 0, 1, '2013-04-21 21:52:06'),
	(2, 'Finance', NULL, NULL, 1, 0, 1, '2013-04-21 21:52:02'),
	(3, 'HR', NULL, NULL, 1, 0, 1, '2013-04-21 21:51:59'),
	(4, 'Marketing', NULL, NULL, 1, 0, 1, '2013-04-21 21:47:14'),
	(5, 'IT ', NULL, NULL, 1, 0, 1, '2013-04-21 21:45:43');
/*!40000 ALTER TABLE `hr_department` ENABLE KEYS */;


-- Dumping structure for table giza.hr_employment_status
CREATE TABLE IF NOT EXISTS `hr_employment_status` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.hr_employment_status: 4 rows
/*!40000 ALTER TABLE `hr_employment_status` DISABLE KEYS */;
INSERT INTO `hr_employment_status` (`id`, `name`, `name_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'Full-time', NULL, NULL, 1, 0, 1, '2013-04-21 21:52:21'),
	(2, 'Part-time', NULL, NULL, 1, 0, 1, '2013-04-21 21:52:24'),
	(3, 'Temporary', NULL, NULL, 1, 0, 1, '2013-04-21 21:52:27'),
	(4, 'Itern', NULL, NULL, 1, 0, 1, '2013-04-21 21:52:16');
/*!40000 ALTER TABLE `hr_employment_status` ENABLE KEYS */;


-- Dumping structure for table giza.hr_employment_type
CREATE TABLE IF NOT EXISTS `hr_employment_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.hr_employment_type: 2 rows
/*!40000 ALTER TABLE `hr_employment_type` DISABLE KEYS */;
INSERT INTO `hr_employment_type` (`id`, `name`, `name_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'Professional', NULL, NULL, 1, 0, 1, '2013-04-21 21:53:41'),
	(2, 'Internship', NULL, NULL, 1, 0, 1, '2013-04-21 21:53:38');
/*!40000 ALTER TABLE `hr_employment_type` ENABLE KEYS */;


-- Dumping structure for table giza.hr_experience_year
CREATE TABLE IF NOT EXISTS `hr_experience_year` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.hr_experience_year: 11 rows
/*!40000 ALTER TABLE `hr_experience_year` DISABLE KEYS */;
INSERT INTO `hr_experience_year` (`id`, `name`, `name_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, '1', '1', NULL, 1, 0, NULL, NULL),
	(2, '2', '2', NULL, 1, 0, NULL, NULL),
	(3, '3', '3', NULL, 1, 0, NULL, NULL),
	(4, '4', '4', NULL, 1, 0, NULL, NULL),
	(5, '5', '5', NULL, 1, 0, NULL, NULL),
	(6, '6', '6', NULL, 1, 0, NULL, NULL),
	(7, '7', '7', NULL, 1, 0, NULL, NULL),
	(8, '8', '8', NULL, 1, 0, NULL, NULL),
	(9, '9', '9', 3, 1, 0, NULL, NULL),
	(10, '10', '10', 1, 1, 0, NULL, NULL),
	(11, 'More than 10', 'اكثر من 10', 1, 1, 0, NULL, NULL);
/*!40000 ALTER TABLE `hr_experience_year` ENABLE KEYS */;


-- Dumping structure for table giza.hr_faculty
CREATE TABLE IF NOT EXISTS `hr_faculty` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.hr_faculty: 2 rows
/*!40000 ALTER TABLE `hr_faculty` DISABLE KEYS */;
INSERT INTO `hr_faculty` (`id`, `name`, `name_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'Engineering', NULL, NULL, 1, 0, 1, '2013-04-21 21:53:49'),
	(2, 'Commerce', NULL, NULL, 1, 0, 1, '2013-04-21 21:53:47');
/*!40000 ALTER TABLE `hr_faculty` ENABLE KEYS */;


-- Dumping structure for table giza.hr_grade
CREATE TABLE IF NOT EXISTS `hr_grade` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.hr_grade: 4 rows
/*!40000 ALTER TABLE `hr_grade` DISABLE KEYS */;
INSERT INTO `hr_grade` (`id`, `name`, `name_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'Pass', NULL, NULL, 1, 0, 1, '2013-04-21 21:53:59'),
	(2, 'Good', NULL, NULL, 1, 0, 1, '2013-04-21 21:54:02'),
	(3, 'Very good', NULL, NULL, 1, 0, 1, '2013-04-21 21:53:57'),
	(4, 'Excellent', NULL, NULL, 1, 0, 1, '2013-04-21 21:53:54');
/*!40000 ALTER TABLE `hr_grade` ENABLE KEYS */;


-- Dumping structure for table giza.hr_job
CREATE TABLE IF NOT EXISTS `hr_job` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) NOT NULL,
  `seo_words` tinytext NOT NULL,
  `seo_words_ar` tinytext NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `reference_ar` varchar(255) DEFAULT NULL,
  `hr_employment_status_id` int(11) DEFAULT NULL,
  `hr_city_preferred_to_work_id` int(11) DEFAULT NULL,
  `hr_department_id` int(11) DEFAULT NULL,
  `description` text,
  `description_ar` text,
  `industry_id` int(11) DEFAULT NULL,
  `solution_id` int(11) DEFAULT NULL,
  `line_of_business_id` int(11) DEFAULT NULL,
  `qualifications` text,
  `qualifications_ar` text,
  `hr_employment_type_id` int(11) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `approved` tinyint(4) NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `last_user_id` int(11) NOT NULL,
  `last_modify_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.hr_job: ~3 rows (approximately)
/*!40000 ALTER TABLE `hr_job` DISABLE KEYS */;
INSERT INTO `hr_job` (`id`, `alias`, `seo_words`, `seo_words_ar`, `title`, `title_ar`, `reference`, `reference_ar`, `hr_employment_status_id`, `hr_city_preferred_to_work_id`, `hr_department_id`, `description`, `description_ar`, `industry_id`, `solution_id`, `line_of_business_id`, `qualifications`, `qualifications_ar`, `hr_employment_type_id`, `date_from`, `date_to`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'job 1', '', '', 'Job 1', 'Job 1', '', '', 0, 3, 4, '<p>Description</p>', '<p>Description</p>', 7, 11, 42, '', '', 1, '2013-04-25', '2013-04-30', 1, 1, 0, 1, '2013-04-28 20:28:51'),
	(2, 'job 2', '', '', 'job 2', 'Job 2', '', '', 4, 5, 3, '', '', 7, 2, 2, '', '', 2, '2013-04-01', '2013-04-30', 2, 1, 0, 1, '2013-04-28 23:07:37'),
	(3, 'job3', '', '', 'Job 3', 'Job 3', '', '', 3, 4, 4, '', '<p>Job 3 Job 3</p>', 0, 0, 0, '', '<p>&nbsp;Job 3 Job 3</p>', 0, '2013-04-26', '2013-04-30', 3, 1, 0, 1, '2013-04-26 23:18:04');
/*!40000 ALTER TABLE `hr_job` ENABLE KEYS */;


-- Dumping structure for table giza.hr_language
CREATE TABLE IF NOT EXISTS `hr_language` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.hr_language: 2 rows
/*!40000 ALTER TABLE `hr_language` DISABLE KEYS */;
INSERT INTO `hr_language` (`id`, `name`, `name_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'Arabic', NULL, NULL, 1, 0, 1, '2013-04-21 21:54:11'),
	(2, 'English', NULL, NULL, 1, 0, 1, '2013-04-21 21:54:08');
/*!40000 ALTER TABLE `hr_language` ENABLE KEYS */;


-- Dumping structure for table giza.hr_language_level
CREATE TABLE IF NOT EXISTS `hr_language_level` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.hr_language_level: 4 rows
/*!40000 ALTER TABLE `hr_language_level` DISABLE KEYS */;
INSERT INTO `hr_language_level` (`id`, `name`, `name_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'Pass', NULL, NULL, 1, 0, 1, '2013-04-21 21:54:26'),
	(2, 'Good', NULL, NULL, 1, 0, 1, '2013-04-21 21:54:24'),
	(3, 'Very good', NULL, NULL, 1, 0, 1, '2013-04-21 21:54:22'),
	(4, 'Excellent', NULL, NULL, 1, 0, 1, '2013-04-21 21:54:20');
/*!40000 ALTER TABLE `hr_language_level` ENABLE KEYS */;


-- Dumping structure for table giza.hr_main_table
CREATE TABLE IF NOT EXISTS `hr_main_table` (
  `table_name` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `title_ar` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table giza.hr_main_table: 16 rows
/*!40000 ALTER TABLE `hr_main_table` DISABLE KEYS */;
INSERT INTO `hr_main_table` (`table_name`, `title`, `title_ar`) VALUES
	('hr_city_preferred_to_work', 'Cities', NULL),
	('hr_communication_channel', 'Communication channels', NULL),
	('hr_contact_with_giza_by', 'Hear about us by', NULL),
	('hr_degree', 'Degrees', NULL),
	('hr_department', 'Departments', NULL),
	('hr_employment_status', 'Employment status', NULL),
	('hr_employment_type', 'Employment type', NULL),
	('hr_faculty', 'Faculty', NULL),
	('hr_grade', 'Grade', NULL),
	('hr_language', 'Language', NULL),
	('hr_language_level', 'Language levels', NULL),
	('hr_major', 'Major', NULL),
	('hr_marital_status', 'Martial status', NULL),
	('hr_military_status', 'Militay status', NULL),
	('hr_time_to_join', 'Time to join us', NULL),
	('hr_university', 'Universities', NULL);
/*!40000 ALTER TABLE `hr_main_table` ENABLE KEYS */;


-- Dumping structure for table giza.hr_major
CREATE TABLE IF NOT EXISTS `hr_major` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.hr_major: 2 rows
/*!40000 ALTER TABLE `hr_major` DISABLE KEYS */;
INSERT INTO `hr_major` (`id`, `name`, `name_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'Communications', NULL, NULL, 1, 0, 1, '2013-04-21 21:47:31'),
	(2, 'Electronics', NULL, NULL, 1, 0, 1, '2013-04-21 21:54:32');
/*!40000 ALTER TABLE `hr_major` ENABLE KEYS */;


-- Dumping structure for table giza.hr_marital_status
CREATE TABLE IF NOT EXISTS `hr_marital_status` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.hr_marital_status: 3 rows
/*!40000 ALTER TABLE `hr_marital_status` DISABLE KEYS */;
INSERT INTO `hr_marital_status` (`id`, `name`, `name_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'Single', NULL, NULL, 1, 0, 1, '2013-04-21 21:54:39'),
	(2, 'Engaged', NULL, NULL, 1, 0, 1, '2013-04-21 21:47:36'),
	(3, 'Married', NULL, NULL, 1, 0, 1, '2013-04-21 21:54:37');
/*!40000 ALTER TABLE `hr_marital_status` ENABLE KEYS */;


-- Dumping structure for table giza.hr_military_status
CREATE TABLE IF NOT EXISTS `hr_military_status` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.hr_military_status: 1 rows
/*!40000 ALTER TABLE `hr_military_status` DISABLE KEYS */;
INSERT INTO `hr_military_status` (`id`, `name`, `name_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'Postponed', 'Postponed', NULL, 1, 0, 1, '2013-04-21 21:56:50');
/*!40000 ALTER TABLE `hr_military_status` ENABLE KEYS */;


-- Dumping structure for table giza.hr_time_to_join
CREATE TABLE IF NOT EXISTS `hr_time_to_join` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.hr_time_to_join: 4 rows
/*!40000 ALTER TABLE `hr_time_to_join` DISABLE KEYS */;
INSERT INTO `hr_time_to_join` (`id`, `name`, `name_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, '1 Month', NULL, NULL, 1, 0, 1, '2013-04-21 21:54:52'),
	(2, '2 Months', NULL, NULL, 1, 0, 1, '2013-04-21 21:54:54'),
	(3, '3 Months', NULL, NULL, 1, 0, 1, '2013-04-21 21:47:46'),
	(4, 'More than 3 Months', NULL, NULL, 1, 0, 1, '2013-04-21 21:54:57');
/*!40000 ALTER TABLE `hr_time_to_join` ENABLE KEYS */;


-- Dumping structure for table giza.hr_university
CREATE TABLE IF NOT EXISTS `hr_university` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.hr_university: 26 rows
/*!40000 ALTER TABLE `hr_university` DISABLE KEYS */;
INSERT INTO `hr_university` (`id`, `name`, `name_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, ' Cairo University ', NULL, NULL, 1, 0, NULL, NULL),
	(2, 'Ain Shams University', NULL, 27, 1, 0, NULL, NULL),
	(3, 'American University in Cairo (AUC)', NULL, 25, 1, 0, NULL, NULL),
	(4, 'German University in Cairo (GUC)', NULL, 26, 1, 0, NULL, NULL),
	(5, 'French University in Cairo', NULL, 24, 1, 0, NULL, NULL),
	(7, 'Misr International University', NULL, 22, 1, 0, NULL, NULL),
	(8, 'Nile University', NULL, 20, 1, 0, 1, '2013-04-21 21:56:07'),
	(9, 'Alexandria University', NULL, 19, 1, 0, NULL, NULL),
	(10, 'Assiut University', NULL, 18, 1, 0, NULL, NULL),
	(11, 'Aswan University', NULL, 17, 1, 0, NULL, NULL),
	(12, 'Al Azhar University', NULL, 16, 1, 0, NULL, NULL),
	(13, 'Banha University', NULL, 15, 1, 0, NULL, NULL),
	(14, 'Beni Suef University', NULL, 14, 1, 0, NULL, NULL),
	(15, 'Helwan University', NULL, 13, 1, 0, NULL, NULL),
	(16, 'Mansoura University', NULL, 12, 1, 0, NULL, NULL),
	(17, 'Sadat Academy for Management Sciences', NULL, 11, 1, 0, NULL, NULL),
	(18, 'Ahram Canadian University', NULL, 10, 1, 0, NULL, NULL),
	(19, 'British University in Egypt', NULL, 9, 1, 0, NULL, NULL),
	(20, 'Canadian International College', NULL, 8, 1, 0, NULL, NULL),
	(21, 'El Asher University', NULL, 7, 1, 0, NULL, NULL),
	(22, 'Future Academy', NULL, 6, 1, 0, NULL, NULL),
	(23, 'Future University in Egypt', NULL, 5, 1, 0, NULL, NULL),
	(24, 'October 6 University', NULL, 4, 1, 0, 1, '2013-04-21 21:55:24'),
	(25, 'Modern Sciences and Arts University', NULL, 3, 1, 0, 1, '2013-04-21 21:55:08'),
	(26, 'Misr University for Science and Technology', NULL, 2, 1, 0, 1, '2013-04-21 21:55:27'),
	(27, 'Arab Academy for Science and Technology and Maritime Transport', NULL, 1, 1, 0, 1, '2013-04-21 21:55:04');
/*!40000 ALTER TABLE `hr_university` ENABLE KEYS */;


-- Dumping structure for table giza.industry
CREATE TABLE IF NOT EXISTS `industry` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `alias` varchar(250) NOT NULL,
  `menu_icon` tinytext,
  `banner_image_thumbs` text,
  `banner_files` text,
  `banner_image_thumb_selected` tinytext,
  `banner_file_selected` tinytext,
  `title` varchar(250) DEFAULT NULL,
  `title_ar` varchar(250) DEFAULT NULL,
  `seo_words` tinytext,
  `seo_words_ar` tinytext,
  `brief` text,
  `brief_ar` text,
  `body` text,
  `body_ar` text,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.industry: 7 rows
/*!40000 ALTER TABLE `industry` DISABLE KEYS */;
INSERT INTO `industry` (`id`, `alias`, `menu_icon`, `banner_image_thumbs`, `banner_files`, `banner_image_thumb_selected`, `banner_file_selected`, `title`, `title_ar`, `seo_words`, `seo_words_ar`, `brief`, `brief_ar`, `body`, `body_ar`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(2, 'power', '/added/uploads/banner/industry/1363632341award.png', '', '', '', '', 'Power', 'Power', '', '', '', '', '<p  justify;">Our integrated solutions improve the operational efficiency of the Water sector and provide it with the sufficient infrastructure for market stabilization, and improved coordination for the supply of resources.</p>\r\n<p  justify;">Our integrated systems consist of end-to-end solutions that cover all vital functions within an organization.</p>\r\n<p  justify;">We are experts in transferring both knowledge and technology to the regional Utilities sector in areas such as:</p>\r\n<ul>\r\n<li  justify;">Power Generation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>\r\n<li  justify;">Power Transmission</li>\r\n<li  justify;">Power Distribution</li>\r\n</ul>\r\n<p  justify;">From systems that control generation processes and communication systems, to&nbsp;transmission and distribution solutions, Giza Systems offers a wide range of equipment and&nbsp;technology solutions that enable the power industry ensure consistent, reliable, and cost&nbsp;effective processes.</p>', '<p  justify;">Our integrated solutions improve the operational efficiency of the Water sector and provide it with the sufficient infrastructure for market stabilization, and improved coordination for the supply of resources.</p>\r\n<p  justify;">Our integrated systems consist of end-to-end solutions that cover all vital functions within an organization.</p>\r\n<p  justify;">We are experts in transferring both knowledge and technology to the regional Utilities sector in areas such as:</p>\r\n<ul>\r\n<li  justify;">Power Generation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>\r\n<li  justify;">Power Transmission</li>\r\n<li  justify;">Power Distribution</li>\r\n</ul>\r\n<p  justify;">From systems that control generation processes and communication systems, to&nbsp;transmission and distribution solutions, Giza Systems offers a wide range of equipment and&nbsp;technology solutions that enable the power industry ensure consistent, reliable, and cost&nbsp;effective processes.</p>', 1, 0, 1, '2013-03-18 20:45:41'),
	(4, 'enterprise', '/added/uploads/banner/industry/1363634557award.png', '', '', '', '', 'Enterprise', 'Enterprise', '', '', '', '', '<p  justify;">To meet head on the needs of enterprises, Giza Systems adopts a holistic approach in implementing and delivering large scale turnkey projects. Our expertise in systems integration enables us to handle all aspects of a project to include installation, commissioning, integration, training, and support.</p>\r\n<p  justify;">Drawing on our experience and in-depth knowledge in the different industries, we are able to cater to different &nbsp;sectors such as Ministries and Authorities, Defense, Health, Transportation, and Aviation.</p>\r\n<p  justify;">Our solutions portfolio includes Software Applications, IT Infrastructure Solutions and Services, IT Hardware, Systems Integration, and Project Management capabilities.</p>', '<p  justify;">To meet head on the needs of enterprises, Giza Systems adopts a holistic approach in implementing and delivering large scale turnkey projects. Our expertise in systems integration enables us to handle all aspects of a project to include installation, commissioning, integration, training, and support.</p>\r\n<p  justify;">Drawing on our experience and in-depth knowledge in the different industries, we are able to cater to different &nbsp;sectors such as Ministries and Authorities, Defense, Health, Transportation, and Aviation.</p>\r\n<p  justify;">Our solutions portfolio includes Software Applications, IT Infrastructure Solutions and Services, IT Hardware, Systems Integration, and Project Management capabilities.</p>', 1, 0, 1, '2013-03-18 21:22:37'),
	(3, 'water', '/added/uploads/banner/industry/1363632761award.png', '', '', '', '', 'Water', 'Water', '', '', '', '', '<p  justify;"><span  justify;">With the global challenge facing the water sector, operational efficiency is essential. Environmental, as well as economical, incentives have driven the industry to invest in incorporating dynamic systems and process control in their operations to ensure efficiency and achieve increased performance.</span></p>\r\n<p  justify;">Our expertise in the industry, coupled with our strong integration capbilities, enable us to leverage our knowledge in the industry and provide water companies with the necessary infrastructure and solutions.&nbsp;With our advanced and cost-effective services and solutions we help our clients improve and maintain the value and performance of their water treatment and distribution assets.</p>', '<p  justify;"><span  justify;">With the global challenge facing the water sector, operational efficiency is essential. Environmental, as well as economical, incentives have driven the industry to invest in incorporating dynamic systems and process control in their operations to ensure efficiency and achieve increased performance.</span></p>\r\n<p  justify;">Our expertise in the industry, coupled with our strong integration capbilities, enable us to leverage our knowledge in the industry and provide water companies with the necessary infrastructure and solutions.&nbsp;With our advanced and cost-effective services and solutions we help our clients improve and maintain the value and performance of their water treatment and distribution assets.</p>', 1, 0, 1, '2013-03-18 20:52:41'),
	(6, 'manufacturing', '/added/uploads/banner/industry/1363634978award.png', '', '', '', '', 'Manufacturing', 'Manufacturing', '', '', '', '', '<p  justify;">A pioneer in optimizing technology, Giza Systems presents its portfolio of advanced technological solutions specifically geared towards the manufacturing sector. With these solutions fully integrated into the manufacturer&rsquo;s business, our clients will be able to efficiently control and manage their operations.</p>\r\n<p  justify;">Giza Systems offers a portfolio of advanced technological solutions that serve a wide spectrum of industries. Covering both process manufacturing (e.g. chemical plants, food and beverage, fertilizer factories, iron and steel, etc&hellip;) our solutions are tailor-made to suit our clients&rsquo; most specific needs.</p>\r\n<p  justify;">Our advanced technological solutions portfolio is specifically geared towards the manufacturing sector. By fully integrating our solutions into the manufacturer&rsquo;s business, our clients will be able to efficiently control and manage their operations.</p>', '<p  justify;">A pioneer in optimizing technology, Giza Systems presents its portfolio of advanced technological solutions specifically geared towards the manufacturing sector. With these solutions fully integrated into the manufacturer&rsquo;s business, our clients will be able to efficiently control and manage their operations.</p>\r\n<p  justify;">Giza Systems offers a portfolio of advanced technological solutions that serve a wide spectrum of industries. Covering both process manufacturing (e.g. chemical plants, food and beverage, fertilizer factories, iron and steel, etc&hellip;) our solutions are tailor-made to suit our clients&rsquo; most specific needs.</p>\r\n<p  justify;">Our advanced technological solutions portfolio is specifically geared towards the manufacturing sector. By fully integrating our solutions into the manufacturer&rsquo;s business, our clients will be able to efficiently control and manage their operations.</p>', 1, 0, 1, '2013-03-18 21:29:38'),
	(7, 'oilgas', '/added/uploads/banner/industry/1363635352award.png', '', '', '', '', 'Oil & Gas', 'Oil & Gas', '', '', '', '', '<p  justify;">As the Oil and Gas industry increasingly becomes immersed with data and operating complexities, smart technologies are required. These technologies can work with existing investments and future installations alike.</p>\r\n<p  justify;">We provide Oil and Gas companies with integrated solutions that provide management and operators with the right tools and real-time data to optimize operations all across the phases of the process.</p>\r\n<p  justify;">Giza Systems offers solutions that serve production, refining, transportation, distribution, and petrochemical operations, as well as regulatory operations necessary for optimum results.</p>\r\n<p  justify;">Our comprehensive integrated solutions are designed to:</p>\r\n<ul>\r\n<li  justify;">Optimize operations</li>\r\n<li  justify;">Ensure full process automation</li>\r\n<li  justify;">Substantially improve the production processes, while maintaining a permanently safe and cost effective environment</li>\r\n</ul>\r\n<p  justify;">Amongst our solutions are Well-head Control Panels, Fire &amp; Gas (F&amp;G) Safety Systems, F&amp;G System Detectors and Emergency Shut Down (ESD) Systems.</p>\r\n<p  justify;">We also provide on-site professional services in this industry to implement the different solutions.</p>', '<p  justify;">As the Oil and Gas industry increasingly becomes immersed with data and operating complexities, smart technologies are required. These technologies can work with existing investments and future installations alike.</p>\r\n<p  justify;">We provide Oil and Gas companies with integrated solutions that provide management and operators with the right tools and real-time data to optimize operations all across the phases of the process.</p>\r\n<p  justify;">Giza Systems offers solutions that serve production, refining, transportation, distribution, and petrochemical operations, as well as regulatory operations necessary for optimum results.</p>\r\n<p  justify;">Our comprehensive integrated solutions are designed to:</p>\r\n<ul>\r\n<li  justify;">Optimize operations</li>\r\n<li  justify;">Ensure full process automation</li>\r\n<li  justify;">Substantially improve the production processes, while maintaining a permanently safe and cost effective environment</li>\r\n</ul>\r\n<p  justify;">Amongst our solutions are Well-head Control Panels, Fire &amp; Gas (F&amp;G) Safety Systems, F&amp;G System Detectors and Emergency Shut Down (ESD) Systems.</p>\r\n<p  justify;">We also provide on-site professional services in this industry to implement the different solutions.</p>', 1, 0, 1, '2013-03-18 21:35:52'),
	(8, 'telecom', '/added/uploads/banner/industry/1363635759award.png', '', '', '', '', 'Telecom', 'Telecom', '', '', '', '', '<p><span  #ff9900;">We assist the different segments of service providers in optimizing internal efficiencies and fulfilling customer and business requirements. Anticipating the needs and the overall direction of the industry has enabled us to develop an optimized solu</span>tions portfolio to align with the needs of the different segments.</p>\r\n<p>Business (Enterprise)</p>\r\n<ul>\r\n<li>Home</li>\r\n<li>We have strategically partnered with a number of top technology providers to ensure that our solutions are tailored to the needs of our customers, as well as enrich our offerings with flexibility and diversity.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Benefits</p>\r\n<p>Addressing customer needs while complying with regulations</p>\r\n<ul>\r\n<li>Improving profit margins</li>\r\n<li>Managing internal processes</li>\r\n<li>&nbsp;</li>\r\n</ul>\r\n<p>&nbsp;</p>', '<p>We assist the different segments of service providers in optimizing internal efficiencies and fulfilling customer and business requirements. Anticipating the needs and the overall direction of the industry has enabled us to develop an optimized solutions portfolio to align with the needs of the different segments.</p>\r\n<p>Business (Enterprise)</p>\r\n<ul>\r\n<li>Home</li>\r\n<li>We have strategically partnered with a number of top technology providers to ensure that our solutions are tailored to the needs of our customers, as well as enrich our offerings with flexibility and diversity.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Benefits</p>\r\n<p>Addressing customer needs while complying with regulations</p>\r\n<ul>\r\n<li>Improving profit margins</li>\r\n<li>Managing internal processes</li>\r\n<li>&nbsp;</li>\r\n</ul>\r\n<p>&nbsp;</p>', 1, 0, 1, '2013-04-11 17:17:37'),
	(9, 'transportation', '/added/uploads/banner/industry/1363636510award.png', '', '', '', '', 'Transportation', 'Transportation', '', '', '', '', '<p  justify;">Realizing that transportation is one of the cornerstones of our lives spurs us to strive for an integrated vision for transportation. It is without a doubt a crucial driver to any nation\'s economy, as well as a major factor in the quality of life.</p>\r\n<p  justify;">With our utter dependency on transportation for all our needs, Giza Systems offers solutions to improve operational efficiencies, ensure security, and work towards the integration of systems for national infrastructures.</p>', '<p  justify;">Realizing that transportation is one of the cornerstones of our lives spurs us to strive for an integrated vision for transportation. It is without a doubt a crucial driver to any nation\'s economy, as well as a major factor in the quality of life.</p>\r\n<p  justify;">With our utter dependency on transportation for all our needs, Giza Systems offers solutions to improve operational efficiencies, ensure security, and work towards the integration of systems for national infrastructures.</p>', 1, 0, 1, '2013-03-18 21:58:26');
/*!40000 ALTER TABLE `industry` ENABLE KEYS */;


-- Dumping structure for table giza.industry_sub
CREATE TABLE IF NOT EXISTS `industry_sub` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `industry_id` int(10) NOT NULL DEFAULT '0',
  `alias` varchar(250) NOT NULL,
  `banner_image_thumbs` text,
  `banner_files` text,
  `banner_image_thumb_selected` tinytext,
  `banner_file_selected` tinytext,
  `title` varchar(250) DEFAULT NULL,
  `title_ar` varchar(250) DEFAULT NULL,
  `seo_words` tinytext,
  `seo_words_ar` tinytext,
  `brief` text,
  `brief_ar` text,
  `body` text,
  `body_ar` text,
  `sort` tinyint(4) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.industry_sub: 25 rows
/*!40000 ALTER TABLE `industry_sub` DISABLE KEYS */;
INSERT INTO `industry_sub` (`id`, `industry_id`, `alias`, `banner_image_thumbs`, `banner_files`, `banner_image_thumb_selected`, `banner_file_selected`, `title`, `title_ar`, `seo_words`, `seo_words_ar`, `brief`, `brief_ar`, `body`, `body_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(16, 2, 'brief', '', '', '', '', 'Brief', 'Brief', '', '', '', '', '<p  justify;">Our integrated solutions improve the operational efficiency of the Water sector and provide it with the sufficient infrastructure for market stabilization, and improved coordination for the supply of resources.</p>\r\n<p  justify;">Our integrated systems consist of end-to-end solutions that cover all vital functions within an organization.</p>\r\n<p  justify;">We are experts in transferring both knowledge and technology to the regional Utilities sector in areas such as:</p>\r\n<ul>\r\n<li  justify;">Power Generation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>\r\n<li  justify;">Power Transmission</li>\r\n<li  justify;">Power Distribution</li>\r\n</ul>\r\n<p  justify;">From systems that control generation processes and communication systems, to&nbsp;transmission and distribution solutions, Giza Systems offers a wide range of equipment and&nbsp;technology solutions that enable the power industry ensure consistent, reliable, and cost&nbsp;effective processes.</p>', '<p  justify;">Our integrated solutions improve the operational efficiency of the Water sector and provide it with the sufficient infrastructure for market stabilization, and improved coordination for the supply of resources.</p>\r\n<p  justify;">Our integrated systems consist of end-to-end solutions that cover all vital functions within an organization.</p>\r\n<p  justify;">We are experts in transferring both knowledge and technology to the regional Utilities sector in areas such as:</p>\r\n<ul>\r\n<li  justify;">Power Generation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>\r\n<li  justify;">Power Transmission</li>\r\n<li  justify;">Power Distribution</li>\r\n</ul>\r\n<p  justify;">From systems that control generation processes and communication systems, to&nbsp;transmission and distribution solutions, Giza Systems offers a wide range of equipment and&nbsp;technology solutions that enable the power industry ensure consistent, reliable, and cost&nbsp;effective processes.</p>', 1, 1, 0, 1, '2013-03-18 20:47:06'),
	(17, 2, 'Industry Issues', '', '', '', '', 'Industry Issues', 'Industry Issues', '', '', '', '', '<p  justify;">The increase in the global energy demands places an exigent amount of pressure on the&nbsp;power infrastructure, as well as requires a higher level of complexity to ensure streamlining&nbsp;of operations. Whether the project at hand involves power generation, transmission, or&nbsp;distribution, industrial automation and control processes are critical for improving efficiency&nbsp;and ensuring higher productivity and output.</p>\r\n<p  justify;">Efficiency, reliability, affordability, and reduction of our carbon footprint are all key elements&nbsp;in the delivery of power solutions and systems to the industry.</p>\r\n<p  justify;">Giza Systems understands the needs of the power sector and is able to develop, support,&nbsp;and reinforce power delivery infrastructures. We provide a full spectrum of solutions,&nbsp;including smart grid solutions, which integrates the different systems in order to ensure&nbsp;operational efficiency, higher production rates, and improved safety.</p>', '<p  justify;">The increase in the global energy demands places an exigent amount of pressure on the&nbsp;power infrastructure, as well as requires a higher level of complexity to ensure streamlining&nbsp;of operations. Whether the project at hand involves power generation, transmission, or&nbsp;distribution, industrial automation and control processes are critical for improving efficiency&nbsp;and ensuring higher productivity and output.</p>\r\n<p  justify;">Efficiency, reliability, affordability, and reduction of our carbon footprint are all key elements&nbsp;in the delivery of power solutions and systems to the industry.</p>\r\n<p  justify;">Giza Systems understands the needs of the power sector and is able to develop, support,&nbsp;and reinforce power delivery infrastructures. We provide a full spectrum of solutions,&nbsp;including smart grid solutions, which integrates the different systems in order to ensure&nbsp;operational efficiency, higher production rates, and improved safety.</p>', 2, 1, 0, 1, '2013-03-18 20:48:21'),
	(18, 2, 'Industry Solutions', '', '', '', '', 'Industry Solutions', 'Industry Solutions', '', '', '', '', '<p>Giza Systems&rsquo; solutions improve the efficiency of the power sector&rsquo;s operations and provide&nbsp;it with the sufficient infrastructure for market stabilization, and improved coordination of&nbsp;supply resources. We have a strong track record of understanding what drives operational&nbsp;efficiency and business processes in the power sector. This detailed knowledge has been&nbsp;used to develop our integrated systems that make up end-to-end solutions covering all vital&nbsp;functions within a power plant.</p>\r\n<p>Our solutions for the power sector include: Distributed Control Systems (DCS), Field&nbsp;Instruments, Substation Automation Systems (SAS), Energy Management Systems (EMS),&nbsp;Distribution Management Systems (DMS), Optical Power Ground Wire (OPGW), Automatic&nbsp;Metering Infrastructure (AMI), Geographic Information Systems (GIS), Supervisory Control&nbsp;and Data Acquisition (SCADA), Billing and Meter Data Management, Control and Protection&nbsp;Systems, and IT back-end solutions.</p>\r\n<p>&nbsp;</p>\r\n<h ><span  #3399ff; font-size: 16px;">Power Generation Solutions</span></h3>\r\n<ul>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=71">Distributed Control Systems (DCS)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=72">Field Instruments</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=73">Environmental Solutions</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=74">Programmable Logic Controller&nbsp;(PLC)</a></li>\r\n<li><a href="http://108.167.160.115/admin/forms.php?page_mode=edit&id=1&form_id=225">Turbine Control and&nbsp;Supervision&nbsp;Systems</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=76">Combustion and Burner Management&nbsp;Systems (BMS)&nbsp;</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=77">Enterprise Asset Management (EAM)</a></li>\r\n</ul>\r\n<p  justify;">.</p>\r\n<h ><span  #3399ff;"><span  16px;">Power Transmission Solutions</span></span></h3>\r\n<ul>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=77">Energy Management Solutions (EMS)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=79">Wireless&nbsp;</a><a href="../../../../../../../gizasys/admin/showpage.php?id=79">Communication&nbsp;Solutions</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=80">Optical Fiber Networks and&nbsp;Teleprotection Networks</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=81">Substation Automation</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=82">Analog/Digital Power Line Carrier&nbsp;Systems</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=83">Optical Power Ground Wire (OPGW)</a></li>\r\n</ul>\r\n<p  justify;">&nbsp;</p>\r\n<h ><span  #3399ff;"><span  16px;">Power Distribution Solutions</span></span></h3>\r\n<ul>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=84">Distribution Management Solutions&nbsp;(DMS)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=85">Customer Relationship Management&nbsp;(CRM) and Billing</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=86">Fiber to the Home (FTTH)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=87">Geographical Information Systems&nbsp;(GIS)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=104">Field Force Management/Mobile&nbsp;Workforce Management&nbsp;Systems&nbsp;(MWMS)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=90">Knowledge Management</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=91">Smart Grids &nbsp;-Automatic Metering Infrastructure</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=92">Smart Metering</a></li>\r\n</ul>', '<p>Giza Systems&rsquo; solutions improve the efficiency of the power sector&rsquo;s operations and provide&nbsp;it with the sufficient infrastructure for market stabilization, and improved coordination of&nbsp;supply resources. We have a strong track record of understanding what drives operational&nbsp;efficiency and business processes in the power sector. This detailed knowledge has been&nbsp;used to develop our integrated systems that make up end-to-end solutions covering all vital&nbsp;functions within a power plant.</p>\r\n<p>Our solutions for the power sector include: Distributed Control Systems (DCS), Field&nbsp;Instruments, Substation Automation Systems (SAS), Energy Management Systems (EMS),&nbsp;Distribution Management Systems (DMS), Optical Power Ground Wire (OPGW), Automatic&nbsp;Metering Infrastructure (AMI), Geographic Information Systems (GIS), Supervisory Control&nbsp;and Data Acquisition (SCADA), Billing and Meter Data Management, Control and Protection&nbsp;Systems, and IT back-end solutions.</p>\r\n<p>&nbsp;</p>\r\n<h ><span  #3399ff; font-size: 16px;">Power Generation Solutions</span></h3>\r\n<ul>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=71">Distributed Control Systems (DCS)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=72">Field Instruments</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=73">Environmental Solutions</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=74">Programmable Logic Controller&nbsp;(PLC)</a></li>\r\n<li><a href="http://108.167.160.115/admin/forms.php?page_mode=edit&id=1&form_id=225">Turbine Control and&nbsp;Supervision&nbsp;Systems</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=76">Combustion and Burner Management&nbsp;Systems (BMS)&nbsp;</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=77">Enterprise Asset Management (EAM)</a></li>\r\n</ul>\r\n<p  justify;">.</p>\r\n<h ><span  #3399ff;"><span  16px;">Power Transmission Solutions</span></span></h3>\r\n<ul>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=77">Energy Management Solutions (EMS)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=79">Wireless&nbsp;</a><a href="../../../../../../../gizasys/admin/showpage.php?id=79">Communication&nbsp;Solutions</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=80">Optical Fiber Networks and&nbsp;Teleprotection Networks</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=81">Substation Automation</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=82">Analog/Digital Power Line Carrier&nbsp;Systems</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=83">Optical Power Ground Wire (OPGW)</a></li>\r\n</ul>\r\n<p  justify;">&nbsp;</p>\r\n<h ><span  #3399ff;"><span  16px;">Power Distribution Solutions</span></span></h3>\r\n<ul>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=84">Distribution Management Solutions&nbsp;(DMS)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=85">Customer Relationship Management&nbsp;(CRM) and Billing</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=86">Fiber to the Home (FTTH)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=87">Geographical Information Systems&nbsp;(GIS)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=104">Field Force Management/Mobile&nbsp;Workforce Management&nbsp;Systems&nbsp;(MWMS)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=90">Knowledge Management</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=91">Smart Grids &nbsp;-Automatic Metering Infrastructure</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=92">Smart Metering</a></li>\r\n</ul>', 3, 1, 0, 1, '2013-03-18 20:50:00'),
	(19, 2, 'contact', '', '', '', '', 'Contact', 'Contact', '', '', '', '', '<p>power@gizasystems.com</p>', '<p>power@gizasystems.com</p>', 4, 1, 0, 1, '2013-03-18 20:51:05'),
	(20, 3, 'brief', '', '', '', '', 'Brief', 'Brief', '', '', '', '', '<p  justify;"><span  justify;">With the global challenge facing the water sector, operational efficiency is essential. Environmental, as well as economical, incentives have driven the industry to invest in incorporating dynamic systems and process control in their operations to ensure efficiency and achieve increased performance.</span></p>\r\n<p  justify;">Our expertise in the industry, coupled with our strong integration capbilities, enable us to leverage our knowledge in the industry and provide water companies with the necessary infrastructure and solutions.&nbsp;With our advanced and cost-effective services and solutions we help our clients improve and maintain the value and performance of their water treatment and distribution assets.</p>', '<p  justify;"><span  justify;">With the global challenge facing the water sector, operational efficiency is essential. Environmental, as well as economical, incentives have driven the industry to invest in incorporating dynamic systems and process control in their operations to ensure efficiency and achieve increased performance.</span></p>\r\n<p  justify;">Our expertise in the industry, coupled with our strong integration capbilities, enable us to leverage our knowledge in the industry and provide water companies with the necessary infrastructure and solutions.&nbsp;With our advanced and cost-effective services and solutions we help our clients improve and maintain the value and performance of their water treatment and distribution assets.</p>', 5, 1, 0, 1, '2013-03-18 20:59:12'),
	(21, 3, 'Industry Issues', '', '', '', '', 'Industry Issues', 'Industry Issues', '', '', '', '', '<p  justify;"><span  justify;">With international calls to manage resources more carefully and effectively, up-to-date&nbsp;technologies have become necessary to aid water companies in reaching the optimum levels of&nbsp;performance required. Giza Systems offers water companies integrated solutions that provide&nbsp;management and operators with the right tools and real-time data to optimize operations all&nbsp;across the phases of the process.&nbsp;</span></p>\r\n<p  justify;">The incorporation of instrumentation, control, and automation establish consistent performance and enhance operational parameters. &nbsp;By adopting advanced technical and benchmarking tools, the industry evaluates operational performance. These tools also provide support for the operators to ensure that diagnostics and corrective actions are performed.</p>', '<p  justify;"><span  justify;">With international calls to manage resources more carefully and effectively, up-to-date&nbsp;technologies have become necessary to aid water companies in reaching the optimum levels of&nbsp;performance required. Giza Systems offers water companies integrated solutions that provide&nbsp;management and operators with the right tools and real-time data to optimize operations all&nbsp;across the phases of the process.&nbsp;</span></p>\r\n<p  justify;">The incorporation of instrumentation, control, and automation establish consistent performance and enhance operational parameters. &nbsp;By adopting advanced technical and benchmarking tools, the industry evaluates operational performance. These tools also provide support for the operators to ensure that diagnostics and corrective actions are performed.</p>', 6, 1, 0, 1, '2013-03-18 21:03:54'),
	(22, 3, 'Industry Solutions', '', '', '', '', 'Industry Solutions', 'Industry Solutions', '', '', '', '', '<p  justify;"><span  justify;">Giza Systems offers solutions that improve the efficiency of water companies through providing&nbsp;the sufficient infrastructure for market stabilization and improved coordination of supply&nbsp;resources. These solutions cater to areas such as water treatment, distribution and irrigation.</span></p>\r\n<p  justify;"><span  justify;">Our portfolio covers the diverse needs of the water sector by understanding the fundamentals underlying automation and integration. These fundamentals entail solutions aiming at the collection of data and process control to manage, integrate, and ensure operational efficiency.&nbsp;</span></p>\r\n<div  justify;">Our solutions for the Utilities sector include: Field Instruments, Programmable Logic Control (PLC),&nbsp;Distributed Control System &#40;DCS&#41;, Water Management Systems, Automatic Meter Management&nbsp;(AMM), Hydraulic Modeling, Geographic Information Systems (GIS), Supervisory Control and&nbsp;Data Acquisition (SCADA), Billing and Meter Data Management, Energy Management, Leak&nbsp;Detection Equipment and Leakage Management Systems.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div  justify;">\r\n<ul>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=93">Supervisory Control And Data&nbsp;Acquisition (SCADA)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=95">Distributed Control Systems (DCS)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=96">Leak Detection Systems (LDS)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=97">Field Instruments&nbsp;</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=98">Programmable&nbsp;Logic Controller&nbsp;(PLC)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=99">Communication Solutions&nbsp;</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=100">Geographical Information Systems&nbsp;(GIS) </a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=101">Customer Relationship Management&nbsp;(CRM) and Billing&nbsp;</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=92">Smart Metering</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?page_id=103">Knowledge Management</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=104">Field Force Management / Mobile&nbsp;Workforce Management Systems&nbsp;(MWMS)</a></li>\r\n</ul>\r\n</div>', '<p  justify;"><span  justify;">Giza Systems offers solutions that improve the efficiency of water companies through providing&nbsp;the sufficient infrastructure for market stabilization and improved coordination of supply&nbsp;resources. These solutions cater to areas such as water treatment, distribution and irrigation.</span></p>\r\n<p  justify;"><span  justify;">Our portfolio covers the diverse needs of the water sector by understanding the fundamentals underlying automation and integration. These fundamentals entail solutions aiming at the collection of data and process control to manage, integrate, and ensure operational efficiency.&nbsp;</span></p>\r\n<div  justify;">Our solutions for the Utilities sector include: Field Instruments, Programmable Logic Control (PLC),&nbsp;Distributed Control System &#40;DCS&#41;, Water Management Systems, Automatic Meter Management&nbsp;(AMM), Hydraulic Modeling, Geographic Information Systems (GIS), Supervisory Control and&nbsp;Data Acquisition (SCADA), Billing and Meter Data Management, Energy Management, Leak&nbsp;Detection Equipment and Leakage Management Systems.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div  justify;">\r\n<ul>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=93">Supervisory Control And Data&nbsp;Acquisition (SCADA)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=95">Distributed Control Systems (DCS)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=96">Leak Detection Systems (LDS)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=97">Field Instruments&nbsp;</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=98">Programmable&nbsp;Logic Controller&nbsp;(PLC)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=99">Communication Solutions&nbsp;</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=100">Geographical Information Systems&nbsp;(GIS) </a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=101">Customer Relationship Management&nbsp;(CRM) and Billing&nbsp;</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=92">Smart Metering</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?page_id=103">Knowledge Management</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=104">Field Force Management / Mobile&nbsp;Workforce Management Systems&nbsp;(MWMS)</a></li>\r\n</ul>\r\n</div>', 7, 1, 0, 1, '2013-03-18 21:05:11'),
	(23, 3, 'contact', '', '', '', '', 'Contact', 'Contact', '', '', '', '', '<p>water@gizasystems.com</p>', '<p>water@gizasystems.com</p>', 8, 1, 0, 1, '2013-03-18 21:09:24'),
	(24, 4, 'brief', '', '', '', '', 'Brief', 'Brief', '', '', '', '', '<p  justify;">To meet head on the needs of enterprises, Giza Systems adopts a holistic approach in implementing and delivering large scale turnkey projects. Our expertise in systems integration enables us to handle all aspects of a project to include installation, commissioning, integration, training, and support.</p>\r\n<p  justify;">Drawing on our experience and in-depth knowledge in the different industries, we are able to cater to different &nbsp;sectors such as Ministries and Authorities, Defense, Health, Transportation, and Aviation.</p>\r\n<p  justify;">Our solutions portfolio includes Software Applications, IT Infrastructure Solutions and Services, IT Hardware, Systems Integration, and Project Management capabilities.</p>', '<p  justify;">To meet head on the needs of enterprises, Giza Systems adopts a holistic approach in implementing and delivering large scale turnkey projects. Our expertise in systems integration enables us to handle all aspects of a project to include installation, commissioning, integration, training, and support.</p>\r\n<p  justify;">Drawing on our experience and in-depth knowledge in the different industries, we are able to cater to different &nbsp;sectors such as Ministries and Authorities, Defense, Health, Transportation, and Aviation.</p>\r\n<p  justify;">Our solutions portfolio includes Software Applications, IT Infrastructure Solutions and Services, IT Hardware, Systems Integration, and Project Management capabilities.</p>', 1, 1, 0, 1, '2013-03-18 21:24:19'),
	(25, 4, 'Industry Issues', '', '', '', '', 'Industry Issues', 'Industry Issues', '', '', '', '', '<p  justify;"><span  arial;">The level of complexity needed to implement solutions for enterprise projects runs the gamut ranging from business operations to operational ones. To tackle the massive scale of such projects, best in-class solutions are essential to minimize costs and risk, as well as substantially improve productivity and efficiency within enterprises.&nbsp;</span></p>\r\n<p  justify;"><span  arial;">By offering enterprises ways to manage, monitor, and assess its resources, processes, and methods,<span  #000000; font-size: 13px; line-height: 19.200000762939453px;">&nbsp;</span>Giza Systems delivers seamless integrated end-to-end business solutions&nbsp;to enable enterprises attain unmatched flexibility, enhanced functionality, enterprise scalability and agility, and improved efficiency.</span></p>', '<p  justify;"><span  arial;">The level of complexity needed to implement solutions for enterprise projects runs the gamut ranging from business operations to operational ones. To tackle the massive scale of such projects, best in-class solutions are essential to minimize costs and risk, as well as substantially improve productivity and efficiency within enterprises.&nbsp;</span></p>\r\n<p  justify;"><span  arial;">By offering enterprises ways to manage, monitor, and assess its resources, processes, and methods,<span  #000000; font-size: 13px; line-height: 19.200000762939453px;">&nbsp;</span>Giza Systems delivers seamless integrated end-to-end business solutions&nbsp;to enable enterprises attain unmatched flexibility, enhanced functionality, enterprise scalability and agility, and improved efficiency.</span></p>', 2, 1, 0, 1, '2013-03-18 21:25:20'),
	(26, 4, 'Industry Solutions', '', '', '', '', 'Industry Solutions', 'Industry Solutions', '', '', '', '', '<p  justify;">To support enterprises, Giza Systems offers integrated solutions that achieve<span  justify;">&nbsp;</span><span  justify;">process management, ensure faster process cycles, and allows for easy access to more accurate information.&nbsp;</span>Giza Systems implements solutions for infrastructure, processing, communication and business application layers. Our solutions include:</p>\r\n<p  justify;">Customer-Facing Solutions&nbsp;</p>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Customer Relationship Management</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Computer Telephony Integration</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Enterprise Management Solutions : Back Office&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Enterprise Resource Planning</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Balanced Scorecards System</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Content Management</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Information Life-Cycle Management</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Service / Help Desk</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp;</div>\r\n<div id="cke_pastebin"  justify;">&nbsp;Enterprise Management Solutions : Business Intelligence</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Data Warehousing</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Analytical Reports</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Financial Analysis</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Dash Boards</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Enterprise Management Solutions : Infrastructure&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Storage Systems</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Network Management Systems</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Remote Desktop &amp; Server Management</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Fault Management System</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Performance Management Systems</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Business Continuity Solutions</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Backup Solutions</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Voice Over Internet Protocol (VoIP) Management Solutions</div>', '<p  justify;">To support enterprises, Giza Systems offers integrated solutions that achieve<span  justify;">&nbsp;</span><span  justify;">process management, ensure faster process cycles, and allows for easy access to more accurate information.&nbsp;</span>Giza Systems implements solutions for infrastructure, processing, communication and business application layers. Our solutions include:</p>\r\n<p  justify;">Customer-Facing Solutions&nbsp;</p>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Customer Relationship Management</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Computer Telephony Integration</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Enterprise Management Solutions : Back Office&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Enterprise Resource Planning</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Balanced Scorecards System</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Content Management</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Information Life-Cycle Management</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Service / Help Desk</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp;</div>\r\n<div id="cke_pastebin"  justify;">&nbsp;Enterprise Management Solutions : Business Intelligence</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Data Warehousing</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Analytical Reports</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Financial Analysis</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Dash Boards</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Enterprise Management Solutions : Infrastructure&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Storage Systems</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Network Management Systems</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Remote Desktop &amp; Server Management</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Fault Management System</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Performance Management Systems</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Business Continuity Solutions</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Backup Solutions</div>\r\n<div id="cke_pastebin"  justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Voice Over Internet Protocol (VoIP) Management Solutions</div>', 3, 1, 0, 1, '2013-03-18 21:26:31'),
	(27, 4, 'contact', '', '', '', '', 'Contact', 'Contact', '', '', '', '', '<p>enterprise@gizasystems.com</p>', '<p>enterprise@gizasystems.com</p>', 4, 1, 0, 1, '2013-03-18 21:27:26'),
	(28, 6, 'brief', '', '', '', '', 'Brief', 'Brief', '', '', '', '', '<p  justify;">A pioneer in optimizing technology, Giza Systems presents its portfolio of advanced technological solutions specifically geared towards the manufacturing sector. With these solutions fully integrated into the manufacturer&rsquo;s business, our clients will be able to efficiently control and manage their operations.</p>\r\n<p  justify;">Giza Systems offers a portfolio of advanced technological solutions that serve a wide spectrum of industries. Covering both process manufacturing (e.g. chemical plants, food and beverage, fertilizer factories, iron and steel, etc&hellip;) our solutions are tailor-made to suit our clients&rsquo; most specific needs.</p>\r\n<p  justify;">Our advanced technological solutions portfolio is specifically geared towards the manufacturing sector. By fully integrating our solutions into the manufacturer&rsquo;s business, our clients will be able to efficiently control and manage their operations.</p>', '<p  justify;">A pioneer in optimizing technology, Giza Systems presents its portfolio of advanced technological solutions specifically geared towards the manufacturing sector. With these solutions fully integrated into the manufacturer&rsquo;s business, our clients will be able to efficiently control and manage their operations.</p>\r\n<p  justify;">Giza Systems offers a portfolio of advanced technological solutions that serve a wide spectrum of industries. Covering both process manufacturing (e.g. chemical plants, food and beverage, fertilizer factories, iron and steel, etc&hellip;) our solutions are tailor-made to suit our clients&rsquo; most specific needs.</p>\r\n<p  justify;">Our advanced technological solutions portfolio is specifically geared towards the manufacturing sector. By fully integrating our solutions into the manufacturer&rsquo;s business, our clients will be able to efficiently control and manage their operations.</p>', 9, 1, 0, 1, '2013-03-18 21:30:24'),
	(29, 6, 'Industry Issues', '', '', '', '', 'Industry Issues', 'Industry Issues', '', '', '', '', '<p  justify;">With the nature of global economy emphasizing the services sector, the manufacturing industry is facing a state of transition. Emerging markets, shifts in manufacturing processes, focus on supply chains and leaner techniques are just some of the aspects triggering this transition in the industry.</p>\r\n<p  justify;">Key decision makers realize that manufacturing holds the key to long-term prosperity and well-being of an economy, as it translates into employment, investments, exports, and physical infrastructure.</p>\r\n<p  justify;">To ensure a resurgence and revitalization to the industry, manufacturers must adapt the way they do business to deal with the increased competitiveness of the industry, as well as the various challenges.</p>\r\n<p  justify;">By transitioning to integrated technology driven solutions and building capabilities that add value to the process while creating and managing integrated systems and networks, the manufacturing industry will be able to leverage innovation developments to advance its grounding and competitiveness.</p>\r\n<p  justify;">With a fast progressing world, industrial regulations are becoming more sophisticated. &nbsp;Manufacturers need cutting-edge solutions that are sure to place plant processes in sync, as well as safeguard workers and cut costs.</p>\r\n<p  justify;">From field instruments, process control, communication solutions to enterprise management solutions and customer care solutions, Giza Systems offers a wide range of equipment and technology solutions that help industrial plants ensure consistent, reliable and cost effective processes.</p>\r\n<p  justify;">A pioneer in optimizing technology, Giza Systems presents its portfolio of advanced technological solutions specifically geared towards the manufacturing sector. With these solutions fully integrated into the manufacturer&rsquo;s business, our clients will be able to efficiently control and manage their operations.</p>', '<p  justify;">With the nature of global economy emphasizing the services sector, the manufacturing industry is facing a state of transition. Emerging markets, shifts in manufacturing processes, focus on supply chains and leaner techniques are just some of the aspects triggering this transition in the industry.</p>\r\n<p  justify;">Key decision makers realize that manufacturing holds the key to long-term prosperity and well-being of an economy, as it translates into employment, investments, exports, and physical infrastructure.</p>\r\n<p  justify;">To ensure a resurgence and revitalization to the industry, manufacturers must adapt the way they do business to deal with the increased competitiveness of the industry, as well as the various challenges.</p>\r\n<p  justify;">By transitioning to integrated technology driven solutions and building capabilities that add value to the process while creating and managing integrated systems and networks, the manufacturing industry will be able to leverage innovation developments to advance its grounding and competitiveness.</p>\r\n<p  justify;">With a fast progressing world, industrial regulations are becoming more sophisticated. &nbsp;Manufacturers need cutting-edge solutions that are sure to place plant processes in sync, as well as safeguard workers and cut costs.</p>\r\n<p  justify;">From field instruments, process control, communication solutions to enterprise management solutions and customer care solutions, Giza Systems offers a wide range of equipment and technology solutions that help industrial plants ensure consistent, reliable and cost effective processes.</p>\r\n<p  justify;">A pioneer in optimizing technology, Giza Systems presents its portfolio of advanced technological solutions specifically geared towards the manufacturing sector. With these solutions fully integrated into the manufacturer&rsquo;s business, our clients will be able to efficiently control and manage their operations.</p>', 10, 1, 0, 1, '2013-03-18 21:31:47'),
	(30, 6, 'Industry Solutions', '', '', '', '', 'Industry Solutions', 'Industry Solutions', '', '', '', '', '', '', 11, 1, 0, 1, '2013-03-18 21:32:45'),
	(31, 6, 'contact', '', '', '', '', 'Contact', 'Contact', '', '', '', '', '<p>manufacturing@gizasystems.com</p>', '<p>manufacturing@gizasystems.com</p>', 12, 1, 0, 1, '2013-03-18 21:33:40'),
	(32, 7, 'brief', '', '', '', '', 'Brief', 'Brief', '', '', '', '', '<p  justify;">As the Oil and Gas industry increasingly becomes immersed with data and operating complexities, smart technologies are required. These technologies can work with existing investments and future installations alike.</p>\r\n<p  justify;">We provide Oil and Gas companies with integrated solutions that provide management and operators with the right tools and real-time data to optimize operations all across the phases of the process.</p>\r\n<p  justify;">Giza Systems offers solutions that serve production, refining, transportation, distribution, and petrochemical operations, as well as regulatory operations necessary for optimum results.</p>\r\n<p  justify;">Our comprehensive integrated solutions are designed to:</p>\r\n<ul>\r\n<li  justify;">Optimize operations</li>\r\n<li  justify;">Ensure full process automation</li>\r\n<li  justify;">Substantially improve the production processes, while maintaining a permanently safe and cost effective environment</li>\r\n</ul>\r\n<p  justify;">Amongst our solutions are Well-head Control Panels, Fire &amp; Gas (F&amp;G) Safety Systems, F&amp;G System Detectors and Emergency Shut Down (ESD) Systems.</p>\r\n<p  justify;">We also provide on-site professional services in this industry to implement the different solutions.</p>', '<p  justify;">As the Oil and Gas industry increasingly becomes immersed with data and operating complexities, smart technologies are required. These technologies can work with existing investments and future installations alike.</p>\r\n<p  justify;">We provide Oil and Gas companies with integrated solutions that provide management and operators with the right tools and real-time data to optimize operations all across the phases of the process.</p>\r\n<p  justify;">Giza Systems offers solutions that serve production, refining, transportation, distribution, and petrochemical operations, as well as regulatory operations necessary for optimum results.</p>\r\n<p  justify;">Our comprehensive integrated solutions are designed to:</p>\r\n<ul>\r\n<li  justify;">Optimize operations</li>\r\n<li  justify;">Ensure full process automation</li>\r\n<li  justify;">Substantially improve the production processes, while maintaining a permanently safe and cost effective environment</li>\r\n</ul>\r\n<p  justify;">Amongst our solutions are Well-head Control Panels, Fire &amp; Gas (F&amp;G) Safety Systems, F&amp;G System Detectors and Emergency Shut Down (ESD) Systems.</p>\r\n<p  justify;">We also provide on-site professional services in this industry to implement the different solutions.</p>', 13, 1, 0, 1, '2013-03-18 21:36:35'),
	(33, 7, 'Industry Issues', '', '', '', '', 'Industry Issues', 'Industry Issues', '', '', '', '', '<p  justify;">&nbsp;</p>\r\n<p>The perpetual demand for energy combined with the limited supply of natural resources is forcing the Oil and Gas industry to reconsider how they do business. With fluctuating demand, limited supply, rising operation and production costs, environmental concerns, emergence of industry regulations, and compliance issues, the industry is becoming even more competitive.</p>\r\n<p>Faced with one of the harshest and most competitive environments, Oil and Gas companies are required to generate a return on their investments and find new ways to cut costs. This means that they must operate within a context that ensures that their long term strategy accounts for the adoption of the highest standards of social responsibility and environmental stewardship, as well as enables them to adapt to the different challenges posed by the complex environment of the Oil and Gas industry.</p>\r\n<p>The challenges of the Oil and Gas industry encompass economical, political, social, and environmental factors. Whether the challenges are internal or external to the company, the fact of the matter is that the sheer amount of variables necessitates streamlining of business operations to improve processes, develop more effective supply chains and promote efficient energy, reinforce aging infrastructure, enhance environmental standards, and manage their resources and assets. &nbsp;&nbsp;</p>\r\n<p>Adapting to the complex environment translates into achieving internal, operational, and business efficiencies in order to focus on sustainable solutions that enhance profitability, increase controls, cut operational and compliance costs, and manage risks.</p>\r\n<p>Driven by technology, geopolitics, and environmental and safety factors, the Oil and Gas industry is ready to leverage innovative and intelligent solutions that allow for scalability, sustainability, and integration with existing systems and applications.</p>', '<p  justify;">&nbsp;</p>\r\n<p>The perpetual demand for energy combined with the limited supply of natural resources is forcing the Oil and Gas industry to reconsider how they do business. With fluctuating demand, limited supply, rising operation and production costs, environmental concerns, emergence of industry regulations, and compliance issues, the industry is becoming even more competitive.</p>\r\n<p>Faced with one of the harshest and most competitive environments, Oil and Gas companies are required to generate a return on their investments and find new ways to cut costs. This means that they must operate within a context that ensures that their long term strategy accounts for the adoption of the highest standards of social responsibility and environmental stewardship, as well as enables them to adapt to the different challenges posed by the complex environment of the Oil and Gas industry.</p>\r\n<p>The challenges of the Oil and Gas industry encompass economical, political, social, and environmental factors. Whether the challenges are internal or external to the company, the fact of the matter is that the sheer amount of variables necessitates streamlining of business operations to improve processes, develop more effective supply chains and promote efficient energy, reinforce aging infrastructure, enhance environmental standards, and manage their resources and assets. &nbsp;&nbsp;</p>\r\n<p>Adapting to the complex environment translates into achieving internal, operational, and business efficiencies in order to focus on sustainable solutions that enhance profitability, increase controls, cut operational and compliance costs, and manage risks.</p>\r\n<p>Driven by technology, geopolitics, and environmental and safety factors, the Oil and Gas industry is ready to leverage innovative and intelligent solutions that allow for scalability, sustainability, and integration with existing systems and applications.</p>', 14, 1, 0, 1, '2013-03-18 21:37:38'),
	(34, 7, 'Industry Solutions', '', '', '', '', 'Industry Solutions', 'Industry Solutions', '', '', '', '', '<p  justify;">Total solutions are designed to optimize operations, ensure full process automation, and substantially improve the production processes, while maintaining a permanently safe and cost effective environment. Our solutions serve the oil, gas and petrochemicals industries.&nbsp;</p>\r\n<p  justify;">Our Oil &amp; Gas offerings include:&nbsp;</p>\r\n<ul>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=105"><span  #8e8e8e;">Well-head Integrated&nbsp;Control Systems</span></a></li>\r\n<li><span  #8e8e8e;">Control Systems:</span>\r\n<ul>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=111">Transportation Lines SCADA solutions</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=110"><span  #8e8e8e;">Distributed Control Systems (DCS)</span></a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=112"><span  #8e8e8e;">Field Devices and Field Communication Solutions</span></a></li>\r\n</ul>\r\n</li>\r\n<li><span  #8e8e8e;">Safety Systems:</span>\r\n<ul>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=113"><span  #8e8e8e; text-align: justify;">Fire and Gas (F&amp;G) Safety Systems and Detectors</span></a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=114">Emergency Shut Down (ESD) Systems</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=115">Leak Detection Systems (LDS)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=116">Gas Liquefaction</a></li>\r\n</ul>\r\n</li>\r\n<li>Distribution Solutions\r\n<ul>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=117">Geographical Information Systems (GIS)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=118">Customer Relationship Management (CRM) and Billing</a></li>\r\n</ul>\r\n</li>\r\n<li>Process-specific Solutions\r\n<ul>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=119">Petrochemicals</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=120">Advanced Process Control Solutions</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=121">Training Simulators</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=122">Back Office Solutions</a></li>\r\n</ul>\r\n</li>\r\n</ul>', '<p  justify;">Total solutions are designed to optimize operations, ensure full process automation, and substantially improve the production processes, while maintaining a permanently safe and cost effective environment. Our solutions serve the oil, gas and petrochemicals industries.&nbsp;</p>\r\n<p  justify;">Our Oil &amp; Gas offerings include:&nbsp;</p>\r\n<ul>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=105"><span  #8e8e8e;">Well-head Integrated&nbsp;Control Systems</span></a></li>\r\n<li><span  #8e8e8e;">Control Systems:</span>\r\n<ul>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=111">Transportation Lines SCADA solutions</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=110"><span  #8e8e8e;">Distributed Control Systems (DCS)</span></a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=112"><span  #8e8e8e;">Field Devices and Field Communication Solutions</span></a></li>\r\n</ul>\r\n</li>\r\n<li><span  #8e8e8e;">Safety Systems:</span>\r\n<ul>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=113"><span  #8e8e8e; text-align: justify;">Fire and Gas (F&amp;G) Safety Systems and Detectors</span></a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=114">Emergency Shut Down (ESD) Systems</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=115">Leak Detection Systems (LDS)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=116">Gas Liquefaction</a></li>\r\n</ul>\r\n</li>\r\n<li>Distribution Solutions\r\n<ul>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=117">Geographical Information Systems (GIS)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=118">Customer Relationship Management (CRM) and Billing</a></li>\r\n</ul>\r\n</li>\r\n<li>Process-specific Solutions\r\n<ul>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=119">Petrochemicals</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=120">Advanced Process Control Solutions</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=121">Training Simulators</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=122">Back Office Solutions</a></li>\r\n</ul>\r\n</li>\r\n</ul>', 15, 1, 0, 1, '2013-03-18 21:39:20'),
	(35, 8, 'brief', '', '', '', '', 'Brief', 'Brief', '', '', '', '', '<p  justify;">Our Telecom team responds to the needs of telecom service providers by providing core applications to their operations, as well as applications to enhance and drive their business efficiencies.</p>\r\n<p  justify;">We assist the different segments of service providers in optimizing internal efficiencies and fulfilling customer and business requirements. Anticipating the needs and the overall direction of the industry has enabled us to develop an optimized solutions portfolio to align with the needs of the different segments.</p>\r\n<p  justify;">We cater to the following segments:</p>\r\n<ul>\r\n<li  justify;">Business (Enterprise)</li>\r\n<li  justify;">Personal</li>\r\n<li  justify;">Home</li>\r\n<li  justify;">Wholesale</li>\r\n</ul>\r\n<p  justify;">We have strategically partnered with a number of top technology providers to ensure that our solutions are tailored to the needs of our customers, as well as enrich our offerings with flexibility and diversity.</p>\r\n<p  justify;">Our extensive experience implementing projects in Egypt and the region has increased our market and industry understanding, strengthened our integration capabilities, and empowered our reputation.</p>\r\n<p  justify;">Benefits</p>\r\n<p  justify;">The benefits of our turnkey solutions for operators and service providers include:</p>\r\n<ul>\r\n<li  justify;">Addressing customer needs while complying with regulations</li>\r\n<li  justify;">Providing revenue generating services</li>\r\n<li  justify;">Improving profit margins</li>\r\n<li  justify;">Enhancing customer satisfaction</li>\r\n<li  justify;">Managing internal processes</li>\r\n<li  justify;">Ensuring timely, accurate, and reliable service provisioning&nbsp;</li>\r\n</ul>\r\n<p  justify;">&nbsp;</p>', '<p  justify;">Our Telecom team responds to the needs of telecom service providers by providing core applications to their operations, as well as applications to enhance and drive their business efficiencies.</p>\r\n<p  justify;">We assist the different segments of service providers in optimizing internal efficiencies and fulfilling customer and business requirements. Anticipating the needs and the overall direction of the industry has enabled us to develop an optimized solutions portfolio to align with the needs of the different segments.</p>\r\n<p  justify;">We cater to the following segments:</p>\r\n<ul>\r\n<li  justify;">Business (Enterprise)</li>\r\n<li  justify;">Personal</li>\r\n<li  justify;">Home</li>\r\n<li  justify;">Wholesale</li>\r\n</ul>\r\n<p  justify;">We have strategically partnered with a number of top technology providers to ensure that our solutions are tailored to the needs of our customers, as well as enrich our offerings with flexibility and diversity.</p>\r\n<p  justify;">Our extensive experience implementing projects in Egypt and the region has increased our market and industry understanding, strengthened our integration capabilities, and empowered our reputation.</p>\r\n<p  justify;">Benefits</p>\r\n<p  justify;">The benefits of our turnkey solutions for operators and service providers include:</p>\r\n<ul>\r\n<li  justify;">Addressing customer needs while complying with regulations</li>\r\n<li  justify;">Providing revenue generating services</li>\r\n<li  justify;">Improving profit margins</li>\r\n<li  justify;">Enhancing customer satisfaction</li>\r\n<li  justify;">Managing internal processes</li>\r\n<li  justify;">Ensuring timely, accurate, and reliable service provisioning&nbsp;</li>\r\n</ul>\r\n<p  justify;">&nbsp;</p>', 16, 1, 0, 1, '2013-03-18 21:43:24'),
	(36, 8, 'Industry Issues', '', '', '', '', 'Industry Issues', 'Industry Issues', '', '', '', '', '<p  justify;">In a dynamically changing landscape, the Telecommunications industry is constantly transforming and calling for innovative solutions for systems integration. Telecommunications are ubiquitous and pervasive in all aspects of our lives. What started as a hope to communicate using signals and wires has ignited into a fully-fledged untapped industry of possibilities and actualities.<br /><br /> The perpetual innovation in the industry and the sheer potential of telecom applications necessitate that the focal point be the customer. In a hyper-competitive market, customers have an abundance of choice. To meet head on the diverse challenges in the telecom industry and to cope with the fierce competitive nature of the market, telecom service providers must equip themselves to be able to recognize and seize the vibrant and massive opportunities in the industry.<br /><br /> Companies need to develop more efficient, effective and innovative ways to streamline their businesses. They must ensure reliable transfer of data, develop cost effective ways of doing business, optimize pricing of their products and services, and capitalize on the growing mobile technology with specific reference to data and media.</p>\r\n<p  justify;">Enhancing customer satisfaction, creating diverse revenue streams, assuring effective delivery of next-generation services and increasing efficiencies of internal organization processes are all integral to the growth and success of service providers.</p>\r\n<p  justify;">To achieve long-term growth, companies are mapping innovation to develop integrated solutions that can work with and build on the evolving telecom technology.</p>', '<p  justify;">In a dynamically changing landscape, the Telecommunications industry is constantly transforming and calling for innovative solutions for systems integration. Telecommunications are ubiquitous and pervasive in all aspects of our lives. What started as a hope to communicate using signals and wires has ignited into a fully-fledged untapped industry of possibilities and actualities.<br /><br /> The perpetual innovation in the industry and the sheer potential of telecom applications necessitate that the focal point be the customer. In a hyper-competitive market, customers have an abundance of choice. To meet head on the diverse challenges in the telecom industry and to cope with the fierce competitive nature of the market, telecom service providers must equip themselves to be able to recognize and seize the vibrant and massive opportunities in the industry.<br /><br /> Companies need to develop more efficient, effective and innovative ways to streamline their businesses. They must ensure reliable transfer of data, develop cost effective ways of doing business, optimize pricing of their products and services, and capitalize on the growing mobile technology with specific reference to data and media.</p>\r\n<p  justify;">Enhancing customer satisfaction, creating diverse revenue streams, assuring effective delivery of next-generation services and increasing efficiencies of internal organization processes are all integral to the growth and success of service providers.</p>\r\n<p  justify;">To achieve long-term growth, companies are mapping innovation to develop integrated solutions that can work with and build on the evolving telecom technology.</p>', 17, 1, 0, 1, '2013-03-18 21:44:26'),
	(37, 8, 'Industry Solutions', '', '', '', '', 'Industry Solutions', 'Industry Solutions', '', '', '', '', '<p  justify;">Our Telecom &nbsp;team serves to fulfill the various needs of the telecom industry by providing services to fixed line operators, mobile operators, call centers, brokers and security agencies. By creating a complete integrated platform of solutions serving the different business, personal, home and wholesale segments, we are able to provide services to address the wide range of our customers&rsquo; needs and provide integrated systems that consist of end-to-end solutions.<br /><br /> Our solutions portfolio includes:</p>\r\n<ul>\r\n<li  justify;">Telecom OSS solutions</li>\r\n<li  justify;">Blling &amp; customer care solutions</li>\r\n<li  justify;">Monitoring security solutions</li>\r\n<li  justify;">Asset management solutions</li>\r\n<li  justify;">Information infrastructure solutions</li>\r\n<li  justify;">Smart buildings solutions</li>\r\n</ul>\r\n<p  justify;">&nbsp;</p>\r\n<h   justify;"><span  #3399ff;">Solutions Portfolio</span></h3>\r\n<p><span  justify;">Anticipating the needs and the overall direction of the industry has enabled us to develop an optimized solutions portfolio to align with the needs of the different segments.&nbsp;To cater to the diverse needs of our clients and to ensure the integration of the emerging technologies, our portfolio is geared towards providing solutions related to the following:</span></p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=40">Network Inventory</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=39">Product Lifecycle Management</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=42">Product Catalog</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=43">Order Management</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=44">Wholesale Billing</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=45">Retail Billing</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=41">Business Process Management</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=46">Numbering Portability &ndash; Mobile &amp; Fixed</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=47">Number Management System </a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=48">E-Payment</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=49">Customer Experience Management</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=50">Revenue Assurance</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=51">Social Media Monitoring</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=52">Social Network Analysis</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=53">Inbound Marketing (Best Next Action)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=54">Broadband Management Systems</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=55">Prepaid Lifecycle Management</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=56">Least Cost Routing</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=57">End-to-End Mobile Service Management</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=59">Mobile Backhauling</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=60">WAN Optimization</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=61">Video Optimization</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=62">3G Offloading</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=63">Intelligent Power Management</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=58">Smart Cities</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=67">Mobile Network Optimization</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/vshowpage.php?id=68">Conversion &amp; Aggregation and Load Balancing Layer(Data Access)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=69">Anomaly Detection Secure Suite</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=64">Integrated Security Solutions</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=65">Intelligent Policy Enforcement</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=66">Security Solutions</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=70">Internet Content Filtering</a></li>\r\n</ul>', '<p  justify;">Our Telecom &nbsp;team serves to fulfill the various needs of the telecom industry by providing services to fixed line operators, mobile operators, call centers, brokers and security agencies. By creating a complete integrated platform of solutions serving the different business, personal, home and wholesale segments, we are able to provide services to address the wide range of our customers&rsquo; needs and provide integrated systems that consist of end-to-end solutions.<br /><br /> Our solutions portfolio includes:</p>\r\n<ul>\r\n<li  justify;">Telecom OSS solutions</li>\r\n<li  justify;">Blling &amp; customer care solutions</li>\r\n<li  justify;">Monitoring security solutions</li>\r\n<li  justify;">Asset management solutions</li>\r\n<li  justify;">Information infrastructure solutions</li>\r\n<li  justify;">Smart buildings solutions</li>\r\n</ul>\r\n<p  justify;">&nbsp;</p>\r\n<h   justify;"><span  #3399ff;">Solutions Portfolio</span></h3>\r\n<p><span  justify;">Anticipating the needs and the overall direction of the industry has enabled us to develop an optimized solutions portfolio to align with the needs of the different segments.&nbsp;To cater to the diverse needs of our clients and to ensure the integration of the emerging technologies, our portfolio is geared towards providing solutions related to the following:</span></p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=40">Network Inventory</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=39">Product Lifecycle Management</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=42">Product Catalog</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=43">Order Management</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=44">Wholesale Billing</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=45">Retail Billing</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=41">Business Process Management</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=46">Numbering Portability &ndash; Mobile &amp; Fixed</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=47">Number Management System </a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=48">E-Payment</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=49">Customer Experience Management</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=50">Revenue Assurance</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=51">Social Media Monitoring</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=52">Social Network Analysis</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=53">Inbound Marketing (Best Next Action)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=54">Broadband Management Systems</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=55">Prepaid Lifecycle Management</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=56">Least Cost Routing</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=57">End-to-End Mobile Service Management</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=59">Mobile Backhauling</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=60">WAN Optimization</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=61">Video Optimization</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=62">3G Offloading</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=63">Intelligent Power Management</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=58">Smart Cities</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=67">Mobile Network Optimization</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/vshowpage.php?id=68">Conversion &amp; Aggregation and Load Balancing Layer(Data Access)</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=69">Anomaly Detection Secure Suite</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=64">Integrated Security Solutions</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=65">Intelligent Policy Enforcement</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=66">Security Solutions</a></li>\r\n<li><a href="../../../../../../../gizasys/admin/showpage.php?id=70">Internet Content Filtering</a></li>\r\n</ul>', 18, 1, 0, 1, '2013-03-18 21:45:28'),
	(38, 9, 'brief', '', '', '', '', 'Brief', 'Brief', '', '', '', '', '<p  justify;">Realizing that transportation is one of the cornerstones of our lives spurs us to strive for an integrated vision for transportation. It is without a doubt a crucial driver to any nation\'s economy, as well as a major factor in the quality of life.</p>\r\n<p  justify;">With our utter dependency on transportation for all our needs, Giza Systems offers solutions to improve operational efficiencies, ensure security, and work towards the integration of systems for national infrastructures.</p>', '<p  justify;">Realizing that transportation is one of the cornerstones of our lives spurs us to strive for an integrated vision for transportation. It is without a doubt a crucial driver to any nation\'s economy, as well as a major factor in the quality of life.</p>\r\n<p  justify;">With our utter dependency on transportation for all our needs, Giza Systems offers solutions to improve operational efficiencies, ensure security, and work towards the integration of systems for national infrastructures.</p>', 19, 1, 0, 1, '2013-03-18 21:58:59'),
	(39, 9, 'Industry Issues', '', '', '', '', 'Industry Issues', 'Industry Issues', '', '', '', '', '<p  justify;">With the demand in transportation expected to exponentially increase, nations, as well enterprises and operations, need to ensure that they are ready to deal with the different variables.&nbsp;</p>\r\n<p  justify;">Mobility, congestion, safety, security, infrastructure, operational efficiencies, energy &nbsp;are just some of the factors involved in the transportation industry.&nbsp;</p>\r\n<p  justify;">Innovative and integrated solutions are key for the implementation of the vision of integration transportations operations and infrastructures.</p>', '<p  justify;">With the demand in transportation expected to exponentially increase, nations, as well enterprises and operations, need to ensure that they are ready to deal with the different variables.&nbsp;</p>\r\n<p  justify;">Mobility, congestion, safety, security, infrastructure, operational efficiencies, energy &nbsp;are just some of the factors involved in the transportation industry.&nbsp;</p>\r\n<p  justify;">Innovative and integrated solutions are key for the implementation of the vision of integration transportations operations and infrastructures.</p>', 20, 1, 0, 1, '2013-03-18 21:59:47'),
	(40, 9, 'contact', '', '', '', '', 'Contact', 'Contact', '', '', '', '', '<p>transportation@gizasystems.com</p>', '<p>transportation@gizasystems.com</p>', 21, 1, 0, 1, '2013-03-18 22:00:53');
/*!40000 ALTER TABLE `industry_sub` ENABLE KEYS */;


-- Dumping structure for table giza.management_team
CREATE TABLE IF NOT EXISTS `management_team` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `alias` varchar(250) DEFAULT NULL,
  `image_thumbs` text,
  `images` text,
  `image_thumb_selected` tinytext,
  `image_selected` tinytext,
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `title_ar` varchar(250) DEFAULT NULL,
  `seo_words` tinytext,
  `seo_words_ar` tinytext,
  `brief` text,
  `brief_ar` text,
  `body` text,
  `body_ar` text,
  `sort` tinyint(4) DEFAULT '0',
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.management_team: ~7 rows (approximately)
/*!40000 ALTER TABLE `management_team` DISABLE KEYS */;
INSERT INTO `management_team` (`id`, `alias`, `image_thumbs`, `images`, `image_thumb_selected`, `image_selected`, `name`, `name_ar`, `title`, `title_ar`, `seo_words`, `seo_words_ar`, `brief`, `brief_ar`, `body`, `body_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(5, 'Shehab El Nawawi', '', '', '', '', 'Shehab El Nawawi', 'Shehab El Nawawi', 'Chairman & CEO', 'Chairman & CEO', '', '', '<p>Shehab ElNawawi is the Chairman and CEO of Giza Systems, the leading systems integrator (SI) in Egypt and the Middle East.&nbsp;Shehab joined the company as Managing Director in late 2000 when it was on a downward spiral, and in 2004 he turned the company around. Since then he has tripled the company top line and quadrupled its market valuation. On his watch, the company saw a comeback that catapulted it to be the leader of the SI pack in the region, with a footprint that now spans the Middle East, and with established and growing subsidiaries in KSA and Dubai, and soon in Doha, Qatar and Tripoli, Libya.</p>', '<p>Shehab ElNawawi is the Chairman and CEO of Giza Systems, the leading systems integrator (SI) in Egypt and the Middle East.&nbsp;Shehab joined the company as Managing Director in late 2000 when it was on a downward spiral, and in 2004 he turned the company around. Since then he has tripled the company top line and quadrupled its market valuation. On his watch, the company saw a comeback that catapulted it to be the leader of the SI pack in the region, with a footprint that now spans the Middle East, and with established and growing subsidiaries in KSA and Dubai, and soon in Doha, Qatar and Tripoli, Libya.</p>', '<p>With his team he built a strong and robust vertically focused and customer-centric organization that enabled the development of business in different industry segments; and oversaw the inception of a number of subsidiaries geared to penetrate key growth markets and further expand the company&rsquo;s geographic footprint.</p>\r\n<p data-over-cable="">Shehab holds a Bachelors (Hons) degree in Biomedical Engineering from Cairo University.<br /> He became the Chairman of the company as well as its MD in 2007.</p>', '<p>With his team he built a strong and robust vertically focused and customer-centric organization that enabled the development of business in different industry segments; and oversaw the inception of a number of subsidiaries geared to penetrate key growth markets and further expand the company&rsquo;s geographic footprint.</p>\r\n<p data-over-cable="">Shehab holds a Bachelors (Hons) degree in Biomedical Engineering from Cairo University.<br /> He became the Chairman of the company as well as its MD in 2007.</p>', 2, 1, 0, 1, '2013-04-29 10:38:23'),
	(6, 'Ahmed Kamal', '', '', '', '', 'Ahmed Kamal', 'Ahmed Kamal', 'Chief Commerical Officer', 'Chief Commerical Officer', '', '', '<p>Ahmed Kamal is Chief Commerical Officer&nbsp;at Giza Systems, the leading systems integrator (SI) in Egypt and the Middle East.</p>', '<p>Ahmed Kamal is Chief Commerical Officer&nbsp;at Giza Systems, the leading systems integrator (SI) in Egypt and the Middle East.</p>', '<p  justify;"><span  justify;">Ahmed joined Giza Systems in 2002 as a Sector Sales Manager, after which he was promoted to Telecoms Business Unit Sales Manager. In July 2008, Ahmed was promoted to hold the position of&nbsp;</span>General Manager of the Telecom Business Unit<span  justify;">. In 2012, Ahmed became&nbsp;</span>Chief Commerical Officer.</p>\r\n<p  justify;">Prior to Giza Systems, Ahmed earned his years of experience through working for Oracle and SCALA. He holds a B.Sc. in telecommunications engineering, from Helwan University, class of 1993.</p>\r\n<p  justify;">Ahmed also holds an MBA Certificate from the Arab Academy for Science and Technology, class of 2008.</p>\r\n<p  justify;">With his team, Ahmed takes on the challenges of the telecommunications market, keeping up with its dynamicity and competitive nature.</p>', '<p  justify;"><span  justify;">Ahmed joined Giza Systems in 2002 as a Sector Sales Manager, after which he was promoted to Telecoms Business Unit Sales Manager. In July 2008, Ahmed was promoted to hold the position of&nbsp;</span>General Manager of the Telecom Business Unit<span  justify;">. In 2012, Ahmed became&nbsp;</span>Chief Commerical Officer.</p>\r\n<p  justify;">Prior to Giza Systems, Ahmed earned his years of experience through working for Oracle and SCALA. He holds a B.Sc. in telecommunications engineering, from Helwan University, class of 1993.</p>\r\n<p  justify;">Ahmed also holds an MBA Certificate from the Arab Academy for Science and Technology, class of 2008.</p>\r\n<p  justify;">With his team, Ahmed takes on the challenges of the telecommunications market, keeping up with its dynamicity and competitive nature.</p>', 4, 1, 0, 1, '2013-03-19 09:17:59'),
	(7, 'Hazem Maharem', '', '', '', '', 'Hazem Maharem', 'Hazem Maharem', 'Chief Financial Officer', 'Chief Financial Officer', '', '', '<p  justify;">Hazem Maharem is Chief Financial Officer at Giza Systems, the leading systems integrator in Egypt and the Middle East. Hazem joined Giza Systems in 2001 as Finance Director, and currently sits on the Board of Giza Systems.</p>', '<p  justify;">Hazem Maharem is Chief Financial Officer at Giza Systems, the leading systems integrator in Egypt and the Middle East. Hazem joined Giza Systems in 2001 as Finance Director, and currently sits on the Board of Giza Systems.</p>', '<p  justify;">Prior to Giza Systems, Hazem worked for Arthur Andersen Shawki &amp; Co, holding a senior position in Audit &amp; Consulting, he then moved to African Export &ndash; Import Bank as Senior Accounting Associate, after which he joined Asset Technology Group as Group Finance Director.</p>\r\n<p  justify;">Hazem holds a B.A. in Accounting from Cairo University, class of 1988. In addition, he is a Certified Public Accountant - CPA from California, he is a fellow of the Egyptian Society of Accountants and Auditors (FESAA), Egyptian Society of Taxation (FEST) and the Arab Union of Accountants and Auditors.</p>', '<p  justify;">Prior to Giza Systems, Hazem worked for Arthur Andersen Shawki &amp; Co, holding a senior position in Audit &amp; Consulting, he then moved to African Export &ndash; Import Bank as Senior Accounting Associate, after which he joined Asset Technology Group as Group Finance Director.</p>\r\n<p  justify;">Hazem holds a B.A. in Accounting from Cairo University, class of 1988. In addition, he is a Certified Public Accountant - CPA from California, he is a fellow of the Egyptian Society of Accountants and Auditors (FESAA), Egyptian Society of Taxation (FEST) and the Arab Union of Accountants and Auditors.</p>', 1, 1, 0, 1, '2013-03-19 09:19:54'),
	(8, 'Khaled Marmoush', '', '', '', '', 'Khaled Marmoush', 'Khaled Marmoush', 'Chief Information Officer', 'Chief Information Officer', '', '', '<p>Khaled Marmoush is Chief Information Officer at Giza Systems.</p>', '<p>Khaled Marmoush is Chief Information Officer at Giza Systems.</p>', '<p  ltr;">Khaled joined Giza Systems in 2013, prior to which he was CIO and Vice President for Information Technology at Telecom Egypt. Khaled is an information technology/business consultant with more than 27 years of experience in the areas of Executive Management, Consulting, Business Process Improvement, Business Development/Analysis, and Project Management. He worked with several telecommunications service providers, international consulting and systems integration, firms in different countries including Canada, Egypt, U.A.E, and the US.&nbsp;The companies he had worked with include American Management Systems, SchlumbergerSema, Etisalat, and Telecom Egypt.&nbsp; He holds a Masters in Information Science and a B.Sc. in Computer Science.</p>', '<p  ltr;">Khaled joined Giza Systems in 2013, prior to which he was CIO and Vice President for Information Technology at Telecom Egypt. Khaled is an information technology/business consultant with more than 27 years of experience in the areas of Executive Management, Consulting, Business Process Improvement, Business Development/Analysis, and Project Management. He worked with several telecommunications service providers, international consulting and systems integration, firms in different countries including Canada, Egypt, U.A.E, and the US.&nbsp;The companies he had worked with include American Management Systems, SchlumbergerSema, Etisalat, and Telecom Egypt.&nbsp; He holds a Masters in Information Science and a B.Sc. in Computer Science.</p>', 3, 1, 0, 1, '2013-03-19 09:21:51'),
	(9, 'Mohamed Sedeek', '', '', '', '', 'Mohamed Sedeek', 'Mohamed Sedeek', 'Chief Operations Officer', 'Chief Operations Officer', '', '', '<p><span  justify;">Mohamed Sedeek is&nbsp;</span>Chief Operations Officer<span  justify;">&nbsp;at Giza Systems, the leading systems integrator in Egypt and the Middle East. Sedeek joined Giza Systems in 1982, shortly after his graduation.</span></p>', '<p><span  justify;">Mohamed Sedeek is&nbsp;</span>Chief Operations Officer<span  justify;">&nbsp;at Giza Systems, the leading systems integrator in Egypt and the Middle East. Sedeek joined Giza Systems in 1982, shortly after his graduation.</span></p>', '<p  justify;">Sedeek started out as a Maintenance Engineer, promoted to Senior Maintenance Engineer and then a supervisor. Upon an organization restructure, Sedeek became the General Manager of Telecom Business Unit then Vice President Sales and Delivery in 2008. In 2012 Sedeek became Chief Operations Officer.</p>\r\n<p  justify;">Sedeek holds a BSc in Computer Engineering from Alexandria University, class of 1982. He also earned a Masters Degree in Computer Science in 1987 and Masters in Business Administration, from Arab Academy in 2007.</p>', '<p  justify;">Sedeek started out as a Maintenance Engineer, promoted to Senior Maintenance Engineer and then a supervisor. Upon an organization restructure, Sedeek became the General Manager of Telecom Business Unit then Vice President Sales and Delivery in 2008. In 2012 Sedeek became Chief Operations Officer.</p>\r\n<p  justify;">Sedeek holds a BSc in Computer Engineering from Alexandria University, class of 1982. He also earned a Masters Degree in Computer Science in 1987 and Masters in Business Administration, from Arab Academy in 2007.</p>', 5, 1, 0, 1, '2013-03-19 09:23:31'),
	(10, 'Osama Sorour', '', '', '', '', 'Osama Sorour', 'Osama Sorour', 'Chief Strategy Officer', 'Chief Strategy Officer', '', '', '<p>Osama Sorour is Chief Strategy Officer Giza Systems, the leading systems integrator (SI) in Egypt and the Middle East. He leads his team towards constant successes, addressing the unique management and business challenges faced in this fast-paced market.</p>', '<p>Osama Sorour is Chief Strategy Officer Giza Systems, the leading systems integrator (SI) in Egypt and the Middle East. He leads his team towards constant successes, addressing the unique management and business challenges faced in this fast-paced market.</p>', '<p  justify;">Osama joined Giza Systems in1995 as a Process Control Group Manager then got promoted to the Instrumentation Department Manager. He, then, became the Industrial Applications Unit General Manager and then Vice President Marketing and Strategic Planning. In 2012, Osama became Chief Strategy Officer.&nbsp;</p>\r\n<p  justify;">Osama holds a B.Sc. in Engineering from Cairo University, class of 1988, and Masters in Business Administration from the Arab Academy, class of 2005.</p>\r\n<p  justify;">Prior to Giza Systems, Osama worked as a System Engineer at Arab Consulting Engineers from 1988 through 1990. He then moved to Gupco as an Automation Engineer in 1990 through 1992. In 1993, Osama worked at Foxboro as a DCS Presales Engineer, until 1995.</p>\r\n<p  justify;">Osama holds memberships at TeleManagement Forum and the American Chamber of Commerce in Egypt, AmCham. He is&nbsp;also active in volunteer work and participated in programs including Injaz, which involves mentoring and inspiring youth.&nbsp;</p>', '<p  justify;">Osama joined Giza Systems in1995 as a Process Control Group Manager then got promoted to the Instrumentation Department Manager. He, then, became the Industrial Applications Unit General Manager and then Vice President Marketing and Strategic Planning. In 2012, Osama became Chief Strategy Officer.&nbsp;</p>\r\n<p  justify;">Osama holds a B.Sc. in Engineering from Cairo University, class of 1988, and Masters in Business Administration from the Arab Academy, class of 2005.</p>\r\n<p  justify;">Prior to Giza Systems, Osama worked as a System Engineer at Arab Consulting Engineers from 1988 through 1990. He then moved to Gupco as an Automation Engineer in 1990 through 1992. In 1993, Osama worked at Foxboro as a DCS Presales Engineer, until 1995.</p>\r\n<p  justify;">Osama holds memberships at TeleManagement Forum and the American Chamber of Commerce in Egypt, AmCham. He is&nbsp;also active in volunteer work and participated in programs including Injaz, which involves mentoring and inspiring youth.&nbsp;</p>', 7, 1, 0, 1, '2013-03-19 09:25:33'),
	(11, 'Wessam Ghazy', '/added/uploads/management_team/1363972803_thumb.jpg', '/added/uploads/management_team/1363972803.jpg', '/added/uploads/management_team/1363972803_thumb.jpg', '/added/uploads/management_team/1363972803.jpg', 'Wessam Ghazy', 'Wessam Ghazy', 'Chief Shared Services Officer', 'Chief Shared Services Officer', '', '', '<p>Wessam joined Giza Systems in 2009 as the Organization Change Leader, she then became Director of Institutional Development. In 2012, Wessam was promoted to become Chief Shared Services Officer.</p>', '<p>Wessam joined Giza Systems in 2009 as the Organization Change Leader, she then became Director of Institutional Development. In 2012, Wessam was promoted to become Chief Shared Services Officer.</p>', '<p><span>Prior to joining Giza Systems, Wessam was the Regional Business Development Senior Manager at PricewaterhouseCoopers with a dynamic focus on managing PwC&rsquo;s Middle East Industry Program, marketing, business development, project management, learning and education and knowledge management in the Middle East Firm.</span></p>\r\n<p>Wessam has a proven track record as a successful brand strategist with a focus on strategic positioning, creative conceptualization, and business and relationship network development.</p>', '<p><span>Prior to joining Giza Systems, Wessam was the Regional Business Development Senior Manager at PricewaterhouseCoopers with a dynamic focus on managing PwC&rsquo;s Middle East Industry Program, marketing, business development, project management, learning and education and knowledge management in the Middle East Firm.</span></p>\r\n<p>Wessam has a proven track record as a successful brand strategist with a focus on strategic positioning, creative conceptualization, and business and relationship network development.</p>', 6, 1, 0, 1, '2013-03-22 19:20:03');
/*!40000 ALTER TABLE `management_team` ENABLE KEYS */;


-- Dumping structure for table giza.media_item
CREATE TABLE IF NOT EXISTS `media_item` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `media_section_id` int(10) NOT NULL DEFAULT '0',
  `alias` varchar(250) NOT NULL,
  `icon` tinytext,
  `banner_image_thumbs` text,
  `banner_files` text,
  `banner_image_thumb_selected` tinytext,
  `banner_file_selected` tinytext,
  `title` varchar(250) DEFAULT NULL,
  `title_ar` varchar(250) DEFAULT NULL,
  `seo_words` tinytext,
  `seo_words_ar` tinytext,
  `brief` text,
  `brief_ar` text,
  `body` text,
  `body_ar` text,
  `pdf_file` tinytext,
  `video_file` tinytext,
  `the_date` date DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.media_item: 30 rows
/*!40000 ALTER TABLE `media_item` DISABLE KEYS */;
INSERT INTO `media_item` (`id`, `media_section_id`, `alias`, `icon`, `banner_image_thumbs`, `banner_files`, `banner_image_thumb_selected`, `banner_file_selected`, `title`, `title_ar`, `seo_words`, `seo_words_ar`, `brief`, `brief_ar`, `body`, `body_ar`, `pdf_file`, `video_file`, `the_date`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(7, 4, 'Water Presentation', '/added/uploads/media_item/1351753293drop copy.png', NULL, NULL, NULL, NULL, 'Water Presentation', 'Water Presentation', 'Water Presentation', 'Water Presentation', '<p>\r\n	The presentation provides an overview of Giza Systems&#39; solutions portfolio to address the needs of our clients.&nbsp;</p>\r\n', '<p>\r\n	The presentation provides an overview of Giza Systems&#39; solutions portfolio to address the needs of our clients.&nbsp;</p>\r\n', '<br />\r\n', '<br />\r\n', '', '/added/uploads/media_item/Giza_Systems_Water_Sector.flv', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(4, 5, 'ABC', '/added/uploads/media_item/1329386438downloads_icon.png', NULL, NULL, NULL, NULL, 'ABC', 'ABC', 'ABC', 'ABC', '<p>\r\n	fdasfcer werwerqewrqwe&nbsp;</p>\r\n', '<p>\r\n	fdasfcer werwerqewrqwe&nbsp;</p>\r\n', '', '', '', '', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(5, 2, 'Nozzom Issue 16', '/added/uploads/media_item/13517542161351521443admin_newsletter_pdf_21-1 copy.jpg', NULL, NULL, NULL, NULL, 'Nozzom Issue 16', 'Nozzom Issue 16', 'Nozzom Issue 16', 'Nozzom Issue 16', '<br />\r\n', '<br />\r\n', '<br />\r\n', '<br />\r\n', '/added/uploads/media_item/1351521443admin_newsletter_pdf_21.pdf', '', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(6, 4, 'Corporate Presentation', '/added/uploads/media_item/1351605159giza_systems_ light blue copy.png', NULL, NULL, NULL, NULL, 'Corporate Presentation', 'Corporate Presentation', 'Corporate Presentation', 'Corporate Presentation', '<br />\r\n', '<br />\r\n', '<br />\r\n', '<br />\r\n', '', '/added/uploads/media_item/Giza_Systems_Profile.flv', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(8, 4, 'Giza Systems Foundation', '/added/uploads/media_item/1351752686gs edu foundation logo.png', NULL, NULL, NULL, NULL, 'Giza Systems Foundation', 'Giza Systems Foundation', 'Giza Systems Foundation', 'Giza Systems Foundation', '<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n', '<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n', '<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n', '<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n', '', '/added/uploads/media_item/Giza_Systems_Foundation.flv', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(9, 4, 'Giza Systems Telecom Sector', '/added/uploads/media_item/1351753442telecom brochure for kori-1 copy.png', NULL, NULL, NULL, NULL, 'Giza Systems Telecom Sector', 'Giza Systems Telecom Sector', 'Giza Systems Telecom Sector', 'Giza Systems Telecom Sector', '<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n', '<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n', '<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n', '<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n', '', '/added/uploads/media_item/Giza_Systems_Telecom_Sector.flv', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(10, 4, 'Giza Systems Power Sector', '/added/uploads/media_item/1351753714power bulb-01 copy.png', NULL, NULL, NULL, NULL, 'Giza Systems Power Sector', 'Giza Systems Power Sector', 'Giza Systems Power Sector', 'Giza Systems Power Sector', '<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n', '<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n', '<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n', '<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n', '', '/added/uploads/media_item/Giza_Systems_Power_Sector.flv', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(11, 2, 'Nozzom Issue 17', '/added/uploads/media_item/1351754381admin_newsletter_pdf_24-1 copy.jpg', NULL, NULL, NULL, NULL, 'Nozzom Issue 17', 'Nozzom Issue 17', 'Nozzom Issue 17', 'Nozzom Issue 17', '<br />\r\n', '<br />\r\n', '<br />\r\n', '<br />\r\n', '/added/uploads/media_item/1351754382admin_newsletter_pdf_24.pdf', '', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(12, 3, 'Vacancies', '/added/uploads/media_item/1351861259vacancies nov 11.png', NULL, NULL, NULL, NULL, 'Vacancies', 'Vacancies', 'Vacancies', 'Vacancies', '<p>\r\n	Published in: Khaleej Times</p>\r\n<p>\r\n	Date: 9th August 2011</p>\r\n', '<p>\r\n	Published in: Khaleej Times</p>\r\n<p>\r\n	Date: 9th August 2011</p>\r\n', '', '', '/added/uploads/media_item/1351853938kt issue dated 9th aug (3).pdf', '', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(13, 3, 'Move of Headquarters', '/added/uploads/media_item/1351861573business today move ad.png', NULL, NULL, NULL, NULL, 'Move of Headquarters', 'Move of Headquarters', 'Move of Headquarters', 'Move of Headquarters', '<p>\r\n	Published in: Business Today</p>\r\n<p>\r\n	Date: November 2011</p>\r\n', '<p>\r\n	Published in: Business Today</p>\r\n<p>\r\n	Date: November 2011</p>\r\n', '<br />\r\n', '<br />\r\n', '/added/uploads/media_item/1351854220business today move ad nov 11.pdf', '', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(14, 1, '\'Min Masry Le Masry\' Initiative', '', NULL, NULL, NULL, NULL, '\'Min Masry Le Masry\' Initiative', '\'Min Masry Le Masry\' Initiative', '\'Min Masry Le Masry\' Initiative', '\'Min Masry Le Masry\' Initiative', '<p>\r\n	Published in: Al Akhbar newspaper</p>\r\n<p>\r\n	Date: 24 June 2011</p>\r\n', '<p>\r\n	Published in: Al Akhbar newspaper</p>\r\n<p>\r\n	Date: 24 June 2011</p>\r\n', '<br />\r\n', '<br />\r\n', '', '', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(15, 1, '\'Min Masry Le Masry\' Initiative', '/added/uploads/media_item/1351886630min masry le masry logo.png', NULL, NULL, NULL, NULL, '\'Min Masry Le Masry\' Initiative', '\'Min Masry Le Masry\' Initiative', '\'Min Masry Le Masry\' Initiative', '\'Min Masry Le Masry\' Initiative', '<p>\r\n	Published in: El-Alam El Yom</p>\r\n<p>\r\n	Date: 11 April 2011</p>\r\n', '<p>\r\n	Published in: El-Alam El Yom</p>\r\n<p>\r\n	Date: 11 April 2011</p>\r\n', '', '', '/added/uploads/media_item/1351886630elalam el yom 11 april 2011.jpg', '', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(16, 1, '\'Min Masry Le Masry\' Initiative', '/added/uploads/media_item/1351886954min masry le masry logo.png', NULL, NULL, NULL, NULL, '\'Min Masry Le Masry\' Initiative', '\'Min Masry Le Masry\' Initiative', '\'Min Masry Le Masry\' Initiative', '\'Min Masry Le Masry\' Initiative', '<p>\r\n	Published in: El-Alam El Yom</p>\r\n<p>\r\n	Date: 7 April 2011</p>\r\n', '<p>\r\n	Published in: El-Alam El Yom</p>\r\n<p>\r\n	Date: 7 April 2011</p>\r\n', '', '', '/added/uploads/media_item/1351886954elalam el yom 7 april 2011.jpg', '', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(17, 1, '\'Min Masry Le Masry\' Initiative', '/added/uploads/media_item/1351887638min masry le masry logo.png', NULL, NULL, NULL, NULL, '\'Min Masry Le Masry\' Initiative', '\'Min Masry Le Masry\' Initiative', '\'Min Masry Le Masry\' Initiative', '\'Min Masry Le Masry\' Initiative', '<p>\r\n	Published in: Al-Ahram newspaper</p>\r\n<p>\r\n	Date: 11 April 2011</p>\r\n', '<p>\r\n	Published in: Al-Ahram newspaper</p>\r\n<p>\r\n	Date: 11 April 2011</p>\r\n', '', '', '/added/uploads/media_item/1351887638alahram 11 april 2011.jpg', '', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(18, 1, '\'Min Masry Le Masry\' Initiative', '/added/uploads/media_item/1351888252min masry le masry logo.png', NULL, NULL, NULL, NULL, '\'Min Masry Le Masry\' Initiative', '\'Min Masry Le Masry\' Initiative', '\'Min Masry Le Masry\' Initiative', '\'Min Masry Le Masry\' Initiative', '<p>\r\n	Published in: Al-Ahram newspaper</p>\r\n<p>\r\n	Date: 9 April 2011</p>\r\n', '<p>\r\n	Published in: Al-Ahram newspaper</p>\r\n<p>\r\n	Date: 9 April 2011</p>\r\n', '', '', '/added/uploads/media_item/1351888252alahram 9 april 2011.jpg', '', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(19, 2, 'Nozzom Issue 13', '/added/uploads/media_item/1352308340nozzom issue 13.png', NULL, NULL, NULL, NULL, 'Nozzom Issue 13', 'Nozzom Issue 13', 'Nozzom Issue 13', 'Nozzom Issue 13', '', '', '', '', '/added/uploads/media_item/1351891783nozzom issue 13.pdf', '', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(20, 2, 'Nozzom Issue 2', '/added/uploads/media_item/1351895969nozzom issue 2.png', NULL, NULL, NULL, NULL, 'Nozzom Issue 2', 'Nozzom Issue 2', 'Nozzom Issue 2', 'Nozzom Issue 2', '<br />\r\n', '<br />\r\n', '<br />\r\n', '<br />\r\n', '/added/uploads/media_item/1351895969nozzom issue 2.pdf', '', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(21, 2, 'Nozzom Issue 5', '/added/uploads/media_item/1351898811nozzom issue 5.png', NULL, NULL, NULL, NULL, 'Nozzom Issue 5', 'Nozzom Issue 5', 'Nozzom Issue 5', 'Nozzom Issue 5', '', '', '', '', '/added/uploads/media_item/1351898811nozzom issue 5.pdf', '', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(22, 2, 'Nozzom Issue 3', '/added/uploads/media_item/1351899473nozzom issue 3.png', NULL, NULL, NULL, NULL, 'Nozzom Issue 3', 'Nozzom Issue 3', 'Nozzom Issue 3', 'Nozzom Issue 3', '<br />\r\n', '<br />\r\n', '<br />\r\n', '<br />\r\n', '/added/uploads/media_item/1351899473nozzom issue 3.pdf', '', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(23, 2, 'Nozzom Issue 12', '/added/uploads/media_item/1352045990nozzom issue 12.png', NULL, NULL, NULL, NULL, 'Nozzom Issue 12', 'Nozzom Issue 12', 'Nozzom Issue 12', 'Nozzom Issue 12', '<br />\r\n', '<br />\r\n', '<br />\r\n', '<br />\r\n', '/added/uploads/media_item/1352045990nozzom issue 12.pdf', '', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(24, 2, 'Nozzom Issue 11', '/added/uploads/media_item/1352046375nozzom issue 11.png', NULL, NULL, NULL, NULL, 'Nozzom Issue 11', 'Nozzom Issue 11', 'Nozzom Issue 11', 'Nozzom Issue 11', '<br />\r\n', '<br />\r\n', '<br />\r\n', '<br />\r\n', '/added/uploads/media_item/1352046375nozzom issue 11.pdf', '', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(25, 2, 'Nozzom Issue 10', '/added/uploads/media_item/1352046447nozzom issue 10.png', NULL, NULL, NULL, NULL, 'Nozzom Issue 10', 'Nozzom Issue 10', 'Nozzom Issue 10', 'Nozzom Issue 10', '<br />\r\n', '<br />\r\n', '<br />\r\n', '<br />\r\n', '/added/uploads/media_item/1352046447nozzom issue 10.pdf', '', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(26, 2, 'Nozzom Issue 8', '/added/uploads/media_item/1352046552nozzom issue 8.png', NULL, NULL, NULL, NULL, 'Nozzom Issue 8', 'Nozzom Issue 8', 'Nozzom Issue 8', 'Nozzom Issue 8', '<br />\r\n', '<br />\r\n', '<br />\r\n', '<br />\r\n', '/added/uploads/media_item/1352046552nozzim issue 8.pdf', '', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(27, 2, 'Nozzom Issue 7', '/added/uploads/media_item/1352046680nozzom issue 7.png', NULL, NULL, NULL, NULL, 'Nozzom Issue 7', 'Nozzom Issue 7', 'Nozzom Issue 7', 'Nozzom Issue 7', '<br />\r\n', '<br />\r\n', '<br />\r\n', '<br />\r\n', '/added/uploads/media_item/1352046680nozzom issue 7.pdf', '', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(28, 2, 'Nozzom Issue 6', '/added/uploads/media_item/1352046770nozzom issue 6.png', '', '', '', '', 'Nozzom Issue 6', 'Nozzom Issue 6', 'Nozzom Issue 6', 'Nozzom Issue 6', '', '', '', '', '/added/uploads/media_item/1352046770nozzom issue 6.pdf', '', '2013-04-17', 1, 0, 1, '2013-04-10 08:48:11'),
	(29, 2, 'Nozzom Issue 15', '/added/uploads/media_item/1352048070issue 15.png', NULL, NULL, NULL, NULL, 'Nozzom Issue 15', 'Nozzom Issue 15', 'Nozzom Issue 15', 'Nozzom Issue 15', '<br />\r\n', '<br />\r\n', '<br />\r\n', '<br />\r\n', '/added/uploads/media_item/1352048070nozzom issue 15..pdf', '', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(30, 4, 'Oil and Gas', '/added/uploads/media_item/1356616736oil and gas.png', NULL, NULL, NULL, NULL, 'Oil and Gas', 'Oil and Gas', 'Oil and Gas', 'Oil and Gas', '<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n', '<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n', '<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n', '<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n', '', '/added/uploads/media_item/Giza Systems - Oil and Gas Sector.flv', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(31, 4, 'Manufacturing', '/added/uploads/media_item/1356616874manufacturing.png', NULL, NULL, NULL, NULL, 'Manufacturing', 'Manufacturing', 'Manufacturing', 'Manufacturing', '<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n', '<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n', '<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n', '<p>\r\n	&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n', '', '/added/uploads/media_item/Giza Systems - Manufacturing Sector.flv', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(32, 12, 'Rate Card', '', NULL, NULL, NULL, NULL, 'Rate Card', 'Rate Card', 'Rate Card', 'Rate Card', '', '', '', '', '/added/uploads/media_item/1360063387nozzom rate card for print.pdf', '', '2013-04-09', 1, 0, 1, '2013-04-09 22:11:46'),
	(33, 2, 'Nozzom Issue 18', '/added/uploads/media_item/1360142525nozzom 18 final-1 copy.jpg', '', '', '', '', 'Nozzom Issue 18', 'Nozzom Issue 18', 'Nozzom Issue 18', 'Nozzom Issue 18', '', '', '', '', '/added/uploads/media_item/1360142526nozzom 18 final.pdf', '', '2013-04-10', 1, 0, 1, '2013-04-10 08:44:13');
/*!40000 ALTER TABLE `media_item` ENABLE KEYS */;


-- Dumping structure for table giza.media_section
CREATE TABLE IF NOT EXISTS `media_section` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `media_section_category_id` int(10) NOT NULL DEFAULT '0',
  `alias` varchar(250) NOT NULL,
  `icon` tinytext,
  `banner_image_thumbs` text,
  `banner_files` text,
  `banner_image_thumb_selected` tinytext,
  `banner_file_selected` tinytext,
  `title` varchar(250) DEFAULT NULL,
  `title_ar` varchar(250) DEFAULT NULL,
  `seo_words` tinytext,
  `seo_words_ar` tinytext,
  `brief` text,
  `brief_ar` text,
  `body` text,
  `body_ar` text,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.media_section: 5 rows
/*!40000 ALTER TABLE `media_section` DISABLE KEYS */;
INSERT INTO `media_section` (`id`, `media_section_category_id`, `alias`, `icon`, `banner_image_thumbs`, `banner_files`, `banner_image_thumb_selected`, `banner_file_selected`, `title`, `title_ar`, `seo_words`, `seo_words_ar`, `brief`, `brief_ar`, `body`, `body_ar`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 2, 'News', '/added/uploads/banner/media_section/1365148630_icon.png', '', '', '', '', 'News', 'News', '', '', '', '', '', '', 1, 0, 1, '2013-04-05 09:58:24'),
	(2, 2, 'Newsletter', '/added/uploads/banner/media_section/1365148680_icon.png', '', '', '', '', 'Newsletter', 'Newsletter', '', '', '', '', '', '', 1, 0, 1, '2013-04-05 09:58:00'),
	(3, 2, 'Adsvertise', '/added/uploads/banner/media_section/1365148764_icon.png', '', '', '', '', 'Ads', 'Ads', '', '', '', '', '', '', 1, 0, 1, '2013-04-05 09:59:24'),
	(4, 2, 'Presentation', '/added/uploads/banner/media_section/1365148814_icon.png', '', '', '', '', 'Presentation', 'Presentation', '', '', '', '', '', '', 1, 0, 1, '2013-04-05 10:00:14'),
	(5, 1, 'Test for Electornic Media', '/added/uploads/banner/media_section/1365178150_icon.jpg', '', '', '', '', 'Test for Electornic Media', 'Test for Electornic Media', '', '', '', '', '', '', 1, 0, 1, '2013-04-05 18:09:10');
/*!40000 ALTER TABLE `media_section` ENABLE KEYS */;


-- Dumping structure for table giza.media_section_category
CREATE TABLE IF NOT EXISTS `media_section_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `alias` varchar(250) NOT NULL,
  `icon` tinytext,
  `banner_image_thumbs` text,
  `banner_files` text,
  `banner_image_thumb_selected` tinytext,
  `banner_file_selected` tinytext,
  `title` varchar(250) DEFAULT NULL,
  `title_ar` varchar(250) DEFAULT NULL,
  `seo_words` tinytext,
  `seo_words_ar` tinytext,
  `brief` text,
  `brief_ar` text,
  `body` text,
  `body_ar` text,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.media_section_category: 3 rows
/*!40000 ALTER TABLE `media_section_category` DISABLE KEYS */;
INSERT INTO `media_section_category` (`id`, `alias`, `icon`, `banner_image_thumbs`, `banner_files`, `banner_image_thumb_selected`, `banner_file_selected`, `title`, `title_ar`, `seo_words`, `seo_words_ar`, `brief`, `brief_ar`, `body`, `body_ar`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'Electronic Media', '/added/uploads/banner/media_section_category/1362942753award.jpg', '/added/uploads/banner/media_section_category/1362942690_thumb.jpg,,,/added/uploads/banner/media_section_category/1362942753_thumb.jpg', '/added/uploads/banner/media_section_category/1362942690.jpg,,,/added/uploads/banner/media_section_category/1362942753.jpg', '/added/uploads/banner/media_section_category/1362942690_thumb.jpg', '/added/uploads/banner/media_section_category/1362942690.jpg', 'Electronic Media', 'الميديا الالكترونية', '', '', '', '', '', '', 1, 0, 1, '2013-04-05 09:53:52'),
	(2, 'Info Media', '', '', '', '', '', 'Info Media', 'Info Media', '', '', '', '', '', '', 1, 0, 1, '2013-04-05 09:54:26'),
	(3, 'Media Kit', '', '', '', '', '', 'Media Kit', 'Media Kit', '', '', '', '', '', '', 1, 0, 1, '2013-04-05 09:54:57');
/*!40000 ALTER TABLE `media_section_category` ENABLE KEYS */;


-- Dumping structure for table giza.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `title_ar` varchar(100) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.menu: 10 rows
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `title`, `title_ar`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'Main menu', 'القائمة الرئيسية', 1, 0, 1, '2013-03-13 08:51:59'),
	(2, 'Footer 1 Menu', 'قائمة الفوتر 1', 1, 0, 1, '2013-03-16 21:38:37'),
	(3, 'Partner Zone', 'المساهمين', 1, 0, 1, '2013-04-09 10:22:41'),
	(4, 'Alumni', 'الموظفين', 1, 0, 1, '2013-04-09 10:22:07'),
	(5, 'Media Center', 'Media Center', 1, 0, 1, '2013-04-05 10:22:32'),
	(6, 'Clients', 'العملاء', 1, 0, 1, '2013-04-09 10:21:13'),
	(7, 'Why Giza Systems?', 'لماذا جيزة للنظم؟', 1, 0, 1, '2013-03-23 09:47:38'),
	(8, 'Is Giza Systems for Me?', 'Is Giza Systems for Me?', 1, 0, 1, '2013-03-23 09:49:38'),
	(9, 'How do I Apply?', 'How do I Apply?', 1, 0, 1, '2013-03-23 09:48:57'),
	(10, 'Integrate Me', 'Integrate Me', 1, 0, 1, '2013-03-23 09:49:19');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


-- Dumping structure for table giza.menu_link
CREATE TABLE IF NOT EXISTS `menu_link` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `controller_name` varchar(100) NOT NULL,
  `alias` varchar(300) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `title` varchar(250) NOT NULL,
  `title_ar` varchar(250) NOT NULL,
  `sort` int(10) NOT NULL DEFAULT '0',
  `menu_id` int(10) NOT NULL,
  `icon` tinytext NOT NULL,
  `style` varchar(250) NOT NULL,
  `approved` tinyint(4) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `last_user_id` int(11) NOT NULL,
  `last_modify_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.menu_link: 70 rows
/*!40000 ALTER TABLE `menu_link` DISABLE KEYS */;
INSERT INTO `menu_link` (`id`, `controller_name`, `alias`, `parent_id`, `title`, `title_ar`, `sort`, `menu_id`, `icon`, `style`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'page', 'About Giza Systems', 0, 'About Giza Systems', 'عن شركة جيزة', 1, 1, '', 'width:190px', 1, 0, 1, '2013-03-19 09:47:12'),
	(2, 'industry', '', 0, 'Industries', 'الصناعات', 2, 1, '', 'width:180px', 1, 0, 1, '2013-03-19 09:52:34'),
	(3, 'solution', '', 0, 'Solutions', 'الحلول', 3, 1, '', 'width:180px', 1, 0, 1, '2013-03-19 09:53:18'),
	(4, 'page', 'Corporate Profile', 0, 'Corporate Citizen', 'Corporate Citizen', 4, 1, '', 'width:195px', 1, 0, 1, '2013-03-27 21:49:33'),
	(5, 'career', '', 0, 'Careers', 'التوظيف', 5, 1, '', 'width:180px', 1, 1, 1, '2013-03-19 21:00:42'),
	(6, 'page', 'Corporate Factsheet', 1, 'Corporate Factsheet', 'Corporate Factsheet', 1, 0, '', '', 1, 0, 1, '2013-03-19 10:03:11'),
	(7, 'managementteam', '', 1, 'Management Team', 'فريق الادارة', 2, 0, '', '', 1, 0, 1, '2013-03-19 10:04:10'),
	(8, 'page', 'Milestones', 1, 'Milestones', 'Milestones', 3, 0, '', '', 1, 0, 1, '2013-03-19 10:05:21'),
	(9, 'page', 'Vision & Mission', 1, 'Vision & Mission', 'Vision & Mission', 4, 0, '', '', 1, 0, 1, '2013-03-19 10:05:59'),
	(10, 'page', 'Values', 1, 'Values', 'Values', 5, 0, '', '', 1, 0, 1, '2013-03-19 10:06:36'),
	(11, 'award', '', 1, 'Awards & Recognition ', 'Awards & Recognition ', 6, 0, '', '', 1, 0, 1, '2013-03-19 10:07:25'),
	(12, 'subsidiary', '', 1, 'Subsidiaries', 'الشركات التابعة', 7, 0, '', '', 1, 0, 1, '2013-03-19 10:08:16'),
	(13, 'industry', 'power', 2, 'Power', 'Power', 0, 0, '/added/uploads/menu/1364671541award.png', '', 1, 0, 1, '2013-03-30 21:25:41'),
	(14, 'industry', 'water', 2, 'Water', 'Water', 0, 0, '/added/uploads/menu/1364671508award.png', '', 1, 0, 1, '2013-03-30 21:25:08'),
	(15, 'industry', 'enterprise', 2, 'Enterprise', 'Enterprise', 0, 0, '/added/uploads/menu/1364671481award.png', '', 1, 0, 1, '2013-03-30 21:24:41'),
	(16, 'industry', 'manufacturing', 2, 'Manufacturing', 'Manufacturing', 0, 0, '/added/uploads/menu/1364671441award.png', '', 1, 0, 1, '2013-03-30 21:24:01'),
	(17, 'industry', 'oilgas', 2, 'Oil & Gas', 'Oil & Gas', 0, 0, '/added/uploads/menu/1364671414award.png', '', 1, 0, 1, '2013-03-30 21:23:34'),
	(18, 'industry', 'telecom', 2, 'Telecom', 'Telecom', 0, 0, '/added/uploads/menu/1364671379award.png', '', 1, 0, 1, '2013-03-30 21:22:59'),
	(19, 'industry', 'transportation', 2, 'Transportation', 'Transportation', 0, 0, '/added/uploads/menu/1364671336award.png', '', 1, 0, 1, '2013-03-30 21:22:16'),
	(20, 'page', 'Driving Innovation', 4, 'Driving Innovation', 'Driving Innovation', 0, 0, '', '', 1, 0, 1, '2013-03-22 22:33:20'),
	(21, 'page', 'Going Green', 4, 'Going Green', 'Going Green', 0, 0, '', '', 1, 0, 1, '2013-03-22 22:34:37'),
	(22, 'page', 'Inspiring Change', 4, 'Inspiring Change', 'Inspiring Change', 0, 0, '', '', 1, 0, 1, '2013-03-22 22:36:23'),
	(23, 'collaborate', '', 4, 'Collaborate With Us ', 'Collaborate With Us ', 0, 0, '', '', 1, 0, 1, '2013-03-22 22:54:40'),
	(24, 'career', '', 0, 'Careers', 'التوظيف', 5, 1, '', 'width:180px', 1, 0, 1, '2013-03-23 08:33:56'),
	(25, 'page', 'Who we are', 0, 'Who we are', 'Who we are', 0, 7, '', '', 1, 0, 1, '2013-03-23 09:53:01'),
	(26, 'page', 'The Giza Systems Environment', 0, 'The Giza Systems Environment', 'The Giza Systems Environment', 0, 7, '', '', 1, 0, 1, '2013-03-23 09:53:36'),
	(27, 'page', 'Our Edge', 0, 'Our Edge', 'Our Edge', 0, 7, '', '', 1, 0, 1, '2013-03-23 09:54:01'),
	(28, 'page', 'Benefits and Learning Organization', 0, 'Benefits / Learning Organization', 'Benefits / Learning Organization', 0, 7, '', '', 1, 0, 1, '2013-03-23 20:35:08'),
	(29, 'page', 'Diversity of backgrounds', 0, 'Diversity of backgrounds', 'Diversity of backgrounds', 0, 8, '', '', 1, 0, 1, '2013-03-23 09:55:04'),
	(30, 'page', 'Roles', 0, 'Roles', 'Roles', 0, 8, '', '', 1, 0, 1, '2013-03-23 09:55:28'),
	(31, 'page', 'Career Paths', 0, 'Career Paths', 'Career Paths', 0, 8, '', '', 1, 0, 1, '2013-03-23 09:55:49'),
	(32, 'page', 'Agility', 0, 'Agility', 'Agility', 0, 8, '', '', 1, 0, 1, '2013-03-23 09:56:09'),
	(33, 'page', 'What We Are Looking For', 0, 'What We Are Looking For', 'What We Are Looking For', 0, 9, '', '', 1, 0, 1, '2013-03-23 09:56:45'),
	(34, 'page', 'The application process', 0, 'The application process', 'The application process', 0, 9, '', '', 1, 0, 1, '2013-03-23 09:57:24'),
	(35, 'page', 'Interview Tips', 0, 'Interview Tips', 'Interview Tips', 0, 9, '', '', 1, 0, 1, '2013-03-23 09:59:39'),
	(36, 'page', 'Interview Tips', 0, 'Interview Tips', 'Interview Tips', 0, 9, '', '', 1, 0, 1, '2013-03-23 10:00:04'),
	(37, 'page', 'Professional Vacancies', 0, 'Professional Vacancies', 'Professional Vacancies', 0, 10, '', '', 1, 0, 1, '2013-03-23 10:00:58'),
	(38, 'page', 'Internship Opportunities', 0, 'Internship Opportunities', 'Internship Opportunities', 0, 10, '', '', 1, 0, 1, '2013-03-23 10:01:18'),
	(39, 'page', 'Integrate Me Now', 0, 'Integrate Me Now', 'Integrate Me Now', 0, 10, '', '', 1, 0, 1, '2013-03-23 10:01:46'),
	(40, 'page', 'Integrate Me Now', 0, 'Integrate Me Now', 'Integrate Me Now', 0, 10, '', '', 1, 0, 1, '2013-03-23 10:02:20'),
	(41, 'solution', 'Smart Grids', 3, 'Smart Grids', 'Smart Grids', 0, 0, '', '', 1, 0, 1, '2013-03-23 21:33:02'),
	(42, 'solution', 'Information Infrastructure', 3, 'Information Infrastructure', 'Information Infrastructure', 0, 0, '', '', 1, 0, 1, '2013-03-23 21:33:18'),
	(43, 'solution', 'Field Solutions', 3, 'Field Solutions', 'Field Solutions', 0, 0, '', '', 1, 0, 1, '2013-03-23 21:33:48'),
	(44, 'solution', 'Transmission & Distribution', 3, 'Transmission & Distribution', 'Transmission & Distribution', 0, 0, '', '', 1, 0, 1, '2013-03-23 21:34:09'),
	(45, 'solution', 'GIS', 3, 'GIS', 'GIS', 0, 0, '', '', 1, 0, 1, '2013-03-23 21:34:28'),
	(46, 'solution', 'Building Automation Management Systems', 3, 'Building Automation', 'Building Automation', 0, 0, '', '', 1, 0, 1, '2013-04-05 09:30:45'),
	(47, 'solution', 'Smart Buildings', 3, 'Smart Buildings', 'Smart Buildings', 0, 0, '', '', 1, 0, 1, '2013-03-23 21:35:14'),
	(48, 'solution', 'SCADA', 3, 'SCADA', 'SCADA', 0, 0, '', '', 1, 0, 1, '2013-03-23 21:35:36'),
	(49, 'solution', 'Process Control', 3, 'Process Control', 'Process Control', 0, 0, '', '', 1, 0, 1, '2013-03-23 21:35:52'),
	(50, 'solution', 'Telecom OSS', 3, 'Telecom OSS', 'Telecom OSS', 0, 0, '', '', 1, 0, 1, '2013-03-23 21:36:11'),
	(51, 'solution', 'Enterprise Applications', 3, 'Enterprise Applications', 'Enterprise Applications', 0, 0, '', '', 1, 0, 1, '2013-03-23 21:36:30'),
	(52, 'office', '', 1, 'Offices', 'المكاتب', 8, 0, '', '', 1, 0, 1, '2013-04-01 09:35:35'),
	(53, 'client', '', 1, 'Clients', 'العملاء', 9, 0, '', '', 1, 0, 1, '2013-04-02 21:26:15'),
	(54, 'partner', '', 1, 'Partners', 'المساهمين', 10, 0, '', '', 1, 0, 1, '2013-04-02 21:26:51'),
	(55, 'mediasectioncategory', 'Info Media', 0, 'Info Media', 'Info Media', 1, 5, '', '', 1, 0, 1, '2013-04-05 10:11:40'),
	(56, 'gallery', '', 0, 'Gallery', 'Gallery', 3, 5, '', '', 1, 0, 1, '2013-04-05 10:13:02'),
	(57, 'officeevent', '', 0, 'Events', 'Events', 2, 5, '', '', 1, 0, 1, '2013-04-05 10:13:39'),
	(58, 'mediasectioncategory', 'Media Kit', 0, 'Media Kit', 'Media Kit', 4, 5, '', '', 1, 0, 1, '2013-04-05 10:15:34'),
	(59, 'mediasectioncategory', 'Electronic Media', 0, 'Electronic Media', 'الميديا الالكترونية', 5, 5, '', '', 1, 0, 1, '2013-04-05 10:17:03'),
	(60, 'contact', '', 0, 'Contacts', 'Contacts', 6, 5, '', '', 1, 0, 1, '2013-05-30 18:55:24'),
	(61, 'partner', 'profile', 0, 'Sign Up', 'تسجيل', 1, 3, '', '', 1, 0, 1, '2013-04-09 10:17:01'),
	(62, 'partner', 'login', 0, 'Login', 'دخول', 2, 3, '', '', 1, 0, 1, '2013-04-09 10:17:32'),
	(63, 'alumni', 'profile', 0, 'Sign Up', 'تسجيل', 1, 4, '', '', 1, 0, 1, '2013-04-09 10:18:38'),
	(64, 'alumni', 'login', 0, 'Login', 'دخول', 2, 4, '', '', 1, 0, 1, '2013-04-09 10:19:09'),
	(65, 'client', 'profile', 0, 'Sign Up', 'تسجيل', 1, 6, '', '', 1, 0, 1, '2013-04-09 10:19:51'),
	(66, 'client', 'login', 0, 'Login', 'دخول', 2, 6, '', '', 1, 0, 1, '2013-04-09 10:20:26'),
	(67, 'job', 'professional', 24, 'Professional opportunity', 'Professional opportunity', 0, 0, '', '', 1, 0, 1, '2013-04-25 13:13:51'),
	(68, 'job', 'internship', 24, 'Internship opportunity', 'Internship opportunity', 0, 0, '', '', 1, 0, 1, '2013-04-25 13:14:41'),
	(69, 'candidate', 'profile', 24, 'Integrate Me', 'Integrate Me', 0, 0, '', '', 1, 0, 1, '2013-04-25 13:16:12'),
	(70, 'candidate', 'login', 24, 'Applicant Login', 'Applicant Login', 0, 0, '', '', 1, 0, 1, '2013-04-25 13:16:54');
/*!40000 ALTER TABLE `menu_link` ENABLE KEYS */;


-- Dumping structure for table giza.menu_map
CREATE TABLE IF NOT EXISTS `menu_map` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `title_ar` varchar(100) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.menu_map: 10 rows
/*!40000 ALTER TABLE `menu_map` DISABLE KEYS */;
INSERT INTO `menu_map` (`id`, `code`, `title`, `title_ar`, `menu_id`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'main', 'Main Menu', 'القائمة الرئيسية', 1, 1, 0, 1, '2013-03-23 10:08:18'),
	(2, 'footer_1', 'Footer 1', 'فوتر 1', 2, 1, 0, 1, '2013-03-23 10:08:18'),
	(3, 'footer_2', 'Footer 2', 'فوتر 2', 3, 1, 0, 1, '2013-03-23 10:08:18'),
	(4, 'footer_3', 'Footer 3', 'فوتر 3', 4, 1, 0, 1, '2013-03-23 10:08:18'),
	(5, 'footer_4', 'Footer 4', 'فوتر 4', 5, 1, 0, 1, '2013-03-23 10:08:18'),
	(6, 'footer_5', 'Footer 5', 'فوتر 5', 6, 1, 0, 1, '2013-03-23 10:08:18'),
	(7, 'career1', 'Career 1', 'التوظيف 1', 7, 1, 0, 1, '2013-03-23 10:08:18'),
	(8, 'career2', 'Career 2', 'التوظيف 2', 8, 1, 0, 1, '2013-03-23 10:08:18'),
	(9, 'career3', 'Career 3', 'التوظيف 3', 9, 1, 0, 1, '2013-03-23 10:08:18'),
	(10, 'career4', 'Career 4', 'التوظيف 4', 10, 1, 0, 1, '2013-03-23 10:08:18');
/*!40000 ALTER TABLE `menu_map` ENABLE KEYS */;


-- Dumping structure for table giza.office
CREATE TABLE IF NOT EXISTS `office` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `country_id` int(10) NOT NULL DEFAULT '0',
  `location` varchar(250) DEFAULT NULL,
  `location_ar` varchar(250) DEFAULT NULL,
  `address` tinytext,
  `address_ar` tinytext,
  `phones` tinytext,
  `mobiles` tinytext,
  `faxes` tinytext,
  `website` tinytext,
  `emails` tinytext,
  `sort` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.office: ~7 rows (approximately)
/*!40000 ALTER TABLE `office` DISABLE KEYS */;
INSERT INTO `office` (`id`, `country_id`, `location`, `location_ar`, `address`, `address_ar`, `phones`, `mobiles`, `faxes`, `website`, `emails`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(5, 68, 'Head Office', 'مصر', '  Plot No. 176, Second Sector,\r\nCity Center, P.O. Box 157\r\nNew Cairo 11835, Egypt\r\n\r\nCall Center: 16492', '     التجمع الخامس بعد الفندق', '+202 26146000 / 6111', '', ' +202 26146001', 'wwww.dsdsdsds.dsdsds', 'info@gizasystems.com', 1, 1, 0, 1, '2013-05-06 14:28:21'),
	(6, 183, 'Doha', 'قطر', '     Giza Systems\r\nLevel 15, Commercial Bank Plaza,\r\nWestbay, P.O. Box 27111\r\nDoha, Qatar', '    ', '+974 4452 8339', '', ' +974 4452 8344', '', '', 4, 1, 0, 1, '2013-05-06 14:26:08'),
	(7, 195, 'Riyadh', 'Riyadh', '  Giza Arabia\r\nRosayes Business Center,\r\nP.O. Box 67765\r\nRiyadh 11517, KSA', '      ', '+966 1 460 2890', '', ' +966 1 460 2892', '', '', 2, 1, 0, 1, '2013-05-06 14:23:43'),
	(8, 195, 'Al-Khobar', 'Egypt', ' Giza Arabia\r\nKing Abdullah Road,\r\nShaikh Tower (office 609),\r\nP.O. Box 30238\r\nAl-Khobar 31952, KSA', '     ', '+966 3 889 2155', '', '+966 3 889 2155', '', '', 3, 1, 0, 1, '2013-05-06 14:26:43'),
	(9, 68, 'Alexandria Office', 'Alexandria Office', '  23 Fawzi Moeiz St.,\r\nEl Horreya East Tower\r\nSmouha, Alexandria', '  ', '+203 4205632 / 35', '', '+203 4205675', '', '', 5, 1, 0, 1, '2013-05-06 14:23:06'),
	(10, 195, 'Jeddah', 'Jeddah', '  Giza Arabia\r\nAl-Kaaki Business Center,\r\nAl Tahleya St.,\r\nP.O. Box 54644\r\nJeddah, Al Mesaadiya 21524, KSA', '  ', '+966 2 661 6747', '', '+966 2 661 6747', '', '', 6, 1, 0, 1, '2013-05-06 14:22:28'),
	(11, 234, 'Dubai', 'Dubai', '   Giza Systems JLT\r\n          Fortune Tower - Office\r\n          No. 1306 - 13th Floor,\r\n          Jumeirah Lake Towers\r\n          Dubai, UAE', '   ', '', '', '', '', '', 7, 1, 0, 1, '2013-05-06 14:22:47');
/*!40000 ALTER TABLE `office` ENABLE KEYS */;


-- Dumping structure for table giza.office_event
CREATE TABLE IF NOT EXISTS `office_event` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `office_ids` varchar(250) NOT NULL DEFAULT '0',
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `seo_words` tinytext,
  `seo_words_ar` tinytext,
  `brief` tinytext,
  `brief_ar` tinytext,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.office_event: ~4 rows (approximately)
/*!40000 ALTER TABLE `office_event` DISABLE KEYS */;
INSERT INTO `office_event` (`id`, `office_ids`, `name`, `name_ar`, `seo_words`, `seo_words_ar`, `brief`, `brief_ar`, `date_from`, `date_to`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, '11,10,9,8,5', 'event1', 'event1', '', '', '<p>Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbsp', '', '2013-05-06', '2013-05-07', 1, 0, 1, '2013-05-06 18:38:46'),
	(2, '11,10,5', 'event2', 'event2', '', '', '<p>Brief about event&nbsp; Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbs', '', '2013-03-01', '2013-03-02', 1, 0, 1, '2013-05-06 18:38:19'),
	(3, '6', 'upcoming Event 1', 'dasdasdasd', '', '', '<p>Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbsp;Brief about event&nbsp;</p>', '', '2013-03-13', '2013-03-20', 1, 0, 1, '2013-05-06 18:39:17'),
	(4, '11,9,7', 'upcoming Event 2', 'upcoming Event 2', '', '', '<p>upcoming Event 2 brief or decription upcoming Event 2 brief or decription upcoming Event 2 brief or decription upcoming Event 2 brief or decription upcoming Event 2 brief or decription</p>\r\n<p>upcoming Event 2 brief or decription</p>\r\n<p>upcoming Event', '', '2013-05-08', '2013-05-29', 1, 0, 1, '2013-05-06 18:43:37');
/*!40000 ALTER TABLE `office_event` ENABLE KEYS */;


-- Dumping structure for table giza.office_setting
CREATE TABLE IF NOT EXISTS `office_setting` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `phone_icon` tinytext,
  `mobile_icon` tinytext,
  `fax_icon` tinytext,
  `email_icon` tinytext,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(10) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.office_setting: 1 rows
/*!40000 ALTER TABLE `office_setting` DISABLE KEYS */;
INSERT INTO `office_setting` (`id`, `phone_icon`, `mobile_icon`, `fax_icon`, `email_icon`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, '/added/uploads/office/1367840181phone_icon.png', '/added/uploads/office/1367840181mobile_icon.png', '/added/uploads/office/1367840181fax_icon.png', '/added/uploads/office/1367840181email_icon.jpg', 1, 0, 1, '2013-05-06 14:36:21');
/*!40000 ALTER TABLE `office_setting` ENABLE KEYS */;


-- Dumping structure for table giza.page
CREATE TABLE IF NOT EXISTS `page` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `alias` varchar(250) DEFAULT NULL,
  `page_category_id` int(11) DEFAULT NULL,
  `banner_image_thumbs` text,
  `banner_files` text,
  `banner_image_thumb_selected` tinytext,
  `banner_file_selected` tinytext,
  `title` varchar(250) DEFAULT NULL,
  `title_ar` varchar(250) DEFAULT NULL,
  `seo_words` tinytext,
  `seo_words_ar` tinytext,
  `brief` text,
  `brief_ar` text,
  `body` text,
  `body_ar` text,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.page: ~117 rows (approximately)
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` (`id`, `alias`, `page_category_id`, `banner_image_thumbs`, `banner_files`, `banner_image_thumb_selected`, `banner_file_selected`, `title`, `title_ar`, `seo_words`, `seo_words_ar`, `brief`, `brief_ar`, `body`, `body_ar`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(59, 'Under Construction', 3, NULL, NULL, NULL, NULL, 'Under Construction', 'Under Construction', 'giza systems', 'giza systems', 'Under Construction Page', 'Under Construction Page', '<p>\r\n	This page is underconstruction</p>\r\n', '<p>\r\n	This page is underconstruction</p>\r\n', 1, 0, 1, '2013-03-18 10:09:23'),
	(60, 'Who we are', 3, NULL, NULL, NULL, NULL, 'Who we are', 'Who we are', 'Who we are', 'Who we are', 'Who we are', 'Who we are', '<p style="text-align: justify;">\r\n	Giza Systems is the number one systems&nbsp;integrator in Egypt and the Middle East, providing a wide&nbsp;range of industry specific technology solutions in the Telecom,&nbsp;Utilities, Oil &amp; Gas, Real Estate &amp; Hospitality, and Manufacturing industries.</p>\r\n<div>\r\n	<div style="text-align: justify;">\r\n		We have been&nbsp;shaping the IT industry and corporate agendas since 1974. Our&nbsp;consultancy practice provides industry focused services that&nbsp;enhance value for our clients by streamlining operational and&nbsp;business processes.</div>\r\n	<div style="text-align: justify;">\r\n		&nbsp;</div>\r\n	<div style="text-align: justify;">\r\n		Operating in the Middle East through&nbsp;our offices and group of companies, we are dedicated to&nbsp;contributing to the local and regional development with our&nbsp;technology solutions, commitment and outstanding customer&nbsp;service. Our team of 600 professionals enables us to extend our&nbsp;geographic footprint delivering diverse projects and connecting&nbsp;us with clients in the Middle East, Latin America and Russia.</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Our work is about helping our clients; companies,&nbsp;institutions and public sector organizations succeed&nbsp;in an increasingly complex economic environment.&nbsp;We support our clients by building integrated end-toend systems that automate their processes and improve&nbsp;their operational efficiency.Our footprint and expertise covers all vital functions&nbsp;within our client organizations, helping them&nbsp;develop new businesses and penetrate new markets.&nbsp;</div>\r\n<div style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Being a large organization with a wide range of&nbsp;activities gives you the chance to explore, grow and&nbsp;learn and the good thing is that you&rsquo;re never going to&nbsp;run out of options and challenges.</div>\r\n<div style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div style="text-align: justify;">\r\n	<span style="color:#34abdd;">The only question&nbsp;is where do you start?</span></div>\r\n<div style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div style="text-align: justify;">\r\n	No matter where you join,&nbsp;you&rsquo;ll be part of this experience. The breadth of our&nbsp;services and industry focused solutions means that all&nbsp;our business units can offer you promising careers to&nbsp;suit practically any interest.&nbsp;</div>\r\n', '<p style="text-align: justify;">\r\n	Giza Systems is the number one systems&nbsp;integrator in Egypt and the Middle East, providing a wide&nbsp;range of industry specific technology solutions in the Telecom,&nbsp;Utilities, Oil &amp; Gas, Real Estate &amp; Hospitality, and Manufacturing industries.</p>\r\n<div>\r\n	<div style="text-align: justify;">\r\n		We have been&nbsp;shaping the IT industry and corporate agendas since 1974. Our&nbsp;consultancy practice provides industry focused services that&nbsp;enhance value for our clients by streamlining operational and&nbsp;business processes.</div>\r\n	<div style="text-align: justify;">\r\n		&nbsp;</div>\r\n	<div style="text-align: justify;">\r\n		Operating in the Middle East through&nbsp;our offices and group of companies, we are dedicated to&nbsp;contributing to the local and regional development with our&nbsp;technology solutions, commitment and outstanding customer&nbsp;service. Our team of 600 professionals enables us to extend our&nbsp;geographic footprint delivering diverse projects and connecting&nbsp;us with clients in the Middle East, Latin America and Russia.</div>\r\n</div>\r\n<div style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Our work is about helping our clients; companies,&nbsp;institutions and public sector organizations succeed&nbsp;in an increasingly complex economic environment.&nbsp;We support our clients by building integrated end-toend systems that automate their processes and improve&nbsp;their operational efficiency.Our footprint and expertise covers all vital functions&nbsp;within our client organizations, helping them&nbsp;develop new businesses and penetrate new markets.&nbsp;</div>\r\n<div style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Being a large organization with a wide range of&nbsp;activities gives you the chance to explore, grow and&nbsp;learn and the good thing is that you&rsquo;re never going to&nbsp;run out of options and challenges.</div>\r\n<div style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div style="text-align: justify;">\r\n	<span style="color:#34abdd;">The only question&nbsp;is where do you start?</span></div>\r\n<div style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div style="text-align: justify;">\r\n	No matter where you join,&nbsp;you&rsquo;ll be part of this experience. The breadth of our&nbsp;services and industry focused solutions means that all&nbsp;our business units can offer you promising careers to&nbsp;suit practically any interest.&nbsp;</div>\r\n', 1, 0, 1, '2013-03-18 10:09:24'),
	(61, 'The Giza Systems Environment', 3, NULL, NULL, NULL, NULL, 'The Giza Systems Environment', 'The Giza Systems Environment', NULL, NULL, 'The Giza Systems Environment', 'The Giza Systems Environment', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="color:#01345f;">Our priorities for accomplishing the goals of being a great place to work is to diversify our work force, retain and advance our people especially our top performers and improve our flexibility and work-life tools. To foster the behaviors that will enable us to achieve this goal, diversity and work-life activities are crucial. We believe an inclusive workplace enables us to take advantage of the talents of our diverse workforce, to improve the quality of our services and to grow our business. These priorities are fundamental to giving everyone the opportunity to succeed in achieving his or her personal and professional goals. It is also a business imperative tied&nbsp;to the company&rsquo;s continued success and growth.&nbsp;</span></p>\r\n<p>\r\n	<span style="color:#01345f;">Fair and equal employment practices are inherent in this strategy. Affirmative action is a building block for these fair and equal employment practices. It is an integral component of our strategy for sustaining our overall business performance though enhanced regional market relationships, attracting and retaining the best talent and delivering the most innovative industry-focused solutions to our diverse client base.&nbsp;</span></p>\r\n<p>\r\n	<span style="color:#01345f;">We also believe that our people are more productive at work when they have the flexibility to successfully manage their lives outside work. Flexibility is an individual&rsquo;s ability, over time, to meet the demand of their role and accomplish the things they identify as priorities outside the office. Our management goal is to create a flexible work environment where we can respond in the most active way to the demands of a client service business, while providing our management team and staff with control over their own quality of life.&nbsp;</span></p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="color:#01345f;">Our priorities for accomplishing the goals of being a great place to work is to diversify our work force, retain and advance our people especially our top performers and improve our flexibility and work-life tools. To foster the behaviors that will enable us to achieve this goal, diversity and work-life activities are crucial. We believe an inclusive workplace enables us to take advantage of the talents of our diverse workforce, to improve the quality of our services and to grow our business. These priorities are fundamental to giving everyone the opportunity to succeed in achieving his or her personal and professional goals. It is also a business imperative tied&nbsp;to the company&rsquo;s continued success and growth.&nbsp;</span></p>\r\n<p>\r\n	<span style="color:#01345f;">Fair and equal employment practices are inherent in this strategy. Affirmative action is a building block for these fair and equal employment practices. It is an integral component of our strategy for sustaining our overall business performance though enhanced regional market relationships, attracting and retaining the best talent and delivering the most innovative industry-focused solutions to our diverse client base.&nbsp;</span></p>\r\n<p>\r\n	<span style="color:#01345f;">We also believe that our people are more productive at work when they have the flexibility to successfully manage their lives outside work. Flexibility is an individual&rsquo;s ability, over time, to meet the demand of their role and accomplish the things they identify as priorities outside the office. Our management goal is to create a flexible work environment where we can respond in the most active way to the demands of a client service business, while providing our management team and staff with control over their own quality of life.&nbsp;</span></p>\r\n', 1, 0, 1, '2013-03-18 10:09:24'),
	(62, 'Our Edge', 3, NULL, NULL, NULL, NULL, 'Our Edge', 'Our Edge', 'Our Edge', 'Our Edge', 'Our Edge', 'Our Edge', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="color:#01345f;">As for the workplace environment, we are located in state-of-the-art premises in New Cairo. Since we are company that is committed to supporting the environment, we took a responsible decision to build our premises along the green building concept using processes that are environmentally responsible and resource-efficient throughout the building&rsquo;s life-cycle: from siting to design, construction, operation, maintenance and renovation. Although new technologies are constantly being developed to complement current practices in creating greener structures, the common objective is that green buildings are designed to reduce the overall impact of the built environment on human health and the natural environment by:</span></p>\r\n<ul>\r\n	<li>\r\n		<span style="color:#01345f;">Efficiently using energy, water, and other resources</span></li>\r\n	<li>\r\n		<span style="color:#01345f;">Protecting occupant health and improving employee productivity</span></li>\r\n	<li>\r\n		<span style="color:#01345f;">Reducing waste and pollution</span></li>\r\n</ul>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="color:#01345f;">As for the workplace environment, we are located in state-of-the-art premises in New Cairo. Since we are company that is committed to supporting the environment, we took a responsible decision to build our premises along the green building concept using processes that are environmentally responsible and resource-efficient throughout the building&rsquo;s life-cycle: from siting to design, construction, operation, maintenance and renovation. Although new technologies are constantly being developed to complement current practices in creating greener structures, the common objective is that green buildings are designed to reduce the overall impact of the built environment on human health and the natural environment by:</span></p>\r\n<ul>\r\n	<li>\r\n		<span style="color:#01345f;">Efficiently using energy, water, and other resources</span></li>\r\n	<li>\r\n		<span style="color:#01345f;">Protecting occupant health and improving employee productivity</span></li>\r\n	<li>\r\n		<span style="color:#01345f;">Reducing waste and pollution</span></li>\r\n</ul>\r\n', 1, 0, 1, '2013-03-18 10:09:24'),
	(63, 'Benefits  Learning Organization', 3, NULL, NULL, NULL, NULL, 'Benefits / Learning Organization', 'Benefits / Learning Organization', 'Benefits / Learning Organization', 'Benefits / Learning Organization', 'Benefits / Learning Organization', 'Benefits / Learning Organization', '<p>    \n	&nbsp;</p>    \n<p>    \n	<span style="color:#00a4e4;">Learning while working</span></p>    \n<p>    \n	<span style="color:#01345f;">The world-class development culture at Giza Systems is designed to empower your continuing learning. Coaching is integrated into the way we work every day to support your ongoing technical and professional skills development. These principles, combined with mentoring, learning programs, and concrete on-the-job application of skills, will continue to strengthen your experience and abilities throughout your career.</span></p>', '<p>    \n	&nbsp;</p>    \n<p>    \n	<span style="color:#00a4e4;">Learning while working</span></p>    \n<p>    \n	<span style="color:#01345f;">The world-class development culture at Giza Systems is designed to empower your continuing learning. Coaching is integrated into the way we work every day to support your ongoing technical and professional skills development. These principles, combined with mentoring, learning programs, and concrete on-the-job application of skills, will continue to strengthen your experience and abilities throughout your career.</span></p>', 1, 0, 1, '2013-03-18 10:09:24'),
	(64, 'Roles', 3, NULL, NULL, NULL, NULL, 'Roles', 'Roles', 'Roles', 'Roles', 'Roles', 'Roles', '<p>\r\n	Roles</p>\r\n', '<p>\r\n	Roles</p>\r\n', 1, 0, 1, '2013-03-18 10:09:24'),
	(65, 'Diversity of backgrounds', 3, NULL, NULL, NULL, NULL, 'Diversity of backgrounds', 'Diversity of backgrounds', 'Diversity of backgrounds', 'Diversity of backgrounds', 'Diversity of backgrounds', 'Diversity of backgrounds', '<p>\r\n	Diversity of backgrounds</p>\r\n', '<p>\r\n	Diversity of backgrounds</p>\r\n', 1, 0, 1, '2013-03-18 10:09:24'),
	(66, 'Career Paths', 3, NULL, NULL, NULL, NULL, 'Career Paths', 'Career Paths', 'Career Paths', 'Career Paths', 'Career Paths', 'Career Paths', '<p>\r\n	Career Paths</p>\r\n', '<p>\r\n	Career Paths</p>\r\n', 1, 0, 1, '2013-03-18 10:09:24'),
	(67, 'Agility', 3, NULL, NULL, NULL, NULL, 'Agility', 'Agility', 'Agility', 'Agility', 'Agility', 'Agility', '<p>\r\n	Agility</p>\r\n', '<p>\r\n	Agility</p>\r\n', 1, 0, 1, '2013-03-18 10:09:24'),
	(68, 'What We Are Looking For', 3, NULL, NULL, NULL, NULL, 'What We Are Looking For', 'What We Are Looking For', 'What we are looking for', 'What we are looking for', 'What We Are Looking For', 'What We Are Looking For', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="color:#01345f;">Do you have the ambition and energy to tackle the challenges we face analytically and systematically, take the necessary steps and implement innovative solutions? Are you goal-oriented and able to work independently? Are you a team player who likes to take the initiative and help develop new business? If your answer to all three questions is yes, then we are looking forward to hearing from you.</span></p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="color:#01345f;">Do you have the ambition and energy to tackle the challenges we face analytically and systematically, take the necessary steps and implement innovative solutions? Are you goal-oriented and able to work independently? Are you a team player who likes to take the initiative and help develop new business? If your answer to all three questions is yes, then we are looking forward to hearing from you.</span></p>\r\n', 1, 0, 1, '2013-03-18 10:09:24'),
	(69, 'How We Support Your Success', 3, NULL, NULL, NULL, NULL, 'How We Support Your Success', 'How We Support Your Success', 'How We Support Your Success', 'How We Support Your Success', 'How We Support Your Success', 'How We Support Your Success', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="color:#00a4e4;">Supporting Your Graduation Projects</span></p>\r\n<p>\r\n	<span style="color:#01345f;">Giza Systems offers funding for students graduation projects with a number of universities in Egypt like Banha University, Cairo University, Helwan University and Menoufia University. Our team of professional engineers supports students by providing technical assistance, in addition to offering direct coaching.</span></p>\r\n<p>\r\n	<span style="color:#01345f;">Supporting these graduation projects aims at stimulating interest and providing motivation for professionals to get involved in enhancing the student&rsquo;s learning experience and to promote excellence in learning in the area of engineering education.</span></p>\r\n<p>\r\n	<span style="color:#01345f;">Applications are welcome throughout the year, so if you are an engineer currently studying at one of the reputable engineering faculties throughout Egypt, please contact us to support your project by submitting it to </span><a href="mailto:graduationprojects@gizasystems.com"><span style="color:#01345f;">graduationprojects@gizasystems.com</span></a></p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="color:#00a4e4;">Supporting Your Graduation Projects</span></p>\r\n<p>\r\n	<span style="color:#01345f;">Giza Systems offers funding for students graduation projects with a number of universities in Egypt like Banha University, Cairo University, Helwan University and Menoufia University. Our team of professional engineers supports students by providing technical assistance, in addition to offering direct coaching.</span></p>\r\n<p>\r\n	<span style="color:#01345f;">Supporting these graduation projects aims at stimulating interest and providing motivation for professionals to get involved in enhancing the student&rsquo;s learning experience and to promote excellence in learning in the area of engineering education.</span></p>\r\n<p>\r\n	<span style="color:#01345f;">Applications are welcome throughout the year, so if you are an engineer currently studying at one of the reputable engineering faculties throughout Egypt, please contact us to support your project by submitting it to </span><a href="mailto:graduationprojects@gizasystems.com"><span style="color:#01345f;">graduationprojects@gizasystems.com</span></a></p>\r\n', 1, 0, 1, '2013-03-18 10:09:24'),
	(70, 'Interview Tips', 3, NULL, NULL, NULL, NULL, 'Interview Tips', 'Interview Tips', 'Interview Tips', 'Interview Tips', 'Interview Tips', 'Interview Tips', '<p>\r\n	<span style="color:#01345f;">Going on a job interview never seems easy, no matter how many times you have done it. It is always a new place and new people, as you try to leave the best possible impression. You know you have to sell yourself and your skills, while answering a considerable amount of questions.</span></p>\r\n<div id="cke_pastebin">\r\n	<span style="color:#01345f;">Here are some job interview tips to help prepare you to interview effectively. Proper preparation will help alleviate some of the stress involved in job interviews.</span></div>', '<p>\r\n	<span style="color:#01345f;">Going on a job interview never seems easy, no matter how many times you have done it. It is always a new place and new people, as you try to leave the best possible impression. You know you have to sell yourself and your skills, while answering a considerable amount of questions.</span></p>\r\n<div id="cke_pastebin">\r\n	<span style="color:#01345f;">Here are some job interview tips to help prepare you to interview effectively. Proper preparation will help alleviate some of the stress involved in job interviews.</span></div>', 1, 0, 1, '2013-03-18 10:09:24'),
	(71, 'The application process', 3, NULL, NULL, NULL, NULL, 'The application process', 'The application process', 'The application process', 'The application process', 'The application process', 'The application process', '<p>\r\n	The application process</p>\r\n', '<p>\r\n	The application process</p>\r\n', 1, 0, 1, '2013-03-18 10:09:24'),
	(72, 'Professional Vacancies', 3, NULL, NULL, NULL, NULL, 'Professional Vacancies', 'Professional Vacancies', 'Professional Vacancies', 'Professional Vacancies', 'Professional Vacancies', 'Professional Vacancies', '<p>\r\n	Professional Vacancies</p>\r\n', '<p>\r\n	Professional Vacancies</p>\r\n', 1, 0, 1, '2013-03-18 10:09:24'),
	(73, 'Integrate Me Now', 3, NULL, NULL, NULL, NULL, 'Integrate Me Now', 'Integrate Me Now', 'Integrate Me Now', 'Integrate Me Now', 'Integrate Me Now', 'Integrate Me Now', '<p>\r\n	Integrate Me Now</p>\r\n', '<p>\r\n	Integrate Me Now</p>\r\n', 1, 0, 1, '2013-03-18 10:09:24'),
	(74, 'What we look for', 3, NULL, NULL, NULL, NULL, 'What we look for', 'What we look for', 'What we look for', 'What we look for', 'What we look for', 'What we look for', '<p>\r\n	What we look for</p>\r\n', '<p>\r\n	What we look for</p>\r\n', 1, 0, 1, '2013-03-18 10:09:24'),
	(75, 'Internship Opportunities', 3, NULL, NULL, NULL, NULL, 'Internship Opportunities', 'Internship Opportunities', 'Internship Opportunities', 'Internship Opportunities', 'Internship Opportunities', 'Internship Opportunities', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="color:#01345f;">An internship is the ideal way for students to get to know and understand the complexity of the industry-focused services that Giza Systems provides to its diverse client base. For this reason, we do our very best to give as many students as possible the chance of acquiring relevant business and service experience.</span></p>\r\n<p>\r\n	<span style="color:#01345f;">If you&rsquo;re a hard worker, team player, creative and studying at one of the reputable engineering faculties in Egypt, and you are looking for a challenge, we can offer you various internships in our different business units and in our supporting functions, as well. Without doubt, an internship is the best way of gaining practical experience in your planned career and finding out what the real world is like. You&rsquo;ll get to work in interdisciplinary (and often international) teams on real projects, internally and externally.</span></p>\r\n<p>\r\n	<span style="color:#01345f;">In order to offer sufficient professional guidance, we only offer a limited number of internships each year in July and August. For example, in some departments, we have to take into account the confidentiality of our clients. We do our best to provide our interns with a wide range of interesting challenges during their internships at Giza Systems.</span></p>\r\n<p>\r\n	<span style="color:#01345f;">Throughout your internship you&rsquo;ll receive support from our professionals, plus regular feedback on your development. You will be actively encouraged to contribute with your ideas and suggestions and take the initiative. It&rsquo;s a great opportunity to learn, gain and share knowledge and to meet people at Giza Systems.</span></p>\r\n<p>\r\n	<span style="color:#01345f;">Ideally you should send your application to us around four months before your chosen internship starts, but we will also be glad to consider applications that arrive later than this. And the best thing about an internship: you may become our campus ambassador or better yet, you may end up getting hired permanently.</span></p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<span style="color:#01345f;">An internship is the ideal way for students to get to know and understand the complexity of the industry-focused services that Giza Systems provides to its diverse client base. For this reason, we do our very best to give as many students as possible the chance of acquiring relevant business and service experience.</span></p>\r\n<p>\r\n	<span style="color:#01345f;">If you&rsquo;re a hard worker, team player, creative and studying at one of the reputable engineering faculties in Egypt, and you are looking for a challenge, we can offer you various internships in our different business units and in our supporting functions, as well. Without doubt, an internship is the best way of gaining practical experience in your planned career and finding out what the real world is like. You&rsquo;ll get to work in interdisciplinary (and often international) teams on real projects, internally and externally.</span></p>\r\n<p>\r\n	<span style="color:#01345f;">In order to offer sufficient professional guidance, we only offer a limited number of internships each year in July and August. For example, in some departments, we have to take into account the confidentiality of our clients. We do our best to provide our interns with a wide range of interesting challenges during their internships at Giza Systems.</span></p>\r\n<p>\r\n	<span style="color:#01345f;">Throughout your internship you&rsquo;ll receive support from our professionals, plus regular feedback on your development. You will be actively encouraged to contribute with your ideas and suggestions and take the initiative. It&rsquo;s a great opportunity to learn, gain and share knowledge and to meet people at Giza Systems.</span></p>\r\n<p>\r\n	<span style="color:#01345f;">Ideally you should send your application to us around four months before your chosen internship starts, but we will also be glad to consider applications that arrive later than this. And the best thing about an internship: you may become our campus ambassador or better yet, you may end up getting hired permanently.</span></p>\r\n', 1, 0, 1, '2013-03-18 10:09:24'),
	(76, 'Corporate Factsheet', 2, '/added/uploads/banner/page/1363963959_thumb.swf', '/added/uploads/banner/page/1363963959.swf', '/added/uploads/banner/page/1363963959_thumb.swf', '/added/uploads/banner/page/1363963959.swf', 'Corporate Factsheet', 'Corporate Factsheet', 'Corporate Factsheet, Giza Systems', 'Corporate Factsheet, Giza Systems', '', '', '<p style="text-align: justify;">\r\n	<span style="color:#34abdd;">Who We Are</span></p>\r\n<p style="text-align: justify;">\r\n	Giza Systems is the number one systems integrator in Egypt and the Middle East providing a wide range of industry specific technology solutions in the Utilities, Telecom, Oil &amp; Gas, Real Estate, Hospitality and Manufacturing industries.</p>\r\n<div id="cke_pastebin">\r\n	We have been shaping the IT industry and corporate agendas since 1974. Our consultancy practice provides industry focused services that enhance value for our clients by streamlining operational and business processes.</div>\r\n<div id="cke_pastebin">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	Operating in the Middle East through our offices and group of companies, we are focused on contributing to the local and regional development with our technology solutions, commitment and outstanding customer service.</div>\r\n<div id="cke_pastebin">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	Our team of 600 professionals enables us to extend our geographic footprint delivering diverse projects and connecting us with clients in the Middle East, Africa, Europe, Latin America and Russia.</div>\r\n<div id="cke_pastebin">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	<span style="color:#34abdd;">What We Do</span></div>\r\n<div id="cke_pastebin">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	We deliver a comprehensive scope and range of end-to-end industry specific solutions that meet customer demand for streamlining operational and business efficiencies.</div>\r\n<div id="cke_pastebin">\r\n	Our technical capabilities, extensive experience and knowledge of the market, as well as our partnership with global leaders in the areas of automation systems, communication solutions and metering infrastructure enable us to develop integrated solutions that can work with and build on the evolving technologies, as well as meet the dynamicity of our customers&rsquo; needs.</div>\r\n<div id="cke_pastebin">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	In our pursuit to constantly enhance existing resources and create new capabilities, we drive forward the growth of our company, our customers, our people, and our communities.</div>\r\n<div id="cke_pastebin">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	<span style="color:#34abdd;">Capabilities</span></div>\r\n<div>\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	With steady growth in our client base all over the Middle East, we have established local and regional offices to respond to the demands of our clients, as well as leverage the company&rsquo;s success and proven track record in the different sectors.</div>\r\n<div id="cke_pastebin">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	<span style="color:#34abdd;">Year Founded:</span> 1974</div>\r\n<div id="cke_pastebin">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	<span style="color:#34abdd;">Headquarters:</span> New Cairo, Egypt</div>\r\n<div id="cke_pastebin">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	<span style="color:#34abdd;">Offices:</span> Egypt, Kingdom of Saudi Arabia (KSA), United Arab Emirates (UAE), Qatar</div>\r\n<div id="cke_pastebin">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	<span style="color:#34abdd;">Our Team:</span> 600 professionals</div>\r\n<div id="cke_pastebin">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	<span style="color:#34abdd;">Accreditations:</span></div>\r\n<div>\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	ISO 9001:2008</div>\r\n<div id="cke_pastebin">\r\n	ISO 14001:2004</div>\r\n<div id="cke_pastebin">\r\n	OHSAS 18001:2007</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	<span style="color:#34abdd;">Our Subsidiaries:&nbsp;</span>Giza Arabia, Giza Systems Services &amp; Distribution (GSD), Giza Systems Free Zone, Giza Systems JLT, Giza Systems Gulf, Giza Systems School of Technology (GSST)</div>\r\n', '<p style="text-align: justify;">\r\n	<span style="color:#34abdd;">Who We Are</span></p>\r\n<p style="text-align: justify;">\r\n	Giza Systems is the number one systems integrator in Egypt and the Middle East providing a wide range of industry specific technology solutions in the Utilities, Telecom, Oil &amp; Gas, Real Estate, Hospitality and Manufacturing industries.</p>\r\n<div id="cke_pastebin">\r\n	We have been shaping the IT industry and corporate agendas since 1974. Our consultancy practice provides industry focused services that enhance value for our clients by streamlining operational and business processes.</div>\r\n<div id="cke_pastebin">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	Operating in the Middle East through our offices and group of companies, we are focused on contributing to the local and regional development with our technology solutions, commitment and outstanding customer service.</div>\r\n<div id="cke_pastebin">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	Our team of 600 professionals enables us to extend our geographic footprint delivering diverse projects and connecting us with clients in the Middle East, Africa, Europe, Latin America and Russia.</div>\r\n<div id="cke_pastebin">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	<span style="color:#34abdd;">What We Do</span></div>\r\n<div id="cke_pastebin">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	We deliver a comprehensive scope and range of end-to-end industry specific solutions that meet customer demand for streamlining operational and business efficiencies.</div>\r\n<div id="cke_pastebin">\r\n	Our technical capabilities, extensive experience and knowledge of the market, as well as our partnership with global leaders in the areas of automation systems, communication solutions and metering infrastructure enable us to develop integrated solutions that can work with and build on the evolving technologies, as well as meet the dynamicity of our customers&rsquo; needs.</div>\r\n<div id="cke_pastebin">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	In our pursuit to constantly enhance existing resources and create new capabilities, we drive forward the growth of our company, our customers, our people, and our communities.</div>\r\n<div id="cke_pastebin">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	<span style="color:#34abdd;">Capabilities</span></div>\r\n<div>\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	With steady growth in our client base all over the Middle East, we have established local and regional offices to respond to the demands of our clients, as well as leverage the company&rsquo;s success and proven track record in the different sectors.</div>\r\n<div id="cke_pastebin">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	<span style="color:#34abdd;">Year Founded:</span> 1974</div>\r\n<div id="cke_pastebin">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	<span style="color:#34abdd;">Headquarters:</span> New Cairo, Egypt</div>\r\n<div id="cke_pastebin">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	<span style="color:#34abdd;">Offices:</span> Egypt, Kingdom of Saudi Arabia (KSA), United Arab Emirates (UAE), Qatar</div>\r\n<div id="cke_pastebin">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	<span style="color:#34abdd;">Our Team:</span> 600 professionals</div>\r\n<div id="cke_pastebin">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	<span style="color:#34abdd;">Accreditations:</span></div>\r\n<div>\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	ISO 9001:2008</div>\r\n<div id="cke_pastebin">\r\n	ISO 14001:2004</div>\r\n<div id="cke_pastebin">\r\n	OHSAS 18001:2007</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	<span style="color:#34abdd;">Our Subsidiaries:&nbsp;</span>Giza Arabia, Giza Systems Services &amp; Distribution (GSD), Giza Systems Free Zone, Giza Systems JLT, Giza Systems Gulf, Giza Systems School of Technology (GSST)</div>\r\n', 1, 0, 1, '2013-03-22 16:52:39'),
	(77, 'Milestones', 2, '/added/uploads/banner/page/1363963745_thumb.jpg', '/added/uploads/banner/page/1363963745.jpg', '/added/uploads/banner/page/1363963745_thumb.jpg', '/added/uploads/banner/page/1363963745.jpg', 'Milestones', 'Milestones', '', '', '', '', '<p>\r\n	1970s</p>\r\n<ul>\r\n	<li>\r\n		Established in 1974 as &ldquo;Giza Systems Engineering&rdquo;</li>\r\n	<li>\r\n		First national IT Company in Egypt</li>\r\n	<li>\r\n		Digital Equipment Corporation (DEC) representative in Egypt acquired in Tripoli. Legal entity to follow.</li>\r\n</ul>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	1980s</p>\r\n<ul>\r\n	<li>\r\n		Continued as DEC partner introducing different products from DEC into the Egyptian market</li>\r\n	<li>\r\n		Re-registered the company as a shareholding company under the name of &ldquo;Giza Systems</li>\r\n</ul>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	1990s</p>\r\n<ul>\r\n	<li>\r\n		&nbsp;New branches were established in Egypt&nbsp; (Alexandria, Ismailia, Assiut)</li>\r\n	<li>\r\n		Introduction of new service lines (Industrial Automation, GIS, Telecom Infrastructure, etc&hellip;)&nbsp;</li>\r\n</ul>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	2000s</p>\r\n<ul>\r\n	<li>\r\n		ISO 9001-2000 Certification</li>\r\n	<li>\r\n		CMMI Level 3 Certification</li>\r\n	<li>\r\n		Vertical Focus</li>\r\n	<li>\r\n		Establishment of Giza Arabia in the Kingdom of Saudi Arabia &amp; Giza Systems JLT in the United Arab Emirates.</li>\r\n	<li>\r\n		Regional Presence</li>\r\n	<li>\r\n		Over 500 professionals</li>\r\n</ul>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	2010</p>\r\n<ul>\r\n	<li>\r\n		Presence in African markets</li>\r\n	<li>\r\n		Over 600 professionals</li>\r\n	<li>\r\n		Acquired office facility in Tripoli, Libya</li>\r\n	<li>\r\n		Implementation of growth strategy through acquisitions, joint ventures, and consortia</li>\r\n	<li>\r\n		Giza Systems School of Technology (GSST) established</li>\r\n</ul>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	2011</p>\r\n<ul>\r\n	<li>\r\n		Moved to new headquarters in New Cairo</li>\r\n</ul>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	2012</p>\r\n<ul>\r\n	<li>\r\n		Giza Systems Foundation (GSF) established</li>\r\n	<li>\r\n		Giza Systems Electromechanical Company (GSEC) established</li>\r\n	<li>\r\n		Acquired office facility in Jeddah, KSA</li>\r\n</ul>\r\n', '<p>\r\n	1970s</p>\r\n<ul>\r\n	<li>\r\n		Established in 1974 as &ldquo;Giza Systems Engineering&rdquo;</li>\r\n	<li>\r\n		First national IT Company in Egypt</li>\r\n	<li>\r\n		Digital Equipment Corporation (DEC) representative in Egypt acquired in Tripoli. Legal entity to follow.</li>\r\n</ul>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	1980s</p>\r\n<ul>\r\n	<li>\r\n		Continued as DEC partner introducing different products from DEC into the Egyptian market</li>\r\n	<li>\r\n		Re-registered the company as a shareholding company under the name of &ldquo;Giza Systems</li>\r\n</ul>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	1990s</p>\r\n<ul>\r\n	<li>\r\n		&nbsp;New branches were established in Egypt&nbsp; (Alexandria, Ismailia, Assiut)</li>\r\n	<li>\r\n		Introduction of new service lines (Industrial Automation, GIS, Telecom Infrastructure, etc&hellip;)&nbsp;</li>\r\n</ul>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	2000s</p>\r\n<ul>\r\n	<li>\r\n		ISO 9001-2000 Certification</li>\r\n	<li>\r\n		CMMI Level 3 Certification</li>\r\n	<li>\r\n		Vertical Focus</li>\r\n	<li>\r\n		Establishment of Giza Arabia in the Kingdom of Saudi Arabia &amp; Giza Systems JLT in the United Arab Emirates.</li>\r\n	<li>\r\n		Regional Presence</li>\r\n	<li>\r\n		Over 500 professionals</li>\r\n</ul>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	2010</p>\r\n<ul>\r\n	<li>\r\n		Presence in African markets</li>\r\n	<li>\r\n		Over 600 professionals</li>\r\n	<li>\r\n		Acquired office facility in Tripoli, Libya</li>\r\n	<li>\r\n		Implementation of growth strategy through acquisitions, joint ventures, and consortia</li>\r\n	<li>\r\n		Giza Systems School of Technology (GSST) established</li>\r\n</ul>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	2011</p>\r\n<ul>\r\n	<li>\r\n		Moved to new headquarters in New Cairo</li>\r\n</ul>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	2012</p>\r\n<ul>\r\n	<li>\r\n		Giza Systems Foundation (GSF) established</li>\r\n	<li>\r\n		Giza Systems Electromechanical Company (GSEC) established</li>\r\n	<li>\r\n		Acquired office facility in Jeddah, KSA</li>\r\n</ul>\r\n', 1, 0, 1, '2013-03-22 16:49:05'),
	(78, 'Values', 2, '/added/uploads/banner/page/1363963844_thumb.jpg', '/added/uploads/banner/page/1363963844.jpg', '/added/uploads/banner/page/1363963844_thumb.jpg', '/added/uploads/banner/page/1363963844.jpg', 'Values', 'Values', '', '', '', '', '<p>\r\n	<span style="font-size:14px;"><span style="font-family: arial;"><span style="color: rgb(0, 164, 228);">&gt;</span>&nbsp; We are&nbsp;<span style="color: rgb(0, 164, 228);">innovators</span>&nbsp;in&nbsp;the marketplace</span></span></p>\r\n<p>\r\n	<span style="font-size:14px;"><span style="font-family: arial;"><span style="color: rgb(0, 164, 228);">&gt;</span>&nbsp;&nbsp;We operate&nbsp;with&nbsp;<span style="color: rgb(0, 164, 228);">integrity</span>&nbsp;and&nbsp;<span style="color: rgb(0, 164, 228);">trust</span></span></span></p>\r\n<p>\r\n	<span style="font-size:14px;"><span style="font-family: arial;"><span style="color: rgb(0, 164, 228);">&gt;</span>&nbsp; We are&nbsp;committed&nbsp;to delivering&nbsp;<span style="color: rgb(0, 164, 228);">quality</span>&nbsp;service</span></span></p>\r\n<p>\r\n	<span style="font-size:14px;"><span style="font-family: arial;"><span style="color: rgb(52, 171, 221);">&gt; &nbsp;</span>We take&nbsp;<span style="color: rgb(0, 164, 228);">ownership</span>&nbsp;in&nbsp;whatever we do</span></span></p>\r\n', '<p>\r\n	<span style="font-size:14px;"><span style="font-family: arial;"><span style="color: rgb(0, 164, 228);">&gt;</span>&nbsp; We are&nbsp;<span style="color: rgb(0, 164, 228);">innovators</span>&nbsp;in&nbsp;the marketplace</span></span></p>\r\n<p>\r\n	<span style="font-size:14px;"><span style="font-family: arial;"><span style="color: rgb(0, 164, 228);">&gt;</span>&nbsp;&nbsp;We operate&nbsp;with&nbsp;<span style="color: rgb(0, 164, 228);">integrity</span>&nbsp;and&nbsp;<span style="color: rgb(0, 164, 228);">trust</span></span></span></p>\r\n<p>\r\n	<span style="font-size:14px;"><span style="font-family: arial;"><span style="color: rgb(0, 164, 228);">&gt;</span>&nbsp; We are&nbsp;committed&nbsp;to delivering&nbsp;<span style="color: rgb(0, 164, 228);">quality</span>&nbsp;service</span></span></p>\r\n<p>\r\n	<span style="font-size:14px;"><span style="font-family: arial;"><span style="color: rgb(52, 171, 221);">&gt; &nbsp;</span>We take&nbsp;<span style="color: rgb(0, 164, 228);">ownership</span>&nbsp;in&nbsp;whatever we do</span></span></p>\r\n', 1, 0, 1, '2013-03-22 16:50:44'),
	(79, 'Structure', 2, NULL, NULL, NULL, NULL, 'Structure', 'Structure', NULL, NULL, NULL, NULL, '<p>\r\n	&nbsp;&nbsp;</p>\r\n', '<p>\r\n	&nbsp;&nbsp;</p>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(80, 'Offices', 2, NULL, NULL, NULL, NULL, 'Offices', 'Offices', NULL, NULL, NULL, NULL, '<p>\r\n	Egypt<br />\r\n	Head Office<br />\r\n	Plot No. 176, Second Sector,<br />\r\n	City Center, P.O. Box 157<br />\r\n	New Cairo 11835,<br />\r\n	Egypt<br />\r\n	&#61480;+202 26146000 / 6111<br />\r\n	+202 26146001<br />\r\n	&#61482; info@gizasystems.com<br />\r\n	Call Center: 16492</p>\r\n<p>\r\n	Qatar<br />\r\n	Doha<br />\r\n	Giza Systems<br />\r\n	Level 15, Commercialbank<br />\r\n	Plaza, Westbay,<br />\r\n	P.O. Box 27111, Doha,<br />\r\n	Qatar<br />\r\n	&#61480;+974 4452 8339<br />\r\n	+974 4452 8344<br />\r\n	<br />\r\n	Saudi Arabia<br />\r\n	Riyadh<br />\r\n	Giza Arabia<br />\r\n	Rosayes Business Center,<br />\r\n	P.O. Box 67765,<br />\r\n	Riyadh 11517,<br />\r\n	KSA<br />\r\n	&#61480;+966 1 460 2890<br />\r\n	+966 1 460 2892</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	UAE</p>\r\n<p>\r\n	Dubai</p>\r\n<p>\r\n	Giza Systems JLT<br />\r\n	Fortune Tower - Office<br />\r\n	No. 1306 - 13th Floor,<br />\r\n	Jumeirah Lake Towers<br />\r\n	Dubai,<br />\r\n	UAE</p>\r\n', '<p>\r\n	Egypt<br />\r\n	Head Office<br />\r\n	Plot No. 176, Second Sector,<br />\r\n	City Center, P.O. Box 157<br />\r\n	New Cairo 11835,<br />\r\n	Egypt<br />\r\n	&#61480;+202 26146000 / 6111<br />\r\n	+202 26146001<br />\r\n	&#61482; info@gizasystems.com<br />\r\n	Call Center: 16492</p>\r\n<p>\r\n	Qatar<br />\r\n	Doha<br />\r\n	Giza Systems<br />\r\n	Level 15, Commercialbank<br />\r\n	Plaza, Westbay,<br />\r\n	P.O. Box 27111, Doha,<br />\r\n	Qatar<br />\r\n	&#61480;+974 4452 8339<br />\r\n	+974 4452 8344<br />\r\n	<br />\r\n	Saudi Arabia<br />\r\n	Riyadh<br />\r\n	Giza Arabia<br />\r\n	Rosayes Business Center,<br />\r\n	P.O. Box 67765,<br />\r\n	Riyadh 11517,<br />\r\n	KSA<br />\r\n	&#61480;+966 1 460 2890<br />\r\n	+966 1 460 2892</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	UAE</p>\r\n<p>\r\n	Dubai</p>\r\n<p>\r\n	Giza Systems JLT<br />\r\n	Fortune Tower - Office<br />\r\n	No. 1306 - 13th Floor,<br />\r\n	Jumeirah Lake Towers<br />\r\n	Dubai,<br />\r\n	UAE</p>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(81, 'Inspiring Change', 2, '', '', '', '', 'Inspiring Change', 'Inspiring Change', 'Inspiring Change', 'Inspiring Change', '', '', '<div><img src="http://108.167.160.115/photos/05jkfgn9ngxivm2e858o.png" alt="" /></div>\r\n<p><img src="http://108.167.160.115/photos/34lpp1a7qpqe24kperik.png" alt="" /></p>\r\n<p>&nbsp;</p>', '<div><img src="http://108.167.160.115/photos/05jkfgn9ngxivm2e858o.png" alt="" /></div>\r\n<p>    </p>\r\n<div>     <img src="http://108.167.160.115/photos/34lpp1a7qpqe24kperik.png" alt="" /></div>\r\n<p>&nbsp;</p>', 1, 0, 1, '2013-03-22 22:37:46'),
	(82, 'Going Green', 2, '', '', '', '', 'Going Green', 'Going Green', 'Going Green', 'Going Green', '', '', '<p><img src="http://108.167.160.115/photos/t6pjvml4p3qndsh1binc.png" alt="" /></p>\r\n<p>&nbsp;</p>', '<p><img src="http://108.167.160.115/photos/t6pjvml4p3qndsh1binc.png" alt="" /></p>\r\n<p>&nbsp;</p>', 1, 0, 1, '2013-03-22 22:38:19'),
	(83, 'Driving Innovation', 2, '', '', '', '', 'Driving Innovation', 'Driving Innovation', 'Driving Innovation', 'Driving Innovation', '', '', '<p><img src="http://108.167.160.115/photos/386szduf0h7yssy0vdj3.png" alt="" /></p>\r\n<p>&nbsp;</p>', '<p>     <img src="http://108.167.160.115/photos/386szduf0h7yssy0vdj3.png" alt="" /></p>\r\n<p>    </p>', 1, 0, 1, '2013-03-22 22:32:42'),
	(84, 'Corporate Governance', 2, NULL, NULL, NULL, NULL, 'Corporate Governance', 'Corporate Governance', 'Corporate Governance', 'Corporate Governance', 'Corporate Governance', 'Corporate Governance', '<p>\r\n	Corporate Governance</p>\r\n', '<p>\r\n	Corporate Governance</p>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(85, 'Collaborate with Us', 2, NULL, NULL, NULL, NULL, 'Collaborate with Us', 'Collaborate with Us', 'Collaborate with Us', 'Collaborate with Us', 'Collaborate with Us', 'Collaborate with Us', '<p>\r\n	Collaborate with Us</p>\r\n', '<p>\r\n	Collaborate with Us</p>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(86, 'Vision & Mission', 2, '/added/uploads/banner/page/1363963792_thumb.jpg', '/added/uploads/banner/page/1363963792.jpg', '/added/uploads/banner/page/1363963792_thumb.jpg', '/added/uploads/banner/page/1363963792.jpg', 'Vision & Mission', 'Vision & Mission', '', '', '<p>Vision &amp; Mission</p>', '<p>Vision &amp; Mission</p>', '<p style="text-align: justify;">\r\n	<span style="color:#34abdd;">Our Vision</span></p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	To be recognized and valued as the number one systems integrator in the region in our fields of choice.</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	<span style="color:#34abdd;">Our Mission</span></div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Our mission is to contribute to local and regional development with our technology solutions, commitment and dedicated customer service. We strive to foster an open, trustworthy and friendly environment conducive to innovation, mutual respect, career development and personal growth so that our people can achieve their full potential. We are committed to our responsibility towards our society and our environment. We shall always endeavor to set a standard for others to follow.</div>\r\n<p>\r\n	<span _fck_bookmark="1" style="display: none;">&nbsp;</span></p>\r\n', '<p style="text-align: justify;">\r\n	<span style="color:#34abdd;">Our Vision</span></p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	To be recognized and valued as the number one systems integrator in the region in our fields of choice.</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	<span style="color:#34abdd;">Our Mission</span></div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Our mission is to contribute to local and regional development with our technology solutions, commitment and dedicated customer service. We strive to foster an open, trustworthy and friendly environment conducive to innovation, mutual respect, career development and personal growth so that our people can achieve their full potential. We are committed to our responsibility towards our society and our environment. We shall always endeavor to set a standard for others to follow.</div>\r\n<p>\r\n	<span _fck_bookmark="1" style="display: none;">&nbsp;</span></p>\r\n', 1, 0, 1, '2013-03-22 16:49:52'),
	(87, 'About Giza Systems', 2, '', '', '', '', 'About Giza Systems', 'About Giza Systems', '', '', '<p>About Giza Systems</p>', '<p>About Giza Systems</p>', '<p style="text-align: justify;">\r\n	<span style="font-size:12px;"><span style="font-family: arial;">Giza Systems is the number one systems integrator in Egypt and the Middle East providing a wide range of industry specific technology solutions in the Telecom, Utilities, Oil &amp; Gas, Manufacturing, Real Estate and Hospitality industries.</span></span></p>\r\n<p style="text-align: justify;">\r\n	<span style="font-size:12px;"><span style="font-family: arial;">We have been shaping the IT industry and corporate agendas since 1974. Our consultancy practice provides industry focused services that enhance value for our clients by streamlining operational and business processes.</span></span></p>\r\n<p style="text-align: justify;">\r\n	<span style="font-size:12px;"><span style="font-family: arial;">Operating in the Middle East through our group of offices and companies, we are dedicated to contributing to the local and regional development with our technology solutions, commitment and outstanding customer service. Our team of 600 professionals enables us to extend our geographic footprint delivering diverse projects and connecting us with clients in the Middle East, Europe and Russia.&nbsp;</span></span></p>\r\n', '<p style="text-align: justify;">\r\n	<span style="font-size:12px;"><span style="font-family: arial;">Giza Systems is the number one systems integrator in Egypt and the Middle East providing a wide range of industry specific technology solutions in the Telecom, Utilities, Oil &amp; Gas, Manufacturing, Real Estate and Hospitality industries.</span></span></p>\r\n<p style="text-align: justify;">\r\n	<span style="font-size:12px;"><span style="font-family: arial;">We have been shaping the IT industry and corporate agendas since 1974. Our consultancy practice provides industry focused services that enhance value for our clients by streamlining operational and business processes.</span></span></p>\r\n<p style="text-align: justify;">\r\n	<span style="font-size:12px;"><span style="font-family: arial;">Operating in the Middle East through our group of offices and companies, we are dedicated to contributing to the local and regional development with our technology solutions, commitment and outstanding customer service. Our team of 600 professionals enables us to extend our geographic footprint delivering diverse projects and connecting us with clients in the Middle East, Europe and Russia.&nbsp;</span></span></p>\r\n', 1, 0, 1, '2013-03-18 22:05:57'),
	(88, '.', 2, NULL, NULL, NULL, NULL, '.', '.', 'CSR', 'CSR', NULL, NULL, '<p style="text-align: justify; ">\r\n	&nbsp;</p>\r\n<p style="text-align: justify; ">\r\n	<img alt="" src="http://108.167.160.115/photos/pnqp6l6t425nb0nd5mah.png" style="width: 700px; height: 525px;" /></p>\r\n<p style="text-align: justify; ">\r\n	<img alt="" src="http://108.167.160.115/photos/yougotagqkksy2avj7fx.png" style="width: 700px; height: 525px;" /></p>\r\n<p style="text-align: justify; ">\r\n	<img alt="" src="http://108.167.160.115/photos/i022z1p8le4hzt4oi2zj.png" style="width: 700px; height: 525px;" /></p>\r\n', '<p style="text-align: justify; ">\r\n	&nbsp;</p>\r\n<p style="text-align: justify; ">\r\n	<img alt="" src="http://108.167.160.115/photos/pnqp6l6t425nb0nd5mah.png" style="width: 700px; height: 525px;" /></p>\r\n<p style="text-align: justify; ">\r\n	<img alt="" src="http://108.167.160.115/photos/yougotagqkksy2avj7fx.png" style="width: 700px; height: 525px;" /></p>\r\n<p style="text-align: justify; ">\r\n	<img alt="" src="http://108.167.160.115/photos/i022z1p8le4hzt4oi2zj.png" style="width: 700px; height: 525px;" /></p>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(89, 'Product Lifecycle Management Solution', 2, NULL, NULL, NULL, NULL, 'Product Lifecycle Management Solution', 'Product Lifecycle Management Solution', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	<span style="text-align: justify; ">Product Lifecycle Management is a controlled framework for managing and tracking the development,&nbsp;launch and in-life management of products. It combines people, projects, workflows, technology,&nbsp;and data into a strategic business approach for developing and managing products across an&nbsp;enterprise.</span></p>\r\n', '<p>\r\n	<span style="text-align: justify; ">Product Lifecycle Management is a controlled framework for managing and tracking the development,&nbsp;launch and in-life management of products. It combines people, projects, workflows, technology,&nbsp;and data into a strategic business approach for developing and managing products across an&nbsp;enterprise.</span></p>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(90, 'Network Inventory Management', 2, NULL, NULL, NULL, NULL, 'Network Inventory Management', 'Network Inventory Management', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin">\r\n	Operators need a command center system that allows them to oversee all elements of the&nbsp;provisioning continuum to fully utilize their growing and dynamic networks. Our fully integrated&nbsp;network inventory solution manages physical and logical network inventory in order to deliver a&nbsp;precise view of all assets and provide consistently clear and accurate data.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin">\r\n	Operators need a command center system that allows them to oversee all elements of the&nbsp;provisioning continuum to fully utilize their growing and dynamic networks. Our fully integrated&nbsp;network inventory solution manages physical and logical network inventory in order to deliver a&nbsp;precise view of all assets and provide consistently clear and accurate data.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(91, 'Business Process Management', 2, NULL, NULL, NULL, NULL, 'Business Process Management', 'Business Process Management', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Our Business Process Management (BPM) solution is a management approach targeting the&nbsp;alignment of all aspects of an organization with the wants and needs of clients. It is a holistic&nbsp;management approach that promotes business effectiveness and efficiency while striving&nbsp;for innovation, flexibility and technology integration. As opposed to traditional hierarchical&nbsp;management approaches, BPM enables organizations to optimize their efficiencies and become&nbsp;more capable of change and dynamicity.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Our Business Process Management (BPM) solution is a management approach targeting the&nbsp;alignment of all aspects of an organization with the wants and needs of clients. It is a holistic&nbsp;management approach that promotes business effectiveness and efficiency while striving&nbsp;for innovation, flexibility and technology integration. As opposed to traditional hierarchical&nbsp;management approaches, BPM enables organizations to optimize their efficiencies and become&nbsp;more capable of change and dynamicity.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(92, 'Product Catalog', 2, NULL, NULL, NULL, NULL, 'Product Catalog', 'Product Catalog', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	To coordinate information communications, service providers need to efficiently manage product&nbsp;lifecycles. We provide the Product Catalog integrated solution which defines, introduces,&nbsp;manages, and retires product and service offerings across distributed service provider&nbsp;environments.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	To coordinate information communications, service providers need to efficiently manage product&nbsp;lifecycles. We provide the Product Catalog integrated solution which defines, introduces,&nbsp;manages, and retires product and service offerings across distributed service provider&nbsp;environments.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(93, 'Order Management', 2, NULL, NULL, NULL, NULL, 'Order Management', 'Order Management', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin">\r\n	<span style="text-align: justify; ">With an increasingly elaborate choice of offerings, devices, applications and content providers,&nbsp;</span><span style="text-align: justify; ">leading communications service providers recognize the need for a dynamic, accurate and&nbsp;</span><span style="text-align: justify; ">responsive order validation and provisioning system. Our Order Management solution provides&nbsp;</span><span style="text-align: justify; ">workflow tools to visualize, automate, and accelerate order-to-cash processes that span the&nbsp;</span><span style="text-align: justify; ">organization, technology, customer and partn</span><span style="text-align: justify; ">er domains.</span></div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin">\r\n	<span style="text-align: justify; ">With an increasingly elaborate choice of offerings, devices, applications and content providers,&nbsp;</span><span style="text-align: justify; ">leading communications service providers recognize the need for a dynamic, accurate and&nbsp;</span><span style="text-align: justify; ">responsive order validation and provisioning system. Our Order Management solution provides&nbsp;</span><span style="text-align: justify; ">workflow tools to visualize, automate, and accelerate order-to-cash processes that span the&nbsp;</span><span style="text-align: justify; ">organization, technology, customer and partn</span><span style="text-align: justify; ">er domains.</span></div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(94, 'Wholesale Billing', 2, NULL, NULL, NULL, NULL, 'Wholesale Billing', 'Wholesale Billing', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	<span style="text-align: justify; ">Giza Systems&rsquo; solutions unleash the potential for growth of wholesale partner relations business.&nbsp;We provide highly efficient partner management, optimized traffic trading and routing through&nbsp;the network, accurate billing and settlement for all services including traditional voice, data, IP/&nbsp;content, and TAP/CIBER roaming services.</span></p>\r\n', '<p>\r\n	<span style="text-align: justify; ">Giza Systems&rsquo; solutions unleash the potential for growth of wholesale partner relations business.&nbsp;We provide highly efficient partner management, optimized traffic trading and routing through&nbsp;the network, accurate billing and settlement for all services including traditional voice, data, IP/&nbsp;content, and TAP/CIBER roaming services.</span></p>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(95, 'Retail Billing', 2, NULL, NULL, NULL, NULL, 'Retail Billing', 'Retail Billing', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	In a highly saturated retail telecoms market, future growth will be driven by poaching subscribers&nbsp;from rival service providers, and generating additional revenues from the existing customer&nbsp;base. Effectively, retail billing solutions will enhance service providers&rsquo; ability to offer differentiated&nbsp;bundles and the latest high-end devices, while personalizing services and excelling in&nbsp;customer care. Service providers will also be able to target products and bundles based on&nbsp;customer value.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	In a highly saturated retail telecoms market, future growth will be driven by poaching subscribers&nbsp;from rival service providers, and generating additional revenues from the existing customer&nbsp;base. Effectively, retail billing solutions will enhance service providers&rsquo; ability to offer differentiated&nbsp;bundles and the latest high-end devices, while personalizing services and excelling in&nbsp;customer care. Service providers will also be able to target products and bundles based on&nbsp;customer value.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(96, 'Numbering Portability ? Mobile & Fixed', 2, NULL, NULL, NULL, NULL, 'Numbering Portability ? Mobile & Fixed', 'Numbering Portability ? Mobile & Fixed', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Our solutions enable telecommunications regulatory authorities and service providers to develop&nbsp;and implement the necessary infrastructure and support services for Number Portability.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Our solutions enable telecommunications regulatory authorities and service providers to develop&nbsp;and implement the necessary infrastructure and support services for Number Portability.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(97, 'Number Management System', 2, NULL, NULL, NULL, NULL, 'Number Management System', 'Number Management System', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Regulators are under constant pressure to manage scarce numbering resources whilst&nbsp;concurrently delivering optimal number assignment experience to operators. The overwhelming&nbsp;complexities of number administration and management demand a user-friendly, automated and&nbsp;centralized solution. Giza Systems&rsquo; Number Management Solutions support the entire national&nbsp;numbering plan of any country. It also simplifies number resource assignment processes and&nbsp;minimizes potential for errors.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Regulators are under constant pressure to manage scarce numbering resources whilst&nbsp;concurrently delivering optimal number assignment experience to operators. The overwhelming&nbsp;complexities of number administration and management demand a user-friendly, automated and&nbsp;centralized solution. Giza Systems&rsquo; Number Management Solutions support the entire national&nbsp;numbering plan of any country. It also simplifies number resource assignment processes and&nbsp;minimizes potential for errors.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(98, 'E-Payment', 2, NULL, NULL, NULL, NULL, 'E-Payment', 'E-Payment', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	E-Payment is an open and flexible mobile transaction processing solution that allows mobile&nbsp;network operators to deliver mobile airtime and money payment services &ndash; nationwide or across&nbsp;countries &ndash; from airtime recharges to goods and utility bill payments. It readily integrates with&nbsp;external systems and networks, as well as provides the capabilities needed to roll-out innovative&nbsp;mobile payment services.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	E-Payment is an open and flexible mobile transaction processing solution that allows mobile&nbsp;network operators to deliver mobile airtime and money payment services &ndash; nationwide or across&nbsp;countries &ndash; from airtime recharges to goods and utility bill payments. It readily integrates with&nbsp;external systems and networks, as well as provides the capabilities needed to roll-out innovative&nbsp;mobile payment services.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(99, 'Customer Experience Management', 2, NULL, NULL, NULL, NULL, 'Customer Experience Management', 'Customer Experience Management', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p style="text-align: justify; ">\r\n	<span style="text-align: justify; ">Customer Experience Management collects information from network equipment, probes and/or&nbsp;end user devices about the quality of experience encountered by subscribers. It then processes&nbsp;this information, extracting details about service interactions, network components, and mobile&nbsp;devices involved in the transaction. Using a unique data model, applicable to a range of mobile&nbsp;services, it stores the transaction information and provides various views of that data. The value&nbsp;of this solution is to reduce churn and reduce costs associated with network management.</span></p>\r\n', '<p style="text-align: justify; ">\r\n	<span style="text-align: justify; ">Customer Experience Management collects information from network equipment, probes and/or&nbsp;end user devices about the quality of experience encountered by subscribers. It then processes&nbsp;this information, extracting details about service interactions, network components, and mobile&nbsp;devices involved in the transaction. Using a unique data model, applicable to a range of mobile&nbsp;services, it stores the transaction information and provides various views of that data. The value&nbsp;of this solution is to reduce churn and reduce costs associated with network management.</span></p>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(100, 'Revenue Assurance', 2, NULL, NULL, NULL, NULL, 'Revenue Assurance', 'Revenue Assurance', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	This complete revenue assurance solution is designed to tackle critical challenges across the&nbsp;entire revenue chain. It offers a set of pre-configured solution templates to address revenue&nbsp;assurance challenges inherent to individual service verticals: Wireless, Fixed, Cable MSPs, and&nbsp;MVNOs. These solution templates address revenue assurance issues across multiple functional&nbsp;areas, such as service fulfillment, usage integrity, retail billing, interconnect/ wholesale billing, and&nbsp;content settlement. This helps customers dramatically reduce the time required to implement or&nbsp;extend the coverage of their revenue assurance practices.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	This complete revenue assurance solution is designed to tackle critical challenges across the&nbsp;entire revenue chain. It offers a set of pre-configured solution templates to address revenue&nbsp;assurance challenges inherent to individual service verticals: Wireless, Fixed, Cable MSPs, and&nbsp;MVNOs. These solution templates address revenue assurance issues across multiple functional&nbsp;areas, such as service fulfillment, usage integrity, retail billing, interconnect/ wholesale billing, and&nbsp;content settlement. This helps customers dramatically reduce the time required to implement or&nbsp;extend the coverage of their revenue assurance practices.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(101, 'Social Media Monitoring', 2, NULL, NULL, NULL, NULL, 'Social Media Monitoring', 'Social Media Monitoring', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	It is a business intelligence solution that provides visibility into social media and enables telecom&nbsp;operators to gain access to an untapped data resource, namely customers&rsquo; direct opinions&nbsp;and wants. It easily allows data capturing and analysis from social media channels in order to&nbsp;monitor brands, identify key communities and influencers, address customer service issues,&nbsp;and generate new sales leads.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	It is a business intelligence solution that provides visibility into social media and enables telecom&nbsp;operators to gain access to an untapped data resource, namely customers&rsquo; direct opinions&nbsp;and wants. It easily allows data capturing and analysis from social media channels in order to&nbsp;monitor brands, identify key communities and influencers, address customer service issues,&nbsp;and generate new sales leads.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(102, 'Social Network Analysis', 2, NULL, NULL, NULL, NULL, 'Social Network Analysis', 'Social Network Analysis', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The Social Network Analysis solution automatically builds social network graphs from actual&nbsp;customer interactions, whether it is a call, an SMS text, an email or even a financial transaction.&nbsp;Operators can identify influencers, followers and communicators &ndash; essentially putting a value&nbsp;on a specific customer&rsquo;s social influence. With increased access to transactional data, social&nbsp;insights constitute a pivotal element for any business or institution. These insights can serve a</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	broad range of functions that include designing viral marketing campaigns, creating retention&nbsp;programs, as well as detecting criminal activity such as money laundering and fraud.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The Social Network Analysis solution automatically builds social network graphs from actual&nbsp;customer interactions, whether it is a call, an SMS text, an email or even a financial transaction.&nbsp;Operators can identify influencers, followers and communicators &ndash; essentially putting a value&nbsp;on a specific customer&rsquo;s social influence. With increased access to transactional data, social&nbsp;insights constitute a pivotal element for any business or institution. These insights can serve a</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	broad range of functions that include designing viral marketing campaigns, creating retention&nbsp;programs, as well as detecting criminal activity such as money laundering and fraud.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(103, 'Inbound Marketing (Best Next Action)', 2, NULL, NULL, NULL, NULL, 'Inbound Marketing (Best Next Action)', 'Inbound Marketing (Best Next Action)', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	It is a solution that works with the existing systems to provide the most accurate, targeted&nbsp;sales, service, and retention offer tailored to each individual customer, at the specific moment&nbsp;of interaction, regardless of the channel. The decision of the &ldquo;best-next-action&rdquo; is performed in&nbsp;real-time by using the organization&rsquo;s data, business rules, and predictive analytics. The solution&nbsp;allows for the connection of customer data across various business units and disparate channels,&nbsp;without duplication, in addition to enabling the management of multiple customer channels&nbsp;from a single view. Analytically driven recommendations supported by contextual resources&nbsp;guide the live agents throughout the duration of the dialogue, instead of having them rely on</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	guesswork.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	It is a solution that works with the existing systems to provide the most accurate, targeted&nbsp;sales, service, and retention offer tailored to each individual customer, at the specific moment&nbsp;of interaction, regardless of the channel. The decision of the &ldquo;best-next-action&rdquo; is performed in&nbsp;real-time by using the organization&rsquo;s data, business rules, and predictive analytics. The solution&nbsp;allows for the connection of customer data across various business units and disparate channels,&nbsp;without duplication, in addition to enabling the management of multiple customer channels&nbsp;from a single view. Analytically driven recommendations supported by contextual resources&nbsp;guide the live agents throughout the duration of the dialogue, instead of having them rely on</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	guesswork.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(104, 'Broadband Management Systems', 2, NULL, NULL, NULL, NULL, 'Broadband Management Systems', 'Broadband Management Systems', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	These are end-to-end solutions that enable providers to position themselves as leaders in the&nbsp;marketplace. They support any access network, including GPRS, EDGE, HSDPA, EVDO, eHRPD,&nbsp;UMTS, CDMA2000, WiMAX, Wi-Fi, xDSL, MetroE, GPON and FTTH. These solutions include&nbsp;real-time policy controls; end-to-end device management; web self care; flexible real-time&nbsp;charging and rating; integration with DPI; endlessly scalable systems; complete customer lifecycle&nbsp;management; and support for hierarchical and carrier billing.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	These are end-to-end solutions that enable providers to position themselves as leaders in the&nbsp;marketplace. They support any access network, including GPRS, EDGE, HSDPA, EVDO, eHRPD,&nbsp;UMTS, CDMA2000, WiMAX, Wi-Fi, xDSL, MetroE, GPON and FTTH. These solutions include&nbsp;real-time policy controls; end-to-end device management; web self care; flexible real-time&nbsp;charging and rating; integration with DPI; endlessly scalable systems; complete customer lifecycle&nbsp;management; and support for hierarchical and carrier billing.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(105, 'Prepaid Lifecycle Management', 2, NULL, NULL, NULL, NULL, 'Prepaid Lifecycle Management', 'Prepaid Lifecycle Management', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	This solution assists operators overcome the problem of facing increasingly saturated markets&nbsp;and tougher competition by making it critical for them to extend the average subscriber lifecycle&nbsp;in order to boost ARPU, reduce churn and ultimately, sustain growth and profits. Using Prepaid&nbsp;Lifecycle Management enables operators to monitor the subscriber lifecycle with a live view of&nbsp;the status, behaviors, and trends for each subscriber. This allows operators to accurately predict&nbsp;future usage (including churn risk); segment the customer base; automatically execute targeted&nbsp;campaigns to stimulate usage and reduce inactivity; intervene at precisely the right moment for&nbsp;the optimization of campaign effectiveness; proactively retain subscribers before they consider&nbsp;leaving; and maximize the lifetime value of existing and new customer bases.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	This solution assists operators overcome the problem of facing increasingly saturated markets&nbsp;and tougher competition by making it critical for them to extend the average subscriber lifecycle&nbsp;in order to boost ARPU, reduce churn and ultimately, sustain growth and profits. Using Prepaid&nbsp;Lifecycle Management enables operators to monitor the subscriber lifecycle with a live view of&nbsp;the status, behaviors, and trends for each subscriber. This allows operators to accurately predict&nbsp;future usage (including churn risk); segment the customer base; automatically execute targeted&nbsp;campaigns to stimulate usage and reduce inactivity; intervene at precisely the right moment for&nbsp;the optimization of campaign effectiveness; proactively retain subscribers before they consider&nbsp;leaving; and maximize the lifetime value of existing and new customer bases.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(106, 'Least Cost Routing', 2, NULL, NULL, NULL, NULL, 'Least Cost Routing', 'Least Cost Routing', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin">\r\n	The main functions of the Least Cost Routing solution are to automatically load price schedules&nbsp;and code tables; keep control of volume commitment and available capacity; correctly compare&nbsp;dial codes; turn the carriers&rsquo; name-based price schedule into a dial code-dependent termination&nbsp;cost schedule; put costs in order; incorporate quality considerations; produce costing and&nbsp;routing schedules in a format suitable for pricing analysts and engineering; generate automatic&nbsp;MML orders to the switches; and transfer data into the billing system.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin">\r\n	The main functions of the Least Cost Routing solution are to automatically load price schedules&nbsp;and code tables; keep control of volume commitment and available capacity; correctly compare&nbsp;dial codes; turn the carriers&rsquo; name-based price schedule into a dial code-dependent termination&nbsp;cost schedule; put costs in order; incorporate quality considerations; produce costing and&nbsp;routing schedules in a format suitable for pricing analysts and engineering; generate automatic&nbsp;MML orders to the switches; and transfer data into the billing system.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(107, 'End-to-End Mobile Service Management', 2, NULL, NULL, NULL, NULL, 'End-to-End Mobile Service Management', 'End-to-End Mobile Service Management', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The comprehensive E2E Mobile Service monitoring solution provides fast troubleshooting&nbsp;capabilities throughout the whole service delivery path. This includes: Data Centre/Application&nbsp;Servers; IP/MPLS Backbone Network; Multi-vendor Mobile Packet Core Network; Mobile&nbsp;Backhaul and Radio Access Network; Cross Silo and Vendor Independent Infrastructure&nbsp;performance assurance; and capacity monitoring with Carrier Grade and Resilient Architecture.</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	It allows service providers to troubleshoot problems more proactively, and better plan for future&nbsp;traffic needs. This enables them to fulfill services more efficiently and effectively, and enhance&nbsp;the end-user quality experience.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The comprehensive E2E Mobile Service monitoring solution provides fast troubleshooting&nbsp;capabilities throughout the whole service delivery path. This includes: Data Centre/Application&nbsp;Servers; IP/MPLS Backbone Network; Multi-vendor Mobile Packet Core Network; Mobile&nbsp;Backhaul and Radio Access Network; Cross Silo and Vendor Independent Infrastructure&nbsp;performance assurance; and capacity monitoring with Carrier Grade and Resilient Architecture.</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	It allows service providers to troubleshoot problems more proactively, and better plan for future&nbsp;traffic needs. This enables them to fulfill services more efficiently and effectively, and enhance&nbsp;the end-user quality experience.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(108, 'Smart Cities', 2, NULL, NULL, NULL, NULL, 'Smart Cities', 'Smart Cities', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Leveraging our expertise in the telecom, enterprise and industrial applications sectors, Giza&nbsp;Systems has developed an IT architecture that enables smart real estate operators to manage&nbsp;and gain revenues from the utilities, building management systems, and telecom using the&nbsp;same OSS/BSS infrastructure to keep the investment as low as possible with the same fully&nbsp;automated systems.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	A single IP network enables the management and delivery of all major operational processes and&nbsp;tenant services in an efficient, centrally operated manner. Organizations can increase revenue&nbsp;and opportunity, improve business resiliency, strengthen customer relationships, and improve&nbsp;productivity, while simultaneously reducing costs.&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Our solution framework is based on merging IT with a building&rsquo;s existing systems. Establishing&nbsp;a single IP network for communications (voice, video, and data), it connects the building&rsquo;s major&nbsp;systems (HVAC, lighting, energy, video surveillance, and access) and creates an unprecedented&nbsp;opportunity for key stakeholders in the building&rsquo;s value chain.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Leveraging our expertise in the telecom, enterprise and industrial applications sectors, Giza&nbsp;Systems has developed an IT architecture that enables smart real estate operators to manage&nbsp;and gain revenues from the utilities, building management systems, and telecom using the&nbsp;same OSS/BSS infrastructure to keep the investment as low as possible with the same fully&nbsp;automated systems.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	A single IP network enables the management and delivery of all major operational processes and&nbsp;tenant services in an efficient, centrally operated manner. Organizations can increase revenue&nbsp;and opportunity, improve business resiliency, strengthen customer relationships, and improve&nbsp;productivity, while simultaneously reducing costs.&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Our solution framework is based on merging IT with a building&rsquo;s existing systems. Establishing&nbsp;a single IP network for communications (voice, video, and data), it connects the building&rsquo;s major&nbsp;systems (HVAC, lighting, energy, video surveillance, and access) and creates an unprecedented&nbsp;opportunity for key stakeholders in the building&rsquo;s value chain.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(109, 'Mobile Backhauling', 2, NULL, NULL, NULL, NULL, 'Mobile Backhauling', 'Mobile Backhauling', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin">\r\n	This solution consists of a Carrier-Grade high performance 12, 42 GHz Ultra Wideband Radio&nbsp;technology that delivers high speed and high capacity Point to Multipoint Wireless Backhaul and&nbsp;Fixed Wireless Access. Its performance reaches up to 12 Gbps wireless backhaul throughput&nbsp;from Central Transmission Hub, as well as up to 100 Mbps per Broadband Access Terminal.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin">\r\n	This solution consists of a Carrier-Grade high performance 12, 42 GHz Ultra Wideband Radio&nbsp;technology that delivers high speed and high capacity Point to Multipoint Wireless Backhaul and&nbsp;Fixed Wireless Access. Its performance reaches up to 12 Gbps wireless backhaul throughput&nbsp;from Central Transmission Hub, as well as up to 100 Mbps per Broadband Access Terminal.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(110, 'WAN Optimization', 2, NULL, NULL, NULL, NULL, 'WAN Optimization', 'WAN Optimization', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	This complete WAN optimization solution helps accelerate cloud services and adds a layer of&nbsp;intelligence to ensure that consolidated, virtualized applications, and services are accessed by&nbsp;end-users everywhere. Moreover, this solution removes WAN performance barriers and enables&nbsp;the effective use of cloud services, liberating businesses from common IT constraints.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	This complete WAN optimization solution helps accelerate cloud services and adds a layer of&nbsp;intelligence to ensure that consolidated, virtualized applications, and services are accessed by&nbsp;end-users everywhere. Moreover, this solution removes WAN performance barriers and enables&nbsp;the effective use of cloud services, liberating businesses from common IT constraints.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(111, 'Video Optimization', 2, NULL, NULL, NULL, NULL, 'Video Optimization', 'Video Optimization', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	This solution provides adaptive streaming capabilities that allow optimization across all network&nbsp;conditions in real-time. This helps in the effective utilization of the available bandwidth and&nbsp;the dramatic improvement of the end user experience during times of network congestion.&nbsp;Transcoding and transrating techniques are employed to provide a single point of management&nbsp;for multimedia optimization and delivery in an operator&rsquo;s network.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	This solution provides adaptive streaming capabilities that allow optimization across all network&nbsp;conditions in real-time. This helps in the effective utilization of the available bandwidth and&nbsp;the dramatic improvement of the end user experience during times of network congestion.&nbsp;Transcoding and transrating techniques are employed to provide a single point of management&nbsp;for multimedia optimization and delivery in an operator&rsquo;s network.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(112, '3G Offloading', 2, NULL, NULL, NULL, NULL, '3G Offloading', '3G Offloading', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin">\r\n	This solution is designed to ensure a seamless and secure user experience with reference&nbsp;to data, voice and messaging services. It provides mobile operators with a&nbsp;complete E2E Wi-Fi offload and Wi-Fi roaming setup, including smart-phone&nbsp;client software, access server/gateway technology and billing integration.&nbsp;The solution also provides a suite of integrated functional components to&nbsp;support full authentication capability, including EAP-SIM/AKA/TLS, WiSPr&nbsp;1.0, 1+ and WiSPr 2.0.&nbsp;</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin">\r\n	This solution is designed to ensure a seamless and secure user experience with reference&nbsp;to data, voice and messaging services. It provides mobile operators with a&nbsp;complete E2E Wi-Fi offload and Wi-Fi roaming setup, including smart-phone&nbsp;client software, access server/gateway technology and billing integration.&nbsp;The solution also provides a suite of integrated functional components to&nbsp;support full authentication capability, including EAP-SIM/AKA/TLS, WiSPr&nbsp;1.0, 1+ and WiSPr 2.0.&nbsp;</div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(113, 'Intelligent Power Management', 2, NULL, NULL, NULL, NULL, 'Intelligent Power Management', 'Intelligent Power Management', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin">\r\n	This solution provides flexible, cost-effective hybrid power control systems that&nbsp;monitor and control multiple power sources (such as a generators) by combining them&nbsp;with energy storage systems (such as battery banks). By incorporating these aspects, the&nbsp;solution offers the best in terms of cost-effectiveness, site availability and centralized network&nbsp;management, allowing the power source to be run at its optimum load.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin">\r\n	This solution provides flexible, cost-effective hybrid power control systems that&nbsp;monitor and control multiple power sources (such as a generators) by combining them&nbsp;with energy storage systems (such as battery banks). By incorporating these aspects, the&nbsp;solution offers the best in terms of cost-effectiveness, site availability and centralized network&nbsp;management, allowing the power source to be run at its optimum load.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(114, 'Integrated Security Solutions', 2, NULL, NULL, NULL, NULL, 'Integrated Security Solutions', 'Integrated Security Solutions', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Solutions that offer fully comprehensive &ldquo;in the cloud&rdquo; multi-tenant security services, with&nbsp;policy granularity down to the individual end user level. They eliminate the need to provide,&nbsp;install, and support security software on subscribers&rsquo; devices, with passive and active network&nbsp;monitoring and analysis capabilities.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Solutions that offer fully comprehensive &ldquo;in the cloud&rdquo; multi-tenant security services, with&nbsp;policy granularity down to the individual end user level. They eliminate the need to provide,&nbsp;install, and support security software on subscribers&rsquo; devices, with passive and active network&nbsp;monitoring and analysis capabilities.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(115, 'Intelligent Policy Enforcement', 2, NULL, NULL, NULL, NULL, 'Intelligent Policy Enforcement', 'Intelligent Policy Enforcement', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The Intelligent Policy Enforcement solution&nbsp;enables broadband providers to adapt with&nbsp;agility to changes in user behaviors, as well&nbsp;as developments of new applications. This&nbsp;is achieved by rapidly creating new services&nbsp;and business models to deliver a higher quality&nbsp;of service. These services rely on advanced DPI&nbsp;technology providing industry-leading accuracy, deep&nbsp;visibility into network traffic, as well as control over&nbsp;it. With end-to-end integration into the provider&rsquo;s</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	billing and operational network, in addition to full&nbsp;subscriber topology and service plan awareness, this&nbsp;solution enables the dynamic deployment of policies to manage&nbsp;congestion and quality of user experience.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The Intelligent Policy Enforcement solution&nbsp;enables broadband providers to adapt with&nbsp;agility to changes in user behaviors, as well&nbsp;as developments of new applications. This&nbsp;is achieved by rapidly creating new services&nbsp;and business models to deliver a higher quality&nbsp;of service. These services rely on advanced DPI&nbsp;technology providing industry-leading accuracy, deep&nbsp;visibility into network traffic, as well as control over&nbsp;it. With end-to-end integration into the provider&rsquo;s</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	billing and operational network, in addition to full&nbsp;subscriber topology and service plan awareness, this&nbsp;solution enables the dynamic deployment of policies to manage&nbsp;congestion and quality of user experience.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:38'),
	(116, 'Security Solutions', 2, NULL, NULL, NULL, NULL, 'Security Solutions', 'Security Solutions', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	These solutions enable passive and active network monitoring and analysis.&nbsp;The user(s) can seamlessly intercept complete data from target activity, including&nbsp;real-time target definitions, activation and removal, real-time collection, on-the-fly&nbsp;analysis, non-intrusive operation and full packet capturing. These solutions also create&nbsp;advanced targeting and capture systems that meet the requirements of many national&nbsp;regulatory agencies and an expanding base of potential customers. In addition, they&nbsp;represent a viable legal intercept alternative to customers currently using other products&nbsp;anywhere in the world.&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The features of these solutions include: email targeting via wild-cards or domains, IRC chat&nbsp;username targeting, telnet login name targeting and capture, MGCP targeting, SIP-based&nbsp;instant messenger targeting, HTTP URL targeting, keyword targeting, targeting based on&nbsp;usage thresholds, multiple administrative users, case archiving, case unarchiving, and&nbsp;case purging.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	These solutions enable passive and active network monitoring and analysis.&nbsp;The user(s) can seamlessly intercept complete data from target activity, including&nbsp;real-time target definitions, activation and removal, real-time collection, on-the-fly&nbsp;analysis, non-intrusive operation and full packet capturing. These solutions also create&nbsp;advanced targeting and capture systems that meet the requirements of many national&nbsp;regulatory agencies and an expanding base of potential customers. In addition, they&nbsp;represent a viable legal intercept alternative to customers currently using other products&nbsp;anywhere in the world.&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The features of these solutions include: email targeting via wild-cards or domains, IRC chat&nbsp;username targeting, telnet login name targeting and capture, MGCP targeting, SIP-based&nbsp;instant messenger targeting, HTTP URL targeting, keyword targeting, targeting based on&nbsp;usage thresholds, multiple administrative users, case archiving, case unarchiving, and&nbsp;case purging.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(117, 'Mobile Network Optimization', 2, NULL, NULL, NULL, NULL, 'Mobile Network Optimization', 'Mobile Network Optimization', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Our solution provides end-to-end optimization features for mobile operators with intensive drilldown&nbsp;and root cause analysis functions in order to help engineers optimize the efficiency&nbsp;of their daily tasks. This enables operators to master network challenges profitably&nbsp;while enhancing the end-users&rsquo; experience.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Our solution provides end-to-end optimization features for mobile operators with intensive drilldown&nbsp;and root cause analysis functions in order to help engineers optimize the efficiency&nbsp;of their daily tasks. This enables operators to master network challenges profitably&nbsp;while enhancing the end-users&rsquo; experience.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>', 1, 0, 1, '2013-03-18 10:12:39'),
	(118, 'Conversion & Aggregation and Load Balancing Layer (Data Access)', 2, NULL, NULL, NULL, NULL, 'Conversion & Aggregation and Load Balancing Layer (Data Access)', 'Conversion & Aggregation and Load Balancing Layer (Data Access)', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The Data Access Layer supports a heterogeneous&nbsp;environment through access and output stages.&nbsp;During the access stage, the data access layer&nbsp;functions as traffic capturing and filtering (over legacy links&nbsp;environment). During the output stage, it functions as traffic&nbsp;distributing.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The solution supports passive and in-line deployment, blind&nbsp;capturing, and diverse interfaces, including 155M/622M/2.5G/10G/40G&nbsp;POS, FE/GE/10GE. The solution also supports cross-sites asymmetric&nbsp;traffic converging, and provides flexible packet classification, filtering, and&nbsp;distribution. In addition, the solution supports out-of band passive monitoring;&nbsp;any data to any tool; and unobtrusive 24/7 tool connections.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The Data Access Layer supports a heterogeneous&nbsp;environment through access and output stages.&nbsp;During the access stage, the data access layer&nbsp;functions as traffic capturing and filtering (over legacy links&nbsp;environment). During the output stage, it functions as traffic&nbsp;distributing.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The solution supports passive and in-line deployment, blind&nbsp;capturing, and diverse interfaces, including 155M/622M/2.5G/10G/40G&nbsp;POS, FE/GE/10GE. The solution also supports cross-sites asymmetric&nbsp;traffic converging, and provides flexible packet classification, filtering, and&nbsp;distribution. In addition, the solution supports out-of band passive monitoring;&nbsp;any data to any tool; and unobtrusive 24/7 tool connections.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(119, 'Anomaly Detection Secure Suite', 2, NULL, NULL, NULL, NULL, 'Anomaly Detection Secure Suite', 'Anomaly Detection Secure Suite', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Sophisticated attacks, common within today&rsquo;s networks, are often missed by traditional&nbsp;security systems such as intrusion prevention/detection systems (IPS/IDS systems) and&nbsp;firewalls. We employ the industry&rsquo;s most powerful carrier-class security solution, designed to&nbsp;detect even the most sophisticated attacks within the world&rsquo;s most complex networks. It uses&nbsp;advanced algorithms and massive data collection and correlation to detect attacks faster and</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	more accurately than any other network security solution available.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The solution is designed to protect the network core &ndash; the backbone of the internet &ndash; from a&nbsp;variety of anomalies, including distributed denial of service attacks (DDoS), worms, spam, port&nbsp;scans, route hijacking, etc.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Sophisticated attacks, common within today&rsquo;s networks, are often missed by traditional&nbsp;security systems such as intrusion prevention/detection systems (IPS/IDS systems) and&nbsp;firewalls. We employ the industry&rsquo;s most powerful carrier-class security solution, designed to&nbsp;detect even the most sophisticated attacks within the world&rsquo;s most complex networks. It uses&nbsp;advanced algorithms and massive data collection and correlation to detect attacks faster and</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	more accurately than any other network security solution available.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The solution is designed to protect the network core &ndash; the backbone of the internet &ndash; from a&nbsp;variety of anomalies, including distributed denial of service attacks (DDoS), worms, spam, port&nbsp;scans, route hijacking, etc.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(120, 'Internet Content Filtering', 2, NULL, NULL, NULL, NULL, 'Internet Content Filtering', 'Internet Content Filtering', NULL, NULL, 'Telecom Solution', 'Telecom Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	With a real-time content categorization engine and rich web-based system administration tools,&nbsp;this solution ensures Intelligent Web Filtering both on and off the network. By employing a unified&nbsp;Data Access and Aggregation Layer to passively monitor the entire international gateway traffic&nbsp;(nationwide), the solution allows for the precedence of a unified Country Policy Management&nbsp;over Heterogeneous Architecture (different types of links, different ISPs).</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The solution attains responsive and comprehensive filtering by relying on a unique architecture.&nbsp;Given that the internet consists of a constantly changing matrix of websites and services, this&nbsp;type of architecture provides effective and flexible services-over-IP filtering through a series of&nbsp;internet-connected servers that access large URL databases.&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	By intercepting and categorizing outgoing requests (protocol request or HTTP request), the&nbsp;solution is able to determine whether to allow or deny the connection. It also maintains a local&nbsp;cache of recently requested URLs.The categorization engine reviews the&nbsp;webpage content&nbsp;upon receipt of a request and, within milliseconds, assigns it a category.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	With a real-time content categorization engine and rich web-based system administration tools,&nbsp;this solution ensures Intelligent Web Filtering both on and off the network. By employing a unified&nbsp;Data Access and Aggregation Layer to passively monitor the entire international gateway traffic&nbsp;(nationwide), the solution allows for the precedence of a unified Country Policy Management&nbsp;over Heterogeneous Architecture (different types of links, different ISPs).</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The solution attains responsive and comprehensive filtering by relying on a unique architecture.&nbsp;Given that the internet consists of a constantly changing matrix of websites and services, this&nbsp;type of architecture provides effective and flexible services-over-IP filtering through a series of&nbsp;internet-connected servers that access large URL databases.&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	By intercepting and categorizing outgoing requests (protocol request or HTTP request), the&nbsp;solution is able to determine whether to allow or deny the connection. It also maintains a local&nbsp;cache of recently requested URLs.The categorization engine reviews the&nbsp;webpage content&nbsp;upon receipt of a request and, within milliseconds, assigns it a category.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(121, 'Distributed Control Systems (DCS)', 2, NULL, NULL, NULL, NULL, 'Distributed Control Systems (DCS)', 'Distributed Control Systems (DCS)', NULL, NULL, 'Power Solution', 'Power Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Our Distributed Control Systems (DCS) equipped with state of the art technologies and user-friendly&nbsp;interfaces aid plant operators in managing industrial process through the control of all&nbsp;physical variables, while connected to advanced monitoring platforms.&nbsp;Our extensive experience in DCS engineering has enabled us to specialize in developing and&nbsp;applying control technology to various power plant areas. These areas include: Boiler, Balance&nbsp;of Plant (BOP) and other subsystems like Turbine Supervisory Instrument (TSI), and Continuous&nbsp;Emissions Monitoring System (CEMS).</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Giza Systems is currently employing the latest cutting-edge DCS technology. Our team&rsquo;s in-depth&nbsp;knowledge of power processes covers a complete service spectrum including project&nbsp;management, procurement, engineering, panel building, FAT, training, commissioning, start- up,&nbsp;and fine-tuning to optimize power plant operations.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Our Distributed Control Systems (DCS) equipped with state of the art technologies and user-friendly&nbsp;interfaces aid plant operators in managing industrial process through the control of all&nbsp;physical variables, while connected to advanced monitoring platforms.&nbsp;Our extensive experience in DCS engineering has enabled us to specialize in developing and&nbsp;applying control technology to various power plant areas. These areas include: Boiler, Balance&nbsp;of Plant (BOP) and other subsystems like Turbine Supervisory Instrument (TSI), and Continuous&nbsp;Emissions Monitoring System (CEMS).</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Giza Systems is currently employing the latest cutting-edge DCS technology. Our team&rsquo;s in-depth&nbsp;knowledge of power processes covers a complete service spectrum including project&nbsp;management, procurement, engineering, panel building, FAT, training, commissioning, start- up,&nbsp;and fine-tuning to optimize power plant operations.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(122, 'Field Instruments', 2, NULL, NULL, NULL, NULL, 'Field Instruments', 'Field Instruments', NULL, NULL, NULL, NULL, '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Field instruments are essential for measuring the different&nbsp;parameters on-site in order to ensure accurate monitoring and&nbsp;control. Reporting to the central control room, these solutions&nbsp;include the installation of field instruments, transmitters, and&nbsp;sensors, as well as liquid and gas analyzers, control valves and&nbsp;actuators. The aim is to monitor and measure all ongoing plant&nbsp;processes so that the information can be transmitted to the&nbsp;control center.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Our instrumentation teams are experts in programming and&nbsp;installing testing instruments, as well as integrating them with&nbsp;new and existing automation systems installed to enhance&nbsp;process solutions. To offer the best and most suitable solutions&nbsp;to meet the needs of our clients, Giza Systems has partnered</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	with a broad range of leading companies specialized in field&nbsp;instruments.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Field instruments are essential for measuring the different&nbsp;parameters on-site in order to ensure accurate monitoring and&nbsp;control. Reporting to the central control room, these solutions&nbsp;include the installation of field instruments, transmitters, and&nbsp;sensors, as well as liquid and gas analyzers, control valves and&nbsp;actuators. The aim is to monitor and measure all ongoing plant&nbsp;processes so that the information can be transmitted to the&nbsp;control center.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Our instrumentation teams are experts in programming and&nbsp;installing testing instruments, as well as integrating them with&nbsp;new and existing automation systems installed to enhance&nbsp;process solutions. To offer the best and most suitable solutions&nbsp;to meet the needs of our clients, Giza Systems has partnered</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	with a broad range of leading companies specialized in field&nbsp;instruments.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(123, 'Environmental Solutions', 2, NULL, NULL, NULL, NULL, 'Environmental Solutions', 'Environmental Solutions', NULL, NULL, 'Power Solution', 'Power Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Environmental analysis is the use of analytical chemistry and other techniques to&nbsp;study the environment. The purpose of this is to monitor and study levels of pollutant&nbsp;gases such as SO2, CO and NOx in the atmosphere, rivers and other specific settings.&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	To measure the impact of the power plant emissions on the surrounding environment,&nbsp;a number of measuring analyzers are arranged onto a panel and placed in a&nbsp;protected location in the power plant. This analysis is performed both before and&nbsp;after the operation of the power plant. It is usually carried out within a time frame of&nbsp;six months.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	We rely on high end analyzers in handling all the required tasks for such projects,including systems integration, maintenance and engineering. Sophisticated pollution&nbsp;monitoring systems are delivered to the customers to maintain a cleaner, safer and&nbsp;healthier environment.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Environmental analysis is the use of analytical chemistry and other techniques to&nbsp;study the environment. The purpose of this is to monitor and study levels of pollutant&nbsp;gases such as SO2, CO and NOx in the atmosphere, rivers and other specific settings.&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	To measure the impact of the power plant emissions on the surrounding environment,&nbsp;a number of measuring analyzers are arranged onto a panel and placed in a&nbsp;protected location in the power plant. This analysis is performed both before and&nbsp;after the operation of the power plant. It is usually carried out within a time frame of&nbsp;six months.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	We rely on high end analyzers in handling all the required tasks for such projects,including systems integration, maintenance and engineering. Sophisticated pollution&nbsp;monitoring systems are delivered to the customers to maintain a cleaner, safer and&nbsp;healthier environment.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(124, 'Programmable Logic Controller (PLC)', 2, NULL, NULL, NULL, NULL, 'Programmable Logic Controller (PLC)', 'Programmable Logic Controller (PLC)', NULL, NULL, 'Power Solution', 'Power Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Programmable Logic Controller (PLC) technology is generally employed for some applications, which are necessary&nbsp;in many areas of the power plants, such as water treatment for thermal power plants&nbsp;and Burner Management System (BMS). It controls and monitors specific areas in&nbsp;the process and transfers the collected information and actions to the Balance of&nbsp;Plant (BOP) DCS. Our programming varies based on the requirements needed for&nbsp;the application, testing, commissioning, and start-up. We also offer a wide range of&nbsp;services for already installed systems in power plants.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Programmable Logic Controller (PLC) technology is generally employed for some applications, which are necessary&nbsp;in many areas of the power plants, such as water treatment for thermal power plants&nbsp;and Burner Management System (BMS). It controls and monitors specific areas in&nbsp;the process and transfers the collected information and actions to the Balance of&nbsp;Plant (BOP) DCS. Our programming varies based on the requirements needed for&nbsp;the application, testing, commissioning, and start-up. We also offer a wide range of&nbsp;services for already installed systems in power plants.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(125, 'Turbine Control & Supervision System', 2, NULL, NULL, NULL, NULL, 'Turbine Control & Supervision System', 'Turbine Control & Supervision System', NULL, NULL, 'Power Solution', 'Power Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	A turbine consists of a rotary engine that&nbsp;extracts energy from a fluid flow and converts&nbsp;it into useful output. The operation is critical&nbsp;as it requires a very high speed control&nbsp;system able to fulfill the safety and availability&nbsp;aspects in the plant.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Giza Systems provides efficient digital turbine&nbsp;control solutions for gas and steam turbines&nbsp;capable of controlling the turbine process&nbsp;in terms of speed, temperature, power, and&nbsp;safeguarding measures. In addition to our&nbsp;control solutions for the turbine process,&nbsp;our expertise extends to turbine supervision</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	instrumentation systems that supervise and&nbsp;monitor the turbine speed, vibration, and&nbsp;displacement.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	A turbine consists of a rotary engine that&nbsp;extracts energy from a fluid flow and converts&nbsp;it into useful output. The operation is critical&nbsp;as it requires a very high speed control&nbsp;system able to fulfill the safety and availability&nbsp;aspects in the plant.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Giza Systems provides efficient digital turbine&nbsp;control solutions for gas and steam turbines&nbsp;capable of controlling the turbine process&nbsp;in terms of speed, temperature, power, and&nbsp;safeguarding measures. In addition to our&nbsp;control solutions for the turbine process,&nbsp;our expertise extends to turbine supervision</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	instrumentation systems that supervise and&nbsp;monitor the turbine speed, vibration, and&nbsp;displacement.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(126, 'Combustion and Burner Management Systems (BMS)', 2, NULL, NULL, NULL, NULL, 'Combustion and Burner Management Systems (BMS)', 'Combustion and Burner Management Systems (BMS)', NULL, NULL, 'Power Solution', 'Power Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin">\r\n	The process of combustion or burning is the underlying operation in the conversion of chemical&nbsp;energy into heat, which in turn is used to produce electrical energy by relying on steam turbines&nbsp;and generators.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Giza Systems has a unique positioning in the combustion business line, as we&nbsp;offer end-to-end solutions including both mechanical (Burners, Flame Scanners, Igniters, etc.)&nbsp;and control (Burner Management System) systems.&nbsp;By providing our customers with diversified products, such as a wide range of Low NOx Burners&nbsp;and Burner Management Systems that rely on PLC- SIL3, we are able to cover the whole arena,&nbsp;including ignition systems and flame monitoring systems.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	Our teams carefully select the&nbsp;optimal solution based on the&nbsp;application and integration aspects&nbsp;of the required equipment&nbsp;to ensure compatibility with the&nbsp;already installed equipment. By&nbsp;capitalizing on our know-how&nbsp;and our track record in combustion&nbsp;and control design, we are&nbsp;able to provide solutions and enhance&nbsp;operational efficiencies to&nbsp;meet the power industry needs.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin">\r\n	The process of combustion or burning is the underlying operation in the conversion of chemical&nbsp;energy into heat, which in turn is used to produce electrical energy by relying on steam turbines&nbsp;and generators.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div>\r\n	Giza Systems has a unique positioning in the combustion business line, as we&nbsp;offer end-to-end solutions including both mechanical (Burners, Flame Scanners, Igniters, etc.)&nbsp;and control (Burner Management System) systems.&nbsp;By providing our customers with diversified products, such as a wide range of Low NOx Burners&nbsp;and Burner Management Systems that rely on PLC- SIL3, we are able to cover the whole arena,&nbsp;including ignition systems and flame monitoring systems.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div id="cke_pastebin">\r\n	Our teams carefully select the&nbsp;optimal solution based on the&nbsp;application and integration aspects&nbsp;of the required equipment&nbsp;to ensure compatibility with the&nbsp;already installed equipment. By&nbsp;capitalizing on our know-how&nbsp;and our track record in combustion&nbsp;and control design, we are&nbsp;able to provide solutions and enhance&nbsp;operational efficiencies to&nbsp;meet the power industry needs.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(127, 'Enterprise Asset Management (EAM)', 2, NULL, NULL, NULL, NULL, 'Enterprise Asset Management (EAM)', 'Enterprise Asset Management (EAM)', NULL, NULL, 'Power Solution', 'Power Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Utilities deliver electricity to their consumers through a large number of network assets that are&nbsp;geographically dispersed. With the wide spread of assets, the key challenge for the power sector&nbsp;is to locate, track, and maintain their network assets in a timely manner so that quality and&nbsp;reliable energy supply is achieved.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	Our Enterprise Asset Management solution allows utilities to&nbsp;define and track all of their assets, including stationary, mobile, and dispersed assets, as well</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	as establish preventive, predictive and condition-based push maintenance programs to extend&nbsp;asset life and improve reliability.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	EAM manages all aspects of the asset portfolio, including tracking its history, creating detailed&nbsp;bills of materials, managing all work-order planning and scheduling, as well as deploying the&nbsp;service workforce.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Utilities deliver electricity to their consumers through a large number of network assets that are&nbsp;geographically dispersed. With the wide spread of assets, the key challenge for the power sector&nbsp;is to locate, track, and maintain their network assets in a timely manner so that quality and&nbsp;reliable energy supply is achieved.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	Our Enterprise Asset Management solution allows utilities to&nbsp;define and track all of their assets, including stationary, mobile, and dispersed assets, as well</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	as establish preventive, predictive and condition-based push maintenance programs to extend&nbsp;asset life and improve reliability.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	EAM manages all aspects of the asset portfolio, including tracking its history, creating detailed&nbsp;bills of materials, managing all work-order planning and scheduling, as well as deploying the&nbsp;service workforce.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(128, 'Energy Management Solutions (EMS)', 2, NULL, NULL, NULL, NULL, 'Energy Management Solutions (EMS)', 'Energy Management Solutions (EMS)', NULL, NULL, 'Power Transmission Solution', 'Power Transmission Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	SCADA is utilized to monitor and control all substations, as well as entire high voltage networks.&nbsp;Regional Control Centers or the National Control Center are built and equipped with EMS to&nbsp;manage national electricity grids.&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Giza Systems has the capabilities and in-depth knowledge to fulfill EMS needs based on our&nbsp;core understanding of the significance of operational efficiency and integrity, as well as the necessary&nbsp;reliability measures, for the implementation of such projects.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	SCADA is utilized to monitor and control all substations, as well as entire high voltage networks.&nbsp;Regional Control Centers or the National Control Center are built and equipped with EMS to&nbsp;manage national electricity grids.&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Giza Systems has the capabilities and in-depth knowledge to fulfill EMS needs based on our&nbsp;core understanding of the significance of operational efficiency and integrity, as well as the necessary&nbsp;reliability measures, for the implementation of such projects.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(129, 'Wireless Communication Solutions', 2, NULL, NULL, NULL, NULL, 'Wireless Communication Solutions', 'Wireless Communication Solutions', NULL, NULL, 'Power Transmission Solution', 'Power Transmission Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	These types of solutions include Microwave, Radio solutions,&nbsp;as well as WiMax and GPRS. They are employed as wireless&nbsp;media in order to provide and relay control and&nbsp;monitoring information to control centers.&nbsp;In addition to the tremendous relevance of Radio&nbsp;for the operation and maintenance of crews, these&nbsp;solutions become essential for the power industry.&nbsp;When confronted with rough terrain, such as mountain-like areas, wireless communication solutions&nbsp;are the main resort due to the difficulty level of</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	cabling.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Our competitive advantage in fulfilling the&nbsp;dual functions of IT-based &amp; engineering&nbsp;services geared towards the Utilities&nbsp;and Telecom industries enable</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	power providers to benefit from our&nbsp;competence and our experience in&nbsp;vertical integration. We enable utilities&nbsp;to meet their needs by providing&nbsp;them with the most advanced,&nbsp;cutting-edge solutions.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	These types of solutions include Microwave, Radio solutions,&nbsp;as well as WiMax and GPRS. They are employed as wireless&nbsp;media in order to provide and relay control and&nbsp;monitoring information to control centers.&nbsp;In addition to the tremendous relevance of Radio&nbsp;for the operation and maintenance of crews, these&nbsp;solutions become essential for the power industry.&nbsp;When confronted with rough terrain, such as mountain-like areas, wireless communication solutions&nbsp;are the main resort due to the difficulty level of</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	cabling.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Our competitive advantage in fulfilling the&nbsp;dual functions of IT-based &amp; engineering&nbsp;services geared towards the Utilities&nbsp;and Telecom industries enable</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	power providers to benefit from our&nbsp;competence and our experience in&nbsp;vertical integration. We enable utilities&nbsp;to meet their needs by providing&nbsp;them with the most advanced,&nbsp;cutting-edge solutions.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(130, 'Optical Fiber Networks & Teleprotection Networks', 2, NULL, NULL, NULL, NULL, 'Optical Fiber Networks & Teleprotection Networks', 'Optical Fiber Networks & Teleprotection Networks', NULL, NULL, NULL, NULL, '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Whether it is working with Optical Power Ground Wire (OPGW) or Optical Underground Wire&nbsp;(OPUG) Fiber Networks, Giza Systems is an expert in achieving Line Terminal and Multiplexing&nbsp;capabilities by applying PDH/SDH.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Teleprotection networks entail the transmission of substation protection signals, through either&nbsp;SDH/OPGW or DPLC networks, to ensure that both regional and central control centers can&nbsp;operate and maintain remote substations within their transmission network. For the creation of&nbsp;optical fiber and teleprotection networks, Giza Systems deploys a number of solutions to ensure&nbsp;that operational efficiencies are achieved and remote operations for transmission networks are&nbsp;streamlined.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Whether it is working with Optical Power Ground Wire (OPGW) or Optical Underground Wire&nbsp;(OPUG) Fiber Networks, Giza Systems is an expert in achieving Line Terminal and Multiplexing&nbsp;capabilities by applying PDH/SDH.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Teleprotection networks entail the transmission of substation protection signals, through either&nbsp;SDH/OPGW or DPLC networks, to ensure that both regional and central control centers can&nbsp;operate and maintain remote substations within their transmission network. For the creation of&nbsp;optical fiber and teleprotection networks, Giza Systems deploys a number of solutions to ensure&nbsp;that operational efficiencies are achieved and remote operations for transmission networks are&nbsp;streamlined.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(131, 'Substation Automation', 2, NULL, NULL, NULL, NULL, 'Substation Automation', 'Substation Automation', NULL, NULL, 'Power Transmission Solution', 'Power Transmission Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Control, monitoring, and relay are the key factors in the process of substation automation projects.&nbsp;Substation automation involves the reliance on control systems for the control and monitoring&nbsp;of feeders and switch gear transformers. By having this process set in place, the control&nbsp;systems are able to connect the substation bay control units with the regional control center&nbsp;through gateways.&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Substation automation systems supersede the conventional control and traditional RTUs in&nbsp;the AIS and GIS substations due to their ease of maintenance, reduction of project cost and&nbsp;time, high communication capabilities with several control layers (Local, RCC, NCC), as well as&nbsp;integration with the protection relays for monitoring and relay setting purposes.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	Our successful&nbsp;implementation of substation automation projects has enabled us to ensure the design and&nbsp;delivery of the most efficient solutions for new and/or already existing power infrastructures and&nbsp;platforms.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Control, monitoring, and relay are the key factors in the process of substation automation projects.&nbsp;Substation automation involves the reliance on control systems for the control and monitoring&nbsp;of feeders and switch gear transformers. By having this process set in place, the control&nbsp;systems are able to connect the substation bay control units with the regional control center&nbsp;through gateways.&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Substation automation systems supersede the conventional control and traditional RTUs in&nbsp;the AIS and GIS substations due to their ease of maintenance, reduction of project cost and&nbsp;time, high communication capabilities with several control layers (Local, RCC, NCC), as well as&nbsp;integration with the protection relays for monitoring and relay setting purposes.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	Our successful&nbsp;implementation of substation automation projects has enabled us to ensure the design and&nbsp;delivery of the most efficient solutions for new and/or already existing power infrastructures and&nbsp;platforms.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(132, 'Analog/Digital Power Line Carrier Systems', 2, NULL, NULL, NULL, NULL, 'Analog/Digital Power Line Carrier Systems', 'Analog/Digital Power Line Carrier Systems', NULL, NULL, 'Power Transmission Solution', 'Power Transmission Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Analog/Digital Power Line Carrier System utilizes the existing OHTL conductors as a transmission&nbsp;medium (50-60Hz electrical line frequency) to act as a carrier signal. This type of system&nbsp;includes outdoor telecom equipment such as coupling capacitors, line traps, line matching&nbsp;units, and coaxial cables.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	This solution is crucial for transmitting data, voice, and teleprotection&nbsp;signals. To deliver only the highest quality to our clients, Giza Systems collaborates with strategic&nbsp;partners to provide both indoor and outdoor equipment for the execution of power industry&nbsp;projects</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Analog/Digital Power Line Carrier System utilizes the existing OHTL conductors as a transmission&nbsp;medium (50-60Hz electrical line frequency) to act as a carrier signal. This type of system&nbsp;includes outdoor telecom equipment such as coupling capacitors, line traps, line matching&nbsp;units, and coaxial cables.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	This solution is crucial for transmitting data, voice, and teleprotection&nbsp;signals. To deliver only the highest quality to our clients, Giza Systems collaborates with strategic&nbsp;partners to provide both indoor and outdoor equipment for the execution of power industry&nbsp;projects</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(133, 'Optical Power Ground Wire (OPGW)', 2, NULL, NULL, NULL, NULL, 'Optical Power Ground Wire (OPGW)', 'Optical Power Ground Wire (OPGW)', NULL, NULL, 'Power Transmission Solution', 'Power Transmission Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The distinctiveness of this solution is its functionality and applicability for both grounding the&nbsp;OHTL, as well as providing the optical wide band transmission medium, to serve and cater to&nbsp;electricity control centers.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Giza Systems has capitalized on its technical know-how and its employment of the latest cutting-edge solutions to meet with agility the needs of the power industry. Having executed a&nbsp;number of projects on turnkey basis including work for the EETC transmission network, Giza&nbsp;Systems has extended OPGW for over 1500 Km, positioning it as a leading systems integrator&nbsp;in the power industry.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The distinctiveness of this solution is its functionality and applicability for both grounding the&nbsp;OHTL, as well as providing the optical wide band transmission medium, to serve and cater to&nbsp;electricity control centers.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Giza Systems has capitalized on its technical know-how and its employment of the latest cutting-edge solutions to meet with agility the needs of the power industry. Having executed a&nbsp;number of projects on turnkey basis including work for the EETC transmission network, Giza&nbsp;Systems has extended OPGW for over 1500 Km, positioning it as a leading systems integrator&nbsp;in the power industry.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(134, 'Distribution Management Solutions (DMS)', 2, NULL, NULL, NULL, NULL, 'Distribution Management Solutions (DMS)', 'Distribution Management Solutions (DMS)', NULL, NULL, 'Power Distribution Solution', 'Power Distribution Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	SCADA is utilized to monitor all substations and distribution points, as well as the whole medium&nbsp;and low voltage network. Distribution Control Centers are built and equipped with DMS to&nbsp;manage electricity grids. By deploying our DMS solutions, higher efficiency in management and&nbsp;control is attained to ensure the safety and reliability of the electricity grids.&nbsp;</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	SCADA is utilized to monitor all substations and distribution points, as well as the whole medium&nbsp;and low voltage network. Distribution Control Centers are built and equipped with DMS to&nbsp;manage electricity grids. By deploying our DMS solutions, higher efficiency in management and&nbsp;control is attained to ensure the safety and reliability of the electricity grids.&nbsp;</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(135, 'Customer Relationship Management (CRM) and Billing', 2, NULL, NULL, NULL, NULL, 'Customer Relationship Management (CRM) and Billing', 'Customer Relationship Management (CRM) and Billing', NULL, NULL, 'Power Distribution Solution', 'Power Distribution Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin">\r\n	<div id="cke_pastebin" style="text-align: justify; ">\r\n		Customer Relationship Management&nbsp;(CRM) and Billing&nbsp;systems orchestrate and manage the meter-to-cash process. Our solutions&nbsp;allow utilities to differentiate themselves on the grounds of customer service, accurate billing,&nbsp;and efficient collections activities. Management of customer applications, meter work orders&nbsp;and installation activities, regular meter reading, readings validations and estimations, billing,&nbsp;payments and aging of debts constitute the high level mandates of billing and revenue management&nbsp;systems.</div>\r\n</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin">\r\n	<div id="cke_pastebin" style="text-align: justify; ">\r\n		Customer Relationship Management&nbsp;(CRM) and Billing&nbsp;systems orchestrate and manage the meter-to-cash process. Our solutions&nbsp;allow utilities to differentiate themselves on the grounds of customer service, accurate billing,&nbsp;and efficient collections activities. Management of customer applications, meter work orders&nbsp;and installation activities, regular meter reading, readings validations and estimations, billing,&nbsp;payments and aging of debts constitute the high level mandates of billing and revenue management&nbsp;systems.</div>\r\n</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(136, 'Fiber to the Home (FTTH)', 2, NULL, NULL, NULL, NULL, 'Fiber to the Home (FTTH)', 'Fiber to the Home (FTTH)', NULL, NULL, 'Power Distribution Solution', 'Power Distribution Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The Fiber to the Home (FTTH)&nbsp;&nbsp;solution consists of an optical fiber passive network that replaces the standard&nbsp;copper wires of the local telcos. It is used as a transmission medium that complements the&nbsp;active network. FTTH is an attractive solution due to its ability to carry high-speed broadband&nbsp;services integrating voice, data, and video signals, in addition to directly running to the junction&nbsp;box at the home or building. For this reason, this solution is also known as Fiber to the Building,&nbsp;or FTTB. Based on our expertise in the different verticals and in-depth know-how, we have the&nbsp;capabilities to achieve the highest efficiency in fulfilling the needs of our clients and executing&nbsp;our projects.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The Fiber to the Home (FTTH)&nbsp;&nbsp;solution consists of an optical fiber passive network that replaces the standard&nbsp;copper wires of the local telcos. It is used as a transmission medium that complements the&nbsp;active network. FTTH is an attractive solution due to its ability to carry high-speed broadband&nbsp;services integrating voice, data, and video signals, in addition to directly running to the junction&nbsp;box at the home or building. For this reason, this solution is also known as Fiber to the Building,&nbsp;or FTTB. Based on our expertise in the different verticals and in-depth know-how, we have the&nbsp;capabilities to achieve the highest efficiency in fulfilling the needs of our clients and executing&nbsp;our projects.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(137, 'Geographical Information Systems (GIS)', 2, NULL, NULL, NULL, NULL, 'Geographical Information Systems (GIS)', 'Geographical Information Systems (GIS)', NULL, NULL, 'Power Distribution Solution', 'Power Distribution Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Geographical Information Systems are capable of capturing both spatial and non-spatial information&nbsp;of the network assets, thus solving the problems relating to selecting the best locations&nbsp;for laying new pipes/lines, optimizing travel routes of the field crew for efficient operations, and&nbsp;visualizing volumes of data with respect to the location of corresponding assets on field. These&nbsp;solutions keep track of the network and update information of transformers, switch gears,&nbsp;cables, etc. They are also used to design and plan future network expansions. To ensure that&nbsp;power providers achieve operational and business efficiency, our GIS solution will ensure high&nbsp;quality and reliable information to assist in better operational and business decision making.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Geographical Information Systems are capable of capturing both spatial and non-spatial information&nbsp;of the network assets, thus solving the problems relating to selecting the best locations&nbsp;for laying new pipes/lines, optimizing travel routes of the field crew for efficient operations, and&nbsp;visualizing volumes of data with respect to the location of corresponding assets on field. These&nbsp;solutions keep track of the network and update information of transformers, switch gears,&nbsp;cables, etc. They are also used to design and plan future network expansions. To ensure that&nbsp;power providers achieve operational and business efficiency, our GIS solution will ensure high&nbsp;quality and reliable information to assist in better operational and business decision making.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(138, 'Metering', 2, NULL, NULL, NULL, NULL, 'Metering', 'Metering', NULL, NULL, 'Power Distribution Solution', 'Power Distribution Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Meter Data Management System (MDMS) is the core system for successful smart metering&nbsp;programs. MDMS supports all aspects of smart meter deployment including rollout support,&nbsp;validation, analysis, balance reports, settlement, and preparation of data for billing. It decouples&nbsp;the handling of meter data from other mission-critical utility operations.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	As utilities increasingly&nbsp;move toward interval billing, MDMS permits all applications to receive the metering information&nbsp;they need in the format that suits their unique requirements.&nbsp;Many utilities struggle today to reconcile their traditional organizational structures with the prospects&nbsp;and possibilities of smart metering. On the one hand, the organization&rsquo;s metering division&nbsp;is adept in measuring consumption, but relies on a manual process consisting of one-at-a-time&nbsp;readings. On the other hand, their IT division understands data and meter management; however,&nbsp;has not needed to handle communications to millions of consumer devices.&nbsp;Our expertise and technological know-how in communication networks and IT systems, as well&nbsp;as our experience with utilities and meter manufacturers, enables us to fully assist internal teams&nbsp;to effectively engage with the new smart metering reality.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Meter Data Management System (MDMS) is the core system for successful smart metering&nbsp;programs. MDMS supports all aspects of smart meter deployment including rollout support,&nbsp;validation, analysis, balance reports, settlement, and preparation of data for billing. It decouples&nbsp;the handling of meter data from other mission-critical utility operations.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	As utilities increasingly&nbsp;move toward interval billing, MDMS permits all applications to receive the metering information&nbsp;they need in the format that suits their unique requirements.&nbsp;Many utilities struggle today to reconcile their traditional organizational structures with the prospects&nbsp;and possibilities of smart metering. On the one hand, the organization&rsquo;s metering division&nbsp;is adept in measuring consumption, but relies on a manual process consisting of one-at-a-time&nbsp;readings. On the other hand, their IT division understands data and meter management; however,&nbsp;has not needed to handle communications to millions of consumer devices.&nbsp;Our expertise and technological know-how in communication networks and IT systems, as well&nbsp;as our experience with utilities and meter manufacturers, enables us to fully assist internal teams&nbsp;to effectively engage with the new smart metering reality.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(139, 'Field Force Management / Mobile Workforce Management Systems (MWMS)', 2, NULL, NULL, NULL, NULL, 'Field Force Management / Mobile Workforce Management Systems (MWMS)', 'Field Force Management / Mobile Workforce Management Systems (MWMS)', NULL, NULL, 'Power Distribution Solution', 'Power Distribution Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Day-to-day maintenance, repairs of existing assets&nbsp;and installation of new equipment are carried out by&nbsp;utility staff. These mobile personnel who manage&nbsp;the assets dispersed across vast areas are generally&nbsp;referred to as the &lsquo;Field Force.&rsquo; &nbsp;The IT system&nbsp;that helps utilities to schedule and dispatch work&nbsp;orders to such engineers is known as the Mobile&nbsp;Workforce Management System (MWMS).</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Our MWMS optimizes and automates processes&nbsp;and information needed by companies that sends&nbsp;engineers to the field. Moreover, it assists utilities</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	in the following:</div>\r\n<ul>\r\n	<li>\r\n		Routing, dispatch tracking, and reporting&nbsp;the status of utility field personnel</li>\r\n	<li>\r\n		Managing installations, service or repairs&nbsp;of equipment and meter reading</li>\r\n	<li>\r\n		Carrying out planned maintenance, unplanned maintenance and resolving service&nbsp;outages</li>\r\n</ul>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Day-to-day maintenance, repairs of existing assets&nbsp;and installation of new equipment are carried out by&nbsp;utility staff. These mobile personnel who manage&nbsp;the assets dispersed across vast areas are generally&nbsp;referred to as the &lsquo;Field Force.&rsquo; &nbsp;The IT system&nbsp;that helps utilities to schedule and dispatch work&nbsp;orders to such engineers is known as the Mobile&nbsp;Workforce Management System (MWMS).</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Our MWMS optimizes and automates processes&nbsp;and information needed by companies that sends&nbsp;engineers to the field. Moreover, it assists utilities</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	in the following:</div>\r\n<ul>\r\n	<li>\r\n		Routing, dispatch tracking, and reporting&nbsp;the status of utility field personnel</li>\r\n	<li>\r\n		Managing installations, service or repairs&nbsp;of equipment and meter reading</li>\r\n	<li>\r\n		Carrying out planned maintenance, unplanned maintenance and resolving service&nbsp;outages</li>\r\n</ul>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(140, 'Knowledge Management', 2, NULL, NULL, NULL, NULL, 'Knowledge Management', 'Knowledge Management', NULL, NULL, 'Power Distribution Solution', 'Power Distribution Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Knowledge management efforts focus on organizational objectives such as improved performance,&nbsp;customer satisfaction, quality of service, cash flow, and other performance metrics.&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Business Intelligence technologies provide historical, current, and predictive views of business&nbsp;operations. Common functions of business intelligence technologies involve reporting, online&nbsp;analytical processing, analytics, data mining, business performance management, and predictive&nbsp;analytics.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The aim of knowledge management is to support better business decision-making through the&nbsp;transformation of raw data into meaningful and useful information. Such information is imperative&nbsp;to enable organizations attain more effective, strategic, tactical, and operational insights, as&nbsp;well as make informed decisions.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Knowledge management efforts focus on organizational objectives such as improved performance,&nbsp;customer satisfaction, quality of service, cash flow, and other performance metrics.&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Business Intelligence technologies provide historical, current, and predictive views of business&nbsp;operations. Common functions of business intelligence technologies involve reporting, online&nbsp;analytical processing, analytics, data mining, business performance management, and predictive&nbsp;analytics.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The aim of knowledge management is to support better business decision-making through the&nbsp;transformation of raw data into meaningful and useful information. Such information is imperative&nbsp;to enable organizations attain more effective, strategic, tactical, and operational insights, as&nbsp;well as make informed decisions.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(141, 'Smart Grids - Automatic Metering Infrastructure', 2, NULL, NULL, NULL, NULL, 'Smart Grids - Automatic Metering Infrastructure', 'Smart Grids - Automatic Metering Infrastructure', NULL, NULL, 'Smart Grids - AMI', 'Smart Grids - AMI', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	With the increasing global demand in energy, the aging electrical infrastructure, and the need&nbsp;to integrate renewable energy sources, a new approach is essential to ensure that the power&nbsp;industry and national grids are equipped to handle these new demands, as well as drive utilities&nbsp;forward to the next level.&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Smart grids are the new approach to optimize the already existing infrastructure while achieving&nbsp;interconnectedness, interoperability, higher operational efficiencies, reduction in energy consumption,&nbsp;and increase in reliability. Simply, smart grids enable optimal efficacy in the management&nbsp;of power to allow for the most efficient and economical use for utilities, as well&nbsp;as consumers. Smart grids utilize and build on most of the existing power solutions&nbsp;with the incorporation of communication and control technologies. It also allows for&nbsp;the integration of new capabilities and advanced applications.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Transforming the current power platform from a manual network centric business&nbsp;to an automated centric business requires an open architecture to infuse the process&nbsp;and system with added monitoring, analysis, control, and communication&nbsp;capabilities to attain higher efficiencies. Backed by our in-depth know-how, expertise,&nbsp;and superior integration capabilities, Giza Systems is positioned to&nbsp;assist the power industry in making the transformation to smart grids for the&nbsp;attainment of efficiency, reliability, safety, and sustainability.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Our years of experience in the utilities and telecom sectors allow us to leverage&nbsp;our proficiencies to guide the industry through the different levels in order</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	to achieve a smooth transition towards a truly smart grid Giza Systems identifies&nbsp;smart metering, or advanced metering infrastructure, as the enabler and</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	driver for the Smart Grid resulting in the advancement of a technology today&nbsp;that is both future-proof and competitive in price.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	With the increasing global demand in energy, the aging electrical infrastructure, and the need&nbsp;to integrate renewable energy sources, a new approach is essential to ensure that the power&nbsp;industry and national grids are equipped to handle these new demands, as well as drive utilities&nbsp;forward to the next level.&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Smart grids are the new approach to optimize the already existing infrastructure while achieving&nbsp;interconnectedness, interoperability, higher operational efficiencies, reduction in energy consumption,&nbsp;and increase in reliability. Simply, smart grids enable optimal efficacy in the management&nbsp;of power to allow for the most efficient and economical use for utilities, as well&nbsp;as consumers. Smart grids utilize and build on most of the existing power solutions&nbsp;with the incorporation of communication and control technologies. It also allows for&nbsp;the integration of new capabilities and advanced applications.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Transforming the current power platform from a manual network centric business&nbsp;to an automated centric business requires an open architecture to infuse the process&nbsp;and system with added monitoring, analysis, control, and communication&nbsp;capabilities to attain higher efficiencies. Backed by our in-depth know-how, expertise,&nbsp;and superior integration capabilities, Giza Systems is positioned to&nbsp;assist the power industry in making the transformation to smart grids for the&nbsp;attainment of efficiency, reliability, safety, and sustainability.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Our years of experience in the utilities and telecom sectors allow us to leverage&nbsp;our proficiencies to guide the industry through the different levels in order</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	to achieve a smooth transition towards a truly smart grid Giza Systems identifies&nbsp;smart metering, or advanced metering infrastructure, as the enabler and</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	driver for the Smart Grid resulting in the advancement of a technology today&nbsp;that is both future-proof and competitive in price.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(142, 'Smart Metering', 2, NULL, NULL, NULL, NULL, 'Smart Metering', 'Smart Metering', NULL, NULL, 'Smart Grids - Smart Metering', 'Smart Grids - Smart Metering', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The role of meters in the smart grid is much more than just a register for energy consumption.&nbsp;It is the sensing device at the edge of the grid that is able to convey a comprehensive picture&nbsp;of what is happening on this crucial part of the grid, as well as contribute to every aspect of a&nbsp;utility&rsquo;s operation. This is the reason that it is called smart metering or advanced metering infrastructure.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Partnering with smart metering market leaders has provided Giza Systems with a&nbsp;competitive advantage in the smart technology. We offer our customers our know-how and a&nbsp;proven smart metering technology that is incorporated today in more than 30 million operational&nbsp;electricity meters all over the world.</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The system employed utilizes an open, bidirectional and extensible infrastructure to enable a&nbsp;comprehensive range of utility applications. Unlike traditional AMR systems that provide limited&nbsp;functionality over proprietary, often one-way networks, the adopted system benefits every&nbsp;aspect of a utility&rsquo;s operation, from metering and customer services to distribution operations&nbsp;and value-added business. The system is characterized as a substation/transformer centric AMI&nbsp;solution.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	This means that part of the intelligence driven by data flow from connected devices can&nbsp;be distributed to every low voltage distribution transformer. This allows the grid to intelligently&nbsp;and proactively react to system conditions before they take effect, such as transformer overload&nbsp;conditions, voltage problems, and faults that adversely affect the network. Deploying any other&nbsp;AMI solution on a per-meter basis and perspective prevents a cost effective integration of AMI&nbsp;and smart grid applications including demand response, distributed generation, EHV services,&nbsp;volt/VAR control and many other applications.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	As the leading systems integrator in Egypt and the Middle East, Giza Systems understands the&nbsp;requisite planning and deployment systems needed for the transformation towards smart grid&nbsp;technologies. This significant investment in power grids promise to translate into higher operational&nbsp;efficiencies and cost-cutting measures, increased reliability and customer choice, as well&nbsp;as sustainability of our resources.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The role of meters in the smart grid is much more than just a register for energy consumption.&nbsp;It is the sensing device at the edge of the grid that is able to convey a comprehensive picture&nbsp;of what is happening on this crucial part of the grid, as well as contribute to every aspect of a&nbsp;utility&rsquo;s operation. This is the reason that it is called smart metering or advanced metering infrastructure.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Partnering with smart metering market leaders has provided Giza Systems with a&nbsp;competitive advantage in the smart technology. We offer our customers our know-how and a&nbsp;proven smart metering technology that is incorporated today in more than 30 million operational&nbsp;electricity meters all over the world.</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	The system employed utilizes an open, bidirectional and extensible infrastructure to enable a&nbsp;comprehensive range of utility applications. Unlike traditional AMR systems that provide limited&nbsp;functionality over proprietary, often one-way networks, the adopted system benefits every&nbsp;aspect of a utility&rsquo;s operation, from metering and customer services to distribution operations&nbsp;and value-added business. The system is characterized as a substation/transformer centric AMI&nbsp;solution.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	This means that part of the intelligence driven by data flow from connected devices can&nbsp;be distributed to every low voltage distribution transformer. This allows the grid to intelligently&nbsp;and proactively react to system conditions before they take effect, such as transformer overload&nbsp;conditions, voltage problems, and faults that adversely affect the network. Deploying any other&nbsp;AMI solution on a per-meter basis and perspective prevents a cost effective integration of AMI&nbsp;and smart grid applications including demand response, distributed generation, EHV services,&nbsp;volt/VAR control and many other applications.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	As the leading systems integrator in Egypt and the Middle East, Giza Systems understands the&nbsp;requisite planning and deployment systems needed for the transformation towards smart grid&nbsp;technologies. This significant investment in power grids promise to translate into higher operational&nbsp;efficiencies and cost-cutting measures, increased reliability and customer choice, as well&nbsp;as sustainability of our resources.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(143, 'Supervisory Control And Data Acquisition (SCADA)', 2, NULL, NULL, NULL, NULL, 'Supervisory Control And Data Acquisition (SCADA)', 'Supervisory Control And Data Acquisition (SCADA)', NULL, NULL, 'Water Solution', 'Water Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Real-time industrial process control system used to centrally monitor and control remote or&nbsp;local industrial equipment such as motors, valves, pumps and sensors.&nbsp;It is the system of hardware and software through which the operation team of any plant can&nbsp;acquire and control all the process data about the operations of the plant. It is a platform or&nbsp;gateway above which many managerial systems can be built such as ERP, Billing, GIS and&nbsp;Asset Management.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Real-time industrial process control system used to centrally monitor and control remote or&nbsp;local industrial equipment such as motors, valves, pumps and sensors.&nbsp;It is the system of hardware and software through which the operation team of any plant can&nbsp;acquire and control all the process data about the operations of the plant. It is a platform or&nbsp;gateway above which many managerial systems can be built such as ERP, Billing, GIS and&nbsp;Asset Management.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(144, 'Water Solutions: Distributed Control Systems (DCS)', 2, NULL, NULL, NULL, NULL, 'Water Solutions: Distributed Control Systems (DCS)', 'Water Solutions: Distributed Control Systems (DCS)', NULL, NULL, 'Water Solution', 'Water Solution', '<p>\r\n	<span style="text-align: justify; ">Our Distributed Control Systems (DCS) are equipped with state of the art technologies and user-friendly&nbsp;interfaces that aid plant operators in managing industrial process through the control of&nbsp;all physical variables, while connected to advanced monitoring platforms.</span></p>\r\n<div style="text-align: justify; ">\r\n	Our extensive experience in DCS engineering has enabled us to specialize in developing and&nbsp;applying control technology to various desalination plant areas.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Giza Systems is currently employing the latest cutting-edge DCS technology. Our team&rsquo;s in-depth&nbsp;knowledge of desalination processes covers a complete service spectrum including&nbsp;project management, procurement, engineering, panel building, FAT, training, commissioning,&nbsp;start-up and fine-tuning to optimize desalinization plant operations.</div>\r\n', '<p>\r\n	<span style="text-align: justify; ">Our Distributed Control Systems (DCS) are equipped with state of the art technologies and user-friendly&nbsp;interfaces that aid plant operators in managing industrial process through the control of&nbsp;all physical variables, while connected to advanced monitoring platforms.</span></p>\r\n<div style="text-align: justify; ">\r\n	Our extensive experience in DCS engineering has enabled us to specialize in developing and&nbsp;applying control technology to various desalination plant areas.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Giza Systems is currently employing the latest cutting-edge DCS technology. Our team&rsquo;s in-depth&nbsp;knowledge of desalination processes covers a complete service spectrum including&nbsp;project management, procurement, engineering, panel building, FAT, training, commissioning,&nbsp;start-up and fine-tuning to optimize desalinization plant operations.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(145, 'Water Solutions: Leak Detection Systems (LDS)', 2, NULL, NULL, NULL, NULL, 'Water Solutions: Leak Detection Systems (LDS)', 'Water Solutions: Leak Detection Systems (LDS)', NULL, NULL, 'Water Solution', 'Water Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Leak Detection Systems aid in the detection of a leak, estimation of its location, and determination&nbsp;of its magnitude and possible effects.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Leak Detection Systems are vital in controlling leakages and their consequences, including the&nbsp;loss of energy, hindered transmission, environmental disasters and human injuries.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	When choosing a Leak Detection System, operators look for a solution that is:</div>\r\n<ul>\r\n	<li style="text-align: justify; ">\r\n		Easy to implement</li>\r\n	<li style="text-align: justify; ">\r\n		Detects small leaks under all operating conditions</li>\r\n	<li style="text-align: justify; ">\r\n		Responds in real time and without lags</li>\r\n	<li style="text-align: justify; ">\r\n		Only alarms when there is a real leak</li>\r\n	<li style="text-align: justify; ">\r\n		Clear alarm annunciation</li>\r\n	<li style="text-align: justify; ">\r\n		Does not distract controllers from core duties</li>\r\n	<li style="text-align: justify; ">\r\n		Works with the minimum instrumentation</li>\r\n	<li style="text-align: justify; ">\r\n		Low cost of ownership (installation and maintenance)</li>\r\n</ul>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Leak Detection Systems aid in the detection of a leak, estimation of its location, and determination&nbsp;of its magnitude and possible effects.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Leak Detection Systems are vital in controlling leakages and their consequences, including the&nbsp;loss of energy, hindered transmission, environmental disasters and human injuries.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	When choosing a Leak Detection System, operators look for a solution that is:</div>\r\n<ul>\r\n	<li style="text-align: justify; ">\r\n		Easy to implement</li>\r\n	<li style="text-align: justify; ">\r\n		Detects small leaks under all operating conditions</li>\r\n	<li style="text-align: justify; ">\r\n		Responds in real time and without lags</li>\r\n	<li style="text-align: justify; ">\r\n		Only alarms when there is a real leak</li>\r\n	<li style="text-align: justify; ">\r\n		Clear alarm annunciation</li>\r\n	<li style="text-align: justify; ">\r\n		Does not distract controllers from core duties</li>\r\n	<li style="text-align: justify; ">\r\n		Works with the minimum instrumentation</li>\r\n	<li style="text-align: justify; ">\r\n		Low cost of ownership (installation and maintenance)</li>\r\n</ul>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(146, 'Water Solutions: Field Instruments', 2, NULL, NULL, NULL, NULL, 'Water Solutions: Field Instruments', 'Water Solutions: Field Instruments', NULL, NULL, 'Water Solution', 'Water Solution', '<p style="text-align: justify;">\r\n	<span style="text-align: justify;">Field instruments are essential for measuring the different parameters on-site in order to ensure&nbsp;accurate monitoring and control. Reporting to the central control room, these solutions include&nbsp;the installation of field instruments, transmitters, sensors, liquid and gas analyzers, control&nbsp;valves and actuators. The aim is to monitor and measure all ongoing plant processes so that&nbsp;the information can be transmitted to the control center.</span></p>\r\n<div style="text-align: justify;">\r\n	Our instrumentation teams are experts&nbsp;in programming and installing testing instruments, as well as integrating them with new and&nbsp;existing automation systems installed to enhance process solutions.To offer the best and most suitable solutions to meet the needs of our clients, Giza Systems has&nbsp;partnered with a broad range of leading companies specialized in field instruments.</div>\r\n', '<p style="text-align: justify;">\r\n	<span style="text-align: justify;">Field instruments are essential for measuring the different parameters on-site in order to ensure&nbsp;accurate monitoring and control. Reporting to the central control room, these solutions include&nbsp;the installation of field instruments, transmitters, sensors, liquid and gas analyzers, control&nbsp;valves and actuators. The aim is to monitor and measure all ongoing plant processes so that&nbsp;the information can be transmitted to the control center.</span></p>\r\n<div style="text-align: justify;">\r\n	Our instrumentation teams are experts&nbsp;in programming and installing testing instruments, as well as integrating them with new and&nbsp;existing automation systems installed to enhance process solutions.To offer the best and most suitable solutions to meet the needs of our clients, Giza Systems has&nbsp;partnered with a broad range of leading companies specialized in field instruments.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(147, 'Water Solutions: Programmable Logic Controller (PLC)', 2, NULL, NULL, NULL, NULL, 'Water Solutions: Programmable Logic Controller (PLC)', 'Water Solutions: Programmable Logic Controller (PLC)', NULL, NULL, 'Water Solution', 'Water Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Programmable&nbsp;Logic Controller&nbsp;(PLC)&nbsp;technology is generally employed for&nbsp;some applications, which are necessary in&nbsp;many areas of desalination plants.&nbsp;Our programming varies based on the&nbsp;requirements needed for the application,&nbsp;testing, commissioning and start-up. We&nbsp;also offer a wide range of services for&nbsp;already installed systems in desalination&nbsp;plants.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Programmable&nbsp;Logic Controller&nbsp;(PLC)&nbsp;technology is generally employed for&nbsp;some applications, which are necessary in&nbsp;many areas of desalination plants.&nbsp;Our programming varies based on the&nbsp;requirements needed for the application,&nbsp;testing, commissioning and start-up. We&nbsp;also offer a wide range of services for&nbsp;already installed systems in desalination&nbsp;plants.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(148, 'Water Solutions: Communication Solutions', 2, NULL, NULL, NULL, NULL, 'Water Solutions: Communication Solutions', 'Water Solutions: Communication Solutions', NULL, NULL, 'Water Solution', 'Water Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	These types of solutions include Microwave and Radio solutions, as well as WiMax and GPRS.&nbsp;They are employed as wireless media in order to provide and relay control and monitoring&nbsp;information to control centers.&nbsp;In addition to the tremendous relevance of Radio for the&nbsp;operation and maintenance of crews, these solutions&nbsp;become essential for the water industry. When confronted&nbsp;with rough terrain, such as mountain-like areas, wireless</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	communication solutions are the main resort due&nbsp;to the difficulty level of cabling.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	Our competitive&nbsp;advantage in fulfilling the dual functions of&nbsp;IT-based and engineering services geared&nbsp;towards the Utilities and Telecom&nbsp;industries enable water providers to&nbsp;benefit from our competence and our&nbsp;experience in vertical integration.&nbsp;We enable utilities to meet their&nbsp;needs by providing them with the</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	most advanced and cutting-edge&nbsp;solutions.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	These types of solutions include Microwave and Radio solutions, as well as WiMax and GPRS.&nbsp;They are employed as wireless media in order to provide and relay control and monitoring&nbsp;information to control centers.&nbsp;In addition to the tremendous relevance of Radio for the&nbsp;operation and maintenance of crews, these solutions&nbsp;become essential for the water industry. When confronted&nbsp;with rough terrain, such as mountain-like areas, wireless</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	communication solutions are the main resort due&nbsp;to the difficulty level of cabling.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	Our competitive&nbsp;advantage in fulfilling the dual functions of&nbsp;IT-based and engineering services geared&nbsp;towards the Utilities and Telecom&nbsp;industries enable water providers to&nbsp;benefit from our competence and our&nbsp;experience in vertical integration.&nbsp;We enable utilities to meet their&nbsp;needs by providing them with the</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	most advanced and cutting-edge&nbsp;solutions.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(149, 'Water Solutions: Geographical Information Systems (GIS)', 2, NULL, NULL, NULL, NULL, 'Water Solutions: Geographical Information Systems (GIS)', 'Water Solutions: Geographical Information Systems (GIS)', NULL, NULL, 'Water Solution', 'Water Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Geographical Information Systems are capable of capturing both spatial and non-spatial&nbsp;information of the network assets, thus solving the problems relating to selecting the best&nbsp;locations for laying new pipes/lines, optimizing travel routes of the field crew for efficient&nbsp;operations, and visualizing volumes of data with respect to the location of corresponding assets&nbsp;on field. These solutions keep track of the network and update information of transformers,</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	switch gears, cables, etc.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	They are also used to design and plan future network expansions. To ensure that water providers&nbsp;achieve operational and business efficiency, our GIS solutions will ensure high quality and&nbsp;reliable information to assist in better operational and business decision making.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Geographical Information Systems are capable of capturing both spatial and non-spatial&nbsp;information of the network assets, thus solving the problems relating to selecting the best&nbsp;locations for laying new pipes/lines, optimizing travel routes of the field crew for efficient&nbsp;operations, and visualizing volumes of data with respect to the location of corresponding assets&nbsp;on field. These solutions keep track of the network and update information of transformers,</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	switch gears, cables, etc.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	They are also used to design and plan future network expansions. To ensure that water providers&nbsp;achieve operational and business efficiency, our GIS solutions will ensure high quality and&nbsp;reliable information to assist in better operational and business decision making.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(150, 'Water Solutions: Customer Relationship Management (CRM) and Billing', 2, NULL, NULL, NULL, NULL, 'Water Solutions: Customer Relationship Management (CRM) and Billing', 'Water Solutions: Customer Relationship Management (CRM) and Billing', NULL, NULL, 'Water Solution', 'Water Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Customer Relationship Management&nbsp;(CRM) and Billing&nbsp;&nbsp;systems orchestrate and manage the meter-to-cash process. Our solutions&nbsp;allow utilities to differentiate themselves on the grounds of customer service, accurate billing,&nbsp;and efficient collections activities.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Management of customer applications, meter work orders and installation activities, regular&nbsp;meter reading, readings validations and estimations, billing, payments and aging of debts&nbsp;constitute the high level mandates of billing and revenue management systems.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Customer Relationship Management&nbsp;(CRM) and Billing&nbsp;&nbsp;systems orchestrate and manage the meter-to-cash process. Our solutions&nbsp;allow utilities to differentiate themselves on the grounds of customer service, accurate billing,&nbsp;and efficient collections activities.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Management of customer applications, meter work orders and installation activities, regular&nbsp;meter reading, readings validations and estimations, billing, payments and aging of debts&nbsp;constitute the high level mandates of billing and revenue management systems.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(151, 'Water Solutions: Smart Metering Meter Data Management System (MDMS)', 2, NULL, NULL, NULL, NULL, 'Water Solutions: Smart Metering Meter Data Management System (MDMS)', 'Water Solutions: Smart Metering Meter Data Management System (MDMS)', NULL, NULL, 'Water Solution', 'Water Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Meter Data Management System (MDMS) is the core system for successful smart metering&nbsp;programs. MDMS supports all aspects of smart meter deployment including rollout support,&nbsp;validation, analysis, balance reports, settlement and preparation of data for billing. It decouples&nbsp;the handling of meter data from other mission-critical utility operations.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	As utilities increasingly&nbsp;move toward interval billing, MDMS permits all applications to receive the metering information&nbsp;they need in the format that suits their unique requirements.&nbsp;Many utilities struggle today to reconcile their traditional organizational structures with the&nbsp;prospects and possibilities of smart metering. On the one hand, the organization&rsquo;s metering&nbsp;division is adept in measuring consumption, but relies on a manual process consisting of one-at-a-time readings. On the other hand, their IT division understands data and meter management;&nbsp;however, has not needed to handle communications to millions of consumer devices.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	Our&nbsp;expertise and technological know-how in communication networks and IT systems, as well as&nbsp;our experience with utilities and meter manufacturers, enable us to fully assist internal teams to&nbsp;effectively engage with the new smart metering reality.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Meter Data Management System (MDMS) is the core system for successful smart metering&nbsp;programs. MDMS supports all aspects of smart meter deployment including rollout support,&nbsp;validation, analysis, balance reports, settlement and preparation of data for billing. It decouples&nbsp;the handling of meter data from other mission-critical utility operations.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	As utilities increasingly&nbsp;move toward interval billing, MDMS permits all applications to receive the metering information&nbsp;they need in the format that suits their unique requirements.&nbsp;Many utilities struggle today to reconcile their traditional organizational structures with the&nbsp;prospects and possibilities of smart metering. On the one hand, the organization&rsquo;s metering&nbsp;division is adept in measuring consumption, but relies on a manual process consisting of one-at-a-time readings. On the other hand, their IT division understands data and meter management;&nbsp;however, has not needed to handle communications to millions of consumer devices.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	Our&nbsp;expertise and technological know-how in communication networks and IT systems, as well as&nbsp;our experience with utilities and meter manufacturers, enable us to fully assist internal teams to&nbsp;effectively engage with the new smart metering reality.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(152, 'Water Solutions: Knowledge Management', 2, NULL, NULL, NULL, NULL, 'Water Solutions: Knowledge Management', 'Water Solutions: Knowledge Management', NULL, NULL, 'Water Solution', 'Water Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Knowledge management efforts focus on organizational objectives such as improved&nbsp;performance, customer satisfaction, quality of service, cash flow, and other performance&nbsp;metrics.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	Business Intelligence technologies provide historical, current, and predictive views of&nbsp;business operations. Common functions of business intelligence technologies involve reporting,&nbsp;online analytical processing, analytics, data mining, business performance management and&nbsp;predictive analytics.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	The aim of knowledge management is to support better business decisionmaking&nbsp;through the transformation of raw data into meaningful and useful information. Such&nbsp;information is imperative to enable organizations attain more effective, strategic, tactical and&nbsp;operational insights, as well as make informed decisions.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Knowledge management efforts focus on organizational objectives such as improved&nbsp;performance, customer satisfaction, quality of service, cash flow, and other performance&nbsp;metrics.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	Business Intelligence technologies provide historical, current, and predictive views of&nbsp;business operations. Common functions of business intelligence technologies involve reporting,&nbsp;online analytical processing, analytics, data mining, business performance management and&nbsp;predictive analytics.</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div style="text-align: justify; ">\r\n	The aim of knowledge management is to support better business decisionmaking&nbsp;through the transformation of raw data into meaningful and useful information. Such&nbsp;information is imperative to enable organizations attain more effective, strategic, tactical and&nbsp;operational insights, as well as make informed decisions.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(153, 'Water Solutions: Field Force Management / Mobile Workforce Management Systems (MWMS)', 2, NULL, NULL, NULL, NULL, 'Water Solutions: Field Force Management / Mobile Workforce Management Systems (MWMS)', 'Water Solutions: Field Force Management / Mobile Workforce Management Systems (MWMS)', NULL, NULL, 'Water Solution', 'Water Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Day-to-day maintenance, repairs of existing assets and installation of new equipment are carried&nbsp;out by utility staff. These mobile personnel who manage the assets dispersed across vast areas&nbsp;are generally referred to as the &lsquo;Field Force.&rsquo; The IT system that helps utilities to schedule and&nbsp;dispatch work orders to such engineers is known as the Mobile Workforce Management System&nbsp;(MWMS).</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Our MWMS optimizes and automates processes and information needed by companies&nbsp;that send engineers to the field. Moreover, it assists utilities in the following:</div>\r\n<ul>\r\n	<li style="text-align: justify; ">\r\n		Routing, dispatch tracking and reporting the status of utility field personnel</li>\r\n	<li style="text-align: justify; ">\r\n		Managing installations, service or repairs of equipment and meter reading</li>\r\n	<li style="text-align: justify; ">\r\n		Carrying out planned maintenance, unplanned maintenance and resolving service&nbsp;outages</li>\r\n</ul>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Day-to-day maintenance, repairs of existing assets and installation of new equipment are carried&nbsp;out by utility staff. These mobile personnel who manage the assets dispersed across vast areas&nbsp;are generally referred to as the &lsquo;Field Force.&rsquo; The IT system that helps utilities to schedule and&nbsp;dispatch work orders to such engineers is known as the Mobile Workforce Management System&nbsp;(MWMS).</div>\r\n<div style="text-align: justify; ">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify; ">\r\n	Our MWMS optimizes and automates processes and information needed by companies&nbsp;that send engineers to the field. Moreover, it assists utilities in the following:</div>\r\n<ul>\r\n	<li style="text-align: justify; ">\r\n		Routing, dispatch tracking and reporting the status of utility field personnel</li>\r\n	<li style="text-align: justify; ">\r\n		Managing installations, service or repairs of equipment and meter reading</li>\r\n	<li style="text-align: justify; ">\r\n		Carrying out planned maintenance, unplanned maintenance and resolving service&nbsp;outages</li>\r\n</ul>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(154, 'Well-head Integrated Control Systems', 2, NULL, NULL, NULL, NULL, 'Well-head Integrated Control Systems', 'Well-head Integrated Control Systems', NULL, NULL, 'Oil & Gas Solution', 'Oil & Gas Solution', '<p>\r\n	&nbsp;</p>\r\n<p style="text-align: justify; ">\r\n	<span style="color:#34abdd;"><strong>Well-head </strong><strong>Integrated&nbsp;</strong><strong>Control S</strong><strong>ystems</strong></span></p>\r\n<p style="text-align: justify; ">\r\n	These local or remote integrated systems controlling well-head gas wells&nbsp;employ control skids such as solar systems, remote terminal units (RTUs), hydraulic systems, in order to regulate the well-head valves, flow, pressure and temperature. By controlling the different paramaters and obtaining&nbsp;automatic responses to the issues presented, quick and fast solutions are ensured.</p>\r\n<p style="text-align: justify; ">\r\n	In addition, these systems can be remotely controlled via fiber optic or VHF communications, which allows for the monitoring and safety of the well-head gas wells.</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p style="text-align: justify; ">\r\n	<span style="color:#34abdd;"><strong>Well-head </strong><strong>Integrated&nbsp;</strong><strong>Control S</strong><strong>ystems</strong></span></p>\r\n<p style="text-align: justify; ">\r\n	These local or remote integrated systems controlling well-head gas wells&nbsp;employ control skids such as solar systems, remote terminal units (RTUs), hydraulic systems, in order to regulate the well-head valves, flow, pressure and temperature. By controlling the different paramaters and obtaining&nbsp;automatic responses to the issues presented, quick and fast solutions are ensured.</p>\r\n<p style="text-align: justify; ">\r\n	In addition, these systems can be remotely controlled via fiber optic or VHF communications, which allows for the monitoring and safety of the well-head gas wells.</p>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(155, 'Oil & Gas: Distributed Control Systems (DCS)', 2, NULL, NULL, NULL, NULL, 'Oil & Gas: Distributed Control Systems (DCS)', 'Oil & Gas: Distributed Control Systems (DCS)', NULL, NULL, NULL, NULL, '<p>\r\n	&nbsp;</p>\r\n<p style="text-align: justify; ">\r\n	<strong>Distributed Control Systems</strong></p>\r\n<p style="text-align: justify; ">\r\n	Distributed control systems (DCS) are equipped with state of the art technologies and user-friendly interface that aid plant operators in managing industrial process through the control of all physical variables (pressure, temperature, level, flow, PH and other chemical balances in all the stages everywhere in the plant), while connected to advanced monitoring platforms.</p>\r\n<p style="text-align: justify; ">\r\n	&nbsp;</p>\r\n<p>\r\n	Giza Systems is currently employing the latest cutting-edge DCS technology. Our team&rsquo;s in depth knowledge of oil and gas processes covers a complete service spectrum including project management, procurement, engineering, panel building, FAT, training, commissioning, start- up, and fine-tuning to optimize oil and gas plant operations.</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p style="text-align: justify; ">\r\n	<strong>Distributed Control Systems</strong></p>\r\n<p style="text-align: justify; ">\r\n	Distributed control systems (DCS) are equipped with state of the art technologies and user-friendly interface that aid plant operators in managing industrial process through the control of all physical variables (pressure, temperature, level, flow, PH and other chemical balances in all the stages everywhere in the plant), while connected to advanced monitoring platforms.</p>\r\n<p style="text-align: justify; ">\r\n	&nbsp;</p>\r\n<p>\r\n	Giza Systems is currently employing the latest cutting-edge DCS technology. Our team&rsquo;s in depth knowledge of oil and gas processes covers a complete service spectrum including project management, procurement, engineering, panel building, FAT, training, commissioning, start- up, and fine-tuning to optimize oil and gas plant operations.</p>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(156, 'Oil & Gas Solutions: Transportation Lines SCADA Solutions', 2, NULL, NULL, NULL, NULL, 'Oil & Gas Solutions: Transportation Lines SCADA Solutions', 'Oil & Gas Solutions: Transportation Lines SCADA Solutions', NULL, NULL, 'Oil & Gas Solution', 'Oil & Gas Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Oil and gas transportation requires the installation of&nbsp;a network of pipelines that extends for thousands of&nbsp;kilometers, as well as meeting specifications that include&nbsp;the monitoring and control of some parameters. Remote&nbsp;terminal units and field instruments monitor block valves&nbsp;to collect information and transmit it to the control point,&nbsp;thus, enabling responses to issues through remote control&nbsp;capabilities.</div>\r\n<div style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	The process is based on SCADA systems that oversee&nbsp;the pipelines all over the grid. This is coupled with&nbsp;communication solutions, through fiber optic or wireless&nbsp;networks, which are employed for the transmission of&nbsp;data to operators located at the central control room.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Oil and gas transportation requires the installation of&nbsp;a network of pipelines that extends for thousands of&nbsp;kilometers, as well as meeting specifications that include&nbsp;the monitoring and control of some parameters. Remote&nbsp;terminal units and field instruments monitor block valves&nbsp;to collect information and transmit it to the control point,&nbsp;thus, enabling responses to issues through remote control&nbsp;capabilities.</div>\r\n<div style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	The process is based on SCADA systems that oversee&nbsp;the pipelines all over the grid. This is coupled with&nbsp;communication solutions, through fiber optic or wireless&nbsp;networks, which are employed for the transmission of&nbsp;data to operators located at the central control room.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(157, 'Field Devices and Field Communication Solutions', 2, NULL, NULL, NULL, NULL, 'Field Devices and Field Communication Solutions', 'Field Devices and Field Communication Solutions', NULL, NULL, 'Oil & Gas Solution', 'Oil & Gas Solution', '<p>\r\n	&nbsp;</p>\r\n<p style="text-align: justify; ">\r\n	<strong>Field Devices and Field Communication Solutions</strong></p>\r\n<p style="text-align: justify; ">\r\n	Reporting to the central control room, these solutions include the installation of field instruments, transmitters and sensors to monitor and measure all ongoing plant processes and transmit the information to the control center.</p>\r\n<p style="text-align: justify; ">\r\n	The communication network can be constructed either with regular cables, fiber optic cables or wirelessly using state of the art field communication protocols.</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p style="text-align: justify; ">\r\n	<strong>Field Devices and Field Communication Solutions</strong></p>\r\n<p style="text-align: justify; ">\r\n	Reporting to the central control room, these solutions include the installation of field instruments, transmitters and sensors to monitor and measure all ongoing plant processes and transmit the information to the control center.</p>\r\n<p style="text-align: justify; ">\r\n	The communication network can be constructed either with regular cables, fiber optic cables or wirelessly using state of the art field communication protocols.</p>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(158, 'Oil & Gas Solutions: Fire & Gas (F&G) Safety Systems and Detectors', 2, NULL, NULL, NULL, NULL, 'Oil & Gas Solutions: Fire & Gas (F&G) Safety Systems and Detectors', 'Oil & Gas Solutions: Fire & Gas (F&G) Safety Systems and Detectors', NULL, NULL, 'Oil & Gas Solution', 'Oil & Gas Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	These solutions are designed to carefully monitor the emission of gas and oil/gas leaks. They&nbsp;are equipped with gas and smoke detectors, as well as flame sensors &ndash; among others &ndash; to&nbsp;control the environment for optimum safety. These systems have received some of the highest&nbsp;safety certifications, and are implemented by certified trained engineers.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	These solutions are designed to carefully monitor the emission of gas and oil/gas leaks. They&nbsp;are equipped with gas and smoke detectors, as well as flame sensors &ndash; among others &ndash; to&nbsp;control the environment for optimum safety. These systems have received some of the highest&nbsp;safety certifications, and are implemented by certified trained engineers.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(159, 'Oil & Gas Solutions: Emergency ShutDown (ESD) Systems', 2, NULL, NULL, NULL, NULL, 'Oil & Gas Solutions: Emergency ShutDown (ESD) Systems', 'Oil & Gas Solutions: Emergency ShutDown (ESD) Systems', NULL, NULL, 'Oil & Gas Solution', 'Oil & Gas Solution', '<div id="cke_pastebin" style="text-align: justify;">\r\n	In the event of a critical alarm (fire, high pressure, leak, etc.), Emergency Shutdown (ESD) Systems process a specific routine to control the situation, which is&nbsp;identified beforehand based on the client&rsquo;s needs.<span style="text-align: justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></div>\r\n', '<div id="cke_pastebin" style="text-align: justify;">\r\n	In the event of a critical alarm (fire, high pressure, leak, etc.), Emergency Shutdown (ESD) Systems process a specific routine to control the situation, which is&nbsp;identified beforehand based on the client&rsquo;s needs.<span style="text-align: justify;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(160, 'Oil & Gas Solutions: Leak Detection Solutions', 2, NULL, NULL, NULL, NULL, 'Oil & Gas Solutions: Leak Detection Solutions', 'Oil & Gas Solutions: Leak Detection Solutions', NULL, NULL, 'Oil & Gas Solution', 'Oil & Gas Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Leak Detection Systems aid in the detection of leaks,&nbsp;estimation of their location, and determination of&nbsp;their magnitude and possible effects. Leak Detection&nbsp;Systems are vital in controlling leakages and managing&nbsp;potential consequences, such as loss of energy,&nbsp;hindered transmission, environmental disasters, and&nbsp;human injuries.</div>\r\n<div style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	When choosing a Leak Detection System, operators&nbsp;look for a solution that:</div>\r\n<ul>\r\n	<li style="text-align: justify;">\r\n		Is easy to implement</li>\r\n	<li style="text-align: justify;">\r\n		Detects small leaks under all operating&nbsp;conditions</li>\r\n	<li style="text-align: justify;">\r\n		Responds in real time and without lags</li>\r\n	<li style="text-align: justify;">\r\n		Signals an alarm only when there is a real leak</li>\r\n	<li style="text-align: justify;">\r\n		Grants clear alarm annunciation</li>\r\n	<li style="text-align: justify;">\r\n		Does not distract controllers from core duties</li>\r\n	<li style="text-align: justify;">\r\n		Works with minimum instrumentation</li>\r\n	<li style="text-align: justify;">\r\n		Provides low cost of ownership (installation&nbsp;and maintenance)</li>\r\n</ul>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Leak Detection Systems aid in the detection of leaks,&nbsp;estimation of their location, and determination of&nbsp;their magnitude and possible effects. Leak Detection&nbsp;Systems are vital in controlling leakages and managing&nbsp;potential consequences, such as loss of energy,&nbsp;hindered transmission, environmental disasters, and&nbsp;human injuries.</div>\r\n<div style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	When choosing a Leak Detection System, operators&nbsp;look for a solution that:</div>\r\n<ul>\r\n	<li style="text-align: justify;">\r\n		Is easy to implement</li>\r\n	<li style="text-align: justify;">\r\n		Detects small leaks under all operating&nbsp;conditions</li>\r\n	<li style="text-align: justify;">\r\n		Responds in real time and without lags</li>\r\n	<li style="text-align: justify;">\r\n		Signals an alarm only when there is a real leak</li>\r\n	<li style="text-align: justify;">\r\n		Grants clear alarm annunciation</li>\r\n	<li style="text-align: justify;">\r\n		Does not distract controllers from core duties</li>\r\n	<li style="text-align: justify;">\r\n		Works with minimum instrumentation</li>\r\n	<li style="text-align: justify;">\r\n		Provides low cost of ownership (installation&nbsp;and maintenance)</li>\r\n</ul>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(161, 'Gas Liquification', 2, NULL, NULL, NULL, NULL, 'Gas Liquification', 'Gas Liquification', NULL, NULL, 'Oil & Gas Solution', 'Oil & Gas Solution', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Gas Liquification</strong></p>\r\n<p>\r\n	DCS is utilized to provide tight control of the very critical and complex process of gas liquefaction. .</p>', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Gas Liquification</strong></p>\r\n<p>\r\n	DCS is utilized to provide tight control of the very critical and complex process of gas liquefaction. .</p>', 1, 0, 1, '2013-03-18 10:12:39'),
	(162, 'Oil & Gas: Geographical Information Systems (GIS)', 2, NULL, NULL, NULL, NULL, 'Oil & Gas: Geographical Information Systems (GIS)', 'Oil & Gas: Geographical Information Systems (GIS)', NULL, NULL, 'Oil & Gas Solution', 'Oil & Gas Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Geographical Information Systems are capable of capturing&nbsp;both spatial and non-spatial information of the network assets,&nbsp;thus solving the problems relating to selecting the best locations&nbsp;for laying new pipes/lines, optimizing travel routes of the field&nbsp;crew for efficient operations, and visualizing volumes of data&nbsp;with respect to the location of corresponding assets on field.</div>\r\n<div style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	These solutions keep track of the network and update&nbsp;information of pipes, pumps, valves, etc. They are also used to&nbsp;design and plan future network expansions.</div>\r\n<div style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	To ensure that oil and gas providers achieve operational and&nbsp;business efficiency, our GIS solution will ensure high quality and&nbsp;reliable information to assist in better operational and business&nbsp;decision making.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Geographical Information Systems are capable of capturing&nbsp;both spatial and non-spatial information of the network assets,&nbsp;thus solving the problems relating to selecting the best locations&nbsp;for laying new pipes/lines, optimizing travel routes of the field&nbsp;crew for efficient operations, and visualizing volumes of data&nbsp;with respect to the location of corresponding assets on field.</div>\r\n<div style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	These solutions keep track of the network and update&nbsp;information of pipes, pumps, valves, etc. They are also used to&nbsp;design and plan future network expansions.</div>\r\n<div style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	To ensure that oil and gas providers achieve operational and&nbsp;business efficiency, our GIS solution will ensure high quality and&nbsp;reliable information to assist in better operational and business&nbsp;decision making.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(163, 'Oil & Gas: Customer Relationship Management (CRM) and Billing', 2, NULL, NULL, NULL, NULL, 'Oil & Gas: Customer Relationship Management (CRM) and Billing', 'Oil & Gas: Customer Relationship Management (CRM) and Billing', NULL, NULL, 'Oil & Gas Solution', 'Oil & Gas Solution', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p style="text-align: justify; ">\r\n	Customer Relationship Management (CRM) and Billing</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p style="text-align: justify; ">\r\n	These are automatic metering solutions used to measure usage readings and automatically send them to the control rooms. In addition, they enable issuance of bills without manual interference and allow for follow up on payment processes.</p>\r\n<p style="text-align: justify; ">\r\n	CRM and Billing systems orchestrate and manage the meter-to-cash process. Our solutions allow utilities to differentiate themselves on the grounds of customer service, accurate billing, and efficient collections activities. Management of customer applications, meter work orders and installation activities, regular meter reading, readings validations and estimations, billing, payments and aging of debts constitute the high level mandates of billing and revenue management systems. &nbsp;</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p style="text-align: justify; ">\r\n	Customer Relationship Management (CRM) and Billing</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p style="text-align: justify; ">\r\n	These are automatic metering solutions used to measure usage readings and automatically send them to the control rooms. In addition, they enable issuance of bills without manual interference and allow for follow up on payment processes.</p>\r\n<p style="text-align: justify; ">\r\n	CRM and Billing systems orchestrate and manage the meter-to-cash process. Our solutions allow utilities to differentiate themselves on the grounds of customer service, accurate billing, and efficient collections activities. Management of customer applications, meter work orders and installation activities, regular meter reading, readings validations and estimations, billing, payments and aging of debts constitute the high level mandates of billing and revenue management systems. &nbsp;</p>\r\n', 1, 0, 1, '2013-03-18 10:12:39'),
	(164, 'Process-specific solutions: Petrochemicals', 2, NULL, NULL, NULL, NULL, 'Process-specific solutions: Petrochemicals', 'Process-specific solutions: Petrochemicals', NULL, NULL, 'Oil & Gas Solution', 'Oil & Gas Solution', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p style="text-align: justify; ">\r\n	<strong>Petrochemicals</strong></p>\r\n<p style="text-align: justify; ">\r\n	The process specific solution for petrochemicals depends on the utilization of DCS and safety systems to control plant processes. Solutions are tailor-made and configured to suit each plant setting.</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p style="text-align: justify; ">\r\n	<strong>Petrochemicals</strong></p>\r\n<p style="text-align: justify; ">\r\n	The process specific solution for petrochemicals depends on the utilization of DCS and safety systems to control plant processes. Solutions are tailor-made and configured to suit each plant setting.</p>\r\n', 1, 0, 1, '2013-03-18 10:12:40'),
	(165, 'Process-specific solutions: Advanced Process Control Solutions', 2, NULL, NULL, NULL, NULL, 'Process-specific solutions: Advanced Process Control Solutions', 'Process-specific solutions: Advanced Process Control Solutions', NULL, NULL, 'Oil & Gas Solution', 'Oil & Gas Solution', '<p>\r\n	&nbsp;</p>\r\n<p style="text-align: justify; ">\r\n	<strong>Advanced Process Control Solutions</strong></p>\r\n<p style="text-align: justify; ">\r\n	These are expert systems configured to collect field data according to the process, and preset to automatically interfere on behalf of the operator.&nbsp;</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p style="text-align: justify; ">\r\n	<strong>Advanced Process Control Solutions</strong></p>\r\n<p style="text-align: justify; ">\r\n	These are expert systems configured to collect field data according to the process, and preset to automatically interfere on behalf of the operator.&nbsp;</p>\r\n', 1, 0, 1, '2013-03-18 10:12:40'),
	(166, 'Process-specific solutions: Training Simulators', 2, NULL, NULL, NULL, NULL, 'Process-specific solutions: Training Simulators', 'Process-specific solutions: Training Simulators', NULL, NULL, 'Oil & Gas Solution', 'Oil & Gas Solution', '<p>\r\n	&nbsp;</p>\r\n<p style="text-align: justify; ">\r\n	<strong>Training Simulators</strong></p>\r\n<p style="text-align: justify; ">\r\n	These are tailor-made models that simulate the plant and its relevant possible situations in order to measure and analyze the reaction of the plant to operator actions and orders.</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p style="text-align: justify; ">\r\n	<strong>Training Simulators</strong></p>\r\n<p style="text-align: justify; ">\r\n	These are tailor-made models that simulate the plant and its relevant possible situations in order to measure and analyze the reaction of the plant to operator actions and orders.</p>\r\n', 1, 0, 1, '2013-03-18 10:12:40'),
	(167, 'Oil & Gas: Back Office Solutions', 2, NULL, NULL, NULL, NULL, 'Oil & Gas: Back Office Solutions', 'Oil & Gas: Back Office Solutions', NULL, NULL, 'Oil & Gas Solution', 'Oil & Gas Solution', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Back Office Solutions </strong></p>\r\n<p>\r\n	These include Enterprise Management Solutions, ERP solutions, infrastructure solutions, networking, and hardware installations, among others.</p>\r\n', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Back Office Solutions </strong></p>\r\n<p>\r\n	These include Enterprise Management Solutions, ERP solutions, infrastructure solutions, networking, and hardware installations, among others.</p>\r\n', 1, 0, 1, '2013-03-18 10:12:40'),
	(168, 'Industry pg', 2, NULL, NULL, NULL, NULL, 'Industry pg', 'Industry pg', NULL, NULL, NULL, NULL, '<p>\r\n	tftygfygughuyh huhu</p>\r\n', '<p>\r\n	tftygfygughuyh huhu</p>\r\n', 1, 0, 1, '2013-03-18 10:12:40'),
	(169, 'Manufacturing Solutions: Distributed Control Systems (DCS)', 2, NULL, NULL, NULL, NULL, 'Manufacturing Solutions: Distributed Control Systems (DCS)', 'Manufacturing Solutions: Distributed Control Systems (DCS)', NULL, NULL, NULL, NULL, '<p style="text-align: justify;">\r\n	<span style="text-align: justify;">Distributed Control Systems (DCS) are equipped with state of the art technologies and user friendly interfaces that help plant operators manage industrial processes through the control of all process variables, while connected to advanced monitoring platforms.</span></p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Our extensive experience in DCS engineering has enabled us to specialize in developing and applying control technology to various factory/plant areas. These areas include: chemical reactors, boilers, Balance of Plant (BOP) and other subsystems like Continuous Emissions Monitoring System (CEMS).</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Giza Systems is currently employing the latest cutting-edge DCS technology. Our team&rsquo;s in depth knowledge of factory/plant processes covers a complete service spectrum including project management, procurement, engineering, panel building, FAT, training, commissioning, start- up, and fine-tuning to optimize factory/plant operations.&nbsp;</div>\r\n', '<p style="text-align: justify;">\r\n	<span style="text-align: justify;">Distributed Control Systems (DCS) are equipped with state of the art technologies and user friendly interfaces that help plant operators manage industrial processes through the control of all process variables, while connected to advanced monitoring platforms.</span></p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Our extensive experience in DCS engineering has enabled us to specialize in developing and applying control technology to various factory/plant areas. These areas include: chemical reactors, boilers, Balance of Plant (BOP) and other subsystems like Continuous Emissions Monitoring System (CEMS).</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Giza Systems is currently employing the latest cutting-edge DCS technology. Our team&rsquo;s in depth knowledge of factory/plant processes covers a complete service spectrum including project management, procurement, engineering, panel building, FAT, training, commissioning, start- up, and fine-tuning to optimize factory/plant operations.&nbsp;</div>\r\n', 1, 0, 1, '2013-03-18 10:12:40'),
	(170, 'Manufacturing Solutions: Advanced Process Control Solutions', 2, NULL, NULL, NULL, NULL, 'Manufacturing Solutions: Advanced Process Control Solutions', 'Manufacturing Solutions: Advanced Process Control Solutions', NULL, NULL, 'Manufacturing Solutions', 'Manufacturing Solutions', '<p>\r\n	<span style="text-align: justify;">Advanced Process Control Solutions are expert systems configured to collect field data according to the process, preset to automatically interfere to solve any issues on behalf of the operator.&nbsp;</span></p>\r\n', '<p>\r\n	<span style="text-align: justify;">Advanced Process Control Solutions are expert systems configured to collect field data according to the process, preset to automatically interfere to solve any issues on behalf of the operator.&nbsp;</span></p>\r\n', 1, 0, 1, '2013-03-18 10:12:40'),
	(171, 'Supervisory Control and Data Acquisition (SCADA) Systems', 2, NULL, NULL, NULL, NULL, 'Supervisory Control and Data Acquisition (SCADA) Systems', 'Supervisory Control and Data Acquisition (SCADA) Systems', NULL, NULL, 'Manufacturing Solutions', 'Manufacturing Solutions', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Real-time industrial process control system used to centrally monitor and control remote or local industrial equipment such as motors, valves, pumps and sensors.&nbsp;It is the system of hardware and software through which the operation team of any plant can acquire and control all the process data about the operations of the plant. It is a platform or gateway above which many managerial systems can be built such as ERP, GIS and Asset Management.&nbsp;</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Real-time industrial process control system used to centrally monitor and control remote or local industrial equipment such as motors, valves, pumps and sensors.&nbsp;It is the system of hardware and software through which the operation team of any plant can acquire and control all the process data about the operations of the plant. It is a platform or gateway above which many managerial systems can be built such as ERP, GIS and Asset Management.&nbsp;</div>\r\n', 1, 0, 1, '2013-03-18 10:12:40'),
	(172, 'Manufacturing Solutions: Supervisory Control and Data Acquisition (SCADA) Systems', 2, NULL, NULL, NULL, NULL, 'Manufacturing Solutions: Supervisory Control and Data Acquisition (SCADA) Systems', 'Manufacturing Solutions: Supervisory Control and Data Acquisition (SCADA) Systems', NULL, NULL, 'Manufacturing Solutions', 'Manufacturing Solutions', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Real-time industrial process control system used to centrally monitor and control remote or local industrial equipment such as motors, valves, pumps and sensors.&nbsp;It is the system of hardware and software through which the operation team of any plant can acquire and control all the process data about the operations of the plant. It is a platform or gateway above which many managerial systems can be built such as ERP, GIS and Asset Management.&nbsp;</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Real-time industrial process control system used to centrally monitor and control remote or local industrial equipment such as motors, valves, pumps and sensors.&nbsp;It is the system of hardware and software through which the operation team of any plant can acquire and control all the process data about the operations of the plant. It is a platform or gateway above which many managerial systems can be built such as ERP, GIS and Asset Management.&nbsp;</div>\r\n', 1, 0, 1, '2013-03-18 10:12:40'),
	(173, 'Manufacturing Solutions: Field Solutions', 2, NULL, NULL, NULL, NULL, 'Manufacturing Solutions: Field Solutions', 'Manufacturing Solutions: Field Solutions', NULL, NULL, 'Manufacturing Solutions', 'Manufacturing Solutions', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Field instruments are essential for measuring the different parameters on-site in order to ensure accurate monitoring and control. Reporting to the central control room, these solutions include the installation of field instruments, transmitters, and sensors, as well as liquid and gas analyzers, control valves and actuators. The aim is to monitor and measure all ongoing plant process variables so that the information can be transmitted to the control center.</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Our instrumentation teams are experts in programming, installing and testing instruments, as well as integrating them with new and existing automation systems installed to control process parameters. To offer the best and most suitable solutions to meet the needs of our clients, Giza Systems has partnered with a broad range of leading companies specialized in the field of instrumentation.&nbsp;</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Field instruments are essential for measuring the different parameters on-site in order to ensure accurate monitoring and control. Reporting to the central control room, these solutions include the installation of field instruments, transmitters, and sensors, as well as liquid and gas analyzers, control valves and actuators. The aim is to monitor and measure all ongoing plant process variables so that the information can be transmitted to the control center.</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Our instrumentation teams are experts in programming, installing and testing instruments, as well as integrating them with new and existing automation systems installed to control process parameters. To offer the best and most suitable solutions to meet the needs of our clients, Giza Systems has partnered with a broad range of leading companies specialized in the field of instrumentation.&nbsp;</div>\r\n', 1, 0, 1, '2013-03-18 10:12:40'),
	(174, 'Manufacturing Solutions: Fire & Gas Solutions', 2, NULL, NULL, NULL, NULL, 'Manufacturing Solutions: Fire & Gas Solutions', 'Manufacturing Solutions: Fire & Gas Solutions', NULL, NULL, 'Manufacturing Solutions', 'Manufacturing Solutions', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Giza Systems provides intelligent fire and gas alarm systems, networks and components to serve in both safe and hazardous areas.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Giza Systems provides intelligent fire and gas alarm systems, networks and components to serve in both safe and hazardous areas.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:40'),
	(175, 'Manufacturing Solutions: Power Distribution Stations', 2, NULL, NULL, NULL, NULL, 'Manufacturing Solutions: Power Distribution Stations', 'Manufacturing Solutions: Power Distribution Stations', NULL, NULL, 'Manufacturing Solutions', 'Manufacturing Solutions', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	These include Distribution Management Systems: used for low voltage networks, including MCC&rsquo;s, substation automation and switch gears.&nbsp;</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	These include Distribution Management Systems: used for low voltage networks, including MCC&rsquo;s, substation automation and switch gears.&nbsp;</div>\r\n', 1, 0, 1, '2013-03-18 10:12:40'),
	(176, 'Manufacturing Solutions: Communication Solutions', 2, NULL, NULL, NULL, NULL, 'Manufacturing Solutions: Communication Solutions', 'Manufacturing Solutions: Communication Solutions', NULL, NULL, 'Manufacturing Solutions', 'Manufacturing Solutions', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	These solutions include Microwave, Radio solutions, as well as WiMax and GPRS. They are employed as wireless media in order to provide and relay control and monitoring information to control centers.&nbsp;</div>\r\n<div style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	In addition to the tremendous relevance of Radio for the operation and maintenance of crews, these solutions become essential for the manufacturing industry.</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	When confronted with rough terrain, such as mountain-like areas, wireless communication solutions are the main resort due to the difficulty level of cabling.</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Our competitive advantage in fulfilling the dual functions of IT-based and engineering services geared towards the Utilities and Telecom industries enable manufacturers to benefit from our competence and our experience in vertical integration. We enable manufacturers to meet their needs by providing them with the most advanced, cutting-edge solutions.</div>', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	These solutions include Microwave, Radio solutions, as well as WiMax and GPRS. They are employed as wireless media in order to provide and relay control and monitoring information to control centers.&nbsp;</div>\r\n<div style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	In addition to the tremendous relevance of Radio for the operation and maintenance of crews, these solutions become essential for the manufacturing industry.</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	When confronted with rough terrain, such as mountain-like areas, wireless communication solutions are the main resort due to the difficulty level of cabling.</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Our competitive advantage in fulfilling the dual functions of IT-based and engineering services geared towards the Utilities and Telecom industries enable manufacturers to benefit from our competence and our experience in vertical integration. We enable manufacturers to meet their needs by providing them with the most advanced, cutting-edge solutions.</div>', 1, 0, 1, '2013-03-18 10:12:40'),
	(177, 'Manufacturing Solutions: Programmable Logic Controller (PLC)', 2, NULL, NULL, NULL, NULL, 'Manufacturing Solutions: Programmable Logic Controller (PLC)', 'Manufacturing Solutions: Programmable Logic Controller (PLC)', NULL, NULL, 'Manufacturing Solutions', 'Manufacturing Solutions', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	PLC technology is generally employed for some applications, which are necessary in many areas of factories/plants. We also offer a wide range of services for already installed systems in factories/plants.&nbsp;</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	PLC technology is generally employed for some applications, which are necessary in many areas of factories/plants. We also offer a wide range of services for already installed systems in factories/plants.&nbsp;</div>\r\n', 1, 0, 1, '2013-03-18 10:12:40'),
	(178, 'Oil and Gas: Programmable Logic Controller (PLC)', 2, NULL, NULL, NULL, NULL, 'Oil and Gas: Programmable Logic Controller (PLC)', 'Oil and Gas: Programmable Logic Controller (PLC)', NULL, NULL, 'Oil & Gas Solution', 'Oil & Gas Solution', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	PLC technology is generally employed in a number of oil and gas applications dealing with&nbsp;controlling and monitoring multiple process variables in different areas of the plant. We design,&nbsp;engineer, and deploy suitable PLC Systems based on the client&rsquo;s requirements and application&nbsp;needs. We also support our clients with testing, commissioning, start-up, and offer a wide range&nbsp;of services for plant operations, as well as after-sales services and support for already existing&nbsp;installations.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	PLC technology is generally employed in a number of oil and gas applications dealing with&nbsp;controlling and monitoring multiple process variables in different areas of the plant. We design,&nbsp;engineer, and deploy suitable PLC Systems based on the client&rsquo;s requirements and application&nbsp;needs. We also support our clients with testing, commissioning, start-up, and offer a wide range&nbsp;of services for plant operations, as well as after-sales services and support for already existing&nbsp;installations.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:40'),
	(179, 'Manufacturing Solutions: IP Camera Surveillance Systems', 2, NULL, NULL, NULL, NULL, 'Manufacturing Solutions: IP Camera Surveillance Systems', 'Manufacturing Solutions: IP Camera Surveillance Systems', NULL, NULL, 'Manufacturing Solutions', 'Manufacturing Solutions', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Giza Systems provides IP Camera Systems&nbsp;with a diverse range of industrial specifications&nbsp;to include the prevention against fire damage,&nbsp;liquids erosion, and exploitation or tampering.&nbsp;In addition, our site security systems also&nbsp;include fencing intrusion detection security&nbsp;systems and advanced access control up to&nbsp;the sector and cabinet level to serve different&nbsp;industries, which can be employed in a variety&nbsp;of environmental conditions.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Giza Systems provides IP Camera Systems&nbsp;with a diverse range of industrial specifications&nbsp;to include the prevention against fire damage,&nbsp;liquids erosion, and exploitation or tampering.&nbsp;In addition, our site security systems also&nbsp;include fencing intrusion detection security&nbsp;systems and advanced access control up to&nbsp;the sector and cabinet level to serve different&nbsp;industries, which can be employed in a variety&nbsp;of environmental conditions.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:40'),
	(180, 'Manufacturing Solutions: Training Simulators', 2, NULL, NULL, NULL, NULL, 'Manufacturing Solutions: Training Simulators', 'Manufacturing Solutions: Training Simulators', NULL, NULL, 'Manufacturing Solutions', 'Manufacturing Solutions', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	<div id="cke_pastebin">\r\n		These are tailor-made models that simulate the plant and its relevant possible situations, measuring and analyzing the reaction of the plant to operator actions and orders.</div>\r\n</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	<div id="cke_pastebin">\r\n		These are tailor-made models that simulate the plant and its relevant possible situations, measuring and analyzing the reaction of the plant to operator actions and orders.</div>\r\n</div>\r\n', 1, 0, 1, '2013-03-18 10:12:40'),
	(181, 'Manufacturing Solutions: Back Office Solutions', 2, NULL, NULL, NULL, NULL, 'Manufacturing Solutions: Back Office Solutions', 'Manufacturing Solutions: Back Office Solutions', NULL, NULL, 'Manufacturing Solutions', 'Manufacturing Solutions', '<p style="text-align: justify;">\r\n	These solutions include billing solutions, ERP, GIS, historian systems, business intelligence&nbsp;solutions among other applications. We also provide required processing and storage platformsin addition to information networks infrastructure. Giza Systems has the capabilities and in-depth&nbsp;knowledge to fulfill clients&rsquo; unique needs based on our core understanding of the significance&nbsp;of operational efficiency and integrity, as well as the necessary reliability &nbsp;measures, for the&nbsp;implementation of such projects.</p>\r\n', '<p style="text-align: justify;">\r\n	These solutions include billing solutions, ERP, GIS, historian systems, business intelligence&nbsp;solutions among other applications. We also provide required processing and storage platformsin addition to information networks infrastructure. Giza Systems has the capabilities and in-depth&nbsp;knowledge to fulfill clients&rsquo; unique needs based on our core understanding of the significance&nbsp;of operational efficiency and integrity, as well as the necessary reliability &nbsp;measures, for the&nbsp;implementation of such projects.</p>\r\n', 1, 0, 1, '2013-03-18 10:12:40'),
	(182, 'Manufacturing Solutions: Business Intelligence Solutions', 2, NULL, NULL, NULL, NULL, 'Manufacturing Solutions: Business Intelligence Solutions', 'Manufacturing Solutions: Business Intelligence Solutions', NULL, NULL, 'Manufacturing Solutions', 'Manufacturing Solutions', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Knowledge management efforts focus on organizational objectives such as improved&nbsp;performance, customer satisfaction, quality of service, cash flow and other performance&nbsp;metrics. Business Intelligence technologies provide historical, current, and predictive views of&nbsp;business operations. Common functions of business intelligence technologies involve reporting,&nbsp;online analytical processing, analytics, data mining, business performance management, and&nbsp;predictive analytics. The purpose of business intelligence solutions is to support better business&nbsp;decision-making through the transformation of raw data into meaningful and useful information.&nbsp;Such information is imperative to enable organizations attain more effective, strategic, tactical,&nbsp;and operational insights, as well as make informed decisions.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Knowledge management efforts focus on organizational objectives such as improved&nbsp;performance, customer satisfaction, quality of service, cash flow and other performance&nbsp;metrics. Business Intelligence technologies provide historical, current, and predictive views of&nbsp;business operations. Common functions of business intelligence technologies involve reporting,&nbsp;online analytical processing, analytics, data mining, business performance management, and&nbsp;predictive analytics. The purpose of business intelligence solutions is to support better business&nbsp;decision-making through the transformation of raw data into meaningful and useful information.&nbsp;Such information is imperative to enable organizations attain more effective, strategic, tactical,&nbsp;and operational insights, as well as make informed decisions.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:40'),
	(183, 'Manufacturing Solutions: Environmental Solutions', 2, NULL, NULL, NULL, NULL, 'Manufacturing Solutions: Environmental Solutions', 'Manufacturing Solutions: Environmental Solutions', NULL, NULL, 'Manufacturing Solutions', 'Manufacturing Solutions', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Environmental analysis is the use of analytical chemistry and other&nbsp;techniques to study the environment. The purpose of this is to monitor&nbsp;and study levels of pollutant gases such as SO2, CO and NOx in the&nbsp;atmosphere, rivers and other specific settings.&nbsp;</div>\r\n<div style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div style="text-align: justify;">\r\n	To measure the impact of the power plant emissions on the surrounding&nbsp;environment, a number of measuring analyzers are arranged onto&nbsp;a panel and placed in a protected location in the power plant. This&nbsp;analysis is performed both before and after the operation of the power&nbsp;plant. It is usually carried out within a time frame of six months.</div>\r\n<div style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	We rely on high end analyzers in handling all the required tasks for such&nbsp;projects, including systems integration, maintenance, and engineering.&nbsp;Sophisticated pollution monitoring systems are delivered to the&nbsp;customers to maintain a cleaner, safer, and healthier environment.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	Environmental analysis is the use of analytical chemistry and other&nbsp;techniques to study the environment. The purpose of this is to monitor&nbsp;and study levels of pollutant gases such as SO2, CO and NOx in the&nbsp;atmosphere, rivers and other specific settings.&nbsp;</div>\r\n<div style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div style="text-align: justify;">\r\n	To measure the impact of the power plant emissions on the surrounding&nbsp;environment, a number of measuring analyzers are arranged onto&nbsp;a panel and placed in a protected location in the power plant. This&nbsp;analysis is performed both before and after the operation of the power&nbsp;plant. It is usually carried out within a time frame of six months.</div>\r\n<div style="text-align: justify;">\r\n	&nbsp;</div>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	We rely on high end analyzers in handling all the required tasks for such&nbsp;projects, including systems integration, maintenance, and engineering.&nbsp;Sophisticated pollution monitoring systems are delivered to the&nbsp;customers to maintain a cleaner, safer, and healthier environment.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:40'),
	(184, 'Manufacturing Solutions: Emergency ShutDown (ESD) Systems', 2, NULL, NULL, NULL, NULL, 'Manufacturing Solutions: Emergency ShutDown (ESD) Systems', 'Manufacturing Solutions: Emergency ShutDown (ESD) Systems', NULL, NULL, 'Manufacturing Solutions', 'Manufacturing Solutions', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	In the event of a critical alarm (fire, high pressure,&nbsp;leak, etc.), Emergency Shutdown (ESD)&nbsp;Systems process a specific routine to control&nbsp;the situation, which is identified beforehand&nbsp;based on the client&rsquo;s needs.</div>\r\n', '<p>\r\n	&nbsp;</p>\r\n<div id="cke_pastebin" style="text-align: justify;">\r\n	In the event of a critical alarm (fire, high pressure,&nbsp;leak, etc.), Emergency Shutdown (ESD)&nbsp;Systems process a specific routine to control&nbsp;the situation, which is identified beforehand&nbsp;based on the client&rsquo;s needs.</div>\r\n', 1, 0, 1, '2013-03-18 10:12:40'),
	(185, 'Customer Management', 1, NULL, NULL, NULL, NULL, 'Customer Management', 'Customer Management', 'Customer Management, Giza Systems', 'Customer Management, Giza Systems', 'This page linked to the middle box in the home page of the website.', 'This page linked to the middle box in the home page of the website.', '<p>\r\n	We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.&nbsp;We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.&nbsp;We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.</p>\r\n<p>\r\n	We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.</p>\r\n<p>\r\n	We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.</p>\r\n<p>\r\n	We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.</p>\r\n', '<p>\r\n	We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.&nbsp;We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.&nbsp;We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.</p>\r\n<p>\r\n	We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.</p>\r\n<p>\r\n	We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.</p>\r\n<p>\r\n	We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.</p>\r\n', 1, 0, 1, '2013-03-18 10:19:43'),
	(186, 'Corporate Profile', 1, NULL, NULL, NULL, NULL, 'Corporate Profile', 'Corporate Profile', 'Giza Systems Corporate Profile', 'Giza Systems Corporate Profile', 'This page linked to the right box in the home page.', 'This page linked to the right box in the home page.', '<p>\r\n	We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.&nbsp;We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.&nbsp;We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.</p>\r\n<p>\r\n	We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.</p>\r\n<p>\r\n	We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.</p>\r\n<p>\r\n	We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.</p>\r\n', '<p>\r\n	We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.&nbsp;We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.&nbsp;We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.</p>\r\n<p>\r\n	We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.</p>\r\n<p>\r\n	We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.</p>\r\n<p>\r\n	We are totally focused on our customers and on providing them with integrated end-to-end IT solutions and consultancy services that enable them to streamline their business operations, reduce their costs, drive better performance.</p>\r\n', 1, 0, 1, '2013-03-18 10:19:43'),
	(187, 'Control Systems', 1, NULL, NULL, NULL, NULL, 'Control Systems', 'Control Systems', NULL, NULL, 'Oil & Gas Solution', 'Oil & Gas Solution', '<p>\r\n	Control Systems</p>\r\n<p>\r\n	These systems control a number of vital processes from within the production plant. They include production and processing, as well as separating and purifying any required elements.&nbsp;</p>\r\n', '<p>\r\n	Control Systems</p>\r\n<p>\r\n	These systems control a number of vital processes from within the production plant. They include production and processing, as well as separating and purifying any required elements.&nbsp;</p>\r\n', 1, 0, 1, '2013-03-18 10:19:43'),
	(188, 'Media Contacts', 0, '', '', '', '', 'Media Center ', 'Media Center ', '', '', '<p><br /><br /></p>\r\n<p>Telephone: +202 261 46000</p>\r\n<p>Fax: +202 261 46001</p>\r\n<p>Email: marketing@gizasystems.com</p>', '', '<p><br /><br /></p>\r\n<p>Telephone: +202 261 46000</p>\r\n<p>Fax: +202 261 46001</p>\r\n<p>Email: marketing@gizasystems.com</p>', '', 1, 0, 1, '2013-04-05 10:19:13');
/*!40000 ALTER TABLE `page` ENABLE KEYS */;


-- Dumping structure for table giza.page_category
CREATE TABLE IF NOT EXISTS `page_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.page_category: 3 rows
/*!40000 ALTER TABLE `page_category` DISABLE KEYS */;
INSERT INTO `page_category` (`id`, `name`, `name_ar`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'Home Page Boxes', 'بوكسات الصفحة الرئيسية', 1, 0, 1, '2013-03-18 08:37:14'),
	(2, 'Content', 'المحتوى', 1, 0, 1, '2013-03-18 08:36:39'),
	(3, 'Careers', 'الوظائف', 1, 0, 1, '2013-03-18 08:37:50');
/*!40000 ALTER TABLE `page_category` ENABLE KEYS */;


-- Dumping structure for table giza.partner
CREATE TABLE IF NOT EXISTS `partner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `brief` tinytext,
  `logo` varchar(255) DEFAULT NULL,
  `contact_title` varchar(255) DEFAULT NULL,
  `contact_firstname` varchar(255) DEFAULT NULL,
  `contact_lastname` varchar(255) DEFAULT NULL,
  `contact_position` varchar(255) DEFAULT NULL,
  `contact_mobile` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `interests` varchar(500) DEFAULT NULL,
  `registeration_datetime` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `active_code` varchar(255) NOT NULL,
  `approved` tinyint(4) NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `last_user_id` int(11) NOT NULL,
  `last_modify_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.partner: ~6 rows (approximately)
/*!40000 ALTER TABLE `partner` DISABLE KEYS */;
INSERT INTO `partner` (`id`, `name`, `username`, `password`, `website`, `address`, `phone`, `brief`, `logo`, `contact_title`, `contact_firstname`, `contact_lastname`, `contact_position`, `contact_mobile`, `contact_email`, `interests`, `registeration_datetime`, `active`, `active_code`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(18, 'EgyOS', 'EgyOS65z', 'ArpzcEx', 'www.egy-os.com', 'banha', '3423423423', 'brief', '/added/uploads/logo/partner/1365537014_logo.jpg', 'Mr', 'Gouda', 'Elalfy', 'Senior Developer', '01119793075', 'gouda2@4jawaly.com', 'Solutions,New Projects / Awards', '2013-04-09 21:50:14', 0, 'rc0Bwsqzo3Ag2nh', 1, 0, 1, '2013-04-09 22:04:07'),
	(19, 'Ahmed', 'Ahmedvx9', 'YSdaCb6', 'Mohamed', 'bs', '3423423423', 'brief', '/added/uploads/logo/partner/1365537113_logo.jpg', 'Mr', 'Ahmed', 'Aamy', 'Developer', '01119793075', 'gouda1@4jawaly.com', 'Receive corporate newsletter,Giza Systems Publications', '2013-04-09 21:51:53', 0, 'omy05IFKhdNtzTZ', 1, 0, 1, '2013-04-09 22:04:06'),
	(20, 'Mohamed', 'Mohamedvtd', '9Z1kJjg', 'www.egy-os.com', 'address', '3423423423', 'breif', '/added/uploads/logo/partner/1365537499_logo.jpg', 'te', 'Mohamed', 'Ahmed', 'Developr', '01119793075', 'gouda@4jawaly.com', 'New Projects / Awards,Giza Systems Publications,Giza Systems Events', '2013-04-09 22:02:35', 1, '4T9jAvtPF30gzNV', 1, 0, 1, '2013-04-09 22:04:05'),
	(21, 'dsd', 'p1', 'p1', 'sdsdsd', 'sdsd', '423423423', '34234232342', '/added/uploads/logo/partner/1365577573_logo.jpg', 'fdf', 'dfdf', 'dfdf', 'dfdfdf', '34534534', 'gouda@yahoo.com', 'Solutions,Receive corporate newsletter,CSR projects,Giza Systems Events,Job Opportunities', '2013-04-10 09:13:22', 1, 'admin', 1, 0, 1, '2013-04-10 09:13:22'),
	(22, 'Ahmed', 'p1', 'csadas', '', '', '', '', '/added/uploads/logo/partner/1365622615_logo.jpg', '', '', '', '', '', '', 'Solutions,Receive corporate newsletter', '2013-04-10 21:36:55', 1, 'admin', 1, 0, 1, '2013-04-10 21:36:55'),
	(23, 'wewe323', 'wewe323gbN', 'Q6ENKci', '', '32323', '323232323', 'sdass', '', '232', 'qw', 'qw', 'qw', '345634534', 'gouda@sfdf.fdfd', '', '2013-07-19 16:01:51', 0, 'GRU3TvAVW09eQpB', 0, 0, 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `partner` ENABLE KEYS */;


-- Dumping structure for table giza.partner_industries
CREATE TABLE IF NOT EXISTS `partner_industries` (
  `partner_id` int(10) DEFAULT NULL,
  `industry_id` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table giza.partner_industries: 10 rows
/*!40000 ALTER TABLE `partner_industries` DISABLE KEYS */;
INSERT INTO `partner_industries` (`partner_id`, `industry_id`) VALUES
	(21, 4),
	(21, 7),
	(20, 6),
	(20, 7),
	(20, 9),
	(19, 6),
	(19, 8),
	(18, 2),
	(18, 4),
	(18, 7);
/*!40000 ALTER TABLE `partner_industries` ENABLE KEYS */;


-- Dumping structure for table giza.partner_solutions
CREATE TABLE IF NOT EXISTS `partner_solutions` (
  `partner_id` int(10) DEFAULT NULL,
  `solution_id` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table giza.partner_solutions: 10 rows
/*!40000 ALTER TABLE `partner_solutions` DISABLE KEYS */;
INSERT INTO `partner_solutions` (`partner_id`, `solution_id`) VALUES
	(21, 5),
	(20, 6),
	(20, 9),
	(20, 11),
	(19, 4),
	(19, 6),
	(19, 8),
	(18, 7),
	(18, 8),
	(18, 11);
/*!40000 ALTER TABLE `partner_solutions` ENABLE KEYS */;


-- Dumping structure for table giza.partner_survey
CREATE TABLE IF NOT EXISTS `partner_survey` (
  `partner_id` int(10) unsigned NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(1000) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`partner_id`,`question_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table giza.partner_survey: 6 rows
/*!40000 ALTER TABLE `partner_survey` DISABLE KEYS */;
INSERT INTO `partner_survey` (`partner_id`, `question_id`, `answer`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(21, 6, 'no', 0, 0, NULL, '2013-05-08 00:08:53'),
	(21, 5, 'test', 0, 0, NULL, '2013-05-08 00:08:53'),
	(21, 4, '9,10,11', 0, 0, NULL, '2013-05-08 00:08:53'),
	(21, 3, 'no', 0, 0, NULL, '2013-05-08 00:08:53'),
	(21, 1, '', 0, 0, NULL, '2013-05-08 00:08:53'),
	(21, 2, '7', 0, 0, NULL, '2013-05-08 00:08:53');
/*!40000 ALTER TABLE `partner_survey` ENABLE KEYS */;


-- Dumping structure for table giza.partner_survey_answer
CREATE TABLE IF NOT EXISTS `partner_survey_answer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `question_id` int(10) NOT NULL DEFAULT '0',
  `name` varchar(1000) DEFAULT NULL,
  `name_ar` varchar(1000) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.partner_survey_answer: 10 rows
/*!40000 ALTER TABLE `partner_survey_answer` DISABLE KEYS */;
INSERT INTO `partner_survey_answer` (`id`, `question_id`, `name`, `name_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 1, 'xzxzxzxzx', 'xzxzxzx', 1, 1, 0, 1, '2013-05-04 21:52:30'),
	(4, 2, 'Less than 6 months', 'Less than 6 months', 1, 1, 0, 1, '2013-05-05 09:34:19'),
	(3, 1, 'zzzzzzzz', '', 3, 1, 0, 1, '2013-05-04 21:52:30'),
	(5, 2, '6-12 months', '6-12 months', 2, 1, 0, 1, '2013-05-05 09:34:19'),
	(6, 2, '1-2 years', '1-2 years', 3, 1, 0, 1, '2013-05-05 09:34:19'),
	(7, 2, '3-4 years', '3-4 years', 4, 1, 0, 1, '2013-05-05 09:34:19'),
	(8, 2, '5 years or more', '5 years or more', 5, 1, 0, 1, '2013-05-05 09:34:19'),
	(9, 4, ' Prompt response time', ' Prompt response time', 1, 1, 0, 1, '2013-05-05 09:36:07'),
	(10, 4, 'Quality of response', 'Quality of response', 2, 1, 0, 1, '2013-05-05 09:36:07'),
	(11, 4, 'Efficiency of point of contact person', 'Efficiency of point of contact person', 3, 1, 0, 1, '2013-05-05 09:36:07');
/*!40000 ALTER TABLE `partner_survey_answer` ENABLE KEYS */;


-- Dumping structure for table giza.partner_survey_question
CREATE TABLE IF NOT EXISTS `partner_survey_question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` tinytext,
  `question_ar` tinytext,
  `answer_type` enum('yes_no','true_false','choose_answer','multi_choice','small_text','large_text') DEFAULT NULL,
  `page_no` int(11) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.partner_survey_question: 6 rows
/*!40000 ALTER TABLE `partner_survey_question` DISABLE KEYS */;
INSERT INTO `partner_survey_question` (`id`, `question`, `question_ar`, `answer_type`, `page_no`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, '   asASas', '   sasasasa', 'choose_answer', 2, 2, 0, 0, 1, '2013-05-05 09:17:33'),
	(2, '1. When did you enter into a partnership with Giza Systems?', '  Question 2 ', 'choose_answer', 1, 1, 1, 0, 1, '2013-05-05 09:34:19'),
	(3, ' 2. Would you recommend Giza Systems to others?', ' 2. Would you recommend Giza Systems to others?', 'yes_no', 2, 3, 1, 0, 1, '2013-05-05 09:34:39'),
	(4, ' 2.a If YES, select all the reasons that are applicable:', ' 2.a If YES, select all the reasons that are applicable:', 'multi_choice', 2, 4, 1, 0, 1, '2013-05-05 09:36:07'),
	(5, ' If other, please specify: ', ' If other, please specify: ', 'large_text', 2, 5, 1, 0, 1, '2013-05-05 09:36:45'),
	(6, ' 4. Are you satisfied with the partnership?', ' 4. Are you satisfied with the partnership?', 'yes_no', 3, 6, 1, 0, 1, '2013-05-05 09:37:44');
/*!40000 ALTER TABLE `partner_survey_question` ENABLE KEYS */;


-- Dumping structure for table giza.screen
CREATE TABLE IF NOT EXISTS `screen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `name_ar` varchar(50) NOT NULL,
  `url` varchar(250) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `last_user_id` int(11) NOT NULL,
  `last_modify_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.screen: 53 rows
/*!40000 ALTER TABLE `screen` DISABLE KEYS */;
INSERT INTO `screen` (`id`, `code`, `name`, `name_ar`, `url`, `parent_id`, `sort`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'ums', 'User Management', 'نظام ادارة المستخدمين', 'user', 0, 0, 0, 0, '0000-00-00 00:00:00'),
	(2, 'user', 'Users', 'المستخدمين', 'user', 1, 2, 0, 0, '0000-00-00 00:00:00'),
	(3, 'user_group', 'Users Groups', 'مجموعات المستخدمين', 'user_group', 1, 1, 0, 0, '0000-00-00 00:00:00'),
	(4, 'screen', 'Screens', 'الشاشات', 'screen', 1, 0, 1, 0, '0000-00-00 00:00:00'),
	(5, 'sys_management', 'Website Management', 'ادارة الموقع', 'setting', 0, 0, 0, 1, '2012-12-17 11:32:21'),
	(6, 'setting', 'Public Settings', 'الاعدادات', 'setting', 5, 0, 0, 1, '2012-12-17 16:00:13'),
	(7, 'user_history', 'Users Histroy', 'تاريخ المستخدم', 'user_history', 1, 3, 0, 1, '2012-12-18 12:53:13'),
	(8, 'content', 'Content', 'المحتوى', 'page', 0, 400, 0, 0, '0000-00-00 00:00:00'),
	(9, 'page', 'Pages', 'الصفحات', 'page', 8, 401, 0, 0, '0000-00-00 00:00:00'),
	(10, 'industry', 'Industries', 'الصناعات', 'industry', 8, 403, 0, 0, '0000-00-00 00:00:00'),
	(11, 'solution', 'Solutions', 'الحلول', 'solution', 8, 404, 0, 0, '0000-00-00 00:00:00'),
	(12, 'video_photo', 'Videos And Photos', 'الفيديوهات و الصور', 'mediaseccategory', 0, 500, 0, 0, '0000-00-00 00:00:00'),
	(13, 'mediaseccategory', 'Media Section Categories', 'تصنيفات اقسام الميديا', 'mediaseccategory', 12, 501, 0, 0, '0000-00-00 00:00:00'),
	(14, 'mediasection', 'Media Sections', 'اقسام الميديا', 'mediasection', 12, 502, 0, 0, '0000-00-00 00:00:00'),
	(15, 'mediaitem', 'Media Items', 'الميديا', 'mediaitem', 12, 503, 0, 0, '0000-00-00 00:00:00'),
	(16, 'gallery', 'Galleries', 'البومات الصور', 'gallery', 12, 504, 0, 0, '0000-00-00 00:00:00'),
	(17, 'websitevisitor', 'Website Visitors', 'زوار الموقع', 'partner', 0, 700, 0, 0, '0000-00-00 00:00:00'),
	(18, 'alumni', 'Alumnies', 'الموظفين', 'alumni', 17, 701, 0, 0, '0000-00-00 00:00:00'),
	(19, 'client', 'Clients', 'العملاء', 'client', 17, 702, 0, 0, '0000-00-00 00:00:00'),
	(20, 'partner', 'Partners', 'المساهمين', 'partner', 17, 703, 0, 0, '0000-00-00 00:00:00'),
	(21, 'content_setting', 'Content setting', 'اعدادات المحتوى', 'contentsetting', 8, 404, 1, 0, '0000-00-00 00:00:00'),
	(22, 'special_page', 'Special Pages', 'صفحات خاصة', 'managementteam', 0, 800, 0, 0, '0000-00-00 00:00:00'),
	(23, 'management_team', 'Management team', 'فريق الادارة', 'managementteam', 22, 801, 0, 0, '0000-00-00 00:00:00'),
	(24, 'award', 'Awards', 'الشهادات', 'award', 22, 802, 0, 0, '0000-00-00 00:00:00'),
	(25, 'office', 'Offices', 'المكاتب', 'office', 22, 804, 0, 0, '0000-00-00 00:00:00'),
	(26, 'office_event', 'Offices Events', 'احداث المكتب', 'officeevent', 22, 806, 0, 0, '0000-00-00 00:00:00'),
	(27, 'subsidiary', 'Subsidiaries', 'الشركات التابعة', 'subsidiary', 22, 803, 0, 0, '0000-00-00 00:00:00'),
	(28, 'office_setting', 'Offices Settings', 'اعدادات المكاتب', 'officesetting', 22, 805, 0, 0, '0000-00-00 00:00:00'),
	(29, 'menulink', 'Menus And Links', 'القوائم و الروابط', 'menu', 0, 1000, 0, 0, '0000-00-00 00:00:00'),
	(30, 'menu', 'Menus', 'القوائم', 'menu', 29, 1001, 0, 0, '0000-00-00 00:00:00'),
	(31, 'menulink', 'Menu Links', 'روابط القوائم', 'menulink', 29, 1002, 0, 0, '0000-00-00 00:00:00'),
	(32, 'pagecat', 'Pages Catgories', 'تصنيفات الصفحات', 'pagecat', 8, 402, 0, 0, '0000-00-00 00:00:00'),
	(33, 'photo', 'Photos', 'الصور', 'photo', 12, 505, 0, 0, '0000-00-00 00:00:00'),
	(34, 'menumap', 'Menu Map', 'خريطة القوائم', 'menumap', 29, 1003, 0, 0, '0000-00-00 00:00:00'),
	(35, 'importdata', 'Import Data', 'استيراد البيانات', 'importpage', 0, 1100, 1, 0, '0000-00-00 00:00:00'),
	(36, 'importpage', 'Import Pages', 'استيراد الصفحات', 'importpage', 35, 1101, 0, 0, '0000-00-00 00:00:00'),
	(37, 'website', 'Website', 'الموقع', 'homebox', 0, 900, 0, 0, '0000-00-00 00:00:00'),
	(38, 'homebox', 'Home Boxes', 'بوكسات الصفحة الرئيسية', 'homebox', 37, 901, 0, 0, '0000-00-00 00:00:00'),
	(39, 'emailTemplate', 'Email Templates', 'نماذج الايميل', 'emailTemplate', 5, 201, 0, 0, '0000-00-00 00:00:00'),
	(40, 'collaborate', 'Collaborate with us', 'تعاون معنا', 'collaborate', 17, 704, 0, 0, '0000-00-00 00:00:00'),
	(41, 'subscriber', 'Subscribers in Nozzom', 'المشتركين فى نظم', 'subscriber', 17, 705, 0, 0, '0000-00-00 00:00:00'),
	(42, 'career', 'Careers', 'التوظيف', 'job', 0, 1200, 0, 0, '0000-00-00 00:00:00'),
	(43, 'job', 'Jobs', 'الوظائف', 'job', 42, 1201, 0, 0, '0000-00-00 00:00:00'),
	(44, 'business_line', 'Business lines', 'خطوط العمل', 'businessline', 42, 1204, 0, 0, '0000-00-00 00:00:00'),
	(45, 'hr_main_data', 'Career Main Data', 'البيانات الاساسية للتوظيف', 'hrmaindata', 42, 1203, 0, 0, '0000-00-00 00:00:00'),
	(46, 'hr_candidate', 'Candidates', 'الباحثين عن الوظائف', 'candidate', 42, 1202, 0, 0, '0000-00-00 00:00:00'),
	(47, 'client_survey', 'Client Survey questions', 'اسئلة سيرفاى العملاء', 'clientsurvey', 17, 702, 0, 0, '0000-00-00 00:00:00'),
	(48, 'partner_survey', 'Partner survey questions', 'اسئلة سيرفاى المساهمين', 'partnersurvey', 17, 703, 0, 0, '0000-00-00 00:00:00'),
	(49, 'case_study', 'Case studies', 'دراسة الحالات', 'casestudy', 22, 806, 0, 0, '0000-00-00 00:00:00'),
	(50, 'static_page_banner', 'Static page banner', 'بانرات الصفحات الثابتة', 'staticpagebanner', 37, 902, 0, 0, '0000-00-00 00:00:00'),
	(51, 'send_email', 'Send email', 'ارسال ايميل', 'sendemail', 37, 903, 0, 0, '0000-00-00 00:00:00'),
	(52, 'client_survey_answer', 'Client survey', 'السيرفاى للعملاء', 'clientsurveyanswer', 17, 702, 1, 0, '0000-00-00 00:00:00'),
	(53, 'partner_survey_answer', 'Partner survey', 'السيرفاى للمساهمين', 'partnersurveyanswer', 17, 703, 1, 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `screen` ENABLE KEYS */;


-- Dumping structure for table giza.screen_function
CREATE TABLE IF NOT EXISTS `screen_function` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `name_ar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.screen_function: 4 rows
/*!40000 ALTER TABLE `screen_function` DISABLE KEYS */;
INSERT INTO `screen_function` (`id`, `name`, `name_ar`) VALUES
	(1, 'Add', 'اضافة'),
	(2, 'Edit', 'تعديل'),
	(3, 'Delete', 'حذف'),
	(4, 'View', 'رؤية');
/*!40000 ALTER TABLE `screen_function` ENABLE KEYS */;


-- Dumping structure for table giza.setting
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `paging_no_of_pages` int(10) DEFAULT NULL,
  `last_user_id` int(10) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.setting: 1 rows
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` (`id`, `paging_no_of_pages`, `last_user_id`, `last_modify_date`) VALUES
	(1, 60, 1, '2013-03-30 21:14:54');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;


-- Dumping structure for table giza.solution
CREATE TABLE IF NOT EXISTS `solution` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `alias` varchar(250) NOT NULL,
  `menu_icon` tinytext,
  `banner_image_thumbs` text,
  `banner_files` text,
  `banner_image_thumb_selected` tinytext,
  `banner_file_selected` tinytext,
  `title` varchar(250) DEFAULT NULL,
  `title_ar` varchar(250) DEFAULT NULL,
  `seo_words` tinytext,
  `seo_words_ar` tinytext,
  `brief` text,
  `brief_ar` text,
  `body` text,
  `body_ar` text,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.solution: 11 rows
/*!40000 ALTER TABLE `solution` DISABLE KEYS */;
INSERT INTO `solution` (`id`, `alias`, `menu_icon`, `banner_image_thumbs`, `banner_files`, `banner_image_thumb_selected`, `banner_file_selected`, `title`, `title_ar`, `seo_words`, `seo_words_ar`, `brief`, `brief_ar`, `body`, `body_ar`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(2, 'Enterprise Applications', '/added/uploads/banner/solution/1362832910award.jpg', '/added/uploads/banner/solution/1362832775_thumb.jpg', '/added/uploads/banner/solution/1362832775.jpg', '/added/uploads/banner/solution/1362832775_thumb.jpg', '/added/uploads/banner/solution/1362832775.jpg', 'Enterprise Applications', 'Enterprise Applications', '', '', '', '', '<p>Enterprise Applications is an all encompassing line of business that offers organizations a way to streamline all their business processes to ensure cost efficiency and effectiveness</p>', '<p>Enterprise Applications is an all encompassing line of business that offers organizations a way to streamline all their business processes to ensure cost efficiency and effectiveness</p>', 1, 0, 1, '2013-03-23 20:42:52'),
	(3, 'Telecom OSS', '', '', '', '', '', 'Telecom OSS', 'Telecom OSS', '', '', '', '', '<p>Telecom Operational Support Systems provide solutions that streamline&nbsp; operations for all telecom providers</p>', '<p>Telecom Operational Support Systems provide solutions that streamline&nbsp; operations for all telecom providers</p>', 1, 0, 1, '2013-03-23 20:44:01'),
	(4, 'Process Control', '', '', '', '', '', 'Process Control', 'Process Control', 'Process Control', 'Process Control', '', '', '<p>Portfolio of solutions that deliver all the needs for process control operations</p>', '<p>Portfolio of solutions that deliver all the needs for process control operations</p>', 1, 0, 1, '2013-03-23 20:44:59'),
	(5, 'SCADA', '', '', '', '', '', 'SCADA', 'SCADA', 'SCADA', 'SCADA', '', '', '<p>Our SCADA line of business solutions aims at ensuring the highest levels of supervisory, monitoring, and control for a diverse range of industries</p>', '<p>Our SCADA line of business solutions aims at ensuring the highest levels of supervisory, monitoring, and control for a diverse range of industries</p>', 1, 0, 1, '2013-03-23 20:46:04'),
	(6, 'Smart Buildings', '/added/uploads/banner/solution/1364064469award.jpg', '', '', '', '', 'Smart Buildings', 'Smart Buildings', 'Smart Buildings', 'Smart Buildings', '', '', '<p>The portfolio of Giza Systems encompasses a wide range of offerings targeting solutions for smart cities. Our uniqueness comes from embedding the evolving concept and definition of smart in our solutions and<br />services.</p>', '<p>The portfolio of Giza Systems encompasses a wide range of offerings targeting solutions for smart cities. Our uniqueness comes from embedding the evolving concept and definition of smart in our solutions and<br />services.</p>', 1, 0, 1, '2013-03-23 20:47:49'),
	(7, 'Building Automation Management Systems', '/added/uploads/banner/solution/1364064924award.jpg', '', '', '', '', 'Building Automation Management Systems', 'Building Automation Management Systems', 'Building Automation Management Systems', 'Building Automation Management Systems', '', '', '<p>Building Management Solutions (BMS) do not only help benefit from automation and control, but to obtain data that is shared amongst the different systems to ensure both efficient use of resources, safety and the security of occupants.</p>', '<p>Building Management Solutions (BMS) do not only help benefit from automation and control, but to obtain data that is shared amongst the different systems to ensure both efficient use of resources, safety and the security of occupants.</p>', 1, 0, 1, '2013-03-23 20:55:24'),
	(8, 'GIS', '/added/uploads/banner/solution/1364066340award.jpg', '', '', '', '', 'GIS', 'GIS', '', '', '', '', '<p>Geographical Information Systems keep track of the network and update information of transformers, switch gears, cables, etc. They are also used to design and plan future network expansions.</p>', '<p>Geographical Information Systems keep track of the network and update information of transformers, switch gears, cables, etc. They are also used to design and plan future network expansions.</p>', 1, 0, 1, '2013-03-23 21:19:00'),
	(9, 'Transmission & Distribution', '', '', '', '', '', 'Transmission & Distribution', 'Transmission & Distribution', 'Transmission & Distribution', 'Transmission & Distribution', '', '', '<p>Solutions involving Transmission and Distribution promise utilities the most cutting-edge technologies</p>', '<p>Solutions involving Transmission and Distribution promise utilities the most cutting-edge technologies</p>', 1, 0, 1, '2013-03-23 21:23:09'),
	(10, 'Field Solutions', '', '', '', '', '', 'Field Solutions', 'Field Solutions', 'Field Solutions', 'Field Solutions', '', '', '<p>Our portfolio offer the most advanced field solutions to monitor and measure all ongoing plant process variables so that the information can be transmitted to the control center. Our instrumentation teams are experts in programming, installing and testing instruments, as<br />well as integrating them with new and existing automation systems installed to control process parameters</p>', '<p>Our portfolio offer the most advanced field solutions to monitor and measure all ongoing plant process variables so that the information can be transmitted to the control center. Our instrumentation teams are experts in programming, installing and testing instruments, as<br />well as integrating them with new and existing automation systems installed to control process parameters</p>', 1, 0, 1, '2013-03-23 21:24:21'),
	(11, 'Information Infrastructure', '', '', '', '', '', 'Information Infrastructure', 'Information Infrastructure', 'Information Infrastructure', 'Information Infrastructure', '', '', '<p>Information Infrastructure offers our clients top-notch solutions in data center solutions, contact centers, and telecom infrastructure.</p>', '<p>Information Infrastructure offers our clients top-notch solutions in data center solutions, contact centers, and telecom infrastructure.</p>', 1, 0, 1, '2013-03-23 21:25:34'),
	(12, 'Smart Grids', '', '', '', '', '', 'Smart Grids', 'Smart Grids', 'Smart Grids', 'Smart Grids', '', '', '<p>Smart grids are the new approach to optimize the already existing infrastructure while achieving interconnectedness, interoperability, higher operational efficiencies, reduction in energy consumption, and increase in reliability. Simply, smart grids enable optimal efficacy in the management of power to allow for the most efficient and economical use for utilities, as well as consumers.</p>', '<p>Smart grids are the new approach to optimize the already existing infrastructure while achieving interconnectedness, interoperability, higher operational efficiencies, reduction in energy consumption, and increase in reliability. Simply, smart grids enable optimal efficacy in the management of power to allow for the most efficient and economical use for utilities, as well as consumers.</p>', 1, 0, 1, '2013-03-23 21:26:45');
/*!40000 ALTER TABLE `solution` ENABLE KEYS */;


-- Dumping structure for table giza.solution_sub
CREATE TABLE IF NOT EXISTS `solution_sub` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `solution_id` int(10) NOT NULL DEFAULT '0',
  `alias` varchar(250) NOT NULL,
  `banner_image_thumbs` text,
  `banner_files` text,
  `banner_image_thumb_selected` tinytext,
  `banner_file_selected` tinytext,
  `title` varchar(250) DEFAULT NULL,
  `title_ar` varchar(250) DEFAULT NULL,
  `seo_words` tinytext,
  `seo_words_ar` tinytext,
  `brief` text,
  `brief_ar` text,
  `body` text,
  `body_ar` text,
  `sort` tinyint(4) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.solution_sub: 11 rows
/*!40000 ALTER TABLE `solution_sub` DISABLE KEYS */;
INSERT INTO `solution_sub` (`id`, `solution_id`, `alias`, `banner_image_thumbs`, `banner_files`, `banner_image_thumb_selected`, `banner_file_selected`, `title`, `title_ar`, `seo_words`, `seo_words_ar`, `brief`, `brief_ar`, `body`, `body_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(3, 6, 'brief', '', '', '', '', 'Brief', 'Brief', '', '', '', '', '<p  justify;">In today&rsquo;s world of climate change, depletion of natural resources, and deep-rooted concern over the environment,&nbsp;the emphasis is shifting towards green buildings. Green buildings, also known as sustainable buildings, are designed&nbsp;with environmental responsibility and resource efficiency at their core.</p>\r\n<div id="cke_pastebin"  justify;">Fuelling the green buildings momentum is the concept of sustainable development. By incorporating environmentally&nbsp;responsible and resource efficiency practices throughout the building life&rsquo;s cycle, the opportunity to integrate&nbsp;synergistic design and optimize resources enables us to achieve the delicate balance between construction and the&nbsp;natural environment.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Green buildings aim at leaving a lighter footprint on the environment through the conservation of water, energy and&nbsp;other resources, as well as the reduction of waste, pollution, and environmental deterioration. They also protect and&nbsp;improve biodiversity and ecosystems.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">In addition to the environmental benefits of green buildings, there are societal and economical ones that include the&nbsp;safeguarding and enhancement of occupants&rsquo; health and their productivity, the overall improvement of the quality of&nbsp;life, the reduction of operating costs, and the creation of markets for green products and services.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The building life cycle encompasses different phases that can no longer be viewed as disparate and independent. The&nbsp;building life cycle is to be perceived as an adaptive complex system that requires integration of the different stages&nbsp;and which depends on a number of embedded practices, processes and technologies that meet the objectives of&nbsp;the system.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The stages of design, construction, operation, maintenance, energy, water, and waste all represent different subsets&nbsp;of this system. The convergence of the technologies and processes of all these subsets necessitate a holistic&nbsp;approach to integrate them into a system of technologies coupled with green practices to yield a synergistic outcome that generates a greater cumulative impact.</div>', '<p  justify;">In today&rsquo;s world of climate change, depletion of natural resources, and deep-rooted concern over the environment,&nbsp;the emphasis is shifting towards green buildings. Green buildings, also known as sustainable buildings, are designed&nbsp;with environmental responsibility and resource efficiency at their core.</p>\r\n<div id="cke_pastebin"  justify;">Fuelling the green buildings momentum is the concept of sustainable development. By incorporating environmentally&nbsp;responsible and resource efficiency practices throughout the building life&rsquo;s cycle, the opportunity to integrate&nbsp;synergistic design and optimize resources enables us to achieve the delicate balance between construction and the&nbsp;natural environment.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Green buildings aim at leaving a lighter footprint on the environment through the conservation of water, energy and&nbsp;other resources, as well as the reduction of waste, pollution, and environmental deterioration. They also protect and&nbsp;improve biodiversity and ecosystems.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">In addition to the environmental benefits of green buildings, there are societal and economical ones that include the&nbsp;safeguarding and enhancement of occupants&rsquo; health and their productivity, the overall improvement of the quality of&nbsp;life, the reduction of operating costs, and the creation of markets for green products and services.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The building life cycle encompasses different phases that can no longer be viewed as disparate and independent. The&nbsp;building life cycle is to be perceived as an adaptive complex system that requires integration of the different stages&nbsp;and which depends on a number of embedded practices, processes and technologies that meet the objectives of&nbsp;the system.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The stages of design, construction, operation, maintenance, energy, water, and waste all represent different subsets&nbsp;of this system. The convergence of the technologies and processes of all these subsets necessitate a holistic&nbsp;approach to integrate them into a system of technologies coupled with green practices to yield a synergistic outcome that generates a greater cumulative impact.</div>', 1, 1, 0, 1, '2013-03-23 20:50:51'),
	(4, 6, 'Industry Issues', '', '', '', '', 'Industry Issues', 'Industry Issues', '', '', '', '', '<div id="cke_pastebin"  justify;"><strong>Think Green...&nbsp;Save the Planet</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Our vision for the green era&nbsp;entails the optimization of costs,&nbsp;emissions, and operational&nbsp;conditions.&nbsp;However, it is imperative that the vision is incorporated early on during the design stage of the building to&nbsp;achieve synergy with the green practices of resource efficiency and environmental responsibility.&nbsp;The advanced building simulation enables the design and testing of a complex architectural structure by&nbsp;bypassing the time and expense involved in creating physical models. Simulations allow designers to test&nbsp;variables and analyze the results of complex factors, including environmental issues.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">This model can be utilized through our fully integrated management systems in the operation mode. The&nbsp;benefits of our model not only include an easy-to-use interface, but also energy optimization, high-standard&nbsp;security and safety measures that can be easily achieved and improved upon.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div  justify;">\r\n<div id="cke_pastebin"  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Our Green Smart&nbsp;Culture</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Cities represent complex systems that include hundreds of buildings, energy systems, water systems,&nbsp;utility infrastructure, and communications networks. All these different subsystems rely on different&nbsp;technologies, processes, devices, applications and interfaces.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The issues that face us when confronted with the different elements are how to fit these individual&nbsp;technologies and processes into a larger, complex system. More often than not, these individual&nbsp;technologies are provided and supplied by different vendors, rely on incompatible vocabularies, are not&nbsp;interfaced with each other, and may be operating on different platforms.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">To ensure resource efficiency and environmental responsibility, the green city needs to integrate and&nbsp;interoperate these disparate systems through structured platforms to be able to manage it from a business&nbsp;and energy perspective.&nbsp;Relying on a service-oriented architecture allows for greater flexibility and dynamism when integrating&nbsp;capacities, capabilities, and networks. This is fundamental in the creation and operation of a knowledgebase&nbsp;community, which is the basis for smart and green city management.</div>\r\n<div id="cke_pastebin"  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Knowledge-based&nbsp;Architecture</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The premise behind a knowledge-based architecture is networking the various infrastructures, policies,&nbsp;processes, and applications in order to create a collective community intelligence used for city-wide management.&nbsp;To achieve this centralized knowledge base, the architecture for smart cities is based on incorporating both&nbsp;the logical and physical layers. The logical layer is essential for the conceptualization of networks, communications,&nbsp;and management needed for the architecture. The physical layer is just as indispensable, for&nbsp;it represents the actual physical components required in this architectural model.</div>\r\n</div>', '<div id="cke_pastebin"  justify;"><strong>Think Green...&nbsp;Save the Planet</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Our vision for the green era&nbsp;entails the optimization of costs,&nbsp;emissions, and operational&nbsp;conditions.&nbsp;However, it is imperative that the vision is incorporated early on during the design stage of the building to&nbsp;achieve synergy with the green practices of resource efficiency and environmental responsibility.&nbsp;The advanced building simulation enables the design and testing of a complex architectural structure by&nbsp;bypassing the time and expense involved in creating physical models. Simulations allow designers to test&nbsp;variables and analyze the results of complex factors, including environmental issues.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">This model can be utilized through our fully integrated management systems in the operation mode. The&nbsp;benefits of our model not only include an easy-to-use interface, but also energy optimization, high-standard&nbsp;security and safety measures that can be easily achieved and improved upon.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div  justify;">\r\n<div id="cke_pastebin"  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Our Green Smart&nbsp;Culture</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Cities represent complex systems that include hundreds of buildings, energy systems, water systems,&nbsp;utility infrastructure, and communications networks. All these different subsystems rely on different&nbsp;technologies, processes, devices, applications and interfaces.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The issues that face us when confronted with the different elements are how to fit these individual&nbsp;technologies and processes into a larger, complex system. More often than not, these individual&nbsp;technologies are provided and supplied by different vendors, rely on incompatible vocabularies, are not&nbsp;interfaced with each other, and may be operating on different platforms.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">To ensure resource efficiency and environmental responsibility, the green city needs to integrate and&nbsp;interoperate these disparate systems through structured platforms to be able to manage it from a business&nbsp;and energy perspective.&nbsp;Relying on a service-oriented architecture allows for greater flexibility and dynamism when integrating&nbsp;capacities, capabilities, and networks. This is fundamental in the creation and operation of a knowledgebase&nbsp;community, which is the basis for smart and green city management.</div>\r\n<div id="cke_pastebin"  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Knowledge-based&nbsp;Architecture</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The premise behind a knowledge-based architecture is networking the various infrastructures, policies,&nbsp;processes, and applications in order to create a collective community intelligence used for city-wide management.&nbsp;To achieve this centralized knowledge base, the architecture for smart cities is based on incorporating both&nbsp;the logical and physical layers. The logical layer is essential for the conceptualization of networks, communications,&nbsp;and management needed for the architecture. The physical layer is just as indispensable, for&nbsp;it represents the actual physical components required in this architectural model.</div>\r\n</div>', 3, 1, 0, 1, '2013-03-23 20:53:12'),
	(5, 6, 'Solutions Issues', '', '', '', '', 'Solutions Issues', 'Solutions Issues', 'Solutions Issues', 'Solutions Issues', '', '', '<div  justify;">&nbsp;</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Smart Cities Logical Layer Architecture:</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">To accurately design and institute city-wide management, the used logical applications and communications&nbsp;architecture needs to accommodate different and dynamic policies in many service areas. The&nbsp;architecture should reflect the following:</div>\r\n<div  justify;">&nbsp;</div>\r\n<ul>\r\n<li  justify;">Single ID for: Security, Asset, CRM and could be employed for payments as well</li>\r\n<li  justify;">GIS functions like: land management, building BIM, inventory presentation, etc.</li>\r\n<li  justify;">Centralized order management and customer handling (CRM)</li>\r\n<li  justify;">Centralized network management such as NE, HW, Faults</li>\r\n<li  justify;">Converged billing for: telecom, utilities and environmental conditioning services</li>\r\n<li  justify;">Full services management such as provisioning, activation, and WFM</li>\r\n<li  justify;">Financial automated management for installments and payment transactions</li>\r\n</ul>\r\n<div id="cke_pastebin"  justify;">Smart Cities Physical Layer Architecture:</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The smart city aims to establish a reference model for networks, as well as sensors and service points for&nbsp;data management platforms. By applying this model, a knowledge-based community can be created in&nbsp;which different parameters can be measured to attain collective intelligence and agility. It mainly relies on</div>\r\n<div id="cke_pastebin"  justify;">the following:</div>\r\n<div  justify;">&nbsp;</div>\r\n<ul>\r\n<li  justify;">A network and sensor data management platform to centralize all the data collected from the city</li>\r\n<li  justify;">A sensor communication network able to link any number of sensors and service points set up in the&nbsp;city</li>\r\n<li  justify;">Functional and available applications and equipment communication frameworks based on open&nbsp;standards in order to provide a dynamic services environment. This ensures that such a model can&nbsp;be applied and adapted not only to large cities, but also to smaller ones and even metropolitan areas.</li>\r\n</ul>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Our Smart Offerings</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>The Evolution of Smart</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The portfolio of Giza Systems encompasses a wide range of offerings targeting solutions for smart cities.&nbsp;Our uniqueness comes from embedding the evolving concept and definition of smart in our solutions and&nbsp;services.&nbsp;The realization that there is a constant evolution to how smart cities are perceived and defined is our competitive&nbsp;edge and driver for success. Keeping the evolution of smart at the forefront, Giza Systems has&nbsp;strengthened its portfolio by emphasizing the development of process and energy management.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Process Management</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Different definitions surrounding smart cities are constantly emerging to keep up with the evolving technologies,&nbsp;services, and standards of living. Such considerations are what drive integrators to build systems&nbsp;that are capable of adapting with agility and dynamism to any implementations or modifications needed</div>\r\n<div id="cke_pastebin"  justify;">for processes.&nbsp;The underlying success of a process involving smart cities is to design it with the aim of being service-centric,&nbsp;which is the reason for envisaging it as a &ldquo;process engine with complete service-oriented architecture&nbsp;implementation.&rdquo; Having the service-oriented architecture as the core to any set of processes accommodates&nbsp;the evolving concept of smart cities.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">With the evolution to the definition and concept of smart, this architecture allows city operators to implement&nbsp;the changes to the set of processes _ be they minor or substantial_ in a time efficient manner and&nbsp;with relative ease to ensure the adaptability of the applications in place.</div>\r\n<div id="cke_pastebin"  justify;">The process handling platform constitutes the core of the smart city for it allows a greater degree of flexibility&nbsp;and functionality in a real service-oriented architecture. The platform is able to isolate the implementation&nbsp;aspect of the processes from the actual applications resulting in effective time management for</div>\r\n<div id="cke_pastebin"  justify;">smart city operators.&nbsp;With the setting up of new policies or services, applications no longer need to be changed or replaced,&nbsp;but can simply be modified within the existing process architecture framework. It takes a limited number&nbsp;of hours to design, deploy, and publish a new diagram to represent the necessary modification (Process&nbsp;No x).</div>\r\n<div id="cke_pastebin"  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Energy Management</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Energy optimization services monitor, analyze and optimize the energy consumption of the building without&nbsp;compromising on comfort. It allows for the achievement of energy savings and minimizes the environmental&nbsp;impact.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Any building is subject to dynamic variations: the number of people occupying a given area, external variables&nbsp;such as wind, temperature, etc. An intelligent building automation system must be able to detect&nbsp;changes at an early stage and take appropriate action.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">For example, in a conference room, occupancy changes rapidly. Airflow must be adjusted quickly and accordingly&nbsp;to prevent the build-up of CO2. To achieve the greatest cost efficiency, airflow changes must be&nbsp;limited to the specific climate zone, in this case the conference room. To meet the various needs at different&nbsp;times in different places, our buildings automation &amp; monitoring solutions offer a highly efficient zone solution&nbsp;that reduces energy costs. It is based on LonWorks open system technology, an intelligent approach&nbsp;that utilizes existing technology already in place and enables easy future alterations or modifications.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Smart Metering</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Our solution utilizes best of breed systems arranged in service oriented architecture, with flexible and modular components.It, thus, offers enterprise-class scalability, performance, and high-availability. The solution enables the utilities or city operators to deploy an automated flow-through service order management,provisioning, customer services, and billing.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Fully integrated, the solution allows automated provisioning from customer-order-receipt through to customer-serviceactivation,interacting with the billing and trouble ticketing systems as necessary. The key benefits of our smart metering solution are:</div>\r\n<ul>\r\n<li>State-of-the-art technology</li>\r\n<li>Adherence to industry standards</li>\r\n<li>Highly scalable and modular</li>\r\n<li>Adequate means to help ensure security and integrity of all data across the enterprise</li>\r\n<li>Rapidly deployable</li>\r\n</ul>\r\n<p>The functional view of our solution supports the utilities operation through the whole meter-to-cash process. The meter-to-cash process consists of the following stages:</p>\r\n<ul>\r\n<li>Service subscription</li>\r\n<li>Field &amp; meter services</li>\r\n<li>Meter data management</li>\r\n<li>Billing</li>\r\n<li>Collection and payment processing</li>\r\n<li>Arrears management</li>\r\n<li>Customer care</li>\r\n</ul>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Think Green</div>\r\n<div  justify;">&nbsp;</div>\r\n<div  justify;">Emission Calculations (CO2 footprint) through the deployment of software utilities, which are designed to calculate the potential energy savings achievable, changes in the electricity consumption of a building or facility can be monitored and controlled</div>\r\n<div  justify;">&nbsp;</div>\r\n<div  justify;">The solution enables the user to:</div>\r\n<ul>\r\n<li>Select the appropriate electricity current level on the basis of the application data. This can be applied to the different components of buildings through a change process</li>\r\n<li>Compare the energy consumption at different time intervals</li>\r\n<li>Calculate the potential energy savings from both a financial and an electrical point of view, as well as the contribution to the reduction of CO2 emissions</li>\r\n<li>Calculate the duration for obtaining a return on investment</li>\r\n</ul>', '<div  justify;">&nbsp;</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Smart Cities Logical Layer Architecture:</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">To accurately design and institute city-wide management, the used logical applications and communications&nbsp;architecture needs to accommodate different and dynamic policies in many service areas. The&nbsp;architecture should reflect the following:</div>\r\n<div  justify;">&nbsp;</div>\r\n<ul>\r\n<li  justify;">Single ID for: Security, Asset, CRM and could be employed for payments as well</li>\r\n<li  justify;">GIS functions like: land management, building BIM, inventory presentation, etc.</li>\r\n<li  justify;">Centralized order management and customer handling (CRM)</li>\r\n<li  justify;">Centralized network management such as NE, HW, Faults</li>\r\n<li  justify;">Converged billing for: telecom, utilities and environmental conditioning services</li>\r\n<li  justify;">Full services management such as provisioning, activation, and WFM</li>\r\n<li  justify;">Financial automated management for installments and payment transactions</li>\r\n</ul>\r\n<div id="cke_pastebin"  justify;">Smart Cities Physical Layer Architecture:</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The smart city aims to establish a reference model for networks, as well as sensors and service points for&nbsp;data management platforms. By applying this model, a knowledge-based community can be created in&nbsp;which different parameters can be measured to attain collective intelligence and agility. It mainly relies on</div>\r\n<div id="cke_pastebin"  justify;">the following:</div>\r\n<div  justify;">&nbsp;</div>\r\n<ul>\r\n<li  justify;">A network and sensor data management platform to centralize all the data collected from the city</li>\r\n<li  justify;">A sensor communication network able to link any number of sensors and service points set up in the&nbsp;city</li>\r\n<li  justify;">Functional and available applications and equipment communication frameworks based on open&nbsp;standards in order to provide a dynamic services environment. This ensures that such a model can&nbsp;be applied and adapted not only to large cities, but also to smaller ones and even metropolitan areas.</li>\r\n</ul>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Our Smart Offerings</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>The Evolution of Smart</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The portfolio of Giza Systems encompasses a wide range of offerings targeting solutions for smart cities.&nbsp;Our uniqueness comes from embedding the evolving concept and definition of smart in our solutions and&nbsp;services.&nbsp;The realization that there is a constant evolution to how smart cities are perceived and defined is our competitive&nbsp;edge and driver for success. Keeping the evolution of smart at the forefront, Giza Systems has&nbsp;strengthened its portfolio by emphasizing the development of process and energy management.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Process Management</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Different definitions surrounding smart cities are constantly emerging to keep up with the evolving technologies,&nbsp;services, and standards of living. Such considerations are what drive integrators to build systems&nbsp;that are capable of adapting with agility and dynamism to any implementations or modifications needed</div>\r\n<div id="cke_pastebin"  justify;">for processes.&nbsp;The underlying success of a process involving smart cities is to design it with the aim of being service-centric,&nbsp;which is the reason for envisaging it as a &ldquo;process engine with complete service-oriented architecture&nbsp;implementation.&rdquo; Having the service-oriented architecture as the core to any set of processes accommodates&nbsp;the evolving concept of smart cities.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">With the evolution to the definition and concept of smart, this architecture allows city operators to implement&nbsp;the changes to the set of processes _ be they minor or substantial_ in a time efficient manner and&nbsp;with relative ease to ensure the adaptability of the applications in place.</div>\r\n<div id="cke_pastebin"  justify;">The process handling platform constitutes the core of the smart city for it allows a greater degree of flexibility&nbsp;and functionality in a real service-oriented architecture. The platform is able to isolate the implementation&nbsp;aspect of the processes from the actual applications resulting in effective time management for</div>\r\n<div id="cke_pastebin"  justify;">smart city operators.&nbsp;With the setting up of new policies or services, applications no longer need to be changed or replaced,&nbsp;but can simply be modified within the existing process architecture framework. It takes a limited number&nbsp;of hours to design, deploy, and publish a new diagram to represent the necessary modification (Process&nbsp;No x).</div>\r\n<div id="cke_pastebin"  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Energy Management</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Energy optimization services monitor, analyze and optimize the energy consumption of the building without&nbsp;compromising on comfort. It allows for the achievement of energy savings and minimizes the environmental&nbsp;impact.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Any building is subject to dynamic variations: the number of people occupying a given area, external variables&nbsp;such as wind, temperature, etc. An intelligent building automation system must be able to detect&nbsp;changes at an early stage and take appropriate action.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">For example, in a conference room, occupancy changes rapidly. Airflow must be adjusted quickly and accordingly&nbsp;to prevent the build-up of CO2. To achieve the greatest cost efficiency, airflow changes must be&nbsp;limited to the specific climate zone, in this case the conference room. To meet the various needs at different&nbsp;times in different places, our buildings automation &amp; monitoring solutions offer a highly efficient zone solution&nbsp;that reduces energy costs. It is based on LonWorks open system technology, an intelligent approach&nbsp;that utilizes existing technology already in place and enables easy future alterations or modifications.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Smart Metering</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Our solution utilizes best of breed systems arranged in service oriented architecture, with flexible and modular components.It, thus, offers enterprise-class scalability, performance, and high-availability. The solution enables the utilities or city operators to deploy an automated flow-through service order management,provisioning, customer services, and billing.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Fully integrated, the solution allows automated provisioning from customer-order-receipt through to customer-serviceactivation,interacting with the billing and trouble ticketing systems as necessary. The key benefits of our smart metering solution are:</div>\r\n<ul>\r\n<li>State-of-the-art technology</li>\r\n<li>Adherence to industry standards</li>\r\n<li>Highly scalable and modular</li>\r\n<li>Adequate means to help ensure security and integrity of all data across the enterprise</li>\r\n<li>Rapidly deployable</li>\r\n</ul>\r\n<p>The functional view of our solution supports the utilities operation through the whole meter-to-cash process. The meter-to-cash process consists of the following stages:</p>\r\n<ul>\r\n<li>Service subscription</li>\r\n<li>Field &amp; meter services</li>\r\n<li>Meter data management</li>\r\n<li>Billing</li>\r\n<li>Collection and payment processing</li>\r\n<li>Arrears management</li>\r\n<li>Customer care</li>\r\n</ul>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Think Green</div>\r\n<div  justify;">&nbsp;</div>\r\n<div  justify;">Emission Calculations (CO2 footprint) through the deployment of software utilities, which are designed to calculate the potential energy savings achievable, changes in the electricity consumption of a building or facility can be monitored and controlled</div>\r\n<div  justify;">&nbsp;</div>\r\n<div  justify;">The solution enables the user to:</div>\r\n<ul>\r\n<li>Select the appropriate electricity current level on the basis of the application data. This can be applied to the different components of buildings through a change process</li>\r\n<li>Compare the energy consumption at different time intervals</li>\r\n<li>Calculate the potential energy savings from both a financial and an electrical point of view, as well as the contribution to the reduction of CO2 emissions</li>\r\n<li>Calculate the duration for obtaining a return on investment</li>\r\n</ul>', 4, 1, 0, 1, '2013-03-23 20:53:57'),
	(6, 7, 'brief', '', '', '', '', 'Brief', 'Brief', 'Brief', 'Brief', '', '', '<p  justify;">In today&rsquo;s world of climate change, depletion of natural resources, and deep-rooted concern over the environment,&nbsp;the emphasis is shifting towards green buildings. Green buildings, also known as sustainable buildings, are designed&nbsp;with environmental responsibility and resource efficiency at their core.</p>\r\n<div id="cke_pastebin"  justify;">Fuelling the green buildings momentum is the concept of sustainable development. By incorporating environmentally&nbsp;responsible and resource efficiency practices throughout the building life&rsquo;s cycle, the opportunity to integrate&nbsp;synergistic design and optimize resources enables us to achieve the delicate balance between construction and the&nbsp;natural environment.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Green buildings aim at leaving a lighter footprint on the environment through the conservation of water, energy and&nbsp;other resources, as well as the reduction of waste, pollution, and environmental deterioration. They also protect and&nbsp;improve biodiversity and ecosystems.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">In addition to the environmental benefits of green buildings, there are societal and economical ones that include the&nbsp;safeguarding and enhancement of occupants&rsquo; health and their productivity, the overall improvement of the quality of&nbsp;life, the reduction of operating costs, and the creation of markets for green products and services.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The building life cycle encompasses different phases that can no longer be viewed as disparate and independent. The&nbsp;building life cycle is to be perceived as an adaptive complex system that requires integration of the different stages&nbsp;and which depends on a number of embedded practices, processes and technologies that meet the objectives of&nbsp;the system.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The stages of design, construction, operation, maintenance, energy, water, and waste all represent different subsets&nbsp;of this system. The convergence of the technologies and processes of all these subsets necessitate a holistic&nbsp;approach to integrate them into a system of technologies coupled with green practices to yield a synergistic outcome that generates a greater cumulative impact.</div>\r\n<div id="cke_pastebin"  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Think Green...&nbsp;Save the Planet</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Our vision for the green era&nbsp;entails the optimization of costs,&nbsp;emissions, and operational&nbsp;conditions.&nbsp;However, it is imperative that the vision is incorporated early on during the design stage of the building to&nbsp;achieve synergy with the green practices of resource efficiency and environmental responsibility.&nbsp;The advanced building simulation enables the design and testing of a complex architectural structure by&nbsp;bypassing the time and expense involved in creating physical models. Simulations allow designers to test&nbsp;variables and analyze the results of complex factors, including environmental issues.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">This model can be utilized through our fully integrated management systems in the operation mode. The&nbsp;benefits of our model not only include an easy-to-use interface, but also energy optimization, high-standard&nbsp;security and safety measures that can be easily achieved and improved upon.</div>\r\n<div id="cke_pastebin"  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Our Green Smart&nbsp;Culture</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Cities represent complex systems that include hundreds of buildings, energy systems, water systems,&nbsp;utility infrastructure, and communications networks. All these different subsystems rely on different&nbsp;technologies, processes, devices, applications and interfaces.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The issues that face us when confronted with the different elements are how to fit these individual&nbsp;technologies and processes into a larger, complex system. More often than not, these individual&nbsp;technologies are provided and supplied by different vendors, rely on incompatible vocabularies, are not&nbsp;interfaced with each other, and may be operating on different platforms.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">To ensure resource efficiency and environmental responsibility, the green city needs to integrate and&nbsp;interoperate these disparate systems through structured platforms to be able to manage it from a business&nbsp;and energy perspective.&nbsp;Relying on a service-oriented architecture allows for greater flexibility and dynamism when integrating&nbsp;capacities, capabilities, and networks. This is fundamental in the creation and operation of a knowledgebase&nbsp;community, which is the basis for smart and green city management.</div>\r\n<div id="cke_pastebin"  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Knowledge-based&nbsp;Architecture</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The premise behind a knowledge-based architecture is networking the various infrastructures, policies,&nbsp;processes, and applications in order to create a collective community intelligence used for city-wide management.&nbsp;To achieve this centralized knowledge base, the architecture for smart cities is based on incorporating both&nbsp;the logical and physical layers. The logical layer is essential for the conceptualization of networks, communications,&nbsp;and management needed for the architecture. The physical layer is just as indispensable, for&nbsp;it represents the actual physical components required in this architectural model.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Smart Cities Logical Layer Architecture:</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">To accurately design and institute city-wide management, the used logical applications and communications&nbsp;architecture needs to accommodate different and dynamic policies in many service areas. The&nbsp;architecture should reflect the following:</div>\r\n<div  justify;">&nbsp;</div>\r\n<ul>\r\n<li  justify;">Single ID for: Security, Asset, CRM and could be employed for payments as well</li>\r\n<li  justify;">GIS functions like: land management, building BIM, inventory presentation, etc.</li>\r\n<li  justify;">Centralized order management and customer handling (CRM)</li>\r\n<li  justify;">Centralized network management such as NE, HW, Faults</li>\r\n<li  justify;">Converged billing for: telecom, utilities and environmental conditioning services</li>\r\n<li  justify;">Full services management such as provisioning, activation, and WFM</li>\r\n<li  justify;">Financial automated management for installments and payment transactions</li>\r\n</ul>\r\n<div id="cke_pastebin"  justify;">Smart Cities Physical Layer Architecture:</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The smart city aims to establish a reference model for networks, as well as sensors and service points for&nbsp;data management platforms. By applying this model, a knowledge-based community can be created in&nbsp;which different parameters can be measured to attain collective intelligence and agility. It mainly relies on</div>\r\n<div id="cke_pastebin"  justify;">the following:</div>\r\n<div  justify;">&nbsp;</div>\r\n<ul>\r\n<li  justify;">A network and sensor data management platform to centralize all the data collected from the city</li>\r\n<li  justify;">A sensor communication network able to link any number of sensors and service points set up in the&nbsp;city</li>\r\n<li  justify;">Functional and available applications and equipment communication frameworks based on open&nbsp;standards in order to provide a dynamic services environment. This ensures that such a model can&nbsp;be applied and adapted not only to large cities, but also to smaller ones and even metropolitan areas.</li>\r\n</ul>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Our Smart Offerings</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>The Evolution of Smart</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The portfolio of Giza Systems encompasses a wide range of offerings targeting solutions for smart cities.&nbsp;Our uniqueness comes from embedding the evolving concept and definition of smart in our solutions and&nbsp;services.&nbsp;The realization that there is a constant evolution to how smart cities are perceived and defined is our competitive&nbsp;edge and driver for success. Keeping the evolution of smart at the forefront, Giza Systems has&nbsp;strengthened its portfolio by emphasizing the development of process and energy management.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Process Management</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Different definitions surrounding smart cities are constantly emerging to keep up with the evolving technologies,&nbsp;services, and standards of living. Such considerations are what drive integrators to build systems&nbsp;that are capable of adapting with agility and dynamism to any implementations or modifications needed</div>\r\n<div id="cke_pastebin"  justify;">for processes.&nbsp;The underlying success of a process involving smart cities is to design it with the aim of being service-centric,&nbsp;which is the reason for envisaging it as a &ldquo;process engine with complete service-oriented architecture&nbsp;implementation.&rdquo; Having the service-oriented architecture as the core to any set of processes accommodates&nbsp;the evolving concept of smart cities.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">With the evolution to the definition and concept of smart, this architecture allows city operators to implement&nbsp;the changes to the set of processes _ be they minor or substantial_ in a time efficient manner and&nbsp;with relative ease to ensure the adaptability of the applications in place.</div>\r\n<div id="cke_pastebin"  justify;">The process handling platform constitutes the core of the smart city for it allows a greater degree of flexibility&nbsp;and functionality in a real service-oriented architecture. The platform is able to isolate the implementation&nbsp;aspect of the processes from the actual applications resulting in effective time management for</div>\r\n<div id="cke_pastebin"  justify;">smart city operators.&nbsp;With the setting up of new policies or services, applications no longer need to be changed or replaced,&nbsp;but can simply be modified within the existing process architecture framework. It takes a limited number&nbsp;of hours to design, deploy, and publish a new diagram to represent the necessary modification (Process&nbsp;No x).</div>\r\n<div id="cke_pastebin"  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Energy Management</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Energy optimization services monitor, analyze and optimize the energy consumption of the building without&nbsp;compromising on comfort. It allows for the achievement of energy savings and minimizes the environmental&nbsp;impact.</div>\r\n<div id="cke_pastebin"  justify;">Any building is subject to dynamic variations: the number of people occupying a given area, external variables&nbsp;such as wind, temperature, etc. An intelligent building automation system must be able to detect&nbsp;changes at an early stage and take appropriate action.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">For example, in a conference room, occupancy changes rapidly. Airflow must be adjusted quickly and accordingly&nbsp;to prevent the build-up of CO2. To achieve the greatest cost efficiency, airflow changes must be&nbsp;limited to the specific climate zone, in this case the conference room. To meet the various needs at different&nbsp;times in different places, our buildings automation &amp; monitoring solutions offer a highly efficient zone solution&nbsp;that reduces energy costs. It is based on LonWorks open system technology, an intelligent approach&nbsp;that utilizes existing technology already in place and enables easy future alterations or modifications.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Smart Metering</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Our solution utilizes best of breed systems arranged in service</div>\r\n<div id="cke_pastebin"  justify;">oriented architecture, with flexible and modular components.</div>\r\n<div id="cke_pastebin"  justify;">It, thus, offers enterprise-class scalability, performance,</div>\r\n<div id="cke_pastebin"  justify;">and high-availability.</div>\r\n<div id="cke_pastebin"  justify;">The solution enables the utilities or city operators to deploy</div>\r\n<div id="cke_pastebin"  justify;">an automated flow-through service order management,</div>\r\n<div id="cke_pastebin"  justify;">provisioning, customer services, and billing.</div>\r\n<div id="cke_pastebin"  justify;">Fully integrated, the solution allows automated provisioning</div>\r\n<div id="cke_pastebin"  justify;">from customer-order-receipt through to customer-serviceactivation,</div>\r\n<div id="cke_pastebin"  justify;">interacting with the billing and trouble ticketing</div>\r\n<div id="cke_pastebin"  justify;">systems as necessary.</div>\r\n<div id="cke_pastebin"  justify;">The key benefits of our smart metering solution are:</div>\r\n<div id="cke_pastebin"  justify;">&bull; State-of-the-art technology</div>\r\n<div id="cke_pastebin"  justify;">&bull; Adherence to industry standards</div>\r\n<div id="cke_pastebin"  justify;">&bull; Highly scalable and modular</div>\r\n<div id="cke_pastebin"  justify;">&bull; Adequate means to help ensure security and integrity</div>\r\n<div id="cke_pastebin"  justify;">of all data across the enterprise</div>\r\n<div id="cke_pastebin"  justify;">&bull; Rapidly deployable</div>\r\n<div id="cke_pastebin"  justify;">The functional view of our solution supports the utilities</div>\r\n<div id="cke_pastebin"  justify;">operation through the whole meter-to-cash process. The</div>\r\n<div id="cke_pastebin"  justify;">meter-to-cash process consists of the following stages:</div>\r\n<div id="cke_pastebin"  justify;">&bull; Service subscription</div>\r\n<div id="cke_pastebin"  justify;">&bull; Field &amp; meter services</div>\r\n<div id="cke_pastebin"  justify;">&bull; Meter data management</div>\r\n<div id="cke_pastebin"  justify;">&bull; Billing</div>\r\n<div id="cke_pastebin"  justify;">&bull; Collection and payment processing</div>\r\n<div id="cke_pastebin"  justify;">&bull; Arrears management</div>\r\n<div id="cke_pastebin"  justify;">&bull; Customer care</div>\r\n<div id="cke_pastebin"  justify;">Think</div>\r\n<div id="cke_pastebin"  justify;">Green</div>\r\n<div id="cke_pastebin"  justify;">12 13</div>\r\n<div id="cke_pastebin"  justify;">&bull; Emission Calculations (CO2 footprint)</div>\r\n<div id="cke_pastebin"  justify;">Through the deployment of software utilities, which are designed to calculate the potential energy savings</div>\r\n<div id="cke_pastebin"  justify;">achievable, changes in the electricity consumption of a building or facility can be monitored and controlled.</div>\r\n<div id="cke_pastebin"  justify;">The solution enables the user to:</div>\r\n<div id="cke_pastebin"  justify;">&bull; Select the appropriate electricity current level on the basis of the application data. This can be applied</div>\r\n<div id="cke_pastebin"  justify;">to the different components of buildings through a change process</div>\r\n<div id="cke_pastebin"  justify;">&bull; Compare the energy consumption at different time intervals</div>\r\n<div id="cke_pastebin"  justify;">&bull; Calculate the potential energy savings from both a financial and an electrical point of view, as well as</div>\r\n<div id="cke_pastebin"  justify;">the contribution to the reduction of CO2 emissions</div>\r\n<div id="cke_pastebin"  justify;">&bull; Calculate the duration for obtaining a return on investment</div>', '<p  justify;">In today&rsquo;s world of climate change, depletion of natural resources, and deep-rooted concern over the environment,&nbsp;the emphasis is shifting towards green buildings. Green buildings, also known as sustainable buildings, are designed&nbsp;with environmental responsibility and resource efficiency at their core.</p>\r\n<div id="cke_pastebin"  justify;">Fuelling the green buildings momentum is the concept of sustainable development. By incorporating environmentally&nbsp;responsible and resource efficiency practices throughout the building life&rsquo;s cycle, the opportunity to integrate&nbsp;synergistic design and optimize resources enables us to achieve the delicate balance between construction and the&nbsp;natural environment.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Green buildings aim at leaving a lighter footprint on the environment through the conservation of water, energy and&nbsp;other resources, as well as the reduction of waste, pollution, and environmental deterioration. They also protect and&nbsp;improve biodiversity and ecosystems.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">In addition to the environmental benefits of green buildings, there are societal and economical ones that include the&nbsp;safeguarding and enhancement of occupants&rsquo; health and their productivity, the overall improvement of the quality of&nbsp;life, the reduction of operating costs, and the creation of markets for green products and services.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The building life cycle encompasses different phases that can no longer be viewed as disparate and independent. The&nbsp;building life cycle is to be perceived as an adaptive complex system that requires integration of the different stages&nbsp;and which depends on a number of embedded practices, processes and technologies that meet the objectives of&nbsp;the system.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The stages of design, construction, operation, maintenance, energy, water, and waste all represent different subsets&nbsp;of this system. The convergence of the technologies and processes of all these subsets necessitate a holistic&nbsp;approach to integrate them into a system of technologies coupled with green practices to yield a synergistic outcome that generates a greater cumulative impact.</div>\r\n<div id="cke_pastebin"  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Think Green...&nbsp;Save the Planet</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Our vision for the green era&nbsp;entails the optimization of costs,&nbsp;emissions, and operational&nbsp;conditions.&nbsp;However, it is imperative that the vision is incorporated early on during the design stage of the building to&nbsp;achieve synergy with the green practices of resource efficiency and environmental responsibility.&nbsp;The advanced building simulation enables the design and testing of a complex architectural structure by&nbsp;bypassing the time and expense involved in creating physical models. Simulations allow designers to test&nbsp;variables and analyze the results of complex factors, including environmental issues.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">This model can be utilized through our fully integrated management systems in the operation mode. The&nbsp;benefits of our model not only include an easy-to-use interface, but also energy optimization, high-standard&nbsp;security and safety measures that can be easily achieved and improved upon.</div>\r\n<div id="cke_pastebin"  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Our Green Smart&nbsp;Culture</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Cities represent complex systems that include hundreds of buildings, energy systems, water systems,&nbsp;utility infrastructure, and communications networks. All these different subsystems rely on different&nbsp;technologies, processes, devices, applications and interfaces.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The issues that face us when confronted with the different elements are how to fit these individual&nbsp;technologies and processes into a larger, complex system. More often than not, these individual&nbsp;technologies are provided and supplied by different vendors, rely on incompatible vocabularies, are not&nbsp;interfaced with each other, and may be operating on different platforms.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">To ensure resource efficiency and environmental responsibility, the green city needs to integrate and&nbsp;interoperate these disparate systems through structured platforms to be able to manage it from a business&nbsp;and energy perspective.&nbsp;Relying on a service-oriented architecture allows for greater flexibility and dynamism when integrating&nbsp;capacities, capabilities, and networks. This is fundamental in the creation and operation of a knowledgebase&nbsp;community, which is the basis for smart and green city management.</div>\r\n<div id="cke_pastebin"  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Knowledge-based&nbsp;Architecture</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The premise behind a knowledge-based architecture is networking the various infrastructures, policies,&nbsp;processes, and applications in order to create a collective community intelligence used for city-wide management.&nbsp;To achieve this centralized knowledge base, the architecture for smart cities is based on incorporating both&nbsp;the logical and physical layers. The logical layer is essential for the conceptualization of networks, communications,&nbsp;and management needed for the architecture. The physical layer is just as indispensable, for&nbsp;it represents the actual physical components required in this architectural model.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Smart Cities Logical Layer Architecture:</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">To accurately design and institute city-wide management, the used logical applications and communications&nbsp;architecture needs to accommodate different and dynamic policies in many service areas. The&nbsp;architecture should reflect the following:</div>\r\n<div  justify;">&nbsp;</div>\r\n<ul>\r\n<li  justify;">Single ID for: Security, Asset, CRM and could be employed for payments as well</li>\r\n<li  justify;">GIS functions like: land management, building BIM, inventory presentation, etc.</li>\r\n<li  justify;">Centralized order management and customer handling (CRM)</li>\r\n<li  justify;">Centralized network management such as NE, HW, Faults</li>\r\n<li  justify;">Converged billing for: telecom, utilities and environmental conditioning services</li>\r\n<li  justify;">Full services management such as provisioning, activation, and WFM</li>\r\n<li  justify;">Financial automated management for installments and payment transactions</li>\r\n</ul>\r\n<div id="cke_pastebin"  justify;">Smart Cities Physical Layer Architecture:</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The smart city aims to establish a reference model for networks, as well as sensors and service points for&nbsp;data management platforms. By applying this model, a knowledge-based community can be created in&nbsp;which different parameters can be measured to attain collective intelligence and agility. It mainly relies on</div>\r\n<div id="cke_pastebin"  justify;">the following:</div>\r\n<div  justify;">&nbsp;</div>\r\n<ul>\r\n<li  justify;">A network and sensor data management platform to centralize all the data collected from the city</li>\r\n<li  justify;">A sensor communication network able to link any number of sensors and service points set up in the&nbsp;city</li>\r\n<li  justify;">Functional and available applications and equipment communication frameworks based on open&nbsp;standards in order to provide a dynamic services environment. This ensures that such a model can&nbsp;be applied and adapted not only to large cities, but also to smaller ones and even metropolitan areas.</li>\r\n</ul>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Our Smart Offerings</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>The Evolution of Smart</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">The portfolio of Giza Systems encompasses a wide range of offerings targeting solutions for smart cities.&nbsp;Our uniqueness comes from embedding the evolving concept and definition of smart in our solutions and&nbsp;services.&nbsp;The realization that there is a constant evolution to how smart cities are perceived and defined is our competitive&nbsp;edge and driver for success. Keeping the evolution of smart at the forefront, Giza Systems has&nbsp;strengthened its portfolio by emphasizing the development of process and energy management.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Process Management</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Different definitions surrounding smart cities are constantly emerging to keep up with the evolving technologies,&nbsp;services, and standards of living. Such considerations are what drive integrators to build systems&nbsp;that are capable of adapting with agility and dynamism to any implementations or modifications needed</div>\r\n<div id="cke_pastebin"  justify;">for processes.&nbsp;The underlying success of a process involving smart cities is to design it with the aim of being service-centric,&nbsp;which is the reason for envisaging it as a &ldquo;process engine with complete service-oriented architecture&nbsp;implementation.&rdquo; Having the service-oriented architecture as the core to any set of processes accommodates&nbsp;the evolving concept of smart cities.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">With the evolution to the definition and concept of smart, this architecture allows city operators to implement&nbsp;the changes to the set of processes _ be they minor or substantial_ in a time efficient manner and&nbsp;with relative ease to ensure the adaptability of the applications in place.</div>\r\n<div id="cke_pastebin"  justify;">The process handling platform constitutes the core of the smart city for it allows a greater degree of flexibility&nbsp;and functionality in a real service-oriented architecture. The platform is able to isolate the implementation&nbsp;aspect of the processes from the actual applications resulting in effective time management for</div>\r\n<div id="cke_pastebin"  justify;">smart city operators.&nbsp;With the setting up of new policies or services, applications no longer need to be changed or replaced,&nbsp;but can simply be modified within the existing process architecture framework. It takes a limited number&nbsp;of hours to design, deploy, and publish a new diagram to represent the necessary modification (Process&nbsp;No x).</div>\r\n<div id="cke_pastebin"  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Energy Management</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Energy optimization services monitor, analyze and optimize the energy consumption of the building without&nbsp;compromising on comfort. It allows for the achievement of energy savings and minimizes the environmental&nbsp;impact.</div>\r\n<div id="cke_pastebin"  justify;">Any building is subject to dynamic variations: the number of people occupying a given area, external variables&nbsp;such as wind, temperature, etc. An intelligent building automation system must be able to detect&nbsp;changes at an early stage and take appropriate action.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">For example, in a conference room, occupancy changes rapidly. Airflow must be adjusted quickly and accordingly&nbsp;to prevent the build-up of CO2. To achieve the greatest cost efficiency, airflow changes must be&nbsp;limited to the specific climate zone, in this case the conference room. To meet the various needs at different&nbsp;times in different places, our buildings automation &amp; monitoring solutions offer a highly efficient zone solution&nbsp;that reduces energy costs. It is based on LonWorks open system technology, an intelligent approach&nbsp;that utilizes existing technology already in place and enables easy future alterations or modifications.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;"><strong>Smart Metering</strong></div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Our solution utilizes best of breed systems arranged in service</div>\r\n<div id="cke_pastebin"  justify;">oriented architecture, with flexible and modular components.</div>\r\n<div id="cke_pastebin"  justify;">It, thus, offers enterprise-class scalability, performance,</div>\r\n<div id="cke_pastebin"  justify;">and high-availability.</div>\r\n<div id="cke_pastebin"  justify;">The solution enables the utilities or city operators to deploy</div>\r\n<div id="cke_pastebin"  justify;">an automated flow-through service order management,</div>\r\n<div id="cke_pastebin"  justify;">provisioning, customer services, and billing.</div>\r\n<div id="cke_pastebin"  justify;">Fully integrated, the solution allows automated provisioning</div>\r\n<div id="cke_pastebin"  justify;">from customer-order-receipt through to customer-serviceactivation,</div>\r\n<div id="cke_pastebin"  justify;">interacting with the billing and trouble ticketing</div>\r\n<div id="cke_pastebin"  justify;">systems as necessary.</div>\r\n<div id="cke_pastebin"  justify;">The key benefits of our smart metering solution are:</div>\r\n<div id="cke_pastebin"  justify;">&bull; State-of-the-art technology</div>\r\n<div id="cke_pastebin"  justify;">&bull; Adherence to industry standards</div>\r\n<div id="cke_pastebin"  justify;">&bull; Highly scalable and modular</div>\r\n<div id="cke_pastebin"  justify;">&bull; Adequate means to help ensure security and integrity</div>\r\n<div id="cke_pastebin"  justify;">of all data across the enterprise</div>\r\n<div id="cke_pastebin"  justify;">&bull; Rapidly deployable</div>\r\n<div id="cke_pastebin"  justify;">The functional view of our solution supports the utilities</div>\r\n<div id="cke_pastebin"  justify;">operation through the whole meter-to-cash process. The</div>\r\n<div id="cke_pastebin"  justify;">meter-to-cash process consists of the following stages:</div>\r\n<div id="cke_pastebin"  justify;">&bull; Service subscription</div>\r\n<div id="cke_pastebin"  justify;">&bull; Field &amp; meter services</div>\r\n<div id="cke_pastebin"  justify;">&bull; Meter data management</div>\r\n<div id="cke_pastebin"  justify;">&bull; Billing</div>\r\n<div id="cke_pastebin"  justify;">&bull; Collection and payment processing</div>\r\n<div id="cke_pastebin"  justify;">&bull; Arrears management</div>\r\n<div id="cke_pastebin"  justify;">&bull; Customer care</div>\r\n<div id="cke_pastebin"  justify;">Think</div>\r\n<div id="cke_pastebin"  justify;">Green</div>\r\n<div id="cke_pastebin"  justify;">12 13</div>\r\n<div id="cke_pastebin"  justify;">&bull; Emission Calculations (CO2 footprint)</div>\r\n<div id="cke_pastebin"  justify;">Through the deployment of software utilities, which are designed to calculate the potential energy savings</div>\r\n<div id="cke_pastebin"  justify;">achievable, changes in the electricity consumption of a building or facility can be monitored and controlled.</div>\r\n<div id="cke_pastebin"  justify;">The solution enables the user to:</div>\r\n<div id="cke_pastebin"  justify;">&bull; Select the appropriate electricity current level on the basis of the application data. This can be applied</div>\r\n<div id="cke_pastebin"  justify;">to the different components of buildings through a change process</div>\r\n<div id="cke_pastebin"  justify;">&bull; Compare the energy consumption at different time intervals</div>\r\n<div id="cke_pastebin"  justify;">&bull; Calculate the potential energy savings from both a financial and an electrical point of view, as well as</div>\r\n<div id="cke_pastebin"  justify;">the contribution to the reduction of CO2 emissions</div>\r\n<div id="cke_pastebin"  justify;">&bull; Calculate the duration for obtaining a return on investment</div>', 5, 1, 0, 1, '2013-03-23 21:13:11'),
	(7, 7, 'Solutions Issues', '', '', '', '', 'Solutions Issues', 'Solutions Issues', 'Solutions Issues', 'Solutions Issues', '', '', '<p>Building Management, Control &amp; Monitoring</p>\r\n<ul>\r\n<li>Smart Building Management Systems</li>\r\n<li>Lighting Control Systems</li>\r\n<li>Utilities Management</li>\r\n<li>ntelligent Car Park &amp; Vehicle Management</li>\r\n</ul>\r\n<p>Communications &amp; Connectivity</p>\r\n<ul>\r\n<li>IP Backbone networking</li>\r\n<li>Structured Cabling Systems</li>\r\n<li>IP based Voice systems</li>\r\n<li>Wi-Fi, Wi-Max communication systems</li>\r\n<li>Portal Systems</li>\r\n<li>IP Intercom system</li>\r\n</ul>\r\n<p>Safety &amp; Security</p>\r\n<ul>\r\n<li>Access Control</li>\r\n<li>Surveillance</li>\r\n<li>Fire detection &amp; alarm systems</li>\r\n<li>Biometrics Security System</li>\r\n<li>Bollards and Ramps</li>\r\n<li>Scanning &amp; Detection Systems</li>\r\n<li>RFID systems</li>\r\n</ul>\r\n<p>Multimedia</p>\r\n<ul>\r\n<li>Music &amp; Public Address Systems</li>\r\n<li>Advertisements &amp; Digital Signage Systems</li>\r\n<li>IPTV/MATV systems</li>\r\n<li>Digital Audio/Video Multimedia &amp; streaming Systems</li>\r\n<li>Triple-Play Services and Converged Networking</li>\r\n</ul>', '<p>Building Management, Control &amp; Monitoring</p>\r\n<ul>\r\n<li>Smart Building Management Systems</li>\r\n<li>Lighting Control Systems</li>\r\n<li>Utilities Management</li>\r\n<li>ntelligent Car Park &amp; Vehicle Management</li>\r\n</ul>\r\n<p>Communications &amp; Connectivity</p>\r\n<ul>\r\n<li>IP Backbone networking</li>\r\n<li>Structured Cabling Systems</li>\r\n<li>IP based Voice systems</li>\r\n<li>Wi-Fi, Wi-Max communication systems</li>\r\n<li>Portal Systems</li>\r\n<li>IP Intercom system</li>\r\n</ul>\r\n<p>Safety &amp; Security</p>\r\n<ul>\r\n<li>Access Control</li>\r\n<li>Surveillance</li>\r\n<li>Fire detection &amp; alarm systems</li>\r\n<li>Biometrics Security System</li>\r\n<li>Bollards and Ramps</li>\r\n<li>Scanning &amp; Detection Systems</li>\r\n<li>RFID systems</li>\r\n</ul>\r\n<p>Multimedia</p>\r\n<ul>\r\n<li>Music &amp; Public Address Systems</li>\r\n<li>Advertisements &amp; Digital Signage Systems</li>\r\n<li>IPTV/MATV systems</li>\r\n<li>Digital Audio/Video Multimedia &amp; streaming Systems</li>\r\n<li>Triple-Play Services and Converged Networking</li>\r\n</ul>', 6, 1, 0, 1, '2013-03-23 21:16:31'),
	(8, 8, 'brief', '', '', '', '', 'Brief', 'Brief', '', '', '', '', '<p  justify;">The far reaching capabilities of GIS have enabled it to permeate a broad spectrum of industries and areas. GIS is extensively used due to its applications in analysis, modeling, forecasting and predicting,&nbsp; utiility and infrastructure planning, facility management, telecommunications and much more.</p>\r\n<p  justify;">GIS integrates mapping and analysis, tracks assets, provides flexibility to enable businesses gain insight to help them make better decisions, enhance efficiency and make better decisions.&nbsp;</p>\r\n<p  justify;">Giza Systems has the know-how to work with the different software platforms to ensure seamless integration to meet the requirements of our clients and customize the solutions to best satisfy their needs.</p>', '<p  justify;">The far reaching capabilities of GIS have enabled it to permeate a broad spectrum of industries and areas. GIS is extensively used due to its applications in analysis, modeling, forecasting and predicting,&nbsp; utiility and infrastructure planning, facility management, telecommunications and much more.</p>\r\n<p  justify;">GIS integrates mapping and analysis, tracks assets, provides flexibility to enable businesses gain insight to help them make better decisions, enhance efficiency and make better decisions.&nbsp;</p>\r\n<p  justify;">Giza Systems has the know-how to work with the different software platforms to ensure seamless integration to meet the requirements of our clients and customize the solutions to best satisfy their needs.</p>', 7, 1, 0, 1, '2013-03-23 21:20:01'),
	(9, 8, 'Industry Issues', '', '', '', '', 'Industry Issues', 'Industry Issues', 'Industry Issues', 'Industry Issues', '', '', '<p  justify;">Geographical Information Systems are capable of capturing both spatial and non-spatial information&nbsp;of the network assets, thus solving the problems relating to selecting the best locations&nbsp;for laying new pipes/lines, optimizing travel routes of the field crew for efficient operations, and&nbsp;visualizing volumes of data with respect to the location of corresponding assets on field.</p>\r\n<p  justify;">These&nbsp;solutions keep track of the network and update information of transformers, switch gears,&nbsp;cables, etc. They are also used to design and plan future network expansions.</p>\r\n<p  justify;">To ensure that&nbsp;power providers achieve operational and business efficiency, our GIS solution will ensure high&nbsp;quality and reliable information to assist in better operational and business decision making.</p>', '<p  justify;">Geographical Information Systems are capable of capturing both spatial and non-spatial information&nbsp;of the network assets, thus solving the problems relating to selecting the best locations&nbsp;for laying new pipes/lines, optimizing travel routes of the field crew for efficient operations, and&nbsp;visualizing volumes of data with respect to the location of corresponding assets on field.</p>\r\n<p  justify;">These&nbsp;solutions keep track of the network and update information of transformers, switch gears,&nbsp;cables, etc. They are also used to design and plan future network expansions.</p>\r\n<p  justify;">To ensure that&nbsp;power providers achieve operational and business efficiency, our GIS solution will ensure high&nbsp;quality and reliable information to assist in better operational and business decision making.</p>', 8, 1, 0, 1, '2013-03-23 21:20:53'),
	(10, 8, 'Solutions Issues', '', '', '', '', 'Solutions Issues', 'Solutions Issues', 'Solutions Issues', 'Solutions Issues', '', '', '<div id="cke_pastebin"  justify;">We offer comprehensive end-to-end GIS solutions and services&nbsp; that help in constructing, operating, and maintaining critical network assets.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div  justify;">The technology we offer provides scalable, extensible and open solutions that integrate with different existing systems to leverage spatial data in new ways throughout the enterprise and onto the Internet. It helps utilities and telecom operators understand where their customers are and the infrastructure through which their products and services are delivered.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Our extensive know-how and experience enables us to provide our clients a with solutions&nbsp; that include:</div>\r\n<ol>\r\n<li>The study and analysis of client&rsquo;s business needs and technical requirements</li>\r\n<li>The design of the best solution that fits client requirements</li>\r\n<li>The creation, building and maintainance of data model and database changes</li>\r\n<li>Database administrations and maintenance</li>\r\n<li>Application installation, configuration and customization</li>\r\n<li>Standard and on-the- job training</li>\r\n<li>Ongoing support</li>\r\n</ol>', '<div id="cke_pastebin"  justify;">We offer comprehensive end-to-end GIS solutions and services&nbsp; that help in constructing, operating, and maintaining critical network assets.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div  justify;">The technology we offer provides scalable, extensible and open solutions that integrate with different existing systems to leverage spatial data in new ways throughout the enterprise and onto the Internet. It helps utilities and telecom operators understand where their customers are and the infrastructure through which their products and services are delivered.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Our extensive know-how and experience enables us to provide our clients a with solutions&nbsp; that include:</div>\r\n<ol>\r\n<li>The study and analysis of client&rsquo;s business needs and technical requirements</li>\r\n<li>The design of the best solution that fits client requirements</li>\r\n<li>The creation, building and maintainance of data model and database changes</li>\r\n<li>Database administrations and maintenance</li>\r\n<li>Application installation, configuration and customization</li>\r\n<li>Standard and on-the- job training</li>\r\n<li>Ongoing support</li>\r\n</ol>', 9, 1, 0, 1, '2013-03-23 21:21:48'),
	(11, 12, 'brief', '', '', '', '', 'Brief', 'Brief', '', '', '', '', '<div id="cke_pastebin"  justify;">With the increasing global demand in energy, the aging electrical infrastructure, and the need&nbsp;to integrate renewable energy sources, a new approach is essential to ensure that the power&nbsp;industry and national grids are equipped to handle these new demands, as well as drive utilities&nbsp;forward to the next level.</div>', '<div id="cke_pastebin"  justify;">With the increasing global demand in energy, the aging electrical infrastructure, and the need&nbsp;to integrate renewable energy sources, a new approach is essential to ensure that the power&nbsp;industry and national grids are equipped to handle these new demands, as well as drive utilities&nbsp;forward to the next level.</div>', 10, 1, 0, 1, '2013-03-23 21:27:36'),
	(12, 12, 'Industry Issues', '', '', '', '', 'Industry Issues', 'Industry Issues', 'Industry Issues', 'Industry Issues', '', '', '<p  justify;">Transforming the current power platform from a manual network centric business&nbsp;to an automated centric business requires an open architecture to infuse the process&nbsp;and system with added monitoring, analysis, control, and communication&nbsp;capabilities to attain higher efficiencies.</p>\r\n<p  justify;">Backed by our in-depth know-how, expertise,&nbsp;and superior integration capabilities, Giza Systems is positioned to&nbsp;assist the power industry in making the transformation to smart grids for the&nbsp;attainment of efficiency, reliability, safety, and sustainability.</p>', '<p  justify;">Transforming the current power platform from a manual network centric business&nbsp;to an automated centric business requires an open architecture to infuse the process&nbsp;and system with added monitoring, analysis, control, and communication&nbsp;capabilities to attain higher efficiencies.</p>\r\n<p  justify;">Backed by our in-depth know-how, expertise,&nbsp;and superior integration capabilities, Giza Systems is positioned to&nbsp;assist the power industry in making the transformation to smart grids for the&nbsp;attainment of efficiency, reliability, safety, and sustainability.</p>', 11, 1, 0, 1, '2013-03-23 21:28:55'),
	(13, 12, 'Solutions Issues', '', '', '', '', 'Solutions Issues', 'Solutions Issues', 'Solutions Issues', 'Solutions Issues', '', '', '<div id="cke_pastebin"  justify;">Smart grids are the new approach to optimize the already existing infrastructure while achieving&nbsp;interconnectedness, interoperability, higher operational efficiencies, reduction in energy consumption,&nbsp;and increase in reliability. Simply, smart grids enable optimal efficacy in the management&nbsp;of power to allow for the most efficient and economical use for utilities, as well&nbsp;as consumers. Smart grids utilize and build on most of the existing power solutions&nbsp;with the incorporation of communication and control technologies. It also allows for&nbsp;the integration of new capabilities and advanced applications.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Our years of experience in the utilities and telecom sectors allow us to leverage&nbsp;our proficiencies to guide the industry through the different levels in order to achieve a smooth transition towards a truly smart grid Giza Systems identifies&nbsp;smart metering, or advanced metering infrastructure, as the enabler and driver for the Smart Grid resulting in the advancement of a technology today&nbsp;that is both future-proof and competitive in price.</div>', '<div id="cke_pastebin"  justify;">Smart grids are the new approach to optimize the already existing infrastructure while achieving&nbsp;interconnectedness, interoperability, higher operational efficiencies, reduction in energy consumption,&nbsp;and increase in reliability. Simply, smart grids enable optimal efficacy in the management&nbsp;of power to allow for the most efficient and economical use for utilities, as well&nbsp;as consumers. Smart grids utilize and build on most of the existing power solutions&nbsp;with the incorporation of communication and control technologies. It also allows for&nbsp;the integration of new capabilities and advanced applications.</div>\r\n<div  justify;">&nbsp;</div>\r\n<div id="cke_pastebin"  justify;">Our years of experience in the utilities and telecom sectors allow us to leverage&nbsp;our proficiencies to guide the industry through the different levels in order to achieve a smooth transition towards a truly smart grid Giza Systems identifies&nbsp;smart metering, or advanced metering infrastructure, as the enabler and driver for the Smart Grid resulting in the advancement of a technology today&nbsp;that is both future-proof and competitive in price.</div>', 12, 1, 0, 1, '2013-03-23 21:30:07');
/*!40000 ALTER TABLE `solution_sub` ENABLE KEYS */;


-- Dumping structure for table giza.static_page_banner
CREATE TABLE IF NOT EXISTS `static_page_banner` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `page_code` varchar(100) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '0',
  `title_ar` varchar(100) NOT NULL DEFAULT '0',
  `banner_image_thumbs` text,
  `banner_files` text,
  `banner_image_thumb_selected` tinytext,
  `banner_file_selected` tinytext,
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.static_page_banner: 44 rows
/*!40000 ALTER TABLE `static_page_banner` DISABLE KEYS */;
INSERT INTO `static_page_banner` (`id`, `page_code`, `title`, `title_ar`, `banner_image_thumbs`, `banner_files`, `banner_image_thumb_selected`, `banner_file_selected`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(32, 'candidate_forget', 'candidate_forget', 'candidate_forget', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL),
	(33, 'candidate_result', 'candidate_result', 'candidate_result', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL),
	(41, 'photo', 'photo', 'photo', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL),
	(42, 'subscriber_form', 'subscriber_form', 'subscriber_form', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL),
	(43, 'subscriber_result', 'subscriber_result', 'subscriber_result', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL),
	(2, 'management_team', 'management_team', 'management_team', '/added/uploads/banner/staticpagebanner/t1361583425image 11.jpg,,,/added/uploads/banner/staticpagebanner/1368894474_thumb.jpg', '/added/uploads/banner/staticpagebanner/1361583425image 11.jpg,,,/added/uploads/banner/staticpagebanner/1368894474.jpg', '/added/uploads/banner/staticpagebanner/1368894474_thumb.jpg', '/added/uploads/banner/staticpagebanner/1368894474.jpg', 1, 0, 1, '2013-05-18 19:28:05'),
	(3, 'award', 'award', 'award', '/added/uploads/banner/staticpagebanner/t1361713628applouse pic size.jpg', '/added/uploads/banner/staticpagebanner/1361713628applouse pic size.jpg', '/added/uploads/banner/staticpagebanner/t1361713628applouse pic size.jpg', '/added/uploads/banner/staticpagebanner/1361713628applouse pic size.jpg', 1, 0, 1, '0000-00-00 00:00:00'),
	(4, 'subsidiary', 'subsidiary', 'subsidiary', '/added/uploads/banner/staticpagebanner/t1356944677website pic size 1 copy-1 copy copy.jpg', '/added/uploads/banner/staticpagebanner/1356944677website pic size 1 copy-1 copy copy.jpg', '/added/uploads/banner/staticpagebanner/t1356944677website pic size 1 copy-1 copy copy.jpg', '/added/uploads/banner/staticpagebanner/1356944677website pic size 1 copy-1 copy copy.jpg', 1, 0, 1, '0000-00-00 00:00:00'),
	(6, 'partner_result', 'partner_result', 'partner_result', '/added/uploads/banner/staticpagebanner/t1356612811website pic size 1 partners copy.jpg', '/added/uploads/banner/staticpagebanner/1356612811website pic size 1 partners copy.jpg', '/added/uploads/banner/staticpagebanner/t1356612811website pic size 1 partners copy.jpg', '/added/uploads/banner/staticpagebanner/1356612811website pic size 1 partners copy.jpg', 1, 0, 1, '0000-00-00 00:00:00'),
	(7, 'solutions', 'solutions', 'solutions', '/added/uploads/banner/staticpagebanner/t1349786656gs_ws_9_solutionshome_02.jpg', '/added/uploads/banner/staticpagebanner/1349786656gs_ws_9_solutionshome_02.jpg', '/added/uploads/banner/staticpagebanner/t1349786656gs_ws_9_solutionshome_02.jpg', '/added/uploads/banner/staticpagebanner/1349786656gs_ws_9_solutionshome_02.jpg', 1, 0, 1, '0000-00-00 00:00:00'),
	(8, 'careers', 'careers', 'careers', '', '', '', '', 1, 0, 1, '0000-00-00 00:00:00'),
	(9, 'collaborate_form', 'collaborate_form', 'collaborate_form', '/added/uploads/banner/staticpagebanner/t1361714642csr.jpg', '/added/uploads/banner/staticpagebanner/1361714642csr.jpg', '/added/uploads/banner/staticpagebanner/t1361714642csr.jpg', '/added/uploads/banner/staticpagebanner/1361714642csr.jpg', 1, 0, 1, '0000-00-00 00:00:00'),
	(45, 'client_casestudies', 'client_casestudies', 'client_casestudies', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(46, 'client_casestudy', 'client_casestudy', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(11, 'alumni_home', 'alumni_home', 'alumni_home', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL),
	(31, 'candidate_home', 'candidate_home', 'candidate_home', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL),
	(12, 'alumni_profile', 'alumni_profile', 'alumni_profile', '/added/uploads/banner/staticpagebanner/t1359063430tulips.jpg', '/added/uploads/banner/staticpagebanner/1359063430tulips.jpg', '/added/uploads/banner/staticpagebanner/t1359063430tulips.jpg', '/added/uploads/banner/staticpagebanner/1359063430tulips.jpg', 1, 0, 1, '0000-00-00 00:00:00'),
	(13, 'alumni_login', 'alumni_login', 'alumni_login', '/added/uploads/banner/staticpagebanner/t1360495083website pic login copy.jpg', '/added/uploads/banner/staticpagebanner/1360495083website pic login copy.jpg', '/added/uploads/banner/staticpagebanner/t1360495083website pic login copy.jpg', '/added/uploads/banner/staticpagebanner/1360495083website pic login copy.jpg', 1, 0, 1, '0000-00-00 00:00:00'),
	(14, 'alumni_forget', 'alumni_forget', 'alumni_forget', '/added/uploads/banner/staticpagebanner/t1359063498hydrangeas.jpg', '/added/uploads/banner/staticpagebanner/1359063498hydrangeas.jpg', '/added/uploads/banner/staticpagebanner/t1359063498hydrangeas.jpg', '/added/uploads/banner/staticpagebanner/1359063498hydrangeas.jpg', 1, 0, 1, '0000-00-00 00:00:00'),
	(15, 'alumni_save_result', 'alumni_save_result', 'alumni_save_result', '/added/uploads/banner/staticpagebanner/t1359063542chrysanthemum.jpg', '/added/uploads/banner/staticpagebanner/1359063542chrysanthemum.jpg', '/added/uploads/banner/staticpagebanner/t1359063542chrysanthemum.jpg', '/added/uploads/banner/staticpagebanner/1359063542chrysanthemum.jpg', 1, 0, 1, '0000-00-00 00:00:00'),
	(16, 'client_login', 'client_login', 'client_login', '/added/uploads/banner/staticpagebanner/t1360495382website pic login copy.jpg', '/added/uploads/banner/staticpagebanner/1360495382website pic login copy.jpg', '/added/uploads/banner/staticpagebanner/t1360495382website pic login copy.jpg', '/added/uploads/banner/staticpagebanner/1360495382website pic login copy.jpg', 1, 0, 1, '0000-00-00 00:00:00'),
	(17, 'client_home', 'client_home', 'client_home', '/added/uploads/banner/staticpagebanner/t1359063806hydrangeas.jpg', '/added/uploads/banner/staticpagebanner/1359063806hydrangeas.jpg', '/added/uploads/banner/staticpagebanner/t1359063806hydrangeas.jpg', '/added/uploads/banner/staticpagebanner/1359063806hydrangeas.jpg', 1, 0, 1, '0000-00-00 00:00:00'),
	(18, 'client_profile', 'client_profile', 'client_profile', '/added/uploads/banner/staticpagebanner/t1359063828jellyfish.jpg', '/added/uploads/banner/staticpagebanner/1359063828jellyfish.jpg', '/added/uploads/banner/staticpagebanner/t1359063828jellyfish.jpg', '/added/uploads/banner/staticpagebanner/1359063828jellyfish.jpg', 1, 0, 1, '0000-00-00 00:00:00'),
	(19, 'client_survey', 'client_survey', 'client_survey', '/added/uploads/banner/staticpagebanner/t1359063877koala.jpg', '/added/uploads/banner/staticpagebanner/1359063877koala.jpg', '/added/uploads/banner/staticpagebanner/t1359063877koala.jpg', '/added/uploads/banner/staticpagebanner/1359063877koala.jpg', 1, 0, 1, '0000-00-00 00:00:00'),
	(20, 'candidate_login', 'candidate_login', 'candidate_login', '/added/uploads/banner/staticpagebanner/t1360494930website pic login copy.jpg', '/added/uploads/banner/staticpagebanner/1360494930website pic login copy.jpg', '/added/uploads/banner/staticpagebanner/t1360494930website pic login copy.jpg', '/added/uploads/banner/staticpagebanner/1360494930website pic login copy.jpg', 1, 0, 1, '0000-00-00 00:00:00'),
	(21, 'candidate_profile', 'candidate_profile', 'candidate_profile', '/added/uploads/banner/staticpagebanner/t1359064068penguins.jpg', '/added/uploads/banner/staticpagebanner/1359064068penguins.jpg', '/added/uploads/banner/staticpagebanner/t1359064068penguins.jpg', '/added/uploads/banner/staticpagebanner/t1359064068penguins.jpg', 1, 0, 1, '2013-05-19 09:49:29'),
	(22, 'job_details', 'job_details', 'job_details', '/added/uploads/banner/staticpagebanner/t1359064117tulips.jpg', '/added/uploads/banner/staticpagebanner/1359064117tulips.jpg', '/added/uploads/banner/staticpagebanner/t1359064117tulips.jpg', '/added/uploads/banner/staticpagebanner/1359064117tulips.jpg', 1, 0, 1, '0000-00-00 00:00:00'),
	(23, 'job_search', 'job_search', 'job_search', '/added/uploads/banner/staticpagebanner/t1359064140tulips.jpg', '/added/uploads/banner/staticpagebanner/1359064140tulips.jpg', '/added/uploads/banner/staticpagebanner/t1359064140tulips.jpg', '/added/uploads/banner/staticpagebanner/1359064140tulips.jpg', 1, 0, 1, '0000-00-00 00:00:00'),
	(24, 'jobs', 'jobs', 'jobs', '/added/uploads/banner/staticpagebanner/t1359064179chrysanthemum.jpg', '/added/uploads/banner/staticpagebanner/1359064179chrysanthemum.jpg', '/added/uploads/banner/staticpagebanner/t1359064179chrysanthemum.jpg', '/added/uploads/banner/staticpagebanner/1359064179chrysanthemum.jpg', 1, 0, 1, '0000-00-00 00:00:00'),
	(25, 'partner_forget', 'partner_forget', 'partner_forget', '/added/uploads/banner/staticpagebanner/t1360498111website pic partner zone copy.jpg', '/added/uploads/banner/staticpagebanner/1360498111website pic partner zone copy.jpg', '/added/uploads/banner/staticpagebanner/t1360498111website pic partner zone copy.jpg', '/added/uploads/banner/staticpagebanner/1360498111website pic partner zone copy.jpg', 1, 0, 1, '0000-00-00 00:00:00'),
	(26, 'partner_login', 'partner_login', 'partner_login', '/added/uploads/banner/staticpagebanner/t1360498198website pic partner zone copy.jpg', '/added/uploads/banner/staticpagebanner/1360498198website pic partner zone copy.jpg', '/added/uploads/banner/staticpagebanner/t1360498198website pic partner zone copy.jpg', '/added/uploads/banner/staticpagebanner/1360498198website pic partner zone copy.jpg', 1, 0, 1, '0000-00-00 00:00:00'),
	(27, 'partner_profile', 'partner_profile', 'partner_profile', '/added/uploads/banner/staticpagebanner/t1359064545koala.jpg', '/added/uploads/banner/staticpagebanner/1359064545koala.jpg', '/added/uploads/banner/staticpagebanner/t1359064545koala.jpg', '/added/uploads/banner/staticpagebanner/1359064545koala.jpg', 1, 0, 1, '0000-00-00 00:00:00'),
	(28, 'partner_index', 'partner_index', 'partner_index', '/added/uploads/banner/staticpagebanner/t1359064575koala.jpg', '/added/uploads/banner/staticpagebanner/1359064575koala.jpg', '/added/uploads/banner/staticpagebanner/t1359064575koala.jpg', '/added/uploads/banner/staticpagebanner/1359064575koala.jpg', 1, 0, 1, '0000-00-00 00:00:00'),
	(29, 'partner_survey', 'partner_survey', 'partner_survey', '/added/uploads/banner/staticpagebanner/t1359064602tulips.jpg,,,/added/uploads/banner/staticpagebanner/1368893257_thumb.jpg', '/added/uploads/banner/staticpagebanner/1359064602tulips.jpg,,,/added/uploads/banner/staticpagebanner/1368893257.jpg', '/added/uploads/banner/staticpagebanner/t1359064602tulips.jpg', '/added/uploads/banner/staticpagebanner/t1359064602tulips.jpg', 1, 0, 1, '2013-05-18 19:07:37'),
	(34, 'client_forget', 'client_forget', 'client_forget', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL),
	(35, 'client_index', 'client_index', 'client_index', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL),
	(36, 'client_result', 'client_result', 'client_result', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL),
	(37, 'collaborate_result', 'collaborate_result', 'collaborate_result', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL),
	(38, 'gallery', 'gallery', 'gallery', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL),
	(39, 'office', 'office', 'office', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL),
	(40, 'office_event', 'office_event', 'office_event', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL),
	(44, 'partner_home', 'partner_home', 'partner_home', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL),
	(47, 'search', 'search', 'search', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(48, 'contact_form', 'Contact us', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `static_page_banner` ENABLE KEYS */;


-- Dumping structure for table giza.subscriber
CREATE TABLE IF NOT EXISTS `subscriber` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `deliver_by` varchar(255) DEFAULT NULL,
  `approved` tinyint(4) NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `last_user_id` int(11) NOT NULL,
  `last_modify_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table giza.subscriber: 0 rows
/*!40000 ALTER TABLE `subscriber` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscriber` ENABLE KEYS */;


-- Dumping structure for table giza.subsidiary
CREATE TABLE IF NOT EXISTS `subsidiary` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `alias` varchar(250) DEFAULT NULL,
  `image_thumbs` text,
  `images` text,
  `image_thumb_selected` tinytext,
  `image_selected` tinytext,
  `name` varchar(250) DEFAULT NULL,
  `name_ar` varchar(250) DEFAULT NULL,
  `website` tinytext,
  `seo_words` tinytext,
  `seo_words_ar` tinytext,
  `brief` text,
  `brief_ar` text,
  `body` text,
  `body_ar` text,
  `sort` tinyint(4) DEFAULT '0',
  `approved` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.subsidiary: ~8 rows (approximately)
/*!40000 ALTER TABLE `subsidiary` DISABLE KEYS */;
INSERT INTO `subsidiary` (`id`, `alias`, `image_thumbs`, `images`, `image_thumb_selected`, `image_selected`, `name`, `name_ar`, `website`, `seo_words`, `seo_words_ar`, `brief`, `brief_ar`, `body`, `body_ar`, `sort`, `approved`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(1, 'Giza Arabia', '', '', '', '', 'Giza Arabia', 'Giza Arabia', '', '', '', '', '', '<p>Established to create a client base and a revenue stream from the Kingdom of Saudi Arabia in the telecoms, utilities, oil &amp; gas, and government sectors.</p>', '<p>Established to create a client base and a revenue stream from the Kingdom of Saudi Arabia in the telecoms, utilities, oil &amp; gas, and government sectors.</p>', 1, 1, 0, 1, '2013-03-19 08:47:14'),
	(2, 'Giza Systems Gulf', '', '', '', '', 'Giza Systems Gulf', 'Giza Systems Gulf', '', '', '', '', '', '<p>Established to serve our growing customer base in Qatar and the Middle East region.</p>', '<p>Established to serve our growing customer base in Qatar and the Middle East region.</p>', 3, 1, 0, 1, '2013-03-19 08:52:38'),
	(3, 'Giza Systems JLT', '/added/uploads/subsidiary/1363676030_thumb.png', '/added/uploads/subsidiary/1363676030.png', '/added/uploads/subsidiary/1363676030_thumb.png', '/added/uploads/subsidiary/1363676030.png', 'Giza Systems JLT', 'Giza Systems JLT', '', '', '', '', '', '<p>Giza Systems JLT was established to serve projects and cater to clients in the United Arab Emirates.</p>', '<p>Giza Systems JLT was established to serve projects and cater to clients in the United Arab Emirates.</p>', 2, 1, 0, 1, '2013-03-19 08:53:50'),
	(4, 'Giza Systems Electromechanical', '', '', '', '', 'Giza Systems Electromechanical', 'Giza Systems Electromechanical', '', '', '', '', '', '<p  justify;">GSEC offers complete solutions for Water Utilities, Building Water and Waste Water Treatment Plants, as well as Water Desalination Plants including Pretreatment, Purification and Recycling for domestic, commercial and industrial sectors. Our scope of services also extends to operations and maintenance of these plants.</p>', '<p  justify;">GSEC offers complete solutions for Water Utilities, Building Water and Waste Water Treatment Plants, as well as Water Desalination Plants including Pretreatment, Purification and Recycling for domestic, commercial and industrial sectors. Our scope of services also extends to operations and maintenance of these plants.</p>', 4, 1, 0, 1, '2013-03-19 08:56:50'),
	(5, 'Giza Systems & Distribution', '/added/uploads/subsidiary/1363676320_thumb.jpg', '/added/uploads/subsidiary/1363676320.jpg', '/added/uploads/subsidiary/1363676320_thumb.jpg', '/added/uploads/subsidiary/1363676320.jpg', 'Giza Systems & Distribution', 'Giza Systems & Distribution', '', '', '', '', '', '<p>The import arm of Giza Systems</p>', '<p>The import arm of Giza Systems</p>', 5, 1, 0, 1, '2013-03-19 08:58:40'),
	(6, 'Giza Systems Free Zone', '/added/uploads/subsidiary/1363676420_thumb.png', '/added/uploads/subsidiary/1363676420.png', '/added/uploads/subsidiary/1363676420_thumb.png', '/added/uploads/subsidiary/1363676420.png', 'Giza Systems Free Zone', 'Giza Systems Free Zone', '', '', '', '', '', '<p>Giza Systems Free Zone facilitates processes dealing with logistics&nbsp;for procurement, travel and the Factory Acceptance Test (FAT).</p>', '<p>Giza Systems Free Zone facilitates processes dealing with logistics&nbsp;for procurement, travel and the Factory Acceptance Test (FAT).</p>', 6, 1, 0, 1, '2013-03-19 09:00:20'),
	(7, 'Giza Systems School of Technology (GSST)', '/added/uploads/subsidiary/1363676495_thumb.png', '/added/uploads/subsidiary/1363676495.png', '/added/uploads/subsidiary/1363676495_thumb.png', '/added/uploads/subsidiary/1363676495.png', 'Giza Systems School of Technology (GSST)', 'Giza Systems School of Technology (GSST)', '', '', '', '', '', '<p>Giza&nbsp;Systems School of Technology (GSST) offers&nbsp;formal learning programs and&nbsp;recognized, distinctive&nbsp;learning opportunities and resources.</p>', '<p>Giza&nbsp;Systems School of Technology (GSST) offers&nbsp;formal learning programs and&nbsp;recognized, distinctive&nbsp;learning opportunities and resources.</p>', 7, 1, 0, 1, '2013-03-19 09:01:35'),
	(8, 'Giza Systems Foundation', '/added/uploads/subsidiary/1363676621_thumb.png', '/added/uploads/subsidiary/1363676621.png', '/added/uploads/subsidiary/1363676621_thumb.png', '/added/uploads/subsidiary/1363676621.png', 'Giza Systems Foundation', 'Giza Systems Foundation', '', '', '', '', '', '<p>Promoting the optimal use of Information and&nbsp;Communication Technology (ICT) in the development of education in&nbsp;Egyptian society.</p>', '<p>Promoting the optimal use of Information and&nbsp;Communication Technology (ICT) in the development of education in&nbsp;Egyptian society.</p>', 8, 1, 0, 1, '2013-03-19 09:03:41');
/*!40000 ALTER TABLE `subsidiary` ENABLE KEYS */;


-- Dumping structure for table giza.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `last_user_id` int(11) NOT NULL,
  `last_modify_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.user: 2 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`, `name`, `mobile`, `telephone`, `email`, `address`, `user_group_id`, `admin`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(2, 'gouda', '123456', 'Gouda Elalfy', '01119793075', '231424234234', 'goudaelalfy@gmail.com', 'Marsafa, Banha', 1, 0, 0, 1, '2013-02-23 20:06:50'),
	(1, 'admin', 'admin', 'Gouda Elalfy', '01119793075', '23232323232', 'gouda@4jawaly.com', 'Marsafa -- Banaha -- Kaiobia', 1, 1, 0, 1, '2013-03-02 08:48:24');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table giza.user_group
CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `last_user_id` int(11) NOT NULL,
  `last_modify_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.user_group: 4 rows
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
INSERT INTO `user_group` (`id`, `name`, `deleted`, `last_user_id`, `last_modify_date`) VALUES
	(4, 'Developers', 0, 1, '2013-02-27 09:54:36'),
	(3, 'Managers', 0, 1, '2012-12-19 13:35:36'),
	(2, 'Marketing', 0, 1, '2012-12-19 13:32:47'),
	(1, 'Administrators', 0, 1, '2013-05-20 17:12:24');
/*!40000 ALTER TABLE `user_group` ENABLE KEYS */;


-- Dumping structure for table giza.user_group_screen_privielge
CREATE TABLE IF NOT EXISTS `user_group_screen_privielge` (
  `user_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `screen_id` int(11) NOT NULL,
  `view` int(1) NOT NULL,
  `add` int(1) NOT NULL,
  `edit` int(1) NOT NULL,
  `delete` int(1) NOT NULL,
  `cancel` int(1) NOT NULL,
  PRIMARY KEY (`user_group_id`,`screen_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.user_group_screen_privielge: 46 rows
/*!40000 ALTER TABLE `user_group_screen_privielge` DISABLE KEYS */;
INSERT INTO `user_group_screen_privielge` (`user_group_id`, `screen_id`, `view`, `add`, `edit`, `delete`, `cancel`) VALUES
	(1, 2, 1, 1, 1, 1, 0),
	(1, 3, 1, 1, 1, 1, 0),
	(1, 4, 0, 0, 0, 0, 0),
	(1, 5, 0, 0, 0, 0, 0),
	(1, 21, 1, 1, 1, 1, 0),
	(1, 22, 1, 1, 1, 1, 0),
	(1, 23, 1, 1, 1, 1, 0),
	(1, 24, 1, 1, 1, 1, 0),
	(1, 25, 1, 1, 1, 1, 0),
	(1, 26, 1, 1, 1, 1, 0),
	(1, 29, 1, 1, 1, 1, 0),
	(1, 6, 1, 1, 1, 1, 0),
	(1, 7, 1, 1, 1, 1, 0),
	(1, 9, 1, 1, 1, 1, 0),
	(1, 10, 1, 1, 1, 1, 0),
	(1, 11, 1, 1, 1, 1, 0),
	(1, 13, 1, 1, 1, 1, 0),
	(1, 14, 1, 1, 1, 1, 0),
	(1, 15, 1, 1, 1, 1, 0),
	(1, 16, 1, 1, 1, 1, 0),
	(1, 18, 1, 1, 1, 1, 0),
	(1, 19, 1, 1, 1, 1, 0),
	(1, 20, 1, 1, 1, 1, 0),
	(1, 38, 1, 1, 1, 1, 0),
	(1, 36, 0, 0, 0, 0, 0),
	(1, 34, 1, 1, 1, 1, 0),
	(1, 33, 1, 1, 1, 1, 0),
	(1, 32, 1, 1, 1, 1, 0),
	(1, 27, 1, 1, 1, 1, 0),
	(1, 28, 1, 1, 1, 1, 0),
	(1, 30, 1, 1, 1, 1, 0),
	(1, 31, 1, 1, 1, 1, 0),
	(1, 39, 1, 1, 1, 1, 0),
	(1, 40, 1, 1, 1, 1, 0),
	(1, 41, 1, 1, 1, 1, 0),
	(1, 43, 1, 1, 1, 1, 0),
	(1, 44, 1, 1, 1, 1, 0),
	(1, 45, 1, 1, 1, 1, 0),
	(1, 46, 1, 1, 1, 1, 0),
	(1, 47, 1, 1, 1, 1, 0),
	(1, 48, 1, 1, 1, 1, 0),
	(1, 49, 1, 1, 1, 1, 0),
	(1, 50, 1, 1, 1, 1, 0),
	(1, 51, 1, 1, 1, 1, 0),
	(1, 52, 1, 1, 1, 1, 0),
	(1, 53, 1, 1, 1, 1, 0);
/*!40000 ALTER TABLE `user_group_screen_privielge` ENABLE KEYS */;


-- Dumping structure for table giza.user_history
CREATE TABLE IF NOT EXISTS `user_history` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT '0',
  `screen_id` int(10) DEFAULT '0',
  `screen_function_id` int(11) DEFAULT NULL,
  `the_date` datetime DEFAULT NULL,
  `row_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=947 DEFAULT CHARSET=utf8;

-- Dumping data for table giza.user_history: 840 rows
/*!40000 ALTER TABLE `user_history` DISABLE KEYS */;
INSERT INTO `user_history` (`id`, `user_id`, `screen_id`, `screen_function_id`, `the_date`, `row_id`) VALUES
	(107, 1, 2, 2, '2013-02-15 16:14:11', 120),
	(108, 1, 2, 2, '2013-02-16 08:55:53', 47),
	(109, 1, 2, 2, '2013-02-16 08:56:11', 47),
	(110, 1, 2, 3, '2013-02-21 21:32:31', 114),
	(111, 1, 2, 3, '2013-02-23 20:06:14', NULL),
	(112, 1, 2, 3, '2013-02-23 20:06:50', 114),
	(113, 1, 2, 1, '2013-02-23 20:07:21', 121),
	(114, 1, 2, 1, '2013-02-23 20:11:43', 122),
	(115, 1, 2, 2, '2013-02-23 20:12:25', 122),
	(116, 1, 2, 1, '2013-02-23 20:14:32', 123),
	(117, 1, 2, 2, '2013-02-23 20:20:31', 123),
	(118, 1, 2, 2, '2013-02-23 20:20:43', 123),
	(119, 1, 2, 2, '2013-02-23 20:26:35', 123),
	(120, 1, 3, 1, '2013-02-23 20:40:46', 20),
	(121, 1, 3, 3, '2013-02-23 20:41:50', 20),
	(122, 1, 2, 3, '2013-02-23 20:43:42', 122),
	(123, 1, 2, 3, '2013-02-23 20:45:04', 123),
	(124, 1, 3, 1, '2013-02-23 20:45:23', 21),
	(125, 1, 3, 3, '2013-02-23 20:45:36', 21),
	(126, 1, 3, 2, '2013-02-23 20:59:45', 18),
	(127, 1, 3, 2, '2013-02-23 21:01:17', 18),
	(128, 1, 3, 2, '2013-02-23 21:02:32', 18),
	(129, 1, 3, 2, '2013-02-23 21:04:42', 18),
	(130, 1, 3, 2, '2013-02-23 21:05:30', 18),
	(131, 1, 2, 1, '2013-02-23 22:17:06', 124),
	(132, 1, 3, 2, '2013-02-24 08:52:53', 15),
	(133, 1, 3, 2, '2013-02-27 09:47:05', 18),
	(134, 1, 3, 1, '2013-02-27 09:47:34', 22),
	(135, 1, 3, 2, '2013-02-27 09:48:07', 18),
	(136, 1, 3, 2, '2013-02-27 09:50:37', 18),
	(137, 1, 3, 2, '2013-02-27 09:54:36', 18),
	(138, 1, 3, 1, '2013-02-27 09:57:47', 23),
	(139, 1, 2, 2, '2013-02-27 10:02:02', 124),
	(140, 1, 2, 2, '2013-02-27 10:03:06', 124),
	(141, 1, 2, 2, '2013-02-27 10:03:41', 1),
	(142, 1, 2, 2, '2013-02-28 09:44:03', 1),
	(143, 1, 3, 2, '2013-02-28 13:32:22', 15),
	(144, 1, 3, 2, '2013-02-28 13:33:06', 15),
	(145, 1, 2, 3, '2013-02-28 13:33:15', 124),
	(146, 1, 3, 2, '2013-02-28 13:33:40', 15),
	(147, 1, 2, 2, '2013-02-28 13:34:22', 1),
	(148, 1, 2, 1, '2013-02-28 13:34:57', 125),
	(149, 1, 2, 2, '2013-02-28 13:35:08', 125),
	(150, 1, 3, 2, '2013-02-28 13:36:44', 15),
	(151, 1, 2, 2, '2013-02-28 13:36:55', 125),
	(152, 1, 2, 2, '2013-02-28 13:40:36', 125),
	(153, 1, 3, 2, '2013-02-28 13:44:18', 15),
	(154, 1, 3, 2, '2013-02-28 14:09:44', 15),
	(155, 1, 2, 2, '2013-02-28 14:53:51', 1),
	(156, 1, 2, 1, '2013-02-28 15:00:02', 126),
	(157, 1, 2, 2, '2013-02-28 15:05:12', 126),
	(158, 1, 2, 2, '2013-02-28 15:07:23', 125),
	(159, 1, 2, 1, '2013-03-01 15:17:37', 2),
	(160, 1, 2, 2, '2013-03-01 15:24:14', 1),
	(161, 1, 2, 1, '2013-03-01 15:29:59', 3),
	(162, 1, 3, 3, '2013-03-01 16:30:50', NULL),
	(163, 1, 3, 3, '2013-03-01 16:30:50', NULL),
	(164, 1, 3, 3, '2013-03-01 16:30:50', NULL),
	(165, 1, 3, 3, '2013-03-01 16:31:24', 3),
	(166, 1, 3, 3, '2013-03-01 16:31:24', 2),
	(167, 1, 3, 3, '2013-03-01 16:31:24', 1),
	(168, 1, 2, 1, '2013-03-01 16:34:11', 4),
	(169, 1, 3, 3, '2013-03-01 16:38:29', 4),
	(170, 1, 2, 1, '2013-03-01 16:43:02', 5),
	(171, 1, 2, 1, '2013-03-01 16:44:17', 6),
	(172, 1, 2, 1, '2013-03-01 16:48:14', 7),
	(173, 1, 2, 1, '2013-03-01 16:49:00', 8),
	(174, 1, 2, 1, '2013-03-01 17:05:55', 9),
	(175, 1, 2, 2, '2013-03-01 17:11:16', 9),
	(176, 1, 2, 1, '2013-03-01 17:14:38', 10),
	(177, 1, 2, 1, '2013-03-01 17:17:55', 11),
	(178, 1, 2, 2, '2013-03-01 17:32:17', 11),
	(179, 1, 2, 2, '2013-03-01 17:34:51', 11),
	(180, 1, 2, 2, '2013-03-01 17:35:18', 11),
	(181, 1, 2, 2, '2013-03-01 17:35:32', 11),
	(182, 1, 2, 2, '2013-03-01 17:35:53', 11),
	(183, 1, 2, 2, '2013-03-01 17:37:52', 11),
	(184, 1, 2, 1, '2013-03-01 17:43:20', 12),
	(185, 1, 2, 2, '2013-03-01 17:43:36', 12),
	(186, 1, 2, 2, '2013-03-01 17:43:56', 12),
	(187, 1, 2, 2, '2013-03-01 17:46:33', 12),
	(188, 1, 2, 2, '2013-03-01 17:47:02', 12),
	(189, 1, 2, 2, '2013-03-01 17:47:41', 12),
	(190, 1, 2, 2, '2013-03-01 17:56:16', 12),
	(191, 1, 2, 1, '2013-03-01 19:50:18', 13),
	(192, 1, 2, 2, '2013-03-01 19:50:56', 13),
	(193, 1, 2, 2, '2013-03-01 19:51:12', 13),
	(194, 1, 2, 1, '2013-03-01 19:52:57', 14),
	(195, 1, 2, 2, '2013-03-01 19:53:09', 14),
	(196, 1, 2, 2, '2013-03-01 19:53:29', 14),
	(197, 1, 2, 2, '2013-03-01 19:53:44', 14),
	(198, 1, 2, 2, '2013-03-01 19:53:58', 14),
	(199, 1, 2, 2, '2013-03-01 19:54:12', 14),
	(200, 1, 2, 2, '2013-03-01 19:55:04', 14),
	(201, 1, 2, 2, '2013-03-01 19:57:10', 14),
	(202, 1, 2, 2, '2013-03-01 20:20:56', 14),
	(203, 1, 2, 2, '2013-03-01 20:21:47', 14),
	(204, 1, 2, 2, '2013-03-01 20:25:48', 14),
	(205, 1, 2, 2, '2013-03-01 20:26:44', 14),
	(206, 1, 2, 1, '2013-03-01 20:28:55', 15),
	(207, 1, 2, 2, '2013-03-01 20:29:10', 15),
	(208, 1, 2, 2, '2013-03-01 20:29:28', 15),
	(209, 1, 2, 2, '2013-03-01 20:29:56', 15),
	(210, 1, 3, 3, '2013-03-01 20:31:22', 15),
	(211, 1, 2, 1, '2013-03-01 20:31:39', 16),
	(212, 1, 2, 2, '2013-03-01 20:31:52', 16),
	(213, 1, 2, 2, '2013-03-01 20:32:07', 16),
	(214, 1, 2, 2, '2013-03-01 20:33:01', 16),
	(215, 1, 2, 1, '2013-03-01 20:36:08', 17),
	(216, 1, 2, 2, '2013-03-01 20:36:19', 17),
	(217, 1, 2, 2, '2013-03-01 20:36:33', 17),
	(218, 1, 2, 2, '2013-03-01 20:47:15', 17),
	(219, 1, 2, 1, '2013-03-01 20:51:59', 18),
	(220, 1, 2, 2, '2013-03-01 20:52:14', 18),
	(221, 1, 2, 2, '2013-03-01 20:52:27', 18),
	(222, 1, 2, 2, '2013-03-01 20:52:59', 18),
	(223, 1, 2, 1, '2013-03-01 21:00:16', 19),
	(224, 1, 2, 2, '2013-03-01 21:00:28', 19),
	(225, 1, 2, 2, '2013-03-01 21:00:42', 19),
	(226, 1, 2, 2, '2013-03-01 21:00:55', 19),
	(227, 1, 2, 2, '2013-03-01 21:03:09', 19),
	(228, 1, 2, 2, '2013-03-01 21:03:31', 19),
	(229, 1, 2, 2, '2013-03-01 21:03:45', 19),
	(230, 1, 2, 2, '2013-03-01 21:04:00', 19),
	(231, 1, 2, 2, '2013-03-01 21:04:12', 19),
	(232, 1, 3, 2, '2013-03-01 21:19:24', 15),
	(233, 1, 3, 2, '2013-03-01 21:19:47', 15),
	(234, 1, 3, 2, '2013-03-01 22:10:28', 15),
	(235, 1, 3, 2, '2013-03-01 22:14:27', 15),
	(236, 1, 2, 1, '2013-03-01 22:15:08', 20),
	(237, 1, 3, 2, '2013-03-01 22:17:41', 15),
	(238, 1, 3, 2, '2013-03-01 22:24:12', 15),
	(239, 1, 2, 2, '2013-03-01 22:24:47', 19),
	(240, 1, 2, 2, '2013-03-02 08:36:32', 125),
	(241, 1, 3, 2, '2013-03-02 08:36:48', 23),
	(242, 1, 6, 2, '2013-03-02 08:37:06', 1),
	(243, 1, 9, 2, '2013-03-02 08:43:27', 19),
	(244, 1, 2, 2, '2013-03-02 08:43:41', 1),
	(245, 1, 9, 1, '2013-03-02 08:44:45', 21),
	(246, 1, 9, 1, '2013-03-02 08:45:42', 22),
	(247, 1, 2, 2, '2013-03-02 08:48:24', 1),
	(248, 1, 9, 2, '2013-03-02 08:48:47', 19),
	(249, 1, 9, 2, '2013-03-02 08:48:50', 22),
	(250, 1, 9, 2, '2013-03-02 08:49:20', 22),
	(251, 1, 3, 2, '2013-03-02 20:17:38', 15),
	(252, 1, 3, 2, '2013-03-02 20:17:57', 15),
	(253, 1, 3, 2, '2013-03-02 20:18:16', 15),
	(254, 1, 10, 1, '2013-03-02 20:20:48', 1),
	(255, 1, 6, 2, '2013-03-05 09:00:56', 1),
	(256, 1, 9, 2, '2013-03-05 09:39:31', 22),
	(257, 1, 9, 2, '2013-03-05 09:39:46', 22),
	(258, 1, 6, 2, '2013-03-05 20:10:54', 1),
	(259, 1, 3, 2, '2013-03-05 20:11:30', 15),
	(260, 1, 23, 1, '2013-03-05 20:19:37', 1),
	(261, 1, 23, 3, '2013-03-05 20:24:58', 1),
	(262, 1, 23, 1, '2013-03-05 20:26:53', 2),
	(263, 1, 23, 2, '2013-03-05 20:31:08', 2),
	(264, 1, 23, 2, '2013-03-05 20:44:23', 2),
	(265, 1, 23, 2, '2013-03-05 20:44:42', 2),
	(266, 1, 23, 2, '2013-03-05 20:44:59', 2),
	(267, 1, 23, 2, '2013-03-05 20:45:36', 2),
	(268, 1, 23, 3, '2013-03-05 20:45:47', 2),
	(269, 1, 23, 1, '2013-03-05 20:46:10', 3),
	(270, 1, 23, 2, '2013-03-05 20:50:29', 3),
	(271, 1, 23, 2, '2013-03-05 20:50:57', 3),
	(272, 1, 23, 1, '2013-03-05 20:58:06', 4),
	(273, 1, 23, 2, '2013-03-05 20:58:57', 4),
	(274, 1, 23, 2, '2013-03-05 21:18:06', 4),
	(275, 1, 24, 1, '2013-03-05 21:20:20', 5),
	(276, 1, 23, 2, '2013-03-05 21:29:19', 3),
	(277, 1, 24, 2, '2013-03-05 21:32:27', 5),
	(278, 1, 24, 2, '2013-03-06 20:48:31', 5),
	(279, 1, 24, 2, '2013-03-06 20:50:13', 5),
	(280, 1, 24, 2, '2013-03-06 20:51:34', 5),
	(281, 1, 24, 2, '2013-03-06 21:06:20', 5),
	(282, 1, 24, 2, '2013-03-06 21:07:59', 5),
	(283, 1, 24, 2, '2013-03-06 21:10:48', 5),
	(284, 1, 24, 2, '2013-03-06 21:11:31', 5),
	(285, 1, 24, 2, '2013-03-06 21:11:57', 5),
	(286, 1, 24, 2, '2013-03-06 21:14:09', 5),
	(287, 1, 24, 2, '2013-03-06 21:17:42', 5),
	(288, 1, 24, 2, '2013-03-06 21:18:34', 5),
	(289, 1, 24, 2, '2013-03-06 21:21:36', 5),
	(290, 1, 24, 1, '2013-03-06 21:22:25', 6),
	(291, 1, 3, 2, '2013-03-06 21:48:20', 15),
	(292, 1, 27, 1, '2013-03-06 21:53:27', 1),
	(293, 1, 27, 2, '2013-03-06 21:53:39', 1),
	(294, 1, 23, 2, '2013-03-07 13:11:39', 4),
	(295, 1, 25, 1, '2013-03-07 14:57:50', 1),
	(296, 1, 25, 2, '2013-03-07 14:58:59', 1),
	(297, 1, 25, 1, '2013-03-07 14:59:38', 2),
	(298, 1, 25, 2, '2013-03-07 15:11:17', 2),
	(299, 1, 25, 2, '2013-03-07 15:11:20', 1),
	(300, 1, 25, 2, '2013-03-07 15:11:22', 1),
	(301, 1, 25, 3, '2013-03-07 15:11:33', 2),
	(302, 1, 25, 3, '2013-03-07 15:12:01', 1),
	(303, 1, 25, 1, '2013-03-07 15:15:16', 3),
	(304, 1, 25, 3, '2013-03-07 15:15:50', 3),
	(305, 1, 9, 3, '2013-03-07 15:16:12', 20),
	(306, 1, 24, 1, '2013-03-07 15:18:32', 7),
	(307, 1, 24, 1, '2013-03-07 15:19:34', 8),
	(308, 1, 24, 1, '2013-03-07 15:19:52', 9),
	(309, 1, 24, 1, '2013-03-07 15:20:09', 10),
	(310, 1, 24, 1, '2013-03-07 15:20:30', 11),
	(311, 1, 25, 1, '2013-03-07 15:20:53', 4),
	(312, 1, 27, 1, '2013-03-07 15:21:17', 2),
	(313, 1, 27, 3, '2013-03-07 15:21:30', 2),
	(314, 1, 24, 3, '2013-03-07 15:22:20', 11),
	(315, 1, 24, 3, '2013-03-07 15:22:20', 10),
	(316, 1, 24, 3, '2013-03-07 15:22:20', 8),
	(317, 1, 24, 3, '2013-03-07 15:22:20', 7),
	(318, 1, 24, 1, '2013-03-07 15:22:39', 12),
	(319, 1, 24, 1, '2013-03-07 15:23:58', 13),
	(320, 1, 3, 2, '2013-03-07 16:39:55', 15),
	(321, 1, 10, 2, '2013-03-08 14:51:47', 1),
	(322, 1, 9, 2, '2013-03-08 15:17:56', 21),
	(323, 1, 9, 1, '2013-03-08 15:26:26', 23),
	(324, 1, 9, 2, '2013-03-08 15:28:17', 22),
	(325, 1, 9, 2, '2013-03-08 16:23:07', 22),
	(326, 1, 10, 1, '2013-03-08 16:38:00', 1),
	(327, 1, 10, 2, '2013-03-08 16:39:06', 1),
	(328, 1, 10, 2, '2013-03-08 16:46:12', 1),
	(329, 1, 3, 2, '2013-03-09 13:02:52', 1),
	(330, 1, 32, 1, '2013-03-09 13:07:03', 1),
	(331, 1, 32, 1, '2013-03-09 13:07:38', 2),
	(332, 1, 9, 1, '2013-03-09 14:15:01', 24),
	(333, 1, 10, 1, '2013-03-09 14:38:51', 2),
	(334, 1, 11, 1, '2013-03-09 14:39:35', 2),
	(335, 1, 11, 2, '2013-03-09 14:41:50', 2),
	(336, 1, 10, 2, '2013-03-09 14:42:11', 2),
	(337, 2, 23, 1, '2013-03-09 15:57:14', 5),
	(338, 2, 24, 1, '2013-03-09 15:57:36', 14),
	(339, 1, 25, 1, '2013-03-09 18:46:49', 5),
	(340, 1, 10, 1, '2013-03-10 10:08:57', 3),
	(341, 1, 10, 2, '2013-03-10 10:09:47', 3),
	(342, 1, 11, 1, '2013-03-10 10:10:34', 3),
	(343, 1, 11, 2, '2013-03-10 10:11:05', 3),
	(344, 1, 13, 1, '2013-03-10 21:11:30', 1),
	(345, 1, 13, 2, '2013-03-10 21:12:33', 1),
	(346, 1, 13, 2, '2013-03-10 21:14:51', 1),
	(347, 1, 13, 2, '2013-03-10 21:14:54', 1),
	(348, 1, 14, 1, '2013-03-10 21:50:57', 1),
	(349, 1, 14, 2, '2013-03-10 21:51:17', 1),
	(350, 1, 14, 1, '2013-03-11 08:46:48', 1),
	(351, 1, 14, 1, '2013-03-11 09:43:21', 2),
	(352, 1, 14, 1, '2013-03-11 09:45:00', 3),
	(353, 1, 14, 2, '2013-03-11 09:46:06', 3),
	(354, 1, 14, 2, '2013-03-11 09:47:33', 2),
	(355, 1, 13, 1, '2013-03-11 10:06:08', 1),
	(356, 1, 13, 2, '2013-03-11 10:06:53', 1),
	(357, 1, 13, 1, '2013-03-11 10:07:44', 2),
	(358, 1, 13, 2, '2013-03-11 10:07:57', 2),
	(359, 1, 13, 2, '2013-03-11 10:08:00', 2),
	(360, 1, 13, 1, '2013-03-11 20:50:13', 3),
	(361, 1, 13, 2, '2013-03-11 20:51:26', 3),
	(362, 1, 13, 1, '2013-03-11 20:52:13', 4),
	(363, 1, 13, 2, '2013-03-11 20:52:33', 2),
	(364, 1, 13, 2, '2013-03-11 20:52:53', 4),
	(365, 1, 13, 2, '2013-03-11 20:53:24', 4),
	(366, 1, 13, 2, '2013-03-11 20:53:37', 3),
	(367, 1, 13, 2, '2013-03-11 20:53:44', 3),
	(368, 1, 13, 2, '2013-03-11 20:53:55', 2),
	(369, 1, 3, 2, '2013-03-11 21:41:59', 1),
	(370, 1, 13, 2, '2013-03-11 23:07:40', 1),
	(371, 1, 3, 2, '2013-03-12 10:01:42', 1),
	(372, 1, 30, 1, '2013-03-13 08:50:14', 1),
	(373, 1, 30, 1, '2013-03-13 08:50:38', 2),
	(374, 1, 30, 2, '2013-03-13 08:51:16', 2),
	(375, 1, 30, 3, '2013-03-13 08:51:29', 2),
	(376, 1, 30, 3, '2013-03-13 08:51:59', 1),
	(377, 1, 31, 1, '2013-03-13 22:25:34', 1),
	(378, 1, 31, 2, '2013-03-13 23:44:48', 1),
	(379, 1, 31, 1, '2013-03-14 20:13:16', 2),
	(380, 1, 31, 1, '2013-03-14 20:24:57', 3),
	(381, 1, 31, 2, '2013-03-14 20:26:08', 3),
	(382, 1, 31, 2, '2013-03-14 20:27:26', 2),
	(383, 1, 13, 2, '2013-03-15 14:46:57', 3),
	(384, 1, 13, 2, '2013-03-15 14:47:34', 3),
	(385, 1, 13, 1, '2013-03-15 14:49:18', 22),
	(386, 1, 25, 1, '2013-03-15 19:08:30', 6),
	(387, 1, 26, 1, '2013-03-15 19:17:02', 1),
	(388, 1, 26, 2, '2013-03-15 20:06:47', 1),
	(389, 1, 26, 1, '2013-03-15 20:09:16', 2),
	(390, 1, 26, 2, '2013-03-15 20:10:16', 2),
	(391, 1, 26, 2, '2013-03-15 20:10:33', 2),
	(392, 1, 26, 1, '2013-03-16 09:33:48', 3),
	(393, 1, 3, 2, '2013-03-16 20:31:40', 1),
	(394, 1, 34, 2, '2013-03-16 21:21:03', 6),
	(395, 1, 34, 2, '2013-03-16 21:24:11', 6),
	(396, 1, 34, 2, '2013-03-16 21:30:54', 6),
	(397, 1, 34, 2, '2013-03-16 21:31:13', 6),
	(398, 1, 34, 2, '2013-03-16 21:33:00', 6),
	(399, 1, 34, 2, '2013-03-16 21:33:18', 6),
	(400, 1, 34, 2, '2013-03-16 21:35:11', 6),
	(401, 1, 34, 2, '2013-03-16 21:37:36', 6),
	(402, 1, 30, 2, '2013-03-16 21:38:37', 2),
	(403, 1, 30, 1, '2013-03-16 21:39:03', 3),
	(404, 1, 30, 1, '2013-03-16 21:39:24', 4),
	(405, 1, 30, 1, '2013-03-16 21:39:43', 5),
	(406, 1, 30, 1, '2013-03-16 21:40:04', 6),
	(407, 1, 30, 2, '2013-03-16 21:40:19', 3),
	(408, 1, 34, 2, '2013-03-16 21:52:47', 6),
	(409, 1, 34, 2, '2013-03-17 08:49:15', 6),
	(410, 1, 3, 2, '2013-03-17 09:20:18', 1),
	(411, 1, 31, 2, '2013-03-17 21:51:57', 3),
	(412, 1, 31, 2, '2013-03-17 21:52:16', 1),
	(413, 1, 31, 2, '2013-03-17 21:53:58', 1),
	(414, 1, 31, 2, '2013-03-17 21:54:11', 3),
	(415, 1, 32, 2, '2013-03-18 08:36:02', 1),
	(416, 1, 32, 2, '2013-03-18 08:36:39', 2),
	(417, 1, 32, 2, '2013-03-18 08:37:14', 1),
	(418, 1, 32, 1, '2013-03-18 08:37:50', 3),
	(419, 1, 6, 2, '2013-03-18 10:03:56', 1),
	(420, 1, 10, 2, '2013-03-18 20:45:41', 2),
	(421, 1, 10, 1, '2013-03-18 20:52:41', 4),
	(422, 1, 10, 2, '2013-03-18 21:22:37', 4),
	(423, 1, 10, 1, '2013-03-18 21:29:38', 6),
	(424, 1, 10, 1, '2013-03-18 21:35:52', 7),
	(425, 1, 10, 1, '2013-03-18 21:42:39', 8),
	(426, 1, 10, 1, '2013-03-18 21:55:10', 9),
	(427, 1, 10, 2, '2013-03-18 21:58:26', 9),
	(428, 1, 9, 2, '2013-03-18 22:05:57', 87),
	(429, 1, 9, 2, '2013-03-18 22:08:14', 76),
	(430, 1, 9, 2, '2013-03-18 22:09:43', 77),
	(431, 1, 9, 2, '2013-03-18 22:10:58', 86),
	(432, 1, 9, 2, '2013-03-18 22:12:37', 78),
	(433, 1, 24, 2, '2013-03-19 08:39:02', 14),
	(434, 1, 24, 1, '2013-03-19 08:42:16', 15),
	(435, 1, 24, 1, '2013-03-19 08:43:09', 16),
	(436, 1, 27, 1, '2013-03-19 08:46:51', 1),
	(437, 1, 27, 2, '2013-03-19 08:47:14', 1),
	(438, 1, 27, 1, '2013-03-19 08:52:38', 2),
	(439, 1, 27, 1, '2013-03-19 08:53:50', 3),
	(440, 1, 27, 1, '2013-03-19 08:55:36', 4),
	(441, 1, 27, 2, '2013-03-19 08:56:50', 4),
	(442, 1, 27, 1, '2013-03-19 08:58:40', 5),
	(443, 1, 27, 1, '2013-03-19 09:00:20', 6),
	(444, 1, 27, 1, '2013-03-19 09:01:35', 7),
	(445, 1, 27, 1, '2013-03-19 09:03:41', 8),
	(446, 1, 23, 2, '2013-03-19 09:16:30', 5),
	(447, 1, 23, 1, '2013-03-19 09:17:59', 6),
	(448, 1, 23, 1, '2013-03-19 09:19:54', 7),
	(449, 1, 23, 1, '2013-03-19 09:21:51', 8),
	(450, 1, 23, 1, '2013-03-19 09:23:31', 9),
	(451, 1, 23, 1, '2013-03-19 09:25:33', 10),
	(452, 1, 23, 1, '2013-03-19 09:27:33', 11),
	(453, 1, 31, 2, '2013-03-19 09:47:12', 1),
	(454, 1, 31, 2, '2013-03-19 09:48:24', 2),
	(455, 1, 31, 2, '2013-03-19 09:52:34', 2),
	(456, 1, 31, 2, '2013-03-19 09:53:18', 3),
	(457, 1, 31, 1, '2013-03-19 09:58:40', 4),
	(458, 1, 31, 1, '2013-03-19 10:00:00', 5),
	(459, 1, 31, 1, '2013-03-19 10:03:11', 6),
	(460, 1, 31, 1, '2013-03-19 10:04:10', 7),
	(461, 1, 31, 1, '2013-03-19 10:05:21', 8),
	(462, 1, 31, 1, '2013-03-19 10:05:59', 9),
	(463, 1, 31, 1, '2013-03-19 10:06:36', 10),
	(464, 1, 31, 1, '2013-03-19 10:07:25', 11),
	(465, 1, 31, 1, '2013-03-19 10:08:16', 12),
	(466, 1, 31, 1, '2013-03-19 10:09:23', 13),
	(467, 1, 31, 1, '2013-03-19 10:09:48', 14),
	(468, 1, 31, 1, '2013-03-19 10:10:06', 15),
	(469, 1, 31, 1, '2013-03-19 10:10:23', 16),
	(470, 1, 31, 1, '2013-03-19 10:12:20', 17),
	(471, 1, 31, 1, '2013-03-19 10:12:36', 18),
	(472, 1, 31, 1, '2013-03-19 10:12:53', 19),
	(473, 1, 31, 3, '2013-03-19 21:00:42', 5),
	(474, 1, 13, 2, '2013-03-20 23:25:21', 3),
	(475, 1, 13, 2, '2013-03-20 23:25:34', 2),
	(476, 1, 13, 2, '2013-03-20 23:25:48', 1),
	(477, 1, 3, 2, '2013-03-22 14:11:31', 1),
	(478, 1, 38, 1, '2013-03-22 14:17:45', 1),
	(479, 1, 38, 1, '2013-03-22 14:18:56', 2),
	(480, 1, 38, 2, '2013-03-22 14:19:38', 2),
	(481, 1, 38, 1, '2013-03-22 14:21:39', 3),
	(482, 1, 9, 2, '2013-03-22 16:49:05', 77),
	(483, 1, 9, 2, '2013-03-22 16:49:52', 86),
	(484, 1, 9, 2, '2013-03-22 16:50:44', 78),
	(485, 1, 9, 2, '2013-03-22 16:52:39', 76),
	(486, 1, 23, 2, '2013-03-22 19:20:03', 11),
	(487, 1, 9, 2, '2013-03-22 22:31:40', 83),
	(488, 1, 9, 2, '2013-03-22 22:32:21', 82),
	(489, 1, 9, 2, '2013-03-22 22:32:42', 83),
	(490, 1, 31, 1, '2013-03-22 22:33:20', 20),
	(491, 1, 9, 2, '2013-03-22 22:34:16', 82),
	(492, 1, 31, 1, '2013-03-22 22:34:37', 21),
	(493, 1, 9, 2, '2013-03-22 22:36:00', 81),
	(494, 1, 31, 1, '2013-03-22 22:36:23', 22),
	(495, 1, 9, 2, '2013-03-22 22:37:46', 81),
	(496, 1, 9, 2, '2013-03-22 22:38:19', 82),
	(497, 1, 31, 1, '2013-03-22 22:54:40', 23),
	(498, 1, 31, 1, '2013-03-23 08:33:56', 24),
	(499, 1, 30, 1, '2013-03-23 08:34:57', 7),
	(500, 1, 30, 2, '2013-03-23 09:47:38', 7),
	(501, 1, 30, 1, '2013-03-23 09:48:37', 8),
	(502, 1, 30, 1, '2013-03-23 09:48:57', 9),
	(503, 1, 30, 1, '2013-03-23 09:49:19', 10),
	(504, 1, 30, 2, '2013-03-23 09:49:38', 8),
	(505, 1, 31, 1, '2013-03-23 09:53:01', 25),
	(506, 1, 31, 1, '2013-03-23 09:53:36', 26),
	(507, 1, 31, 1, '2013-03-23 09:54:01', 27),
	(508, 1, 31, 1, '2013-03-23 09:54:31', 28),
	(509, 1, 31, 1, '2013-03-23 09:55:04', 29),
	(510, 1, 31, 1, '2013-03-23 09:55:28', 30),
	(511, 1, 31, 1, '2013-03-23 09:55:49', 31),
	(512, 1, 31, 1, '2013-03-23 09:56:09', 32),
	(513, 1, 31, 1, '2013-03-23 09:56:45', 33),
	(514, 1, 31, 1, '2013-03-23 09:57:24', 34),
	(515, 1, 31, 1, '2013-03-23 09:59:39', 35),
	(516, 1, 31, 1, '2013-03-23 10:00:04', 36),
	(517, 1, 31, 1, '2013-03-23 10:00:58', 37),
	(518, 1, 31, 1, '2013-03-23 10:01:18', 38),
	(519, 1, 31, 1, '2013-03-23 10:01:46', 39),
	(520, 1, 31, 1, '2013-03-23 10:02:20', 40),
	(521, 1, 34, 2, '2013-03-23 10:08:18', 10),
	(522, 1, 31, 2, '2013-03-23 20:35:08', 28),
	(523, 1, 11, 2, '2013-03-23 20:42:52', 2),
	(524, 1, 11, 2, '2013-03-23 20:44:01', 3),
	(525, 1, 11, 1, '2013-03-23 20:44:59', 4),
	(526, 1, 11, 1, '2013-03-23 20:46:04', 5),
	(527, 1, 11, 1, '2013-03-23 20:47:49', 6),
	(528, 1, 11, 1, '2013-03-23 20:55:24', 7),
	(529, 1, 11, 1, '2013-03-23 21:18:16', 8),
	(530, 1, 11, 2, '2013-03-23 21:19:00', 8),
	(531, 1, 11, 1, '2013-03-23 21:23:09', 9),
	(532, 1, 11, 1, '2013-03-23 21:24:21', 10),
	(533, 1, 11, 1, '2013-03-23 21:25:34', 11),
	(534, 1, 11, 1, '2013-03-23 21:26:45', 12),
	(535, 1, 31, 1, '2013-03-23 21:33:02', 41),
	(536, 1, 31, 1, '2013-03-23 21:33:18', 42),
	(537, 1, 31, 1, '2013-03-23 21:33:48', 43),
	(538, 1, 31, 1, '2013-03-23 21:34:09', 44),
	(539, 1, 31, 1, '2013-03-23 21:34:28', 45),
	(540, 1, 31, 1, '2013-03-23 21:34:52', 46),
	(541, 1, 31, 1, '2013-03-23 21:35:14', 47),
	(542, 1, 31, 1, '2013-03-23 21:35:36', 48),
	(543, 1, 31, 1, '2013-03-23 21:35:52', 49),
	(544, 1, 31, 1, '2013-03-23 21:36:11', 50),
	(545, 1, 31, 1, '2013-03-23 21:36:30', 51),
	(546, 1, 31, 2, '2013-03-27 21:49:33', 4),
	(547, 1, 6, 2, '2013-03-30 21:14:54', 1),
	(548, 1, 31, 2, '2013-03-30 21:21:40', 19),
	(549, 1, 31, 2, '2013-03-30 21:22:16', 19),
	(550, 1, 31, 2, '2013-03-30 21:22:59', 18),
	(551, 1, 31, 2, '2013-03-30 21:23:34', 17),
	(552, 1, 31, 2, '2013-03-30 21:24:01', 16),
	(553, 1, 31, 2, '2013-03-30 21:24:41', 15),
	(554, 1, 31, 2, '2013-03-30 21:25:08', 14),
	(555, 1, 31, 2, '2013-03-30 21:25:41', 13),
	(556, 1, 25, 2, '2013-03-31 21:08:32', 5),
	(557, 1, 25, 1, '2013-03-31 21:09:26', 7),
	(558, 1, 3, 2, '2013-04-01 08:58:00', 1),
	(559, 1, 28, 2, '2013-04-01 09:08:02', 1),
	(560, 1, 28, 2, '2013-04-01 09:09:13', 1),
	(561, 1, 28, 2, '2013-04-01 09:33:54', 1),
	(562, 1, 31, 1, '2013-04-01 09:35:35', 52),
	(563, 1, 25, 2, '2013-04-01 09:59:38', 7),
	(564, 1, 25, 2, '2013-04-01 20:46:05', 7),
	(565, 1, 25, 1, '2013-04-01 20:46:56', 8),
	(566, 1, 25, 2, '2013-04-01 20:48:08', 8),
	(567, 1, 25, 2, '2013-04-01 20:49:07', 8),
	(568, 1, 3, 2, '2013-04-01 22:13:51', 1),
	(569, 1, 20, 1, '2013-04-02 10:01:25', 1),
	(570, 1, 20, 2, '2013-04-02 10:19:37', 1),
	(571, 1, 20, 2, '2013-04-02 10:20:24', 1),
	(572, 1, 20, 3, '2013-04-02 10:21:27', 1),
	(573, 1, 20, 3, '2013-04-02 10:21:54', 1),
	(574, 1, 20, 3, '2013-04-02 10:22:10', 1),
	(575, 1, 20, 2, '2013-04-02 10:22:28', 1),
	(576, 1, 20, 2, '2013-04-02 10:22:30', 1),
	(577, 1, 20, 2, '2013-04-02 10:22:52', 1),
	(578, 1, 20, 1, '2013-04-02 10:23:13', 2),
	(579, 1, 20, 3, '2013-04-02 10:39:18', 2),
	(580, 1, 20, 3, '2013-04-02 10:39:19', 1),
	(581, 1, 20, 3, '2013-04-02 10:39:44', 2),
	(582, 1, 20, 3, '2013-04-02 10:39:44', 1),
	(583, 1, 31, 1, '2013-04-02 21:26:15', 53),
	(584, 1, 31, 1, '2013-04-02 21:26:51', 54),
	(585, 1, 31, 2, '2013-04-05 09:30:45', 46),
	(586, 1, 13, 2, '2013-04-05 09:53:52', 1),
	(587, 1, 13, 1, '2013-04-05 09:54:26', 2),
	(588, 1, 13, 1, '2013-04-05 09:54:57', 3),
	(589, 1, 14, 2, '2013-04-05 09:56:35', 1),
	(590, 1, 14, 2, '2013-04-05 09:57:10', 1),
	(591, 1, 14, 1, '2013-04-05 09:58:00', 2),
	(592, 1, 14, 2, '2013-04-05 09:58:24', 1),
	(593, 1, 14, 1, '2013-04-05 09:59:24', 3),
	(594, 1, 14, 1, '2013-04-05 10:00:14', 4),
	(595, 1, 31, 1, '2013-04-05 10:11:40', 55),
	(596, 1, 31, 1, '2013-04-05 10:13:02', 56),
	(597, 1, 31, 1, '2013-04-05 10:13:39', 57),
	(598, 1, 31, 1, '2013-04-05 10:15:34', 58),
	(599, 1, 31, 1, '2013-04-05 10:17:03', 59),
	(600, 1, 9, 1, '2013-04-05 10:19:13', 188),
	(601, 1, 31, 1, '2013-04-05 10:20:09', 60),
	(602, 1, 30, 2, '2013-04-05 10:22:32', 5),
	(603, 1, 14, 1, '2013-04-05 17:29:51', 5),
	(604, 1, 14, 2, '2013-04-05 18:03:31', 5),
	(605, 1, 14, 2, '2013-04-05 18:09:10', 5),
	(606, 1, 13, 2, '2013-04-05 20:56:44', 22),
	(607, 1, 13, 2, '2013-04-05 20:57:02', 2),
	(608, 1, 20, 2, '2013-04-06 21:19:37', 2),
	(609, 1, 25, 2, '2013-04-07 08:23:27', 5),
	(610, 1, 25, 2, '2013-04-07 08:24:28', 5),
	(611, 1, 25, 1, '2013-04-07 08:26:02', 9),
	(612, 1, 25, 2, '2013-04-07 08:29:59', 6),
	(613, 1, 25, 2, '2013-04-07 08:31:47', 7),
	(614, 1, 25, 2, '2013-04-07 08:32:08', 7),
	(615, 1, 25, 2, '2013-04-07 08:32:43', 6),
	(616, 1, 25, 2, '2013-04-07 08:37:50', 8),
	(617, 1, 25, 1, '2013-04-07 08:40:15', 10),
	(618, 1, 25, 1, '2013-04-07 08:40:58', 11),
	(619, 1, 14, 2, '2013-04-07 21:47:40', 2),
	(620, 1, 31, 1, '2013-04-09 10:17:01', 61),
	(621, 1, 31, 1, '2013-04-09 10:17:32', 62),
	(622, 1, 31, 1, '2013-04-09 10:18:38', 63),
	(623, 1, 31, 1, '2013-04-09 10:19:09', 64),
	(624, 1, 31, 1, '2013-04-09 10:19:51', 65),
	(625, 1, 31, 1, '2013-04-09 10:20:26', 66),
	(626, 1, 30, 2, '2013-04-09 10:21:13', 6),
	(627, 1, 30, 2, '2013-04-09 10:22:07', 4),
	(628, 1, 30, 2, '2013-04-09 10:22:41', 3),
	(629, 1, 13, 1, '2013-04-09 14:25:02', 24),
	(630, 1, 3, 2, '2013-04-09 16:06:22', 1),
	(631, 1, 39, 2, '2013-04-09 16:14:46', 1),
	(632, 1, 39, 2, '2013-04-09 16:14:48', 2),
	(633, 1, 39, 2, '2013-04-09 16:14:49', 3),
	(634, 1, 39, 2, '2013-04-09 16:14:50', 2),
	(635, 1, 39, 2, '2013-04-09 16:17:51', 1),
	(636, 1, 39, 2, '2013-04-09 16:17:58', 1),
	(637, 1, 39, 2, '2013-04-09 16:45:19', 1),
	(638, 1, 39, 2, '2013-04-09 16:50:05', 1),
	(639, 1, 39, 2, '2013-04-09 16:51:42', 1),
	(640, 1, 20, 2, '2013-04-09 22:04:05', 20),
	(641, 1, 20, 2, '2013-04-09 22:04:06', 19),
	(642, 1, 20, 2, '2013-04-09 22:04:07', 18),
	(643, 1, 14, 2, '2013-04-10 08:44:13', 33),
	(644, 1, 14, 2, '2013-04-10 08:48:11', 28),
	(645, 1, 20, 2, '2013-04-10 09:06:13', 21),
	(646, 1, 20, 2, '2013-04-10 09:13:22', 21),
	(647, 1, 20, 1, '2013-04-10 21:36:55', 22),
	(648, 1, 18, 1, '2013-04-10 22:01:14', 1),
	(649, 1, 18, 1, '2013-04-10 22:36:43', 2),
	(650, 1, 18, 2, '2013-04-10 22:38:41', 2),
	(651, 1, 18, 1, '2013-04-10 22:41:55', 3),
	(652, 1, 18, 1, '2013-04-10 22:46:03', 4),
	(653, 1, 18, 2, '2013-04-11 09:05:17', 3),
	(654, 1, 18, 3, '2013-04-11 09:05:29', 3),
	(655, 1, 18, 2, '2013-04-11 09:05:42', 2),
	(656, 1, 18, 2, '2013-04-11 09:30:15', 2),
	(657, 1, 18, 2, '2013-04-11 09:30:42', 2),
	(658, 1, 18, 3, '2013-04-11 09:30:56', 2),
	(659, 1, 18, 3, '2013-04-11 09:31:04', 4),
	(660, 1, 18, 3, '2013-04-11 09:31:04', 1),
	(661, 1, 19, 1, '2013-04-11 10:53:02', 1),
	(662, 1, 19, 2, '2013-04-11 10:55:15', 1),
	(663, 1, 19, 1, '2013-04-11 10:58:41', 2),
	(664, 1, 19, 2, '2013-04-11 11:06:27', 2),
	(665, 1, 19, 3, '2013-04-11 11:07:17', 2),
	(666, 1, 19, 3, '2013-04-11 11:07:17', 1),
	(667, 1, 19, 3, '2013-04-11 11:07:40', 2),
	(668, 1, 19, 2, '2013-04-11 11:07:43', 1),
	(669, 1, 19, 2, '2013-04-11 11:07:46', 1),
	(670, 1, 19, 2, '2013-04-11 11:07:59', 1),
	(671, 1, 19, 2, '2013-04-11 11:37:52', 47),
	(672, 1, 19, 2, '2013-04-11 12:37:56', 48),
	(673, 1, 19, 2, '2013-04-11 12:38:06', 48),
	(674, 1, 18, 2, '2013-04-11 13:36:11', 4),
	(675, 1, 10, 2, '2013-04-11 17:08:21', 8),
	(676, 1, 10, 2, '2013-04-11 17:09:21', 8),
	(677, 1, 10, 2, '2013-04-11 17:10:02', 8),
	(678, 1, 10, 2, '2013-04-11 17:20:35', 8),
	(679, 1, 10, 2, '2013-04-11 17:23:14', 8),
	(680, 1, 24, 2, '2013-04-15 10:15:16', 16),
	(681, 1, 24, 2, '2013-04-15 10:15:29', 15),
	(682, 1, 3, 2, '2013-04-20 10:16:40', 1),
	(683, 1, 44, 1, '2013-04-20 20:36:16', 1),
	(684, 1, 44, 2, '2013-04-20 20:36:29', 1),
	(685, 1, 44, 3, '2013-04-20 20:36:42', 1),
	(686, 1, 44, 3, '2013-04-20 20:36:59', 1),
	(687, 1, 44, 2, '2013-04-20 20:37:24', 1),
	(688, 1, 44, 2, '2013-04-20 20:37:26', 1),
	(689, 1, 45, 2, '2013-04-21 09:31:20', 6),
	(690, 1, 45, 2, '2013-04-21 09:31:24', 5),
	(691, 1, 45, 2, '2013-04-21 09:31:27', 4),
	(692, 1, 45, 2, '2013-04-21 09:31:30', 3),
	(693, 1, 45, 2, '2013-04-21 09:31:32', 2),
	(694, 1, 45, 2, '2013-04-21 09:31:35', 1),
	(695, 1, 45, 2, '2013-04-21 10:19:08', 3),
	(696, 1, 45, 2, '2013-04-21 10:19:12', 3),
	(697, 1, 45, 2, '2013-04-21 21:09:23', 6),
	(698, 1, 45, 2, '2013-04-21 21:11:24', 6),
	(699, 1, 45, 1, '2013-04-21 21:13:34', 7),
	(700, 1, 45, 2, '2013-04-21 21:14:38', 7),
	(701, 1, 45, 2, '2013-04-21 21:39:12', 2),
	(702, 1, 45, 2, '2013-04-21 21:43:38', 1),
	(703, 1, 45, 2, '2013-04-21 21:44:37', 2),
	(704, 1, 45, 2, '2013-04-21 21:45:36', 1),
	(705, 1, 45, 2, '2013-04-21 21:45:43', 5),
	(706, 1, 45, 2, '2013-04-21 21:46:49', 3),
	(707, 1, 45, 2, '2013-04-21 21:46:53', 2),
	(708, 1, 45, 2, '2013-04-21 21:47:01', 2),
	(709, 1, 45, 2, '2013-04-21 21:47:06', 1),
	(710, 1, 45, 2, '2013-04-21 21:47:14', 4),
	(711, 1, 45, 2, '2013-04-21 21:47:24', 2),
	(712, 1, 45, 2, '2013-04-21 21:47:31', 1),
	(713, 1, 45, 2, '2013-04-21 21:47:36', 2),
	(714, 1, 45, 2, '2013-04-21 21:47:40', 1),
	(715, 1, 45, 2, '2013-04-21 21:47:46', 3),
	(716, 1, 45, 2, '2013-04-21 21:51:52', 1),
	(717, 1, 45, 2, '2013-04-21 21:51:59', 3),
	(718, 1, 45, 2, '2013-04-21 21:52:02', 2),
	(719, 1, 45, 2, '2013-04-21 21:52:06', 1),
	(720, 1, 45, 2, '2013-04-21 21:52:16', 4),
	(721, 1, 45, 2, '2013-04-21 21:52:21', 1),
	(722, 1, 45, 2, '2013-04-21 21:52:24', 2),
	(723, 1, 45, 2, '2013-04-21 21:52:27', 3),
	(724, 1, 45, 2, '2013-04-21 21:53:38', 2),
	(725, 1, 45, 2, '2013-04-21 21:53:41', 1),
	(726, 1, 45, 2, '2013-04-21 21:53:47', 2),
	(727, 1, 45, 2, '2013-04-21 21:53:49', 1),
	(728, 1, 45, 2, '2013-04-21 21:53:54', 4),
	(729, 1, 45, 2, '2013-04-21 21:53:57', 3),
	(730, 1, 45, 2, '2013-04-21 21:53:59', 1),
	(731, 1, 45, 2, '2013-04-21 21:54:02', 2),
	(732, 1, 45, 2, '2013-04-21 21:54:08', 2),
	(733, 1, 45, 2, '2013-04-21 21:54:11', 1),
	(734, 1, 45, 2, '2013-04-21 21:54:20', 4),
	(735, 1, 45, 2, '2013-04-21 21:54:22', 3),
	(736, 1, 45, 2, '2013-04-21 21:54:24', 2),
	(737, 1, 45, 2, '2013-04-21 21:54:26', 1),
	(738, 1, 45, 2, '2013-04-21 21:54:32', 2),
	(739, 1, 45, 2, '2013-04-21 21:54:37', 3),
	(740, 1, 45, 2, '2013-04-21 21:54:39', 1),
	(741, 1, 45, 2, '2013-04-21 21:54:46', 1),
	(742, 1, 45, 2, '2013-04-21 21:54:52', 1),
	(743, 1, 45, 2, '2013-04-21 21:54:54', 2),
	(744, 1, 45, 2, '2013-04-21 21:54:57', 4),
	(745, 1, 45, 2, '2013-04-21 21:55:04', 27),
	(746, 1, 45, 2, '2013-04-21 21:55:08', 25),
	(747, 1, 45, 2, '2013-04-21 21:55:24', 24),
	(748, 1, 45, 2, '2013-04-21 21:55:27', 26),
	(749, 1, 45, 2, '2013-04-21 21:56:07', 8),
	(750, 1, 45, 2, '2013-04-21 21:56:50', 1),
	(751, 1, 45, 3, '2013-04-21 21:57:28', 7),
	(752, 1, 45, 2, '2013-04-21 21:58:00', 5),
	(753, 1, 45, 3, '2013-04-21 21:58:04', 5),
	(754, 1, 45, 3, '2013-04-21 21:58:27', 3),
	(755, 1, 45, 3, '2013-04-21 21:58:27', 2),
	(756, 1, 45, 3, '2013-04-21 21:58:27', 1),
	(757, 1, 43, 1, '2013-04-23 09:34:12', 1),
	(758, 1, 43, 1, '2013-04-23 09:43:09', 2),
	(759, 1, 43, 2, '2013-04-23 10:04:58', 2),
	(760, 1, 43, 2, '2013-04-23 10:23:21', 1),
	(761, 1, 43, 2, '2013-04-23 10:24:09', 1),
	(762, 1, 43, 2, '2013-04-23 10:24:12', 1),
	(763, 1, 43, 3, '2013-04-23 10:24:25', 1),
	(764, 1, 43, 3, '2013-04-23 10:25:05', 1),
	(765, 1, 43, 3, '2013-04-23 10:25:05', 2),
	(766, 1, 18, 2, '2013-04-23 10:42:33', 5),
	(767, 1, 18, 2, '2013-04-23 10:42:43', 1),
	(768, 1, 18, 1, '2013-04-23 10:43:08', 6),
	(769, 1, 18, 2, '2013-04-23 10:43:39', 6),
	(770, 1, 18, 3, '2013-04-23 10:43:44', 6),
	(771, 1, 18, 3, '2013-04-23 10:45:01', 5),
	(772, 1, 18, 2, '2013-04-23 10:45:14', 4),
	(773, 1, 18, 2, '2013-04-23 10:45:30', 4),
	(774, 1, 18, 2, '2013-04-23 10:48:13', 4),
	(775, 1, 43, 2, '2013-04-23 20:58:07', 1),
	(776, 1, 18, 2, '2013-04-23 20:58:39', 4),
	(777, 1, 3, 2, '2013-04-24 10:01:34', 1),
	(778, 1, 41, 1, '2013-04-24 10:05:41', 11979),
	(779, 1, 41, 2, '2013-04-24 10:06:39', 11979),
	(780, 1, 41, 2, '2013-04-24 10:06:52', 11979),
	(781, 1, 41, 3, '2013-04-24 10:07:04', 11979),
	(782, 1, 40, 2, '2013-04-24 10:08:05', 4),
	(783, 1, 40, 1, '2013-04-24 10:08:34', 7),
	(784, 1, 40, 2, '2013-04-24 10:08:43', 3),
	(785, 1, 40, 2, '2013-04-24 10:08:46', 2),
	(786, 1, 31, 1, '2013-04-25 13:10:50', 67),
	(787, 1, 31, 2, '2013-04-25 13:13:51', 67),
	(788, 1, 31, 1, '2013-04-25 13:14:41', 68),
	(789, 1, 31, 1, '2013-04-25 13:16:12', 69),
	(790, 1, 31, 1, '2013-04-25 13:16:54', 70),
	(791, 1, 43, 2, '2013-04-26 17:25:24', 2),
	(792, 1, 43, 2, '2013-04-26 17:28:08', 1),
	(793, 1, 43, 2, '2013-04-26 17:28:24', 1),
	(794, 1, 43, 2, '2013-04-26 17:30:05', 2),
	(795, 1, 43, 2, '2013-04-26 17:30:26', 2),
	(796, 1, 18, 2, '2013-04-26 21:27:37', 3),
	(797, 1, 18, 2, '2013-04-26 21:27:39', 3),
	(798, 1, 18, 2, '2013-04-26 21:27:41', 2),
	(799, 1, 18, 2, '2013-04-26 21:27:42', 2),
	(800, 1, 18, 3, '2013-04-26 21:28:32', 2),
	(801, 1, 18, 2, '2013-04-26 21:47:53', 3),
	(802, 1, 18, 2, '2013-04-26 21:49:04', 3),
	(803, 1, 18, 2, '2013-04-26 21:50:07', 3),
	(804, 1, 18, 2, '2013-04-26 21:50:18', 3),
	(805, 1, 18, 2, '2013-04-26 21:52:17', 3),
	(806, 1, 18, 2, '2013-04-26 21:52:57', 1),
	(807, 1, 43, 2, '2013-04-26 23:17:25', 1),
	(808, 1, 43, 1, '2013-04-26 23:18:04', 3),
	(809, 1, 43, 2, '2013-04-28 20:28:51', 1),
	(810, 1, 18, 2, '2013-04-28 23:06:13', 7),
	(811, 1, 43, 2, '2013-04-28 23:07:22', 2),
	(812, 1, 43, 2, '2013-04-28 23:07:37', 2),
	(813, 1, 23, 2, '2013-04-29 10:38:23', 5),
	(814, 1, 3, 2, '2013-04-29 20:41:49', 1),
	(815, 1, 47, 1, '2013-04-30 10:01:41', 0),
	(816, 1, 47, 1, '2013-04-30 10:47:43', 2),
	(817, 1, 47, 1, '2013-04-30 10:50:39', 3),
	(818, 1, 47, 1, '2013-04-30 10:52:39', 4),
	(819, 1, 47, 2, '2013-04-30 11:00:17', 1),
	(820, 1, 47, 2, '2013-04-30 11:02:00', 1),
	(821, 1, 47, 2, '2013-05-03 20:13:35', 1),
	(822, 1, 47, 2, '2013-05-03 20:15:34', 1),
	(823, 1, 47, 2, '2013-05-03 20:20:35', 1),
	(824, 1, 47, 2, '2013-05-03 20:21:21', 1),
	(825, 1, 47, 2, '2013-05-03 20:23:55', 1),
	(826, 1, 47, 2, '2013-05-03 20:24:46', 1),
	(827, 1, 47, 2, '2013-05-03 20:24:56', 1),
	(828, 1, 47, 2, '2013-05-03 20:26:23', 1),
	(829, 1, 47, 2, '2013-05-03 20:26:39', 1),
	(830, 1, 47, 2, '2013-05-03 20:28:38', 1),
	(831, 1, 47, 2, '2013-05-03 20:29:46', 1),
	(832, 1, 47, 2, '2013-05-03 20:40:57', 1),
	(833, 1, 47, 2, '2013-05-03 20:41:32', 1),
	(834, 1, 47, 2, '2013-05-03 20:48:49', 1),
	(835, 1, 47, 2, '2013-05-03 20:50:17', 1),
	(836, 1, 47, 2, '2013-05-03 20:50:58', 1),
	(837, 1, 47, 1, '2013-05-03 20:52:04', 5),
	(838, 1, 47, 2, '2013-05-03 22:20:52', 2),
	(839, 1, 47, 2, '2013-05-03 22:21:40', 3),
	(840, 1, 47, 2, '2013-05-03 22:25:02', 3),
	(841, 1, 47, 1, '2013-05-03 22:30:27', 6),
	(842, 1, 47, 2, '2013-05-03 22:30:55', 6),
	(843, 1, 47, 2, '2013-05-03 22:31:26', 6),
	(844, 1, 47, 2, '2013-05-03 22:31:55', 6),
	(845, 1, 47, 2, '2013-05-04 09:35:17', 6),
	(846, 1, 47, 2, '2013-05-04 09:38:29', 6),
	(847, 1, 47, 2, '2013-05-04 09:39:28', 6),
	(848, 1, 47, 2, '2013-05-04 09:53:24', 6),
	(849, 1, 47, 2, '2013-05-04 09:54:22', 6),
	(850, 1, 47, 2, '2013-05-04 09:54:51', 6),
	(851, 1, 47, 2, '2013-05-04 09:56:09', 6),
	(852, 1, 47, 2, '2013-05-04 09:57:50', 6),
	(853, 1, 47, 2, '2013-05-04 09:59:54', 6),
	(854, 1, 47, 2, '2013-05-04 10:00:57', 6),
	(855, 1, 47, 2, '2013-05-04 10:02:13', 6),
	(856, 1, 47, 2, '2013-05-04 10:05:48', 6),
	(857, 1, 47, 2, '2013-05-04 10:07:18', 6),
	(858, 1, 47, 2, '2013-05-04 10:07:33', 6),
	(859, 1, 47, 2, '2013-05-04 20:43:05', 6),
	(860, 1, 47, 2, '2013-05-04 20:43:16', 6),
	(861, 1, 47, 2, '2013-05-04 20:43:46', 6),
	(862, 1, 47, 2, '2013-05-04 20:44:28', 6),
	(863, 1, 47, 2, '2013-05-04 20:47:13', 6),
	(864, 1, 47, 2, '2013-05-04 20:50:30', 6),
	(865, 1, 47, 2, '2013-05-04 20:50:44', 6),
	(866, 1, 47, 2, '2013-05-04 20:51:43', 6),
	(867, 1, 47, 2, '2013-05-04 20:51:54', 6),
	(868, 1, 47, 2, '2013-05-04 20:52:15', 6),
	(869, 1, 47, 2, '2013-05-04 20:52:33', 6),
	(870, 1, 47, 2, '2013-05-04 20:55:34', 2),
	(871, 1, 48, 1, '2013-05-04 21:51:40', 1),
	(872, 1, 48, 2, '2013-05-04 21:52:16', 1),
	(873, 1, 48, 2, '2013-05-04 21:52:30', 1),
	(874, 1, 48, 1, '2013-05-05 09:17:24', 2),
	(875, 1, 48, 2, '2013-05-05 09:17:33', 1),
	(876, 1, 47, 1, '2013-05-05 09:25:49', 1),
	(877, 1, 47, 1, '2013-05-05 09:27:18', 2),
	(878, 1, 47, 1, '2013-05-05 09:28:02', 3),
	(879, 1, 47, 1, '2013-05-05 09:31:05', 4),
	(880, 1, 47, 2, '2013-05-05 09:31:25', 4),
	(881, 1, 47, 1, '2013-05-05 09:31:41', 5),
	(882, 1, 47, 1, '2013-05-05 09:32:32', 6),
	(883, 1, 48, 2, '2013-05-05 09:34:19', 2),
	(884, 1, 48, 1, '2013-05-05 09:34:39', 3),
	(885, 1, 48, 1, '2013-05-05 09:36:07', 4),
	(886, 1, 48, 1, '2013-05-05 09:36:45', 5),
	(887, 1, 48, 1, '2013-05-05 09:37:44', 6),
	(888, 1, 25, 2, '2013-05-06 14:20:55', 11),
	(889, 1, 25, 2, '2013-05-06 14:22:28', 10),
	(890, 1, 25, 2, '2013-05-06 14:22:47', 11),
	(891, 1, 25, 2, '2013-05-06 14:23:06', 9),
	(892, 1, 25, 2, '2013-05-06 14:23:43', 7),
	(893, 1, 25, 2, '2013-05-06 14:26:08', 6),
	(894, 1, 25, 2, '2013-05-06 14:26:43', 8),
	(895, 1, 25, 2, '2013-05-06 14:28:21', 5),
	(896, 1, 28, 2, '2013-05-06 14:36:21', 1),
	(897, 1, 26, 2, '2013-05-06 17:45:05', 1),
	(898, 1, 26, 2, '2013-05-06 18:38:19', 2),
	(899, 1, 26, 2, '2013-05-06 18:38:46', 1),
	(900, 1, 26, 2, '2013-05-06 18:39:17', 3),
	(901, 1, 26, 1, '2013-05-06 18:43:37', 4),
	(902, 1, 3, 2, '2013-05-17 18:12:14', 1),
	(903, 1, 49, 2, '2013-05-17 18:16:05', 4),
	(904, 1, 49, 2, '2013-05-17 18:16:08', 4),
	(905, 1, 49, 1, '2013-05-17 18:35:10', 23),
	(906, 1, 49, 3, '2013-05-17 18:35:57', 23),
	(907, 1, 49, 2, '2013-05-17 18:36:49', 23),
	(908, 1, 49, 2, '2013-05-17 18:43:10', 23),
	(909, 1, 49, 2, '2013-05-17 18:43:41', 23),
	(910, 1, 49, 2, '2013-05-17 18:44:20', 23),
	(911, 1, 49, 2, '2013-05-17 18:49:07', 23),
	(912, 1, 49, 1, '2013-05-17 18:49:45', 24),
	(913, 1, 49, 3, '2013-05-17 18:50:33', 23),
	(914, 1, 49, 3, '2013-05-17 18:50:33', 24),
	(915, 1, 49, 2, '2013-05-17 18:52:09', 22),
	(916, 1, 49, 2, '2013-05-17 18:52:25', 21),
	(917, 1, 49, 2, '2013-05-17 18:52:49', 20),
	(918, 1, 49, 2, '2013-05-17 18:53:21', 19),
	(919, 1, 49, 2, '2013-05-17 18:54:50', 18),
	(920, 1, 49, 2, '2013-05-17 18:55:20', 16),
	(921, 1, 49, 2, '2013-05-17 18:55:59', 15),
	(922, 1, 49, 2, '2013-05-17 18:58:03', 14),
	(923, 1, 49, 2, '2013-05-17 18:58:40', 12),
	(924, 1, 49, 2, '2013-05-17 18:59:13', 11),
	(925, 1, 49, 2, '2013-05-17 19:00:28', 10),
	(926, 1, 49, 2, '2013-05-17 19:00:46', 9),
	(927, 1, 49, 2, '2013-05-17 19:01:10', 8),
	(928, 1, 49, 2, '2013-05-17 19:01:22', 7),
	(929, 1, 49, 2, '2013-05-17 19:02:37', 5),
	(930, 1, 49, 2, '2013-05-17 19:02:52', 3),
	(931, 1, 49, 2, '2013-05-17 19:03:17', 6),
	(932, 1, 49, 2, '2013-05-17 19:04:16', 4),
	(933, 1, 3, 2, '2013-05-18 11:02:55', 1),
	(934, 1, 50, 1, '2013-05-18 11:04:25', 1),
	(935, 1, 50, 2, '2013-05-18 11:06:02', 1),
	(936, 1, 50, 2, '2013-05-18 11:06:26', 1),
	(937, 1, 50, 3, '2013-05-18 18:59:04', 1),
	(938, 1, 50, 2, '2013-05-18 19:07:37', 29),
	(939, 1, 50, 1, '2013-05-18 19:09:55', 32),
	(940, 1, 50, 3, '2013-05-18 19:10:20', 32),
	(941, 1, 50, 2, '2013-05-18 19:27:54', 2),
	(942, 1, 50, 2, '2013-05-18 19:28:05', 2),
	(943, 1, 50, 2, '2013-05-19 09:49:29', 21),
	(944, 1, 3, 2, '2013-05-20 13:49:25', 1),
	(945, 1, 3, 2, '2013-05-20 17:12:24', 1),
	(946, 1, 31, 2, '2013-05-30 18:55:24', 60);
/*!40000 ALTER TABLE `user_history` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
