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

	$edit = $db->select("product_subcategori")->where("subcategori_id",$run)->run(true);

	$categori = $db->select("product_categori")->where("categori_id",$edit['categori_id'])->run(true);
	$group_list = $db->select("product_categori")->where("group_id",$categori['group_id'])->orderby("categori_id","ASC")->run();
};

if( $_POST ){
	$cb = array();

	$v = array();
		$v['categori_id'] = htmlspecialchars(trim($_POST['categori_id']));
		$v['subcategori_name'] = htmlspecialchars(trim($_POST['subcategori_name']));
		$v['subcategori_image'] = htmlspecialchars(trim($_POST['images']));
		$clear = str_replace("amp","",$v['subcategori_name']);
		$v['subcategori_seo'] = permalink($clear);
		$v['subcategori_description'] = htmlspecialchars(trim($_POST['subcategori_description']));
		$v['stats'] = $edit['stats'];
		$v['subcategori_sira'] = $edit['subcategori_sira'];
		if($v['subcategori_name'] != ''){
			$insert = $db->update("product_subcategori")->where("subcategori_id",$run)->set($v);

			if( $insert ){
				$cb['err']['title'] = "Başarılı: ";
				$cb['err']['message'] = "Alt Kategori başarılı bir şekilde güncellenmiştir.";
				$cb['err']['type'] = "success";
			}else{
				$cb['err']['title'] = "Hata : ";
				$cb['err']['message'] = "Alt Kategori güncelleme sırasında bir hata oluştu.";
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
