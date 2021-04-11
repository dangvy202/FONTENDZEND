<?php
    $checkCart = isset($_SESSION['orderCart']) ? $_SESSION['orderCart'] : null;
    $errorOrder = HelperBackend::showErrorsOrder($checkCart);
?>
<?php
    if(isset($_SESSION['user']['login']) == 1){
?>
<div class="container" style="margin-top:50px">
    <div>
        <h4 style="font-weight:bold">BẠN ĐÃ ĐĂNG NHẬP RỒI</h4>
        <a style="margin-top:30px" href="index.php?module=client&controller=index&action=index" class="btn btn-solid">QUAY LẠI TRANG CHỦ</a>
    </div>
</div>
<?php
    }else{
?>
<div class="ps-page--my-account">
    <div class="ps-my-account">
        <div class="container">
            <form action="index.php?module=client&controller=user&action=login" method="post" id="admin-form" class="ps-form--account ps-tab-root">
                <ul class="ps-tab-list">
                    <li class="active"><a href="#sign-in">Login</a></li>
                </ul>
                <div class="ps-tabs">
                    <div class="ps-tab active" id="sign-in">
                        <div class="ps-form__content">
                            <h5>Log In Your Account</h5>
                            <!-- ERRORS -->
                                <?php 
                                    echo isset($this->errors) ? $this->errors : "";
                                    echo $errorOrder;
                                    echo HelperBackend::showNotify();
                                ?>
                            <!-- END ERRORS -->
                            <div class="form-group">
                                <input class="form-control" id="form[username]" name="form[username]" value="" type="text" placeholder="Username">
                            </div>
                            <div class="form-group form-forgot">
                                <input class="form-control" id="form[password]" name="form[password]" value="" type="password" placeholder="Password"><a href="">Forgot?</a>
                            </div>
                            <div class="form-group submtit">
                                <input type="hidden" id="form[token]" name="form[token]" value="<?php echo time();?>">
                                <button class="ps-btn ps-btn--fullwidth" type="submit" id="submit" name="submit" value="Đăng nhập">Login</button>
                            </div>
                        </div>
                        <div class="ps-form__footer">
                            <p>Connect with:</p>
                            <ul class="ps-list--social">
                                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>
