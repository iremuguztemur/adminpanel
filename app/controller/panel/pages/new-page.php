<?php

if(!file_exists(panel_view($_url[1]."/".$_url[2]))){
	$page = '404';
}else{
	$page = $_url[1]."/".$_url[2];
}
$group_list =  $db->select("page_categories")->orderby("id", "ASC")->run();
$pr_id = $db->select("pages")->orderby("id", "DESC")->run(true);


if($pr_id){
    $ximgid = $pr_id['product_id'] + 1;
}else{
    $ximgid = 1;
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

		$insert = $db->insert("pages")->set($vbx);
		if( $insert ){
			$cb['err']['title'] = "Başarılı : ";
			$cb['err']['message'] = "Sayfa başarılı bir şekilde eklenmiştir.";
			$cb['err']['type'] = "success";
			$cb['err']['catID'] = post('categori_id');
		}else{
			$cb['err']['title'] = "Hata : ";
			$cb['err']['message'] = "Sayfa ekleme sırasında bir hata oluştu.";
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
