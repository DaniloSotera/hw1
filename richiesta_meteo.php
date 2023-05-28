<?php
    
    //lat e lon per Troina
    $lat = '37.7852205';
    $lon = '14.6004464';
    $key = '2e7760fde61f5ae14cdee8e3a1772f20';
    $dati = array('lat' => $lat, 'lon' => $lon, 'appid' => $key, 'units' => 'metric');
    //provo per una sola data poi ciclo con un for
    $pass = http_build_query($dati);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'http://api.openweathermap.org/data/2.5/forecast?'.$pass);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);    
    $result = curl_exec($curl);
    curl_close($curl); 
    echo $result; // temperatura entro i 40 giorni
?>
    