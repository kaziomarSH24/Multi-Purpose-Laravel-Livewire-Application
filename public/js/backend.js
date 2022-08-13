/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/backend.js ***!
  \*********************************/
window.addEventListener('show-form', function (event) {
  $('#addUsers').modal('show');
});
window.addEventListener('show-delete-modal', function (event) {
  $('#confirmationModal').modal('show');
});
window.addEventListener('hide-delete-modal', function (event) {
  $('#confirmationModal').modal('hide');
  toastr.success(event.detail.message, 'Success!');
});
window.addEventListener('alert', function (event) {
  toastr.success(event.detail.message, 'Success!');
});
window.addEventListener('updated', function (event) {
  toastr.success(event.detail.message, 'Success!');
});
$(document).ready(function () {
  toastr.options = {
    "progressBar": true,
    "positionClass": "toast-bottom-right"
  };
  window.addEventListener('hide-form', function (event) {
    $('#addUsers').modal('hide');
    toastr.success(event.detail.message, 'Success!');
  }); //setting 

  $('[x-ref="editProfileLink"]').on('click', function () {
    localStorage.setItem('_x_currentTab', '"editProfile"');
  });
  $('[x-ref="changePasswordLink"]').on('click', function () {
    localStorage.setItem('_x_currentTab', '"changePassword"');
  }); // dark mode
  // localStorage.setItem('darkLight','light')

  if (localStorage.getItem("darkLight") == 'light') {
    $('body').removeClass('dark-mode');
    $('[x-mode="dark"]').removeClass('d-none');
    $('[x-mode="light"]').addClass('d-none');
    $('.main-header').addClass('navbar-light').removeClass('navbar-dark');
  }

  if (localStorage.getItem("darkLight") == 'dark') {
    $('body').addClass('dark-mode');
    $('[x-mode="dark"]').addClass('d-none');
    $('[x-mode="light"]').removeClass('d-none');
    $('.main-header').addClass('navbar-dark').removeClass('navbar-light');
  }

  $('[x-mode="light"]').on('click', function () {
    localStorage.setItem('darkLight', 'light');
    $('body').removeClass('dark-mode');
    $('.main-header').addClass('navbar-light').removeClass('navbar-dark');
    $('[x-mode="light"]').addClass('d-none');
    $('[x-mode="dark"]').removeClass('d-none');
  });
  $('[x-mode="dark"]').on('click', function () {
    localStorage.setItem('darkLight', 'dark');
    $('body').addClass('dark-mode');
    $('.main-header').addClass('navbar-dark').removeClass('navbar-light');
    $('[x-mode="dark"]').addClass('d-none');
    $('[x-mode="light"]').removeClass('d-none');
  });
});
/******/ })()
;