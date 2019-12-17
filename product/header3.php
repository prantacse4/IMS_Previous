<!DOCTYPE html>
<html>
<head>
 <!--  -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Product</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Our designed Style -->
  <link rel="stylesheet" href="../assets/style.css">
  <link rel="stylesheet" href="../assets/pranta.css">
</head>


<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../homepage/index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../dashboard/dashboard.php" class="nav-link">Dashboard</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i> Pranta Biswas
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="text-center"><i class="far fa-user"></i></div>
            <div class="text-center"><a href="profile.php" class="btn btn-info">Go to profile</a></div>
              <div class="text-center"><a href="logout.php" class="btn btn-danger">Logout</a></div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">

          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->

            <!-- Message End -->
          </a>

      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">IMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview  ">
            <a href="#" class="nav-link " id="dashboard" >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
         
          <li class="nav-item has-treeview <?php if($page=='product_category' || $page=='product_list'){echo '-menuopen menu-open active';} ?>">
            <a href="#" class="nav-link <?php if($page=='product_category' || $page=='product_list'){echo 'active';} ?>"  id="product">
              <i class="nav-icon fas fa-luggage-cart"></i>
              <p>
                Products
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" class="<?php if($page=='product_category'){echo 'active';} ?>">
                <a href="category.php" class=" nav-pranta nav-link <?php if ($page=='product_category'){echo 'active';} ?>"  >
                  &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right nav-icon"></i>
                  <p>Product Category</p>
                </a>
              </li>
              <li class="nav-item <?php if($page=='product_list'){echo 'active';} ?>">
                <a href="product.php" class="nav-pranta nav-link <?php if ($page=='product_list'){echo 'active';} ?>">
                 &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-double-right nav-icon"></i>
                  <p>Product List</p>
                </a>
              </li>            
            </ul>
          </li>




        <!--   Company -->
          <li class="nav-item has-treeview">
            <a href="../company/company.php" class="nav-link"  id="product">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Company
              </p>
            </a>
          </li>



          <!--   Supplier -->
          <li class="nav-item has-treeview">
            <a href="../supplier/supplier.php" class="nav-link"  id="product">
              <i class="nav-icon fas fa-shapes"></i>
              <p>
                Supplier
              </p>
            </a>
          </li>


          <!--   Purchase -->
          <li class="nav-item has-treeview ">
            <a href="../purchase/purchase.php" class="nav-link"  id="product">
              <i class="nav-icon fas fa-baby-carriage"></i>
              <p>
                Purchase
              </p>
            </a>
          </li>


          <!--   Sale -->
          <li class="nav-item has-treeview">
            <a href="../sale/sale.php" class="nav-link"  id="product">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Sale
              </p>
            </a>
          </li>


          

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link"  id="product">
              <i class="nav-icon fas fa-id-card-alt"></i>
              <p>
                Profile
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link"  id="product">
              <i class="nav-icon fas fa-people-carry"></i>
              <p>
                Help
              </p>
            </a>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link"  id="product">
              <i class="nav-icon  fas fa-info-circle"></i>
              <p>
                Tems & Condition
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link"  id="product">
              <i class="nav-icon fab fa-connectdevelop"></i>
              <p>
                About Us
              </p>
            </a>
          </li>

















        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

