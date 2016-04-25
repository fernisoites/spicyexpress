<?php
	require_once 'dbConfig.php';
	session_start();
	if(isset($_SESSION['email'])){
		$home_url = 'member.php';
    	header('Location: '.$home_url);
    }
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

	<!-- BootstrapValidator CSS -->
    <link href="assets/css/bootstrapValidator.min.css" rel="stylesheet"/>
	
    <!-- jQuery and Bootstrap JS -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
		
	<!-- BootstrapValidator -->
    <script src="assets/js/bootstrapValidator.min.js" type="text/javascript"></script>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

	<!-- BootstrapValidator CSS -->
    <link href="assets/css/bootstrapValidator.min.css" rel="stylesheet"/>
	
    <!-- jQuery and Bootstrap JS -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
		
	<!-- BootstrapValidator -->
    <script src="assets/js/bootstrapValidator.min.js" type="text/javascript"></script>
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
				if(isset($_SESSION['email'])) 
				{
				?>
					<li><a href="member.php">Welcome, <?php echo $_SESSION['username'];?></a></li>

					<li><a href="logout.php" class="button">Log Out</a></li>
			<?php  
				} else {
			?>

				<li><a href="signup.php" class="button">Sign Up</a></li>
				<li><a href="login.php" class="button">Sign In</a></li>
			<?php  
				}
			?>
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


	<div class="container">
		<section>
				<form id="registration" method="post" class="form-horizontal" action="registration.php">

					<div class="form-group">
						<label class="col-md-2 control-label" for="1email">Email Address</label>
						<div class="col-md-4">
							<input type="email" class="form-control" id="1email" name="email" placeholder="Your email address" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label" for="1password">Password</label>
						<div class="col-md-4">
							<input type="password" class="form-control" id="1password" name="password" placeholder="Password" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label" for="1confirm_password">Confirm Password</label>
						<div class="col-md-4">
							<input type="password" class="form-control" id="1confirm_password" name="confirm_password" placeholder="Confirm password" />	
						</div>
					</div>		

					<div class="form-group">
						<label class="col-md-2 control-label" for="1address">Address</label>
						<div class="col-md-4">
							<input type="text" class="form-control" id="1address" name="address" placeholder="Address" />	
						</div>
					</div>	

					<div class="form-group">
						<label class="col-md-2 control-label" for="1city">City</label>
						<div class="col-md-4">
							<input type="text" class="form-control" id="1city" name="city" placeholder="City" />	
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label" for="1state">State</label>
						<div class="col-md-4">
							<input type="text" class="form-control" id="1state" name="state" placeholder="State" />
						</div>
					</div>	

					<div class="form-group">
						<label class="col-md-2 control-label" for="1zip">Zip Code</label>
						<div class="col-md-4">
							<input type="text" class="form-control" id="1zip" name="zip" placeholder="Zip Code" />
						</div>
					</div>	

					<button type="submit" class="btn btn-primary">Sign Up</button>

				</form>
			</section>
	</div>

</body>

<script type="text/javascript">
	$(document).ready(function () {
		$("#registration").bootstrapValidator({
			feedbackIcons: {
				valid: "glyphicon glyphicon-ok",
				invalid: "glyphicon glyphicon-remove", 
				validating: "glyphicon glyphicon-refresh"
			}, 
			fields : {
				email :{
					message : "Email address is required",
					validators : {
						notEmpty : {
							message : "Please provide an email address"
						}, 
						emailAddress: {
							message: "Email address was invalid"
						}
					}
				}, 
				password : {
					validators: {
						notEmpty : {
							message : "Password is required"
						},
						stringLength : {
							min: 8,
							message: "Password must be 8 characters long"
						}, 
						different : {
							field : "email", 
							message: "Email address and password can not match"
						}
					}
				}, 
				confirm_password : {
					validators: {
						notEmpty : {
							message: "Confirm password field is required"
						}, 
						identical : {
							field: "password", 
							message : "Password and confirmation must match"
						}
					}
				},
				address: {
	                validators: {
	                    notEmpty: {
	                        message: 'The address is required and can\'t be empty'
	                    }
	                }
	            },
	            city: {
	                validators: {
	                    notEmpty: {
	                        message: 'The city is required and can\'t be empty'
	                    },
	                    regexp: {
	                        regexp: /^[a-zA-Z]+$/,
	                        message: 'The city can only consist of letters'
	                    }
	                }
	            },
	            state: {
	                validators: {
	                    notEmpty: {
	                        message: 'The state is required and can\'t be empty'
	                    },
	                    regexp: {
	                        regexp: /^[a-zA-Z]+$/,
	                        message: 'The state can only consist of letters'
	                    }
	                }
	            },
				zip: {
	                validators: {
	                	notEmpty: {
	                        message: 'The ZIP is required and can\'t be empty'
	                    },
	                    zipCode: {
	                        country: 'US',
	                        message: 'The input is not a valid US zip code'
	                    }
	                }
	            }
			}
		});	
	});
</script>
</html>