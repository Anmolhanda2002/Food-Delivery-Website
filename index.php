<?php
	include_once("header.php");
?>
<div class="container-fluid">
    <h1 class="text-center" style="font-size:50px;">Welcome to Our Shop.</h1>
    <div class="w3l-about-breadcrumb w3l-search-results py-5 text-center">
    <div class="container py-lg-4 py-md-3">
       
        <h3 class="title-big">Welcome to Our Shop.</h3>
    </div>
</div>
    <?php
     include( 'config.php' );
     $query = "SELECT * FROM `product` limit 9";
     $result = mysqli_query( $conn, $query );
    ?>
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
    <div class="row my-5">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <a href="view_product.php" class="btn btn-primary w-100">View More</a>
        </div>
    </div>
</div>
</div>
<?php
	include_once("footer.php");
?>