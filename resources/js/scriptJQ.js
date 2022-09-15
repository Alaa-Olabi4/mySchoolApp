jQuery(document).ready(function() {

    alert("Hello world!");


    jQuery("h1").click(function() {
        jQuery("h1").fadeOut();
    });
    jQuery("h1").animate({ "opacity": "0" }, 500).stop();

});