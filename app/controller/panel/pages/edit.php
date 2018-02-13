<?php

if(!file_exists(panel_view($_url[1]."/".$_url[2]))){
	$page = '404';
}else{
	$page = $_url[1]."/".$_url[2];
}
$group_list =  $db->select("page_categories")->orderby("id", "ASC")->run();

if(isset($_url[3])){
	$id = url(3);
	$r = explode("_", $id)[1];
	$x = explode("-", $r)[0];
	$run = substr($x, 4);

	$edit =  $db->select("pages")->where("id", $run)->run(true);
	$fixImage = $db->select("img_library")->where("gallery_id", $run)->run(true);
	$Images = $db->select("img_library")->where("gallery_id", $run)->run();
	$ximgid = $edit['id'];

}

if( $_POST ){

	$vbx = array();
		$vbx['categories'] = htmlspecialchars(post('categori_id'));
		$vbx['page_name'] = htmlspecialchars(post('page_name'));
		$vbx['page_self'] = permalink(post('page_name'));
		$vbx['page_description'] = htmlspecialchars(post('page_description'));
		$vbx['page_text'] = htmlspecialchars(post('page_text'));
		$vbx['image'] = htmlspecialchars(trim(post('images')));
		$vbx['page_link_url'] = htmlspecialchars(post("link_url"));
		$vbx['page_video_url'] = htmlspecialchars(post("video_url"));
		$vbx['stats'] = 1;
		$vbx['add_date'] = date("Y-m-d H:i:s");
		# link active passive
		if(post("link") == 1)
			$vbx['page_link'] = 1;
		else
			$vbx['page_link'] = 0;
		#video active passive
		if(post("video") == 1)
			$vbx['page_video'] = 1;
		else
			$vbx['page_video'] = 0;

		$update = $db->update("pages")->where("id",$run)->set($vbx);
		if( $update ){
			$cb['err']['title'] = "Başarılı : ";
			$cb['err']['message'] = "Sayfa başarılı bir şekilde güncellenmiştir.";
			$cb['err']['type'] = "success";
			$cb['err']['catID'] = post('categori_id');
		}else{
			$cb['err']['title'] = "Hata : ";
			$cb['err']['message'] = "Sayfa güncelleme sırasında bir hata oluştu.";
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
