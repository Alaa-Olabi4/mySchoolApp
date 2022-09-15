jQuery(document).ready(function() {

    alert("Hello world!");


    // jQuery("#title").click(function() {
    //     jQuery("#title").fadeIn("slow");
    // });

    jQuery("h1").click(function() {
        jQuery("h1").fadeOut();
    });
    jQuery("h1").animate({ "opacity": "0" }, 500).stop();

    // استقبال الأحداث
    // jQuery(".box-close").click(function() {

    // التنقل داخل المستند
    // jQuery(this).parents(".box").fadeOut();
    // });

    // jQuery(".answer").hide();
    // jQuery(".question").click(function() {
    //     jQuery(this).next(".answer").slideToggle();
    // })
    // jQuery(".faq .question").addClass("pointer");

    // jQuery(".question").append('<span class="icon">>></span>');

    // jQuery("#more").click(function() {
    //     jQuery("place-holder").load("index.html .more-items ");
    // });
});