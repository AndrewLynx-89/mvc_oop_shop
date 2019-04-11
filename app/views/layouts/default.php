<!DOCTYPE html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <?php echo $this->getMeta();?>

    <link rel="shortcut icon" type="image/x-icon" href="">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/public/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/frontend/css/font-awesome.min.css">
    <link rel="stylesheet" href="/public/frontend/css/owl.carousel.css">
    <link rel="stylesheet" href="/public/frontend/css/owl.theme.css">
    <link rel="stylesheet" href="/public/frontend/css/owl.transitions.css">
    <link rel="stylesheet" href="/public/frontend/css/nivo-slider.css" type="text/css" />
    <link rel="stylesheet" href="/public/frontend/css/meanmenu.min.css">
    <link rel="stylesheet" href="/public/frontend/css/jquery-ui.css">
    <link rel="stylesheet" href="/public/frontend/css/animate.css">
    <link rel="stylesheet" href="/public/frontend/css/responsive.css">
    <link rel="stylesheet" href="/public/frontend/css/main.css">
    <link rel="stylesheet" href="/public/frontend/css/style.css">

</head>
<body>
<header class="header-area">
    <!-- HEADER-TOP START -->
    <div class="header-top hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="top-menu">
                        <!-- Start Language -->
                        <ul class="language">
                            <li><a href="#"><img class="right-5" src="/public/frontend/img/flags/gb.png" alt="#">English<i class="fa fa-caret-down left-5"></i></a>
                                <ul>
                                    <li><a href="#"><img class="right-5" src="/public/frontend/img/flags/fr.png" alt="#">French</a></li>
                                    <li><a href="#"><img class="right-5" src="/public/frontend/img/flags/gb.png" alt="#">English</a></li>
                                    <li><a href="#"><img class="right-5" src="/public/frontend/img/flags/gb.png" alt="#">English</a></li>
                                </ul>
                            </li>
                        </ul>
                        <!-- End Language -->
                        <!-- Start Currency -->
                        <ul class="currency">
                            <li><a href="#"><strong>$</strong> USD<i class="fa fa-caret-down left-5"></i></a>
                                <ul>
                                    <li><a href="#">$ EUR</a></li>
                                    <li><a href="#">$ GBP</a></li>
                                    <li><a href="#">$ USD</a></li>
                                </ul>
                            </li>
                        </ul>
                        <!-- End Currency -->
                        <p class="welcome-msg">Default welcome msg!</p>
                    </div>
                    <!-- Start Top-Link -->
                    <div class="top-link">
                        <ul class="link">
                            <?php if (empty($_SESSION['user_login'])): ?>
                                <li><a href="/user/login"><i class="fa fa-share"></i>Login</a></li>
                            <?php endif;?>

                            <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin'): ?>
                                <li><a href="/admin"><i class="fa fa-user"></i>Admin</a></li>
                                <li><a href="/user/logout"><i class="fa fa-unlock-alt"></i>Logout</a></li>
                            <?php endif;?>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- HEADER-TOP END -->
    <!-- HEADER-MIDDLE START -->
    <div class="header-middle">
        <div class="container">
            <!-- Start Support-Client -->
            <div class="support-client hidden-xs">
                <div class="row">
                    <!-- Start Single-Support -->
                    <div class="col-md-3 hidden-sm">
                        <div class="single-support">
                            <div class="support-content">
                                <i class="fa fa-clock-o"></i>
                                <div class="support-text">
                                    <h1 class="zero gfont-1">working time</h1>
                                    <p>Mon- Sun: 8.00 - 18.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single-Support -->
                    <!-- Start Single-Support -->
                    <div class="col-md-3 col-sm-4">
                        <div class="single-support">
                            <i class="fa fa-truck"></i>
                            <div class="support-text">
                                <h1 class="zero gfont-1">Free shipping</h1>
                                <p>On order over $199</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single-Support -->
                    <!-- Start Single-Support -->
                    <div class="col-md-3 col-sm-4">
                        <div class="single-support">
                            <i class="fa fa-money"></i>
                            <div class="support-text">
                                <h1 class="zero gfont-1">Money back 100%</h1>
                                <p>Within 30 Days after delivery</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single-Support -->
                    <!-- Start Single-Support -->
                    <div class="col-md-3 col-sm-4">
                        <div class="single-support">
                            <i class="fa fa-phone-square"></i>
                            <div class="support-text">
                                <h1 class="zero gfont-1">Phone: 0123456789</h1>
                                <p>Order Online Now !</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single-Support -->
                </div>
            </div>
            <!-- End Support-Client -->
            <!-- Start logo & Search Box -->
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="logo">
                        <a href="/" title="Malias"><img src="/public/frontend/img/logo.png" alt="Malias"></a>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="quick-access">
                        <div class="search-by-category">
                            <div class="header-search">
                                <form action="search" method="get" autocomplete="off">
                                    <input type="text" class="typeahead" id="typeahead" name="search" placeholder="Search">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="top-cart">
                            <ul>
                                <li>
                                    <span class="cart-icon"><i class="fa fa-shopping-cart"></i></span>
                                        <span class="cart-total">
                                            <a href="/cart/show" onclick="getCart(); return false;">
                                            <?php if(!empty($_SESSION['cart'])): ?>
                                                <span class="top-cart-price">
                                                    <?php echo $_SESSION['cart.sum'];?>
                                                </span>
                                            <?php else: ?>
                                                <span class="top-cart-price">Корзина пуста</span>
                                            <?php endif; ?>
                                                 </a>
                                        </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End logo & Search Box -->
        </div>
    </div>
    <!-- HEADER-MIDDLE END -->
    <!-- START MAINMENU-AREA -->
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mainmenu hidden-sm hidden-xs">
                        <nav>
                            <ul>
                                <li><a href="index.html">Home</a>
                                    <ul>
                                        <li><a href="index.html">Home Versions 1</a></li>
                                        <li><a href="index-2.html">Home Versions 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="about.html">About Us</a></li>
                                <li class="hot"><a href="shop.html">Bestseller Products</a></li>
                                <li class="new"><a href="shop-list.html">New Products</a></li>
                                <li><a href="shop.html">Special Products</a></li>
                                <li><a href="#">Pages</a>
                                    <ul>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="account.html">Create Account</a></li>
                                        <li><a href="my-account.html">My Account</a></li>
                                        <li><a href="product-details.html">Product details</a></li>
                                        <li><a href="shop.html">Shop Grid View</a></li>
                                        <li><a href="shop-list.html">Shop List View</a></li>
                                        <li><a href="wishlist.html">Wish List</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN-MENU-AREA -->
    <!-- Start Mobile-menu -->
    <div class="mobile-menu-area hidden-md hidden-lg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <nav id="mobile-menu">
                        <ul>
                            <li><a href="index.html">Home</a>
                                <ul>
                                    <li><a href="index.html">Home Page 1</a></li>
                                    <li><a href="index-2.html">Home Page 2</a></li>
                                </ul>
                            </li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="shop.html">Bestseller Products</a></li>
                            <li><a href="shop-list.html">New Products</a></li>
                            <li><a href="#">Pages</a>
                                <ul>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="account.html">Create Account</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="product-details.html">Product details</a></li>
                                    <li><a href="shop.html">Shop Grid View</a></li>
                                    <li><a href="shop-list.html">Shop List View</a></li>
                                    <li><a href="wishlist.html">Wish List</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mobile-menu -->
