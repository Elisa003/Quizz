<?php include("includes/header.php"); ?>

<?php include("includes/carousel.php"); ?>

<?php if (isUserConnected())
    {
        ?>
        <h3><a href="thèmes.php">Voir tous les films</a></h3>
        <?php
        $login = $_SESSION['login'];
        $bdd = getDb();
        $requete = $bdd->prepare('select droits from UTILISATEUR where login=?');
        $requete->execute(array($login));
        $droits = $requete->fetch();
        if ($droits == "admin")
        {
            ?>
            <h3><a href="quizz_add.php">Ajouter un thème/une question</a></h3>
            <?php
        }
    }
?>

<?php include("includes/footer.php"); ?>