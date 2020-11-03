<div class="my-30 text-center">
                        <h1 class="font-w700 mb-10">Sistem Manajemen <span class="text-primary">Barang</span></h1>
                        <?php
                            /* script menentukan hari */  
                            $array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
                            $hr = $array_hr[date('N')];

                            /* script menentukan tanggal */    
                            $tgl= date('j');
                            /* script menentukan bulan */ 
                            $array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
                            $bln = $array_bln[date('n')];
                            /* script menentukan tahun */ 
                            $thn = date('Y');
                            /* script perintah keluaran*/ 
                        ?>
                        
                        <h2 class="h4 font-w400 text-muted"><span id="clock">&nbsp<?php print date('H:i:s'); ?></span>&nbspWIB 
                        | <?php echo $hr . ", " . $tgl . " " . $bln . " " . $thn . " "; ?></h2>
                    </div>