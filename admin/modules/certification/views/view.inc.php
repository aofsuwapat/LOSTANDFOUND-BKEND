    <!-- <script type="text/javascript" src="../template/backend/ckeditor/ckeditor.js"></script> -->
    <!-- <script type="text/javascript" src="../template/ckeditor/ckeditor.js"></script> -->

    <!-- <script type="text/javascript" src="//cdn.ckeditor.com/4.4.0/standard/ckeditor.js"></script> -->
    <script>

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img_back').attr('src', e.target.result);

                }
                reader.readAsDataURL(input.files[0]);
            }else{
                $('#img_back').attr('src', '../img_upload/header_project/default.png');

            }
        }
    </script>   
    <!-- <? print_r('csadsafsa',$home_customer_detail); ?> -->

    <div class="row">
        <div class="col-lg-4">
            <h1>จัดการ Certification</h1>
            <h2>เเก้ไข Certification</h2>
        </div>

    </div>

    <form role="form" method="post" onsubmit="return check();" action="index.php?content=certification&action=edit" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label>รูปภาพ พื้นหลัง ขนาดรูปที่แนะนำ 250*1600 px<font color=""><font></label>
                        <div>
                            <img id="img_back" src="../img_upload/certification/<?php if($certification['certification_img'] != "") echo $certification['certification_img']; else echo "default.png"; ?>" class="img-responsive img-size" style = "height: 14vw; width: 100%;"> 
                            <input accept=".jpg , .png" type="file" id="certification_img" name="certification_img" class="form-control" style="margin: 14px 0 0 0 ; width: 300px;" onChange="readURL(this);">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Header TH <font ><bcolor="">*</b></font></label>
                        <input id="certification_title_th" name="certification_title_th" class="form-control"  value="<?php echo $certification['certification_title_th']?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Header EN <font color=""><b>*</b></font></label>
                        <input id="certification_title_en" name="certification_title_en" class="form-control"  value="<?php echo $certification['certification_title_en']?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Detail TH<font color="#F00"><b>*</b></font></label>
                        <textarea id="certification_detail_th" name="certification_detail_th"><?php echo $certification['certification_detail_th']?></textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace('certification_detail_th',{
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
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Detail EN<font color="#F00"><b>*</b></font></label>
                        <textarea id="certification_detail_en" name="certification_detail_en"><?php echo $certification['certification_detail_en']?></textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace('certification_detail_en',{
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
                <input type="hidden" id="certification_img_o" name="certification_img_o" class="form-control" value="<?php echo $certification['certification_img']?>">
                <input type="hidden" id="certification_id" name="certification_id" value="<?php echo $certification['certification_id'] ?>" />
                <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
                <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
            </div>
        </form>