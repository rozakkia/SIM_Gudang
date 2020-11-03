

<?php
    error_reporting(0);
    include "koneksi.php"; 
    $kode = $_POST['txtkode'];
    $nama = $_POST['txtnama'];

    $simpan = mysql_query("Insert into tbgudang(idgudang,nama) 
        values('$kode','$nama')");
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
        window.location.replace('pages-gudang');
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
        window.location.replace('pages-gudang');
        } ,1500); 
        </script>
        ";
    }
      
    
        
 ?>
        