<?php
/**
	Delta Ajan Web Site System v:1.2
	Create by : Delta Ajans
	User : Taner Tombaş <taner@deltaajans.xyz> - <tombastaner@gmail.com>

	{ URL HELPER [ NECESSARY SETTINGS ] }
		-> clear url functions 
		-> method catcher ( get and post )
		-> site url Router
		-> asset catcher ( js and css )
**/

# url clear function :
function filterUrl($str){
  return htmlspecialchars(trim($str));
}

#method catcher [ $_GET ]
function get($name){
  if(isset($_GET[$name])){

    if (is_array($_GET[$name])){
      return array_map(function($item){
        return filterUrl($item);
      }, $_GET[$name]);
    }

    return filterUrl($_GET[$name]);

  }
  return false;
}

#method catcher [ $_POST ]
function post($name){
  if(isset($_POST[$name])){

    if (is_array($_POST[$name])){
      return array_map(function($item){
        return filterUrl($item);
      }, $_POST[$name]);
    }

    return filterUrl($_POST[$name]);

  }
  return false;
}

#url catcher --> [ all urls ]
function url($index){
  global $_url;
  if (isset($_url[$index]))
    return $_url[$index];
  return false;
}

#the next page call here !
function site_url($url = null){
  return _siteurl . $url;
}


# The assets call here !
function asset_url($url = null){
  return _siteurl . '/assets/' . $url;
}