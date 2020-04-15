<?php
require_once "includes/header.php" ;
require_once "includes/functions.php";
$themeId = $_GET['id1'];
$diffId = $_GET['id2'];
$bdd = getDb();
//$idQuest = $_SESSION["id_question"]; //PROBLEME : Variable de session pas reconnue :'(
  //dans l'idée il faudrait qu'on récupère toutes les réponses d'un coup ici, du coup on aurait pas besoin de cette variable de session 
  //car il y aurait plein de questions différentes
if(isset($_POST["reponse[]"]))
{
    $reponse_utilisateur = escape($_POST["reponse[]"]);
    $requete = $bdd->prepare("select reponse_vraie from QUESTION where id_theme= ? and id_question= ?");
    $requete -> execute(array($themeId, $idQuest));
    $reponse_vraie = $requete->fetch();

    if($reponse_utilisateur == $reponse_vraie){
       //bonne réponse
    }
    else{
      //mauvaise réponse
    }
}







?>