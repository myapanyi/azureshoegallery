<?php session_start() ?>
<?php include 'conDB.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>AzureShoeGallery|User Register</title>
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
    <link href="css/style.css" rel="stylesheet">
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
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav ">
								
								<li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/signup"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.linkedin.com/start/join"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="https://dribbble.com/session/new"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="https://accounts.google.com/login"><i class="fa fa-google-plus"></i></a></li>

							</ul>
						</div>
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

								<li><a href="aboutUs.php">ContactUS</a></li>
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
	    		<div class="col-sm-8 contact_us">
	    			<div class="contact-form">
	    				<?php
	    			$userid = $_SESSION['userid'];
	    			$query = "select * from user where userid = '$userid' ";
	    			$result	 = mysql_query($query);
	    			$row = mysql_fetch_assoc($result);
	    			if ($row) {
	    				$email = $row['email'];
	    			}
	    				?>
	    				<h2 class="title text-center">User Register</h2>
	    				<div class="status alert alert-success" style="display: none"></div>


				    	<form id="registerForm" class="contact-form row" name="contact-form" method="post" action="doUserRegister.php" onsubmit="return validateRegister()">


				               <label class="form-group col-md-4">Name:</label>


				            <div class="form-group col-md-8">

				                <input type="text" name="name" id="name" class="form-control" required="required" placeholder="Name" onchange="validateName()" >
				            </div>
				                 <label class="form-group col-md-4">Email:</label>

				            <div class="form-group col-md-8">

				                <input type="email" name="email" id="email" class="form-control" required="required" placeholder="Email">
				                
				            </div>
				                 <label class="form-group col-md-4">Password:</label>

				            <div class="form-group col-md-8">

				                <input type="password" name="password" id="password" class="form-control" required="required" placeholder="Password">
				            </div>
				                 <label class="form-group col-md-4">Confirm Password:</label>

				            <div class="form-group col-md-8">

				                <input type="password" name="confirmpassword" id="comfirmpassword" onchange="validatePassword()"  class="form-control" required="required" placeholder="Confirm Password">
				            </div>
				            <label class="form-group col-md-4">Address</label>

				            <div class="form-group col-md-8">

				                <input type="text" name="address" class="form-control" required="required" placeholder="Address">
				            </div>
				            <label class="form-group col-md-4">Phone No:</label>

				            <div class="form-group col-md-8">

				                <input type="number" name="phoneno" min="0" onchange="select()" class="form-control" required="required" placeholder="Phone Number">
				            </div>


				            <div class="form-group col-md-12 btn_align">
				                <input type="submit" name="submit" class="btn btn-primary" value="Register">
				                <input type="reset" name="reset" value="Reset" class="btn_reset">
				            </div>

				        </form>
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

    function validateRegister()
	{	var password = document.forms["registerForm"]["password"].value;
		var confirmpassword = document.forms["registerForm"]["confirmpassword"].value;
		var phoneno = document.forms["registerForm"]["phoneno"].value;
		var name = document.forms["registerForm"]["name"].value;
	 if (!name.match(/^[a-zA-Z]+$/))
        {
            alert('Space and alphabets not allowed...');
            return false;
        }
		if(password != confirmpassword  )
		{
			alert("Please Enter Same Password");
			return false;

		}

	}
	   function validateName()
	{

	var name =  document.getElementById('name').value;
if (name.match(/^[0-9]+$/))
    {
    document.getElementById('name').value = "";
        alert('Name with Only Number are not allowed');
        return false;
    }
   else if (name.match(/^[a-zA-Z]+$/))
    {
   return true;
 }
 else  if (name.match(/^[0-9]{1,100}[a-zA-Z]+$/))
 {
  document.getElementById('name').value = "";
        alert('Name Canot Start with Number,Can Put Number behind Character(eg.mya123)is ok.');
        return false;
 }
 else
  {
    return true;
      }

}
$(document).ready(function(){ //newly added 
$('#email').change(function() {
    var emailVal = $('#email').val(); // assuming this is a input text field    
    
  
  if (emailVal == hemailVal ) {return true;}
    $.post('checkuseremail.php', {'cemail' : emailVal}, function(data) {
   if (data < 1)
   { 
    
    return true;
   }
   else
   {

        alert("Sorry .. User Already Exist With this Email");
        document.getElementById('email').value = "";
        
        
        $('#email').focus();
        return false;
   }
});

});
});

	</script>
</body>
</html>