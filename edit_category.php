<?php
    include_once("header.php");
    include("config.php");
    $q = "select * from category where id='$_REQUEST[id]'";
    $exec = mysqli_query($conn,$q);
    if($data = mysqli_fetch_array($exec)){
        $cat_name = $data['category_name'];
        $cat_img = $data['category_image'];
    }
?>
<div class="w3l-about-breadcrumb w3l-search-results py-5 text-center">
    <div class="container py-lg-4 py-md-3">
       
        <h3 class="title-big">Edit Category</h3>
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
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
                <div class="form-group">
                    <label for="">Category Name</label>
                    <input type="text" name="category_name" class="form-control" value="<?php echo $cat_name; ?>">
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="category_image" class="form-control">
                    <input type="hidden" name="hidden_category_image" class="form-control" value="<?php echo $cat_img; ?>">
                </div>
                <button type="submit" class="btn btn-primary my-2" name="submit">Update</button>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php
    include_once("footer.php");
?>

<?php
if(isset($_REQUEST["submit"]))
{
    $id = $_REQUEST["id"];
    $category_name = $_REQUEST["category_name"];

    // skip this code if there is no image start
    $hidden_category_image = $_REQUEST["hidden_category_image"];
    if($_FILES['category_image']['name']){
        $file_name = $_FILES['category_image']['name'];
        $file_temp = $_FILES['category_image']['tmp_name'];
        
        $new_name = rand().$file_name;
        move_uploaded_file($file_temp,"category/".$new_name);
    }
    else{
        // echo "no image";
        $new_name = $hidden_category_image;
    }
    // skip this code if there is no image  end

    include("config.php");
    $query = "UPDATE `category` SET `category_name`='$category_name',`category_image`='$new_name' where id='$id'";

    $result = mysqli_query($conn,$query);

    // print_r($result);
    if($result>0)
    {
        echo "<script>window.location.assign('manage_category.php?msg=Category Updated')</script>";
    }
    else{
        echo "<script>window.location.assign('manage_category.php?msg=Try Again')</script>";
        
    }

}
?>