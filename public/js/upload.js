$(function () {
    materialsApiVegpont = 'http://localhost:8000/api/materials';
    const materials = [];
    materialsBeolvasas(materialsApiVegpont, materials);
    delField();
    var addingMaterialCounter = 1;
    addingMaterial();

    function materialsBeolvasas(fajlnev, tomb) {
        $.ajax({
            url: fajlnev,
            success: function (result) {
                result.forEach((value) => {
                    tomb.push(value.megnevezes);
                });

            },
        });
    }

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
    
    function addingMaterial() {
        txt = '<div class="m-form__selectWrapper -colorBgTernary mb-3 ingredients">';
        txt += '<input class="-hidden m-form__input raw-material-name" list="materials-' + addingMaterialCounter + '" name="alapanyagok" placeholder="Alapanyag">';
        txt += '<datalist id="materials-' + addingMaterialCounter + '">';
        txt += '</datalist>';
        txt += '<input class="-hidden m-form__input raw-material-quantity" type="number" name="quantitys" id="quantity" placeholder="mennyiség" />';
        txt += '<select class="m-form__select left-b raw-material-unit" name="units" id="unit">';
        txt += '<option value="">mértékegység</option>';
        txt += '</select>';
        txt += '<div class="right">';
        txt += '<button class="-delete little-button">–</button>';
        txt += '</div>';
        txt += '</div>';
        var element = document.getElementById('ingredients');
        element.insertAdjacentHTML("beforeend", txt);   
        materialsDatalist(materials); 
        delField();
        addingMaterialCounter += 1;
    }

    $('#adding-material').click(function() {
        addingMaterial();
        
    })

    function materialsDatalist(tomb) {
        const szuloElem = $('#materials-' + addingMaterialCounter);
        txt = '';
        tomb.forEach(function(tombelem) {
            txt += '<option value="' + tombelem +'">' + tombelem + '</option>';
        });
        szuloElem.html(txt);
    }

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
