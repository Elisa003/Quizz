<?php
require_once "includes/functions.php";
$themeId = $_GET['id1'];
$diffId = $_GET['id2'];
$bdd = getDb();
$idQuest = $_SESSION["id_question"]; //PROBLEME : Variable de session pas reconnue :'(

if(isset($_POST["question"]))
{
    $reponse_utilisateur = $_POST["question"];
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