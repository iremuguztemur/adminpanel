<?php

if(url(3)){
	$id = url(3);
	$r =  explode("_",$id)[1];
	$x = explode("-",$r)[0];
	$run = substr($x,4);
	$arr = array(
		'stats' => 1
	);

	$ts = $db->select("product_subcategori")->where("subcategori_id",$run)->run(true);
	$id = "categori_".mbs_rand(4).$ts['categori_id']."-".mbs_rand(4);

	$update = $db->update("product_subcategori")->where("subcategori_id",$run)->set($arr);
	if( $update ){
		header("Location: ".panel_url("product-subcategori/".$id."/basarili"));
	}else{
		header("Location: ".panel_url("product-subcategori/".$id."/hata"));
	}
}

