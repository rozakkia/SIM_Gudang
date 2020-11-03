

<?php
   // error_reporting(0);
    include "koneksi.php"; 
    $kode = $_POST['txtkode'];
    $spl = $_POST['kodespl'];
    $gdg = $_POST['kodegdg'];
    $tanggal = date("Y-m-d");

    $pe=base64_encode($kode);
    $kodeencrypt=base64_encode($pe);

    $simpan = mysql_query("Insert into tbpembelianbarang(idorder,idsupplier,tglmasuk,idgudang) 
        values('$kode','$spl','$tanggal','$gdg')");
    if($simpan){
        echo "
        <script type='text/javascript'>
        setTimeout(function () {  
            swal({
                title: 'Data Ditambahkan',
                type: 'success',
                timer: 1500,
                showConfirmButton: false
            });  
        },10); 
        window.setTimeout(function(){ 
        window.location.replace('pages-pembelian-detail?id=$kodeencrypt');
        } ,1500); 
        </script>
        ";
    }else{
        echo "
        <script type='text/javascript'>
        setTimeout(function () {  
        swal({
            title: 'Gagal Ditambahkan',
            type: 'error',
            timer: 1500,
            showConfirmButton: false
        });  
        },10); 
        window.setTimeout(function(){ 
        window.location.replace('index-gudang');
        } ,1500); 
        </script>
        ";
    }
      
    
        
 ?>
        