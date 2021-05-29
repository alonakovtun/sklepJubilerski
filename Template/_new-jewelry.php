        <!-- New Jewelry -->
         <?php
            //DBController object
            $db = new DBController();
            //Product object
            $product = new Product($db);
            $product_shuffle = $product->getData();
            shuffle($product_shuffle);

             //request method POST
             if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                 //call method addToCart
                 $Cart = new Cart($db);
                 if (isset($_POST['new_jewelry_submit'])){
                     $Cart->addToCart($_POST['user_id'],$_POST['item_id']);
                 }
             }
            ?>
        <section id="new-jewelry">
            <div class="container py-5">
                <h4 class="font-rubik font-size-20">New Jewelry</h4>
                <hr>
                <!-- owl-carousel -->
                <div class="owl-carousel owl-theme">
                    <?php foreach ($product_shuffle as $item) { ?>
                        <div class="item py-2 m-2 bg-light">
                            <div class="product font-relawey">
                                <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id'])?>"><img src="<?php echo $item['item_image'] ?? './assets/products/6.jpg'?>" alt="product" class="img-fluid"></a>
                                <div class="text-center">
                                    <h6 class="mt-3"><?php echo $item['item_name'] ?? 'Unknown' ?></h6>
                                    <div class="rating font-size-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                    </div>
                                    <div class="price py-2">
                                        $<span><?php echo $item['item_price'] ?? '0' ?></span>
                                    </div>
                                    <form method="post">
                                        <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'?>">
                                        <input type="hidden" name="user_id" value="<?php echo 1?>">
                                        <?php
                                            $db = new DBController();
                                            $product = new Product($db);
                                            $Cart = new Cart($db);
                                            if (in_array($item['item_id'],$Cart->getCartId($product->getData('cart'))?? [])){
                                                echo '<button type="submit" disabled name="top_sale_submit" class="btn btn-dark font-size-12">In the Cart</button>';
                                            }else{
                                                echo '<button type="submit" name="top_sale_submit" class="btn btn-dark font-size-12">Add to Card</button>';
                                            }
                                        ?>                                    </form>

                                </div>
                            </div>
                        </div>
                    <?php } //closing foreach function ?>
                </div>
                <!-- !owl-carousel -->
            </div>
        </section>
        <!-- !New Jewelry -->