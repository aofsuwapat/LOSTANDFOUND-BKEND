<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="logo">
            <div align="center"> 
                <img style="width:100px; height:100px;" src="../img_upload/logo/RSS.png" class="img-responsive"> 
            </div>
        </li>
        <li>
            <div style=" text-indent: 0px; margin-top: 15px;" align="center">
                <span style="padding:0px; padding-top:100px; font-size:28px; color:#FFFFFF;">Lost & Found</span><br>
                <!-- <span class="brand-line-second">SMT GROUP</span><br> -->
            </div>

            <div style=" text-indent: 0px; margin-top: -16px;" align="center" >
                <span style="padding-top:100px; font-size:20px; color:#FFFFFF;">ตามหาของหาย</span>
                <!-- <span class="brand-line-second">SMT GROUP</span><br> -->
            </div>
        </li>
       
        <li><a href="index.php?content=news">
            <div <?php if($content=="news"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                <!-- <i class="fa fa-bell" style="font-size:24px"></i> -->
                <span style="padding:15px; font-size:15px;">ข่าวสาร</span>
            </div>
        </a></li>


        <li><a href="index.php?content=category">
            <div <?php if($content=="category"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                <!-- <i class="fa fa-connectdevelop" style="font-size:24px"></i> -->
                <span style="padding:15px; font-size:15px;">หมวดหมู่</span>
            </div>
        </a></li>
        
        
        <li><a href="index.php?content=found">
            <div <?php if($content=="found"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                <!-- <i class="fa fa-smile" style="font-size:24px"></i> -->
                <span style="padding:15px; font-size:15px;">เจอของ</span>
            </div>
        </a></li>


        <li><a href="index.php?content=user">
            <div <?php if($content=="user"){echo "class='menu-active'";} else {echo "class='menu'";}?> >
                <!-- <i class="fa fa-user" style="font-size:24px"></i> -->
                <span style="padding:15px; font-size:15px; ">ผู้ดูเเลระบบ</span>
            </div>
        </a></li>
    </ul>
</div>