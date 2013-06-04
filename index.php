<?php
if (!empty($_FILES["file"])) {
	$dir = "./upload/".uniqid()."/";
	mkdir($dir, 0755);
	$files = $_FILES["file"];
	foreach ($files["error"] as $key => $value) {
		if ($value == UPLOAD_ERR_OK) {
			move_uploaded_file($files["tmp_name"][$key], $dir.basename($files["name"][$key]));
		}
	}

	header('HTTP/1.1 301 Moved Permanently');
	header('Location:'.$dir);
	exit();
}
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>こんにちはこんにちは！</title>
</head>
<body>
	<form action="./" method="post" enctype="multipart/form-data">
		<input name="file[]" type="file" multiple="multiple">
		<input type="submit" value="アップロード">
	</form>	
</body>
</html>

