<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['name']=='doctor') {

}
else{
	header('Location: ../../login/index.html');
	die();	
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hospital</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/Jquery-ui.css" />

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
	
	    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="../../js/angular.min.js"></script>

	  <script type="text/javascript" src="js/Jquery1-ui.js"></script>
	
	
	<script type="text/javascript" src="js/bootstrap-notify.js"></script> <!-- for Notify js -->
	
	<script type="text/javascript">
	$(document).ready(function(){
		var windowHeight = $(window).innerHeight();
		$(".main_container").css("min-height",windowHeight);
	});
	</script>
	
  </head>

  <body class="nav-md" ng-app="view_appointment" ng-controller="appointmentCtrl" ng-cloak >
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Hospital</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img ng-src="{{display_data.photo}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{display_data.doctor_name}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home </a>

                  </li>
                  <li><a href="appointment.php"><i class="fa fa-edit"></i> View Appointment</a>
                  
                  </li>

                  <li><a href="profile.php"><i class="fa fa-table"></i> Profile</a>
                    
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Reports <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
                       <li><a href="report.php">Patient Report</a></li>
                    </ul>
                  </li>

                </ul>
              </div>


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->

            <!-- /menu footer buttons -->
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
                    <img ng-src="{{display_data.photo}}" alt=""> {{display_data.doctor_name}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="profile.php"> Profile</a></li>
                   
                    <li><a href="../../login/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>


              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="main_container right_col" role="main" >
          
			<div class="container-fluid">
		
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none">
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-22">Search by date</div>
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-22 padding-none margin-top-10-less">
				<div class="group col-md-12 col-sm-12 col-lg-12"> 
				<div class="col-md-12 col-sm-12 col-lg-12 padding-none">	
					  <input type="text"  class="module-input" required="" datepicker="" ng-model="from_date" />
				  <span class="bar"></span>
				  <label class="label-text" style="left:7%;" >From Date</label>
				  </div>
				</div>
			</div>
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-22 padding-none margin-top-10-less">
				<div class="group col-md-12 col-sm-12 col-lg-12"> 
				<div class="col-md-12 col-sm-12 col-lg-12 padding-none">	
					  <input type="text"  class="module-input" required="" datepicker="" ng-model="to_date"  ng-change="filter_appoinment()"/>
				  <span class="bar"></span>
				  <label class="label-text" >To Date</label>
				  </div>
				</div>
			</div>
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-22">&nbsp; </div>
			<div class="col-md-3 col-sm-3 col-lg-3 col-xs-4 font-22 padding-none margin-top-10-less">
				<div class="group col-md-12 col-sm-12 col-lg-12"> 
				<div class="col-md-12 col-sm-12 col-lg-12 padding-none">	
					  <input type="text"  class="module-input" required=""  ng-model="patient_search" />
				  <span class="bar"></span>
				  <label class="label-text" >Search By Patient Name</label>
				  </div>
				</div>
			</div>
			
		</div>
		
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 margin-bottom">&nbsp;</div>
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 margin-bottom">
			<div class="col-md-1 col-sm-1 col-lg-1 col-xs-4 font-16 padding-none">Sl No</div>
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-16 padding-none">Patient Name</div>
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-16 padding-none">Date</div>
			<div class="col-md-1 col-sm-1 col-lg-1 col-xs-4 font-16 padding-none">Time</div>
			<div class="col-md-3 col-sm-3 col-lg-3 col-xs-4 font-16 padding-none">Reason</div>
			<div class="col-md-3 col-sm-3 col-lg-3 col-xs-4 font-16 padding-none">&nbsp;</div>
		</div>
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 margin-bottom" ng-repeat="appointment_details in appointment | filter:patient_search" ng-show="show_data_div">
			<div class="col-md-1 col-sm-1 col-lg-1 col-xs-4 font-16 padding-none">{{$index}}</div>
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-16 padding-none uppercase">{{appointment_details.patient_name}}</div>
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-16 padding-none">{{appointment_details.date}}</div>
			<div class="col-md-1 col-sm-1 col-lg-1 col-xs-4 font-16 padding-none">{{appointment_details.time}}</div>
			<div class="col-md-3 col-sm-3 col-lg-3 col-xs-4 font-16 padding-none">{{appointment_details.reason}}</div>
			<div class="col-md-3 col-sm-3 col-lg-3 col-xs-4 font-16 padding-none"><span ng-click="check_up(appointment_details.patient_id,appointment_details.appointment_id)" class="pointer">Check Up</span> &nbsp;&nbsp;&nbsp; <span class="pointer" ng-click="histroy(appointment_details.patient_id,appointment_details.appointment_id)">Histroy</span></div>
		</div>
         <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 margin-bottom" ng-show="show_no_data">
		     <center>No Data Found</center>
		</div>

    </div>
		
          
        </div>
        <!-- /page content -->

        <!-- footer content -->
   
        <!-- /footer content -->
      </div>
    </div>

	 <!-- Custom Theme Scripts -->
   <script src="../build/js/custom.min.js"></script>
	
<script type="text/javascript" src="js/appointment/appointment.js"></script>

  </body>
</html>
