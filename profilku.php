<?php include 'header.php' ?>
<?php include 'controller/crudAdmin.php' ?>
<?php
$data = cariAdmin($username);
if($data != null){
    $username = $data[0]['username'];
    $email = $data[0]['email'];
    $pwd = $data[0]['password'];
}

?>
<div id="layoutSidenav_content" style="padding:2%">
    <main>
        <div class="container-fluid px-4" style="padding-top:2%;padding-bottom:12%">
            <h2 style="text-align:center;padding-top:3%">Selamat Datang <br> </h2>
            <form method="post" action="controller/updateProfile.php">
            <div class="row" >
                <div class="col-md-3" style="margin-top:2%">
                    <div class="card-deck">
                        <div class="card">
                            <img class="card-img-top"  src="assets/img/user_male.png" alt="" style="width:200px; height:200px; margin-left:19%;margin-right:19%;margin-top:7%;">
                            <div class="card-body">
                                <h4 class="card-title" style="text-align:center"></h4>
                            </div>
                        </div>
                    </div>
                </div>        
                <div class="col-md-9" style="margin-top:2%">
                    <div class="card-deck" >
                        <div class="card">
                            <div class="form-group row" style="padding-top:5%;padding-left:2%">
                                <label for="id" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="username" value="<?php echo $username ?>" id="<?php echo $username ?>" readonly >
                                    <input type="hidden" class="form-control" name="username" value="" id="#">
                                </div>
                            </div>
                            <div class="form-group row" style="padding-top:2%;padding-left:2%">
                                <label for="nama" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" name="email" value="<?php echo $email ?>" id="#" >
                                </div>
                            </div>
                            <div class="form-group row" style="padding-top:2%;padding-left:2%">
                                <label label for="pwd" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-3">
                                    <input type="password" name="pwd" id="input-pwd" class="form-control" data-toggle="password" value="<?php echo $pwd ?>">       
                                </div>
                                <div class="col-sm-2">
                                    <span toggle="#input-pwd" class="fa fa-fw fa-eye field-icon toggle-password"></span>                            
                                </div>
                            </div>
                            <div class="form-group row" style="padding-top:2%;padding-bottom:5%;padding-left:2%">
                                <div class="col-sm-3">
                                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</main>
<?php include 'footer.php' ?>