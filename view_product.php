<?php
    include_once('header.php');
    if(isset($_REQUEST['id'])){
        include( 'config.php' );
        $query = "SELECT * FROM `product` where sub_category_name='$_REQUEST[id]'";
        $result = mysqli_query( $conn, $query );
    }
    else{
        include( 'config.php' );
        $query = "SELECT * FROM `product`";
        $result = mysqli_query( $conn, $query );
    }
 
?>
<div class="w3l-about-breadcrumb w3l-search-results py-5 text-center">
    <div class="container py-lg-4 py-md-3">
       
        <h3 class="title-big">View Products</h3>
    </div>
</div>
<div class="container">
    <div class="row service-v1 margin-bottom-40">
        <?php 
            while( $row = mysqli_fetch_array( $result ) ) 
            {
        ?>
        <div class="col-md-4 my-5">
            <div class="card small">
                <div class="card-image">
                        <img class="img-responsive img-fluid img-thumbnail" src="product/<?php echo $row['image']?>" alt="" style="height:350px; width:100%">
                        <div class="row">
                            <div class="col-md-10" style="max-height:100px"> 
                                <span class="card-title"><?php echo $row['product_name']?> <br> RS.<?php echo $row['price']?></span>
                            </div>
                        </div> 
                </div>
                <div class="card-content" >
                    <div class="row">
                        <div class="col" >
                            <?php echo $row['description']?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="add_to_cart.php?id=<?php echo $row['id'];?>" class="btn btn-primary form-control"> Order </a>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
        <?php
            }
        ?>
    </div>
</div>
<!-- End Service Blcoks -->
<?php
    include_once('footer.php');
?>