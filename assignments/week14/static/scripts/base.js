var page = 1;
var running = false;

function pageLoad() {
  document.getElementById('search').addEventListener('keydown', search);
  getGifs();
}

function getGifs() {
  if (running) { return }
  running = true;
  var container = $('#gifs-container');
  var search = $('#search').val();
  var params = {page: page++};
  if (search) {
    params['q'] = search;
  }

  $.get('search.php', params, function(data) {
    if (data) {
      data.forEach(function(gif) {
        container.append(`<img class="gif" alt="${gif['alt']}" src="${gif['url']}">`);
      });
    }
    running = false;
  });
}

function search (event) {
  console.log('search');
  if (event.keyCode == 13) {
    page = 1;
    var container = $('#gifs-container');
    while (container.children().length > 0) {
      container.children().first().remove();
    }
    getGifs();
  }
}

function autoload (event) {
  if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight) {
    getGifs();
  }
}

window.addEventListener('load', pageLoad);
window.addEventListener('scroll', autoload);
