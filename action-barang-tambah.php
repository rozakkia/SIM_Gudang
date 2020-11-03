

<?php
   // error_reporting(0);
    include "koneksi.php"; 
    $kode = $_POST['txtkode'];
    $nama = $_POST['txtnama'];
    $merk = $_POST['txtmerk'];
    $jenis = $_POST['txtjenis'];
    $garansi = $_POST['txtgaransi'];
    $harga = $_POST['txtharga'];
    $kodespl = $_POST['kodespl'];
    $kodegdg = $_POST['kodegdg'];
    $stok = "0";


    $simpan = mysql_query("Insert into tbbarang(idbarang,nama,merk,jenis,garansi,harga,stok,idsupplier,idgudang) 
        values('$kode','$nama','$merk','$jenis','$garansi','$harga','$stok','$kodespl','$kodegdg')");
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
            window.location.replace('pages-barang');
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
            window.location.replace('pages-barang');
            } ,1500); 
            </script>
            ";
        }
      
    
        
 ?>
        