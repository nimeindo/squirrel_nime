var pushPopup = localStorage.getItem('popupStatus'); 
var token = "";
var firebasePopup = document.getElementById('firebase-popup');

var NotisElem = document.getElementById('notis');
var permission = Notification.permission;
var laravelToken;
var urlSendToken;
var baseUrl = $('#baseUrl').val()
console.log(baseUrl)

console.log('permission: ', permission);
checkPopupStatus();

var main = function() {
    return {
        setup: function(params) {
            laravelToken = params.token;
            urlSendToken = baseUrl+'sendToken';
        }
    }
}

function cancelButton() {
  popupAllowed = false;
  setStatus("dismissed");
  removeElement("popup-subscribe");
}

function checkPopupStatus() {
    var date1 = new Date();
    var date2;
    var popupStatus = localStorage.getItem('popupStatus');
    // popupStatus = null
    if(popupStatus !== null) {
        var jsonPopupStatus = JSON.parse(popupStatus);
        statusDate = jsonPopupStatus.timestamp;
        if(jsonPopupStatus.status === 'dismissed') {
            date2 = new Date(jsonPopupStatus.timestamp);
            var difference = date1.getTime() - date2.getTime();

            var daysDifference = Math.floor(difference/1000/60/60/24);
            difference -= daysDifference*1000*60*60*24;
            
            console.log('difference = ' + daysDifference);
            // console.log('difference = '  daysDifference);
            if(daysDifference >= 3) {
                showPopup();
            }
        }
    }
    else {
        switch(permission) {
            case "default":
                if(pushPopup === null) {
                showPopup();
                }
            break;
            case "granted":
                getToken();
            break;
            case "denied":
                
            break;
        }
    }
}

function setStatus(status) {
    var timestamp = new Date().getTime();
    var popupStatus = {
        status: status,
        timestamp: timestamp
    }
    localStorage.setItem('popupStatus', JSON.stringify(popupStatus));
}

function showPopup(){
    firebasePopup.innerHTML =
    `<div class="popup-subscribe content_center" id="popup-subscribe" >
      <span>
        <div class="pus-box">
          <span>
            <div class="pus-icon">
              <img itemprop="image" alt="img_title" src=`+baseUrl+`assets/img/icon_notification.png /></div>
            <div class="pus-info content_center">
              <span>
                <div class="pus-wording">Daftarkan saya agar mendapatkan info terbaru dari NIMEINDO.TV</div>
                <div class="pus-button">
                  <ul>
                    <li><input type="button" class="btn pus-btn-no" onClick="cancelButton()" value="Tidak"></li>
                    <li><input type="button" class="btn pus-btn-yes" onClick="allowButton()" value="Ya"></li>
                  </ul>
                </div>
              </span>
            </div>
          </span>
        </div>
      </span>
    </div>`;       
}

function removeElement(id) {
  var element = document.getElementById(id);
  element.parentNode.removeChild(element);
}

function getToken() {
  fbToken = localStorage.getItem('fb-token');

    const config = {
        apiKey: "AIzaSyBaI7jnBSPcf7fD77kM3FVbq3Ymx_Op6rk",
        authDomain: "nimeindo-95d91.firebaseapp.com",
        databaseURL: "https://nimeindo-95d91.firebaseio.com",
        projectId: "nimeindo-95d91",
        storageBucket: "nimeindo-95d91.appspot.com",
        messagingSenderId: "776799558481",
        appId: "1:776799558481:web:b84084ccd527f957d59170",
        measurementId: "G-Y5JR62EVNB"
    };

  //console.log(config)
  firebase.initializeApp(config);

  const messaging = firebase.messaging();
  // Add the public key generated from the console here.
  

  messaging.requestPermission().then(function () {
      // MsgElem.innerHTML = "Notification permission granted."
      
      return messaging.getToken();
  })
  .then(function(token) {
      console.log('token is ', token)
      if(fbToken === null) {
        sendToken(token);
      }
      else {
        if(fbToken !== token) {
          sendToken(token)
        }
      }
  })
  .catch(function (err) {
      document.getElementById("popup-subscribe").style.display = "none";
      console.log("Unable to get permission to notify. ", err);
  });
}

function allowButton() {
    setStatus('allowed');
    getToken();      
    
    document.getElementById("popup-subscribe").style.display = "none";

    const messaging = firebase.messaging();
    messaging.onMessage(function(payload) {
        console.log("Message received. ", payload);
        NotisElem.innerHTML = NotisElem.innerHTML + JSON.stringify(payload) 
    });
}

function sendToken(token) {
  var firebaseToken = token;
  console.log(laravelToken)
  console.log(firebaseToken)
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      }
    });

  $.ajax(urlSendToken, {
        type: 'json',
        crossDomain: true,
        data: {
          token: laravelToken, 
          fbToken: firebaseToken
        },
        method: "POST",
        success: function(data) {
            console.log('Succes data: ', data);
            localStorage.setItem('fb-token', firebaseToken);
        },
        error: function(err) {
            console.log('error send token', err);
        } 
    });

}

