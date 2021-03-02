<?php 
  session_start();
  if(isset($_SESSION['admin']) || isset($_COOKIE['admin']))
  {

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Dashboard</title>

  <!-- css -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../css/admin-stylesheet.css" rel="stylesheet">

  <!-- icon -->
  <link rel = "icon" href = "../css/img/favicon.ico" type = "image/x-icon">

  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/css/uikit.min.css" />
  
  <!-- ajax -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>


<div class="loading uk-flex uk-flex-center uk-flex-middle d-none">

  <div class="loading-bar uk-flex uk-flex-center uk-flex-middle">
  
    <div class="sk-chase">
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
      <div class="sk-chase-dot"></div>
    </div>

  </div>

</div>

<body id="page-top">

  <!-- Wrapping the whole page -->
  <div id="wrapper">

  <!-- Including the sidebar from includes folder -->
  <?php include_once("include/sidebar.php"); ?>

    <!-- Wrapping the whole page leaving the sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content" >

      <!-- Including the navbar from includes folder -->
      <?php include_once("include/navbar.php") ?>


        <!------====== Begin Page Content ======------>

                <!------====== Div to perform ajax query ======------>
                
                      <div class="container-fluid" id="ajax">

                      </div>

                <!------====== Div to perform ajax query ======------>

        <!------====== End Page Content ======------>


      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Emark 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->


  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="Process/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <?php include_once("include/javascript.php") ?>

  <!-- Custom JS -->
  <script src="../js/admin-index.js"></script>
  <!-- UIkit JS -->
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.9/dist/js/uikit-icons.min.js"></script>


</body>

</html>

<?php }
else{
  header("location: login.php");
}?>
