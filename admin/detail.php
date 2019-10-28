<?PHP 
session_start();

require_once('../models/SettingModel.php'); 
require_once('../models/OrderModel.php'); 
require_once('../models/OrderListModel.php'); 

$setting_model = new SettingModel;
$order_model = new OrderModel;
$order_list_model = new OrderListModel;

$setting = $setting_model->getSettingByID('1');

if(!isset($_SESSION['smt_administrator_user'])){
	require_once("modules/login/views/index.inc.php"); 
}else{
    if(isset($_GET['code'])){
        $order = $order_model->getOrderByOrderCode($_GET['code']);
        
        if (count($order)){
            $order_list = $order_list_model->getOrderListByOrderCode($_GET['code']);
        }else{
            ?>  <script> alert('<?php echo "ขออภัย, ไม่พบใบสั่งซื้อ"; ?>'); window.location = 'index.php'; </script> <?php
        }
    }else{
        ?>  <script> alert('<?php echo "ขออภัย, ไม่พบใบสั่งซื้อ"; ?>'); window.location = 'index.php'; </script> <?php
    }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<title>ใบสั่งซื้อสินค้า <?PHP echo $_GET['code']; ?></title>
		<link rel="icon" href="../img_upload/setting/<?PHP if($setting['setting_logo'] != ""){ echo $setting['setting_logo']; }else{ echo "default-logo.png"; } ?>" type="image/png">

		<link rel="stylesheet" href="../template/frontend/font/gothic/font.css">

		<link rel="stylesheet" href="../template/frontend/css/bootstrap.min.css">
		<link rel="stylesheet" href="../template/frontend/css/style.css">
		
		<script src="../template/frontend/js/jquery.min.js"></script>
		<script src="../template/frontend/js/bootstrap.min.js"></script>
    </head>
	<style>
		.page-A4 {
			width: 793px;
			font-size: 14px;
			margin: 0 auto;
		}
		p {
			margin: 0px;
		}
		.form-input {
			width: 90%;
			max-width: 400px; 
			padding: .25rem .75rem;
			color: #495057;
			background-color: #fff;
			background-clip: padding-box;
			border: 1px solid #ced4da;
			border-radius: .25rem;
			overflow: hidden;
		}
		.button {
			color: #000;
			margin: 14px 0px;
			padding: 6px 36px;
			background-color: #fec619;
			display: inline-block;
			border: 1px solid transparent;
			cursor: pointer;
		}
	</style>
    <body>
        <div style="padding: 50px; overflow: auto;">
            <div class="page-A4">
                <div class="row form-group">
                    <div class="col-3" style="padding-left: 0;" align="center">
                        <img style="width:180px; height:120px;" src="../img_upload/setting/<?PHP if($setting['setting_logo'] != ""){ echo $setting['setting_logo']; }else{ echo "default-logo.png"; } ?>">
                    </div>
                    <div class="col-9">
                        <address>
                            <strong><?php echo $setting['setting_name']; ?></strong><br>
                            <?php echo $setting['setting_address_th']; ?><br>
                            โทร. <?php echo $setting['setting_phone']; ?> โทรสาร <?php echo $setting['setting_fax']; ?><br>
                            เลขประจำตัวผู้เสียภาษี <?php echo $setting['setting_tax']; ?><br>
                        </address>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-12 text-center">
                        <b style="font-size: 24px;">ใบสั่งซื้อ</b>
                    </div>
                </div>

                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                        <tr>
                            <td colspan="3" valign="top">
                                <table width="98%" cellspacing="0" cellpadding="0" border="0">
                                    <tbody><tr>
                                        <td colspan="2" style="color:#fff;padding:5px;border:solid 1px #ddd;text-align:center" bgcolor="#0099cc"><strong>ข้อมูลลูกค้า</strong></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px;border-left:solid 1px #ddd" width="20%" valign="top">รหัสลูกค้า</td>
                                        <td style="padding:5px;border-right:solid 1px #ddd"> : <?php echo $order['member_code']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px;border-left:solid 1px #ddd" width="20%" valign="top">ชื่อลูกค้า</td>
                                        <td style="padding:5px;border-right:solid 1px #ddd"> : <?php echo $order['member_firstname'].' '.$order['member_lastname']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px;border-left:solid 1px #ddd" width="20%" valign="top">Tax ID</td>
                                        <td style="padding:5px;border-right:solid 1px #ddd"> : <?php echo $order['member_tax']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px;border-left:solid 1px #ddd" width="20%" valign="top">โทร</td>
                                        <td style="padding:5px;border-right:solid 1px #ddd"> : <?php echo $order['member_phone']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px;border-left:solid 1px #ddd;border-bottom:solid 1px #ddd" width="20%" valign="top">ที่อยู่</td>
                                        <td style="padding:5px;border-right:solid 1px #ddd;border-bottom:solid 1px #ddd"> : <?php echo $order['member_address']; ?></td>
                                    </tr>
                                </tbody></table>
                                <br>
                            </td>
                            <td colspan="3" valign="top">
                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                    <tbody><tr>
                                        <td colspan="2" style="color:#fff;padding:5px;border:solid 1px #ddd;text-align:center" bgcolor="#0099cc"><strong>รายละเอียดการสั่งซื้อสินค้า</strong></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px;border-left:solid 1px #ddd" valign="top">เลขที่ใบสั่งซื้อ</td>
                                        <td style="padding:5px;border-right:solid 1px #ddd"> : <?php echo $order['order_code']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px;border-left:solid 1px #ddd" valign="top">วันที่</td>
                                        <td style="padding:5px;border-right:solid 1px #ddd"> : <?php echo $order['order_date']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px;border-left:solid 1px #ddd;border-bottom:solid 1px #ddd" valign="top">พนักงานขาย</td>
                                        <td style="padding:5px;border-right:solid 1px #ddd;border-bottom:solid 1px #ddd"> : <?php echo $order['sales']; ?></td>
                                    </tr>
                                </tbody></table>
                                <br>
                            </td>
                        </tr>

                        <tr>
                            <td style="color:#fff;padding:5px;border-left:solid 1px #ddd;border-bottom:solid 1px #ddd;border-top:solid 1px #ddd" width="152" bgcolor="#0099cc" align="center"><strong>รหัสสินค้า</strong></td>
                            <td style="color:#fff;padding:5px;border-left:solid 1px #ddd;border-bottom:solid 1px #ddd;border-top:solid 1px #ddd" width="416" bgcolor="#0099cc" align="center"><strong>สินค้า</strong></td>
                            <td style="color:#fff;padding:5px;border-left:solid 1px #ddd;border-bottom:solid 1px #ddd;border-top:solid 1px #ddd" width="122" bgcolor="#0099cc" align="center"><strong>ราคา/หน่วย</strong></td>
                            <td style="color:#fff;padding:5px;border-left:solid 1px #ddd;border-bottom:solid 1px #ddd;border-top:solid 1px #ddd" width="122" bgcolor="#0099cc" align="center"><strong>ส่วนลด</strong></td>
                            <td style="color:#fff;padding:5px;border-left:solid 1px #ddd;border-bottom:solid 1px #ddd;border-top:solid 1px #ddd" width="176" bgcolor="#0099cc" align="center"><strong>จำนวน</strong></td>
                            <td style="color:#fff;padding:5px;border-left:solid 1px #ddd;border-bottom:solid 1px #ddd;border-top:solid 1px #ddd;border-right:solid 1px #ddd" width="125" bgcolor="#0099cc" align="center"><strong>จำนวนเงิน</strong></td>
                        </tr>
                        <?php for($i=0; $i < count($order_list); $i++){ ?>
                            <tr>
                                <td style="padding:5px;border-left:solid 1px #ddd" valign="top" align="center"><?php echo $order_list[$i]['product_code']; ?></td>
                                <td style="padding:5px;border-left:solid 1px #ddd" valign="top"><?php echo $order_list[$i]['product_detail']; ?></td>
                                <td style="padding:5px;border-left:solid 1px #ddd" valign="top" align="right"><?php echo number_format($order_list[$i]['price'],2); ?></td>
                                <td style="padding:5px;border-left:solid 1px #ddd" valign="top" align="right"><span style="color:#ff0000"><?php echo number_format($order_list[$i]['discount'],2); ?></span></td>
                                <td style="padding:5px;border-left:solid 1px #ddd" valign="top" align="center"><?php echo $order_list[$i]['quantity']; ?></td>
                                <td style="padding:5px;border-left:solid 1px #ddd;border-right:solid 1px #ddd" valign="top" align="right"><?php echo number_format($order_list[$i]['total'],2); ?></td>
                            </tr>
                        <?php } ?>
                        <?php for($i= count($order_list); $i < 10; $i++){ ?>
                        <tr style="height:30px">
                            <td style="padding:5px;border-left:solid 1px #ddd"></td>
                            <td style="padding:5px;border-left:solid 1px #ddd"></td>
                            <td style="padding:5px;border-left:solid 1px #ddd"></td>
                            <td style="padding:5px;border-left:solid 1px #ddd"></td>
                            <td style="padding:5px;border-left:solid 1px #ddd"></td>
                            <td style="padding:5px;border-left:solid 1px #ddd;border-right:solid 1px #ddd"></td>
                        </tr>
                        <?php } ?>
                        <tr style="height:30px">
                            <td style="padding:5px;border-left:solid 1px #ddd;border-bottom:solid 1px #ddd"></td>
                            <td style="padding:5px;border-left:solid 1px #ddd;border-bottom:solid 1px #ddd"></td>
                            <td style="padding:5px;border-left:solid 1px #ddd;border-bottom:solid 1px #ddd"></td>
                            <td style="padding:5px;border-left:solid 1px #ddd;border-bottom:solid 1px #ddd"></td>
                            <td style="padding:5px;border-left:solid 1px #ddd;border-bottom:solid 1px #ddd"></td>
                            <td style="padding:5px;border-left:solid 1px #ddd;border-bottom:solid 1px #ddd;border-right:solid 1px #ddd"></td>
                        </tr>
                        <tr>
                            <td colspan="3" style="color:#fff;padding:5px;border:solid 1px #ddd;text-align:center" bgcolor="#0099cc"><strong>หมายเหตุ</strong></td>
                            <td colspan="2" style="padding:5px;border-left:solid 1px #ddd" align="center">รวมมูลค่าสินค้า</td>
                            <td style="padding:5px;border-left:solid 1px #ddd;border-right:solid 1px #ddd" align="right"><?php echo number_format($order['total'],2);?></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="2" style="color:red;text-align:center;border-left:solid 1px #ddd; border-bottom:solid 1px #ddd;"><?php echo $order['remark']; ?></td>
                            <td colspan="2" style="padding:5px;border-left:solid 1px #ddd;border-bottom:solid 1px #ddd" valign="top" align="center">ภาษีมูลค่าเพิ่ม 7 %</td>
                            <td style="padding:5px;border-left:solid 1px #ddd;border-bottom:solid 1px #ddd;border-right:solid 1px #ddd" valign="top" align="right"><?php echo number_format($order['vat'],2);?></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="color:#0099cc;padding:5px;border-left:solid 1px #ddd;border-bottom:solid 1px #ddd" valign="top" align="center"><strong>ยอดสุทธิ</strong></td>
                            <td style="color:#0099cc;padding:5px;border-left:solid 1px #ddd;border-bottom:solid 1px #ddd;border-right:solid 1px #ddd" valign="top" align="right"><strong><?php echo number_format($order['net_total'],2);?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="text-center d-print-none">
            ที่อยู่ใบส่งซื้อ : 
            <a href="https://songsermtractor.com/order.php?code=<?php echo $order['order_code']; ?>" style="text-decoration: underline;">
                https://songsermtractor.com/order.php?code=<?php echo $order['order_code']; ?>
            </a>
        </div>

        <div class="text-center d-print-none">
            <a class="button" onclick="window.print();">
                พิมพ์ใบสั่งซื้อ
            </a>
        </div>
    </body>
<html>
<?PHP }?>