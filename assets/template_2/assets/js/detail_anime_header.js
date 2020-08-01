function getDetailListHeader(KeyListAnim){
    // $('#getDetailListFooter').submit();
    var baseUrl = $("#baseUrl").val();
    var url = baseUrl+"Anime/DetailAnime?KeyListAnim="+KeyListAnim;
    location.replace(url);
}