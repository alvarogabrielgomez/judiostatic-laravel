// Get the modal
var modal = document.getElementById('modalwindow');

// Get the button that opens the modal
btn = document.getElementsByClassName("modaltrigger");


// When the user clicks the button, open the modal 
for (var i=0; i < btn.length; i++) {
  btn[i].onclick = function(){
    modal.style.display = "block";
  }
}


