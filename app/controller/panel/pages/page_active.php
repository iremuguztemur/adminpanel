<?php

if(url(3)){
	$id = url(3);
	$r =  explode("_",$id)[1];
	$x = explode("-",$r)[0];
	$run = substr($x,4);
	$arr = array(
		'stats' => 1
	);

    $sl = $db->select("pages")->where("id",$run)->run(true);
    $catid = "categori_".mbs_rand(4).$sl['categories']."-".mbs_rand(4);

    $update = $db->update("pages")->where("id",$run)->set($arr);
    if( $update ){
        header("Location: ".panel_url("page/".$catid."/basarili"));
    }else{
        header("Location: ".panel_url("page/".$catid."/hata"));
    }
}
