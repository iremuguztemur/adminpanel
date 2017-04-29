<?php
/**
	Delta Ajan Web Site System v:1.2
	Create by : Delta Ajans
	User : Taner Tombaş <taner@deltaajans.xyz> - <tombastaner@gmail.com>

	{ SAVE INCLUDER HELPER [ NECESSARY SETTINGS ] }
		-> controller includer 
		-> public includer
		-> admin dashboard controller includer
		-> admin dashboard public includer
**/

# Safe controller include !
function controller($name){
	return _condir . '/' . $name . '.php';
};

# safe UI include !
function view($name){
	return _public . '/' . $name . '.php';
};

# safe static page include !
function statics($name){
	return _public . '/include/' . $name . '.php';
}

# Safe admin dashboard controller include !
function panel_controller($name){
	return _condir . '/panel/' . $name . '.php';
};

# Safe admin dashboard view include !
function panel_view($name){
	return _public . '/panel/' . $name . '.php';
};

# safe static panel page include !
function panel_statics($name){
	return _public . '/panel/include/' . $name . '.php';
}