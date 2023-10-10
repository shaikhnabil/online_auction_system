<?php
ob_start();
$page="User_Profile";
include_once('header.php');
//error_reporting(0);
?>
<?php
include_once 'admin/includes/db_connect.php';
if($_SESSION['isloggedin']==1){
	$email_id = $_SESSION["emailloggedin"];
	
		$look_for_method="SELECT * FROM add_payment_method WHERE email='$email_id'";
		$view_method = mysqli_query($mysqli,$look_for_method) or die("Some error has been occured! .".mysqli_error($mysqli));
		
		if(isset($_POST['delete'])){
			$v1 = $_POST['pm_id'];
			$delete="DELETE FROM add_payment_method WHERE pm_id='$v1'";
			$view_method = mysqli_query($mysqli,$delete) or die("Cannot delete address.".mysqli_error($mysqli));	
			
		}

?>

	<?php
	
	?>

<div class="container-fluid p-3" style="background-color: #A8E0DA !important; color:#4E5269;">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb" style="background-color: #fff !important;">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item"><a href="Profile.php">Your Account</a></li>
			<li class="breadcrumb-item active" aria-current="page">Payment Method</li>
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
	<div class="container-fluid">
	
	<div class="p-2 text-center">
		<a class="btn btn-outline-primary" href="add_Method.php" role="button"><i class="fas fa-plus-circle fa-2x"></i><br/>Add new <br/>Payment method</a>
	</div>
	
		<!-- <div class="row rounded border p-2" style="background-color: #fff !important;">
			<div class="col-md-4">
			f
			</div>
			<div class="col-md-4">
			f
			</div>
			<div class="col-md-4">
			f
			</div>
		</div> -->
		<!-- view payment method -->
		<h3 class="text-center my-2">Your All Payment Methods</h3>
	<div class="row">
		<?php 
			$counter = 1;
			while(@$got_method = mysqli_fetch_assoc($view_method)){
		?>
			<div class="col-md-4">
				<div class="p-3 rounded" style="background-color: #fff;">
					<?php 
					echo '<h6>Card Name : '.$got_method['cardname'].'</h6>';
					echo 'Address : '.$got_method['address'].',<br/>'.$got_method['city'].', '.$got_method['state'].'<br/>'.$got_method['zip'].'<br/>Card Number : '.$got_method['cardnumber'].'<br/>Expiry Month & Year : '.$got_method['expmonth'].' '.$got_method['expyear'];
					//echo '<br/>Phone number: '.$got_method['mobile'];
					?>
					<br/>
					
						<div class="row mt-2">
							<form method="POST">
								<div class="col-md-3">
									<button name="delete" class="btn btn-outline-danger simple_link">Delete</button>
									<input type="hidden" name="pm_id" value="<?php echo $got_method['pm_id'];?>"/>
								</div>
							</form>
						</div>
					</form>
				</div>
			</div>
		<?php	
			$counter++;
			}
			//mysqli_free_result($got_addresses);
		?>
	</div>
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