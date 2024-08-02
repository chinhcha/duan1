<main class="main-content">
  <!--== Start Page Header Area Wrapper ==-->
  <div class="page-header-area" data-bg-img="assets/img/photos/banner_con.png">
    <div class="container pt--0 pb--0">
      <div class="row">
        <div class="col-12">
          <div class="page-header-content">
            <!-- <h2 class="title" data-aos="fade-down" data-aos-duration="1000" style="color:#813E3E">Product Details</h2> -->
            <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
              <ul class="breadcrumb">
                <li><a href="index.html" style="color:#813E3E; padding-left: 20px">Home</a></li>
                <li class="breadcrumb-sep">//</li>
                  <li>CHI TIẾT SẢN PHẨM</li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--== End Page Header Area Wrapper ==-->

  <!--== Start Product Single Area Wrapper ==-->
  <section class="product-area product-single-area">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="product-single-item">
            <div class="row">
              <div class="col-xl-6">
                <!--== Start Product Thumbnail Area ==-->
                <div class="product-single-thumb">
                  <div class="swiper-container single-product-thumb single-product-thumb-slider">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <a class="lightbox-image" data-fancybox="gallery" href="./public/uploads/<?= $sp['image_sp'] ?>">
                          <img src="./public/uploads/<?= $sp['image_sp'] ?>" width="570" height="541" alt="Image-HasTech">
                        </a>
                      </div>
                      <?php foreach ($hinh_sp as $hinh) { ?>
                      <div class="swiper-slide">
                        <a class="lightbox-image" data-fancybox="gallery" href="./public/uploads/<?= $hinh['img_url'] ?>">
                          <img src="./public/uploads/<?= $hinh['img_url'] ?>" style="height: 570px;" alt="Image-HasTech">
                        </a>
                      </div> 
                      <?php } ?>
                      <!--
                      <div class="swiper-slide">
                        <a class="lightbox-image" data-fancybox="gallery" href="assets/img/shop/product-single/3.webp">
                          <img src="assets/img/shop/product-single/3.webp" width="570" height="541" alt="Image-HasTech">
                        </a>
                      </div>
                      <div class="swiper-slide">
                        <a class="lightbox-image" data-fancybox="gallery" href="assets/img/shop/product-single/4.webp">
                          <img src="assets/img/shop/product-single/4.webp" width="570" height="541" alt="Image-HasTech">
                        </a>
                      </div>
                      <div class="swiper-slide">
                        <a class="lightbox-image" data-fancybox="gallery" href="assets/img/shop/product-single/5.webp">
                          <img src="assets/img/shop/product-single/5.webp" width="570" height="541" alt="Image-HasTech">
                        </a>
                      </div> -->
                    </div>
                  </div>
                  <div class="swiper-container single-product-nav single-product-nav-slider">
                    <div class="swiper-wrapper">
                     
                        <div class="swiper-slide">
                          <img src="./public/uploads/<?= $sp['image_sp'] ?>" width="127px" height="127px" alt="Image-HasTech">
                        </div>
                        <?php foreach ($hinh_sp as $hinh) { ?>
                      
                       <div class="swiper-slide">
                          <img src="./public/uploads/<?= $hinh['img_url'] ?>" style="width:127px;  height: 127px;" alt="Image-HasTech">
                        </div>
                        <?php } ?>
                        <!--
                        <div class="swiper-slide">
                          <img src="./public/uploads/>" width="127" height="127" alt="Image-HasTech">
                        </div>
                        <div class="swiper-slide">
                          <img src="./public/uploads/>" width="127" height="127" alt="Image-HasTech">
                        </div>
                        <div class="swiper-slide">
                          <img src="./public/uploads/>" width="127" height="127" alt="Image-HasTech">
                        </div> -->
                    </div>
                  </div>
                </div>
                <!--== End Product Thumbnail Area ==-->
              </div>
              
              <div class="col-xl-6">
                <!--== Start Product Info Area ==-->
                <div class="product-single-info">
                  <h3 class="main-title"><?= $sp['name_sp'] ?></h3>
                  <div class="prices">
                    <span class="price"><?php
                                  $gia = $sp['gia'] - $sp['gia'] * ($sp['giam_gia'] * 0.01);
                                  echo $gia =number_format((int)$gia, 0, ',' ,'.');
                              ?><sup>đ</sup></span>
                  </div>
                  <div class="rating-box-wrap">
                    <div class="rating-box">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                    <div class="review-status">
                      <a href="javascript:void(0)">(5 Customer Review)</a>
                    </div>
                  </div>
                  <p><?= $sp['mo_ta'] ?></p>
                  <div class="product-color">
                    <h6 class="title">Color</h6>
                    <ul class="color-list">
                      <li data-bg-color="#586882"></li>
                      <li class="active" data-bg-color="#505050"></li>
                      <li data-bg-color="#73707a"></li>
                      <li data-bg-color="#c7bb9b"></li>
                    </ul>
                  </div>
                  <div class="product-size">
                    <h6 class="title">Size</h6>
                    <ul class="size-list">
                      <li>S</li>
                      <li class="active">M</li>
                      <li>L</li>
                      <li>XL</li>
                    </ul>
                  </div>
                  <div class="product-quick-action">
                    <div class="qty-wrap">
                      <div class="pro-qty">
                        <input type="hidden" id=sl value="">
                        <input type="text" title="Quantity" value="1">
                      </div>
                    </div>
                    <a class="btn-theme" href="?act=cart" data-id="<?= $sp['id_sp']?>" onclick="addToCart(<?=$sp['id_sp']?>, '<?= $sp['name_sp']?>', <?= $sp['gia']?>)">Add to Cart</a>
                  </div>
                  <div class="product-wishlist-compare">
                    <!-- <a href="shop-wishlist.html"><i class="pe-7s-like"></i>Add to Wishlist</a>
                    <a href="shop-compare.html"><i class="pe-7s-shuffle"></i>Add to Compare</a> -->
                  </div>
                  <div class="product-info-footer">
                    <h6 class="code"><span>Code :</span>Ch-256xl</h6>
                    <div class="social-icons">
                      <span>Share</span>
                      <a href="#/"><i class="fa fa-facebook"></i></a>
                      <a href="#/"><i class="fa fa-dribbble"></i></a>
                      <a href="#/"><i class="fa fa-pinterest-p"></i></a>
                    </div>
                  </div>
                </div>
                <!--== End Product Info Area ==-->
              </div>
              
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="product-review-tabs-content">
            <ul class="nav product-tab-nav" id="ReviewTab" role="tablist">
              <li role="presentation">
                <a class="active" id="information-tab" data-bs-toggle="pill" href="#information" role="tab" aria-controls="information" aria-selected="true">Information</a>
              </li>
              <!-- <li role="presentation">
                  <a id="description-tab" data-bs-toggle="pill" href="#description" role="tab" aria-controls="description" aria-selected="false">Description</a>
                </li> -->
              <li role="presentation">
                <a id="reviews-tab" data-bs-toggle="pill" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Comments <span>(<?= $tong = count($loadbinhluan) ?>)</span></a>
              </li>
            </ul>
            <div class="tab-content product-tab-content" id="ReviewTabContent">
              <div class="tab-pane fade show active" id="information" role="tabpanel" aria-labelledby="information-tab">
                <div class="product-information">
                  <p><?= $sp['mo_ta'] ?></p>
                </div>
              </div>
              <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                <!-- <div class="product-description">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim adlo minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in tun tuni reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserun mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rel aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
                  </div> -->
              </div>
              <?php include ('binhluan.php')?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--== End Product Single Area Wrapper ==-->

  <!--== Start Product Area Wrapper ==-->
  <section class="product-area product-best-seller-area">
    <div class="container pt--0">
      <div class="row">
        <div class="col-12">
          <div class="section-title text-center">
            <h3 class="title">Related Products</h3>
            <div class="desc">
              <p>There are many variations of passages of Lorem Ipsum available</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="product-slider-wrap">
            <div class="swiper-container product-slider-col4-container">
              <div class="swiper-wrapper">
              <?php foreach($sanpham as $sp) :?>
                <div class="swiper-slide">
                  <!--== Start Product Item ==-->
                  
                  <div class="product-item">
                    <div class="inner-content">
                      <div class="product-thumb">
                        <a href="index.php?act=chitietsp&id_sp=<?=$sp['id_sp']?>">
                          <img src="./public/uploads/<?=$sp['image_sp']?>" style="height: 266.8px;" alt="Image-HasTech">
                        </a>
                        <div class="product-flag">
                          <ul>
                            <li class="discount"><?=$sp['giam_gia']?>%</li>
                          </ul>
                        </div>
                        <div class="product-action">
                          <a class="btn-product-wishlist" href="shop-wishlist.html"><i class="fa fa-heart"></i></a>
                          <a class="btn-product-cart" href="index.php?act=cart"><i class="fa fa-shopping-cart"></i></a>
                          <button type="button" class="btn-product-quick-view-open">
                            <i class="fa fa-arrows"></i>
                          </button>
                          <a class="btn-product-compare" href="#"><i class="fa fa-random"></i></a>
                        </div>
                        <a class="banner-link-overlay" href="index.php?act=trangsp"></a>
                      </div>
                      <div class="product-info">
                        <div class="category">
                        </div>
                        <h4 class="title"><a href="index.php?act=chitietsp&id_sp=<?=$sp['id_sp']?>"><?=$sp['name_sp']?></a></h4>
                        <div class="prices">
                          <span class="price-old"><?= number_format((int)$sp['gia'], 0, ',' ,'.')?><sup>đ</sup></span>
                          <span class="sep">-</span>
                          <span class="price"><?php
                                  $gia = $sp['gia'] - $sp['gia'] * ($sp['giam_gia'] * 0.01);
                                  echo $gia =number_format((int)$gia, 0, ',' ,'.');
                              ?><sup>đ</sup></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!--== End prPduct Item ==-->
                </div>
                <?php endforeach ;?>
              </div>
            </div>
            <!--== Add Swiper Arrows ==-->
            <div class="product-swiper-btn-wrap">
              <div class="product-swiper-btn-prev">
                <i class="fa fa-arrow-left"></i>
              </div>
              <div class="product-swiper-btn-next">
                <i class="fa fa-arrow-right"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--== End Product Area Wrapper ==-->
</main>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
  let totalProduct = document.getElementsByClassName('shop-count');
  function addToCart(id_sp,name_sp,gia){
   console.log(id_sp,name_sp,gia);
    // Sử dụng Jquery
    $.ajax({
      type: 'POST',
      // dẫn tới file php sử lí dữ liệu
      url: "./view/addToCart.php",
      data:{
          id:id_sp,
          name:name_sp,
          gia :gia
      },
      success:function(response){
        totalProduct.innerText = response;
        alert('Bạn đã thêm sản phẩm thành công!')
      },
      error:function(error){
        console.log(error);
      }
    });
  }
</script>