</header>

<section class="page-content">
    <div class="container">
        <div class="row">

            <div class="col-md-3 col-sm-3">
                <div class="left-category-menu">
                    <div class="left-product-cat">
                        <div class="category-heading">
                            <h2>categories</h2>
                        </div>
                        <div class="category-menu-list">
                            <?php new \app\widgets\Menu\Menu([
                                'tpl' => MENU_TPL . 'menu.php',
                                'container' => 'ul',
                                'attrs' => ['id' => 'mega-1']
                            ]);?>
                        </div>
                    </div>
                </div>
                <?php
                    $router = new \engine\Router\Router();

                    if($router::getRouteController() == 'Catalog'){
                        getSidebar('catalog_sidebar');
                    }else{
                        getSidebar('main_sidebar');
                    }
                ?>
            </div>

            <div class="col-md-9">
                <?php echo $content; ?>
            </div>

        </div>
    </div>
    <!-- START SUBSCRIBE-AREA -->
    <div class="subscribe-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-5 col-xs-12">
                    <div class="social-media" style="text-align: center; float: none;">
                        <a href="#"><i class="fa fa-facebook fb"></i></a>
                        <a href="#"><i class="fa fa-google-plus gp"></i></a>
                        <a href="#"><i class="fa fa-twitter tt"></i></a>
                        <a href="#"><i class="fa fa-youtube yt"></i></a>
                        <a href="#"><i class="fa fa-linkedin li"></i></a>
                        <a href="#"><i class="fa fa-rss rs"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SUBSCRIBE-AREA -->
