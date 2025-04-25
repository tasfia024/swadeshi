<?php
    include 'layout/header.php';
    include 'lib/ClientHome.php';

    $homePage = new ClientHome();
?>

<!-- Single product details start-->

<div class="container">
    <div class="checkoutLayout">

        <div class="returnCart">
            <a class="btn btn-primary btn-sm" href="index.php">Keep Shopping</a>
            <h1>List Product in Cart</h1>
            <div class="list">

                <div class="item">
                    <img src="images/1.webp">
                    <div class="info">
                        <div class="name">PRODUCT 1</div>
                        <div class="price">৳22/1 product</div>
                    </div>
                    <div class="quantity">5</div>
                    <div class="returnPrice">৳433.3</div>
                </div>

            </div>
        </div>


        <div class="right">
            <h1>Checkout</h1>

            <div class="form">
                <div class="group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name">
                </div>

                <div class="group">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="phone">
                </div>

                <div class="group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address">
                </div>

                <div class="group">
                    <label for="country">Country</label>
                    <select name="country" id="country">
                        <option value="">Choose..</option>
                        <option value="">Bangladesh</option>
                    </select>
                </div>

                <div class="group">
                    <label for="city">City</label>
                    <select name="city" id="city">
                        <option value="">Choose..</option>
                        <option value="">Dhaka</option>
                    </select>
                </div>
            </div>
            <div class="return">
                <div class="row">
                    <div>Total Quantity</div>
                    <div class="totalQuantity">70</div>
                </div>
                <div class="row">
                    <div>Total Price</div>
                    <div class="totalPrice">৳ ৮০০</div>
                </div>
            </div>
            <button class="buttonCheckout">CHECKOUT</button>
        </div>
    </div>
</div>
<br>
<br>
<br>
<!--JS for toggle menu starts-->
<script>

</script>

<!--JS for toggle menu ends-->

<?php
    include 'layout/footer.php';
?>