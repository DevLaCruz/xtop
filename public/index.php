<?php

require_once "../vendor/autoload.php";

use Xtop\HttpNotFoundException;
use Xtop\Router;

$router = new Router();
$router->get('/test', function () {
    return 'GET OK';
});

$router->post('/test', function () {
    return 'POST OK';
});

try {
    $action = $router->resolve();
    print($action);
} catch (HttpNotFoundException $e) {
    print('Not Found');
    http_response_code(404);
}

$action = $router->resolve();
print($action());

echo '<pre>';
var_dump($router);
echo '</pre>';
