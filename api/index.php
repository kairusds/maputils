<?php

ini_set("allow_url_fopen", 1);
header("Content-Type: text/plain");

$hash = $_GET["hash"];
$key = $_GET["key"];
$index = $_GET["index"];
$innerkey = $_GET["innerkey"];
if(!isset($hash) || !isset($key)){
	die("");
}

$json = file_get_contents("https://bloodcat.com/osu/?mod=json&q=md5={$hash}");
$result = json_decode($json, true)[0];
if(!array_key_exists($key, $result)){
	die("");
}

if(isset($index)){
	if(isset($innerkey)) exit($result[$key][$index][$innerkey]);
	exit($result[$key][$index]);
}else{
	exit($result[$key]);
}