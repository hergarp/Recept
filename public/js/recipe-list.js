$(function() {
    apivegpont = 'http://localhost:8000/api/recipe-list';
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
    }

    $("#szuresNevre").on("keyup", function() {
        let szuro = $("#szuresNevre").val();
        console.log("szűrő:" + szuro);
        let szurtvegpont = apivegpont + "?megnevezes_like=" + szuro;
        console.log("szűrt:" + szurtvegpont);
        sajatAjax.adatbeolvasas(szurtvegpont, recipes, megjelenit);
    })
})