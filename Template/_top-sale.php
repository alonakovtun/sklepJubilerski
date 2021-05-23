<!-- Top Sale -->

<?php
//DBController object
$db = new DBController();

//Product object
$product = new Product($db);
$product_shuffle = $product->getData();
?>

 <section id="top-sale">
     <div class="container py-5">
         <h4 class="font-rubik font-size-20">Top Sale</h4>
         <hr>
         <!-- owl-carousel -->
         <div class="owl-carousel owl-theme">
             <?php foreach ($product_shuffle as $item) { ?>
             <div class="item py-2 m-2">
                        <div class="product font-relawey">
                            <a href="#"><img src="<?php echo $item['item_image'] ?? './assets/products/6.jpg'?>" alt="product" class="img-fluid"></a>
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
                                <button type="submit" class="btn btn-dark font-size-12">Add to Card</button>

                            </div>
                        </div>
                    </div>
            <?php } //closing foreach function ?>
         </div>
         <!-- !owl-carousel -->
     </div>
 </section>
 <!-- !Top Sale -->