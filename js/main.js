$('#form-add').on('click', function() {
   $('#add-form').slideToggle();
   $(this).toggle();
});
$('#form-cancel').on('click', function() {
   $('#add-form').slideToggle();
   $('#form-add').slideToggle();
});
$('.box').on('click', function() {
   window.location.href = BASE_URL + "project/" + $(this).attr('data-id');
});
