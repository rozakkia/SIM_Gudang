<?php
  session_start();
  //include('../auth-ambildata.php');
  //error_reporting(0);
  include 'action-ambildata.php';
  if($_SESSION['uvukiland'] == false){
   header('Location: pages-masuk');
  }
  $kode = $_GET['inv'];
  $pe=base64_decode($kode);
  $kodedecrypt=base64_decode($pe);
  $sqlss= "select SUM(jumlah) as jumlah from tbtransaksi_detail where tbtransaksi_detail.idTransaksi = '$kodedecrypt'";
  $qryss= mysql_query($sqlss);
  $rowsss= mysql_fetch_assoc($qryss);
  $wdw = $rowsss['jumlah'];
  $upd = "UPDATE tbtransaksi SET total='$wdw' WHERE idTransaksi='$kodedecrypt'";
  
  mysql_query($upd);
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
    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">#<?php echo $kodedecrypt ?></h3>
                            <div class="block-options">
                                <!-- Print Page functionality is initialized in Codebase() -> uiHelperPrint() -->
                                <button type="button" class="btn-block-option" onclick="Codebase.helpers('print-page');">
                                    <i class="si si-printer"></i> Print Invoice
                                </button>
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <!-- Invoice Info -->
                            <div class="row my-20">
                                <!-- Company Info -->
                                <div class="col-6">
                                    <p class="h3">Toko Surya Elektronik</p>
                                    <address>
                                        Kabupaten Banjarnegara<br>
                                        Jawa Tengah<br>
                                    </address>
                                    <p class="h6">Bag. Kasir : Rozak</p>
                                </div>
                                <!-- END Company Info -->

                                <!-- Client Info -->
                                <div class="col-6 text-right">
                                        <?php
                                           $sql= "SELECT tbtransaksi.tgltransaksi From tbtransaksi 
                                           where idTransaksi = '$kodedecrypt'";
                                           $qry= mysql_query($sql);
                                           $rows= mysql_fetch_assoc($qry);
                                           $daste = $rows['tgltransaksi'];
                                        ?>
                                    <p class="h3"></p>
                                    <address>
                                        
                                    </address>
                                        <?php
                                        
                                        ?>
                                    <p class="h6">Tanggal : <?php echo date("d F Y", strtotime($daste))  ?></p>
                                </div>
                                <!-- END Client Info -->
                            </div>
                            <!-- END Invoice Info -->

                            <!-- Table -->
                            <div class="table-responsive push">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 60px;"></th>
                                            <th>Product</th>
                                            <th class="text-center" style="width: 90px;">Qty</th>
                                            <th class="text-right" style="width: 120px;">Harga</th>
                                            <th class="text-right" style="width: 120px;">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $sql= "SELECT tbtransaksi_detail.idbarang awdws, tbbarang.nama a,tbbarang.stok swq,tbtransaksi_detail.qty b,tbtransaksi_detail.jumlah, tbbarang.merk c 
                                            FROM tbtransaksi_detail JOIN tbbarang ON tbtransaksi_detail.idbarang=tbbarang.idbarang
                                            where tbtransaksi_detail.idTransaksi='$kodedecrypt'
                                            ";
                                            $qry= mysql_query($sql);
                                            while($row= mysql_fetch_assoc($qry)){
                                                $wn12d = $row['swq'];
                                                $bc = $row['b'] + $wn12d ;
                                                $wnd = $row['awdws'];
                                                
                                                $updstok = "UPDATE tbbarang SET stok='$bc' WHERE idbarang='$wnd'";
                                                mysql_query($updstok);
                                                $hargasatuan = $row['jumlah'] / $row['b'];
                                                echo '
                                                <tr>
                                                    <td><center>'.$no.'</center></td>
                                                    <td>
                                                        <p class="font-w600 mb-5">'.$row['a'].'</p>
                                                        <div class="text-muted">'.$row['c'].'</div>
                                                    </td>
                                                    <td class="text-center">'.$row['b'].'</td>
                                                    <td class="text-right">'.$hargasatuan.'</td>
                                                    <td class="text-right">'.$row['jumlah'].'</td>
                                                ';
                                            };
                                        ?>
                                        <tr class="table-warning">
                                            <?php
                                            
                                            

                                            ?>
                                            <td colspan="4" class="font-w700 text-uppercase text-right">Jumlah</td>
                                            <td class="font-w700 text-right"><?php echo $rowsss['jumlah'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- END Table -->

                            <!-- Footer -->
                            <p class="text-muted text-center">Terima kasih banyak telah melakukan bisnis dengan kami. Kami berharap dapat bekerja sama dengan Anda lagi!</p>
                            <!-- END Footer -->
                        </div>
                    </div>
                    <!-- END Invoice -->
            <!-- END Main Container -->
            <script>
                window.print();
            </script>

        <?php include 'atribut-footer.php' ?>