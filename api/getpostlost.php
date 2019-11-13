<?php
header('Content-Type: text/html; charset=utf-8');

require_once('../models/PostlostModel.php'); 
$postlost_model = new PostlostModel;
$json = file_get_contents('php://input');

$obj = json_decode($json,true);

$action = $obj['action'];
if($action == "lost"){
	$lost = $lost_model->getLostBy();
	echo json_encode($lost, JSON_UNESCAPED_UNICODE);
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
if($action == "addpostlost"){
	$data = [];
	$data['signupid'] = $obj['signupid'];

	$data['signup_text1'] = $obj['signup1'];
	$data['signup_text2'] = $obj['signup2'];
	$data['signup_text3'] = $obj['signup3'];

	// $data['signup_text4'] = $obj['signup4'];

	$result = $postlost_model->insertPostlost($data);
        
}
if($action == "checkUser"){


	$result = $signup_model->checkUser($obj['signup3']);
	echo json_encode(count($result), JSON_UNESCAPED_UNICODE);   
}
if($action == "getLogin"){




		$result = $signup_model->getSignin($obj['signup3'],$obj['signup4']);
	
		echo json_encode($result, JSON_UNESCAPED_UNICODE);   

}
else{
	
}

?>