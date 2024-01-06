<?php
    include_once('header.php');
?>
<div class="w3l-about-breadcrumb w3l-search-results py-5 text-center">
    <div class="container py-lg-4 py-md-3">
       
        <h3 class="title-big">View Category</h3>
    </div>
</div>
<div class="container">
    <div class="row service-v1 margin-bottom-40">
        <?php 
            include( 'config.php' );
            $query = 'SELECT * FROM `category`';
            $result = mysqli_query( $conn, $query );
            while( $row = mysqli_fetch_array( $result ) ) 
            {
        ?>
        <div class="col-md-4 my-5">
            <div class="card small">
                <div class="card-image">
                        <img class="img-responsive" src="category/<?php echo $row['category_image'] ?>" alt="" style="height:250px; width:100%">  
                        <a href="view_subcategory.php?id=<?php echo $row['category_name'] ?>"><h1 class="card-title text-center"><?php echo $row['category_name'] ?></h1></a>
                </div>
                <!-- <div class="card-content">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt
                    </p>
                </div> -->
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