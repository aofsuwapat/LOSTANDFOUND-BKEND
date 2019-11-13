<script type="text/javascript">
	function check(){

		// var type_id = document.getElementById("type_id").value;
		// var lost_name_th = document.getElementById("lost_name_th").value;
		var lost_topic = document.getElementById("lost_topic").value;


		lost_id = $.trim(lost_id);
		lost_name = $.trim(lost_topic);
		// lost_name_th = $.trim(lost_name_th);

		if(type_id.length == 0){
			alert("กรุณาเลือก ประเภท");
			document.getElementById("type_id").focus();
			return false;
		}else if(lost_name_th.length == 0){
			alert("กรุณากรอกชื่อ TH");
			document.getElementById("lost_name_th").focus();
			return false;
		}else if(lost_name_en.length == 0){
			alert("กรุณากรอกชื่อ EN");
			document.getElementById("lost_name_en").focus();
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
			$('#img_back').attr('src', '../img_upload/lost/default.png');
		}
	}
	
</script>


<h1>เพิ่มของหาย</h1>

<hr>

<form role="form" method="post" onsubmit="return check();" action="index.php?content=lost&action=add" enctype="multipart/form-data">
	<!-- <div class="row"> -->


		<div class="col-lg-6">
			<div class="form-group">
				<label>หัวข้อ<font color="#F00"></font></label>
				<input id="lost_topic" name="lost_topic" class="form-control">
			</div>
		</div>

		<div class="col-lg-6">
			<div class="form-group">
			<label>ชนิด<font color="#F00"></font></label>
			<select id="lost_type" name="lost_type" class="form-control">
				<?php for ($i=0; $i<count($category); $i++) {?>
					<option value="<?php echo $category[$i]['category_id']; ?>"><?php echo $category[$i]['category_name']; ?></option>
				
				<?php
                }

                ?>
				
			</select>
		</div>
		</div>
		
		<div class="col-lg-6">
			<div class="form-group">
				<label>รูป<font color="#F00"></font></label>
				<div>
					<img id="img_back" src="../img_upload/lost/default.png" class="img-responsive img-size"  style = "height: 300px; width: 500px;"> 
					<input accept=".jpg , .png" type="file" id="lost_img" name="lost_img" class="form-control" style="margin: 14px 0 0 0 ; width: 300px;" onChange="readURL(this);">
				</div>
			</div>
		</div>
	<!-- </div> -->
	
		
		
		
		<div class="col-lg-6">
			<div class="form-group">
				<label>รายละเอียด<font color="#F00"></font></label>
				<textarea style="width:100%;" rows="8" name="lost_detail" id="lost_detail" ></textarea>
			</div>
		</div>
		

		<div class="col-lg-6">
			<div class="form-group">
				<label>สถานที่<font color="#F00"></font></label>
				<input id="lost_location" name="lost_location" class="form-control">
			</div>
		</div>
	
							
                           	<div class="col-lg-6">
                           		<div class="form-group">
                           			<fieldset class="gllpLatlonPicker">
                           				<input type="text" class="gllpSearchField form-control" placeholder="ค้นหาตำแหน่ง">
                           				<input type="button" class="gllpSearchButton btn btn-primary" value="ค้นหา">
                           				<div class="gllpMap">Google Maps</div>
                           				<input type="text" class="gllpLatitude form-control" name="lost_latitude" value="14.999515"/>
                           				<input type="text" class="gllpLongitude form-control" name="lost_longitude" value="102.13487399999997"/>
                           				<input type="hidden" class="gllpZoom" value="16"/>
                           			</fieldset>

                           		</div>
                           	</div>
                           


	<div align="right">
		<button type="button" class="btn btn-default" onclick="window.location='?content=lost';" >ย้อนกลับ</button>
		<button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
		<button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
	</div>

</form>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBPYt_mZGd-2iotzhpiZKw1_GpZ6H9w3vs&sensor=false"></script>
<link rel="stylesheet" type="text/css" href="../template/map/css/jquery-gmaps-latlon-picker.css"/>
<script src="../template/map/js/jquery-gmaps-latlon-picker.js"></script>