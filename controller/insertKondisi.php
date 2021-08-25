<?php
	require_once 'crudKondisi.php';

	if(isset($_POST)){
		if(isset($_POST['tambah'])){
			$id = 1;
			$sql = "SELECT * from kondisi_sepeda_lipat order by id_kondisi DESC LIMIT 1";
			$cariId = bacaKondisi($sql);
			if($cariId != null){
				$id = $cariId[0]['id_kondisi']+1;
			}else{
				$id = 1 ;
			}
			$kondisi = $_POST['kondisi'];
			$point = $_POST['point'];

			$insert = tambahKondisi($id, $kondisi, $point);
			if($insert > 0){
				header("Location: ../viewKondisi.php?insert=1");
			}else{
				header("Location: ../viewKondisi.php?insert=0");
			}
		}

	}else{
		header("Location: ../404.html");
	}
?>