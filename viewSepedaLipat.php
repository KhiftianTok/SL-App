<?php include 'header.php' ?>         
<?php include 'controller/crudKondisi.php' ?>         
<?php include 'controller/crudMerk.php' ?>         
<?php include 'controller/crudTipeRem.php' ?>         
<?php include 'controller/crudHarga.php' ?>         
<?php include 'controller/crudJenis.php' ?>         
            <div id="layoutSidenav_content" style="padding:2%">
                <main>
                    <div class="container-fluid px-4" style="padding-top:2%">
                        <h1 class="mt-4" >Tambah Sepeda Lipat</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="row">
                        <form action="controller/insertSepedaLipat.php" method="POST">
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <div class="form-floating mb-4 mb-md-0">
                                        <input class="form-control" id="namaSepedaLipat" type="text" placeholder="Masukan Nama Sepeda Lipat" name="nama"/>
                                        <label for="namaSepedaLipat">Nama Sepeda Lipat</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                     <div class="form-floating mb-3 mb-md-0">
                                         <?php
                                         $dataMerk = bacaSemuaMerk();
                                         ?>
                                        <select class="form-select" name="merk" aria-label="Default select example">
                                            <option selected> - Pilih Merk - </option>
                                            <?php
                                            if($dataMerk != null){
                                                foreach($dataMerk as $baris){
                                                    $id = $baris['id_merk'];
                                                    $merk = $baris['merk'];
                                                    ?>
                                                    <option value="<?php echo $id ?>"><?php echo $merk ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <label for="merkSepedaLipat">Merk Sepeda Lipat</label>
                                     </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                     <div class="form-floating mb-3 mb-md-0">
                                        <?php
                                         $dataJenis = bacaSemuaJenis();
                                         ?>
                                        <select class="form-select" name="jenis" aria-label="Default select example">
                                            <option selected> - Pilih Jenis - </option>
                                            <?php
                                            if($dataJenis != null){
                                                foreach($dataJenis as $baris){
                                                    $id = $baris['id_jenis'];
                                                    $jenis = $baris['nama_jenis'];
                                                    ?>
                                                    <option value="<?php echo $id ?>"><?php echo $jenis ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <label for="jenisSepedaLipat">Jenis Sepeda Lipat</label>
                                     </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                     <div class="form-floating mb-3 mb-md-0">
                                     <?php
                                         $dataKondisi = bacaSemuaKondisi();
                                         ?>
                                        <select class="form-select" name="kondisi" aria-label="Default select example">
                                            <option selected> - Pilih Kondisi - </option>
                                            <?php
                                            if($dataKondisi != null){
                                                foreach($dataKondisi as $baris){
                                                    $id = $baris['id_kondisi'];
                                                    $kondisi = $baris['kondisi'];
                                                    ?>
                                                    <option value="<?php echo $id ?>"><?php echo $kondisi ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <label for="kondisiSepedaLipat">Kondisi Sepeda Lipat</label>
                                     </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                     <div class="form-floating mb-3 mb-md-0">
                                        <?php
                                         $dataTipeRem = bacaSemuaTipeRem();
                                         ?>
                                        <select class="form-select" name="tipe_rem" aria-label="Default select example">
                                            <option selected> - Pilih Tipe Rem - </option>
                                            <?php
                                            if($dataTipeRem != null){
                                                foreach($dataTipeRem as $baris){
                                                    $id = $baris['id_tipe_rem'];
                                                    $tipe_rem = $baris['tipe_rem'];
                                                    ?>
                                                    <option value="<?php echo $id ?>"><?php echo $tipe_rem ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <label for="tipeRemSepedaLipat">Tipe Rem Sepeda Lipat</label>
                                     </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                     <div class="form-floating mb-3 mb-md-0">
                                     <?php
                                         $dataHarga = bacaSemuaHarga();
                                         ?>
                                        <select class="form-select" name="harga" aria-label="Default select example">
                                            <option selected> - Pilih Range Harga - </option>
                                            <?php
                                            if($dataHarga != null){
                                                foreach($dataHarga as $baris){
                                                    $id = $baris['id_harga'];
                                                    $harga = $baris['range_harga'];
                                                    ?>
                                                    <option value="<?php echo $id ?>"><?php echo $harga ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <label for="hargaSepedaLipat">Range Harga Sepeda Lipat</label>
                                     </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="warnaSepedaLipat" type="text" placeholder="Masukan Warna Sepeda Lipat" name="warna"/>
                                        <label for="warnaSepedaLipat">Warna Sepeda Lipat</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="warnaSepedaLipat" type="number" placeholder="Masukan Tahun Keluaran Sepeda Lipat" name="tahun_keluaran"/>
                                        <label for="warnaSepedaLipat">Tahun Keluaran Sepeda Lipat</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <div class="mt-3 mb-0">
                                        <div class="d-grid gap-2 d-md-block"><button type="submit" name="tambah" class="btn btn-primary">Tambah</button></div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="mt-3 mb-0">
                                        <div class="d-grid gap-2 d-md-block"><button type="submit" name="batal" class="btn btn-primary">Batal</button></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>                     
                    </div>
                </main>
<?php include 'footer.php' ?>