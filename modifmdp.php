<?php
require_once "includes/functions.php";
session_start();
$bdd = getDB();

$login = $_SESSION['login'];
$requete = $bdd->prepare('select * from UTILISATEUR where login=?');
$requete->execute(array($login));
$utilisateur = $requete->fetch();

if (!empty($_POST['mdp']) and !empty($_POST['mdp1']) and !empty($_POST['mdp2'])) 
{
    $password = $_POST['mdp'];
    $password1 = $_POST['mdp1'];
    $password2 = $_POST['mdp2'];

    if ($password != $utilisateur['mdp'])
    {
        $error = "Mot de passe actuel erroné";
    }
    elseif ($password1 != $password2)
    {
        $error = "Les deux nouveaux mots de passe sont différents";
    }
    else
    {
        $requete = $bdd->prepare('update UTILISATEUR set mdp=? where id_utilisateur=?');
        $requete->execute(array($password1, $utilisateur['id_utilisateur']));
        redirige("index.php");
    }
}
?>

<?php include("includes/header.php"); ?>

<?php 
if (isUserConnected())
{
    if (isset($error)) 
    {   ?>
        <div class="alert alert-danger">
            <strong>Erreur !</strong> <?= $error ?>
        </div>
        <?php 
    } 
        ?>
        <h2>Modification du mot de passe :</h2>
        <div class="well">
            <form class="form-signin form-horizontal" role="form" action="modifmdp.php" method="post">
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3 col-md-offset-4"><!-- col-md-4">-->
                    <input type="password" name="mdp" class="form-control" placeholder="Entrez votre mot de passe actuel" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3 col-md-offset-4"><!-- col-md-4">-->
                        <input type="password" name="mdp1" class="form-control" placeholder="Entrez votre nouveau mot de passe" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3 col-md-offset-4"><!-- col-md-4">-->
                        <input type="password" name="mdp2" class="form-control" placeholder="Confirmez votre nouveau mot de passe" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3 col-md-offset-4"><!-- col-md-4">-->
                        <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Changer de mot de passe</button>
                    </div>
                </div>
            </form>
        </div>
        <?php
}
else
    {
        include("includes/erreur.php");
    }
?>

<?php include("includes/footer.php"); ?>