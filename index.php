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

        <?php include("includes/carousel.php"); ?>

            <?php if (isUserConnected())
                    {
                        ?>
                        <a href="#">Voir tous les films</a>
                        <?php
                    }
            ?>

        <?php include("includes/footer.php"); ?>
        <!--TEST pour GIT -->
    </body>

</html>