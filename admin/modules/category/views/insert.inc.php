 <script type="text/javascript" src="../template/backend/ckeditor/ckeditor.js"></script>
 <script>
   function check(){
     
    var category_name = document.getElementById("category_name").value;

		category_id = $.trim(category_id);
    category_name = $.trim(category_name);
   

    if(type_name_th.length == 0){
     alert("กรุณากรอก Projcet type TH");
     document.getElementById("type_name_th").focus();
     return false;
   }else if(type_name_en.length == 0){
     alert("กรุณากรอก Projcet type EN");
     document.getElementById("type_name_en").focus();
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
			$('#img_back').attr('src', '../img_upload/category/default.png');
		}
	}

</script>

<h1>เพิ่มหมวดหมู่</h1>
<div align="right">

</div>

<form role="form" method="post" onsubmit="return check();" action="index.php?content=category&action=add" enctype="multipart/form-data">
  
  <div class="row">
    <div class="col-lg-3">
      <div class="form-group">
        <label>ชื่อหมวดหมู่<font color="#F00"><b>*</b></font></label>
        <input id="category_name" name="category_name" class="form-control" maxlength="150">
      </div>
    </div> 
  </div>

	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label>รูปภาพหมวดหมู่<font color="#F00"></font></label>
				<div>
					<img id="img_back" src="../img_upload/category/default.png" class="img-responsive img-size"  style = "height: 300px; width: 500px;"> 
					<input accept=".jpg , .png" type="file" id="category_img" name="category_img" class="form-control" style="margin: 14px 0 0 0 ; width: 300px;" onChange="readURL(this);">
				</div>
			</div>
		</div>
	</div>


  <div align="right">
    <button type="button" class="btn btn-default" onclick="window.location='?content=category';" >ย้อนกลับ</button>
    <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
    <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
  </div>
</form>
