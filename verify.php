<?php
$access_token = 'jITXrS8kODVqVYpvleRFusP8rUvJ4zQjd65ARZ0fsiuJAxojWVdPYgG5bCkOCMrgvv0AiMgCwI6kFzDU6/moas/tF2AGaT7P7firyzz1AXV2Y0fFrdXnsdh6J2CQYFn5WBC/SjRCbN49JkVNCKgLKQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
