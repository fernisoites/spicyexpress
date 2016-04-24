<?php
require_once 'dbConfig.php';
session_start();

$error_msg = "";

if(!isset($_SESSION['email'])){
    if(isset($_POST['submit'])){//用户提交登录表单时执行如下代码
        $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $user_email = mysqli_real_escape_string($dbc,trim($_POST['email']));
        $user_password = mysqli_real_escape_string($dbc,trim($_POST['password']));

        if(!empty($user_email)&&!empty($user_password)){
            //MySql中的SHA()函数用于对字符串进行单向加密
            $query = "SELECT * FROM users WHERE email = '$user_email' AND password = '$user_password'";
            //用用户名和密码进行查询
            $data = mysqli_query($dbc,$query);
            //若查到的记录正好为一条，则设置SESSION，同时进行页面重定向
            if(mysqli_num_rows($data)==1){
                $row = mysqli_fetch_array($data);
                //$_SESSION['user_id']=$row['id'];
                $_SESSION['username']=$row['username'];
                $_SESSION['name']=$row['name'];
                $_SESSION['email']=$row['email'];
                $_SESSION['address']=$row['address'];
                $_SESSION['city']=$row['city'];
                $_SESSION['state']=$row['state'];
                $_SESSION['zip']=$row['zip'];

                $home_url = 'member.php';
                header('Location: '.$home_url);
            }else{//若查到的记录不对，则设置错误信息
                die("<script>alert('Sorry, you must input valid username and password.');location.href='".$_SERVER["HTTP_REFERER"]."';</script>");

            }
        }else{
                die("<script>alert('Sorry, you must input your username and password.');location.href='".$_SERVER["HTTP_REFERER"]."';</script>");
        }
    }
}else{//如果用户已经登录，则直接跳转到已经登录页面
    $home_url = 'memberHome.php';
    header('Location: '.$home_url);
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
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">SOLID.</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li><a href="index.html">HOME</a></li>
            <li><a href="about.html">ABOUT</a></li>
            <li class="active"><a href="signup.html">SIGN UP</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">PAGES <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="blog.html">BLOG</a></li>
                <li><a href="single-post.html">SINGLE POST</a></li>
                <li><a href="portfolio.html">PORTFOLIO</a></li>
                <li><a href="single-project.html">SINGLE PROJECT</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>




            <!-- Main -->
                <section id="main" class="container 50%">
                    <header>
                        <h2>Welcome Back!</h2>
                        <p>Enter Your E-mail Address and Password</p>
                    </header>
                    
                    <div class="box">
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <br>

                                    <input type="text" name="email" id="email" value="" value="" placeholder="Username" >

                                    <input type="text" name="password" id="passord" value="" placeholder="Password" />

                                    <ul class="actions align-center">
                                        <li><input type="submit" value="Sign In" name="submit"></li>
                                    </ul>
                        </form>
        

                          <!-- jQuery is used only for this example; it isn't required to use Stripe -->
                        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

                    </div>
                </section>


        </div>


    </body>
</html>
</html>