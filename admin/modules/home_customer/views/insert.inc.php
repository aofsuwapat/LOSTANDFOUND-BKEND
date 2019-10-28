<script>
    function check(){
    }

    function readURL(input) {
      if (input.files && input.files[0]) {
         var reader = new FileReader();
         reader.onload = function(e) {
            $('#img_icon').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }else{
     $('#img_icon').attr('src', '../img_upload/home_customer_img/default.png');
 }
}
</script>

<h1>เพิ่มรูปลูกค้า</h1>
<div align="right">

</div>

<form role="form" method="post" onsubmit="return check();" action="index.php?content=home_customer&action=add" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <label>รูปภาพ <font color="#F00"></font></label>
                <div>
                    <img id="img_icon" src="../img_upload/home_customer_img/default.png" class="img-responsive img-size"> 
                    <input accept=".jpg , .png" type="file" id="customer_img_icon" name="customer_img_icon" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this);">
                </div>
            </div>
        </div>
    </div>
    <div align="right">
        <button type="button" class="btn btn-default" onclick="window.location='?content=home_customer';">ย้อนกลับ</button>
        <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
        <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
    </div>
</form>