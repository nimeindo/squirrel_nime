function getDetailListAnime(param){
    // $('#getDetailListFooter').submit();
    var baseUrl = $("#baseUrl").val();
    var url = baseUrl+"anime/"+param;
    location.replace(url);
}