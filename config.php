<?php
    $conn = mysqli_connect("localhost","root","","food_order");
    if(!$conn)
    {
        echo mysqli_error($conn);
    }
?>  