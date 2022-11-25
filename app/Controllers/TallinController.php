<?php

namespace App\Controllers;

use App\WeatherClient;

class TallinController {
    public function weather() {
        $city = $_GET['city'] ?? 'Tallin';
        $apiKey = "e6a6d34da4273fdaf713bffd4f494c4e";
        $weatherClient = new WeatherClient($apiKey);
        $weather = $weatherClient->getWeather($city);

        require_once 'views/tallin/index.php';
    }
}