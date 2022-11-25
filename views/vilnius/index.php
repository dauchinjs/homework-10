<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vilnius Weather</title>
</head>

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