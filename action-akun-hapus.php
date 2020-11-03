<?php
include "koneksi.php"; 
$id = $_POST['idpegawai'];
$query = "DELETE from tbpegawai WHERE idpegawai ='$id'";
$hapus = mysql_query($query);

if($hapus){
    echo "
    <script type='text/javascript'>
    setTimeout(function () {  
        swal({
            title: 'Data Terhapus',
            type: 'success',
            timer: 1500,
            showConfirmButton: false
        });  
    },10); 
    window.setTimeout(function(){ 
    window.location.replace('pages-akun');
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