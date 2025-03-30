<footer>
        <section class="footer row">
            <div class="footer-row">
                <div class="footer-col">
                    <div class="img">
                        <img src="asset/img/logo.jpg" alt="">
                    </div>

                </div>

                <div class="footer-col">

                    <h4>Info</h4>
                    <ul class="links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Conditions</a></li>
                        <li><a href="#">Our Journals</a></li>
                        <li><a href="#">Service</a></li>
                        <li><a href="#">Collection</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul class="links">
                        <li><a href="#">Offers</a></li>
                        <li><a href="#">Discount Coupons</a></li>
                        <li><a href="#">Stores</a></li>
                        <li><a href="#">Track Order</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">Info</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Newsletter</h4>
                    <p>
                        Subscribe to our website for a weekly dose
                        of latest, updates, helpful tips, and
                        exclusive offers.
                    </p>
                    <form action="#">
                        <input type="text" placeholder="Your email" required>
                        <button type="submit">SUBSCRIBE</button>
                    </form>
                    <div class="icons">
                        <i class="fa-brands fa-facebook-f"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-linkedin"></i>
                        <i class="fa-brands fa-github"></i>
                    </div>
                </div>
            </div>
        </section>
        <section class="footer-copy">
            <p>All rights reserved copyright@2025 startup landing page design</p>
        </section>
    </footer>

    <!--JS for toggle menu starts-->

    <script>
        var MenuIteams = document.getElementById("MenuIteams");
        MenuIteams.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuIteams.style.maxHeight == "0px") {
                MenuIteams.style.maxHeight = "200px"
            }
            else {
                MenuIteams.style.maxHeight = "0px"
            }

        }
    </script>

    <script src="asset/bootstrap/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>

    <!--JS for product Gellery start-->
    <script>
        var ProductImg = document.getElementById("ProductImg");
        var SmallImg = document.getElementsByClassName("small-img");

        SmallImg[0].onclick = function()
        {
            ProductImg.src = SmallImg[0].src;
        }
        SmallImg[1].onclick = function()
        {
            ProductImg.src = SmallImg[1].src;
        }
        SmallImg[2].onclick = function()
        {
            ProductImg.src = SmallImg[2].src;
        }
        SmallImg[3].onclick = function()
        {
            ProductImg.src = SmallImg[3].src;
        }
    </script>
</body>

</html>