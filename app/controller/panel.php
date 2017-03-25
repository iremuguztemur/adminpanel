<?php

$module = '404';
if( $_url[0] )
	$module = $_url[0];
else{
	$module = '404';
};


# headeri getir
require panel_controller("index");