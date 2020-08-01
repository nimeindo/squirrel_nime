function getStreamPlay(params){
    // $('#getStreamPlay').submit();
    var baseUrl = $("#baseUrl").val();
    var url = baseUrl+"streaming/"+params;
    location.replace(url);
    

}

function BtnPlayVideo(IframeSrc){
    valideIframe = $('#videoPlay').attr('src');
    $("#BtnPlayVideo").hide();
    if(valideIframe !== IframeSrc){
        $('#PlayVideoShow').css({'display':'block'});
        $('#videoPlay').attr('src', IframeSrc);
    }else{
        $('#PlayVideoShow').css({'display':'block'});
    }
}
function changeServer(IframeSrc){
    valideIframe = $('#videoPlay').attr('src');
    $("#BtnPlayVideo").hide();
    if(valideIframe !==IframeSrc){
        $('#PlayVideoShow').css({'display':'block'});
        $('#videoPlay').attr('src', IframeSrc);
    }else{
        $('#PlayVideoShow').css({'display':'block'});   
    }
    
}
function serverStreamPlay(iframesrc, idBtn){
    valideIframe = $('#videoPlay').attr('src');
    var server0 = document.getElementById('player-option-0');
    var server1 = document.getElementById('player-option-1');
    var server2 = document.getElementById('player-option-2');
    var server3 = document.getElementById('player-option-3');
    var serverAct = document.getElementById(idBtn);
    // alert(Iframesrc)
    if(valideIframe !== iframesrc){
        $('#videoPlay').attr('src', iframesrc);
        server0.classList.remove("on");
        server1.classList.remove("on");
        server2.classList.remove("on");
        server3.classList.remove("on");
        serverAct.classList.add("on");
    }
}