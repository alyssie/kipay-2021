<?php 
get_header();
?>
<div id="home-page">
    <section class="landing">
        <div class="container">
            <div class="row h-100">
                <div class="col-6 my-auto">
                    <div class="caption">
                        <p class="uppercase t-xxl extrabold">Direct to wallet</p>
                        <p class="uppercase t-xxxxl extrabold lh-1">Safe & Secure</p>
                        <p class="uppercase t-xl semibold my-2">Trade with us in 3 easy step</p>
                        <p class="t-md my-2">Fast and reliable cryptocurrency trading partner.</p>
                        <a href="#" class="btn default-btn my-2">Learn More</a>
                    </div>
                </div>
                <div class="col-6 my-auto">
                    <img src="https://i.imgur.com/sb6MyOO.png" alt="" class="illustration">
                </div>
            </div>
        </div>
    </section>
    <section class="crypto-value py-5">
        <div class="container py-4">
            <div class="row">
                <div class="col-12 mb-4">
                    <h2 class="text-center bold">Coin Market</h2>
                    <p class="text-center t-xs light ls-2">Coins will be sent directly to your Metamask Wallet.<br>Please visit <a href="#" class="c-highlight t-xs light ls-2">KiPay FAQ</a> to know more about the transaction process.</p>
                </div>
            </div>
            <div class="row">
                <?php
                    $available_coins = new WP_Query( array( 'post_type' => 'products') );
                    if ( $available_coins->have_posts() ) :
                        while ( $available_coins->have_posts() ) : $available_coins->the_post(); ?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="coin-block p-4 my-3">
                                    <div class="d-flex align-center">
                                        <img src="<?php the_field('coin_icon') ?>" alt="<?php the_field('coin_symbol') ?>" class="icon mr-3">
                                        <div class="coin-details">
                                            <h5 class="m-0 lh-2 name ellipsis"><?php the_field('coin_name') ?> <span class="light">(<?php the_field('coin_symbol') ?>)</span></h5>
                                            <p class="available t-xs light ellipsis"><?php the_field('coin_quantity') ?> <?php the_field('coin_symbol') ?> ( <?php echo get_field('coin_quantity') * get_field('coin_price') ?> PHP) Available</p>
                                            <p class="t-lg bold mt-2 ellipsis"><?php the_field('coin_price') ?> <span class="currency">PHP</span></p>
                                        </div>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="btn buy-btn mt-4 uppercase bold">Buy now</a>
                                </div>
                            </div>
                        <?php endwhile;
                    endif;
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
</div>
<?php
get_footer(); 
?>