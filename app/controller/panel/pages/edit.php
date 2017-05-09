<?php

if(!file_exists(panel_view($_url[1]."/".$_url[2]))){
	$page = '404';
}else{
	$page = $_url[1]."/".$_url[2];
}
$group_list =  $db->select("product_categori")->orderby("categori_id", "ASC")->run();

if(isset($_url[3])){
	$id = url(3);
	$r = explode("_", $id)[1];
	$x = explode("-", $r)[0];
	$run = substr($x, 4);

	$edit =  $db->select("products")->where("product_id", $run)->run(true);
	$fixImage = $db->select("img_library")->where("gallery_id", $run)->run(true);
	$Images = $db->select("img_library")->where("gallery_id", $run)->run();
	$ximgid = $edit['product_id'];

}

if( $_POST ){

	$vbx = array();
		$vbx['categori_id'] = htmlspecialchars(post('categori_id'));
		$vbx['product_name'] = htmlspecialchars(post('product_name'));
		$vbx['product_self'] = permalink(post('product_name'));
		$vbx['product_description'] = htmlspecialchars(post('product_description'));
		$vbx['product_text'] = htmlspecialchars(post('product_text'));
		$vbx['product_image'] = htmlspecialchars(trim(post('images')));
		$vbx['product_link_url'] = htmlspecialchars(post("link_url"));
		$vbx['product_video_url'] = htmlspecialchars(post("video_url"));
		$vbx['stats'] = 1;
		# link active passive
		if(post("link") == 1)
			$vbx['product_link'] = 1;
		else
			$vbx['product_link'] = 0;
		#video active passive
		if(post("video") == 1)
			$vbx['product_video'] = 1;
		else
			$vbx['product_video'] = 0;

		$update = $db->update("products")->where("product_id",$run)->set($vbx);
		if( $update ){
			$cb['err']['title'] = "Başarılı : ";
			$cb['err']['message'] = "Kategori başarılı bir şekilde güncellenmiştir.";
			$cb['err']['type'] = "success";
			$cb['err']['catID'] = post('categori_id');
		}else{
			$cb['err']['title'] = "Hata : ";
			$cb['err']['message'] = "Kategori güncelleme sırasında bir hata oluştu.";
			$cb['err']['type'] = "danger";
			if(isset( $_POST['categori_id'] ) ){
				$cb['err']['catID'] = post('categori_id');
			}else{
				$cb['err']['catID'] = 1;
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
