<?php session_start() ?>
<?php include 'conDB.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Edit Profile</title>
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
	    		<div class="col-sm-8 contact_us" style="height:550px;">
	    			<div class="contact-form">
	    			<?php
	    			$userid = $_SESSION['userid'];
	    			$query = "select * from user where userid = '$userid' ";
	    			$result	 = mysql_query($query);
	    			$row = mysql_fetch_assoc($result);
	    			if ($row) {
	    				?>
	    				<h2 class="title text-center">Profile Edit</h2>
	    				
							<div>
								<span class="userregerror"><?php 
                                                if (isset($_SESSION['userregerror'])) {

                                                echo $_SESSION['userregerror'];}?>
                                </span>
                                <br>
                                      
                                    </div>
                                    <div class="change_password">
                                        <form action="doeditProfile.php" id="editForm" onsubmit="return validateProfile()" method="post">
                                        		<label for="current_password ">Name:  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp    </label>
                                                <input type="text" name="cname" id="cname" placeholder= "<?php echo $row['customname'];?>" onchange="validateName()" value="<?php echo $row['customname'];?>"> </input>
                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                <label for="new_password "> Email:&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp</label>
                                                <?php $emailid = $row['email'];?>
                                                &nbsp<input type="email" id="cemail" name="cemail" placeholder= "<?php echo $row['email'];?>" value="<?php echo $row['email'];?>">
                                                <input type="hidden" id="hemail" name="hemail" placeholder= "<?php echo $row['email'];?>" value="<?php echo $row['email'];?>">
                                                		

                                                <br/>
                                                <br/>
                                                <label for="current_password ">Current Password </label>
                                                <input type="password" name="cpassword" value="<?php echo $row['password'];?>" readonly ></input>
                                                <input type="hidden" name="hpassword" value="<?php echo $row['password'];?>" >
                                               &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                <label for="new_password ">New Password &nbsp </label>
                                                <input type="password" name="newpassword">
                                                <br/>
                                                <br/>
                                                <label for="current_password ">Address &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  &nbsp&nbsp&nbsp&nbsp&nbsp</label>
                                                <input type="text" name="caddress" placeholder= "<?php echo $row['address'];?>" value="<?php echo $row['address'];?>">
                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                                <label for="new_password ">Phone Number &nbsp&nbsp</label>
                                                <input type="number" name="cphno" placeholder= "<?php echo $row['phno'];?>" value="<?php echo $row['phno'];?>">
                                                <br/>
                                                <br/>
                                                <input type="submit" name="submit" class="update" value="Edit Profile">
                                                <a href="myprofile.php"> <button type="button" class="profilecancel">Cancel</button></a>
                                        </form>
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
     function validateName()
	{

	var name =  document.getElementById('cname').value;
if (name.match(/^[0-9]+$/))
    {
    document.getElementById('cname').value = "";
        alert('Name with Only Number are not allowed');
        return false;
    }
   else if (name.match(/^[a-zA-Z]+$/))
    {
   return true;
 }
 else  if (name.match(/^[0-9]{1,100}[a-zA-Z]+$/))
 {
  document.getElementById('cname').value = "";
        alert('Name Canot Start with Number,Can Put Number behind Character(eg.mya123)is ok.');
        return false;
 }
 else
  {
    return true;
      }

}
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
$(document).ready(function(){ //newly added 
$('#cemail').change(function() {
    var emailVal = $('#cemail').val(); // assuming this is a input text field    
    
  var hemailVal = $('#hemail').val();
  if (emailVal == hemailVal ) {return true;}
    $.post('checkuseremail.php', {'cemail' : emailVal}, function(data) {
   if (data < 1)
   { 
    
    return true;
   }
   else
   {

        alert("Sorry .. User Already Exist With this Email");
        document.getElementById('cemail').value = "";
        
        
        $('#cemail').focus();
        return false;
   }
});

});
});
    </script>
</body>
</html>