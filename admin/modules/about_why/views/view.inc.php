
<div class="row">
	<div class="col-lg-4">
		<h1>จัดการAward</h1>
		<h2>เเก้ไขAward</h2>
	</div>
	<div class="col-lg-8" align="right">

		<a title="about" href="?content=about"  <?php if($_GET['content']=='about'){ echo "class='btn btn-primary btn-menu'";}else{ echo "class='btn btn-warning btn-menu'";} ?> >เกี่ยวกับเรา / About Us</a> 
		<a title="about_award" href="?content=about_award" <?php if($_GET['content']=='about_award'){ echo "class='btn btn-primary btn-menu'";}else{ echo "class='btn btn-warning btn-menu'";} ?> >รางวัล / Award  </a>
		<a title="about_why" href="?content=about_why" <?php if($_GET['content']=='about_why'){ echo "class='btn btn-primary btn-menu'";}else{ echo "class='btn btn-warning btn-menu'";} ?> > Why choose us </a>
	</div>
</div>
<div align=right>
</div>
<table>
	<thead>
		<tr>
			<th width="12px">#</th>
			<th width="5px">Icon</th>
			<th width="100px">Title TH</th>
			<th width="100px">Title EN</th>
			<th width="150px">Detail TH</th>
			<th width="150px">Detail EN</th>
			<th width="50px">จัดการ</th>
		</tr>
	</thead>
	<tbody>

		<?php for($i=0; $i < count($about_why); $i++){ ?>
			<tr>
				<td><?php echo $i+1; ?></td>
				<td>
					<img style="height:150px;width:auto; border-radius: 50%!important;" src="../img_upload/about_why/<?php if($about_why[$i]['why_icon'] != ""){ echo $about_why[$i]['why_icon'];} else{ echo "default.png";} ?>"  class="img-responsive img-detail"> 
				</td>
				<td><?php echo $about_why[$i]['why_title_th']; ?></td>
				<td><?php echo $about_why[$i]['why_title_en']; ?></td>
				<td><?php echo $about_why[$i]['why_detail_th']; ?></td>
				<td><?php echo $about_why[$i]['why_detail_en']; ?></td>
				<td width="50px">
					<a href="?content=about_why&action=update&id=<?php echo $about_why[$i]['why_id'];?>" style="font-size: 20px;">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a> 
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>