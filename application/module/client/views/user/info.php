<?php echo HelperBackend::showNotify(); ?>
<section class="faq-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="account-sidebar">
                    <a class="popup-btn">Menu</a>
                </div>
                <h3 class="d-lg-none">Tài khoản</h3>
                <div class="dashboard-left">
                    <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> Ẩn</span></div>
                    <div class="block-content">
                        <div class="row">
                            <div class="col-4">
                                <img src="<?php echo UPLOAD_URL.'user' . DS . $this->userInfo['info']['picture']?>" width="100px" height="100px" alt="">
                            </div>
                            <div class="col-8" style="padding:20px">
                                <p style="font-weight:bold;font-size:16px"><?php echo $this->userInfo['info']['fullname']; ?></p>
                                <p style="font-weight:bold;font-size:16px"><?php echo $this->userInfo['info']['email']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <ul>
                            <li class="active"><a href="account-form.html">Thông tin tài khoản</a></li>
                            <li class=""><a href="change-password.html">Thay đổi mật khẩu</a></li>
                            <li class=""><a href="order-history.html">Lịch sử mua hàng</a></li>
                            <li class=""><a href="index.html">Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <?php echo isset($this->errors) ? $this->errors : "" ?>
                        <form action="index.php?module=client&controller=user&action=info" method="post" id="admin-form" class="theme-form" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="form[email]" value="<?php echo $this->userInfo['info']['email'];?>" class="form-control" id="email" readonly="1">
                            </div>

                            <div class="form-group">
                                <label for="fullname">Họ tên</label>
                                <input type="text" name="form[fullname]" value="<?php echo $this->userInfo['info']['fullname'];?>" class="form-control" id="fullname">
                            </div>

                            <div class="form-group">
                                <label for="address">Hình ảnh</label><br/>
                                <img src="<?php echo UPLOAD_URL.'user' . DS . $this->userInfo['info']['picture']?>" width="100px" height="100px" alt="">
                                <input type="file" name="picture" id="img">
                            </div>
                            <input type="hidden" id="form[token]" name="form[token]" value="1599258345"><button type="submit" id="submit" name="submit" value="Cập nhật thông tin" class="btn btn-solid btn-sm">Cập nhật thông tin</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>