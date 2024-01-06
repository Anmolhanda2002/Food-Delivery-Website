<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
   include('config.php');
   $query="UPDATE `user_order` SET `order_status`='Rejected' WHERE `id`=$id";
   $res=mysqli_query($conn,$query);
   if($res>0){
        echo "<script>window.location.assign('view_pending_orders.php?msg=Rejected Successfully')</script>";
    }
    else{
       echo "<script>window.location.assign('view_pending_orders.php?msg=Error!!Try Again')</script>";
   }


}

?>