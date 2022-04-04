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
        var cim = `<a href="../admin/edit/`+ertek.r_id+`">`+ertek.megnevezes+`</a>`;
        this.cim.html(cim);
        this.idopont.html(ertek.created_at);
        var statusz = `<span class="tag">` + ertek.statusz + `</span>`
        this.statusz.html(statusz);
    }
}