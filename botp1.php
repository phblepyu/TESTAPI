<?php
 

$strAccessToken = 'M++qobGMoYBXVxjxuRqar+JvopHgqeTD8K4kLbMQki6fQ4bQ16XMKP/BpH8JMZmDCseYFCfKP/vwb2rsRx2sKMMVtIy4zTjfebOB8FIstJKRGoi254ldGPm1tz7+4vifF49rrnYn+OpDf6l667OAYAdB04t89/1O/w1cDnyilFU='; 

$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {M++qobGMoYBXVxjxuRqar+JvopHgqeTD8K4kLbMQki6fQ4bQ16XMKP/BpH8JMZmDCseYFCfKP/vwb2rsRx2sKMMVtIy4zTjfebOB8FIstJKRGoi254ldGPm1tz7+4vifF49rrnYn+OpDf6l667OAYAdB04t89/1O/w1cDnyilFU=}";
 
switch ($arrJson['events'][0]['message']['text']) {
  case 'ชื่อ':
    $arrPostData = array();
   $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
   $arrPostData['messages'][0]['type'] = "text";
   $arrPostData['messages'][0]['text'] = $arrJson['events'][0]['source']['userId'];
    break;
  case 'ที่ตั้ง':
    $arrPostData = array();
   $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
   $arrPostData['messages'][0]['type'] = 'location';
   $arrPostData['messages'][0]['title'] = 'PharmaMix';
   $arrPostData['messages'][0]['address'] ='PharmaMix';
   $arrPostData['messages'][0]['latitude'] = 18.725752;
   $arrPostData['messages'][0]['longitude'] = 98.958495;
    break;
  default:
    // code...
    break;
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
