<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://lattes.cnpq.br/0041476511097254");
curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1 (+http://www.google.com/bot.html)');

$headers = array();
$headers[] = 'X-Apple-Tz: 0';
$headers[] = 'X-Apple-Store-Front: 143444,12';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
$headers[] = 'Accept-Encoding: gzip, deflate';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'Cache-Control: no-cache';
$headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=utf-8';
$headers[] = 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:28.0) Gecko/20100101 Firefox/28.0';
$headers[] = 'X-MicrosoftAjax: Delta=true';

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);



curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'C:/wamp/www/Curl/tmp/cookies.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, 'C:/wamp/www/Curl/tmp/cookies.txt');

$output = curl_exec($ch);
$info = curl_getinfo($ch);
echo $output;

$command = 'http://buscatextual.cnpq.br/buscatextual/servlet/captcha?metodo=getAudioCaptcha&noCache=' . time() . '+.mp3';
curl_setopt($ch, CURLOPT_URL, $command);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$output = curl_exec($ch);
$info = curl_getinfo($ch);

echo $command;
exec('curl "'.$command.'" -O captcha.mp3');


curl_close($ch);

