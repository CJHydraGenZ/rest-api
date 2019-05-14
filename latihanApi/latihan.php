<?php
// yang pertama
// yang pertama
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCr5pqBaprZyVeuprCGfrTGg&key=AIzaSyBGP88OUGHZj3_l35HQP30p-BCFWX_Wj-w');

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result =  curl_exec($curl);
curl_close($curl);
$result = json_decode($result, true);

var_dump($result);


// $youtubeprofile = $result['items'][0]['snippet']['thambnails']['medium']['url'];

// $curl = curl_init("https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCr5pqBaprZyVeuprCGfrTGg&key=AIzaSyBGP88OUGHZj3_l35HQP30p-BCFWX_Wj-w");
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
// $exec = curl_exec($curl);
// $result = json_decode($exec, true);


// echo $result;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <div class="poto">
        <img src=" " alt="" width="100">
    </div>


    <script src="script.js"></script>
</body>

</html>