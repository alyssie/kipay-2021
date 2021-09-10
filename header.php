<html <?php language_attributes(); ?> style="margin: 0 !important;">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>KiPay Crypto Trading</title>
        <?php wp_head();?>
    </head>
    <body <?php body_class(); ?>>
    <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0&appId=3782191628533831&autoLogAppEvents=1" nonce="84OspxmU"></script>
        <nav class="navbar navbar-expand-lg fixed-top px-5">
            <div class="container">
                <a class="navbar-brand" href="/"><img src="<?php bloginfo('template_directory'); ?>/assets/img/logo.png" alt="KiPay" class="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto px-5">
                        <li class="nav-item px-3 active">
                            <a class="nav-link" href="<?php bloginfo('url'); ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link" href="<?php bloginfo('url'); ?>/market/">Market</a>
                        </li>
                        <!-- <li class="nav-item px-3">
                            <a class="nav-link" href="#">Transactions</a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link" href="#">FAQ</a>
                        </li> -->
                    </ul>
                    <div class="form-inline my-2 my-lg-0">
                        <a href="<?php bloginfo('url'); ?>/market/" class="btn bold px-4 main-btn">Buy Coins</a>
                    </div>
                </div>
            </div>
        </nav>
       