$('#add-project').on('click', function() {
   $('#new-project').slideToggle();
   $(this).toggle();
});
$('#cancel-project').on('click', function() {
   $('#new-project').slideToggle();
   $('#add-project').slideToggle();
});
$('.box').on('click', function() {
   window.location.href = "project.php?id=" + $(this).attr('data-id'); 
});