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

    szimplaBeolvasas(fajlnev, tomb) {
        $.ajax({
            url: fajlnev,
            success: function (result) {
                result.forEach(element => {
                    tomb.push(element);
                });
            },
        });
    }

    callBackBeolvasas(fajlnev, tomb, myCallBack) {
        $.ajax({
            url: fajlnev,
            success: function (result) {
                result.forEach(element => {
                    tomb.push(element);
                });
                myCallBack();
            },

        });
    }
}