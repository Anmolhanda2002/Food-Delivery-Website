<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Blog store - Blog Category Bootstrap Responsive Website Template | About : W3layouts</title>

  <link href="//fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Template CSS -->
  
  <link rel="stylesheet" href="assets/css/style-starter.css">

</head>

<body>
<!--header-->
<header id="site-header" class="fixed-top">
  <div class="container">
      <nav class="navbar navbar-expand-lg stroke p-0">
          <h1> <a class="navbar-brand" href="index.php">
                  <span class="fa fa-bell-o"></span> Blog Store
              </a></h1>
          <!-- if logo is image enable this   
  <a class="navbar-brand" href="#index.php">
      <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
  </a> -->
            <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
              data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
              <span class="navbar-toggler-icon fa icon-close fa-times"></span>
            </button>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
              <ul class="navbar-nav ml-lg-5 mr-lg-auto">
                <?php
                if(isset($_SESSION['user'])){
                if($_SESSION['user']=='Admin'){
                ?>
                  <li class="nav-item @@home__active">
                      <a class="nav-link" href="dashboard.php">Home <span class="sr-only">(current)</span></a>
                  </li>
                    <div class="dropdown mx-3">
                        <button class="btn text-dark dropdown-toggle @@home__active nav-link" type="button" data-toggle="dropdown" aria-expanded="false">
                            Category
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="add_category.php">Add</a>
                            <a class="dropdown-item" href="manage_category.php">Manage</a>
                        </div>
                    </div>
                    <div class="dropdown mx-3">
                        <button class="btn text-dark dropdown-toggle @@home__active nav-link" type="button" data-toggle="dropdown" aria-expanded="false">
                            Sub-Category
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="add_subcategory.php">Add</a>
                            <a class="dropdown-item" href="manage_subcategory.php">Manage</a>
                        </div>
                    </div>
                    <div class="dropdown mx-3">
                        <button class="btn text-dark dropdown-toggle @@home__active nav-link" type="button" data-toggle="dropdown" aria-expanded="false">
                            Product
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="add_product.php">Add</a>
                            <a class="dropdown-item" href="manage_product.php">Manage</a>
                        </div>
                    </div>
                    <div class="dropdown mx-3">
                        <button class="btn text-dark dropdown-toggle @@home__active nav-link" type="button" data-toggle="dropdown" aria-expanded="false">
                            Orders
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="view_pending_orders.php">New</a>
                            <a class="dropdown-item" href="view_all_order.php">Manage</a>
                        </div>
                    </div>
                    <li class="nav-item @@contact__active">
                        <a class="nav-link" href="view_contact.php">Contact</a>
                    </li>
                    <li class="nav-item @@contact__active">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <?php
                }else{
                    ?>

                <li class="nav-item @@contact__active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item @@contact__active">
                    <a class="nav-link" href="view_category.php">Category</a>
                </li>
                <li class="nav-item @@contact__active">
                    <a class="nav-link" href="view_product.php">Products</a>
                </li>
                <li class="nav-item @@contact__active">
                    <a class="nav-link" href="user_view_orders.php">My Orders</a>
                </li>
                <li class="nav-item @@contact__active">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item @@contact__active">
                    <a class="nav-link" href="user_logout.php">Logout</a>
                </li>
                        <?php
                }}else{
                ?>
                <li class="nav-item @@contact__active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item @@contact__active">
                    <a class="nav-link" href="view_category.php">Category</a>
                </li>
                <li class="nav-item @@contact__active">
                    <a class="nav-link" href="view_product.php">Products</a>
                </li>
                <li class="nav-item @@contact__active">
                    <a class="nav-link" href="user_login.php">Login</a>
                </li>
                <li class="nav-item @@contact__active">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <?php
                }
                ?>
              </ul>

              <!--/search-right-->
              <div class="navbar-nav search-right nav-item dropdown">
              <?php
              if(isset($_SESSION['user'])){
                if($_SESSION['user']=='Admin'){
                  ?>
                    <a></a>
                    <?php
                }
                else{
                  ?>
                  <a class="text-dark login_btn align-self-center mx-3" href="checkout.php">
                    <div class="shopping-item">
                        Cart - <span class="cart-amunt">
                            <?php $t = 0;
                            if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0) {
                                foreach($_SESSION['cart'] as $id=>$quantity){
                                        $t++;
                                }
                                count($_SESSION['cart']);
                            }
                                echo "<i>".$t."</i>";
                            ?>
                        </span> <i class="fa fa-shopping-cart"></i> <span class="product-count"> <?php echo $t; ?>
                        <?php if(isset($_SESSION['email'])){ ?>
                        <a class="text-dark login_btn align-self-center mx-3" href="#">
                              <!--<span><i><?php echo $_SESSION['name'];?></i></span>-->
                        </a>
                        <?php }?>
                            </span>
                    </div>  
                  </a>
                  <?php
                  }}else{
                    ?>
                  <a class="text-dark login_btn align-self-center mx-3" href="checkout.php">
                    <div class="shopping-item">
                        Cart - <span class="cart-amunt">
                            <?php $t = 0;
                            if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0) {
                                foreach($_SESSION['cart'] as $id=>$quantity){
                                        $t++;
                                }
                                count($_SESSION['cart']);
                            }
                                echo "<i>".$t."</i>";
                            ?>
                        </span> <i class="fa fa-shopping-cart"></i> <span class="product-count"> <?php echo $t; ?>
                        <?php if(isset($_SESSION['email'])){ ?>
                        <a class="text-dark login_btn align-self-center mx-3" href="#">
                        
                            <!--<span><i><?php echo $_SESSION['name'];?></i></span>-->
                            
                        </a>
                        <?php }?>
                            </span>
                    </div>  
                  </a>
                  <?php
                  }
                  ?>
              </div>
              <!--//search-right-->
          </div>
          <!-- toggle switch for light and dark theme -->
          <div class="mobile-position">
              <nav class="navigation">
                  <div class="theme-switch-wrapper">
                      <label class="theme-switch" for="checkbox">
                          <input type="checkbox" id="checkbox">
                          <div class="mode-container">
                              <i class="gg-sun"></i>
                              <i class="gg-moon"></i>
                          </div>
                      </label>
                  </div>
              </nav>
          </div>
          <!-- //toggle switch for light and dark theme -->
      </nav>
  </div>
</header>
<!--/header-->
