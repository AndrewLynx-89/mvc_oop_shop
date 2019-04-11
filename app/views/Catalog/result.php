<?php if(!empty($products)): ?>
<div class="product-area">
    <div class="preloader">
        <img src="/public/frontend/img/ring.svg" alt="">
    </div>
    <div class="row">
        <div class="col-xs-12">
            <!-- Start Product-Menu -->
            <div class="product-menu">
                <div class="product-title">
                    <h3 class="title-group-3 gfont-1">cameras & photography</h3>
                </div>
            </div>
            <div class="product-filter">
                <ul role="tablist">
                    <li role="presentation" class="list">
                        <a href="#display-1-1" role="tab" data-toggle="tab"></a>
                    </li>
                    <li role="presentation"  class="grid active">
                        <a href="#display-1-2" role="tab" data-toggle="tab"></a>
                    </li>
                </ul>
                <div class="sort">
                    <label>Sort By:</label>
                    <select>
                        <option value="#">Default</option>
                        <option value="#">Name (A - Z)</option>
                        <option value="#">Name (Z - A)</option>
                        <option value="#">Price (Low > High)</option>
                        <option value="#">Rating (Highest)</option>
                        <option value="#">Rating (Lowest)</option>
                        <option value="#">Name (A - Z)</option>
                        <option value="#">Model (Z - A))</option>
                        <option value="#">Model (A - Z)</option>
                    </select>
                </div>
                <div class="limit">
                    <label>Show:</label>
                    <select>
                        <option value="#">8</option>
                        <option value="#">16</option>
                        <option value="#">24</option>
                        <option value="#">40</option>
                        <option value="#">80</option>
                        <option value="#">100</option>
                    </select>
                </div>
            </div>

            <div class="clear"></div>
        </div>
    </div>
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
                                                        <button><i class="fa fa-shopping-cart"></i> Добавить в корзину</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="pagination-area">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <?php echo $pagination; ?>
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
<?php else: ?>
    <h3>В этой категории товаров пока нет...</h3>
<?php endif; ?>