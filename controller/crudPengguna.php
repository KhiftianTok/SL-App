<?php 
	require_once ('koneksiDb.php');
	
	function bacaPengguna($sql){
		$data = array();
		$koneksi = koneksi();
		$hasil = mysqli_query($koneksi, $sql);
		
		if(mysqli_num_rows($hasil) == 0){
			mysqli_close($koneksi);
			return null;
		}
		
		$i=0;
		while ($baris = mysqli_fetch_array($hasil)){			
			$data[$i]['id_pengguna'] = $baris['id_pengguna'];
			$data[$i]['nama'] = $baris['nama'];
			$data[$i]['tempat_lahir'] = $baris['tempat_lahir'];
			$data[$i]['tanggal_lahir'] = $baris['tanggal_lahir'];
			$data[$i]['email'] = $baris['email'];
			$data[$i]['password'] = $baris['password'];
			$i++;
		}
		mysqli_close($koneksi);
		return $data;
	}
	function bacaSemuaPengguna(){
		$sql = "SELECT * from pengguna";
		$data = bacaPengguna($sql);
		return $data;
	}
	function cariPengguna($id){
		$sql = "SELECT * from pengguna where id_pengguna=$id";
		$data = bacaPengguna($sql);
		return $data;
	}

	function tambahPengguna($id_pengguna, $nama, $tempat_lahir,$tanggal_lahir,$email,$password){
		$koneksi = koneksi();
		$sql = "INSERT into Pengguna_sepeda_lipat values($id_pengguna, '$nama','$tempat_lahir','$tanggal_lahir','$email','$password')";
		$hasil = 0;
		if(mysqli_query($koneksi, $sql))
			$hasil = 1;
		mysqli_close($koneksi);
		return $hasil;
	}

	function ubahPengguna($id_pengguna, $nama, $tempat_lahir,$tanggal_lahir,$email,$password){
		$koneksi = koneksi();
		$sql = "Update Pengguna_sepeda_lipat SET nama = '$nama', tempat_lahir = $tempat_lahir,tanggal_lahir=$tanggal_lahir,email=$email,password=$password where id_pengguna=$id_pengguna";
		$hasil = 0;
		if(mysqli_query($koneksi, $sql))
			$hasil = 1;
		mysqli_close($koneksi);
		return $hasil;
	}
	
	// menghapus 1 record berdasar field kunci kode
	function hapusPengguna($id){
		$koneksi = koneksi();
		$sql = "DELETE from pengguna where id_pengguna=$id";
		if (!mysqli_query($koneksi, $sql)){
			die('Error: ' . mysqli_error($koneksi));
		}
		$hasil = mysqli_affected_rows($koneksi);
		mysqli_close($koneksi);
		return $hasil;
	}
?>