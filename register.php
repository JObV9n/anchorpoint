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
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <h2>Register</h2>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <!--===== Registration Form ============-->
        <h3 class="mt-2 text-success text-left">Ajax Register Form</h3>
        <p class="text-center" id="msg"></p>
        <form autocomplete="off" action="" method="post">
          <input type="hidden" id="action" value="register">
          <div class="mb-3 mt-3">
            <input type="text" id="name" placeholder="Name" value="">
          </div>

          <div class="mb-3 mt-3">
            <input type="text" id="username" value="" placeholder="Username">
          </div>
          <div class="mb-3 mt-3">
            <input type="password" id="password" value="" placeholder="Password">
          </div>
          <button type="button" class="btn btn-primary" onclick="submitData();">Register</button>
        </form>
        <br>
        <a href="login.php">Go To Login</a>
        <?php require 'script.php'; ?>

      </div>
    </div>
  </div>
</body>

</html>