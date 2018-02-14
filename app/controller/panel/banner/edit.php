<?php

if(!file_exists(panel_view($_url[1]."/".$_url[2]))){
	$page = '404';
}else{
	$page = $_url[1]."/".$_url[2];
}
if(isset($_url[3])){
	$id = url(3);
	$r = explode("_", $id)[1];
	$x = explode("-", $r)[0];
	$run = substr($x, 4);

	$edit =  $db->select("banners")->where("id", $run)->run(true);
	$ximgid = $edit['id'];

}

if( $_POST ){

	$vbx = array();
		$vbx['title'] = htmlspecialchars(post('title'));
		$vbx['slug'] = permalink(post('title'));
		$vbx['description'] = htmlspecialchars(post('description'));
		$vbx['banner_link_url'] = htmlspecialchars(post("link_url"));
		$vbx['stats'] = 1;
		# link active passive
		if(post("link") == 1)
			$vbx['banner_link'] = 1;
		else
			$vbx['banner_link'] = 0;

		$update = $db->update("banners")->where("id",$run)->set($vbx);
		if( $update ){
			$cb['err']['title'] = "Başarılı : ";
			$cb['err']['message'] = "Slider başarılı bir şekilde güncellenmiştir.";
			$cb['err']['type'] = "success";
			$cb['err']['catID'] = 1;
		}else{
			$cb['err']['title'] = "Hata : ";
			$cb['err']['message'] = "Slider güncelleme sırasında bir hata oluştu.";
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
