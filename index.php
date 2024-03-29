<?php 
get_header();
?>
<div id="home-page">
    <section class="landing">
        <div class="container">
            <div class="row">
                <div class="col-8 col-md-6 col-lg-3 mx-auto p-0">
                    <img src="<?php bloginfo('template_directory'); ?>/assets/img/main-logo.svg" alt="KiPay" class="w-100 main-logo">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-7 mx-auto">
                    <h2 class="t-xxl mb-3 bold uppercase ls-1">Crypto Exchange</h2>
                    <p class="ls-1">KiPay is a cryptocurrency trading platform that offers secured P2P transactions.</p>
                    <p class="t-sm ls-1 light">Receive coins directly onto your Metamask or Binance wallet. Avoid unwanted gas fees, human errors, and scammers.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="market-section mt-5 py-5">
        <div class="container py-4">
            <div class="row">
                <div class="col-12 mb-4">
                    <h2 class="text-center bold">Coin Market</h2>
                </div>
            </div>
            <div class="row">
                <?php
                    $available_coins = new WP_Query( array( 'post_type' => 'products', 'posts_per_page' => 6) );
                    if ( $available_coins->have_posts() ) :
                        while ( $available_coins->have_posts() ) : $available_coins->the_post(); ?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="coin-block p-4 my-3">
                                    <div class="d-flex align-center">
                                        <img src="<?php the_field('coin_icon') ?>" alt="<?php the_field('coin_symbol') ?>" class="icon mr-3">
                                        <div class="coin-details">
                                            <h5 class="m-0 lh-2 name ellipsis"><?php the_field('coin_name') ?> <span class="light">(<?php the_field('coin_symbol') ?>)</span></h5>
                                            <p class="available t-xs ls-1 light ellipsis">
                                                <?php echo number_format($min / get_field('coin_price'), 2, '.', '') ?> <?php the_field('coin_symbol') ?> - 
                                                <?php echo number_format($max / get_field('coin_price'),2, '.', '') ?> <?php the_field('coin_symbol') ?>
                                            </p>
                                            <p class="t-lg bold mt-2 ellipsis"><?php the_field('coin_price') ?> <span class="currency">PHP</span></p>
                                        </div>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="btn main-btn mt-4 uppercase bold">Buy now</a>
                                </div>
                            </div>
                        <?php endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
    <section class="information">
        <div class="container">
            <div class="row py-4">
                <div class="col-12 col-lg-12 my-auto">
                    <div class="roadmap px-4 py-5">
                        <h2 class="t-xl bold text-center uppercase">2021 Road Map</h2>
                        <p class="t-sm ls-1 light mb-3">Our inbox is always open for any suggestions.</p>
                        <div class="row text-center relative">
                            <div class="progress-line d-none d-lg-block"></div>
                            <div class="col-12 col-lg-4">
                                <div class="p-2">
                                    <div class="progress-circle"></div>
                                    <h4 class="t-lg bold mt-4">September 2021</h4>
                                    <p>Website Deployment</p>
                                    <p>Enable Transaction</p>
                                    <p>Enable live chat customer support</p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="p-2">
                                    <div class="progress-circle"></div>
                                    <h4 class="t-lg bold mt-4">November 2021</h4>
                                    <p>NFT Games tutorial blogs</p>
                                    <p>Announcement and News Feature</p>
                                    <p>User experience improvements</p>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="p-2">
                                    <div class="progress-circle"></div>
                                    <h4 class="t-lg bold mt-4">December 2021</h4>
                                    <p>1 Lucky trader will receive a special gift</p>
                                    <p>5 Random wallets will win PVU coins</p>
                                    <p>Apply more engaging gamification</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="transactions py-3 py-lg-5">
        <div class="container py-4 py-md-5">
            <div class="row">
                <div class="col-12 col-xl-4 my-auto">
                    <h2 class="t-xx lh-2 bold mb-4 mb-xl-0 uppercase text-center text-xl-right">Latest<br>Transactions</h2>
                </div>
                <div class="col-12 col-xl-8">
                    <div class="transaction-table">
                        <div class="row thead">
                            <div class="col-8 col-md-4">
                                <p>Contract Address</p>
                            </div>
                            <div class="col-4 d-none d-md-block">
                                <p>Description</p>
                            </div>
                            <div class="col-4">
                                <p>Date</p>
                            </div>
                        </div>
                        <?php
                            $latesttrans = new WP_Query( array( 'post_type' => 'buy-transactions', 'posts_per_page' => 10) );
                            if ( $latesttrans->have_posts() ) :
                                while ( $latesttrans->have_posts() ) : $latesttrans->the_post(); ?>
                                    <div class="row tbody">
                                        <div class="col-8 col-md-4">
                                            <p><?php echo stringToSecret(get_field('contract_address')); ?></p>
                                        </div>
                                        <div class="col-4 d-none d-md-block">
                                            <p><?php the_field('coin_qty'); ?> <?php the_field('coin_symbol'); ?></p>
                                        </div>
                                        <div class="col-4">
                                            <p><?php echo get_the_date(); ?> | <?php echo get_the_time(); ?></p>
                                        </div>
                                    </div>
                                <?php endwhile;
                            endif;
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="partners py-3 py-lg-5">
        <div class="container py-0 py-md-5">
            <div class="row py-5">
                <div class="col-12">
                    <h2 class="t-xl lh-2 bold uppercase">Partners</h2>
                </div>
                <div class="col-8 mx-auto">
                    <div class="row">
                        <div class="col-6 col-md-3 mb-4">
                            <a href="http://supsofttech.com/" target="_blank">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/partners/Supsoftlogo.png" alt="Supsoft Tech" class="w-100">
                            </a>
                        </div>
                        <div class="col-6 col-md-3 mb-4">
                            <a href="https://www.facebook.com/littlealy" target="_blank">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/partners/littlealy.jpg" alt="Little Aly" class="w-100">
                            </a>
                        </div>
                        <div class="col-6 col-md-3 mb-4">
                            <a href="https://www.jebronbuilders.com/" target="_blank">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/partners/JebronBuilders.jpg" alt="Jebron Builders" class="w-100">
                            </a>
                        </div>
                        <div class="col-6 col-md-3 mb-4">
                            <a href="https://www.facebook.com/mnlstreetsclothing" target="_blank">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/partners/MNLStreets.jpg" alt="MNL Streets" class="w-100">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
get_footer(); 
?>