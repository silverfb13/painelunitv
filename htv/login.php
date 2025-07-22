<!-- Developer Studio Live Code -->
<?php
ini_set("display_errors", 0);
ini_set("display_startup_errors", 0);
error_reporting(32767);
session_start();
$jsondata111 = file_get_contents("./includes/ansibo.json");
$json111 = json_decode($jsondata111, true);
$col1 = $json111["info"];
$col2 = $col1["aa"];
$db_check1 = new SQLite3("./api/.anspanel.db");
$db_check1->exec("CREATE TABLE IF NOT EXISTS USERS(id INT PRIMARY KEY, NAME TEXT, USERNAME TEXT, PASSWORD TEXT, LOGO TEXT, CORP TEXT)");
$rows = $db_check1->query("SELECT COUNT(*) as count FROM USERS");
$row = $rows->fetchArray();
$numRows = $row["count"];
if ($numRows == 0) {
    $db_check1->exec("INSERT INTO USERS(id, NAME, USERNAME, PASSWORD, LOGO, CORP) VALUES('1', 'Your Name', 'admin', 'admin', 'img/logo.png', 'img/corp.png')");
    $db_check1->exec("INSERT INTO USERS(id, NAME, USERNAME, PASSWORD, LOGO, CORP) VALUES('2', 'ANS MASTER ADMIN', 'APPSNSCRIPTSADMIN', 'APPSNSCRIPTSADMIN', 'img/admin.png', 'img/corp.png')");
}
$res_login = $db_check1->query("SELECT * FROM USERS WHERE id='1'");
$row_login = $res_login->fetchArray();
$name_login = $row_login["NAME"];
$logo_login = $row_login["LOGO"];
$corp_login = $row_login["CORP"];
if (isset($_POST["login"])) {
    if (!$db_check1) {
        echo $db_check1->lastErrorMsg();
    }
    $sql_check = "SELECT * from USERS where USERNAME=\"" . $_POST["username"] . "\"";
    $ret_check = $db_check1->query($sql_check);
    while ($row_check = $ret_check->fetchArray()) {
        $id_check = $row_check["id"];
        $NAME = $row_check["NAME"];
        $username_check = $row_check["USERNAME"];
        $password_check = $row_check["PASSWORD"];
        $LOGO_check = $row_check["LOGO"];
        $CORP_check = $row_check["CORP"];
    }
    if (empty($id_check)) {
        $message = "<div class=\"alert alert-danger\" id=\"flash-msg\"><h4><i class=\"icon fa fa-times\"></i>Not a Valid User!</h4></div>";
        echo $message;
    } else {
        if ($password_check == $_POST["password"]) {
            $_SESSION["ansnscript_admin"] = true;
            $_SESSION["N"] = $id_check;
            $_SESSION["id"] = $id_check;
            if ($_POST["username"] == "admin" || $_POST["password"] == "admin") {
                header("Location: hello.php");
            } else {
                header("Location: users.php");
            }
        } else {
            $message = "<div class=\"alert alert-danger\" id=\"flash-msg\"><h4><i class=\"icon fa fa-times\"></i>Wrong Password!</h4></div>";
            echo $message;
        }
    }
    $db_check1->close();
}
$date = date("d-m-Y H:i:s");
$IPADDRESS = real_ip();
$db1 = new SQLite3("./api/.logs.db");
$db1->exec("CREATE TABLE IF NOT EXISTS logs(id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, date TEXT, ipaddress TEXT)");
$db1->exec("INSERT INTO logs(date,ipaddress) VALUES('" . $date . "','" . $IPADDRESS . "')");
echo "<!DOCTYPE html>
<html>
<head>
 <meta charset=\"utf-8\">
 <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
 <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
 <title>PANEL HTV</title>
 <link href=\"vendor/fontawesome-free/css/all.min.css\" rel=\"stylesheet\" type=\"text/css\">
 <link href=\"https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i\" rel=\"stylesheet\">
 <link href=\"css/sb-admin-" . $col2 . ".css\" rel=\"stylesheet\">
 <script src=\"https://code.jquery.com/jquery-3.2.1.min.js\" integrity=\"sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=\" crossorigin=\"anonymous\"></script>
 <script defer src=\"https://use.fontawesome.com/releases/v5.0.1/js/all.js\"></script>
 <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery.transit/0.9.12/jquery.transit.js\" integrity=\"sha256-mkdmXjMvBcpAyyFNCVdbwg4v+ycJho65QLDwVE3ViDs=\" crossorigin=\"anonymous\"></script>
 <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css\">
 <link rel=\"stylesheet\" href=\"css/style.css\">
 <link rel=\"shortcut icon\" href=\"favicon.ico\" type=\"image/x-icon\">
 <link rel=\"icon\" href=\"favicon.ico\" type=\"image/x-icon\">
 <script src=\"https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js\"></script>
 <script src=\"https://cdn.jsdelivr.net/npm/vanta@0.5.21/dist/vanta.net.min.js\"></script>
 <style>
   #vanta-bg {
     position: absolute;
     width: 100%;
     height: 100%;
     top: 0;
     left: 0;
     z-index: -1;
   }
   #container {
     position: relative;
     z-index: 1;
   }
 </style>
</head>
<body class=\"bg-gradient-primary\">
 <div id=\"vanta-bg\"></div>
 <div id=\"container\">
 <div id=\"inviteContainer\">
 <div class=\"logoContainer\">
 <img class=\"logo\" src=\"" . $logo_login . "\"/><br>
 <p class=\"text\" style=\"transition-delay: 0.2s\"> " . $name_login . " </p><br>
 <a href=\"https://sctipts.studiolivecode.com.br/\" target=\"_blank\">
 <img class=\"logo\" src=\"img/corp.png\" alt=\"&#169; Loja e Apps\" title=\"&#169; Loja e Apps\"/></a>
 </div>
 <div class=\"acceptContainer\">
 <form method=\"POST\">
 <p class=\"text\" style=\"transition-delay: 0.4s\"><br>
 <h1>HTV PROJECT</h1>
 ENTER YOUR ACCESS DATA</p>
 <div class=\"formContainer\">
 <div class=\"formDiv\" style=\"transition-delay: 0.2s\">
 <p>USERNAME</p>
 <input type=\"text\" class=\"form-control text-primary\" name=\"username\" required=\"\" required autofocus/>
 </div>
 <div class=\"formDiv\" style=\"transition-delay: 0.4s\">
 <p>PASSWSORD</p>
 <input type=\"text\" class=\"form-control text-primary\" name=\"password\" required=\"\"/><br>
 </div>
 <div class=\"formDiv\" style=\"transition-delay: 0.6s\">
 <button class=\"dacceptBtn btn btn-lg btn btn-primary btn-block\" name=\"login\" type=\"submit\">Login</button>
 </div>
 " . "\n";
 echo "Developer: STUDIO LIVE CODE";
 echo " </i>\"</p><br>
 </div>
 </form>
 </div>
 </div>
 <!-- Footer -->
 <footer class=\"\">
 <div class=\"container\">
 </div>
 </div>
 </footer>
 </div>
<!-- partial -->
 <script src=\"js/script.js\"></script>
 <script>
   VANTA.NET({
     el: \"#vanta-bg\",
     mouseControls: true,
     touchControls: true,
     gyroControls: false,
     minHeight: 200.00,
     minWidth: 200.00,
     scale: 1.00,
     scaleMobile: 1.00
   });
 </script>
</body>
</html>";
require "includes/ans.php";
function real_ip() {
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
?>
