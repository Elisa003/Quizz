<?php
session_start();
include("includes/header.php");
$bdd = getDb();

$utilisateurs = $bdd->query('select * from UTILISATEUR');

//vérification que l'utilisateur est connecté
if (isUserConnected()) {
?>
    <h2>Gestion des utilisateurs :</h2>
    <table>
        <tr>
            <th>Login</th>
            <th>Droits</th>
        </tr>
        <?php
        foreach ($utilisateurs as $utilisateur) {
        ?>
            <tr>
                <td><?= $utilisateur['login'] ?></td>
                <?php
                //si l'utilisateur est un "simple user", possibilité de le passer en admin
                if ($utilisateur['droits'] == "user") {
                ?>
                    <td>Simple utilisateur</br><a href="admin.php?id=<?= $utilisateur['id_utilisateur'] ?>">Passer administrateur</a></td>
                <?php
                } else { //sinon afficher administrateur
                ?>
                    <td>Administrateur</td>
                <?php
                }
                ?>
            </tr>
        <?php
        } ?>
    </table>
<?php
} else {
    include("includes/erreur.php");
}
?>

<?php include("includes/footer.php"); ?>