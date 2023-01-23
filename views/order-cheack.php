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

<body>


<!--offcanvas menu area start-->
<div class="body_overlay">

</div>

<?php
require_once MAIN_URL.'/views/header.php';
?>

<!-- breadcrumbs area start -->
<div class="breadcrumbs_aree breadcrumbs_bg mb-100" data-bgimg="/assets/img/others/breadcrumbs-bg.png">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs_text">
                    <h1><?=$this->lang['menu_order_check']?></h1>
                    <ul>
                        <li><a href="/"><?=$this->lang['menu_home']?></a></li>
                        <li> // <?=$this->lang['menu_order_check']?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->



<!-- contact section start -->
<div class="contact_page_section mb-100">
    <div class="container">
        <div class="contact_details">
            <div class="row">
                <div class="col-lg-12 order-2">
                    <div class="blog_sidebar blog_widget">
                        <div class="blog_widget_list">
                            <div class="widget_search">
                                <form action="/order-check/" method="get">
                                    <input name="value" placeholder="<?=$this->lang['write_num_or_mail']?>" type="text">
                                    <button type="submit"><i class="ion-ios-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if (isset($_GET['value']) && !empty($_GET['value'])){
                if (isset($client) && count($client)>0):
                ?>
                <div class="row">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-12">
                            <?php
                            $n = 1;
                            $check = 0;
                            if (isset($client) && !empty($client)){
                                foreach ($client as $tmp){
                                    if ($check!=$tmp['id_client']) {
                                        $sum = 0;
                                        ?>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered m-0">
                                                        <tr>
                                                            <th class="font-weight-bold">№</th>
                                                            <th class="font-weight-bold"><?=$this->lang['name']?></th>
                                                            <th class="font-weight-bold"><?=$this->lang['surname']?></th>
                                                            <th class="font-weight-bold"><?=$this->lang['phone']?></th>
                                                            <th class="font-weight-bold"><?=$this->lang['mail']?></th>
                                                            <th class="font-weight-bold"><?=$this->lang['country']?></th>
                                                            <th class="font-weight-bold"><?=$this->lang['city_state']?></th>
                                                            <th class="font-weight-bold"><?=$this->lang['adress']?></th>
                                                            <th class="font-weight-bold"><?=$this->lang['appart']?></th>
                                                            <th class="font-weight-bold"><?=$this->lang['zip']?></th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-lg-center font-weight-bolder"><?=$n?></th>
                                                            <th><?=$tmp['client_name']?></th>
                                                            <th><?=$tmp['client_surname']?></th>
                                                            <th><?=$tmp['phone']?></th>
                                                            <th><?=$tmp['mail']?></th>
                                                            <th><?=$tmp['country']?></th>
                                                            <th><?=$tmp['town_city']?></th>
                                                            <th><?=$tmp['adress']?></th>
                                                            <th><?=$tmp['appart']?></th>
                                                            <th><?=$tmp['zip']?></th>
                                                        </tr>


                                                        <tr>
                                                            <th class="font-weight-bold" colspan="2"><?=$this->lang['photo']?></th>
                                                            <th class="font-weight-bold" colspan="2"><?=$this->lang['tovar_name']?></th>
                                                            <th class="font-weight-bold" colspan="2"><?=$this->lang['price']?></th>
                                                            <th class="font-weight-bold" colspan="2"><?=$this->lang['count']?></th>
                                                            <th class="font-weight-bold" colspan="2"><?=$this->lang['total']?></th>
                                                        </tr>
                                                        <?php
                                                        foreach ($client as $value){
                                                            if ($value['id_client'] == $tmp['id_client']){
                                                                ?>
                                                                <tr>
                                                                    <td colspan="2"><img width="150px" src="/assets/tovar/<?=$value['name_photo']?>"></td>
                                                                    <td colspan="2"><?=$value['model']?></td>
                                                                    <td colspan="2"><?=$value['price']?> / $</td>
                                                                    <td colspan="2"><?=$value['order_count']?></td>
                                                                    <td colspan="2"><?=$value['order_count']*$value['price']?> / $</td>
                                                                </tr>
                                                                <?php
                                                                $sum += $value['price']*$value['order_count'];
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
                                                            <td colspan="2"><?=$sum.'/$'?></td>
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
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <?php
                                        $check = $tmp['id_client'];
                                    }
                                    $n++;
                                }
                            }
                            ?>
                            <!--/div-->
                        </div>
                    </div>
                </div>
                <?php
                else:
                ?>
                <div class="row">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-12">
                            <br>
                            <h3><?=$this->lang['cheak_order']?></h3>
                        </div>
                    </div>
                </div>
                <?php
                endif;
            }
            ?>
        </div>
    </div>
</div>
<!-- contact section end -->


<!--
<div class="contact_map mt-70">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13004082.928417291!2d-104.65713107818928!3d37.275578278180674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sbd!4v1606327234905!5m2!1sen!2sbd"
        style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
-->

<?php
require_once MAIN_URL.'/views/footer.php';
?>

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
<!--<script src="/assets/js/mailchimp-ajax.js"></script>-->
<script src="/assets/js/jquery-ui.min.js"></script>
<script src="/assets/js/jquery.zoom.min.js"></script>
<!--<script src="/assets/js/ajax-mail.js"></script>-->

<!-- Main JS -->
<script src="/assets/js/main.js"></script>


</body>

</html>