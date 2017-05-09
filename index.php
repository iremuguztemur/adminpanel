<?php
/*
	Delta Ajans Web Site System v:1.2
	Create by : Delta Ajans
	User : Taner Tombaş <taner@deltaajans.xyz> - <tombastaner@gmail.com>

	This page works :
		-> filter the url [ get system ]
		-> security control [ url sql inject control, form spam control ]
		-> url parser !
*/
/* todo::@php errors */
error_reporting(E_ALL);
session_start();
ob_start();

global $modal;

/* todo:: App Directory Client */
require_once("app/init.php");

# url function [ catch callback urls ]
$_url = get('url');
$_url = array_filter(explode('/', $_url));

if(!isset($_url[0]))
	$modal = 'index';
else
	$modal = $_url[0];

# If there are no files
if (!file_exists(controller($modal)))
	$modal = '404';

#call the page
require_once(controller($modal));