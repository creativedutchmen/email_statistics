<?php

$protocol = strpos($_SERVER['SERVER_SIGNATURE'], '443') !== false ? 'https://' : 'http://';

define('DOCROOT', dirname(dirname(dirname(dirname(__FILE__)))));
define('DOMAIN', $protocol . rtrim(rtrim($_SERVER['HTTP_HOST'], '\\/') . dirname(dirname(dirname(dirname($_SERVER['PHP_SELF'])))), '\\/'));

require_once(DOCROOT . '/symphony/lib/boot/bundle.php');
require_once(DOCROOT . '/symphony/lib/core/class.symphony.php');
require_once(DOCROOT . '/symphony/lib/core/class.administration.php');

$thing = Administration::instance();

$key = $_GET['key'];
$stats = Symphony::Database()->fetch(sprintf('SELECT * FROM `tbl_email_statistics` where `key` = \'%s\' LIMIT 1', Symphony::Database()->cleanValue($key)));

if(!empty($stats)){
	Symphony::Database()->update(array(
			'ip'=>Symphony::Database()->cleanValue($_SERVER['REMOTE_ADDR']),
			'useragent'=>Symphony::Database()->cleanValue($_SERVER['HTTP_USER_AGENT'])
		),
		'tbl_email_statistics',
		 sprintf(
			'`id` = \'%s\'',
			Symphony::Database()->cleanValue($stats[0]['id'])
		)
	);
	Symphony::Database()->insert(array(
			'date'			=> date('Y-m-d H:i:s'),
			'statistics_id'	=> 	Symphony::Database()->cleanValue($stats[0]['id'])
		),
		'tbl_email_statistics_opens',
		true
	);
}
header('Location:' . DOMAIN . '/track/transparent.gif');