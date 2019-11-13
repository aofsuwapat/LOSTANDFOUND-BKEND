<?php


require_once('../models/PostlostModel.php'); 
$postlost_model = new PostlostModel;



if($_POST['action'] == "editpostlost"){
	$img_name = rand() . "_" . time(). ".jpeg";
	$data = [];
	$lost_id = $_POST['lostid'];

	$data['signup_text1'] = $_POST['signup1'];
	$data['signup_text2'] = $_POST['signup2'];
	$data['signup_text3'] = $_POST['signup3'];
	$data['signup_text4'] = $_POST['signup4'];
	$data['signup_text5'] = $_POST['lat'];
	$data['signup_text6'] = $_POST['lon'];
	// Image uploading folder.
	$target_dir = "../img_upload/lost";

	// Generating random image name each time so image name will not be same .
	$target_dir = $target_dir . "/" .$img_name;
	if($_FILES['image']['tmp_name'] != '' && $_FILES['image']['tmp_name'] != null){
		$data['img_name'] = $img_name ;
		move_uploaded_file($_FILES['image']['tmp_name'], $target_dir);

	}
	$result = $postlost_model->updateLostByID($lost_id,$data);
	// $MESSAGE = "Image Uploaded Successfully." ;
			
	// Printing response message on screen after successfully inserting the image .	
	// echo json_encode($MESSAGE);


}




?>