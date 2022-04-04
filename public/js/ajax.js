class SajatAjax {
    constructor() {};

    adatbeolvasas(fajlnev, tomb, myCallback) {
        tomb.length=0;
        $.ajax({
            url: fajlnev,
            success: function (result) {

                var recs = result.recipes;
                for (let index = 0; index < recs.length; index++) {
                    tomb.push(recs[index]);
                }

                myCallback();
            },
        });
    }
}