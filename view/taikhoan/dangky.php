<main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area" data-bg-img="assets/img/photos/bg3.webp">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Register</h2>
              <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                <ul class="breadcrumb">
                  <li><a href="index.html">Home</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>Register</li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start My Account Area Wrapper ==-->
    <section class="account-area">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 m-auto">
            <div class="section-title text-center">
              <h2 class="title">Register</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="register-form-content">
              <form action="index.php?act=dangky" method="post">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="username">Username <span class="required">*</span></label>
                      <input id="username" class="form-control" type="text" name="username" required>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="password">Password <span class="required">*</span></label>
                      <input id="password" class="form-control" type="password" name="password" required>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="email">Full name <span class="required">*</span></label>
                      <input id="fullname" class="form-control" type="text" name="fullname" required>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="chucvu">Posision <span class="required">*</span></label>
                      <input id="chucvu" class="form-control" type="text" name="chucvu" required>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="email">Email address <span class="required">*</span></label>
                      <input id="email" class="form-control" type="email" name="email" required>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="phone">Phone <span class="required">*</span></label>
                      <input id="phone" class="form-control" type="number" name="phone"required>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label for="diachi">Address <span class="required">*</span></label>
                      <input id="diachi" class="form-control" type="text" name="diachi" required>
                    </div>
                  </div>
                  <br>
                  <div class="col-12">
                    <div class="form-group mb--0">
                      <input class="btn-register" type="submit" name="dangky" id="" >

                    </div>
                  </div>
                </div>
              </form>
              <a href="index.php?act=dangnhap">Login</a>
              <?php
                if(isset($thongbao) && $thongbao != ""){
                  echo "$thongbao";

                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End My Account Area Wrapper ==-->
  </main>