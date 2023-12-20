function login() {
  $(document).ready(function () {
    var data = {
      email: $("#email").val(),
      password: $("#password").val(),
    };

    $.ajax({//
      type: "POST",
      url: "login.php",
      data: data,
      success: function (response) {
        console.log("Response: ", response);
        console.log("Before redirection: ", window.location.href);

        //   window.location.href = "dashboard.php";
        if (response.includes("success")) {
          //   alert("Login successful");
          console.log("login succesfull");
          window.location.href("dashboard.php");
          console.log("After redirection: ", window.location.href);
          // Redirect or perform other actions for authenticated users
        } else {
          alert("Login failed. Please check your credentials.");
          window.location.href("dashboard.php");
        }
      },
    });//

  });
}
