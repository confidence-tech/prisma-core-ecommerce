<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="Azea - Admin Panel HTML template" name="description">
    <meta content="Spruko Private Limited" name="author">
    <meta name="keywords" content="admin, admin template, dashboard, admin dashboard, responsive, bootstrap, bootstrap 5, admin theme, admin themes, bootstrap admin template, scss, ui, crm, modern, flat">

    <!-- Title -->
    <title>Prisma Admin</title>

    <!--Favicon -->
    <link rel="icon" href="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/images/brand/favicon.ico" type="image/x-icon"/>

    <!--Bootstrap css -->
    <link href="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Style css -->
    <link href="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/css/style.css" rel="stylesheet" />
    <link href="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/css/dark.css" rel="stylesheet" />
    <link href="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/css/skin-modes.css" rel="stylesheet" />

    <!-- Animate css -->
    <link href="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/css/animated.css" rel="stylesheet" />

    <!-- P-scroll bar css-->
    <link href="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/p-scrollbar/p-scrollbar.css" rel="stylesheet" />

    <!---Icons css-->
    <link href="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/css/icons.css" rel="stylesheet" />

    <!--INTERNAL Select2 css -->
    <link href="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/select2/select2.min.css" rel="stylesheet" />

    <!-- Color Skin css -->
    <link id="theme" href="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/colors/color1.css" rel="stylesheet" type="text/css"/>

</head>

<body class="app">

<!---Global-loader-->
<div id="global-loader" >
    <img src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/images/svgs/loader.svg" alt="loader">
</div>
<!--- End Global-loader-->

<!-- Page -->
<div class="page">
    <div class="page-main">

        <?php
        require_once ROOT.'/views/navigation/main-nav.php';
        ?>

        <!-- App-Content -->
        <div class="hor-content main-content">
            <div class="container">

                <!--Page header-->
                <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title mb-0 text-warning">Добавить новую заявку</h4>
                    </div>
                </div>
                <!--End Page header-->
                <form method="post" action="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/application/add/success">
                    <div class="row">
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Название товара<span class="text-red">*</span></label>
                                                <input type="text" name="fname" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Цена<span class="text-red">*</span></label>
                                                <input type="text" name="lprice" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Цена до скидки</label>
                                                <input type="text" name="phone" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Адресс почты <span class="text-red">*</span></label>
                                                <input type="email" name="mail" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-12">
                                            <hr>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">ЕДРПОУ код</label>
                                                <input type="text" name="endrpou" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Название компании</label>
                                                <input type="text" name="company" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <hr>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Введите полную информацию</label>
                                                <textarea class="form-control mb-4" name="fulldescription" placeholder="Описание..." rows="3"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Статус</label>
                                                <select name="status" class="form-control custom-select select2">
                                                    <option value="0">В обработке</option>
                                                    <option value="1">Выполнение</option>
                                                    <option value="2">Выполнено</option>
                                                    <option value="3">Отменена</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Информация о доходах и расходах по данной заявке</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Общая сумма за заказ </label>
                                                <input type="text" class="form-control" name="total_payment" placeholder="Введите в долларах или гривнах">
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Выплаты исполнителю </label>
                                                <input type="text" class="form-control" name="staff_payment" placeholder="Введите в долларах или гривнах">
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Коммисия </label>
                                                <input type="text" class="form-control" name="comission_payment" placeholder="Введите в долларах или гривнах">
                                            </div>
                                        </div>


<!--                                        <div class="col-sm-6 col-md-6">-->
<!--                                            <div class="form-group">-->
<!--                                                <label class="form-label">Введите текущий курс валюты </label>-->
<!--                                                <input type="text" name="kurs_dollar" class="form-control">-->
<!--                                            </div>-->
<!--                                        </div>-->
                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                        <div class="col-md-12">
                                            <h4>Курс будет получен автоматически с НБУ</h4>
                                            <br>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Выберите валюту оплаты </label>
                                                <select name="valute_type" class="form-control custom-select select2">
                                                    <option value="0">Гривны/₴</option>
                                                    <option value="1">Доллары/$</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Статус </label>
                                                <select name="payment_status" class="form-control custom-select select2">
                                                    <option value="0">Не оплачена</option>
                                                    <option value="1">Оплачена</option>
                                                    <option value="2">В ожидании</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input name="send" type="submit" class="btn btn-success" value="Добавить">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div><!-- right app-content-->
    </div>

    <!--Footer-->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-md-12 col-sm-12 text-center">
                    Copyright © 2021 <a href="javascript:void(0);">azea</a>. Designed with <span class="fa fa-heart text-danger"></span> by <a href="javascript:void(0);"> Spruko </a> All rights reserved
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer-->

</div>
<!-- End Page -->

<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fe fe-chevron-up"></i></a>

<!-- Jquery js-->
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/js/jquery.min.js"></script>

<!-- Bootstrap5 js-->
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/bootstrap/popper.min.js"></script>
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!--Othercharts js-->
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/othercharts/jquery.sparkline.min.js"></script>

<!-- Circle-progress js-->
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/js/circle-progress.min.js"></script>

<!-- Jquery-rating js-->
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/rating/jquery.rating-stars.js"></script>

<!--Horizontal-menu js-->
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/horizontal-menu/horizontal-menu.js"></script>

<!-- Sticky js-->
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/js/stiky.js"></script>


<!-- P-scroll js-->
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/p-scrollbar/p-scrollbar.js"></script>

<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/p-scrollbar/p-scroll.js"></script>

<!--INTERNAL Select2 js -->
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/select2/select2.full.min.js"></script>
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/js/select2.js"></script>

<!-- Custom js-->
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/js/custom.js"></script>

</body>
</html>