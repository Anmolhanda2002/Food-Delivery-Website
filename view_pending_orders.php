<?php
include_once( 'header.php' );
?>
<div class="w3l-about-breadcrumb w3l-search-results py-5 text-center">
    <div class="container py-lg-4 py-md-3">
       
        <h3 class="title-big">Pending Orders</h3>
    </div>
</div>
<div class = 'container-fluid'>
<div class = 'row'>
<div class="col-md-1"></div>

<div class = 'col-md-10 mx-auto table-responsive my-3'>
<?php
if ( isset( $_REQUEST[ 'msg' ] ) )
 {
    echo "<div class='alert alert-info'>".$_REQUEST[ 'msg' ].'</div>';
}
?>
<table class = 'table table-bordered table-hover table-striped table-responsive'>
<tr>

<th>SNo.</th>
<th>Name</th>
<th>Email</th>
<th>Product</th>
<th>Total</th>
<th>Contact</th>
<th>Address</th>
<th>Order Date</th>
<th>Order Status</th>

</tr>
<?php
$sno = 1;
include( 'config.php' );
$query = 'SELECT * FROM `user_order`  where order_status="Pending"';
$result = mysqli_query( $conn, $query );
while( $row = mysqli_fetch_array( $result ) )
{
    echo '<tr>';
    echo '<td>'.$sno.'</td>';
    echo '<td>'.$row[ 'user_name' ].'</td>';
    echo '<td>'.$row[ 'user_email' ].'</td>';
    echo '<td>'.$row[ 'order_desc' ].'</td>';
    echo '<td>'.$row[ 'price' ].'</td>';
    echo '<td>'.$row[ 'contact' ].'</td>';
    echo '<td>'.$row[ 'address' ].'</td>';
    echo '<td>'.$row[ 'order_date' ].'</td>';
    echo '<td><a href="accept.php?id='. $row['id'].'"><i class="fa fa-check text-success"></i></a>
    <a href="reject.php?id='.  $row['id'].'"> <i class="fa fa-close text-danger"></i></a>
    </td>';
    echo '</tr>';
    $sno++;
}
?>
</table>
</div>
</div>
</div>
<?php
include_once( 'footer.php' );
?>