<?php 
	require_once ('koneksiDb.php');
	
	function bacaKondisi($sql){
		$data = array();
		$koneksi = koneksi();
		$hasil = mysqli_query($koneksi, $sql);
		
		if(mysqli_num_rows($hasil) == 0){
			mysqli_close($koneksi);
			return null;
		}
		
		$i=0;
		while ($baris = mysqli_fetch_array($hasil)){			
			$data[$i]['id_kondisi'] = $baris['id_kondisi'];
			$data[$i]['kondisi'] = $baris['kondisi'];
			$data[$i]['point'] = $baris['point'];
			$i++;
		}
		mysqli_close($koneksi);
		return $data;
	}
	function bacaSemuaKondisi(){
		$sql = "SELECT * from kondisi_sepeda_lipat";
		$data = bacaKondisi($sql);
		return $data;
	}
	function cariKondisi($id){
		$sql = "SELECT * from kondisi_sepeda_lipat where id_kondisi=$id";
		$data = bacaKondisi($sql);
		return $data;
	}

	function tambahKondisi($id_kondisi, $kondisi, $point){
		$koneksi = koneksi();
		$sql = "INSERT into kondisi_sepeda_lipat values($id_kondisi, '$kondisi', $point)";
		$hasil = 0;
		if(mysqli_query($koneksi, $sql))
			$hasil = 1;
		mysqli_close($koneksi);
		return $hasil;
	}

	function ubahKondisi($id_kondisi, $kondisi, $point){
		$koneksi = koneksi();
		$sql = "Update kondisi_sepeda_lipat SET kondisi = '$kondisi', point = $point where id_kondisi=$id_kondisi";
		$hasil = 0;
		if(mysqli_query($koneksi, $sql))
			$hasil = 1;
		mysqli_close($koneksi);
		return $hasil;
	}
	
	// menghapus 1 record berdasar field kunci kode
	function hapusKondisi($id){
		$koneksi = koneksi();
		$sql = "DELETE from kondisi_sepeda_lipat where id_kondisi=$id";
		if (!mysqli_query($koneksi, $sql)){
			die('Error: ' . mysqli_error($koneksi));
		}
		$hasil = mysqli_affected_rows($koneksi);
		mysqli_close($koneksi);
		return $hasil;
	}
?>