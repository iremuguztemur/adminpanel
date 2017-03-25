<?php 
/*
	yapılandırma sayfası
		## veri tabanı bağlantı bilgileri
        ## açılış dili seçme işlevi
		## sabit değişkenler
*/
# bağlantı bilgileri
$config = array();

$config['db'] = [
  'host' => 'localhost',
  'name' => 'deltaajans',
  'user' => 'root',
  'pass' => ''
];
/*
$config['db'] = [
	'host' => 'localhost',
	'name' => 'deltaaja_demo_engizpide',
	'user' => 'deltaaja_engizsg',
	'pass' => 'pq=,*,iL7r50'
];
*/

# açılış dili seçecek
$config['default_language'] = 'tr';

# bütün sayfalarda kullanılacak olan değişkenler
define('bdir', realpath('.')); // @todo:: basedir site dosya başlangıcı

//@todo:: site url :burada .explode("/",$_SERVER['SCRIPT_NAME'])[1]."/ bölümü yayına alınırken kaldırılacaktır.
define('surl', "http://".$_SERVER['SERVER_NAME']."/".explode("/",$_SERVER['SCRIPT_NAME'])[1]."/");
define('contdir', bdir.'/app/controller');  //@todo:: bdir   -> controller klasörü veri yolu
define('inc', bdir.'/public/includes/');    //@todo:: inc    -> include edilecek dosyaların veri yolu
define('pubdir', bdir.'/public');           //@todo:: pubdir -> public klasörünün veri yolu
define('updir', surl.'upload');             //@todo:: updir  -> sayfaya panelden yüklenen dosyaların (resim,pdf) veri yolu
define('ajdir', surl.'ajax/');              //@todo:: ajdir  -> sayfada kullanılan ajax dosysalarının veri yolu.

/* END THE PAGE */