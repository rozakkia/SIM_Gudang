<?php
    if(isset($_POST['tambah'])){
        include 'action-supplier-tambah.php';
    }else if (isset($_POST['hapus'])){
        include 'action-supplier-hapus.php';
    }
?>


                <!-- Dynamic Table Full -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title"><b>DATA SUPPLIER</b></h3>
                            <div class="">
                                <button type="button" class="btn btn-success btn-square btn-noborder" data-toggle="modal" data-target="#modal-tambah">Tambah Data &nbsp<i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th width="1%">No.</th>
                                        <th width="15%">ID Supplier</th>
                                        <th width="25%">Nama</th>
                                        <th width="25%">No Hp</th>
                                        <th width="12%"><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        $sql= "SELECT * FROM tbsupplier";
                                        $qry= mysql_query($sql);
                                        while($row= mysql_fetch_assoc($qry)){
                                            echo '
                                            <tr>
                                                <td><center>'.$no.'</center></td>
                                                <td>'.$row['idsupplier'].'</td>
                                                <td>'.$row['nama'].'</td>
                                                <td>'.$row['nohp'].'</td>
                                            ';
                                    ?>
                                                <td>
                                                    <center>
                                                    <a href="#modal-ubah-<?php echo $row['idsupplier']; ?>" data-toggle="modal" alt="ini">
                                                        <button type="button" class="btn btn-primary btn-square btn-noborder">
                                                            <i class="si si-eye"></i>
                                                        </button>
                                                    </a>
                                                    <a href="#modal-hapus-<?php echo $row['idsupplier']; ?>" data-toggle="modal">
                                                        <button type="button" class="btn btn-danger btn-square btn-noborder">
                                                            <i class="si si-trash"></i>
                                                        </button>
                                                    </a>
                                                    </center>
                                                </td> 
                                            </tr>
                                            <!-- Modal Ubah -->
                                                <div class="modal fade" id="modal-ubah-<?php echo $row['idsupplier']; ?>" role="dialog" >
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <form class="" action="index.php?w=pages-akun" method="POST"> 
                                                                <div class="block block-themed block-transparent mb-0">
                                                                    <div class="block-header bg-primary">
                                                                        <h3 class="block-title">UBAH DATA</h3>
                                                                        <div class="block-options">
                                                                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                                                                <i class="si si-close"></i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="block-content">
                                                                        <div class="form-group row">
                                                                                <label class="col-lg-3 col-form-label">ID Supplier</label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" class="form-control"  name="txtkode" readonly
                                                                                        value="<?php echo $row['idsupplier'] ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-lg-3 col-form-label">Nama</label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" class="form-control" name="txtnama" value="<?php echo $row['nama']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-lg-3 col-form-label">No HP</label>
                                                                                <div class="col-md-9">
                                                                                    <input type="number" class="form-control" name="txtnohp" value="<?php echo $row['nohp']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-lg-3 col-form-label">Alamat</label>
                                                                                <div class="col-md-9">
                                                                                <textarea class="form-control" 
                                                                                    name="txtalamat"><?php echo $row['alamat'];?></textarea>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-alt-secondary btn-noborder" data-dismiss="modal">BERSIHKAN</button>
                                                                    <button type="submit" name="tambah" class="btn btn-alt-success btn-noborder">
                                                                        <i class="fa fa-check"></i> SIMPAN
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- END Model UBah --> 
                                            
                                            <!-- Modal Hapus -->
                                                <div class="modal fade" id="modal-hapus-<?php echo $row['idsupplier']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-hapus" aria-hidden="true">
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
                                                                            <label class="col-sm-3 col-form-label">ID Supplier</label>
                                                                            <div class="col-md-8">
                                                                                <input type="text" name="idsupplier" readonly class="form-control-plaintext" value="<?php echo $row['idsupplier'] ?>">
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
                <!-- END Dynamic Table Full -->
            
    <!-- Modal Tambah -->
        <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="js-validation-bootstrap" action="" method="POST">
                        <div class="block block-themed block-transparent mb-0">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Tambah Data Supplier</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                        <i class="si si-close"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="form-group row">
                                <?php
                                    $kueri = "SELECT max(idsupplier) as maxKode FROM tbsupplier";
                                    $hasil = mysql_query($kueri);
                                    $data  = mysql_fetch_array($hasil);
                                    $idpegawai = $data['maxKode'];
                                    $noUrut = (int) substr($idpegawai, 5, 5);
                                    $noUrut++;
                                  
                                    $nip = sprintf("%05s", $noUrut);
                                ?>
                                    <label class="col-lg-3 col-form-label">ID Supplier</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control"  name="txtkode" readonly
                                            value="<?php echo "Sp"; echo $nip; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nama</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="txtnama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">No HP</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="txtnohp">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Alamat</label>
                                    <div class="col-md-9">
                                    <textarea class="form-control" 
                                        name="txtalamat"></textarea>
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

        

        