<?php
include "koneksi.php"; 
$barang= $_POST['idbarang'];
$order= $_POST['idorder'];
$query = "DELETE from tbpembelianbarang_detail WHERE idbarang ='$barang' AND idorder='$order'";
$hapus = mysql_query($query);
$pe = base64_encode($order);
$encrypt = base64_encode($pe);

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
    window.location.replace('pages-pembelian-detail?id=$encrypt');
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
    window.location.replace('pages-supplier');
    } ,1500); 
    </script>
    ";
}

?>