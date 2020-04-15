<?php session_start();
include("includes/header.php"); ?>

<?php include("includes/carousel.php"); ?>

<?php if (isUserConnected())
    {
        ?>
        <h4><a href="thèmes.php">Voir tous les thèmes</a></h4>
        <?php
        $login = $_SESSION['login'];
        $bdd = getDb();
        $requete = $bdd->prepare('select droits from UTILISATEUR where login=?');
        $requete->execute(array($login));
        $droits = $requete->fetch();
        if ($droits == "admin")
        {
            ?>
            <h4><a href="quizz_add.php">Ajouter un thème/une question</a></h4>
            <?php
        }
    }
?>

<?php include("includes/footer.php"); ?>