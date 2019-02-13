<?php
require_once 'conf/config.php';
$name = $_POST['name'];
$news = $_POST['text'];
if (0 < $_FILES['file']['error']) {
	exit;
}
//if (is_uploaded_file($_FILES["filename"]["tmp_name"])) {
if (file_get_contents($_FILES['file']['tmp_name'])) {
	move_uploaded_file($_FILES['file']['tmp_name'], "assets/images/" . $_FILES['file']['name']);
	$filename = $_FILES['file']['name'];
	echo add_news($name, $news, $filename, $connectEDB);
}

function add_news($name, $text, $filename, $connectEDB) {
	$rez = '';
	$filename = "assets/images/" . $filename;
	$sql = "INSERT INTO articles (journalist, news_text, image) VALUES ('$name', '$text', '$filename')";
	if (mysqli_query($connectEDB, $sql)) {
		$rez = 'Новость добавлена';
	} else {
		$rez = 'Новость не добавлена, ошибка базы данных!';
	}
	mysqli_close($connectEDB);
	return $rez;
}
