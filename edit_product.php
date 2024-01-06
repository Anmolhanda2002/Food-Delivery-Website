<?php
    include_once("header.php");
    include("config.php");
    $q = "select * from product where id='$_REQUEST[id]'";
    $exec = mysqli_query($conn,$q);
    if($data = mysqli_fetch_array($exec))
    {
        $cat_name = $data['category'];
        $subcat_name=$data['sub_category_name'];
        $prod_name = $data['product_name'];
        $amt = $data['price'];
        $descrp = $data['description'];
        $prod_img = $data['image'];

    }
?>
<div class="w3l-about-breadcrumb w3l-search-results py-5 text-center">
    <div class="container py-lg-4 py-md-3">
       
        <h3 class="title-big">Edit Product</h3>
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
                    <input type="text" name="category" class="form-control" list="category" value="<?php echo $cat_name; ?>">
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
                    <input type="text" name="sub_category_name" class="form-control" list="sub_category" value="<?php echo $subcat_name; ?>">
                    <datalist id="sub_category">
                    <option value="">Select Sub Category</option>
                        <?php
                            include("config.php");
                            $q = mysqli_query($conn,"select * from sub_category");
                            while($r=mysqli_fetch_array($q))
                            {
                                echo "<option>".$r['sub_category_name']."</option>";
                            }
                        ?>
                    </datalist>
                </div>
                <div class="form-group">
                    <label for="">Product Name</label>
                    <input type="text" name="product_name" class="form-control" value="<?php echo $prod_name; ?>">
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" name="price" class="form-control" value="<?php echo $amt; ?>">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control" value="<?php echo $descrp; ?>">
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control">
                    <input type="hidden" name="hidden_product_image" class="form-control" value="<?php echo $prod_img; ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Update</button>
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
    $category = $_REQUEST["category"];
    $sub_category_name = $_REQUEST["sub_category_name"];
    $product_name = $_REQUEST["product_name"];
    $price = $_REQUEST["price"];
    $description = $_REQUEST["description"];

    // skip this code if there is no image start
    $hidden_product_image = $_REQUEST["hidden_product_image"];
    if($_FILES['image']['name']){
        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];
        
        $new_name = rand().$file_name;
        move_uploaded_file($file_temp,"product/".$new_name);
    }
    else{
        // echo "no image";
        $new_name = $hidden_product_image;
    }
    // skip this code if there is no image  end

    include("config.php");
    $query = "UPDATE `product` SET `category`='$category',`sub_category_name`='$sub_category_name',`product_name`='$product_name',`price`='$price',`description`='$description',`image`='$new_name' where id='$id'";

    $result = mysqli_query($conn,$query);

    // print_r($result);
    if($result>0)
    {
        echo "<script>window.location.assign('manage_product.php?msg=Category Updated')</script>";
    }
    else{
        echo "<script>window.location.assign('product_category.php?msg=Try Again')</script>";
        
    }

}
?>