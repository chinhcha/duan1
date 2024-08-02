<?php
session_start();

include "../model/pdo.php";
include "../model/sanpham.php";
include "../model/thongke.php";
include "../model/danhmuc.php";


if(!empty($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
    $dataDb =  $cart;
    // tạo mảng chứa ID sp trong giỏ hàng
    $productId= array_column($cart, 'id_sp');

    // Chuyển mảng id thành 1 chuỗi để thực hiện truy vấn
    $idList = implode(',', $productId);

    // Lấy sp trong bảng sp theo id
    $dataDb = loadone_sanphamCart($idList);
    // var_dump($dataDb);
}
?>
<div class="row">
          <div class="col-md-12">
            <div class="shopping-cart-form table-responsive">
              <form action="?act=cart" method="post">
                <table class="table text-center">
                  <thead>
                    <tr>
                      <th class="product-remove">&nbsp;</th>
                      <th class="product-thumb">&nbsp;</th>
                      <th class="product-name">Product</th>
                      <th class="product-price">Price</th>
                      <th class="product-quantity">Quantity</th>
                      <th class="product-subtotal">Total</th>
                    </tr>
                  </thead>
                  <?php 
                  if(empty($dataDb)){
                    echo "<h1>NO PRODUCTS HAVE BEEN ADDED TO THE CART</h1>";
                  }else {
                    ?>
                  <tbody >
                    <?php 
                    $sum_total = 0;
                    foreach($dataDb as $key => $product) : 
                    // kiểm tra số lượng sp trong giỏ hàng
                   
                      $quantityInCart = 0;
                      foreach($_SESSION['cart'] as $item){
                        if($item['id_sp'] == $product['id_sp']){
                          $quantityInCart = $item['soluong'];
                          // var_dump ($quantityInCart);
                          // die;
                          break;
                        }
                      }
                      
                      ?>
                    <tr class="cart-product-item">
                    <td class="product-remove">
                        <button onclick="removeFormCart(<?= $product['id_sp']?>,<?= $key?>)"><i class="fa fa-trash-o"></i></button>
                      </td>
                      <td class="product-thumb">
                        <a href="index.php?act=chitietsp&id_sp=<?= $product['id_sp'] ?>">
                          <img src="public/uploads/<?= $product['image_sp']?>" width="90" height="110" alt="Image-HasTech">
                        </a>
                      </td>
                      <td class="product-name">
                        <h4 class="title"><a href="index.php?act=chitietsp&id_sp=<?= $product['id_sp']?>"><?= $product['name_sp']?></a></h4>
                      </td>
                      <td class="product-price">
                        <span class="price"><?php
                                  $gia = $product['gia'] - $product['gia'] * ($product['giam_gia'] * 0.01);
                                  echo $gia =number_format((int)$gia, 0, ',' ,'.');
                              ?><sup>đ</sup></span>
                      </td>
                      <td class="product-quantity">
                        <div class="">
                          <input type="number"  title="Quantity" value="<?=$quantityInCart?>" min ="1" id="quantity_<?= $product['id_sp']?>" oninput="updateQuantity(<?= $product['id_sp']?>,<?= $key?>)">
                        </div>
                      </td>
                      <td class="product-subtotal">
                        <span class="price"><?php
                        $gia = $product['gia'] - $product['gia'] * ($product['giam_gia'] * 0.01);
                        echo $gia =number_format((int)$gia * (int)$quantityInCart, 0, ',' ,'.');
                         ?><sup>đ</sup></span>
                      </td>
                    </tr>
                    <?php
                    // Tính tổng giá đơn hàng

                    $gia = $product['gia'] - $product['gia'] * ($product['giam_gia'] * 0.01);
                    // $gia =number_format((int)$gia * (int)$quantityInCart, 0, ',' ,'.');
                    $sum_total += (((int)($product['gia'] - $product['gia'] * ($product['giam_gia'] * 0.01)) * (int)$quantityInCart));
                    // Lưu tổng giá trị vào session
                    // var_dump($sum_total);
                    //   die;
                    $_SESSION['resultTotal'] = $sum_total;
                     endforeach ; 
                     ?>
                    <tr class="actions">
                      <td class="border-0" colspan="6">
                        <button type="submit" class="update-cart" disabled>Update cart</button>
                        <button type="submit" class="clear-cart" >Clear Cart</button>
                        <a href="index.php" class="btn-theme btn-flat">Continue Shopping</a>
                      </td>
                    </tr>
                  </tbody>
                  <?php } ?>
                </table>
              </form>
            </div>
          </div>
        </div>
        <div class="row row-gutter-50">
          <div class="col-md-6 col-lg-4">
            <div id="CategoriesAccordion" class="shipping-form-calculate">
              <div class="section-title-cart">
                <h5 class="title">Calculate Shipping</h5>
                <div class="desc">
                  <p>Estimate your shipping fee *</p>
                </div>
              </div>
              <!-- <span data-bs-toggle="collapse" data-bs-target="#CategoriesTwo" aria-expanded="true" role="button">Calculate shipping</span> -->
              <div id="CategoriesTwo" class="collapse show" data-bs-parent="#CategoriesAccordion">
                <form action="#" method="post">
                  <div class="row row-gutter-50">
                    <!-- <div class="col-md-12">
                      <div class="form-group">
                        <label class="visually-hidden" for="FormCountry">State</label>
                        <select id="FormCountry" class="form-control">
                          <option selected>Select a country…</option>
                          <option>...</option>
                        </select>
                      </div>
                    </div> -->
                    <!-- <div class="col-md-12">
                      <div class="form-group">
                        <label for="stateCounty" class="visually-hidden">State / County</label>
                        <input type="text" id="stateCounty" class="form-control" placeholder="State / County">
                      </div>
                    </div> -->
                    <!-- <div class="col-md-12">
                      <div class="form-group">
                        <label for="townCity" class="visually-hidden">Town / City</label>
                        <input type="text" id="townCity" class="form-control" placeholder="Town / City">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="postcodeZip" class="visually-hidden">Postcode / ZIP</label>
                        <input type="text" id="postcodeZip" class="form-control" placeholder="Postcode / ZIP">
                      </div>
                    </div> -->
                    <div class="col-md-12">
                      <div class="form-group">
                        <button type="submit" class="update-totals">Update totals</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <!-- <div class="shipping-form-coupon">
              <div class="section-title-cart">
                <h5 class="title">Coupon Code</h5>
                <div class="desc">
                  <p>Enter your coupon code if you have one.</p>
                </div>
              </div>
              <form action="#" method="post">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="couponCode" class="visually-hidden">Coupon Code</label>
                      <input type="text" id="couponCode" class="form-control" placeholder="Enter your coupon code..">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <button type="submit" class="coupon-btn">Apply coupon</button>
                    </div>
                  </div>
                </div>
              </form>
            </div> -->
          </div>
          <div class="col-md-12 col-lg-4">
            <div class="shipping-form-cart-totals">
              <div class="section-title-cart">
                <h5 class="title">Cart totals</h5>
              </div>
              <div class="cart-total-table">
                <table class="table">
                  <tbody>
                    <tr class="cart-subtotal">
                      <td>
                        <p class="value">Subtotal</p>
                      </td>
                      <td>
                        <p class="price"><?php
                        if(empty($_SESSION['cart'])){
                          echo "0";
                        }else{
                          echo number_format($sum_total, 0, ',' ,'.');
                        }?> <sup>đ</sup></p>
                      </td>
                    </tr>
                    <tr class="shipping">
                      <td>
                        <p class="value">Shipping</p>
                      </td>
                      <td>
                        <ul class="shipping-list">
                          <li class="radio">
                            <input type="radio" name="shipping" id="radio1" checked>
                            <label for="radio1"><span></span> Flat Rate</label>
                          </li>
                          <li class="radio">
                            <input type="radio" name="shipping" id="radio2">
                            <label for="radio2"><span></span> Free Shipping</label>
                          </li>
                          <li class="radio">
                            <input type="radio" name="shipping" id="radio3">
                            <label for="radio3"><span></span> Local Pickup</label>
                          </li>
                        </ul>
                      </td>
                    </tr>
                    <tr class="order-total">
                      <td>
                        <p class="value">Total</p>
                      </td>
                      <td>
                        <p class="price"><?php
                        if(empty($_SESSION['cart'])){
                          echo "0";
                        }else{
                          echo number_format($sum_total, 0, ',' ,'.');
                        }
                        
                        ?><sup>đ</sup></p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <a class="btn-theme btn-flat" href="index.php?act=checkout">Proceed to checkout</a>
            </div>
          </div>
        </div>