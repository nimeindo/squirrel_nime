function getPageSearch(PageNumber,KeyWord){
    var baseUrl = $("#baseUrl").val();
    var url = baseUrl+"search/pages/"+PageNumber+"/"+KeyWord;
    location.replace(url);
}

function getPageSearchOngoing(PageNumber){
    var baseUrl = $("#baseUrl").val();
    var url = baseUrl+"anime-ongoing/pages/"+PageNumber;
    location.replace(url);
}