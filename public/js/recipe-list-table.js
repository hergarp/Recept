class Table {
    constructor(htmlDomElem, adat) {
        this.elem = htmlDomElem;
        this.adat = adat;
        this.kep = this.elem.children(".image");
        this.cim = this.elem.children(".cim");
        this.url = this.elem.children(".url");
        this.idopont = this.elem.children(".time");
        this.statusz = this.elem.children(".statusz");
        this.setAdat(adat);
    }

    setAdat(ertek) {
        this.kep.html(`<div class="image" style="background-image: url('../../`+ertek.kep+`');"></div>`);
        var cim = `<a class="url" href="../recipe/`+ertek.url_slug+`?adag=`+ertek.adag+`">`+ertek.megnevezes+`</a>`;
        this.cim.html(cim);
        this.idopont.html(ertek.created_at);
        this.statusz.html(ertek.statusz);
    }
}