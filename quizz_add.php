<?php
require_once "includes/functions.php";
session_start();
$bdd = getDb();
$themes = $bdd->query('select * from THEME');

if(isUserConnected()){
    // Récupérer les infos du formulaire rempli par l'utilisateur
    if(isset($_POST['question']))
    {
        $id_theme = (int)escape($_POST['id_theme']); //faire une requête pour afficher le libellé du thème mais garder en session uniquement son id
        $question_type = escape($_POST['type_question']);
        $question = escape($_POST['question']);
        if ($question_type == "vrai_faux")
        {
            $reponse_vraie = escape($_POST['vrai_faux']);
            $reponse_fausse1 = "";
            $reponse_fausse2 = "";
            $reponse_fausse3 = "";
        }
        else
        {
            $reponse_vraie = escape($_POST['reponse_vraie']);
            if ($question_type == "qcm")
            {
                $reponse_fausse1 = escape($_POST['reponse_fausse1']);
                $reponse_fausse2 = escape($_POST['reponse_fausse2']);
                $reponse_fausse3 = escape($_POST['reponse_fausse3']);
            }
            else
            {
                $reponse_fausse1 = "";
                $reponse_fausse2 = "";
                $reponse_fausse3 = "";
            }
        }
    }

    // Insérer la question dans BDD
    $stmt = $bdd->prepare('INSERT INTO QUESTION (id_theme, type, question, reponse_vraie, reponse_fausse1, reponse_fausse2, reponse_fausse3) VALUES 
    values (?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($id_theme, $question_type, $question, $reponse_vraie, $reponse_fausse1, $reponse_fausse2, $reponse_fausse3));
    redirect("index.php");
}
?>

<!doctype html>
<html>

<?php
$titrePage = "Ajouter une question";
require_once "includes/header.php";
?>

<body>
    <div class="container">
        <h2 class="text-center">Ajouter une question</h2>
        <form method="POST" action="quizz_add.php">
        <!-- Sélection du thème -->
        <div class="form-group">
            <label for="Theme">Sélectionner le thème de la question</label>
            <select name="id_theme" class="form-control" ><!--id="id_theme"-->
                <?php
                foreach ($themes as $theme)
                {
                    ?>
                    <option value="<?=$theme['id_theme']?>"><?=$theme['libelle']?></option>
                    <?php
                }
                ?>
            </select>
        </div>

        <!-- Type de question -->
        <div class="form-group"> 
            <label for="QuestionType">Type de question</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="type_question" id="type_question1" value="qcm">
                <label class="form-check-label" for="type_question1">QCM</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="type_question" id="type_question2" value="vrai_faux">
                <label class="form-check-label" for="type_question2">Vrai / Faux</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="type_question" id="type_question3" value="ouverte">
                <label class="form-check-label" for="type_question3">Question ouverte</label>
            </div>
        </div>

        <!-- Intitulé de la question -->
        <div class="form-group">
            <label for="QuestionIntitule">Intitulé de la question</label>
            <input type="text" name="question" class="form-control" ><!--id="question"-->
        </div>

        <!-- Vrai / Faux -->
        <div class="form-group"> 
            <label for="ReponseVraiFaux">Réponse dans le cas d'un Vrai/Faux</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="vrai_faux" id="vrai_faux1" value="Vrai">
                <label class="form-check-label" for="vrai_faux1">Vrai</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="vrai_faux" id="vrai_faux2" value="Faux">
                <label class="form-check-label" for="vrai_faux2">Faux</label>
            </div>
        </div>


        <!-- Réponse à la question -->
        <div class="form-group">
            <label for="ReponseOuverte">Réponse à la question dans le cas d'un QCM ou d'une question ouverte</label>
            <input type="text" name="reponse_vraie" class="form-control"> <!--id="reponse_vraie"-->
        </div>

        <!-- Autres réponses (fausses) -->
        <div class="form-group">
            <label for="reponses_fausses">Autres réponses (fausses) dans les cas d'un QCM</label>
            <input type="text" name="reponse_fausse1" class="form-control" ><!--id="reponse_fausse1"-->
        
            <input type="text" name="reponse_fausse2" class="form-control" ><!--id="reponse_fausse2"-->
        
            <input type="text" name="reponse_fausse3" class="form-control" ><!--id="reponse_fausse3"-->
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        
        </form>
    </div>

</body>
</html>