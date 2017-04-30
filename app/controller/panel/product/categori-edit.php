<?php

if(!file_exists(panel_view($_url[1]."/".$_url[2]))){
  	$page = '404';
}else{
	$page = $_url[1]."/".$_url[2];
}

if(url(3)) {
	$id = url(3);
	$r = explode("_", $id)[1];
	$x = explode("-", $r)[0];
	$run = substr($x, 4);

	$group_list = $db->select("product_group")->orderby("group_id","ASC")->run();
	$edit = $db->select("product_categori")->where("categori_id",$run)->run(true);
};

if( $_POST ){
	$cb = array();

	$v = array();
		$v['group_id'] = htmlspecialchars(trim($_POST['group_id']));
		$v['categori_name'] = htmlspecialchars(trim($_POST['categori_name']));
		$v['categori_image'] = htmlspecialchars(trim($_POST['images']));
		$clear = str_replace("amp","",$v['categori_name']);
		$v['categori_seo'] = permalink($clear);
		$v['categori_description'] = htmlspecialchars(trim($_POST['categori_description']));
		$v['stats'] = $edit['stats'];
		$v['categori_sira'] = $edit['categori_sira'];


		if($v['categori_name'] != ''){
			$insert = $db->update("product_categori")->where("categori_id",$run)->set($v);

			if( $insert ){
				$cb['err']['title'] = "Başarılı: ";
				$cb['err']['message'] = "Kategori başarılı bir şekilde güncellenmiştir.";
				$cb['err']['type'] = "success";
			}else{
				$cb['err']['title'] = "Hata : ";
				$cb['err']['message'] = "Kategori güncelleme sırasında bir hata oluştu.";
				$cb['err']['type'] = "danger";
			}


		}else{
			$cb['err']['title'] = "Uyarı : ";
			$cb['err']['message'] = "Kategori adını boş bırakmayınız.";
			$cb['err']['type'] = "warning";
		}



}
# call header
require panel_statics("header");
require panel_statics("sidebar");

# call page content
require panel_view($page);

# call footer
require panel_statics("footer");
