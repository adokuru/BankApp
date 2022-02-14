(function($) {
  "use strict";

  /*---------------------
    OwlCarousel Active
  ---------------------------*/
  $('#service').owlCarousel({
      loop: true,
      items: 4,
      dots: false,
      responsiveClass:true,
      margin: 20,
      responsive: {
          0: {
              items: 4
          },
          250: {
              items: 1
          },
          350: {
              items: 2
          },
          767: {
              items: 3
          },
          1000: {
              items: 4
          }
      }
  });

  /*----------------
      Navbar Active
    ---------------------*/
  $('.slidebar-nav-area ul').on('click','li.submenu',function(){
      $(this).toggleClass('show').siblings().removeClass('show');
      $(this).addClass('active').siblings().removeClass('active');
  });

 /*-----------------------------
    Navbar Mobile Menu Active
  ----------------------------------*/
  var $main_nav = $('#main-nav');
  var $toggle = $('.toggle');

  var defaultOptions = {
    disableAt: false,
    customToggle: $toggle,
    levelSpacing: 40,
    navTitle: 'Menu',
    levelTitles: true,
    levelTitleAsBack: true,
    pushContent: '#container',
    insertClose: 2
  };

  // call our plugin
  var Nav = $main_nav.hcOffcanvasNav(defaultOptions);

  // add new items to original nav
  $main_nav.find('li.add').children('a').on('click', function() {
    var $this = $(this);
    var $li = $this.parent();
    var items = eval('(' + $this.attr('data-add') + ')');

    $li.before('<li class="new"><a href="#">'+items[0]+'</a></li>');

    items.shift();

    if (!items.length) {
      $li.remove();
    }
    else {
      $this.attr('data-add', JSON.stringify(items));
    }

    Nav.update(true);
  });

  // demo settings update
  const update = (settings) => {
    if (Nav.isOpen()) {
      Nav.on('close.once', function() {
        Nav.update(settings);
        Nav.open();
      });

      Nav.close();
    }
    else {
      Nav.update(settings);
    }
  };

  /*----------------
      Ajax Submit
    ---------------------*/
  $('#bill').on('submit', function(e){
    $('.basicbtn').prop('disabled', true);
    $('.basicbtn').val('Please Wait....');
  });

  /*----------------
    Ajax Submit
  ---------------------*/
  $('form.bill').on('submit', function(){
    var btn = $(this).find('button[type=submit]');
    btn.prop('disabled', true);
    btn.html('Please Wait....');
  });

  /*--------------------
    Sweetalert Active
  ------------------------*/
  $('.delete-confirm').on('click', function (event) {
    const id = $(this).data('id');
    Swal.fire({
      title: 'Are you sure?',
      text: "You want to Return This Loan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Return it!'
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

})(jQuery);

/*------------------------
    Currency Data Change
  -------------------------*/
function select_currency(currency,img)
{
    $('#currency_name').html(currency);
    $('#currency_symbol').val(currency);
    $('#country_flag').attr('src',img);
}