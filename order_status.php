<?php 
    $status = $_REQUEST['status'];
    $id = $_REQUEST['id'];
    include("config.php");
    $query = "update user_order set order_status='$status' where id='$id'";
    $res = mysqli_query($conn,$query);
    if($res>0)
    {
        echo "<script>window.location.assign('view_all_order.php?msg=Order ". $status."')</script>";
    }
    else{
        echo "<script>window.location.assign('view_all_order.php?msg=Try Again')</script>";
    }
?>