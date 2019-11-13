<?php
header('Content-Type: text/html; charset=utf-8');

require_once('../models/LikelostModel.php'); 
$likelost_model = new LikelostModel;
$json = file_get_contents('php://input');

$obj = json_decode($json,true);
$action = $obj['action'];

if($action == "addpostlost"){
	$data = [];
	$data['likelostid'] = $obj['likelostid'];
	$data['signupid'] = $obj['signupid'];

	$result = $likelost_model->checklike($data['likelostid'],$data['signupid']);
	if(count($result)<= 0){
		$result = $likelost_model->insertPostlost($data);

	}else{
		$result = $likelost_model->deleteLike($data['likelostid'],$data['signupid']);
	}
        
}



else{
	
}

?>