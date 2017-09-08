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

    <title>AzureShoeGallery|Item List Detail </title>

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
        $query = mysql_query("select * from admin where username='$adminauth' AND password = '$adminpass' ");
        $row = mysql_fetch_assoc($query);
        $count = mysql_num_rows($query);
        if ($count > 0) {
          $adminphoto = $row['adminphoto'];
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

                        <span>Member Register </span>
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
			       <div class="x_panel">
                  <div class="x_title">
                    <h2>Item Detail</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <?php
                    $itemcode = $_GET['itemcode'];
                    $query = "select * from item where itemcode='$itemcode'";
                    $result = mysql_query($query);
                    $row = mysql_fetch_assoc($result);
                    if($row != null)
                    {

                    ?>
                    <form id="detail_form"  data-parsley-validate class="form-horizontal form-label-left" action="itemListUpdate.php?itemcode=<?php echo $itemcode?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
					<div class="col-md-55 alignimage">
						<div class="thumbnail">
                          <div class="view view-first">
                          <?php
                          $catID = $row['categoryid'];
                          $iquery = "Select category from category where categoryid = '$catID'";
							$iresult = mysql_query($iquery);
							if($irow = mysql_fetch_assoc($iresult))
							{
								$imgcategory = $irow['category'] ;
							}
                          ?>
							<?php echo "<img  style=\"width: 100%; height:194px;display: block;\" src=\"images/".$imgcategory."/". $row['imagepath']." \" alt=\"image\" />"; ?>
							<input type="hidden" name="img_path" value="<?php echo $row['imagepath']?>">
                          </div>

                        </div>
                        </div>

                        </div>
                      <div class="form-group aligndetail">
                        <label class=" col-md-3 col-sm-3 col-xs-12 ealignleft" for="first-name">Item Code:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                          <label class=" col-md-7 col-xs-12 " style="color:#0952c3"><?php echo $row['itemcode']?></label>
                        </div>

                      </div>
					 <div class="form-group aligndetail">
                        <label class=" col-md-3 col-sm-3 col-xs-12" for="first-name">Purchase Price:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class=" col-md-7 col-xs-12"  style="color:#0952c3"><?php echo $row['pprice'];?></label>
                          <input type="hidden" name="purchaseprice" value="<?php echo $row['price'];?>">
                        </div>
                      </div>
                      <div class="form-group aligndetail">
                        <label class=" col-md-3 col-sm-3 col-xs-12" for="first-name">Sale Price:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <label class=" col-md-7 col-xs-12"  style="color:#0952c3"><?php echo $row['sprice'];?></label>
                          <input type="hidden" name="purchaseprice" value="<?php echo $row['price'];?>">
                        </div>
                      </div>
                       <div class="form-group aligndetail">
                        <label class=" col-md-3 col-sm-3 col-xs-12" for="first-name">Size:
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <?php
                        $sizeid = $row['sizeid'];
                        $squery = "select size from size where sizeid='$sizeid'";
                        $sresult = mysql_query($squery);
                       $srow = mysql_fetch_assoc($sresult);
                        if ($srow != null)
                        {


                        ?>
                          <label class=" col-md-7 col-xs-12" style="color:#0952c3"><?php echo $srow['size'];?></label>
                          <input type="hidden" name="sizeid" value="<?php echo $row['sizeid'];?>">
                          <?php }?>
                        </div>
                      </div>
                      <div class="form-group aligndetail">

                        <label class=" col-md-3 col-sm-3 col-xs-12" for="first-name">Color:
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <?php
                        $colorid = $row['colorid'];
                        $cquery = "select color from color where colorid='$colorid'";
                        $cresult = mysql_query($cquery);
                       $crow = mysql_fetch_assoc($cresult);
                        if ($crow != null)
                        {
                        ?>
                          <label class=" col-md-7 col-xs-12" style="color:#0952c3"><?php echo $crow['color'];?></label>
                          <input type="hidden" name="colorid" value="<?php echo $row['colorid'];?>">
                          <?php }?>
                        </div>
                      </div>
                        <div class="form-group aligndetail">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="first-name">MadeIn:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <?php
                        $madeinid = $row['madeinid'];
                        $mquery = "select madein from madein where madeinid='$madeinid'";
                        $mresult = mysql_query($mquery);
                       $mrow = mysql_fetch_assoc($mresult);
                        if ($mrow != null)
                        {
                        ?>
                          <label class=" col-md-7 col-xs-12" style="color:#0952c3"><?php echo $mrow['madein'];?></label>
                          <input type="hidden" name="madeinid" value="<?php echo $row['madeinid'];?>">
                          <?php }?>
                        </div>
                      </div>
                        <div class="form-group aligndetail">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="first-name">Category:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">
                          <?php
                        $categoryid = $row['categoryid'];
                        $gquery = "select category from category where categoryid='$categoryid'";
                        $gresult = mysql_query($gquery);
                       $grow = mysql_fetch_assoc($gresult);
                        if ($grow != null)
                        {
                        ?>
                          <label class="col-md-7 col-xs-12" style="color:#0952c3"><?php echo $grow['category'];?></label>
                          <input type="hidden" name="categoryid" value="<?php echo $row['categoryid'];?>">
                          <?php }?>
                        </div>
                      </div>

                       <div class="form-group aligndetail">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="first-name">Qty:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 ">

                          <label class="col-md-7 col-xs-12" style="color:#0952c3"><?php echo $row['qty'];?></label>
                          <input type="hidden" name="categoryid" value="<?php echo $row['qty'];?>">

                        </div>
                      </div>




                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 alignbutton">

                          <button type="submit" class="btn btn-success ">Update</button>
                           <a href="itemList.php"><button type="button" class="btn btn-primary ">Back</button></a>
                        </div>
                      </div>
                      <?php }?>

                    </form>
                  </div>
                </div>
          <br />
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
           AzureShoeGallery © AZSG
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
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="js/moment/moment.min.js"></script>
    <script src="js/datepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
   <!-- Validate -->
   <script type="text/javascript">
   function validateForm()
   {var sprice = document.forms["detail_form"]["sprice"].value;
   if(sprice == null || sprice == " " || sprice == 0)
	{alert("Enter Resale Price..");
	return false;
	}
	var qty = document.forms["detail_form"]["qty"].value;
	   if(qty == null || qty == " " || qty == 0)
		{alert("Enter qty..");
		return false;
		}
	}

   </script>
    <!-- Flot -->
    <script>
      $(document).ready(function() {
        var data1 = [
          [gd(2012, 1, 1), 17],
          [gd(2012, 1, 2), 74],
          [gd(2012, 1, 3), 6],
          [gd(2012, 1, 4), 39],
          [gd(2012, 1, 5), 20],
          [gd(2012, 1, 6), 85],
          [gd(2012, 1, 7), 7]
        ];

        var data2 = [
          [gd(2012, 1, 1), 82],
          [gd(2012, 1, 2), 23],
          [gd(2012, 1, 3), 66],
          [gd(2012, 1, 4), 9],
          [gd(2012, 1, 5), 119],
          [gd(2012, 1, 6), 6],
          [gd(2012, 1, 7), 9]
        ];
        $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
          data1, data2
        ], {
          series: {
            lines: {
              show: false,
              fill: true
            },
            splines: {
              show: true,
              tension: 0.4,
              lineWidth: 1,
              fill: 0.4
            },
            points: {
              radius: 0,
              show: true
            },
            shadowSize: 2
          },
          grid: {
            verticalLines: true,
            hoverable: true,
            clickable: true,
            tickColor: "#d5d5d5",
            borderWidth: 1,
            color: '#fff'
          },
          colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
          xaxis: {
            tickColor: "rgba(51, 51, 51, 0.06)",
            mode: "time",
            tickSize: [1, "day"],
            //tickLength: 10,
            axisLabel: "Date",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10
          },
          yaxis: {
            ticks: 8,
            tickColor: "rgba(51, 51, 51, 0.06)",
          },
          tooltip: false
        });

        function gd(year, month, day) {
          return new Date(year, month - 1, day).getTime();
        }
      });
    </script>
    <!-- /Flot -->

    <!-- JQVMap -->
    <script>
      $(document).ready(function(){
        $('#world-map-gdp').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#666666',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#E6F2F0', '#149B7E'],
            normalizeFunction: 'polynomial'
        });
      });
    </script>
    <!-- /JQVMap -->

    <!-- Skycons -->
    <script>
      $(document).ready(function() {
        var icons = new Skycons({
            "color": "#73879C"
          }),
          list = [
            "clear-day", "clear-night", "partly-cloudy-day",
            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
            "fog"
          ],
          i;

        for (i = list.length; i--;)
          icons.set(list[i], list[i]);

        icons.play();
      });
    </script>
    <!-- /Skycons -->

    <!-- Doughnut Chart -->
    <script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        new Chart(document.getElementById("canvas1"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Symbian",
              "Blackberry",
              "Other",
              "Android",
              "IOS"
            ],
            datasets: [{
              data: [15, 20, 30, 10, 30],
              backgroundColor: [
                "#BDC3C7",
                "#9B59B6",
                "#E74C3C",
                "#26B99A",
                "#3498DB"
              ],
              hoverBackgroundColor: [
                "#CFD4D8",
                "#B370CF",
                "#E95E4F",
                "#36CAAB",
                "#49A9EA"
              ]
            }]
          },
          options: options
        });
      });
    </script>
    <!-- /Doughnut Chart -->

    <!-- bootstrap-daterangepicker -->
    <script>
      $(document).ready(function() {

        var cb = function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        };

        var optionSet1 = {
          startDate: moment().subtract(29, 'days'),
          endDate: moment(),
          minDate: '01/01/2012',
          maxDate: '12/31/2015',
          dateLimit: {
            days: 60
          },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          opens: 'left',
          buttonClasses: ['btn btn-default'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'MM/DD/YYYY',
          separator: ' to ',
          locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
          }
        };
        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#reportrange').daterangepicker(optionSet1, cb);
        $('#reportrange').on('show.daterangepicker', function() {
          console.log("show event fired");
        });
        $('#reportrange').on('hide.daterangepicker', function() {
          console.log("hide event fired");
        });
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
          console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
          console.log("cancel event fired");
        });
        $('#options1').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function() {
          $('#reportrange').data('daterangepicker').remove();
        });
      });
    </script>
    <!-- /bootstrap-daterangepicker -->

    <!-- gauge.js -->
    <script>
      var opts = {
          lines: 12,
          angle: 0,
          lineWidth: 0.4,
          pointer: {
              length: 0.75,
              strokeWidth: 0.042,
              color: '#1D212A'
          },
          limitMax: 'false',
          colorStart: '#1ABC9C',
          colorStop: '#1ABC9C',
          strokeColor: '#F0F3F3',
          generateGradient: true
      };
      var target = document.getElementById('foo'),
          gauge = new Gauge(target).setOptions(opts);

      gauge.maxValue = 6000;
      gauge.animationSpeed = 32;
      gauge.set(3200);
      gauge.setTextField(document.getElementById("gauge-text"));
    </script>
    <!-- /gauge.js -->
  </body>
</html>
<?php } ?>
