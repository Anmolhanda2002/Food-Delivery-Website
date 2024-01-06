<?php   
    include_once('header.php');
    if(isset($_SESSION['user_email']))
    {
        include('config.php');
        $user_email = $_SESSION['user_email'];
    }
    else{
        echo "<script>window.location.assign('user_login.php')</script>";
    }
?>
<div class="w3l-about-breadcrumb w3l-search-results py-5 text-center">
    <div class="container py-lg-4 py-md-3">
       
        <h3 class="title-big">View Order</h3>
    </div>
</div>
<div class = 'container-fluid'>
<div class = 'row'>
<div class = 'col-md-1'></div>
<div class = 'col-md-10 mx-auto'>
<?php
if ( isset( $_REQUEST[ 'msg' ] ) )
    {
    echo "<div class='alert alert-info'>".$_REQUEST[ 'msg' ].'</div>';
    }
?>
  <!-- <h4 class="text-dark text-center text-bold py-3">User Orders</h4> -->
    <div class="table-responsive my-4">
    <table class = 'table table-bordered table-hover table-striped table-responsive'>
        <tr>

        <th>SNo.</th>
        <th>Order Id</th>
        <th>Name</th>
        <th>Order Description</th>
        <th>Total</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Date</th>
        <th>Status</th>
        </tr>
        <?php
        $sno = 1;
        include( 'config.php' );
        $query = "SELECT * FROM `user_order` where user_email='$user_email'";
        $result = mysqli_query( $conn, $query );
        while( $row = mysqli_fetch_array( $result ) )
        {
            echo '<tr>';
            echo '<td>'.$sno.'</td>';
            echo '<td>'.$row[ 'id' ].'</td>';
            echo '<td>'.$row[ 'user_name' ].'</td>';
            echo '<td>'.$row[ 'order_desc' ].'</td>';
            echo '<td>'.$row[ 'price' ].'</td>';
            echo '<td>'.$row[ 'contact' ].'</td>';
            echo '<td>'.$row[ 'address' ].'</td>';
            echo '<td>'.$row[ 'order_date' ].'</td>';
            echo '<td>'.$row[ 'order_status' ].'</td>';
            echo '</tr>';
            $sno++;
        }
        ?>
    </table>
    </div>
</div>
<!-- <div class = 'col-md-2'></div> -->
</div>
</div>
<?php
include_once( 'footer.php' );
?>
