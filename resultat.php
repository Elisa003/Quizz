<?php
require_once "includes/functions.php";
session_start();
$bdd = getDb();
$themeId = $_GET['id1'];
$diffId = $_GET['id2'];
$requete = $bdd->prepare('select * from UTILISATEUR where login=?');
$requete->execute(array($_SESSION['login']));
$utilisateur = $requete->fetch();
$elements = $_SESSION['liste_elements'];
$total = 0;
//calcul du score
foreach ($elements as $idQ)
{
  $question = getQuestion($idQ, $themeId, $bdd);
  $name = "reponse".$idQ;
  $reponse = $_POST[$name];
  if ($question['type'] != "qcm")
  {
    if ($reponse == $question['reponse_vraie'])
    {
      $total += 1;
    }
  }
  else 
  {
    if ($reponse == "reponse_vraie")
    {
      $total += 1;
    }
  }
}
//mise à jour de la base de données dans le cas où le score est un nombre de points
$requete = $bdd->prepare('select * from GAGNE where id_theme=? and id_difficulte=? and id_utilisateur=?');
$requete->execute(array($themeId, $diffId, $utilisateur['id_utilisateur']));
$scores = $requete->fetch();
$requete = $bdd->prepare('select count(id_utilisateur) from GAGNE where id_theme=? and id_difficulte=? and id_utilisateur=?'); //là il doit y avoir
$nbScores = $requete->execute(array($themeId, $diffId, $utilisateur['id_utilisateur']));//moyen de faire autrement, mais sinon j'avais des erreurs
if ($nbScores == 1)
{
  if (is_null($scores['temps']))
  {
    if ($total > $scores['points'])
    {
      $requete = $bdd->prepare('update GAGNE set points=? where id_theme=? and id_difficulte=? and id_utilisateur=?');
      $requete->execute(array($total, $themeId, $diffId, $utilisateur['id_utilisateur']));
    }
  }
}
else
{
  $requete = $bdd->prepare('INSERT INTO GAGNE (points, id_theme, id_difficulte, id_utilisateur) values (?,?,?,?)');
  $requete->execute(array($total, $themeId, $diffId, $utilisateur['id_utilisateur']));
}

?>
<?php include("includes/header.php");?>
resultat=<?=$total?>
<?php include("includes/footer.php");?>