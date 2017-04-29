<?php
/**
	Delta Ajan Web Site System v:1.2
	Create by : Delta Ajans
	User : Taner Tombaş <taner@deltaajans.xyz> - <tombastaner@gmail.com>

	{ APPLICATON CLIENT }
		-> Data base Connection
		-> page class and function load
		-> page language system activate
		-> licance control system
		-> web site maintenance mode
		-> Stop site posting
**/

# todo : @ Automatic page classes loading 
function __autoload($className){
	$classFile = __DIR__ . '/classes/class.'.strtolower($className).'.php';
	if(file_exists($classFile)){
		require $classFile;
	}
}

# Loading Helpers 
Helper::Load();

# system default array's
require 'system/config.php';


# connnect database
$db = new basicdb($config['db']['host'], $config['db']['name'], $config['db']['user'], $config['db']['pass']);

#website first settings loading
$val = $db->select("general_setting")
	->where("ayarid",1)
	->run(true);