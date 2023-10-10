<?php
ob_start();
$page = "User_Profile";
include_once('header.php');
//error_reporting(0);
?>
<?php
include_once 'admin/includes/db_connect.php';
if ($_SESSION['isloggedin'] == 1) {
?>
	<?php
	$ethis = $_SESSION['emailloggedin'];
	$look_cart = "SELECT * FROM product WHERE winnder = '$ethis' AND winner = 1 AND is_Auction_Over = 1";
	$view_cart = mysqli_query($mysqli, $look_cart) or die("Some error has been occured! Please try again..." . mysqli_error($mysqli));
	$countcart = mysqli_num_rows($view_cart);

	//delete product from cart
	if (isset($_POST['delete'])) {
		$vr1 = $_POST['id'];
		$delete = "UPDATE product set winner=0 WHERE product_Id='$vr1'";
		$delete_product = mysqli_query($mysqli, $delete) or die("Cannot delete this Product." . mysqli_error($mysqli));
		$message = "Successfully deleted the product!";
		header("Refresh:0");
	}
	?>



	<div class="container-fluid p-3" style="background-color: #A8E0DA !important; color:#4E5269;">
		<h4 class="text-center mb-0 pb-5"><b>Cart</b></h4>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb" style="background-color: #fff;">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item"><a href="Profile.php">Your Account</a></li>
				<li class="breadcrumb-item active" aria-current="page">Cart</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-md-2">

			</div>
			<div class="col-md-8">
				<?php
				if (isset($message)) {
					echo '<div class="alert alert-success" role="alert">
			  <strong>Note: </strong>
				' . $message . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button></div>';
				}
				?>

			</div>
		</div>

		<div class="container">
			<?php if ($countcart == 0) {
				echo 'Nothing found!';
			} else {

				$cartCounter = 1;
				while ($got_cart = mysqli_fetch_assoc($view_cart)) { ?>
					<div class="row rounded py-3 p-2 mt-3" style="background-color: #fff;">
						<div class="col-md-1">
							<?php echo $cartCounter; ?>
						</div>
						<div class="col-md-2">
							<span class="text-primary">Name: <br /></span><?php echo $got_cart['name'] ?>
						</div>
						<div class="col-md-2">
							<img class="img-fluid" src="<?php echo $got_cart['image1'] ?>" />
						</div>
						<div class="col-md-4">
							<span class="text-primary">Seller: <br /></span><?php echo $got_cart['seller'] ?><br />
							<span class="text-primary">Price: </span><span class="text-success">&#8377; <?php echo number_format($got_cart['final_Price']) ?></span>
						</div>
						<div class="col-md-3 text-right">
							<form method="POST" action="payment.php">
								<button type="submit" id="pay" name="pay" value="Pay" class="mt-4 btn btn-primary"><i class="fas fa-credit-card mr-sm-2 fa-lg"></i>Pay</button>
								<input type="hidden" name="id" value="<?php echo $got_cart['product_Id']; ?>" />
							</form>
							<form method="POST">
								<!-- <button class="mt-4 btn btn-danger"><i class="fas fa-exclamation-triangle mr-sm-2 fa-lg"></i>Let go</button> -->
								<button name="delete" class="btn btn-outline-danger simple_link my-2">Remove</button>
								<input type="hidden" name="id" value="<?php echo $got_cart['product_Id']; ?>" />
							</form>
						</div>

					</div>
			<?php
					$cartCounter = $cartCounter + 1;
				}
			}
			?>
		</div>
	</div>
<?php
} else {
	header('Location: index.php');
}
?>
<?php
include_once('footer.php');
?>