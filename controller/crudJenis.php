<?php 
	require_once ('koneksiDb.php');
	
	function bacaJenis($sql){
		$data = array();
		$koneksi = koneksi();
		$hasil = mysqli_query($koneksi, $sql);
		
		if(mysqli_num_rows($hasil) == 0){
			mysqli_close($koneksi);
			return null;
		}
		
		$i=0;
		while ($baris = mysqli_fetch_array($hasil)){			
			$data[$i]['id_jenis'] = $baris['id_jenis'];
			$data[$i]['nama_jenis'] = $baris['nama_jenis'];
			$data[$i]['point'] = $baris['point'];
			$i++;
		}
		mysqli_close($koneksi);
		return $data;
	}
	function bacaSemuaJenis(){
		$sql = "SELECT * from jenis_sepeda_lipat";
		$data = bacaJenis($sql);
		return $data;
	}
	function cariJenis($id){
		$sql = "SELECT * from jenis_sepeda_lipat where id_jenis=$id";
		$data = bacaJenis($sql);
		return $data;
	}

	function tambahJenis($id_jenis, $nama_jenis, $point){
		$koneksi = koneksi();
		$sql = "INSERT into jenis_sepeda_lipat values($id_jenis, '$nama_jenis', $point)";
		$hasil = 0;
		if(mysqli_query($koneksi, $sql))
			$hasil = 1;
		mysqli_close($koneksi);
		return $hasil;
	}

	function ubahJenis($id_jenis, $nama_jenis, $point){
		$koneksi = koneksi();
		$sql = "Update jenis_sepeda_lipat SET nama_jenis = '$nama_jenis', point = $point where id_jenis=$id_jenis";
		$hasil = 0;
		if(mysqli_query($koneksi, $sql))
			$hasil = 1;
		mysqli_close($koneksi);
		return $hasil;
	}
	
	// menghapus 1 record berdasar field kunci kode
	function hapusJenis($id){
		$koneksi = koneksi();
		$sql = "DELETE from jenis_sepeda_lipat where id_jenis=$id";
		if (!mysqli_query($koneksi, $sql)){
			die('Error: ' . mysqli_error($koneksi));
		}
		$hasil = mysqli_affected_rows($koneksi);
		mysqli_close($koneksi);
		return $hasil;
	}
?>