<?php

namespace App\Controllers;

use App\WeatherClient;

class VilniusController {
    public function weather() {
        $city = $_GET['city'] ?? 'Vilnius';
        $apiKey = "e6a6d34da4273fdaf713bffd4f494c4e";
        $weatherClient = new WeatherClient($apiKey);
        $weather = $weatherClient->getWeather($city);

        require_once 'views/vilnius/index.php';
    }
}