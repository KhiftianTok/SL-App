<?php
	require_once 'crudJenis.php';

	if(isset($_POST)){
		if(isset($_POST['tambah'])){
			$id = 1;
			$sql = "SELECT * from jenis_sepeda_lipat order by id_jenis DESC LIMIT 1";
			$cariId = bacaJenis($sql);
			if($cariId != null){
				$id = $cariId[0]['id_jenis']+1;
			}else{
				$id = 1 ;
			}
			$jenis = $_POST['jenis'];
			$point = $_POST['point'];

			$insert = tambahJenis($id, $jenis, $point);
			if($insert > 0){
				header("Location: ../viewJenis.php");
			}else{
				header("Location: ../viewJenis.php");
			}
		}

	}else{
		header("Location: ../404.html");
	}
?>