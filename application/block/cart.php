<?php
$cart	= Session::get('cart');
$totalItems		= 0;
$totalPrices	= 0;
if (!empty($cart)) {
	$totalItems		= array_sum($cart['quantity']);
	$totalPrices	= array_sum($cart['price']);
}

$model = new Model();
$result = [];
if (!empty($cart)) {
	$ids = '(';
	foreach ($cart['quantity'] as $key => $value) $ids .= "'$key',";
	$ids .= "'0')";
	$query[] = "SELECT `id`, `name`, `picture`,`price`";
	$query[] = "FROM `book`";
	$query[] = "WHERE `id` IN  $ids AND `id` > 0";
	$query[] = "ORDER BY `ordering` ASC";
	$query = implode(" ", $query);
	$result = $model->fetchAll($query);
	foreach ($result as $key => $value){
		$result[$key]['quantity']   = $cart['quantity'][$value['id']];
		$result[$key]['totalPrice'] = $cart['price'][$value['id']];
	}
}
//DANH MỤC MENU
$xhtml = '';
foreach ($result as $item) {
	$link       =   URL::createLink('client', 'book', 'detail', ['book_id' => $item['id']]);
	$picture    =   UPLOAD_URL . 'book' . DS . $item['picture'];
	$xhtml   .= '<div class="ps-product--cart-mobile">
					<div class="ps-product__thumbnail"><a href="'.$link.'"><img src="'.$picture.'" alt=""></a></div>
					<div class="ps-product__content">
						<a class="ps-product__remove" href="index.php?module=client&controller=user&action=destroyproduct&id='.$item['id'].'"><i class="icon-cross"></i></a><a href="'.$link.'">'.$item['name'].'</a>
						<p><small>'.$item['quantity'].' x '.number_format($item['price']).'</small></p>
					</div>
				</div>';
}
?>
<div class="ps-cart--mini"><a class="header__extra" href="index.php?module=client&controller=user&action=cart"><i class="icon-bag2"></i><span><i><?php echo $totalItems; ?></i></span></a>
	<div class="ps-cart__content">
		<div class="ps-cart__items">
			<?php echo $xhtml; ?>
		</div>
		<div class="ps-cart__footer">
			<h3>Sub Total:<strong><?php echo number_format($totalPrices);?> Đ</strong></h3>
			<figure><a class="ps-btn" href="index.php?module=client&controller=user&action=cart">View Cart</a><a class="ps-btn" href="checkout.html">Checkout</a></figure>
		</div>
	</div>
</div>