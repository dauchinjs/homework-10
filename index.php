<?php

require_once 'vendor/autoload.php';

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $route) {
    $route->addRoute('GET', '/', ['App\Controllers\RigaController', 'weather']);
    $route->addRoute('GET', '/Riga', ['App\Controllers\RigaController', 'weather']);
    $route->addRoute('GET', '/Vilnius', ['App\Controllers\VilniusController', 'weather']);
    $route->addRoute('GET', '/Tallin', ['App\Controllers\TallinController', 'weather']);
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        [$controller, $method] = $handler;

        $response = (new $controller)->{$method}();

        break;
}

$title = "Weather Report";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
</head>
<h1>
    <?php echo $weather->getLocationName() ?>
</h1>
<body>
<br>
<a href="/Riga">Riga</a> | <a href="/Vilnius">Vilnius</a> | <a
        href="/Tallin">Tallin</a>

<br>

<div>
    <p><?php echo "Temperature in {$weather->getLocationName()} "; ?>
        &#127745 <?php echo "is {$weather->getTemperature()}"; ?> &#127777 </p>
    <p><?php echo "Weather is {$weather->getWeatherDescription()}" ?> &#9925 </p>
    <p><?php echo "Wind speed: {$weather->getWindSpeed()} m/s"; ?>&#127788 </p>
</div>
<br>

<form action="index.php" method="post">
    City: <input type="text" name="city"><br>
    <input type="submit">
</form>
<br>
<div>
    <h2><?php echo $_POST["city"] ?? 'Riga';
        $weather = $weatherClient->getWeather($_POST["city"] ?? 'Riga'); ?></h2>

    <p><?php echo "Temperature in {$weather->getLocationName()} "; ?>&#127745
        <?php echo "is {$weather->getTemperature()}"; ?> &#127777 </p>
    <p><?php echo "Weather is {$weather->getWeatherDescription()}" ?> &#9925 </p>
    <p><?php echo "Wind speed: {$weather->getWindSpeed()} m/s"; ?>&#127788 </p>
</div>
</body>
</html>