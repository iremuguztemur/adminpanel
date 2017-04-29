<?php
/**
	Delta Ajan Web Site System v:1.2
	Create by : Delta Ajans
	User : Taner Tombaş <taner@deltaajans.xyz> - <tombastaner@gmail.com>

	{ SYSTEM PAGE [ GENERAL SETTINGS ] }
		-> About database connection 
		-> First load language selected
		-> Constant variables
**/
$config = array();

#database connect veriables example : ( $config['db']['host'] ) [ - LOCALhOST - ]
$config['db'] = [
  'host' => 'localhost',
  'name' => 'deltaajans',
  'user' => 'root',
  'pass' => ''
];

/* 
#database connect veriables example : ( $config['db']['host'] ) [ - SERVER - ] 
$config['db'] = [
  'host' => 'localhost',
  'name' => 'samsunsegman',
  'user' => 'root',
  'pass' => ''
];
*/

# first opening language
$config['default_language'] = 'tr';

# static veriable's [ directory ]
define('_base', realpath('.')); #[ system root ]
define('_condir', _base.'/app/controller');  //@todo:: [ app/controller ]
define('_public', _base.'/public');  //@todo:: [ _base/public ]
define('_inc', _base.'/public/include');  //@todo:: [ _base/public/include ] ( file catch )

# static veriable's [ browser url ]
define('_siteurl', "http://".$_SERVER['SERVER_NAME']."/".explode("/",$_SERVER['SCRIPT_NAME'])[1]); #[ page browser url / folder name catch ]
define('_upload', _siteurl."/upload/");
define('_updocs', _siteurl."/upload/docs/");
define('_ajax', _siteurl."/ajax/");

/*
  END THE CODE | END THE PAGE
*/