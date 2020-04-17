<?php
require_once "includes/functions.php";
?>
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
    <!--NAVBAR-->

    <!--Barre de navigation-->
    <nav class="navbar navbar-expand-sm navbar-fixed-top bg-dark navbar-dark justify-content-center">
        <!--Logo-->
        <a class="navbar-brand" href="index.php"><img src="images/quizz.png" width="100px" /></a>
        <!--Nom du site-->
        <a class="navbar-brand" href="index.php">Quizz</a>
        <!--Menu déroulant-->
        <div class="dropdown ml-auto">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Mon Compte
            </button>
            <?php
            //si l'utilisateur est connecté, affichage des fonctionnalités suivantes
            if (isUserConnected()) {
            ?>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <!-- Page des scores -->
                    <a class="dropdown-item" href="messcores.php">Mes scores</a>
                    <!-- Page pour changer son mdp-->
                    <a class="dropdown-item" href="modifmdp.php">Changer de mot de passe</a>

                    <?php
                    $login = $_SESSION['login'];
                    $bdd = getDb();
                    $requete = $bdd->prepare('select * from UTILISATEUR where login=?');
                    $requete->execute(array($login));
                    $utilisateur = $requete->fetch();
                    //Récupération et vérification des droits de l'utilisateur
                    if ($utilisateur['droits'] == "admin") {
                    ?>
                        <!-- s'il est admin, il peut gérer les utilisateurs-->
                        <a class="dropdown-item" href="gestut.php">Gestion des utilisateurs</a>
                    <?php
                    }
                    ?>
                    <!-- Page de déconnexion-->
                    <a class="dropdown-item" href="deconnection.php">Se déconnecter</a>
                </div>
            <?php
            } else {
            ?>
                <!-- Si l'utilisateur n'est pas connecté, page de connexion ou d'inscription-->
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="connection.php">Se connecter</a>
                    <a class="dropdown-item" href="inscription.php">S'inscrire</a>
                </div>
            <?php
            }
            ?>
        </div>
    </nav>

    <!-- jQuery -->
    <script src="lib/jquery-3.4.1.min.js"></script>
    <!-- Popper -->
    <script src="lib/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript Boostrap plugin -->
    <!-- <script src="lib/bootstrap/js/bootstrap.min.js"></script> -->
</body>

</html>