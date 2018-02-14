<?php
if(!url(2)){
  $_url[2] = 'index';
};
if (!file_exists(panel_controller(url(1)."/".url(2)))){
  $_url[2] = 'index';
};

if(!control_session('login')){
	$_url[2] = 'login';
}

require panel_controller(url(1)."/".url(2));
