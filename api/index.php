<?php

ini_set("allow_url_fopen", 1);
header("Content-Type: text/plain");

$key = $_GET["key"];
$hash = $_GET["hash"];

if(!isset($key, $hash)){
	die(":/");
}

$json = file_get_contents("https://osu.ppy.sh/api/get_beatmaps?k={$key}&h={$hash}");
$result = json_decode($json, true)[0];

if(empty($result)){
	echo("-1");
}

// final check
if($result["beatmap_id"]){
	echo($result["beatmap_id"]);
}

/** RIP BLOODCAT
if(isset($index)){
	if(isset($innerkey)) exit($result[$key][$index][$innerkey]);
	exit($result[$key][$index]);
}elseif(isset($version) && $version == "hash"){
	foreach($result["beatmaps"] as $item){
		if($item["hash_md5"] == $hash){
			exit($item["id"]);
		}
	}
}elseif(isset($key)){
	if(!array_key_exists($key, $result)) die("");
	exit($result[$key]);
}else{
	die("");
}
**/ 