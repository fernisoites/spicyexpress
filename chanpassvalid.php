<?php
require_once 'dbConfig.php';
session_start();

if(isset($_POST['submit'])){//用户提交登录表单时执行如下代码
        $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $user_email = $_POST['email'];
        $user_oldpassword = $_POST['old_password'];
        $user_newpassword = $_POST['new_password'];
        $user_cnewpassword = $_POST['cnew_password'];

        if(!empty($user_email)&&!empty($user_oldpassword)&&!empty($user_newpassword)&&!empty($user_cnewpassword)){
            //MySql中的SHA()函数用于对字符串进行单向加密
            $query = "SELECT * FROM users WHERE email = '$user_email' AND password = '$user_oldpassword'";
            //用用户名和密码进行查询
            $data = mysqli_query($dbc,$query);
            //若查到的记录正好为一条，则设置SESSION，同时进行页面重定向
            if(mysqli_num_rows($data)==1){
                if($user_newpassword==$user_cnewpassword){
                    $sql = "UPDATE users SET password='$user_newpassword' WHERE email='$user_email'";
                    if(mysqli_query($dbc, $sql)){
                        die("<script>alert('You have successfully changed your password.');location.href='member.php';</script>");
                    }
                    //$home_url = 'member.php';
                    //header('Location: '.$home_url);
                } else {
                    die("<script>alert('Sorry, new passwords should match.');location.href='".$_SERVER["HTTP_REFERER"]."';</script>");
                }
            }else{//若查到的记录不对，则设置错误信息
                die("<script>alert('Sorry, you must input valid email and password.');location.href='".$_SERVER["HTTP_REFERER"]."';</script>");
            }
        }else{
                die("<script>alert('Sorry, you must input your email, old password and new password.');location.href='".$_SERVER["HTTP_REFERER"]."';</script>");
        }
}
?>

<!DOCTYPE HTML>
<!--
    Alpha by HTML5 UP
    html5up.net | @n33co
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>SOLID - Bootstrap 3 Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <script src="assets/js/modernizr.js"></script>
    </head>
<body>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">SOLID.</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">HOME</a></li>
            <li><a href="about.php">ABOUT</a></li>
            <?php 
                if(isset($_SESSION['email'])) 
                {
                ?>
                    <li><a href="member.php">Welcome, <?php echo $_SESSION['email'];?></a></li>

                    <li>
                    <li><a href="logout.php" class="button">Log Out</a></li>
            <?php  
                } else {
            ?>

                <li>
                <li><a href="signup.php" class="button">Sign Up</a></li>
                <li><a href="login.php" class="button">Sign In</a></li>
            <?php  
                }
            ?>
            <!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">PAGES <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="blog.html">BLOG</a></li>
                <li><a href="single-post.html">SINGLE POST</a></li>
                <li><a href="portfolio.html">PORTFOLIO</a></li>
                <li><a href="single-project.html">SINGLE PROJECT</a></li>
              </ul>
            </li> -->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div id="blue">
        <div class="container">
            <div class="row">
                <h3>Change Your Password</h3>
            </div><!-- /row -->
        </div> <!-- /container -->
    </div><!-- /blue -->
        <div class="container">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="row">
                    <div class="col-xs-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <label for="password">Your Old Password</label>
                        <input type="password" class="form-control" id="old_password" name="old_password">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <label for="password">Your New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <label for="password">Confirm Your New Password</label>
                        <input type="password" class="form-control" id="cnew_password" name="cnew_password">
                    </div>
                </div>
                <br>
                <input type="submit" value="Submit" class="btn btn-primary" name="submit">
            </form>
        </div>
        

</body>
</html>