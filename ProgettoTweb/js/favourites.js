var image = [];
var info =[];
var i = 0;

$(document).ready( function(){
    $.get({
        url: 'getUser.php',
        datatype: 'json',
        success: printName
    });
    findFav();
});

function findFav() {
    $.ajax({
        type: "GET",
        url: "findFav.php",
        success: showFav,
        dataType: "json"
    });
}



function changeImg(){
    $('.slide img').attr("src","img/"+image[i]);
    $('#info').empty().html(info[i]);
    if(i < image.length-1){
        i++;
    }else{
        i=0;
    }
    setTimeout("changeImg()",2500);
}

function showFav(json) {
    console.log(json);
    if(json.errMsg) {
        $("#errMsg").show().text(json.errMsg);
    } else {
        let j = 0;
        $('#list').empty().css({"display": "flex", "flex-direction": "column",
                                        "margin-top":"30px"});
        json.cards.forEach(function (item) {
            image[j] = item.art;
            info[j] = item.name+" artwork by "+item.artist;
            let lil = $("<li></li>");
            lil.html(item.name).css({ "color": "#fff"});
            lil.on("click", function () {
                window.location.href = "artworkPage.php?id="+item.id;
            });
            $("#list").append(lil);
            j++;
        });
        if (j===0){

            $('.slideshow').hide();
            $('#info').html("There's no artwork here yet");
        } else {
            changeImg();
        }
    }
}

function printName(json) {
    if (json.isSet) {
        $('#username').text(json.name);
    } else {
        $(window.location).attr('href', 'index.php');
    }

}