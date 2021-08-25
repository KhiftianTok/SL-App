<?php
	require_once 'crudAdmin.php';
	require_once 'crudPengguna.php';
	session_start();

	if(isset($_POST)){
		if(isset($_POST['masuk'])){
			$username	= $_POST['username'];
			$password	= $_POST['password'];

			$validasi = cariAdmin($username);
			if($validasi != null){
				$_SESSION['user'] = $validasi[0]['username'];
				echo "berhasil login sebagai admin";
				header("Location: ../index.php");
			}else{
				$validasi = cariPengguna($username);
				if($validasi != null){
					$_SESSION['user'] = $validasi[0]['id_pengguna'];
					echo "berhasil login sebagai Pengguna";
					header("Location: ../index.php");
				}else{
					header("Location: ../login.php?false=1");
				}
			}
		}

	}else{
		header("Location: ../404.html");
	}
?>