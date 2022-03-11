$(function () {
    materialsApiVegpont = 'http://localhost:8000/api/materials';
    matunitsApiVegpont = 'http://localhost:8000/api/matunits';
    const materials = [];
    const matunits = [];
    matunitsBeolvasas(matunitsApiVegpont, matunits);
    materialsBeolvasas(materialsApiVegpont, materials);
    delField();
    var addingMaterialCounter = 1;
    var stepNum = 1;
    nameNum = 1;
    addingMaterial();
    addingStep();
    addingName();

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

    $('#title').on('input', function() {
        url = $(this).val().toLowerCase()
                            .replaceAll('á','a')
                            .replaceAll('é','e')
                            .replaceAll('í','i')
                            .replaceAll('ó','o')
                            .replaceAll('ö','o')
                            .replaceAll('ő','o')
                            .replaceAll('ú','u')
                            .replaceAll('ü','u')
                            .replaceAll('ű','u')
                            .replaceAll(/[^\w ]+/g, '')
                            .replaceAll(/ +/g, '-');
        $('#slug').attr("value", url);
    }).trigger('input');

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
        const szuloElem = $("#ingredients");
        const sablonElem = $(".alapanyag-felvitel-template");
        let ujElem = sablonElem.clone().appendTo(szuloElem).removeClass('d-none alapanyag-felvitel-template');
        var materialid = 'material-' + addingMaterialCounter;
        var materialName = 'material[]';
        var materiallist = "materials-" + addingMaterialCounter;
        var quantityid = 'quantity-' + addingMaterialCounter;
        var quantityName = 'quantity[]';
        var unitid = 'unit-' + addingMaterialCounter;
        var unitName = 'unit[]';
        $("[id=material]:eq(1)").attr("id", materialid).attr("list", materiallist).attr("required", true).attr("name",materialName);
        $("[id=materials]:eq(1)").attr("id", materiallist);
        $("[id=quantity]:eq(1)").attr("id", quantityid).attr("name",quantityName);
        $("[id=unit]:eq(1)").attr("id", unitid).attr("required", true).attr("name",unitName);
        mertekegysegAdas(materialid,unitid);
        delField();
        addingMaterialCounter += 1;
    }

    $('#adding-material').click(function() {
        addingMaterial();
    })

    function addingStep() {
        const szuloElem = $("#steps");
        const sablonElem = $(".step-template");
        let ujElem = sablonElem.clone().appendTo(szuloElem).removeClass('d-none step-template');
        var stepId = "step-" + stepNum;
        $("[id=step]:eq(1)").attr("id", stepId).attr("required", true);
        delField();
        stepNum += 1;
    }
    
    $('#adding-step').click(function() {
        addingStep();
    })

    function addingName() {
        const szuloElem = $("#names");
        const sablonElem = $(".name-template");
        let ujElem = sablonElem.clone().appendTo(szuloElem).removeClass('d-none name-template');
        var nameId = "name-" + nameNum;
        $("[id=name]:eq(1)").attr("id", nameId);
        delField();
        nameNum += 1;
    }

    $('#adding-name').click(function() {
        addingName();
    })

    function delField() {
        $('.-delete').on('click', function() {
            $(this).parent().parent().remove();
        })
    }

    function matunitsBeolvasas(fajlnev, tomb) {
        $.ajax({
            url: fajlnev,
            success: function (result) {
                result.forEach(element => {
                    tomb.push(element);
                });
            },
        });
    }

    function mertekegysegAdas(materialid,unitid) {
        $('input[data=alapanyagok]').on('input', function() {
            let material = document.getElementById(materialid);
            var valueSelected = this.value;
            var data = matunits.filter(element => element.alapanyag == valueSelected);
            $(this).next().next().next().empty();
            data.forEach(element => {
                $(this).next().next().next().append(`<option value="${element.mertekegyseg}">${element.mertekegyseg}</option>`);
            });
        }).trigger('input');
    }
    
})
