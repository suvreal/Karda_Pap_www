$(window).scroll(function() {
        if ($(window).scrollTop() >= 900) {
            $("#navigation").css({"opacity": "1", "filter": "alpha(opacity=100);"});
        }else{
            $("#navigation").css({"opacity": "0.8", "filter": "alpha(opacity=80);"});
        }
});