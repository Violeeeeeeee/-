<?php
session_start();
$id_user = session_id();

$link = mysqli_connect("localhost", "u1825514_test", "218081Rt", "u1825514_test");
mysqli_set_charset($link, "utf8");
//Подключились к базе проверям существует ли ID

// сюда нужно вписать токен вашего бота
define('TELEGRAM_TOKEN', '5118267085:AAGYYDuXL2yWEGPDXhv9YV9ZMawMR7P-dNs');
// сюда нужно вписать ваш внутренний айдишник
define('TELEGRAM_CHATID', '-623079684');