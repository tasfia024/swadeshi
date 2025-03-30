<?php
    include 'layout/header.php';
?>

    <!-- Single product details start-->

    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <!--Large img-->
                <img src="asset/img/sari/sari5.jpg" alt="" width="98%" height="448px" id="ProductImg">

                <!--Small img-->
                <div class="small-img-row">
                    <div class="small-img-col">
                        <img src="asset/img/sari/sari5.jpg" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="asset/img/sari/sari5-2.jpg" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="asset/img/sari/sari5-3.jpg" width="100%" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="asset/img/sari/sari5-4.jpg" width="100%" class="small-img">
                    </div>
                </div>


            </div>
            <div class="col-2">
                <p>Home / শাড়ি</p>
                <h1>হ্যান্ডপেইন্ট শাড়ি by Nila's Shop</h1>
                <h4>৳ 1800</h4>
                <!--Size option-->
                <select>
                    <option>Select Size</option>
                    <option>XXL</option>
                    <option>XL</option>
                    <option>Large</option>
                    <option>Medium</option>
                    <option>Small</option>
                </select>
                <!--Quantity-->
                Quantity:
                <input type="number" value="1">
                <br>
                <!--Cart-->
                <a href="#" class="btn">Add To Cart</a>
                <!--Product details-->
                <h5>Description</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, minima distinctio. Ipsa odit totam vel.</p>

            </div>
        </div>
    </div>


<!--Title -->

    <div class="small-container">
        <div class="row row-2">
            <h2>Related Products</h2>
            <p>View More</p>
        </div>
    </div>


    <!--Product-->
    <div class="small-container">
 
        <div class="row">
            <div class="col-4">
                <img src="asset/img/sari/sari1.jpg" alt="">
                <h4>শাড়ি</h4>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <p>৳ 1200</p>
            </div>

            <div class="col-4">
                <img src="asset/img/sari/sari2.jpg" alt="">
                <h4>শাড়ি</h4>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <p>৳ 1400</p>
            </div>
            <div class="col-4">
                <img src="asset/img/sari/sari3.jpg" alt="">
                <h4>শাড়ি</h4>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <p>৳ 1200</p>
            </div>

            <div class="col-4">
                <img src="asset/img/sari/sari4.jpg" alt="">
                <h4>শাড়ি</h4>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <p>৳ 2000</p>
            </div>
          

        </div>
       
    </div>
   <!-- single product details ends -->

    <!--JS for toggle menu starts-->

    <script>
        var MenuIteams = document.getElementById("MenuIteams");
        MenuIteams.style.maxHeight = "0px";

        function menutoggle(){
            if(MenuIteams.style.maxHeight == "0px")
                {
                    MenuIteams.style.maxHeight = "200px"
                }
            else
                {
                    MenuIteams.style.maxHeight = "0px"
                }

        }
    </script>

    <!--JS for toggle menu ends-->

<?php
    include 'layout/footer.php';
?>
