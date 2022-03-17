window.addEventListener("load", init);
function ID(nev) {
    return document.getElementById(nev);
}
function selectall(nev) {
    return document.querySelectorAll(nev);
}


function init() {
    console.log('init')

    ID("adag").addEventListener("blur", () => validate("adag"));
    ID("baking").addEventListener("blur", () => validate("baking"));
    ID("cooking").addEventListener("blur", () => validate("cooking"));
    ID("preparation").addEventListener("blur", () => validate("preparation"));
 
}
function validate(id) {
    console.log('validate')
    var hiba = "";
    var urlapAdatok = "";
    var input = ID(id).value; 


    console.log(input);

    var szuro3 = /^[1-9]+[0-9]*$/;
    if (! szuro3.test(input))  {
        hiba += "<br>" + "Legyen egész szám!";
        ID(id).style.border = "1px solid red";

    }
    else{
        urlapAdatok +="<br>"+  "Jók az adatok:" + input + "<br>";
        ID(id).style.border = "none";
    }
  
$("section:nth-child(1) p")[0].innerHTML = hiba;
$("section:nth-child(2) p")[0].innerHTML = urlapAdatok;
console.log(hiba);
}
