<?php 
get_header();
?>
<div id="product-page">
    <section class="coin-details" style="background-image: url('<?php the_field('coin_icon'); ?>')">
        <div class="container py-4">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="d-flex">
                        <div class="circle-thumbnail p-2">
                            <div class="second-border d-flex p-4">
                                <img src="<?php the_field('coin_icon') ?>" alt="<?php the_field('coin_symbol'); ?>" class="icon">
                            </div>
                        </div>
                        <div class="description">
                            <h1 class="name bold"><?php the_field('coin_name'); ?> <span class="t-lg light"> <?php the_field('coin_symbol'); ?></span></h1>
                            <p class="price t-xl bold mt-3">
                                <span id="current-price" class="price t-xl bold"><?php the_field('coin_price') ?></span> PHP 
                                <a href="<?php the_field('coin_gecko_link') ?>" class="ml-2 btn mini-btn t-xs">Compare on CoinGecko</a>
                            </p>
                            <p class="available t-sm ellipsis"><?php the_field('coin_quantity') ?> <?php the_field('coin_symbol') ?> ( <?php echo get_field('coin_quantity') * get_field('coin_price') ?> PHP) Remaining</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="checkout py-5">
        <div class="container py-4">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-6 col-xl-7">
                    <div class="instructions px-5">
                        <h2 class="t-xl bold">How to buy <?php the_field('coin_symbol'); ?>?</h2>
                        <p class="t-sm mb-5">KiPay offers P2P transaction. This means that every transaction is manually made and processed by KiPay staffs. Our Facebook Messenger is 24/7 active for any of your concerns.</p>
                        <div class="row mb-5">
                            <div class="col-3">
                                <div class="num-badge">
                                    <p class="mb-0">1</p>
                                </div>
                                <p class="steps">Enter the amount of <?php the_field('coin_symbol'); ?> that you wanted to purchase.</p>
                            </div>
                            <div class="col-3">
                                <div class="num-badge">
                                    <p class="mb-0">2</p>
                                </div>
                                <p class="steps">Send the total amount to any of the following bank accounts.</p>
                            </div>
                            <div class="col-3">
                                <div class="num-badge">
                                    <p class="mb-0">3</p>
                                </div>
                                <p class="steps">Fill-out the Buyer's Information then click "Submit".</p>
                            </div>
                            <div class="col-3">
                                <div class="num-badge">
                                    <p class="mb-0">&#9733;</p>
                                </div>
                                <p class="steps">Wait for a couple of minutes and check your wallet.</p>
                            </div>
                        </div>
                        <h3 class="t-md bold">Payment Methods</h3>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <p class="t-sm">Send your payments to any of the following bank accounts.<br>Please note that we will only send the coin once your payment reflected on our end.</p>
                            </div>
                            <div class="col-12 my-2">
                                <div class="mop">
                                    <p>
                                        <span>Bank Name:</span>
                                        Gcash
                                    </p>
                                    <p>
                                        <span>Account Name:</span>
                                        Tom Oliver Chua
                                    </p>
                                    <p>
                                        <span>Account Number:</span>
                                        0000000000000000
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 my-2">
                                <div class="mop">
                                    <p>
                                        <span>Bank Name:</span>
                                        Robinson's bank
                                    </p>
                                    <p>
                                        <span>Account Name:</span>
                                        Tom Oliver Chua
                                    </p>
                                    <p>
                                        <span>Account Number:</span>
                                        0000000000000000
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-6 col-xl-5 my-auto">    
                    <div class="purchase px-5 py-4">
                        <div class="row pt-2 mb-2">
                            <div class="col-12">
                                <h2 class="t-xl bold">Purchase <span id="order-symbol" class="t-xl bold"><?php the_field('coin_symbol'); ?></span></h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <p class="max-err uppercase t-sm semibold ls-1">*Maximum of <span id="max-checkout" class="t-sm"><?php the_field('maximum_checkout'); ?></span><?php the_field('coin_symbol') ?></p>
                                <div class="relative">
                                    <label for="order-qty" class="absolute-label t-sm ls-1 semibold uppercase">Quantity</label>
                                    <input type="text" 
                                        id="order-qty" class="lg-input w-100 text-center my-1" 
                                        placeholder="Amount (<?php the_field('coin_symbol'); ?>)" 
                                        onkeypress="validate(event);"
                                        value="0"
                                        onChange="<?php the_field('maximum_checkout'); ?>)"
                                    />
                                </div>
                                <div class="relative">
                                    <label class="absolute-label t-sm ls-1 semibold uppercase">Price</label>
                                    <input type="text" class="purchase-amount-subtotal lg-input w-100 text-center my-1" placeholder="Value in PHP" readonly disabled/>
                                </div>
                                <div class="relative">
                                    <hr>
                                    <p class="text-right">+250 PHP <span class="t-sm">Transaction Fee</span></p>
                                    <p class="text-right bold t-md uppercase">Total: <span class="t-md purchase-amount-total">0</span> PHP</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div id="buyer-info">
                                    <hr>
                                    <p class="uppercase bold ls-1 my-3">Buyer's Information</p>
                                    <?php echo do_shortcode('[contact-form-7 id="34" title="Contact form 1"]'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>  
<script>
    (function($) {
        $(document).ready(function() {
            $('#buyer-info').addClass('opacity-half');
            $('.buyer-info').prop('disabled', true);
            $('#order-qty').change(setQuantity);
            $('#order-qty').keypress(setQuantity);
        });

        function setQuantity(){
            var price = parseFloat($('#current-price').text());
            var qty = parseFloat($('#order-qty').val());
            var max = parseFloat($('#max-checkout').text());
            var symbol = $('#order-symbol').text();
            var subTotal = qty * price;
            var fee = 250;
            var total = subTotal + fee;

            $('.purchase-qty').val(qty);
            $('.purchase-amount-total').text(total);
            $('.purchase-amount-total-value').val(total);
            $('.purchase-amount-subtotal').val(total + "PHP");
            $('.purchase-current-price').val(price);
            $('.purchase-fee').val(fee);
            $('.purchase-symbol').val(symbol);

            if(qty > max){
                $('.max-err').addClass('err');
                $('#buyer-info').addClass('opacity-half');
                $('.buyer-info').prop('disabled', false);
            }else if(qty <= max){
                $('.max-err').removeClass('err');
                $('#buyer-info').removeClass('opacity-half');
            }
        };
        
        function validate(evt) {
            var theEvent = evt || window.event;
            // Handle paste
            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
            // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\./;
            if( !regex.test(key) ) {
                theEvent.returnValue = false;
                if(theEvent.preventDefault) theEvent.preventDefault();
            }
        }
    })(jQuery);
</script>
<?php
get_footer(); 
?>