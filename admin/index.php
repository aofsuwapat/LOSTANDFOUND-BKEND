<?PHP
session_start();
if(!isset($_SESSION['smt_administrator_user'])){
	require_once("modules/login/views/index.inc.php"); 
}else{
	$login_user = $_SESSION['smt_administrator_user'];
	if(!isset($_REQUEST['content'])){
		$_REQUEST['content'] = "news";
	}
	$content = $_REQUEST['content'];
}
if(!isset($login_user)){
	require_once("modules/login/views/index.inc.php"); 
}else{
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="../template/backend/images/logo/logo.png" type="image/png">
		<title>Administrators</title>

		<link href="../template/backend/css/bootstrap.min.css" rel="stylesheet">
		<link href="../template/backend/css/simple-sidebar.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="../template/backend/css/style.css" rel="stylesheet">  
		<script type="text/javascript" src="//cdn.ckeditor.com/4.4.0/standard/ckeditor.js"></script>
		<!-- <script src="../template/backend/js/jquery.min.js"></script> -->
		<script
  src="https://code.jquery.com/jquery-1.12.0.min.js"
  integrity="sha256-Xxq2X+KtazgaGuA2cWR1v3jJsuMJUozyIXDB3e793L8="
  crossorigin="anonymous"></script>
		<script src="../template/backend/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div id="wrapper" class="toggled">
			<?php require_once('views/header.inc.php') ?>
			<?php require_once('views/menu.inc.php') ?>
			<div id="page-content-wrapper">
				<?php require_once("views/body.inc.php"); ?>
			</div>
		</div>
		<script>
			function menu_toggle(){
				$("#wrapper").toggleClass("toggled");
			}
		</script>
	</body>
</html> 
<?PHP }?>




