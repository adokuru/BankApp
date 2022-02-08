(function($) {
    "use strict";

    /*----------------------------
        MagnifiPopup Active
      ------------------------------*/
    $('.popup').magnificPopup({
        type: 'iframe',
        iframe: {
        markup: '<div class="mfp-iframe-scaler">'+
                    '<div class="mfp-close"></div>'+
                    '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
                '</div>', // HTML markup of popup, `mfp-close` will be replaced by the close button
        patterns: {
            youtube: {
            index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).
    
            id: 'v=', // String that splits URL in a two parts, second part should be %id%
    
            src: 'https://www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
            },
            vimeo: {
            index: 'vimeo.com/',
            id: '/',
            src: '//player.vimeo.com/video/%id%?autoplay=1'
            },
            gmaps: {
            index: '//maps.google.',
            src: '%id%&output=embed'
            }
        },
        srcAction: 'iframe_src', 
        }
    });
  
  
     /*----------------------------
        Mailchimp Api Integration
      ------------------------------*/
    $('#newsletter').on('submit', function(e){
        e.preventDefault();
        var btnhtml=$('.basicbtn').html();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: this.action,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                    $('.basicbtn').attr('disabled','')
                    $('.basicbtn').html('Please Wait....')
            },

            success: function(response){ 
                $('.basicbtn').removeAttr('disabled')
                $('.basicbtn').html('Subscribed')

                Swal.fire({
                    text: response,
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                })

                $('#subscribe_email').val('');
            },
            error: function(xhr, status, error) 
            {
                $('.basicbtn').removeAttr('disabled');
                $('.basicbtn').html(btnhtml);
                $('#subscribe_email').val('');
            }
        });
    });
  
})(jQuery);

/*----------------------------
        Currency Data Get
    ------------------------------*/
var amount = $('#amount').val();
updateCurrency($('#withdrawMethod').find(':selected').val());
var rate = 0;
var currency = '';
var currencyID = 0;
var currencyList = $('#currencyList');
var listItems = "";
var ajaxTime = new Date().getTime();

function updateCurrency(withdrawMethodID){
    var url = $('#get_currency_url').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
        type: 'POST',
        url:  url,
        data: {id :withdrawMethodID},
        dataType: 'json',
        beforeSend: function(){
            time = new Date();
        },
        success: function(response){ 
            var html = "";
            
            if (response) {
                var firstCurrencyLogo = response[0].logo ?? "";
                var firstCurrencyName = response[0].name ?? "";
                var firstCurrencyRate = response[0].rate ?? "";
                var firstCurrencyID = response[0].id ?? "";

                for (let i = 0; i < response.length; i++) {
                    html += `<li><a data-id=${response[i].id} data-currency="${response[i].name}" data-rate="${response[i].rate}" class="dropdown-item currencyBTN" onclick="select_currency('${response[i].name}','${response[i].logo}')">
                    <img src="${response[i].logo}" alt="" class="currency_logo"> <span> ${response[i].name} </span></a></li>` 
                }
                currencyList.html(html);
                $("#country_flag").attr("src",firstCurrencyLogo);
                $("#currency_name").text(firstCurrencyName);
                rate = firstCurrencyRate;
                currency = firstCurrencyName;
                currencyID = firstCurrencyID;
                loadCurrencyList();
                let final = new Date().getTime() - ajaxTime;
                delay(final);
                calculateWithdraw($('#amount').val(), $('#withdrawMethod').find(':selected'), rate, currency, currencyID);
            }else{
                html +=  '<li><a data-id="0" data-currency="" data-rate="0" class="dropdown-item"></a></li>';
                currencyList.html(html);
            }  
        }
    })
}

/*-------------------------------------
        Currency Data with Withdraw
    --------------------------------------*/
