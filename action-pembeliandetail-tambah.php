

<?php
    error_reporting(0);
    include "koneksi.php"; 
    $kode = $_POST['idorder'];
    $brng = $_POST['kodebrng'];
    $stok = $_POST['txtstok'];
    $jumlah = $_POST['txtharga'];
    $total = $stok * $jumlah;

    $pe = base64_encode($kode);
    $pee = base64_encode($pe);

    $simpan = mysql_query("Insert into tbpembelianbarang_detail(idorder,idbarang,stok,jumlah) 
        values('$kode','$brng','$stok','$total')");
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
        window.location.replace('pages-pembelian-detail?id=$pee');
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
        window.location.replace('pages-supplier');
        } ,1500); 
        </script>
        ";
    }
      
    
        
 ?>
        