<h1>ระบบจัดการผู้ดูเเลระบบ</h1>
<h2>เพิ่ม ลบ เเก้ไข ผู้ดูเเลระบบ</h2>
<div align=right>
  <a class="button" href="?content=user&action=insert">
    เพิ่มผู้ดูเเล
  </a>
</div>
<table>
  <thead>
    <tr>
      <th>#</th>
      <th>ชื่อ - นามสกุล</th>  
      <th>เเก้ไข</th>
      <th>ลบ</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    for($i=0; $i < count($user); $i++){
      ?>
      <tr>
        <td><?php echo $i+1; ?></td>
        <td><?php echo $user[$i]['user_firstname']; ?> <?php echo $user[$i]['user_lastname']; ?> </td>
        <td>
          <a href="?content=user&action=update&id=<?php echo $user[$i]['user_id'];?>" style="font-size: 20px;">
            <i class="fa fa-pencil-square-o" aria-hidden="true" ></i>
          </a> 
        </td>
        <td>
          <a href="?content=user&action=delete&id=<?php echo $user[$i]['user_id'];?>" onclick="return confirm('คุณต้องการลบผู้ใช้งาน : <?php echo $user[$i]['user_firstname']; ?> ?');" style="color:red; font-size: 20px;">
            <i class="fa fa-times" aria-hidden="true"></i>
          </a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
