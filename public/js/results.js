$(function() {
    if($('input:checkbox').is(':checked')) {
        $('input:checkbox:checked').parent().addClass('-fontColorInversePrimary');
    }

    $('input:checkbox').change(function(){
        if($(this).is(':checked')) {
            $(this).parent().addClass('-fontColorInversePrimary'); 
        }
        else {
            $(this).parent().removeClass('-fontColorInversePrimary');
        }
    });

    $('#filter-h2').on('click', function() {
        if($('.dropdown-content').css('display') == "none") {
            $('.dropdown-content').css('display', "block");
        }
        else {
            $('.dropdown-content').css('display', "none");
        }
    })
})