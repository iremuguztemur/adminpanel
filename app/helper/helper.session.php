<?php
/**
	Delta Ajan Web Site System v:1.2
	Create by : Delta Ajans
	User : Taner Tombaş <taner@deltaajans.xyz> - <tombastaner@gmail.com>

	{ SESSION HELPER [ NECESSARY SETTINGS ] }
		-> create session 
		-> rewrite session
		-> control is session
		-> clear sesion
		-> remove session
		-> remove all sessions
**/

#create new session function
function create_session ($name, $value = 'null'){
	if($value){
		$_SESSION[$name] = $value;
	};
	if (isset($_SESSION[$name]))
		return $_SESSION[$name];
};

#control session
function control_session($name){
	if (isset($_SESSION[$name]))
		return $_SESSION[$name];
}

#rewrite session function
function rewrite_session ($name, $value = 'null'){
	if($value){
		$_SESSION[$name] = $value;
	};
	if (isset($_SESSION[$name]))
		return $_SESSION[$name];
};


#clear session veriable function
function clear_session($name, $value = 'null'){
	if(isset($_SESSION[$name])){
		$_SESSION[$name] = null;
	}
	if($_SESSION[$name] == null)
		return $_SESSION[$name];
	else{
		$_SESSION[$name] = "";
		return $_SESSION[$name];
	};

}

#remove session function
function remove_session($name){
	if(isset($_SESSION[$name])){
		unset($_SESSION[$name]);
	}
}

#remove all sessions
function allremove_session(){
	session_destroy();
}