<?php 
    // показать сообщения об ошибках
    error_reporting(E_ALL);

    // установить часовой пояс по умолчанию
    date_default_timezone_set('Europe/Minsk');

    // переменные, используемые для JWT
    $key = "your_secret_key";
    $iss = "https://any-site.org";
    $aud = "https://any-site.com";
    $iat = 1356999524;
    $nbf = 1357000000;
?>