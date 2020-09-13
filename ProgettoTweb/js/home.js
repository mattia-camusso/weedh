$(document).ready(function () {
    $(window).on("scroll",scrollAppear);
    $.get({
        url: 'getUser.php',
        datatype: 'json',
        success: printName
    });
});
/*$(function () {
    if ((window.location).attr('href').indexOf('index.php') !== -1) {
        $.ajax({
            url: 'getFlash.php',
            datatype: 'json',
            success: printFlash
        });
    } else {
        $.ajax({
            url: 'getUser.php',
            datatype: 'json',
            success: printName
        })
    }
});

function printFlash(json) {
    if (json.isSet) {
        $('#flash').show();
        // noinspection JSJQueryEfficiency
        $('#flash').text(json.flash);
    } else {
        $('#flash').hide();
    }
}
*/
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