
  window.addEventListener('show-form', event => {
    $('#addUsers').modal('show');
    
  })
  window.addEventListener('show-delete-modal', event => {
    $('#confirmationModal').modal('show');
    
  })
  window.addEventListener('hide-delete-modal', event => {
    $('#confirmationModal').modal('hide');
    toastr.success(event.detail.message, 'Success!')
  })

  window.addEventListener('alert', event => {
    toastr.success(event.detail.message, 'Success!');
  })
window.addEventListener('updated', event => {
    toastr.success(event.detail.message, 'Success!');
  })


  $(document).ready(() => {

    toastr.options = {
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        }
        window.addEventListener('hide-form', event => {
          $('#addUsers').modal('hide');
          toastr.success(event.detail.message, 'Success!');
        })


    //setting 
    $('[x-ref="editProfileLink"]').on('click', () => {
      localStorage.setItem('_x_currentTab','"editProfile"');
    });
    $('[x-ref="changePasswordLink"]').on('click', () => {
      localStorage.setItem('_x_currentTab','"changePassword"');
    });


    // dark mode
    // localStorage.setItem('darkLight','light')

    if(localStorage.getItem("darkLight") == 'light'){
      $('body').removeClass('dark-mode');
      $('[x-mode="dark"]').removeClass('d-none');
      $('[x-mode="light"]').addClass('d-none');
      $('.main-header').addClass('navbar-light').removeClass('navbar-dark');
    }
    if(localStorage.getItem("darkLight") == 'dark'){
        $('body').addClass('dark-mode');
        $('[x-mode="dark"]').addClass('d-none');
      $('[x-mode="light"]').removeClass('d-none');
      $('.main-header').addClass('navbar-dark').removeClass('navbar-light');
    }


    $('[x-mode="light"]').on('click', () =>{
      localStorage.setItem('darkLight','light');

      $('body').removeClass('dark-mode');

      $('.main-header').addClass('navbar-light').removeClass('navbar-dark');

      $('[x-mode="light"]').addClass('d-none');

      $('[x-mode="dark"]').removeClass('d-none');
    });

    $('[x-mode="dark"]').on('click', () =>{
      localStorage.setItem('darkLight','dark')
      $('body').addClass('dark-mode');

      $('.main-header').addClass('navbar-dark').removeClass('navbar-light');

      $('[x-mode="dark"]').addClass('d-none');
      $('[x-mode="light"]').removeClass('d-none');
    });    
  });
