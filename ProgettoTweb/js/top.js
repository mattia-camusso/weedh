$(document).ready(function (){
    $("#burg-bar").on("click", function (){
        var mq = window.matchMedia("(max-width: 1080px)");

        if(mq.matches) {
            $("#burg").toggleClass("change");
            $("#bnav").toggleClass("change");

            $("#burg-bg").toggleClass("change-bg");
        } else{
            $("#burg").removeClass("change");
            $("#bnav").removeClass("change");

            $("#burg-bg").removeClass("change-bg");
        }
    });
});
