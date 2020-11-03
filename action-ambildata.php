<?php
    
	include"koneksi.php";
	$id = $_SESSION['nipnya'];
	$sql_data= "SELECT * FROM tbpegawai where idpegawai ='$id'";
	$qry_data= mysql_query($sql_data);
	$num_data= mysql_num_rows($qry_data);
	$row_data= mysql_fetch_array($qry_data);
	$namalengkap = $row_data['nama'];
	$usernya = $row_data['idpegawai'];

?>