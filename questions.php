<?php 
include("includes/header.php");
$themeId = $_GET['id1']; 
$diffId = $_GET['id2'];
$bdd=getDb();
//récupération du nombre de questions associées au thème
$requete = $bdd->prepare('select nb_questions from THEME where id_theme=?');
$requete->execute($themeId);
$nbQuestTheme = $requete->fetch();
//récupération du nombre de questions associées à la difficulté
$requete = $bdd->prepare('select nb_questions from DIFFICULTE where id_difficulte=?');
$requete->execute($diffId);
$nbQuest = $requete->fetch();
//création d'un tableau contenant l'id des questions sélectionnées pour le questionnaire
$tabInd=range(1,$nbQuestTheme,1);
$questSelect=array_rand($tabInd,$nbQuest);
?>

<?php if (isUserConnected())
    {
        ?>
        <form method="POST" action="#">
            <?php
            foreach($questSelect as $idQuest)
            {
                $question = getQuestion($idQuest, $themeId, $bdd);
                echo $question['question']."\n";
                if ($question['type']=="qcm")
                {
                    ?>
                    <select name="reponse<?=$question['id_question']?>[]" size="4" >
                        <option value="reponsevraie"><?=$question['reponse_vraie']?></option>
                        <option value="reponsefausse1"><?=$question['reponse_fausse1']?></option>
                        <option value="reponsefausse2"><?=$question['reponse_fausse2']?></option>
                        <option value="reponsefausse3"><?=$question['reponse_fausse3']?></option>
                    </select></br>
                    <?php 
                }
                else
                {
                    ?>
                    <input type="text" name="reponse<?=$question['id_question']?>" size="50" /><br>
                    <?php
                }
            }
            ?>
            <input type="submit" value="Envoyer">
        </form>
        <?php
    }
else
    {
         include("includes/erreur.php");
    }
?>

<?php include("includes/footer.php"); ?>