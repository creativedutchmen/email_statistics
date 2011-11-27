<?php
	
	Class extension_email_statistics extends Extension{

		public function about(){
			return array(
				'name' => 'Email Statistics',
				'version' => '0.1',
				'release-date' => '2011-11-26',
				'author' => array( 
					'name' => 'Huib Keemink',
					'website' => 'http://www.creativedutchmen.com',
					'email' => 'huib.keemink@creativedutchmen.com'
				)
			);
		}
		public function install()
		{
			$query = 'CREATE TABLE IF NOT EXISTS `tbl_email_statistics` (
			  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			  `newsletter_id` int(11) unsigned NOT NULL,
			  `key` varchar(200) DEFAULT NULL,
			  `useragent` text DEFAULT NULL,
			  `ip` varchar(15) DEFAULT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;';
			if(!Symphony::Database()->query($query)) return false;

			$query = 'CREATE TABLE IF NOT EXISTS `tbl_email_statistics_opens` (
			  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			  `statistics_id` int(11) unsigned NOT NULL,
			  `date` datetime DEFAULT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;';
			if(!Symphony::Database()->query($query)) return false;

			$query = 'CREATE TABLE IF NOT EXISTS `tbl_email_statistics_clicks` (
			  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			  `statistics_id` int(11) unsigned NOT NULL,
			  `date` datetime DEFAULT NULL,
			  `url` text DEFAULT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;';
			if(!Symphony::Database()->query($query)) return false;

			return true;
		}

		public function uninstall()
		{
			$query = 'DROP TABLE IF EXISTS `tbl_email_statistics`';
			if(!Symphony::Database()->query($query)) return false;
			
			$query = 'DROP TABLE IF EXISTS `tbl_email_statistics_clicks`';
			if(!Symphony::Database()->query($query)) return false;
			
			$query = 'DROP TABLE IF EXISTS `tbl_email_statistics_opens`';
			if(!Symphony::Database()->query($query)) return false;
			
			return true;
		}
	}