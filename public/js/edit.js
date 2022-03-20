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
    var nameNum = 1;

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
        var materiallist = "materials-" + addingMaterialCounter;
        var quantityid = 'quantity-' + addingMaterialCounter;
        var unitid = 'unit-' + addingMaterialCounter;
        $("[id=material]:eq(1)").attr("id", materialid).attr("list", materiallist).attr("required", true).attr("name",'material[]');
        $("[id=materials]:eq(1)").attr("id", materiallist);
        $("[id=quantity]:eq(1)").attr("id", quantityid).attr("name",'quantity[]');
        $("[id=unit]:eq(1)").attr("id", unitid).attr("required", true).attr("name",'unit[]');
        delField();
        mertekegysegAdas(materialid, unitid, quantityid);
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
        $("[id=step]:eq(1)").attr("id", stepId).attr("required", true).attr("name",'step[]');
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
        $("[id=name]:eq(1)").attr("id", nameId).attr("name",'name[]');
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
    
    function mertekegysegAdas(materialId, unitId, quantityId) {
        $('#' + materialId).on('input', function() {
            var valueSelected = this.value;
            var data = matunits.filter(element => element.alapanyag == valueSelected);
            $('#' + unitId).empty();
            data.forEach(element => {
                $('#' + unitId).append(`<option value="${element.mertekegyseg}">${element.mertekegyseg}</option>`);
            });
            $('#' + unitId).val($('#' + unitId +' option:first').val());
            if ($('#' + unitId).val() == 'ízlés szerint') {
                $('#' + quantityId).attr("required", false);
            }
            else {
                $('#' + quantityId).attr("required", true);
            }
        }).trigger('input');
        requiredQuantity(unitId, quantityId);
    }
    
    function requiredQuantity(unitId, quantityId) {
        $('#' + unitId).change(function() {
            if ($('#' + unitId).val() == 'ízlés szerint') {
                $('#' + quantityId).attr("required", false);
            }
            else {
                $('#' + quantityId).attr("required", true);
            }
        })
    }
})
