<?PHP 


$total_total = 0;
$vat_total = 0;
$net_total = 0;
for($page_index=0 ; $page_index < $page_max ; $page_index++){

    $html[$page_index] = '<style>
        div{
            font-size:10px;
        }
        .table, .table thead th, .table tbody td{
            border: 1px solid black;
        }

        th{
            padding:2px 4px;
            font-size:10px;
        }

        td{
            padding:2px 4px;
            font-size:10px;
        }

    </style>';

    $html[$page_index] .= '
    <table width="100%">
        <tr>
            <td>
                <b>เริ่มจาก</b> '.date_format(date_create($date_start),"d-m-Y").' <b>ถึง</b> '.date_format(date_create($date_end),"d-m-Y").'</div>
            </td>
            <td align="left"  align="left" width="120px" >
                
            </td>
        </tr>
    </table>
    <div align="center" style="font-size:14px;color:#00F;"> <b>รายงานตามประเภทสินค้า</b></div>
    <table width="100%" border="0" cellspacing="0">
        <tr> 
            <td align="right" width="120px" ><b>หน้า</b> : '.($page_index + 1).' / '.$page_max.'</td>
        </tr> 
    </table>  
    ';

    $html[$page_index] .= '
    <table  width="100%" cellspacing="0" style="font-size:12px;">
        <thead>
            <tr>
                <th scope="col" width="48" >ลำดับ</th>
                <th scope="col" width="100" >รหัสสินค้า</th>  
                <th scope="col" width="100">ประเภทสินค้า</th>
                <th scope="col" width="100">จำนวน/ชิ้้น</th>
                <th scope="col" width="100" align="right">ยอดชำระ</th>
            </tr>
        </thead>

        <tbody>

    '; 
    for($i=$page_index * $lines; $i < count($data) && $i < $page_index * $lines + $lines; $i++){ 
                // $data_status_id="";
                // if($data[$i]['data_status_id']=='0'){
                //     $data_status_id= 'ยังกู้ไม่สำเร็จ';
                // }else if($data[$i]['data_status_id']=='1'){
                //     $data_status_id= 'กู้สำเร็จ';
                // }
                $total += intval($data[$i]['total']);
                $html[$page_index] .= ' 
                <tr>  
                    <td align="center" >'.($i + 1).'</td>
                    <td align="center" >'.$data[$i]['product_code'].'</td>
                    <td align="center" >'.$data[$i]['product_type_name_en'].'</td>
                    <td align="center" >'.$data[$i]['quantity'].'</td>
                    <td align="right" >'.number_format($data[$i]['total'],2, '.', ',').'</td> 
                </tr>                 
                ';
    }
    $html[$page_index] .= ' 
                <tr>
                    <td align="right" colspan="4" >ยอดรวมทั้งสิ้น</td>
                    <td align="right" colspan="1" >'.number_format($total,2, '.', ',').'</td>
                </tr>
    </tbody> 
</table>
'; 

}

?>