function calculateWithdraw(amount = 0, data = '', rate = 0, currency = '', currencyID = 0) {
    var finalAmount = 0;
    var amount = parseFloat(amount);
    var rate = parseFloat(rate);
    var total = 0;
    var charge = 0;
    $('#getStarted').prop('disabled', true)
    $(".err").remove();
    $('#input').css('border', '1px solid transparent');
    if (data != '') {
        var min = parseFloat(data.data('min'));
        var max = parseFloat(data.data('max'));
        var type = data.data('charge-type');
        var fixedCharge = parseFloat(data.data('fixed-charge'));
        var percentCharge = parseFloat(data.data('percent-charge'));
        
        if (amount > max) {
            var error = `<div class="alert alert-danger err">Please enter less than ${max}</div>`;
            $('#input').css('border', '1px solid #f53636'); 
            $('#input').append(error);
            
        }else if(amount < min){
            var error = `<div class="alert alert-danger err">Please enter greater than ${min}</div>`;
            $('#input').css('border', '1px solid #f53636'); 
            $('#input').append(error);
        }else if(amount > 0){
            $('#getStarted').prop('disabled', false);
        }

        if (type == 'fixed') {
            $(".percent").remove();
            charge = fixedCharge;
            finalAmount = amount - fixedCharge;
            $('#charge').html(`Fixed: ${fixedCharge} USD`);
        }else if(type == 'percentage'){
            $(".percent").remove();
            charge = ((amount / 100) * percentCharge);
            finalAmount = amount - charge;
            $('#charge').html(`Percent: ${percentCharge} %`);
        }else if(type == 'both'){
            $(".percent").remove();
            charge = fixedCharge;
            charge += ((amount / 100) * percentCharge);
            finalAmount = amount - charge;
            var fixed = `Fixed: ${fixedCharge} USD`;
            $('#charge').html(fixed);

            var html = `<li class='percent'>
                <span class="icon-area mct-1">
                    <span class="iconify" data-icon="bx:bx-minus" data-inline="false"></span>
                </span>
                <span class="calculation-divison">
                    <div class="charge">Percent: ${percentCharge} %</div>
                    <span class="calculation-payment-select">
                    </span>
                </span>
             </li>`;

            $(".percent").css('visibility','visible');
            $('.calc li:first').append(html);
            
        }

        total = finalAmount * rate;
        $('#include_charge').html(`${!isNaN(finalAmount) ? finalAmount : 0} USD`);
        $('#rate').html(`${rate} ${currency}`);
        $('#final_amount').val(parseFloat(total).toFixed(2));
  
        //generate form data
        $(".getStartedForm input[name=amount]").val(amount);
        $(".getStartedForm input[name=currency]").val(currencyID);
        $(".getStartedForm input[name=charge]").val(charge);
        $(".getStartedForm input[name=withdrawmethod]").val($("#withdrawMethod").find(':selected').val());
    }
}

/*----------------------------
        Currency Rate
    ------------------------------*/
function rateCalculate(data){
    rate = data.data('rate');
    currency = data.data('currency');
    currencyID = data.data('id');
    calculateWithdraw($('#amount').val(), $("#withdrawMethod").find(':selected'), rate, currency, currencyID);
}

/*----------------------------
        Currency List
    ------------------------------*/
function loadCurrencyList(){
    listItems = $('.currencyBTN');
    $.each(listItems, function(){
        $('.currencyBTN').on('click', function(){
            rateCalculate($(this));
        })  
    })
}

/*----------------------
        Input Keyup
    -------------------------*/
$('#amount').on('keyup', function() {
    calculateWithdraw($(this).val(), $("#withdrawMethod").find(':selected'), rate, currency, currencyID);
});

/*-------------------------------
        Withdrawmethod Change
    -------------------------------*/
$(document).on('change','#withdrawMethod', function(){
    updateCurrency($(this).find(':selected').val());
})

/*----------------------
        Data Get Delay
    -------------------------*/
function delay(time){
    setTimeout(() => { 
    calculateWithdraw(amount, $("#withdrawMethod").find(':selected'), rate, currency, currencyID);
    }, time);  
}


