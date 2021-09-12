(function($) {
    $(document).ready(function() {
        //Nav scroll
        $(this).scrollTop(0)
        $(window).scroll(function () {
            //Navbar Effects
            scroll = $(this).scrollTop();
            if (scroll > 100) {
                $('.navbar').addClass('bg');
            } else {
                $('.navbar').removeClass('bg');
            }
        });

        //Product Page
        setQuantity();
        $('#buyer-info').prop('disabled', true);
        // $('#convert').click(setQuantity);
        $('#order-qty').keyup(setQuantity);
        $('#order-qty').keypress(function(e){
            validate(e);
        });
    });

    function setQuantity(){
        var price = parseFloat($('#current-price').text());
        var qty = parseFloat($('#order-qty').val());
        var max = parseFloat($('#max-checkout').text());
        var min = parseFloat($('#min-checkout').text());
        var symbol = $('#order-symbol').text();
        var subTotal = qty * price;
        var fee = parseFloat($('#trans-fee').text());
        var total = subTotal + fee;

        if(isNaN(total)) {
            var total = 0;
        }
        if(isNaN(subTotal)) {
            var subTotal = 0;
        }
        
        $('.purchase-qty').val(qty.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $('.purchase-amount-total').text(total.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $('.purchase-amount-total-value').val(total.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $('.purchase-amount-subtotal').val(subTotal.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " PHP");
        $('.purchase-current-price').val(price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $('.purchase-fee').val(fee.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $('.purchase-symbol').val(symbol);

        if(qty < min || qty > max){
            $('.coin-order-limit').removeClass('d-none');
            $('#buyer-info').addClass('opacity-half');
            $('.buyer-info').prop('disabled', true);
        }else if(qty >= min && qty <= max){
            $('.coin-order-limit').addClass('d-none');
        $('#buyer-info').removeClass('opacity-half');
            $('.buyer-info').prop('disabled', false);
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