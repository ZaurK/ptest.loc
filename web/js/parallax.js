const fireman = firemancontainer.querySelector("img"),
maxMove = firemancontainer.offsetWidth / 30,
firemanCenterX = fireman.offsetLeft + (fireman.offsetWidth / 2),
firemanCenterY = fireman.offsetTop + (fireman.offsetHeight / 2),
fluidboxer = window.matchMedia("(min-width: 726px)");

function getMousePos(xRef, yRef) {

  let panelRect = firemancontainer.getBoundingClientRect();
  return {
	  x: Math.floor(xRef - panelRect.left) /(panelRect.right-panelRect.left)*firemancontainer.offsetWidth,
	  y: Math.floor(yRef - panelRect.top) / (panelRect.bottom -panelRect.top) * firemancontainer.offsetHeight
    };
}

document.body.addEventListener("mousemove", function(e) {
  let mousePos = getMousePos(e.clientX, e.clientY),
  distX = mousePos.x - firemanCenterX,
  distY = mousePos.y - firemanCenterY;
  if (Math.abs(distX) < 500 && distY < 200 && fluidboxer.matches) {
  fireman.style.transform = "translate("+(-1*distX)/12+"px,"+(-1*distY)/12+"px)";
    firemancontainer.style.backgroundPosition = `calc(50% + ${distX/50}px) calc(50% + ${distY/50}px)`;
  }
})
