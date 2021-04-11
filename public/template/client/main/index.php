
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "html/head.php"; ?>
</head>

<body>
    <!-- HEADER -->
        <?php require_once "html/header.php"; ?>
    <!-- END HEADER -->
    
    
    <!-- MOBIE -->
        <?php require_once "html/mobie.php"; ?>
    <!-- END MOBIE -->

    
    <div id="homepage-1">



        <!-- INDEX -->
        <?php
            if ($this->arrParam['controller'] == 'index') {
                require_once "html/banner.php"; 
                require_once "html/service.php"; 
                require_once "html/ads.php"; 
                require_once "html/top-category.php"; 
                require_once MODULE_PATH . $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php';
            } 
            else { 
                require_once 'html/breadcrumb.php';
                require_once MODULE_PATH . $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php';
            }
        ?>
        <!-- END INDEX -->


        
        <!-- LETTER -->
            <?php require_once "html/letter.php"; ?>
        <!-- END LETTER -->
    </div>
    <!-- FOOTER -->
        <?php require_once "html/footer.php"; ?>
    <!-- END FOOTER -->
    

    <!-- POPUP -->
        <?php require_once "html/popup.php"; ?>
    <!-- END POPUP -->


    <div id="back2top"><i class="icon icon-arrow-up"></i></div>
    <div class="ps-site-overlay"></div>
    <!-- <div id="loader-wrapper">
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div> -->
    <div class="ps-search" id="site-search"><a class="ps-btn--close" href="#"></a>
        <div class="ps-search__content">
            <form class="ps-form--primary-search" action="do_action" method="post">
                <input class="form-control" type="text" placeholder="Search for...">
                <button><i class="aroma-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
    
    <!-- QUICKVIEW -->
        <?php require_once "html/quick-view.php" ?>
    <!-- END QUICKVIEW -->
    
    
    <!-- SCRIPT -->
        <?php require_once "html/script.php" ?>
    <!-- END SCRIPT -->
</body>

</html>