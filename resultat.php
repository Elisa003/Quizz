<?php
require_once "includes/functions.php";
session_start();
$bdd = getDb();

$dateFin = time();
$dateDebut = $_SESSION['date_debut'];
$deltaTemps = $dateFin - $dateDebut;

$themeId = $_GET['id1'];
$diffId = $_GET['id2'];

$requete = $bdd->prepare('select * from DIFFICULTE where id_difficulte=?');
$requete->execute(array($diffId));
$difficulte = $requete->fetch(); //soucis ici ça renvoyait un tableau, et avec le (int) ça renvoie 1
$nbQuest = $difficulte['nb_questions'];

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
$scoreTemps = ($total == $nbQuest);
//récupération du score précédent
$requete = $bdd->prepare('select * from GAGNE where id_theme=? and id_difficulte=? and id_utilisateur=?');
$requete->execute(array($themeId, $diffId, $utilisateur['id_utilisateur']));
$scores = $requete->fetch();

$requete = $bdd->prepare('select * from GAGNE where id_theme=? and id_difficulte=? and id_utilisateur=?'); //là il doit y avoir
$requete->execute(array($themeId, $diffId, $utilisateur['id_utilisateur']));//moyen de faire autrement, mais sinon j'avais des erreurs
$nbScores = $requete->rowCount();

//echo "tests : ";
//echo "utilisateur : " .$utilisateur['id_utilisateur'];
//echo "/ nbscore : " .$nbScores;

if($scoreTemps)
//mise à jour de la base de données dans le cas où le score est un temps
{
  $score = $deltaTemps;
  if ($nbScores == 1) //s'il y a déjà un score
  {
    if (is_null($scores['temps'])) //et que c'est un temps
    {
      if ($score < $scores['temps'])
      {
        $requete = $bdd->prepare('update GAGNE set temps=? where id_theme=? and id_difficulte=? and id_utilisateur=?');
        $requete->execute(array($score, $themeId, $diffId, $utilisateur['id_utilisateur']));
      }
    }
    else //et que c'est un nombre de points
    {
      $requete = $bdd->prepare('update GAGNE set temps=? and points=NULL where id_theme=? and id_difficulte=? and id_utilisateur=?');
      $requete->execute(array($score, $themeId, $diffId, $utilisateur['id_utilisateur']));
    }
  }
  else //s'il n'y a pas de score
  {
    $requete = $bdd->prepare('INSERT INTO GAGNE (temps, id_theme, id_difficulte, id_utilisateur) values (?,?,?,?)');
    $requete->execute(array($score, $themeId, $diffId, $utilisateur['id_utilisateur']));
  }
}
else
//mise à jour de la base de données dans le cas où le score est un nombre de points  
{
  $score = $total;
  if ($nbScores == 1) //s'il y a déjà un score
  {
    if (is_null($scores['temps'])) //et que c'est un nombre de points
    {
      if ($score > $scores['points'])
      {
        $requete = $bdd->prepare('update GAGNE set points=? where id_theme=? and id_difficulte=? and id_utilisateur=?');
        $requete->execute(array($score, $themeId, $diffId, $utilisateur['id_utilisateur']));
      }
    }
  }
  else //s'il n'y a pas de score
  {
    $requete = $bdd->prepare('INSERT INTO GAGNE (points, id_theme, id_difficulte, id_utilisateur) values (?,?,?,?)');
    $requete->execute(array($score, $themeId, $diffId, $utilisateur['id_utilisateur']));
  }
}

?>
<?php include("includes/header.php");?>
Resultat :</br>
<?php
if ($scoreTemps)
{
  $secondes = $score % 60;
  $minute = $score / 60;
  echo $minute.' minute et '.$secondes.' secondes';
}
else
{
  echo $score.' / '.$nbQuest;
}
?>
<?php include("includes/footer.php");?>