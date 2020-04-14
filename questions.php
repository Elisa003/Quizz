<?php
require_once "includes/header.php" ;
require_once "includes/functions.php" ;


$themeId = $_GET['id1'];
$diffId = $_GET['id2'];
$bdd = getDb();

//récupération du nombre de questions associées au thème
$requete = $bdd->prepare("select nb_questions from THEME where id_theme= ? ");
$requete -> execute(array($themeId));
$nbQuestTheme = $requete->fetch();
//récupération du nombre de questions associées à la difficulté
$requete = $bdd->prepare("select nb_questions from DIFFICULTE where id_difficulte=?");
$requete->execute(array($diffId));
$nbQuest = intval($requete->fetch());
//création d'un tableau contenant l'id des questions sélectionnées pour le questionnaire
$tabInd = range(1, $nbQuestTheme, 1); // tableau [|1;2;3;...;$nbQuestTheme|]
$questSelect = array(array_rand($tabInd, $nbQuest)); // sélectionne $nbQuest éléments dans $tabInd et les met dans $questSelect
?>

<?php if (isUserConnected()) 
{
?>
    <form method="POST" action="resultat.php?id1=<?=$themeId?>&id2=<?=$diffId?>">
        <?php
        foreach ($questSelect as $idQuest) //c'était foreach($questSelect as $idQuest) je sais pas si ça change qqchose dans le contenu des questions du coup
        //Ah alors je crois que ça affiche toutes les questions au lieu des questions par niveaux
        //et ça les affiche une par une ... je crois que c'était pas ce qui était prévu ^^
        // c'est bien $questSelect car sinon c'est effectivement toutes les questions
        {
            $question = getQuestion($idQuest, $themeId, $bdd);
            echo $question['question'] ;
            if ($question['type'] == "qcm") 
            {
                ?></br>
                <select name="reponse<?= $question['id_question'] ?>[]" size="4">
                    <option value="reponsefausse1"><?= $question['reponse_fausse1'] ?></option>
                    <option value="reponsefausse2"><?= $question['reponse_fausse2'] ?></option>
                    <option value="reponsevraie"><?= $question['reponse_vraie'] ?></option>
                    <option value="reponsefausse3"><?= $question['reponse_fausse3'] ?></option>
                </select></br>
                <?php
            } 
            elseif ($question['type'] == "vrai_faux")
            {
                ?></br>
                <label for="vrai">Vrai</label>
                <input type="radio" name="reponse<?= $question['id_question'] ?>"/>
                <label for="faux">Faux</label>
                <input type="radio" name="reponse<?= $question['id_question'] ?>"/>
                <?php
            }
            else 
            {
                ?></br>
                <input type="text" name="reponse<?= $question['id_question'] ?>" size="50" /><br>
                <?php
            }
            $_SESSION["id_question"] = $idQuest;
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