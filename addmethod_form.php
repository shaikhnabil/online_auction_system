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
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
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
input[type=email]{
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

<!-- <div class="row">
  <div class="col-75"> -->
    <div class="container-p">
      <form action="./add_Method.php" method="POST">
      
        <div class="row-p">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="fullname" placeholder="John M. Doe" required>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="email" id="email" name="email" placeholder="john@example.com" required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required>
            <label for="city"><i class="fa fa-institution" ></i> City</label>
            <input type="text" id="city" name="city" placeholder="Bhavnagar" required>

            <div class="row-p">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="Gujarat" required>
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="234001" pattern="^[1-9][0-9]{5}$" title="Enter 6 digit valid pincode" required>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container-p">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe" required>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" maxlength="16" required>
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September" required>
            <div class="row-p">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2022" required>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352" maxlength="3" required>
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="Add Payment Method" name="addpaymentmethod" class="btn-p">
      </form>
    </div>
  <!-- </div> -->
  <!-- <div class="col-25">
  </div> -->
<!-- </div> -->

</body>
</html>