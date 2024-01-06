<?php
    $id = $_REQUEST['id'];
    include('config.php');
    $query = "DELETE FROM `create_account` WHERE id='$id'";
    $result = mysqli_query($conn,$query);
    if($result>0)
    {
        echo "<script>window.location.assign('manage_user.php?msg=Record deleted')</script>";
    }
    else{
        echo "<script>window.location.assign('manage_user.php?msg=Try again')</script>";
    }
?>