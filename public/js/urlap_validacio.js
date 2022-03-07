window.addEventListener("load", init);
function ID(nev) {
    return document.getElementById(nev);
}
function $(nev) {
    return document.querySelectorAll(nev);
}
function init() {
    ID("kuld").addEventListener("click", validate);
}
function validate() {
    var hiba = "";
    var urlapAdatok = "";
    var nevInput = ID("nev").value;
    var emailInput = ID("email").value;
    var email_ujraInput = ID("email_ujra").value;
    var telefonInput = ID("telefon").value;
    var webInput = ID("web").value;
    console.log(nevInput);
    console.log(emailInput);
    console.log(email_ujraInput);
    console.log(telefonInput);
    

    if (nevInput.lenght < 3) {
        hiba += "A név legyen 3 karakternél hosszabb!";
    }
    var szuro = /[A-Z]+[a-z]{2,}/;
    if (!szuro.test(nevInput)) {
        hiba += "A név Nagybetűvel kezdődjön és legalább 3 karakter legyen!";
        ID("nev").style.border = "1px solid red";
    } else {
        urlapAdatok += "Név:" + nevInput + "<br>";
        ID("nev").style.border = "none";
    }
    var szuro2 = /^[0-9a-z\.-]+@([0-9a-z-]+\.)+[a-z]{2,4}$/;
//    var szuro2 = /^[n-p]/;
    if (!szuro2.test(emailInput)) {
        hiba +="<br>"+ "Érvényes e-mail címet adjon meg!";
        ID("email").style.border = "1px solid red";
    } else {
        urlapAdatok +="<br>"+ "E-mail:" + emailInput + "<br>";
        ID("email").style.border = "none";
    }
    if (emailInput !== email_ujraInput) {
        hiba += "<br>"+ "Nem egyezik mega a két e-mail cím!";
        ID("email_ujra").style.border = "1px solid red";
    } else {
        urlapAdatok +="<br>"+  "E-mail cím 2-szor is megadva:" + email_ujraInput + "<br>";
        ID("email_ujra").style.border = "none";
    }
    var szuro3 =/^[+][3][6][-\s\./0-9]*$/;
    if (!szuro3.test(telefonInput)){
        hiba +="<br>"+ "Érvényes telefonszámot adjon meg!";
        ID("telefon").style.border = "1px solid red";
    }
    else{
        urlapAdatok +="<br>"+  "Telefonszám megadva:" + telefonInput + "<br>";
        ID("telefon").style.border = "none";        
    }
   
      var szuro4=/^[([0-9a-z-]+\.+[a-z]{2,4}$/;
      if (!szuro4.test(webInput)){
        hiba +="<br>"+ "Érvényes webcímet adjon meg!";
        ID("web").style.border = "1px solid red";
    }
    else{
        urlapAdatok +="<br>"+  "Weboldal megadva:" + webInput + "<br>";
        ID("web").style.border = "none";        
    }
    



    $("aside section:nth-child(1) p")[0].innerHTML = hiba;
    $("aside section:nth-child(2) p")[0].innerHTML = urlapAdatok;
    console.log(hiba);
}
