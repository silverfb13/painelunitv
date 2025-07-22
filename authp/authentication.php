<?php
include 'AES256.php';

$passphrase = "ertytredcvfbgyhtfrfgtnytgfnvbngmhjgnf";

$responsh = $_GET['e'];
$aa = \mervick\aesEverywhere\AES256::decrypt($responsh, $passphrase);
$ab = file_get_contents('https://SeuPainelAqui/htv/api/authentication.php?e='.$aa);
echo $ab;

//Developer STLC