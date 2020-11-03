

<?php
   // error_reporting(0);
    include "koneksi.php"; 
    $kode = $_POST['txtkode'];
    $brng = $_POST['kodebrng'];
    $qty = $_POST['txtqty'];

    $sqlqwe= "SELECT * FROM tbbarang where idbarang ='$brng'";
	$qryqwe= mysql_query($sqlqwe);
    $rowqwe= mysql_fetch_array($qryqwe);
    
    $jumlah = $qty * $rowqwe['harga'];

    $pe=base64_encode($kode);
    $kodeencrypt=base64_encode($pe);

    $simpan = mysql_query("Insert into tbtransaksi_detail(idTransaksi,idBarang,qty,jumlah) 
        values('$kode','$brng','$qty','$jumlah')");
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
        window.location.replace('index-kasir?inv=$kodeencrypt');
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
        