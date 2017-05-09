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
	$arr = array();
	$sei =  $db->select("product_categori")->where("categori_id", $run)->run(true);
	if(!isset($sei)){
		header("Location:".panel_url("product-categori"));
	}
}

if( $_POST ){
	$cb = array();
	$sira = 0;

	$v = array();
	$v['categori_name'] = htmlspecialchars(post("categori_name"));
	$clear = str_replace("amp","",$v['categori_name']);
	$v['categori_self'] = permalink($clear);
	$v['categori_image'] = htmlspecialchars(trim($_POST['images']));
	$v['stats'] = $sei['stats'];
	$v['categori_sira'] = $sei['categori_sira'];
	if($v['categori_name'] != ''){
		$update = $db->update("product_categori")->where("categori_id",$run)->set($v);

		if( $update ){
			$cb['err']['title'] = "Başarılı.";
			$cb['err']['message'] = "Kategori başarılı bir şekilde güncellenmiştir.";
			$cb['err']['type'] = "success";
		}else{
			$cb['err']['title'] = "Hata !";
			$cb['err']['message'] = "Kategori güncelleme sırasında bir hata oluştu.";
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
