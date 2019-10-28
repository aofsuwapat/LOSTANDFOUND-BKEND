<?php
if($content=="user"){ 
	require_once("modules/user/views/index.inc.php"); 
}else if($content=="about"){ 
	require_once("modules/about/views/index.inc.php"); 
}else if($content=="home_customer"){ 
	require_once("modules/home_customer/views/index.inc.php"); 
}else if($content=="about_award"){ 
	require_once("modules/about_award/views/index.inc.php"); 
}else if($content=="about_why"){ 
	require_once("modules/about_why/views/index.inc.php"); 
}else if($content=="service"){ 
	require_once("modules/service/views/index.inc.php"); 
}else if($content=="project"){ 
	require_once("modules/project/views/index.inc.php"); 
}else if($content=="category"){ 
	require_once("modules/category/views/index.inc.php"); 
}else if($content=="found"){ 
	require_once("modules/found/views/index.inc.php"); 
}else if($content=="certification"){ 
	require_once("modules/certification/views/index.inc.php"); 
}else if($content=="contact"){ 
	require_once("modules/contact/views/index.inc.php"); 
}else if($content=="news"){ 
	require_once("modules/news/views/index.inc.php"); 
}else if($content=="contact_user"){ 
	require_once("modules/contact_user/views/index.inc.php"); 
}else if($content=="setting"){ 
	require_once("modules/setting/views/index.inc.php"); 
}else { 
	require_once("modules/home/views/index.inc.php"); 
}
?>