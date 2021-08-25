<?php 
	require_once ('koneksiDb.php');
	
	function bacaAdmin($sql){
		$data = array();
		$koneksi = koneksi();
		$hasil = mysqli_query($koneksi, $sql);
		
		if(mysqli_num_rows($hasil) == 0){
			mysqli_close($koneksi);
			return null;
		}
		
		$i=0;
		while ($baris = mysqli_fetch_array($hasil)){			
			$data[$i]['username'] = $baris['username'];
			$data[$i]['email'] = $baris['email'];
			$data[$i]['password'] = $baris['password'];
			$i++;
		}
		mysqli_close($koneksi);
		return $data;
	}
	function bacaSemuaAdmin(){
		$sql = "SELECT * from `admin`";
		$data = bacaAdmin($sql);
		return $data;
	}
	function cariAdmin($username){
		$sql = "SELECT * from `admin` where username=$username";
		$data = bacaAdmin($sql);
		return $data;
	}

	function tambahAdmin($username, $password,$email){
		$koneksi = koneksi();
		$sql = "INSERT into `admin` values($username, '$password','$email')";
		$hasil = 0;
		if(mysqli_query($koneksi, $sql))
			$hasil = 1;
		mysqli_close($koneksi);
		return $hasil;
	}

	function ubahAdmin($username, $password, $email){
		$koneksi = koneksi();
		$sql = "Update `admin` SET password = '$password', email = '$email' where username=$username";
		$hasil = 0;
		if(mysqli_query($koneksi, $sql))
			$hasil = 1;
		mysqli_close($koneksi);
		return $hasil;
	}
	
	// menghapus 1 record berdasar field kunci kode
	function hapusAdmin($id){
		$koneksi = koneksi();
		$sql = "DELETE from `admin` where username=$id";
		if (!mysqli_query($koneksi, $sql)){
			die('Error: ' . mysqli_error($koneksi));
		}
		$hasil = mysqli_affected_rows($koneksi);
		mysqli_close($koneksi);
		return $hasil;
	}
?>