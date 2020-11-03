<?php
    if(isset($_POST['tambah'])){
        include 'action-pembeliandetail-tambah.php';
    }else if (isset($_POST['hapus'])){
        include 'action-pembeliandetail-hapus.php';
    }
    $kode = $_GET['id'];
    $pe=base64_decode($kode);
    $kodedecrypt=base64_decode($pe);
?>


                <!-- Dynamic Table Full -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title"><b>DATA PEMBELIAN, ID ORDER : <i><?php  echo $kodedecrypt; ?></i></b></h3>
                            <div class="">
                                <a target="blank" href="pages-barang" type="button" class="btn btn-primary btn-square btn-noborder">Data Barang &nbsp</a>
                                <button type="button" class="btn btn-success btn-square btn-noborder" data-toggle="modal" data-target="#modal-tambah">Tambah Data &nbsp<i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th width="1%">No.</th>
                                        <th width="15%">ID Barang</th>
                                        <th width="25%">Nama</th>
                                        <th width="25%">Stok</th>
                                        <th width="25%">Jumlah</th>
                                        <th width="12%"><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        $sql= "SELECT tbbarang.idBarang,tbbarang.nama,tbpembelianbarang_detail.stok,tbpembelianbarang_detail.jumlah 
                                                FROM tbpembelianbarang_detail INNER JOIN tbbarang 
                                                ON tbbarang.idbarang = tbpembelianbarang_detail.idbarang 
                                                WHERE idorder ='$kodedecrypt'";
                                        $qry= mysql_query($sql);
                                        while($row= mysql_fetch_assoc($qry)){
                                            echo '
                                            <tr>
                                                <td><center>'.$no.'</center></td>
                                                <td>'.$row['idBarang'].'</td>
                                                <td>'.$row['nama'].'</td>
                                                <td>'.$row['stok'].'</td>
                                                <td>'.$row['jumlah'].'</td>
                                            ';
                                    ?>
                                                <td>
                                                    <center>
                                                    <a href="#modal-hapus-<?php echo $row['idBarang']; ?>" data-toggle="modal">
                                                        <button type="button" class="btn btn-danger btn-square btn-noborder">
                                                            <i class="si si-trash"></i>
                                                        </button>
                                                    </a>
                                                    </center>
                                                </td> 
                                            </tr>
                                            
                                            
                                            <!-- Modal Hapus -->
                                                <div class="modal fade" id="modal-hapus-<?php echo $row['idBarang']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-hapus" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form class="" action="" method="POST">
                                                                <div class="block block-themed block-transparent mb-0">
                                                                    <div class="block-header bg-primary-danger" style="background-color:#DD3D2D">
                                                                        <h3 class="block-title">HAPUS DATA</h3>
                                                                        <div class="block-options">
                                                                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                                                <i class="si si-close"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="block-content">
                                                                        <h5>Anda Akan menghapus Data Sebagai Berikut :</h5>
                                                                        <div class="form-group row" style="margin-left:7%;">
                                                                            <label class="col-sm-3 col-form-label">ID Barang</label>
                                                                            <div class="col-md-8">
                                                                                <input type="text" name="idorder" value="<?php echo $kodedecrypt ?>" hidden>
                                                                                <input type="text" name="idbarang" readonly class="form-control-plaintext" value="<?php echo $row['idBarang'] ?>">
                                                                            </div>
                                                                            <label class="col-sm-3 col-form-label">Nama</label>
                                                                            <div class="col-md-8">
                                                                                <input type="text" disabled class="form-control-plaintext" value="<?php echo $row['nama'] ?>">
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
                                        
                        </div>
                    </div>
                    <div class="block">
                        <div class="block-header block-header-default">
                        <h3 class="block-title">Klik <i><b>Cetak Invoice</b></i> jika sudah selesai memasukkan data barang</h3>
                            <a target="blank" href="invoice-belibarang.php?order=<?php echo $kode    ?>" type="button" class="btn btn-primary btn-square btn-noborder">Cetak Invoice</a>
                        </div>
                    </div>
                <!-- END Dynamic Table Full -->
            
    <!-- Modal Tambah -->
        <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="js-validation-bootstrap" action="" method="POST">
                        <div class="block block-themed block-transparent mb-0">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Tambah Data Pembelian</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                        <i class="si si-close"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <input type="text" name="idorder" value="<?php echo $kodedecrypt ?>" hidden> 
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Kode Barang</label>
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
                                    <label class="col-lg-3 col-form-label">Stok</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="txtstok">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Harga Satuan</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="txtharga">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-alt-secondary btn-square btn-noborder" data-dismiss="modal">BERSIHKAN</button>
                            <button type="submit" name="tambah" class="btn btn-success btn-square btn-noborder">
                                <i class="fa fa-check"></i> SIMPAN
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- END Fade In Modal -->

     
        