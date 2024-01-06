<?php
    include_once("header.php");
    include("config.php");
    $q = "select * from create_account where id='$_REQUEST[id]'";
    $exec = mysqli_query($conn,$q);
    if($data = mysqli_fetch_array($exec)){
        $usr_name = $data['user_name'];
        $usr_email= $data['user_email'];
        $pass = $data['password'];
        $cont = $data['contact'];

    }
?>
<div class="w3l-about-breadcrumb w3l-search-results py-5 text-center">
    <div class="container py-lg-4 py-md-3">
       
        <h3 class="title-big">Edit User</h3>
    </div>
</div>
<div class = 'container-fluid'>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <h4 class="text-dark text-center text-bold py-3">Edit User</h4>
            <?php
            if(isset($_REQUEST["msg"]))
            {
                echo "<div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
            }
            ?>
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
                <div class="form-group">
                    <label for="">User Name</label>
                    <input type="text" name="user_name" class="form-control" value="<?php echo $usr_name; ?>">
                </div>
                <div class="form-group">
                    <label for="">User Email</label>
                    <input type="email" name="user_email" class="form-control" value="<?php echo $usr_email; ?>">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $pass; ?>">
                </div>
                <div class="form-group">
                    <label for="">Contact</label>
                    <input type="text" name="contact" class="form-control" value="<?php echo $cont; ?>">
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
    $user_name = $_REQUEST["user_name"];
    $user_email = $_REQUEST["user_email"];
    $password = $_REQUEST["password"];
    $contact = $_REQUEST["contact"];

    include("config.php");
    $query = "UPDATE `create_account` SET `user_name`='$user_name',`user_email`='$user_email',`password`='$password',`contact`='$contact' WHERE id='$id'";

    $result = mysqli_query($conn,$query);

    // print_r($result);
    if($result>0)
    {
        echo "<script>window.location.assign('manage_user.php?msg=Category Updated')</script>";
    }
    else{
        echo "<script>window.location.assign('product_user.php?msg=Try Again')</script>";
        
    }

}
?>