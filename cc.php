<html lang="en"><head>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="background.css">
  <title>404 Page Not Found | Lily's Site</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <meta disable-scrolling="" hearts-bg="" root-page="" center-page-contents="" pagetype="404">
</head>

<body>
  <main class="draggable">
    <span class="title">Currency Conversion</span>

    <div class="win-content">
      <div class="area">
        <h1>Currency Conversion for: <? echo $_GET['aud'] ?></h1>
        <p>This page opened in a new tab, to get back to where you were, close this tab.</p>
        <table>
            <thead><td>Currency</td><td>Conversion</td></thead>
            <tbody>
                <tr>NZD</tr><tr></tr>
            </tbody>
      </div>
    </div>
  </main>




</body></html>


<?php

// actual script here
$url = 'https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/aud.json';
$jsonVeri = file_get_contents($url);
$data = json_decode($jsonVeri, true);

echo $_GET['aud'].'AUD = ' . $data['aud']['eur'] * floatval($_GET['aud']) . ' EUR';
