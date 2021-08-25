<?php 
	function koneksi(){
		$servername="localhost";
		$username="root";
		$password="";
		$dbname="dbsepedalipat";
				
		$koneksi = mysqli_connect($servername,$username,$password,$dbname);
		
		if(!$koneksi){
			die ("Koneksi gagal ". mysqli_connect_error());
		}
		return $koneksi;
	}
?>