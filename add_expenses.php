<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add New Expenses</title>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <script type="text/javascript" src="js/suggestions.js"></script>
    <script type="text/javascript" src="js/validateForm.js"></script>
    <script type="text/javascript" src="js/add_new_expenses.js"></script>
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
          createHeader('bar-chart', 'Add Expenses', 'Add New Expenses');
        ?>
        <!-- header section end -->

        <!-- form content -->
        <div class="row">
          <!-- manufacturer details content -->
          <div class="row col col-md-12">

            <div class="col col-md-4 form-group">
              <label class="font-weight-bold" for="expenses_name">Expenses :</label>
              <input id="expenses_name" type="text" class="form-control" placeholder="Expenses Name" name="expenses_name" onkeyup="validateName(this.value, 'name_error');">
              <code class="text-danger small font-weight-bold float-right" id="expenses_name_error" style="display: none;"></code>
              <div id="expenses_suggestions" class="list-group position-fixed" style="z-index: 1; width: 25.10%; overflow: auto; max-height: 200px;"></div>
            </div>

            <div class="col col-md-2 form-group">
              <label class="font-weight-bold" for="">Invoice Number :</label>
              <input type="text" class="form-control" placeholder="Invoice Number" id="invoice_number" name="invoice_number" onblur="notNull(this.value, 'invoice_number_error'); checkInvoice(this.value, 'invoice_number_error');">
              <code class="text-danger small font-weight-bold float-right" id="invoice_number_error" style="display: none;"></code>
            </div>

            <div class="col col-md-2 form-group">
              <label class="font-weight-bold" for="paytype">Payment Type :</label>
              <select id="payment_type" name="paytype" class="form-control">
              	<option value="Cash Payment">Cash Payment</option>
                <option value="GCash Payment">GCash Payment</option>
              </select>
            </div>

            <div class="col col-md-2 form-group">
               <label class="font-weight-bold" for="invoice_date">Date :</label>
              <input type="date" class="datepicker form-control hasDatepicker" id="invoice_date" name="invoice_date" value='<?php echo date('Y-m-d'); ?>' onblur="checkDate(this.value, 'date_error');" disabled>
              <code class="text-danger small font-weight-bold float-right" id="date_error" style="display: none;"></code>
            </div>


            
            <div class="col col-md-12">
              <hr class="col-md-12" style="padding: 0px; border-top: 2px solid #02b6ff;">
            </div>

            <!-- expenses details control -->
            <div class="row col col-md-5">
              <div class="col col-md-12 form-group">
                <label class="font-weight-bold" for="expenses_details">Details :</label>
                <textarea class="form-control" id="expenses_details" onblur="validateDetails(this.value, 'details_error');" rows="3"></textarea>
                <code class="text-danger small font-weight-bold float-right" id="details_error" style="display: none;"></code>
              </div>
            </div>

            <!-- expenses amount control -->
            <div class="row col col-md-2">
              <div class="col col-md-12 form-group">
                <label class="font-weight-bold" for="amount">Amount: :</label>
                <input type="number" class="form-control" placeholder="PHP" id="amount" onblur="notNull(this.value, 'amount_error');">
                <code class="text-danger small font-weight-bold float-right" id="amount_error" style="display: none;"></code>
              </div>
            </div>

            <div class="col col-md-12">
              <hr class="col-md-12" style="padding: 0px; border-top: 2px solid #02b6ff;">
            </div>
          
          </div>

          <!-- button -->
          <div class="row col col-md-12 mt-2">
            <div class="col col-md-5"></div>
            <div class="col col-md-2 form-group">
              <button class="btn btn-success form-control" onclick="addExpenses();">ADD</button>
            </div>
            <div class="col col-md-5"></div>
          </div>
          <!-- closing button -->
          <div id="expenses_acknowledgement" class="col-md-12 h5 text-success font-weight-bold text-center" style="font-family: sans-serif;"</div>

        </div>
        <!-- form content end -->
        <hr style="border-top: 2px solid #ff5252;">
      </div>
    </div>
  </body>
</html>
