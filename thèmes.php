<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <title>Quizz </title>
    </head>

<?php require_once "includes/functions.php"; ?>

    <body>
        <?php include("includes/header.php"); ?>

        <?php if (isUserConnected())
            {
                foreach ($themes as $theme) 
                    { 
                        ?>
                        <article>
                            <h3><a class="themes" href="#"><?= $theme['libelle'] ?></a></h3>
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
    </body>

</html>