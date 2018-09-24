<?php 
$user = $this->session->userdata('user');
extract($user);
?>
<!doctype html>
<html class="no-js" lang="" ng-app="hospitalApp" ng-controller="mainController"> 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lady Reading Hospital</title>
  <meta name="description" content="Sufee Admin - HTML5 Admin Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="apple-icon.png">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png" type="image/x-icon" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/normalize.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>ng/vendor/ui-bootstrap-csp.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>ng/vendor/angular-toastr.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/cs-skin-elastic.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <link href="<?php echo base_url(); ?>assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lib/tempusdominus-bootstrap-4.min.css" />
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
 <div id="right-panel" class="right-panel">
    <header id="header" class="header">
        <div class="header-menu">

            <div class="col-sm-7">
               <!--  <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a> -->
               <h2>Dashboard </h2>
           </div>
           <div class="col-sm-5">
            <div class="user-area float-right">
              <a class="nav-link"  href="<?php echo base_url(); ?>/user/logout" ><i class="fa fa-power -off"></i>Logout</a> </div>
          </div>
      </div>
</header><!-- /header -->