<html lang="en"><head>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="background.css">
  <title>404 Page Not Found | Lily's Site</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <meta disable-scrolling="" hearts-bg="" root-page="" center-page-contents="" pagetype="404">
</head>
<?php
$url = 'https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/aud.json';
$jsonVeri = file_get_contents($url);
$data = json_decode($jsonVeri, true);
?>
<body>
  <main class="draggable">
    <span class="title">Currency Conversion</span>

    <div class="win-content">
      <div class="area">
        <h1>Currency Conversion for: $<?php echo $_GET['aud'] ?> AUD</h1>
        <p>This page opened in a new tab, to get back to where you were, close this tab.</p>
        <table>
            <thead><td>Currency</td><td>Conversion</td></thead>
            <tbody>
                <tr>New Zealand Dollar</tr><tr><?php echo $data['aud']['nzd'] * floatval($_GET['aud'])?></tr>
                <tr>Euros</tr><tr><?php echo $data['aud']['eur'] * floatval($_GET['aud'])?></tr>
                <tr>US Dollar</tr><tr><?php echo $data['aud']['usd'] * floatval($_GET['aud'])?></tr>
                <tr>Great British Pence (prolly not correct xd)</tr><tr><?php echo $data['aud']['gbp'] * floatval($_GET['aud'])?></tr>
                <tr>Russian Rubles</tr><tr><?php echo $data['aud']['rub'] * floatval($_GET['aud'])?></tr>
                <tr>Japanese Yen</tr><tr><?php echo $data['aud']['jpy'] * floatval($_GET['aud'])?></tr>
                <tr>Chinese Yen</tr><tr><?php echo $data['aud']['cny'] * floatval($_GET['aud'])?></tr>
                <tr>Monero</tr><tr><?php echo $data['aud']['xmr'] * floatval($_GET['aud'])?></tr>
                <tr>Etherium</tr><tr><?php echo $data['aud']['eth'] * floatval($_GET['aud'])?></tr>
                <tr>Bitcoin</tr><tr><?php echo $data['aud']['btc'] * floatval($_GET['aud'])?></tr>
            </tbody>
      </div>
    </div>
  </main>




</body></html>
