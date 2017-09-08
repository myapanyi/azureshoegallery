<?php session_start();
if (empty($_SESSION['admin']['auth'])) {

  header("location: adminlogin.php");
}
else {?>
<?php include 'config/db.php'; ?>
<!DOCTYPE html>
<?php include 'setting/settingConfiguration.php';?>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
       <meta name="description" content="<?php echo $template['description'] ?>">
        <meta name="author" content="<?php echo $template['author'] ?>">

    <title>AzureShoeGallery|ProfileEdit</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- favicon -->
    <link rel='shortcut icon' type='image/x-icon' href='images/home/favicon.ico' />
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <span class="site_title"><i class="fa fa-paw"></i> <?php echo $template['title'] ?></span>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
              <?php if (isset($_SESSION['admin']['auth'])) {
          $adminauth = $_SESSION['admin']['auth'];

                }
                 if (isset($_SESSION['admin']['userName'])) {
          $adminpass = $_SESSION['admin']['userName'];
          
                }
                ?>
                <?php
                if (! empty($adminauth)) {
        $query = mysql_query("select * from admin where username='$adminauth' AND password = '$adminpass'");
        $row = mysql_fetch_assoc($query);
        $count = mysql_num_rows($query);
        if ($count > 0) {
          $adminphoto = $row['adminphoto'];
          $adminid = $row['adminid'];
          $address = $row['address'];
          $password = $row['password'];
          $phoneno = $row['phno'];
          $gender = $row['gender'];
          $created = $row['createdDate'];
        }

                }
                 ?>
                 <?php echo "<img class=\"img-circle profile_img\" src=\"images/home/".$adminphoto."\" />";?>

              </div>
              <div class="profile_info">
                <span>Welcome,</span>

                <h2><?php echo $adminauth;?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

              <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
              <?php
                    if(isSet($_SESSION['userName']))
                    {
                      $adminname = $_SESSION['userName'];
                    }else
                    {
                      $adminname = "Admin Info:";
                    }

                  ?>
                <h3><?php echo "Photo"; ?></h3>

                 <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Admin Menu </a></li>

                      <li style="list-style:none;size:20px">
                      <a href="itemList.php" class="leftmenunav">Item List </a></li>
                      <li style="list-style:none;size:20px">
                      <a href="orderList.php"  class="leftmenunav">Order List</a></li>

                </ul>
              </div>
              <div class="menu_section">

                <ul class="nav side-menu">
                  <li><a href="../../"><i class="fa fa-laptop"></i> AzureShoeGallery Site</a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->


          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php echo "<img  src=\"images/home/".$adminphoto."\" />";?><?php echo $adminname; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="adminprofile.php"> Profile</a></li>
                    <li>
                      <a href="memberRegister.php">

                        <span>Member Register</span>
                      </a>
                    </li>

                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>


              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Admin Profile Edit</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="editprofile.php" method="post" onsubmit="return validateProfile() " enctype="multipart/form-data">
						 <div class="form-group">
					<div class="col-md-55 alignimage">
						<div class="thumbnail" id="fileList">
                          <div class="view view-first">


                            <?php echo "<img  class=\"resize_img\" style=\"width: 100%; height:100%;display: block;\" src=\"images/home/".$adminphoto."\"  alt=\"image\" />"; ?>
                            <input type="hidden" name="himgpath" value="images/user.png">

                          </div>
                        </div>
                        <input type="file" id="fileElem" name="browseimg" class="dz-default dz-message" value="Update Image" size="30" onchange="handleFiles(this.files)">

                        </div>

                        </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="colorreq required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" required="required" name="name" class="form-control col-md-7 col-xs-12" onchange="validateName()" value="<?php echo $adminauth;?>" >
                           <input type="hidden" id="hname" required="required" name="hname" value="<?php echo $adminauth;?>" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Current Password
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <input type="password" id="password" name="password" class="form-control col-md-7 col-xs-12" value="<?php echo $password ?>" readonly >
                        <input type="hidden" name="hpassword" value="<?php echo $password ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">New Password </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="confirmpassword" class="form-control col-md-7 col-xs-12"  type="password" name="newpassword" >
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="address" class="form-control col-md-7 col-xs-12" type="text" name="address" value="<?php echo $address ?>">
                        </div>
                      </div>
                       <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Phone No:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                           <input id="phoneno" class="form-control col-md-7 col-xs-12" type="number" name="phoneno" placeholder="<?php echo $phoneno ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons" style="padding-top: 7px">
                          <?php if($gender == 'male'){?>

                              <input type="radio" name="gender" value="male" checked="checked"> &nbsp; Male &nbsp;
                              <?php }else{?>

							<input type="radio" name="gender" value="male" checked="checked"> &nbsp; Male &nbsp;
							<?php }?>
							 <?php if($gender == 'female'){?>
							 <input type="radio" name="gender" value="female" checked="checked" > Female<?php }else{?>

                              <input type="radio" name="gender" value="female"> Female
                              <?php }?>
                              <input type="hidden" value="<?php echo $adminid ?>" name="adminid" >

                          </div>

                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                         <button type="submit" class="btn btn-success">Submit</button>
                         <a href="adminprofile.php"> <button type="button" class="btn btn-primary">Cancel</button></a>

                        </div>
                      </div>

                    </form>
                  </div>
                </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-xs-12">




                <div class="x_panel">

                  <div class="x_content">

                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate>




                       <marquee> <label class="memreg">Welcome AzureShoeGalley</label></marquee>



                    </form>
                    <!-- end form for validations -->

                  </div>
                </div>


              </div>

            </div>

          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
           Our group Training Site for AzureShoeGallery © AZSC
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="js/moment/moment.min.js"></script>
    <script src="js/datepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <!-- bootstrap-daterangepicker -->
    <script>
     $(document).ready(function(){ //newly added 
$('#name').change(function() {
    var nameVal = $('#name').val(); // assuming this is a input text field    
    var passwordVal = $('#password').val();
    var hnameVal = $('#hname').val();
    if (hnameVal == nameVal) { return true;};
    $.post('checkmembernp.php', {'name' : nameVal,'password':passwordVal}, function(data) {
   if (data < 1)
   { 
    
    return true;
   }
   else
   {

        alert("Sorry .. Member Already Exist");
        document.getElementById('name').value = "";
        
        document.getElementById('confirmpassword').value = "";
        $('#name').focus();
        return false;
   }
});

});
});
    $(document).ready(function(){ //newly added 
$('#confirmpassword').change(function() {
    var nameVal = $('#name').val(); // assuming this is a input text field
    var passVal = $('#password').val();

    var passwordVal = $('#confirmpassword').val();
    if (passVal == passwordVal) { return true;};
    $.post('checkmembernp.php', {'name' : nameVal,'password':passwordVal}, function(data) {
   if (data < 1)
   { 
    
    return true;
   }
   else
   {

        alert("Sorry .. Member Already Exist");
        document.getElementById('name').value = "";
        
        document.getElementById('confirmpassword').value = "";
        $('#name').focus();
        return false;
   }
});

});
});
      $(document).ready(function() {
        $('#birthday').daterangepicker({
          singleDatePicker: true,
          calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
      function validateProfile()
  	{	var cpassword = document.forms["demo-form2"]["password"].value;
  		var hpassword = document.forms["demo-form2"]["hpassword"].value;
  		var newpassword = document.forms["demo-form2"]["newpassword"].value;
  		if(hpassword != cpassword  )
  		{
  			alert("Please Enter Current Password");
  			return false;

  		}




  	}

    </script>

    <!-- /bootstrap-daterangepicker -->
    <script>




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

    <!-- bootstrap-wysiwyg -->
    <script>
      $(document).ready(function() {
        function initToolbarBootstrapBindings() {
          var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
              'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
              'Times New Roman', 'Verdana'
            ],
            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
          $.each(fonts, function(idx, fontName) {
            fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
          });
          $('a[title]').tooltip({
            container: 'body'
          });
          $('.dropdown-menu input').click(function() {
              return false;
            })
            .change(function() {
              $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
            })
            .keydown('esc', function() {
              this.value = '';
              $(this).change();
            });

          $('[data-role=magic-overlay]').each(function() {
            var overlay = $(this),
              target = $(overlay.data('target'));
            overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
          });

          if ("onwebkitspeechchange" in document.createElement("input")) {
            var editorOffset = $('#editor').offset();

            $('.voiceBtn').css('position', 'absolute').offset({
              top: editorOffset.top,
              left: editorOffset.left + $('#editor').innerWidth() - 35
            });
          } else {
            $('.voiceBtn').hide();
          }
        }

        function showErrorAlert(reason, detail) {
          var msg = '';
          if (reason === 'unsupported-file-type') {
            msg = "Unsupported format " + detail;
          } else {
            console.log("error uploading file", reason, detail);
          }
          $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
            '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
        }

        initToolbarBootstrapBindings();

        $('#editor').wysiwyg({
          fileUploadError: showErrorAlert
        });

        window.prettyPrint;
        prettyPrint();
      });
    </script>
    <!-- /bootstrap-wysiwyg -->

    <!-- Select2 -->
    <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Select a state",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->

    <!-- jQuery Tags Input -->
    <script>
      function onAddTag(tag) {
        alert("Added a tag: " + tag);
      }

      function onRemoveTag(tag) {
        alert("Removed a tag: " + tag);
      }

      function onChangeTag(input, tag) {
        alert("Changed a tag: " + tag);
      }

      $(document).ready(function() {
        $('#tags_1').tagsInput({
          width: 'auto'
        });
      });
    </script>
    <!-- /jQuery Tags Input -->

    <!-- Parsley -->
    <script>
      $(document).ready(function() {
        $.listen('parsley:field:validate', function() {
          validateFront();
        });
        $('#demo-form .btn').on('click', function() {
          $('#demo-form').parsley().validate();
          validateFront();
        });
        var validateFront = function() {
          if (true === $('#demo-form').parsley().isValid()) {
            $('.bs-callout-info').removeClass('hidden');
            $('.bs-callout-warning').addClass('hidden');
          } else {
            $('.bs-callout-info').addClass('hidden');
            $('.bs-callout-warning').removeClass('hidden');
          }
        };
      });

      $(document).ready(function() {
        $.listen('parsley:field:validate', function() {
          validateFront();
        });
        $('#demo-form2 .btn').on('click', function() {
          $('#demo-form2').parsley().validate();
          validateFront();
        });
        var validateFront = function() {
          if (true === $('#demo-form2').parsley().isValid()) {
            $('.bs-callout-info').removeClass('hidden');
            $('.bs-callout-warning').addClass('hidden');
          } else {
            $('.bs-callout-info').addClass('hidden');
            $('.bs-callout-warning').removeClass('hidden');
          }
        };
      });
      try {
        hljs.initHighlightingOnLoad();
      } catch (err) {}
    </script>
    <!-- /Parsley -->

    <!-- Autosize -->
    <script>
      $(document).ready(function() {
        autosize($('.resizable_textarea'));
      });
    </script>
    <!-- /Autosize -->

    <!-- jQuery autocomplete -->
    <script>
      $(document).ready(function() {
        var countries = { AD:"Andorra",A2:"Andorra Test",AE:"United Arab Emirates",AF:"Afghanistan",AG:"Antigua and Barbuda",AI:"Anguilla",AL:"Albania",AM:"Armenia",AN:"Netherlands Antilles",AO:"Angola",AQ:"Antarctica",AR:"Argentina",AS:"American Samoa",AT:"Austria",AU:"Australia",AW:"Aruba",AX:"Åland Islands",AZ:"Azerbaijan",BA:"Bosnia and Herzegovina",BB:"Barbados",BD:"Bangladesh",BE:"Belgium",BF:"Burkina Faso",BG:"Bulgaria",BH:"Bahrain",BI:"Burundi",BJ:"Benin",BL:"Saint Barthélemy",BM:"Bermuda",BN:"Brunei",BO:"Bolivia",BQ:"British Antarctic Territory",BR:"Brazil",BS:"Bahamas",BT:"Bhutan",BV:"Bouvet Island",BW:"Botswana",BY:"Belarus",BZ:"Belize",CA:"Canada",CC:"Cocos [Keeling] Islands",CD:"Congo - Kinshasa",CF:"Central African Republic",CG:"Congo - Brazzaville",CH:"Switzerland",CI:"Côte d’Ivoire",CK:"Cook Islands",CL:"Chile",CM:"Cameroon",CN:"China",CO:"Colombia",CR:"Costa Rica",CS:"Serbia and Montenegro",CT:"Canton and Enderbury Islands",CU:"Cuba",CV:"Cape Verde",CX:"Christmas Island",CY:"Cyprus",CZ:"Czech Republic",DD:"East Germany",DE:"Germany",DJ:"Djibouti",DK:"Denmark",DM:"Dominica",DO:"Dominican Republic",DZ:"Algeria",EC:"Ecuador",EE:"Estonia",EG:"Egypt",EH:"Western Sahara",ER:"Eritrea",ES:"Spain",ET:"Ethiopia",FI:"Finland",FJ:"Fiji",FK:"Falkland Islands",FM:"Micronesia",FO:"Faroe Islands",FQ:"French Southern and Antarctic Territories",FR:"France",FX:"Metropolitan France",GA:"Gabon",GB:"United Kingdom",GD:"Grenada",GE:"Georgia",GF:"French Guiana",GG:"Guernsey",GH:"Ghana",GI:"Gibraltar",GL:"Greenland",GM:"Gambia",GN:"Guinea",GP:"Guadeloupe",GQ:"Equatorial Guinea",GR:"Greece",GS:"South Georgia and the South Sandwich Islands",GT:"Guatemala",GU:"Guam",GW:"Guinea-Bissau",GY:"Guyana",HK:"Hong Kong SAR China",HM:"Heard Island and McDonald Islands",HN:"Honduras",HR:"Croatia",HT:"Haiti",HU:"Hungary",ID:"Indonesia",IE:"Ireland",IL:"Israel",IM:"Isle of Man",IN:"India",IO:"British Indian Ocean Territory",IQ:"Iraq",IR:"Iran",IS:"Iceland",IT:"Italy",JE:"Jersey",JM:"Jamaica",JO:"Jordan",JP:"Japan",JT:"Johnston Island",KE:"Kenya",KG:"Kyrgyzstan",KH:"Cambodia",KI:"Kiribati",KM:"Comoros",KN:"Saint Kitts and Nevis",KP:"North Korea",KR:"South Korea",KW:"Kuwait",KY:"Cayman Islands",KZ:"Kazakhstan",LA:"Laos",LB:"Lebanon",LC:"Saint Lucia",LI:"Liechtenstein",LK:"Sri Lanka",LR:"Liberia",LS:"Lesotho",LT:"Lithuania",LU:"Luxembourg",LV:"Latvia",LY:"Libya",MA:"Morocco",MC:"Monaco",MD:"Moldova",ME:"Montenegro",MF:"Saint Martin",MG:"Madagascar",MH:"Marshall Islands",MI:"Midway Islands",MK:"Macedonia",ML:"Mali",MM:"Myanmar [Burma]",MN:"Mongolia",MO:"Macau SAR China",MP:"Northern Mariana Islands",MQ:"Martinique",MR:"Mauritania",MS:"Montserrat",MT:"Malta",MU:"Mauritius",MV:"Maldives",MW:"Malawi",MX:"Mexico",MY:"Malaysia",MZ:"Mozambique",NA:"Namibia",NC:"New Caledonia",NE:"Niger",NF:"Norfolk Island",NG:"Nigeria",NI:"Nicaragua",NL:"Netherlands",NO:"Norway",NP:"Nepal",NQ:"Dronning Maud Land",NR:"Nauru",NT:"Neutral Zone",NU:"Niue",NZ:"New Zealand",OM:"Oman",PA:"Panama",PC:"Pacific Islands Trust Territory",PE:"Peru",PF:"French Polynesia",PG:"Papua New Guinea",PH:"Philippines",PK:"Pakistan",PL:"Poland",PM:"Saint Pierre and Miquelon",PN:"Pitcairn Islands",PR:"Puerto Rico",PS:"Palestinian Territories",PT:"Portugal",PU:"U.S. Miscellaneous Pacific Islands",PW:"Palau",PY:"Paraguay",PZ:"Panama Canal Zone",QA:"Qatar",RE:"Réunion",RO:"Romania",RS:"Serbia",RU:"Russia",RW:"Rwanda",SA:"Saudi Arabia",SB:"Solomon Islands",SC:"Seychelles",SD:"Sudan",SE:"Sweden",SG:"Singapore",SH:"Saint Helena",SI:"Slovenia",SJ:"Svalbard and Jan Mayen",SK:"Slovakia",SL:"Sierra Leone",SM:"San Marino",SN:"Senegal",SO:"Somalia",SR:"Suriname",ST:"São Tomé and Príncipe",SU:"Union of Soviet Socialist Republics",SV:"El Salvador",SY:"Syria",SZ:"Swaziland",TC:"Turks and Caicos Islands",TD:"Chad",TF:"French Southern Territories",TG:"Togo",TH:"Thailand",TJ:"Tajikistan",TK:"Tokelau",TL:"Timor-Leste",TM:"Turkmenistan",TN:"Tunisia",TO:"Tonga",TR:"Turkey",TT:"Trinidad and Tobago",TV:"Tuvalu",TW:"Taiwan",TZ:"Tanzania",UA:"Ukraine",UG:"Uganda",UM:"U.S. Minor Outlying Islands",US:"United States",UY:"Uruguay",UZ:"Uzbekistan",VA:"Vatican City",VC:"Saint Vincent and the Grenadines",VD:"North Vietnam",VE:"Venezuela",VG:"British Virgin Islands",VI:"U.S. Virgin Islands",VN:"Vietnam",VU:"Vanuatu",WF:"Wallis and Futuna",WK:"Wake Island",WS:"Samoa",YD:"People's Democratic Republic of Yemen",YE:"Yemen",YT:"Mayotte",ZA:"South Africa",ZM:"Zambia",ZW:"Zimbabwe",ZZ:"Unknown or Invalid Region" };

        var countriesArray = $.map(countries, function(value, key) {
          return {
            value: value,
            data: key
          };
        });

        // initialize autocomplete with custom appendTo
        $('#autocomplete-custom-append').autocomplete({
          lookup: countriesArray
        });
      });
    </script>
    <!-- /jQuery autocomplete -->

    <!-- Starrr -->
    <script>
      $(document).ready(function() {
        $(".stars").starrr();

        $('.stars-existing').starrr({
          rating: 4
        });

        $('.stars').on('starrr:change', function (e, value) {
          $('.stars-count').html(value);
        });

        $('.stars-existing').on('starrr:change', function (e, value) {
          $('.stars-count-existing').html(value);
        });
      });
    </script>
    <!-- /Starrr -->
    <script type="text/javascript">


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


    </script>
  </body>
</html>
<?php } ?>
