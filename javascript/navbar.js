const offCanvas = document.querySelector('.off-canvas');
close=document.querySelector('#close');
hamburger=document.getElementById('hamburger');

// Function to open or close the off-canvas
function openOrClose(){
    offCanvas.style.left = (offCanvas.style.left === '0px') ? '-100%' : '0px';
}

hamburger.addEventListener('click', openOrClose); 
close.addEventListener('click', openOrClose);