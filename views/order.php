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
		
		<!-- Search Screen start -->
		<?php require_once MAIN_URL.'/views/_part/search.php'; ?>
		<!-- Search Screen end -->

		<div class="main">
			<!-- Header start -->
			<?php require_once MAIN_URL.'/views/header.php'; ?>

            <!-- Checkout start -->
			<div class="contant">
				<div id="banner-part" class="banner inner-banner">
					<div class="container">
						<div class="bread-crumb-main">
							<h1 class="banner-title">Оформление заказа</h1>
							<div class="breadcrumb">
			                    <ul class="inline">
			                        <li><a href="/">Главная</a></li>
			                        <li>Заказ</li>
			                    </ul>
			                </div>
						</div>
					</div>
				</div>
				<div class="checkout-part ptb-100">
					<div class="container">
						<form class="main-form" method="post" action="/basced/order-success">
							<div class="row">
								<div class="col-12 col-lg-8">
									<div class="mb-md-30">
										<div class="mb-60">
											<div class="row">
												<div class="col-12">
													<div class="heading-part mb-30 mb-sm-20">
								                        <h3>Детали заказа</h3>
								                    </div>
												</div>
											</div>
											<div class="row">
												<div class="col-12">
													<div class="form-group">
														<label for="full-name">ФИО*</label>
					                                	<input id="full-name" name="name" type="text" value="<?php if (isset($this->profile['f_name'])): ?><?=$this->profile['f_name'].' '.$this->profile['l_name']?><?php endif; ?>" required="">
					                                </div>
												</div>
												<div class="col-12">
													<div class="form-group">
														<label for="email">Email</label>
					                                	<input id="email" name="email" type="text" value="<?php if (isset($this->profile['email'])): ?><?=$this->profile['email']?><?php endif; ?>">
					                                </div>
												</div>
												<div class="col-12">
													<div class="form-group">
														<label for="phone-no">Номер телефона*</label>
					                                	<input id="phone-no" name="phone" type="text" required="" value="<?php if (isset($this->profile['phone'])): ?><?=$this->profile['phone']?><?php endif; ?>">
					                                </div>
												</div>
												<div class="col-12">
													<div class="form-group">
														<label for="conutry">Город\Поселок*</label>
					                                	<input id="conutry" name="city" type="text" required="" value="<?php if (isset($this->profile['city'])): ?><?=$this->profile['city']?><?php endif; ?>">
					                                </div>
												</div>
												<div class="col-12">
													<div class="form-group">
														<label for="address">Адрес*</label>
					                                	<input id="address" name="adress" type="text" required="" value="<?php if (isset($this->profile['adress'])): ?><?=$this->profile['adress']?><?php endif; ?>">
					                                </div>
												</div>
												<div class="col-md-6 col-12">
													<div class="form-group">
														<label for="zip">Почтовый индекс*</label>
					                                	<input id="zip" name="zip" type="text" required="" value="<?php if (isset($this->profile['zip'])): ?><?=$this->profile['zip']?><?php endif; ?>">
					                                </div>
												</div>

											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<h4>Дополнительные детали доставки</h4>
												<div class="notes">
                                                    <textarea name="text_txt" placeholder="Примечание к заказу"></textarea>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12 col-lg-4">
									<div class="heading-part mb-30 mb-sm-20">
				                        <h3>Товары в заказе</h3>
				                    </div>
				                    <div class="checkout-products sidebar-product mb-60">
				                    	<ul>

                                            <?php
                                            if (isset($_SESSION['basced']) && count($_SESSION['basced']) > 0):
                                                $bascedTotal = 0;
                                                for ($i = 0; $i < count($_SESSION['basced']); $i++):
                                                    ?>
                                                    <li>
                                                        <div class="pro-media" style="width: 150px !important;"> <a href="/productinfo/<?=$_SESSION['basced'][$i]['id']?>"><img alt="T-shirt" src="/assets/tovar/<?=$_SESSION['basced'][$i]['photo']?>"></a> </div>
                                                        <div class="pro-detail-info"> <a href="/productinfo/<?=$_SESSION['basced'][$i]['id']?>" class="product-title"><?=$_SESSION['basced'][$i]['name']?></a>
                                                            <div class="price-box"> <span class="price"><?=$this->info_data[6]['fulldescription_ru']?> <?=$_SESSION['basced'][$i]['price']?></span> </div>
                                                            <div class="checkout-qty">
                                                                <div>
                                                                    <label>Кол: </label>
                                                                    <span class="info-deta"><strong><?=$_SESSION['basced'][$i]['count']?></strong></span>
                                                                </div>
                                                            </div>
                                                            <div class="checkout-qty">
                                                                <div>
                                                                    <label>Размер: </label>
                                                                    <span class="info-deta"><strong><?=$_SESSION['basced'][$i]['size']?></strong></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <?php
                                                    $bascedTotal += $_SESSION['basced'][$i]['price']*$_SESSION['basced'][$i]['count'];
                                                endfor;
                                            endif;
                                            ?>

						                </ul>
				                    </div>
                                    <div>

                                        <h6>Способы оплаты:</h6>
                                        <label class="text-dark">Наличный расчёт</label>
                                        <p>Если товар доставляется курьером, то оплата осуществляется наличными курьеру в руки. При получении товара обязательно проверьте
                                            комплектацию товара, наличие гарантийного талона и чека.
                                            </p>
                                        <label class="text-dark">Банковской картой</label>
                                        <p>Для выбора оплаты товара с помощью банковской карты на соответствующей странице необходимо нажать кнопку «Оплата заказа банковской картой».
                                            Оплата происходит через ПАО СБЕРБАНК с использованием Банковских карт следующих платежных систем:
                                        </p>

                                        <ul>
                                            <li>* МИР <img src="https://www.tadviser.ru/images/c/ce/%D0%9A%D0%B0%D1%80%D1%82%D1%8B_%D0%BF%D0%BB%D0%B0%D1%82%D0%B5%D0%B6%D0%BD%D0%BE%D0%B9_%D1%81%D0%B8%D1%81%D1%82%D0%B5%D0%BC%D1%8B_%D0%9C%D0%98%D0%A0_%D0%BB%D0%BE%D0%B3%D0%BE.png" width="26px"></li>
                                            <li>* VISA International <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/04/Visa.svg/2560px-Visa.svg.png" width="26px"></li>
                                            <li>* Mastercard Worldwide <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/MasterCard_1979_logo.svg" width="26px"></li>
                                        </ul>
                                    </div>
				                    <div class="complete-order-detail commun-table gray-bg mb-30">
					                    <div class="table-responsive">
                                            <input name="sum" type="hidden" value="<?=$bascedTotal?>">
					                      <table class="table m-0">
					                        <tbody>
					                          <tr>
					                            <td><b>Сумма заказа :</b></td>
					                            <td><div class="price-box"> <span class="price"><?=$this->info_data[6]['fulldescription_ru']?> <?=$bascedTotal?></span> </div></td>
					                          </tr>
					                          <tr>
					                            <td><b>Тип-оплаты :</b></td>
					                            <td>
                                                    <select name="payment_type" class="form-control">
                                                        <option value="1">Наличный расчёт</option>
                                                        <option value="2">Банковской картой</option>
                                                    </select>
                                                </td>
					                          </tr>

					                        </tbody>
					                      </table>
					                    </div>
					                </div>
					                <button class="btn full btn-color">Перейти к оплате</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Checkout end -->


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
