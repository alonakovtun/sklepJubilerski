        <!-- Special Price -->

        <?php
            //DBController object
            $db = new DBController();
            //Product object
            $product = new Product($db);
            $product_shuffle = $product->getData();
            shuffle($product_shuffle);
            $brand = array_map(function ($pro){return $pro['item_brand'];}, $product_shuffle);
            $unique = array_unique($brand);
            sort($unique);

            //request method POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                //call method addToCart
                $Cart = new Cart($db);
                if (isset($_POST['special_price_submit'])){
                    $Cart->addToCart($_POST['user_id'],$_POST['item_id']);
                }

            }

            ?>
        <section id="special-price">
            <div class="container">
                <h4 class="font-rubik font-size-20">Special Price</h4>
                <div id="filters" class="button-group text-right font-koho">
                    <button class="btn is-checked" data-filter="">All</button>
                    <?php
                        array_map(function ($brand){
                            printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
                        }, $unique);
                    ?>
                </div>

                <div class="grid">
                    <?php
                    //DBController object
                    $db = new DBController();
                    //Product object
                    $product = new Product($db);
                    $product_shuffle = $product->getData();
                    array_map(function ($item){?>
                    <div class="grid-item border <?php echo $item['item_brand'] ?? 'Brand' ; ?> ">
                        <div class="item py-2" style="width: 200px;">
                            <div class="product font-relawey">
                                <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id'])?>"><img src="<?php echo $item['item_image'] ?? './assets/products/6.jpg'?>" alt="product1" class="img-fluid"></a>
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
                                        <span>$<?php echo $item['item_price'] ?? '0' ?></span>
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
                                        ?>                                      </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }, $product_shuffle) ?>


                </div>
            </div>
        </section>
        <!-- !Special Price -->