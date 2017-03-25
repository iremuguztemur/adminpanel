<?php
	# gereklileri başlat.
	session_start();
	ob_start();

	# app dizin istemcisini çağır.
	require_once("app/init.php");

	# urlden gelen get değerini fonksiyondan geçir ve parçala
	$_url = get('url'); #todo:: app/helpers/url
	$_url = array_filter(explode('/', $_url));

	# eğer url de gelen bir sayfa yoksa ( ilk açılış için ! )
	if(!isset($_url[0]))
		$_url[0] = 'index';

	# eğer çağırılan sayfa klasörde yok ise
	if (!file_exists(controller($_url[0])))
		$_url[0] = '404';

#sayfa güvenlik kontrolü
	# Bakım Modu kontrolü.
	if($val['bakim'] != 0){
		$_url[0] = guvenlik::control_this_page('bakimmodu',0,1);
	};
	# kullanıcı tarafından site kapalı açık kontrolü.
	if($val['aktif'] != 1){
		$_url[0] = guvenlik::control_this_page('sitekapali',0,1);
	};

# lisans sistemi başlat !
	if($val['lisans_kodu'] == ''){
		$_url[0] = licanse::lisans_yok();
	}




# sayfayı çağır
	require_once(controller($_url[0]));
