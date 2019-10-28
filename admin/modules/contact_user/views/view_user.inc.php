    <div class="row">
    	<div class="col-lg-4">
    		<h1>ข้อมูลผู้ใช้งานเว็บ</h1>
    	</div>
    	<div class="col-lg-8" align="right">

    		<a title="contact" href="?content=contact"  <?php if($_GET['content']=='contact'){ echo "class='btn btn-primary btn-menu'";}else{ echo "class='btn btn-warning btn-menu'";} ?> >ติดต่อเรา / Contact Us</a> 
    		<a title="contact_user" href="?content=contact_user" <?php if($_GET['content']=='contact_user'){ echo "class='btn btn-primary btn-menu'";}else{ echo "class='btn btn-warning btn-menu'";} ?>>ข้อมูลผูติดต่อ / Contact user  </a>
    	</div>
    </div>
    <hr style="border-bottom: 100%;">
    <div align=right>            </div>
    <table>
    	<thead>
    		<tr>
    			<th width="12px">#</th>
    			<th width="200px">Name</th>
    			<th width="200px">Email</th>
    			<th width="150px">Subject</th>
    			<th width="150px">Massage</th>
    		</tr>
    	</thead>
    	<tbody>

    		<?php for($i=0; $i < count($contact_user); $i++){ ?>
    			<tr>
    				<td><?php echo $i+1; ?></td>
    				<td><?php echo $contact_user[$i]['contact_name']; ?></td>
    				<td><?php echo $contact_user[$i]['contact_email']; ?></td>
    				<td><?php echo $contact_user[$i]['contact_subject']; ?></td>
    				<td><?php echo $contact_user[$i]['contact_massage']; ?></td>
    			</tr>
    		<?php } ?>
    	</tbody>
    </table>