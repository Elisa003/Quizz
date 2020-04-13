<?php
require_once "includes/functions.php";
session_start();
$bdd = getDB();

if (!empty($_POST['login']) and !empty($_POST['mdp1']) and !empty($_POST['mdp2'])) 
{
    $login = $_POST['login'];
    $password1 = $_POST['mdp1'];
    $password2 = $_POST['mdp2'];
    $droits='user';

    $requete = $bdd->prepare("SELECT COUNT(id_utilisateur) FROM UTILISATEUR WHERE login= ?");
    $nbUt = $requete->execute(array($login));

    if (($requete->rowCount()) != 0)
    {
        $error = "Ce login est déjà utilisé";
    }

    elseif ($password1 != $password2)
    {
        $error = "Les deux mots de passe sont différents";
    }

    else
    {
        //insertion de l'utilisateur dans la bdd
        $stmt = $bdd->prepare('INSERT INTO UTILISATEUR (login, mdp, droits) VALUES 
        values (?, ?, ?)');
        $stmt->execute(array($login, $password, $droits));
        $_SESSION['login'] = $login;
        redirige("index.php");
    }
}
?>

<?php include("includes/header.php"); ?>

<?php if (isset($error)) { ?>
            <div class="alert alert-danger">
                <strong>Erreur !</strong> <?= $error ?>
            </div>
        <?php } ?>

        <div class="well">
            <form class="form-signin form-horizontal" role="form" action="inscription.php" method="post">
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <input type="text" name="login" class="form-control" placeholder="Entrez votre login" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <input type="password" name="mdp1" class="form-control" placeholder="Entrez votre mot de passe" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <input type="password" name="mdp2" class="form-control" placeholder="Confirmer votre mot de passe" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> S'inscrire</button>
                    </div>
                </div>
            </form>
        </div>

<?php include("includes/footer.php"); ?>