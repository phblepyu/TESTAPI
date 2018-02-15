<?php
$access_token = 'omUZsqxWgzt/wC8KFJONbC6hOrz4i9mgqAfP+Tkrw37mv/Y9E+lZBHFo60pYFhBdvv0AiMgCwI6kFzDU6/moas/tF2AGaT7P7firyzz1AXXgJzRVUMXHFZizLUq1VeeV5cFYaNq6Ush23Jmdgtz7owdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
