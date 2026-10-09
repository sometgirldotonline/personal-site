<?php

$url = 'https://www.youtube.com/channel/UCbJ7o5Sa1QVMAwqO9wxNS3A/live';

$channelId = 'YOUR_CHANNEL_ID';


$ch = curl_init($url);

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_MAXREDIRS      => 10,
    CURLOPT_USERAGENT      => 'Mozilla/5.0',
    CURLOPT_TIMEOUT        => 15,
    CURLOPT_ENCODING       => '',
]);

$html = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($html === false || $httpCode >= 400) {
    http_response_code(502);
    exit('Unable to fetch the YouTube page.');
}

libxml_use_internal_errors(true);

$dom = new DOMDocument();
$dom->loadHTML($html);

$xpath = new DOMXPath($dom);

$canonicalNodes = $xpath->query(
    '//link[
        translate(@rel, "ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz")
        = "canonical"
    ]'
);

$canonicalUrl = null;

if ($canonicalNodes !== false && $canonicalNodes->length > 0) {
    $canonicalUrl = html_entity_decode(
        $canonicalNodes->item(0)->getAttribute('href'),
        ENT_QUOTES | ENT_HTML5,
        'UTF-8'
    );
}

$videoId = null;

if ($canonicalUrl !== null) {
    $parts = parse_url($canonicalUrl);

    // Canonical URLs are commonly:
    // https://www.youtube.com/watch?v=VIDEO_ID
    if (!empty($parts['query'])) {
        parse_str($parts['query'], $query);

        if (!empty($query['v'])) {
            $videoId = $query['v'];
        }
    }

    // Also handle canonical URLs such as /live/VIDEO_ID
    if (
        $videoId === null &&
        !empty($parts['path']) &&
        preg_match(
            '~/(?:live|embed|shorts)/([A-Za-z0-9_-]{11})~',
            $parts['path'],
            $matches
        )
    ) {
        $videoId = $matches[1];
    }
}

if (
    $videoId === null ||
    !preg_match('/^[A-Za-z0-9_-]{11}$/', $videoId)
) {
    http_response_code(404);
    exit('Stream is offline. Subscribe to Lily <a href="https://youtube.com/@sometgirldotonline" target=_top>here</a>');
}

$origin = 'https://sometgirl.online';

$embedUrl = 'https://www.youtube.com/embed/'
          . rawurlencode($videoId)
          . '?origin=' . rawurlencode($origin)
          . '&enablejsapi=1';
header('Location: ' . $embedUrl);
exit;
