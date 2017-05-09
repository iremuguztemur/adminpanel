<?php

if(url(3)){
	$id = url(3);
	$r =  explode("_",$id)[1];
	$x = explode("-",$r)[0];
	$run = substr($x,4);
	$arr = array(
		'stats' => 1
	);
	$delete = $db->delete("product_categori")->where("categori_id",$run)->done();
	if( $delete ){
		header("Location: ".panel_url("product-categori/basarili"));
	}else{
		header("Location: ".panel_url("product-categori/hata"));
	}
}
