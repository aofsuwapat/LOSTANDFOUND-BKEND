 <!-- <script type="text/javascript" src="../template/backend/ckeditor/ckeditor.js"></script> -->
 <script type="text/javascript" src="../template/ckeditor/ckeditor.js"></script>
 <script type="text/javascript">
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
 </script>


 <h1>Services</h1>

 <hr>

 <form role="form" method="post" onsubmit="return check();" action="index.php?content=service&action=edit_header" enctype="multipart/form-data">
 	<div class="row">
 		<div class="col-lg-12">
 			<div class="form-group">
 				<label>รูปภาพ พื้นหลัง Header ขนาดรูปที่แนะนำ 250*1600 px<font color="#F00"></font></label>
 				<div>
 					<img id="img_back" src="../img_upload/service_back/<?php if($service['service_header_img'] != "") echo $service['service_header_img']; else echo "default.png"; ?>" class="img-responsive img-size"  style = "height: 14vw; width: 100%;"> 
 					<input accept=".jpg , .png" type="file" id="service_header_img" name="service_header_img" class="form-control" style="margin: 14px 0 0 0 ; width: 300px;" onChange="readURL(this);">
 				</div>
 			</div>
 		</div>
 	</div>
 	<div class="row">
 		<div class="col-lg-6">
 			<div class="form-group">
 				<label>Header TH <font color="#F00"><b>*</b></font></label>
 				<input id="service_header_title_th" name="service_header_title_th" class="form-control" value="<?php echo $service['service_header_title_th']?>">
 			</div>
 		</div>
 		<div class="col-lg-6">
 			<div class="form-group">
 				<label>Header EN <font color="#F00"><b>*</b></font></label>
 				<input id="service_header_title_en" name="service_header_title_en" class="form-control" value="<?php echo $service['service_header_title_en']?>">
 			</div>
 		</div>
 		<div class="col-lg-6">
 			<div class="form-group">
 				<label>Detail TH<font color="#F00"><b>*</b></font></label>
 				<textarea style="width:100%;" name="service_header_detail_th" id="service_header_detail_th" class="ckeditor"><?php echo $service['service_header_detail_th']?></textarea>
 				<script type="text/javascript">
 					CKEDITOR.replace('service_header_detail_th',{
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
 				<textarea style="width:100%;" name="service_header_detail_en" id="service_header_detail_en" class="ckeditor"><?php echo $service['service_header_detail_en']?></textarea>
 				<script type="text/javascript">
 					CKEDITOR.replace('service_header_detail_en',{
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
 		<div class="col-lg-4">
 			<div class="form-group">
 				<label>title<font color=""><b>*</b></font></label>
 				<input id="title" name="title" class="form-control"  value="<?php echo $description['title']?>">
 			</div>
 		</div>
 		<div class="col-lg-4">
 			<div class="form-group">
 				<label>keyword<font color=""><b>*</b></font></label>
 				<input id="keyword" name="keyword" class="form-control"  value="<?php echo $description['keyword']?>">
 			</div>
 		</div>
 		<div class="col-lg-4">
 			<div class="form-group">
 				<label>description<font color=""><b>*</b></font></label>
 				<input id="description" name="description" class="form-control"  value="<?php echo $description['description']?>">
 			</div>
 		</div>
 	</div>
 	<div align="right">
 		<input type="hidden" id="service_header_img_o" name="service_header_img_o" value="<?php echo $service['service_header_img'] ?>" />
 		<input type="hidden" id="service_header_id" name="service_header_id" value="<?php echo $service['service_header_id'] ?>" />
 		<button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
 		<button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
 	</div>

 </form>
 <br>
 <hr>

 <h1>ระบบจัดการService</h1>
 <h2>เพิ่ม ลบ เเก้ไขข้อมูลService</h2>
 <div align=right>
 	<a class="button" href="?content=service&action=insert">
 		เพิ่มบริการ
 	</a>
 </div>
 <table>
 	<thead>
 		<tr>
 			<th>#</th>
 			<th>Image Back</th>
 			<th>Image Detail</th>
 			<th>Header TH</th>  
 			<th>Header EN</th>
 			<th>Description TH</th>
 			<th>Description EN</th>
 			<th>Detail TH</th>
 			<th>Detail EN</th>
 			<th>จัดการ</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php for($i=0; $i < count($service_body); $i++){ ?>
 			<tr>
 				<td><?php echo $i+1; ?></td>
 				<td>
 					<img style="height:150px;width:auto;" src="../img_upload/service_back/<?php if($service_body[$i]['service_body_header_img'] != ""){ echo $service_body[$i]['service_body_header_img'];} else{ echo "default.png";} ?>"  class="img-responsive img-detail"> 
 				</td>
 				<td>
 					<img style="height:150px;width:auto;" src="../img_upload/service_detail/<?php if($service_body[$i]['service_body_img'] != ""){ echo $service_body[$i]['service_body_img'];} else{ echo "default.png";} ?>"  class="img-responsive img-detail"> 
 				</td>
 				<td>
 					<?php echo $service_body[$i]['service_body_name_th']; ?>
 				</td>
 				<td>
 					<?php echo $service_body[$i]['service_body_name_en']; ?>
 				</td>
 				<td width="30%"><?php echo iconv_substr($service_body[$i]['service_body_description_th'], 0,100, "UTF-8")."..."; ?></td>
 				<td width="30%"><?php echo iconv_substr($service_body[$i]['service_body_description_th'], 0,100, "UTF-8")."..."; ?></td>
 				<td width="30%"><?php echo iconv_substr($service_body[$i]['service_body_detail_th'], 0,100, "UTF-8")."..."; ?></td>
 				<td width="30%"><?php echo iconv_substr($service_body[$i]['service_body_detail_en'], 0,100, "UTF-8")."..."; ?></td>
 				<td>
 					<a class="icon" href="?content=service&action=update&id=<?php echo $service_body[$i]['service_body_id'];?>">
 						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
 					</a> 
 					<a class="icon" href="?content=service&action=delete&id=<?php echo $service_body[$i]['service_body_id'];?>" onclick="return confirm('คุณต้องการลบ : <?php echo $service_body[$i]['service_body_name_th']; ?>');" style="color:red; ">
 						<i class="fa fa-times" aria-hidden="true"></i>
 					</a>  
 				</td>
 			</tr>
 		<?php } ?>
 	</tbody>
 </table>