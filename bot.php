<?php
 

$strAccessToken = 'jITXrS8kODVqVYpvleRFusP8rUvJ4zQjd65ARZ0fsiuJAxojWVdPYgG5bCkOCMrgvv0AiMgCwI6kFzDU6/moas/tF2AGaT7P7firyzz1AXV2Y0fFrdXnsdh6J2CQYFn5WBC/SjRCbN49JkVNCKgLKQdB04t89/1O/w1cDnyilFU='; 

$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {jITXrS8kODVqVYpvleRFusP8rUvJ4zQjd65ARZ0fsiuJAxojWVdPYgG5bCkOCMrgvv0AiMgCwI6kFzDU6/moas/tF2AGaT7P7firyzz1AXV2Y0fFrdXnsdh6J2CQYFn5WBC/SjRCbN49JkVNCKgLKQdB04t89/1O/w1cDnyilFU=}";
 
if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
}else if($arrJson['events'][0]['message']['text'] == "ชื่ออะไร"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันยังไม่มีชื่อนะ";
}else if($arrJson['events'][0]['message']['text'] == "ethble"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $json_url = "https://api.nanopool.org/v1/eth/user/0x817fb2a01d6d115a84f3abce3261d53294c30517";
  $json = file_get_contents($json_url);
  $json=str_replace('},]',"}]",$json);
  $data = json_decode($json);
  $arrPostData['messages'][0]['text'] = $data->data->balance; 
}
else{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ฉันไม่เข้าใจคำสั่ง";
}
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
 
?>
