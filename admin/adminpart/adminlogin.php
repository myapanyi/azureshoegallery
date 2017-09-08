<?php include 'config/db.php';?>
<?php session_start();
if (isset($_SESSION['admin']['lastActivity'])) {
	header("location: index.php");
}
else{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AzureShoeGallery|Admin Login </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- favicon -->
    <link rel='shortcut icon' type='image/x-icon' href='images/home/favicon.ico' />
    <!-- Font Awesome -->

    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
<a href="../.." style="line-height:40px;margin-left:30px;color:blueviolet;">AzureShoeGallery</a>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">

						<?php  if(isset($_SESSION['admin']["adminerror"])) { ?>


							         <div class="adminerror"><?php echo $_SESSION['admin']["adminerror"]; ?></div>
						<?php }?>
            <form action="doLogin.php" method="post" id="login-form">
              <h1>Login Form</h1>
              <div class="x_content bs-example-popovers">

                  </div>
              <div>

                <input type="text" class="form-control" name="username" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
              </div>
              <div>

              <a href="loginRegister.php" class="to_register adminregister">New Register? </a>
                <button class="btn btn-default " name="submit" type="submit" >Log in</button>

              </div>

              <div class="clearfix"></div>
              <?php unset($_SESSION['admin']["adminerror"]);?>


           
          </section>
        </div>



      </div>
    </div>
    <script type="text/javascript">


    function validateRegister()
	{	var password = document.forms["registerForm"]["password"].value;
		var confirmpassword = document.forms["registerForm"]["confirmpassword"].value;
		var name = document.forms["registerForm"]["name"].value;

	  if (!name.match(/^[a-zA-Z]+$/))
        {
            alert('Only alphabets are allowed');

            return false;
        }
		if(password != confirmpassword  )
		{
			alert("Please Enter Same Password");
			return false;

		}


        return true;

	}

	window.URL = window.URL || window.webkitURL;

	var fileSelect = document.getElementById("fileSelect"),
	    fileElem = document.getElementById("fileElem"),
	    fileList = document.getElementById("fileList");

	fileSelect.addEventListener("click", function (e) {
	  if (fileElem) {
	    fileElem.click();
	  }
	  e.preventDefault(); // prevent navigation to "#"
	}, false);

	function handleFiles(files) {
	  if (!files.length) {
	    fileList.innerHTML = "<p>No files selected!</p>";
	  } else {
	    fileList.innerHTML = "";
	    var list = document.createElement("div");
	    fileList.appendChild(list);
	    for (var i = 0; i < files.length; i++) {
	      var li = document.createElement("div");
	      list.appendChild(li);

	      var img = document.createElement("img");
	      img.src = window.URL.createObjectURL(files[i]);
	      img.height = 190;
	      img.width = 190;
	      img.onload = function() {
	        window.URL.revokeObjectURL(this.src);
	      }
	      li.appendChild(img);
	      //var info = document.createElement("span");
	     // info.innerHTML = files[i].name + ": " + files[i].size + " bytes";
	      //li.appendChild(info);
	    }
	  }
	}
	</script>
  </body>
</html>
<?php }?>