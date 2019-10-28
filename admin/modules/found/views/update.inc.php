

<script type="text/javascript">
	function check(){

		var found_id = document.getElementById("found_id").value;
		var found_topic = document.getElementById("found_topic").value;
		// var found_name_en = document.getElementById("found_name_en").value;


		found_id = $.trim(found_id);
		found_topic = $.trim(found_topic);
		// found_name_th = $.trim(found_name_th);

		if(type_id.length == 0){
			alert("กรุณาเลือก ประเภท");
			document.getElementById("type_id").focus();
			return false;
		}else if(found_name_th.length == 0){
			alert("กรุณากรอกชื่อ TH");
			document.getElementById("found_name_th").focus();
			return false;
		}else if(found_name_en.length == 0){
			alert("กรุณากรอกชื่อ EN");
			document.getElementById("found_name_en").focus();
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
			$('#img_back').attr('src', '../img_upload/found/default.png');
		}
	}
</script>


<h1>แก้ไขเจอของ</h1>

<hr>

<form role="form" method="post" onsubmit="return check();" action="index.php?content=found&action=edit" enctype="multipart/form-data">
<input type="hidden" name="found_id" value="<?php echo $_GET['id']?>">

		<div class="col-lg-6">
			<div class="form-group">
				<label>หัวข้อ<font color="#F00"></font></label>
				<input id="found_topic" name="found_topic" class="form-control" value="<?php echo $found_detail['found_topic']?>">
			</div>
		</div>

		<div class="col-lg-6">
			<div class="form-group">
				<label>ชนิด<font color="#F00"></font></label>
				<select id="found_type" name="found_type" class="form-control">
				<?php for ($i=0; $i<count($category); $i++) {?>
					<option value="<?php echo $category[$i]['category_id']; ?>" <?php if($found_detail['found_type']==$category[$i]['category_id']) echo "selected" ?> ><?php echo $category[$i]['category_name']; ?></option>
				
				<?php
                }

                ?>
				
				</select>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="form-group">
				<label>รูปภาพข่าว<font color="#F00"></font></label>
				<div>
					<img id="img_back" src="../img_upload/found/<?php echo $found_detail['found_img']?> " class="img-responsive img-size"  style = "height: 300px; width: 500px;"> 
					<input accept=".jpg , .png" type="file" id="found_img" name="found_img" class="form-control" style="margin: 14px 0 0 0 ; width: 300px;" onChange="readURL(this);">
				</div>
			</div>
		</div>
		
		<div class="col-lg-6">
			<div class="form-group">
				<label>รายละเอียด<font color="#F00"></font></label>
				<textarea style="width:100%;" rows="8" name="found_detail" id="found_detail" ><?php echo $found_detail['found_detail']?></textarea>
			</div>
		</div>

	
		<div class="col-lg-6">
			<div class="form-group">
				<label>สถานที่<font color="#F00"></font></label>
				<input id="found_location" name="found_location" class="form-control" value="<?php echo $found_detail['found_location']?>">
			</div>
		</div>

							<div class="col-lg-6">
                           		<div class="form-group">
                           			<fieldset class="gllpLatlonPicker">
                           				<input type="text" class="gllpSearchField form-control" placeholder="ค้นหาตำแหน่ง">
                           				<input type="button" class="gllpSearchButton btn btn-primary" value="ค้นหา">
                           				<div class="gllpMap">Google Maps</div>
                           				<input type="text" class="gllpLatitude form-control" name="found_latitude" value="<?php echo $found_detail['found_latitude']?>">
                           				<input type="text" class="gllpLongitude form-control" name="found_longitude" value="<?php echo $found_detail['found_longitude']?>">
                           				<input type="hidden" class="gllpZoom" value="16"/>
                           			</fieldset>

                           		</div>
                           	</div>



		
	<div align="right">
		<input type="hidden" id="found_img_o" name="found_img_o" class="form-control" value="<?php echo $found_detail['found_img']?>">
		<input type="hidden" id="found_id" name="found_id" value="<?php echo $found_detail['found_id'] ?>" />
		<button type="button" class="btn btn-default" onclick="window.location='?content=found';" >ย้อนกลับ</button>		
		<button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
		<button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
	</div>

</form>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBPYt_mZGd-2iotzhpiZKw1_GpZ6H9w3vs&sensor=false"></script>
<link rel="stylesheet" type="text/css" href="../template/map/css/jquery-gmaps-latlon-picker.css"/>
<script src="../template/map/js/jquery-gmaps-latlon-picker.js"></script>