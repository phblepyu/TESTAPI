<?php
 

$strAccessToken = 'Zd3onnDe8JqbXMaQVLliIEEYQoRCgcTkCt7YglzI4MZCbm/BM5qtTchvRQPbRh6v1jTB6h93X6+ltX5G/sOl9n93BCNvJJRZXCPRCfAoXHa3Mv4hhIjYPK24PD+pHuA6TduJaSXF4/OJBA8joUcXuQdB04t89/1O/w1cDnyilFU=
'; 

$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {Zd3onnDe8JqbXMaQVLliIEEYQoRCgcTkCt7YglzI4MZCbm/BM5qtTchvRQPbRh6v1jTB6h93X6+ltX5G/sOl9n93BCNvJJRZXCPRCfAoXHa3Mv4hhIjYPK24PD+pHuA6TduJaSXF4/OJBA8joUcXuQdB04t89/1O/w1cDnyilFU=
}";
 
 if($arrJson['events'][0]['message']['text'] == "ชื่ออะไร"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = $arrJson['events'][0]['source']['userId'];
}else if($arrJson['events'][0]['message']['text'] == "Ethble"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = file_get_contents('http://49.231.234.79/linebot/ethble.php'); 
}
else if($arrJson['events'][0]['message']['text'] == "ปฏิทิน"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = file_get_contents('http://49.231.234.79/linebot/calendar.php'); 
}
else if($arrJson['events'][0]['message']['text'] == "สถิติเข้าแถว"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = file_get_contents('http://49.231.234.79/linebot/report_line.php'); 
}
else{
  $ques = $arrJson['events'][0]['message']['text'];
  $url = 'http://49.231.234.75/apitest/111.php';
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
