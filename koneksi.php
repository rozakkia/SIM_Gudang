<?php
	$Open = mysql_connect("localhost","root","");
			if(!$Open){
				die("Koneksi ke Engine MySQL GAGAL!<br>");
			}
		$Koneksi = mysql_select_db("basisdata");
			if (!$Koneksi) {
				die("Koneksi Ke Database Gagal!");
			}
?>