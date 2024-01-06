<?php
    include_once("header.php");
?>
<div class="w3l-about-breadcrumb w3l-search-results py-5 text-center">
    <div class="container py-lg-4 py-md-3">
       
        <h3 class="title-big">Add Category</h3>
    </div>
</div>
<div class = 'container-fluid'>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <!-- <h4 class="text-dark text-center text-bold py-3">Add Category</h4> -->
            <?php
            if(isset($_REQUEST["msg"]))
            {
                echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";  
            }
            ?>
            <form method="post"  enctype="multipart/form-data">
                <div class="form-group">
                        <label for="">Category Name</label>
                        <input type="text" name="category_name" class="form-control" required>
                </div>
                <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="category_image" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary my-2" name="submit">Submit</button>
            </form>
        </div>
        <div class="col-md-2"></div>
        </div>
</div>    

<?php
include_once("footer.php")
?>

<?php
if(isset($_REQUEST["submit"]))
{
    $category_name = $_REQUEST["category_name"];

    $file_name = $_FILES['category_image']['name'];
    $file_temp = $_FILES['category_image']['tmp_name'];

    $new_name = rand().$file_name;
    move_uploaded_file($file_temp,"category/".$new_name);
    
    include("config.php");
        $query = "INSERT INTO `category`( `category_name`, `category_image`, `status`) VALUES ('$category_name', '$new_name', 'ACTIVE')";
        $result = mysqli_query($conn,$query);
        if($result>0)
        {
            echo "<script>window.location.assign('add_category.php?msg=Category Added')</script>";
        }
        
        else{
            echo mysqli_error($conn);
            echo "<script>window.location.assign('add_category.php?msg=Try again')</script>";
        }
}

?>