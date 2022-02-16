$(function () {
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
    var materialNum = 1;
    delField();
    $('#adding-material').click(function() {
        materialNum += 1;
        txt = '<div class="m-form__selectWrapper -colorBgTernary mb-3 ingredients">';
        txt += '<select class="m-form__select right-b w-100 raw-material-name" name="raw-material-' + materialNum + '" id="raw-material-' + materialNum + '">';
        txt += '<option value="">Alapanyag</option>';
        txt += '</select>';
        txt += '<input class="-hidden m-form__input raw-material-quantity" type="number" name="quantity-' + materialNum + '" id="quantity-' + materialNum + '" placeholder="mennyiség" />';
        txt += '<select class="m-form__select left-b raw-material-unit" name="unit-' + materialNum + '" id="unit-' + materialNum + '">';
        txt += '<option value="">mértékegység</option>';
        txt += '</select>';
        txt += '<div class="right"><button class="-delete little-button">–</button></div>';
        txt += '</div>';
        var element = document.getElementById('ingredients');
        element.insertAdjacentHTML("beforeend", txt);
        delField();
    })

    var stepNum = 1
    $('#adding-step').click(function() {
        stepNum += 1;
        txt = '<div class="steps w-100">';
        txt += '<textarea class="step-txt" name="step'+stepNum+'" id="step'+stepNum+'" cols="30" rows="1"></textarea>'
        txt += '<div class="right"><button class="-delete little-button">–</button></div>'
        txt += '</div>'
        var element = document.getElementById('steps');
        element.insertAdjacentHTML("beforeend", txt);
        delField();
    })

    nameNum = 1
    $('#adding-name').click(function() {
        txt = '<div class="-colorBgTernary mb-3 w-100 names">'
        txt += '<input class="-hidden m-form__input w-80" type="text" name="name-' +nameNum+ '" id="name-'+nameNum+'" placeholder="További elnevezés" />'
        txt += '<div class="right"><button class="-delete little-button">–</button></div>'
        txt += '</div>'
        var element = document.getElementById('names');
        element.insertAdjacentHTML("beforeend", txt);
        nameNum += 1;
        delField();
    })

    function delField() {
        $('.-delete').on('click', function() {
            $(this).parent().parent().remove();
        })
    }
})
