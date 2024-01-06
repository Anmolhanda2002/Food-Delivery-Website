<?php
    include_once("header.php");
    include("config.php");
    $q = "select * from sub_category where id='$_REQUEST[id]'";
    $exec = mysqli_query($conn,$q);
    if($data = mysqli_fetch_array($exec))
    {
        $cat_name = $data['category_name'];
        $subcat_name=$data['sub_category_name'];
        $subcat_img = $data['image'];
        $descrp = $data['description'];
    }
?>
<div class="w3l-about-breadcrumb w3l-search-results py-5 text-center">
    <div class="container py-lg-4 py-md-3">
       
        <h3 class="title-big">Edit Sub-Category</h3>
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
            <form method="post" enctype="multipart/form-data" autocomplete="off">
                <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
                <div class="form-group">
                    <label for="">Category Name</label>                   
                    <input type="text" name="category_name" class="form-control" list="category"  value="<?php echo $cat_name; ?>">
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
                </div>
                <div class="form-group">
                    <label for="">Sub Category Name</label>
                    <input type="text" name="sub_category_name" class="form-control" value="<?php echo $subcat_name; ?>">
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control">
                    <input type="hidden" name="hidden_subcategory_image" class="form-control" value="<?php echo $subcat_img; ?>">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control" value="<?php echo $descrp; ?>">
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
    $sub_category_name = $_REQUEST["sub_category_name"];
    $description = $_REQUEST["description"];

    // skip this code if there is no image start
    $hidden_category_image = $_REQUEST["hidden_subcategory_image"];
    if($_FILES['image']['name']){
        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];
        
        $new_name = rand().$file_name;
        move_uploaded_file($file_temp,"subcategory/".$new_name);
    }
    else{
        // echo "no image";
        $new_name = $hidden_category_image;
    }
    // skip this code if there is no image  end
    // echo $new_name;
    include("config.php");
    echo $query = "UPDATE `sub_category` SET `category_name`='$category_name',`sub_category_name`='$sub_category_name',`image`='$new_name',`description`='$description' WHERE id='$id'";

    // die();

    $result = mysqli_query($conn,$query);

    // print_r($result);
    if($result>0)
    {
        echo "<script>window.location.assign('manage_subcategory.php?msg=Category Updated')</script>";
    }
    else{
        echo "<script>window.location.assign('manage_subcategory.php?msg=Try Again')</script>";
        
    }

}
?>