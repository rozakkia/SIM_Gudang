<?php
include "koneksi.php"; 
$response = array();
 
if ($_POST['delete']) {
    $id = $_POST['delete'];
    $query = "DELETE from tbpegawai WHERE idpegawai ='$id'";
    $ini = mysql_query($query);
    }
    if ($ini) {
        $response['status']  = 'success';
 $response['message'] = 'Product Deleted Successfully ...';
    } else {
        $response['status']  = 'error';
 $response['message'] = 'Unable to delete product ...';
    }
    echo json_encode($response);
?>