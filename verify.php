<?php
$access_token = 'uBiUUhIHsyf+CY+2JjrhO3h9yHO4pdwXCxQNoSPGfD9intmHZnOT02braDpML9FLVul5d4h4mJ+l087NGMwlp63l95j+3yhI3+gtWCScIjc84nazZsliAjUrW23CMRDL9DKcIvKjaH4Mm2u6r9Ri2gdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
