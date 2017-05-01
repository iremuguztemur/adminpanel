<?php
	if($_POST){

		$group_id = htmlspecialchars(trim($_POST['categori_id']));

		$grList = $db->select("product_subcategori")->where("categori_id",$group_id)->run();
			foreach ($grList as $cl ){
				echo "<option value='". $cl['subcategori_id'] ."'> ". $cl['subcategori_name'] ." </option>";
			}

	}else{
		echo 'Access Denied ! [ No data posted ]';
	}

	#end the page