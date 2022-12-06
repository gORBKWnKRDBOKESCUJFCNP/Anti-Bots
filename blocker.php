<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
  $ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
}else{
$ip = $_SERVER['REMOTE_ADDR'];
}
$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

$listofallowed = array("AS132199 Globe Telecom Inc.","AS4775 Globe Telecoms","AS9299 Philippine Long Distance Telephone Company");

$org = $details->org;
$cncode = $details->country;


if(in_array($org,$listofallowed) || $cncode == "PH"){
//echo "<title>Allowed</title>Allowed";
}else{
http_response_code(404);
die("<html><head>
<title>404 Not Found</title>
</head><body>
<h1>Not Found</h1>
<p>The requested URL was not found on this server.</p>
<hr>
<address>Apache/2.4.29 (Ubuntu) Server at www.katakawan.cf Port 80</address>

</body></html>");
}
?>
