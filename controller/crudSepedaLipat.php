<?php 
	require_once ('koneksiDb.php');
	
	function bacaSepedaLipat($sql){
		$data = array();
		$koneksi = koneksi();
		$hasil = mysqli_query($koneksi, $sql);
		
		if(mysqli_num_rows($hasil) == 0){
			mysqli_close($koneksi);
			return null;
		}
		
		$i=0;
		while ($baris = mysqli_fetch_array($hasil)){			
			$data[$i]['id_sepeda_lipat'] = $baris['id_sepeda_lipat'];
			$data[$i]['nama_sepeda_lipat'] = $baris['nama_sepeda_lipat'];
			$data[$i]['id_jenis'] = $baris['id_jenis'];
			$data[$i]['id_merk'] = $baris['id_merk'];
			$data[$i]['id_kondisi'] = $baris['id_kondisi'];
			$data[$i]['id_tipe_rem'] = $baris['id_tipe_rem'];
			$data[$i]['id_harga'] = $baris['id_harga'];
			$data[$i]['warna'] = $baris['warna'];
			$data[$i]['tahun_keluaran'] = $baris['tahun_keluaran'];
			$data[$i]['rating'] = $baris['rating'];
			$i++;
		}
		mysqli_close($koneksi);
		return $data;
	}
	function bacaSemuaSepedaLipat(){
		$sql = "SELECT * from sepeda_lipat";
		$data = bacaSepedaLipat($sql);
		return $data;
	}
	function cariSepedaLipat($id_sepeda){
		$sql = "SELECT * from sepeda_lipat where id_sepeda_lipat=$id_sepeda";
		$data = bacaSepedaLipat($sql);
		return $data;
	}

	function tambahSepedaLipat($id_sepeda, $nama_sepeda, $id_jenis, $id_merk, $id_kondisi, $id_tipe_rem, $id_harga,$warna,$tahun_keluaran,$rating){
		$koneksi = koneksi();
		$sql = "INSERT into sepeda_lipat values($id_sepeda, '$nama_sepeda', $id_jenis, $id_merk, $id_kondisi, $id_tipe_rem, $id_harga,'$warna',$tahun_keluaran,$rating)";
		$hasil = 0;
		if(mysqli_query($koneksi, $sql))
			$hasil = 1;
		mysqli_close($koneksi);
		return $hasil;
	}

	function ubahSepedaLipat($id_sepeda, $nama_sepeda, $id_jenis, $id_merk, $id_kondisi, $id_tipe_rem, $id_harga,$warna,$tahun_keluaran,$rating){
		$koneksi = koneksi();
		$sql = "Update sepeda_lipat SET nama_sepeda_lipat = '$nama_sepeda', id_jenis = $id_jenis, id_merk = $id_merk, id_kondisi =$id_kondisi, id_tipe_rem = $id_tipe_rem, id_harga =$id_harga, warna = '$warna',tahun_keluaran =$tahun_keluaran , rating='$rating' where id_sepeda_lipat=$id_sepeda";
		$hasil = 0;
		if(mysqli_query($koneksi, $sql))
			$hasil = 1;
		mysqli_close($koneksi);
		return $hasil;
	}
	
	// menghapus 1 record berdasar field kunci kode
	function hapusSepedaLipat($id){
		$koneksi = koneksi();
		$sql = "DELETE from sepeda_lipat where id_sepeda_lipat=$id";
		if (!mysqli_query($koneksi, $sql)){
			die('Error: ' . mysqli_error($koneksi));
		}
		$hasil = mysqli_affected_rows($koneksi);
		mysqli_close($koneksi);
		return $hasil;
	}

	function joinTable(){
		$sql = "SELECT * FROM `sepeda_lipat` JOIN harga_sepeda_lipat ON harga_sepeda_lipat.id_harga = sepeda_lipat.id_harga JOIN merk_sepeda_lipat ON merk_sepeda_lipat.id_merk = sepeda_lipat.id_merk JOIN kondisi_sepeda_lipat ON kondisi_sepeda_lipat.id_kondisi = sepeda_lipat.id_kondisi JOIN tipe_rem_sepeda_lipat ON tipe_rem_sepeda_lipat.id_tipe_rem = sepeda_lipat.id_tipe_rem JOIN jenis_sepeda_lipat ON jenis_sepeda_lipat.id_jenis = sepeda_lipat.id_jenis";
		$data = array();
		$koneksi = koneksi();
		$hasil = mysqli_query($koneksi, $sql);
		
		if(mysqli_num_rows($hasil) == 0){
			mysqli_close($koneksi);
			return null;
		}
		
		$i=0;
		while ($baris = mysqli_fetch_array($hasil)){			
			$data[$i]['id_sepeda_lipat'] = $baris['id_sepeda_lipat'];
			$data[$i]['nama_sepeda_lipat'] = $baris['nama_sepeda_lipat'];
			$data[$i]['id_jenis'] = $baris['id_jenis'];
			$data[$i]['id_merk'] = $baris['id_merk'];
			$data[$i]['id_kondisi'] = $baris['id_kondisi'];
			$data[$i]['id_tipe_rem'] = $baris['id_tipe_rem'];
			$data[$i]['id_harga'] = $baris['id_harga'];
			$data[$i]['warna'] = $baris['warna'];
			$data[$i]['tahun_keluaran'] = $baris['tahun_keluaran'];
			$data[$i]['rating'] = $baris['rating'];
			$data[$i]['kondisi'] = $baris['kondisi'];
			$data[$i]['tipe_rem'] = $baris['tipe_rem'];
			$data[$i]['range_harga'] = $baris['range_harga'];
			$data[$i]['merk'] = $baris['merk'];
			$data[$i]['nama_jenis'] = $baris['nama_jenis'];
			$i++;
		}
		mysqli_close($koneksi);
		return $data;
	}

	function joinTable2($kondisi,$merk,$tipeRem,$harga){
		$sql = "SELECT * FROM `sepeda_lipat` JOIN harga_sepeda_lipat ON harga_sepeda_lipat.id_harga = sepeda_lipat.id_harga JOIN merk_sepeda_lipat ON merk_sepeda_lipat.id_merk = sepeda_lipat.id_merk JOIN kondisi_sepeda_lipat ON kondisi_sepeda_lipat.id_kondisi = sepeda_lipat.id_kondisi JOIN tipe_rem_sepeda_lipat ON tipe_rem_sepeda_lipat.id_tipe_rem = sepeda_lipat.id_tipe_rem JOIN jenis_sepeda_lipat ON jenis_sepeda_lipat.id_jenis = sepeda_lipat.id_jenis WHERE sepeda_lipat.id_kondisi = $kondisi OR sepeda_lipat.id_merk = $merk OR sepeda_lipat.id_tipe_rem = $tipeRem OR sepeda_lipat.id_harga = $harga ";
		$data = array();
		$koneksi = koneksi();
		$hasil = mysqli_query($koneksi, $sql);
		
		if(mysqli_num_rows($hasil) == 0){
			mysqli_close($koneksi);
			return null;
		}
		
		$i=0;
		while ($baris = mysqli_fetch_array($hasil)){			
			$data[$i]['id_sepeda_lipat'] = $baris['id_sepeda_lipat'];
			$data[$i]['nama_sepeda_lipat'] = $baris['nama_sepeda_lipat'];
			$data[$i]['id_jenis'] = $baris['id_jenis'];
			$data[$i]['id_merk'] = $baris['id_merk'];
			$data[$i]['id_kondisi'] = $baris['id_kondisi'];
			$data[$i]['id_tipe_rem'] = $baris['id_tipe_rem'];
			$data[$i]['id_harga'] = $baris['id_harga'];
			$data[$i]['warna'] = $baris['warna'];
			$data[$i]['tahun_keluaran'] = $baris['tahun_keluaran'];
			$data[$i]['rating'] = $baris['rating'];
			$data[$i]['kondisi'] = $baris['kondisi'];
			$data[$i]['tipe_rem'] = $baris['tipe_rem'];
			$data[$i]['range_harga'] = $baris['range_harga'];
			$data[$i]['merk'] = $baris['merk'];
			$data[$i]['nama_jenis'] = $baris['nama_jenis'];
			$i++;
		}
		mysqli_close($koneksi);
		return $data;
	}
?>