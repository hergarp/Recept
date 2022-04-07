function ID(nev) {
    return document.getElementById(nev);
}
$(function() {
  
    // ID("recipe-save").addEventListener("click", () => {
    //     szamlalo +=1;
    //     console.log(szamlalo);
    // });
    ID("recipe-print").addEventListener("click", () => {
        window.print();
    });
    
})


$(function() {
    times();
    quantity();
    
    function times() {
        let times = document.querySelectorAll(".times");
        sum = 0;
        times.forEach(element => {
            sum += Number(element.innerHTML);
        });
        $('#sum-time').html(sum);
    }

    $('.-selectable').on("click", function(){
        $('.-selectable').removeClass('-active');
        $(this).addClass('-active');
    })

    function quantity(){
        let portion = $('#adag').val();
        let q = document.querySelectorAll(".quantity");
        q.forEach(element => {
            value = element.getAttribute('value');
            if ($.isNumeric(value)) {
                let quantity = value * portion;
                $(element).html(quantity);
            }
            else {
                $(element).html(value);
            }
        });
    }

    function adagSzabalyzo() {

    }
})