var rows = 0;

//isSupplier = false;

class MedicineStock {
  constructor(name, batch_id, expiry_date, quantity, mrp, rate) {
    this.name = name;
    this.batch_id = batch_id;
    this.expiry_date = expiry_date;
    this.quantity = quantity;
    this.mrp = mrp;
    this.rate = rate;
  }
}

class NewMedicine {
  constructor(name, packing, generic_name, supplier_name) {
    this.name = name;
    this.packing = packing;
    this.generic_name = generic_name;
    this.supplier_name = supplier_name;
  }
}

function addRow() {
  if(typeof addRow.counter == 'undefined')
    addRow.counter = 1;
  var previous = document.getElementById("expenses_medicine_list_div").innerHTML;
  var node = document.createElement("div");
  var id = document.createAttribute("id");
  id.value = "medicine_row_" + addRow.counter;
  node.setAttributeNode(id);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState = 4 && xhttp.status == 200)
      node.innerHTML = xhttp.responseText;
      document.getElementById("expenses_medicine_list_div").appendChild(node);
  };
  xhttp.open("GET", "php/add_new_expenses.php?action=add_row&row_id=" + id.value + "&row_number=" + addRow.counter, true);
  xhttp.send();
  //alert(addRow.counter);
  addRow.counter++;
  rows++;
}

function removeRow(row_id) {
  if(rows == 1)
    alert("Can't delete only one row is there!");
  else {
    document.getElementById(row_id).remove();
    rows--;
  }
}

function isSupplier(name) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState = 4 && xhttp.status == 200)
      xhttp.responseText;
  };
  xhttp.open("GET", "php/add_new_expenses.php?action=is_supplier&name=" + name, false);
  xhttp.send();
  return xhttp.responseText;
}

function checkInvoice(invoice_number, error) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState = 4 && xhttp.status == 200)
      xhttp.responseText;
  };
  xhttp.open("GET", "php/add_new_expenses.php?action=is_invoice&invoice_number=" + invoice_number, false);
  xhttp.send();
  if(xhttp.responseText == "true") {
    document.getElementById(error).style.display = "block";
    document.getElementById(error).innerHTML = "already added!";
    return true;
  }
  else
    document.getElementById(error).style.display = "none";
  return false;
}

function isNewMedicine(name, packing) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState = 4 && xhttp.status == 200)
      xhttp.responseText;
  };
  xhttp.open("GET", "php/add_new_expenses.php?action=is_new_medicine&name=" + name + "&packing=" + packing, false);
  xhttp.send();
  return xhttp.responseText;
}

function getAmount(row_number) {
  var qty = document.getElementById("quantity_" + row_number).value;
  var rate = document.getElementById("rate_" + row_number).value;
  document.getElementById("amount_" + row_number).value = qty * rate;

  var parent = document.getElementById('expenses_medicine_list_div');
  var row_count = parent.childElementCount;
  var medicine_info = parent.children;
  var total = 0;
  var amount;
  for(var i = 1; i < row_count; i++) {
    amount = Number.parseFloat(medicine_info[i].children[0].children[7].children[0].children[0].value);
    total += amount;
  }
  document.getElementById("grand_total").value = total;
}

/*----------------------------------------------------------------------------------------------------------------------------------------------------*/
function checkDate(date, error) {
  var result = document.getElementById(error);
  result.style.display = "block";
  if(date == "")
    result.innerHTML = "Mustn't be empty!!";
  else if(new Date(date) > new Date())
    result.innerHTML = "Mustn't be future date!";
  else {
    result.style.display = "none";
    return true;
  }
  return false;
}

function notNull(text, error) {
  var result = document.getElementById(error);
  result.style.display = "block";
  if(text < 0) {
    result.innerHTML = "Invalid!";
    return false;
  }
  else if(text.trim() == "") {
    result.innerHTML = "Must be filled out!";
    return false;
  }
  result.style.display = "none";
  return true; 
}

function validateAddress(address, error) {
  var result = document.getElementById(error);
  result.style.display = "block";
  if(address.trim().length < 10) {
    result.innerHTML = "Please enter more specific address!";
    return false;
  }
  else
    result.style.display = "none";
  return true;
}

function validateName(name, error) {
  var result = document.getElementById(error);
  result.style.display = "block";
  if(name.trim() == "") {
    result.innerHTML = "Must be filled out!";
    return false;
  }
  result.innerHTML = "Must contain only letters!";
  for(var i = 0; i < name.length; i++)
    if(!((name[i] >= 'a' && name[i] <= 'z') || (name[i] >= 'A' && name[i] <= 'Z') || name[i] == ' '))
      return false;
  result.style.display = "none";
  return true;
}

function addExpenses() {
  document.getElementById("expenses_acknowledgement").innerHTML = "";
  var expenses_name = document.getElementById("expenses_name");
  var invoice_number = document.getElementById("invoice_number");
  var payment_type = document.getElementById("payment_type");
  var invoice_date = document.getElementById("invoice_date");
  var expenses_details = document.getElementById("expenses_details");
  var amount = document.getElementById("amount");

  if(!validateName(expenses_name.value, "name_error"))
    expenses_name.focus();

  else if(!notNull(invoice_number.value, "invoice_number_error"))
    invoice_number.focus();

  else if(checkInvoice(invoice_number.value, "invoice_number_error"))
    invoice_number.focus();

  else if(!validateDetails(expenses_details.value, "expenses_details_error"))
    expenses_details.focus();

  else if(!checkDate(invoice_date.value, "date_error"))
    invoice_date.focus();

  else {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(xhttp.readyState == 4 && xhttp.status == 200)
        document.getElementById("expenses_acknowledgement").innerHTML = xhttp.responseText;
    };
    xhttp.open("GET", "php/add_new_expenses.php?name=" + expenses_name.value + "&invoice_number=" + invoice_number.value + "&payment_type=" + payment_type.value + "&invoice_date=" + invoice_date.value + "&details=" + expenses_details.value + "&amount=" + amount.value, true);
    xhttp.send();
  } 
}

/*----------------------------------------------------------------------------------------------------------------------------------------------------*/

function addNewMedicine(name, packing, generic_name, supplier_name) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState = 4 && xhttp.status == 200)
      alert("New medicine " + xhttp.responseText);
  };
  xhttp.open("GET", "php/add_new_medicine.php?name=" + name + "&packing=" + packing + "&generic_name=" + generic_name + "&suppliers_name=" + supplier_name, false);
  xhttp.send();
}

function addMedicineStock(name, batch_id, expiry_date, quantity, mrp, rate, invoice_number) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState = 4 && xhttp.status == 200)
      xhttp.responseText;
  };
  xhttp.open("GET", "php/add_new_expenses.php?action=add_stock&name=" + name + "&batch_id=" + batch_id + "&expiry_date=" + expiry_date + "&quantity=" + quantity + "&mrp=" + mrp + "&rate=" + rate + "&invoice_number=" + invoice_number, false);
  xhttp.send();
}
