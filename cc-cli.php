<?php
// for CLI stuffs
parse_str(implode('&', array_slice($argv, 1)), $_GET);

// actual script here
$url = 'https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/aud.json';
$jsonVeri = file_get_contents($url);
$data = json_decode($jsonVeri, true);

echo $_GET['aud'].'AUD = ' . $data['aud']['eur'] * floatval($_GET['aud']) . ' EUR';

