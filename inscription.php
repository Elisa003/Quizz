
<?php include("includes/header.php"); ?>

<div class="container">
    <form method="POST" action="#">
        <label for="login">Login :</label><br/>
        <input type="text" name="login" size="17" /><br/><br/>
        <label for="mdp">Mot de passe :</label><br/>
        <input type="password1" name="mdp" size="17" /><br/><br/>
        <input type="password2" name="mdp" size="17" /><br/><br/>
        <input type="submit" value="Envoyer">
    </form>
</div>

<?php include("includes/footer.php"); ?>