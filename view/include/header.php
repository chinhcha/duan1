<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from template.hasthemes.com/shome/shome/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Nov 2023 15:36:09 GMT -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Shome - Shoes eCommerce Website Template" />
  <meta name="keywords" content="footwear, shoes, modern, shop, store, ecommerce, responsive, e-commerce" />
  <meta name="author" content="codecarnival" />

  <title>Men's shoes TrendyCleat</title>

  <!--== Favicon ==-->
  <link rel="shortcut icon" href="assets/img/logoo.jpg" type="image/x-icon" />

  <!--== Google Fonts ==-->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400;1,500&amp;display=swap"
    rel="stylesheet">

  <!--== Bootstrap CSS ==-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <!--== Font Awesome Min Icon CSS ==-->
  <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
  <!--== Pe7 Stroke Icon CSS ==-->
  <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
  <!--== Swiper CSS ==-->
  <link href="assets/css/swiper.min.css" rel="stylesheet" />
  <!--== Fancybox Min CSS ==-->
  <link href="assets/css/fancybox.min.css" rel="stylesheet" />
  <!--== Aos Min CSS ==-->
  <link href="assets/css/aos.min.css" rel="stylesheet" />

  <!--== Main Style CSS ==-->
  <link href="./assets/css/style.css" rel="stylesheet" />

  <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

  <!--wrapper start-->
  <div class="wrapper">

    <!--== Start Header Wrapper ==-->
    <header class="main-header-wrapper position-relative">
      <div class="header-top">
        <div class="container pt--0 pb--0">
          <div class="row">
            <div class="col-12">
              <div class="header-top-align">
                <div class="header-top-align-start">
                  <div class="desc">
                    <p>Men's Shoes TrendyCleat</p>
                  </div>
                </div>
                <div class="header-top-align-end">
                  <div class="header-info-items">
                    <div class="info-items">
                      <ul>
                        <li class="number"><i class="fa fa-phone"></i><a href="tel://0123456789">0978401708</a>
                        </li>
                        <li class="email"><i class="fa fa-envelope"></i><a
                            href="mailto://demo@example.com">trendycleat@gmail.com</a></li>
                            <?php if(!isset($_SESSION['username'])){?>
                        <li class="account"><i class="fa fa-user"></i><a href="index.php?act=dangnhap">Account</a></li>
                        <?php }  else { ?>

                          <li class="account"><i class="fa fa-user"></i><a href="index.php?act=dangnhap"><?= $_SESSION['username']['name_tk']?></a></li>


                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="header-middle">
        <div class="container pt--0 pb--0">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="header-middle-align">
                <div class="header-middle-align-start">
                  <div class="header-logo-area">
                    <a href="index.php">
                      <img class="logo-main" src="assets/img/logoo.jpg" width="70px" height="50px" alt="Logo"
                        style="border-radius:50%;" />
                      <img class="logo-light" src="assets/img/logo-light.webp" width="131" height="34" alt="Logo" />
                    </a>
                  </div>
                </div>
                <div class="header-middle-align-center">
                  <div class="header-search-area">
                    <form class="header-searchbox" action="index.php?act=trangsp" method="post">
                      <input type="search" name="kyw" class="form-control" placeholder="Search">
                      <button class="btn-submit" name="search" type="submit"><i class="pe-7s-search"></i></button>
                    </form>
                  </div>
                </div>
                <div class="header-middle-align-end">
                  <div class="header-action-area">
                    <div class="shopping-search">
                      <button class="shopping-search-btn" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#AsideOffcanvasSearch" aria-controls="AsideOffcanvasSearch"><i
                          class="pe-7s-search icon"></i></button>
                    </div>
                    <div class="shopping-wishlist">
                      <a class="shopping-wishlist-btn" href="shop-wishlist.html">
                        <i class="pe-7s-like icon"></i>
                      </a>
                    </div>
                    <div class="shopping-cart">
                      <a href="?act=cart"><button class="shopping-cart-btn">
                        <i class="pe-7s-shopbag icon"></i>
                        <sup class="shop-count" id="shop-count"><?= isset($_SESSION['cart'])? count($_SESSION['cart']):0 ?></sup>
                      </button></a>
                    </div>
                    <button class="btn-menu" type="button" data-bs-toggle="offcanvas"
                      data-bs-target="#AsideOffcanvasMenu" aria-controls="AsideOffcanvasMenu">
                      <i class="pe-7s-menu"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="header-area header-default">
        <div class="container-fluid p-0">
          <div class="row no-gutter align-items-center position-relative">
            <div class="col-12">
              <div class="header-align">
                <div class="header-navigation-area position-relative">
                  <ul class="main-menu nav">
                    <li class="has-submenu"><a href="index.php"><span>Home</span></a>
                      <!-- <ul class="submenu-nav">
                        <li><a href="index.html"><span>Home One</span></a></li>
                        <li><a href="index-two.html"><span>Home Two</span></a></li>
                      </ul> -->
                    </li>
                    <li><a href="index.php?act=about-us"><span>About</span></a></li>
                    <li class="has-submenu position-relative"><a href="#/"><span>Shop</span></a>
                      <ul class="submenu-nav ">
                        <li class="mega-menu-item"><a href="index.php?act=trangsp" class="mega-title"><span>Sản phẩm HOT</span></a>
                          <ul>
                            <li><a href="index.php?act=trangsp"><span>Siêu sale</span></a></li>
                            <li><a href="index.php?act=trangsp"><span>Giày mới về</span></a></li>
                            <li><a href="index.php?act=trangsp"><span>Hàng đắt tiền</span></a></li>
                            <li><a href="index.php?act=trangsp"><span>Hàng rẻ tiền </span></a></li>
                          </ul>
                        </li>
                        
                        <!-- <li class="mega-menu-item"><a href="#/" class="mega-title"><span>Single Product</span></a>
                          <ul>
                            <li><a href="single-normal-product.html"><span>Single Product Normal</span></a></li>
                            <li><a href="single-product.html"><span>Single Product Variable</span></a></li>
                            <li><a href="single-group-product.html"><span>Single Product Group</span></a></li>
                            <li><a href="single-affiliate-product.html"><span>Single Product Affiliate</span></a></li>
                          </ul>
                        </li>
                        <li class="mega-menu-item"><a href="#/" class="mega-title"><span>Others Pages</span></a>
                          <ul>
                            <li><a href="shop-cart.html"><span>Shopping Cart</span></a></li>
                            <li><a href="shop-checkout.html"><span>Checkout</span></a></li>
                            <li><a href="shop-wishlist.html"><span>Wishlist</span></a></li>
                            <li><a href="shop-compare.html"><span>Compare</span></a></li>
                          </ul>
                        </li> -->
                      </ul>
                    </li>
                    <!-- <li class="has-submenu"><a href="#/"><span>Blog</span></a>
                      <ul class="submenu-nav ">
                        <li class="mega-menu-item"><a href="#/" class="mega-title">Blog Layout</a>
                          <ul>
                            <li><a href="blog.html">Blog Grid</a></li>
                            <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                            <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                          </ul>
                        </li>
                         <li class="mega-menu-item"><a href="#/" class="mega-title">Single Blog</a>
                          <ul>
                            <li><a href="blog-details-no-sidebar.html">Blog Details</a></li>
                            <li><a href="blog-details-left-sidebar.html">Blog Details Left Sidebar</a></li>
                            <li><a href="blog-details.html">Blog Details Right Sidebar</a></li>
                          </ul>
                        </li> 
                      </ul>
                    </li> -->
                    <li><a href="index.php?act=contact"><span>Contact</span></a></li>
                    <li class="has-submenu"><a href="#/"><span>Account</span></a>
                      <ul class="submenu-nav">
                        <?php if(isset($_SESSION['username'])){
                          echo ' <li><a href="index.php?act=taikhoan"><span>Account</span></a></li>';
                          }?>
                       
                        <li><a href="index.php?act=dangnhap"><span>Login</span></a></li>
                        <li><a href="index.php?act=dangky"><span>Register</span></a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!--== End Header Wrapper ==-->