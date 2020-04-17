<?php
session_start();

require_once "includes/functions.php";

$bdd = getDB();

//récupération des informations remplies par l'utilisateur
if (!empty($_POST['login']) and !empty($_POST['mdp1']) and !empty($_POST['mdp2'])) {
    $login = $_POST['login'];
    $password1 = $_POST['mdp1'];
    $password2 = $_POST['mdp2'];
    $droits = 'user'; //initialisation de ses droits à "user"

    $requete = $bdd->prepare("SELECT * FROM UTILISATEUR WHERE login= ?");
    $requete->execute(array($login));
    $nbUt = $requete->rowCount();
    if ($nbUt == 1) {
        $error = "Ce login est déjà utilisé"; //vérification de la validité du login
    } elseif ($password1 != $password2) {
        $error = "Les deux mots de passe sont différents"; //vérification de la validité du mdp
    } else {
        //insertion de l'utilisateur dans la bdd
        $stmt = $bdd->prepare('INSERT INTO UTILISATEUR (login, mdp, droits) VALUES (?, ?, ?)');
        $stmt->execute(array($login, $password1, $droits));
        $_SESSION['login'] = $login;
        redirige("tutoriel.php");
    }
}

include("includes/header.php");
 //si erreur plus haut
if (isset($error)) { ?>
    <div class="alert alert-danger"> 
        <strong>Erreur !</strong> <?= $error ?>
    </div>
<?php } ?>
<h2>Inscription :</h2>
<div class="well">
    <form class="form-signin form-horizontal" role="form" action="inscription.php" method="post">
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3 col-md-offset-4">
                <input type="text" name="login" class="form-control" placeholder="Entrez votre login" required autofocus>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3 col-md-offset-4">
                <input type="password" name="mdp1" class="form-control" placeholder="Entrez votre mot de passe" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3 col-md-offset-4">
                <input type="password" name="mdp2" class="form-control" placeholder="Confirmer votre mot de passe" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-3 col-md-offset-4">
                <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> S'inscrire</button>
            </div>
        </div>
    </form>
</div>

<?php include("includes/footer.php"); ?>