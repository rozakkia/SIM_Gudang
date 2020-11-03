

<?php
    error_reporting(0);
    include "koneksi.php"; 
    $kode = $_POST['nonotaa'];
    $pegawai = $_POST['idpeg'];
    $pe = base64_encode($kode);
    $pee = base64_encode($pe);
    $mem ="0";
    $tanggal = date("Y-m-d");
    


    $simpan = mysql_query("Insert into tbtransaksi(idTransaksi,idPegawai,idpembeli,tgltransaksi) 
        values('$kode','$pegawai','$mem','$tanggal')");
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
        window.location.replace('index-kasir?inv=$pee');
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
        window.location.replace('index-kasir');
        } ,1500); 
        </script>
        ";
    }
      
    
        
 ?>
        