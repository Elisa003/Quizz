<?php include("includes/header.php"); ?>

<?php include("includes/carousel.php"); ?>

<?php if (isUserConnected())
    {
        ?>
        <a href="thèmes.php">Voir tous les films</a>
        <?php
    }
?>

<?php include("includes/footer.php"); ?>