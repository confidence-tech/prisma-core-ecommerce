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
    <!-- INTERNAL Mutipleselect css-->
    <link rel="stylesheet" href="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/multipleselect/multiple-select.css">

    <!--INTERNAL Select2 css -->
    <link href="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/select2/select2.min.css" rel="stylesheet" />

    <!-- INTERNAL File Uploads css -->
    <link href="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/fancyuploder/fancy_fileupload.css" rel="stylesheet" />

    <!-- INTERNAL File Uploads css-->
    <link href="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/fileupload/css/fileupload.css" rel="stylesheet" type="text/css" />

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
                        <h4 class="page-title mb-0 text-warning">Добавить товар</h4>
                    </div>
                    <div class="page-rightheader">
                        <div class="btn-list">
                            <a href="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/items" class="btn btn-azure"><i class="ion-android-arrow-back me-2"></i>
                                Все товары</a>
                        </div>
                    </div>
                </div>
                <!--End Page header-->

                <form method="post" action="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/items/addwork" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Введите название товара<span class="text-danger">*</span></label>
                                                <input class="form-control mb-4" placeholder="..." name="model_ru" type="text" required="required">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Цена <span class="text-danger">*</span></label>
                                                        <input class="form-control mb-4" name="price" placeholder="200" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Цена до скидки(если товар акционный)</label>
                                                        <input class="form-control mb-4" name="old_price" placeholder="250" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Количество товара <span class="text-danger">*</span></label>
                                                        <input class="form-control mb-4" name="count" placeholder="200" type="text" required="required">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Индекс товара <span class="text-danger">*</span></label>
                                                        <input class="form-control mb-4" name="index" placeholder="AF-8277" type="text" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Выберите категорию <span class="text-red">*</span></label>
                                                <select name="category" class="form-control custom-select select2">
                                                    <?php
                                                    if (isset($category) && !empty($category)){
                                                        foreach ($category as $tmp){
                                                            ?>
                                                            <option value="<?=$tmp['id']?>">
                                                                <?=$tmp['type_ru']?> /
                                                                <?php if ($tmp['is_man'] == 1): ?>
                                                                    <strong class="text-azure">Муж.</strong>
                                                                <?php endif; ?>
                                                                <?php if ($tmp['is_woman'] == 1): ?>
                                                                    <strong class="text-pink">Женс.</strong>
                                                                <?php endif; ?>
                                                                <?php if ($tmp['is_accessorize'] == 1): ?>
                                                                    <strong class="text-pink"> /Аксессуар</strong>
                                                                <?php endif; ?>
                                                            </option>
                                                            <?php
                                                        }
                                                    }else{
                                                        ?>
                                                        <option value="0">Нету категорий</option>
                                                        <?php
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Выберите пол <span class="text-red">*</span></label>
                                                <select name="gender" class="form-control custom-select select2">
                                                    <option value="1">Мужские</option>
                                                    <option value="2">Женские</option>
                                                    <option value="3">Унисекс</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Выберите бренд <span class="text-red">*</span></label>
                                                <select name="brand" class="form-control custom-select select2">
                                                    <?php $brands = Main_model::getValidCountry(); ?>
                                                    <?php foreach ($brands as $brand): ?>
                                                        <option value="<?=$brand['id']?>"><?=$brand['name_ru']?></option>
                                                    <?php endforeach; ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12">

                                            <div class="form-group">
                                                <label class="form-label">Связанные товары:</label>
                                                <select multiple="multiple" name="split_in[]" class="filter-multi" style="max-height: 150px">
                                                    <?php $items = Main_model::displayItem(); ?>
                                                    <?php for ($i = 0; $i < count($items); $i++): ?>
                                                        <option value="<?=$items[$i]['id']?>"><?=$items[$i]['model']?></option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Размеры товара:</label>
                                                <select multiple="multiple" name="size[]" class="filter-multi" style="max-height: 150px">
                                                    <?php $sizes = array(0 => 'xxs', 1 => 'xs', 2 => 'm', 3 => 'l', 4 => 'xl', 5 => 'xxl', 6 => 'xxxl', 7 =>'34.5', 8 => '35', 9 => '35.5', 10 => '36', 11 => '36.5', 12 => '37.5', 13 => '38', 14 => '38.5', 15 => '39', 16 => '40', 17 => '40.5', 18 =>'41', 19 => '42', 20 => '42.5', 21 => '43', 22 => '44', 23 => '44.5', 24 => '45', 25 => '45.5', 26 => '46', 27 => '47.5', 28 => '48.5', 29 => '49.5', 30 => '50.5', 31 => '51.5', 32 => '52.5'); ?>
                                                    <?php for ($i = 0; $i < count($sizes); $i++): ?>
                                                        <option value="<?=$sizes[$i]?>"><?=$sizes[$i]?></option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input type="hidden" name="color" value="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Атрибуты товара</h3>
                                </div>
                                <div class="card-body">
                                    <div class="alert alert-light-primary">
                                        <i class="fa fa-info-circle"></i> Общие атрибуты, атрибуты выбраной категории товара будут доступны после добавления в таблице товаров
                                    </div>
                                    <?php $attr = Main_model::getAttr('all'); ?>

                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Название атрибута</th>
                                            <th>Значение <span class="text-red">*</span></th>
                                        </tr>
                                        <?php foreach ($attr as $atr): ?>
                                            <tr>
                                                <td><?=$atr['type']?></td>
                                                <td>
                                                    <input class="form-control" name="attr_<?=$atr['id']?>" placeholder="Значение" type="text" required="required">
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="card">
                                <div class=" card-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12">
                                            <label class="form-label">Выберите фото для каталога (268х307) <span class="text-danger">*</span></label>
                                            <input type="file" name="photo" class="dropify"/>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Введите полное описание<span class="text-danger">*</span></label>
                                                <textarea class="form-control mb-4" name="fulldescription_ru" placeholder="Описание EN..." rows="3" required="required"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class=" card-body">
                                    <div class="row">
                                        <div class="form-group mb-0">
                                            <label class="form-label">Все фото товара в любом разширении</label>
                                            <input type="file" name="files[]" multiple="multiple">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class=" card-body">
                                    <input type="submit" class="btn btn-outline-success float-end" value="Добавить">
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
<!-- INTERNAL File-Uploads Js-->
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/fancyuploder/jquery.fileupload.js"></script>
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/fancyuploder/fancy-uploader.js"></script>
<!-- INTERNAL Multipleselect js -->
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/multipleselect/multiple-select.js"></script>
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/multipleselect/multi-select.js"></script>
<!--INTERNAL Form Advanced Element -->
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/js/formelementadvnced.js"></script>
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/js/form-elements.js"></script>
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/js/file-upload.js"></script><!-- INTERNAL File uploads js -->
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/fileupload/js/dropify.js"></script>
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/js/filupload.js"></script>
<!--INTERNAL Select2 js -->
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/select2/select2.full.min.js"></script>
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/js/select2.js"></script>
<!-- Custom js-->
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/js/custom.js"></script>

</body>
</html>