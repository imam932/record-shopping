<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Page</title>
  <!-- Favicon -->

  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/font-awesome/css/font-awesome.css">

  <link href="<?= base_url() ?>assets/admin/css/sb-admin.css" rel="stylesheet">

  <link href="<?= base_url() ?>assets/admin/css/style.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/admin/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/dataTables.bootstrap.min.css">
</head>

<body>
  <div id="wrapper">
    <!-- Navigation -->
    <nav id="nav" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= base_url().'admin/Dashboard' ?>">
        Sistem web Config
        </a>
      </div>
      <!-- Top Menu Items -->
      <ul class="nav navbar-right top-nav">
        <li class="dropdown">


        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $this->session->userdata('logged_in')['nama']; ?><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li>
              <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="<?= base_url().'admin/Logout' ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
          </ul>
        </li>
      </ul>
      <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">

          <?php if($this->session->userdata('logged_in')['level'] == 1) { ?>
            <li>
              <a href="<?= base_url().'admin/Dashboard' ?>"><i class="fa fa-fw fa-users"></i> Dashboard </a>
            </li>
            <li>
              <a href="<?= base_url().'admin/Users' ?>"><i class="fa fa-fw fa-users"></i> Users </a>
            </li>
            <li>
              <a href="<?= base_url().'admin/Type' ?>"><i class="fa fa-fw fa-book"></i> Type </a>
            </li>
            <?php } ?>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">
                <?= $title; ?> <small><?= $desc; ?></small>
              </h1>
            </div>
          </div>
          <!-- /.row -->

          <!-- breadcrumb -->
          <ol class="breadcrumb">
            <?php
            $i = 0;
            $size = sizeof($breadcrumb);
            foreach ($breadcrumb as $value)
            {
              if($i == $size - 1)
              {
                echo "<li class='active'>$value</li>";
              }
              else
              {
                $url = base_url() . "admin/" . $value;
                echo "<li><a href='$url'>$value</a></li>";
              }

              $i++;
            }
            ?>
          </ol>

          <!-- ADD YOUR CONTENT HERE -->
          <?= $content; ?>
          <!-- END OF CONTENT -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Include JS -->
    <!-- Vendor -->
    <script src="<?= base_url() ?>assets/admin/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url() ?>assets/admin/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/admin.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/dataTables.bootstrap.min.js"></script>
  </body>

  </html>
