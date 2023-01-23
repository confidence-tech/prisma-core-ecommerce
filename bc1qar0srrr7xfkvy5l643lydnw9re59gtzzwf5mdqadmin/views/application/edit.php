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
                    <div class="page-rightheader">
                        <div class="btn-list">
                            <button class="btn btn-outline-primary"><i class="fe fe-download me-2"></i>
                                Import</button>
                            <a href="javascript:void(0);"  class="btn btn-primary btn-pill" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-calendar me-2 fs-14"></i> Search By Date</a>
                            <div class="dropdown-menu border-0">
                                <a class="dropdown-item" href="javascript:void(0);">Today</a>
                                <a class="dropdown-item" href="javascript:void(0);">Yesterday</a>
                                <a class="dropdown-item active" href="javascript:void(0);">Last 7 days</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last 30 days</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last 6 months</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last year</a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                if (isset($data)){
                ?>
                <!--End Page header-->
                <form method="post" action="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/application/edit/success">
                    <div class="row">
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <input type="hidden" name="id" class="form-control" value="<?=$data['id']?>">

                                            <div class="form-group">
                                                <label class="form-label">Имя заказчика<span class="text-red">*</span></label>
                                                <input type="text" name="fname" class="form-control" value="<?=$data['first_name']?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Фамилия заказчика<span class="text-red">*</span></label>
                                                <input type="text" name="lname" class="form-control" value="<?=$data['last_name']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Номер телефона <span class="text-red">*</span></label>
                                                <input type="text" name="phone" class="form-control" value="<?=$data['phone']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Адресс почты <span class="text-red">*</span></label>
                                                <input type="email" name="mail" class="form-control" value="<?=$data['mail']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Введите полную информацию заявки</label>
                                                <textarea class="form-control mb-4" name="fulldescription" placeholder="Описание..." rows="3"><?=$data['fulldescription']?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Статус</label>
                                                <select name="status" class="form-control custom-select select2">
                                                    <?php
                                                    if ($data['status'] == 0){
                                                        ?>
                                                        <option selected value="0">В обработке</option>
                                                        <option value="1">Выполнение</option>
                                                        <option value="2">Выполнено</option>
                                                        <option value="3">Отменена</option>
                                                        <?php
                                                    }elseif ($data['status'] == 1){
                                                        ?>
                                                        <option value="0">В обработке</option>
                                                        <option selected value="1">Выполнение</option>
                                                        <option value="2">Выполнено</option>
                                                        <option value="3">Отменена</option>
                                                        <?php
                                                    }elseif ($data['status'] == 2){
                                                        ?>
                                                        <option value="0">В обработке</option>
                                                        <option value="1">Выполнение</option>
                                                        <option selected value="2">Выполнено</option>
                                                        <option value="3">Отменена</option>
                                                        <?php
                                                    }elseif ($data['status'] == 3){
                                                        ?>
                                                        <option value="0">В обработке</option>
                                                        <option value="1">Выполнение</option>
                                                        <option value="2">Выполнено</option>
                                                        <option selected value="3">Отменена</option>
                                                        <?php
                                                    }
                                                    ?>
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
                                                <label class="form-label">Общая сумма за заказ $</label>
                                                <input type="text" class="form-control" name="total_payment" value="<?=$data['all_get_money_usd']?>" placeholder="Введите в долларах или гривнах">
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Выплаты исполнителю $</label>
                                                <input type="text" class="form-control" name="staff_payment" value="<?=$data['send_money_usd']?>" placeholder="Введите в долларах или гривнах">
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Прибыль компании $</label>
                                                <input type="text" class="form-control" name="profit_payment" value="<?=$data['grow_money_usd']?>" placeholder="Введите в долларах или гривнах">
                                            </div>
                                        </div>

                                        <div class="wd-200 mg-b-30">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 24 24" width="18"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 2v3H4V5h16zM4 21V10h16v11H4z"/><path d="M4 5.01h16V8H4z" opacity=".3"/></svg>
                                                    </div>
                                                </div>
                                                <?php
                                                if (isset($data) && !empty($data)):
                                                    ?>
                                                    <input class="form-control fc-datepicker" value="<?=$data?>" name="date" placeholder="MM/DD/YYYY" type="text">
                                                <?php
                                                else:
                                                    ?>
                                                    <input class="form-control fc-datepicker" name="date" placeholder="MM/DD/YYYY" type="text">
                                                <?php
                                                endif;
                                                ?>
                                            </div>
                                        </div>

<!--                                        <div class="col-sm-6 col-md-6">-->
<!--                                            <div class="form-group">-->
<!--                                                <label class="form-label">Введите текущий курс валюты </label>-->
<!--                                                <input type="text" name="kurs_dollar" value="--><?//=$data['dollar_kurs']?><!--" class="form-control">-->
<!--                                            </div>-->
<!--                                        </div>-->
                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Выберите валюту оплаты </label>
                                                <select name="valute_type" class="form-control custom-select select2">
                                                    <option value="1">Доллары/$</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Статус </label>
                                                <select name="payment_status" class="form-control custom-select select2">
                                                    <?php
                                                    if ($data['status_payment'] == 0){
                                                    ?>
                                                        <option value="0" selected>Не оплачена</option>
                                                        <option value="1">Оплачена</option>
                                                        <option value="2">В ожидании</option>
                                                    <?php
                                                    }elseif ($data['status_payment'] == 1){
                                                    ?>
                                                        <option value="0">Не оплачена</option>
                                                        <option value="1" selected>Оплачена</option>
                                                        <option value="2">В ожидании</option>
                                                    <?php
                                                    }elseif ($data['status_payment'] == 2){
                                                    ?>
                                                        <option value="0">Не оплачена</option>
                                                        <option value="1">Оплачена</option>
                                                        <option value="2" selected>В ожидании</option>
                                                    <?php
                                                    }
                                                    ?>

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
                <?php
                }
                ?>

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