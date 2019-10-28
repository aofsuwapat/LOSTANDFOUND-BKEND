<?php
header('Content-Type: text/html; charset=utf-8');

require_once('../models/LikefoundModel.php'); 
$likefound_model = new LikefoundModel;
$json = file_get_contents('php://input');

$obj = json_decode($json,true);
$action = $obj['action'];

if($action == "addpostfound"){
	$data = [];
	$data['likefoundid'] = $obj['likefoundid'];
	$data['signupid'] = $obj['signupid'];

	$result = $likefound_model->checklike($data['likefoundid'],$data['signupid']);
	if(count($result)<= 0){
		$result = $likefound_model->insertPostfound($data);

	}else{
		$result = $likefound_model->deleteLike($data['likefoundid'],$data['signupid']);
	}
        
}



else{
	
}

?>