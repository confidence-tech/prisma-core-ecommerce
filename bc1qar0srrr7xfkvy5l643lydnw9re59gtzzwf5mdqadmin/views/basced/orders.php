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
                        <h4 class="page-title mb-0 text-warning">Все заказы</h4>
                    </div>
                </div>
                <!--End Page header-->

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
                                                <th class="font-weight-bold">Имя</th>
                                                <th class="font-weight-bold">Фамилия</th>
                                                <th class="font-weight-bold">Телефон</th>
                                                <th class="font-weight-bold">Почта</th>
                                                <th class="font-weight-bold">Страна</th>
                                                <th class="font-weight-bold">Город/Штат</th>
                                                <th class="font-weight-bold">Адресс</th>
                                                <th class="font-weight-bold">Квартира</th>
                                                <th class="font-weight-bold">Индекс код</th>
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
                                                <th class="font-weight-bold" colspan="2">фото</th>
                                                <th class="font-weight-bold" colspan="2">Название товара</th>
                                                <th class="font-weight-bold" colspan="2">Цена</th>
                                                <th class="font-weight-bold" colspan="2">Количество</th>
                                                <th class="font-weight-bold" colspan="2">Стоимость</th>
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
                                                <th colspan="6" class="font-weight-bold">Управление</th>
                                                <th colspan="2" class="font-weight-bold">Итоговая сумма</th>
                                                <th colspan="2" class="font-weight-bold">Статус заказа</th>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <a href="/admin/order/archive/<?=$tmp['id_client']?>/0" class="btn btn-secondary">В обработке</a>
                                                    <a href="/admin/order/archive/<?=$tmp['id_client']?>/1" class="btn btn-warning">В пути</a>
                                                    <a href="/admin/order/archive/<?=$tmp['id_client']?>/2" class="btn btn-success">Выполнить</a>
                                                    <a href="/admin/order/archive/<?=$tmp['id_client']?>/3" class="btn btn-outline-danger">Отменить</a> |
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
                                                        <span class="text-warning">В пути</span>
                                                        <?php
                                                    }elseif ($tmp['status'] == 2){
                                                        ?>
                                                        <span class="text-success">Выполнен</span>
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