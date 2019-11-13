<div class="row">
    <div class="col-lg-4">
        <h1>จัดการหมวดหมู่</h1>
        <h2>เพิ่ม ลบ เเก้ไข หมวดหมู่</h2>
    </div>
    <div class="col-lg-8" align="right">

    </div>

</div>
<hr style="border-bottom: 100%;">
<div align=right>         
    <a class="button" href="?content=category&action=insert">
        เพิ่มหมวดหมู่
    </a>
</div>

<table>
    <thead>
        <tr>
            <th width="5px">#</th>
            <th width="100px">ชื่อหมวดหมู่</th>
            <th width="50px">รูปหมวดหมู่</th>
            <th width="50px">ไอคอนเจอของ</th>
            <th width="50px">ไอคอนของหาย</th>
            <th width="5px">แก้ไข</th>
            <th width="5px">ลบ</th>

        </tr>
    </thead>
    <tbody>

        <?php for($i=0; $i < count($category); $i++){ ?>
            <tr>
                <td><?php echo $i+1; ?></td>
                <td><?php echo $category[$i]['category_name']; ?></td>
                <td>
                    <img style="height:150px;width:auto;" src="../img_upload/category/<?php if($category[$i]['category_img'] != ""){ echo $category[$i]['category_img'];} else{ echo "default.png";} ?>"  class="img-responsive img-detail"> 
                </td>
                <td>
                    <img style="height:150px;width:auto;" src="../img_upload/category/<?php if($category[$i]['found_pin'] != ""){ echo $category[$i]['found_pin'];} else{ echo "default.png";} ?>"  class="img-responsive img-detail"> 
                </td>
                <td>
                    <img style="height:150px;width:auto;" src="../img_upload/category/<?php if($category[$i]['lost_pin'] != ""){ echo $category[$i]['lost_pin'];} else{ echo "default.png";} ?>"  class="img-responsive img-detail"> 
                </td>
                <td width="50px">
                    <a href="?content=category&action=update&id=<?php echo $category[$i]['category_id'];?>" style="font-size: 20px;">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a> 
                    </td>
                    <td width="50px">
                    <a class="icon" href="?content=category&action=delete&id=<?php echo $category[$i]['category_id'];?>" onclick="return confirm('คุณต้องการลบ : <?php echo $category[$i]['category_name']; ?>');" style="color:red; ">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>  

                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>