<?php

# controller sayfalarını çağıralım
function controller($name){
	return contdir . '/' . $name . '.php';
};

# kullanıcıların göreceği sayfaları çağıralım
function view($name){
	return pubdir . '/' . $name . '.php';
};

# içerik dili fonksiyon
function __($langCode){
  global $lang;
  if(isset($lang[strtolower($langCode)]))
    return $lang[strtolower($langCode)];
  return $langCode;
}

#panel controller cagıralım :
function panel_controller($name){
	return contdir . '/panel/' . $name . '.php';
};
#panel controller cagıralım :
function panel_view($name){
	return pubdir . '/panel/' . $name . '.php';
};




/* END THE PAGE */