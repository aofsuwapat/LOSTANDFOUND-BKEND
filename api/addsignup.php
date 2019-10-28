<?php


require_once('../models/SignupModel.php'); 
$signup_model = new SignupModel;



if($_POST['action'] == "addsignup"){
	$img_name = rand() . "_" . time(). ".jpeg";
	$data = [];


	$data['signup_text1'] = $_POST['signup1'];
	$data['signup_text2'] = $_POST['signup2'];
	$data['signup_text3'] = $_POST['signup3'];
	$data['signup_text4'] = $_POST['signup4'];

	// Image uploading folder.
	$target_dir = "../img_upload/signup";

	// Generating random image name each time so image name will not be same .
	$target_dir = $target_dir . "/" .$img_name;
	if($_FILES['image']['tmp_name'] != ''){
		$data['img_name'] = $img_name ;
		move_uploaded_file($_FILES['image']['tmp_name'], $target_dir);
	}
	$result = $signup_model->insertSignup($data);

}




?>