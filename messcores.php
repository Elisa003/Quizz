<?php
require_once "includes/functions.php";
session_start();
$bdd = getDB();
$login=$_SESSION['login'];
$requete = prepare('select id_utilisateur from UTILISATEUR where login=?');
$requete->execute(array($login));
$idUt = $requete->fetch();
$requete = $bdd->prepare('select * from GAGNE where id_utilisateur=?');
$scores = $requete->execute(array($idUt))
?>

<?php include("includes/header.php"); ?>

<?php if (isUserConnected())
    {
        ?>
        <table>
            <tr>
                <th>Thèmes</th>
                <th>Difficulté</th>
                <th>Score</th>
            </tr>
            <?php foreach ($scores as $score) 
                { 
                    $requete = $bdd->prepare('select libelle from THEME where id_theme=?');
                    $requete->execute(array($score['id_theme']));
                    $lib_theme = $requete->fetch();
                    $requete = $bdd->prepare('select libelle from DIFFICULTE where id_difficulte=?');
                    $requete->execute(array($score['id_difficulte']));
                    $lib_diff = $requete->fetch();
                    ?>
                    <tr>
                        <th><?= $lib_theme ?></th>
                        <th><?= $lib_diff ?></th> 
                        <?php if ($score['temps'] not null) //je sais pas si c'est bien not null
                            {
                                ?>
                                <th><?= $score['temps'] ?></th>
                                <?php
                            }
                        else
                            {
                                ?>
                                <th><?= $score['points'] ?></th>
                                <?php
                            }
                        ?>
                                        
                    </tr>
                    <?php 
                }
            ?>
        </table>
        <?php
    }
else
    {
        include("includes/erreur.php");
    }
?>

<?php include("includes/footer.php"); ?>