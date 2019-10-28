
<div class="row">
	<div class="col-lg-6">
		<h1>จัดการสไลด์หน้าหลัก</h1>
		<h2>เพิ่ม ลบ เเก้ไขสไลด์หน้าหลัก</h2>
	</div>

	<?php //if($user['user_division_id']=='sales') {?> 
		<div class="col-lg-6" align="right">

			<a title="home_slide" href="?content=home"  <?php if($_GET['content']=='home' || $_GET['content']==''){ echo "class='btn btn-primary btn-menu'";}else{ echo "class='btn btn-warning btn-menu'";} ?> >สไลค์หน้าหลัก / Home Slide</a> 
			<a title="home_customer" href="?content=home_customer" <?php if($_GET['content']=='home_customer'){ echo "class='btn btn-primary btn-menu'";}else{ echo "class='btn btn-warning btn-menu'";} ?> >ลูกค้า / customer	</a>
		</div>
		<?php  //} ?> 

	</div>
	<form role="form" method="post" onsubmit="return check();" action="index.php?content=home&action=edit_description" enctype="multipart/form-data">
		<div class="row">
			<div class="col-lg-4">
				<div class="form-group">
					<label>Title<font color=""></font></label>
					<input id="title" name="title" class="form-control"  value="<?php echo $description['title']?>">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Keyword<font color=""></font></label>
					<input id="keyword" name="keyword" class="form-control"  value="<?php echo $description['keyword']?>">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Description<font color=""></font></label>
					<input id="description" name="description" class="form-control"  value="<?php echo $description['description']?>">
				</div>
			</div>

		</div>
		<div align="right">
			<button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
			<button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
		</div>
	</form>
	<hr>
	<div align=right>
		<a class="button" href="?content=home&action=insert">
			เพิ่มสไลด์
		</a>
	</div>

	<table>
		<thead>
			<tr>
				<th width="12px">#</th>
				<th width="5px">Image</th>
				<th width="200px">Header TH</th>
				<th width="200px">Header EN</th>
				<th width="150px">Detail Header TH</th>
				<th width="150px">Detail Header EN</th>
				<th width="50px">จัดการ</th>
			</tr>
		</thead>
		<tbody>

			<?php for($i=0; $i < count($home_slide); $i++){ ?>
				<tr>
					<td><?php echo $i+1; ?></td>
					<td>
						<img style="height:150px;width:auto;" src="../img_upload/home_slide/<?php if($home_slide[$i]['slide_img'] != ""){ echo $home_slide[$i]['slide_img'];} else{ echo "default.png";} ?>"  class="img-responsive img-detail"> 
					</td>
					<td><?php echo $home_slide[$i]['slide_title_th']; ?></td>
					<td><?php echo $home_slide[$i]['slide_title_en']; ?></td>
					<td><?php echo $home_slide[$i]['slide_detail_th']; ?></td>
					<td><?php echo $home_slide[$i]['slide_detail_en']; ?></td>
					<td width="50px">
						<a href="?content=home&action=update&id=<?php echo $home_slide[$i]['slide_id'];?>" style="font-size: 20px;">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</a> 
						<a href="?content=home&action=delete&id=<?php echo $home_slide[$i]['slide_id'];?>" onclick="return confirm('คุณต้องการลบ <?php echo $home_slide[$i]['slide_header_th']; ?> ?');" style="color:red; font-size: 20px;">
							<i class="fa fa-times" aria-hidden="true"></i>
						</a> 
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>