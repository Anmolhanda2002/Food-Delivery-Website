<?php session_start(); 
	$id   = 	$_REQUEST['id'];
	
		if(isset($_SESSION['cart']) && array_key_exists($id,$_SESSION['cart']) ){
			$_SESSION['cart'][$id] += 1 ;
			header('location:' . $_SERVER['HTTP_REFERER']);
		}
		else{
			$_SESSION['cart'][$id]=1;
			header('location:' . $_SERVER['HTTP_REFERER']);
		}
	
//print_r($_SESSION['cart']);
?>