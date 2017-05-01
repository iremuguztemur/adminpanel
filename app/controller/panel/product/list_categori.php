<?php
	if($_POST){

		$group_id = htmlspecialchars(trim($_POST['group_id']));

		$grList = $db->select("product_categori")->where("group_id",$group_id)->run();
			foreach ($grList as $cl ){
				echo "<option value='". $cl['categori_id'] ."'> ". $cl['categori_name'] ." </option>";
			}

	}else{
		echo 'Access Denied ! [ No data posted ]';
	}

	#end the page