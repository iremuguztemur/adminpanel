<?php

if(!file_exists(panel_view($_url[1]."/".$_url[2]))){
  	$page = '404';
}else{
	$page = $_url[1]."/".$_url[2];
}

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
	$number =  $db->select("product_group")->orderby("group_id", "DESC")->run(true);

	if( $number )
		$sira = $number['group_sira'];

	$v = array();
		$v['group_name'] = htmlspecialchars(trim($_POST['group_name']));
		$v['group_image'] = htmlspecialchars(trim($_POST['images']));
		$clear = str_replace("amp","",$v['group_name']);
		$v['group_seo'] = permalink($clear);
		$v['stats'] = 1;
		$v['group_sira'] = $sira;


		if($v['group_name'] != ''){
			$insert = $db->insert("product_group") ->set($v);

			if( $insert ){
				$cb['err']['title'] = "Başarılı.";
				$cb['err']['message'] = "Grup başarılı bir şekilde eklenmiştir.";
				$cb['err']['type'] = "success";
			}else{
				$cb['err']['title'] = "Hata !";
				$cb['err']['message'] = "Grup ekleme sırasında bir hata oluştu.";
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
