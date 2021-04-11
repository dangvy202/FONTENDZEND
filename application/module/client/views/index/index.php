<?php
$xhtml = '';
foreach ($this->specialBooks as $item){
    $linkCate   = URL::createLink('client','book','list', ['category_id' => $item['category_id']]);
    $link       = URL::createLink('client','book','detail', ['book_id' => $item['id']]);
    $picture    = UPLOAD_URL.'book'.DS.$item['picture'];
    $saleOff    = ($item['sale_off'] == 0) ? 'style="display:none"' : null;
    $xhtml      .= '<div class="ps-product">
                        <div class="ps-product__thumbnail"><a href="'.$link.'"><img width="100px" height="190px" src="'.$picture.'" alt=""></a>
                        <div class="ps-product__badge" '.$saleOff.'>-'.$item['sale_off'].'%</div>
                            <ul class="ps-product__actions">
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__container"><a class="ps-product__vendor" href="'.$linkCate.'">'.$item['category_name'].'</a>
                            <div class="ps-product__content"><a class="ps-product__title" href="'.$link.'">'.$item['name'].'</a>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>02</span>
                                </div>
                                <p class="ps-product__price">'.number_format($item['price']).' Đ</p>
                            </div>
                            <div class="ps-product__content hover"><a class="ps-product__title" href="'.$link.'">'.$item['name'].'</a>
                                <p class="ps-product__price">'.number_format($item['price']).' Đ</p>
                            </div>
                        </div>
                    </div>';
}
$xhtmlSale      = '';
    foreach ($this->saleBooks as $item){
        $link       = URL::createLink('client','book','detail', ['book_id' => $item['id']]);
        $picture    = UPLOAD_URL.'book'.DS.$item['picture'];
        $saleOff    = ($item['sale_off'] == 0) ? 'style="display:none"' : null;
        $rootPrice  = $item['price'] * 100 / $item['sale_off'];
        $xhtmlSale .= ' <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="'.$link.'"><img width="100px" height="190px" src="'.$picture.'" alt=""></a>
                                <div class="ps-product__badge" '.$saleOff.'>-'.$item['sale_off'].'%</div>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container">
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">'.$item['name'].'</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price sale">'.number_format($item['price']).' Đ <del>'.number_format($rootPrice).' Đ </del></p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="'.$link.'">'.$item['name'].'</a>
                                    <p class="ps-product__price sale">'.number_format($item['price']).' Đ <del>'.number_format($rootPrice).' Đ </del></p>
                                </div>
                            </div>
                        </div>';
    }
    $xhtmlNewArrivals = '';
    foreach ($this->newProducts as $item){
        $link       = URL::createLink('client','book','detail', ['book_id' => $item['id']]);
        $picture    = UPLOAD_URL.'book'.DS.$item['picture'];
        $saleOff    = ($item['sale_off'] == 0) ? 'style="display:none"' : null;
        $rootPrice  = ($item['sale_off'] != 0) ? $item['price'] * 100 / $item['sale_off'] : null;
        $xhtmlNewArrivals .= '  <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 ">
                                    <div class="ps-product--horizontal">
                                        <div class="ps-product__thumbnail"><a href="'.$link.'"><img width="100px" height="100px" src="'.$picture.'" alt=""></a></div>
                                        <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">'.$item['name'].'</a>
                                            <div class="ps-product__rating">
                                                <select class="ps-rating" data-read-only="true">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                    <option value="1">4</option>
                                                    <option value="2">5</option>
                                                </select><span>01</span>
                                            </div>
                                            <p class="ps-product__price sale">'.number_format($item['price']).' Đ <del '.$saleOff.'>'.number_format($rootPrice).' Đ</del></p>
                                        </div>
                                    </div>
                                </div>';
    }
?>
<!-- SPECIAL PRODUCTS -->
<div class="ps-product-list ps-clothings">
    <div class="ps-container">
        <div class="ps-section__header">
            <h3>Special Arrivals</h3>
            <ul class="ps-section__links">
                <li><a href="shop-grid.html">View All</a></li>
            </ul>
        </div>
        <div class="ps-section__content">
            <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                <!-- SPECIAL PRODUCTS -->
                <?php echo $xhtml; ?>
                <!-- END SPECIAL PRODUCTS -->
            </div>
        </div>
    </div>
</div>
<!-- END SPECIAL PRODUCTS -->
<!-- SALE PRODUCTS -->
<div class="ps-product-list ps-clothings">
    <div class="ps-container">
        <div class="ps-section__header">
            <h3>Sale Products</h3>
            <ul class="ps-section__links">
                <li><a href="shop-grid.html">View All</a></li>
            </ul>
        </div>
        <div class="ps-section__content">
            <div class="ps-carousel--responsive owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="7" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="2" data-owl-item-lg="4" data-owl-item-xl="6" data-owl-duration="1000" data-owl-mousedrag="on">
                <!-- SALE PRODUCTS -->
                    <?php echo $xhtmlSale;?>
                <!-- END SALE PRODUCTS -->
            </div>
        </div>
    </div>
</div>
<!-- END SALE PRODUCTS -->
<!-- NEW ARRIVALS -->
<div class="ps-product-list ps-new-arrivals">
    <div class="ps-container">
        <div class="ps-section__header">
            <h3>New Arrivals</h3>
            <ul class="ps-section__links">
                <li><a href="shop-grid.html">View All</a></li>
            </ul>
        </div>
        <div class="ps-section__content">
            <div class="row">
                <!-- NEW ARRIVALS -->
                    <?php echo $xhtmlNewArrivals; ?>
                <!-- END NEW ARRIVALS -->
            </div>
        </div>
    </div>
</div>
<!-- END NEW ARRIVALS -->