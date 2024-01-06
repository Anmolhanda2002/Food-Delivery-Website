<?php
include"header.php";
if(isset($_SESSION["user_email"]))
{
	$email = $_SESSION["user_email"];
}
else{
	echo "<script>window.location.assign('user_login.php?msg=Session Out')</script>";
}
?>
<style>
	.contact-left input[type="date"] {
    width: 50%;
    margin: 0px;
    color: #5e345e;
    background: none;
    padding: 15px 10px;
    outline: none;
    border: 1px solid #5e345e;
    font-family: 'Lato', sans-serif;
}
</style>
<link href="date/jquery-ui.css" rel="stylesheet">
<script src="date/jquery-ui.js"></script>
<div class="contact"><div class="agileinfo_bottom_section">
		<div class="container">
		
			<div class="contact-top heading">
		
			</div>
			<div class="contact-bottom">
			<?php
				
				$e = $_SESSION['email'];
include"config.php";
$a = ram();
$oid = checkorder($a);
function ram(){
	 $a=1;
	for ($i = 0; $i<6; $i++) 
	{
		$a .= mt_rand(0,9);
	}
//echo $a;
	return $a;
}
function checkorder($a){
	include"config.php";
	$q1="select * from `user_order` where id=$a";
	$k1=mysqli_query($conn,$q1);
	if($r = mysqli_fetch_array($k1)){
		$b = $ram();
		checkorder($b);
	}
	else{
		return $a;
	}
}				$pid = $_REQUEST['pid'];
				$contact = $_REQUEST['contact'];
				$amount = $_REQUEST['amount'];
				$quantity=$_REQUEST['quantity'];
				$email = $_REQUEST['email'];
				$name = $_REQUEST['name'];
				$address=$_REQUEST['address'];
				$order_desc=$_REQUEST['order_desc'];
				$date=date('d-m-Y');
		
include("config.php");				
				$services=0;$total=0;
				if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0) {
				foreach($_SESSION['cart'] as $id=>$quantity){
					$services = $services. ",".$id;
					
				$q="select * from product where `id`='$id'";
				$result=mysqli_query($conn,$q);
				if($row=mysqli_fetch_array($result))
				{
					$total += ($row['price']*$quantity);
				}
				
				}
				
				
						include "config.php";
						$qry="INSERT INTO `user_order`(`user_name`, `user_email`,`price`,`order_desc`, `contact`, `address`, `order_date`) VALUES ('$name','$email','$amount','$order_desc','$contact','$address','$date')";
							//$qry = "insert into `addtocart` values('','$id','$email','$total','CASH ON DELIVERY','Pending')";
						$k = mysqli_query($conn,$qry);	
						if($k>0){

							$qry1 = "select * from `user_order` where user_email='$email'";
							unset($_SESSION['cart']);
							$result = mysqli_query($conn,$qry1);

							while($row = mysqli_fetch_array($result))
							{
								$o = $row[0];
								$pid = $row['order_desc'];
							}
						}
					
					else{
						//header("location:index.php");
						echo mysqli_error($obj);
					}

				?>
				
				<div class="container">
					<div class="row">
						<div class="col-md-12 mt-5">
							<div id="a">
							  <h3>  Thanks For Ordering The Product </h3><br/><br/>

							</h1>
							<h3>Your Order is Under Processing...
								<?php echo "Order Id is <a href='orders.php?x=$o'>$o </a> It is Accepted Wait Till Approved"; ?>
							<br/><br/>	<?php echo "Be Ready the Payment of Rs. $total"; ?>
								
							</h3><br/>
							</div>
							</div>
					</div>
				</div>
							<?php
				}
				else{
					?>
				<div class="container">
					<div class="row">
						<div class="col-md-12 mt-5">
							<div id="a">
								<h3>YOUR ORDER IS UNDER PROCESSING...</h3>
							</div>
						</div>
					</div>
					</div>
					</div>
					<?php
				}
					?>
            
					
			</div>
		</div>
	</div>
	</div>
	</div>
	<?php
		
				include_once"footer.php";
				?>
				
	