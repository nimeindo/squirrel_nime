function getListGenre(KeyListGenre){
    // $('#getDetailListFooter').submit();
    var baseUrl = $("#baseUrl").val();
    var url = baseUrl+"Anime/SearchGenre?KeyG="+KeyListGenre;
    location.replace(url);
}

function getPageGenre(PageNumber,KeywordGenre){
    var baseUrl = $("#baseUrl").val();
    var url = baseUrl+"genre/"+KeywordGenre+'/pages/'+PageNumber;
    location.replace(url);
}