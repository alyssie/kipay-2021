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
        $('#buyer-info').addClass('opacity-half');
        $('.buyer-info').prop('disabled', true);
        $('#order-qty').change(setQuantity);
        $('#order-qty').keypress(setQuantity);
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

        $('.purchase-qty').val(qty);
        $('.purchase-amount-total').text(total);
        $('.purchase-amount-total-value').val(total);
        $('.purchase-amount-subtotal').val(total + "PHP");
        $('.purchase-current-price').val(price);
        $('.purchase-fee').val(fee);
        $('.purchase-symbol').val(symbol);

        if(qty <= min || qty > max){
            $('.max-err').addClass('err');
            $('#buyer-info').addClass('opacity-half');
            $('.buyer-info').prop('disabled', false);
        }else if(qty > min && qty <= max){
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