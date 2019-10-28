<?php
date_default_timezone_set("Asia/Bangkok");
require_once('../models/ContactModel.php');

$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$path = "modules/contact_user/views/";

$contact_model = new ContactModel;

$target_dirimg = "../img_upload/contact/";

if(isset($_GET['id'])){
	$contact_id = $_GET['id'];
}
if(!isset($_GET['action'])){
	$contact_user = $contact_model->getContactUserBy();
	require_once($path.'view_user.inc.php');
}else{
	require_once($path.'view_user.inc.php');
}
?>