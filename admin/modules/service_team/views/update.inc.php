<script>
    function check(){
        var name_th = document.getElementById("name_th").value;
        var name_en = document.getElementById("name_en").value;
        var position_th = document.getElementById("position_th").value;
        var position_en = document.getElementById("position_en").value;

        name_th = $.trim(name_th);
        name_en = $.trim(name_en);
        position_th = $.trim(position_th);
        position_en = $.trim(position_en);

        if(name_th.length == 0){
            alert("กรุณากรอก Name TH");
            document.getElementById("name_th").focus();
            return false;
        }else if(name_en.length == 0){
            alert("กรุณากรอก Name EN");
            document.getElementById("name_en").focus();
            return false;
        }else if(position_th.length == 0){
            alert("กรุณากรอก Position TH");
            document.getElementById("position_th").focus();
            return false;
        }else if(position_en.length == 0){
            alert("กรุณากรอก Position EN");
            document.getElementById("position_en").focus();
            return false;
        }else{
            return true;
        }
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#img_team').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }else{
            $('#img_team').attr('src', '../img_upload/service_team/default.png');
        }
    }
</script>


<h1>เเก้ไขข้อมูล Service Team</h1>
<div align="right">

</div>

<form role="form" method="post" onsubmit="return check();" action="index.php?content=service_team&action=edit" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Name TH <font color="#F00"><b>*</b></font></label>
                        <input id="name_th" name="name_th" class="form-control" value="<?php echo $service_team['name_th']?>" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Name EN <font color="#F00"><b>*</b></font></label>
                        <input id="name_en" name="name_en" class="form-control" value="<?php echo $service_team['name_en']?>" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Position TH <font color="#F00"><b>*</b></font></label>
                        <input id="position_th" name="position_th" class="form-control" value="<?php echo $service_team['position_th']?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Position EN <font color="#F00"><b>*</b></font></label>
                        <input id="position_en" name="position_en" class="form-control" value="<?php echo $service_team['position_en']?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group" align="center">
                <img id="img_team" src="../img_upload/service_team/<?php if($service_team['team_image'] != "" ){echo $service_team['team_image'];}else{ echo "default.png"; }?>" class="example-avater"> 
                <input accept=".jpg , .png" type="file" id="team_image" name="team_image" class="form-control" style="margin: 14px 0 0 0 ;" onChange="readURL(this);" value="<?php echo $service_team['team_image']?>">
            </div>
        </div>
    </div>

    <div align="right">
        <input type="hidden" id="team_id" name="team_id" value="<?php echo $service_team['team_id'] ?>" />
        <input type="hidden" id="team_image_o" name="team_image_o" value="<?php echo  $service_team['team_image'] ?>" />
        <button type="button" class="btn btn-default" onclick="window.location='?content=service_team';" >ย้อนกลับ</button>
        <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
        <button name="submit" type="submit" class="btn btn-success">บันทึกข้อมูล</button>
    </div>
</form>