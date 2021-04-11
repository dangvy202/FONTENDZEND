
<aside class="main-sidebar sidebar-dark-info elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo UPLOAD_URL . 'user' . DS . $_SESSION['user']['info']['picture']?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['user']['info']['fullname'];?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="index.php?module=backend&controller=index&action=index" class="nav-link" data-active="dashboard">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php
                    echo $linkGroup     = HelperBackend::showMenuSideBar('nav-item has-treeview menu-open','nav-link active','nav-icon fas fa-users','Group','fas fa-angle-left right','group',['backend','group','index'],'nav-link active',['backend','group','form']);
                    echo $linkUser      = HelperBackend::showMenuSideBar('nav-item','nav-link','nav-icon fas fa-user','User','fas fa-angle-left right','user',['backend','user','index'],'nav-link',['backend','user','form']);
                    echo $linkCaregory  = HelperBackend::showMenuSideBar('nav-item','nav-link','nav-icon fas fa-thumbtack','Category','fas fa-angle-left right','category',['backend','category','index'],'nav-link',['backend','category','form']);
                    echo $linkProduct   = HelperBackend::showMenuSideBar('nav-item','nav-link','nav-icon fas fa-book-open','Products','fas fa-angle-left right','product',['backend','product','index'],'nav-link',['backend','product','form']);
                    echo $linkSlider    = HelperBackend::showMenuSideBar('nav-item','nav-link','nav-icon fas fa-sliders-h','Slider','fas fa-angle-left right','banner',['backend','banner','index'],'nav-link',['backend','banner','form']);
                ?> 
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>