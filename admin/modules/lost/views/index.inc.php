<?php
date_default_timezone_set("Asia/Bangkok");

require_once('../models/LostModel.php');

$path = "modules/lost/views/";

$lost_model = new LostModel;

$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";


$target_dir = "../img_upload/lost/";


if(isset($_GET['id'])){
    $lost_id = $_GET['id'];
}
if(!isset($_GET['action'])){

    $about_header = $_GET['id'];
    $lost_detail = $lost_model->getLost();
    require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'update'){
    $category = $lost_model->getCategory();
    $lost_id = $_GET['id'];
    $lost_detail = $lost_model->getLostByID($lost_id);
    require_once($path.'update.inc.php');

}else if ($_GET['action'] == 'insert'){
    $category = $lost_model->getCategory();
    // echo "<pre>";

    // print_r($category);
    // echo "</pre>";

 require_once($path.'insert.inc.php');
}else if ($_GET['action'] == 'delete'){

    $lost_id = $_GET['id'];
    $target_file = $target_dir.$_GET['img'];
    if (file_exists($target_file)) {
        unlink($target_file);
    }
    $lost = $lost_model->deleteLostByID($lost_id);
    ?>  <script>
     window.history.back();
     </script> <?php
 }else if ($_GET['action'] == 'add'){

    if(isset($_POST['lost_topic'])){
        $check = true;
        $data = [];
        // $data['type_id'] = $_POST['type_id'];
        $data['lost_topic'] = $_POST['lost_topic'];
        $data['lost_type'] = $_POST['lost_type'];
        $data['lost_img'] = $_POST['lost_img'];
        $data['lost_detail'] = $_POST['lost_detail'];
        $data['lost_location'] = $_POST['lost_location'];
        $data['lost_longitude'] = $_POST['lost_longitude'];
        $data['lost_latitude'] = $_POST['lost_latitude'];
        $data['lost_dateadd'] = $_POST['lost_dateadd'];


        

        if($_FILES['lost_img']['name'] == ""){
            $data['lost_img'] = $_POST['lost_img'];
        }else {
            $target_file = $target_dir.$date.'-'.strtolower(basename($_FILES['lost_img']['name']));
            $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['lost_img']['size'] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['lost_img']['tmp_name'], $target_file)) {
                $data['lost_img'] = $date.'-'.strtolower(basename($_FILES['lost_img']['name']));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }
        if($check == false){
            ?>  <script>  
                alert('<?php echo $error_msg; ?>'); window.history.back();
                </script>  <?php
            }else{
                $result = $lost_model->insertLost($data);


                if($result){
                    ?> <script>
                        window.location="index.php?content=lost"
                        </script> <?php
                    }else{
                        ?>  <script>
                           window.history.back();
                           </script> <?php
                       }
                   }
               }else{
                ?> 
                <!-- <script> 
                    window.history.back();
                    </script> -->
                     <?php
                }
            }else if ($_GET['action'] == 'edit'){

                if(isset($_POST['lost_id'])){
                    $check = true;
                    $data = [];
                    // $data['type_id'] = $_POST['type_id'];
                    $data['lost_topic'] = $_POST['lost_topic'];
                    $data['lost_type'] = $_POST['lost_type'];
                    $data['lost_img'] = $_POST['lost_img'];
                    $data['lost_detail'] = $_POST['lost_detail'];
                    $data['lost_location'] = $_POST['lost_location'];
                    $data['lost_longitude'] = $_POST['lost_longitude'];
                    $data['lost_latitude'] = $_POST['lost_latitude'];
                    $data['lost_dateadd'] = $_POST['lost_dateadd'];



                 



                    if($_FILES['lost_img']['name'] == ""){
                        $data['lost_img'] = $_POST['lost_img_o'];
                    }else {
                        $target_file = $target_dir.$date.'-'.strtolower(basename($_FILES['lost_img']['name']));
                        $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
                        if (file_exists($target_file)) {
                            $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                            $check = false;
                        }else if ($_FILES['lost_img']['size'] > 5000000) {
                            $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                            $check = false;
                        }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                            $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                            $check = false;
                        }else if (move_uploaded_file($_FILES['lost_img']['tmp_name'], $target_file)) {

                            $data['lost_img'] = $date.'-'.strtolower(basename($_FILES['lost_img']['name']));

                            $target_file = $target_dir.$_POST['lost_img_o'];
                            if (file_exists($target_file)) {
                                unlink($target_file);
                            }
                        } else {
                            $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                            $check = false;
                        } 
                    }

                    if($check == false){
                        ?>  <script>  
                            alert('<?php echo $error_msg; ?>'); window.history.back();

                            </script>  <?php
                        }else{
                            $result = $lost_model->updateLostByID($_POST['lost_id'],$data);

                            if($result){
                                ?> <script>
                                    window.location="index.php?content=lost"
                                    </script> <?php
                                }else{
                                    ?>  <script>
                                     window.history.back();
                                     </script> <?php
                                 }
                             }
                         }else{
                            ?> <script> 
                                window.history.back();
                                </script> <?php
                            }
                        }else if ($_GET['action'] == 'edit_header'){

                            if(isset($_FILES['lost_header_img'])){
                                $check = true;
                                $data = [];
                                $data1 = [];
                                $description_id = '6';
                                $data1['title'] = $_POST['title'];
                                $data1['keyword'] = $_POST['keyword'];
                                $data1['description'] = $_POST['description'];

                                if($_FILES['lost_header_img']['name'] == ""){
                                    $data['lost_header_img'] = $_POST['lost_header_img_o'];
                                }else {
                                    $target_file = $target_dir.$date.'-'.strtolower(basename($_FILES['lost_header_img']['name']));
                                    $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
                                    if (file_exists($target_file)) {
                                        $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                                        $check = false;
                                    }else if ($_FILES['lost_header_img']['size'] > 5000000) {
                                        $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                                        $check = false;
                                    }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                                        $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                                        $check = false;
                                    }else if (move_uploaded_file($_FILES['lost_header_img']['tmp_name'], $target_file)) {

                                        $data['lost_header_img'] = $date.'-'.strtolower(basename($_FILES['lost_header_img']['name']));

                                        $target_file = $target_dir.$_POST['lost_header_img_o'];
                                        if (file_exists($target_file)) {
                                            unlink($target_file);
                                        }
                                    } else {
                                        $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                                        $check = false;
                                    } 
                                }

                                if($check == false){
                                    ?>  <script>  
                                        alert('<?php echo $error_msg; ?>'); window.history.back();
                                        </script>  <?php
                                    }else{
                                        $result = $lost_model->updateLostHeaderByID($_POST['lost_header_id'],$data);
                                        $description_model->updateDescriptionByID($description_id,$data1);

                                        if($result){
                                            ?> <script>
                                                window.location="index.php?content=lost"
                                                </script> <?php
                                            }else{
                                                ?>  <script>
                                                 window.history.back();
                                                 </script> <?php
                                             }
                                         }
                                     }else{
                                        ?> <script> 
                                            window.history.back(); 
                                            </script> <?php
                                        }
                                    }else{
                                        require_once($path.'view.inc.php');
                                    }
                                    ?>
