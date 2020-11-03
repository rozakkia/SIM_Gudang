<?php
error_reporting(0);
session_start();
    if($_SESSION['uvukiland'] == true){    
        header('Location: index');
    }else if($_SESSION['waitlaahs'] == true){
        header('Location: index-kasir');
        
    }else if($_SESSION['adwa'] == true){
        header('Location: index-gudang');
        
    }

    
    if(isset($_POST['masuk'])){
        include 'action-masuk.php';
    }
?>
<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Masuk - SIMABA</title>

        <?php include 'atribut-head.php' ?>
    <body onload="setInterval('displayServerTime()', 1000);">
        
        <div id="page-container" class="main-content-boxed">
            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="bg-body-dark bg-pattern" style="background-image: url('assets/img/various/bg-pattern-inverse.png');">
                    <div class="row mx-0 justify-content-center">
                        <div class="hero-static col-lg-6 col-xl-4">
                            <div class="content content-full overflow-hidden">
                                <!-- Header -->
                                <div class="py-50 text-center">
                                    
                                    <h3 class="font-w700 mb-5"><i class="si si-bar-chart text-primary"></i>&nbspSIMA<span class="text-primary">BA</span></h3>
                                    <h3 class="font-w700 mb-5">Sistem Manajemen <span class="text-primary">Barang</span></h3>
                                    <?php
                                        /* script menentukan hari */  
                                        $array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
                                        $hr = $array_hr[date('N')];

                                        /* script menentukan tanggal */    
                                        $tgl= date('j');
                                        /* script menentukan bulan */ 
                                        $array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
                                        $bln = $array_bln[date('n')];
                                        /* script menentukan tahun */ 
                                        $thn = date('Y');
                                        /* script perintah keluaran*/ 
                                    ?>
                                    
                                    <h4 class="h6 font-w400 text-muted"><span id="clock">&nbsp<?php print date('H:i:s'); ?></span>&nbspWIB 
                                    | <?php echo $hr . ", " . $tgl . " " . $bln . " " . $thn . " "; ?></h4>
                                </div>
                                <!-- END Header -->

                                <!-- Sign In Form -->
                                <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.js) -->
                                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form class="js-validation-bootstrap" action="" method="post">
                                    <div class="block block-themed block-rounded block-shadow">
                                        <div class="block-header bg-gd-dusk">
                                            <h3 class="block-title">Halaman Masuk</h3>
                                            <div class="block-options">
                                                <button type="button" class="btn-block-option">
                                                    <i class="si si-wrench"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="block-content">
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="login-username">NIP</label>
                                                    <input type="text" class="form-control" name="txtnip">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="login-password">Kata Sandi</label>
                                                    <input type="password" class="form-control" name="txtsandi">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-sm-12 text-sm-right push">
                                                    <button style="width:100%" name="masuk" type="submit" class="btn btn-alt-primary btn-noborder">
                                                        <i class="si si-login mr-10"></i> Masuk
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                                <!-- END Sign In Form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        <script src="assets/js/core/jquery.min.js"></script>
        <script src="assets/js/core/bootstrap.bundle.min.js"></script>
        <script src="assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="assets/js/core/jquery.appear.min.js"></script>
        <script src="assets/js/core/jquery.countTo.min.js"></script>
        <script src="assets/js/core/js.cookie.min.js"></script>
        <script src="assets/js/codebase.js"></script>

        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="assets/js/plugins/sweetalert2/sweetalert2.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/be_forms_validation.js"></script>
        <script src="assets/js/pages/be_ui_activity.js"></script>
    </body>
</html>