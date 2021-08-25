<?php 
	require_once ('koneksiDb.php');
	
	function bacaMerk($sql){
		$data = array();
		$koneksi = koneksi();
		$hasil = mysqli_query($koneksi, $sql);
		
		if(mysqli_num_rows($hasil) == 0){
			mysqli_close($koneksi);
			return null;
		}
		
		$i=0;
		while ($baris = mysqli_fetch_array($hasil)){			
			$data[$i]['id_merk'] = $baris['id_merk'];
			$data[$i]['merk'] = $baris['merk'];
			$data[$i]['point'] = $baris['point'];
			$i++;
		}
		mysqli_close($koneksi);
		return $data;
	}
	function bacaSemuaMerk(){
		$sql = "SELECT * from merk_sepeda_lipat";
		$data = bacaMerk($sql);
		return $data;
	}
	function cariMerk($id){
		$sql = "SELECT * from merk_sepeda_lipat where id_merk=$id";
		$data = bacaMerk($sql);
		return $data;
	}

	function tambahMerk($id_merk, $merk, $point){
		$koneksi = koneksi();
		$sql = "INSERT into merk_sepeda_lipat values($id_merk, '$merk', $point)";
		$hasil = 0;
		if(mysqli_query($koneksi, $sql))
			$hasil = 1;
		mysqli_close($koneksi);
		return $hasil;
	}

	function ubahMerk($id_merk, $merk, $point){
		$koneksi = koneksi();
		$sql = "Update merk_sepeda_lipat SET merk = '$merk', point = $point where id_Merk=$id_merk";
		$hasil = 0;
		if(mysqli_query($koneksi, $sql))
			$hasil = 1;
		mysqli_close($koneksi);
		return $hasil;
	}
	
	// menghapus 1 record berdasar field kunci kode
	function hapusMerk($id){
		$koneksi = koneksi();
		$sql = "DELETE from merk_sepeda_lipat where id_merk=$id";
		if (!mysqli_query($koneksi, $sql)){
			die('Error: ' . mysqli_error($koneksi));
		}
		$hasil = mysqli_affected_rows($koneksi);
		mysqli_close($koneksi);
		return $hasil;
	}
?>