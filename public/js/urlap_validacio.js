window.addEventListener("load", init);
function ID(nev) {
    return document.getElementById(nev);
}
function selectall(nev) {
    return document.querySelectorAll(nev);
}
function init() {
    console.log('init')
    $("#adag").blur(validate);
    // ID("adag", "baking").addEventListener("blur", validate);
    // ID("baking").addEventListener("blur", validate);
    // ID("cooking").addEventListener("blur", validate);
    // ID("preparation").addEventListener("blur", validate);
}
function validate() {
    console.log('validate')
    var hiba = "";
    var urlapAdatok = "";
    var input = $(this).value;
    
    // var backingInput = ID("backing").value;
    // var cookingInput = ID("cooking").value;
    // var preparationInput = ID("preparation").value;


    console.log(input);

    var szuro3 = /^\d+$/;
    if (! szuro3.test(input))  {
        hiba += "<br>" + "Legyen egész szám!";
        ID("adag").style.border = "1px solid red";

    }
    else{
        urlapAdatok +="<br>"+  "Jók az adatok:" + input + "<br>";
        ID("adag").style.border = "none";
    }
    // if (! szuro3.test(backingInput))  {
    //     hiba += "<br>" + "Legyen egész szám!";
    //     ID("backing").style.border = "1px solid red";
    // }
    // else{
    //     urlapAdatok +="<br>"+  "Jók az adatok:" + backingInput + "<br>";
    //     ID("backing").style.border = "none";
    // }
    // if (! szuro3.test(cookingInput))  {
    //     hiba += "<br>" + "Legyen egész szám!";
    //     ID("cooking").style.border = "1px solid red";
    // }
    // else{
    //     urlapAdatok +="<br>"+  "Jók az adatok:" + cookingInput + "<br>";
    //     ID("cooking").style.border = "none";
    // }
    // if (! szuro3.test(preparationInput))  {
    //     hiba += "<br>" + "Legyen egész szám!";
    //     ID("preparation").style.border = "1px solid red";
    // }
    // else{
    //     urlapAdatok +="<br>"+  "Jók az adatok:" + preparationInput + "<br>";
    //     ID("preparation").style.border = "none";
    // }



$("section:nth-child(1) p")[0].innerHTML = hiba;
$("section:nth-child(2) p")[0].innerHTML = urlapAdatok;
console.log(hiba);
}
