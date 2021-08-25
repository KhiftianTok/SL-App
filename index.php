<?php include 'header.php'?>
<?php include 'controller/crudSepedaLipat.php'?>
<?php include 'controller/crudKondisi.php'?>
<?php include 'controller/crudMerk.php'?>
<?php include 'controller/crudTipeRem.php'?>
<?php include 'controller/crudHarga.php'?>

<div id="layoutSidenav_content" style="padding:2%">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Kondisi Sepeda Lipat</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="viewKondisi.php">tambah kondisi</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Merk Sepeda Lipat</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="viewMerk.php">tambah merk</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Tipe Rem Sepeda Lipat</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="viewTipeRem.php">tambah tipe rem</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Harga Sepeda Lipat</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="viewHarga.php">tambah range harga</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">Sepeda Lipat</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="viewSepedaLipat.php">tambah sepeda lipat</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-dark text-white mb-4">
                                    <div class="card-body">Jenis Sepeda Lipat</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="viewJenis.php">tambah Jenis sepeda lipat</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h4 class="mt-1">Filter</h4>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-md-2">
                                <div class="dropdown">
                                    <?php
                                    $dataKondisi = bacaSemuaKondisi();
                                    ?>
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Kondisi
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <?php
                                        if($dataKondisi !=null){
                                            foreach($dataKondisi as $baris){
                                                $id_kondisi = $baris['id_kondisi'];
                                                $kondisi = $baris['kondisi'];
                                                ?>
                                        <li><a class="dropdown-item" href="index.php?id_kondisi=<?php echo $id_kondisi ?>"><?php echo $kondisi ?></a></li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-2">
                                <div class="dropdown">
                                    <?php
                                    $dataMerk = bacaSemuaMerk();
                                    ?>
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Merk
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                         <?php
                                        if($dataMerk !=null){
                                            foreach($dataMerk as $baris){
                                                $id_merk = $baris['id_merk'];
                                                $merk = $baris['merk'];
                                                ?>
                                        <li><a class="dropdown-item" href="index.php?id_merk=<?php echo $id_merk ?>"><?php echo $merk ?></a></li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-2">
                                <div class="dropdown">
                                    <?php
                                    $dataTipeRem = bacaSemuaTipeRem();
                                    ?>
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Tipe Rem
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <?php
                                        if($dataTipeRem !=null){
                                            foreach($dataTipeRem as $baris){
                                                $idTipeRem = $baris['id_tipe_rem'];
                                                $tipeRem = $baris['tipe_rem'];
                                                ?>
                                        <li><a class="dropdown-item" href="index.php?id_tipeRem=<?php echo $idTipeRem ?>"><?php echo $tipeRem ?></a></li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-3 col-md-2">
                                <div class="dropdown">
                                    <?php
                                    $dataHarga = bacaSemuaHarga();
                                    ?>
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Range Harga
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <?php
                                        if($dataHarga !=null){
                                            foreach($dataHarga as $baris){
                                                $idHarga = $baris['id_harga'];
                                                $rangeHarga = $baris['range_harga'];
                                                ?>
                                        <li><a class="dropdown-item" href="index.php?id_harga=<?php echo $idHarga ?>"><?php echo $rangeHarga ?></a></li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <br>
                        <?php
                        if(isset($_GET["id_kondisi"]) || isset($_GET["id_merk"]) || isset($_GET["id_tipeRem"]) || isset($_GET["id_harga"]) ){
                
                            if(isset($_GET["id_kondisi"])){
                                $kondisi = $_GET["id_kondisi"];
                            }else{
                                $kondisi = "''";
                            }
                             
                            if(isset($_GET["id_merk"])){
                                $merk = $_GET["id_merk"];
                            }else{
                                $merk = "''";
                            }
                            if(isset($_GET["id_tipeRem"])){
                                $tipeRem = $_GET["id_tipeRem"];
                            }else{
                                $tipeRem = "''";
                            }
                            if(isset($_GET["id_harga"])){
                                $harga = $_GET["id_harga"];
                            }else{
                                $harga = "''";
                            }
                            $dataSepeda = joinTable2($kondisi,$merk,$tipeRem,$harga);
                           // echo "SELECT * FROM `sepeda_lipat` JOIN harga_sepeda_lipat ON harga_sepeda_lipat.id_harga = sepeda_lipat.id_harga JOIN merk_sepeda_lipat ON merk_sepeda_lipat.id_merk = sepeda_lipat.id_merk JOIN kondisi_sepeda_lipat ON kondisi_sepeda_lipat.id_kondisi = sepeda_lipat.id_kondisi JOIN tipe_rem_sepeda_lipat ON tipe_rem_sepeda_lipat.id_tipe_rem = sepeda_lipat.id_tipe_rem JOIN jenis_sepeda_lipat ON jenis_sepeda_lipat.id_jenis = sepeda_lipat.id_jenis WHERE sepeda_lipat.id_kondisi = $kondisi OR sepeda_lipat.id_merk = $merk OR sepeda_lipat.id_tipe_rem = $tipeRem OR sepeda_lipat.id_harga = $harga";

                            
                        }else{
                        
                        $dataSepeda = joinTable();
                        }
                        ?>                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-bicycle me-1"></i>
                                Daftar Sepeda Lipat
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Name</th>
                                            <th>Merk</th>
                                            <th>Jenis Sepeda Lipat</th>
                                            <th>Kondisi</th>
                                            <th>Tipe Rem</th>
                                            <th>Warna</th>
                                            
                                            <th>Harga</th>
                                            <th>Rating</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>NO</th>
                                            <th>Name</th>
                                            <th>Merk</th>
                                            <th>Jenis Sepeda Lipat</th>
                                            <th>Kondisi</th>
                                            <th>Tipe Rem</th>
                                            <th>Warna</th>
                                            
                                            <th>Harga</th>
                                            <th>Rating</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        if($dataSepeda != null){
                                            $no = 1;
                                            foreach($dataSepeda as $baris){
                                                $id = $baris['id_sepeda_lipat'];
                                                $nama = $baris['nama_sepeda_lipat'];
                                                $merk = $baris['merk'];
                                                $jenis = $baris['nama_jenis'];
                                                $kondisi = $baris['kondisi'];
                                                $tipe_rem = $baris['tipe_rem'];
                                                $warna = $baris['warna'];
                                                $thn_klrn = $baris['tahun_keluaran'];
                                                $harga = $baris['range_harga'];
                                                $rating = $baris['rating'];
                                                ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $nama ?></td>
                                            <td><?php echo $merk ?></td>
                                            <td><?php echo $jenis ?></td>
                                            <td><?php echo $kondisi ?></td>
                                            <td><?php echo $tipe_rem ?></td>
                                            <td><?php echo $warna ?></td>
                                            
                                            <td><?php echo $harga ?></td>
                                            <td><?php echo $rating ?></td>
                                            <td><a onclick="location.href='viewSepedaLipat.php?ubah=1&id=<?php echo $id?>'" class="btn btn-sm btn-outline-primary">EDIT</a> || <a class="btn btn-sm btn-outline-danger" onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='controller/deleteSepeda.php?id=<?php echo $id; ?>' }">HAPUS</a></td>
                                        </tr>
                                                <?php
                                                $no++;
                                            }
                                        }                                    
                                        ?>                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php include 'footer.php' ?>