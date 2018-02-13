<?php

if(!file_exists(panel_view($_url[1]))){
  	$page = '404';
}else{
	$page = $_url[1];
}
	$catList = $db->select("page_categories")->orderby("id","DESC")->run();
if( isset( $_url[2] ) ){

	$getid = url(2);
	$r =  explode("_",$getid)[1];
	$c = explode("_",$getid)[0];
	$x = explode("-",$r)[0];
	$id = substr($x,4);
if($id == ''){
	$pagelist = $db->select("pages")->run();
}else{
	$pagelist = $db->select("pages")->where("categories",$id)->run();
}
  $subList = $db->select("page_categories")->where("id",$id)->run(true);
  $cat_id = $subList['id'];

}else{
	# page List Call
	$pagelist = $db->select("pages")->run();
}

# call header
require panel_statics("header");
require panel_statics("sidebar");

# call page content
require panel_view($page);

# call footer
require panel_statics("footer");
