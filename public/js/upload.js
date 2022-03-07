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
    
    delField();
    addingMaterial();
    function addingMaterial() {
        const szuloElem = $('#ingredients');
        szuloElem.append(`<div class="m-form__selectWrapper -colorBgTernary mb-3 ingredients">
        <input class="-hidden m-form__input raw-material-name" list="materials" name="alapanyagok" placeholder="Alapanyag">
        <datalist id="materials">
        </datalist>
          <input class="-hidden m-form__input raw-material-quantity" type="number" name="quantitys" id="quantity"
          placeholder="mennyiség" />
          <select class="m-form__select left-b raw-material-unit" name="units" id="unit">
            <option value="">mértékegység</option>
          </select>
          <div class="right">
            <button class="-delete little-button">–</button>
          </div>
      </div>`)
        delField();
    }
    $('#adding-material').click(function() {
        addingMaterial();
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
