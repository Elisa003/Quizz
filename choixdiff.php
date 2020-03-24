<?php include("includes/header.php");
$themeId = $_GET['id']; ?>
<?php if (isUserConnected())
    {
        ?>
        <?php
    }
else
    {
         include("includes/erreur.php");
    }
?>

<?php include("includes/footer.php"); ?>