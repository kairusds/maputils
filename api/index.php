<?php

ini_set("allow_url_fopen", 1);
header("Content-Type: text/plain");

$hash = $_GET["hash"];
$key = $_GET["key"];
$index = $_GET["index"];
if(!isset($hash) || !isset($key)){
	die("");
}

$json = file_get_contents("https://bloodcat.com/osu/?mod=json&q=md5={$hash}");
$result = json_decode($json, true);
if(!array_key_exists($key, $result)){
	die("");
}

if(isset($index)){
	echo $result[$key][$index];
}else{
	echo $result[key];
}