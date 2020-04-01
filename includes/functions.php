<?php

function getDb(){
    // Local deployment
    $server = "localhost";
    $username = "quizz_user";
    $password = "motdepasse";
    $db = "QUIZZ";

    // A VOIR PLUS TARD
    // Deployment on Heroku with ClearDB for MySQL
    /*$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $server = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"], 1);*/
    //try{
        //$bdd=
        return new PDO("mysql:host=$server;dbname=$db;charset=utf8", "$username", "$password",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    //}
    //catch (Exception $e){
      //  die('Erreur fatale :'. $e->getMessage());
    //} 
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

function getQuestion($idQest, $idTheme, $bdd) {
    $requete = $bdd->prepare('select * from QUESTION where id_theme=? and id_question=?');
    $requete->execute($idTheme, $idQuest);
    $question = $requete->fetch();
    return $question;
}

?>