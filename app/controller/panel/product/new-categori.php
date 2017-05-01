<?php

if(!file_exists(panel_view($_url[1]."/".$_url[2]))){
  	$page = '404';
}else{
	$page = $_url[1]."/".$_url[2];
}
$group_list =  $db->select("product_group")->orderby("group_id", "ASC")->run();
/*
# last page id catch.
$pagelist = $db->select("pages")->orderby("page_id","DESC")->run(true);
# -> next page id add
$pageid = $pagelist['page_id'] + 1;
# -> lock id;
$id = "page_".mbs_rand(4).$pageid."-".mbs_rand(4);
*/
if( $_POST ){
	$cb = array();
	$sira = 0;
	$number =  $db->select("product_categori")->orderby("categori_id", "DESC")->run(true);

	if( $number )
		$sira = $number['categori_sira'];

	$v = array();
		$v['group_id'] = htmlspecialchars(trim($_POST['group_id']));
		$v['categori_name'] = htmlspecialchars(trim($_POST['categori_name']));
		$v['categori_image'] = htmlspecialchars(trim($_POST['images']));
		$clear = str_replace("amp","",$v['categori_name']);
		$v['categori_seo'] = permalink($clear);
		$v['categori_description'] = htmlspecialchars(trim($_POST['categori_description']));
		$v['stats'] = 1;
		$v['categori_sira'] = $sira;


		if($v['categori_name'] != ''){
			$insert = $db->insert("product_categori") ->set($v);
			if( $insert ){
				$cb['err']['title'] = "Başarılı: ";
				$cb['err']['message'] = "Kategori başarılı bir şekilde eklenmiştir.";
				$cb['err']['type'] = "success";
			}else{
				$cb['err']['title'] = "Hata : ";
				$cb['err']['message'] = "Kategori ekleme sırasında bir hata oluştu.";
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
