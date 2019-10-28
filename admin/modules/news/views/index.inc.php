<?php
date_default_timezone_set("Asia/Bangkok");

require_once('../models/NewsModel.php');

$path = "modules/news/views/";

$news_model = new NewsModel;

$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";


$target_dir = "../img_upload/news/";


if(isset($_GET['id'])){
    $news_id = $_GET['id'];
}
if(!isset($_GET['action'])){

    $about_header = $_GET['id'];
    $news_detail = $news_model->getNewsBy();
    require_once($path.'view.inc.php');
}else if ($_GET['action'] == 'update'){

    $news_id = $_GET['id'];
    $news_detail = $news_model->getNewsByID($news_id);
    require_once($path.'update.inc.php');

}else if ($_GET['action'] == 'insert'){
 require_once($path.'insert.inc.php');
}else if ($_GET['action'] == 'delete'){

    $news_id = $_GET['id'];
    $target_file = $target_dir.$_GET['img'];
    if (file_exists($target_file)) {
        unlink($target_file);
    }
    $news = $news_model->deleteNewsByID($news_id);
    ?>  <script>
     window.history.back();
     </script> <?php
 }else if ($_GET['action'] == 'add'){

    if(isset($_POST['news_name'])){
        $check = true;
        $data = [];
        // $data['type_id'] = $_POST['type_id'];
        $data['news_name'] = $_POST['news_name'];
        $data['news_description'] = $_POST['news_description'];
        
        $data['news_img'] = $_POST['news_img'];
        $data['news_view'] = $_POST['news_view'];
        $data['news_date'] = $_POST['news_date'];


        

        if($_FILES['news_img']['name'] == ""){
            $data['news_img'] = $_POST['news_img'];
        }else {
            $target_file = $target_dir.$date.'-'.strtolower(basename($_FILES['news_img']['name']));
            $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                $check = false;
            }else if ($_FILES['news_img']['size'] > 5000000) {
                $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                $check = false;
            }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                $check = false;
            }else if (move_uploaded_file($_FILES['news_img']['tmp_name'], $target_file)) {
                $data['news_img'] = $date.'-'.strtolower(basename($_FILES['news_img']['name']));
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
                $result = $news_model->insertNews($data);


                if($result){
                    ?> <script>
                        window.location="index.php?content=news"
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

                if(isset($_POST['news_id'])){
                    $check = true;
                    $data = [];
                    // $data['type_id'] = $_POST['type_id'];
                    $data['news_name'] = $_POST['news_name'];
                    $data['news_description'] = $_POST['news_description'];
                    $data['news_img'] = $_POST['news_img'];
                    $data['news_view'] = $_POST['news_view'];
                    $data['news_date'] = $_POST['news_date'];

                    if($_FILES['news_img']['name'] == ""){
                        $data['news_img'] = $_POST['news_img_o'];
                    }else {
                        $target_file = $target_dir.$date.'-'.strtolower(basename($_FILES['news_img']['name']));
                        $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
                        if (file_exists($target_file)) {
                            $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                            $check = false;
                        }else if ($_FILES['news_img']['size'] > 5000000) {
                            $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                            $check = false;
                        }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                            $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                            $check = false;
                        }else if (move_uploaded_file($_FILES['news_img']['tmp_name'], $target_file)) {

                            $data['news_img'] = $date.'-'.strtolower(basename($_FILES['news_img']['name']));

                            $target_file = $target_dir.$_POST['news_img_o'];
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
                            $result = $news_model->updateNewsByID($_POST['news_id'],$data);

                            if($result){
                                ?> <script>
                                    window.location="index.php?content=news"
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

                            if(isset($_FILES['news_header_img'])){
                                $check = true;
                                $data = [];
                                $data1 = [];
                                $description_id = '6';
                                $data1['title'] = $_POST['title'];
                                $data1['keyword'] = $_POST['keyword'];
                                $data1['description'] = $_POST['description'];

                                if($_FILES['news_header_img']['name'] == ""){
                                    $data['news_header_img'] = $_POST['news_header_img_o'];
                                }else {
                                    $target_file = $target_dir.$date.'-'.strtolower(basename($_FILES['news_header_img']['name']));
                                    $logoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if file already exists
                                    if (file_exists($target_file)) {
                                        $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                                        $check = false;
                                    }else if ($_FILES['news_header_img']['size'] > 5000000) {
                                        $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                                        $check = false;
                                    }else if($logoFileType != "jpg" && $logoFileType != "png" && $logoFileType != "jpeg" ) {
                                        $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                                        $check = false;
                                    }else if (move_uploaded_file($_FILES['news_header_img']['tmp_name'], $target_file)) {

                                        $data['news_header_img'] = $date.'-'.strtolower(basename($_FILES['news_header_img']['name']));

                                        $target_file = $target_dir.$_POST['news_header_img_o'];
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
                                        $result = $news_model->updateNewsHeaderByID($_POST['news_header_id'],$data);
                                        $description_model->updateDescriptionByID($description_id,$data1);

                                        if($result){
                                            ?> <script>
                                                window.location="index.php?content=news"
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
