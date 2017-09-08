<?php session_start() ?>
<?php include 'conDB.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>My Profile</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel='shortcut icon' type='image/x-icon' href='images/home/favicon.ico' />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">

						</div>
					</div>
					<div class="col-sm-6">
						<?php  if(isset($_SESSION['userid'])) { ?>
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav ">
								<li class="profile"><a href="myprofile.php" style="color:darkgoldenrod">My Profile</a></li>
								<li><a href="userLogout.php" class="logoutlink" style="color:blue">Logout</a></li>
								<li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/signup"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.linkedin.com/start/join"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="https://dribbble.com/session/new"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="https://accounts.google.com/login"><i class="fa fa-google-plus"></i></a></li>

							</ul>
							
							</div>
							<?php }else{?>
							<div class="social-icons pull-right">
							<ul class="nav navbar-nav ">
								<li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/signup"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.linkedin.com/start/join"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="https://dribbble.com/session/new"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="https://accounts.google.com/login"><i class="fa fa-google-plus"></i></a></li>
							</ul>

							</div>
								<?php } ?>

					</div>
				</div>
			</div>
		</div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<img src="images/home/logo.png" alt="" />
						</div>
						<div class="btn-group pull-right">



						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php">Home</a></li>
								<li class="dropdown"><a href="onSale.php">OnSale</a>

                                </li>
								<li class="dropdown"><a href="orderCart.php">OrderCart</a>

                                </li>

								<li><a href="aboutUs.php">ContactUs</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->


	</header><!--/header-->

	 <div id="contact-page" class="container">
    	<div class="bg">

    		<div class="row">
	    		<div class="col-sm-8 contact_us" style="height:550px;">
	    			<div class="contact-form">
	    			<?php
	    			$userid = $_SESSION['userid'];
	    			$query = "select * from user where userid = '$userid' ";
	    			$result	 = mysql_query($query);
	    			$row = mysql_fetch_assoc($result);
	    			if ($row) {
	    				?>
	    				<h2 class="title text-center">My Profile</h2>
	    				<div class="status alert alert-success" style="display: none"></div>


				               <label class="form-group col-md-4">Name:</label>

				            <div class="form-group col-md-8">
				            	<label class="form-group col-md-4"><?php echo $row['customname'];?></label>

				            </div>
				                 <label class="form-group col-md-4">Email:</label>

				            <div class="form-group col-md-8">

				                <label class="form-group col-md-4"><?php echo $row['email'];?></label>
				            </div>



				            <label class="form-group col-md-4">Address</label>

				            <div class="form-group col-md-8">

				                 <label class="form-group col-md-4"><?php echo $row['address'];?></label>
				            </div>
				            <label class="form-group col-md-4">Phone No:</label>

				            <div class="form-group col-md-8">

				                <label class="form-group col-md-4"><?php echo $row['phno'];?></label>
				            </div>

							<div>
								<span class="userregerror"><?php 
                                                if (isset($_SESSION['userregerror'])) {

                                                echo $_SESSION['userregerror'];}?>
                                </span>
                                <br>
                                       
                                        <a href="editProfile.php">
                                        	<input type="button"  class="update" value="Edit Profile">
                                        </a>
                                    </div>
                             


				    <?php } ?>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">

    			</div>
	    	</div>
    	</div>
    </div><!--/#contact-page-->

	<footer id="footer"><!--Footer-->


		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">AzureShoeGallery © AZSG</p>
				</div>
			</div>
		</div>

	</footer><!--/Footer-->



    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="js/gmaps.js"></script>
	<script src="js/contact.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
     $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).attr("value")=="red"){
                $("#red").toggle();
            }

        });
    });

	function validateProfile()
	{	var cpassword = document.forms["editForm"]["cpassword"].value;
		var hpassword = document.forms["editForm"]["hpassword"].value;
		var newpassword = document.forms["editForm"]["newpassword"].value;

		if(hpassword != cpassword  )
		{
			alert("Please Enter Current Password");
			return false;

		}




	}

    </script>
</body>
</html>