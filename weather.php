<?php
header('Content-Type: application/json');

// API anahtarını .env dosyasından veya environment variables'dan al
function getApiKey() {
    // Önce .env dosyasını kontrol et
    if (file_exists('.env')) {
        $env = parse_ini_file('.env');
        if (isset($env['WEATHER_API_KEY'])) {
            return $env['WEATHER_API_KEY'];
        }
    }
    
    // Environment variable'dan kontrol et
    $envKey = getenv('WEATHER_API_KEY');
    if ($envKey) {
        return $envKey;
    }
    
    // GitHub Pages için
    return '3cec6dbe72f74275a1b164154250803'; // Varsayılan anahtar
}

$apiKey = getApiKey();
$apiUrl = "http://api.weatherapi.com/v1/forecast.json?days=7&lang=tr&key=$apiKey";

// Timeout ayarı
ini_set('default_socket_timeout', 10);

try {
    if (isset($_GET['lat']) && isset($_GET['lon'])) {
        // Konumdan hava durumu al
        $lat = $_GET['lat'];
        $lon = $_GET['lon'];
        $apiUrl .= "&q=$lat,$lon";
    } elseif (isset($_GET['city'])) {
        // Şehir ismi ile hava durumu al
        $city = urlencode($_GET['city']);
        $apiUrl .= "&q=$city";
    } else {
        throw new Exception("Geçerli bir şehir veya konum bilgisi girin.");
    }

    // API isteği yap
    $context = stream_context_create([
        'http' => [
            'timeout' => 10 // 10 saniye timeout
        ]
    ]);
    
    $response = @file_get_contents($apiUrl, false, $context);
    
    if (!$response) {
        throw new Exception("API isteği başarısız oldu. Lütfen tekrar deneyin.");
    }

    $data = json_decode($response, true);

    // Eğer API isteğinde hata varsa
    if (isset($data['error'])) {
        throw new Exception("Şehir bulunamadı veya hava durumu bilgisi alınamadı.");
    }

    // Şehir adı
    $cityName = $data['location']['name'];

    // 7 günlük hava tahmini verisini al
    $forecastData = [];
    foreach ($data['forecast']['forecastday'] as $day) {
        $forecastData[] = [
            "date" => date("d M Y", strtotime($day['date'])),
            "temp" => round($day['day']['avgtemp_c']),
            "description" => $day['day']['condition']['text'],
            "icon" => $day['day']['condition']['icon'],
            "wind_kph" => round($day['day']['maxwind_kph']),
            "rain_chance" => $day['day']['daily_chance_of_rain'],
            "rain_mm" => round($day['day']['totalprecip_mm'], 1),
            "humidity" => $day['day']['avghumidity'],
            "hourly" => array_map(function($hour) {
                return [
                    "time" => date("H:i", strtotime($hour['time'])),
                    "temp" => round($hour['temp_c']),
                    "icon" => $hour['condition']['icon'],
                    "description" => $hour['condition']['text']
                ];
            }, array_slice($day['hour'], 0, 24, true))
        ];
    }

    // Sonucu JSON olarak döndür
    echo json_encode(["city" => $cityName, "forecast" => $forecastData]);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(["error" => $e->getMessage()]);
}
