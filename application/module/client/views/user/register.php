
<div class="ps-page--my-account">
    <div class="ps-my-account">
        <div class="container">
            <form action="index.php?module=client&controller=user&action=register" method="POST" id="register-form" class="ps-form--account ps-tab-root" enctype="multipart/form-data">
                <ul class="ps-tab-list">
                    <li class="active"><a href="#sign-in">Register</a></li>
                </ul>
                <div class="ps-tabs">
                    <div class="ps-tab active" id="sign-in">
                        <div class="ps-form__content">
                            <h5>Register Your Account</h5>
                            <div class="form-group form-forgot">
                                <input class="form-control" id="form[fullname]" name="form[fullname]" value="" type="text" placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="form[username]" name="form[username]" value="" type="text" placeholder="Username">
                            </div>
                            <div class="form-group form-forgot">
                                <input class="form-control" id="form[password]" name="form[password]" value="" type="text" placeholder="Password">
                            </div>
                            <div class="form-group form-forgot">
                                <input class="form-control" id="form[confirmpassword]" name="form[confirmpassword]" value="" type="text" placeholder="Confirm Password">
                            </div>
                            <div class="form-group form-forgot">
                                <input class="form-control" id="form[email]" name="form[email]" value="" type="text" placeholder="Email">
                            </div>
                            <div class="form-group form-forgot">
                                <label>Picture</label><br/>
                                <input  id="picture" name="picture" value="" type="file">
                            </div>
                            <div class="form-group submtit">
                                <input type="hidden" id="form[token]" name="form[token]" value="<?php echo time();?>">
                                <input type="submit" class="ps-btn ps-btn--fullwidth" id="register-account" name="submit" value="Đăng Ký">
                                <!-- <button class="ps-btn ps-btn--fullwidth" type="submit" id="register-account" name="submit" value="Đăng Ký">Register</button> -->
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