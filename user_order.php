<?php
    include_once('header.php');
    if(isset($_SESSION['user_email']))
    {
        include('config.php');
        $user_email = $_SESSION['user_email'];
        $user = mysqli_query($conn,"SELECT * FROM `product` where id='$_REQUEST[product]'");
        if($userdata = mysqli_fetch_array($user))
        {
            $category_name = $userdata['category'];
            $sub_category_name = $userdata['sub_category_name'];
            $price = $userdata['price'];
            $product_name = $userdata['product_name'];
        }
    }
    else{
        echo "<script>window.location.assign('user_login.php')</script>";
        }
?>
<div class="w3l-about-breadcrumb w3l-search-results py-5 text-center">
    <div class="container py-lg-4 py-md-3">
       
        <h3 class="title-big">User Order</h3>
    </div>
</div>

<div class = 'container-fluid'>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <h4 class="text-dark text-center text-bold py-3">Enter Billing Details</h4>
            <?php
            if(isset($_REQUEST["msg"]))
            {
                echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";  
            }
            ?>
    <form method="post"  enctype="multipart/form-data">
            <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="user_name" class="form-control" required>
            </div>
            <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="user_email" class="form-control" value="<?php echo $user_email?>" readonly>
            </div>
            <div class="form-group">
                    <label for="">Product</label>
                    <input type="text" name="product" class="form-control" value="<?php echo $product_name?>" readonly>
            </div>
            <div class="form-group">
                    <label for="">Category</label>
                    <input type="text" name="category" class="form-control" value="<?php echo $category_name?>" readonly >
            </div>
            <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" name="price" class="form-control" value="<?php echo $price?>" readonly>
            </div>
            <div class="form-group">
                    <label for="">Contact</label>
                    <input type="text" name="contact" class="form-control" required>
            </div>
            <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control" required>
            </div>
            <div class="form-group">
                    <label for="">Pincode</label>
                    <input type="text" name="pincode" class="form-control" required>
            </div>
            <div class="form-group">
                    <label for="">City</label>
                    <input type="text" name="city" class="form-control" required>
            </div>
           <!-- <div class="form-group">
                    <label for="">State</label>
                    <input type="file" name="state" class="form-control" required>
            </div>
            <div class="form-group">
                    <label for="">Country</label>
                    <input type="text" name="country" class="form-control" required>
            </div> -->
            <div class="form=group">
                    <lable for="">Message</lable>
                    <textarea type="text-box" name="message" class="form-control" required></textarea>
        </div>
            <button type="submit" class="btn btn-primary" name="submit">Place Order</button>
    </form>
        </div>
        <div class="col-md-2"></div>
        </div>
</div>
<?php
if(isset($_REQUEST["submit"]))
{
    $user_name = $_REQUEST["user_name"];
    $user_email = $_REQUEST["user_email"];
    $product = $_REQUEST["product"];
    $category = $_REQUEST["category"];
    $price = $_REQUEST["price"];
    $contact = $_REQUEST["contact"];
    $address = $_REQUEST["address"];
    $pincode = $_REQUEST["pincode"];
    $city = $_REQUEST["city"];
    //$state = $_REQUEST["state"];
    //$country = $_REQUEST["country"];
    $message = $_REQUEST["message"];

    include("config.php");
        $query = "INSERT INTO `user_order`(`user_name`, `user_email`, `product`, `category`, `price`, `contact`, `address`, `pincode`, `city`, `state`, `country`,`message`, `order_status`) VALUES('$user_name','$user_email','$product','$category','$price','$contact','$address','$pincode','$city','Punjab','India','$message','PENDING')";
        $result = mysqli_query($conn,$query);
        if($result>0)
        {
            echo "<script>window.location.assign('user_view_orders.php?msg=Order Placed')</script>";
        }
        
        else{
            echo mysqli_error($conn);
            echo "<script>window.location.assign('user_view_orders.php?msg=Try again')</script>";
        }
}
?>
<?php
    include_once('footer.php');
?>