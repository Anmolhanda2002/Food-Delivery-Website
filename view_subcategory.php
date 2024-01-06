<?php
    include_once('header.php');
?>
<div class="w3l-about-breadcrumb w3l-search-results py-5 text-center">
    <div class="container py-lg-4 py-md-3">
       
        <h3 class="title-big">View Sub-Category</h3>
    </div>
</div>
<div class="container">
    <div class="row service-v1 margin-bottom-40">
        <?php 
            include( 'config.php' );
            $query = "SELECT * FROM `sub_category` where category_name='$_REQUEST[id]'";
            $result = mysqli_query( $conn, $query );
            while( $row = mysqli_fetch_array( $result ) ) 
            {
        ?>
        <div class="col-md-4 my-5">
            <div class="card small">
                <div class="card-image">
                    <img class="img-responsive img-fluid img-thumbnail" src="subcategory/<?php echo $row['image'] ?>" alt="" style="height:250px;width:100%">  
                    <a href="./view_product.php?id=<?php echo $row['sub_category_name']?>">
                        <h3 class="card-title text-center" style="color:orange">
                            <span><?php echo $row['sub_category_name'] ?></span>
                        </h3>
                    </a>
                </div>
                <div class="card-content" style="height:100px">
                    <p>
                        <?php echo $row['description'] ?>
                    </p>
                   
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
    include_once("footer.php");
?>