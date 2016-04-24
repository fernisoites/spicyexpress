<?php
require_once 'dbConfig.php';
session_start();
        $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $user_username = mysqli_real_escape_string($dbc,trim($_POST['name']));
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>UVA - Bootstrap 3 Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script src="assets/js/modernizr.js"></script>
  </head>

  <body>

    <!-- Fixed navbar -->
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
				if(isset($_SESSION['username'])) 
				{
				?>
					<li><a href="member.php">Welcome, <?php echo $_SESSION['username'];?></a></li>

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
				<h3>Sign Up</h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->

	<div id="contactwrap">
 	<div class="col-lg-8">
	 		<h4>Just join and enjoy our services!</h4>
	 		<div class="hline"></div>
			<form method="POST" action="registration.php" name="myform" id="payment-form"><br>
			<!--<font size="5em" color = "black"><center>Personal Information</center></font>-->

			<div style="width:50%; margin:0 auto; overflow:auto; _display:inline-block;"> 
    		<div style="width:200px; float:right">

			<div class="form-group">
				<label for="InputAddress1">Address</label><br>
				<input type="text" name="address" id="address" value="" placeholder="Address" onblur="ValidateAddress()"/>
			</div>

			<div class="form-group">
				<label for="InputCity1">City</label><br>
				<input type="text" name="city" value="" placeholder="City" onblur="ValidateCity()" />
			</div>

			<div class="form-group">
				<label for="InputState1">State</label><br>
				<input type="text" name="state" value="" placeholder="State" onblur="ValidateState()"/>
			</div>

			<div class="form-group">
				<label for="InputZip1">Zip Code</label><br>
				<input type="text" name="zip" value="" placeholder="Zip Code" onblur="ValidateZip()"/>
			</div>
    		</div>

   			<div style="margin-right:210px">
			<div class="form-group">
				<label for="InputName">Your Name</label><br>
				<input type="text" name="name" value="" placeholder="Name" onblur="ValidateName()"/>
			</div>

			<div class="form-group">
				<label for="InputEmail">Email address</label><br>
				<input type="email" name="email" value="" value="" placeholder="Email" onblur="ValidateEmail()"/>
			</div>
			<div class="form-group">
				<label for="InputPassword1">Password</label><br>
				<input type="text" name="password" value="" placeholder="Password" onblur="ValidatePassword()" />
			</div>

			<div class="form-group">
				<label for="InputConfirmPassWord1">Confirm Password</label><br>
				<input type="text" name="confirm_password" value="" placeholder="Confirm Password" onblur="ValidatePassword()" />
			</div>
		    </div> 
		</div> 

			<p><a href="#" class="btn btn-theme">Sign Up</a></p>
		</div>
		</form>
	 </div>

						<script>

						function ValidateName(){
							var uname = document.myform.name;
							var nameformat=/^[a-zA-z ]{1,50}$/;
							if (uname.value.length<1 || uname.value.length>50){
						  	alert("Length of Your Name Should Be Between 1 And 50");
						  	uname.focus();
						  	return false;
						  }

						  if (!uname.value.match(nameformat)){
						  	alert("Your Name Should Only Contain Characters");
						  	uname.focus();
						  	return false;
						  }

						  if (uname.value.trim().length<1){
						  	alert("please enter name");
						  	uname.focus();
						  	return false;
						  }
						}

						function ValidatePassword(){
							var upassword = document.myform.password;
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
						  	  alert("Please Enter Your Password");
						  	  upassword.focus();
						  	  return false;
						    }
						}

						function ValidateConfirmPass(){
							var upassword = document.myform.password;
							var uconfirmpass = document.myform.confirm_password;
							if (upassword.value != uconfirmpass.value){
						  	alert("Passwords Should Match");
						  	uconfirmpass.focus();
						  	return false;
						  }

						  if (uconfirmpasss.value.trim().length<1){
						  	alert("Please Confirm Your Password");
						  	uconfirmpass.focus();
						  	return false;
						  }
						}

						function ValidateEmail(){
							var uemail = document.myform.email;
							var mailformat=/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
                            if (uemail.value.length<1){
						  	  alert("E-mail Is Required");
						  	  uemail.focus();
						  	  return false;
						    }

						    if (!uemail.value.match(mailformat)){
						  	  alert("Invalid E-mail Address");
						  	  uemail.focus();
						  	  return false;
						    }

						    if (uemail.value.trim().length<1){
						  	alert("please enter email");
						  	uemail.focus();
						  	return false;
						  }
						}

						function ValidateAddress(){
					      var uaddress = document.myform.address;
						  var addressformat=/^[a-zA-z0-9-#, ]{1,50}$/;
						  if (uaddress.value.length<1){
						  	alert("Address Is Required");
						  	uaddress.focus();
						  	return false;
						  }

						  if (!address.value.match(addressformat)){
						  	alert("Invalid Address");
						  	uaddress.focus();
						  	return false;
						  }

						  if (uaddress.value.trim().length<1){
						  	alert("please enter address");
						  	uaddress.focus();
						  	return false;
						  }
						}

						function ValidateCity(){
							var ucity = document.myform.city;
							var cityformat=/^[a-zA-z ]{1,50}$/;
						  if (ucity.value.length<1){
						  	alert("City Is Required");
						  	ucity.focus();
						  	return false;
						  }

						  if (!ucity.value.match(cityformat)){
						  	alert("Invalid City Name");
						  	ucity.focus();
						  	return false;
						  }

						  if (ucity.value.trim().length<1){
						  	alert("please enter city");
						  	ucity.focus();
						  	return false;
						  }
						}

						function ValidateState(){
							var ustate = document.myform.state;
							var stateformat=/^[a-zA-z ]{1,50}$/;
						  if (ustate.value.length<1){
						  	alert("State Is Required");
						  	ustate.focus();
						  	return false;
						  }

						  if (!ustate.value.match(stateformat)){
						  	alert("Invalid State Name");
						  	ustate.focus();
						  	return false;
						  }

						  if (ustate.value.trim().length<1){
						  	alert("please enter state");
						  	ustate.focus();
						  	return false;
						  }
						}

						function ValidateZip(){
							var uzip = document.myform.zip;
							var zipformat=/^[0-9]{1,50}$/;
						  if (uzip.value.length<1){
						  	alert("Zip Code Is Required");
						  	uzip.focus();
						  	return false;
						  }

						  if (!uzip.value.match(zipformat)){
						  	alert("Invalid Zip Code");
						  	uzip.focus();
						  	return false;
						  }

						  if (uzip.value.trim().length<1){
						  	alert("please enter zip");
						  	uzip.focus();
						  	return false;
						  }

						}

						function ValidateCardNumber(){
							var ucardnumber = document.myform.cardnumber;
							var cardnumberformat=/^[0-9]{14,16}$/;
						  if (ucardnumber.value.length<1){
						  	alert("Card Number Is Required");
						  	ucardnumber.focus();
						  	return false;
						  }

						  if (!ucardnumber.value.match(cardnumberformat)){
						  	alert("Invalid Card Number");
						  	ucardnumber.focus();
						  	return false;
						  }		

						  if (ucardnumber.value.trim().length<1){
						  	alert("please enter cardnumber");
						  	ucardnumber.focus();
						  	return false;
						  }						
						}

						function ValidateMonth(){
							var uexpriymonth = document.myform.expiration_month;
							var expirymonthformat=/^[0-9]{1,2}$/;
						  if (uexpriymonth.value.length<1){
						  	alert("Expiration Month Is Required");
						  	uexpriymonth.focus();
						  	return false;
						  }

						  if (!uexpriymonth.value.match(expirymonthformat) || parseInt(uexpriymonth.value) == 0 || parseInt(uexpriymonth.value) > 12){
						  	alert("Invalid Expiration Month");
						  	uexpriymonth.focus();
						  	return false;
						  }

						  if (uexpriymonth.value.trim().length<1){
						  	alert("please enter expiremonth");
						  	uexpriymonth.focus();
						  	return false;
						  }								
						}

						function ValidateYear(){
							var uexpriyyear = document.myform.expiration_year;
							var expiryyearformat=/^[0-9]{4}$/;
						  if (uexpriyyear.value.length<1){
						  	alert("Expiration Year Is Required");
						  	uexpriyyear.focus();
						  	return false;
						  }

						  if (!uexpriyyear.value.match(expiryyearformat) || parseInt(uexpriyyear.value) < 2016 || parseInt(uexpriyyear.value) > 2040){
						  	alert("Invalid Expiration Year");
						  	uexpriyyear.focus();
						  	return false;
						  }	

						  if (uexpriyyear.value.trim().length<1){
						  	alert("please enter expireyear");
						  	uexpriyyear.focus();
						  	return false;
						  }

						}

						function ValidateCVV(){
							var ucvv = document.myform.cvv;
							var cvvformat=/^[0-9]{3}$/;
						  if (ucvv.value.length<1){
						  	alert("CVV Is Required");
						  	ucvv.focus();
						  	return false;
						  }

						  if (!ucvv.value.match(cvvformat)){
						  	alert("Invalid CVV");
						  	ucvv.focus();
						  	return false;
						  }	

						  if (ucvv.value.trim().length<1){
						  	alert("please enter cvv");
						  	ucvv.focus();
						  	return false;
						  }


						}
						</script>
						
						<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

						  <!-- jQuery is used only for this example; it isn't required to use Stripe -->
						  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

						  <script type="text/javascript">
						    // This identifies your website in the createToken call below
						    Stripe.setPublishableKey('pk_test_qsRW1H2hZShCP9i8DihkIJY2');
				            function stripeResponseHandler(status, response) {
				                if (response.error) {
				                    // re-enable the submit button
				                    $('.submit-button').removeAttr("disabled");
				                    // show the errors on the form
				                    $(".payment-errors").html(response.error.message);
				                } else {
				                    var form$ = $("#payment-form");
				                    // token contains id, last4, and card type
				                    var token = response['id'];
				                    // insert the token into the form so it gets submitted to the server
				                    form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
				                    // and submit
				                    form$.get(0).submit();
				                }
				            }
				            $(document).ready(function() {
				                $("#payment-form").submit(function(event) {
				                    // disable the submit button to prevent repeated clicks
				                    $('.submit-button').attr("disabled", "disabled");
				                    // createToken returns immediately - the supplied callback submits the form if there are no errors
				                    Stripe.createToken({
				                        number: $('.card-number').val(),
				                        cvc: $('.card-cvc').val(),
				                        exp_month: $('.card-expiry-month').val(),
				                        exp_year: $('.card-expiry-year').val()
				                    }, stripeResponseHandler);
				                    return false; // submit from callback
				                });
				            });
						  </script>
					</div>
				</section>


		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>