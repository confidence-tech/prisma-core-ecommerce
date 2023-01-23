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
		<?php require_once MAIN_URL.'/views/_part/search.php'; ?>
		<!-- Search Screen end -->

		<div class="main">
			<!-- Header start -->
			<?php require_once MAIN_URL.'/views/header.php'; ?>
			<!-- Header end -->

			<!-- Register contant start -->
			<div class="contant">
				<div id="banner-part" class="banner inner-banner">
					<div class="container">
						<div class="bread-crumb-main">
							<h1 class="banner-title">Регистрация</h1>
							<div class="breadcrumb">
			                    <ul class="inline">
			                        <li><a href="/index">Главная</a></li>
			                        <li>Регистрация</li>
			                    </ul>
			                </div>
						</div>
					</div>
				</div>
				<div class="ptb-100">
					<div class="container">
						<div class="row justify-content-center">
				            <div class="col-xl-6 col-lg-8 col-md-8 ">
				              <form class="main-form full" action="/register-process" method="post">
				                <div class="row">
				                  <div class="col-12 mb-20">
				                    <div class="heading-part align-center">
				                      <h2 class="heading">Регистрация личного кабинета<t</h2>
				                    </div>
				                  </div>
				                  <div class="col-12">
				                    <div class="form-group">
				                      <label for="f-name">Имя</label>
				                      <input type="text" id="f-name" name="f-name" required="required" <?php if (isset($_POST['f-name'])): ?>value="<?=$_POST['f-name']?>"<?php endif; ?> placeholder="Введите ваше имя">
				                    </div>
				                  </div>
				                  <div class="col-12">
				                    <div class="form-group">
				                      <label for="l-name">Фамилия</label>
				                      <input type="text" id="l-name" name="l-name" required="required" <?php if (isset($_POST['l-name'])): ?>value="<?=$_POST['l-name']?>"<?php endif; ?> placeholder="Введите ваше фамилию">
				                    </div>
				                  </div>
				                  <div class="col-12">
				                    <div class="form-group">
				                      <label for="login-email">Email адресс</label>
				                      <input id="login-email" type="email" name="email" required="required" <?php if (isset($_POST['email'])): ?>value="<?=$_POST['email']?>"<?php endif; ?> placeholder="Введите ваш Email">
				                    </div>
				                  </div>
				                  <div class="col-12">
				                    <div class="form-group">
				                      <label for="login-pass">Пароль</label>
				                      <input id="login-pass" type="password" name="pass" required="required" <?php if (isset($_POST['pass'])): ?>value="<?=$_POST['pass']?>"<?php endif; ?> placeholder="Введите пароль">
				                    </div>
				                  </div>
				                  <div class="col-12">
				                    <div class="form-group">
				                      <label for="re-enter-pass">Подтверждение пароля</label>
				                      <input id="re-enter-pass" type="password" name="repass" required="required" <?php if (isset($_POST['repass'])): ?>value="<?=$_POST['repass']?>"<?php endif; ?> placeholder="Повторите пароль">
				                    </div>
				                  </div>
                                <div class="col-md-12">
                                    <hr />
                                    <label>Введите капчу</label>
                                </div>
                                <div class="col-md-12 h1 text-center" style="display: inline-flex;">
                                    <?php $one_n = rand(1, 6); ?>
                                    <?php $two_n = rand(1, 6); ?>
                                    <input type="hidden" id="suma_cp" name="suma_cp" value="<?=$one_n+$two_n?>">
                                    <strong style="background-color: #ffffd2; padding: 15px; color: #001ff1; height: 58px"><?=$one_n?></strong> <span style="padding: 15px; height: 58px">+</span> <strong style="background-color: #ffffd2; padding: 15px; color: #15f102; height: 58px"><?=$two_n?></strong> <span style="padding: 15px; height: 58px">=</span> <input required="required" style="width: 80px; height: 58px" id="capcha" class="form-control" name="capcha" type="number">
                                </div>
                                <?php if (isset($status) && $status == false): ?>
                                    <div class="col-md-12">
                                        <div class="alert alert-danger">
                                            Аккаунт с таким логином или ник-неймом уже существует
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($pss) && $pss == false): ?>
                                    <div class="col-md-12">
                                        <div class="alert alert-danger">
                                            Пароли не совпадают. Проверьте правильность ввода
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($cpch) && $cpch == false): ?>
                                    <div class="col-md-12">
                                        <div class="alert alert-danger">
                                            Капча не пройдена. Ответ не верный
                                        </div>
                                    </div>
                                <?php endif; ?>
				                  <div class="col-12">
				                  	<div class="mb-30 dit w-100">
					                    <div class="check-box left-side mt-15"> 
					                      <span>
					                        <input type="checkbox" name="remember_me" id="remember_me" class="checkbox">
					                        <label for="remember_me" class="mb-0">Запомнить меня</label>
					                      </span>
					                    </div>
					                    <button name="submit" type="submit" class="btn-color right-side">Создать аккаунт</button>
				                    </div>
				                  </div>
				                  <div class="col-12">
				                  	<hr>
				                    <div class="new-account align-center mt-20"> <span>Регистрировались ранее?</span> 
				                    	<a class="link" title="Login Here" href="/user/login">Войти в профиль</a> </div>
				                  </div>
				                </div>
				              </form>
				            </div>
				        </div>
					</div>
				</div>
			</div>
			<!-- Register contant end -->

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

			<!-- Footer section start -->
			<!-- Header start -->
			<?php require_once MAIN_URL.'/views/footer.php'; ?>
			<!-- Header end -->
			<!-- Footer section end -->
		</div>
		<script src="/templates/js/jquery-3.4.1.min.js"></script>
		<script src="/templates/js/custom.js"></script>
	</body>
	
</html>
