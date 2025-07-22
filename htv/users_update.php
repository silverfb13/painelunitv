<!-- Developer Studio Live Code -->
<?php


ini_set("display_errors", 0);
ini_set("display_startup_errors", 0);
error_reporting(32767);
$db = new SQLite3("./api/.ansdb.db");
$res = $db->query("SELECT * \r\n\t\t\t\t  FROM ibo \r\n\t\t\t\t  WHERE id='" . $_GET["update"] . "'");
$row = $res->fetchArray();
$id = $row["id"];
$mac_address = $row["mac_address"];
$key = $row["key"];
$expire_date = $row["expire_date"];
$username = $row["username"];
$password = $row["password"];
$dns = $row["dns"];
$epg_url = $row["epg_url"];
$title = $row["title"];
$url = $row["url"];
$type = $row["type"];
if (isset($_POST["submit"])) {
    $we = strtotime($_POST["expire_date"]);
    $ne = date("Y-m-d", $we);
    $address1 = strtoupper($_POST["mac_address"]);
    if ($_POST["type"] == "0") {
        $line = $_POST["dns"] . "/get.php?username=" . $_POST["username"] . "&password=" . $_POST["password"] . "&type=m3u_plus&output=ts";
    } else {
        $line = $_POST["url"];
    }
    $db->exec("UPDATE ibo SET\r\n\tmac_address='" . $address1 . "',\r\n\tkey='" . $_POST["key"] . "',\r\n\texpire_date='" . $ne . "',\r\n\tusername='" . $_POST["username"] . "',\r\n\tpassword='" . $_POST["password"] . "',\r\n\tdns='" . $_POST["dns"] . "',\r\n\tepg_url='" . $_POST["epg_url"] . "',\r\n\ttitle='" . $_POST["title"] . "',\r\n\turl='" . $line . "',\r\n\ttype='" . $_POST["type"] . "'  WHERE   id='" . $_POST["id"] . "'");
    $db->close();
    header("Location: users.php");
}
include "includes/header.php";
echo "        <div class=\"container-fluid\">\n\n          <!-- Page Heading -->\n          <h1 class=\"h3 mb-1 text-gray-800\"> Update User</h1>\n\n              <!-- Custom codes -->\n                <div class=\"card border-left-primary shadow h-100 card shadow mb-4\">\n                <div class=\"card-header py-3\">\n                <h6 class=\"m-0 font-weight-bold text-primary\"><i class=\"fas fa-user\"></i> Edit User</h6>\n                </div>\n                <div class=\"card-body\">\n                        <form method=\"post\">          \n                        <div class=\"form-group \">\n                                    <label class=\"control-label \" for=\"mac_address\">\n                                        <strong>Device ID</strong> \n                                    </label>\n                                    <div class=\"input-group\">\n";
echo "                                        <input type=\"hidden\" name=\"id\" value=\"" . $id . "\">" . "\n";
echo "                                        <input class=\"form-control text-primary\" id=\"description\" name=\"mac_address\" value=\"" . $mac_address . "\" type=\"text\"required/>" . "\n";
echo "                                    </div>\n                                </div>\n                        <div class=\"form-group \">\n                                    <label class=\"control-label \" for=\"key\">\n                                        <strong>Device Key</strong> \n                                    </label>\n                                    <div class=\"input-group\">\n";
echo "                                        <input class=\"form-control text-primary\" id=\"description\" name=\"key\" value=\"" . $key . "\" type=\"text\"required/>" . "\n";
echo "                                    </div>\n                                </div>\n                                <div class=\"form-group \">\n                                    <label class=\"control-label \" for=\"title\">\n                                        <strong>Server Name</strong>\n                                    </label>\n                                    <div class=\"input-group\">\n";
echo "                                        <input type=\"text\" class=\"form-control text-primary\" name=\"title\" value=\"" . $title . "\" id=\"discription\" required/>" . "\n";
echo "                                    </div>\n                                </div>\n \r\n                  <div class=\"form-group\">\n                                    \r\n                              <div>\n   \r\n                              <strong> Select Login Mode for DNS: </strong> \n                                    <select class=\"select form-control type\" id=\"type\" name=\"type\" >\r\n                                        <option value=\"0\" data-value=\"0\" ";
echo $type == "0" ? "selected" : "";
echo ">Use Xtream Codes</option> \r\n\t\t\t\t\t\t\t\t\t    <option value=\"1\" data-value=\"1\" ";
echo $type == "1" ? "selected" : "";
echo ">Use List M3U8</option>\r\n                          </select>\r\n        </div></div>\n                          <div class=\"active2\">\n                                <div class=\"form-group \">\n                                    <label class=\"control-label \" for=\"uls\">\n                                        <strong>URL M3U8</strong>\n                                    </label>\n                                    <div class=\"input-group\">\n";
echo "                                        <input type=\"text\" class=\"form-control text-primary\" name=\"url\" value=\"" . $url . "\" id=\"discription\" />" . "\n";
echo "                                    </div>\n                                </div>\n                            </div>\n                          <div class=\"active1\">\n                                <div class=\"form-group \">\n                                    <label class=\"control-label \" for=\"dns\">\n                                        <strong>DNS</strong>\n                                    </label>\n                                    <div class=\"input-group\">\n";
echo "                                        <input type=\"text\" class=\"form-control text-primary\" name=\"dns\" value=\"" . $dns . "\" id=\"discription\"/>" . "\n";
echo "                                    </div>\n                                </div>\n                                <div class=\"form-group \">\n                                    <label class=\"control-label \" for=\"username\">\n                                        <strong>Username</strong>\n                                    </label>\n                                    <div class=\"input-group\">\n";
echo "                                        <input type=\"text\" class=\"form-control text-primary\" name=\"username\" value=\"" . $username . "\" id=\"discription\" />" . "\n";
echo "                                    </div>\n                                </div>\n                                <div class=\"form-group \">\n                                    <label class=\"control-label \" for=\"password\">\n                                        <strong>Password</strong>\n                                    </label>\n                                    <div class=\"input-group\">\n";
echo "                                        <input type=\"text\" class=\"form-control text-primary\" name=\"password\" value=\"" . $password . "\" id=\"discription\" />" . "\n";
echo "                                    </div>\n                                </div>\n                           </div>\n                                <div class=\"form-group \">\n                                    <label class=\"control-label \" for=\"expire_date\">\n                                        <strong>Expiration</strong>\n                                    </label>\n                                    <div class=\"input-group\">\n";
echo "                                        <input type=\"text\" class=\"form-control text-primary\" name=\"expire_date\" placeholder=\"YYYY-MM-DD\" id=\"datetimepicker\" value=\"" . $expire_date . "\" /> " . "\n";
echo "                                    </div>\n\n                                </div>\n                                <div class=\"form-group \">\n                                    <label class=\"control-label \" for=\"epg_url\">\n                                        <strong>EPG Url</strong>\n                                    </label>\n                                    <div class=\"input-group\">\n";
echo "                                        <input type=\"text\" class=\"form-control text-primary\" name=\"epg_url\" value=\"" . $epg_url . "\" id=\"discription\" />" . "\n";
echo "                                    </div>\n                                </div>\n                                <div class=\"form-group\">\n                                    <div>\n                                        <button class=\"btn btn-success btn-icon-split\" name=\"submit\" type=\"submit\">\n                        <span class=\"icon text-white-50\"><i class=\"fas fa-check\"></i></span><span class=\"text\">Submit</span>\n                        </button>\n                                    </div>\n\n                                </div>\n                            </form>\n                        </div>\n                    </div>\n                </div>\n";
include "includes/footer.php";
echo "    <script>\n\$('#confirm-delete').on('show.bs.modal', function(e) {\n    \$(this).find('.btn-ok').attr('href', \$(e.relatedTarget).data('href'));\n});\n    </script>\n\r\n<script>\r\n//hide activecode form\r\n      \$('.active1').show(); \r\n      \$('.active2').hide(); \r\n\r\n//Show/hide activecode select\r\n\$(document).ready(function(){\r\n  \$('.type').change(function(){\r\n    if(\$('.type').val() < 1) {\r\n      \$('.active1').show(); \r\n      \$('.active2').hide(); \r\n    }else {\r\n      \$('.active2').show(); \r\n      \$('.active1').hide(); \r\n    // document.getElementById(\"activecode\").value = ' ';\r\n    } \r\n  });\r\n  \$('.type').ready(function(){\r\n    if(\$('.type').val() < 1) {\r\n      \$('.active1').show(); \r\n      \$('.active2').hide(); \r\n    }else {\r\n      \$('.active2').show(); \r\n      \$('.active1').hide(); \r\n    // document.getElementById(\"activecode\").value = ' ';\r\n      \r\n    } \r\n  });\r\n});\r\n</script>\r\n\r\n\n\r\n\r\n    <script type=\"text/javascript\">\r\n// @require http://code.jquery.com/jquery-latest.js\r\n// ==/UserScript==\r\ndocument.getElementById(\"description\").addEventListener('keyup', function() { \r\n  var mac = document.getElementById('description').value;\r\n  var macs = mac.split(':').join('');\r\n  macs = chunk(macs, 2).join(':');\r\n  document.getElementById('description').value = macs.toString();\r\n});\r\n\r\nfunction chunk(str, n) {\r\n    var ret = [];\r\n    var i;\r\n    var len;\r\n\r\n    for(i = 0, len = str.length; i < len; i += n) {\r\n       ret.push(str.substr(i, n))\r\n    }\r\n\r\n    return ret\r\n};\r\n    </script>\n</body>\n\n</html>";

?>