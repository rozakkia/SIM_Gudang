<?php
error_reporting(0);
	ob_start();
	include "koneksi.php";
    $nip = $_POST['txtnip'];
	$sandi	= $_POST['txtsandi'];

    $password2=md5($sandi);
    $password3=base64_encode($password2);
    $password4=base64_encode($password3);


	$sql= "SELECT * FROM tbpegawai where idpegawai ='$nip'";
	$qry= mysql_query($sql);
	$num= mysql_num_rows($qry);
	$row= mysql_fetch_array($qry);
	$_SESSION['username']=$row['idpegawai'];


	if($num==0){
       
        echo "
            <script type='text/javascript'>
            setTimeout(function () {  
            swal({
                title: 'Gagal Masuk',
                type: 'error',
                timer: 1500,
                showConfirmButton: false
            });  
            },10); 
            window.setTimeout(function(){ 
            window.location.replace('pages-masuk');
            } ,1500); 
            </script>
            ";

	}
	else{
        $_SESSION['loginns']=1;
                $_SESSION['nipnya'] = $row['idpegawai'];
				$lev = $row['jabatan'];
					switch ($lev) {
							case '1':
                                $_SESSION['uvukiland']=1;
								header("Location:index");
								break;
							case '2':
								$_SESSION['waitlaahs']=1;
								header("Location:index-kasir");
                                break;
                            case '3':
								$_SESSION['adwa']=1;
								header("Location:index-gudang");
								break;
							default:
								echo "gagal";
								header("Location:index");
								break;
					}
	}



	mysql_close($Open);
?>
