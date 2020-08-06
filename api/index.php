<?php

ini_set("allow_url_fopen", 1);
header("Content-Type: text/plain");

$hash = $_GET["hash"];
$key = $_GET["key"];
$index = $_GET["index"];
$innerkey = $_GET["innerkey"];
$version = $_GET["version"];
if(!isset($hash)){
	die("");
}

$json = file_get_contents("https://bloodcat.com/osu/?mod=json&q=md5={$hash}");
$result = json_decode($json, true)[0];

if(isset($index)){
	if(isset($innerkey)) exit($result[$key][$index][$innerkey]);
	exit($result[$key][$index]);
}elseif(isset($version) && $version == "hash"){
	$result1 = json_decode($json);
	foreach($result1->beatmaps as $bm){
		if($bm->hash == $hash){
			return $bm->id;
		}
	}
}elseif(isset($key)){
	if(!array_key_exists($key, $result)) die("");
	exit($result[$key]);
}else{
	die("");
}
