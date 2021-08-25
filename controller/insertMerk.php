<?php
	require_once 'crudMerk.php';

	if(isset($_POST)){
		if(isset($_POST['tambah'])){
			$id = 1;
			$sql = "SELECT * from merk_sepeda_lipat order by id_merk DESC LIMIT 1";
			$cariId = bacaMerk($sql);
			if($cariId != null){
				$id = $cariId[0]['id_merk']+1;
			}else{
				$id = 1 ;
			}
			$kondisi = $_POST['merk'];
			$point = $_POST['point'];

			$insert = tambahMerk($id, $kondisi, $point);
			if($insert > 0){
				header("Location: ../viewMerk.php");
			}else{
				header("Location: ../viewMerk.php");
			}
		}

	}else{
		header("Location: ../404.html");
	}
?>