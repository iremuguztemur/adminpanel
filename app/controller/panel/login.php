<?php

if(!file_exists(panel_view($_url[1]))){
  	$page = '404';
}else{
	$page = $_url[1];
}

if (post('send-form')) {
	
	$username = post('username');
	$password = post('password');

	if (!$username || !$password){
		$error = 'Lütfen tüm alanları doldurup tekrar deneyin.';
	}else{

	$password = md5($password);
    $row = $db->select('users')
              ->where('username', $username)
              ->where('password', $password)
              ->run(true);

		if ($row){
			create_session('login', true);
			create_session('username', $row['username']);
			create_session('userid', $row['user_id']);
			header('Location:' . (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : panel_url()));
		}else{
			$error = 'Yönetici girişi yapamıyorsunuz!';
		}

	}

}

# call header
require panel_statics("header");

# call page content
require panel_view($page);

# call footer
require panel_statics("footer");