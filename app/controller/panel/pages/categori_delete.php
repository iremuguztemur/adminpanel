<?php

if(url(3)){
	$id = url(3);
	$r =  explode("_",$id)[1];
	$x = explode("-",$r)[0];
	$run = substr($x,4);
	$arr = array(
		'isActive' => 1
	);
	$delete = $db->delete("page_categories")->where("id",$run)->done();
	if( $delete ){
		header("Location: ".panel_url("page-categori/basarili"));
	}else{
		header("Location: ".panel_url("page-categori/hata"));
	}
}
