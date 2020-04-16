<?php
require_once "includes/functions.php";
session_start();
$bdd = getDB();
$login = $_SESSION['login'];
$requete = $bdd->prepare('select * from UTILISATEUR where login=?');
$requete->execute(array($login));
$utilisateurs = $requete->fetch();
$idUt = $utilisateurs['id_utilisateur'];
//$scores = $bdd->query('select * from GAGNE where id_utilisateur=1');
$requete = $bdd->prepare('select * from GAGNE where id_utilisateur=?');
$requete->execute(array($idUt));
$scores = $requete->fetchAll();
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
            <?php 
            
                foreach ($scores as $score)
                { 
                    $id_theme = $score['id_theme'];
                    $requete = $bdd->prepare('select * from THEME where id_theme=?');
                    $requete->execute(array($id_theme));
                    $theme = $requete->fetch();
                    $lib_theme = $theme['libelle'];
                    $requete = $bdd->prepare('select * from DIFFICULTE where id_difficulte=?');
                    $requete->execute(array($score['id_difficulte']));
                    $difficulte = $requete->fetch();
                    $lib_diff = $difficulte['libelle'];
                    ?>
                    <tr>
                        <td><?= $lib_theme ?></td>
                        <td><?= $lib_diff ?></td> 
                        <?php if (!is_null($score['temps']))
                            {
                                $secondes = $score % 60;
                                $minute = $score / 60;
                                echo $minute.' minute et '.$secondes.' secondes';
                            }
                        else
                            {
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
    }
else
    {
        include("includes/erreur.php");
    }
?>

<?php include("includes/footer.php"); ?>