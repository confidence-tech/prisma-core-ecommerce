<?php
Initialization::show_head(
    $this->page_title,
    $this->meta_description,
    $this->meta_title,
    $this->meta_keywords,
    $_SESSION['lang']
);
?>
    <link rel="stylesheet" type="text/css" href="/templates/css/xpoge.css">
    <link rel="stylesheet" type="text/css" href="/templates/css/responsive.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-142494086-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-142494086-2');
    </script>
	</head>
	<body>
		<!-- Start preloader -->
		<!-- End preloader -->

		<!-- Search Screen start -->
		<?php require_once MAIN_URL.'/views/_part/search.php'; ?>
		<!-- Search Screen end -->


		<div class="main">
            <?php require_once MAIN_URL.'/views/header.php'; ?>
            <br>
            <section class="home-banner" style="margin-top: 60px; margin-bottom: 50px;">
				<div class="container">
					<div class="home-slider owl-carousel">
                        <?php $banners = Public_model::getBanners(); ?>
                        <?php foreach ($banners as $itm): ?>
                            <a href="<?=$itm['url']?>" class="align-flax">
                                <div class="w-100">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 align-flax">
                                            <div class="banner-img"><img src="/assets/banners/<?=$itm['photo']?>" alt="banner"></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
					</div>
				</div>
			</section>


			<!-- Product Section Start -->
			<section class="product-section pb-100">
				<div class="container">
					<div class="row">
	                	<div class="col-12">
	                    	<div class="heading-part text-center mb-30 mb-sm-20">
	                        	<h2 class="main_title"><?=$this->lang_var[21]['text_val']?></h2>
	                        </div>
	                    </div>
	                </div>
	                <div class="row">
                        <?php
                        if (isset($result) && !empty($result)):
                            for ($i = 0; $i < count($result['new_items']); $i++):
                                ?>
                                <div class="col-lg-3 col-md-4 col-6">
                                    <div class="product-item">
                                        <div class="product-image">
                                            <a href="/productinfo/<?=$result['new_items'][$i]['id']?>">
                                                <img src="/assets/tovar/<?=$result['new_items'][$i]['name_photo']?>" alt="Xpoge">
                                            </a>
                                        </div>
                                        <div class="product-details-outer">
                                            <div class="product-details">
                                                <div class="product-title">
                                                    <a href="/productinfo/<?=$result['new_items'][$i]['id']?>"><?=$result['new_items'][$i]['model']?></a>
                                                </div>
                                                <div class="price-box">
                                                    <span class="price"><?=$this->info_data[6]['fulldescription_ru']?> <?=$result['new_items'][$i]['price']?></span>
                                                </div>
                                            </div>
                                            <div class="product-details-btn">
                                                <ul>
                                                    <li class="icon cart-icon">
                                                        <?php if($this->is_logined == true): ?>
                                                            <a href="/basced/add/<?=$result['new_items'][$i]['id']?>">
                                                                <span></span>
                                                            </a>
                                                        <?php else: ?>
                                                            <a href="/user/login">
                                                                <span></span>
                                                            </a>
                                                        <?php endif; ?>
                                                    </li>
                                                    <li class="icon wishlist-icon">
														<?php if($this->is_logined == true): ?>
															<a href="/wishlist/add/<?=$result['new_items'][$i]['id']?>">
																<span></span>
															</a>
														<?php else: ?>
															<a href="/user/login">
																<span></span>
															</a>
														<?php endif; ?>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endfor;
                        endif;
                        ?>

	                	
	    
	                </div>
	                <div class="row">
	                	<div class="col-12">
	                		<div class="align-center">
	                			<a href="/catalog/1?orderby=3" class="btn btn-color">Смотреть все</a>
	                		</div>
	                	</div>
	                </div>
				</div>
			</section>
			<!-- Product Section End -->

			<!-- Product Section Start -->
			<section class="product-section pb-100">
				<div class="container">
					<div class="row">
	                	<div class="col-12">
	                    	<div class="heading-part text-center mb-30 mb-sm-20">
	                        	<h2 class="main_title"><?=$this->lang_var[22]['text_val']?></h2>
	                        </div>
	                    </div>
	                </div>
	                <div class="row">
                        <?php
                        if (isset($result) && !empty($result)):
                            for ($i = 0; $i < count($result['top_rate']); $i++):
                                ?>
                                <div class="col-lg-3 col-md-4 col-6">
                                    <div class="product-item">
                                        <div class="product-image">
                                            <a href="/productinfo/<?=$result['top_rate'][$i]['id']?>">
                                                <img src="/assets/tovar/<?=$result['top_rate'][$i]['name_photo']?>" alt="Xpoge">
                                            </a>
                                        </div>
                                        <div class="product-details-outer">
                                            <div class="product-details">
                                                <div class="product-title">
                                                    <a href="/productinfo/<?=$result['top_rate'][$i]['id']?>"><?=$result['top_rate'][$i]['model']?></a>
                                                </div>
                                                <div class="price-box">
                                                    <span class="price"><?=$this->info_data[6]['fulldescription_ru']?><?=$result['top_rate'][$i]['price']?></span>
                                                </div>
                                            </div>
                                            <div class="product-details-btn">
                                                <ul>
                                                    <li class="icon cart-icon">
                                                        <?php if($this->is_logined == true): ?>
                                                            <a href="/basced/add/<?=$result['top_rate'][$i]['id']?>">
                                                                <span></span>
                                                            </a>
                                                        <?php else: ?>
                                                            <a href="/user/login">
                                                                <span></span>
                                                            </a>
                                                        <?php endif; ?>
                                                    </li>
                                                    <li class="icon wishlist-icon">
														<?php if($this->is_logined == true): ?>
															<a href="/wishlist/add/<?=$result['new_items'][$i]['id']?>">
																<span></span>
															</a>
														<?php else: ?>
															<a href="/user/login">
																<span></span>
															</a>
														<?php endif; ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endfor;
                        endif;
                        ?>

	                	
	                
	                </div>
	                <div class="row">
	                	<div class="col-12">
	                		<div class="align-center">
	                			<a href="/catalog/1?orderby=2" class="btn btn-color">Смотреть все</a>
	                		</div>
	                	</div>
	                </div>
				</div>
			</section>
			<!-- Product Section End -->

			<!-- Blog section start -->
			<section class="blog-section pb-100">
				<div class="container">
					<div class="row">
	                	<div class="col-12">
	                    	<div class="heading-part text-center mb-30 mb-sm-20">
	                        	<h2 class="main_title"><?=$this->lang_var[23]['text_val']?></h2>
	                        </div>
	                    </div>
	                </div>
	                <div class="blog-contant list-view mb_-30">
	                	<div class="row">
                            <?php if (isset($result['blog']) && !empty($result['blog'])): ?>
                                <div class="col-lg-6">
                                    <div class="blog-item first-blog">
                                        <div class="blog-image">
                                            <a href="/blog-detail/<?=$result['blog'][0]['id']?>">
                                                <img src="/assets/blog/<?=$result['blog'][0]['photo']?>" alt="Xpoge">
                                            </a>
                                        </div>
                                        <div class="blog-detail">
                                            <span class="bloger-date"><?=$result['blog'][0]['author']?> (<?=$result['blog'][0]['data_create']?>)</span>
                                            <h3 class="head-three mb-10"><a href="/blog-detail/<?=$result['blog'][0]['id']?>"><?=$result['blog'][0]['title']?></a></h3>
                                            <a href="/blog-detail/<?=$result['blog'][0]['id']?>" class="readmore-btn">Смотреть</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <?php for ($i = 1; $i < count($result['blog']); $i++): ?>
                                            <div class="col-12">
                                                <div class="blog-item">
                                                    <div class="blog-image">
                                                        <a href="/blog-detail/<?=$result['blog'][$i]['id']?>">
                                                            <img src="/assets/blog/<?=$result['blog'][$i]['photo']?>" alt="Xpoge">
                                                        </a>
                                                    </div>
                                                    <div class="blog-detail">
                                                        <span class="bloger-date"><?=$result['blog'][$i]['author']?> (<?=$result['blog'][$i]['data_create']?>)</span>
                                                        <h5 class="mb-10"><a href="/blog-detail/<?=$result['blog'][$i]['id']?>"><?=$result['blog'][$i]['title']?></a></h5>
                                                        <a href="/blog-detail/<?=$result['blog'][$i]['id']?>" class="readmore-btn">Смотреть</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>

                            <?php endif; ?>


	                	</div>
	                </div>
				</div>
			</section>
			<!-- Blog section end -->
            


            <?php require_once MAIN_URL.'/views/_part/newslatter.php'; ?>
	        <!-- Newslatter section end -->

			<?php require_once MAIN_URL.'/views/footer.php'; ?>
			
		</div>
		<script src="/templates/js/jquery-3.4.1.min.js"></script>
		<script src="/templates/js/bootstrap.min.js"></script>
		<script src="/templates/js/owl.carousel.min.js"></script>
		<script src="/templates/js/jquery.magnific-popup.min.js"></script>
		<script src="/templates/js/modernizr.js"></script>
		<script src="/templates/js/custom.js"></script>
		<script>

            $(".search-box").on('click', function(){
                $(".sidebar-search-wrap").addClass("open");
            });
            $("#search_close").on('click', function(){
                $("#search_block").removeClass("open");
            });
		</script>
	</body>

</html>
