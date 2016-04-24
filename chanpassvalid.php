<?php
require_once 'dbConfig.php';
session_start();

$error_msg = "";

if(!isset($_SESSION['email'])){
    if(isset($_POST['submit'])){//用户提交登录表单时执行如下代码
        $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $email = $_SESSION['email'];
        $OP = trim($_POST['OldPass']);
        $NP = trim($_POST['NewPass']);
        $CNP = trim($_POST['ConfirmNewPass']);
        if(!empty($username)&&!empty($OP)){
            //MySql中的SHA()函数用于对字符串进行单向加密
            $query = "SELECT * FROM users WHERE email = '$email' AND password = '$OP'";
            //用用户名和密码进行查询
            $data = mysqli_query($dbc,$query);
            //若查到的记录正好为一条，则设置SESSION，同时进行页面重定向
            if (mysqli_num_rows($data)) {
                if ($NP==$CNP) {
                    mysql_query("UPDATE users set password='".$NP."'WHERE email='".$email."'");
                    echo "<div class='op-alert'>恭喜，密码修改成功！</div><div id='dialog-mask'></div>";
                    echo '<meta http-equiv=refresh content=2;url="index.php">';
                } else {
                    echo "<div class='op-alert'>两次输入的新密码不同，请重新输入!</div><div id='dialog-mask'></div>";
                    echo '<meta http-equiv=refresh content=2;url="chanpassvalid.php">';
                }
            } else {
                echo "<div class='op-alert'>旧密码不正确，请重新输入!</div><div id='dialog-mask'></div>";
                echo '<meta http-equiv=refresh content=2;url="chanpassvalid.php">';
            }
        }
    }
}else{//如果用户已经登录，则直接跳转到已经登录页面

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
          <a class="navbar-brand" href="index.php">SOLID.</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li><a href="index.php">HOME</a></li>
            <li><a href="login.php">ABOUT</a></li>
            <li class="active"><a href="signup.php">SIGN UP</a></li>
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
                        <div id="blue">
                            <div class="container">
                                <div class="row">
                                    <h3>Change Your Password</h3>
                                </div><!-- /row -->
                            </div> <!-- /container -->
                        </div><!-- /blue -->

                         <div id="contactwrap">
                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="myform" id="payment-form">
                                <!--<font size="5em" color = "black"><center>Personal Information</center></font>-->
                                <div class="form-group">
                                    <label for="InputOldPass">Your Old Password</label><br>
                                    <input type="text" name="OldPass" value="" placeholder="" onblur="ValidateOldPass()" />
                                </div>

                                <div class="form-group">
                                    <label for="InputNewPass">Your New Password</label><br>
                                    <input type="text" name="NewPass" value="" value="" placeholder="" onblur="ValidateNewPass()"/>
                                </div>

                                <div class="form-group">
                                    <label for="ConfirmNewPass">Confirm Your New Password</label><br>
                                    <input type="text" name="ConfirmNewPass" value="" placeholder="" onblur="ValidateConfirmNewPass()" />
                                </div>

                                <p><a href="#" name= 'submit' class="btn btn-theme">Submit</a></p>
                            </form>
                         </div>
                    </header>
                    
                </section>


                        <script>

                        function ValidateOldPass(){
                            var upassword = document.myform.OldPass;
                            var upasswordformat=/^[a-zA-z ]{1,50}$/;
                            //var passowordformat=/^[a-zA-z1-9@#$%&]{1,50}$/;
                            if (upassword.value.length<8 || uname.value.length>16){
                              alert("Length of Your Password Should Be Between 8 and 16");
                              upassword.focus();
                              return false;
                            }
                            //if (!upassword.value.match(passwordformat)){
                            //  alert("Passord Should Only Contain a-zA-z0-9@#$%&");
                            //  upassword.focus();
                            //  return false;
                            //}
                            if (!upassword.value.match(upasswordformat)){
                                alert("Your Password Should Only Contain Characters");
                                upassword.focus();
                                return false;
                            }

                            if (upassword.value.trim().length<1){
                              alert("Please Enter Your Old Password");
                              upassword.focus();
                              return false;
                            }
                        }

                        function ValidateNewPass(){
                            var upassword = document.myform.NewPass;
                            var upasswordformat=/^[a-zA-z ]{1,50}$/;
                            //var passowordformat=/^[a-zA-z1-9@#$%&]{1,50}$/;
                            if (upassword.value.length<8 || uname.value.length>16){
                              alert("Length of Your Password Should Be Between 8 and 16");
                              upassword.focus();
                              return false;
                            }
                            //if (!upassword.value.match(passwordformat)){
                            //  alert("Passord Should Only Contain a-zA-z0-9@#$%&");
                            //  upassword.focus();
                            //  return false;
                            //}
                            if (!upassword.value.match(upasswordformat)){
                                alert("Your Password Should Only Contain Characters");
                                upassword.focus();
                                return false;
                            }

                            if (upassword.value.trim().length<1){
                              alert("Please Enter Your New Password");
                              upassword.focus();
                              return false;
                            }
                        }

                        function ValidateConfirmNewPass(){
                            var upassword = document.myform.NewPass;
                            var uconfirmpass = document.myform.ConfirmNewPass;
                            if (upassword.value != uconfirmpass.value){
                            alert("New Passwords Should Match");
                            uconfirmpass.focus();
                            return false;
                          }

                          if (uconfirmpasss.value.trim().length<1){
                            alert("Please Confirm Your New Password");
                            uconfirmpass.focus();
                            return false;
                          }
                        }


                        </script>
                        
                        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

                          <!-- jQuery is used only for this example; it isn't required to use Stripe -->
                        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

        </div>


    </body>
</html>