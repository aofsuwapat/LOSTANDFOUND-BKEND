    <script>

        function check(){

            var slide_title_th = document.getElementById("slide_title_th").value;
            var slide_detail_th = document.getElementById("slide_detail_th").value;
            var slide_title_en = document.getElementById("slide_title_en").value;
            var slide_detail_en = document.getElementById("slide_detail_en").value;
            var slide_link = document.getElementById("slide_link").value;

            slide_title_th = $.trim(slide_title_th);
            slide_detail_th = $.trim(slide_detail_th);
            slide_title_en = $.trim(slide_title_en);
            slide_detail_en = $.trim(slide_detail_en);

            if(slide_title_th.length == 0){
                alert("กรุณากรอกหัวข้อสไลด์");
                document.getElementById("slide_title_th").focus();
                return false;
            }else if(slide_detail_th.length == 0){
                alert("กรุณากรอกรายละเอียด");
                document.getElementById("slide_detail_th").focus();
                return false;
            }else if(slide_title_en.length == 0){
                alert("กรุณากรอกหัวข้อสไลด์");
                document.getElementById("slide_title_en").focus();
                return false;
            }else if(slide_detail_en.length == 0){
                alert("กรุณากรอกรายละเอียด");
                document.getElementById("slide_detail_en").focus();
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
            $('#img_back').attr('src', '../img_upload/about_header/default.png');

        }
    }
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#img_pj_back').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }else{
           $('#img_pj_back').attr('src', '../img_upload/about_project/default.png');
       }
   }
</script>   
<!-- <? print_r('csadsafsa',$home_customer_detail); ?> -->

<div class="row">
    <div class="col-lg-4">
        <h1>จัดการAbout Us</h1>
        <h2>เพิ่ม ลบ เเก้ไขAbout Us</h2>
    </div>
    <div class="col-lg-8" align="right">

        <a title="about" href="?content=about"  <?php if($_GET['content']=='about'){ echo "class='btn btn-primary btn-menu'";}else{ echo "class='btn btn-warning btn-menu'";} ?> >เกี่ยวกับเรา / About Us</a> 
        <a title="about_award" href="?content=about_award" <?php if($_GET['content']=='about_award'){ echo "class='btn btn-primary btn-menu'";}else{ echo "class='btn btn-warning btn-menu'";} ?> >รางวัล / Award  </a>
        <a title="about_why" href="?content=about_why" <?php if($_GET['content']=='about_why'){ echo "class='btn btn-primary btn-menu'";}else{ echo "class='btn btn-warning btn-menu'";} ?> > Why choose us </a>  

    </div>

</div>

<form role="form" method="post" onsubmit="return check();" action="index.php?content=about&action=edit_header" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label>รูปภาพ พื้นหลัง ขนาดรูปที่แนะนำ 250*1600 px<font color=""><font></label>
                    <div>
                        <img id="img_back" src="../img_upload/about_header/<?php if($detail['about_header_img'] != "") echo $detail['about_header_img']; else echo "default.png"; ?>" class="img-responsive img-size" style = "height: 14vw; width: 100%;"> 
                        <input accept=".jpg , .png" type="file" id="about_header_img" name="about_header_img" class="form-control" style="margin: 14px 0 0 0 ; width: 300px;" onChange="readURL(this);">
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label>รูปภาพ พื้นหลัง Project ขนาดรูปที่แนะนำ 250*1600 px<font color=""><font></label>
                        <div>
                            <img id="img_pj_back" src="../img_upload/about_project/<?php if($detail['project_img'] != "") echo $detail['project_img']; else echo "default.png"; ?>" class="img-responsive img-size" style = "height: 14vw; width: 100%;"> 
                            <input accept=".jpg , .png" type="file" id="project_img" name="project_img" class="form-control" style="margin: 14px 0 0 0 ; width: 300px;" onChange="readURL2(this);">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Header TH <font ><bcolor="">*</b></font></label>
                        <input id="about_header_title_th" name="about_header_title_th" class="form-control"  value="<?php echo $detail['about_header_title_th']?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Header EN <font color=""><b>*</b></font></label>
                        <input id="about_header_title_en" name="about_header_title_en" class="form-control"  value="<?php echo $detail['about_header_title_en']?>">
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
                <input type="hidden" id="about_header_img_o" name="about_header_img_o" class="form-control" value="<?php echo $detail['about_header_img']?>">
                <input type="hidden" id="project_img_o" name="project_img_o" class="form-control" value="<?php echo $detail['project_img']?>">
                <input type="hidden" id="about_header_id" name="about_header_id" value="<?php echo $detail['about_header_id'] ?>" />
                <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
                <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
            </div>
        </form>
        <hr style="border-bottom: 100%;">
        <div align=right>            </div>

        <table>
            <thead>
                <tr>
                    <th width="12px">#</th>
                    <th width="200px">Header TH</th>
                    <th width="200px">Header EN</th>
                    <th width="150px">Detail Header TH</th>
                    <th width="150px">Detail Header EN</th>
                    <th width="50px">เเก้ไข</th>
                </tr>
            </thead>
            <tbody>

                <?php for($i=0; $i < count($about_detail); $i++){ ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $about_detail[$i]['detail_title_th']; ?></td>
                        <td><?php echo $about_detail[$i]['detail_title_en']; ?></td>
                        <td><?php echo $about_detail[$i]['detail_th']; ?></td>
                        <td><?php echo $about_detail[$i]['detail_en']; ?></td>
                        <td width="50px">
                            <a href="?content=about&action=update&id=<?php echo $about_detail[$i]['detail_id'];?>" style="font-size: 20px;">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a> 
                            
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>