<?php
require_once('../php/db_connection.php');
$INVOICE_ID = $_REQUEST['INVOICE_ID'];
$query = "INSERT INTO archive_invoices (INVOICE_ID, NET_TOTAL, INVOICE_DATE, CUSTOMER_ID, TOTAL_AMOUNT, TOTAL_DISCOUNT) SELECT INVOICE_ID, NET_TOTAL, INVOICE_DATE, CUSTOMER_ID, TOTAL_AMOUNT, TOTAL_DISCOUNT FROM invoices  WHERE INVOICE_ID='$INVOICE_ID'";

if(mysqli_query($connection,$query)){

    $query = "DELETE FROM invoices WHERE INVOICE_ID = $INVOICE_ID";
    if(mysqli_query($connection,$query)){

    echo "<script>window.location.href='manage_invoice.php';</script>";
    }
    else{
        echo "<script>window.location.href='manage_invoice.php';</script>"; 
    }
}
else{
    echo "<script>window.location.href='manage_invoice.php';</script>";
 }
?>