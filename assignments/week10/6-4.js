function addStyles(e) {
  e.currentTarget.classList.add('phrase');
}

function removeStyles(e) {
  e.currentTarget.classList.remove('phrase');
}

function pageLoad(e) {
  document.querySelectorAll('span').forEach(elem => {
    elem.addEventListener('mouseover', addStyles);
    elem.addEventListener('mouseout', removeStyles);
  });
}

window.addEventListener('load', pageLoad);
