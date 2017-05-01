<?php

if(!file_exists(panel_view($_url[1]."/".$_url[2]))){
	$page = '404';
}else{
	$page = $_url[1]."/".$_url[2];
}
$group_list =  $db->select("product_group")->orderby("group_id", "ASC")->run();

if(isset($_url[3])){
	$id = url(3);
	$r = explode("_", $id)[1];
	$x = explode("-", $r)[0];
	$run = substr($x, 4);

	$edit =  $db->select("products")->where("product_id", $run)->run(true);
	$fixImage = $db->select("img_library")->where("galery_id",$edit['product_id'])->run(true);
	$Images = $db->select("img_library")->where("galery_id",$edit['product_id'])->run();
	$ximgid = $edit['product_id'];

}

if( $_POST ){

	$xtags = json_encode($_POST['tags']);

	$vbx = array();
	$vbx['product_group_id'] = htmlspecialchars($_POST['group_id']);
	$vbx['product_categori_id'] = htmlspecialchars($_POST['categori_id']);
	$vbx['product_subcategori_id'] = htmlspecialchars($_POST['subcategori_id']);
	$vbx['image'] = htmlspecialchars(trim($_POST['images']));

	$vbx['product_code'] = htmlspecialchars($_POST['product_code']);
	$vbx['dmo_code'] = htmlspecialchars($_POST['dmo_code']);
	$vbx['product_price'] = htmlspecialchars($_POST['product_price']);
	$vbx['dmo_price'] = htmlspecialchars($_POST['dmo_price']);
	$vbx['product_name'] = htmlspecialchars($_POST['product_name']);
	$vbx['baslik_self'] = permalink($_POST['product_name']);

	$vbx['product_description'] = "";
	$vbx['product_text'] = $_POST['product_text'];

	$vbx['item_title'] = htmlspecialchars(trim($_POST['item_title']));
	$vbx['item_width'] = htmlspecialchars(trim($_POST['item_width']));
	$vbx['item_height'] = htmlspecialchars(trim($_POST['item_height']));
	$vbx['item_size'] = htmlspecialchars(trim($_POST['item_size']));

	$vbx['second_item_title'] = htmlspecialchars(trim($_POST['second_item_title']));
	$vbx['second_item_width'] = htmlspecialchars(trim($_POST['second_item_width']));
	$vbx['second_item_height'] = htmlspecialchars(trim($_POST['second_item_height']));
	$vbx['second_item_size'] = htmlspecialchars(trim($_POST['second_item_size']));

	$vbx['tags'] = $xtags;
	$vbx['stats'] = 1;
	$vbx['add_date'] = "";
	$vbx['number'] = 0;
	$insert = $db->update("products")->set($vbx);

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