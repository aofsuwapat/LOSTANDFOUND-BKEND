<?php
header('Content-Type: text/html; charset=utf-8');

require_once('../models/CategoryModel.php'); 
$category_model = new CategoryModel;
$json = file_get_contents('php://input');

$obj = json_decode($json,true);

$action = $obj['action'];
// if($action == "category"){
// 	$category = $category_model->getCategoryTypeBy();
// 	echo json_encode($category, JSON_UNESCAPED_UNICODE);
// }

if($action == "category"){
	$category = $category_model->getCategoryBy();
	echo json_encode($category, JSON_UNESCAPED_UNICODE);
}

if($action == "readnews"){
	$category_id = $obj['id'];
	$category = $category_model->getCategoryByID($category_id);
	echo json_encode($news, JSON_UNESCAPED_UNICODE);
}
else{
	
}

?>