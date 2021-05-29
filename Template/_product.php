 <!-- Products -->
 <?php
 $db = new DBController();
 //Product object
 $product = new Product($db);
    $item_id = $_GET['item_id'] ?? 1;
    foreach ($product->getData() as $item):
        if($item['item_id'] == $item_id):
 ?>
 <section id="product">
            <div class="container">
                <div class="row m-2">
                    <div class="col-sm-5 my-5">
                        <img src="<?php echo $item['item_image'] ?? '/assets/products/1.jpg' ?>" alt="product" class="img-fluid mx-auto d-block">
                        <div class="form-row pt-4 font-size-16 font-koho d-flex flex-wrap">
                            <div class="col m-1">
                                <button type="submit" class="btn  btn-outline-dark form-control">Proceed to Buy</button>
                            </div>
                            <div class="col m-1">
                                <button type="submit" class="btn btn-outline-dark form-control">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <h5 class="font-koho font-size-20"><?php echo $item['item_name'] ?? 'Unknown'?></h5>
                        <small class="font-koho">by Tiffany</small>
                        <div class="d-flex">
                            <div class="rating font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                            <a href="" class="px-2 font-raleway font-size-14 text-dark text-decoration-none">20.547 ratings | 1000+ answered questions</a>
                        </div>
                        <hr class="m-0">

                        <!-- product price -->
                        <table class="my-3">
                            <tr class="font-raleway font-size-14">
                                <td>M.R.P </td>
                                <td><strike>$3,800</strike></td>
                            </tr>
                            <tr class="font-raleway font-size-14">
                                <td class="font-size-16">Deal Price: </td>
                                <td class="font-size-20">$<span><?php echo $item['item_price'] ?? 0?></span><small class="text-dark font-size-12"> &nbsp;Inclusive of all taxes</small></td>
                            </tr>
                            <tr class="font-raleway font-size-14">
                                <td class="font-size-16">You Save: </td>
                                <td class="font-size-20">$<span>150</span></td>
                            </tr>
                        </table>
                        <!-- !product price -->

                        <!-- policy -->
                        <div id="policy">
                            <div class="d-flex">
                                <div class="return text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="" class="font-raleway text-secondary text-decoration-none font">10 Days <br>Replacement</a>
                                </div>
                                <div class="delivery text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-truck border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="" class="font-raleway text-secondary text-decoration-none font">Daily Tuition <br>Deliverd</a>
                                </div>
                                <div class="warranty text-center mr-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-check border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="" class="font-raleway text-secondary text-decoration-none font">3 Year <br>Warranty</a>
                                </div>
                            </div>
                        </div>
                        <!-- !policy -->
                        <hr>

                        <!-- order details -->
                        <div id="order-details" class="font-raleway d-flex flex-column text-dark">
                            <small>Delivery by: May 30 - June 05</small>
                            <small>Sold by: <a href="" class=" text-dark text-decoration-none">someone</a> </small>
                            <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 424201</small>
                        </div>
                        <!-- !order details -->
                        <div class="row">
                            <div class="col-6">
                                <!-- metal -->
                                <div class="metal my-3">
                                    <div class="d-flex justify-content-around">
                                        <h6 class="font-koho">Metal:</h6>
                                        <div class="p-2 bg-light rounded-circle">
                                            <button class="btn font-size-14 font-koho">Silver</button>
                                        </div>
                                        <div class="p-2 color-yellow-bg rounded-circle">
                                            <button class="btn font-size-14 text-white font-koho">Gold</button>
                                        </div>

                                    </div>
                                </div>
                                <!-- !metal -->
                            </div>
                            <div class="col-6">
                                <div class="qty d-flex my-3">
                                    <h6 class="font-koho">Qty:</h6>
                                    <div class="px-4 d-flex font-raleway">
                                        <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                                        <input type="text" data-id="pro1" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                                        <button class="qty-down border bg-light" data-id="pro1"><i class="fas fa-angle-down"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- size -->
                        <div class="size my-3">
                            <h6 class="font-koho">Size:</h6>
                            <div class="d-flex  w-75">
                                <div class="font-rubik border p-2 m-2">
                                    <button class="btn p-0 font-size-14">16</button>
                                </div>
                                <div class="font-rubik border p-2 m-2">
                                    <button class="btn p-0 font-size-14">16.5</button>
                                </div>
                                <div class="font-rubik border p-2 m-2">
                                    <button class="btn p-0 font-size-14">17</button>
                                </div>
                                <div class="font-rubik border p-2 m-2">
                                    <button class="btn p-0 font-size-14">17.5</button>
                                </div>
                                <div class="font-rubik border p-2 m-2">
                                    <button class="btn p-0 font-size-14">18</button>
                                </div>
                            </div>
                        </div>
                        <!-- !size -->
                    </div>

                    <div class="col-12">
                        <h6 class="font-rubik">Product Description</h6>
                        <hr>
                        <p class="font-raleway font-size-14">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa voluptatum quisquam magnam laudantium hic eveniet iusto nisi aliquid culpa aliquam numquam modi nostrum, optio similique consequuntur enim rerum quia temporibus, nam
                            nesciunt! Iste vel unde aspernatur, dignissimos est cumque eligendi odio explicabo, ducimus reprehenderit doloribus delectus illum, consequuntur provident quibusdam!</p>
                        <p class="font-raleway font-size-14">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa voluptatum quisquam magnam laudantium hic eveniet iusto nisi aliquid culpa aliquam numquam modi nostrum, optio similique consequuntur enim rerum quia temporibus, nam
                            nesciunt! Iste vel unde aspernatur, dignissimos est cumque eligendi odio explicabo, ducimus reprehenderit doloribus delectus illum, consequuntur provident quibusdam!</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- !Products -->

 <?php
    endif;
    endforeach;
 ?>