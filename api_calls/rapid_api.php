<?php
$secret = getSecrets()['rapidAPI'];

$url = $secret['url'];

$headers = [
    'X-RapidAPI-Key' => $secret['X-RapidAPI-Key'],
    'X-RapidAPI-Host' => $secret['X-RapidAPI-Host'],
    'Content-Type' => 'application/json'
];

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$response = json_decode(curl_exec($curl), true);

if (curl_errno($curl)) {
    echo "Error message: " . curl_error($curl);
} else {
    echo $response['message'];
}
