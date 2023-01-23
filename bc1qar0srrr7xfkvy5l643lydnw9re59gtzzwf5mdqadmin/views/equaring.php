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
                        <h4 class="page-title mb-0 text-warning">Настройка екваринга</h4>
                    </div>
                </div>
                <!--End Page header-->


                <form method="post" action="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/equaring-edit" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <?php $eqvuaring = Main_model::getEqvuaring(); ?>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Логин <span class="text-danger">*</span></label>
                                                <input class="form-control mb-4" placeholder="..." name="login" value="<?=$eqvuaring['login']?>" type="text" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Пароль <span class="text-danger">*</span></label>
                                                <input class="form-control mb-4" placeholder="..." name="pass" value="<?=$eqvuaring['pass']?>" type="text" required="required">
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-outline-success float-end" value="Сохранить">
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

<!-- INTERNAL File-Uploads Js-->
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/fancyuploder/jquery.fileupload.js"></script>
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/fancyuploder/fancy-uploader.js"></script>

<!-- INTERNAL File uploads js -->
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/fileupload/js/dropify.js"></script>
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/js/filupload.js"></script>

<!--INTERNAL Select2 js -->
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/plugins/select2/select2.full.min.js"></script>
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/js/select2.js"></script>

<!-- Custom js-->
<script src="/bc1qar0srrr7xfkvy5l643lydnw9re59gtzzwf5mdqadmin/template/assets/js/custom.js"></script>

</body>
</html>