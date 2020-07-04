<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Load File CSS Bootstrap  -->

        
    <link rel="stylesheet" href="<?php echo base_url(); ?>_asset/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>_asset/DataTables/media/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>_asset/DataTables/media/css/dataTables.bootstrap.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>_asset/css/bootstrap.css" />
    <script src="<?php echo base_url(); ?>_asset/DataTables/media/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>_asset/DataTables/media/js/jquery.dataTables.js"></script>

    <style>
    body {
        min-height: 2000px;
        padding-top: 70px;
    }
    </style>
</head>

<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Warung Makan</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
             <?php
            // Cek role user
            if($this->session->userdata('role') == 'kasir'){
                ?>
                <li><a href="<?php echo base_url('index.php/kasir/dashboard'); ?>">Daftar Pemesan</a></li>
                <?php
            }else{
                ?>
                <li><a href="<?php echo base_url('index.php/pelayan/dashboard'); ?>">Makanan</a></li>
                <li><a href="<?php echo base_url('index.php/pelayan/dashboard/minuman'); ?>">Minuman</a></li>
            <?php
                }
            ?>

        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url('login/logout'); ?>">Logout</a></li>
        </ul>
    </div><!--/.nav-collapse -->
</div>

    </nav>
