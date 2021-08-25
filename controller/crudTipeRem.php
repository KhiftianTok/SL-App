<?php 
	require_once ('koneksiDb.php');
	
	function bacaTipeRem($sql){
		$data = array();
		$koneksi = koneksi();
		$hasil = mysqli_query($koneksi, $sql);
		
		if(mysqli_num_rows($hasil) == 0){
			mysqli_close($koneksi);
			return null;
		}
		
		$i=0;
		while ($baris = mysqli_fetch_array($hasil)){			
			$data[$i]['id_tipe_rem'] = $baris['id_tipe_rem'];
			$data[$i]['tipe_rem'] = $baris['tipe_rem'];
			$data[$i]['point'] = $baris['point'];
			$i++;
		}
		mysqli_close($koneksi);
		return $data;
	}
	function bacaSemuaTipeRem(){
		$sql = "SELECT * from tipe_rem_sepeda_lipat";
		$data = bacaTipeRem($sql);
		return $data;
	}
	function cariTipeRem($id){
		$sql = "SELECT * from tipe_rem_sepeda_lipat where id_tipe_rem=$id";
		$data = bacaTipeRem($sql);
		return $data;
	}

	function tambahTipeRem($id_TipeRem, $TipeRem, $point){
		$koneksi = koneksi();
		$sql = "INSERT into tipe_rem_sepeda_lipat values($id_TipeRem, '$TipeRem', $point)";
		$hasil = 0;
		if(mysqli_query($koneksi, $sql))
			$hasil = 1;
		mysqli_close($koneksi);
		return $hasil;
	}

	function ubahTipeRem($id_TipeRem, $TipeRem, $point){
		$koneksi = koneksi();
		$sql = "Update tipe_rem_sepeda_lipat SET tipe_rem = '$TipeRem', point = $point where id_tipe_rem=$id_TipeRem";
		$hasil = 0;
		if(mysqli_query($koneksi, $sql))
			$hasil = 1;
		mysqli_close($koneksi);
		return $hasil;
	}
	
	// menghapus 1 record berdasar field kunci kode
	function hapusTipeRem($id){
		$koneksi = koneksi();
		$sql = "DELETE from tipe_rem_sepeda_lipat where id_tipe_rem=$id";
		if (!mysqli_query($koneksi, $sql)){
			die('Error: ' . mysqli_error($koneksi));
		}
		$hasil = mysqli_affected_rows($koneksi);
		mysqli_close($koneksi);
		return $hasil;
	}
?>