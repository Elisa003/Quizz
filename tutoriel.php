<!--On arrive ici après l'inscription-->

<?php include("includes/header.php"); ?>

<?php include("includes/carousel.php"); ?>

<?php if (isUserConnected())
    {
        ?>
        TutoTutoTuto

        <a href="index.php">Continuer</a>
        <?php
    }
else
    {
        include("includes/erreur.php");
    }
?>

<?php include("includes/footer.php"); ?>