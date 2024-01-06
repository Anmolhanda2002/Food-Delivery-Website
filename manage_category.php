<?php
include_once( 'header.php' );
?>
<div class="w3l-about-breadcrumb w3l-search-results py-5 text-center">
    <div class="container py-lg-4 py-md-3">
       
        <h3 class="title-big">Manage Category</h3>
    </div>
</div>
<div class = 'container-fluid'>
<div class = 'row'>
<div class = 'col-md-2'></div>
<div class = 'col-md-8'>
<?php
if ( isset( $_REQUEST[ 'msg' ] ) )
 {
    echo "<div class='alert alert-info'>".$_REQUEST[ 'msg' ].'</div>';
}
?><table class = 'table table-bordered table-hover table-striped'>
<tr>
<th>SNo</th>
<th>Category Name</th>
<th>Thumbnail</th>
<th>Edit</th>
<th>Delete</th>
</tr>
<?php
$sno = 1;
include( 'config.php' );
$query = 'SELECT * FROM `category`';
$result = mysqli_query( $conn, $query );
while( $row = mysqli_fetch_array( $result ) ) 
{
    echo '<tr>';
    echo '<td>'.$sno.'</td>';
    echo '<td>'.$row[ 'category_name' ].'</td>';
    echo '<td><img src="category/'.$row[ 'category_image' ].'" width="150px"></td>';
    echo '<td><center><a href="edit_category.php?id='.$row['id'].'"><i class="fa fa-edit text-success "></i></a></center></td>';
    echo '<td><center><a href="delete_category.php?id='.$row['id'].'"><i class="fa fa-trash text-danger "></i></a></center></td>';
    echo '</tr>';
    $sno++;
}
?>
</table>
</div>
<div class = 'col-md-2'></div>
</div>
</div>

<?php
include_once( 'footer.php' );
?>