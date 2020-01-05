jQuery(document).ready(function($){
    // top menu
    $(".sf-menu").superfish();
    $(".sf-menu").after("<div id='my-menu'>");
    $(".sf-menu").clone().appendTo("#my-menu");
    $("#my-menu").find("*").attr('style', '');
    $("#my-menu").find("ul").removeClass("sf-menu");
    $("#my-menu").mmenu({
        extensions: ["widescreen", "pagedim-black","effect-menu-slide", "effect-listitems-slide", "fx-menu-zoom", "fx-panels-zoom", "theme-dark"],
        navbar: {
            title: "Західний спортивно-реабілітаційний центр"
        }
    });
    var api = $("#my-menu").data("mmenu");
    api.bind("closed", function() {
        $(".toggle-mnu").removeClass("on");
    });

    $(".mobile-mnu").click(function() {
        var mmAPI = $("#my-menu").data("mmenu");
        mmAPI.open();
        var thiss = $(this).find(".toggle-mnu");
        mmAPI.bind("open:finish", function(){
            thiss.addClass("on");
        });

        mmAPI.bind("close:finish", function(){
            thiss.removeClass("on");
        });

        $(".main-mnu").slideToggle();
        return false;
    }); // end top menu.

    //owl-carousel.
    $(".owl-carousel").owlCarousel({
        nav:true,
        loop:true,
        items: 5
    });

    $('#lang').dropdown();
    // big tabs
    $('.menu .item').tab();

    $('.ui.menu .item').tab();
}); // end ready.
