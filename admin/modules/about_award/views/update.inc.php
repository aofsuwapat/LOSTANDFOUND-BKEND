<script>
    function check(){
        var project_number = document.getElementById("project_number").value;
        var project_title_en = document.getElementById("project_title_en").value;
        var project_title_th = document.getElementById("project_title_th").value;

        project_number = $.trim(project_number);
        project_title_en = $.trim(project_title_en);
        project_title_th = $.trim(project_title_th);

        if(project_number.length == 0){
            alert("กรุณากรอกจำนวน");
            document.getElementById("project_number").focus();
            return false;
        }else if(project_title_th.length == 0){
            alert("กรุณากรอกรายละเอียด TH");
            document.getElementById("project_title_th").focus();
            return false;
        }else if(project_title_en.length == 0){
            alert("กรุณากรอกรายละเอียด EN");
            document.getElementById("project_title_en").focus();
            return false;
        }else{
            return true;
        }
    }

</script>

<h1>เเก้ไขAward</h1>
<div align="right">

</div>

<form role="form" method="post" onsubmit="return check();" action="index.php?content=about_award&action=edit" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <label>Amount <font color="#F00"><b>*</b></font></label>
                <input id="project_number" name="project_number" class="form-control"  value="<?php echo $about_award['project_number']?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Detail TH<font color="#F00"><b>*</b></font></label>
                <textarea id="project_title_th" name="project_title_th" class="form-control" style="min-height: 200px;"><?php echo $about_award['project_title_th']?></textarea>
            </div>
        </div>        <div class="col-lg-6">
            <div class="form-group">
                <label>Detail EN<font color="#F00"><b>*</b></font></label>
                <textarea id="project_title_en" name="project_title_en" class="form-control" style="min-height: 200px;"><?php echo $about_award['project_title_en']?></textarea>
            </div>
        </div>
    </div>
    <div align="right">
        <input type="hidden" id="project_id" name="project_id" value="<?php echo $about_award['project_id'] ?>" />
        <button type="button" class="btn btn-default" onclick="window.history.back();">ย้อนกลับ</button>           
        <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
        <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
    </div>
</form>