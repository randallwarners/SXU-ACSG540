const MENU = {
  apple: 0.59,
  orange: 0.49,
  banana: 0.39
};
const TAXRATE = 0.05;

function capitalize(str) {
  words = str.split(' ')
  for (var i = 0; i < words.length; i++) {
    words[i] = words[i].substring(0, 1).toUpperCase() + words[i].substring(1);
  }
  return words.join(' ');
}

function pageLoad(event) {
  var fruitsContainer = document.getElementById('fruits_container');
  var fruitsTemplate = document.getElementById('fruits_template');

  for (var item in MENU) {
    var clone = fruitsTemplate.content.firstElementChild.cloneNode(true);
    var labelText = `${capitalize(item)} ($${MENU[item]})`;
    clone.insertAdjacentText('afterbegin', labelText);
    clone.querySelector('input').setAttribute('value', item);
    clone.addEventListener('change', refreshTotals);
    fruitsContainer.append(clone);
  }

  refreshTotals();
}

function getSubtotal() {
  var fruits = document.getElementsByName('fruits');
  var subtotal = 0;

  for (var i = 0; i < fruits.length; i++) {
      if (fruits[i].checked) {
        subtotal += Number(MENU[fruits[i].value])
      }
  }

  return subtotal;
}

function refreshTotals() {
  var tax = document.getElementById('tax');
  var total = document.getElementById('total');
  var subtotal = document.getElementById('subtotal');
  var subtotalValue = getSubtotal();

  subtotal.innerText = `$${subtotalValue.toFixed(2)}`;
  tax.innerText = `$${(subtotalValue * TAXRATE).toFixed(2)}`;
  total.innerText = `$${(subtotalValue * (1 + TAXRATE)).toFixed(2)}`;
}

window.addEventListener('load', pageLoad);
