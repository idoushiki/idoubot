<?php
require "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

$consumerKey = "XYZdi0idjIbQdUoxgfjDbTg4S";
$consumerSecret = "xjBnoIWEQ0d3dxKkiotjxQPctseUqI1wU4Zi3V2sYie840iren";
$accessToken = "931348000374267905-5s9XPcFogVpJiMJGlYpLv9obEZPeBf3";
$accessTokenSecret = "kFl9FFCLKwS5dAkKdZSNLujJODNdzZWM1sZJZ9v2bA7Rm";

$twitter = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

/*

$html=file_get_contents("");
$sei=json_decode($html,true);
$name=$sei["Tickers"][0]["PairName"];
$seii=$sei["Tickers"][0]["Last"];


echo $name;
echo sprintf("%.10f",$seii);
echo '<br>';
require_once("php/phpQuery-onefile.php");
$ht=file_get_contents("https://www.coinhouse.eu/markets/neetbtc");
echo phpQuery::newDocument($ht)->find("body")->find(".container-fluid")->find(".col-xs-24")->find(".box-header-middle")->find("h4")->text();
*/
/*

require_once('crtxt.php');
$string=' ';
$betxt="。";
while($betxt=="。"){
$summarizer = new MarkovChainSummarizer;
$betxt=$summarizer->summarize($string, 2);
}
*/


$result = $twitter->post(
        "statuses/update",
        array("status" => $betxt)
);

if($twitter->getLastHttpCode() == 200) {
    // ツイート成功
    print "tweeted\n";
} else {
    // ツイート失敗
    print "tweet failed\n";
}
?>
