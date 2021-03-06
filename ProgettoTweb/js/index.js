//animazione dello slide del login e del validatore di password
let strength;
let validations = [];

$(document).ready(function () {
    $.ajax({
        url: 'getFlash.php',
        datatype: 'json',
        success: printFlash
    });
    $('#sign-up input[name=password]').on("focus", strengthOn).on("focusout", strengthOff);
    $('#sign-up').on("submit", verify);

    document.getElementById('signIn').addEventListener('click', () =>
        document.getElementById('container').classList.add('right-panel-active')
    );

    document.getElementById('signUp').addEventListener('click', () =>
        document.getElementById('container').classList.remove('right-panel-active')
    );
});


//gestione di messaggi di errore all'utente, validazione lato front end
function verify(event) {

    let user = $(this).find('[name="username"]').val();
    let pwd = $(this).find('[name="password"]').val();
    if (strength < 4) {
        event.preventDefault();
        $('#flash').show().html("Password not secure");

    } else if (user.length <= 3 ) {
        event.preventDefault();
        $('#flash').show().html("Usernames must be at least 4 characters");

    } else if (!(user.match(/^[a-zA-Z0-9_]+$/))) {
        event.preventDefault();
        $('#flash').show().html("Only letters, numbers and underscore allowed for the username");
    }

}

//animazione del pannello della validazione password
function strengthOn() {
    $('.panel-1').hide();
    $('.panel-2').show();
    $('.overlay').css("background", "#111");
    validate();
    $(this).on("keyup", validate);
}

function strengthOff() {
    $('.panel-2').hide();
    $('.panel-1').show();
    $('.overlay').css("background", "linear-gradient(to right, #642480, #B25CDA)");
}

//controllo della robustezza della password
function validate() {
    let pwd = $('#sign-up input[name=password]').val();
    validations = [
        (pwd.length >= 4),
        (pwd.search(/[a-z]/) > -1),
        (pwd.search(/[A-Z]/) > -1),
        (pwd.search(/[0-9]/) > -1),
    ]
    strength = validations.reduce((acc,curr) => acc+curr);
    for(let i=0;i<4;i++){
        let j = i+1;
        if(strength > i){
            $('.bar-' + j).addClass("bar-show");
        } else {
            $('.bar-' + j).removeClass("bar-show");
        }
    }
    $("ul li").each(function (index) {
        if(validations[index]){
            $(this).css("color", "#b4da55");
        } else {
            $(this).css("color", "#f42069");
        }
    })
}

//stampa messaggi d'errore
function printFlash(json) {
    if (json.isSet) {
        $('#flash').show().text(json.flash);
    } else {
        $('#flash').hide();
    }
}

