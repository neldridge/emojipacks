<?php

$url = "https://slack.com/api/emoji.list?token=";
$yaml['title'] = "Custom";


$ch = curl_init($url);

curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$contents = curl_exec($ch);
curl_close($ch);

$emoji_response = json_decode($contents);
$emojis = $emoji_response->emoji;

foreach($emojis AS $name => $url){
	if(strpos($url, 'alias') === 0){
		continue;
	}
	$yaml['emojis'][] = [
		'name' => $name,
		'src' => $url
	];
}


echo yaml_emit($yaml);

?>
