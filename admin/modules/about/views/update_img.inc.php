<script>
    function check(){

        // var slide_title_th = document.getElementById("slide_title_th").value;
        // var slide_detail_th = document.getElementById("slide_detail_th").value;
        // var slide_title_en = document.getElementById("slide_title_en").value;
        // var slide_detail_en = document.getElementById("slide_detail_en").value;
        // var slide_link = document.getElementById("slide_link").value;

        // slide_title_th = $.trim(slide_title_th);
        // slide_detail_th = $.trim(slide_detail_th);
        // slide_title_en = $.trim(slide_title_en);
        // slide_detail_en = $.trim(slide_detail_en);

        // if(slide_title_th.length == 0){
        //     alert("กรุณากรอกหัวข้อสไลด์");
        //     document.getElementById("slide_title_th").focus();
        //     return false;
        // }else if(slide_detail_th.length == 0){
        //     alert("กรุณากรอกรายละเอียด");
        //     document.getElementById("slide_detail_th").focus();
        //     return false;
        // }else if(slide_title_en.length == 0){
        //     alert("กรุณากรอกหัวข้อสไลด์");
        //     document.getElementById("slide_title_en").focus();
        //     return false;
        // }else if(slide_detail_en.length == 0){
        //     alert("กรุณากรอกรายละเอียด");
        //     document.getElementById("slide_detail_en").focus();
        //     return false;
        // }else if(slide_link.length == 0){
        //     // alert("กรุณากรอก Read More Link");
        //     // document.getElementById("slide_link").focus();
        //     // return false;
        // }else{
        //     return true;
        // }
    }

    function readURL(input) {
      if (input.files && input.files[0]) {
       var reader = new FileReader();
       reader.onload = function(e) {
        $('#img_detail').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
}else{
   $('#img_detail').attr('src', '../img_upload/about_img/default.png');
}
}
</script>

<h1>แก้ไขรูป About Us</h1>
<div align="right">

</div>

<form role="form" method="post" onsubmit="return check();" action="index.php?content=about&action=edit_img" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <label>รูปภาพ <font color="#F00"></font></label>
                <div>
                    <img id="img_detail" src="../img_upload/about_img/<?php if($about_img['about_img'] != "") echo $about_img['about_img']; else echo "default.png"; ?>" class="img-responsive img-size"> 
                    <input accept=".jpg , .png" type="file" id="about_img" name="about_img" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this);">
                </div>
            </div>
        </div>
    </div>
    <div align="right">
        <input type="hidden" id="about_img_o" name="about_img_o" class="form-control" value="<?php echo $about_img['about_img']?>">
        <input type="hidden" id="about_img_id" name="about_img_id" value="<?php echo $about_img['about_img_id'] ?>" />
        <input type="hidden" id="about_detail_id" name="about_detail_id" value="<?php echo $about_img['about_detail_id'] ?>" />
        <button type="button" class="btn btn-default" onclick="window.history.back();">ย้อนกลับ</button>
        <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
        <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
    </div>
</form>