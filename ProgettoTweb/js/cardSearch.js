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
            checkFav(item.id);
            $('#fav').off("click").one("click", function () {
                addFav(item.id);
            });
        });
    }
}

function addFav(id) {
    $.ajax({
        type: "POST",
        data: { id: id},
        url: 'addFavourite.php',
        success: confirmedAdd
    });
}

function checkFav(id) {
    $.ajax({
        type: "GET",
        data: { id: id },
        url: 'addFavourite.php',
        success: check,
        dataType: "json"
    });
}

function check(json) {
    let i = 0;
    if(json.errMsg) {
        $("#errMsg").show().text(json.errMsg);
    } else {
        json.fav.forEach(function (item) {
            i++;
        });
        if(!i){
            $('#fav').show();
        } else {
            $('#fav').hide();

        }
    }
}


function timer() {
    $('.up p').remove();
}

function confirmedAdd() {
        let p = $("<p></p>");
        $('#fav').hide();
        p.html("Added to Favourites");
        p.css({"color":"#69ff69", "padding": "5px 15px"});
        $('.up').append(p);
        setTimeout(timer,2000);
}
