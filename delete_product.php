<?php
    $id = $_REQUEST['id'];
    include('config.php');
    $query = "DELETE FROM `product` WHERE id='$id'";
    $result = mysqli_query($conn,$query);
    if($result>0)
    {
        echo "<script>window.location.assign('manage_product.php?msg=Record deleted')</script>";
    }
    else{
        echo "<script>window.location.assign('manage_product.php?msg=Try again')</script>";
    }
?>