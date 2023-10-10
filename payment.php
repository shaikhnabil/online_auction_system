<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial;
            font-size: 17px;
            padding: 8px;
        }

        * {
            box-sizing: border-box;
        }

        .row-p {
            display: -ms-flexbox;
            /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap;
            /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        .col-25 {
            -ms-flex: 25%;
            /* IE10 */
            flex: 25%;
        }

        .col-50 {
            -ms-flex: 50%;
            /* IE10 */
            flex: 50%;
        }

        .col-75 {
            -ms-flex: 75%;
            /* IE10 */
            flex: 75%;
        }

        .col-25,
        .col-50,
        .col-75 {
            padding: 15px 16px;
        }

        .container-p {
            background-color: #ffffff;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }

        input[type=text],
        input[type=email] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        label {
            margin-bottom: 10px;
            display: block;
        }

        .icon-container-p {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }

        .btn-p {
            background-color: #04AA6D;
            color: white;
            padding: 12px;
            margin: 10px;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        .btn-p:hover {
            background-color: #45a049;
        }

        a {
            color: #2196F3;
        }

        hr {
            border: 1px solid lightgrey;
        }

        span.price {
            float: right;
            color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
            .row-p {
                flex-direction: column-reverse;
            }

            .col-25 {
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <!-- save data in payment table -->
    <?php
    ob_start();
    $page = "User_Profile";
    include_once('header.php');
    error_reporting(0);
    ?>
    <?php
    include_once 'admin/includes/db_connect.php';
    if ($_SESSION['isloggedin'] == 1) {
        if (isset($_POST['pay'])) {
            // check payment is already done
            $v1 = $_POST['id'];
            $check = "SELECT * FROM payment where product_id = '$v1'";
            $check_result = mysqli_query($mysqli, $check) or die("Some error has been occured! ." . mysqli_error($mysqli));
            $rowcount = mysqli_num_rows($check_result);
            if ($rowcount > 0) {
                echo "<script type='text/javascript'>alert('Payment already done!');</script>";
                $message = 'Payment already done! <a href="Cart.php">Back</a>';
                header("Refresh:0; url=Cart.php");
            }
    ?>

            <!-- select data  -->
        <?php
            $pid = $_POST['id'];
            // slect product data
            $ethis = $_SESSION['emailloggedin'];
            $look_cart = "SELECT * FROM product WHERE winnder = '$ethis' AND winner = 1 AND is_Auction_Over = 1 and product_ID = '$pid'";
            $view_cart = mysqli_query($mysqli, $look_cart) or die("Some error has been occured! Please try again..." . mysqli_error($mysqli));

            // select payment data
            $look_for_method = "SELECT * FROM add_payment_method WHERE email='$ethis'";
            $view_method = mysqli_query($mysqli, $look_for_method) or die("Some error has been occured! ." . mysqli_error($mysqli));
            $rowcount = mysqli_num_rows($view_method);
            if ($rowcount == 0) {
                echo "<script type='text/javascript'>alert('Add payment method!');</script>";
                $message = 'Add payment method! <a href="add_Method.php">Click here</a>';
            }
        }
        ?>

        <!-- save payment data -->
        <?php
        if (isset($_POST['paybtn'])) {
            $v1 = $_POST['pid'];
            $v2 = $_POST['productname'];
            $v3 = $_POST['email'];
            $v4 = $_SESSION["emailloggedin"];
            $v5 = $_POST['cardnumber'];
            $v6 = $_POST['price'];
            $ecvv = $_POST['cvv'];
            $mcvv = $_POST['mcvv'];
            // check payment is already done
            $check = "SELECT * FROM payment where product_id = '$v1'";
            $check_result = mysqli_query($mysqli, $check) or die("Some error has been occured! ." . mysqli_error($mysqli));
            $rowcount = mysqli_num_rows($check_result);
            if ($rowcount > 0) {
                $message = 'Payment already done! <a href="Cart.php">Back</a>';
            } else {
                if ($ecvv == $mcvv) {
                    $add_payment = "INSERT INTO payment (product_id, product_name, seller, buyer, buyer_card_number, amount) VALUES('$v1', '$v2', '$v3', '$v4', '$v5', '$v6')";
                    $result = mysqli_query($mysqli, $add_payment) or die("Error adding your payment. Pleas try again." . mysqli_error($mysqli));
                    $message_add_payment = "Payment has successfully completed";
                    $message = 'The Payment of product name ' . $v2 . ' has successfully completed. <a href="Cart.php">Back</a>';
                } else {
                    $message = 'Incorrect CVV! <a href="Cart.php">Back</a>';
                }
            }
        }
        ?>
        <div class="row" style="background-color: #A8E0DA !important; color:#4E5269;">
            <div class="container p-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background-color: #fff !important;">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="Profile.php">Your Account</a></li>
                        <li class="breadcrumb-item"><a href="Cart.php">Cart</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Payment</li>
                    </ol>
                </nav>
                <h4 class="text-center mb-5"><b>Payment</b></h4>

                <div class="row">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-8 py-3 border rounded" style="background-color: #fff;color:#333333;">
                        <?php
                        if (isset($message)) {
                            echo '<div class="alert alert-success" role="alert">
			  <strong>Note: </strong>
				' . $message . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button></div>';
                        }
                        while ($got_cart = mysqli_fetch_assoc($view_cart)) {
                            while ($got_method = mysqli_fetch_assoc($view_method)) {
                        ?>

                                <form method="POST" name="payment">
                                    <div class="row-p">
                                        <div class="col-50">
                                            <h3>Seller Details</h3>
                                            <input type="hidden" value="<?php echo $got_cart['product_Id'] ?>" name="pid" />
                                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                            <input type="email" id="email" value="<?php echo $got_cart['seller'] ?>" placeholder="<?php echo $got_cart['seller'] ?>" disabled>
                                            <input type="hidden" value="<?php echo $got_cart['seller'] ?>" name="email" />
                                            <label for="productname">Product Name</label>
                                            <input type="text" id="productname" value="<?php echo $got_cart['name'] ?>" placeholder="<?php echo $got_cart['name'] ?>" disabled>
                                            <input type="hidden" value="<?php echo $got_cart['name'] ?>" name="productname" />
                                            <label for="adr">Product Price</label>
                                            <input type="text" id="price" name="price" value="<?php echo $got_cart['final_Price'] ?>" placeholder="<?php echo number_format($got_cart['final_Price']) ?>" disabled>
                                            <input type="hidden" value="<?php echo $got_cart['final_price'] ?>" name="price" />
                                            <input type="hidden" name="id" value="<?php echo $got_cart['product_Id']; ?>" />
                                        </div>
                                        <div class="col-50">
                                            <h3>Payment</h3>
                                            <label for="cname">Name on Card</label>
                                            <input type="text" id="cname" name="cardname" value="<?php echo $got_method['cardname'] ?>" placeholder="<?php echo $got_method['cardname'] ?>" disabled>
                                            <label for="ccnum">Credit card number</label>
                                            <input type="text" id="ccnum" name="cardnumber" value="<?php echo $got_method['cardnumber'] ?>" placeholder="<?php echo $got_method['cardnumber'] ?>" disabled>
                                            <input type="hidden" value="<?php echo $got_method['cardnumber'] ?>" name="cardnumber" />
                                            <label for="ccnum">Amount</label>
                                            <input type="text" id="amount" name="amount" value="<?php echo number_format($got_cart['final_Price']) ?>" placeholder="<?php echo number_format($got_cart['final_Price']) ?>" disabled>
                                            <input type="hidden" value="<?php echo $got_cart['final_Price'] ?>" name="price" />
                                            <label for="expmonth">Exp Month</label>
                                            <input type="text" id="expmonth" name="expmonth" value="<?php echo $got_method['expmonth'] ?>" placeholder="<?php echo $got_method['expmonth'] ?>" disabled>
                                            <div class="row-p">
                                                <div class="col-50">
                                                    <label for="expyear">Exp Year</label>
                                                    <input type="text" id="expyear" name="expyear" value="<?php echo $got_method['expyear'] ?>" placeholder="<?php echo $got_method['expyear'] ?>" disabled>
                                                </div>
                                                <div class="col-50">
                                                    <label for="cvv">CVV</label>
                                                    <input type="text" id="cvv" name="cvv" placeholder="Enter CVV" maxlength="3" required>
                                                    <input type="hidden" name="mcvv" value="<?php echo $got_method['cvv'] ?>">
                                                </div>
                                            </div>
                                            <input type="submit" value="Pay" name="paybtn" class="btn-p">
                                        </div>
                                    </div>
                                </form>
                        <?php }
                        } ?>
                    </div>
                </div>
            </div>
</body>

</html>
<?php
    } else {
        header('Location: index.php');
    }
?>
<?php
include_once('footer.php');
?>