

<?php
    error_reporting(0);
    include "koneksi.php"; 
    $kode = $_POST['txtkodepegawai'];
    $nama = $_POST['txtnama'];
    $nohp = $_POST['txtnohp'];
    $alamat = $_POST['txtalamat'];
    $jabatan = $_POST['txtjabatan'];
    $password = $_POST['txtkatasandi'];
    $password2=md5($password);
    $password3=base64_encode($password2);
    $password4=base64_encode($password3);

    $simpan = mysql_query("Insert into tbpegawai(idpegawai,nama,nohp,alamat,jabatan,katasandi) 
        values('$kode','$nama','$nohp','$alamat','$jabatan','$password4')");
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
        window.location.replace('pages-akun');
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
        window.location.replace('pages-akun');
        } ,1500); 
        </script>
        ";
    }
      
    
        
 ?>
        