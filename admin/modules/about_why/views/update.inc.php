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
        $('#img_icon').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
}else{
   $('#img_icon').attr('src', '../img_upload/about_why/default.png');
}
}
</script>

<h1>เเก้ไข Why choose us</h1>
<div align="right">

</div>

<form role="form" method="post" onsubmit="return check();" action="index.php?content=about_why&action=edit" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <label>รูป icon <font color="#F00"><font></label>
                    <div>
                        <img id="img_icon" src="../img_upload/about_why/<?php if($about_why['why_icon'] != "") echo $about_why['why_icon']; else echo "default.png"; ?>" class="img-responsive img-size" style="border-radius: 50%!important; "> 
                        <input accept=".jpg , .png" type="file" id="why_icon" name="why_icon" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this);">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Header TH <font color="#F00"><b>*</b></font></label>
                    <input id="why_title_th" name="why_title_th" class="form-control"  value="<?php echo $about_why['why_title_th']?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Header EN <font color="#F00"><b>*</b></font></label>
                    <input id="why_title_en" name="why_title_en" class="form-control"  value="<?php echo $about_why['why_title_en']?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Detail TH<font color="#F00"><b>*</b></font></label>
                    <textarea id="why_detail_th" name="why_detail_th" class="form-control" style="min-height: 200px;"><?php echo $about_why['why_detail_th']?></textarea>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Detail EN<font color="#F00"><b>*</b></font></label>
                    <textarea id="why_detail_en" name="why_detail_en" class="form-control" style="min-height: 200px;"><?php echo $about_why['why_detail_en']?></textarea>
                </div>
            </div> 
        </div>
        <div align="right">
            <input type="hidden" id="why_icon_o" name="why_icon_o" class="form-control" value="<?php echo $about_why['why_icon']?>">
            <input type="hidden" id="why_id" name="why_id" value="<?php echo $about_why['why_id'] ?>" />
            <button type="button" class="btn btn-default" onclick="window.location='?content=about_why';">ย้อนกลับ</button>
            <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
            <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
        </div>
    </form>