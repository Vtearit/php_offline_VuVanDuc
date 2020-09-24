<?php
$module     = $this->arrParam['module'];
$controller = $this->arrParam['controller'];
$action     = $this->arrParam['action'];

// listCategory
$xhtml = '';
if(!empty($this->listCategory)){
	foreach($this->listCategory as $item){
        $bookID     		= $item['id'];
        $categoryID 		= $item['category_id'];
		$classImage         = 'img-fluid blur-up lazyload bg-img';
        $divStartImage      = '<div class="front">';
        $divEndImage        = '</div>';
        $srcPicture         = HTML_Frontend::getSrcPicture($item['picture'], TBL_CATEGORY);
        $link               = URL::createLink($module, 'book', 'list', ['book_id' => $bookID, 'category_id' => $categoryID]);

		$xhtml .= '
		<div class="product-box">
			<div class="img-wrapper">
				'.HTML_Frontend::showProductImage($link, $srcPicture, $item['name'], $classImage,  true, $divStartImage, $divEndImage).'
			</div>

			<div class="product-detail">
				'.HTML_Frontend::showProductName($link, $item['name'], '4').'
			</div>
		</div>
		';
	}
}

// Pagination
$paginationHTML		= $this->pagination->showPaginationPublic(URL::createLink($module, $controller, $action));
$paginationFrontEnd = HTML_Frontend::createPaginationPublic($this->arrParam['pagination'], $this->totalItems['totalItems']);
// echo '<pre>';
// print_r($this->pagination);
// echo '</pre>';
?>

<div class="breadcrumb-section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="page-title">
					<h2 class="py-2">Danh mục sách</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="ratio_asos j-box pets-box section-b-space" id="category">
	<div class="container">
		<div class="no-slider five-product row">
			<?php echo $xhtml ;?>
		</div>

		<div class="product-pagination">
			<div class="theme-paggination-block">
				<div class="container-fluid p-0">
					<div class="row">
						<div class="col-xl-6 col-md-6 col-sm-12">
							<nav aria-label="Page navigation">
								<nav>
									<ul class="pagination">
										<?php echo $paginationHTML ;?>
									</ul>
								</nav>
							</nav>
						</div>
						<div class="col-xl-6 col-md-6 col-sm-12">
							<div class="product-search-count-bottom">
								<?php echo $paginationFrontEnd ;?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>

