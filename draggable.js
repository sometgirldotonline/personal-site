function dragElement(elmnt) {
    console.log("Making", elmnt, "draggable")
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (elmnt.querySelector(".dragger")) {
    /* if present, the header is where you move the DIV from:*/
    elmnt.querySelector(".dragger").onmousedown = dragMouseDown;
    console.log(elmnt, "drags from", elmnt.querySelector(".dragger"))
  } else {
    /* otherwise, move the DIV from anywhere inside the DIV:*/
    console.log(elmnt, "drags from anywhere within")
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    
    // 1. Capture current visual position BEFORE clearing margins
    const currentLeft = elmnt.offsetLeft;
    const currentTop = elmnt.offsetTop;
    
    // 2. Kill the auto margins completely
    elmnt.style.margin = "0"; 
    
    // 3. Hardcode the position so it does not jump when margins vanish
    elmnt.style.left = currentLeft + "px";
    elmnt.style.top = currentTop + "px";
    
    // Get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
document.addEventListener("DOMContentLoaded",()=>{
    document.querySelectorAll(".draggable").forEach((el)=>{dragElement(el)})
})