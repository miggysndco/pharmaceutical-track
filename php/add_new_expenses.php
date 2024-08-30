<?php
  require "db_connection.php";
  if($con) {
    $name = ucwords($_GET["name"]);
    $invoice_number = $_GET["invoice_number"];
    $payment_type = $_GET["payment_type"];
    $invoice_date = $_GET["invoice_date"];
    $details = $_GET["details"];
    $amount = $_GET["amount"];

    $query = "SELECT * FROM expenses WHERE invoice_number = '$invoice_number'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    if($row)
      echo "Invoice with the number $invoice_number already exists!";
    else {
      $query = "INSERT INTO expenses (name, invoice_number, payment_type, invoice_date, details, amount) VALUES('$name', '$invoice_number', '$payment_type', '$invoice_date', '$details', '$amount')";
      $result = mysqli_query($con, $query);
      if(!empty($result))
  			echo "Expenses $name added.";
  		else
  			echo "Failed to add expenses!";
    }
  }
?>
