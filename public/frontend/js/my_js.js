/**MODIFICATOR**/
$('.avaliable select').on('change',function () {
    var mod_id = $(this).val(),
        color = $(this).find('option').filter(':selected').data('title'),
        price = $(this).find('option').filter(':selected').data('price'),
        basePrice = $('#base-price').data('base');

    if (price){
        $('#base-price').text('$' + price);
    }else{
        $('#base-price').text('$' + basePrice);
    }
});
/**MODIFICATOR**/

/**CART**/
$('.add_to_cart').on('click',function () {
    var id = $(this).data('id'),
        qty = $('#selector_input').val() ? $('#selector_input').val() : 1,
        mod = $('.product-select select').val();

    $.ajax({
        url: '/cart/add',
        data: {id:id, qty:qty, mod:mod},
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Ошибка!');
        }
    });
});

$('#cart .modal-body').on('click', '.del-item', function(){
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('Error!');
        }
    });
});


function getCart() {
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('Ошибка! Попробуйте позже');
        }
    });
}

function showCart(cart){
   if ($.trim(cart) == '<h3>Корзина пуста</h3>'){
       $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'none');
   }else{
       $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'inline-block');
   }
   $('#cart .modal-body').html(cart);
   $('#cart').modal();

   if ($('.cart-sum').text()){
        $('.top-cart-price').html($('#cart .cart-sum').text());
   }else {
       $('.top-cart .top-cart-price').text('Корзина пуста');
   }
}

function clearCart() {
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
            alert('Ошибка! Попробуйте позже');
        }
    });
}
/**CART**/

/**FILTER**/
$('body').on('change', '.filter input', function () {
    var checked = $('.filter input:checked'),
        data = '';

    checked.each(function () {
        data += this.value + ',';
    });
     if(data){
        $.ajax({
            url: location.href,
            data: {filter: data},
            type: 'GET',
            beforeSend: function () {
                $('.preloader').fadeIn(300,function () {
                    $('.product-area').hide();
                });
            },
            success: function(res){
                $('.preloader').delay(500).fadeOut('slow',function () {
                    $('.product-area').html(res).fadeIn();
                    var url = location.search.replace(/filter(.+?)(&|$)/g, '');
                    var newURL = location.pathname + url + (location.search ? "&" : "?") + "filter=" + data;
                    newURL = newURL.replace('&&', '&');
                    newURL = newURL.replace('?&', '?');
                    history.pushState({}, '', newURL);
                });
            },
            error: function () {
                alert('Ошибка');
            }
        });
     }else{
         window.location = location.pathname;
     }
});
/**FILTER**/



