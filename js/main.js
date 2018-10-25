$('#form-add').on('click', function() {
   $('#add-form').slideToggle();
   $(this).toggle();
});
$('#form-cancel').on('click', function() {
   $('#add-form').slideToggle();
   $('#form-add').slideToggle();
});
$('#project-box').on('click', function() {
   window.location.href = BASE_URL + "project/" + $(this).attr('data-id');
});
$('#list-box').on('click', function () {
  window.location.href = BASE_URL + "list/" + $(this).attr('data-id');
});


if ($(window).width() < 768) {
  $(".navbar a").on('click', function (e) {
    e.preventDefault();
    $(this).on('click', function (e) {
      window.location = this.href;
    });
  });
}
