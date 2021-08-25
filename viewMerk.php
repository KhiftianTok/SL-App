<?php include 'header.php' ?>           
<?php include 'controller/crudMerk.php' ?>           
            <div id="layoutSidenav_content" style="padding:2%">
                <main>
                    <div class="container-fluid px-4" style="padding-top:2%">
                        <h1 class="mt-4" >Tambah Merk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="row">
                        <form action="controller/insertMerk.php" method="POST"> 
                            <div class="row mb-2">
                                <div class="col-md-2">
                                    <div class="form-floating mb-2 mb-md-0">
                                        <input class="form-control" id="inputMerk" type="text" placeholder="Merk" name="merk"/>
                                        <label for="inputMerk">Merk</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2">
                                     <div class="form-floating mb-2 mb-md-0">
                                        <input class="form-control" id="inputPoint" type="number" placeholder="masukan point kondisi" name="point" />
                                        <label for="inputPoint">Point</label>
                                     </div>
                                </div>
                                <div class="col-md-3">
                                     <h6 class="mt-3">*skala point 1-100</h6>
                                </div>
                            </div>
                            <div class="mt-3 mb-0">
                            <div class="d-grid gap-2 d-md-block"><button type="submit" name="tambah" class="btn btn-primary">Tambah</button></div>
                            </div>
                        </form>
                        </div>
                        <br>
                        <?php
                        $dataMerk = bacaSemuaMerk(); 
                        ?>                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-bicycle me-1"></i>
                                Daftar Merk Sepeda Lipat
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Merk Sepeda Lipat</th>
                                            <th>Point</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Merk Sepeda Lipat</th>
                                            <th>Point</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        if($dataMerk != null){
                                            foreach($dataMerk as $baris){
                                                $id = $baris['id_merk'];
                                                $merk = $baris['merk'];
                                                $point = $baris['point'];
                                                ?>
                                        <tr>
                                            <td><?php echo $id ?></td>
                                            <td><?php echo $merk ?></td>
                                            <td><?php echo $point ?></td>
                                            <td><a onclick="location.href='viewMerk.php?ubah=1&id=<?php echo $id?>'" class="btn btn-outline-primary">EDIT</a> || <a class="btn btn-outline-danger" onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='controller/deleteMerk.php?id=<?php echo $id; ?>' }">HAPUS</a></td>
                                        </tr>
                                                <?php
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