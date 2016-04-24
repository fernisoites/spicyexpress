<?php
	session_start();
	if(!isset($_SESSION['username'])){
			$home_url = 'login.php';
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
					<li><a href="member.php">Welcome, <?php echo $_SESSION['name'];?></a></li>

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
				<h3>Create a Shipment</h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->
	
<!-- *****************************************************************************************************************
	 CONTACT WRAP
	 ***************************************************************************************************************** -->

	<div id="contactwrap">
	 
	<!-- *****************************************************************************************************************
	 CONTACT FORMS
	 ***************************************************************************************************************** -->

	<div class="container">
	 	<div class="row">
	 		<form role="form" method="post" action="processingdata.php">
	 		<div class="col-lg-6">
	 			<h4>Where is this shipment going?</h4>
	 			<div class="hline"></div>

					  <div class="form-group">
					    <label for="InputName1">Company or Name</label>
					    <input type="text" class="form-control" id="inputname" name="toName">
					  </div>
					  <div class="form-group">
					    <label for="InputAddr1">Address</label>
					    <input type="text" class="form-control" id="inputaddr" name="toAddress">
					  </div>

					  <div class="form-group">
						  <div class="row">
						  	<div class="col-lg-6">
						  		<label for="InputEmail1">Email</label>
					    		<input type="email" class="form-control" id="inputemail" name="toEmail">
						  	</div>
						  	<div class="col-lg-6">
						  		<label for="InputCity1">City</label>
					    		<input type="text" class="form-control" id="inputcity" name="toCity">
						    </div>
						  </div>
					  </div>

					  <div class="form-group">
						  <div class="row">
						  	<div class="col-lg-6">
						  		<label for="InputState1">State</label>
						    	<input type="text" class="form-control" id="inputstate" name="toState">
						  	</div>
						  	<div class="col-lg-6">
						  		<label for="InputZIP1">ZIP</label>
						    	<input type="text" class="form-control" id="inputzip" name="toZip">
						    </div>
						  </div>
					  </div>
			</div><! --/col-lg-6 -->
	 		
	 		<div class="col-lg-6">
	 			<h4>Where is this shipment coming from?</h4>
	 			<div class="hline"></div>
					  <div class="form-group">
					    <label for="InputName1">Company or Name</label>
					    <input type="text" class="form-control" id="inputname" value="<?php echo $_SESSION['name']?>" name="fromName">
					  </div>
					  <div class="form-group">
					    <label for="InputAddr1">Address</label>
					    <input type="text" class="form-control" id="inputaddr" value="<?php echo $_SESSION['address']?>" name="fromAddress">
					  </div>
					  <div class="form-group">
						  <div class="row">
						  	<div class="col-lg-6">
						  		<label for="InputEmail1">Email</label>
					    		<input type="email" class="form-control" id="inputemail" value="<?php echo $_SESSION['email']?>" name="FromEmail">
						  	</div>
						  	<div class="col-lg-6">
						  		<label for="InputCity1">City</label>
					    		<input type="text" class="form-control" id="inputcity" value="<?php echo $_SESSION['city']?>" name="FromCity">
						    </div>
						  </div>
					  </div>
					  <div class="form-group">
						  <div class="row">
						  	<div class="col-lg-6">
						  		<label for="InputState1">State</label>
						    	<input type="text" class="form-control" id="inputstate" value="<?php echo $_SESSION['state']?>" name="FromState">
						  	</div>
						  	<div class="col-lg-6">
						  		<label for="InputZIP1">ZIP</label>
						    	<input type="text" class="form-control" id="inputzip" value="<?php echo $_SESSION['zip']?>" name="FromZip">
						    </div>
						  </div>
						</div>
					</div>
		<center><input type="submit" class="btn btn-theme" value="Submit"></input></center>
		</form>
	 </div><! --/container -->
</div>

	<!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
	 <div id="footerwrap">
	 	<div class="container">
		 	<div class="row">
		 		<div class="col-lg-4">
		 			<h4>About</h4>
		 			<div class="hline-w"></div>
		 			<p>OMG OMG OMG OMG OMG OMG OMG OMG OMG OMG OMG OMG OMG OMG OMG OMG OMG OMG .</p>
		 		</div>
		 		<div class="col-lg-4">
		 			<h4>Social Links</h4>
		 			<div class="hline-w"></div>
		 			<p>
		 				<a href="#"><i class="fa fa-dribbble"></i></a>
		 				<a href="#"><i class="fa fa-facebook"></i></a>
		 				<a href="#"><i class="fa fa-twitter"></i></a>
		 				<a href="#"><i class="fa fa-instagram"></i></a>
		 				<a href="#"><i class="fa fa-tumblr"></i></a>
		 			</p>
		 		</div>
		 		<div class="col-lg-4">
		 			<h4>Our Bunker</h4>
		 			<div class="hline-w"></div>
		 			<p>
		 				Some Ave, 987,<br/>
		 				22903 VA, Charlottesville,<br/>
		 				United States.<br/>
		 			</p>
		 		</div>
		 	
		 	</div><! --/row -->
	 	</div><! --/container -->
	 </div><! --/footerwrap -->

	<!--<div id="contactwrap">
		<form method="POST" action="order.php" class="form-horizontal">
			<font size="5em" color = "black">Personal Information</font>
			<br>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
				  		<input type="text" class="form-control" name="fromName" value="" placeholder="Name" />
				    </div>
				    <div class="col-md-8">
				  		<input type="text" class="form-control" name="fromAddress" value="" id="fromAddress" placeholder="Address"/>
				    </div>

				</div>
				
				<input type="email" class="form-control" name="fromEmail" value="" placeholder="Email" />
				
				<input type="text" class="form-control" name="fromCity" value="" placeholder="City" />
				<input type="text" class="form-control" name="fromState" value="" placeholder="State"/>
				<input type="text" class="form-control" name="fromZip" value="" placeholder="Zip Code"/>
								<br>
							    <br>
				<font size="5em" color = "black"><center>Destination</center></font>
								<br>

				<input type="text" class="form-control" name="toName" value="" placeholder="Name" />
				<input type="email" class="form-control" name="toEmail" value="" placeholder="Email" />
				<input type="text" class="form-control" name="toAddress" value="" placeholder="Address"/>
				<input type="text" class="form-control" name="toCity" value="" placeholder="City"/>
				<input type="text" class="form-control" name="toState" value="" placeholder="State"/>
				<input type="text" class="form-control" name="toZip" value="" placeholder="Zip Code"/>
	                            <br>
								<br>
				<font size="5em" color = "black"><center>Package Information</center></font>
								<br>
				<input type="text" class="form-control" name="weight" value="" placeholder="weight"/>
				<input type="text" class="form-control" name="dimension" value="" placeholder="Estimate dimension (in X in X in)" />
										<br>
				<input type="submit" value="Submit">
			</div>
		</form>
	</div>
-->
						
		<!-- Scripts -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	    <script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/retina-1.1.0.js"></script>
		<script src="assets/js/jquery.hoverdir.js"></script>
		<script src="assets/js/jquery.hoverex.min.js"></script>
		<script src="assets/js/jquery.prettyPhoto.js"></script>
	  	<script src="assets/js/jquery.isotope.min.js"></script>
	  	<script src="assets/js/custom.js"></script>

	</body>
</html>