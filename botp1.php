<?php
 

$strAccessToken = 'M++qobGMoYBXVxjxuRqar+JvopHgqeTD8K4kLbMQki6fQ4bQ16XMKP/BpH8JMZmDCseYFCfKP/vwb2rsRx2sKMMVtIy4zTjfebOB8FIstJKRGoi254ldGPm1tz7+4vifF49rrnYn+OpDf6l667OAYAdB04t89/1O/w1cDnyilFU='; 

$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {M++qobGMoYBXVxjxuRqar+JvopHgqeTD8K4kLbMQki6fQ4bQ16XMKP/BpH8JMZmDCseYFCfKP/vwb2rsRx2sKMMVtIy4zTjfebOB8FIstJKRGoi254ldGPm1tz7+4vifF49rrnYn+OpDf6l667OAYAdB04t89/1O/w1cDnyilFU=}";
 
if($arrJson['events'][0]['message']['text'] == "ชื่อ"){
   $arrPostData = array();
   $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
   $arrPostData['messages'][0]['type'] = "text";
   $arrPostData['messages'][0]['text'] = $arrJson['events'][0]['source']['userId'];
}
if($arrJson['events'][0]['message']['text'] == "ที่ตั้ง"){
   $arrPostData = array();
   $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
   $arrPostData['messages'][0]['type'] = 'location';
   $arrPostData['messages'][0]['title'] = 'PharmaMix';
   $arrPostData['messages'][0]['address'] ='PharmaMix';
   $arrPostData['messages'][0]['latitude'] = 18.725752;
   $arrPostData['messages'][0]['longitude'] = 98.958495;
}
if($arrJson['events'][0]['message']['text'] == "เป็นไข้"){
   $arrPostData = array();
   $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
   $arrPostData['messages'][0]['type'] = 'template';
   $arrPostData['messages'][0]['altText'] = 'PharmaMix';
   $arrPostData['messages'][0]['template']['type'] = 'buttons';
   $arrPostData['messages'][0]['template']['thumbnailImageUrl'] = 'https://api.reh.tw/line/bot/example/assets/images/example.jpg';
   $arrPostData['messages'][0]['template']['title'] = 'Example Menu';
   $arrPostData['messages'][0]['template']['text'] = 'Please select';
   $arrPostData['messages'][0]['template']['action'] = [
                             {'type' => 'postback',
                            'label' => 'Postback example',
                            'data' => 'action=buy&itemid=123'},
                           {
                           'type' => 'message', 
                            'label' => 'Message example',  
                            'text' => 'Message example'
                           },
                           {
                           'type' => 'uri',  
                            'label' => 'Uri example',  
                            'uri' => 'https://github.com/GoneTone/line-example-bot-php'
                           
                           }
                            ];
 
   $arrPostData['messages'][0]['latitude'] = 18.725752;
   $arrPostData['messages'][0]['longitude'] = 98.958495;
}

else{
  $ques = $arrJson['events'][0]['message']['text'];
  $url = 'http://49.231.234.75/apitest/sibely.php';
  $data = array('field1' => $ques);
  $options = array(
        'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    )
 );
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = $result;
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
