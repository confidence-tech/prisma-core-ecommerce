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

    <!-- wishlist contant start -->
    <div class="contant">
        <div id="banner-part" class="banner inner-banner">
            <div class="container">
                <div class="bread-crumb-main">
                    <h1 class="banner-title">Список желаемого</h1>
                    <div class="breadcrumb">
                        <ul class="inline">
                            <li><a href="/index">Главная</a></li>
                            <li>Список желаемого</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="ptb-100">
            <div class="container">
                <div class="cart-item-table commun-table">
                    <div class="table-responsive">
                        <table class="table border mb-0">
                            <thead>
                            <tr>
                                <th class="align-left">Фото товара</th>
                                <th class="align-left">Название</th>
                                <th>Цена</th>
                                <th>Наличие</th>
                                <th>Опции</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($wishlist) && !empty($wishlist) && count($wishlist) > 0): ?>
                                <?php foreach ($wishlist as $item): ?>
                                <tr>
                                    <td class="align-left">
                                        <a href="product-page.html">
                                            <div class="product-image">
                                                <img alt="Eshoper" src="/assets/tovar/<?=$item['name_photo']?>">
                                            </div>
                                        </a>
                                    </td>
                                    <td class="align-left">
                                        <div class="product-title">
                                            <a href="/productinfo/<?=$item['id_item']?>"><?=$item['model_ru']?></a>
                                        </div>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>
                                                <div class="base-price price-box">
                                                    <span class="price"><?=$this->info_data[6]['fulldescription_ru']?> <?=$item['price']?></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <?php if ($item['item_count'] > 0): ?>
                                            <span class="text-success">Есть в наличии</span>
                                        <?php else: ?>
                                            <span class="text-danger">Нет в наличии</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="/wishlist/add-to-cart/<?=$item['id_item']?>" class="btn small btn-color">
                                            <i title="Remove Item From Cart" data-id="100" class="fa fa-shopping-cart cart-remove-item"></i>
                                        </a>
                                        <a href="/wishlist/del/<?=$item['id_item']?>" class="btn small btn-color">
                                            <i title="Remove Item From Cart" data-id="100" class="fa fa-trash cart-remove-item"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5">
                                        <div class="alert alert-info">Ваш список желаемых товаров пустой. Добавьте товар в 'желаемые'</div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mt-30">
                            <a href="/catalog/1?category=all" class="btn btn-color">
                                <i class="fa fa-angle-left"></i><span>Продолжить покупки</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wishlist contant end -->

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
