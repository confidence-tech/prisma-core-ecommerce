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
