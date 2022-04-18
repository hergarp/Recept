$(function() {
    $('#dropdown').hide();
    $(document).on('click', function(event) {
        if (!$(event.target).closest('.dropdown-ul').length) {
            $('#dropdown').hide();
        }
        else {
            $('#dropdown').show();
        }
      });
})