<?php
date_default_timezone_set("Asia/Bangkok");

require_once('../models/FoundModel.php');

$path = "modules/found/views/";

$found_model = new FoundModel;

$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";


$target_dir = "../img_upload/found/";


if(isset($_GET['id'])){
    $found_id = $_GET['id'];
}
if(!isset($_GET['action'])){

    $about_header = $_GET['id'];
    $found_detail = $found_model->getFound();
    require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'update'){
    $category = $found_model->getCategory();
    $found_id = $_GET['id'];
    $found_detail = $found_model->getFoundByID($found_id);
    require_once($path.'update.inc.php');

}else if ($_GET['action'] == 'insert'){
    $category = $found_model->getCategory();
    // echo "<pre>";

    // print_r($category);
    // echo "</pre>";

 require_once($path.'insert.inc.php');
}else if ($_GET['action'] == 'delete'){

    $found_id = $_GET['id'];
    $target_file = $target_dir.$_GET['img'];
    if (file_exists($target_file)) {
        unlink($target_file);
    }
    $found = $found_model->deleteFoundByID($found_id);
    ?>  <script>
     window.history.back();
     </script> <?php
 }else if ($_GET['action'] == 'add'){

    if(isset($_POST['found_topic'])){
        $check = true;
        $data = [];
        // $data['type_id'] = $_POST['type_id'];
        $data['found_topic'] = $_POST['found_topic'];
        $data['found_type'] = $_POST['found_type'];
        $data['found_img'] = $_POST['found_img'];
        $data['found_detail'] = $_POST['found_detail'];
        $data['found_location'] = $_POST['found_location'];
        $data['found_longitude'] = $_POST['found_longitude'];
        $data['found_latitude'] = $_POST['found_latitude'];
        $data['found_dateadd'] = $_POST['found_dateadd'];


        

        if($_FILES['found_img']['name'] == ""){
            $data['found_img'] = $_POST['found_img'];
        }else {
            $target_file = $target_dir.$date.'-'.strtolower(basename($_FILES['found_img']['name']));
            $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['found_img']['size'] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['found_img']['tmp_name'], $target_file)) {
                $data['found_img'] = $date.'-'.strtolower(basename($_FILES['found_img']['name']));
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
                $result = $found_model->insertFound($data);


                if($result){
                    ?> <script>
                        window.location="index.php?content=found"
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

                if(isset($_POST['found_id'])){
                    $check = true;
                    $data = [];
                    // $data['type_id'] = $_POST['type_id'];
                    $data['found_topic'] = $_POST['found_topic'];
                    $data['found_type'] = $_POST['found_type'];
                    $data['found_img'] = $_POST['found_img'];
                    $data['found_detail'] = $_POST['found_detail'];
                    $data['found_location'] = $_POST['found_location'];
                    $data['found_longitude'] = $_POST['found_longitude'];
                    $data['found_latitude'] = $_POST['found_latitude'];
                    $data['found_dateadd'] = $_POST['found_dateadd'];



                 



                    if($_FILES['found_img']['name'] == ""){
                        $data['found_img'] = $_POST['found_img_o'];
                    }else {
                        $target_file = $target_dir.$date.'-'.strtolower(basename($_FILES['found_img']['name']));
                        $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
                        if (file_exists($target_file)) {
                            $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                            $check = false;
                        }else if ($_FILES['found_img']['size'] > 5000000) {
                            $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                            $check = false;
                        }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                            $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                            $check = false;
                        }else if (move_uploaded_file($_FILES['found_img']['tmp_name'], $target_file)) {

                            $data['found_img'] = $date.'-'.strtolower(basename($_FILES['found_img']['name']));

                            $target_file = $target_dir.$_POST['found_img_o'];
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
                            $result = $found_model->updateFoundByID($_POST['found_id'],$data);

                            if($result){
                                ?> <script>
                                    window.location="index.php?content=found"
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

                            if(isset($_FILES['found_header_img'])){
                                $check = true;
                                $data = [];
                                $data1 = [];
                                $description_id = '6';
                                $data1['title'] = $_POST['title'];
                                $data1['keyword'] = $_POST['keyword'];
                                $data1['description'] = $_POST['description'];

                                if($_FILES['found_header_img']['name'] == ""){
                                    $data['found_header_img'] = $_POST['found_header_img_o'];
                                }else {
                                    $target_file = $target_dir.$date.'-'.strtolower(basename($_FILES['found_header_img']['name']));
                                    $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
                                    if (file_exists($target_file)) {
                                        $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                                        $check = false;
                                    }else if ($_FILES['found_header_img']['size'] > 5000000) {
                                        $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                                        $check = false;
                                    }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                                        $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                                        $check = false;
                                    }else if (move_uploaded_file($_FILES['found_header_img']['tmp_name'], $target_file)) {

                                        $data['found_header_img'] = $date.'-'.strtolower(basename($_FILES['found_header_img']['name']));

                                        $target_file = $target_dir.$_POST['found_header_img_o'];
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
                                        $result = $found_model->updateFoundHeaderByID($_POST['found_header_id'],$data);
                                        $description_model->updateDescriptionByID($description_id,$data1);

                                        if($result){
                                            ?> <script>
                                                window.location="index.php?content=found"
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
