<?php
    include_once('header.php');
?>
<div class="w3l-about-breadcrumb w3l-search-results py-5 text-center">
    <div class="container py-lg-4 py-md-3">
       
        <h3 class="title-big">User Login</h3>
    </div>
</div>
    <div class="container-xxl">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 mx-auto wow fadeInUp" data-wow-delay="0.1s">
                    <?php
                        if(isset($_REQUEST["msg"]))
                        {
                            echo "<div class='alert alert-info mt-3'>".$_REQUEST["msg"]."</div>";
                    
                        }
                    ?>
                    <form method="post">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="user_email" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary my-3">Login</button>
                    </form>
                    <div class="account">
					<p class="text-center">Don't have an Account ?<br><a href="create_account.php">Create Your Account</a></p>
				</div>
                </div>               
            </div>
        </div>
    </div>
<?php
    include_once('footer.php')
?>
<?php
if(isset($_REQUEST["submit"]))
{
    $user_email = $_REQUEST["user_email"];
    $password = $_REQUEST["password"];

    include("config.php");
    $query = "SELECT * FROM `create_account` WHERE user_email='$user_email' and password='$password'";

    $result = mysqli_query($conn,$query);

    
    if($row = mysqli_fetch_array($result))
    {
        //created a session 
        $_SESSION["user"] ='user';
        $_SESSION["user_email"] = $user_email;
        echo "<script>window.location.assign('welcome_user.php')</script>";
    }
    else{
        echo "<script>window.location.assign('user_login.php?msg=Invalid email or password')</script>";
    }

}
?>