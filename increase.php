<?php session_start();
	$id = 	$_REQUEST['id'];
	$qty = 	$_REQUEST['qty'];
	if($qty==0){
		unset($_SESSION['cart'][$id]);
	}
	else{
		$_SESSION['cart'][$id] =$qty ;
	} header('location:' . $_SERVER['HTTP_REFERER']);
	
//print_r($_SESSION['cart']);
 



