<?php

if(!file_exists(panel_view($_url[1]."/".$_url[2]))){
	$page = '404';
}else{
	$page = $_url[1]."/".$_url[2];
}
$group_list =  $db->select("product_categori")->orderby("categori_id", "ASC")->run();
$pr_id = $db->select("img_library")->orderby("img_id","DESC")->run(true);

if($pr_id){
	$ximgid = $pr_id['img_id'] + 1;
}else{
	$ximgid = 1;
}


if( $_POST ){

	$vbx = array();
		$vbx['categori_id'] = htmlspecialchars(post['categori_id']);
		$vbx['product_name'] = htmlspecialchars(post['product_name']);
		$vbx['product_self'] = permalink(post['product_name']);
		$vbx['product_description'] = htmlspecialchars(post['product_description']);
		$vbx['product_text'] = htmlspecialchars(post['product_text']);
		$vbx['product_image'] = htmlspecialchars(trim(post['images']));
		$vbx['product_link'] = htmlspecialchars(trim(post['product_link']));

		$insert = $db->insert("products")->set($vbx);

		if( $insert ){
			$cb['err']['title'] = "Başarılı : ";
			$cb['err']['message'] = "Kategori başarılı bir şekilde eklenmiştir.";
			$cb['err']['type'] = "success";
		}else{
			$cb['err']['title'] = "Hata : ";
			$cb['err']['message'] = "Kategori ekleme sırasında bir hata oluştu.";
			$cb['err']['type'] = "danger";
		}
}
# call header
require panel_statics("header");
require panel_statics("sidebar");

# call page content
require panel_view($page);

# call footer
require panel_statics("footer");
