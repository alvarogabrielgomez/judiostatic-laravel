var custom = {
toast : function(title, msg, time){
        var msgwindow = document.getElementById('toastdiv');
        msgwindow.style.transform = 'translateY(0px)'
        msgwindow.style.opacity = "100";
        msgwindow.querySelector('.title').innerText = title;
        msgwindow.querySelector('.content').innerText = msg;
        setTimeout(() => {
            msgwindow.style.transform = 'translateY(100px)'
            msgwindow.style.opacity = "0";
        }, time);
    return msg;
},

msg : function(msg, time){
    var msgwindow = document.getElementById('toastdiv');
    msgwindow.style.transform = 'translateY(0px)'
    msgwindow.style.opacity = "100";
    msgwindow.querySelector('.title').style.display = 'none';
    msgwindow.querySelector('.content').innerText = msg;
    setTimeout(() => {
        msgwindow.style.transform = 'translateY(100px)'
        msgwindow.style.opacity = "0";
    }, time);
return msg;
},

}
module.exports = custom;