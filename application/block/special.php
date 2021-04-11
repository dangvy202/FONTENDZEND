<?php
$query	= "SELECT `b`.`id`, `b`.`name`, `c`.`name` AS `category_name`, `b`.`picture`, `b`.`category_id` FROM `book` AS `b`, `category` AS `c` WHERE `b`.`status`  = 'active' AND `b`.`special`  = 1 AND `b`.`category_id` = `c`.`id` ORDER BY `b`.`ordering` ASC LIMIT 0,5";
$listBooksSecial	= $model->fetchAll($query);

$xhtmlSecial		= '';
if (!empty($listBooksSecial)) {
	foreach ($listBooksSecial as $key => $value) {
		// $name	 = $value['name'];

		// $bookID			= $value['id'];
		// $catID			= $value['category_id'];
		// $bookNameURL	= URL::filterURL($name);
		// $catNameURL		= URL::filterURL($value['category_name']);

		// $link	= URL::createLink('default', 'book', 'detail', array('category_id' => $value['category_id'], 'book_id' => $value['id']), "$catNameURL/$bookNameURL-$catID-$bookID.html");

		// $picture = Helper::createImage('book', '98x150-', $value['picture'], array('class' => 'thumb', 'width' => 60, 'height' => 90));

		// $xhtmlSecial	.= '<div class="new_prod_box">
		//                     <a href="' . $link . '">' . $name . '</a>
		//                     <div class="new_prod_bg">
		//                     <span class="new_icon"><img src="' . $imageURL . '/special_icon.gif" alt="" title="" /></span>
		//                     <a href="' . $link . '">' . $picture . '</a>
		//                     </div>           
		//                 </div>';
	}
}
?>
<div class="theme-card">
	<h5 class="title-border">Sách nổi bật</h5>
	<div class="offer-slider slide-1 slick-initialized slick-slider"><button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="">Previous</button>
		<div class="slick-list draggable">
			<div class="slick-track" style="opacity: 1; width: 1280px; transform: translate3d(-256px, 0px, 0px);">
				<div class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" tabindex="-1" style="width: 256px;">
					<div>
						<div style="width: 100%; display: inline-block;">
							<div class="media">
								<a href="item.html" tabindex="-1">
									<img class="img-fluid blur-up lazyloaded" src="images/product.jpg" alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
								<div class="media-body align-self-center">
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="item.html" title="Cẩm Nang Cấu Trúc Tiếng Anh" tabindex="-1">
										<h6>Cẩm Nang Cấu Trúc Tiếng Anh</h6>
									</a>
									<h4 class="text-lowercase">48,020 đ</h4>
								</div>
							</div>
							<div class="media">
								<a href="item.html" tabindex="-1">
									<img class="img-fluid blur-up lazyloaded" src="images/product.jpg" alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
								<div class="media-body align-self-center">
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="item.html" title="Cẩm Nang Cấu Trúc Tiếng Anh" tabindex="-1">
										<h6>Cẩm Nang Cấu Trúc Tiếng Anh</h6>
									</a>
									<h4 class="text-lowercase">48,020 đ</h4>
								</div>
							</div>
							<div class="media">
								<a href="item.html" tabindex="-1">
									<img class="img-fluid blur-up lazyloaded" src="images/product.jpg" alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
								<div class="media-body align-self-center">
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="item.html" title="Cẩm Nang Cấu Trúc Tiếng Anh" tabindex="-1">
										<h6>Cẩm Nang Cấu Trúc Tiếng Anh</h6>
									</a>
									<h4 class="text-lowercase">48,020 đ</h4>
								</div>
							</div>
							<div class="media">
								<a href="item.html" tabindex="-1">
									<img class="img-fluid blur-up lazyloaded" src="images/product.jpg" alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
								<div class="media-body align-self-center">
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="item.html" title="Cẩm Nang Cấu Trúc Tiếng Anh" tabindex="-1">
										<h6>Cẩm Nang Cấu Trúc Tiếng Anh</h6>
									</a>
									<h4 class="text-lowercase">48,020 đ</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 256px;">
					<div>
						<div style="width: 100%; display: inline-block;">
							<div class="media">
								<a href="item.html" tabindex="0">
									<img class="img-fluid blur-up lazyloaded" src="images/product.jpg" alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
								<div class="media-body align-self-center">
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="item.html" title="Cẩm Nang Cấu Trúc Tiếng Anh" tabindex="0">
										<h6>Cẩm Nang Cấu Trúc Tiếng Anh</h6>
									</a>
									<h4 class="text-lowercase">48,020 đ</h4>
								</div>
							</div>
							<div class="media">
								<a href="item.html" tabindex="0">
									<img class="img-fluid blur-up lazyloaded" src="images/product.jpg" alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
								<div class="media-body align-self-center">
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="item.html" title="Cẩm Nang Cấu Trúc Tiếng Anh" tabindex="0">
										<h6>Cẩm Nang Cấu Trúc Tiếng Anh</h6>
									</a>
									<h4 class="text-lowercase">48,020 đ</h4>
								</div>
							</div>
							<div class="media">
								<a href="item.html" tabindex="0">
									<img class="img-fluid blur-up lazyloaded" src="images/product.jpg" alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
								<div class="media-body align-self-center">
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="item.html" title="Cẩm Nang Cấu Trúc Tiếng Anh" tabindex="0">
										<h6>Cẩm Nang Cấu Trúc Tiếng Anh</h6>
									</a>
									<h4 class="text-lowercase">48,020 đ</h4>
								</div>
							</div>
							<div class="media">
								<a href="item.html" tabindex="0">
									<img class="img-fluid blur-up lazyloaded" src="images/product.jpg" alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
								<div class="media-body align-self-center">
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="item.html" title="Cẩm Nang Cấu Trúc Tiếng Anh" tabindex="0">
										<h6>Cẩm Nang Cấu Trúc Tiếng Anh</h6>
									</a>
									<h4 class="text-lowercase">48,020 đ</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="slick-slide" data-slick-index="1" aria-hidden="true" style="width: 256px;" tabindex="-1">
					<div>
						<div style="width: 100%; display: inline-block;">
							<div class="media">
								<a href="item.html" tabindex="-1">
									<img class="img-fluid blur-up lazyloaded" src="images/product.jpg" alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
								<div class="media-body align-self-center">
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="item.html" title="Cẩm Nang Cấu Trúc Tiếng Anh" tabindex="-1">
										<h6>Cẩm Nang Cấu Trúc Tiếng Anh</h6>
									</a>
									<h4 class="text-lowercase">48,020 đ</h4>
								</div>
							</div>
							<div class="media">
								<a href="item.html" tabindex="-1">
									<img class="img-fluid blur-up lazyloaded" src="images/product.jpg" alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
								<div class="media-body align-self-center">
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="item.html" title="Cẩm Nang Cấu Trúc Tiếng Anh" tabindex="-1">
										<h6>Cẩm Nang Cấu Trúc Tiếng Anh</h6>
									</a>
									<h4 class="text-lowercase">48,020 đ</h4>
								</div>
							</div>
							<div class="media">
								<a href="item.html" tabindex="-1">
									<img class="img-fluid blur-up lazyloaded" src="images/product.jpg" alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
								<div class="media-body align-self-center">
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="item.html" title="Cẩm Nang Cấu Trúc Tiếng Anh" tabindex="-1">
										<h6>Cẩm Nang Cấu Trúc Tiếng Anh</h6>
									</a>
									<h4 class="text-lowercase">48,020 đ</h4>
								</div>
							</div>
							<div class="media">
								<a href="item.html" tabindex="-1">
									<img class="img-fluid blur-up lazyloaded" src="images/product.jpg" alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
								<div class="media-body align-self-center">
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="item.html" title="Cẩm Nang Cấu Trúc Tiếng Anh" tabindex="-1">
										<h6>Cẩm Nang Cấu Trúc Tiếng Anh</h6>
									</a>
									<h4 class="text-lowercase">48,020 đ</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="slick-slide slick-cloned" data-slick-index="2" aria-hidden="true" tabindex="-1" style="width: 256px;">
					<div>
						<div style="width: 100%; display: inline-block;">
							<div class="media">
								<a href="item.html" tabindex="-1">
									<img class="img-fluid blur-up lazyloaded" src="images/product.jpg" alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
								<div class="media-body align-self-center">
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="item.html" title="Cẩm Nang Cấu Trúc Tiếng Anh" tabindex="-1">
										<h6>Cẩm Nang Cấu Trúc Tiếng Anh</h6>
									</a>
									<h4 class="text-lowercase">48,020 đ</h4>
								</div>
							</div>
							<div class="media">
								<a href="item.html" tabindex="-1">
									<img class="img-fluid blur-up lazyloaded" src="images/product.jpg" alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
								<div class="media-body align-self-center">
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="item.html" title="Cẩm Nang Cấu Trúc Tiếng Anh" tabindex="-1">
										<h6>Cẩm Nang Cấu Trúc Tiếng Anh</h6>
									</a>
									<h4 class="text-lowercase">48,020 đ</h4>
								</div>
							</div>
							<div class="media">
								<a href="item.html" tabindex="-1">
									<img class="img-fluid blur-up lazyloaded" src="images/product.jpg" alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
								<div class="media-body align-self-center">
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="item.html" title="Cẩm Nang Cấu Trúc Tiếng Anh" tabindex="-1">
										<h6>Cẩm Nang Cấu Trúc Tiếng Anh</h6>
									</a>
									<h4 class="text-lowercase">48,020 đ</h4>
								</div>
							</div>
							<div class="media">
								<a href="item.html" tabindex="-1">
									<img class="img-fluid blur-up lazyloaded" src="images/product.jpg" alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
								<div class="media-body align-self-center">
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="item.html" title="Cẩm Nang Cấu Trúc Tiếng Anh" tabindex="-1">
										<h6>Cẩm Nang Cấu Trúc Tiếng Anh</h6>
									</a>
									<h4 class="text-lowercase">48,020 đ</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="slick-slide slick-cloned" data-slick-index="3" aria-hidden="true" tabindex="-1" style="width: 256px;">
					<div>
						<div style="width: 100%; display: inline-block;">
							<div class="media">
								<a href="item.html" tabindex="-1">
									<img class="img-fluid blur-up lazyloaded" src="images/product.jpg" alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
								<div class="media-body align-self-center">
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="item.html" title="Cẩm Nang Cấu Trúc Tiếng Anh" tabindex="-1">
										<h6>Cẩm Nang Cấu Trúc Tiếng Anh</h6>
									</a>
									<h4 class="text-lowercase">48,020 đ</h4>
								</div>
							</div>
							<div class="media">
								<a href="item.html" tabindex="-1">
									<img class="img-fluid blur-up lazyloaded" src="images/product.jpg" alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
								<div class="media-body align-self-center">
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="item.html" title="Cẩm Nang Cấu Trúc Tiếng Anh" tabindex="-1">
										<h6>Cẩm Nang Cấu Trúc Tiếng Anh</h6>
									</a>
									<h4 class="text-lowercase">48,020 đ</h4>
								</div>
							</div>
							<div class="media">
								<a href="item.html" tabindex="-1">
									<img class="img-fluid blur-up lazyloaded" src="images/product.jpg" alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
								<div class="media-body align-self-center">
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="item.html" title="Cẩm Nang Cấu Trúc Tiếng Anh" tabindex="-1">
										<h6>Cẩm Nang Cấu Trúc Tiếng Anh</h6>
									</a>
									<h4 class="text-lowercase">48,020 đ</h4>
								</div>
							</div>
							<div class="media">
								<a href="item.html" tabindex="-1">
									<img class="img-fluid blur-up lazyloaded" src="images/product.jpg" alt="Cẩm Nang Cấu Trúc Tiếng Anh"></a>
								<div class="media-body align-self-center">
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="item.html" title="Cẩm Nang Cấu Trúc Tiếng Anh" tabindex="-1">
										<h6>Cẩm Nang Cấu Trúc Tiếng Anh</h6>
									</a>
									<h4 class="text-lowercase">48,020 đ</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><button class="slick-next slick-arrow" aria-label="Next" type="button" style="">Next</button>
	</div>
</div>