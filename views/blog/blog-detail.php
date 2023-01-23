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

    <!-- Blog detail start -->
    <div class="contant">
        <div id="banner-part" class="banner inner-banner">
            <div class="container">
                <div class="bread-crumb-main">
                    <h1 class="banner-title">Новости</h1>
                    <div class="breadcrumb">
                        <ul class="inline">
                            <li><a href="/">Главная</a></li>
                            <li><a href="/blog">Блог</a></li>
                            <li>Новость</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="blog-detail-part pb-md-60">
                            <img src="/assets/blog/<?=$result['photo']?>" alt="blog-detail-img" class="blog-img">
                            <div class="blog-detail">
                                <div class="blog-detail-inner">
                                    <span><?=$result['author']?> (<?=$result['data_create']?>)</span>
                                    <h2><?=$result['title']?></h2>

                                    <p><?=$result['fulldescription']?></p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog detail end -->

    <!-- Newslatter section start -->
    <?php require_once MAIN_URL.'/views/_part/newslatter.php'; ?>
    <!-- Newslatter section end -->

    <!-- Footer section start -->
    <?php require_once MAIN_URL.'/views/footer.php'; ?>
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
