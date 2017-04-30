<?php

if(!file_exists(panel_view($_url[1]))){
  	$page = '404';
}else{
	$page = $_url[1];
}
/*
$group_list =  $db->select("product_group")->orderby("group_id", "ASC")->run();
if(isset($_url[2])){
	$getid = url(2);
	$r =  explode("_",$getid)[1];
	$x = explode("-",$r)[0];
	$id = substr($x,4);

	# page List Call
	$pagelist = $db->select("product_categori")->where("group_id",$id)->run();
}else{
	# page List Call
	$pagelist = $db->select("product_categori")->run();
}
*/

if( isset( $_url[2] ) ){

	$getid = url(2);
	$r =  explode("_",$getid)[1];
	$x = explode("-",$r)[0];
	$id = substr($x,4);
	# page List Call
	$pagelist = $db->select("product_subcategori")->where("categori_id",$id)->run();


	#catch group this sub categori
	$catThis = $db->select("product_categori")->where("categori_id",$id)->run(true);
	$group = $db->select("product_group")->where("group_id",$catThis['group_id'])->run(true);
	$categori_list =  $db->select("product_categori")->where("group_id",$catThis['group_id'])->orderby("categori_id", "ASC")->run();


}else{
	# page List Call
	$pagelist = $db->select("product_subcategori")->orderby("subcategori_id","ASC")->run();
}

# call header
require panel_statics("header");
require panel_statics("sidebar");

# call page content
require panel_view($page);

# call footer
require panel_statics("footer");
