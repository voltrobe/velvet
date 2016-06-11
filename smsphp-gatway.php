<?php
$uid = '9738361083';
$pwd = 'tavor007';
$phone = '9738361084';
$msg = 'hello...!@!';
$provider = 'FullonSMS';

$content = 'uid='.rawurlencode($uid).
'&pwd='.rawurlencode($pwd).
'&phone='.rawurlencode($phone).
'&msg='.rawurlencode($msg).
//'&ck=1'. // Use if you need a user freindly response message.
'&provider='.rawurlencode($provider);

$sms_response = file_get_contents('http://smsapi.cikly.in/index.php?' . $content);

echo $sms_response;
/*
Way2SMS=>140 Characters
Site2SMS=>260 Characters
160By2=>140 Characters
FullonSMS=>140 Characters
Fast2SMS=>130 Characters
SMSFi=>125 Characters
SMSAbc=>148 Characters
FreeSMS8=>136 Characters
SMS440=>440 Characters
Ultoo=>140 Characters
100Nests=>160 Characters
YouMint=>160 Characters
SMSiNeed=>130 Characters
IndyaRocks=>130 Characters
TimesinSMS=>140 Characters
SMSSpark=>140 Characters
Net2Mobiles=>140 Characters
SMSZe=>300 Characters
SMSFunk=>270 Characters
Total160=>140 Characters
*/
?>