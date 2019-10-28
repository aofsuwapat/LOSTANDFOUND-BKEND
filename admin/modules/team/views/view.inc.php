<h1>จัดการ Teams</h1>
<h2>เพิ่ม ลบ เเก้ไข Teams</h2>
<div align=right>
    <a class="button" href="?content=team&action=insert">
        เพิ่ม Team
    </a>
</div>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>  
            <th>Name TH - EN</th>  
            <th>Position TH</th>  
            <th>Position EN</th>  
            <th>เเก้ไข</th>
            <?php if($login_user['user_type_id'] == 1){ ?>
            <th>ลบ</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
    <?php 
    for($i=0; $i < count($team); $i++){
        ?>
        <tr>
            <td><?php echo $i+1; ?></td>
            <td><img src="../img_upload/team/<?php if($team[$i]['team_image'] != "" ){echo $team[$i]['team_image']; }else{ echo "default.png"; }?>" class="avatar"></td>
            <td><?php echo $team[$i]['name_th']; ?> - <?php echo $team[$i]['name_en']; ?> </td>
            <td><?php echo $team[$i]['position_th']; ?></td>
            <td><?php echo $team[$i]['position_en']; ?></td>
            <td>
                <a href="?content=team&action=update&id=<?php echo $team[$i]['team_id'];?>" style="font-size: 20px;">
                <i class="fa fa-pencil-square-o" aria-hidden="true" ></i>
                </a> 
            </td>
            <?php if($login_user['user_type_id'] == 1){ ?>
            <td>
                <a href="?content=team&action=delete&id=<?php echo $team[$i]['team_id'];?>" onclick="return confirm('คุณต้องการลบ : คุณ<?php echo $team[$i]['name_th']; ?> ?');" style="color:red; font-size: 20px;">
                <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </td>
            <?php } ?>
        </tr>
    <?php } ?>
    </tbody>
</table>