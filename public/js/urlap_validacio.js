function ID(nev) {
    return document.getElementById(nev);
}

$(function() {
    errors = [];
    titlesApiVegpont = 'http://localhost:8000/api/recipe-titles';
    titles = [];
    const sajatAjax = new SajatAjax();
    sajatAjax.szimplaBeolvasas(titlesApiVegpont, titles);
    $("form").each(function() {
        inputs = $(this).find(':input[type=text]');
    })
    ids = [];
    $.each(inputs, function(index, value) {
        id = $(value).attr('id');
        ids.push(id);
    })
    ids.forEach(element => {
        ID(element).addEventListener("blur", () => validateInputs(errors));
    });
    // ID("portion").addEventListener("blur", () => validate("portion", "portion-error", errors));
    // ID("baking").addEventListener("blur", () => validate("baking", "baking-error", errors));
    // ID("cooking").addEventListener("blur", () => validate("cooking", "cooking-error", errors));
    // ID("preparation").addEventListener("blur", () => validate("preparation", "preparation-error", errors));
    // ID("title").addEventListener("blur", () => validate("title", "title-error", errors));
    validateTimes(errors);
})

function validateInputs(errors) {
    validatePPCBQ("portion");
    validatePPCBQ("baking");
    validatePPCBQ("cooking");
    validatePPCBQ("preparation");
    qs = $('input[name="quantity[]"]');
    quantities = [];
    $.each(qs, function(index, value) {
        q = $(value).attr('id');
        quantities.push(q);
    })
    quantities.forEach(element => {
        validatePPCBQ(element);
    })
    validateTitle();
    validateTimes();

    if (errors.length == 0) {
        sendingAvailable();
    } else {
        sendingDisabled();
    }
    console.log(errors);
}

function commaToDot(input, id) {
    input = input.replace(',', '.');
    console.log(input);
    $("#" + id).val(input);
}

function validatePPCBQ(id) {
    if(id == "portion") {
        errorField = "portion-error";
    } else if (id == "preparation") {
        errorField = "preparation-error";
    } else if (id == "baking") {
        errorField = "baking-error";
    } else if (id == "cooking") {
        errorField = "cooking-error";
    } else {
        errorField = id.split("-")[0] + '-hiba-' + id.split("-")[1];
    }
    var input = $("#" + id).val(); 
    if (id.split('-')[0] == "quantity") {
        commaToDot(input, id);
        input = $("#" + id).val(); 
        var szuro = /^[0-9]+[0-9\.]*$/;
        hiba = "<p class='red align-center'>Legyen pozitív szám!</p>";
    }
    else {
        var szuro = /^[1-9]+[0-9]*$/;
        hiba = "<p class='red align-center'>Legyen egész szám!</p>";
    }
    var l = input.trim().length;
    if (l > 0) {
        if (! szuro.test(input)) {
            ID(id).style.border = "1px solid red";
            $("#" + errorField).html(hiba);
            if($.inArray(id, errors) == -1) {
                errors.push(id);
            }
        }
        else{
            neutralize(id, errorField, errors);
        }
    }
    else{
        neutralize(id, errorField, errors);
    }
}

function validateTitle() {
    url_slug = $("#slug").val();
    hiba = "<p class='red align-center'>Nem egyedi a megnevezés!</p>";
    if($.inArray(url_slug, titles) != -1) {
        ID("title").style.border = "1px solid red";
        $("#title-error").html(hiba);
        if($.inArray("slug", errors) == -1) {
            errors.push("slug");
        }
    }
    else {
        neutralize("title", "title-error", errors);
    }
}

function validateTimes() {
    var preparation = $("#preparation").val();
    var cooking = $("#cooking").val();
    var baking = $("#baking").val();
    if(preparation + cooking + baking == 0 || !($.isNumeric(preparation + cooking + baking))) {
        var hiba = "<p class='red align-center'>Legalább az egyik mezőt ki kell tölteni!</p>";
        ID("time-error").style.border = "1px solid red";
        $("#time-error").html(hiba);
        if($.inArray("time", errors) == -1) {
            errors.push("time");
        }
    }
    else {
        neutralize("time-error", "time-error", errors);
    }
}

function neutralize(id, errorField, errors) {
    ID(id).style.border = "none";
    $("#" + errorField).empty();
    errors.splice( $.inArray(id, errors), 1 );
}

function sendingDisabled() {
    $("#sending").removeClass('-adding').attr('disabled', true);
}

function sendingAvailable() {
    $("#sending").addClass('-adding').attr('disabled', false);
}