$(document).ready(function() {
    var alturaventana = $(window).height();
    var alturaCuerpo = $('#cuerpo').height();

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
});