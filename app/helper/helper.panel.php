<?php

/**
	Delta Ajan Web Site System v:1.2
	Create by : Delta Ajans
	User : Taner Tombaş <taner@deltaajans.xyz> - <tombastaner@gmail.com>

	{ ADMINISTRATOR DASHBOARD HELPER [ NECESSARY SETTINGS ] }

		

**/

# The assets call here !
function panel_asset_url($url = null){
  return _siteurl . '/assets/panel/' . $url;
}

#the next page call here !
function panel_url($url = null){
  return _siteurl. '/panel/' . $url;
}

#random char generator !
function mbs_rand( $charLength="20" ){
	$key = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$chLn = strlen($key);
	$randKey='';
	for ($i = 0; $i < $charLength; $i++) {
		$randKey = $randKey."".$key[rand(0, $chLn - 1)];
	};
	return $randKey;
}