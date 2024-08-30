<?php
  require "db_connection.php";

  if($con) {
    if(isset($_GET["action"]) && $_GET["action"] == "delete") {
      $id = $_GET["id"];
      $query = "DELETE FROM user WHERE ID = $id";
      $result = mysqli_query($con, $query);
      if(!empty($result))
    		showAccounts(0);
    }

    if(isset($_GET["action"]) && $_GET["action"] == "edit") {
      $id = $_GET["id"];
      showAccounts($id);
    }

    if(isset($_GET["action"]) && $_GET["action"] == "update") {
      $id = $_GET["id"];
      $name = ucwords($_GET["name"]);
      $email = $_GET["email"];
      $password = $_GET["password"];
      $contact_number = $_GET["contact_number"];
      $address = ucwords($_GET["address"]);
      $role = ucwords($_GET["role"]);
      updateAccount($id, $name, $email, $password, $contact_number, $address, $role);
    }

    if(isset($_GET["action"]) && $_GET["action"] == "cancel")
      showAccounts(0);

    if(isset($_GET["action"]) && $_GET["action"] == "search")
      searchAccount(strtoupper($_GET["text"]));
  }

  function showAccounts($id) {
    require "db_connection.php";
    if($con) {
      $seq_no = 0;
      $query = "SELECT * FROM user";
      $result = mysqli_query($con, $query);
      while($row = mysqli_fetch_array($result)) {
        $seq_no++;
        if($row['id'] == $id)
          showEditOptionsRow($seq_no, $row);
        else
          showAccountRow($seq_no, $row);
      }
    }
  }

  function showAccountRow($seq_no, $row) {
    ?>
    <tr>
      <td><?php echo $seq_no; ?></td>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['username']; ?></td>
      <td><?php echo $row['contact_number']; ?></td>
      <td><?php echo $row['address']; ?></td>
      <td><?php echo $row['role']; ?></td>
      <td>
        <button href="" class="btn btn-info btn-sm" onclick="editAccount(<?php echo $row['id']; ?>);">
          <i class="fa fa-pencil"></i>
        </button>
        <button class="btn btn-danger btn-sm" onclick="deleteAccount(<?php echo $row['id']; ?>);">
          <i class="fa fa-trash"></i>
        </button>
      </td>
    </tr>
    <?php
  }

function showEditOptionsRow($seq_no, $row) {
  ?>
  <tr>
    <td><?php echo $seq_no; ?></td>
    <td><?php echo $row['id'] ?></td>
    <td>
      <input type="text" class="form-control" value="<?php echo $row['name']; ?>" placeholder="Name" id="account_name" onkeyup="validateName(this.value, 'name_error');">
      <code class="text-danger small font-weight-bold float-right" id="name_error" style="display: none;"></code>
    </td>
    <td>
      <input type="email" class="form-control" value="<?php echo $row['username']; ?>" placeholder="Email" id="account_email" onblur="validateEmail(this.value, 'email_error');">
    </td>
    <td>
      <input type="number" class="form-control" value="<?php echo $row['contact_number']; ?>" placeholder="Contact Number" id="account_contact_number" onblur="validateContactNumber(this.value, 'contact_number_error');">
      <code class="text-danger small font-weight-bold float-right" id="contact_number_error" style="display: none;"></code>
    </td>
    <td>
      <textarea class="form-control" placeholder="Address" id="account_address" onblur="validateAddress(this.value, 'address_error');"><?php echo $row['address']; ?></textarea>
      <code class="text-danger small font-weight-bold float-right" id="address_error" style="display: none;"></code>
    </td>
    <td>
      <input type="text" class="form-control" value="<?php echo $row['role']; ?>" placeholder="Role" id="account_role" onblur="validateRole(this.value, 'role_error');">
    </td>
    <td>
      <button href="" class="btn btn-success btn-sm" onclick="updateAccount(<?php echo $row['id']; ?>);">
        <i class="fa fa-edit"></i>
      </button>
      <button class="btn btn-danger btn-sm" onclick="cancel();">
        <i class="fa fa-close"></i>
      </button>
    </td>
  </tr>
  <?php
}

function updateAccount($id, $name, $email, $password, $contact_number, $address, $role) {
  require "db_connection.php";
  $query = "UPDATE user SET name = '$name', username = '$email', password = '$password' contact_number = '$contact_number', address = '$address', role = '$role' WHERE id = $id";
  $result = mysqli_query($con, $query);
  if(!empty($result))
    showAccounts(0);
}

function searchAccount($text) {
  require "db_connection.php";
  if($con) {
    $seq_no = 0;
    $query = "SELECT * FROM user WHERE UPPER(NAME) LIKE '%$text%'";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($result)) {
      $seq_no++;
      showAccountRow($seq_no, $row);
    }
  }
}

?>
