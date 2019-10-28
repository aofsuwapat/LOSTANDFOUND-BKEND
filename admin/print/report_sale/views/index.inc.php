<?PHP 

session_start(); 

date_default_timezone_set('asia/bangkok');
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("h");
$d5=date("i");
$d6=date("s"); 
require_once('../models/OrderModel.php'); 
$order_model = new OrderModel;

$path = "print/report_sale/views/"; 

$date_start="";
$date_end="";
$sort_col="";
$sort_type ="";
if(isset($_GET['date_start'])){
    $date_start = $_GET['date_start'];
}
if(isset($_GET['date_end'])){
    $date_end = $_GET['date_end'];
}if(isset($_GET['sort_col'])){
    $sort_col = $_GET['sort_col'];
}
if(isset($_GET['sort_type'])){
    $sort_type = $_GET['sort_type'];
}

// if($date_start == ""){
//     $date_start = date('01-m-Y'); 
// }

// if($date_end == ""){ 
//     $date_end  = date('t-m-Y');
// } 
 
$data = $order_model->getOrderByOrderDate($date_start,$date_end,$sort_col,$sort_type);

// echo 'xxx';
// echo '<pre>';
// print_r($data);
// echo '</pre>';

$lines = 35;

$page_max = (int)(count($data) / $lines);
if(count($data) % $lines > 0){
    $page_max += 1;
}

include($path."view.inc.php");



if($_GET['action'] == "pdf"){
    /*############################### FPDF ##############################*/
    // require('../plugins/fpdf/fpdf.php');
	// $pdf=new FPDF();
	// $pdf->AddPage();
    // $pdf->SetFont('Times','B',16); 
    // $pdf->Output();
    /*############################### FPDF ##############################*/

    include("../plugins/mpdf/mpdf.php");
    $mpdf=new mPDF('th', 'A4', '0', 'garuda');  
    
    for($page_index=0 ; $page_index < $page_max ; $page_index++){

        $mpdf->AddPage('P');
        $mpdf->mirrorMargins = true;
        
        $mpdf->SetDisplayMode('fullpage','two');
        

        //$html = ob_get_contents();  
        //ob_end_clean();

        $mpdf->WriteHTML($html[$page_index]);

    } 
    
    $mpdf->Output();

    //exit;
}else if ($_GET['action'] == "excel") {
    
    header("Content-type: application/vnd.ms-excel");
    // header('Content-type: application/csv'); //*** CSV ***//
    
    header("Content-Disposition: attachment; filename=Sale Report $d1-$d2-$d3 $d4:$d5:$d6.xls");

    for($page_index=0 ; $page_index < $page_max ; $page_index++){
        echo $html[$page_index] ."<div> </div> <br>"; 
    }
}
?>