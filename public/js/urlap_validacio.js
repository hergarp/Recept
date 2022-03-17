function ID(nev) {
    return document.getElementById(nev);
}

$(function() {
    ID("adag").addEventListener("blur", () => validate("adag", "#adag-hiba"));
    ID("baking").addEventListener("blur", () => validate("baking", "#baking-hiba"));
    ID("cooking").addEventListener("blur", () => validate("cooking", "#cooking-hiba"));
    ID("preparation").addEventListener("blur", () => validate("preparation", "#preparation-hiba"));
    ID("quantity").addEventListener("blur", () => validate("quantity", "#quantity-hiba"));
})

function validate(id, errorField) {
    var hiba = "";
    input = ID(id).value; 
    
    
    var szuro3 = /^[1-9]+[0-9]*$/;
    console.log("input" + !input.trim());
    console.log("szűrő" + ! szuro3.test(input));
    /*Egyelőre üres mezőre is reagál, még nem találtam meg, azt hogy kéne kezelni*/
    if ((! szuro3.test(input)) && (!input.trim())) {
        hiba += "<p class='red align-center'>Legyen egész szám!</p>";
        ID(id).style.border = "1px solid red";
        $(errorField).html(hiba);
    }
    else{
        ID(id).style.border = "none";
        $(errorField).empty();
    }
}
