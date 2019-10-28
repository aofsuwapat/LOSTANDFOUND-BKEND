    <script>

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img_back').attr('src', e.target.result);

                }
                reader.readAsDataURL(input.files[0]);
            }else{
                $('#img_back').attr('src','../img_upload/news/default.png');

            }
        }
    </script>   

    <div class="row">
        <div class="col-lg-4">
            <h1>จัดการข่าวสาร</h1>
            <h2>เพิ่ม ลบ เเก้ไข ข่าวสาร</h2>
        </div>

    </div>

  
        <hr style="border-bottom: 100%;">
        <div align=right>    
            <a class="button" href="?content=news&action=insert">
                เพิ่มข่าวสาร
            </a>             
        </div>
        <table>
            <thead>
                <tr>
                    <th width="5px">#</th>
                    <th width="80px">ชื่อข่าว</th>
                    <th width="100px">Description</th>
                    <!-- <th width="100px">detail</th> -->
                    <th width="50px">รูป</th>
                    <th width="2px">แก้ไข</th>
                    <th width="2px">ลบ</th>

                </tr>
            </thead>
            <tbody>

                <?php for($i=0; $i < count($news_detail); $i++){ ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
              
                        <td><?php echo $news_detail[$i]['news_name']; ?></td>
                        <td><?php echo $news_detail[$i]['news_description']; ?></td>
                        
                        <td>
                            <img style="height:150px;width:auto;" src="../img_upload/news/<?php if($news_detail[$i]['news_img'] != ""){ echo $news_detail[$i]['news_img'];} else{ echo "default.png";} ?>"  class="img-responsive img-detail"> 
                        </td>
                        <td width="50px">
                            <a href="?content=news&action=update&id=<?php echo $news_detail[$i]['news_id'];?>" style="font-size: 20px;">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a> 
                            </td>
                            <td width="50px">
                            <a href="?content=news&action=delete&id=<?php echo $news_detail[$i]['news_id'];?>&img=<?php echo $news_detail[$i]['news_img'];?>" onclick="return confirm('คุณต้องการลบ <?php echo $news_detail[$i]['news_name_th']; ?> ?');" style="color:red; font-size: 20px;">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </a> 
                            </td>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>