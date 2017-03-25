<?php
/**
 * Created by DELTA ARGE.
 * User: Hapyman
 * Date: 10.03.2017
 * Time: 15:51
 */
$module = '404';
if( $_url[0] )
	$module = $_url[0];
else{
	$module = $module;
};

require view($module);