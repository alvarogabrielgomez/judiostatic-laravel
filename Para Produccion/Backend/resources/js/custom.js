var custom = {
toast : function(title, msg, time){
    clearTimeout(1);
        var msgwindow = document.getElementById('toastdiv');
        msgwindow.style.transform = 'translateY(0px)'
        msgwindow.style.opacity = "100";
        msgwindow.querySelector('.toastprogressbar').style.transitionDelay  = '0ms';
        msgwindow.querySelector('.title').style.display = 'block';
        msgwindow.querySelector('.title').innerText = title;
        msgwindow.querySelector('.content').innerHTML = msg;
        msgwindow.querySelector('.toastprogressbar').style.transitionDuration = time+'ms';
        msgwindow.querySelector('.toastprogressbar').style.width = '100%';
        setTimeout(() => {
            msgwindow.style.transform = 'translateY(100px)'
            msgwindow.style.opacity = "0";
            msgwindow.querySelector('.toastprogressbar').style.transitionDelay  = '100ms';
            msgwindow.querySelector('.toastprogressbar').style.transitionDuration = '0ms';
            msgwindow.querySelector('.toastprogressbar').style.width = '0%'; 
        }, time);
    return msg;
},

msg : function(msg, time){
    clearTimeout(1);
    var msgwindow = document.getElementById('toastdiv');
    msgwindow.style.transform = 'translateY(0px)'
    msgwindow.style.opacity = "100";
    msgwindow.querySelector('.toastprogressbar').style.transitionDelay  = '0ms';
    msgwindow.querySelector('.title').style.display = 'none';
    msgwindow.querySelector('.content').innerHTML = msg;
    msgwindow.querySelector('.toastprogressbar').style.transitionDuration = time+'ms';
    msgwindow.querySelector('.toastprogressbar').style.width = '100%';
    setTimeout(() => {
        msgwindow.style.transform = 'translateY(100px)'
        msgwindow.style.opacity = "0";      
        msgwindow.querySelector('.toastprogressbar').style.transitionDelay  = '100ms';
        msgwindow.querySelector('.toastprogressbar').style.transitionDuration = '0ms';
        msgwindow.querySelector('.toastprogressbar').style.width = '0%'; 
    }, time);
return msg;
},


boxtoast : function(title, msg, time, div){
    clearTimeout(1);
    var msgwindow = div;
    msgwindow.style.transform = 'translateY(0px)'
    msgwindow.style.opacity = "100";
    msgwindow.querySelector('.toastprogressbar').style.transitionDelay  = '0ms';
    msgwindow.querySelector('.title').style.display = 'block';
    msgwindow.querySelector('.title').innerText = title;
    msgwindow.querySelector('.content').innerHTML = msg;
    msgwindow.querySelector('.toastprogressbar').style.transitionDuration = time+'ms';
    msgwindow.querySelector('.toastprogressbar').style.width = '100%';
    setTimeout(() => {
        msgwindow.style.transform = 'translateY(-100px)'
        msgwindow.style.opacity = "0";
        msgwindow.querySelector('.toastprogressbar').style.transitionDelay  = '100ms';
        msgwindow.querySelector('.toastprogressbar').style.transitionDuration = '0ms';
        msgwindow.querySelector('.toastprogressbar').style.width = '0%'; 
    }, time);
return msg;
},

boxmsg : function(msg, time, div){
    clearTimeout(1);
    var msgwindow = div;
    msgwindow.style.transform = 'translateY(0px)'
    msgwindow.style.opacity = "100";
    msgwindow.querySelector('.toastprogressbar').style.transitionDelay  = '0ms';
    msgwindow.querySelector('.title').style.display = 'none';
    msgwindow.querySelector('.content').innerHTML = msg;
    msgwindow.querySelector('.toastprogressbar').style.transitionDuration = time+'ms';
    msgwindow.querySelector('.toastprogressbar').style.width = '100%';
    setTimeout(() => {
        msgwindow.style.transform = 'translateY(-100px)'
        msgwindow.style.opacity = "0";
        msgwindow.querySelector('.toastprogressbar').style.transitionDelay  = '100ms';
        msgwindow.querySelector('.toastprogressbar').style.transitionDuration = '0ms';
        msgwindow.querySelector('.toastprogressbar').style.width = '0%'; 
    }, time);
return msg;
},

 getJSON : function(url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.responseType = 'json';
    xhr.onload = function() {
      var status = xhr.status;
      if (status === 200) {
        callback(null, xhr.response);
      } else {
        callback(status, xhr.response);
      }
    };
    xhr.send();
},

}
module.exports = custom;