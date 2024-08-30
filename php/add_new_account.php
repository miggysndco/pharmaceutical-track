<?php
  require "db_connection.php";
  if($con) {
    $name = ucwords($_GET["name"]);
    $email = $_GET["email"];
    $password = $_GET["password"];
    $contact_number = $_GET["contact_number"];
    $address = ucwords($_GET["address"]);
    $role = ucwords($_GET["role"]);

    $query = "SELECT * FROM user WHERE UPPER(NAME) = '".strtoupper($name)."'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    if($row)
      echo "Account with name $name already exists!";
    else {
      $query = "INSERT INTO user (name, username, password, contact_number, address, role) VALUES('$name', '$email', '$password', '$contact_number', '$address', '$role')";
      $result = mysqli_query($con, $query);
      if(!empty($result))
  			echo "$name added.";
  		else
  			echo "Failed to add $name!";
    }
  }
?>
