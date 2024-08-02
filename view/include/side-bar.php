<div class="col-xl-3">
            <div class="shop-sidebar">
              <div class="shop-sidebar-category">
                <h4 class="sidebar-title">Top Categories</h4>
                <?php foreach($ds_dm as $dm):?>
                <div class="sidebar-category">
                  <ul class="category-list mb--0">
                    <li><a href="index.php?act=trangsp&id_dm=<?=$dm['id_dm']?>"><?=$dm['name_dm']?><span>(<?=$dm['tong_sp']?>)</span></a></li>

                  </ul>
                </div>
                <?php endforeach ;?>
              </div>

              <div class="shop-sidebar-price-range">
                <h4 class="sidebar-title">Price Filter</h4>
                <div class="sidebar-price-range">   
                  <div id="price-range"></div>
                </div>
              </div>

              <!-- <div class="shop-sidebar-color">
                <h4 class="sidebar-title">Color</h4>
                <div class="sidebar-color">
                  <ul class="color-list">
                    <li data-bg-color="#39ed8c" class="active"></li>
                    <li data-bg-color="#a6ed42"></li>
                    <li data-bg-color="#daed39"></li>
                    <li data-bg-color="#eed739"></li>
                    <li data-bg-color="#eca23a"></li>
                    <li data-bg-color="#f36768"></li>
                    <li data-bg-color="#e14755"></li>
                    <li data-bg-color="#dc83a3"></li>
                    <li data-bg-color="#dc82da"></li>
                    <li data-bg-color="#9a82dd"></li>
                    <li data-bg-color="#82c2db"></li>
                    <li data-bg-color="#6bd6b0"></li>
                    <li data-bg-color="#9ed76b"></li>
                    <li data-bg-color="#c8c289"></li>
                  </ul>
                </div>
              </div> -->

              <!-- <div class="shop-sidebar-size">
                <h4 class="sidebar-title">Size</h4>
                <div class="sidebar-size">
                  <ul class="size-list">
                    <li><a href="shop.html">S <span>(6)</span></a></li>
                    <li><a href="shop.html">M <span>(4)</span></a></li>
                    <li><a href="shop.html">L <span>(2)</span></a></li>
                    <li><a href="shop.html">XL <span>(6)</span></a></li>
                    <li><a href="shop.html">XXL <span>(12)</span></a></li>
                  </ul>
                </div>
              </div> -->

              <!-- <div class="shop-sidebar-brand">
                <h4 class="sidebar-title">Brand</h4>
                <div class="sidebar-brand">
                  <ul class="brand-list mb--0">
                    <li><a href="shop.html">Lakmeetao <span>(6)</span></a></li>
                    <li><a href="shop.html">Beautifill <span>(4)</span></a></li>
                    <li><a href="shop.html">Made In GD <span>(2)</span></a></li>
                    <li><a href="shop.html">Pecifico <span>(6)</span></a></li>
                    <li><a href="shop.html">Xlovgtir <span>(12)</span></a></li>
                  </ul>
                </div>
              </div> -->
            </div>
          </div>