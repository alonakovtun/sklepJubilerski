<!-- Shopping cart section -->

<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-koho font-size-20">Shopping cart</h5>
        <!-- shopping cart items -->
        <div class="row">
            <div class="col-sm-9">
                <!-- Empty Cart -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-12 text-center py-2">
                        <img src="./assets/blog/empty_cart.png" alt="Empty Cart" class="img-fluid" style="height:200px">
                        <p class="font-koho font-size-16 text-black-50">Empty Cart</p>
                    </div>
                </div>
                <!-- !Empty Cart -->
            </div>

            <!-- subtotal section -->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-raleway text-info py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery</h6>
                    <div class="border-top py-4">
                        <h5 class="font-koho font-size-20">Subtotal(<?php echo isset($subTotal)? count($subTotal) : 0?> item): &nbsp; $<span id="deal-price"><?php $Cart = new Cart($db); echo isset($subTotal) ? $Cart->getSum($subTotal):0 ?></span> </h5>
                        <button type="submit" class="btn btn-outline-dark my-3">Proceed to Buy</button>
                    </div>

                </div>
            </div>
            <!-- !subtotal section -->
        </div>
        <!-- !shopping cart items -->
    </div>
</section>
<!-- !Shopping cart section -->