 <!-- <script type="text/javascript" src="../template/backend/ckeditor/ckeditor.js"></script> -->
 <script type="text/javascript" src="../template/ckeditor/ckeditor.js"></script>

 <script>

    function check(){

        var detail_title_th = document.getElementById("detail_title_th").value;
        var detail_title_en = document.getElementById("detail_title_en").value;

        detail_title_th = $.trim(detail_title_th);
        detail_title_en = $.trim(detail_title_en);

        if(detail_title_th.length == 0){
            alert("กรุณากรอกหัวข้อ");
            document.getElementById("detail_title_th").focus();
            return false;
        }else if(detail_title_en.length == 0){
            alert("กรุณากรอกรายละเอียด");
            document.getElementById("detail_title_en").focus();
            return false;
        }else{
            return true;
        }
    }

</script>   
<!-- <? print_r('csadsafsa',$home_customer_detail); ?> -->

<div class="row">
    <div class="col-lg-4">
        <h1>จัดการAbout Us</h1>
        <h2>เเก้ไขDetail About Us</h2>
    </div>

    <?php //if($user['user_division_id']=='sales') {?> 

        <form role="form" method="post" onsubmit="return check();" action="index.php?content=about&action=edit_detail" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Header TH <font color="#F00"><b>*</b></font></label>
                        <input id="detail_title_th" name="detail_title_th" class="form-control" value="<?php echo $about_detail['detail_title_th']?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Header EN <font color="#F00"><b>*</b></font></label>
                        <input id="detail_title_en" name="detail_title_en" class="form-control" value="<?php echo $about_detail['detail_title_en']?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Detail TH<font color="#F00"><b>*</b></font></label>
                        <textarea style="width:100%;" name="detail_th" id="detail_th" class="ckeditor"><?php echo $about_detail['detail_th']?></textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace('detail_th',{
                                filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
                                filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
                                filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
                                filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'


                                
                            });
                        </script>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Detail EN<font color="#F00"><b>*</b></font></label>
                        <textarea style="width:100%;" name="detail_en" id="detail_en" class="ckeditor"><?php echo $about_detail['detail_en']?></textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace('detail_en',{
                                filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
                                filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
                                filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
                                filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

                            });
                        </script>
                    </div>
                </div>
            </div>
            <div align="right">
                <input type="hidden" id="detail_id" name="detail_id" value="<?php echo $about_detail['detail_id'] ?>" />
                <button type="button" class="btn btn-default" onclick="window.location='?content=about';">ย้อนกลับ</button>
                <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
                <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
            </div>
        </form>
    </div>

    <hr style="border-bottom: 100%;">

    <div align=right>
        <a class="button" href="?content=about&action=insert_img&detail_id=<?php echo $_GET['id']?>">
            เพิ่มรูป
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th width="12px">#</th>
                <th width="200px">About Image</th>
                <th width="50px">จัดการ</th>
            </tr>
        </thead>
        <tbody>

            <?php for($i=0; $i < count($about_img); $i++){ ?>
                <tr>
                    <td><?php echo $i+1; ?></td>
                    <td>
                        <img style="height:150px;width:auto;" src="../img_upload/about_img/<?php if($about_img[$i]['about_img'] != ""){ echo $about_img[$i]['about_img'];} else{ echo "default.png";} ?>"  class="img-responsive img-detail"> 
                    </td>
                    <td width="50px">
                        <a href="?content=about&action=update_img&id=<?php echo $about_img[$i]['about_img_id'];?>" style="font-size: 20px;">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a> 
                        <a href="?content=about&action=delete_img&id=<?php echo $about_img[$i]['about_img_id'];?>&about_img=<?php echo $about_img[$i]['about_img'];?>" onclick="return confirm('คุณต้องการลบ รูปนี้หรือไม่');" style="color:red; font-size: 20px;">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a> 

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>