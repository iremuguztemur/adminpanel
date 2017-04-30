<?php

if(url(3)){
	$id = url(3);
	$r =  explode("_",$id)[1];
	$x = explode("-",$r)[0];
	$run = substr($x,4);
	$arr = array(
		'stats' => 1
	);
	$update = $db->update("product_group")->where("group_id",$run)->set($arr);
	if( $update ){
		header("Location: ".panel_url("product-group/basarili"));
	}else{
		header("Location: ".panel_url("product-group/hata"));
	}
}

