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
    <?php require_once MAIN_URL.'/views/header.php'; ?>


    <!-- Contact contant start -->
    <div class="contant">
        <div id="banner-part" class="banner inner-banner">
            <div class="container">
                <div class="bread-crumb-main">
                    <h1 class="banner-title"><?=$data['page_name']?></h1>
                    <div class="breadcrumb">
                        <ul class="inline">
                            <li><a href="/index">Главная</a></li>
                            <li><?=$data['page_name']?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-part pt-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <div class="pb-100">
                            <div class="row">
                                <?=$data['fulldescription']?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact contant end -->

    <!-- Newslatter section start -->
    <?php require_once MAIN_URL.'/views/_part/newslatter.php'; ?>

    <!-- Newslatter section end -->

    <!-- Footer section start -->
    <?php require_once MAIN_URL.'/views/footer.php'; ?>
    <!-- Footer section end -->
</div>
<script src="/templates/js/jquery-3.4.1.min.js"></script>
<script src="/templates/js/custom.js"></script>
</body>

</html>


<?php
Initialization::show_head(
    $this->page_title,
    $this->meta_description,
    $this->meta_title,
    $this->meta_keywords,
    $_SESSION['lang']
);
?>
<!-- CSS
========================= -->
<link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
<link rel="stylesheet" href="/assets/css/slick.css">
<link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="/assets/css/ionicons.min.css">
<link rel="stylesheet" href="/assets/css/pe-icon-7-stroke.css">
<link rel="stylesheet" href="/assets/css/animate.css">
<link rel="stylesheet" href="/assets/css/nice-select.css">
<link rel="stylesheet" href="/assets/css/magnific-popup.css">
<link rel="stylesheet" href="/assets/css/jquery-ui.min.css">
<!-- Main Style CSS -->
<link rel="stylesheet" href="/assets/css/style.css">

<!--modernizr min js here-->
<script src="/assets/js/vendor/modernizr-3.11.2.min.js"></script>


<!-- Structured Data  -->
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "Replace_with_your_site_title",
        "url": "Replace_with_your_site_URL"
    }
</script>
</head>

<body class="bg-dark">


<!--offcanvas menu area start-->
<div class="body_overlay">

</div>




