<?php
error_reporting(0);
if(isset($_POST['tambah'])){
    include 'action-detailtransaksi-tambah.php';
}else if (isset($_POST['hapus'])){
    include 'action-detailtransaksi-hapus.php';
}
    $kode = $_GET['inv'];
    $pe=base64_decode($kode);
    $kodedecrypt=base64_decode($pe);
?>
                                            <form class="js-validation-bootstrap" action="action-transaksi-tambah" method="POST">
                                                <?php
                                                $kueri = "SELECT max(idTransaksi) as maxKode FROM tbtransaksi";
                                                $hasil = mysql_query($kueri);
                                                $data  = mysql_fetch_array($hasil);
                                                $idbarang = $data['maxKode'];
                                                $noUrut = (int) substr($idbarang, 5, 5);
                                                $noUrut++;
                                            
                                                $nip = sprintf("%05s", $noUrut);
                                                $wqjn=date('dmY');
                                                    
                                                ?>
                                                
                                                <input type="text" name="tgl" value="<?php echo $tgl=date('Y-m-d'); ?>" hidden>
                                                <input type="text" name="idpeg" value="<?php echo $usernya; ?>" hidden>
                                                <input type="text" name="nonotaa" value="<?php echo "Inv"; echo $nip; ?>" hidden>
                                                <button type="submit" name="notabaru" class="btn btn-success btn-square btn-noborder">
                                                    <i class="fa fa-plus"></i> NOTA BARU
                                                </button>
                                            </form> <br>
<div class="row gutters-tiny">
    
<div class="col-md-5">
                            <!-- Status -->
                            
                                <div class="block block-rounded block-themed">
                                    <div class="block-header bg-gd-primary">
                                        <h3 class="block-title">Form Pembelian</h3>
                                        <div class="block-options">
                                            
                                        </div>
                                    </div>
                                    <div class="block-content block-content-full">
                                    <form class="js-validation-bootstrap" action="" method="POST">
                        <div class="block block-themed block-transparent mb-0">
                            
                            <div class="block-content">
                                <div class="form-group row">
                                
                                    <label class="col-lg-3 col-form-label">No. Nota</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control"  name="txtkode" readonly
                                            value="<?php echo $kodedecrypt ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Barang</label>
                                    <div class="col-md-9">
                                        <input class="form-control" name="kodebrng" list="barang" />
                                        <datalist id="barang">
                                            <?php 
                                            $query11 = mysql_query("SELECT * FROM tbbarang");
                                            while($row11 = mysql_fetch_assoc($query11)){
                                            ?>
                                            <option value="<?php echo $row11['idbarang']; ?>"><?php echo $row11['nama']; ?>
                                            <?php } ?>            
                                        </datalist>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Qty</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="txtqty">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="tambah" class="btn btn-success btn-square btn-noborder">
                                <i class="fa fa-check"></i> TAMBAH
                            </button>
                        </div>
                    </form>
                                    </div>
                                </div>
                            </form>
                            <!-- END Status -->
                        </div>
<!-- Basic Info -->
                        <div class="col-md-7">
                            <!-- Dynamic Table Full -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title"><b>DATA PEMBELIAN<?php echo $kodedecrypt ?></b></h3>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th width="1%">No.</th>
                                        <th width="25%">Barang</th>
                                        <th width="2%">Qty</th>
                                        <th width="20%">Harga</th>
                                        <th width="20%">Jumlah</th>
                                        <th width="12%"><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        $sql= "SELECT tbbarang.idbarang a, tbbarang.nama b, tbtransaksi_detail.qty c, tbbarang.harga d,tbtransaksi_detail.jumlah e
                                        FROM tbtransaksi_detail JOIN tbbarang ON tbtransaksi_detail.idBarang = tbbarang.idbarang
                                        WHERE tbtransaksi_detail.idTransaksi='$kodedecrypt'
                                        ";
                                        $qry= mysql_query($sql);
                                        while($row= mysql_fetch_assoc($qry)){
                                            echo '
                                        
                                            <tr>
                                                <td><center>'.$no.'</center></td>
                                                <td><div class="font-w600 mb-5">'.$row['a'].'</div>
                                                    '.$row['b'].'
                                                </td>
                                                <td>'.$row['c'].'</td>
                                                <td>'.$row['d'].'</td>
                                                <td>'.$row['e'].'</td>
                                            ';
                                    ?>
                                    
                                                <td>
                                                    
                                                    <a href="#modal-hapus-<?php echo $row['a']; ?>" data-toggle="modal">
                                                        <button type="button" class="btn btn-danger btn-square btn-noborder">
                                                            <i class="si si-trash"></i>
                                                        </button>
                                                    </a>
                                                    </center>
                                                </td> 
                                            </tr>
                                            
                                            
                                            <!-- Modal Hapus -->
                                                <div class="modal fade" id="modal-hapus-<?php echo $row['a']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-hapus" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form class="" action="" method="POST">
                                                                <div class="block block-themed block-transparent mb-0">
                                                                    <div class="block-header bg-primary-danger" style="background-color:#DD3D2D">
                                                                        <h3 class="block-title">HAPUS BARANG</h3>
                                                                        <div class="block-options">
                                                                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                                                <i class="si si-close"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="block-content">
                                                                        <h5>Anda Akan menghapus Data Sebagai Berikut :</h5>
                                                                        <div class="form-group row" style="margin-left:7%;">
                                                                            <label class="col-sm-2 col-form-label">KODE</label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" name="nonota" readonly class="form-control-plaintext" value="<?php echo $kodedecrypt ?>" hidden>
                                                                                <input type="text" name="kodebrng" readonly class="form-control-plaintext" value="<?php echo $row['a'] ?>">
                                                                            </div>
                                                                            <label class="col-sm-2 col-form-label">Nama</label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" disabled class="form-control-plaintext" value="<?php echo $row['b'] ?>">
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-alt-secondary btn-square" data-dismiss="modal">BATAL</button>
                                                                    <button type="submit" name="hapus" class="btn btn-danger btn-square">
                                                                        <i class="si si-trash"></i> HAPUS
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- END Modal Hapus -->
                                    
                                    <?php
                                        $no++;
                                        }
                                    ?>    
                                </tbody>
                            </table>
                            <div class="modal-footer">
                            <a href="invoice-transaksi.php?inv=<?php echo $kode ?>"  class="btn btn-primary btn-square btn-noborder">
                                <i class="fa fa-print"></i> CETAK INVOICE
                            </a>
                        </div>                   
                        </div>
                    </div>
                <!-- END Dynamic Table Full -->
                        </div>
                        <!-- END Basic Info -->
                        
</div>