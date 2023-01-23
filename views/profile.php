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
                            <h1 class="banner-title">Профиль пользователя</h1>
                            <div class="breadcrumb">
                                <ul class="inline">
                                    <li><a href="/index">Главная</a></li>
                                    <li>Профиль</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ptb-100">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-2 col-xs-2">
                                <ul>
                                <li><a>sdsdssd</a></li>
                                <li><a>sdsdssd</a></li>
                                <li><a>sdsdssd</a></li>
                                <li><a>sdsdssd</a></li>

                                </ul>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 col-xs-10">
                                dasdsadasdsaasdasd
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
