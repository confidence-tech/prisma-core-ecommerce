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
		<!-- End preloader -->

		<!-- Search Screen start -->
		<div class="sidebar-search-wrap">
		    <div class="sidebar-table-container">
			    <div class="sidebar-align-container">
			        <div class="search-closer right-side"></div>
			        <div class="search-container">
			          <form method="get" id="search-form">
			            <input type="text" id="s" class="search-input" name="s" placeholder="Start Searching">
			          </form>
			          <span>Search and Press Enter</span>
			        </div>
			    </div>
		    </div>
		</div>
		<!-- Search Screen end -->

		<div class="main">
			<!-- Header start -->
            <?php require_once MAIN_URL.'/views/header.php'; ?>
			<!-- Header end -->

			<!-- Cart contant start -->
			<div class="contant">
				<div id="banner-part" class="banner inner-banner">
					<div class="container">
						<div class="bread-crumb-main">
							<h1 class="banner-title">Корзина товаров</h1>
							<div class="breadcrumb">
			                    <ul class="inline">
			                        <li><a href="/">Главная</a></li>
			                        <li>Корзина</li>
			                    </ul>
			                </div>
						</div>
					</div>
				</div>
                <form method="post" action="/basced/calculate">
				<div class="ptb-100">
					<div class="container">
						<div class="cart-item-table commun-table">
				            <div class="table-responsive">
				              <table class="table border mb-0">
				                <thead>
				                  <tr>

                                    <th class="align-left"><?=$this->lang['img']?></th>
                                    <th class="align-left"><?=$this->lang['product_name']?></th>
                                    <th><?=$this->lang['unit_price']?></th>
                                    <th>Размер</th>
                                    <th><?=$this->lang['count_product']?></th>
                                    <th><?=$this->lang['total']?></th>
                                    <th><?=$this->lang['delete']?></th>

				                    
				                  </tr>
				                </thead>
				                <tbody>


                                <?php
                                if (isset($_SESSION['basced']) && count($_SESSION['basced']) > 0):
                                    $bascedTotal = 0;
                                    for ($i = 0; $i < count($_SESSION['basced']); $i++):
                                        ?>

                                        <tr>
                                            <td class="align-left">
                                                <a href="/productinfo/<?=$_SESSION['basced'][$i]['id']?>"">
                                                    <div class="product-image">
                                                        <img alt="Eshoper" src="/assets/tovar/<?=$_SESSION['basced'][$i]['photo']?>">
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="align-left">
                                                <div class="product-title"> 
                                                    <a href="/productinfo/<?=$_SESSION['basced'][$i]['id']?>"><?=$_SESSION['basced'][$i]['name']?></a>
                                                </div>
                                            </td>
                                            <td>
                                                <ul>
                                                    <li>
                                                    <div class="base-price price-box"> 
                                                        <span class="price"><?=$this->info_data[6]['fulldescription_ru']?><?=$_SESSION['basced'][$i]['price']?></span> 
                                                    </div>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <div class="base-price price-box">
                                                            <span class="price text-dark"><?=$_SESSION['basced'][$i]['size']?></span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>
                                                <div class="input-box">
                                                    <input type="number" name="count<?=$_SESSION['basced'][$i]['id']?>" min="1" max="<?=$_SESSION['basced'][$i]['max']?>" value="<?=$_SESSION['basced'][$i]['count']?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="total-price price-box"> 
                                                <span class="price"><?=$this->info_data[6]['fulldescription_ru']?><?=$_SESSION['basced'][$i]['price']*$_SESSION['basced'][$i]['count']?></span> 
                                            </div>
                                            </td>
                                            <td>
                                                <a href="/basced/del/<?=$_SESSION['basced'][$i]['id']?>" class="btn small btn-color">
                                                    <i title="Remove Item From Cart" data-id="100" class="fa fa-trash cart-remove-item"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        
                                        <?php
                                        $bascedTotal += $_SESSION['basced'][$i]['price']*$_SESSION['basced'][$i]['count'];
                                    endfor;
                                endif;
                                ?>
				                  
				                </tbody>
				              </table>
				            </div>
				        </div>
                        <hr>
                        <div>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="cart-total-table commun-table">
                                        <div class="table-responsive">
                                            <table class="table border">
                                                <thead>
                                                <tr>
                                                    <th colspan="1">Сумма корзины</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <td>
                                                    <div class="price-box">
                                                        <span class="price"><b><?=$this->info_data[6]['fulldescription_ru']?> <?=$bascedTotal?></b></span>
                                                    </div>
                                                </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
				        <div class="mb-30">
					        <div class="row">
						        <div class="col-md-4">
						            <div class="mt-30">
                                        <a href="/catalog/1?category=all" class="btn btn-color">
                                            <i class="fa fa-angle-left"></i><span>Продолжить покупки</span>
                                        </a>
						            </div>
						        </div>
						        <div class="col-md-4">
						            <div class="mt-30 float-none-sm">
                                        <input class="btn btn-color" name="update_cart" value="Пересчитать корзину" type="submit">
                                    </div>
						        </div>
                                <div class="col-md-4">
                                    <div class="mt-30 float-none-xs">
                                        <a href="/order" class="btn btn-color">Заказать
                                            <span><i class="fa fa-angle-right"></i></span>
                                        </a>
                                    </div>
                                </div>
					        </div>
				        </div>


					</div>
				</div>
                </form>
			</div>
			<!-- Cart contant end -->

            <?php require_once MAIN_URL.'/views/_part/newslatter.php'; ?>
            <!-- Newslatter section end -->

            <?php require_once MAIN_URL.'/views/footer.php'; ?>
			<!-- Footer section end -->
		</div>
		<script src="/templates/js/jquery-3.4.1.min.js"></script>
		<script src="/templates/js/custom.js"></script>
        <script>

            /* ------------ Newslater-popup JS Start ------------- */
            $(window).on('load', function(){
                setTimeout(function(){
                    jQuery.magnificPopup.open({
                        items: {src: '#newslater-popup'},type: 'inline'}, 0);
                },10000)
            });
            $(".search-box").on('click', function(){
                $(".sidebar-search-wrap").addClass("open");
            });
            $("#search_close").on('click', function(){
                $("#search_block").removeClass("open");
            });
            /* ------------ Newslater-popup JS End ------------- */
        </script>
	</body>
	
</html>