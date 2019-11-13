<?php
header('Content-Type: text/html; charset=utf-8');

require_once('../models/LostModel.php'); 
$lost_model = new LostModel;
$json = file_get_contents('php://input');

$obj = json_decode($json,true);

$action = $obj['action'];
if($action == "lost"){
	$id = $obj['signup_id'];
	$lost = $lost_model->getLostBy($id);
	echo json_encode($lost, JSON_UNESCAPED_UNICODE);

}
if($action == "search"){
	$id = $obj['signup_id'];
	$keyword = $obj['keyword'];
	$lost = $lost_model->getLostBySearch($id, $keyword);
	echo json_encode($lost, JSON_UNESCAPED_UNICODE);

}



if($action == "lostuser"){
	$signup_id = $obj['id'];
	$lost = $lost_model->getLostByUser($signup_id);
	echo json_encode($lost, JSON_UNESCAPED_UNICODE);
}

if($action == "getinfomationprofile"){
	$signup_id = $obj['id'];
	$profile = $profile_model->getinfomationprofile($signup_id);
	echo json_encode($profile, JSON_UNESCAPED_UNICODE);
}

if($action == "commentlost"){
	$lost_id = $obj['id'];
	$lost = $lost_model->getLostByID($lost_id);
	echo json_encode($lost, JSON_UNESCAPED_UNICODE);
}
if($action == "getcommentlost"){
	$lost_id = $obj['id'];
	$lost = $lost_model->getCommentLostByID($lost_id);
	echo json_encode($lost, JSON_UNESCAPED_UNICODE);
}

if($action == "deletepostlost"){
	$lost_id = $obj['id'];
	$lost = $lost_model->deleteLostByID($lost_id);
	echo json_encode($lost, JSON_UNESCAPED_UNICODE);
}
if($action == "deletecommentlost"){
	$comment_id = $obj['id'];
	$comment = $lost_model->deleteCommentLostByID($comment_id);
	echo json_encode($comment, JSON_UNESCAPED_UNICODE);
}
if($action == "addcommentlost"){
	$data = [];
	$data['comment_text'] = $obj['comment'];
    $data['comment_user'] = $obj['signupid'];
    $data['lost_id'] = $obj['id'];
	$result = $lost_model->insertComment($data);
        
}
else{
	
}

?>