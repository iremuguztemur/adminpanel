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
	$sei =  $db->select("product_group")->where("group_id", $run)->run(true);
	if(!isset($sei)){
		header("Location:".panel_url("product-group"));
	}

};


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

	$v = array();
	$v['group_name'] = htmlspecialchars(trim($_POST['group_name']));
	$clear = str_replace("amp","",$v['group_name']);
	$v['group_seo'] = permalink($clear);
	$v['group_image'] = htmlspecialchars(trim($_POST['images']));
	$v['stats'] = $sei['stats'];
	$v['group_sira'] = $sei['group_sira'];


	if($v['group_name'] != ''){
		$update = $db->update("product_group")->where("group_id",$run)->set($v);

		if( $update ){
			$cb['err']['title'] = "Başarılı.";
			$cb['err']['message'] = "Grup başarılı bir şekilde güncellenmiştir.";
			$cb['err']['type'] = "success";
		}else{
			$cb['err']['title'] = "Hata !";
			$cb['err']['message'] = "Grup güncelleme sırasında bir hata oluştu.";
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
