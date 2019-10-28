

<script type="text/javascript">
	function check(){

		var type_id = document.getElementById("type_id").value;
		var news_name_th = document.getElementById("news_name_th").value;
		var news_name_en = document.getElementById("news_name_en").value;


		type_id = $.trim(type_id);
		news_name_en = $.trim(news_name_en);
		news_name_th = $.trim(news_name_th);

		if(type_id.length == 0){
			alert("กรุณาเลือก ประเภท");
			document.getElementById("type_id").focus();
			return false;
		}else if(news_name_th.length == 0){
			alert("กรุณากรอกชื่อ TH");
			document.getElementById("news_name_th").focus();
			return false;
		}else if(news_name_en.length == 0){
			alert("กรุณากรอกชื่อ EN");
			document.getElementById("news_name_en").focus();
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
			$('#img_back').attr('src', '../img_upload/news/default.png');
		}
	}
</script>


<h1>แก้ไขข่าวสาร</h1>

<hr>

<form role="form" method="post" onsubmit="return check();" action="index.php?content=news&action=edit" enctype="multipart/form-data">
<input type="hidden" name="news_id" value="<?php echo $_GET['id']?>">
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label>รูปภาพข่าว<font color="#F00"></font></label>
				<div>
					<img id="img_back" src="../img_upload/news/<?php echo $news_detail['news_img']?> " class="img-responsive img-size"  style = "height: 300px; width: 500px;"> 
					<input accept=".jpg , .png" type="file" id="news_img" name="news_img" class="form-control" style="margin: 14px 0 0 0 ; width: 300px;" onChange="readURL(this);">
				</div>
			</div>
		</div>
	</div>
	
		<div class="col-lg-6">
			<div class="form-group">
				<label>ชื่อข่าว<font color="#F00"></font></label>
				<input id="news_name" name="news_name" class="form-control" value="<?php echo $news_detail['news_name']?>">
			</div>
		</div>
		
		<div class="col-lg-6">
			<div class="form-group">
				<label>Description<font color="#F00"></font></label>
				<textarea style="width:100%;" rows="5" name="news_description" id="news_description" ><?php echo $news_detail['news_description']?></textarea>
			</div>
		</div>
		
		<!-- <div class="col-lg-6">
			<div class="form-group">
				<label>Detail<font color="#F00"></font></label>
				<textarea style="width:100%;" rows="8" name="news_detail" id="news_detail" class="ckeditor"><?php echo $news_detail['news_detail']?></textarea>
			</div>
		</div> -->
		
	<div align="right">
		<input type="hidden" id="news_img_o" name="news_img_o" class="form-control" value="<?php echo $news_detail['news_img']?>">
		<input type="hidden" id="news_id" name="news_id" value="<?php echo $news_detail['news_id'] ?>" />
		<button type="button" class="btn btn-default" onclick="window.location='?content=news';" >ย้อนกลับ</button>		
		<button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
		<button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
	</div>

</form>