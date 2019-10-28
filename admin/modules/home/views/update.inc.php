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
        $('#img_slide').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
}else{
   $('#img_slide').attr('src', '../img_upload/home_slide/default.png');
}
}
</script>

<h1>เเก้ไขสไลด์</h1>
<div align="right">

</div>

<form role="form" method="post" onsubmit="return check();" action="index.php?content=home&action=edit" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <label>รูปภาพ <font color=""><font></label>
                    <div>
                        <img id="img_slide" src="../img_upload/home_slide/<?php if($home_slide['slide_img'] != "") echo $home_slide['slide_img']; else echo "default.png"; ?>" class="img-responsive img-size"> 
                        <input accept=".jpg , .png" type="file" id="slide_img" name="slide_img" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this);">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Header TH <font color=""><b>*</b></font></label>
                    <input id="slide_title_th" name="slide_title_th" class="form-control"  value="<?php echo $home_slide['slide_title_th']?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Header EN <font color=""><b>*</b></font></label>
                    <input id="slide_title_en" name="slide_title_en" class="form-control"  value="<?php echo $home_slide['slide_title_en']?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Detail TH<font color=""><b>*</b></font></label>
                    <textarea id="slide_detail_th" name="slide_detail_th" class="form-control" style="min-height: 200px;"><?php echo $home_slide['slide_detail_th']?></textarea>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Detail EN<font color=""><b>*</b></font></label>
                    <textarea id="slide_detail_en" name="slide_detail_en" class="form-control" style="min-height: 200px;"><?php echo $home_slide['slide_detail_en']?></textarea>
                </div>
            </div> 
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Read More Link <font color=""><b>*</b></font></label>
                    <input id="slide_link" name="slide_link" class="form-control" value="<?php echo $home_slide['slide_link']?>">
                </div>
            </div>
        </div>
        <div align="right">
            <input type="hidden" id="slide_img_o" name="slide_img_o" class="form-control" value="<?php echo $home_slide['slide_img']?>">
            <input type="hidden" id="slide_id" name="slide_id" value="<?php echo $home_slide['slide_id'] ?>" />
            <button type="button" class="btn btn-default" onclick="window.location='?content=home';">ย้อนกลับ</button>
            <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
            <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
        </div>
    </form>