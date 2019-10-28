     <!-- <script type="text/javascript" src="../template/backend/ckeditor/ckeditor.js"></script> -->
    <script type="text/javascript" src="../template/ckeditor/ckeditor.js"></script>

     <script>
        function check(){

            var why_title_th = document.getElementById("why_title_th").value;
            var why_title_en = document.getElementById("why_title_en").value;
            var why_detail_th = document.getElementById("why_detail_th").value;
            var why_detail_en = document.getElementById("why_detail_en").value;
            var slide_link = document.getElementById("slide_link").value;

            why_title_th = $.trim(why_title_th);
            why_title_en = $.trim(why_title_en);
            why_detail_th = $.trim(why_detail_th);
            why_detail_en = $.trim(why_detail_en);

            if(why_title_th.length == 0){
                alert("กรุณากรอกหัวข้อ");
                document.getElementById("why_title_th").focus();
                return false;
            }else if(why_title_en.length == 0){
                alert("กรุณากรอกหัวข้อ");
                document.getElementById("why_title_en").focus();
                return false;
            }else if(why_detail_th.length == 0){
                alert("กรุณากรอกรายละเอียด TH");
                document.getElementById("why_detail_th").focus();
                return false;
            }else if(why_detail_en.length == 0){
                alert("กรุณากรอกรายละเอียด EN");
                document.getElementById("why_detail_en").focus();
                return false;
            }else if(slide_link.length == 0){
            // alert("กรุณากรอก Read More Link");
            // document.getElementById("slide_link").focus();
            // return false;
        }else{
            return true;
        }
    }
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#img_back').attr('src', e.target.result);

            }
            reader.readAsDataURL(input.files[0]);
        }else{
            $('#img_back').attr('src', '../img_upload/contact/default.png');

        }
    }
</script>   
<!-- <? print_r('csadsafsa',$home_customer_detail); ?> -->

<div class="row">
    <div class="col-lg-4">
        <h1>จัดการ Contact Us</h1>
        <h2>เเก้ไข Contact Us</h2>
    </div>
    <div class="col-lg-8" align="right">

        <a title="contact" href="?content=contact"  <?php if($_GET['content']=='contact'){ echo "class='btn btn-primary btn-menu'";}else{ echo "class='btn btn-warning btn-menu'";} ?> >ติดต่อเรา / Contact Us</a> 
        <a title="contact_user" href="?content=contact_user" <?php if($_GET['content']=='contact_user'){ echo "class='btn btn-primary btn-menu'";}else{ echo "class='btn btn-warning btn-menu'";} ?>>ข้อมูลผูติดต่อ / Contact user  </a>
    </div>
</div>

<form role="form" method="post" onsubmit="return check();" action="index.php?content=contact&action=edit_header" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label>รูปภาพ พื้นหลัง ขนาดรูปที่แนะนำ 250*1600 px<font color=""><font></label>
                    <div>
                        <img id="img_back" src="../img_upload/contact/<?php if($contact['contact_header_img'] != "") echo $contact['contact_header_img']; else echo "default.png"; ?>" class="img-responsive img-size" style = "height: 14vw; width: 100%;"> 
                        <input accept=".jpg , .png" type="file" id="contact_header_img" name="contact_header_img" class="form-control" style="margin: 14px 0 0 0 ; width: 300px;" onChange="readURL(this);">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Header TH <font color="#F00"><b>*</b></font></label>
                    <input id="contact_header_title_th" name="contact_header_title_th" class="form-control"  value="<?php echo $contact['contact_header_title_th']?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Header EN <font color="#F00"><b>*</b></font></label>
                    <input id="contact_header_title_en" name="contact_header_title_en" class="form-control"  value="<?php echo $contact['contact_header_title_en']?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>ADDRESS TH<font color="#F00"><b>*</b></font></label>
                    <textarea style="width:100%;" rows="8" name="contact_body_address_th" id="contact_body_address_th" class="ckeditor"><?php echo $contact['contact_body_address_th']?></textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace('contact_body_address_th',{
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
                    <label>ADDRESS EN<font color="#F00"><b>*</b></font></label>
                    <textarea style="width:100%;" rows="8" name="contact_body_address_en" id="contact_body_address_en" class="ckeditor"><?php echo $contact['contact_body_address_en']?></textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace('contact_body_address_en',{
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
                    <label>EMAIL TH<font color="#F00"><b>*</b></font></label>
                    <textarea style="width:100%;" rows="8" name="contact_body_email_th" id="contact_body_email_th" class="ckeditor"><?php echo $contact['contact_body_email_th']?></textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace('contact_body_email_th',{
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
                    <label>EMAIL EN<font color="#F00"><b>*</b></font></label>
                    <textarea style="width:100%;" rows="8" name="contact_body_email_en" id="contact_body_email_en" class="ckeditor"><?php echo $contact['contact_body_email_en']?></textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace('contact_body_email_en',{
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
                    <label>WORKING TIME TH<font color="#F00"><b>*</b></font></label>
                    <textarea style="width:100%;" rows="8" name="contact_body_time_th" id="contact_body_time_th" class="ckeditor"><?php echo $contact['contact_body_time_th']?></textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace('contact_body_time_th',{
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
                    <label>WORKING TIME EN<font color="#F00"><b>*</b></font></label>
                    <textarea style="width:100%;" rows="8" name="contact_body_time_en" id="contact_body_time_en" class="ckeditor"><?php echo $contact['contact_body_time_en']?></textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace('contact_body_time_en',{
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
                    <label>Email สำหรับรับข้อความ<font color="#F00"><b>*</b></font></label>
                    <input id="contact_email" name="contact_email" class="form-control"  value="<?php echo $contact['contact_email']?>">
                </div>
            </div>
            <div class="col-lg-6">

            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>title<font color=""><b>*</b></font></label>
                    <input id="title" name="title" class="form-control"  value="<?php echo $description['title']?>">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>keyword<font color=""><b>*</b></font></label>
                    <input id="keyword" name="keyword" class="form-control"  value="<?php echo $description['keyword']?>">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>description<font color=""><b>*</b></font></label>
                    <input id="description" name="description" class="form-control"  value="<?php echo $description['description']?>">
                </div>
            </div>
        </div>
        <div align="right">
            <input type="hidden" id="contact_header_img_o" name="contact_header_img_o" class="form-control" value="<?php echo $contact['contact_header_img']?>">
            <input type="hidden" id="contact_body_id" name="contact_body_id" value="<?php echo $contact['contact_body_id'] ?>" />
            <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
            <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
        </div>
    </form>
