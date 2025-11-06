<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->
<head>
    <?php $baseUrl = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER["SCRIPT_NAME"]); ?>
    <!-- Basic Page Needs -->
    <meta charset="utf-8" />
    <title>The Northern Lights</title>
    <meta name="description" content="The Northern Lights">
    <meta name="keywords"content="The Northern Lights">
    <meta name="author" content="The Northern Lights" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?=$baseUrl;?>/css/bootstrap.css" />
    <!-- Animate -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$baseUrl;?>/css/animate.min.css" />
    <!-- Odometer -->
    <link rel="stylesheet" type="text/css" href="<?=$baseUrl;?>/css/odometer.min.css" />
    <!-- Swiper -->
    <link rel="stylesheet" type="text/css" href="<?=$baseUrl;?>/css/swiper-bundle.min.css" />
    <!-- Sib Form -->
    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="<?=$baseUrl;?>/css/styles.css" />

    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="<?=$baseUrl;?>/icons/icomoon/style.css" />

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="<?=$baseUrl;?>/images/logo/favicon.png" />
</head>

<body>
    <!-- wrapper -->
    <div id="wrapper">

        <!-- .preload -->
        <div id="loading">
            <div id="loading-center">
                <div class="loader-container">
                    <div class="wrap-loader">
                        <div class="loader">
                        </div>
                        <div class="icon">
                            <img src="images/logo/logo.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.preload -->
        <?php include('inc/header.php');?>