<?php
    $xhtml = '';
    foreach($this->items as $key => $item){
        // echo '<pre>';
        // print_r($this);
        // echo '</pre>';
        $link       = URL::createLink('client','book','list', ['category_id' => $item['id']]);
        $picture    = UPLOAD_URL.'category'.DS.$item['picture'];
        $name       = $item['name'];
        $xhtml .= ' <div class="product-box">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="'.$link.'" class="bg-size blur-up lazyloaded" style="background-image: url("'.$picture.'"); background-size: cover; background-position: center center; display: block;"><img src="'.$picture.'" class="img-fluid blur-up lazyload bg-img" alt="" style="display: none;"></a>
                                </div>
                            </div>
                            <div class="product-detail">
                                <a href="list.html">
                                    <h4>'.$name.'</h4>
                                </a>
                            </div>           
                    </div>';
    }
?>
<section class="ratio_asos j-box pets-box section-b-space" id="category">
    <div class="container">
        <div class="no-slider five-product row">
            <!-- SHOW DANH MUC SẢN PHẨM -->
                <?php echo $xhtml;?>      
            <!-- END SHOW DANH MUC SẢN PHẨM -->
        </div>

        <div class="product-pagination">
            <div class="theme-paggination-block">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <nav aria-label="Page navigation">
                                <nav>
                                    <ul class="pagination">
                                        <li class="page-item disabled">
                                            <a href="" class="page-link"><i class="fa fa-angle-double-left"></i></a>
                                        </li>
                                        <li class="page-item disabled">
                                            <a href="" class="page-link"><i class="fa fa-angle-left"></i></a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#"><i class="fa fa-angle-right"></i></a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#"><i class="fa fa-angle-double-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </nav>
                        </div>
                        <div class="col-xl-6 col-md-6 col-sm-12">
                            <div class="product-search-count-bottom">
                                <h5>Showing Items 1-15 of 22 Result</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>