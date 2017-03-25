<?php
$module = '404';
if( isset($_url[1]) )
	$module = $_url[1];
else{
	$module = "index";
};

if(!file_exists(panel_view($module))){
	$module = '404';
}


# headeri getir
require panel_view("includes/header");

#içeriği çağır
require panel_view($module);

# footeri getir
require panel_view("includes/footer");