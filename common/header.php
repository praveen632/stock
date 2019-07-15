<?php
header("Content-Type: text/html;charset=utf-8");
// error_reporting(0);
if(!isset($_SESSION['user_data'])) {
  header('Location:login.php');  
}
 $username = $_SESSION['user_data']['name'];

?>
<!DOCTYPE html>
 <html lang="en"> 
<head> 
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/> 
<title>CardamomConnect Management</title> 

 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CardamomConnect | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
   <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>css/style.css" >
   <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>assets/css/pagination.css" >
   <link rel="stylesheet" href="<?php echo PUBLIC_PATH; ?>bower_components/select2/dist/css/select2.min.css">
   
  <!-- jQuery 3 -->
  <script src="<?php echo PUBLIC_PATH; ?>bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo PUBLIC_PATH; ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
  <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>/assets/js/loader.js"></script>
  <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>/assets/js/ajaxloader.js"></script>
  <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>/assets/js/store.js"></script>
  <script type="text/javascript" src="<?php echo PUBLIC_PATH; ?>/assets/js/jquery.pagination.js"></script>

</head> 
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo" onclick="removeMenu()">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>CARDA</b>MOM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>CardamomConnect</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" id="sidebar-toggle">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu" >		
        <ul class="nav navbar-nav">
		  <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" onclick="showNotification(this);">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning" id="totalnotification"></span>
                </a>
                <ul class="dropdown-menu">
                  
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu" id="tblTaxList">
                        
                    </ul>
                  </li>
                  <li class="footer"><a href="expiry_medicine.php">View all</a></li>
                </ul>
              </li>
		  <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" onclick="showNotification(this);">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger" id="totalshtgstock"></span>
            </a>
            <ul class="dropdown-menu">            
              <li>
               <ul class="menu" id="shtgstock">
               </ul>
              </li>             
              <li class="footer">
                <a href="shortage_stock.php">View all tasks</a>
              </li>
            </ul>
          </li>		      
           <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" >             
              <span class="hidden-xs">Welcome&nbsp;&nbsp;<?php echo $username ?> </span>
            </a>            
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a class="dropdown-toggle" href="logout.php" onclick="removeMenu()">             
              <span class="hidden-xs">Log out</span>
            </a>
           
          </li>
          <!-- Control Sidebar Toggle Button -->          
        </ul>
      </div>
    </nav>
  </header>
  