</section>
<!-- END HOME-PAGE-CONTENT -->
<!-- FOOTER-AREA START -->
<footer class="footer-area">
    <!-- Footer Start -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="footer-title">
                        <h5>My Account</h5>
                    </div>
                    <nav>
                        <ul class="footer-content">
                            <li><a href="my-account.html">My Account</a></li>
                            <li><a href="#">Order History</a></li>
                            <li><a href="wishlist">Wish List</a></li>
                            <li><a href="#">Search Terms</a></li>
                            <li><a href="#">Returns</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="footer-title">
                        <h5>Customer Service</h5>
                    </div>
                    <nav>
                        <ul class="footer-content">
                            <li><a href="contact.html">Contact Us</a></li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="#">Delivery Information</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xs-12 hidden-sm col-md-3">
                    <div class="footer-title">
                        <h5>Payment & Shipping</h5>
                    </div>
                    <nav>
                        <ul class="footer-content">
                            <li><a href="#">Brands</a></li>
                            <li><a href="#">Gift Vouchers</a></li>
                            <li><a href="#">Affiliates</a></li>
                            <li><a href="shop-list.html">Specials</a></li>
                            <li><a href="#">Search Terms</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="footer-title">
                        <h5>Payment & Shipping</h5>
                    </div>
                    <nav>
                        <ul class="footer-content box-information">
                            <li>
                                <i class="fa fa-home"></i><span>Towerthemes, 1234 Stret Lorem, LPA States, Libero</span>
                            </li>
                            <li>
                                <i class="fa fa-envelope-o"></i><p><a href="contact.html">admin@bootexperts.com</a></p>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <span>01234-56789</span> <br> <span> 01234-56789</span>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    <!-- Copyright-area Start -->
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright &copy; Взято с <a href="http://bayguzin.ru" target="_blank"> bayguzin.ru</a> All rights reserved.</p>
                        <div class="payment">
                            <a href="#"><img src="/public/frontend/img/payment.png" alt="Payment"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright-area End -->
</footer>
<!-- FOOTER-AREA END -->

<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Корзина</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
                <a href="/cart/view" type="button" class="btn btn-primary">Оформить заказ</a>
                <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>
            </div>
        </div>
    </div>
</div>

<script src="/public/frontend/js/jquery-1.11.3.min.js"></script>

<script src="/public/frontend/js/bootstrap.min.js"></script>

<script src="/public/backend/bower_components/bootstrap/js/modal.js"></script>
<script src="/public/frontend/js/wow.min.js"></script>
<script src="/public/frontend/js/jquery.meanmenu.js"></script>
<script src="/public/frontend/js/owl.carousel.min.js"></script>
<script src="/public/frontend/js/jquery.scrollUp.min.js"></script>
<script src="/public/frontend/js/countdon.min.js"></script>
<script src="/public/frontend/js/jquery-price-slider.js"></script>
<script src="/public/frontend/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script src="/public/frontend/js/plugins.js"></script>
<script src="/public/frontend/libs/jquery-vertical-mega-menu/js/jquery.dcverticalmegamenu.1.3.js"></script>
<script src="/public/frontend/libs/jquery-vertical-mega-menu/js/jquery.hoverIntent.minified.js"></script>

<script src="/public/frontend/js/main.js"></script>

<script src="/public/frontend/js/scripts.js"></script>

<script src="/public/frontend/js/my_js.js"></script>


</body>
</html>
