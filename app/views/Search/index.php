
    <div class="product-area">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <!-- Start Product -->
                <div class="product">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in  active" id="display-1-2">
                            <div class="row">
                                <div class="product_items">
                                    <?php foreach ($products as $product):?>
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <div class="single-product">
                                                <div class="label_new">
                                                    <span class="new">new</span>
                                                </div>
                                                <div class="sale-off">
                                                    <span class="sale-percent">-55%</span>
                                                </div>
                                                <div class="product-img">
                                                    <a href="/catalog/view/<?php echo $product['id']; ?>">
                                                        <img class="primary-img" src="/public/frontend/img/product/mediam/12.jpg" alt="Product">
                                                    </a>
                                                </div>
                                                <div class="product-description">
                                                    <h5><?php echo $product['title']?></h5>
                                                    <div class="price-box">
                                                        <span class="price">$<?php echo $product['price']?></span>
                                                        <span class="old-price">$110.00</span>
                                                    </div>
                                                    <span class="rating">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-o"></i>
																</span>
                                                </div>
                                                <div class="product-action">
                                                    <div class="button-group">
                                                        <div class="product-button">
                                                            <button class="add_to_cart" data-id =<?php echo $product['id']; ?>><i class="fa fa-shopping-cart"></i> Добавить в корзину</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;?></div>
                            </div>
                            <div class="row">
                                <div class="pagination-area">
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <div class="pagination">
                                                <ul>
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">></a></li>
                                                    <li><a href="#">>|</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <div class="product-result">
                                                <span>Showing 1 to 16 of 19 (2 Pages)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product = TV -->
                        </div>
                    </div>
                    <!-- End Product -->
                </div>
            </div>
        </div>
        <!-- END PRODUCT-AREA -->
