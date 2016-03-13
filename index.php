<?php
if (!empty($_FILES["file"])) {
	$dir = "./upload/".uniqid()."/";
	mkdir($dir, 0755);
	$files = $_FILES["file"];
	foreach ($files["error"] as $key => $value) {
		if ($value === UPLOAD_ERR_OK) {
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
	<title>ファイルアップローダー</title>
	<link rel="stylesheet" href="./pure-min.css">
</head>
<body>
<div class="pure-g">
	<div class="pure-u-1-4"></div>
	<div class="pure-u-1-2">
		<h1>ファイルアップローダー</h1>
		
		<nav>
			<a href="./upload">アップロードファイル一覧</a>
		</nav>
	
		<form action="./" method="post" enctype="multipart/form-data" class="pure-form pure-form-aligned">
			<fieldset>
				<legend>ファイルをアップロードする</legend>
				<div class="pure-control-group">
					<label for="files">アップロードファイル</label>
					<input id="files" name="file[]" type="file" multiple="multiple">
				</div>
				<div class="pure-controls">
					<button type="submit" class="pure-button pure-button-primary">アップロード</button>
				</div>
			</fieldset>
		</form>
	</div>
	<div class="pure-1-4"></div>
</div>
</body>
</html>

