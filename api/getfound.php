<?php
header('Content-Type: text/html; charset=utf-8');

require_once('../models/FoundModel.php'); 
$found_model = new FoundModel;
$json = file_get_contents('php://input');

$obj = json_decode($json,true);

$action = $obj['action'];
if($action == "found"){
	$id = $obj['signup_id'];
	$found = $found_model->getFoundBy($id);
	echo json_encode($found, JSON_UNESCAPED_UNICODE);

}
if($action == "search"){
	$id = $obj['signup_id'];
	$keyword = $obj['keyword'];
	$found = $found_model->getFoundBySearch($id, $keyword);
	echo json_encode($found, JSON_UNESCAPED_UNICODE);

}



if($action == "founduser"){
	$signup_id = $obj['id'];
	$found = $found_model->getFoundByUser($signup_id);
	echo json_encode($found, JSON_UNESCAPED_UNICODE);
}

if($action == "getinfomationprofile"){
	$signup_id = $obj['id'];
	$profile = $profile_model->getinfomationprofile($signup_id);
	echo json_encode($profile, JSON_UNESCAPED_UNICODE);
}

if($action == "commentfound"){
	$found_id = $obj['id'];
	$found = $found_model->getFoundByID($found_id);
	echo json_encode($found, JSON_UNESCAPED_UNICODE);
}
if($action == "getcommentfound"){
	$found_id = $obj['id'];
	$found = $found_model->getCommentFoundByID($found_id);
	echo json_encode($found, JSON_UNESCAPED_UNICODE);
}

if($action == "deletepostfound"){
	$found_id = $obj['id'];
	$found = $found_model->deleteFoundByID($found_id);
	echo json_encode($found, JSON_UNESCAPED_UNICODE);
}
if($action == "deletecommentfound"){
	$comment_id = $obj['id'];
	$comment = $found_model->deleteCommentFoundByID($comment_id);
	echo json_encode($comment, JSON_UNESCAPED_UNICODE);
}
if($action == "addcommentfound"){
	$data = [];
	$data['comment_text'] = $obj['comment'];
    $data['comment_user'] = $obj['signupid'];
    $data['found_id'] = $obj['id'];
	$result = $found_model->insertComment($data);
        
}
else{
	
}

?>