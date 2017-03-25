<?php
/**
	Uygulama istemcisi !
		## veri tabanı bağlantıları
		## class ve fonksiyonları Yükeleme
		## sayfa dil paket yükleme
		## lisans kontol işlevleri
		## site bakım modu aktifleştirme
		## Site yayın durdurma.
**/

# sayfa içine çağırılan php classlarını otomatik yükleyen fonksiyon
function __autoload($className){
	$classFile = __DIR__ . '/classes/class.'.strtolower($className).'.php';
	if(file_exists($classFile)){
		require $classFile;
	}
}

# helper class yükleme işlemi
Helper::Load();

# system bağlantı ve ayarlarını yapan dosyaları çağır
require 'system/config.php';

# sayfa dili değiştirme işlemi
function langchange($langType){
	# Dili sessiona at
	$config['default_language'] = $langType;
}

# eğer dil sessionu yoksa tanımlayacak
if(!isset($_SESSION['language'])){
    $_SESSION['language'] = $config['default_language'];
}
# dil dosyası çağıralım
require 'language/' . $_SESSION['language'] . '/lang.php';

# veri tabanı bağlantısı
$db = new basicdb($config['db']['host'], $config['db']['name'], $config['db']['user'], $config['db']['pass']);

#site genel ayarları
$val = $db->select("site_settings")
    ->where("ayarid",3)
    ->run(true);

/* END THE PAGE */