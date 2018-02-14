<?php

if(!file_exists(panel_view($_url[1]))){
    $page = '404';
}else{
    $page = $_url[1];
}
$pagelist = $db->select("banners")->run();

# call header
require panel_statics("header");
require panel_statics("sidebar");

# call page content
require panel_view($page);

# call footer
require panel_statics("footer");
