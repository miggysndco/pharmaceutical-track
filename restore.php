<?php 
$message = '';
if(isset($_POST["import"]))
{
 if($_FILES["database"]["name"] != '')
 {
  $array = explode(".", $_FILES["database"]["name"]);
  $extension = end($array);
  if($extension == 'sql')
  {
   $connect = mysqli_connect("localhost", "root", "", "pharmacy");
   $output = '';
   $count = 0;
   $file_data = file($_FILES["database"]["tmp_name"]);
   foreach($file_data as $row)
   {
    $start_character = substr(trim($row), 0, 2);
    if($start_character != '--' || $start_character != '/*' || $start_character != '//' || $row != '')
    {
     $output = $output . $row;
     $end_character = substr(trim($row), -1, 1);
     if($end_character == ';')
     {
      if(!mysqli_query($connect, $output))
      {
       $count++;
      }
      $output = '';
     }
    }
   }
   if($count > 0)
   {
    $message = '<label class="text-danger">Database Successfully Imported</label>';
   }
   else
   {
    $message = '<label class="text-success">Database Successfully Imported</label>';
   }
  }
  else
  {
   $message = '<label class="text-danger">Invalid File</label>';
  }
 }
 else
 {
  $message = '<label class="text-danger">Please Select SQL File!</label>';
 }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Medsave Pharmacy - Restore</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
  </head>
  <body>
    <div class="container">
      <div class="login-title">
        <h1>Medsave Rx Pharmacy</h1>
        <h3>Point of Sale & Inventory Management System</h3>
      </div>
      <div class="card m-auto p-2">
        <div class="card-body">
            <div class="logo">
        	  <h1 class="sub-title">Restore Data</h1>
              <?php if(isset($_GET['error'])) { ?>
                    <p class="error" style="color: red; text-align: center; font-weight:bold; margin-top: -23px;"><?php echo $_GET['error']; ?></p>
              <?php } ?>  
        	</div> <!-- logo class -->
            <div class="input-group form-group">
            <h6><?php echo $message; ?></h6>
            <form method="post" enctype="multipart/form-data">
                <h5><label>Select SQL File</label>
                <input type="file" name="database" /></h5>
                <br />
                <button class="btn btn-danger"><a href="index.php" style="color: white; text-decoration: none;">Cancel</a></button>
                <input type="submit" name="import" class="btn btn-primary" value="Import" />
            </form>
            <style>
                /* CSS to change color on hover for file input button */
                input[type="file"]:hover::-webkit-file-upload-button {
                    background-color: #f0f0f0; /* Change this to the desired color */
                }
            </style>
        </div> 
    </div> <!-- container class -->
  </body>
</html>
