    <script>

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img_back').attr('src', e.target.result);

                }
                reader.readAsDataURL(input.files[0]);
            }else{
                $('#img_back').attr('src','../img_upload/found/default.png');

            }
        }
    </script>   

    <div class="row">
        <div class="col-lg-4">
            <h1>จัดการเจอของ</h1>
            <h2>เพิ่ม ลบ เเก้ไข เจอของ</h2>
        </div>

    </div>

  
        <hr style="border-bottom: 100%;">
        <div align=right>    
            <a class="button" href="?content=found&action=insert">
                เพิ่มเจอของ
            </a>             
        </div>
        <table>
            <thead>
                <tr>
                    <th width="5px">#</th>
                    <th width="50px">หัวข้อ</th>
                    <th width="50px">ชนิด</th>
                    <th width="100px">รูป</th>
                    <th width="100px">รายละเอียด</th>
                    <th width="50px">สถานที่</th>
                    <th width="2px">แก้ไข</th>
                    <th width="2px">ลบ</th>

                </tr>
            </thead>
            <tbody>

                <?php for($i=0; $i < count($found_detail); $i++){ ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
              
                        <td><?php echo $found_detail[$i]['found_topic']; ?></td>
                        <td><?php echo $found_detail[$i]['category_name']; ?></td>
                        <td>
                            <img style="height:150px;width:auto;" src="../img_upload/found/<?php if($found_detail[$i]['found_img'] != ""){ echo $found_detail[$i]['found_img'];} else{ echo "default.png";} ?>"  class="img-responsive img-detail"> 
                        </td>
                        <td><?php echo $found_detail[$i]['found_detail']; ?></td>
                        <td><?php echo $found_detail[$i]['found_location']; ?></td>
                        
                        <td width="50px">
                            <a href="?content=found&action=update&id=<?php echo $found_detail[$i]['found_id'];?>" style="font-size: 20px;">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a> 
                            </td>
                            <td width="50px">
                            <a href="?content=found&action=delete&id=<?php echo $found_detail[$i]['found_id'];?>&img=<?php echo $found_detail[$i]['found_img'];?>" onclick="return confirm('คุณต้องการลบ <?php echo $found_detail[$i]['found_name_th']; ?> ?');" style="color:red; font-size: 20px;">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </a> 
                            </td>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>