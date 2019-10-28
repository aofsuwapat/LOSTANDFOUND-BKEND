<?php
header('Content-Type: text/html; charset=utf-8');

require_once('../models/NewsModel.php'); 
$news_model = new NewsModel;
$json = file_get_contents('php://input');

$obj = json_decode($json,true);
$action = $obj['action'];
if($action == "news"){
	$news = $news_model->getNewsBy();
	echo json_encode($news, JSON_UNESCAPED_UNICODE);
}

if($action == "readnews"){
	$news_id = $obj['id'];
	$news = $news_model->getNewsByID($news_id);
	echo json_encode($news, JSON_UNESCAPED_UNICODE);
}
else{
	
}

?>