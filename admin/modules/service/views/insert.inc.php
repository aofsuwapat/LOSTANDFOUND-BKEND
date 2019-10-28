 <!-- <script type="text/javascript" src="../template/backend/ckeditor/ckeditor.js"></script> -->
 <script type="text/javascript" src="../template/ckeditor/ckeditor.js"></script>

 <script>
   function check(){

    var service_body_name_th = document.getElementById("service_body_name_th").value;
    var service_body_name_en = document.getElementById("service_body_name_en").value;
    var service_body_description_th = document.getElementById("service_body_description_th").value;
    var service_body_description_en = document.getElementById("service_body_description_en").value;
    var service_body_detail_th = document.getElementById("service_body_detail_th").value;
    var service_body_detail_en = document.getElementById("service_body_detail_en").value;

    service_body_name_th = $.trim(service_body_name_th);
    service_body_name_en = $.trim(service_body_name_en);
    service_body_description_th = $.trim(service_body_description_th);
    service_body_description_en = $.trim(service_body_description_en);
    service_body_detail_th = $.trim(service_body_detail_th);
    service_body_detail_en = $.trim(service_body_detail_en);

    if(service_body_name_th.length == 0){
     alert("กรุณากรอก Header TH");
     document.getElementById("service_body_name_th").focus();
     return false;
   }else if(service_body_description_th.length == 0){
     alert("กรุณากรอก Description TH");
     document.getElementById("service_body_description_th").focus();
     return false;
   }else if(service_body_name_en.length == 0){
     alert("กรุณากรอก Header EN");
     document.getElementById("service_body_name_en").focus();
     return false;
   }else if(service_body_description_en.length == 0){
     alert("กรุณากรอก Description EN");
     document.getElementById("service_body_description_en").focus();
     return false;
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
    $('#img_back').attr('src', '../img_upload/service_back/default.png');
  }
}
function readURL2(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#img_service').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }else{
    $('#img_service').attr('src', '../img_upload/service_detail/default.png');
  }
}
</script>

<h1>เพิ่มService</h1>
<div align="right">

</div>

<form role="form" method="post" onsubmit="return check();" action="index.php?content=service&action=add" enctype="multipart/form-data">
  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <label>รูปภาพ พื้นหลัง Header <font color="#F00"></font></label>
        <div>
          <img id="img_back" src="../img_upload/service_back/default.png" class="img-responsive img-size"  style = "height: 300px; width: 500px;"> 
          <input accept=".jpg , .png" type="file" id="service_body_header_img" name="service_body_header_img" class="form-control" style="margin: 14px 0 0 0 ; width: 300px;" onChange="readURL(this);">
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group">
        <label>รูปภาพ Service <font color="#F00"></font></label>
        <div>
          <img id="img_service" src="../img_upload/service_detail/default.png" class="img-responsive img-size"  style = "height: 300px; width: 500px;"> 
          <input accept=".jpg , .png" type="file" id="service_body_img" name="service_body_img" class="form-control" style="margin: 14px 0 0 0 ; width: 300px;" onChange="readURL2(this);">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <label>Header TH <font color="#F00"><b>*</b></font></label>
        <input id="service_body_name_th" name="service_body_name_th" class="form-control" maxlength="150">
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group">
        <label>Header EN <font color="#F00"><b>*</b></font></label>
        <input id="service_body_name_en" name="service_body_name_en" class="form-control" maxlength="150">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <label>Description TH <font color="#F00"><b>*</b></font></label>
        <textarea id="service_body_description_th" name="service_body_description_th" class="form-control" style="min-height: 120px;"></textarea>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="form-group">
        <label>Description EN <font color="#F00"><b>*</b></font></label>
        <textarea id="service_body_description_en" name="service_body_description_en" class="form-control" style="min-height: 120px;"></textarea>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <label>Detail TH<font color="#F00"><b>*</b></font></label>
        <textarea style="width:100%;" name="service_body_detail_th" id="service_body_detail_th" class="ckeditor"></textarea>
        <script type="text/javascript">
          CKEDITOR.replace('service_body_detail_th',{
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
        <textarea style="width:100%;" name="service_body_detail_en" id="service_body_detail_en" class="ckeditor"></textarea>
        <script type="text/javascript">
          CKEDITOR.replace('service_body_detail_en',{
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
    <button type="button" class="btn btn-default" onclick="window.location='?content=service';" >ย้อนกลับ</button>
    <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
    <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
  </div>
</form>
