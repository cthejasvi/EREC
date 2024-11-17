<!DOCTYPE html>
<html>
<head>
    <title>POS</title>
    <link rel="shortcut icon" href="main/images/pos.jpg">
    <link href="main/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="main/css/DT_bootstrap.css">
    <link rel="stylesheet" href="main/css/font-awesome.min.css">
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
            background: #83cee7;
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center; /* Center items both horizontally and vertically */
            height: 100vh; /* Take the full height of the viewport */
        }
        .login-box {
            width: 300px; /* Set a fixed width for both login boxes */
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            margin: 0 10px; /* Add margin to separate the boxes */
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="login-container">
            <div class="login-box">
                <?php
                if (isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) > 0) {
                    foreach ($_SESSION['ERRMSG_ARR'] as $msg) {
                        echo '<div style="color: red; text-align: center;">', $msg, '</div><br>';
                    }
                    unset($_SESSION['ERRMSG_ARR']);
                }
                ?>
                <form action="login.php" method="post">
                    <font style=" font:bold 44px 'Aleo'; color:#000;"><center>Admin Login</center></font><br>
                    <div class="input-prepend">
                        <span style="height:30px; width:25px;" class="add-on"><i class="icon-user icon-2x"></i></span>
                        <input style="height:40px;" type="text" name="username" placeholder="Username" required/><br>
                    </div>
                    <div class="input-prepend">
                        <span style="height:30px; width:25px;" class="add-on"><i class="icon-lock icon-2x"></i></span>
                        <input type="password" style="height:40px;" name="password" placeholder="Password" required/><br>
                    </div>
                    <div class="qwe">
                        <button class="btn btn-large btn-primary btn-block pull-right" href="dashboard.html" type="submit"><i class="icon-signin icon-large"></i> Login</button><br><br>
                    </div>
                </form>
            </div>

            <div class="login-box">
                <form action="userlogin.php" method="post">
                    <font style=" font:bold 44px 'Aleo'; color:#000;"><center>User Login</center></font><br>
                    <div class="input-prepend">
                        <span style="height:30px; width:25px;" class="add-on"><i class="icon-user icon-2x"></i></span>
                        <input style="height:40px;" type="text" name="username" placeholder="Username" required/><br>
                    </div>
                    <div class="input-prepend">
                        <span style="height:30px; width:25px;" class="add-on"><i class="icon-lock icon-2x"></i></span>
                        <input type="password" style="height:40px;" name="password" placeholder="Password" required/><br>
                    </div>
                    <div class="qwe">
                        <button class="btn btn-large btn-primary btn-block pull-right" href="dashboard.html" type="submit"><i class="icon-signin icon-large"></i> Login</button><br><br>
                    </div>
               
                <form action="signupuser.php" method="post">
                    <p style="color:blue"><center>New User<button>Signup </button></p>
                </form>  </form>
            </div>
        </div>
    </div>
</body>
</html>
