function getPageHome(PageNumber){
    var baseUrl = $("#baseUrl").val();
    var url = baseUrl+"pages/"+PageNumber;
    location.replace(url);
}