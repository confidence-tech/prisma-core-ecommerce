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
                    <h1 class="banner-title">Мои заказы</h1>
                    <div class="breadcrumb">
                        <ul class="inline">
                            <li><a href="/index">Главная</a></li>
                            <li>Заказы</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="ptb-100">
            <div class="container">
                <div class="cart-item-table commun-table" style="overflow-x: scroll">
                    <table class="table table-bordered mb-0">
                        <?php
                        $n = 1;
                        $check = 0;
                        if (isset($client) && !empty($client)){
                            foreach ($client as $tmp){

                                if ($check != $tmp['id']){
                                ?>
                                <tr>
                                    <th class="font-weight-bold">№</th>
                                    <th class="font-weight-bold">Имя/Фамилия</th>
                                    <th class="font-weight-bold">Телефон</th>
                                    <th class="font-weight-bold">Почта</th>
                                    <th class="font-weight-bold">Способ оплаты</th>
                                    <th class="font-weight-bold" colspan="2">Город \ Поселок</th>
                                    <th class="font-weight-bold" colspan="2">Адрес доставки</th>
                                </tr>
                                <tr>
                                    <th class="text-lg-center font-weight-bolder"><?=$n?></th>
                                    <th><?=$tmp['name']?></th>
                                    <th><?=$tmp['phone']?></th>
                                    <th><?=$tmp['mail']?></th>
                                    <th>
                                        <?php if ($tmp['pay_type'] == 1): ?>
                                            Наличный расчёт
                                        <?php else: ?>
                                            Банковской картой
                                        <?php endif; ?>
                                    </th>
                                    <th><?=$tmp['city']?></th>
                                    <th colspan="2"><?=$tmp['adress']?></th>
                                </tr>


                                <tr>
                                    <th class="font-weight-bold" colspan="2">Фото</th>
                                    <th class="font-weight-bold" colspan="2">Название товара</th>
                                    <th class="font-weight-bold" colspan="2">Цена за ед.</th>
                                    <th class="font-weight-bold" colspan="2">Кол.</th>
                                    <th class="font-weight-bold" colspan="2">Сумма</th>
                                </tr>
                                <?php
                                foreach ($client as $value){

                                    if ($value['id_client'] == $tmp['id_client']){
                                        ?>
                                        <tr>
                                            <td colspan="2"><img width="150px" src="/assets/tovar/<?=$value['name_photo']?>"></td>
                                            <td colspan="2"><?=$value['model']?></td>
                                            <td colspan="2"><?=$value['price']?> / <?=$this->info_data[6]['fulldescription_ru']?></td>
                                            <td colspan="2"><?=$value['count']?></td>
                                            <td colspan="2"><?=$value['count']*$value['price']?> / <?=$this->info_data[6]['fulldescription_ru']?></td>
                                        </tr>
                                        <?php
                                        $sum += $value['price']*$value['count'];
                                    }
                                }
                                ?>
                                <tr>
                                    <th colspan="6" class="font-weight-bold"></th>
                                    <th colspan="2" class="font-weight-bold">Итоговая сумма</th>
                                    <th colspan="2" class="font-weight-bold">Статус заказа</th>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                    </td>
                                    <td colspan="2"><?=$sum.' '.$this->info_data[6]['fulldescription_ru']?></td>
                                    <td colspan="2">
                                        <?php
                                        if ($tmp['status'] == 0){
                                            ?>
                                            <span class="text-secondary">В обработке</span>
                                            <?php
                                        }elseif ($tmp['status'] == 1){
                                            ?>
                                            <span class="text-secondary">В пути</span>
                                            <?php
                                        }elseif ($tmp['status'] == 2){
                                            ?>
                                            <span class="text-secondary">Выполнен</span>
                                            <?php
                                        }elseif ($tmp['status'] == 3){
                                            ?>
                                            <span class="text-danger">Отменен</span>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                    $check = $tmp['id'];
                                }
                                $n++;
                            }
                        }
                        ?>
                    </table>
                    <?php if(empty($client)): ?>
                        <tr>
                            <td colspan="5">
                                <div class="alert alert-info">Заказы совершенные вами не найдены...</div>
                            </td>
                        </tr>
                    <?php endif; ?>
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
<script src="/templates/js/custom.js"></script>
<script>
    $(window).on("load", function() {
        $('#preloader').delay(600).fadeOut(500);
    });
</script>
</body>

</html>
