<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Medsave Pharmacy - Admin Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <script src="js/index.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="login-title">
        <h1>Medsave Rx Pharmacy</h1>
        <h3>Point of Sale & Inventory Management System</h3>
      </div>
      <div class="card m-auto p-2">
        <div class="card-body">
          <form name="login-form" class="login-form" action="login_page.php" method="post">
            <div class="logo">
        			<h1 class="sub-title">Admin Login</h1>
              <?php if(isset($_GET['error'])) { ?>
                    <p class="error" style="color: red; text-align: center; font-weight:bold; margin-top: -23px;"><?php echo $_GET['error']; ?></p>
              <?php } ?>  
        		</div> <!-- logo class -->
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user text-white"></i></span>
              </div>
              <input name="username" type="text" class="form-control" placeholder="username">
            </div> <!--input-group class -->
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key text-white"></i></span>
              </div>
              <input name="password" type="password" class="form-control" placeholder="password">
            </div> <!-- input-group class -->
            <div class="form-group">
              <button class="btn btn-default btn-block btn-custom" type="submit" name="submit" id="btn_login">Login</button>
            </div>
          </form><!-- form close -->
        </div> <!-- cord-body class -->
        <div class="card-footer text-center">
          <div class="d-inline-block mr-5 pr-5">
            <a class="text-dark" href="forgot_password.php">Forgot password?</a>
          </div>
          <div class="d-inline-block ml-5 pl-5">
            <a class="text-dark" href="restore.php">Restore Data?</a>
          </div>
        </div> <!-- cord-footer class -->
      </div> <!-- card class -->
    </div> <!-- container class -->
  </body>
</html>
