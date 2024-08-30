<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Medsave Back-up</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		
		<!-- vector map CSS -->
		<link href="backup/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
		
		<link href="backup/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
		
		<!-- switchery CSS -->
		<link href="backup/vendors/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" type="text/css"/>
		
		<!-- Custom CSS -->
		<link href="backup/dist/css/style.css" rel="stylesheet" type="text/css"><meta charset="utf-8">

    	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    	<link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    	<link rel="stylesheet" href="css/sidenav.css">
    	<link rel="stylesheet" href="css/home.css">
    	<script src="js/validateForm.js"></script>
    	<script src="js/restrict.js"></script>
	</head>
	<body>
		<!-- including side navigations -->
		<?php include("sections/sidenav.html"); ?>

		<div class="container-fluid">
 	 	<div class="container">

		<!-- header section -->
		<?php
	  		require "php/header.php";
	  		createHeader('clipboard', 'Back-up', 'Back-up Database');
		?>
		<!-- header section end -->
			
			<!-- Main Content -->
			<div>
				<div class="col-sm-12 col-xs-12">
					<div class="mb-30">
						<h3 class="text-center txt-dark mb-10">Medsave Rx Pharmacy</h3>
						<h6 class="text-center nonecase-font txt-grey">Enter your database details below</h6>
					</div>	
					<div class="form-wrap">
						<form action="database_backup.php" method="post" id="">
							<div class="form-group">
								<label class="control-label mb-10" >Host</label>
								<input type="text" class="form-control" placeholder="Enter Server Name EX: Localhost" name="server" id="server" required="" autocomplete="on">
							</div>
							<div class="form-group">
								<label class="control-label mb-10" >Database Username</label>
								<input type="text" class="form-control" placeholder="Enter Database Username EX: root" name="username" id="username" required="" autocomplete="on">
							</div>
							<div class="form-group">
								<label class="pull-left control-label mb-10" >Database Password</label>
								<input type="password" class="form-control" placeholder="Enter Database Password" name="password" id="password" >
							</div>
							<div class="form-group">
								<label class="pull-left control-label mb-10">Database Name</label>
								<input type="text" class="form-control" placeholder="Enter Database Name" name="dbname" id="dbname" required="" autocomplete="on">
							</div>
							<div class="form-group text-center">
								<button type="submit" name="backupnow" class="btn btn-primary btn-rounded">Initiate Backup</button>
							</div>
						</form>
					</div>
				</div>	
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		<script src="backup/vendors/bower_components/jquery/dist/jquery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="backup/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="backup/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
	
		<!-- Fancy Dropdown JS -->
		<script src="backup/dist/js/dropdown-bootstrap-extended.js"></script>
		
		<!-- Owl JavaScript -->
		<script src="backup/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
		<!-- Switchery JavaScript -->
		<script src="backup/vendors/bower_components/switchery/dist/switchery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="backup/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
		
		<!-- Init JavaScript -->
		<script src="backup/dist/js/init.js"></script>
	</body>
</html>
