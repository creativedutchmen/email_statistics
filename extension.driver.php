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
			return true;
		}

		public function uninstall()
		{
			return true;
		}
	}