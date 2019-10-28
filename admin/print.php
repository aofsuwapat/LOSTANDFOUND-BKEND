<?PHP 
 

/* ###################################################  ################################################### */
    if($_GET['app'] == "report_sale"){
        require_once("print/report_sale/views/index.inc.php"); 
    }else if($_GET['app'] == "report_product"){
        require_once("print/report_product/views/index.inc.php");  
    } 

/* ################################################### สิ้นสุด  ################################################### */

 

?>