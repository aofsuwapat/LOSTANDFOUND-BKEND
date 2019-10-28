<script type="text/javascript">
	function check(){

		// var type_id = document.getElementById("type_id").value;
		// var news_name_th = document.getElementById("news_name_th").value;
		var news_name = document.getElementById("news_name").value;


		type_id = $.trim(type_id);
		news_name = $.trim(news_name);
		// news_name_th = $.trim(news_name_th);

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


<h1>เพิ่มข่าวสาร</h1>

<hr>

<form role="form" method="post" onsubmit="return check();" action="index.php?content=news&action=add" enctype="multipart/form-data">
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label>รูปภาพข่าว<font color="#F00"></font></label>
				<div>
					<img id="img_back" src="../img_upload/news/default.png" class="img-responsive img-size"  style = "height: 300px; width: 500px;"> 
					<input accept=".jpg , .png" type="file" id="news_img" name="news_img" class="form-control" style="margin: 14px 0 0 0 ; width: 300px;" onChange="readURL(this);">
				</div>
			</div>
		</div>
	</div>
	
		<div class="col-lg-6">
			<div class="form-group">
				<label>ชื่อข่าว<font color="#F00"></font></label>
				<input id="news_name" name="news_name" class="form-control">
			</div>
		</div>
		
		<div class="col-lg-6">
			<div class="form-group">
				<label>Description<font color="#F00"></font></label>
				<textarea style="width:100%;" rows="5" name="news_description" id="news_description" ></textarea>
			</div>
		</div>
		
		<!-- <div class="col-lg-6">
			<div class="form-group">
				<label>Detail<font color="#F00"></font></label>
				<textarea style="width:100%;" rows="8" name="news_detail" id="news_detail" class="ckeditor"></textarea>
			</div>
		</div> -->
		
	
	<div align="right">
		<button type="button" class="btn btn-default" onclick="window.location='?content=news';" >ย้อนกลับ</button>
		<button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
		<button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
	</div>

</form>
