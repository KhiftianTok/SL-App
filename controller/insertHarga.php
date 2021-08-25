<?php
	require_once 'crudHarga.php';

	if(isset($_POST)){
		if(isset($_POST['tambah'])){
			$id = 1;
			$sql = "SELECT * from harga_sepeda_lipat order by id_harga DESC LIMIT 1";
			$cariId = bacaHarga($sql);
			if($cariId != null){
				$id = $cariId[0]['id_harga']+1;
			}else{
				$id = 1 ;
			}
			$range_harga = $_POST['range_harga'];
			$point = $_POST['point'];

			$insert = tambahHarga($id, $range_harga, $point);
			if($insert > 0){
				header("Location: ../viewHarga.php");
			}else{
				header("Location: ../viewHarga.php");
			}
		}

	}else{
		header("Location: ../404.html");
	}
?>