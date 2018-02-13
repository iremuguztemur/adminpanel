<?php

if(!file_exists( panel_view( url(1)."/".url(2) ) )){
  	$page = '404';
}else{
	$page = $_url[1]."/".$_url[2];
};
if( $_POST ){
    $cb = array();
    $sira = 0;
    $number =  $db->select("page_categories")->orderby("id", "DESC")->run(true);

    if( $number ){
        $sira = $number['number'];
    }else{
        $sira = 0;
    }

    $v = array();
    $v['title'] = htmlspecialchars(post("title"));
    $clear = str_replace("amp","",$v['title']);
    $v['slug'] = permalink($clear);
    $v['image'] = htmlspecialchars(post("images"));
    $v['description'] = htmlspecialchars(post("description"));
    $v['body'] = htmlspecialchars(post("body"));
    $v['isActive'] = 1;
    $v['number'] = $sira;

    if($v['title'] != ''){
        $insert = $db->insert("page_categories")->set($v);
        if( $insert ){
            $cb['err']['title'] = "Başarılı.";
            $cb['err']['message'] = "Kategori başarılı bir şekilde eklenmiştir.";
            $cb['err']['type'] = "success";
        }else{
            $cb['err']['title'] = "Hata !";
            $cb['err']['message'] = "Kategori ekleme sırasında bir hata oluştu.";
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
