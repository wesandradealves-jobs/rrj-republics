jQuery(document).ready(function () {

    $('.flexslider.noticias').flexslider({

        animation: "slide",

        controlNav: true,

        directionNav: false,

        animationLoop: false,

        slideshow: false,

        maxItems: 3,

        itemWidth: 300,

        itemMargin: 15,

        prevText: "",

        nextText: ""

    });

    $('.flexslider.galeria').flexslider({
        controlNav: false,
        animation: "slide"
    });

    $('select').material_select();

    $('.caret').text("");

    $(window).scroll(function (event) {

        $("section").each(function (i, el) {

            var el = $(el);

            if (el.visible(true)) {

                el.addClass("animate");

            } // } else {

            //     el.removeClass("animate"); 

            // }

        });

    });
    
    $('[name="telefone_celular"]').mask('(99) 9 9999-9999');
    $('[name="telefone"],[name="telefone_fixo"],[name="TelefonePai"],[name="TelefoneMae"],[name="TelefoneTrabalho"],[name="TelEmergencia1"],[name="TelEmergencia2"]').mask('(99) 9999-9999');
    $('[name="RG"]').mask('99.999.999-9');
    $('[name="CPF"]').mask('999.999.999-99');
    $('[name="email"]').mask("A", {
        translation: {
            "A": { pattern: /[\w@\-.+]/, recursive: true }
        }
    });
});



function mobileNavigation() {

    $("#wrap").children("nav").first().toggleClass("toggle");

}

function blogCheck() {
    $( "a" ).each(function() {
        if($(this).text()=="Notícias"||$(this).text()=="News"||$(this).text()=="Blog"){
            $(this).parent().remove();
        }
    });
}







