<?php

// example: https://github.com/onlinetuts/line-bot-api/blob/master/php/example/chapter-01.php

include ('line-bot-api/php/line-bot.php');

$channelSecret = '63e60233af3a57edc4d6ee3a71b9ee16';
$access_token  = 'uBiUUhIHsyf+CY+2JjrhO3h9yHO4pdwXCxQNoSPGfD9intmHZnOT02braDpML9FLVul5d4h4mJ+l087NGMwlp63l95j+3yhI3+gtWCScIjc84nazZsliAjUrW23CMRDL9DKcIvKjaH4Mm2u6r9Ri2gdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
if (!empty($bot->isEvents)) {
		
	$bot->replyMessageNew($bot->replyToken, json_encode($bot->message));

	if ($bot->isSuccess()) {
		echo 'Succeeded!';
		exit();
	}

	// Failed
	echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
	exit();

}
