<?php
    if(isset($_POST['tambah'])){
        include 'action-barang-tambah.php';
    }else if (isset($_POST['hapus'])){
        include 'action-barang-hapus.php';
    }
?>

                    

                <!-- Dynamic Table Full -->
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title"><b>DATA BARANG</b></h3>
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
                                        <th width="15%">ID Barang</th>
                                        <th width="25%">Nama</th>
                                        <th width="25%">Merk</th>
                                        <th width="25%">Supplier</th>
                                        <th width="12%"><center>Aksi</center></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        $sql= "SELECT *FROM tbbarang INNER JOIN tbsupplier 
                                        on tbbarang.idSupplier=tbsupplier.idsupplier
                                        ";
                                        $qry= mysql_query($sql);
                                        while($row= mysql_fetch_assoc($qry)){
                                            echo '
                                            <tr>
                                                <td><center>'.$no.'</center></td>
                                                <td>'.$row['idbarang'].'</td>
                                                <td>'.$row['nama'].'</td>
                                                <td>'.$row['merk'].'</td>
                                                <td>'.$row['idsupplier'].'</td>
                                            ';
                                    ?>
                                    
                                                <td>
                                                    <center>
                                                    <a href="#modal-ubah-<?php echo $row['idpegawai']; ?>" data-toggle="modal" alt="ini">
                                                        <button type="button" class="btn btn-primary btn-square btn-noborder">
                                                            <i class="si si-eye"></i>
                                                        </button>
                                                    </a>
                                                    <a href="#modal-hapus-<?php echo $row['idpegawai']; ?>" data-toggle="modal">
                                                        <button type="button" class="btn btn-danger btn-square btn-noborder">
                                                            <i class="si si-trash"></i>
                                                        </button>
                                                    </a>
                                                    </center>
                                                </td> 
                                            </tr>
                                            <!-- Modal Ubah -->
                                                <div class="modal fade" id="modal-ubah-<?php echo $row['idpegawai']; ?>" role="dialog" >
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
                                                                            <?php
                                                                                $kueri = "SELECT max(idPegawai) as maxKode FROM tbpegawai";
                                                                                $hasil = mysql_query($kueri);
                                                                                $data  = mysql_fetch_array($hasil);
                                                                                $idpegawai = $data['maxKode'];
                                                                                $noUrut = (int) substr($idpegawai, 5, 5);
                                                                                $noUrut++;
                                                                                $nip = sprintf("%05s", $noUrut);
                                                                            ?>
                                                                                <label class="col-lg-3 col-form-label">Kode Pegawai</label>
                                                                                <div class="col-md-9">
                                                                                    <input type="text" class="form-control"  name="txtkodepegawai" readonly
                                                                                        value="<?php echo date("Y"); echo $nip; ?>">
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
                                                                            <div class="form-group row">
                                                                                <label class="col-lg-3 col-form-label">Jabatan</label>
                                                                                <div class="col-md-9">
                                                                                <select class="form-control" name="txtjabatan">
                                                                                    <option value="">Pilih Jabatan</option>
                                                                                    <option value="1">Administrator</option>
                                                                                    <option value="2">Bag. Gudang</option>
                                                                                    <option value="3">Bag. Kasir</option>
                                                                                </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label class="col-lg-3 col-form-label">Kata Sandi</label>
                                                                                <div class="col-md-9">
                                                                                    <div class="input-group">
                                                                                        <input type="email" 
                                                                                            class="form-control" disabled id="inputpass" name="example-input2-group2" placeholder="Email">
                                                                                        <div class="input-group-append">
                                                                                            
                                                                                                <button type="button" id="btn1" class="btn btn-secondary btn-noborder">UBAH</button>
                                                                                                <button type="button" id="btn2"   HIDDEN class="btn btn-secondary btn-noborder">BATAL</button>
                                                                                          
                                                                                        </div>
                                                                                    </div>
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
                                                <div class="modal fade" id="modal-hapus-<?php echo $row['idpegawai']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-hapus" aria-hidden="true">
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
                                                                            <label class="col-sm-2 col-form-label">NIP</label>
                                                                            <div class="col-md-9">
                                                                                <input type="text" name="idpegawai" readonly class="form-control-plaintext" value="<?php echo $row['idpegawai'] ?>">
                                                                            </div>
                                                                            <label class="col-sm-2 col-form-label">Nama</label>
                                                                            <div class="col-md-9">
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
<div class="modal fade" id="modal-tambah" role="dialog" aria-labelledby="modal-fadein" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="js-validation-bootstrap" action="" method="POST">
                        <div class="block block-themed block-transparent mb-0">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Tambah Data Barang</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                        <i class="si si-close"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="form-group row">
                                <?php
                                    $kueri = "SELECT max(idbarang) as maxKode FROM tbbarang";
                                    $hasil = mysql_query($kueri);
                                    $data  = mysql_fetch_array($hasil);
                                    $idbarang = $data['maxKode'];
                                    $noUrut = (int) substr($idbarang, 5, 5);
                                    $noUrut++;
                                  
                                    $nip = sprintf("%05s", $noUrut);
                                ?>
                                    <label class="col-lg-3 col-form-label">Kode Barang</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control"  name="txtkode" readonly
                                            value="<?php echo "Brng"; echo $nip; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nama</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="txtnama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Merk</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="txtmerk">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Jenis</label>
                                    <div class="col-md-9">
                                        <select class="js-select2 form-control" id="example-select2" name="txtjenis" style="width: 100%;">
                                            
                                            <option value="Suku Cadang">Suku Cadang</option>
                                            <option value="TV">TV</option>
                                            <option value="Lampu">Lampu</option>
                                            <option value="Kabel">Kabel</option>
                                            <option value="Speaker">Speaker</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Garansi</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="txtgaransi">
                                        <div class="form-text text-muted">Dihitung dalam bulan</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Harga</label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="txtharga">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Supplier</label>
                                    <div class="col-md-9">
                                        <input class="form-control" name="kodespl" list="supplier" />
                                        <datalist id="supplier">
                                            <?php 
                                            $query11 = mysql_query("SELECT * FROM tbsupplier");
                                            while($row11 = mysql_fetch_assoc($query11)){
                                            ?>
                                            <option value="<?php echo $row11['idsupplier']; ?>"><?php echo $row11['nama']; ?>
                                            <?php } ?>            
                                        </datalist>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Gudang</label>
                                    <div class="col-md-9">
                                        <input class="form-control" name="kodegdg" list="gudang" />
                                        <datalist id="gudang">
                                            <?php 
                                            $query11 = mysql_query("SELECT * FROM tbgudang");
                                            while($row11 = mysql_fetch_assoc($query11)){
                                            ?>
                                            <option value="<?php echo $row11['idgudang']; ?>"><?php echo $row11['nama']; ?>
                                            <?php } ?>            
                                        </datalist>
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
               

        

        