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
if($action == "getfoundcategory"){
	$category_id = $obj['id'];
	$category = $category_model->getFoundCategoryByID($category_id);
	echo json_encode($category, JSON_UNESCAPED_UNICODE);
}
if($action == "getlostcategory"){
	$category_id = $obj['id'];
	$category = $category_model->getLostCategoryByID($category_id);
	echo json_encode($category, JSON_UNESCAPED_UNICODE);
}

else{
	
}

?>