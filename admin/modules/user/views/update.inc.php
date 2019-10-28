<script>
    function check(){

        var user_firstname = document.getElementById("user_firstname").value;
        var user_lastname = document.getElementById("user_lastname").value;
        var user_phone = document.getElementById("user_phone").value;
        var user_image = document.getElementById("user_image").value;
        var user_email = document.getElementById("user_email").value;
        var user_username = document.getElementById("user_username").value; 
        var user_password = document.getElementById("user_password").value;
        var user_address = document.getElementById("user_address").value;
        var user_province = document.getElementById("user_province").value;
        var user_amphur = document.getElementById("user_amphur").value;
        var user_district = document.getElementById("user_district").value;
        var user_zipcode = document.getElementById("user_zipcode").value;

        user_firstname = $.trim(user_firstname);
        user_lastname = $.trim(user_lastname);
        user_phone = $.trim(user_phone);
        user_image = $.trim(user_image);
        user_email = $.trim(user_email);
        user_username = $.trim(user_username);
        user_password = $.trim(user_password);
        user_address = $.trim(user_address);
        user_province = $.trim(user_province);
        user_amphur = $.trim(user_amphur);
        user_district = $.trim(user_district);
        user_zipcode = $.trim(user_zipcode);

        if(user_username.length == 0){
            alert("กรุณากรอก username");
            document.getElementById("user_username").focus();
            return false;
        }else if(user_password.length == 0){
            alert("กรุณากรอก password");
            document.getElementById("user_password").focus();
            return false;
        }else if(user_firstname.length == 0){
            alert("กรุณากรอกชื่อ");
            document.getElementById("user_firstname").focus();
            return false;
        }else if(user_lastname.length == 0){
            alert("กรุณากรอกนามสกุล");
            document.getElementById("user_lastname").focus();
            return false;
        }else if(user_address.length == 0){
            alert("กรุณากรอกที่อยู่");
            document.getElementById("user_address").focus();
            return false;
        }else if(user_province.length == 0){
            alert("กรุณากรอกจังหวัด");
            document.getElementById("user_province").focus();
            return false;
        }else if(user_amphur.length == 0){
            alert("กรุณากรอกอำเภอ");
            document.getElementById("user_amphur").focus();
            return false;
        }else if(user_district.length == 0){
            alert("กรุณากรอกตำบล");
            document.getElementById("user_district").focus();
            return false;
        }else if(user_zipcode.length == 0){
            alert("กรุณากรอกหมายเลขไปรษณีย์");
            document.getElementById("user_zipcode").focus();
            return false;
        }else{
            return true;
        }
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#img_user').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }else{
            $('#img_user').attr('src', '../img_upload/user/default.png');
        }
    }
</script>

<h1>เเก้ไขข้อมูลผู้ดูเเลระบบ</h1>
<div align="right">

</div>

<form role="form" method="post" onsubmit="return check();" action="index.php?content=user&action=edit" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>username <font color="#F00"><b>*</b></font></label>
                        <input id="user_username" name="user_username" class="form-control" value="<?php echo $user['user_userid']?>" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>password <font color="#F00"><b>*</b></font></label>
                        <input id="user_password" name="user_password" class="form-control" value="<?php echo $user['user_password']?>" autocomplete="off">
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label>ชื่อ <font color="#F00"><b>*</b></font></label>
                        <input id="user_firstname" name="user_firstname" class="form-control" value="<?php echo $user['user_firstname']?>" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>นามสกุล <font color="#F00"><b>*</b></font></label>
                        <input id="user_lastname" name="user_lastname" class="form-control" value="<?php echo $user['user_lastname']?>" autocomplete="off">
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label>ที่อยู่อีเมล </label>
                        <input id="user_email" name="user_email" class="form-control" value="<?php echo $user['user_email']?>" autocomplete="off">
                    </div>
                </div>
            
            </div> 
        </div>

        <!-- <div class="col-lg-3">
            <div class="form-group" align="center">
                <img id="img_user" src="../img_upload/user/<?php if($user['user_image'] != "" ){echo $user['user_image'];}else{ echo "default.png"; }?>" class="example-avater"> 
                <input accept=".jpg , .png" type="file" id="user_image" name="user_image" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this);" value="<?php echo $user['user_image']?>">
            </div>
        </div> -->
    </div>
    
    <!-- /.row (nested) -->

    <div class="row">
       

        

       
    </div>

    <div align="right">
        <input type="hidden"  id="user_id" name="user_id" value="<?php echo $user['user_id'] ?>" />
        <input type="hidden"  id="user_image_o" name="user_image_o" value="<?php echo  $user['user_image'] ?>" />
        <button type="button" class="btn btn-default" onclick="window.location='?content=user';" >ย้อนกลับ</button>
        <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
        <button name="submit" type="submit" class="btn btn-success">บันทึกข้อมูล</button>
    </div>
</form>