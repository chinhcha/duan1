<div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
  <div class="product-review-content">
    <div class="review-content-header">
      <h3>Comments</h3>
      <div class="review-info">
        <span class="review-caption">Plese write your feel !!!</span>
        <span class="review-write-btn">Write comments</span>
      </div>
    </div>

    <!--== Start Reviews Form Item ==-->
    <div class="reviews-form-area">
      <h4 class="title">Write a review</h4>
      <?php if (isset($_SESSION['username'])) { ?>
        <div class="reviews-form-content">
          <form action="?act=binhluan" method="post">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="for_comment">Body of comments</label>
                  <textarea id="for_comment" class="form-control" name='binhluan' placeholder="Write your comments here"></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-submit-btn">
                  <input type='hidden' name='id' value='<?= $sp['id_sp'] ?>'>
                  <input type='hidden' name='id_dm' value='<?= $sp['id_dm'] ?>'>
                  <input type='hidden' name='id_tk' value='<?= $_SESSION['username']['id_tk'] ?>'>
                  <input type='submit' class='btn-submit' name='gui' value='Comments'>
                </div>
              </div>
            </div>
          </form>
        </div>
      <?php }else{
        echo '<div class="alert alert-warning">Bạn cần đăng nhập trước khi bình luận</div>';
      } ?>
    </div>
    <!--== End Reviews Form Item ==-->
    <?php foreach ($loadbinhluan as $key => $value) : ?>
      <div class="reviews-content-body">
        <!--== Start Reviews Content Item ==-->
        <div class="review-item">
          <ul class="review-rating">
            <!-- <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li> -->
          </ul>
          <h3 class="title"><?= $value['full_name'] ?></h3>
          <h5 class="sub-title"><span>commented</span> on <span><?php
                                                                $dateTime = new DateTime($value['ngaybinhluan']);
                                                                // Chuyển đổi sang định dạng khác (ví dụ: dd/mm/yyyy)
                                                                $newFormat = $dateTime->format('h:i A , d-m-Y ');
                                                                echo $newFormat;


                                                                ?></span></h5>
          <p><?= $value['comment'] ?></p>
        </div>
        <!--== End Reviews Content Item ==-->



      </div>
    <?php endforeach; ?>
  </div>
</div>