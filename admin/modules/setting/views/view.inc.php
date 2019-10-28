 <!-- <script type="text/javascript" src="../template/backend/ckeditor/ckeditor.js"></script> -->
 <script type="text/javascript" src="../template/ckeditor/ckeditor.js"></script>
 <script>
 </script>

 <h1>ตั้งค่า Header</h1>
 <div align="right">

 </div>

 <form role="form" method="post" action="index.php?content=setting&action=edit" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label>Tell</label>
                <input id="setting_header_tell" name="setting_header_tell" class="form-control"  value="<?php echo $setting['setting_header_tell']?>">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label>Location TH</label>
                <input id="setting_header_location_th" name="setting_header_location_th" class="form-control"  value="<?php echo $setting['setting_header_location_th']?>">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label>Location EN</label>
                <input id="setting_header_location_en" name="setting_header_location_en" class="form-control"  value="<?php echo $setting['setting_header_location_en']?>">
            </div>
        </div>

    </div>            

    <br>
    <hr>
    <h1>ตั้งค่า Footer</h1>
    <br>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Call Us Now<font color="#F00"><b>*</b></font></label>
                <textarea style="width:100%;" name="setting_footer_call" id="setting_footer_call" class="ckeditor"><?php echo $setting['setting_footer_call']?></textarea>
                <script type="text/javascript">
                    CKEDITOR.replace('setting_footer_call',{
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
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>COME VISIT US TH<font color="#F00"><b>*</b></font></label>
                <textarea style="width:100%;" name="setting_footer_come_th" id="setting_footer_come_th" class="ckeditor"><?php echo $setting['setting_footer_come_th']?></textarea>
                <script type="text/javascript">
                    CKEDITOR.replace('setting_footer_come_th',{
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
                <label>COME VISIT US EN<font color="#F00"><b>*</b></font></label>
                <textarea style="width:100%;" name="setting_footer_come_en" id="setting_footer_come_en" class="ckeditor"><?php echo $setting['setting_footer_come_en']?></textarea>
                <script type="text/javascript">
                    CKEDITOR.replace('setting_footer_come_en',{
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
                <label>SEND A MESSENGE TH<font color="#F00"><b>*</b></font></label>
                <textarea style="width:100%;" name="setting_footer_send_th" id="setting_footer_send_th" class="ckeditor"><?php echo $setting['setting_footer_send_th']?></textarea>
                <script type="text/javascript">
                    CKEDITOR.replace('setting_footer_send_th',{
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
                <label>SEND A MESSENGE EN<font color="#F00"><b>*</b></font></label>
                <textarea style="width:100%;" name="setting_footer_send_en" id="setting_footer_send_en" class="ckeditor"><?php echo $setting['setting_footer_send_en']?></textarea>
                <script type="text/javascript">
                    CKEDITOR.replace('setting_footer_send_en',{
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
                <label>Hours work TH<font color="#F00"><b>*</b></font></label>
                <textarea style="width:100%;" name="setting_footer_hours_th" id="setting_footer_hours_th" class="ckeditor"><?php echo $setting['setting_footer_hours_th']?></textarea>
                <script type="text/javascript">
                    CKEDITOR.replace('setting_footer_hours_th',{
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
                <label>Hours work EN<font color="#F00"><b>*</b></font></label>
                <textarea style="width:100%;" name="setting_footer_hours_en" id="setting_footer_hours_en" class="ckeditor"><?php echo $setting['setting_footer_hours_en']?></textarea>
                <script type="text/javascript">
                    CKEDITOR.replace('setting_footer_hours_en',{
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
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>FACEBOOK URL </label>
                <input id="setting_footer_url_face" name="setting_footer_url_face" class="form-control" value="<?php echo $setting['setting_footer_url_face']?>">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Youtube</label>
                <input id="setting_footer_youtube" name="setting_footer_youtube" class="form-control" value="<?php echo $setting['setting_footer_youtube']?>">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>TWITTER</label>
                <input id="setting_footer_twitter" name="setting_footer_twitter" class="form-control" value="<?php echo $setting['setting_footer_twitter']?>">
            </div>
        </div>
    </div>            

    <div align="right">
        <input type="hidden" id="setting_header_id" name="setting_header_id" class="form-control" value="<?php echo $setting['setting_header_id']?>">
        <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
        <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
    </div>
</form>

