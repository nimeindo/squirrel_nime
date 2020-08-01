function getDetailList(slug){
    // $('#getDetailListFooter').submit();
    var baseUrl = $("#baseUrl").val();
    var url = baseUrl+"anime/"+slug;
    location.replace(url);
}