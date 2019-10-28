<?php


require_once('../models/ProfileModel.php'); 
$profile_model = new ProfileModel;



if($_POST['action'] == "addsignup2"){
	$img_name = rand() . "_" . time(). ".jpeg";
	$data = [];
	$signup_id = $_POST['signupid'];
	$data['signup_text1'] = $_POST['signup1'];
	$data['signup_text4'] = $_POST['signup4'];

	// Image uploading folder.
	$target_dir = "../img_upload/signup";

	// Generating random image name each time so image name will not be same .
	$target_dir = $target_dir . "/" .$img_name;
	if($_FILES['image']['tmp_name'] != '' && $_FILES['image']['tmp_name'] != null){
		$data['img_name'] = $img_name ;
		move_uploaded_file($_FILES['image']['tmp_name'], $target_dir);

	}
	$result = $profile_model->updateUserByID($signup_id,$data);
	// $MESSAGE = "Image Uploaded Successfully." ;
			
	// Printing response message on screen after successfully inserting the image .	
	// echo json_encode($MESSAGE);


}




?>