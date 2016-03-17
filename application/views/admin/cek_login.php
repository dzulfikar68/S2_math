<?php
	session_start();
	
	include 'config/connect_db.php';
	
	if((!isset($_POST['username'])) || (!isset($_POST['password']))){
		header('location:login.php');
	}
	
	$username		= $_POST['username'];
	$password		= $_POST['password'];
	
	$query			= mysql_query('SELECT * FROM db_admin WHERE nama_admin =\''.$username.'\' AND password =\''.$password.'\' ');
	
	if(!$query){
		echo mysql_error();
	}
	
	$result			= mysql_fetch_array($query);
	
	$row			= mysql_num_rows($query);
	
	if($row==1){
		$_SESSION['username']		= $username;
		$_SESSION['id_admin']		= $result['id_admin'];
		
		mysql_query('UPDATE db_admin SET tgl_last_visit ='.getdate().' WHERE id_admin = '.$result['id_admin'].'');
		
		header('location:index.php');
	}else{
		echo 'Belum terdaftar';
	}

?>