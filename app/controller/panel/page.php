<?php

if(!file_exists(panel_view($_url[1]))){
  	$page = '404';
}else{
	$page = $_url[1];
}
	$catList = $db->select("page_categori")->orderby("categori_id","DESC")->run();
if( isset( $_url[2] ) ){

	$getid = url(2);
	$r =  explode("_",$getid)[1];
	$c = explode("_",$getid)[0];
	$x = explode("-",$r)[0];
	$id = substr($x,4);
if($id == ''){
	$pagelist = $db->select("page")->run();
}else{
	$pagelist = $db->select("page")->where("categori_id",$id)->run();
}

	$subList = $db->select("page_categori")->where("categori_id",$id)->run(true);
  $cat_id = $subList['categori_id'];

}else{
	# page List Call
	$pagelist = $db->select("page")->run();
}

# call header
require panel_statics("header");
require panel_statics("sidebar");

# call page content
require panel_view($page);

# call footer
require panel_statics("footer");
