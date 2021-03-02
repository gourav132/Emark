    <style>
      a{
        cursor: pointer;
      }
    </style>
    
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion mt-0" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Emark</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a onclick = "return AddClass('AdminPanel.php')" class="nav-link">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-cog"></i>
          <span>Manage</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Add and Delete:</h6>
            <a onclick = "return AddClass('Ajax/AddClass.php')" class="collapse-item">Class</a>
            <a onclick = "return AddClass('Ajax/AddSection.php')" class="collapse-item">Section</a>
            <a onclick = "return AddClass('Ajax/AddTerm.php')" class="collapse-item">Terms</a>
            <a onclick = "return AddClass('Ajax/AddSubject.php')" class="collapse-item">Subject</a>
            <a onclick = "return AddClass('Ajax/formulae.php')" class="collapse-item">Formulae</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <!-- <i class="fas fa-fw fa-wrench"></i> -->
          <i class="fa fa-compress" aria-hidden="true"></i>
          <span>Merge</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Combinations</h6>
            <a onclick = "return AddClass('Ajax/ClassWithSection.php')" class="collapse-item" href="utilities-color.html">Class with Section</a>
            <a onclick = "return AddClass('Ajax/ClassWithSubject.php')" class="collapse-item" href="utilities-border.html">Class with Subjects</a>
            <a onclick = "return AddClass('Ajax/ClassWithTerm.php')" class="collapse-item" href="utilities-border.html">Class with Terms</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li> -->

      <!-- Nav Item - Charts -->

      <li class="nav-item">
        <a onclick = "return AddClass('Ajax/announcement.php')" class="nav-link" href="charts.html">
          <i class="fa fa-scroll"></i>
          <span>Announcements</span></a>
      </li>

      <li class="nav-item">
        <a onclick = "return AddClass('Ajax/TeachersDetail.php')" class="nav-link" href="charts.html">
          <i class="fa fa-user"></i>
          <span>Teachers Detail</span></a>
      </li>

      <li class="nav-item">
        <a onclick = "return AddClass('Ajax/StudentsDetail.php')" class="nav-link" href="charts.html">
          <i class="fa fa-graduation-cap"></i>
          <span>Students Detail</span></a>
      </li>

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