<?php
//Настройка проекта
require_once ('function.php');
require_once ('mysql_helper.php');
require_once ('data.php');
$user_id = 1;
$connect = mysqli_connect("localhost", "root","","business_is_all_right");
if (!$connect) {
    print("ОШибка подключения". mysqli_connect_error());
}
date_default_timezone_set('Europe/Moscow');
setlocale(LC_ALL, 'ru_RU');