<!-- about description section start -->
<div class="about_description_section mb-105">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-12 mt-2">

                <div class="about_desc wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
                    <!-- The text field -->

                    <div id="container">

                        <hr class="text-muted">
                        <h3 class="text-center">Оплата на
                            <?php if ($cid == 1): ?>
                                BitCoin
                            <?php elseif($cid == 2): ?>
                                Ethereum
                            <?php elseif($cid == 3): ?>
                                Tether TRC20
                            <?php elseif($cid == 4): ?>
                                TRX
                            <?php elseif($cid == 5): ?>
                                Bitcoin Cash
                            <?php endif; ?>
                            кошелёк</h3>
                        <h4 class="fs-24">Номер заказа: <strong class="text-primary">#<?=$order_number?></strong></h4>

                        <?php if (isset($sts) && $sts == 0): ?>
                            <p><span style="font-weight: bolder">Товар: </span><?=$data['product_name']?></p>
                        <?php endif; ?>
                        <div class="align-content-center mt-5">
                            <img src="/assets/img/others/hero-mini-shape<?=$cid?>.png" width="92px">
                        </div>
                        <hr>
                        <p class="fs-26;" style="font-weight: 500">СУММА К ОПЛАТЕ: <?=$sum?></p>
                        <?php if ($sts == 1): ?>
                            <?=$order_text?>
                        <?php endif; ?>

                        <?php if ($cid == 1): ?>
                            <p id="text" style="padding: 5px; border-radius: 5px; border: 1px solid #0a080e"><?=$this->info_data[1]['fulldescription_'.$_SESSION['lang']]?></p>
                        <?php elseif($cid == 2): ?>
                            <p id="text" style="padding: 5px; border-radius: 5px; border: 1px solid #0a080e"><?=$this->info_data[2]['fulldescription_'.$_SESSION['lang']]?></p>
                        <?php elseif($cid == 3): ?>
                            <p id="text" style="padding: 5px; border-radius: 5px; border: 1px solid #0a080e"><?=$this->info_data[3]['fulldescription_'.$_SESSION['lang']]?></p>
                        <?php elseif($cid == 4): ?>
                            <p id="text" style="padding: 5px; border-radius: 5px; border: 1px solid #0a080e"><?=$this->info_data[4]['fulldescription_'.$_SESSION['lang']]?></p>
                        <?php elseif($cid == 5): ?>
                            <p id="text" style="padding: 5px; border-radius: 5px; border: 1px solid #0a080e"><?=$this->info_data[5]['fulldescription_'.$_SESSION['lang']]?></p>
                        <?php endif; ?>
                        <button id="copy" tooltip="Copy to clipboard">Скопировать кошелёк</button>

                        <div class="p-4"><strong class="text-danger">ВАЖНО!!!</strong> Переведите ровно <strong><?=$sum?></strong> одним платежем, затем нажмите "Проверить платеж"</div>



                        <form method="post" class="align-items-center p-4" action="/basced/order-success" enctype="multipart/form-data">
                            <input type="hidden" name="lvl1" value="<?=$product['result']['1lvl']?>">
                            <input type="hidden" name="lvl2" value="<?=$product['result']['2lvl']?>">
                            <input type="hidden" name="lvl3" value="<?=$product['result']['3lvl']?>">
                            <input type="hidden" name="lvl4" value="<?=$product['result']['4lvl']?>">
                            <input type="hidden" name="lvl5" value="<?=$product['result']['5lvl']?>">
                            <input type="hidden" name="lvl6" value="<?=$product['result']['6lvl']?>">
                            <input type="hidden" name="town_city" value="<?=$town_city?>">
                            <input type="hidden" name="number_order" value="<?=$order_number?>">
                            <input type="hidden" name="sum_crypto" value="<?=$sum?>">
                            <input type="hidden" name="sum" value="<?=$sum?>">
                            <input type="hidden" name="cid" value="<?=$cid?>">

                            <button type="submit" name="check_order" class="btn btn-success"><i class="pe-7s-check"></i> Проверить платеж</button>
                        </form>
                        <div class="p-4"><strong class="text-danger">ВАЖНО!!!</strong> ПОСЛЕ "ВЫПОЛНЕНОЙ ОПЛАТЫ" НАШ ОПЕРАТОР В ТЕЧЕНИИ 5-10 МИНУТ ОБРАБОТАЕТ ВАШ ЗАКАЗ И СВЯЖЕТСЯ С ВАМИ В <span class="text-blue">TELEGRAM</span></div>

                        <br>
                        <a href="/">Назад на сайт</a>
                    </div>
                    <style>
                        #container {
                            display: flex;
                            box-sizing: border-box;
                            flex-direction: column;
                            justify-content: center;
                            align-items: center;
                            padding-top: 10px;
                            padding-bottom: 30px;
                            background: #ffffff;
                            box-shadow: 1px 1px 1px #caced1, -1px -1px -1px #fff;
                            border-radius: 15px;
                        }

                        #copy {
                            position: relative;
                            box-sizing: border-box;
                            background-color: #482ff7;
                            color: #fff;
                            width: 180px;
                            min-height: 44px;
                            font-size: 1rem;
                            font-family: "Jost", sans-serif;
                            font-weight: 500;
                            text-transform: uppercase;
                            padding: 5px;
                            border: 0;
                            border-radius: 15px;
                            outline: none;
                            cursor: pointer;
                            user-select: none;
                            box-shadow: 13px 13px 20px #caced1, -13px -13px 20px #fff;
                        }
                        #copy:before {
                            content: "";
                            width: 16px;
                            height: 16px;
                            bottom: -20px;
                            left: 82px;
                            clip-path: polygon(50% 40%, 0% 100%, 100% 100%);
                        }
                        #copy:after {
                            content: attr(tooltip);
                            width: 140px;
                            bottom: -48px;
                            left: 20px;
                            padding: 5px;
                            border-radius: 4px;
                            font-size: 0.8rem;
                        }
                        #copy:before, #copy:after {
                            opacity: 0;
                            pointer-events: none;
                            position: absolute;
                            box-sizing: border-box;
                            background-color: #000;
                            color: #fff;
                            transform: translateY(-10px);
                            transition: all 300ms ease;
                        }
                        #copy:hover:before, #copy:hover:after {
                            opacity: 1;
                            transform: translateY(0);
                        }
                    </style>



                </div>
            </div>
        </div>
    </div>
