<?php
header('Content-Type: text/html; charset=utf-8');

require_once('../models/ProfileModel.php'); 
$profile_model = new ProfileModel;
$json = file_get_contents('php://input');

$obj = json_decode($json,true);
$action = $obj['action'];
if($action == "profile"){
	$signup_id = $obj['signupid'];
	$profile = $profile_model->getProfileByID($signup_id);
	echo json_encode($profile, JSON_UNESCAPED_UNICODE);
}

// if($action == "infomationprofile"){
// 	$signup_id = $obj['id'];
// 	$profile = $profile_model->getProfileByID($signup_id);
// 	echo json_encode($profile, JSON_UNESCAPED_UNICODE);
// }

if($action == "getinfomationprofile"){
	$signup_id = $obj['id'];
	$profile = $profile_model->getinfomationprofile($signup_id);
	echo json_encode($profile, JSON_UNESCAPED_UNICODE);
}
if($action == "addsignup"){
	$signup_id = $obj['signupid'];
	$data = [];
	$data['signup_text1'] = $obj['signup1'];
	$data['signup_text3'] = $obj['signup3'];
	$data['signup_text4'] = $obj['signup4'];

	$result = $profile_model->updateUserByID($signup_id,$data);
        
}
if($action == "checkUser"){


	$result = $profile_model->checkUser($obj['signup3']);
	echo json_encode(count($result), JSON_UNESCAPED_UNICODE);   
}


else{
	
}

?>