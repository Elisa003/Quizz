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

    <body>
        <?php include("includes/header.php"); ?>

            <div class="container">
                <form method="POST" action="#">
                    <label for="login">Login :</label><br/>
                    <input type="text" name="login" size="17" /><br/>
                    <label for="mdp">Mot de passe :</label><br/>
                    <input type="password" name="mdp" size="17" /><br/><br/>
                    <input type="submit" value="Envoyer">
                </form>
            </div>

        <?php include("includes/footer.php"); ?>
        <!--TEST pour GIT -->
    </body>

</html>