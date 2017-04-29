<?php

if(!file_exists(panel_view($_url[1]))){
  	$page = '404';
}else{
	$page = $_url[1];
}

# last page id catch.
$pagelist = $db->select("pages")->orderby("page_id","DESC")->run(true);
# -> next page id add
$pageid = $pagelist['page_id'] + 1;
# -> lock id;
$id = "page_".mbs_rand(4).$pageid."-".mbs_rand(4);



# call header
require panel_statics("header");
require panel_statics("sidebar");

# call page content
require panel_view($page);

# call footer
require panel_statics("footer");