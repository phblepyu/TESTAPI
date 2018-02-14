<?php
$access_token = 'cRMovxskc6iM9OJuHzA31PWNq63oUAfyB1aG4nGIBGFlsDJsYGcNcICKSF383oQZvv0AiMgCwI6kFzDU6/moas/tF2AGaT7P7firyzz1AXWkKdEQvGqko0E29vcXiLv5InkNm4usEbIMCwjL/Q5s7wdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
