

<?php
    error_reporting(0);
    include "koneksi.php"; 
    $kode = $_POST['txtkode'];
    $nama = $_POST['txtnama'];
    $nohp = $_POST['txtnohp'];
    $alamat = $_POST['txtalamat'];

    $simpan = mysql_query("Insert into tbsupplier(idsupplier,nama,alamat,nohp) 
        values('$kode','$nama','$alamat','$nohp')");
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
        window.location.replace('pages-supplier');
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
        