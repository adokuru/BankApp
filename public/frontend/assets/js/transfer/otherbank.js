(function($) {
"use strict";
var otherbank_country=$('#otherbank_country').val();
$('.select2country').select2({
    'placeholder' : 'Select Country'
});
$('.select2bank').select2({
    'placeholder' : 'Select Bank'
});

//bank list country wise
$('#country').on('change', function(){
    $('#banks').html('');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url:  otherbank_country,
        data: {'country_id' : this.value},
        dataType: 'json',
        success: function(response){ 
            $.each(response, function( i, bank ) {
              $('#banks').append(`<option value=${bank.id}>${bank.name}</option>`)
                });
            },
            error: function(xhr, status, error) 
               {
                   alert('error');
                }
           })
    })
        
})(jQuery);