<?php
require_once 'conf/config.php';
$news_id = $_POST['id'];
$sql = "DELETE FROM articles WHERE id ='$news_id'";
if (mysqli_query($connectEDB, $sql)) {
	echo "Новость удалена";
	mysqli_close($connectEDB);
	exit();
} else {
	echo "Ошибка базы данных" . mysqli_error($connectEDB);
	mysqli_close($connectEDB);
	exit();
}
?>