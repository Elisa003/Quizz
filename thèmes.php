<?php include("includes/header.php"); ?>

<?php if (isUserConnected())
    {
        foreach ($themes as $theme) 
            { 
                ?>
                <article>
                    <h3><a class="themes" href="choixdiff.php?id=<?=$theme['id_theme']?>"><?= $theme['libelle'] ?></a></h3>
                </article>
                <?php 
            }
    }
else
    {
         include("includes/erreur.php");
    }
?>

<?php include("includes/footer.php"); ?>