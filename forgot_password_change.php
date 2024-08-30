<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Medsave Pharmacy - Change Password</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/forgot_password.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <script src="js/forgot_password.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="login-title">
        <h1>Medsave Rx Pharmacy</h1>
        <h3>Point of Sale & Inventory Management System</h3>
      </div>
      <div class="card m-auto p-2">
        <div class="card-body">
          <form name="login-form" class="login-form">
            <div class="logo">
        			<h1 class="sub-title">CHANGE PASSWORD</h1>
              <h6 class="sub-title2">ENTER OTP AND NEW PASSWORD</h6>
        		</div> <!-- logo class -->
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-hashtag text-white"></i></span>
              </div>
              <input name="OTP" type="text" class="form-control" placeholder="OTP">
            </div> <!--input-group class -->
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key text-white"></i></span>
              </div>
              <input name="password" type="password" class="form-control" placeholder="New Password">
            </div> <!-- input-group class -->
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key text-white"></i></span>
              </div>
              <input name="password" type="password" class="form-control" placeholder="Confirm Password">
            </div> <!-- input-group class -->
            <div class="form-group">
              <button class="btn btn-default btn-block btn-custom">Submit</button>
            </div>
          </form><!-- form close -->
      </div> <!-- card class -->
    </div> <!-- container class -->
  </body>
</html>
