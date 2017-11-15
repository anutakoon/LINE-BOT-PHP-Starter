<?php
$access_token = 'uBiUUhIHsyf+CY+2JjrhO3h9yHO4pdwXCxQNoSPGfD9intmHZnOT02braDpML9FLVul5d4h4mJ+l087NGMwlp63l95j+3yhI3+gtWCScIjc84nazZsliAjUrW23CMRDL9DKcIvKjaH4Mm2u6r9Ri2gdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
$message_send = "";
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
		
			if (strpos(  $event['message']['text'], 'logout' ) !== false ) ) {
				$agentcode = str_replace("logout","", $event['message']['text']);
				$urlLogout = 'http://www.apifixit.psisat.com/ARMJsonWcfService/GetAgents.svc/api/agentlogout/001a';
				$dataLogout = [
				];
				$postLogout = json_encode($dataLogout);
				$headersLogout = array('Content-Type: application/json');
				$chLogout = curl_init($urlLogout);
				curl_setopt($chLogout, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($chLogout, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($chLogout, CURLOPT_POSTFIELDS, $postLogout);
				curl_setopt($chLogout, CURLOPT_HTTPHEADER, $headersLogout);
				curl_setopt($chLogout, CURLOPT_FOLLOWLOCATION, 1);
				$resultLgout = curl_exec($chLogout);
				curl_close($chLogout);
				$message_send = $resultLgout;
							echo $resultLgout . "\r\n";

			}
			
// 			else
// 			{
			// Get text sent
			$text = $event['source']['userId'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			// Build message to reply back
			if($message_send == "")
			{
			$message_send = $event['message']['text'];//"สวัสดี User ID ของคุณ คือ ".$text;	
			}
			$messages = [
				'type' => 'text',
				'text' => $message_send//"สวัสดี User ID ของคุณ คือ ".$text
			];
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
							echo $result . "\r\n";

// 			}
			
		}
	}
}
echo "OK";