</div>
<!-- about description section end -->

<!--
<div class="brand_section_area mb-105 wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="brand_inner slick__activation" data-slick='{
                        "slidesToShow": 5,
                        "slidesToScroll": 1,
                        "arrows": false,
                        "dots": false,
                        "autoplay": false,
                        "speed": 300,
                        "infinite": true ,
                        "responsive":[
                          {"breakpoint":992, "settings": { "slidesToShow": 4 } },
                          {"breakpoint":768, "settings": { "slidesToShow": 3 } },
                          {"breakpoint":576, "settings": { "slidesToShow": 2 } },
                          {"breakpoint":300, "settings": { "slidesToShow": 1 } }
                         ]
                    }'>
                    <div class="single_brand ">
                        <a class="primary" href="#"><img src="assets/img/others/brand1.png" alt=""></a>
                        <a class="secondary" href="#"><img src="assets/img/others/brand-hover1.png" alt=""></a>
                    </div>
                    <div class="single_brand">
                        <a class="primary" href="#"><img src="assets/img/others/brand2.png" alt=""></a>
                        <a class="secondary" href="#"><img src="assets/img/others/brand-hover2.png" alt=""></a>
                    </div>
                    <div class="single_brand">
                        <a class="primary" href="#"><img src="assets/img/others/brand3.png" alt=""></a>
                        <a class="secondary" href="#"><img src="assets/img/others/brand-hover3.png" alt=""></a>
                    </div>
                    <div class="single_brand">
                        <a class="primary" href="#"><img src="assets/img/others/brand4.png" alt=""></a>
                        <a class="secondary" href="#"><img src="assets/img/others/brand-hover4.png" alt=""></a>
                    </div>
                    <div class="single_brand">
                        <a class="primary" href="#"><img src="assets/img/others/brand5.png" alt=""></a>
                        <a class="secondary" href="#"><img src="assets/img/others/brand-hover5.png" alt=""></a>
                    </div>
                    <div class="single_brand ">
                        <a class="primary" href="#"><img src="assets/img/others/brand1.png" alt=""></a>
                        <a class="secondary" href="#"><img src="assets/img/others/brand-hover1.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="testimonial_section mb-110 wow fadeInUp" data-bgimg="assets/img/others/testimonial-bg.png"
     data-wow-delay="0.1s" data-wow-duration="1.1s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="testimonial_wrapper slick__activation" data-slick='{
                        "slidesToShow": 1,
                        "slidesToScroll": 1,
                        "arrows": false,
                        "dots": false,
                        "autoplay": false,
                        "speed": 300,
                        "infinite": true ,
                        "responsive":[
                          {"breakpoint":500, "settings": { "slidesToShow": 1 } }
                         ]
                    }'>
                    <div class="testimonial_inner d-flex align-items-center">
                        <div class="testimonial_thumb">
                            <img src="assets/img/others/testimonial-shap-thumb.png" alt="">
                        </div>
                        <div class="testimonial_content">
                            <div class="testimonial_rating">
                                <ul>
                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                </ul>
                            </div>
                            <div class="testimonial_author">
                                <h3>Kianna Pham</h3>
                                <h4>Customer</h4>
                            </div>
                            <div class="testimonial_desc">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicingl elit, sed do eiusmod
                                    tempor
                                    incididunt ut laboredolor magna aliqua. Ut enim ad minim veniam, quis
                                    nostru
                                    exercitation ullamco laboris</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial_inner d-flex align-items-center">
                        <div class="testimonial_thumb">
                            <img src="assets/img/others/testimonial-shap-thumb.png" alt="">
                        </div>
                        <div class="testimonial_content">
                            <div class="testimonial_rating">
                                <ul>
                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                </ul>
                            </div>
                            <div class="testimonial_author">
                                <h3>Kianna Pham</h3>
                                <h4>Customer</h4>
                            </div>
                            <div class="testimonial_desc">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicingl elit, sed do eiusmod
                                    tempor
                                    incididunt ut laboredolor magna aliqua. Ut enim ad minim veniam, quis
                                    nostru
                                    exercitation ullamco laboris</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="service_section mb-110">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="services_section_inner d-flex justify-content-between">
                    <div class="single_services one text-center wow fadeInUp" data-wow-delay="0.1s"
                         data-wow-duration="1.1s">
                        <div class="services_thumb">
                            <img src="assets/img/others/services1.png" alt="">
                        </div>
                        <div class="services_content">
                            <h3><a href="shop-left-sidebar.html">Pastry</a></h3>
                            <p>Lorem ipsum dolor sit ametgtol consecr adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="single_services two text-center wow fadeInUp" data-wow-delay="0.2s"
                         data-wow-duration="1.2s">
                        <div class="services_thumb">
                            <img src="assets/img/others/services2.png" alt="">
                        </div>
                        <div class="services_content">
                            <h3><a href="shop-left-sidebar.html">Breakfast</a></h3>
                            <p>Lorem ipsum dolor sit ametgtol consecr adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="single_services three text-center wow fadeInUp" data-wow-delay="0.3s"
                         data-wow-duration="1.3s">
                        <div class="services_thumb">
                            <img src="assets/img/others/services3.png" alt="">
                        </div>
                        <div class="services_content">
                            <h3><a href="shop-left-sidebar.html">Cofee Cake</a></h3>
                            <p>Lorem ipsum dolor sit ametgtol consecr adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="single_services four text-center wow fadeInUp" data-wow-delay="0.4s"
                         data-wow-duration="1.4s">
                        <div class="services_thumb">
                            <img src="assets/img/others/services4.png" alt="">
                        </div>
                        <div class="services_content">
                            <h3><a href="shop-left-sidebar.html">Bake Tost</a></h3>
                            <p>Lorem ipsum dolor sit ametgtol consecr adipiscing elit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
