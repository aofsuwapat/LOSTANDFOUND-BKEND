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

 function readURL(input, name) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#'+name).attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}else{
			$('#'+name).attr('src', '../img_upload/category/default.png');
		}
	}
</script>

<h1>แก้ไขหมวดหมู่</h1>
<div align="right">
</div>
<form role="form" method="post" onsubmit="return check();" action="index.php?content=category&action=edit" enctype="multipart/form-data">
<input type="hidden" name="category_id" value="<?php echo $_GET['id']?>">
<input type="hidden" name="category_img" value="<?php echo $category['category_img']?>">
<input type="hidden" name="found_pin" value="<?php echo $category['found_pin']?>">
<input type="hidden" name="lost_pin" value="<?php echo $category['lost_pin']?>">
  <div class="row">
    <div class="col-lg-3">
      <div class="form-group">
        <label>ชื่อหมวดหมู่<font color="#F00"><b>*</b></font></label>
        <input id="category_name" name="category_name" class="form-control" maxlength="150" value="<?php echo $category['category_name']?>">
      </div>
    </div>
  </div>

	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label>รูปภาพหมวดหมู่<font color="#F00"></font></label>
				<div>
					<img id="img_back" src="../img_upload/category/<?php echo $category['category_img']?> " class="img-responsive img-size"  style = "height: 300px; width: 500px;"> 
					<input accept=".jpg , .png" type="file" id="category_img" name="category_img" class="form-control" style="margin: 14px 0 0 0 ; width: 300px;" onChange="readURL(this,'img_back');">
				</div>
			</div>
		</div>
	</div>


  <div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label>ไอคอนเจอของ<font color="#F00"></font></label>
				<div>
					<img id="img_found_pin" src="../img_upload/category/<?php echo $category['found_pin']?> " class="img-responsive img-size"  style = "height: 300px; width: 500px;"> 
					<input accept=".jpg , .png" type="file" id="found_pin" name="found_pin" class="form-control" style="margin: 14px 0 0 0 ; width: 300px;" onChange="readURL(this,'img_found_pin');">
				</div>
			</div>
		</div>
	</div>

  <div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label>ไอคอนของหาย<font color="#F00"></font></label>
				<div>
					<img id="img_lost_pin" src="../img_upload/category/<?php echo $category['lost_pin']?> " class="img-responsive img-size"  style = "height: 300px; width: 500px;"> 
					<input accept=".jpg , .png" type="file" id="lost_pin" name="lost_pin" class="form-control" style="margin: 14px 0 0 0 ; width: 300px;" onChange="readURL(this,'img_lost_pin');">
				</div>
			</div>
		</div>
	</div>

  <div align="right">
    <input type="hidden" id="type_id" name="type_id" value="<?php echo $category['category_id'] ?>" />
    <button type="button" class="btn btn-default" onclick="window.location='?content=category';" >ย้อนกลับ</button>
    <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
    <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
  </div>
</form>
