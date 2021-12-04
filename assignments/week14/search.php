<?php
require_once(__DIR__ . '/vendor/giphy-php-client/autoload.php');

define('RATING', 'g');
define('LANGUAGE', 'en');
define('FORMAT', 'json');
define('PAGE_LENGTH', 10);

// giphy php client limits offset to 100
// https://github.com/Giphy/giphy-php-client/blob/dcdf2d87ef03f0421407e3533d064e3dc1828153/lib/Api/DefaultApi.php#L838
define('MAX_OFFSET', 100);

main();

function search($q, $page) {
  $api_instance = new GPH\Api\DefaultApi();
  $key = getenv('GIPHYAPI');

  $offset = ($page - 1) * PAGE_LENGTH;
  if ($offset > MAX_OFFSET) { return; }

  $response = $api_instance->gifsSearchGet(
    $key, $q, PAGE_LENGTH, $offset, RATING, LANGUAGE, FORMAT
  );
  return $response;
}

function trending() {
  $api_instance = new GPH\Api\DefaultApi();
  $key = getenv('GIPHYAPI');

  $response = $api_instance->gifsTrendingGet(
    $key, PAGE_LENGTH, RATING, FORMAT
  );
  return $response;
}

function parse_response($response) {
  $results = [];
  foreach ($response['data'] as $image) {
    $result = [
      'url' => $image['images']['downsized']['url'],
      'alt' => $image['slug']
    ];
    $results[] = $result;
  }
  return $results;
}

function main() {
  $q = $_GET['q'];
  $page = $_GET['page'];

  if (is_null($page)) { $page = 1; }
  if (is_null($q)) {
    if ($page > 1) {
      http_response_code(204);
      return;
    }
    $response = trending();
  } else {
    $response = search($q, $page);
  }

  if (is_null($response)) {
    http_response_code(204);
    return;
  }

  $results = parse_response($response);
  header('Content-Type: application/json');
  echo json_encode($results);
}
?>
