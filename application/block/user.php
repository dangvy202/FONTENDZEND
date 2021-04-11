<?php
    $idUser = isset($_SESSION['user']['info']['id']) ? $_SESSION['user']['info']['id'] : null;
    $model = new Model();
    $query = "SELECT `id`, `fullname`, `email`, `picture` FROM `user` WHERE `id` = '$idUser'";
    $result = $model->fetchRow($query);
    $xhtml = '';
    if(isset($_SESSION['user']['login']) == true){
        echo $xhtml .= '<div class="ps-block__left"><img width="35px" height="35px" src='.UPLOAD_URL.'user'.DS.$result['picture'].'></div>
                    <div class="ps-block__right">
                        <a href="index.php?module=client&controller=user&action=login">'.$result['fullname'].'</a>
                        <a href="index.php?module=client&controller=user&action=logout">Logout</a>
                    </div>';
    }else{
        echo $xhtml .= ' <div class="ps-block__left"><i class="icon-user"></i></div>
                    <div class="ps-block__right"><a href="index.php?module=client&controller=user&action=login">Login</a><a href="index.php?module=client&controller=user&action=register">Register</a></div>';
    }
?>

