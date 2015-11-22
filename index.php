<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://lattes.cnpq.br/0041476511097254");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'C:/wamp/www/Curl/tmp/cookies.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, 'C:/wamp/www/Curl/tmp/cookies.txt');

$output = curl_exec($ch);
$info = curl_getinfo($ch);
//echo $output;

$command = 'http://buscatextual.cnpq.br/buscatextual/servlet/captcha?metodo=getAudioCaptcha&noCache=' . time() . '+.mp3&play';
curl_setopt($ch, CURLOPT_URL, $command);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$output = curl_exec($ch);
$info = curl_getinfo($ch);

exec('curl "'.$command.'" -O captcha.mp3');


curl_close($ch);

