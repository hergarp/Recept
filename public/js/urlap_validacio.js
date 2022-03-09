window.addEventListener("load", init);
function ID(nev) {
    return document.getElementById(nev);
}
function selecall(nev) {
    return document.querySelectorAll(nev);
}
function init() {
    console.log('init')
    ID("adag").addEventListener("blur", validate);
}
function validate() {
    console.log('validate')
    var hiba = "";
    var urlapAdatok = "";
    var adagInput = ID("adag").value;

    console.log(adagInput);

    var szuro3 = /^[1-9]+[0-9]*$/;
    if (! szuro3.test(adagInput)) {
        hiba += "<br>" + "Legyen egész szám!";
        ID("adag").style.border = "1px solid red";
    }
    else{
        urlapAdatok +="<br>"+  "Jók az adatok:" + adagInput + "<br>";
        ID("adag").style.border = "none";
}


$("section:nth-child(1) p")[0].innerHTML = hiba;
$("section:nth-child(2) p")[0].innerHTML = urlapAdatok;
console.log(hiba);
}
