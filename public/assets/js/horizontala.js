$(document).ready(function() {
    var alturaventana = $(window).height();
    var alturaCuerpo = $('#wrapper').height();
    var margin = alturaventana - alturaCuerpo;
    
    console.log(alturaventana +' - '+ alturaCuerpo +' = '+margin);
    if (margin > 100) {
        margin = margin - 100;
        margin = margin + "px";
        $('#footer').css({'margin-top': margin});
    } else {
        margin = 50;
        margin = margin + "px";
        $('#footer').css({'margin-top': margin});
    }
    console.log(margin);
    function colocarPie() {
        var alturaventana = $(window).height();
        var alturaCuerpo = $('#wrapper').height();
        var margin = alturaventana - alturaCuerpo;
        if (margin > 100) {
            margin = margin - 100;
            margin = margin + "px";
            $('#footer').css({'margin-top': margin});
        } else {
            margin = 50;
            margin = margin + "px";
            $('#footer').css({'margin-top': margin});
        }
    }

    $(window).resize(function(e) {
        // do something when element resizes 
        var alturaventana = $(window).height();
        var alturaCuerpo = $('#wrapper').height();
        var margin = alturaventana - alturaCuerpo;
        if (margin > 100) {
            margin = margin - 100;
            margin = margin + "px";
            $('#footer').css({'margin-top': margin});
        } else {
            margin = 50;
            margin = margin + "px";
            $('#footer').css({'margin-top': margin});
        }
    });

    $('#wrapper').on('resize change', function() {
        colocarPie();
    });
    
    $(".see_more").click(function(event){
        event.preventDefault();
        $('.more_info').hide();
        $('.see_more').show();
        $(this).parent().find('.more_info').fadeIn(500);
        $(this).hide();
    });
});