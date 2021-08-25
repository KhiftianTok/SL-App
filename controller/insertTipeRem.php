<?php
	require_once 'crudTipeRem.php';

	if(isset($_POST)){
		if(isset($_POST['tambah'])){
			$id = 1;
			$sql = "SELECT * from tipe_rem_sepeda_lipat order by id_tipe_rem DESC LIMIT 1";
			$cariId = bacaTipeRem($sql);
			if($cariId != null){
				$id = $cariId[0]['id_tipe_rem']+1;
			}else{
				$id = 1 ;
			}
			$tipe_rem = $_POST['tipe_rem'];
			$point = $_POST['point'];

			$insert = tambahTipeRem($id, $tipe_rem, $point);
			if($insert > 0){
				header("Location: ../viewTipeRem.php");
			}else{
				header("Location: ../viewTipeRem.php");
			}
		}

	}else{
		header("Location: ../404.html");
	}
?>