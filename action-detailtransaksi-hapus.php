<?php
include "koneksi.php"; 
$id = $_POST['kodebrng'];
$nota = $_POST['nonota'];

$pe=base64_encode($id);
$kodeencrypt=base64_encode($pe);

$query = "DELETE from tbtransaksi_detail WHERE idTransaksi ='$nota' and idBarang ='$id' ";
$hapus = mysql_query($query);

if($hapus){
    echo "
    <script type='text/javascript'>
    setTimeout(function () {  
        swal({
            title: 'Barang Terhapus',
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
        title: 'Gagal Menghapus Data',
        type: 'error',
        timer: 1500,
        showConfirmButton: false
    });  
    },10); 
    window.setTimeout(function(){ 
    window.location.replace('pages-akun');
    } ,1500); 
    </script>
    ";
}

?>