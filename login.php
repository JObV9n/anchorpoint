<?php
require 'function.php';
if (isset($_SESSION["id"])) {
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <h2>Login</h2>
  <!-- <form autocomplete="off" action="" method="post">
      <input type="hidden" id="action" value="login">
      <label for="">Username</label>
      <input type="text" id="username" value=""> <br>
      <label for="">Password</label>
      <input type="password" id="password" value=""> <br>
      <button type="button" onclick="submitData();">Login</button>
    </form> -->




  <!--  -->

  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <!--===== Login Form ============-->
        <h3 class="mt-3 text-success text-center">Ajax Login Form</h3>
        <p class="text-center" id="msg"></p>
        <form autocomplete="off" action="" id="" method="post">
          <input type="hidden" id="action" value="login">
          <div class="mb-3 mt-3">
            <input type="text" class="form-control" placeholder="Username" id="username" value="">
          </div>
          <div class="mb-3 mt-3">
            <input type="password" class="form-control" placeholder="Password" name="password" id="password" value="">
          </div>
          <button type="button" class="btn btn-primary" onclick="submitData();">Login</button>
        </form>
        <!--===== login Form ============-->
      </div>
      <div class="col-sm-8">
      </div>
    </div>
  </div>
  <!--  -->
  <a href="register.php">Go To Register</a>
  <?php require 'script.php'; ?>
</body>

</html>