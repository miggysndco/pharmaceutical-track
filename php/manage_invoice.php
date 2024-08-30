<?php
  /*
  if(isset($_GET["action"]) && $_GET["action"] == "archive") {
    require "db_connection.php";
    $invoice_number = $_GET["invoice_number"];
    $query = "INSERT INTO archive_invoices (INVOICE_ID, NET_TOTAL, INVOICE_DATE, CUSTOMER_ID, TOTAL_AMOUNT, TOTAL_DISCOUNT) SELECT INVOICE_ID, NET_TOTAL, INVOICE_DATE, CUSTOMER_ID, TOTAL_AMOUNT, TOTAL_DISCOUNT FROM invoices  WHERE INVOICE_ID='$invoice_number';";
    if(mysqli_query($connection,$query))
    
    $result = mysqli_query($con, $query);
    if(!empty($result))
  		showInvoices();
  }*/

  if(isset($_GET["action"]) && $_GET["action"] == "delete") {
    require "db_connection.php";
    $invoice_number = $_GET["invoice_number"];
    $query = "DELETE FROM invoices WHERE INVOICE_ID = $invoice_number";
    $result = mysqli_query($con, $query);
    if(!empty($result))
  		showInvoices();
  }

  if(isset($_GET["action"]) && $_GET["action"] == "refresh")
    showInvoices();

  if(isset($_GET["action"]) && $_GET["action"] == "search")
    searchInvoice(strtoupper($_GET["text"]), $_GET["tag"]);

  if(isset($_GET["action"]) && $_GET["action"] == "print_invoice")
    printInvoice($_GET["invoice_number"]);

  function showInvoices() {
    require "db_connection.php";
    if($con) {
      $seq_no = 0;
      $query = "SELECT * FROM invoices INNER JOIN customers ON invoices.CUSTOMER_ID = customers.ID";
      $result = mysqli_query($con, $query);
      while($row = mysqli_fetch_array($result)) {
        $seq_no++;
        showInvoiceRow($seq_no, $row);
      }
    }
  }

  function showInvoiceRow($seq_no, $row) {
    ?>
    <tr>
      <td><?php echo $seq_no; ?></td>
      <td><?php echo $row['INVOICE_ID']; ?></td>
      <td><?php echo $row['NAME']; ?></td>
      <td><?php echo $row['INVOICE_DATE']; ?></td>
      <td><?php echo $row['TOTAL_AMOUNT']; ?></td>
      <td><?php echo $row['TOTAL_DISCOUNT']; ?></td>
      <td><?php echo $row['NET_TOTAL']; ?></td>
      <td>
        <button class="btn btn-warning btn-sm" onclick="printInvoice(<?php echo $row['INVOICE_ID']; ?>);">
          <i class="fa fa-fax"></i>
        </button>
        <button class="btn btn-danger btn-sm">
          <a href="php/archive_invoice.php?INVOICE_ID=<?php echo $showData['INVOICE_ID']?>"></a>
          <i class="fa fa-trash"></i>
        </button>
      </td>
    </tr>
    <?php
  }

  function searchInvoice($text, $column) {
    require "db_connection.php";
    if($con) {
      $seq_no = 0;
      if($column == 'INVOICE_ID')
        $query = "SELECT * FROM invoices INNER JOIN customers ON invoices.CUSTOMER_ID = customers.ID WHERE CAST(invoices.$column AS VARCHAR(9)) LIKE '%$text%'";
      else if($column == "INVOICE_DATE")
        $query = "SELECT * FROM invoices INNER JOIN customers ON invoices.CUSTOMER_ID = customers.ID WHERE invoices.$column = '$text'";
      else
        $query = "SELECT * FROM invoices INNER JOIN customers ON invoices.CUSTOMER_ID = customers.ID WHERE UPPER(customers.$column) LIKE '%$text%'";

      $result = mysqli_query($con, $query);
      while($row = mysqli_fetch_array($result)) {
        $seq_no++;
        showInvoiceRow($seq_no, $row);
      }
    }
  }

  function printInvoice($invoice_number) {
    require "db_connection.php";
    if($con) {
        $query = "SELECT * FROM sales INNER JOIN customers ON sales.CUSTOMER_ID = customers.ID WHERE INVOICE_NUMBER = $invoice_number";
        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $name = $row['NAME'];
            $address = $row['ADDRESS'];
            $contact_number = $row['CONTACT_NUMBER'];
            $doctor_name = $row['DOCTOR_NAME'];
            $doctor_address = $row['DOCTOR_ADDRESS'];

            $query = "SELECT * FROM invoices WHERE INVOICE_ID = $invoice_number";
            $result = mysqli_query($con, $query);
            if($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);
                $INVOICE_DATE = $row['INVOICE_DATE'];
                $total_amount = $row['TOTAL_AMOUNT'];
                $total_discount = $row['TOTAL_DISCOUNT'];
                $net_total = $row['NET_TOTAL'];
            }
        } 
    }


    ?>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <link rel="stylesheet" href="css/home.css">
    <div class="row">
  </br>
      <div class="col-md-1"></div>
  </br>
      <div class="col-md-10 h3" style="color: #000000;">CUSTOMER INVOICE<span class="float-right">Invoice Number : <?php echo $invoice_number; ?></span></div>
    </div>
    <div class="row font-weight-bold">
      <div class="col-md-1"></div>
      <div class="col-md-10"><span class="h4 float-right">Invoice Date : <?php echo $INVOICE_DATE; ?></span></div>
    </div>
    <div class="row text-center">
      <hr class="col-md-10" style="padding: 0px; border-top: 2px solid  #02b6ff;">
    </div>
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-4">
        <span class="h4">Customer Details : </span><br><br>
        <span class="font-weight-bold">Name : </span><?php echo $name; ?><br>
        <span class="font-weight-bold">Address : </span><?php echo $address; ?><br>
        <span class="font-weight-bold">Contact Number : </span><?php echo $contact_number; ?><br>
        <span class="font-weight-bold">Doctor's Name : </span><?php echo $doctor_name; ?><br>
        <span class="font-weight-bold">Doctor's Address : </span><?php echo $doctor_address; ?><br>
      </div>
      <div class="col-md-3"></div>
  </br>
      <div class="col-md-4">
        <span class="h4">Shop Details : </span><br><br>
        <span class="font-weight-bold">Medsave Rx Pharmacy</span><br>
        <span class="font-weight-bold">Cabuyao,</span><br>
        <span class="font-weight-bold">medsaverxpharmacy@gmail.com</span><br>
        <span class="font-weight-bold">Contact: 09857382918</span>
      </div>
      <div class="col-md-1"></div>
    </div>
    <div class="row text-center">
      <hr class="col-md-10" style="padding: 0px; border-top: 2px solid  #02b6ff;">
    </div>

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10 table-responsive">
        <table class="table table-bordered table-striped table-hover" id="purchase_report_div">
          <thead>
            <tr>
              <th>No.</th>
              <th>Medicine Name</th>
              <th>Expiry Date</th>
              <th>Quantity</th>
              <th>MRP</th>
              <th>Discount</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $seq_no = 0;
              $total = 0;
              $query = "SELECT * FROM sales WHERE INVOICE_NUMBER = $invoice_number";
              $result = mysqli_query($con, $query);
              while($row = mysqli_fetch_array($result)) {
                $seq_no++;
                ?>
                <tr>
                  <td><?php echo $seq_no; ?></td>
                  <td><?php echo $row['MEDICINE_NAME']; ?></td>
                  <td><?php echo $row['EXPIRY_DATE']; ?></td>
                  <td><?php echo $row['QUANTITY']; ?></td>
                  <td><?php echo $row['MRP']; ?></td>
                  <td><?php echo $row['DISCOUNT']."%"; ?></td>
                  <td><?php echo $row['TOTAL']; ?></td>
                </tr>
                <?php
              }
            ?>
          </tbody>
          <tfoot class="font-weight-bold">
            <tr style="text-align: right; font-size: 18px;">
              <td colspan="6">&nbsp;Total Amount</td>
              <td><?php echo $total_amount; ?></td>
            </tr>
            <tr style="text-align: right; font-size: 18px;">
              <td colspan="6">&nbsp;Total Discount</td>
              <td><?php echo $total_discount; ?></td>
            </tr>
            <tr style="text-align: right; font-size: 22px;">
              <td colspan="6" style="color: green;">&nbsp;Net Amount</td>
              <td class="text-primary"><?php echo $net_total; ?></td>
            </tr>
          </tfoot>
        </table>
      </div>
      <div class="col-md-1"></div>
    </div>
    <div class="row text-center">
      <hr class="col-md-10" style="padding: 0px; border-top: 2px solid  #02b6ff;">
    </div>
    <?php
  }

?>
