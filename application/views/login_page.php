<!doctype html>

 <html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lady Reading Hospital</title>
    <meta name="description" content="Lady Reading Hospital">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body class="bg-login" style="background: url(images/bg_login.jpg) no-repeat center center fixed; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
        
                <div class="login-form pb-5">
                    <form method="POST" action="<?php echo base_url(); ?>/user/login">
                    	 <h1 class="text-center mb-4">Lady Reading Hospital</h1>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <!-- <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label> -->

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>                 
                        <?php
						if($this->session->flashdata('error')){
							?>
							<div class="alert alert-danger text-center" style="margin-top:20px;">
								<?php echo $this->session->flashdata('error'); ?>
							</div>
							<?php
						}
					?>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="<?php echo base_url(); ?>assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
</body>
</html>