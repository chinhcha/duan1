<form action="index.php?act=muathanhcong" method="post">
  <main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area" data-bg-img="assets/img/photos/bg3.webp">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Checkout</h2>
              <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                <ul class="breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>Checkout</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Shopping Checkout Area Wrapper ==-->
    <section class="shopping-checkout-wrap">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <!--== Start Billing Accordion ==-->
            <div class="checkout-billing-details-wrap">
              <h2 class="title">Billing details</h2>
              <div class="billing-form-wrap">
                <form action="index.php?act=checkout" method="post">
                  <?php
                  if (!isset($_SESSION['username'])) {
                    echo "Please login to continue buy product";
                  ?>
                    <a href="index.php?act=dangnhap">
                      <h3 style="color:#fd7e14">Login</h3>
                    </a>
                  <?php } else { ?>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="f_name">Full name <abbr class="required" title="required">*</abbr></label>
                          <input id="f_name" type="text" name="full_name" class="form-control w-100" value="<?= $_SESSION['username']['full_name'] ?>">
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="pz-code">Address </label>
                          <input id="pz-code" type="text" name="dia_chi" class="form-control" value="<?= $_SESSION['username']['dia_chi'] ?>">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="phone">Phone (optional)</label>
                          <input id="phone" type="text" class="form-control" name="phone" value="<?= $_SESSION['username']['phone'] ?>">
                        </div>
                      </div>

                    </div>
                  <?php } ?>
                </form>
              </div>
            </div>
            <!--== End Billing Accordion ==-->
          </div>
          <div class="col-lg-6">
            <!--== Start Order Details Accordion ==-->
            <div class="checkout-order-details-wrap">
              <div class="order-details-table-wrap table-responsive">
                <h2 class="title mb-25">Your order</h2>
                <table class="table">
                  <thead>
                    <tr>
                      <th class="product-name">Product</th>
                      <th class="product-total">Total</th>
                    </tr>
                  </thead>
                  <?php if (!isset($_SESSION['cart'])) { ?>
                    <tbody class="table-body">
                      <h5 style="color:#fd7e14">DON"T HAVE ANY PRODUCTS</h5>
                    </tbody>
                    <tfoot class="table-foot">
                      <tr class="cart-subtotal">
                        <th>Subtotal</th>
                        <td>0 <sup>đ</sup></td>
                      </tr>
                      <tr class="shipping">
                        <th>Shipping</th>
                        <td>Flat rate: 0<sup>đ</sup></td>
                      </tr>
                      <tr class="order-total">
                        <th>Total </th>
                        <td>0<sup>đ</sup></td>
                      </tr>
                    </tfoot>
                  <?php } else { ?>
                    <tbody class="table-body">
                      <?php foreach ($_SESSION['cart'] as $key => $product) : ?>
                        <tr class="cart-item">
                          <td class="product-name"><?= $product['name_sp'] ?><span class="product-quantity">× <?= $product['soluong'] ?></span></td>
                          <td class="product-total"><?= number_format((int)$product['soluong'] * (int)$product['gia'], 0, ',', '.') ?><sup>đ</sup></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot class="table-foot">
                      <tr class="cart-subtotal">
                        <th>Subtotal</th>
                        <td><?= number_format($_SESSION['resultTotal'], 0, ',', '.') ?><sup>đ</sup></td>
                      </tr>
                      <tr class="shipping">
                        <th>Shipping</th>
                        <td>Flat rate: Free Ship</td>
                      </tr>
                      <tr class="order-total">
                        <th>Total </th>
                        <td><?= number_format($_SESSION['resultTotal'], 0, ',', '.') ?><sup>đ</sup></td>
                      </tr>
                    </tfoot>
                  <?php } ?>
                </table>
                <div class="shop-payment-method">
                  <div id="PaymentMethodAccordion">
                    <div class="card">
                      <div class="card-header" id="check_payments">
                        <input type="radio" id="thanh_toan" name="payUrl" value="Tiền mặt">
                        <label for="thanh_toan">Direct bank transfer</label>
                      </div>
                      <div id="itemOne" class="collapse show" aria-labelledby="check_payments" data-bs-parent="#PaymentMethodAccordion">
                        
                      </div>
                    </div>

                    <div class="card">
                      <div class="card-header" id="check_payments2">
                        <input type="radio" id="thanh_toan2" name="payUrl" value="Thanh toán khi nhận hàng">
                        <label for="thanh_toan2">Cash on delivery</label>

                      </div>
                      <div id="itemThree" class="collapse" aria-labelledby="check_payments3" data-bs-parent="#PaymentMethodAccordion">
                        <div class="card-body">
                          <p>Pay with cash upon delivery.</p>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header" id="check_payments3">
                      <input type="radio" id="thanh_toan3" name="payUrl" value="Thanh toán online">
                        <label for="thanh_toan3">Payment by Momo <img src="assets/img/photos/momo.webp" width="40" height="26" /></label>

            
                      </div>
                      <div id="itemFour" class="collapse" aria-labelledby="check_payments4" data-bs-parent="#PaymentMethodAccordion">
                        <div class="card-body">
                          <!-- <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p> -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="submit" value="Place order" class="btn-theme"> 
                </div>
              </div>
            </div>
            <!--== End Order Details Accordion ==-->
          </div>
        </div>
      </div>
    </section>
    <!--== End Shopping Checkout Area Wrapper ==-->
  </main>
</form>