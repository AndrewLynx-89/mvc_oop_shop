
    <!-- Start Toch-Prond-Area -->
    <div class="toch-prond-area">
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="clear"></div>
                <div class="tab-content">
                    <!-- Product = display-1-1 -->
                    <div role="tabpanel" class="tab-pane fade in active" id="display-1">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="toch-photo">
                                    <a href="#"><img src="/public/frontend/img/toch/1.jpg" data-imagezoom="true" alt="#" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product = display-1-1 -->
                    <!-- Start Product = display-1-2 -->
                    <div role="tabpanel" class="tab-pane fade" id="display-2">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="toch-photo">
                                    <a href="#"><img src="/public/frontend/img/toch/2.jpg" data-imagezoom="true" alt="#" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product = display-1-2 -->
                    <!-- Start Product = di3play-1-3 -->
                    <div role="tabpanel" class="tab-pane fade" id="display-3">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="toch-photo">
                                    <a href="#"><img src="/public/frontend/img/toch/3.jpg" data-imagezoom="true" alt="#" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product = display-1-3 -->
                    <!-- Start Product = di3play-1-4 -->
                    <div role="tabpanel" class="tab-pane fade" id="display-4">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="toch-photo">
                                    <a href="#"><img src="/public/frontend/img/toch/4.jpg" data-imagezoom="true" alt="#" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product = display-1-4 -->
                </div>
                <!-- Start Toch-prond-Menu -->
                <div class="toch-prond-menu">
                    <ul role="tablist">
                        <li role="presentation" class=" active"><a href="#display-1" role="tab" data-toggle="tab"><img src="/public/frontend/img/toch/1.jpg" alt="#" /></a></li>
                        <li role="presentation"><a href="#display-2" role="tab" data-toggle="tab"><img src="/public/frontend/img/toch/2.jpg" alt="#" /></a></li>
                        <li role="presentation"><a href="#display-3"  role="tab" data-toggle="tab"><img src="/public/frontend/img/toch/3.jpg" alt="#" /></a></li>
                        <li role="presentation"><a href="#display-4"  role="tab" data-toggle="tab"><img src="/public/frontend/img/toch/4.jpg" alt="#" /></a></li>
                    </ul>
                </div>
                <!-- End Toch-prond-Menu -->
            </div>
            <div class="col-md-7 col-sm-7 col-xs-12">
                <h2 class="title-product"> Toch Prond</h2>
                <div class="about-toch-prond">
                    <p>
											<span class="rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span>
                        <a href="#">1 reviews</a>
                        /
                        <a href="#">Write a review</a>
                    </p>
                    <hr />
                    <p class="short-description">Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nul... </p>
                    <hr />
                    <span class="current-price" id="base-price" data-base = "<?php echo $view_product['price']?>" >$<?php echo $view_product['price']?></span>
                    <span class="item-stock">Availability: <span class="text-stock">In Stock</span></span>
                </div>

                <?php if (is_array($modifications) && $modifications != null):?>
                <div class="about-product">
                    <div class="product-select avaliable">
                        <label><sup>*</sup>Color</label>
                        <select class="form-control">
                            <option>Выберите модификацию</option>
                            <?php foreach ($modifications as $modification):?>
                                <option data-title = "<?php echo $modification['title']?>"
                                        data-price = "<?php echo $modification['price']?>"
                                        value = " <?php echo $modification['id']?>">
                                    <?php echo $modification['title']?>
                                </option>
                            <?php endforeach;?>

                        </select>
                </div>
                </div>
                <?php endif;?>
                <div class="product-quantity">
                    <span>Qty</span>
                    <input id="selector_input"  type="number" placeholder="1" />
                    <button type="submit" data-id="<?php echo $view_product['id']?>" class="add_to_cart toch-button toch-add-cart">Add to Cart</button>
                </div>
            </div>
        </div>
        <!-- Start Toch-Box -->
        <div class="toch-box">
            <div class="row">
                <div class="col-xs-12">
                    <!-- Start Toch-Menu -->
                    <div class="toch-menu">
                        <ul role="tablist">
                            <li role="presentation" class=" active"><a href="#description" role="tab" data-toggle="tab">Description</a></li>
                        </ul>
                    </div>
                    <!-- End Toch-Menu -->
                    <div class="tab-content toch-description-review">
                        <!-- Start display-description -->
                        <div role="tabpanel" class="tab-pane fade in active" id="description">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="toch-description">
                                        <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt.
                                            Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt.
                                            Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt.
                                            Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt.
                                            Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt.
                                            Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Toch-Box -->
        <!-- START PRODUCT-AREA -->
        <div class="product-area">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <!-- Start Product-Menu -->
                    <div class="product-menu">
                        <div class="product-title">
                            <h3 class="title-group-2 gfont-1">Related Products</h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product-Menu -->
            <div class="clear"></div>
            <!-- Start Product -->
            <div class="product carosel-navigation">
                <div class="row">
                    <div class="active-product-carosel">
                        <!-- Start Single-Product -->
                        <div class="col-xs-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="#">
                                        <img class="primary-img" src="/public/frontend/img/product/mediam/3bg.jpg" alt="Product">
                                    </a>
                                </div>
                                <div class="product-description">
                                    <h5><a href="#">Various Versions</a></h5>
                                    <div class="price-box">
                                        <span class="price">$80.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single-Product -->
                        <!-- Start Single-Product -->
                        <div class="col-xs-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="#">
                                        <img class="primary-img" src="/public/frontend/img/product/mediam/11.jpg" alt="Product">
                                    </a>
                                </div>
                                <div class="product-description">
                                    <h5><a href="#">Trid Palm</a></h5>
                                    <div class="price-box">
                                        <span class="price">$79.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single-Product -->
                        <!-- Start Single-Product -->
                        <div class="col-xs-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="#">
                                        <img class="primary-img" src="/public/frontend/img/product/mediam/1.jpg" alt="Product">
                                    </a>
                                </div>
                                <div class="product-description">
                                    <h5><a href="#">Established Fact</a></h5>
                                    <div class="price-box">
                                        <span class="price">$75.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single-Product -->
                        <!-- Start Single-Product -->
                        <div class="col-xs-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="#">
                                        <img class="primary-img" src="/public/frontend/img/product/mediam/2.jpg" alt="Product">
                                    </a>
                                </div>
                                <div class="product-description">
                                    <h5><a href="#">Trid Palm</a></h5>
                                    <div class="price-box">
                                        <span class="price">$95.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single-Product -->
                        <!-- Start Single-Product -->
                        <div class="col-xs-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="#">
                                        <img class="primary-img" src="/public/frontend/img/product/mediam/13.jpg" alt="Product">
                                    </a>
                                </div>
                                <div class="product-description">
                                    <h5><a href="#">Established Fact</a></h5>
                                    <div class="price-box">
                                        <span class="price">$82.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single-Product -->
                        <!-- Start Single-Product -->
                        <div class="col-xs-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="#">
                                        <img class="primary-img" src="/public/frontend/img/product/mediam/10.jpg" alt="Product">
                                    </a>
                                </div>
                                <div class="product-description">
                                    <h5><a href="#">Trid Palm</a></h5>
                                    <div class="price-box">
                                        <span class="price">$99.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single-Product -->
                        <!-- Start Single-Product -->
                        <div class="col-xs-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="#">
                                        <img class="primary-img" src="/public/frontend/img/product/mediam/10bg.jpg" alt="Product">
                                    </a>
                                </div>
                                <div class="product-description">
                                    <h5><a href="#">Various Versions</a></h5>
                                    <div class="price-box">
                                        <span class="price">$95.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single-Product -->
                    </div>
                </div>

            </div>
            <!-- End Product -->
        </div>
        <!-- END PRODUCT-AREA -->
    </div>
    <!-- End Toch-Prond-Area -->
