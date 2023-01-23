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
			<!-- Header start -->
			
			<?php require_once MAIN_URL.'/views/header.php'; ?>

            <form method="get" action="/catalog/1">
			<!-- Product list contant start -->
			<div class="contant">
			<div class="breadcrumbs_aree breadcrumbs_bg mb-100" data-bgimg="/assets/img/others/breadcrumbs-bg.png">
				<div id="banner-part" class="banner inner-banner">
					<div class="container">
						<div class="bread-crumb-main">
							<h1 class="banner-title"><?=$this->lang['menu_catalog']?></h1>
							<div class="breadcrumb">
			                    <ul class="inline">
			                        <li><a href="/"><?=$this->lang['menu_home']?></a></li>
			                        <li><?=$this->lang['menu_catalog']?></li>
			                    </ul>
			                </div>
		                </div>
					</div>
				</div>

				<div class="ptb-100">
					<div class="container">
						<div class="row">
							<div class="col-12 col-lg-4 col-xl-3">
								<div class="sidebar mb-md-30">
	                                <div class="sidebar-default">
	                                    <div class="category-content">
	                                        <h2 class="cat-title">Фильтры:</h2>
	                                        <div class="">
						                    	<div class="inner-title">Мужская одежда и обувь</div>
							                    <ul>
												<?php
												if (isset($category) && !empty($category)){
													for ($i = 0; $i < count($this->category['man']); $i++):
														?>
														<li>
															<div class="check-box"> 
																<span>
																	<input type="checkbox" value="<?=$this->category['man'][$i]['id']?>" <?php if (isset($_GET['category1_'.$i])): ?>checked="checked"<?php endif; ?> class="checkbox" id="category1_<?=$i?>" name="category1_<?=$i?>">
																	<label for="category1_<?=$i?>"><?=$this->category['man'][$i]['type_ru']?></label>
																</span>
															</div>
														</li>
														<?php
													endfor; ?>
													<?php }else{ ?>
													Category Empty
													<?php } ?>
							                        
							                    </ul>
						                    </div>
											<div class="">
						                    	<div class="inner-title">Женская одежда и обувь</div>
							                    <ul>
												<?php
												
												if (isset($category) && !empty($category)){
													for ($i = 0; $i < count($this->category['woman']); $i++):
														?>
														<li>
															<div class="check-box"> 
																<span>
																	<input type="checkbox" value="<?=$this->category['woman'][$i]['id']?>" <?php if (isset($_GET['category2_'.$i])): ?>checked="checked"<?php endif; ?> class="checkbox" id="category2_<?=$i?>" name="category2_<?=$i?>">
																	<label for="category2_<?=$i?>"><?=$this->category['woman'][$i]['type_ru']?></label>
																</span>
															</div>
														</li>
														<?php
													endfor; ?>
													<?php }else{ ?>
													Category Empty
													<?php } ?>
							                    </ul>
						                    </div>
                                            <div class="">
                                                <div class="inner-title">Мужские аксессуары</div>
                                                <ul>
                                                    <?php

                                                    if (isset($category) && !empty($category)){
                                                        for ($i = 0; $i < count($this->category['accessorize_man']); $i++):
                                                            ?>
                                                            <li>
                                                                <div class="check-box">
																<span>
																	<input type="checkbox" value="<?=$this->category['accessorize_man'][$i]['id']?>" <?php if (isset($_GET['category3_'.$i])): ?>checked="checked"<?php endif; ?> class="checkbox" id="category3_<?=$i?>" name="category3_<?=$i?>">
																	<label for="category3_<?=$i?>"><?=$this->category['accessorize_man'][$i]['type_ru']?></label>
																</span>
                                                                </div>
                                                            </li>
                                                        <?php
                                                        endfor; ?>
                                                    <?php }else{ ?>
                                                        Category Empty
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                            <div class="">
                                                <div class="inner-title">Женские аксессуары</div>
                                                <ul>
                                                    <?php

                                                    if (isset($category) && !empty($category)){
                                                        for ($i = 0; $i < count($this->category['accessorize_woman']); $i++):
                                                            ?>
                                                            <li>
                                                                <div class="check-box">
																<span>
																	<input value="<?=$this->category['accessorize_woman'][$i]['id']?>" type="checkbox" <?php if (isset($_GET['category4_'.$i])): ?>checked="checked"<?php endif; ?> class="checkbox" id="category4_<?=$i?>" name="category4_<?=$i?>">
																	<label for="category4_<?=$i?>"><?=$this->category['accessorize_woman'][$i]['type_ru']?></label>
																</span>
                                                                </div>
                                                            </li>
                                                        <?php
                                                        endfor; ?>
                                                    <?php }else{ ?>
                                                        Category Empty
                                                    <?php } ?>
                                                </ul>
                                            </div>

						                    <div class="">
						                    	<div class="inner-title">Цвет</div>
							                    <ul>
                                                    <?php for ($i = 0; $i < count($result['colors']); $i++): ?>
                                                        <li>
                                                            <div class="check-box">
                                                                <span>
                                                                    <input type="checkbox" <?php if (isset($_GET['color_'.$i])): ?>checked="checked"<?php endif; ?> class="checkbox" id="color_<?=$i?>" value="<?=$result['colors'][$i]['value']?>" name="color_<?=$i?>">
                                                                    <label for="color_<?=$i?>"><?=$result['colors'][$i]['value']?></label>
                                                                </span>
                                                            </div>
                                                        </li>
                                                    <?php endfor; ?>
							                    </ul>
						                    </div>
                                            <div class="">
                                                <div class="inner-title">Бренд</div>
                                                <ul>
                                                    <?php for ($i = 0; $i < count($result['brands']); $i++): ?>
                                                        <li>
                                                            <div class="check-box">
                                                                <span>
                                                                    <input type="checkbox" <?php if (isset($_GET['brands_'.$i])): ?>checked="checked"<?php endif; ?> class="checkbox" id="brands_<?=$i?>" value="<?=$result['brands'][$i]['id']?>" name="brands_<?=$i?>">
                                                                    <label for="brands_<?=$i?>"><?=$result['brands'][$i]['name_ru']?></label>
                                                                </span>
                                                            </div>
                                                        </li>
                                                    <?php endfor; ?>
                                                </ul>
                                            </div>
                                            <div class="">
                                                <hr>
                                            </div>
                                            <div class="">
                                                <input type="submit" id="filters_send" class="btn btn-color btn-success mb-20 mt-20" value="Применить фильтры">
                                                <a class="btn btn-color btn-filter mb-20" href="/catalog/1?category=all"><i class="fa fa-close"></i><span>Сбросить</span></a>
                                            </div>
	                                    </div>
	                                </div>
	                                <div class="sidebar-default">
	                                    <div class="sidebar-product">
	                                        <h2 class="cat-title">Новинки</h2>
	                                        <ul>
												<?php for($i = 0; $i < count($result['new_items']); $i++): ?>
                                                <?php if ($i == 3){break;} ?>
								                <li>
								                    <div class="pro-media"> <a href="/productinfo/<?=$result['new_items'][$i]['id']?>"><img alt="Xpoge" src="/assets/tovar/<?=$result['new_items'][$i]['name_photo']?>"></a> </div>
								                    <div class="pro-detail-info"> <a href="/productinfo/<?=$result['new_items'][$i]['id']?>" class="product-title"><?=$result['new_items'][$i]['model']?></a>
								                      <div class="price-box">
								                      	<span class="price"><?=$this->info_data[6]['fulldescription_ru']?> <?=$result['new_items'][$i]['price']?></span>
                                                          <?php if (!empty($result['new_items'][$i]['old_price']) && $result['new_items'][$i]['old_price'] != 0): ?>
                                                              <del class="price old-price"><?=$this->info_data[6]['fulldescription_ru']?> <?=$result['new_items'][$i]['old_price']?></del>
                                                          <?php endif; ?>
								                      </div>
								                      <div class="cart-link">
								                        <form>
                                                            <?php if($this->is_logined == true): ?>
                                                                <a href="/basced/add/<?=$result['new_items'][$i]['id']?>" title="Add to Cart">В корзину</a>
                                                            <?php else: ?>
                                                                <a href="/user/login" title="Add to Cart">В корзину</a>
                                                            <?php endif; ?>
								                        </form>
								                      </div>
								                    </div>
								                </li>
												<?php endfor; ?>
							                </ul>
	                                    </div>
	                                </div>
		                        </div>
							</div>
							<div class="col-12 col-lg-8 col-xl-9">
								<div class="shorting mb-30">
						            <div class="row">
						              <div class="col-lg-6">

						                <div class="short-by float-right-md"> <span>Сортировать по:</span>
                                            <select name="orderby" id="short">
                                                <?php
                                                if (isset($_GET['orderby']) && !empty($_GET['orderby'])){
                                                    if ($_GET['orderby'] == 1){
                                                        ?>
                                                        <option selected value="1"><?=$this->lang['default']?></option>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <option value="1"><?=$this->lang['default']?></option>
                                                        <?php
                                                    }
                                                    if ($_GET['orderby'] == 2){
                                                        ?>
                                                        <option selected value="2"><?=$this->lang['sort_popularity']?></option>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <option value="2"><?=$this->lang['sort_popularity']?></option>
                                                        <?php
                                                    }
                                                    if ($_GET['orderby'] == 3){
                                                        ?>
                                                        <option selected value="3"><?=$this->lang['sort_newest']?></option>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <option value="3"><?=$this->lang['sort_newest']?></option>
                                                        <?php
                                                    }
                                                    if ($_GET['orderby'] == 4){
                                                        ?>
                                                        <option selected value="4"><?=$this->lang['sort_price_low_to_high']?></option>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <option value="4"><?=$this->lang['sort_price_low_to_high']?></option>
                                                        <?php
                                                    }
                                                    if ($_GET['orderby'] == 5){
                                                        ?>
                                                        <option selected value="5"><?=$this->lang['sort_price_high_to_low']?></option>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <option value="5"><?=$this->lang['sort_price_high_to_low']?></option>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                    <option selected value="1"><?=$this->lang['default']?></option>
                                                    <option value="2"><?=$this->lang['sort_popularity']?></option>
                                                    <option value="3"><?=$this->lang['sort_newest']?></option>
                                                    <option value="4"><?=$this->lang['sort_price_low_to_high']?></option>
                                                    <option value="5"><?=$this->lang['sort_price_high_to_low']?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>

						                </div>
						              </div>
						              <div class="col-lg-6">
						                <div class="show-item right-side float-left-md">
                                            <span class="d-none d-md-block">Показано</span>
						                  <div class="select-item d-none d-md-block" style="margin-top: 6px">
						                    24
						                  </div>
						                  <span class="d-none d-md-block">на странице</span>
						                  <div class="compare float-right-sm"> <a href="/user/wishlist" class="btn btn-color">Список желаемого (<?=$wsh_count?>)</a> </div>
						                </div>
						              </div>
						            </div>
						        </div>
								<div class="product-section grid-view">
									<div class="row">
                                        <?php
                                        if (isset($result['items']) && count($result['items']) > 0):
                                        for ($i = 0; $i < count($result['items']); $i++):
                                        ?>

                                        <div class="col-lg-4 col-md-4 col-6">
					                		<div class="product-item">
					                			<div class="product-image">
													<?php if (isset($result['items'][$i]['old_price']) && $result['items'][$i]['old_price'] != 0): ?>
														<div class="sale-label"><span>Скидка!</span></div>
                                                    <?php endif; ?>
					                				
					                				<a href="/productinfo/<?=$result['items'][$i]['id']?>">
						                				<img src="/assets/tovar/<?=$result['items'][$i]['name_photo']?>" alt="Xpoge">
						                			</a>
					                			</div>
					                			<div class="product-details-outer">
						                			<div class="product-details">
						                				<div class="product-title">
						                					<a href="/productinfo/<?=$result['items'][$i]['id']?>"><?=$result['items'][$i]['model']?></a>
						                				</div>
						                				<div class="price-box">
                                                            <?php
                                                            if (isset($result['items'][$i]['old_price']) && $result['items'][$i]['old_price'] != 0):
                                                            ?>
                                                                <span class="price"><?=$this->info_data[6]['fulldescription_ru']?> <?=$result['items'][$i]['price']?></span>
                                                                <del class="price old-price"><?=$this->info_data[6]['fulldescription_ru']?> <?=$result['items'][$i]['old_price']?></del>
                                                            <?php else: ?>
                                                                <span class="price"><?=$this->info_data[6]['fulldescription_ru']?> <?=$result['items'][$i]['price']?></span>
                                                            <?php
                                                            endif;
                                                            ?>
						                				</div>
						                			</div>
						                			<div class="product-details-btn">
						                				<ul>
                                                            <li class="icon cart-icon">
                                                                <?php if($this->is_logined == true): ?>
                                                                    <a href="/basced/add/<?=$result['items'][$i]['id']?>">
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
                                                                    <a href="/wishlist/add/<?=$result['items'][$i]['id']?>">
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

                                        
                                        <?php endfor; ?>
                                        <?php else: ?>
                                        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                            <h3><?=$this->lang['items_not_found']?></h3>
                                        </div>
                                        <?php
                                        endif;
                                        ?>
                                        
					                	
					                </div>
								</div>
								<div class="shorting center-md">
						            <div class="row">
						              <div class="col-lg-6">
									  
						                <div class="pagination-bar">
					                      <ul>
										  <?php
										if (isset($pagination) && isset($page)){
											if ($pagination > 1){
												if ($page == 1){
													?>
													<li><a href="javascript:void();"><i class="fa fa-angle-left"></i></a></li>
													<?php
												}else{
													?>
													<li><a href="/catalog/<?=$page-1?>?<?=$this->link_for_filters?>"<i class="fa fa-angle-left"></i></a></li>
													<?php
												}
												for ($i = 1; $i <= $pagination; $i++):
													if ($i == $page){
														?>
														<li class="active"><a href="javascript:void();"><span><?=$i?></span></a></li>
														<?php
													}else{
														?>
														<li><a href="/catalog/<?=$i?>?<?=$this->link_for_filters?>"><?=$i?></a></li>
														<?php
													}
												endfor;
												if ($page == $pagination){
													?>
													<li><a href="javascript:void();"><i class="fa fa-angle-right"></i></a></li>
													<?php
												}else{
													?>
													<li><a href="/catalog/<?=$page+1?>?<?=$this->link_for_filters?>"><i class="fa fa-angle-right"></i></a></li>
													<?php
												}
											}
										}
										?>
					                      </ul>
					                    </div>
						              </div>
						              <div class="col-lg-6">
						                <div class="show-item right-side float-none-md"> 
						                	<span class="float-none-md d-block">Показана <?=$page?> из <?=$pagination?> (<?=$page?> Страница)</span>
						                </div>
						              </div>
						            </div>
						        </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Product list contant end -->
            </form>
            <?php require_once MAIN_URL.'/views/_part/newslatter.php'; ?>
            <!-- Newslatter section end -->

            <?php require_once MAIN_URL.'/views/footer.php'; ?>
			<!-- Footer section end -->
		</div>
        <script src="/templates/js/jquery-3.4.1.min.js"></script>
        <script src="/templates/js/bootstrap.min.js"></script>
        <script src="/templates/js/owl.carousel.min.js"></script>
        <script src="/templates/js/jquery.magnific-popup.min.js"></script>
        <script src="/templates/js/modernizr.js"></script>
        <script src="/templates/js/custom.js"></script>
		<script>
			/* ------------ Newslater-popup JS Start ------------- */
                $(".search-box").on('click', function(){
					$(".sidebar-search-wrap").addClass("open");
				});
				$("#search_close").on('click', function(){
					$("#search_block").removeClass("open");
				});
                $('#short').on('change', function () {
                    $('#filters_send').click();
                });
		    /* ------------ Newslater-popup JS End ------------- */
		</script>
	</body>
	
</html>
