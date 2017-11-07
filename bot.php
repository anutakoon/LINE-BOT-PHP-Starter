$bot = new \LINE\LINEBot(new CurlHTTPClient('uBiUUhIHsyf+CY+2JjrhO3h9yHO4pdwXCxQNoSPGfD9intmHZnOT02braDpML9FLVul5d4h4mJ+l087NGMwlp63l95j+3yhI3+gtWCScIjc84nazZsliAjUrW23CMRDL9DKcIvKjaH4Mm2u6r9Ri2gdB04t89/1O/w1cDnyilFU='), [
    'channelSecret' => '63e60233af3a57edc4d6ee3a71b9ee16'
]);

$res = $bot->getProfile('user-id');
if ($res->isSucceeded()) {
    $profile = $res->getJSONDecodedBody();
    $displayName = $profile['displayName'];
    $statusMessage = $profile['statusMessage'];
    $pictureUrl = $profile['pictureUrl'];
}
