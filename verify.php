<?php
$access_token = '9lFzz5MZomgyKWjRKVbd6ZXmK6NKSU7fOFUrYplcIfSRePfI+a98Y1bAf4/ZYPeWwcemIMtMiLE7FcSNx1kXc5yyY2hPABCZlhhTE7reXvDDDvO0iNxxIk31siSfAmiDNce+eLIBqUU/lPFLAxG/OQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
