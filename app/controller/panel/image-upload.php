<?php

$id = $_POST['exdata']['id'];

$nm = sha1(md5(microtime().rand(1,999999))).'.jpg';
$img =  _base."/upload/products/normal/".$nm;
$imgT = _base."/upload/products/thumb/".$nm;

if($_POST){

	$data = array();
	$data['gallery_id'] = $id;
	$data['image_name'] = $nm;
	$data['url'] = "";
	$data['add_date'] = "";

	$query = $db->insert("img_library")
		->set($data);

	if($query){
		base64_to_jpeg($_POST['src'],$img);
		echo 'basarili';
	}else{
		echo 'hata !';
	}



}else{
	echo 'NO DATA !';
}

function base64_to_jpeg($base64_string, $output_file) { global $imgT,$img;

	$ifp = fopen($output_file, "wb");
	$data = explode(',', $base64_string);
	fwrite($ifp, base64_decode($data[1]));
	fclose($ifp);


	// The file
	$filename = $output_file;
	$percent = 0.2;



	// Content type
	header('Content-Type: image/jpeg');
	// Get new dimensions
	list($width, $height) = getimagesize($filename);
	$new_width = $width * $percent;
	$new_height = $height * $percent;



	// Resample
	$image_p = imagecreatetruecolor($new_width, $new_height);
	$image = imagecreatefromjpeg($filename);
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);



	// Output
	imagepng($image_p, $imgT);

};