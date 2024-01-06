<?php
    include_once('header.php');
?>
<div class="w3l-about-breadcrumb w3l-search-results py-5 text-center">
    <div class="container py-lg-4 py-md-3">
       
        <h3 class="title-big">Create Account</h3>
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
                            <label for="">User Name</label>
                            <input type="text" name="user_name" class="form-control" placeholder="Enter User Name">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="user_email" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="">Contact</label>
                            <input type="Number" name="contact" class="form-control" placeholder="Enter Contact">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary my-3">Register</button>
                    </form>
                    <div class="account">
					<p class="text-center">Already have an Account ?<br><a href="user_login.php">Login</a></p>
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
        $user_name = $_REQUEST["user_name"];
        $user_email = $_REQUEST["user_email"];
        $password = $_REQUEST["password"];
        $contact = $_REQUEST["contact"];

        include("config.php");
        $query = "INSERT INTO `create_account`(`user_name`, `user_email`, `password`, `contact`, `status`) VALUES ('$user_name','$user_email','$password','$contact','ACTIVE')";
        $result = mysqli_query($conn,$query);
        if($result>0)
        {
            $_SESSION["user"] ='user';
            echo "<script>window.location.assign('welcome_user.php?msg=Account Created')</script>";
        }
        else{
            echo mysqli_error($conn);
            echo "<script>window.location.assign('create_account.php?msg=Try again')</script>";
        }
    }
?>

