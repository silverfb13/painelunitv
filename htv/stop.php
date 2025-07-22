<!-- Developer Studio Live Code -->
<?php


$ipl = real_ip();
$details = json_decode(file_get_contents("https://ipinfo.io/" . $ipl . "/json"));
$country = $details->country;
$state = $details->region;
$city = $details->city;
$isp = $details->org;
$isp = preg_replace("/AS\\d{1,}\\s/", "", $isp);
$loc = $details->loc;
echo "<style>\n@import url(\"https://fonts.googleapis.com/css?family=Share+Tech+Mono|Montserrat:700\");\n\n* {\n    margin: 0;\n    padding: 0;\n    border: 0;\n    font-size: 100%;\n    font: inherit;\n    vertical-align: baseline;\n    box-sizing: border-box;\n    color: inherit;\n}\n\nbody {\n       background-image: url(img/lock.jpg);\n    height: 100vh;\n  background-size: 100% 100%;\n  background-attachment: fixed;\n  background-position: center;\n  background-color: black;\n  background-repeat: no-repeat;}\n\ndiv {\n    background: rgba(0, 0, 0, 0);\n    width: 70vw;\n    position: relative;\n    top: 50%;\n    transform: translateY(-50%);\n    margin: 0 auto;\n    padding: 30px 30px 10px;\n    \n    z-index: 3;\n}\n\nP {\n    font-family: \"\", monospace;\n    color: #f5f5f5;\n    margin: 0 0 20px;\n    font-size: 17px;\n    line-height: 1.2;\n}\n\nspan {\n    color: #1800f0;\n}\n\ni {\n    color: #ffe600;\n}\n\nj {\n    color: #26c91a\n}\n\ndiv a {\n    text-decoration: none;\n}\n\nb {\n    color: #09ff00;\n}\n\na {\n    color: #ff1e00;\n}\n\n@keyframes slide {\n    from {\n        right: -100px;\n        transform: rotate(360deg);\n        opacity: 0;\n    }\n    to {\n        right: 15px;\n        transform: rotate(0deg);\n        opacity: 1;\n    }\n}\n\n</style>\n\n<div>\n<p><span>Message From The BoxBR</span>: <j>\" </j><i>GET YOUR OWN SH!T !!!!!</i><j> \"</j></p>\n<p><a>Access Denied !!! You Do Not Have The Permission To Access !!!</a></p>\n<p>>>>>> <span>Time Of Arrival</span>: <i>";
echo date("d-m-Y H:i:s");
echo "</i></p>\n<p>>>>>> <span>IP Address</span>: <i>";
echo real_ip();
echo "</i></p>\n<p>>>>>> <span>Country</span>: <i>";
echo $country;
echo "</i></p>\n<p>>>>>> <span>State</span>: <i>";
echo $state;
echo "</i></p>\n<p>>>>>> <span>City</span>: <i>";
echo $city;
echo "</i></p>\n<p>>>>>> <span>Location</span>: <i>";
echo $loc;
echo "</i></p>\n<p>>>>>> <span>ISP</span>: <i>";
echo $isp;
echo "</i></p>\n<p>>>>>> <span>Operating System</span>: <i>";
echo get_os();
echo "</i></p>\n<p>>>>>> <span>Browser</span>: <i>";
echo Browser_type();
echo "</i></p>\n<p>>>>>> <span>Device</span>: <i>";
echo get_device();
echo "</i></p>\n<p>>>>>> <span>Tor Browser</span>: <i>";
echo IsTorExitPoint();
echo "</i></p>\n<p>>>>>> <span>@admin</span>:  <i>Logging Session And Recording Ip:</i> <j> \" Completed . . . \"</j></p>\n<p>>>>>> <span>@admin</span>:  <i>Preparing to DDos Recorded Ip:</i> <j>\" Successful . . . \"</j></p>\n<p>>>>>> <span>@admin</span>:  <j>\" </j><a>!!! You Will Be Blacklisted Shortly.... !!!</a><j> \"</j></i></p>\n\n\n\n</div>\n\t\t\n<script>\nvar str = document.getElementsByTagName('div')[0].innerHTML.toString();\nvar i = 0;\ndocument.getElementsByTagName('div')[0].innerHTML = \"\";\n\nsetTimeout(function() {\n    var se = setInterval(function() {\n        i++;\n        document.getElementsByTagName('div')[0].innerHTML = str.slice(0, i) + \"|\";\n        if (i == str.length) {\n            clearInterval(se);\n            document.getElementsByTagName('div')[0].innerHTML = str;\n        }\n    }, 10);\n},0);\n\n\n</script>\n\n";
function real_ip()
{
    $ip = "undefined";
    if (isset($_SERVER)) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else {
            if (isset($_SERVER["HTTP_CLIENT_IP"])) {
                $ip = $_SERVER["HTTP_CLIENT_IP"];
            }
        }
    } else {
        $ip = getenv("REMOTE_ADDR");
        if (getenv("HTTP_X_FORWARDED_FOR")) {
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        } else {
            if (getenv("HTTP_CLIENT_IP")) {
                $ip = getenv("HTTP_CLIENT_IP");
            }
        }
    }
    $ip = htmlspecialchars($ip, ENT_QUOTES, "UTF-8");
    return $ip;
}
function get_os()
{
    $user_agent = $_SERVER["HTTP_USER_AGENT"];
    $os_platform = "Unknown OS Platform";
    $os_array = ["/windows nt 10/i" => "Windows 10", "/windows nt 6.3/i" => "Windows 8.1", "/windows nt 6.2/i" => "Windows 8", "/windows nt 6.1/i" => "Windows 7", "/windows nt 6.0/i" => "Windows Vista", "/windows nt 5.2/i" => "Windows Server 2003/XP x64", "/windows nt 5.1/i" => "Windows XP", "/windows xp/i" => "Windows XP", "/windows nt 5.0/i" => "Windows 2000", "/windows me/i" => "Windows ME", "/win98/i" => "Windows 98", "/win95/i" => "Windows 95", "/win16/i" => "Windows 3.11", "/macintosh|mac os x/i" => "Mac OS X", "/mac_powerpc/i" => "Mac OS 9", "/linux/i" => "Linux", "/ubuntu/i" => "Ubuntu", "/iphone/i" => "iPhone", "/ipod/i" => "iPod", "/ipad/i" => "iPad", "/android/i" => "Android", "/blackberry/i" => "BlackBerry", "/webos/i" => "Mobile"];
    foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $os_platform = $value;
        }
    }
    return $os_platform;
}
function Browser_type()
{
    $user_agent = $_SERVER["HTTP_USER_AGENT"];
    $browser = "Unknown Browser";
    $browser_array = ["/msie/i" => "Internet Explorer", "/Trident/i" => "Internet Explorer", "/firefox/i" => "Firefox", "/safari/i" => "Safari", "/chrome/i" => "Chrome", "/edge/i" => "Edge", "/opera/i" => "Opera", "/netscape/i" => "Netscape", "/maxthon/i" => "Maxthon", "/konqueror/i" => "Konqueror", "/ubrowser/i" => "UC Browser", "/mobile/i" => "Handheld Browser"];
    foreach ($browser_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $browser = $value;
        }
    }
    return $browser;
}
function get_device()
{
    $tablet_browser = 0;
    $mobile_browser = 0;
    if (preg_match("/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i", strtolower($_SERVER["HTTP_USER_AGENT"]))) {
        $tablet_browser++;
    }
    if (preg_match("/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i", strtolower($_SERVER["HTTP_USER_AGENT"]))) {
        $mobile_browser++;
    }
    if (0 < strpos(strtolower($_SERVER["HTTP_ACCEPT"]), "application/vnd.wap.xhtml+xml") || isset($_SERVER["HTTP_X_WAP_PROFILE"]) || isset($_SERVER["HTTP_PROFILE"])) {
        $mobile_browser++;
    }
    $mobile_ua = strtolower(substr($_SERVER["HTTP_USER_AGENT"], 0, 4));
    $mobile_agents = ["w3c ", "acs-", "alav", "alca", "amoi", "audi", "avan", "benq", "bird", "blac", "blaz", "brew", "cell", "cldc", "cmd-", "dang", "doco", "eric", "hipt", "inno", "ipaq", "java", "jigs", "kddi", "keji", "leno", "lg-c", "lg-d", "lg-g", "lge-", "maui", "maxo", "midp", "mits", "mmef", "mobi", "mot-", "moto", "mwbp", "nec-", "newt", "noki", "palm", "pana", "pant", "phil", "play", "port", "prox", "qwap", "sage", "sams", "sany", "sch-", "sec-", "send", "seri", "sgh-", "shar", "sie-", "siem", "smal", "smar", "sony", "sph-", "symb", "t-mo", "teli", "tim-", "tosh", "tsm-", "upg1", "upsi", "vk-v", "voda", "wap-", "wapa", "wapi", "wapp", "wapr", "webc", "winw", "winw", "xda ", "xda-"];
    if (in_array($mobile_ua, $mobile_agents)) {
        $mobile_browser++;
    }
    if (0 < strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "opera mini")) {
        $mobile_browser++;
        $stock_ua = strtolower(isset($_SERVER["HTTP_X_OPERAMINI_PHONE_UA"]) ? $_SERVER["HTTP_X_OPERAMINI_PHONE_UA"] : (isset($_SERVER["HTTP_DEVICE_STOCK_UA"]) ? $_SERVER["HTTP_DEVICE_STOCK_UA"] : ""));
        if (preg_match("/(tablet|ipad|playbook)|(android(?!.*mobile))/i", $stock_ua)) {
            $tablet_browser++;
        }
    }
    if (0 < $tablet_browser) {
        return "Tablet";
    }
    if (0 < $mobile_browser) {
        return "Mobile";
    }
    return "Computer";
}
function IsTorExitPoint()
{
    if (gethostbyname(ReverseIPOctets($_SERVER["REMOTE_ADDR"]) . "." . $_SERVER["SERVER_PORT"] . "." . ReverseIPOctets($_SERVER["SERVER_ADDR"]) . ".ip-port.exitlist.torproject.org") == "127.0.0.2") {
        return "True";
    }
    return "False";
}
function ReverseIPOctets($inputip)
{
    $ipoc = explode(".", $inputip);
    return $ipoc[3] . "." . $ipoc[2] . "." . $ipoc[1] . "." . $ipoc[0];
}

?>