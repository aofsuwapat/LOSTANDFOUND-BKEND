<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <!-- Bootstrap Core CSS -->
    <link href="../template/backend/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>ADMIN PANEL LOGIN</title>
    <link rel="icon" href="../template/backend/images/logo/logo.png" type="image/png">
    <script>
        function refresh(){
            location.reload();
        }

        function error(){
            alert("Can not login. Please check your username and password.");
            document.getElementById("error").innerHTML = "username and password.";
        }
    </script>
</head>
<style type="text/css">
body{
    background-color: #363636;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    height: 100vh;
}
.login-panel {
    position: fixed;
    top: 50%;
    left: 50%;
    margin-top: -300px; 
    margin-left: -135px; 
    background-color: white; 
    border-radius: 15px; 
    padding: 15px; 
    width: 380px; 
    height: 380px; 
    box-shadow: 7px 7px 16px 0px rgba(50, 50, 50, 0.67);
}
.btn-yellow {
    color: #000;
    background-color: #fec619;
    border-color: #fec619;
}
</style>
<body>
    <div class="container">
        <iframe id="checklogin" name="checklogin" src="" hidden></iframe>
        <form class="login-panel" action="check_login.php" method="post" target="checklogin">
            <div class="text-center" style="padding:5px; font-size:24px; font-weight:600; color:#4F4F4F; padding-top:0px;">
                ADMIN
            </div>
           
            <div align="center"><img style="width:150px; height:150px;" src="../template/backend/images/logo/Msn S.png"></div>

            <div class="text-center" style="padding:5px; font-size:24px; font-weight:600; color:#4F4F4F;  padding-top:0px;">
                LOST&FOUND
            </div>
            <div style="padding: 10px 54px;">
                <input required name="username" id="username" type="text" class="form-control form-control-sm" autocomplete="false" placeholder="Username" autofocus>
                <input required name="password" id="password" type="password" style="margin-top:10px;" class="form-control form-control-sm" autocomplete="false" placeholder="Password">
                <div style="padding-top:15px;" align="center">
                    <!-- <button type="button" class="btn btn-sm btn-default" style="cursor: pointer;" onclick="window.location='../'">go to home page</button> -->
                    <button type="submit" class="btn btn-sm btn-yellow" style="cursor: pointer;" >Login</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>