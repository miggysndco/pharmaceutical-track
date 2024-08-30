function deleteAccount(id) {
  var confirmation = confirm("Are you sure?");
  if(confirmation) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(xhttp.readyState == 4 && xhttp.status == 200)
        document.getElementById('accounts_div').innerHTML = xhttp.responseText;
    };
    xhttp.open("GET", "php/manage_account.php?action=archive&id=" + id, true);
    xhttp.send();
  }
}

function editAccount(id) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState == 4 && xhttp.status == 200)
      document.getElementById('accounts_div').innerHTML = xhttp.responseText;
  };
  xhttp.open("GET", "php/manage_account.php?action=edit&id=" + id, true);
  xhttp.send();
}

function updateAccount(id) {
  var account_name = document.getElementById("account_name");
  var account_email = document.getElementById("account_email");
  var account_password = document.getElementById("account_password");
  var contact_number = document.getElementById("account_contact_number");
  var account_address = document.getElementById("account_address");
  var account_role = document.getElementById("account_role");
  if(!validateName(account_name.value, "name_error"))
  account_name.focus();
  else if(!validateContactNumber(contact_number.value, "contact_number_error"))
    contact_number.focus();
  else if(!validateAddress(account_address.value, "address_error"))
  account_address.focus();
  else {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(xhttp.readyState = 4 && xhttp.status == 200)
        document.getElementById('accounts_div').innerHTML = xhttp.responseText;
    };
    xhttp.open("GET", "php/manage_account.php?action=update&id=" + id + "&name=" + account_name.value + "&email=" + account_email.value + "&password=" + account_password.value +"&contact_number=" + contact_number.value + "&address=" + account_address.value + "&role=" + account_role.value, true);
    xhttp.send();
  }
}

function cancel() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState = 4 && xhttp.status == 200)
      document.getElementById('accounts_div').innerHTML = xhttp.responseText;
  };
  xhttp.open("GET", "php/manage_account.php?action=cancel", true);
  xhttp.send();
}

function searchAccount(text) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState = 4 && xhttp.status == 200)
      document.getElementById('accounts_div').innerHTML = xhttp.responseText;
  };
  xhttp.open("GET", "php/manage_account.php?action=search&text=" + text, true);
  xhttp.send();
}
