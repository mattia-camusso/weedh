//Gestione della ricerca di carte per nome
$(document).ready(function () {
    $('form').on("keyup", function () {
        let cdn = $(this).find('[name="name"]').val();
        if (cdn !== "") {
            $.ajax({
                type: "GET",
                data: {name: cdn},
                url: 'cardFound.php',
                success: showCards,
                dataType: "json"
            });
        } else {
            $('#list').empty();
        }
    });
});

//mostra le carte richieste in un menu laterale
function showCards(json) {
    console.log(json);
    if(json.errMsg) {
        $("#errMsg").show().text(json.errMsg);
    } else {
        $('#list').empty().css({"display": "flex", "flex-direction": "column"});
        json.cards.forEach(function (item) {
            let lil = $("<li></li>");
            lil.html(item.name);
            $("#list").append(lil);
        });
        $('#list > li').on("click", displayClick);
    }
}

//cerca nel database la carta selezionata dal menu
function displayClick() {
    let select = $(this).html();
    if (select !== ""){
        $.ajax({
            type: "GET",
            data: { name: select},
            url: 'cardFound.php',
            success: fetchImg,
            dataType: "json"
        });
    }
}
//mostra l'immagine richiesta
function fetchImg(json) {
    if(json.errMsg) {
        $("#errMsg").show();
        $("#errMsg").text(json.errMsg);
    } else {
        $("#display").empty();
        json.cards.forEach(function (item) {
            $('#display').attr("src","img/"+item.art).css({"cursor":"pointer"})
            .on("click", function () {
                window.location.href = "artworkPage.php?id="+item.id;
            });
            $('#add').show().on("click", function () {
                window.location.href = "artworkPage.php?id="+item.id;
            });
            $('#info').text(item.name+", artwork by "+item.artist);
        });
    }
}
