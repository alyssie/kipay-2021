<?php 
get_header();
?>
<?php
$min = 2000;
$max = 7000;
$fee = 500;
?>
<div id="product-page">
    <section class="coin-details">
        <div class="container py-4">
            <div class="row">
                <div class="col-12 relative">
                    <div class="details p-4">
                        <div class="circle-thumbnail p-2">
                            <div class="second-border d-flex p-4">
                                <img src="<?php the_field('coin_icon') ?>" alt="<?php the_field('coin_symbol'); ?>" class="icon">
                            </div>
                        </div>
                        <div class="description">
                            <div class="d-flex justify-content-center align-items-center">
                                <h1 class="name bold my-4 t-xl"><?php the_field('coin_name'); ?> <span class="light t-lg"> (<?php the_field('coin_symbol'); ?>)</span></h1>
                                <div class="fb-share-button mx-3" data-href="<?php get_permalink(); ?>" data-layout="button" data-size="large">
                                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
                                        Share
                                    </a>
                                </div>
                            </div>
                            <p class="uppercase t-xs light ls-2">Current Price</p>
                            <p class="price t-xl bold">
                                <span id="current-price" class="price t-xl bold"><?php echo number_format(get_field('coin_price'),2, '.', '') ?></span> PHP
                                <a href="<?php the_field('coin_gecko_link') ?>" class="ml-2 btn mini-btn t-xs d-none d-lg-inline">Compare on CoinGecko</a>
                            </p>
                            <p class="available t-sm ellipsis light ls-2">
                                Order limit: 
                                <span class="t-sm"><?php echo number_format($min / get_field('coin_price'), 2, '.', '') ?></span>
                                <?php the_field('coin_symbol') ?> - 
                                <span class="t-sm"><?php echo number_format($max / get_field('coin_price'),2, '.', '') ?></span>
                                <?php the_field('coin_symbol') ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="checkout pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-5 col-xl-5 px-3">    
                    <div class="purchase px-5 py-4">
                        <div class="row pt-2 mb-2">
                            <div class="col-12">
                                <h2 class="t-xl bold">Purchase <span id="order-symbol" class="t-xl bold"><?php the_field('coin_symbol'); ?></span></h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <p class="coin-order-limit d-none err uppercase t-sm semibold ls-1 mb-2">
                                    Limit: 
                                    <span class="t-sm"><?php echo number_format($min / get_field('coin_price'), 2, '.', '') ?></span>
                                    <?php the_field('coin_symbol') ?> - 
                                    <span class="t-sm"><?php echo number_format($max / get_field('coin_price'),2, '.', '') ?></span>
                                    <?php the_field('coin_symbol') ?>
                                </p>
                                <div class="relative">
                                    <label for="order-qty" class="absolute-label t-sm ls-1 semibold uppercase">Quantity</label>
                                    <input type="text" onPaste="return false"
                                        id="order-qty" class="lg-input w-100 text-center my-1" 
                                        placeholder="Amount (<?php the_field('coin_symbol'); ?>)"
                                        value="<?php echo number_format($min / get_field('coin_price'),2, '.', '') ?>"
                                    />
                                </div>
                                <div class="relative">
                                    <label class="absolute-label t-sm ls-1 semibold uppercase">Subtotal</label>
                                    <input type="text" class="readonly purchase-amount-subtotal lg-input w-100 text-center my-1" placeholder="Value in PHP" readonly disabled/>
                                </div>
                                <div class="relative">
                                    <hr>
                                    <p class="text-right">+<span id="trans-fee"><?php echo $fee; ?></span> PHP <span class="t-sm">Transaction Fee</span></p>
                                    <p class="text-right bold t-md uppercase">Total: <span class="t-md purchase-amount-total">0</span> PHP</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div id="buyer-info">
                                    <hr>
                                    <p class="uppercase bold ls-1 my-3">Buyer's Information</p>
                                    <?php echo do_shortcode('[cf7form cf7key="contact-form-1"]'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7 col-xl-7 my-lg-0 mt-4">
                    <div class="instructions px-3 px-lg-2">
                        <div class="row block px-4 py-5">
                            <div class="col-12">
                                <h3 class="t-xl bold">Payment Methods</h3>
                            </div>
                            <div class="col-12 mb-3">
                                <p class="t-sm">Send your payments to any of the following bank accounts.<br>Please note that we will only send the coin once your payment reflected on our end.</p>
                            </div>
                            <div class="col-12 col-md-6 my-2">
                                <div class="mop">
                                    <p>
                                        <span>Gcash</span>
                                    </p>
                                    <p>
                                        <span>Account Name:</span>
                                        Tom Oliver Chua
                                    </p>
                                    <p>
                                        <span>Account Number:</span>
                                        09499673244
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 my-2">
                                <div class="mop">
                                    <p>
                                        <span>Bank of the Philippine Islands (BPI)</span>
                                    </p>
                                    <p>
                                        <span>Account Name:</span>
                                        Tom Oliver Chua
                                    </p>
                                    <p>
                                        <span>Account Number:</span>
                                        3259543109
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row block px-4 py-5 mt-4">
                            <div class="col-12">
                                <h2 class="t-xl bold text-center text-lg-left">How to buy <?php the_field('coin_symbol'); ?>?</h2>
                                <p class="t-sm mb-5 text-center text-lg-left">KiPay offers P2P transaction. This means that every transaction is manually made and processed by KiPay staff. Please note that <?php the_field('coin_symbol'); ?> is on <?php the_field('coin_network'); ?> Network and will be sent directly to your wallet. Our Facebook Messenger is 24/7 active for any of your concerns.</p>
                            </div>
                            <div class="col-6 col-md-3 mt-0">
                                <div class="num-badge">
                                    <p class="mb-0">1</p>
                                </div>
                                <p class="steps">Enter the amount of <?php the_field('coin_symbol'); ?> that you wanted to purchase.</p>
                            </div>
                            <div class="col-6 col-md-3 mt-0">
                                <div class="num-badge">
                                    <p class="mb-0">2</p>
                                </div>
                                <p class="steps">Send the total amount to any of the following bank accounts.</p>
                            </div>
                            <div class="col-6 col-md-3 mt-4 mt-md-0">
                                <div class="num-badge">
                                    <p class="mb-0">3</p>
                                </div>
                                <p class="steps">Fill-out the Buyer's Information then click "Submit".</p>
                            </div>
                            <div class="col-6 col-md-3 mt-4 mt-md-0">
                                <div class="num-badge">
                                    <p class="mb-0">4</p>
                                </div>
                                <p class="steps">Wait for a couple of minutes and check your wallet.</p>
                            </div>
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