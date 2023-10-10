<?php
ob_start();
$page="User_Profile";
include_once('header.php');
//error_reporting(0);
?>
<script src="js/jquery-3.2.1.slim.min.js"></script>
<script src="card/j/jquery.creditCardValidator.js"></script>
<?php
include_once 'admin/includes/db_connect.php';
if($_SESSION['isloggedin']==1){
?>
<?php
	if(isset($_POST['addpaymentmethod'])){
		$v1 = $_POST['fullname'];
		$v2 = $_POST['email'];
		$v3 = $_POST['address'];
		$v4 = $_POST['city'];
		$v5 = $_POST['state'];
		$v6 = $_POST['zip'];
		$v7 = $_POST['cardname'];
		$v8 = $_POST['cardnumber'];
		$v9 = $_POST['expmonth'];
		$v10 = $_POST['expyear'];
		$v11 = $_POST['cvv'];
		//$v12 = $_SESSION["emailloggedin"];
		
		
		$add_address="INSERT INTO add_payment_method(fullname, email, address, city, state, zip, cardname, cardnumber, expmonth, expyear, cvv) VALUES('$v1', '$v2', '$v3', '$v4', '$v5', '$v6', '$v7', '$v8', '$v9', '$v10', '$v11')";
		
		$result = mysqli_query($mysqli,$add_address) or die("Error adding your address. Pleas try again.".mysqli_error($mysqli));
		$message_add_address = "Payment method has successfully been added";
		$message = 'The payment method named on '.$v1.' has successfully been added!';
	}
?>

<div class="container-fluid p-3 mx-0" style="background-color: #A8E0DA !important; color:#4E5269;">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb" style="background-color: #fff !important;">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item"><a href="Profile.php">Your Account</a></li>
			<li class="breadcrumb-item"><a href="Payment_method.php">Payment Method</a></li>
			<li class="breadcrumb-item active" aria-current="page">New Payment Mode</li>
		</ol>
	</nav>
	<h4 class="text-center mb-5"><b>Add Payment Method</b></h4>
	<div class="row">
		<div class="col-md-2">
			
		</div>
		<div class="col-md-8">
		<?php
			if(isset($message)){ echo '<div class="alert alert-success" role="alert">
			  <strong>Note: </strong>
				' .$message. '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button></div>'; }
			?>
			
		</div>
	</div>
	<div class="container">
		<?php
		//add payment method form
		include('addmethod_form.php')
		?>
	</div>
</div>
<?php
} 
else{
	header('Location: index.php');
}
?>
<?php

include_once('footer.php');
?>