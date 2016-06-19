<?php
require_once 'dbConfig.php';
session_start();
?>


<?php
    $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    $artTRK = $_GET['link'];

    $query = "SELECT express1,exp1trackingnum,express2,exp2trackingnum FROM shipment WHERE trackingnum='$artTRK'";
    $result = $dbc->query($query);
    
	while($row=$result->fetch_array()){
		$trk1=$row[0];
		$trk1Num=$row[1];
		$trk2=$row[2];
		$trk2Num=$row[3];
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
				<h3>Updating tracking numbers for <?php echo $artTRK;?></h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->





	
<div id="contactwrap">
			<form method="POST" action="updateProfile.php" name="myform" id="payment-form">

			<p align="center" ><div class="col-sm-4" >
				<label for="Internal tracking number">internal tracking number</label><br>
				<input type="text" name="artTRK" class="form-control" value="<?php echo $artTRK;?>" id="artTRK" placeholder=""/>
			</div> 
		    <br>
		    <br>
		    <br>
		
			<div class="col-sm-4">
				<label for="First Carrier">First Carrier</label><br>
				<input type="text" name="trk1" class="form-control" value="<?php echo $trk1;?>" id="trk1" placeholder=""/>
			</div> 
		    <br>
		    <br>
		    <br>
		
			<div class="col-sm-4">
				<label for="InputAddress1">First Carrier tracking number</label><br>
				<input type="text" name="trk1Num" class="form-control" value="<?php echo $trk1Num;?>" id="trk1Num" placeholder=""/>
			</div>
		    <br>
		    <br>
		    <br>

			<div class="col-sm-4">
				<label for="InputCity1">Second Carrier</label><br>
				<input type="text" name="trk2" class="form-control" value="<?php echo $trk2;?>" placeholder=""/>
			</div>
            <br>
		    <br>
		    <br>

			<div class="col-sm-4">
				<label for="InputState1">Second Carrier tracking number</label><br>
				<input type="text" name="trk2Num" class="form-control" value="<?php echo $trk2Num;?>" placeholder=""/>
			</div>
            <br>
		    <br>
		    <br>
			
			<input type="submit" value="Submit">
			

		</form>
	 </div>

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