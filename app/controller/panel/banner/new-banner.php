<?php

if(!file_exists(panel_view($_url[1]."/".$_url[2]))){
	$page = '404';
}else{
	$page = $_url[1]."/".$_url[2];
}
$pr_id = $db->select("banners")->orderby("id", "DESC")->run(true);

if($pr_id){
	$ximgid = $pr_id['id'] + 1;
}else{
	$ximgid = 1;
}


if( $_POST ){
	$vbx = array();
		$vbx['title'] = htmlspecialchars(post('title'));
		$vbx['slug'] = permalink(post('slug'));
		$vbx['description'] = htmlspecialchars(post('description'));
		$vbx['banner_link_url'] = htmlspecialchars(post("link_url"));
		$vbx['stats'] = 1;
		# link active passive
		if(post("link") == 1)
			$vbx['banner_link'] = 1;
		else
			$vbx['banner_link'] = 0;

		$insert = $db->insert("banners")->set($vbx);
		if( $insert ){
			$cb['err']['title'] = "Başarılı : ";
			$cb['err']['message'] = "Slider başarılı bir şekilde eklenmiştir.";
			$cb['err']['type'] = "success";
			$cb['err']['catID'] = post('categori_id');
		}else{
			$cb['err']['title'] = "Hata : ";
			$cb['err']['message'] = "Slider ekleme sırasında bir hata oluştu.";
			$cb['err']['type'] = "danger";
            $cb['err']['catID'] = 1;
		}
}
# call header
require panel_statics("header");
require panel_statics("sidebar");

# call page content
require panel_view($page);

# call footer
require panel_statics("footer");
