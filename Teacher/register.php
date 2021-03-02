<?php
session_start();
  include_once("include/connection.php");
  $sql = "SELECT * FROM classwtsection";
    $result = mysqli_query($link, $sql);
    $row = mysqli_num_rows($result);
    $section = "";
    if($row > 0){
        while($row = mysqli_fetch_assoc($result)){
            $section.= '<option>'.$row['classWtSecId'].'</option>';
        }
    }
    else{
        $section = "Sections not yet registered";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>

  <!-- Custom fonts for this template-->
  <link rel = "icon" href = "../css/img/favicon.ico" type = "image/x-icon">
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../css/register.css" rel = "stylesheet">

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

  <style>
    #LableForCode{
      display: none;
    }
  </style>

</head>

<body class="bg-gradient-primary">
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
      <!-- Single form setup -->
        <form onsubmit = "return VerificationValidity()" action = "process/RegistrationProcess.php" method = "POST" class="user">
          <!-- Nested Row within Card Body -->
          <div class="row" id = "Details">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Create an Teacher's account!</h1>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input onfocus = "BackToNormal('Name')" type="text" class="form-control form-control-user" id="Name" name = "Name" placeholder="Full Name">
                    <label id = "LableForName" for="Name" class = "m-2 text-danger">Please enter a valid name</label>
                  </div>
                  <div class="col-sm-6">
                    <input onfocus = "BackToNormal('Email')" type="email" class="form-control form-control-user" id="Email" name = "Email" placeholder="Email">
                    <label id = "LableForEmail" for="Email" class = "m-2 text-danger">Please enter a valid email</label>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input onfocus = "BackToNormal('PhoneNo')" type="text" class="form-control form-control-user" id="PhoneNo" name = "PhoneNo" placeholder="Phone Number">
                    <label id = "LableForPhoneNo" for="PhoneNo" class = "m-2 text-danger">Please enter a valid phone no</label>
                  </div>     
                  <div class="col-sm-6">
                    <!-- <input value="XII"  type="text"  id="Class" name = "Class" placeholder="Class">
                     -->
                    <select class="form-control" onfocus = "BackToNormal('Class')" name="Class" id="Class" style = "width: 100%;border: 1px solid #d1d3e2;height: 50px ;color: #8a8a8a;border-radius: 30px;padding-left: 13px; outline: none;">
                      <option value="Nill">Class Teacher</option>
                      <option value="NA">N/A</option>
                      <?php echo $section; ?>
                    </select>
                    <label id = "LableForClass" for="Class" class = "m-2 text-danger">Please enter a valid class</label>
                  </div>          
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input onfocus = "BackToNormal('Passwd')" type="password" class="form-control form-control-user" id="Passwd" name = "Passwd" placeholder="Password">
                    <label id = "LableForPasswd" for="Passwd" class = "m-2 text-danger">Please enter a valid password</label>
                  </div>
                  <div class="col-sm-6">
                    <input onfocus = "BackToNormal('ConfirmPasswd')" type="password" class="form-control form-control-user" id="ConfirmPasswd" name = "ConfirmPasswd" placeholder="Repeat Password">
                    <label id = "LableForConfirmPasswd" for="ConfirmPasswd" class = "m-2 text-danger">Password not matched</label>
                  </div>
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

                <button type = "button" onclick = "validate()" class="btn btn-primary btn-user btn-block">
                <b>Next </b><i class="ml-1 fa fa-arrow-right"></i>
                </button>
                <div class=" mt-2 text-center">
                    <a class="small" href="login.php">Already have an account? SignIn</a>
                  </div>
              </div>
            </div>
          </div>

          <div class="row d-none" id = "Verify">
            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-2">Varification Code</h1>
                  <p class="mb-4"></p>
                </div>

                <div class="form-group">
                  <input onfocus = "BackToNormal('Code')" type="text" class="form-control form-control-user" name = "Code" id="Code" aria-describedby="emailHelp" placeholder="Varification Code...">
                  <label class = "m-2 text-danger" id = "LableForCode" for="PhoneNo" class = "m-2 text-danger">Please enter a valid verification code</label>
                </div>

                <div class="row">
                  <div class="col">
                    <button type = "button" onclick = "Back()" class="btn btn-primary btn-user btn-block">
                      <i class="mr-1 fa fa-arrow-left"></i><b> Back</b>
                    </button>
                  </div>
                  <div class="col">
                    <button name = "Submit" type = "submit" onclick = "Back()" class="btn btn-primary btn-user btn-block">
                      <i class="mr-1 fa fa-check"></i><b> Submit</b>
                    </button>
                  </div>
                </div>
                <hr>
              </div>
            </div>
          </div>
        </form>
        
      </div>
    </div>
  </div>

  <script>
    var Name;
    var Email;
    var PhoneNo;
    var Class;
    var Passwd;
    var ConfirmPasswd;
    var code;

    function validate(){
      Name = document.getElementById("Name").value.trim();
      Email = document.getElementById("Email").value.trim();
      PhoneNo = document.getElementById("PhoneNo").value.trim();
      Class = document.getElementById("Class").value.trim();
      Passwd = document.getElementById("Passwd").value.trim();
      ConfirmPasswd = document.getElementById("ConfirmPasswd").value.trim();
      var status = true;

      if(Name == ""){
        document.getElementById("LableForName").style.display = "initial";
        document.getElementById('Name').className += ' is-invalid';
        status = false;
      }

      if(Email == ""){
        document.getElementById("LableForEmail").style.display = "initial";
        document.getElementById('Email').className += ' is-invalid';
        status = false;
      }

      if(PhoneNo == ""){
        document.getElementById("LableForPhoneNo").style.display = "initial";
        document.getElementById('PhoneNo').className += ' is-invalid';
        status = false;
      }

      if(Class == "Nill"){
        document.getElementById("LableForClass").style.display = "initial";
        document.getElementById('Class').className += ' is-invalid';
        status = false;
      }

      if(Passwd == ""){
        document.getElementById("LableForPasswd").style.display = "initial";
        document.getElementById('Passwd').className += ' is-invalid';
        status = false;
      }

      if(ConfirmPasswd == ""){
        document.getElementById("LableForConfirmPasswd").style.display = "initial";
        document.getElementById('ConfirmPasswd').className += ' is-invalid';
        status = false;
      }

      if(ConfirmPasswd != Passwd){
        document.getElementById("LableForConfirmPasswd").style.display = "initial";
        document.getElementById('ConfirmPasswd').className += ' is-invalid';
        status = false;
      }

      if(status == true){
        VarificationNext();
      }
    }

    function BackToNormal(para){
      document.getElementById("LableFor".concat(para)).style.display = "none";
      document.getElementById(para).classList.remove("is-invalid");
    }

    function VarificationNext(){
      document.getElementById("Verify").classList.remove("d-none");
      document.getElementById('Details').className += ' d-none';    
    }

    function Back(){
      document.getElementById("Details").classList.remove("d-none");
      document.getElementById('Verify').className += ' d-none';   
    }
    

    function VerificationValidity(){
      Code = document.getElementById("Code").value.trim();
      var status = false;
      if(Code == ""){
        document.getElementById("LableForCode").style.display = "initial";
        document.getElementById('Code').className += ' is-invalid';
      }
      else{
        status = true;
      }
      return status;
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
