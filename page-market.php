<?php 
get_header();
?>
<div id="market-page">
    <section class="banner py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    Banner
                </div>
            </div>
        </div>
    </section>
    <section class="crypto-value py-5">
        <?php
            $optvalue = 'Sort by';
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if($_GET['odr'] == '1'){
                    $optvalue = 'Lowest Price';
                    $orderby = 'coin_price';
                    $order = 'DESC';
                }else if($_GET['odr'] == '2'){
                    $optvalue = 'Highest Price';
                    $orderby = 'coin_price';
                    $order = 'ASC';
                }
            }
        ?>
        <div class="container py-4">
            <div class="row">
                <div class="col-9">
                    <h1 class="t-lg semibold">Coin Market</h1>
                </div>
                <div class="col-3">
                    <form method="get" action="/market/<?php echo $_SERVER['PHP_SELF'];?>" class="d-flex">
                        <select name="odr" onchange='this.form.submit()' class="ml-auto">
                            <option value="" class="d-none"><?php echo $optvalue; ?></option>
                            <option value="1">Lowest Price</option>
                            <option value="2">Highest Price</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="row">
                <?php
                    $available_coins = new WP_Query( array( 'post_type' => 'products', 'meta_key' => $orderby, 'orderby' => 'meta_value', 'order' => $order) );
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