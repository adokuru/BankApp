(function($) {
  "use strict";

  /*----------------------------
        Transaction Charge
    ------------------------------*/
  $(document).on('change', '#charge_type', function(){
    var charge_type = $(this).val();
    transaction_charge(charge_type);
  });

  /*----------------------------
        SweetAlert Active
    ------------------------------*/
  $('.delete-confirm').on('click', function (event) {
    const id = $(this).data('id');
      Swal.fire({
        title: 'Are you sure?',
        text: "You want to cancel this deposit!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
      if (result.value) {
        event.preventDefault();
        document.getElementById('delete_form_'+id).submit();
        } else if (
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your Data is Save :)',
            'error'
          )
        }
      })
    });
  
    /*------------------------------
        Confirm Sweetalret Active
    -----------------------------------*/
    $('.approve-confirm').on('click', function (event) {
      const id = $(this).data('id');
        Swal.fire({
          title: 'Are you sure?',
          text: "You want to approve this deposit!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
        if (result.value) {
          event.preventDefault();
          document.getElementById('approve_form_'+id).submit();
          } else if (
            result.dismiss === Swal.DismissReason.cancel
          ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your Data is Save :)',
            'error'
          )
        }
      })
    });

    /*----------------------------
        Image Preview Show
    ------------------------------*/
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    /*----------------------------
        Login Form Submit
    ------------------------------*/
    $('#login').on('submit', function(e){
      $('.basicbtn').prop('disabled', true);
      $('.basicbtn').html('Please Wait....');
    });

})(jQuery);

/*----------------------------
        Sweet Aleart
------------------------------*/
function Sweet(icon,title,time=3000){
      
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: time,
    timerProgressBar: true,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

 
  Toast.fire({
    icon: icon,
    title: title,
  })
}

/*----------------------------
    Transaction Charge Get
------------------------------*/
function transaction_charge(charge_type = "") {
  $('.transaction_percentage').hide();
  $('.transaction_fixed').hide();
   // Fixed
  if(charge_type == 'fixed') {
    $('.transaction_fixed').show();
  }
  // Percentage
  if(charge_type == 'percentage') {
    $('.transaction_percentage').show();
  } 
  // Both 
  if(charge_type == 'both') {
    $('.transaction_fixed').show();
    $('.transaction_percentage').show();
  } 
}

var charge_type_data = $('#charge_type_data').val();
transaction_charge(charge_type_data);

