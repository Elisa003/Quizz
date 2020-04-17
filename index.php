<?php
session_start();
include("includes/header.php");

//si l'utilisateur n'est pas connecté, on lui indique de se connecter pour jouer
if (!isUserConnected()) {
?>
    <h5>Pour commencer à jouer, veuillez vous <a href="inscription.php">inscrire</a></h5>
    <h5>ou vous <a href="connection.php">connecter</a></h5>
<?php
}


include("includes/carousel.php"); ?>
<h5>(possibilités de thèmes)</h5>


<?php if (isUserConnected()) { // si l'utilisateur est connecté, il a accès aux thèmes des quizz
?>
    <h4><a href="thèmes.php">Voir tous les thèmes</a></h4>
    <?php
    $login = $_SESSION['login'];
    $bdd = getDb();
    $requete = $bdd->prepare('select * from UTILISATEUR where login=?');
    $requete->execute(array($login));
    $utilisateurs = $requete->fetch();
    $droits = $utilisateurs['droits'];
    if ($droits == "admin") { //s'il est admin, il peut aussi ajouter un thème/une question
    ?>
        <h4><a href="quizz_add.php">Ajouter un thème/une question</a></h4>
    <?php
    }
    ?>
    <h4><a href="tutoriel.php">Tutoriel</a></h4>
<?php
}
?>

<?php include("includes/footer.php"); ?>