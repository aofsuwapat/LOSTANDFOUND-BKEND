<?php


require_once('../models/PostfoundModel.php'); 
$postfound_model = new PostfoundModel;



if($_POST['action'] == "editpostfound"){
	$img_name = rand() . "_" . time(). ".jpeg";
	$data = [];
	$found_id = $_POST['foundid'];

	$data['signup_text1'] = $_POST['signup1'];
	$data['signup_text2'] = $_POST['signup2'];
	$data['signup_text3'] = $_POST['signup3'];
	$data['signup_text4'] = $_POST['signup4'];
	$data['signup_text5'] = $_POST['lat'];
	$data['signup_text6'] = $_POST['lon'];
	// Image uploading folder.
	$target_dir = "../img_upload/found";

	// Generating random image name each time so image name will not be same .
	$target_dir = $target_dir . "/" .$img_name;
	if($_FILES['image']['tmp_name'] != '' && $_FILES['image']['tmp_name'] != null){
		$data['img_name'] = $img_name ;
		move_uploaded_file($_FILES['image']['tmp_name'], $target_dir);

	}
	$result = $postfound_model->updateFoundByID($found_id,$data);
	// $MESSAGE = "Image Uploaded Successfully." ;
			
	// Printing response message on screen after successfully inserting the image .	
	// echo json_encode($MESSAGE);


}




?>