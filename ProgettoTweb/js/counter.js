var startLife = [];
var victory;
// gestione del life counter e dei punteggi dei giocatori
$(document).ready( function () {
    //gameLoad();
    $('button').on("click", function () {
        let nop = $('select').val();
        let slt = $('input[name="lt"]:checked').val();
        firstGame(nop,slt);
    });
});
//inizia una nuova partita usando i dati inseriti dall'utente
function firstGame(nop, slt) {
    $('.wide').nextAll().remove();
    for (let i=0; i<nop; i++){
        startLife[i] = slt;
        let j = i + 1;
        let pid = "player"+i;
        let div = $("<div class='card' id='"+pid+"'></div>");
        let pname = $("<h6 class='pname'></h6>");
        pname.html("Player "+j);
        div.append(pname);
        let span = $("<span></span>");
        let minus = $("<button class='button minus'></button>");
        minus.html("-");
        span.append(minus);
        let display = $("<p class='display'></p>");
        display.html(slt);
        span.append(display);
        let plus = $("<button class='button plus'></button>");
        plus.html("+");
        span.append(plus);
        div.append(span);
        $('.grid-container').append(div);
    }
    $(".wide").hide();
    gameLoad();
}
//inizializza i contatori di ciascun giocatore
function gameLoad() {
    victory = 0;
    for (let i = 0; i < startLife.length; i++) {
        let id = '#player' + i;
        $(id + ' .display').text(startLife[i]);
        $(id + ' .plus').off().on("click", function () {
            lifeUp(i)
        });
        $(id + ' .minus').off().on("click", function () {
            lifeDown(i)
        });
    }
}
// life up e life down gestiscono incrementi e decrementi dei punti vita dei giocatori
function lifeUp(i) {
    if (!victory) {
        let life = $("#player" + i + "  .display");
        life.text(++startLife[i]);
        life.css({"color": "#ffffff"});
        life.css({"border": "#ffffff 2px solid"});
    }
}

function lifeDown(i) {
    if (!victory) {
        let life = $("#player" + i + "  .display");
        if (startLife[i] <= 1) {
            startLife[i] = 0;
            life.text("You Died");
            life.css({"color": "#ff2c2e"});
            life.css({"border": "#ff2c2e 2px solid"});
            checkWin();
        } else {
            life.text(--startLife[i]);
        }
    }
}

//controlla se le condizioni di vittoria sono rispettate e un giocatore ha vinto la partita
function checkWin() {
    let defeated = 0;
    let winner;
    for (let i = 0; i < startLife.length; i++) {
        if (startLife[i] === 0) {
            defeated++;
        } else {
            winner = i;
        }
    }
    if (defeated === (startLife.length - 1) && !victory) {
        victory = 1;
        let winframe = $('#player' + winner + ' .display');
        winframe.css({"color": "#69ff69"});
        winframe.css({"border": "#69ff69 2px solid"});
        winframe.text("WINNER");
        newGame(winner);
    }
}

//reinserisce il menu da cui è possibile creare una nuova partita
function newGame(id) {
    $('.wide').show();
    let winnername = $('#player' + id + ' .pname').text();
    $('.wide h6').html("Congratulations " + winnername + ", you won");
    $('.wide button').html("Play Again");

}

