<?php
    include_once("header.php");
?>
<div class="w3l-about-breadcrumb w3l-search-results py-5 text-center">
    <div class="container py-lg-4 py-md-3">
       
        <h3 class="title-big">Add Sub-Category</h3>
    </div>
</div>
<div class = 'container-fluid'>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
            if(isset($_REQUEST["msg"]))
            {
                echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";  
            }
            ?>
        <form method="post"  enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                    <label for="">Category Name</label><br>
                    <input type="text" name="category_name" class="form-control" list="category" require>
                    <datalist id="category">
                    <option value="">Select Category</option>
                        <?php
                            include("config.php");
                            $q = mysqli_query($conn,"select * from category");
                            while($r=mysqli_fetch_array($q))
                            {
                                echo "<option>".$r['category_name']."</option>";
                            }
                        ?>
                    </datalist>
                    <!-- <select name="category_name" class="form-control" style="width:100% !important; display:block">

                    </select><br> -->

            </div>
            <div class="form-group">
                    <label for="">Sub Category Name</label>
                    <input type="text" name="sub_category_name" class="form-control" required>
            </div>
            <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control" required>
            </div>
            <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control" required>
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
    $sub_category_name = $_REQUEST["sub_category_name"];
    $description = $_REQUEST["description"];

    $file_name = $_FILES['image']['name'];
    $file_temp = $_FILES['image']['tmp_name'];

    $new_name = rand().$file_name;
    move_uploaded_file($file_temp,"subcategory/".$new_name);
    
    
    include("config.php");
        $query = "INSERT INTO `sub_category`( `category_name`,`sub_category_name`, `image`,`description`, `status`) VALUES ('$category_name','$sub_category_name', '$new_name','$description', 'ACTIVE')";
        $result = mysqli_query($conn,$query);
        if($result>0)
        {
            echo "<script>window.location.assign('add_subcategory.php?msg=Sub Category Added')</script>";
        }
        
        else{
            echo mysqli_error($conn);
            echo "<script>window.location.assign('add_subcategory.php?msg=Try again')</script>";
        }
}

?>