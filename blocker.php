<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

$listofallowed = array("AS132199 Globe Telecom Inc.","AS4775 Globe Telecoms","AS9299 Philippine Long Distance Telephone Company");

$org = $details->org;
$cncode = $details->country;


if(in_array($org,$listofallowed) || $cncode == "PH"){
//echo "<title>Allowed</title>Allowed";
}else{
http_response_code(404);
die("<h1>404 Not Found</h1>The page that you have requested could not be found.");
}
?>
