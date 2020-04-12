<?php
require_once "includes/functions.php";
session_start();
$bdd = getDb();
$idUt = $_GET['id'];
$login = $_SESSION['login'];
$requete = $bdd->prepare('select droits from UTILISATEUR where login=?');
$requete->execute(array($login));

if ($requete->fetch() == "admin")
{
    $requete = $bdd->prepare('update UTILISATEUR set droits="admin" where id_utilisateur=?');
    $requete->execute(array($idUt));
}

redirige("index.php");
?>