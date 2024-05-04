<?php

function shortenURL($longUrl, $accessToken)
{
    $url = 'https://unelma.io/api/v1/link';
    $data = [
        "type" => "direct",
        "password" => null,
        "active" => true,
        "expires_at" => "2024-05-06",
        "activates_at" => "2024-03-25",
        "utm" => "utm_source=google&utm_medium=banner",
        "domain_id" => null,
        "long_url" => $longUrl,
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'accept: application/json',
        'Content-Type: application/json',
        'Authorization: Bearer ' . $accessToken,
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        return 'Error:' . curl_error($ch);
    } else {
        $responseDecoded = json_decode($response, true);
        if (isset($responseDecoded['link']['short_url'])) {
            return $responseDecoded['link']['short_url'];
        } else {
            return 'Shortened URL not found in the response.';
        }
    }

    curl_close($ch);
}

?>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shorten Url</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h1>Url Shortener</h1>

<form method="post">
        <label for="longUrl">Enter URL: </label>
        <input type="text" name="longURL" id="longURL" autocomplete="off">
        <button class="button-17" name="Shorten" value="Shorten">Shorten</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accessToken = '22|Dcph5XyQtywirg54cB53BT4kVMks4dkvnMoYljRO7221a570';

    $longUrl = $_POST['longURL'];
    $shortUrl = shortenURL($longUrl, $accessToken);

    echo 'The shortened URL: <a href="' . $shortUrl . '">' . $shortUrl . '</a>';
}?>
    </div>
</body>
</html>
