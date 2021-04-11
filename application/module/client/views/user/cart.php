<?php
    $xhtml = '';
    $xhtmlBill = '';
    $sum = 0;
    if(!empty($this->items)){
        foreach($this->items as $value){
            $linkDetail = URL::createLink('client','book','detail', [ 'book_id' => $value['id'] ]);
            $sum += $value['totalPrice'];
            $xhtml .= ' <input type="hidden" name="form[book_id][]" value="'.$value['id'].'" id="input_book_id_'.$value['id'].'">
                        <input type="hidden" name="form[name][]" value="'.$value['name'].'" id="input_name_'.$value['id'].'">
                        <input type="hidden" name="form[picture][]" value="'.$value['picture'].'" id="input_picture_'.$value['id'].'">
                        <input type="hidden" name="form[price][]" value="'.$value['price'].'" id="input_price_'.$value['id'].'">            
                        <input type="hidden" name="form[quantity][]" value="'.$value['quantity'].'" id="input_quantity_'.$value['id'].'">            
                        <input type="hidden" name="form[totalPrice][]" value="'.$value['totalPrice'].'" id="input_totalprice_'.$value['id'].'">
                        <tr>
                            <td data-label="Product">
                                <div class="ps-product--cart">
                                    <div class="ps-product__thumbnail"><a href="'.$linkDetail.'"><img src="'.UPLOAD_URL.'book'.DS.$value['picture'].'" alt=""></a></div>
                                    <div class="ps-product__content"><a href="'.$linkDetail.'">'.$value['name'].'</a>
                                        <p>Sold By:<strong> YOUNG SHOP</strong></p>
                                    </div>
                                </div>
                            </td>
                            <td class="price" data-label="Price">'.number_format($value['price']).' Đ</td>
                            <td data-label="Quantity">
                                <div class="form-group--number">
                                    <input class="form-control" type="number" min="1" value="'.$value['quantity'].'">
                                    </div>
                                    </td>
                                    <td data-label="Total">'.number_format($value['totalPrice']).' Đ</td>
                                    <td data-label="Actions"><a href="index.php?module=client&controller=user&action=destroyproduct&id='.$value['id'].'"><i class="icon-cross"></i></a></td>
                                    </tr>';
                                }
        foreach($this->items as $value){
            $linkDetail = URL::createLink('client','book','detail', [ 'book_id' => $value['id'] ]);
            $xhtmlBill .= '<li><span class="ps-block__shop">'.$value['name'].'</span><span class="ps-block__shipping">Quantity: '.$value['quantity'].'</span></li>';
        }
?>
<form action="index.php?module=client&controller=user&action=cartsuccess" method="POST" name="admin-form" id="admin-form">
<div class="ps-section--shopping ps-shopping-cart">
            <div class="container">
                <div class="ps-section__header">
                    <h1>Shopping Cart</h1>
                </div>
                <div class="ps-section__content">
                    <div class="table-responsive">
                        <table class="table ps-table--shopping-cart ps-table--responsive">
                            <thead>
                                <tr>
                                    <th>Product name</th>
                                    <th>PRICE</th>
                                    <th>QUANTITY</th>
                                    <th>TOTAL</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- PRODUCTS -->
                                <?php echo $xhtml; ?>
                                <!-- END PRODUCTS -->
                            </tbody>
                        </table>
                    </div>
                    <div class="ps-section__cart-actions"><a class="ps-btn" href="shop-default.html"><i class="icon-arrow-left"></i> Back to Shop</a><a class="ps-btn ps-btn--outline" href="shop-default.html"><i class="icon-sync"></i> Update cart</a></div>
                </div>
                <div class="ps-section__footer">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <figure>
                                <figcaption>Coupon Discount</figcaption>
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="">
                                </div>
                                <div class="form-group">
                                    <button class="ps-btn ps-btn--outline">Apply</button>
                                </div>
                            </figure>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-block--shopping-total">
                                <div class="ps-block__header">
                                    <p>Subtotal <span> <?php echo number_format($sum);?> Đ</span></p>
                                </div>
                                <div class="ps-block__content">
                                    <ul class="ps-block__product">
                                        <?php echo $xhtmlBill; ?>
                                    </ul>
                                    <h3>Total <span><?php echo number_format($sum);?> Đ</span></h3>
                                </div>
                                    </div><button type="submit" id="dathanghihi" class="ps-btn ps-btn--fullwidth">Proceed to checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</form>
<?php
    }else{
?>
<div class="container" style="margin-top:50px">
    <div>
        <h4 style="font-weight:bold">Chưa có sản phẩm</h4>
        <a style="margin-top:30px" href="index.php?module=client&controller=book&action=index" class="btn btn-solid">VUI LÒNG CHỌN SẢN PHẨM</a>
    </div>
</div>
<?php }; ?>
