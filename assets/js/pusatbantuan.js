$(document).ready(function(){
  $('#sendPusatBantuan').submit(function(){
    var base_url= $('#baseUrl').val();
    var form = $('#sendPusatBantuan')[0];
		// Create an FormData object 
    var datas = new FormData(form);   
    $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        url: base_url+"pusat-bantuan/send-mail", 
        data: datas,
        beforeSend: loadStart,
        complete: loadStop,
    })
    .done(function(data){
      $('#message').val("");
      $('#email').val("");
      swal({
        title: data,
        text: data,
        icon: "success",
      });
      
    })
    .fail(function(data) {
        swal({
          // title: 'Email tidak dapat dikirim',
          // text: "Gagal Terkirim",
          title: data,
        text: "Gagal Terkirim",
          icon: "error",
        });
        
         
    });

    return false;

  });
});

function loadStart() {
  $("#Loading").css({"display": "block",
    "visibility": "visible",
    "position": "absolute",
    "z-index": "995",
    "left": "0px",
    "width": "100%",
    "height": "100%",
    "background-color": "white",
    "vertical-align": "bottom",
    "padding-bottom": "55%",
    "filter": "alpha(opacity=75)",
    "opacity": "0.75",
    "font-size": "large",
    "color": "blue",
    "font-style": "italic",
    "font-weight": "400",
    "background-repeat":" no-repeat",
    "background-attachment": "fixed",
    "background-position": "center"}).show();
 
}
function loadStop() {
  $("#Loading").hide();
}



// max-width: 126px;
//     /* position: fixed; */
//     left: 21px;
//     top: 5px;
//     margin-bottom: 1px;