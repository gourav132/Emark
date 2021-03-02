<?php
$class = $_SESSION['TeachersClass'];
?>
    <style>
      a{
        cursor: pointer;
      }
    </style>
    
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion mt-0" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Emark</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

    <!-- Heading -->

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-cog"></i>
          <span>Manage Profile</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Add and Delete:</h6>
            <a onclick = "return AddClass('Ajax/AddClass.php')" class="collapse-item">Class</a>
            <?php
              if($class != "NA"){
            ?>
            <a onclick = "return AddClass('Ajax/AddStudent.php')" class="collapse-item">Student</a>
            <?php 
              }
            ?>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fa fa-compress" aria-hidden="true"></i>
          <span>Manage Marks</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Marks</h6>
            <a onclick = "return AddClass('Ajax/AddMarks.php')" class="collapse-item" href="utilities-color.html">Add Marks</a>
            <a onclick = "return AddClass('Ajax/ViewMarks.php')" class="collapse-item" href="utilities-color.html">View Marks</a>
          </div>
        </div>
      </li>

    <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <?php
        if($class != "NA"){
      ?>
      
      <li class="nav-item">
        <a onclick = "return AddClass('Ajax/ReportCard.php')" class="nav-link" href="charts.html">
          <i class="fa fa-file"></i>
          <span>Report Card</span></a>
      </li>

      <li class="nav-item">
        <a onclick = "return AddClass('Ajax/Setting.php')" class="nav-link" href="charts.html">
          <i class="fa fa-graduation-cap"></i>
          <span>Students Detail</span></a>
      </li>

      <?php
        }
      ?>

      <li class="nav-item">
        <a onclick = "return AddClass('Ajax/Setting.php')" class="nav-link" href="charts.html">
          <i class="fa fa-cogs"></i>
          <span>Settings</span></a>
      </li>




      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->