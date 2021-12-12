<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"><sub><style>.fa-bars{color:white;}</style></sub></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
      
        <a href="dashboard.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="event.php" class="nav-link">Event</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">Winner</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="solo_register.php" class="nav-link">Solo Registers</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="duo_register.php" class="nav-link">Duo Registers</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="squad_register.php" class="nav-link">Squad Registers</a>
      </li> -->
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
    
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <!-- <li class="nav-item d-flex">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
      <li class="nav-item d-flex">
        <a class="nav-link" role="button" href="admin_setting.php">
        <i class="fas fa-cog"></i>
        </a>
      </li>
      <li>
        <div class="user-panel d-flex">
        
        <div class="info d-flex">
          <p style="font-size:20px; color:#fff">Hello</p>&nbsp;&nbsp;&nbsp;
          <a href="#" class="d-block" style="font-size:20px; color:#fff"><?php echo $_SESSION['Name']; ?> </a>
        </div>
      </div>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="logout.php" class="nav-link font-weight-bold">logout</a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->