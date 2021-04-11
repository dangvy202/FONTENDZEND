<?php
    $linkAction = URL::createLink("backend","index","login");
?>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Đăng nhập trang quản trị</p>
                
                <!-- SHOW ERRORS -->
                <?php echo isset($this->errors) ? $this->errors : "" ?>
                <!-- END SHOWERROR -->
                <form action="<?php echo $linkAction;?>" method="post" id="form-login">
                    <!-- USERNAME -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Tên đăng nhập" name="form[username]">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <!-- PASSWORD -->
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Mật khẩu" name="form[password]">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <!-- TOKEN -->
                    <input type="hidden" name="form[token]" value="<?php echo time();?>">
                    <button type="submit" name="loginAdmin" class="btn btn-info btn-block">Đăng nhập</button>
                    <!-- /.col -->
                </form>
            </div>

        </div>
        <!-- /.login-card-body -->