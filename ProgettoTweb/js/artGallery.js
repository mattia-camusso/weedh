//Gestione della galleria e caricamento immagini

var limit = 12;
$(document).ready( function () {
    allImages();
    $('.showmore button').on("click", function () {
        limit= limit+20;
        allImages();
    });
});

//carica fino a 'limit' immagini dal db
function allImages() {
    $.ajax({
        type: "GET",
        url: 'cardFound.php',
        data: {limit: limit},
        success: fetchImg,
        dataType: "json"
    });
}

//posiziona le immagini ricevute all'interno del grid-container
function fetchImg(json) {
    console.log(json);
    if(json.errMsg) {
        $("#errMsg").show();
        $("#errMsg").text(json.errMsg);
    } else {
        $(".gallery").empty();
        json.cards.forEach(function (item) {
            let div = $("<div class='gallery-item'></div>");
            let diva = $("<div class='infoz'></div>");
            let divb = $("<div class='infozcont'></div>");
            let p = $("<p></p>");
            p.html(item.name);
            let a = $("<a></a>");
            diva.on("click", function () {
               window.location.href = "artworkPage.php?id="+item.id;
            });
            let img = $("<img alt='not found'>");
            img.attr("src","img/"+item.art);
            a.append(img);
            divb.append(p);
            diva.append(divb);
            div.append(a);
            div.append(diva);
            $(".gallery").append(div);
        });
        if (json.total <= limit){
            $('.showmore button').hide();
        }
    }

}
