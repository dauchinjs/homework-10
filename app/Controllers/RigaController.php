<?php

namespace App\Controllers;

use App\WeatherClient;

class RigaController {
    public function weather() {
        $city = $_GET['city'] ?? 'Riga';
        $apiKey = "e6a6d34da4273fdaf713bffd4f494c4e";
        $weatherClient = new WeatherClient($apiKey);
        $weather = $weatherClient->getWeather($city);

        require_once 'views/riga/index.php';
    }
}