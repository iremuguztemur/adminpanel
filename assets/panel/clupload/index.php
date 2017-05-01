<?php  
if ($_POST) {
	print_r($_POST);
	print_r(@$_FILES['cv']);
	return;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CL Upload</title>
	<meta charset="utf8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/clupload.css">
</head>
<body>
<form id="clform" method="post" action="save.php" enctype="multipart/form-data">
	Name: <input type="text" name="name"><br/><br/>
	Surname: <input type="text" name="surname"><br/><br/>
	Age: <input type="text" name="age"><br/><br/>
	CV: <input type="file" name="cv"><br/><br/>
	Gender: <select name="sex">
		<option>Male</option>
		<option>Female</option>
	</select><br/><br/>
	Select Images: <input type="file" name="file[]" id="clfile" multiple><br/><br/>
	<div id="image_content" class="clupload"></div>
	<button type="submit" value="send">Send</button>
</form>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.clupload.js"></script>

<script type="text/javascript">
$('#image_content').clupload({
	width : 1024,
	height : 768,
	quality : 60,
	form : 'form',
	cropType : ['center','center'],
	url : 'upload.php',
	data : {id:21},
	target : '#clfile',
	progress: function(data) {
		alert(data);
	},
	success: function(data) {
		$.ajax({
			url: 'index.php',
			type: 'POST',
			dataType: 'html',
			data: $('form').serialize(),
		})
		.done(function(data) {
			//alert(data);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	},
	error: function(data) {
		alert(data);
	}
});
</script>
</body>
</html>