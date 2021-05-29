 <!-- Shopping cart section -->
 <?php
     $db = new DBController();
     $Cart = new Cart($db);
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['delete_cart_submit'])){
            $deletedRecord = $Cart->deleteCart($_POST['item_id']);
        }
    }
 ?>
<section id="cart" class="py-3 mb-5">
            <div class="container-fluid w-75">
                <h5 class="font-koho font-size-20">Shopping cart</h5>
                <!-- shopping cart items -->
                <div class="row">
                    <div class="col-sm-9">
                        <?php
                            $db = new DBController();
                            $product = new Product($db);

                            foreach ($product->getData('cart') as $item):
                                $cart = $product->getProduct($item['item_id']);
                                $subTotal[] = array_map(function ($item){
                            ?>
                        <!-- cart item -->
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                                <img src="<?php echo $item['item_image'] ?? './assets/products/4.jpg' ?>" alt="cart1" class="img-fluid" style="height: 120px;">
                            </div>
                            <div class="col-sm-8">
                                <h5 class="font-koho font-size-20"><?php echo $item['item_name'] ?? 'Unknown' ?></h5>
                                <small>by Tiffany</small>
                                <!-- product rating -->
                                <div class="d-flex">
                                    <div class="rating font-size-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                    </div>
                                    <a href="" class="px-2 font-raleway text-decoration-none text-dark font-size-14">20,458 ratings</a>
                                </div>
                                <!-- !product rating -->

                                <!-- product qty -->
                                <div class="qty d-flex pt-2">
                                    <div class="d-flex font-raleway w-25">
                                        <button class="qty-up border bg-light" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><i class="fas fa-angle-up"></i></button>
                                        <input type="text" data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                                        <button data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                                    </div>

                                    <form method="post">
                                        <input type="hidden" value="<?php echo $item['item_id'] ?? 0?>" name="item_id">
                                        <button type="submit" name="delete_cart_submit" class="btn text-danger font-koho border-right  px-3">Delete</button>
                                    </form>

                                    <button type="submit" class="btn text-danger font-koho px-3" >Save for later</button>
                                </div>

                                <!-- !product qty -->
                            </div>

                            <div class="col-sm-2">
                                <div class="font-size-20 font-koho">
                                    $<span class="product_price" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><?php echo $item['item_price'] ?? 0; ?></span>
                                </div>
                            </div>
                        </div>
                        <!-- !cart item -->
                        <?php
                                    return $item['item_price'];
                                }, $cart); //closing array_map function

                            endforeach;
                        ?>

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