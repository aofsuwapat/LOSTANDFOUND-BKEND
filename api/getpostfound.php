<?php
header('Content-Type: text/html; charset=utf-8');

require_once('../models/PostfoundModel.php'); 
$postfound_model = new PostfoundModel;
$json = file_get_contents('php://input');

$obj = json_decode($json,true);

$action = $obj['action'];
if($action == "found"){
	$found = $found_model->getFoundBy();
	echo json_encode($found, JSON_UNESCAPED_UNICODE);
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
if($action == "addpostfound"){
	$data = [];
	$data['signupid'] = $obj['signupid'];

	$data['signup_text1'] = $obj['signup1'];
	$data['signup_text2'] = $obj['signup2'];
	$data['signup_text3'] = $obj['signup3'];

	// $data['signup_text4'] = $obj['signup4'];

	$result = $postfound_model->insertPostfound($data);
        
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