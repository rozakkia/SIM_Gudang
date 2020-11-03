<?php
  session_start();
  //include('../auth-ambildata.php');
  //error_reporting(0);
  error_reporting(0);
 include 'action-ambildata.php';
 if($_SESSION['uvukiland'] == false){    
    if($_SESSION['adwa'] == false){
        header('Location: pages-masuk');
        
    }
   }
?>

<!doctype html>

<?php include 'koneksi.php' ?>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Sistem Informasi Barang - SIMABA</title>    
    <?php include 'atribut-head.php' ?>
    <body onload="setInterval('displayServerTime()', 1000);">
        <div id="page-container" class="sidebar-o sidebar-inverse side-scroll page-header-fixed main-content-narrow">
            <?php include 'atribut-sidebar.php' ?>

            <?php include 'atribut-header.php' ?>

            <!-- Main Container -->
            <main id="main-container">
                <?php include 'clock.php' ?>
                <!-- Page Content -->
                <div class="content">
                    <?php include 'isi-supplier.php  ' ?>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

        <?php include 'atribut-footer.php' ?>