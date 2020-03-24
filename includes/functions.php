<?php

function getDb(){
    // Local deployment
    $server = "localhost";
    $username = "quizz_user";
    $password = "user";
    $db = "QUIZZ";

    // A VOIR PLUS TARD
    // Deployment on Heroku with ClearDB for MySQL
    /*$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"], 1);*/

    return new PDO("mysql:host=$server;dbname=$db;charset=utf8", "$username", "$password",
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

function isUserConnected() {
    return isset($_SESSION['login']);
}

function escape($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
}

function redirige($url) {
    header("Location: $url");
}

?>