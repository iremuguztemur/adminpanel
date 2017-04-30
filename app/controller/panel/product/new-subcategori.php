<?php

if(!file_exists(panel_view($_url[1]."/".$_url[2]))){
  	$page = '404';
}else{
	$page = $_url[1]."/".$_url[2];
}


if(isset( $_url[3] )) {
	$getid = url(3);
	$r =  explode("_",$getid)[1];
	$x = explode("-",$r)[0];
	$id = substr($x,4);

	$select_categori =  $db->select("product_categori")->where("categori_id",$id)->orderby("categori_id", "ASC")->run(true);
	$group =  $db->select("product_group")->where("group_id",$select_categori['group_id'])->run(true);
	$group_list =  $db->select("product_categori")->where("group_id",$select_categori['group_id'])->orderby("categori_id", "ASC")->run();

}else{
	$group_list =  $db->select("product_categori")->orderby("categori_id", "ASC")->run();
}

if( $_POST ){
	$cb = array();
	$sira = 0;
	$number =  $db->select("product_subcategori")->orderby("subcategori_id", "DESC")->run(true);

	if( $number )
		$sira = $number['subcategori_sira'];

	$v = array();
		$v['categori_id'] = htmlspecialchars(trim($_POST['categori_id']));
		$v['subcategori_name'] = htmlspecialchars(trim($_POST['subcategori_name']));
		$v['subcategori_image'] = htmlspecialchars(trim($_POST['images']));
		$clear = str_replace("amp","",$v['subcategori_name']);
		$v['subcategori_seo'] = permalink($clear);
		$v['subcategori_description'] = htmlspecialchars(trim($_POST['subcategori_description']));
		$v['stats'] = 1;
		$v['subcategori_sira'] = $sira;


		if($v['subcategori_name'] != ''){
			$insert = $db->insert("product_subcategori") ->set($v);

			if( $insert ){
				$cb['err']['title'] = "Başarılı : ";
				$cb['err']['message'] = "Alt Kategori başarılı bir şekilde eklenmiştir.";
				$cb['err']['type'] = "success";
			}else{
				$cb['err']['title'] = "Hata : ";
				$cb['err']['message'] = "Alt Kategori ekleme sırasında bir hata oluştu.";
				$cb['err']['type'] = "danger";
			}


		}else{
			$cb['err']['title'] = "Uyarı : ";
			$cb['err']['message'] = "Alt Kategori adını boş bırakmayınız.";
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
