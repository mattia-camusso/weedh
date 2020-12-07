//printName visualizza lo username dell'utente
//scrollAppear gestisce un'animazione on scroll che fa comparire il testo

$(document).ready(function () {
    $(window).on("scroll",scrollAppear);
    $.get({
        url: 'getUser.php',
        datatype: 'json',
        success: printName
    });
});

function printName(json) {
    if (json.isSet) {
        $('#username').text(json.name);
    } else {
        $(window.location).attr('href', 'index.php');
    }

}

function scrollAppear() {
    let text = $('.subsection');
    let position = $('.subsection')[0].getBoundingClientRect().top;
    let screenPos = $(window).innerHeight()/1.3;
    if(position < screenPos){
        text.addClass('subsection-appear');
    }
}