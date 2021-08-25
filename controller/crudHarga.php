<?php 
	require_once ('koneksiDb.php');
	
	function bacaHarga($sql){
		$data = array();
		$koneksi = koneksi();
		$hasil = mysqli_query($koneksi, $sql);
		
		if(mysqli_num_rows($hasil) == 0){
			mysqli_close($koneksi);
			return null;
		}
		
		$i=0;
		while ($baris = mysqli_fetch_array($hasil)){			
			$data[$i]['id_harga'] = $baris['id_harga'];
			$data[$i]['range_harga'] = $baris['range_harga'];
			$data[$i]['point'] = $baris['point'];
			$i++;
		}
		mysqli_close($koneksi);
		return $data;
	}
	function bacaSemuaHarga(){
		$sql = "SELECT * from harga_sepeda_lipat";
		$data = bacaHarga($sql);
		return $data;
	}
	function cariHarga($id){
		$sql = "SELECT * from harga_sepeda_lipat where id_harga=$id";
		$data = bacaHarga($sql);
		return $data;
	}

	function tambahHarga($id_harga, $range_harga, $point){
		$koneksi = koneksi();
		$sql = "INSERT into harga_sepeda_lipat values($id_harga, '$range_harga', $point)";
		$hasil = 0;
		if(mysqli_query($koneksi, $sql))
			$hasil = 1;
		mysqli_close($koneksi);
		return $hasil;
	}

	function ubahHarga($id_harga, $range_harga, $point){
		$koneksi = koneksi();
		$sql = "Update harga_sepeda_lipat SET range_harga = '$range_harga', point = $point where id_harga=$id_harga";
		$hasil = 0;
		if(mysqli_query($koneksi, $sql))
			$hasil = 1;
		mysqli_close($koneksi);
		return $hasil;
	}
	
	// menghapus 1 record berdasar field kunci kode
	function hapusHarga($id){
		$koneksi = koneksi();
		$sql = "DELETE from harga_sepeda_lipat where id_harga=$id";
		if (!mysqli_query($koneksi, $sql)){
			die('Error: ' . mysqli_error($koneksi));
		}
		$hasil = mysqli_affected_rows($koneksi);
		mysqli_close($koneksi);
		return $hasil;
	}
?>