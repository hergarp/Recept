class Table {
    constructor(htmlDomElem, adat) {
        this.elem = htmlDomElem;
        this.adat = adat;
        this.mat = this.elem.children(".anyag");
        this.unit = this.elem.children(".mertegy");
        this.setAdat(adat);
    }

    setAdat(ertek) {
        this.mat.html(ertek.alapanyag);
        this.unit.html(ertek.mertekegyseg);
    }
}