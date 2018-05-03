/* FADE */
yourdiv = document.querySelector('.yourdiv');
yourdiv.addEventListener('click', fadeIn(yourdiv, .5);
	
function fadeOut(element, speed) {
  let opacity = 1;
  const timer = setInterval(function () {
    if (opacity <= 0.1) {
      clearInterval(timer);
      element.style.display = 'none';
    }
    element.style.opacity = opacity;
    element.style.filter = `alpha(opacity=${opacity * 100})`;
    opacity -= opacity * 0.1;
  }, speed);
}

function fadeIn(element, speed) {
  let opacity = 0.1;
  element.style.display = 'block';
  const timer = setInterval(function () {
    if (opacity >= 1){ clearInterval(timer) }
    element.style.opacity = opacity;
    element.style.filter = `alpha(opacity=${opacity * 100})`;
    opacity += opacity * 0.1;
  }, speed);
}

