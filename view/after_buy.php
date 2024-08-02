<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area" data-bg-img="assets/img/photos/banner.jpg">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title" data-aos="fade-down" data-aos-duration="1000">ĐẶT HÀNG THÀNH CÔNG</h2>
              <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
              
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
            <h2 style="text-align: center; color:brown">CẢM ƠN BẠN ĐÃ MUA HÀNG</h2>
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
              <h3 class="title">Products you may like</h3>
              <div class="desc">
                <p>You can buy more products here</p>
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