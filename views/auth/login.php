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

			<!-- Login contant start -->
			<div class="contant">
				<div id="banner-part" class="banner inner-banner">
					<div class="container">
						<div class="bread-crumb-main">
							<h1 class="banner-title">Войти в профиль</h1>
							<div class="breadcrumb">
			                    <ul class="inline">
			                        <li><a href="/index">Главная</a></li>
			                        <li>Вход</li>
			                    </ul>
			                </div>
						</div>
					</div>
				</div>
				<div class="ptb-100">
					<div class="container">
						<div class="row justify-content-center">
				            <div class="col-xl-6 col-lg-8 col-md-8 ">
				              <form class="main-form full" id="login-form">
				                <div class="row">
				                  <div class="col-12 mb-20">
				                    <div class="heading-part align-center">
				                      <h2 class="heading">Авторизация</h2>
				                    </div>
				                  </div>
				                  <div class="col-12">
				                    <div class="form-group">
				                      <label for="login-email">Email адресс</label>
				                      <input id="login-email" name="name" type="email" required="" placeholder="Введите ваш Email">
				                    </div>
				                  </div>
				                  <div class="col-12">
				                    <div class="form-group">
				                      <label for="login-pass">Пароль</label>
				                      <input id="login-pass" name="password" type="password" required="" placeholder="Введите пароль">
				                    </div>
				                  </div>
				                  <div class="col-12">
								  	<div class="align-center w-100 mb-2 text-danger" id="error"></div>
				                  	<div class="mb-30 dit w-100">
					                    <div class="check-box left-side mt-15"> 
					                      <span>
					                        <input type="checkbox" name="remember_me" id="remember_me" class="checkbox">
					                        <label for="remember_me" class="mb-0">Запомнить меня</label>
					                      </span>
					                    </div>
					                    <button name="submit" id="admin_login" type="submit" class="btn-color right-side">Войти</button>
				                    </div>
				                  </div>
								  
				                  <div class="col-12"> 
				                  	<hr>
				                  	<div class="align-center mt-20">
				                  		<a title="Forgot Password" class="link forgot-password mtb-20" href="/user/register">Забыли пароль?</a>
				                  	</div>
				                  </div>
				                  <div class="col-12">
				                    <div class="new-account align-center mt-20"> <span>Не имеете профиля?</span> 
				                    	<a class="link" title="Create New Account" href="/user/register">Создать аккаунт</a> </div>
				                  </div>
				                </div>
				              </form>
				            </div>
				        </div>
					</div>
				</div>
			</div>
			<!-- Login contant end -->

			<!-- Newslatter section start -->
			<section class="newsletter-section align-center ptb-100">
	            <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-9 col-12">
                            <div class="newsletter-title">
                                <h2 class="main_title">Sign up for Newsletter </h2>
                                <p>Wants to get latest updates! sign up for Free </p>
                            </div>
                            <div class="newsletter-input">
                                <form>
                                    <div class="form-group m-0">
                                        <input type="email" placeholder="Your email address" required="">
                                    </div>
                                    <button type="submit" class="btn btn-color"><span class="d-none d-sm-block">Subscribe</span> <i class="fa fa-send d-block d-sm-none"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
	            </div>
	        </section>
	        <!-- Newslatter section end -->

			<?php require_once MAIN_URL.'/views/footer.php'; ?>
		</div>
		<script src="/templates/js/jquery-3.4.1.min.js"></script>
		<script src="/templates/js/custom.js"></script>
		<script src="/templates/js/auth.js"></script>
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
