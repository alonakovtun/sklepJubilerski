<!-- Wislist section -->
<?php
$db = new DBController();
$Cart = new Cart($db);
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['delete-cart-submit'])){
        $deletedRecord = $Cart->deleteCart($_POST['item_id']);
    }

    if (isset($_POST['cart_submit'])){
        $Cart->saveForLater($_POST['item_id'], 'cart', 'wishlist');
    }
}
?>
<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-koho font-size-20">Wishlist</h5>
        <!-- shopping cart items -->
        <div class="row">
            <div class="col-sm-9">
                <?php
                $db = new DBController();
                $product = new Product($db);

                foreach ($product->getData('wishlist') as $item):
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
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $item['item_id'] ?? 0?>" name="item_id">
                                        <button type="submit" name="delete-cart-submit" class="btn text-danger font-koho border-right pl-0 pr-3">Delete</button>
                                    </form>

                                    <form method="post">
                                        <input type="hidden" value="<?php echo $item['item_id'] ?? 0?>" name="item_id">
                                        <button type="submit" name="cart_submit" class="btn text-danger font-koho px-3" >Add to Cart</button>
                                    </form>

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
        </div>
        <!-- !shopping cart items -->
    </div>
</section>
<!-- !Shopping cart section -->