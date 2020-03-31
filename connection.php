<?php
require_once "includes/functions.php";
session_start();

if (!empty($_POST['login']) and !empty($_POST['mdp'])) {
    $login = $_POST['login'];
    $password = $_POST['mdp'];
    $stmt = getDb()->prepare('select * from UTILISATEUR where login=? and mdp=?');
    $stmt->execute(array($login, $password));
    if ($stmt->rowCount() == 1) {
        // Authentication successful
        $_SESSION['login'] = $login;
        redirige("index.php");
    }
    else {
        $error = "Utilisateur non reconnu";
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
            <form class="form-signin form-horizontal" role="form" action="connection.php" method="post">
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <input type="text" name="login" class="form-control" placeholder="Entrez votre login" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <input type="password" name="mdp" class="form-control" placeholder="Entrez votre mot de passe" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-log-in"></span> Se connecter</button>
                    </div>
                </div>
            </form>
        </div>
<!--
<div class="container">
    <form method="POST" action="#">
        <label for="login">Login :</label><br/>
        <input type="text" name="login" size="17" /><br/>
        <label for="mdp">Mot de passe :</label><br/>
        <input type="password" name="mdp" size="17" /><br/><br/>
        <input type="submit" value="Envoyer">
    </form>
</div>
-->
<?php include("includes/footer.php"); ?>