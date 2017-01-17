<?php
$access_token = 'RTHZoEvbdM/jqZn3glwyUAGPN/+PhfJo0EaP3S+9VCpvQtY5H94knQM1BaM8w7lWShj5UJCf3ul55GMyuWSl//wINpGJLoPqou8D7pYADBBdYot9gxMlgawDjkmyqvCiEH0esF7SHQwlX3zYOEumXwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
