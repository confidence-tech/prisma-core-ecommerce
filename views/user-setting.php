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
    <!-- Header start -->
    <?php require_once MAIN_URL.'/views/header.php'; ?>

    <!-- wishlist contant start -->
    <div class="contant">
        <div id="banner-part" class="banner inner-banner">
            <div class="container">
                <div class="bread-crumb-main">
                    <h1 class="banner-title">Настройки профиля</h1>
                    <div class="breadcrumb">
                        <ul class="inline">
                            <li><a href="/index">Главная</a></li>
                            <li class="active">Настройки</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="ptb-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-8 ">
                        <form class="main-form full" id="login-form" method="post" action="/user/edit-success">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="login-email">Имя</label>
                                        <input id="login-email" name="f_name" type="text" required="required" value="<?php if (isset($_POST['f_name']) && !empty($_POST['f_name'])): ?><?=$_POST['f_name']?><?php elseif (isset($this->profile['f_name']) && !empty($this->profile['f_name'])): ?><?=$this->profile['f_name']?><?php endif; ?>" placeholder="Введите ваш Email">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="login-pass">Фамилия</label>
                                        <input id="login-pass" name="l_name" type="text" required="required" value="<?php if (isset($_POST['l_name']) && !empty($_POST['l_name'])): ?><?=$_POST['l_name']?><?php elseif (isset($this->profile['l_name']) && !empty($this->profile['l_name'])): ?><?=$this->profile['l_name']?><?php endif; ?>" placeholder="Введите пароль">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="login-pass">Телефон</label>
                                        <input id="login-pass" name="phone" type="tel"  required="required" value="<?php if (isset($_POST['phone']) && !empty($_POST['phone'])): ?><?=$_POST['phone']?><?php elseif (isset($this->profile['phone']) && !empty($this->profile['phone'])): ?><?=$this->profile['phone']?><?php endif; ?>" placeholder="Введите номер телефона">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="login-pass">Город / Поселок</label>
                                        <input id="login-pass" name="city" type="text"  required="required" value="<?php if (isset($_POST['city']) && !empty($_POST['city'])): ?><?=$_POST['city']?><?php elseif (isset($this->profile['city']) && !empty($this->profile['city'])): ?><?=$this->profile['city']?><?php endif; ?>" placeholder="Введите ваш город \ поселок">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="login-pass">Адрес</label>
                                        <input id="login-pass" name="adress" type="text"  required="required" value="<?php if (isset($_POST['adress']) && !empty($_POST['adress'])): ?><?=$_POST['adress']?><?php elseif (isset($this->profile['adress']) && !empty($this->profile['adress'])): ?><?=$this->profile['adress']?><?php endif; ?>" placeholder="Введите адресс для доставки">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="login-pass">Почтовый индекс</label>
                                        <input id="login-pass" name="zip" type="text"  required="required" value="<?php if (isset($_POST['zip']) && !empty($_POST['zip'])): ?><?=$_POST['zip']?><?php elseif (isset($this->profile['zip']) && !empty($this->profile['zip'])): ?><?=$this->profile['zip']?><?php endif; ?>" placeholder="Введите почтовый индекс">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="align-center w-100 mb-2 text-danger" id="error"></div>
                                    <div class="mb-30 dit w-100">
                                        <button name="submit" id="admin_login" type="submit" class="btn-color right-side">Сохранить</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
<script src="/templates/js/custom.js"></script>
<script>
    $(window).on("load", function() {
        $('#preloader').delay(600).fadeOut(500);
    });
</script>
</body>

</html>
