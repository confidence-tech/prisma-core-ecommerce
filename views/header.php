<!-- Header start -->
<header id="header">
	<div class="container position-r">
		<div class="row m-0">
			<div class="col-lg-3 col-md-4 col-4 p-0">
				<div class="navbar-header">
					<a class="navbar-brand page-scroll" href="/index">
						<img alt="xpoge"  width="36px" src="/templates/images/leoray2.svg">
					</a> 
				</div>
			</div>
			<div class="col-lg-9 col-md-8 col-8 p-0 position-initial">
				<div class="right-side">
					<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle d-block d-lg-none d-xl-none" type="button"><i class="fa fa-bars"></i>
					</button>
					<div class="overlay"></div>
					<div id="menu" class="navbar-collapse collapse" >
						<ul class="nav navbar-nav">
							<li class="level">
								<li><a class="active" class="nav-link" href="/index"><?=$this->lang_var[0]['text_val']?></a></li>
							</li>
							
							<li class="level dropdown">
								<span id="opener" class="opener plus"></span>
								<a href="/catalog/1?category=all&gender=man" class="nav-link"><?=$this->lang_var[1]['text_val']?></a>
								<div class="megamenu full mobile-sub-menu">
									<div class="megamenu-inner-top">
										<div class="row sub-menu-level1">
										<div class="col-lg-6 level2 "> <a href="/catalog/1?category=all&gender=man"><span><?=$this->lang_var[17]['text_val']?></span></a>
											<ul class="sub-menu-level2">
												<?php for ($i = 0; $i < count($this->category['man']); $i++): ?>
													<li class="level3"><a href="/catalog/1?category=<?=$this->category['man'][$i]['id']?>"><span>■</span><?=$this->category['man'][$i]['type_'.$_SESSION['lang']]?></a></li>
												<?php endfor; ?>
											</ul>
										</div>
										<div class="col-lg-6 level2"> <a href="/catalog/1?category=all&gender=man&access=true"><span><?=$this->lang_var[3]['text_val']?></span></a>
											<ul class="sub-menu-level2">
												<?php for ($i = 0; $i < count($this->category['accessorize_man']); $i++): ?>
													<li class="level3"><a href="/catalog/1?category=<?=$this->category['accessorize_man'][$i]['id']?>"><span>■</span><?=$this->category['accessorize_man'][$i]['type_'.$_SESSION['lang']]?></a></li>
												<?php endfor; ?>
											</ul>
										</div>
									
										</div>
										<div class="row">
										<div class="col-lg-6 mt-30 d-none d-lg-block">
											<div class="sub-menu-img">
												<a href="/catalog/1?category=all&gender=man">
													<img src="/templates/images/drop_banner1.jpg" alt="Xpoge">
												</a>
											</div>
										</div>
										<div class="col-lg-6 mt-30 d-none d-lg-block">
											<div class="sub-menu-img">
												<a href="/catalog/1?category=all&gender=man">
													<img src="/templates/images/drop_banner2.jpg" alt="Xpoge">
												</a>
											</div>
										</div>
										</div>
									</div>
								</div>
							</li>

							

							<li class="level dropdown">
								<span id="opener" class="opener plus"></span>
								<a href="/catalog/1?category=all&gender=woman" class="nav-link"><?=$this->lang_var[2]['text_val']?></a>
								<div class="megamenu full mobile-sub-menu">
									<div class="megamenu-inner-top">
										<div class="row sub-menu-level1">
										<div class="col-lg-6 level2 "> <a href="/catalog/1?category=all&gender=woman"><span><?=$this->lang_var[17]['text_val']?></span></a>
											<ul class="sub-menu-level2">
												<?php for ($i = 0; $i < count($this->category['woman']); $i++): ?>
													<li class="level3"><a href="/catalog/1?category=<?=$this->category['woman'][$i]['id']?>"><span>■</span><?=$this->category['woman'][$i]['type_'.$_SESSION['lang']]?></a></li>
												<?php endfor; ?>
											</ul>
										</div>
										<div class="col-lg-6 level2"> <a href="/catalog/1?category=all&gender=woman&access=true"><span><?=$this->lang_var[3]['text_val']?></span></a>
											<ul class="sub-menu-level2">
												<?php for ($i = 0; $i < count($this->category['accessorize_woman']); $i++): ?>
													<li class="level3"><a href="/catalog/1?category=<?=$this->category['accessorize_woman'][$i]['id']?>"><span>■</span><?=$this->category['accessorize_woman'][$i]['type_'.$_SESSION['lang']]?></a></li>
												<?php endfor; ?>
											</ul>
										</div>

									
										</div>
										<div class="row">
										<div class="col-lg-6 mt-30 d-none d-lg-block">
											<div class="sub-menu-img">
												<a href="/catalog/1?category=all&gender=woman">
													<img src="/templates/images/drop_banner3v.jpg" alt="Xpoge">
												</a>
											</div>
										</div>
										<div class="col-lg-6 mt-30 d-none d-lg-block">
											<div class="sub-menu-img">
												<a href="/catalog/1?category=all&gender=woman">
													<img src="/templates/images/drop_banner4.jpg" alt="Xpoge">
												</a>
											</div>
										</div>
										</div>
									</div>
								</div>
							</li>

							<li class="level dropdown">
								<span id="opener" class="opener plus"></span>
								<a href="/catalog/1?category=all" class="nav-link"><?=$this->lang_var[3]['text_val']?></a>
								<div class="megamenu full mobile-sub-menu">
									<div class="megamenu-inner-top">
										<div class="row sub-menu-level1">
										<div class="col-lg-6 level2 "> <a href="/catalog/1?category=all&gender=man&access=true"><span><?=$this->lang_var[18]['text_val']?></span></a>
											<ul class="sub-menu-level2">
												<?php for ($i = 0; $i < count($this->category['accessorize_man']); $i++): ?>
													<li class="level3"><a href="/catalog/1?category=<?=$this->category['accessorize_man'][$i]['id']?>"><span>■</span><?=$this->category['accessorize_man'][$i]['type_'.$_SESSION['lang']]?></a></li>
												<?php endfor; ?>
											</ul>
										</div>
										<div class="col-lg-6 level2"> <a href="/catalog/1?category=all&gender=woman&access=true"><span><?=$this->lang_var[19]['text_val']?></span></a>
											<ul class="sub-menu-level2">
												<?php for ($i = 0; $i < count($this->category['accessorize_woman']); $i++): ?>
													<li class="level3"><a href="/catalog/1?category=<?=$this->category['accessorize_woman'][$i]['id']?>"><span>■</span><?=$this->category['accessorize_woman'][$i]['type_'.$_SESSION['lang']]?></a></li>
												<?php endfor; ?>
											</ul>
										</div>

									
										</div>
										<div class="row">
										<div class="col-lg-6 mt-30 d-none d-lg-block">
											<div class="sub-menu-img">
												<a href="shop.html">
													<img src="/templates/images/drop_banner5.jpg" alt="Xpoge">
												</a>
											</div>
										</div>
										<div class="col-lg-6 mt-30 d-none d-lg-block">
											<div class="sub-menu-img">
												<a href="shop.html">
													<img src="/templates/images/drop_banner6.jpg" alt="Xpoge">
												</a>
											</div>
										</div>
										</div>
									</div>
								</div>
							</li>
                            <li class="level">
                                <a class="nav-link" href="/blog"><?=$this->lang_var[4]['text_val']?></a></li>
                            </li>
							<li class="level dropdown">
								<span id="opener" class="opener plus"></span>
								<a href="#" class="nav-link"><?=$this->lang_var[5]['text_val']?></a>
								<div class="megamenu mobile-sub-menu">
									<div class="megamenu-inner-top">
										<ul class="sub-menu-level1">
										<li class="level2 ">
											<ul class="sub-menu-level2">
												<li class="level3"><a href="/contact"><?=$this->lang_var[6]['text_val']?></a></li>
												<li class="level3"><a href="/pages/?page=about"><?=$this->lang_var[7]['text_val']?></a></li>
												<li class="level3"><a href="/pages/?page=delivery"><?=$this->lang_var[8]['text_val']?></a></li>
												<li class="level3"><a href="/pages/?page=pay_and_rev"><?=$this->lang_var[9]['text_val']?></a></li>
											</ul>
										</li>
										</ul>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="header-right-link">
						<ul>
						<li class="search-box">
							<a href="javascript:void(0)"><span></span></a>
						</li>
						<li class="account-icon"> 
							<a href="javascript:void(0)"><span></span></a>
							<div class="header-link-dropdown account-link-dropdown">
								<ul class="link-dropdown-list">
                                    <?php if ($this->is_logined == false): ?>
                                        <li> <span class="dropdown-title">Профиль</span>
                                    <?php else: ?>
                                    <li> <span class="dropdown-title"><?=$this->profile['f_name'].' '.$this->profile['l_name']?></span>
                                    <?php endif; ?>

									<ul>
                                        <?php if ($this->is_logined == false): ?>
                                            <li><a href="/user/login">Войти в аккаунт</a></li>
                                            <li><a href="/user/register">Зарегестрироватся</a></li>
                                        <?php else: ?>
                                            <li><a href="/user/setting">Настройки</a></li>
                                            <li><a href="/user/orders">Заказы</a></li>
                                            <li><a href="/user/wishlist">Список желаемого</a></li>
                                            <li><a href="/sign-out">Выйти</a></li>
                                        <?php endif; ?>
									</ul>
									</li>
								
								</ul>
							</div>
						</li>
						<li class="cart-icon"> 
							<a href="javascript:void(0)"> <span> 
								<small class="cart-notification">
									<?php if(isset($_SESSION['basced']) ?? count($_SESSION['basced']) > 0): ?>
										<?php $cart_count = 0;?>
										<?php foreach($_SESSION['basced'] as $cart_counter): ?>
											<?php $cart_count+=$cart_counter['count']; ?>
										<?php endforeach; ?>
										<?=$cart_count?>
									<?php else: ?>    
										0
									<?php endif; ?>
								</small> </span> </a>
							<div class="cart-dropdown header-link-dropdown">
								<?php $sum = 0; ?>
								<ul class="cart-list link-dropdown-list">
									<?php if(isset($_SESSION['basced']) && count($_SESSION['basced']) > 0): ?>
										<?php foreach($_SESSION['basced'] as $cart): ?>
											<li> 
												<a href="/basced/del/<?=$cart['id']?>" class="close-cart"><i class="fa fa-times-circle"></i></a>
												<figure> 
													<a href="/productinfo/<?=$cart['id']?>" class="pull-left"> 
														<img alt="<?=$cart['name']?>" src="/assets/tovar/<?=$cart['photo']?>">
													</a>
													<figcaption> <span><a href="/productinfo/<?=$cart['id']?>"><?=$cart['name']?></a></span>
														<p class="cart-price"><?=$this->info_data[6]['fulldescription_ru']?><?=$cart['price']?></p>

                                                        <div class="product-qty">
														    <label>Кол:</label>
															<div class="custom-qty">
																<strong><?=$cart['count']?></strong>
															</div>
                                                            <br>
                                                            <label>Размер:</label>
                                                            <div class="custom-qty">
                                                                <strong><?=$cart['size']?></strong>
                                                            </div>
														</div>
													</figcaption>
												</figure>
											</li>
											<?php $sum+=$cart['price']*$cart['count']; ?>
										<?php endforeach; ?>
									<?php else: ?>
										<li>
											<span class="text-danger"><i class="fa fa-shopping-cart"></i> Ваша корзина товаров пустая</span>
										</li>    
									<?php endif; ?>
								</ul>
								<?php if(isset($_SESSION['basced']) && count($_SESSION['basced']) > 0): ?>
									
									<p class="cart-sub-totle"> <span class="pull-left">Сумма корзины</span> <span class="pull-right"><strong class="price-box"><?=$this->info_data[6]['fulldescription_ru']?><?=$sum?></strong></span> </p>
									<div class="clearfix"></div>
									<div class="mt-20"> <a href="/cart" class="btn-color btn">Корзина</a> <a href="/order" class="btn-color btn right-side">Заказать</a> </div>
								<?php endif; ?>	
							</div>
						</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- Header end -->

