<?php

if(url(3)){
	$id = url(3);
	$r =  explode("_",$id)[1];
	$x = explode("-",$r)[0];
	$run = substr($x,4);
	$arr = array(
		'stats' => 0
	);

	$ts = $db->select("product_categori")->where("categori_id",$run)->run(true);
	$id = "categori_".mbs_rand(4).$ts['group_id']."-".mbs_rand(4);

	$update = $db->update("product_categori")->where("categori_id",$run)->set($arr);
	if( $update ){
		header("Location: ".panel_url("product-categori/".$id."/basarili"));
	}else{
		header("Location: ".panel_url("product-group/".$id."/hata"));
	};
}

