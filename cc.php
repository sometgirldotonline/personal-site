<html lang="en"><head>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="background.css">
  <title>Currency Converter</title>
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
                <tr><td>New Zealand Dollar</td><td><?php echo $data['aud']['nzd'] * floatval($_GET['aud'])?></td></tr>
                <tr><td>Euros</td><td><?php echo $data['aud']['eur'] * floatval($_GET['aud'])?></td></tr>
                <tr><td>US Dollar</td><td><?php echo $data['aud']['usd'] * floatval($_GET['aud'])?></td></tr>
                <tr><td>Great British Pence (i dont think i spelled that right xd)</td><td><?php echo $data['aud']['gbp'] * floatval($_GET['aud'])?></td></tr>
                <tr><td>Russian Rubles</td><td><?php echo $data['aud']['rub'] * floatval($_GET['aud'])?></td></tr>
                <tr><td>Japanese Yen</td><td><?php echo $data['aud']['jpy'] * floatval($_GET['aud'])?></td></tr>
                <tr><td>Chinese Yen</td><td><?php echo $data['aud']['cny'] * floatval($_GET['aud'])?></td></tr>
                <tr><td>Monero</td><td><?php echo $data['aud']['xmr'] * floatval($_GET['aud'])?></td></tr>
                <tr><td>Etherium</td><td><?php echo $data['aud']['eth'] * floatval($_GET['aud'])?></td></tr>
                <tr><td>Bitcoin</td><td><?php echo $data['aud']['btc'] * floatval($_GET['aud'])?></td></tr>
            </tbody>
      </div>
    </div>
  </main>




</body></html>
