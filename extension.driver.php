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
			  `date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
			  `open` timestamp NULL DEFAULT NULL,
			  `read` timestamp NULL DEFAULT NULL,
			  `user_agent` text,
			  `IP` varchar(15) DEFAULT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;';
			return Symphony::Database()->query($query);
		}

		public function uninstall()
		{
			$query = 'DROP TABLE IF EXISTS `tbl_email_statistics`';
			return Symphony::Database()->query($query);
		}
	}