$(function () {
    matunitsApiVegpont = 'http://localhost:8000/api/matunits';
    const matunits = [];
    const sajatAjax = new SajatAjax();
    sajatAjax.callBackBeolvasas(matunitsApiVegpont, matunits, mertekegysegekBeolvasaskor);
    delField();
    var addingMaterialCounter = 1;
    var stepNum = 1;
    var nameNum = 1;

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
        let ujElem = sablonElem.clone().appendTo(szuloElem).removeClass('d-none alapanyag-felvitel-template').addClass('ingredients');
        var materialid = 'material-' + addingMaterialCounter;
        var materiallist = "materials-" + addingMaterialCounter;
        var quantityid = 'quantity-' + addingMaterialCounter;
        var unitid = 'unit-' + addingMaterialCounter;
        var errorid = 'quantity-error-' + addingMaterialCounter;
        $("[id=material]:eq(1)").attr("id", materialid).attr("list", materiallist).attr("required", true).attr("name",'material[]');
        $("[id=materials]:eq(1)").attr("id", materiallist);
        $("[id=quantity]:eq(1)").attr("id", quantityid).attr("name",'quantity[]');
        $("[id=unit]:eq(1)").attr("id", unitid).attr("required", true).attr("name",'unit[]');
        $("[id=quantity-error]:eq(1)").attr("id", errorid);
        mertekegysegAdas(materialid, unitid, quantityid);
        delField();
        addingMaterialCounter += 1;
        ID(quantityid).addEventListener("blur", () => validateInputs(errors));
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
        $("[id=name]:eq(1)").attr("id", nameId).attr("name",'name[]').attr("required", true);
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
    
    function mertekegysegAdas(materialId, unitId, quantityId) {
        $('#' + materialId).on('input', function() {
            var valueSelected = this.value;
            console.log(matunits);
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

    function mertekegysegekBeolvasaskor() {
        let inputs = document.querySelectorAll("[name='material[]']");
        
        inputs.forEach(row => {
            let material = $(row).val();
            let id = $(row).attr('id').split('-')[1];
            console.log(matunits);
            var data = matunits.filter(element => element.alapanyag == material);
            console.log(data);
            data.forEach(element => {
                $('#unitedit-' + id).append(`<option value="${element.mertekegyseg}">${element.mertekegyseg}</option>`);
            });
        });
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
