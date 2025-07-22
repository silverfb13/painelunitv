<?php

ini_set("display_errors", 0);
ini_set("display_startup_errors", 0);
error_reporting(32767);
$path = "0_playlists.txt";
$rs = file($path);
$rs[0];
$rs[0] = $_SERVER["HTTPS"];
$rs[1] = $_SERVER["HTTP_HOST"];
$rs[2] = $_SERVER["REQUEST_URI"];
$rs[3] = $_SERVER["QUERY_STRING"];
header("Content-Type: application/json");
$get_key = rand(100000, 999999);
$started = microtime(true);
$db23 = new SQLite3("./.ansdb.db");
$re2s = $db23->query("SELECT * FROM theme");
$dat2a = [];
while ($row23 = $re2s->fetchArray()) {
    $dat2a[] = ["name" => $row23["name"], "url" => $row23["url"]];
}
$dat2a1 = json_encode($dat2a);
$dat2a1 = str_replace("\\/", "/", $dat2a1);
$started1 = microtime(true);
$jsondata = file_get_contents("./update.json");
$data = json_decode($jsondata, true);
$json = $data["app_info"];
$android_version_code = $json["android_version_code"];
$apk_url = $json["apk_url"];
$db = new SQLite3("./.ansdb.db");
if (isset($_GET["wifi"])) {
    $address = $_GET["wifi"];
    $address = str_replace("/android", "", $address);
    $address1 = strtoupper($address);
}
if (isset($_GET["lan"])) {
    $address_lan = $_GET["lan"];
    $address_lan = str_replace("/android", "", $address_lan);
    $address2 = strtoupper($address_lan);
}
$lang = file_get_contents("./language.json");
$note = file_get_contents("./note.json");
$date = date("Y-m-d");
$date0 = strtotime($date);
$date1 = strtotime("+7 day", $date0);
$date2 = date("Y-m-d", $date1);
if (isset($_GET["e"])) {
    //$res = $db->query("SELECT * FROM ibo WHERE mac_address=\"" . $address1 . "\"");
    $res = $db->query("SELECT * FROM ibo WHERE mac_address = '" . $address1 . "' OR mac_address = '" . $address2 . "'");
    $actual_date = strtotime(date("Y-m-d"));
    while ($row = $res->fetchArray()) {
        $check_mac = $row["mac_address"];
        $expire_date = $row["expire_date"];
        $key = $row["key"];
        $datetime2 = strtotime($expire_date);
        $check_date = $datetime2 - $actual_date;
    }
    if (empty($check_mac)) {
        $end = microtime(true);
        $difference = $end - $started;
        $queryTime = number_format($difference, 16);

$api = "{\"success\":\"false\"}";
        $apid = "{\"android_version_code\":\"1.0.0\",\"apk_url\":\"\",\"mac_registered\":true,\"urls\":[{\"url\":\"http://no.play\",\"epg_url\":\"\",\"playlist_name\":\"No Playlist\",\"username\":\"demo\",\"password\":\"demo\",\"playlist_type\":\"general\",\"id\":\"0\"}],\"themes\":" . $dat2a1 . ",\"trial_days\":0,\"device_key\":\"" . $get_key . "\",\"is_trial\":0,\"expire_date\":\"2021-11-21\",\"notification\":" . $note . ",\"languages\":[" . $lang . "],\"calc_time\":0.221}";
   } else {
          if ("0" <= $check_date) {
            $data2 = [];
            $db2 = new SQLite3("./.ansdb.db");
           // $res2 = $db2->query("SELECT * FROM ibo WHERE mac_address=\"" . $address1 . "\"");
            $res2 = $db2->query("SELECT * FROM ibo WHERE mac_address = '" . $address1 . "' OR mac_address = '" . $address2 . "'");
            while ($row2 = $res2->fetchArray()) {
                if ($row["type"] == "0") {
               
                    $url_user = $row2["dns"];
                    $username = $row2["username"];
                    $password = $row2["password"];
                } else {

                  //  $playlist_type = "general";
                  //  $url_user = $row2["url"];
                 //   $username = "playlist";
                 //   $password = "playlist";
$url_user = $row2["dns"];
                    $username = $row2["username"];
                    $password = $row2["password"];
                }
               $data2 = ["success" => true,
"server" => $url_user, 
 "username" => $username,
 "password" => $password,
"validity_days" => 999,
 "activecode" => $key
];
            }
            $data1 = json_encode($data2);
            $data1 = str_replace("\\/", "/", $data1);
            $end = microtime(true);
            $difference = $end - $started;
            $queryTime = number_format($difference, 16);
            
           
 
           $api = $data1;
        } else {
        //	$api = "{\"... Sorry!!!\"\"}";
     //   $api = "{"successfalse"}";
     echo "{\"No Wayaaaaa... Sorry!!!\"\"}";
         
        }
    }
} else {
    echo "{\"No Waya33... Sorry!!!\"\"}";
   // $api = "{"success":"false"}";
}
echo $api;

?>