<?php
Initialization::show_head(
    $this->page_title,
    $this->meta_description,
    $this->meta_title,
    $this->meta_keywords,
    $_SESSION['lang']
);
?>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/templates/css/glass-case.css">
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
		<!-- <div id="preloader"></div> -->
		<!-- End preloader -->

		<!-- Search Screen start -->
		<?php require_once MAIN_URL.'/views/_part/search.php'; ?>
		<!-- Search Screen end -->

		<div class="main">
		<?php require_once MAIN_URL.'/views/header.php'; ?>

			<!-- Product detail contant start -->
			<div class="contant">
				<div id="banner-part" class="banner inner-banner">
					<div class="container">
						<div class="bread-crumb-main">
							<h1 class="banner-title"><?=$this->lang['product_info']?>:<br><?=$result['result']['model']?></h1>
							<div class="breadcrumb">
			                    <ul class="inline">
			                        <li><a href="/"><?=$this->lang['menu_home']?></a></li>
			                        <li><?=$this->lang['product_info']?></li>
			                    </ul>
			                </div>
		                </div>
					</div>
				</div>
				<div class="ptb-100">
					<div class="container">
						<div class="row">
							<div class="col-lg-5 col-md-6 col-12">
								<div class="align-center mb-md-30">
					                <ul id="glasscase" class="gc-start">
                                        <li><img class="img-full" src="/assets/tovar/<?=$result['result']['name_photo']?>" alt="Xpoge" /></li>
                                    
                                        <?php
                                        if (isset($result['photos']) && !empty($result['photos']) && $result['photos'] > 0):
                                            foreach ($result['photos'] as $item):
                                            ?>
                                            <li><img class="img-full" src="/assets/tovar/<?=$item['name_photo']?>" alt="Xpoge" /></li>
                                            <?php
                                            endforeach;
                                        ?>
                                        <?php else: ?>
                                            <style>
                                                .gc-thumbs-area-main{
                                                    display: none;
                                                }
                                            </style>
                                        <?php endif; ?>    
                                        
					                    
					                </ul>
					            </div>
							</div>
							<div class="col-lg-7 col-md-6 col-12">
								<div class="product-detail-main">
									<div class="product-item-details">
										<h1 class="product-item-name"><?=$result['result']['model']?></h1>
				                        <div class="price-box"> <span class="price"><?=$this->info_data[6]['fulldescription_ru']?><?=$result['result']['price']?></span> 
				                        	<?php if ($result['result']['old_price'] != 0): ?>
												<del class="price old-price"><?=$this->info_data[6]['fulldescription_ru']?><?=$result['result']['old_price']?></del>
											<?php endif; ?>
				                        </div>

				                        <div class="product-des">
		                					<p><?=$result['result']['fulldescription']?></p>
		                				</div>
				                        <ul class="product-list">
				                        	<li><i class="fa fa-check"></i> 100% натуральные материалы</li>
				                        	<li><i class="fa fa-check"></i> Бесплатная доставка</li>
				                        	<li><i class="fa fa-check"></i> Возврат в течении 14 дней</li>
				                        </ul>
				                        <hr class="mb-20">
				                        <div class="row">

                                            <?php if (isset($result['result']['size']) && !empty($result['result']['size']) && $result['result']['size'] != ''): ?>
				                            <div class="col-12">
					                            <div class="table-listing product-size select-arrow mb-20">
					                            	<div class="row">
					                            		<div class="col-xl-12 col-md-12 col-sm-12">
								                        	Размеры в наличии: <strong><?=$result['result']['size']?></strong>
								                        </div>
							                        </div>
							                    </div>
						                    </div>
                                            <?php endif; ?>
                                            <?php if (isset($result['result']['size']) && !empty($result['result']['size']) && $result['result']['size'] != ''): ?>
                                            <div class="col-12">
                                                <div class="table-listing product-color select-arrow mb-20">
                                                    <div class="row">
                                                        <div class="col-xl-2 col-md-3 col-12">
                                                            <span>Размер:</span>
                                                        </div>
                                                        <div class="col-xl-10 col-md-9 col-12">
                                                            <select class="selectpicker full" id="select-by-size">
                                                                <?php $sizes = explode(',', $result['result']['size']); ?>
                                                                <?php foreach ($sizes as $size): ?>
                                                                    <?php if(isset($_GET['size']) && $_GET['size'] == $size): ?>
                                                                        <option selected value="<?=$size?>"><?=$size?></option>
                                                                    <?php else: ?>
                                                                        <option value="<?=$size?>"><?=$size?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (isset($colors) && !empty($colors)): ?>
						                    <div class="col-12">
					                            <div class="table-listing product-color select-arrow mb-20">
					                            	<div class="row">
					                            		<div class="col-xl-2 col-md-3 col-12">
								                        	<span>Цвет:</span>
								                        </div>
								                        <div class="col-xl-10 col-md-9 col-12">
									                        <select class="selectpicker full" id="select-by-color">
                                                                <?php foreach ($colors as $color): ?>
                                                                    <?php if ($color['id_item'] == $result['result']['id']): ?>
                                                                        <option selected="selected" value="<?=$color['id_item']?>"><?=$color['value']?></option>
                                                                    <?php else: ?>
                                                                        <option value="<?=$color['id_item']?>"><?=$color['value']?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
									                        </select>
								                        </div>
							                        </div>
							                    </div>
						                    </div>
                                            <?php endif; ?>

				                        </div>
				                        <hr class="mb-20">
				                        <div class="product-details-btn"><!-- detail-page-btn  -->
				                        	<?php if ($result['result']['colichestvo'] > 0): ?>
                                            <ul>
											<li class="icon cart-icon">
                                                <?php if($this->is_logined == true): ?>
                                                    <a class="btn btn-color" href="/basced/add/<?=$result['result']['id']?><?php if(isset($_GET['size']) && !empty($_GET['size'])): ?>/?size=<?=$_GET['size']?><?php endif; ?>">
                                                        <span></span>В корзину
                                                    </a>
                                                <?php else: ?>
                                                    <a class="btn btn-color" href="/user/login">
                                                        <span></span>В корзину
                                                    </a>
                                                <?php endif; ?>

											</li>
											<li class="icon wishlist-icon">
												<?php if($this->is_logined == true): ?>
													<a href="/wishlist/add/<?=$result['result']['id']?>">
														<span></span>
													</a>
												<?php else: ?>
													<a class="btn btn-transparent" href="/user/login">
														<span></span>
													</a>
												<?php endif; ?>
											</li>
                                            <?php else: ?>
                                                <h4 class="text-danger">Нет в наличии</h4>
                                            <?php endif; ?>
                                        </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Product detail contant end -->

			<section class="product-tab-part position-r pb-100">
				<div class="container">
					<div class="product-tab-inner">
		                <div class="row">
		                	<div class="col-12">
                                <?php $comments = Public_model::getComments($result['result']['id']); ?>

                                <div id="tabs">
			                    	<ul class="nav nav-tabs">
				                        <li><a id="btn__description" class="#tab-Description tab selected" title="Description">Описание товара</a></li>
				                        <li><a id="btn__tags" class="#tab-Tags tab" title="Tags">Характеристики</a></li>
                                        <li><a id="btn__review" class="#tab-Review tab" title="Review">Отзывы (<?=count($comments)?>)</a></li>
			                    	</ul>
			                    </div>
			                    <div id="items">
				                    <div class="tab_content">
				                        <ul>
				                        	<li>
				                            	<div id="items-Description" class="items-Description selected">
                                                    <?=$result['result']['fulldescription']?>
                                            	</div>
				                            </li>
				                            <li>
				                            	<div id="items-Tags" class="items-Tags">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <td><strong>Бренд:</strong></td>
                                                            <td>
                                                                <?=$result['charact']['brand']['name_ru']?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Пол:</strong></td>
                                                            <td>
                                                                <?php if ($result['result']['gender'] == 1): ?>
                                                                    Мужское
                                                                <?php elseif ($result['result']['gender'] == 2): ?>
                                                                    Женское
                                                                <?php else: ?>
                                                                    Унисекс
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Размеры:</strong></td>
                                                            <td><?=$result['result']['size']?></td>
                                                        </tr>
                                                        <?php if (!empty($result['attr_all'])): ?>
                                                            <?php foreach ($result['attr_all'] as $attr): ?>
                                                                <tr>
                                                                    <td><strong><?=$attr['type']?>:</strong></td>
                                                                    <td><?=$attr['value']?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </table>
				                            	</div>
				                            </li>
				                            <li>
				                            	<div id="items-Review" class="items-Review">
                                                    <?php if (count($comments) > 0): ?>
                                                    <div class="comment-part">
														<ul class="comment-list mt-30">
                                                            <?php foreach ($comments as $comment): ?>
															<li>
																<div class="comment-user">
																	<img src="/templates/images/comment-img1.jpg" alt="comment-img">
																</div>
																<div class="comment-detail">
																	<span class="commenter"><span><?=$comment['name']?></span> (<?=$comment['date_create']?>)</span>
																	<p><?=$comment['fulldescription']?></p>
																</div>
																<div class="clearfix"></div>
															</li>
                                                            <?php if ($comment['reply'] && !empty($comment['reply'])): ?>
                                                                    <li>
                                                                        <ul class="comment-list child-comment">
                                                                            <li>
                                                                                <div class="comment-user">
                                                                                    <img src="/templates/images/comment-img2.jpg" alt="comment-img">
                                                                                </div>
                                                                                <div class="comment-detail">
                                                                                    <span class="commenter"><span>LeoRay</span></span>
                                                                                    <p><?=$comment['reply']?></p>
                                                                                </div>
                                                                                <div class="clearfix"></div>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
														</ul>
													</div>
                                                    <?php else: ?>
                                                        <div class="alert alert-danger"><i class="fa fa-info"></i> Отзывы по данному товару не найдены. </div>
                                                    <?php endif; ?>

                                                    <?php if($this->is_logined == true && !isset($_GET['comment'])): ?>
                                                        <div class="leave-comment-part pt-100">
                                                            <h3 class="head-three">Оставить отзыв</h3>
                                                            <form class="main-form" action="/add/comment" method="post">
                                                                <div class="row">
                                                                    <input name="id" type="hidden" value="<?=$this->profile['id']?>">
                                                                    <input name="id_item" type="hidden" value="<?=$result['result']['id']?>">
                                                                    <input name="name" type="hidden" value="<?=$this->profile['f_name'].' '.$this->profile['l_name']?>">
                                                                    <div class="col-12">
                                                                        <div class="form-group mb-30">
                                                                            <textarea name="fulldescription" placeholder="Введите текст" rows="5" required=""></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <button type="submit" class="btn-color">Добавить коментарии</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if(isset($_GET['comment'])): ?>
                                                        <div class="leave-comment-part pt-100">
                                                            <div class="alert alert-success"><i class="fa fa-send"></i> Ваш отзыв добавлен! </div>
                                                        </div>
                                                    <?php endif; ?>

				                            	</div>
				                            </li>
				                        </ul>
				                    </div>
			                	</div>
		                	</div>
		                </div>
	                </div>
				</div>
			</section>


            <?php if (isset($result['relative']) && !empty($result['relative']) && count($result['relative']) > 1): ?>
			<!-- Product Section Start -->
			<section class="product-section pb-100">
				<div class="container">
					<div class="row">
	                	<div class="col-12">
	                    	<div class="heading-part text-center mb-30 mb-sm-20">
	                        	<h2 class="main_title">Похожие товары</h2>
	                        </div>
	                    </div>
	                </div>
	                <div class="row">
                        <?php
                        if (isset($result) && !empty($result)):
                            for ($i = 0; $i < count($result['relative']); $i++):
                                ?>
                                <?php if ($result['relative'][$i]['id'] != $result['result']['id']): ?>
                                <div class="col-lg-3 col-md-4 col-6">
                                    <div class="product-item">
                                        <div class="product-image">
                                            <a href="/productinfo/<?=$result['relative'][$i]['id']?>">
                                                <img src="/assets/tovar/<?=$result['relative'][$i]['name_photo']?>" alt="Xpoge">
                                            </a>
                                        </div>
                                        <div class="product-details-outer">
                                            <div class="product-details">
                                                <div class="product-title">
                                                    <a href="/productinfo/<?=$result['relative'][$i]['id']?>"><?=$result['relative'][$i]['model']?></a>
                                                </div>
                                                <div class="price-box">
                                                    <span class="price"><?=$this->info_data[6]['fulldescription_ru']?> <?=$result['relative'][$i]['price']?></span>
                                                </div>
                                            </div>
                                            <div class="product-details-btn">
                                                <ul>
                                                    <li class="icon cart-icon">
                                                        <?php if($this->is_logined == true): ?>
                                                            <a href="/basced/add/<?=$result['relative'][$i]['id']?>">
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
                                                            <a href="/wishlist/add/<?=$result['relative'][$i]['id']?>">
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
                                <?php endif; ?>
                            <?php
                            endfor;
                        endif;
                        ?>

	                	
	    
	                </div>
	                <div class="row">
	                	<div class="col-12">
	                		<div class="align-center">
	                			<a href="/catalog/1?category=<?=$result['result']['id_type']?>" class="btn btn-color">Все похожие товары</a>
	                		</div>
	                	</div>
	                </div>
				</div>
			</section>
			<!-- Product Section End -->
            <?php endif; ?>


			<!-- Newslatter section start -->
            <?php require_once MAIN_URL.'/views/_part/newslatter.php'; ?>
            <!-- Newslatter section end -->

			<!-- Footer section start -->
            <?php require_once MAIN_URL.'/views/footer.php'; ?>
            <!-- Footer section end -->
		</div>
		<script src="/templates/js/jquery-3.4.1.min.js"></script>
		<script src="/templates/js/bootstrap.min.js"></script>
		<script src="/templates/js/owl.carousel.min.js"></script>
		<script src="/templates/js/modernizr.js"></script>
        <script src="/templates/js/custom.js"></script>
		<script>
	        $(document).ready( function () {
	            //If your <ul> has the id "glasscase"
	            $('#glasscase').glassCase({ 
	            	'thumbsPosition': 'bottom', 
	            	'widthDisplayPerc' : 100,
	            	isDownloadEnabled: false,
	            });
                $(".search-box").on('click', function(){
                    $(".sidebar-search-wrap").addClass("open");
                });
                $("#search_close").on('click', function(){
                    $("#search_block").removeClass("open");
                });
                $('#short').on('change', function () {
                    $('#filters_send').click();
                });
                $('#btn__description').click(function () {
                    $("#items-Review").hide();
                    $("#items-Tags").hide();
                    $('#btn__review').removeClass('selected');
                    $('#btn__tags').removeClass('selected');
                    $('#btn__description').addClass('selected');
                    $("#items-Description").show('slow');
                });
                $('#btn__review').click(function () {
                    $("#items-Description").hide();
                    $("#items-Tags").hide();
                    $('#btn__description').removeClass('selected');
                    $('#btn__tags').removeClass('selected');
                    $('#btn__review').addClass('selected');
                    $("#items-Review").show('slow');
                });
                $('#btn__tags').click(function () {
                    $("#items-Description").hide();
                    $("#items-Review").hide();
                    $('#btn__description').removeClass('selected');
                    $('#btn__review').removeClass('selected');
                    $('#btn__tags').addClass('selected');
                    $("#items-Tags").show('slow');
                });
                $('#select-by-color').on('change', function () {
                    location.href = '/productinfo/'+$('#select-by-color').val();
                });
                $('#select-by-size').on('change', function () {
                    location.href = '/productinfo/<?=$result['result']['id']?>/?size='+$('#select-by-size').val();
                });
	        });
	    </script>
		<script src="/templates/js/custom.js"></script>
	</body>
	
</html>
