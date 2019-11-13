<?php
date_default_timezone_set("Asia/Bangkok");

require_once('../models/CategoryModel.php');

$path = "modules/category/views/";

$category_model = new CategoryModel;

$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";

$target_dir = "../img_upload/category/";


if(isset($_GET['id'])){
    $category_id = $_GET['id'];
}

if( !isset( $_GET['action'] ) ){

    $category = $category_model->getCategoryTypeBy();
    require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'update'){

    $category_id = $_GET['id'];
    $category = $category_model->getCategoryTypeByID($category_id);
    require_once($path.'update.inc.php');
}else if ($_GET['action'] == 'insert'){

   require_once($path.'insert.inc.php');
}else if ($_GET['action'] == 'update_img'){

    $about_img_id = $_GET['id'];
    require_once($path.'update_img.inc.php');
}else if ($_GET['action'] == 'delete'){

    $category_id = $_GET['id'];
    $category = $category_model->deleteCategoryTypeByID($category_id);
    ?>  <script>
     window.history.back();
     </script> <?php
 }else if ($_GET['action'] == 'add'){

    if(isset($_POST['category_name'])){
        $check = true;
        $data = [];
        $data['category_name'] = $_POST['category_name'];


        if($_FILES['category_img']['name'] == ""){
            $data['category_img'] = $_POST['category_img'];

        }else {
            $target_file = $target_dir.$date.'-'.strtolower(basename($_FILES['category_img']['name']));
            $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['category_img']['size'] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['category_img']['tmp_name'], $target_file)) {
                $data['category_img'] = $date.'-'.strtolower(basename($_FILES['category_img']['name']));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }
        if($_FILES['found_pin']['name'] == ""){
            $data['found_pin'] = $_POST['found_pin'];
            
        }else {
            $target_file = $target_dir.$date.'-'.strtolower(basename($_FILES['found_pin']['name']));
            $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['found_pin']['size'] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['found_pin']['tmp_name'], $target_file)) {
                $data['found_pin'] = $date.'-'.strtolower(basename($_FILES['found_pin']['name']));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }
        if($_FILES['lost_pin']['name'] == ""){
            $data['lost_pin'] = $_POST['lost_pin'];
            
        }else {
            $target_file = $target_dir.$date.'-'.strtolower(basename($_FILES['lost_pin']['name']));
            $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['lost_pin']['size'] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['lost_pin']['tmp_name'], $target_file)) {
                $data['lost_pin'] = $date.'-'.strtolower(basename($_FILES['lost_pin']['name']));
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
                $result = $category_model->insertCategoryType($data);
                


                if($result){
                    ?> <script>
                        window.location="index.php?content=category"
                        </script> <?php
                    }else{
                        ?>  
                        <script>
                           window.history.back();
                           </script>
                            <?php
                       }
                   }
               }else{
                ?> 
                <script> 
                    window.history.back();
                    </script>
                     <?php
                }


       
    }else if ($_GET['action'] == 'edit'){

     if(isset($_POST['category_name'])){
        $check = true;
        $data = [];
        $data['category_name'] = $_POST['category_name'];

        if($_FILES['category_img']['name'] == ""){
            $data['category_img'] = $_POST['category_img'];
        }else {
            $target_file = $target_dir.$date.'-'.strtolower(basename($_FILES['category_img']['name']));
            $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['category_img']['size'] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['category_img']['tmp_name'], $target_file)) {
                $data['category_img'] = $date.'-'.strtolower(basename($_FILES['category_img']['name']));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }
        if($_FILES['found_pin']['name'] == ""){
            $data['found_pin'] = $_POST['found_pin'];
        }else {
            $target_file = $target_dir.$date.'-'.strtolower(basename($_FILES['found_pin']['name']));
            $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['found_pin']['size'] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['found_pin']['tmp_name'], $target_file)) {
                $data['found_pin'] = $date.'-'.strtolower(basename($_FILES['found_pin']['name']));
            } else {
                $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                $check = false;
            } 
        }
        if($_FILES['lost_pin']['name'] == ""){
            $data['lost_pin'] = $_POST['lost_pin'];
        }else {
            $target_file = $target_dir.$date.'-'.strtolower(basename($_FILES['lost_pin']['name']));
            $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['lost_pin']['size'] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['lost_pin']['tmp_name'], $target_file)) {
                $data['lost_pin'] = $date.'-'.strtolower(basename($_FILES['lost_pin']['name']));
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
                 $result = $category_model->updateCategoryTypeByID($_POST['category_id'],$data);
          
                


                if($result){
                    ?> <script>
                        window.location="index.php?content=category"
                        </script> <?php
                    }else{
                        ?>  
                        <script>
                           window.history.back();
                           </script>
                            <?php
                       }
                   }
               }else{
                ?> 
                <script> 
                    window.history.back();
                    </script>
                     <?php
                }

        
    }else{

        $category = $category_model->getCategoryTypeBy();
        require_once($path.'view.inc.php');
    }
    ?>
