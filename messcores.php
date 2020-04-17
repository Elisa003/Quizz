<?php
session_start();
require_once "includes/functions.php";

$bdd = getDB();
$login = $_SESSION['login'];
//récupération de l'utilisateur actuel
$requete = $bdd->prepare('select * from UTILISATEUR where login=?');
$requete->execute(array($login));
$utilisateurs = $requete->fetch();
$idUt = $utilisateurs['id_utilisateur'];

//récupération de ses scores
$requete = $bdd->prepare('select * from GAGNE where id_utilisateur=?');
$requete->execute(array($idUt));
$scores = $requete->fetchAll();


include("includes/header.php");

if (isUserConnected()) {
?>
    <h2>Tableau des scores :</h2>
    <table>
        <tr>
            <th>Thèmes</th>
            <th>Difficulté</th>
            <th>Score</th>
        </tr>
        <?php

        foreach ($scores as $score) {
            //Récupération de chaque libellé de thème
            $id_theme = $score['id_theme'];
            $requete = $bdd->prepare('select * from THEME where id_theme=?');
            $requete->execute(array($id_theme));
            $theme = $requete->fetch();
            $lib_theme = $theme['libelle'];

            //récupération de chaque libellé de difficulté
            $requete = $bdd->prepare('select * from DIFFICULTE where id_difficulte=?');
            $requete->execute(array($score['id_difficulte']));
            $difficulte = $requete->fetch();
            $lib_diff = $difficulte['libelle'];
        ?>
            <tr>
                <td><?= $lib_theme ?></td>
                <td><?= $lib_diff ?></td>
                <?php if (!is_null($score['temps'])) {
                ?>
                    <td>
                        <?php //Calcul du score
                        $secondes = $score['temps'] % 60;
                        $minute = (int) ($score['temps'] / 60);
                        echo $minute . ' minute et ' . $secondes . ' secondes';
                        ?>
                    </td>
                <?php
                } else {
                ?>
                    <td><?= $score['points'] ?></td>
                <?php
                }
                ?>
            </tr>
        <?php
        }
        ?>
    </table>
<?php
} else {
    include("includes/erreur.php");
}
include("includes/footer.php"); ?>