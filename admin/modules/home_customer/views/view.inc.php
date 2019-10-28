	<script>

		function check(){

		}

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#img_back').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}else{
				$('#img_back').attr('src', '../img_upload/home_customer_detail/default.png');
			}
		}
	</script>	
	<!-- <? print_r('csadsafsa',$home_customer_detail); ?> -->

	<div class="row">
		<div class="col-lg-6">
			<h1>จัดการลูกค้า</h1>
			<h2>เพิ่ม ลบ เเก้ไขลูกค้า</h2>
		</div>

		<?php //if($user['user_division_id']=='sales') {?> 
			<div class="col-lg-6" align="right">

				<a title="home_slide" href="?content=home"  <?php if($_GET['content']=='home'){ echo "class='btn btn-primary btn-menu'";}else{ echo "class='btn btn-warning btn-menu'";} ?> >สไลค์หน้าหลัก / Home Slide</a> 
				<a title="home_customer" href="?content=home_customer" <?php if($_GET['content']=='home_customer'){ echo "class='btn btn-primary btn-menu'";}else{ echo "class='btn btn-warning btn-menu'";} ?> >ลูกค้า / customer	</a>
				<!--  <a title="Margin" href="?app=oil_price_profit" <?php if($_GET['app']=='oil_price_profit'){ echo "class='btn btn-warning btn-menu'";}else{ echo "class='btn btn-primary btn-menu'";} ?> >กำไร / Margin</a> -->    
			</div>
			<?php  //} ?> 

		</div>

		<form role="form" method="post" onsubmit="return check();" action="index.php?content=home_customer&action=edit_header" enctype="multipart/form-data">
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<label>รูปภาพ พื้นหลัง<font color=""><font></label>
							<div>
								<img id="img_back" src="../img_upload/home_customer_detail/<?php if($home_customer_detail['customer_img_back'] != "") echo $home_customer_detail['customer_img_back']; else echo "default.png"; ?>" class="img-responsive img-size" style = "height: 300px; width: 500px;"> 
								<input accept=".jpg , .png" type="file" id="customer_img_back" name="customer_img_back" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this);">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Header TH <font ><bcolor="">*</b></font></label>
							<input id="customer_title_th" name="customer_title_th" class="form-control"  value="<?php echo $home_customer_detail['customer_title_th']?>">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Header EN <font color=""><b>*</b></font></label>
							<input id="customer_title_en" name="customer_title_en" class="form-control"  value="<?php echo $home_customer_detail['customer_title_en']?>">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Detail TH <font ><b>*</b></font></label>
							<textarea id="customer_detail_th" name="customer_detail_th" class="form-control" style="min-height: 200px;"><?php echo $home_customer_detail['customer_detail_th']?></textarea>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Detail EN <font><b>*</b></font></label>
							<textarea id="customer_detail_en" name="customer_detail_en" class="form-control" style="min-height: 200px;"><?php echo $home_customer_detail['customer_detail_en']?></textarea>
						</div>
					</div> 
				</div>
				<div align="right">
					<input type="hidden" id="customer_img_back_o" name="customer_img_back_o" class="form-control" value="<?php echo $home_customer_detail['customer_img_back']?>">
					<input type="hidden" id="customer_id" name="customer_id" value="<?php echo $home_customer_detail['customer_id'] ?>" />
					<button type="button" class="btn btn-default" onclick="window.location='?content=home_customer';">ย้อนกลับ</button>
					<button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
					<button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
				</div>
			</form>
			<hr style="border-bottom: 100%;">
			<div align=right>
				<a class="button" href="?content=home_customer&action=insert">
					เพิ่มรูปลูกค้า
				</a>
			</div>

			<table>
				<thead>
					<tr>
						<th width="12px">#</th>
						<th width="5px">Image</th>
						<th width="50px">จัดการ</th>
					</tr>
				</thead>
				<tbody>
					<?php for($i=0; $i < count($home_customer_img); $i++){ ?>
						<tr>
							<td><?php echo $i+1; ?></td>
							<td>
								<img style="height:150px;width:auto;" src="../img_upload/home_customer_img/<?php if($home_customer_img[$i]['customer_img_icon'] != ""){ echo $home_customer_img[$i]['customer_img_icon'];} else{ echo "default.png";} ?>"  class="img-responsive img-detail"> 
							</td>
							<td width="50px">
								<a href="?content=home_customer&action=update&id=<?php echo $home_customer_img[$i]['customer_img_id'];?>" style="font-size: 20px;">
									<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
								</a> 
								<a href="?content=home_customer&action=delete_img&id=<?php echo $home_customer_img[$i]['customer_img_id'];?>&img=<?php echo $home_customer_img[$i]['customer_img_icon'];?>" onclick="return confirm('คุณต้องการลบ รูปลูกค้ารายนี้หรือไม่');" style="color:red; font-size: 20px;">
									<i class="fa fa-times" aria-hidden="true"></i>
								</a> 
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>