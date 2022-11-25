<?php declare(strict_types=1);

namespace App\Models;

class Weather
{
    private string $locationName;
    private float $temperature;
    private string $weatherDescription;
    private float $windSpeed;

    public function __construct(string $locationName, float $temperature, string $weatherDescription, float $windSpeed)
    {
        $this->locationName = $locationName;
        $this->temperature = $temperature;
        $this->weatherDescription = $weatherDescription;
        $this->windSpeed = $windSpeed;
    }

    public function getLocationName(): string
    {
        return $this->locationName;
    }

    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    public function getWeatherDescription(): string
    {
        return $this->weatherDescription;
    }

    public function getWindSpeed(): float
    {
        return $this->windSpeed;
    }
}
