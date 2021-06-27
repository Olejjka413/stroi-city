<?php
    /* Указываем кодировку */
    header('Content-Type: text/html; charset=utf-8');

    /* имя хоста */
    $server = "localhost"; 
    /* Имя пользователя БД */
    $username = "root"; 
    /* Пароль пользователя */
    $password = ""; 
    /* Имя базы данных */
    $database = "stroi_city"; 
     
    /* Подключение к базе данный через MySQLi */
    $mysqli = new mysqli($server, $username, $password, $database);
 
    /* Проверяем, успешность соединения */
    if (mysqli_connect_errno()) { 
        echo "<p><strong>Ошибка подключения к БД</strong>. Описание ошибки: ".mysqli_connect_error()."</p>";
        exit(); 
    }
 
    /* Устанавливаем кодировку подключения */
    $mysqli->set_charset('utf8');
?>