<?php
require_once "includes/functions.php";
session_start();

if(isUserConnected()){
    // Récupérer les infos du formulaire rempli par l'utilisateur
    if(isset($_POST['question'])){
        $id_theme = escape($_POST['id_theme']); //faire une requête pour afficher le libellé du thème mais garder en session uniquement son id
        $question_type = escape($_POST['type']);
        $question = escape($_POST['question']);
        $reponse_vraie = escape($_POST['reponse_vraie']);
        $reponse_fausse1 = escape($_POST['reponse_fausse1']);
        $reponse_fausse2 = escape($_POST['reponse_fausse2']);
        $reponse_fausse3 = escape($_POST['reponse_fausse3']);

    }

    // Insérer la question dans BDD
    $stmt = getDb()->prepare('INSERT INTO QUESTION (id_theme, type, question, reponse_vraie, reponse_fausse1, reponse_fausse2, reponse_fausse3) VALUES 
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
        <form>
        <!-- Sélection du thème -->
        <div class="form-group">
            <label for="Theme">Sélectionner le thème de la question</label>
            <select class="form-control" id="id_theme">
                <option>Star Wars</option>
                <option>Années 80</option>
                <option>Jeux Vidéo</option>
                <option>Cuisine</option>
                <option>Géographie</option>
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
            <input type="text" class="form-control" id="question">
        </div>

        <!-- Vrai / Faux -->
        <div class="form-group"> 
            <label for="ReponseVraiFaux">Réponse</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="vrai_faux" id="vrai_faux1" value="vrai">
                <label class="form-check-label" for="vrai_faux1">Vrai</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="vrai_faux" id="vrai_faux2" value="faux">
                <label class="form-check-label" for="vrai_faux2">Faux</label>
            </div>
        </div>


        <!-- Réponse à la question -->
        <div class="form-group">
            <label for="ReponseOuverte">Réponse à la question</label>
            <input type="text" class="form-control" id="reponse_vraie">
        </div>

        <!-- Autres réponses (fausses) -->
        <div class="form-group">
            <label for="reponses_fausses">Autres réponses (fausses)</label>
            <input type="text" class="form-control" id="reponse_fausse1">
        
            <input type="text" class="form-control" id="reponse_fausse2">
        
            <input type="text" class="form-control" id="reponse_fausse3">
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        
        </form>
    </div>

</body>
</html>