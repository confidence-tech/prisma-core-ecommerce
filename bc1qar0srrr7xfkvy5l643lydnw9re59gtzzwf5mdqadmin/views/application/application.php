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

    <!-- Data table css -->
    <link href="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/datatables/DataTables/css/dataTables.bootstrap5.css" rel="stylesheet" />
    <link href="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/datatables/Buttons/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <link href="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/datatables/Responsive/css/responsive.bootstrap5.min.css" rel="stylesheet" />

    <!-- Slect2 css -->
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
                                <h4 class="page-title mb-0 text-warning">Все заявки</h4>
                            </div>
                            <div class="page-rightheader">
                                <div class="btn-list">
                                    <a href="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/application/add" class="btn btn-outline-success"><i class="fe fe-plus-circle me-2"></i>
                                        Добавить заявку</a>
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
                        <!--End Page header-->

                        <!-- Row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap" id="example1">
                                                <thead>
                                                <tr>
                                                    <th class="wd-15p border-bottom-0">№</th>
                                                    <th class="wd-25p border-bottom-0">Подробнее</th>
                                                    <th class="wd-15p border-bottom-0">Имя</th>
                                                    <th class="wd-20p border-bottom-0">Фамилия</th>
                                                    <th class="wd-15p border-bottom-0">Телефон</th>
                                                    <th class="wd-10p border-bottom-0">Почта</th>
                                                    <th class="wd-10p border-bottom-0">Статус</th>
                                                    <th class="wd-25p border-bottom-0">Дата и время</th>
                                                    <th class="wd-25p border-bottom-0">Управление</th>
                                                    <th class="wd-25p border-bottom-0">Получаемая сумма $</th>
                                                    <th class="wd-25p border-bottom-0">Оплата заказа $</th>
                                                    <th class="wd-25p border-bottom-0">Прибыль $</th>
                                                    <th class="wd-25p border-bottom-0">Получаемая сумма ₴</th>
                                                    <th class="wd-25p border-bottom-0">Оплата заказа ₴</th>
                                                    <th class="wd-25p border-bottom-0">Прибыль ₴</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php
                                                if (isset($applications)){
                                                    $n = 1;
                                                    foreach ($applications as $tmp){
                                                    ?>
                                                        <tr>
                                                            <td><?=$n?></td>
                                                            <td><a href="/admin/application/details/<?=$tmp['id']?>" class="btn btn-outline-warning">Смотреть</a></td>
                                                            <td><?=$tmp['first_name']?></td>
                                                            <td><?=$tmp['last_name']?></td>
                                                            <td><?=$tmp['phone']?></td>
                                                            <td><?=$tmp['mail']?></td>
                                                            <td>
                                                                <?php
                                                                if ($tmp['status'] == 0){
                                                                    ?>
                                                                    <span class="text-primary">В обработке</span>
                                                                    <?php
                                                                }elseif ($tmp['status'] == 1){
                                                                    ?>
                                                                    <span class="text-azure">В ходе выполнения</span>
                                                                    <?php
                                                                }elseif ($tmp['status'] == 2){
                                                                    ?>
                                                                    <span class="text-success">Выполнена</span>
                                                                    <?php
                                                                }elseif ($tmp['status'] == 3){
                                                                    ?>
                                                                    <span class="text-danger">Отказано</span>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <td><?=$tmp['date_application']?></td>
                                                            <td><a href="/admin/application/edit/<?=$tmp['id']?>" class="btn btn-outline-success">Редактировать</a></td>
                                                            <td><?=$tmp['all_get_money_usd']?> <span class="text-primary">$</span></td>
                                                            <td><?=$tmp['send_money_usd']?> <span class="text-danger">$</span></td>
                                                            <td><?=$tmp['grow_money_usd']?> <span class="text-success">$</span></td>
                                                            <td><?=$tmp['all_get_money_uah']?> <span class="text-primary">₴</span></td>
                                                            <td><?=$tmp['send_money_uah']?> <span class="text-danger">₴</span></td>
                                                            <td><?=$tmp['grow_money_uah']?> <span class="text-success">₴</span></td>
                                                        </tr>
                                                    <?php
                                                        $n++;
                                                    }
                                                }
                                                ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!--/div-->
                            </div>
                        </div>
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

        <!-- INTERNAL Data tables -->
        <script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/datatables/DataTables/js/jquery.dataTables.js"></script>
        <script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/datatables/DataTables/js/dataTables.bootstrap5.js"></script>
        <script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/datatables/Buttons/js/dataTables.buttons.min.js"></script>
        <script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/datatables/Buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/datatables/JSZip/jszip.min.js"></script>
        <script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/datatables/pdfmake/pdfmake.min.js"></script>
        <script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/datatables/pdfmake/vfs_fonts.js"></script>
        <script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/datatables/Buttons/js/buttons.html5.min.js"></script>
        <script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/datatables/Buttons/js/buttons.print.min.js"></script>
        <script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/datatables/Buttons/js/buttons.colVis.min.js"></script>
        <script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/datatables/Responsive/js/dataTables.responsive.min.js"></script>
        <script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/datatables/Responsive/js/responsive.bootstrap5.min.js"></script>
        <script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/js/datatables.js"></script>

        <!-- INTERNAL Select2 js -->
        <script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/select2/select2.full.min.js"></script>
        <script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/js/select2.js"></script>

        <!-- Custom js-->
        <script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/js/custom.js"></script>

</body>
</html>