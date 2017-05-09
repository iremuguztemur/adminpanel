<?php

if(url(3)){
	$id = url(3);
	$r =  explode("_",$id)[1];
	$x = explode("-",$r)[0];
	$run = substr($x,4);
	$arr = array(
		'stats' => 1
	);

	$sl = $db->select("products")->where("product_id",$run)->run(true);
	$catid = "categori_".mbs_rand(4).$sl['categori_id']."-".mbs_rand(4);

	$delete = $db->delete("products")->where("product_id",$run)->done();
	if( $delete ){
		header("Location: ".panel_url("products/".$catid."/basarili"));
	}else{
		header("Location: ".panel_url("products/".$catid."/hata"));
	}
}
