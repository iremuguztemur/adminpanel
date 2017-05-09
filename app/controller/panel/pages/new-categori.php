<?php

if(!file_exists( panel_view( url(1)."/".url(2) ) )){
  	$page = '404';
}else{
	$page = $_url[1]."/".$_url[2];
};
if( $_POST ){
	$cb = array();
	$sira = 0;
	$number =  $db->select("page_categori")->orderby("categori_id", "DESC")->run(true);

	if( $number )
		$sira = $number['categori_sira'];

	$v = array();
		$v['categori_name'] = htmlspecialchars(post("categori_name"));
		$v['categori_image'] = htmlspecialchars(post("images"));
		$clear = str_replace("amp","",$v['categori_name']);
		$v['categori_self'] = permalink($clear);
		$v['categori_description'] = htmlspecialchars(post("categori_description"));
		$v['stats'] = 1;
		$v['categori_sira'] = $sira;

		if($v['categori_name'] != ''){
			$insert = $db->insert("page_categori")->set($v);

			if( $insert ){
				$cb['err']['title'] = "Başarılı.";
				$cb['err']['message'] = "Kategori başarılı bir şekilde eklenmiştir.";
				$cb['err']['type'] = "success";
			}else{
				$cb['err']['title'] = "Hata !";
				$cb['err']['message'] = "Kategori ekleme sırasında bir hata oluştu.";
				$cb['err']['type'] = "danger";
			}
		}
}
# call header
require panel_statics("header");
require panel_statics("sidebar");

# call page content
require panel_view($page);

# call footer
require panel_statics("footer");
