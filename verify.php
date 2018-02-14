<?php
$access_token = 'Yz5rtFrX/Tg8iQmp6fIcNsRzZyPnp+JHGPeo/6CkdNzHweNvX0uDHpAoqDqFIDWqvv0AiMgCwI6kFzDU6/moas/tF2AGaT7P7firyzz1AXVMTKeWAUHhEesZ2lLpqQCqzL8WO56Ut7w6I7fpFR3hKgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
