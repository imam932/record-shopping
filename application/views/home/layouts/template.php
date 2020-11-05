<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/materialize/css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/materialize/css/ghpages-materialize.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>assets/materialize/css/styles.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
    <header>
        <nav class="top-nav">
            <div class="container">
                <div class="nav-wrapper">
                    <div class="row">
                        <div class="col s12 m10 offset-m1">
                        <a href="<?php echo base_url() ?>home"><h1 class="header">My Shop</h1></a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
            <ul id="slide-out" class="sidenav">
            <li><a href="<?php echo base_url() ?>home"><i class="material-icons">cloud</i>Record My Shop</a></li>
            <li><div class="divider"></div></li>
            <li><a class="subheader">Shopping</a></li>
            <li><a class="waves-effect" href="<?php echo base_url() ?>shop">Insert Shop</a></li>
            <li><a class="subheader">Reports</a></li>
            <li><a class="waves-effect" href="<?php echo base_url() ?>daily">Daily</a></li>
            <li><a class="waves-effect" href="<?php echo base_url() ?>monthly">Monthly</a></li>
            </ul>
            <a href="#" data-target="slide-out" class="top-nav sidenav-trigger full hide-on-large-only"><i class="material-icons">menu</i></a>
            </div>
        </div>
    </header>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/materialize/js/jquery-3.4.1.min.js"></script>
    <?php echo $content; ?>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/materialize/js/materialize.min.js"></script>

<script>
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
</script>
</body>
</html>