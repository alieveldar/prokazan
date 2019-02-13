<?php
require_once 'lib/template.php';
require_once 'conf/config.php';

$sql = "SELECT * FROM articles";
$articles = mysqli_query($connectEDB, $sql);
$news = array();
if (mysqli_num_rows($articles) > 0) {
	while ($value = mysqli_fetch_assoc($articles)) {
		$img = $value['image'];
		$journalistName = $value['journalist'];
		$article = $value['news_text'];
		$id = $value['id'];
		$row = '<div class = "article' . $id . '"><div class="article-top-photo__picture-wrapper"><img class="article-top-photo__picture" src="' . $img . '" alt=""></div>
	<span class="article-info__author">Автор: ' . $journalistName . '</span>
	<div class="ArticleContent js-mediator-article"><p>' . $article . '</p></div>
	<button class="add-comment__submit DeletteNews" data-id="' . $id . '">Удалить статью</button><br><hr></hr></div><br>';
		$news[] = $row;
	}
} else {
	$news[] = "<h1>Нет новостей</h1>";
}
$newstemplate = new Template();
$newstemplate->get_tpl('templates/news.tpl');
$newstemplate->set_value('NEWS', implode($news));
$newstemplate->tpl_parse();
echo $newstemplate->html;
mysqli_close($connectEDB);
die();