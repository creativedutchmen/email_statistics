<?php
require_once(TOOLKIT . '/class.datasource.php');
class datasourceemail_statistics extends DataSource
{
	public $dsParamROOTELEMENT = 'email-statistics';

	public function __construct(&$parent, $env=NULL, $process_params=true){
		parent::__construct($parent, $env, $process_params);
		$this->_dependencies = array();
	}
	public function about(){
		return array(
			'name' => 'Email Statistics',
			'author' => array(
				'name' => 'Huib Keemink',
				'website' => 'http://creativedutchmen.com',
				'email' => 'huib@creativedutchmen.com'),
			'version' => '1.0',
			'release-date' => '2011-11-26'
		);
	}
	
	public function allowEditorToParse(){ 
		return false;
	}
	
	public function grab($param_pool = NULL){
		$result = new XMLElement($this->dsParamROOTELEMENT);
		$data = array(
			'newsletter_id' => is_null($param_pool['enm_newsletter_id'])?0:$param_pool['enm_newsletter_id'],
			'key'			=> $id = uniqid(),
		);
		Symphony::Database()->insert($data, 'tbl_email_statistics');
		$result->appendChild(new XMLElement('identifier', $id));
		return $result;
	}
}