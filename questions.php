<?php
session_start();
require_once "includes/header.php" ;
require_once "includes/functions.php" ;


$themeId = $_GET['id1'];
$diffId = $_GET['id2'];
$bdd = getDb();

//récupération du nombre de questions associées au thème
$requete = $bdd->prepare('SELECT * FROM THEME WHERE id_theme=?');
$theme = $requete->execute(array($themeId));
$theme = $requete->fetch();
$nbQuestTheme = $theme['nb_questions'];

//récupération du nombre de questions associées à la difficulté
$requete = $bdd->prepare("SELECT * FROM DIFFICULTE where id_difficulte=?");
$requete->execute(array($diffId));
$difficulte = $requete->fetch();
$nbQuest = $difficulte['nb_questions'];

//création d'un tableau contenant l'id des questions sélectionnées pour le questionnaire
$tabInd = range(1, $nbQuestTheme, 1); // tableau [|1;2;3;...;$nbQuestTheme|]
$questSelect = array_rand($tabInd, $nbQuest); // sélectionne $nbQuest éléments dans $tabInd et les met dans $questSelect

?>

<?php if (isUserConnected()) 
{
?>
    <form method="POST" action="resultat.php?id1=<?=$themeId?>&id2=<?=$diffId?>">
        <?php
        $tableau = array();
        foreach ($questSelect as $idQuest) 
        {
            $question = getQuestion($idQuest+1, $themeId, $bdd);
            array_push($tableau, $question['id_question']);
            ?>
            <div class="form-group">
                <label><?= $question['question'] ?></label>
            <?php
            
            if ($question['type'] == "qcm") 
            {
                ?></br>
                <select class="form-control" name="reponse<?= $question['id_question'] ?>" size="4">
                    <option value="reponse_fausse1"><?= $question['reponse_fausse1'] ?></option>
                    <option value="reponse_fausse2"><?= $question['reponse_fausse2'] ?></option>
                    <option value="reponse_vraie"><?= $question['reponse_vraie'] ?></option>
                    <option value="reponse_fausse3"><?= $question['reponse_fausse3'] ?></option>
                </select></br>
                <?php
            } 
            elseif ($question['type'] == "vrai_faux")
            {
                ?></br>
                <label for="Vrai">Vrai</label>
                <input type="radio" name="reponse<?= $question['id_question']?>"/>
                <label for="Faux">Faux</label>
                <input type="radio" name="reponse<?= $question['id_question']?>"/>
                <?php
            }
            else 
            {
                ?></br>
                <input type="text" name="reponse<?= $question['id_question'] ?>" size="50" /><br>
                <?php
            }?>
            </div>
            <?php
        }
        $_SESSION['liste_elements'] = $tableau;
        ?>
        <input type="submit" value="Envoyer"/>
    </form>
<?php
} 
else 
{
    include("includes/erreur.php");
}
?>

<?php include("includes/footer.php"); ?>

<!-- https://www.php.net/manual/fr/event.addtimer.php -->