-->
<?php require_once MAIN_URL.'/views/footer.php'; ?>

<!-- JS
============================================ -->

<script src="/assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="/assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
<script src="/assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="/assets/js/slick.min.js"></script>
<script src="/assets/js/owl.carousel.min.js"></script>
<script src="/assets/js/wow.min.js"></script>
<script src="/assets/js/jquery.scrollup.min.js"></script>
<script src="/assets/js/jquery.nice-select.js"></script>
<script src="/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/assets/js/mailchimp-ajax.js"></script>
<script src="/assets/js/jquery-ui.min.js"></script>
<script src="/assets/js/jquery.zoom.min.js"></script>
<!-- Main JS -->
<script src="/assets/js/main.js"></script>
<script>
    const textElement = document.getElementById("text");
    const copyButton = document.getElementById("copy");

    const copyText = (e) => {
        window.getSelection().selectAllChildren(textElement);
        document.execCommand("copy");
        e.target.setAttribute("tooltip", "Скопировано! ✅");
    };

    const resetTooltip = (e) => {
        e.target.setAttribute("tooltip", "Скопировать номер кошелька");
    };

    copyButton.addEventListener("click", (e) => copyText(e));
    copyButton.addEventListener("mouseover", (e) => resetTooltip(e));

</script>


</body>

</html>