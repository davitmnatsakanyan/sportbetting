<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="slick, flat, dashboard, bootstrap, admin, template, theme, responsive, fluid, retina">
    <link rel="shortcut icon" href="javascript:;" type="image/png">

    <title>Blank Page</title>

    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">

    <!--switchery-->
    <link href="js/switchery/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />

    <!--common style-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body class="sticky-header">
    <section>
        @include('layouts.parts.left_sidebar')

        <!-- body content start-->
<<<<<<< HEAD
        <div class="body-content" style="min-height: 1200px;">
            @include('layouts.parts.header')

            @include('layouts.parts.page_head')
=======
        <div class="body-content">
            @include('layouts.parts.header')

            {{--@include('layouts.parts.page_head')--}}
>>>>>>> 8cd91e08d0454507e43185cd0e4142374246d8e9

            @yield('content')

            @include('layouts.parts.right_sidebar')
        </div>
        <!-- body content end-->

    </section>
    <!-- Placed js at the end of the document so the pages load faster -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-migrate.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/modernizr.min.js"></script>

    <!--Nice Scroll-->
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

    <!--right slidebar-->
    <script src="js/slidebars.min.js"></script>

    <!--switchery-->
    <script src="js/switchery/switchery.min.js"></script>
    <script src="js/switchery/switchery-init.js"></script>

    <!--Sparkline Chart-->
    <script src="js/sparkline/jquery.sparkline.js"></script>
    <script src="js/sparkline/sparkline-init.js"></script>


    <!--common scripts for all pages-->
    <script src="js/scripts.js"></script>


</body>
</html>