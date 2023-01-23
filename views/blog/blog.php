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
    <?php require_once MAIN_URL.'/views/header.php'; ?>

    <!-- Blog list start -->
    <div class="contant">
        <div id="banner-part" class="banner inner-banner">
            <div class="container">
                <div class="bread-crumb-main">
                    <h1 class="banner-title">Новости</h1>
                    <div class="breadcrumb">
                        <ul class="inline">
                            <li><a href="/">Главная</a></li>
                            <li>Новости</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-listing ptb-100">
            <div class="container">
                <div class="row">

                    <div class="col-12 col-lg-12 order-1">
                        <div class="row">
                            <?php for ($i = 0; $i < count($result['blog']); $i++): ?>
                                <div class="col-12">
                                    <div class="blog-item">
                                        <div class="row m-0">
                                            <div class="col-sm-6 col-md-5 p-0">
                                                <div class="blog-image">
                                                    <a href="/blog-detail/<?=$result['blog'][$i]['id']?>">
                                                        <img src="/assets/blog/<?=$result['blog'][$i]['photo']?>" alt="Xpoge">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-7 p-0">
                                                <div class="blog-detail">
                                                    <span class="bloger-date"><?=$result['blog'][$i]['author']?> (<?=$result['blog'][$i]['data_create']?>)</span>
                                                    <h3 class="head-three mb-10"><a href="/blog-detail/<?=$result['blog'][$i]['id']?>"><?=$result['blog'][$i]['title']?></a></h3>
                                                    <a href="/blog-detail/<?=$result['blog'][$i]['id']?>" class="readmore-btn">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog list end -->

    <!-- Newslatter section start -->
    <?php require_once MAIN_URL.'/views/_part/newslatter.php'; ?>
    <!-- Newslatter section end -->

    <!-- Footer section start -->
    <?php require_once MAIN_URL.'/views/footer.php'; ?>
    <!-- Footer section end -->
</div>
<script src="/templates/js/jquery-3.4.1.min.js"></script>
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
