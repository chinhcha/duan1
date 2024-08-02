
<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area" data-bg-img="assets/img/photos/bg3.webp">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Product Page</h2>
              <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                <ul class="breadcrumb">
                  <li><a href="index.html">Home</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>TRANG SẢN PHẨM</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <section class="product-area product-default-area">
      <div class="container">
        <div class="row flex-xl-row-reverse justify-content-between">
          <div class="col-xl-9">
            <div class="row">
              <div class="col-12">
                <div class="shop-top-bar">
                  <div class="shop-top-left">
                    <p class="pagination-line">PRODUCTS</p>
                  </div>
                  <div class="shop-top-center">
                    <nav class="product-nav">
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true"><i class="fa fa-th"></i></button>
                        <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false"></button>
                      </div>
                    </nav>
                  </div>
                  <!-- <div class="shop-top-right">
                    <div class="shop-sort">
                      <span>Sort By :</span>
                      <select class="form-select" aria-label="Sort select example">
                        <option selected>Default</option>
                        <option value="1">Popularity</option>
                        <option value="2">Average Rating</option>
                        <option value="3">Newsness</option>
                        <option value="4">Price Low to High</option>
                      </select>
                    </div>
                  </div> -->
                </div>
              </div>
              <div class="col-12">
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                    <div class="row">
                    <?php foreach($sanpham as $sp): ?>
              
              <div class="col-sm-6 col-lg-4">
                <!--== Start Product Item ==-->
                <div class="product-item">
                  <div class="inner-content">
                    <div class="product-thumb">
                      <a href="index.php?act=chitietsp&id_sp=<?= $sp['id_sp']?>">
                        <img src="public/uploads/<?=$sp['image_sp']?>" style="height: 266.8px;" alt="Image-HasTech">
                      </a>
                      <div class="product-flag">
                        <ul>
                          <li class="discount"><?= $sp['giam_gia']?>%</li>
                        </ul>
                      </div>
                      <div class="product-action">
                        <a class="btn-product-wishlist" href="shop-wishlist.html"><i class="fa fa-heart"></i></a>
                        <a class="btn-product-cart" href="index.php?act=cart"><i class="fa fa-shopping-cart"></i></a>
                        <button type="button" class="btn-product-quick-view-open">
                          <i class="fa fa-arrows"></i>
                        </button>
                        <a class="btn-product-compare" href="index.php?act=chitietsp&id_sp=<?= $sp['id_sp']?>"><i class="fa fa-random"></i></a>
                      </div>
                      <a class="banner-link-overlay" href="index.php?act=chitietsp&id_sp=<?= $sp['id_sp']?>"></a>
                    </div>
                    <div class="product-info">
                      <div class="category">
                        <ul>
                          <li><a href="index.php?act=chitietsp&id_sp=<?= $sp['id_sp']?>"><?= $sp['gioi_tinh']?></a></li>
                      </div>
                      <h4 class="title"><a href="iindex.php?act=chitietsp&id_sp=<?= $sp['id_sp']?>"><?= $sp['name_sp']?></a></h4>
                      <div class="prices">
                        <span class="price-old"><?= number_format((int)$sp['gia'], 0, ',' ,'.')?><sup>đ</sup></span>
                        <span class="sep">-</span>
                        <span class="price" >
                        <span class="price">
                        <?php
                                  $gia = $sp['gia'] - $sp['gia'] * ($sp['giam_gia'] * 0.01);
                                  echo $gia =number_format((int)$gia, 0, ',' ,'.');
                              ?><sup>đ</sup></span>
                        </span>
                      </div>
                      <div class="ngaynhap">
                        <span ><?= $sp['ngay_nhap']?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <!--== End prPduct Item ==-->
              </div>
              <?php endforeach ; ?>
                      <div class="col-12">
                        <!-- <div class="pagination-items">
                        <ul class="pagination justify-content-end mb--0">
                            <li><a class="active" href="shop.html">1</a></li>
                            <li><a href="shop-four-columns.html">2</a></li>
                            <li><a href="shop-three-columns.html">3</a></li>
                          </ul>                    
                        </div> -->
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                    <div class="row">
                      <div class="col-md-12">
                        <!--== Start Product Item ==-->
                        <div class="product-item product-list-item">
                          <div class="inner-content">
                            <div class="product-thumb">
                              <a href="single-product.html">
                                <img src="assets/img/shop/list-1.webp" width="322" height="360" alt="Image-HasTech">
                              </a>
                              <div class="product-flag">
                                <ul>
                                  <li class="discount">-10%</li>
                                </ul>
                              </div>
                              <div class="product-action">
                    <a class="btn-product-wishlist" href="shop-wishlist.html"><i class="fa fa-heart"></i></a>
                    <a class="btn-product-cart" href="shop-cart.html"><i class="fa fa-shopping-cart"></i></a>
                    <button type="button" class="btn-product-quick-view-open">
                      <i class="fa fa-arrows"></i>
                    </button>
                    <a class="btn-product-compare" href="shop-compare.html"><i class="fa fa-random"></i></a>
                  </div>
                              <a class="banner-link-overlay" href="shop.html"></a>
                            </div>
                            <div class="product-info">
                              <div class="category">
                                <ul>
                                  <li><a href="shop.html">Men</a></li>
                                  <li class="sep">/</li>
                                  <li><a href="shop.html">Women</a></li>
                                </ul>
                              </div>
                              <h4 class="title"><a href="single-product.html">Leather Mens Slipper</a></h4>
                              <div class="prices">
                                <span class="price-old">$300</span>
                                <span class="sep">-</span>
                                <span class="price">$240.00</span>
                              </div>
                              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quo, rerum rem soluta quisquam, repellat is deleniti omnis culpa ea quis provident dolore esse, offici modi dolorem nam cum eligendi enim!</p>
                              <a class="btn-theme btn-sm" href="shop-cart.html">Add To Cart</a>
                            </div>
                          </div>
                        </div>
                        <!--== End prPduct Item ==-->
                      </div>
                      <div class="col-md-12">
                        <!--== Start Product Item ==-->
                        <div class="product-item product-list-item">
                          <div class="inner-content">
                            <div class="product-thumb">
                              <a href="single-product.html">
                                <img src="assets/img/shop/list-2.webp" width="322" height="360" alt="Image-HasTech">
                              </a>
                              <div class="product-action">
                    <a class="btn-product-wishlist" href="shop-wishlist.html"><i class="fa fa-heart"></i></a>
                    <a class="btn-product-cart" href="shop-cart.html"><i class="fa fa-shopping-cart"></i></a>
                    <button type="button" class="btn-product-quick-view-open">
                      <i class="fa fa-arrows"></i>
                    </button>
                    <a class="btn-product-compare" href="shop-compare.html"><i class="fa fa-random"></i></a>
                  </div>
                              <a class="banner-link-overlay" href="shop.html"></a>
                            </div>
                            <div class="product-info">
                              <div class="category">
                                <ul>
                                  <li><a href="shop.html">Men</a></li>
                                  <li class="sep">/</li>
                                  <li><a href="shop.html">Women</a></li>
                                </ul>
                              </div>
                              <h4 class="title"><a href="single-product.html">Quickiin Mens shoes</a></h4>
                              <div class="prices">
                                <span class="price">$240.00</span>
                              </div>
                              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quo, rerum rem soluta quisquam, repellat is deleniti omnis culpa ea quis provident dolore esse, offici modi dolorem nam cum eligendi enim!</p>
                              <a class="btn-theme btn-sm" href="shop-cart.html">Add To Cart</a>
                            </div>
                          </div>
                        </div>
                        <!--== End prPduct Item ==-->
                      </div>
                      <div class="col-md-12">
                        <!--== Start Product Item ==-->
                        <div class="product-item product-list-item">
                          <div class="inner-content">
                            <div class="product-thumb">
                              <a href="single-product.html">
                                <img src="assets/img/shop/list-3.webp" width="322" height="360" alt="Image-HasTech">
                              </a>
                              <div class="product-flag">
                                <ul>
                                  <li class="discount">-10%</li>
                                </ul>
                              </div>
                              <div class="product-action">
                    <a class="btn-product-wishlist" href="shop-wishlist.html"><i class="fa fa-heart"></i></a>
                    <a class="btn-product-cart" href="shop-cart.html"><i class="fa fa-shopping-cart"></i></a>
                    <button type="button" class="btn-product-quick-view-open">
                      <i class="fa fa-arrows"></i>
                    </button>
                    <a class="btn-product-compare" href="shop-compare.html"><i class="fa fa-random"></i></a>
                  </div>
                              <a class="banner-link-overlay" href="shop.html"></a>
                            </div>
                            <div class="product-info">
                              <div class="category">
                                <ul>
                                  <li><a href="shop.html">Men</a></li>
                                  <li class="sep">/</li>
                                  <li><a href="shop.html">Women</a></li>
                                </ul>
                              </div>
                              <h4 class="title"><a href="single-product.html">Rexpo Womens shoes</a></h4>
                              <div class="prices">
                                <span class="price-old">$300</span>
                                <span class="sep">-</span>
                                <span class="price">$240.00</span>
                              </div>
                              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quo, rerum rem soluta quisquam, repellat is deleniti omnis culpa ea quis provident dolore esse, offici modi dolorem nam cum eligendi enim!</p>
                              <a class="btn-theme btn-sm" href="shop-cart.html">Add To Cart</a>
                            </div>
                          </div>
                        </div>
                        <!--== End prPduct Item ==-->
                      </div>
                      <div class="col-md-12">
                        <!--== Start Product Item ==-->
                        <div class="product-item product-list-item">
                          <div class="inner-content">
                            <div class="product-thumb">
                              <a href="single-product.html">
                                <img src="assets/img/shop/list-4.webp" width="322" height="360" alt="Image-HasTech">
                              </a>
                              <div class="product-action">
                    <a class="btn-product-wishlist" href="shop-wishlist.html"><i class="fa fa-heart"></i></a>
                    <a class="btn-product-cart" href="shop-cart.html"><i class="fa fa-shopping-cart"></i></a>
                    <button type="button" class="btn-product-quick-view-open">
                      <i class="fa fa-arrows"></i>
                    </button>
                    <a class="btn-product-compare" href="shop-compare.html"><i class="fa fa-random"></i></a>
                  </div>
                              <a class="banner-link-overlay" href="shop.html"></a>
                            </div>
                            <div class="product-info">
                              <div class="category">
                                <ul>
                                  <li><a href="shop.html">Men</a></li>
                                  <li class="sep">/</li>
                                  <li><a href="shop.html">Women</a></li>
                                </ul>
                              </div>
                              <h4 class="title"><a href="single-product.html">Modern Smart Shoes</a></h4>
                              <div class="prices">
                                <span class="price">$240.00</span>
                              </div>
                              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quo, rerum rem soluta quisquam, repellat is deleniti omnis culpa ea quis provident dolore esse, offici modi dolorem nam cum eligendi enim!</p>
                              <a class="btn-theme btn-sm" href="shop-cart.html">Add To Cart</a>
                            </div>
                          </div>
                        </div>
                        <!--== End prPduct Item ==-->
                      </div>
                      <div class="col-md-12">
                        <!--== Start Product Item ==-->
                        <div class="product-item product-list-item">
                          <div class="inner-content">
                            <div class="product-thumb">
                              <a href="single-product.html">
                                <img src="assets/img/shop/list-5.webp" width="322" height="360" alt="Image-HasTech">
                              </a>
                              <div class="product-flag">
                                <ul>
                                  <li class="discount">-10%</li>
                                </ul>
                              </div>
                              <div class="product-action">
                    <a class="btn-product-wishlist" href="shop-wishlist.html"><i class="fa fa-heart"></i></a>
                    <a class="btn-product-cart" href="shop-cart.html"><i class="fa fa-shopping-cart"></i></a>
                    <button type="button" class="btn-product-quick-view-open">
                      <i class="fa fa-arrows"></i>
                    </button>
                    <a class="btn-product-compare" href="shop-compare.html"><i class="fa fa-random"></i></a>
                  </div>
                              <a class="banner-link-overlay" href="shop.html"></a>
                            </div>
                            <div class="product-info">
                              <div class="category">
                                <ul>
                                  <li><a href="shop.html">Men</a></li>
                                  <li class="sep">/</li>
                                  <li><a href="shop.html">Women</a></li>
                                </ul>
                              </div>
                              <h4 class="title"><a href="single-product.html">Primitive Mens shoes</a></h4>
                              <div class="prices">
                                <span class="price">$240.00</span>
                              </div>
                              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quo, rerum rem soluta quisquam, repellat is deleniti omnis culpa ea quis provident dolore esse, offici modi dolorem nam cum eligendi enim!</p>
                              <a class="btn-theme btn-sm" href="shop-cart.html">Add To Cart</a>
                            </div>
                          </div>
                        </div>
                        <!--== End prPduct Item ==-->
                      </div>
                      <div class="col-md-12">
                        <!--== Start Product Item ==-->
                        <div class="product-item product-list-item">
                          <div class="inner-content">
                            <div class="product-thumb">
                              <a href="single-product.html">
                                <img src="assets/img/shop/list-6.webp" width="322" height="360" alt="Image-HasTech">
                              </a>
                              <div class="product-action">
                    <a class="btn-product-wishlist" href="shop-wishlist.html"><i class="fa fa-heart"></i></a>
                    <a class="btn-product-cart" href="shop-cart.html"><i class="fa fa-shopping-cart"></i></a>
                    <button type="button" class="btn-product-quick-view-open">
                      <i class="fa fa-arrows"></i>
                    </button>
                    <a class="btn-product-compare" href="shop-compare.html"><i class="fa fa-random"></i></a>
                  </div>
                              <a class="banner-link-overlay" href="shop.html"></a>
                            </div>
                            <div class="product-info">
                              <div class="category">
                                <ul>
                                  <li><a href="shop.html">Men</a></li>
                                  <li class="sep">/</li>
                                  <li><a href="shop.html">Women</a></li>
                                </ul>
                              </div>
                              <h4 class="title"><a href="single-product.html">Leather Mens Slipper</a></h4>
                              <div class="prices">
                                <span class="price-old">$300</span>
                                <span class="sep">-</span>
                                <span class="price">$240.00</span>
                              </div>
                              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem quo, rerum rem soluta quisquam, repellat is deleniti omnis culpa ea quis provident dolore esse, offici modi dolorem nam cum eligendi enim!</p>
                              <a class="btn-theme btn-sm" href="shop-cart.html">Add To Cart</a>
                            </div>
                          </div>
                        </div>
                        <!--== End prPduct Item ==-->
                      </div>
                      <!-- <div class="col-12">
                        <div class="pagination-items">
                          <ul class="pagination justify-content-end mb--0">
                            <li><a class="active" href="shop.html">1</a></li>
                            <li><a href="shop-four-columns.html">2</a></li>
                            <li><a href="shop-three-columns.html">3</a></li>
                          </ul>                    
                        </div>
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php include"include/side-bar.php"?>
        </div>
      </div>
    </section>
    <!--== End Product Area Wrapper ==-->
  </main>