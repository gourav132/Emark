<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link rel = "icon" href = "../css/img/favicon.ico" type = "image/x-icon">
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link  href="../css/login.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back! Teacher</h1>
                  </div>

                  <form action = "process/LoginProcess.php" method = "POST" class = "user" onsubmit = "return validate()">

                    <div class="form-group">
                      <input onfocus = "BackToNormal('Email')" type="email" class="form-control form-control-user" id="Email" name = "Email" aria-describedby="emailHelp" placeholder="Email Address...">
                      <label id = "LableForEmail" for="Email" class = "m-2 text-danger">Enter a valid email address</label>
                    </div>
                    
                    <div class="form-group">
                      <input onfocus = "BackToNormal('Passwd')" type="password" class="form-control form-control-user" id="Passwd" name = "Passwd" placeholder="Password...">
                      <label id = "LableForPasswd" for="Passwd" class = "m-2 text-danger">Enter a valid password</label>
                    </div>

                    <div>
                      <?php 
                      if(isset($_SESSION['errorMessage']))
                      {
                          $message = $_SESSION['errorMessage'];
                          ?>
                          <p class="text-danger" style = "text-align: center;"><?php echo $message; ?></p>
                          <?php
                      }
                      unset($_SESSION["errorMessage"]);
                      ?>            
                  </div>

                  <div>
                      <?php 
                      if(isset($_SESSION['successMessage']))
                      {
                          $message = $_SESSION['successMessage'];
                          ?>
                          <p class="text-success" style = "text-align: center;"><?php echo $message; ?></p>
                          <?php
                      }
                      unset($_SESSION["successMessage"]);
                      ?>            
                  </div>

                    <button type = "submit" name = "submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>

                    

                  </form>

                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <script>
    function validate(){
      var Email = document.getElementById("Email").value.trim();
      var Passwd = document.getElementById("Passwd").value.trim();
      var status = true;

      if(Email == ""){
        document.getElementById("LableForEmail").style.display = "initial";
        document.getElementById('Email').className += ' is-invalid';
        status = false;
      }

      if(Passwd == ""){
        document.getElementById("LableForPasswd").style.display = "initial";
        document.getElementById('Passwd').className += ' is-invalid';
        status = false;
      }
      return status;
    }

    function BackToNormal(para){
      document.getElementById("LableFor".concat(para)).style.display = "none";
      document.getElementById(para).classList.remove("is-invalid");
      document.getElementById(para).classList.remove("is-valid");
    }

  </script>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
