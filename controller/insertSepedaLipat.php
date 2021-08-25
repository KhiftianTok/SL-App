<?php
	require_once 'crudSepedaLipat.php';
	require_once 'crudMerk.php';
	require_once 'crudKondisi.php';
	require_once 'crudTipeRem.php';
	require_once 'crudHarga.php';

	if(isset($_POST)){
		if(isset($_POST['tambah'])){
			$id = 1;
			$sql = "SELECT * from sepeda_lipat order by id_jenis DESC LIMIT 1";
			$cariId = bacaSepedaLipat($sql);
			if($cariId != null){
				$id = $cariId[0]['id_sepeda_lipat']+1;
			}else{
				$id = 1 ;
			}
			$nama = $_POST['nama'];
			$merk = $_POST['merk'];
			$jenis = $_POST['jenis'];
			$kondisi = $_POST['kondisi'];
			$tipe_rem = $_POST['tipe_rem'];
			$harga = $_POST['harga'];
			$warna = $_POST['warna'];
			$thn_klrn = $_POST['tahun_keluaran'];

			//mencari point dari kriteria yang akan di masukan kedalam rating
			//kriteria yang dipilih yang hanya kondisi,merk,tipe rem, dan harga
			$cariPointMerk = cariMerk($merk);
			if($cariPointMerk != null){
				$pointMerk = $cariPointMerk[0]['point'];
			}
			$cariPointKondisi = cariKondisi($kondisi);
			if($cariPointKondisi != null){
				$pointKondisi = $cariPointKondisi[0]['point'];
			}
			$cariPointTipeRem = cariTipeRem($tipe_rem);
			if($cariPointTipeRem != null){
				$pointTipeRem = $cariPointTipeRem[0]['point'];
			}
			$cariPointHarga = cariHarga($harga);
			if($cariPointHarga != null){
				$pointHarga = $cariPointHarga[0]['point'];
			}
			
			echo "$pointMerk <br>";
			echo "$pointHarga <br>";
			echo "$pointKondisi <br>";
			echo "$pointTipeRem <br>";
			$rating = ((($pointMerk*0.08)+($pointHarga*0.25)+($pointKondisi*0.63)+($pointTipeRem*0.05))-1)/10;
			
			
			
			
			$insert = tambahSepedaLipat($id, $nama, $jenis, $merk, $kondisi, $tipe_rem, $harga,$warna,$thn_klrn,$rating);
			echo "tambahSepedaLipat($id, $nama, $jenis, $merk, $kondisi, $tipe_rem, $harga,$warna,$thn_klrn,$rating)";
			if($insert > 0){
				header("Location: ../index.php");
			}else{
				header("Location: ../index.php");
			}
		}

	}else{
		header("Location: ../404.html");
	}
?>