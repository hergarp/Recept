$(function() {
    apivegpont = 'http://localhost:8000/admin/matunits';
    const matunits = [];
    adatbeolvasas(apivegpont, matunits);
    $("input[name='alapanyag']").on('input', function() {
        var valueSelected = this.value;
        var data = matunits.filter(element => element.alapanyag == valueSelected);
        megjelenit(data);
    });


    function megjelenit(tomb) {
        const szuloElem = $("#am-table");
        $('#am-table').empty();
        szuloElem.append(`<tr class="sor"><td class="anyag"></td><td class="mertegy"></td></tr>`);
        const sablonElem = $(".sor");
        tomb.forEach(function(tombelem) {
            let ujElem = sablonElem.clone().appendTo(szuloElem);
            let ujSor = new Table(ujElem, tombelem);
        });
        sablonElem.hide();
    }

    function adatbeolvasas(fajlnev, tomb) {
        tomb.length = 0;
        $.ajax({
            url: fajlnev,
            success: function (result) {
                result.forEach((value) => {
                    tomb.push(value);
                });

            },
        });
    }

})