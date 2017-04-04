<?php

$doc = new DOMDocument();
$doc->loadHTMLFile('emotes.html');

$links = $doc->getElementsByTagName('a');
$yaml['Title'] = 'BTTV';

foreach ($links as $link) {
	$url = $link->getElementsByTagName('img');
	$url = str_replace('//cdn', 'https://cdn', $url[0]->getAttribute('src'));
	
	$name = $link->getElementsByTagName('h2');
	$name = $name[0]->nodeValue;
	$yaml['emojis'][] = [
	 	'name' => preg_replace("/[^A-Za-z0-9 ]/", '', strtolower($name)),
	 	'src' => $url
	 ];
}

echo yaml_emit($yaml);


