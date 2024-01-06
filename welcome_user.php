<?php
    include_once("header.php");
    //check session
    if(isset($_SESSION["user_email"]))
    {
        //storage
        $user_email = $_SESSION['user_email'];
    }
    else{
        echo "<script>window.location.assign('login.php?msg=please login first to access this page')</script>";
    }

?>
<div class="w3l-about-breadcrumb w3l-search-results py-5 text-center">
    <div class="container py-lg-4 py-md-3">
       
        <h3 class="title-big">Index</h3>
    </div>
</div>
<h1 style="text-align:center"> <?php echo $user_email; //usage ?> </h1>
<?php
    include_once("footer.php");
?>