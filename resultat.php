<?php
session_start();
require_once "includes/functions.php";

$bdd = getDb();

$dateFin = time();
$dateDebut = $_SESSION['date_debut'];
$deltaTemps = $dateFin - $dateDebut;

$themeId = $_GET['id1'];
$diffId = $_GET['id2'];

//Récupération du nombre de questions en fonction de la difficulté
$requete = $bdd->prepare('select * from DIFFICULTE where id_difficulte=?');
$requete->execute(array($diffId));
$difficulte = $requete->fetch();
$nbQuest = $difficulte['nb_questions'];

$requete = $bdd->prepare('select * from UTILISATEUR where login=?');
$requete->execute(array($_SESSION['login']));
$utilisateur = $requete->fetch();
$elements = $_SESSION['liste_elements'];
$total = 0;

//calcul du score
foreach ($elements as $idQ) {
  $question = getQuestion($idQ, $themeId, $bdd);
  $name = 'reponse' . $idQ;
  if (isset($_POST[$name])) {
    $reponse = $_POST[$name];
    if ($question['type'] != "qcm") {
      if ($reponse == $question['reponse_vraie']) {
        $total += 1;
      }
    } else {
      if ($reponse == "reponse_vraie") {
        $total += 1;
      }
    }
  }
}
$scoreTemps = ($total == $nbQuest) and ($deltaTemps < 190);
//récupération du score précédent
$requete = $bdd->prepare('select * from GAGNE where id_theme=? and id_difficulte=? and id_utilisateur=?');
$requete->execute(array($themeId, $diffId, $utilisateur['id_utilisateur']));
$scores = $requete->fetch();

$requete = $bdd->prepare('select * from GAGNE where id_theme=? and id_difficulte=? and id_utilisateur=?'); 
$requete->execute(array($themeId, $diffId, $utilisateur['id_utilisateur']));
$nbScores = $requete->rowCount();

if ($scoreTemps)
//mise à jour de la base de données dans le cas où le score est un temps
{
  $score = $deltaTemps;
  if ($nbScores == 1) //s'il y a déjà un score
  {
    if (!is_null($scores['temps'])) //et que c'est un temps
    {
      if ($score < $scores['temps']) {
        $requete = $bdd->prepare('update GAGNE set temps=? where id_theme=? and id_difficulte=? and id_utilisateur=?');
        $requete->execute(array($score, $themeId, $diffId, $utilisateur['id_utilisateur']));
      }
    } else //et que c'est un nombre de points
    {
      $requete = $bdd->prepare('update GAGNE set temps=? where id_theme=? and id_difficulte=? and id_utilisateur=?');
      $requete->execute(array($score, $themeId, $diffId, $utilisateur['id_utilisateur']));
    }
  } else //s'il n'y a pas de score
  {
    $requete = $bdd->prepare('INSERT INTO GAGNE (temps, id_theme, id_difficulte, id_utilisateur) values (?,?,?,?)');
    $requete->execute(array($score, $themeId, $diffId, $utilisateur['id_utilisateur']));
  }
} else
//mise à jour de la base de données dans le cas où le score est un nombre de points  
{
  $score = $total;
  if ($nbScores == 1) //s'il y a déjà un score
  {
    if (is_null($scores['temps'])) //et que c'est un nombre de points
    {
      if ($score > $scores['points']) {
        $requete = $bdd->prepare('update GAGNE set points=? where id_theme=? and id_difficulte=? and id_utilisateur=?');
        $requete->execute(array($score, $themeId, $diffId, $utilisateur['id_utilisateur']));
      }
    }
  } else //s'il n'y a pas de score
  {
    $requete = $bdd->prepare('INSERT INTO GAGNE (points, id_theme, id_difficulte, id_utilisateur) values (?,?,?,?)');
    $requete->execute(array($score, $themeId, $diffId, $utilisateur['id_utilisateur']));
  }
}

include("includes/header.php");
$requete = $bdd->prepare('select * from theme where id_theme=?');
$requete->execute(array($themeId));
$theme = $requete->fetch();
$nomTheme = $theme['libelle'];

$requete = $bdd->prepare('select * from difficulte where id_difficulte=?');
$requete->execute(array($diffId));
$difficulte = $requete->fetch();
$nomDiff = $difficulte['libelle'];


?>

<h3>Resultat :</h3>
<h5><?= $nomTheme ?> -- <?= $nomDiff ?></h5>

<p>
  <?php
  if ($scoreTemps) {
    $secondes = $score % 60;
    $minute = (int) ($score / 60);
    echo $minute . ' minute et ' . $secondes . ' secondes';
  } else {
    echo $score . ' / ' . $nbQuest;
  }
  ?>
</p>
<?php include("includes/footer.php"); ?>