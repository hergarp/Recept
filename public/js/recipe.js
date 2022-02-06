$(function() {
    $(document).ready(function() {
        let times = document.querySelectorAll(".times");
        sum = 0;
        times.forEach(element => {
            sum += Number(element.innerHTML);
        });
        $('#sum-time').html(sum);
        quantity();
    })
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
})