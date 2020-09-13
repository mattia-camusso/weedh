var c_id;

$(document).ready(function () {
    loadInfo();
    $('#fav').one("click", addFav);
    $('#comment').on("click", setComment);
});


function loadInfo() {
    let parameter = window.location.search.substr(1).split("=");
    $.ajax({
       type: "GET",
       data: {id: parameter[1]},
       url: "cardFound.php",
       success: showInfo,
       dataType: "json"

    });
    console.log(parameter[1]);
}

function showInfo(json) {
    console.log(json);
    if(json.errMsg) {
        $("#errMsg").show();
        $("#errMsg").text(json.errMsg);

    } else {
        json.cards.forEach(function (item) {
            console.log(item);
            $('#cname').html(item.name+ ", Artwork by "+item.artist);
            $('.slide img').attr("src", "img/"+item.art);
            $('#c_id').attr("value", item.id);
            c_id = $('#test').find('[name="c_id"]').val();
            displayComments();
            checkFav();
        });
    }
}

function setComment() {
    let message = $('#test').find('[name="message"]').val();
    $.ajax({
        type: "POST",
        data: { c_id: c_id, message: message},
        url: 'addComment.php',
        success: displayComments
    });
    $('#test textarea').val('');

    $('html,body').animate({scrollTop: document.body.scrollHeight}, "fast");
}

function displayComments() {
    $.ajax({
        type: 'GET',
        data: { c_id: c_id},
        url: 'addComment.php',
        dataType: 'json',
        success: showComments
    });
}

function showComments(json) {
    $('#comment-section').empty();
    json.comments.forEach(function (item) {
        let lil = $('<div class="comment-section"></div>');
        let usn =$("<h4></h4>");
        let msg = $("<p></p>");
        usn.html(item.username);
        msg.html(item.message);
        lil.append(usn).append(msg);
        $('#comment-section').append(lil);
    });
}

function addFav() {
    $.ajax({
        type: "POST",
        data: { id: c_id},
        url: 'addFavourite.php',
        success: confirmedAdd
    });
}

function checkFav() {
    $.ajax({
        type: "GET",
        data: { id: c_id },
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
    $('#fav').remove();
}

function confirmedAdd() {
    let p = $("<p></p>");
    $('#fav').css({"background-color":"#80ff80"});
    $('#fav').css({"color":"#111"});
    $('#fav').html("Added to Favourites");
    setTimeout(timer,4000);
}