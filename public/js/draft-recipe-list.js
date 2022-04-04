$(function() {
    apivegpont = 'http://localhost:8000/api/draft-recipe-list';
    const recipes = [];
    const sajatAjax = new SajatAjax();
    sajatAjax.adatbeolvasas(apivegpont, recipes, megjelenit);
    
    function megjelenit() {
        const szuloElem = $("#body");
        $('#body').empty();
        szuloElem.append(`<tr class="sor">
                          <td class="image"></td>
                          <td class="cim"></td>
                          <td class="time"></td>
                          <td class="statusz"></td>
                          </tr>`);
        const sablonElem = $(".sor");
        recipes.forEach(function(tombelem) {
            let ujElem = sablonElem.clone().attr('class', '').appendTo(szuloElem);
            let ujSor = new Table(ujElem, tombelem);
        });
        sablonElem.hide();

        tagging();
    }
    
    function tagging() {
        $('.tag').each(function() {
            if ($(this).text() == 'vázlat') {
                $(this).addClass('draft');
            }
            else {
                $(this).addClass('arrived');
            }
        })
    }

    // if($('input:checkbox').is(':checked')) {
    //     $('input:checkbox:checked').each(function() {
    //         if($(this).attr('id') == 'arrived') {
    //             $(this).parent().addClass('arrived'); 
    //         }
    //         else {
    //             $(this).parent().addClass('draft');
    //         }
    // })}

    // $('input:checkbox').change(function(){
    //     if($(this).is(':checked')) {
    //         if($(this).attr('id') == 'arrived') {
    //             $(this).parent().addClass('arrived'); 
    //         }
    //         else {
    //             $(this).parent().addClass('draft');
    //             filtering();
    //         }
    //     }
    //     else {
    //         if($(this).attr('id') == 'arrived') {
    //             $(this).parent().removeClass('arrived'); 
    //         }
    //         else {
    //             $(this).parent().removeClass('draft');
    //         }
    //     }
    // });
})