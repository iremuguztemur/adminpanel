<?php
	$module = '404';
	if( $_url[0] )
		$module = $_url[0];
	else{
		$module = $module;
	};


    # headeri getir
    require view("includes/header");

    #içeriği çağır
	require view($module);

    # footeri getir
    require view("includes/footer");