<?php
// 'quality' =>
$linkOrder = URL::createLink('client', 'user', 'order', ['book_id' => $this->bookInfo['id'], 'price' => $this->bookInfo['price']]);
$xhtml = '';
foreach ($this->bookRelate as $item) {
    $link       = URL::createLink('client', 'book', 'detail', ['book_id' => $item['id']]);
    $picture    = UPLOAD_URL . 'book' . DS . $item['picture'];
    $xhtml .= ' <div class="ps-product">
                    <div class="ps-product__thumbnail"><a href="' . $link . '"><img width="100px" height="150px" src="' . $picture . '" alt=""></a>
                        <ul class="ps-product__actions">
                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                            <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                            <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                        </ul>
                    </div>
                    <div class="ps-product__container"><a class="ps-product__vendor" href="#">Roberts Store</a>
                        <div class="ps-product__content"><a class="ps-product__title" href="' . $link . '">' . $item['name'] . '</a>
                            <div class="ps-product__rating">
                                <select class="ps-rating" data-read-only="true">
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                    <option value="2">5</option>
                                </select><span>01</span>
                            </div>
                            <p class="ps-product__price">' . number_format($item['price']) . ' Đ</p>
                        </div>
                        <div class="ps-product__content hover"><a class="ps-product__title" href="' . $link . '">' . $item['name'] . '</a>
                            <p class="ps-product__price">' . $item['price'] . '</p>
                        </div>
                    </div>
                </div>';
}
?>
<div class="ps-page--product">
    <div class="ps-container">
        <div class="ps-page__container">
            <div class="ps-page__left">
                <div class="ps-product--detail ps-product--fullwidth">
                    <div class="ps-product__header">
                        <div class="ps-product__thumbnail" data-vertical="true">
                            <figure>
                                <div class="ps-wrapper">
                                    <div class="ps-product__gallery" data-arrow="true">
                                        <div class="item"><img src="<?php echo UPLOAD_URL . 'book' . DS . $this->bookInfo['picture'] ?>" alt=""></div>
                                        <!-- <div class="item"><a href="img/products/detail/fullwidth/2.jpg"><img src="img/products/detail/fullwidth/2.jpg" alt=""></a></div>
                                        <div class="item"><a href="img/products/detail/fullwidth/3.jpg"><img src="img/products/detail/fullwidth/3.jpg" alt=""></a></div> -->
                                    </div>
                                </div>
                            </figure>
                            <!-- <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">
                                <div class="item"><img src="img/products/detail/fullwidth/1.jpg" alt=""></div>
                                <div class="item"><img src="img/products/detail/fullwidth/2.jpg" alt=""></div>
                                <div class="item"><img src="img/products/detail/fullwidth/3.jpg" alt=""></div>
                            </div> -->
                        </div>
                        <div class="ps-product__info">
                            <h1><?php echo $this->bookInfo['name'] ?></h1>
                            <div class="ps-product__meta">
                                <p>Brand:<a href="shop-default.html">Sony</a></p>
                                <div class="ps-product__rating">
                                    <select class="ps-rating" data-read-only="true">
                                        <option value="1">1</option>
                                        <option value="1">2</option>
                                        <option value="1">3</option>
                                        <option value="1">4</option>
                                        <option value="2">5</option>
                                    </select><span>(1 review)</span>
                                </div>
                            </div>
                            <h4 class="ps-product__price"><?php echo number_format($this->bookInfo['price']) ?> Đ</h4>
                            <!-- <div class="ps-product__desc">
                                <p>Sold By:<a href="shop-default.html"><strong> Go Pro</strong></a></p>
                                <ul class="ps-list--dot">
                                    <li> Unrestrained and portable active stereo speaker</li>
                                    <li> Free from the confines of wires and chords</li>
                                    <li> 20 hours of portable capabilities</li>
                                    <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                    <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                </ul>
                            </div>
                            <div class="ps-product__variations">
                                <figure>
                                    <figcaption>Color</figcaption>
                                    <div class="ps-variant ps-variant--color color--1"><span class="ps-variant__tooltip">Black</span></div>
                                    <div class="ps-variant ps-variant--color color--2"><span class="ps-variant__tooltip"> Gray</span></div>
                                </figure>
                            </div> -->

                            <!-- ADD CART -->
                            <form action="<?php echo $linkOrder; ?>" id="detail_products" method="POST">
                                <div class="ps-product__shopping">
                                    <figure>
                                        <figcaption>Quantity</figcaption>
                                        <div class="form-group--number">
                                            <input class="form-control" type="number" name="quantity" type="number" min='1' value="1">
                                        </div>
                                    </figure>
                                    <!-- <div class="ps-product__actions"><a href="#"><i class="icon-heart"></i></a><a href="#"><i class="icon-chart-bars"></i></a></div> -->
                                </div>
                                <div class="ps-product__shopping">
                                    <button class="ps-btn ps-btn--black" id="add_product">Add to cart</button><a class="ps-btn" href="#">Buy Now</a>
                                </div>
                            </form>
                            <!-- END ADD CART -->


                            <!-- <div class="ps-product__sharing"><a class="facebook" href="#"><i class="fa fa-facebook"></i></a><a class="twitter" href="#"><i class="fa fa-twitter"></i></a><a class="google" href="#"><i class="fa fa-google-plus"></i></a><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></div> -->
                        </div>
                    </div>
                    <div class="ps-product__content ps-tab-root">
                        <ul class="ps-tab-list">
                            <li class="active"><a href="#tab-1">Description</a></li>
                            <li><a href="#tab-2">Show Comment</a></li>
                            <!-- <li><a href="#tab-3">Vendor</a></li> -->
                            <li><a href="#tab-4">Reviews (1)</a></li>
                            <!-- <li><a href="#tab-5">Questions and Answers</a></li> -->
                            <!-- <li><a href="#tab-6">More Offers</a></li> -->
                        </ul>
                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="ps-document">
                                    <?php echo $this->bookInfo['description']; ?>
                                </div>
                            </div>
                            <div class="ps-tab" id="tab-2">
                                <div class="table-responsive">
                                    asdasdasd
                                </div>
                            </div>
                            <!-- <div class="ps-tab" id="tab-3"> -->
                            <!-- <h4>GoPro</h4>
                                <p>Digiworld US, New York’s no.1 online retailer was established in May 2012 with the aim and vision to become the one-stop shop for retail in New York with implementation of best practices both online</p><a href="#">More Products from gopro</a>
                            </div> -->
                            <div class="ps-tab" id="tab-4">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <form class="ps-form--review" id="comment_frm_abc" action="index.php?module=client&controller=comment&action=comment&id_comment=<?php echo $this->arrParam['book_id'] ?>" method="POST">
                                            <h4>Submit Your Review</h4>
                                            <p>Your email address will not be published. Required fields are marked<sup>*</sup></p>
                                            <div class="form-group form-group__rating">
                                                <label>Your rating of this product</label>
                                                <select class="ps-rating" data-read-only="false" id="form[rate]" name="form[start]">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" value="<?php echo $this->arrParam['book_id'] ?>" id="form[id_product]" name="form[id_product]">
                                                <input type="hidden" value="<?php echo time(); ?>" id="form[token]" name="form[token]">
                                                <textarea class="form-control" id="form[message]" name="form[comment]" rows="6" placeholder="Write your review here"></textarea>
                                            </div>
                                            <div class="form-group submit">
                                                <button class="ps-btn" type="submit" id="btn-review-product">Submit Review</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="ps-tab" id="tab-5">
                                <div class="ps-block--questions-answers">
                                    <h3>Questions and Answers</h3>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Have a question? Search for answer?">
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="ps-tab active" id="tab-6">
                                <p>Sorry no more offers available</p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-page__right">
                <aside class="widget widget_product widget_features">
                    <p><i class="icon-network"></i> Shipping worldwide</p>
                    <p><i class="icon-3d-rotate"></i> Free 7-day return if eligible, so easy</p>
                    <p><i class="icon-receipt"></i> Supplier give bills for this product.</p>
                    <p><i class="icon-credit-card"></i> Pay online or when receiving goods</p>
                </aside>
                <aside class="widget widget_sell-on-site">
                    <p><i class="icon-store"></i> Sell on Martfury?<a href="#"> Register Now !</a></p>
                </aside>
                <aside class="widget widget_ads"><a href="#"><img src="img/ads/product-ads.png" alt=""></a></aside>
                <aside class="widget widget_same-brand">
                    <h3>Same Brand</h3>
                    <div class="widget__content">
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/5.jpg" alt=""></a>
                                <div class="ps-product__badge">-37%</div>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#">Robert's Store</a>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Grand Slam Indoor Of Show Jumping Novel</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price sale">$32.99 <del>$41.00 </del></p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Grand Slam Indoor Of Show Jumping Novel</a>
                                    <p class="ps-product__price sale">$32.99 <del>$41.00 </del></p>
                                </div>
                            </div>
                        </div>
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/products/shop/6.jpg" alt=""></a>
                                <div class="ps-product__badge">-5%</div>
                                <ul class="ps-product__actions">
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icon-bag2"></i></a></li>
                                    <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add to Whishlist"><i class="icon-heart"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icon-chart-bars"></i></a></li>
                                </ul>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor" href="#">Youngshop</a>
                                <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Sound Intone I65 Earphone White Version</a>
                                    <div class="ps-product__rating">
                                        <select class="ps-rating" data-read-only="true">
                                            <option value="1">1</option>
                                            <option value="1">2</option>
                                            <option value="1">3</option>
                                            <option value="1">4</option>
                                            <option value="2">5</option>
                                        </select><span>01</span>
                                    </div>
                                    <p class="ps-product__price sale">$100.99 <del>$106.00 </del></p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Sound Intone I65 Earphone White Version</a>
                                    <p class="ps-product__price sale">$100.99 <del>$106.00 </del></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
        <div class="ps-section--default">
            <div class="ps-section__header">
                <h3>Related products</h3>
            </div>
            <div class="ps-section__content">
                <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                    <?php echo $xhtml; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <section -->