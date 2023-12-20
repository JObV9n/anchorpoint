<?php
require_once('vendor/autoload.php');
require './function.php';
if (isset($_SESSION["id"])) {
  $id = $_SESSION["id"];
  $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id"));
} else {
  header("Location: login.php");
}

//  echo $user["name"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <title>AJAX CRUD</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <script src="customer.js"></script>
</head>

<body>
  <div class="container-xl">
    <div class="table-responsive">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="bg-light p-2 m-2">
            <h5 class="text-dark text-center">Customer Dashboard</h5>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <h2>Welcome <b>
                  <?php echo $user["name"]; ?>
                </b></h2>
            </div>
            <div class="col-sm-6">
              <a href="#editCustomerModal" class="btn btn-success" data-toggle="modal"><i
                  class="material-icons">&#xE147;</i><span>Edit your Details</span></a>
              <a href="logout.php" class="btn btn-success"><i
                  class="material-icons">&#xE147;</i><span>Logout</span></a>
                  
            </div>
          </div>
        </div>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Address</th>
              <th>Phone</th>
              <!-- <th>role</th> -->
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="customer_data">
          </tbody>
        </table>
        <p class="loading">Loading Data</p>
      </div>
    </div>
  </div>
  <!-- Edit Modal HTML -->
  <!-- <div id="addCustomerModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body add_epmployee">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="name_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" id="address_input" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" id="phone_input" class="form-control" required>
                    </div>

                     <div class="form-group">
                        <label>role</label>
                        <input type="text" id="role_input" class="form-control" required>
                    </div> -->

  <!-- </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                     <input type="submit" class="btn btn-success" value="Add" onclick="addEmployee()"> -->
  <!-- </div>
            </div>
        </div>
    </div>   -->
  <!-- Edit Modal HTML -->
  <div id="editCustomerModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Customer</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body edit_customer">
          <div class="form-group">
            <label>Name</label>
            <input type="text" id="name_input" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" id="email_input" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" id="password_input" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" id="address_input" ></textarea>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" id="phone_input" class="form-control" required>
            <input type="hidden" id="customer_id" class="form-control" required>
          </div>

          <!-- <div class="form-group">
                        <label>Role</label>
                        <input type="text" id="role_input" class="form-control" required>
                    </div> -->
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-info" onclick="editCustomer()" value="Save">
        </div>
      </div>
    </div>
  </div>

  <!-- View Modal HTML -->
  <div id="viewCustomerModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">View yout Details</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body view_employee">
          <div class="form-group">
            <label>Name</label>
            <input type="text" id="name_input" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" id="email_input" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" id="address_input" readonly></textarea>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" id="phone_input" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label>Role</label>
            <input type="text" id="role_input" class="form-control" readonly>
          </div>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Modal HTML -->
  <div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete Employee</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete these Records?</p>
          <p class="text-warning"><small>This action cannot be undone.</small></p>
        </div>
        <input type="hidden" id="delete_id">
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
          <input type="submit" class="btn btn-danger" onclick="deleteCustomer()" value="Delete">
        </div>
      </div>
    </div>
  </div>

  <script>

  </script>
  <script>

  </script>

</body>

</html>

<!--  -->
<!-- <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
  </head>
  <body>
    <h1>Welcome </h1>
    <a href="logout.php">Logout</a>
  </body>
</html> -->