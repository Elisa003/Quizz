<?php
require_once "includes/functions.php";
session_start();
$bdd = getDb();
$themes = $bdd->query('select * from THEME');

require_once "includes/header.php";

if(isUserConnected()){
    // Récupérer les infos du formulaire rempli par l'utilisateur
    if(isset($_POST['id_theme']) and isset($_POST['question']) and isset($_POST['type_question']) and isset($_POST['reponse_vraie']))
    {
        $id_theme = (int)escape($_POST['id_theme']);
        //echo "id_theme : " .$id_theme;
        $question_type = escape($_POST['type_question']);
        $question = escape($_POST['question']);
        $reponse_vraie = escape($_POST['reponse_vraie']);
        if ($question_type != "qcm")
        {            
            $reponse_fausse1 = "";
            $reponse_fausse2 = "";
            $reponse_fausse3 = "";
        }
        else
        {
            if (isset($_POST['reponse_fausse1']) and isset($_POST['reponse_fausse2']) and isset($_POST['reponse_fausse3']))
            {
                $reponse_fausse1 = escape($_POST['reponse_fausse1']);
                $reponse_fausse2 = escape($_POST['reponse_fausse2']);
                $reponse_fausse3 = escape($_POST['reponse_fausse3']);
            }
            else
            {
                $error = "Il manque des paramètres";
            }
        }
        if (!isset($error))
        {
            // Création de la table si le thème est nouveau
            if ($id_theme == 0)
            {
                $nom_theme = escape($_POST['nom_theme']);
                $requete = $bdd->prepare('insert into THEME (libelle, nb_questions) values (?, ?)');
                $requete->execute(array($nom_theme, 0));
            }
            // Insérer la question dans BDD
            $bdd = getDb();
            $requete = $bdd->prepare('select id_theme from THEME where libelle=?');
            $requete->execute(array($nom_theme));
            $id_theme = $requete->fetch();
            echo "id_theme : " .$id_theme;
            $stmt = $bdd->prepare('INSERT INTO QUESTION (id_theme, type, question, reponse_vraie, reponse_fausse1, reponse_fausse2, reponse_fausse3) 
            values (?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute(array($id_theme, $question_type, $question, $reponse_vraie, $reponse_fausse1, $reponse_fausse2, $reponse_fausse3));
            // Mise à jour du nombre de questions
            $requete = $bdd->prepare('select * from THEME where id_theme=?');
            $requete->execute(array($id_theme));
            $theme = $requete->fetch();

            $nbQuestion = $theme['nb_questions'];
            $nbQuestion = intval($nbQuestion) + 1;
            $requete = $bdd->prepare('update THEME set nb_questions=? where id_theme=?');
            $requete->execute(array($nbQuestion, $id_theme));
        }
    }
    else
    {
        $error = "Il manque des paramètres";
    }
?>
<!doctype html>
<html>

<?php
$titrePage = "Ajouter une question";
?>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <title>Quizz </title>
</head>
<body>
    <div class="conteneur">
        <h2 class="text-center">Ajouter une question</h2>
        <h5>Il faut un minimum de :</h5>
        <ul>
            <li>10 questions pour le niveau facile</li>
            <li>15 questions pour le niveau médium</li>
            <li>20 questions pour le niveau difficile</li>
        </ul>
        <?php
        if (isset($error))
        {
            ?>
            <div class="alert alert-danger">
                <strong>Erreur !</strong> <?=$error?>
            </div>
            <?php
        }
        ?>
        <div class="well">
            <form method="POST" action="quizz_add.php" class="needs-validation" novalidate>
            <!-- Sélection du thème -->
            <div class="form-group">
                <label for="Theme">Sélectionner le thème de la question</label>
                <select name="id_theme" class="form-control"><!--id="id_theme"-->
                    <?php
                    foreach ($themes as $theme)
                    {
                        ?>
                        <option value="<?=$theme['id_theme']?>"><?=$theme['libelle']?> (<?=$theme['nb_questions']?>)</option>
                        <?php
                    }
                    ?>
                    <option value="0">Nouveau</option>
                </select>
            </div>

            <!--Nom Thème si nouveau-->
            <div class="form-group">
                    <label for="NomTheme">Nom du thème s'il est nouveau</label>
                    <input type="text" name="nom_theme" class="form-control"/>
            </div>

            <!-- Type de question -->
            <div class="form-group"> 
                <label for="QuestionType">Type de question</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type_question" id="type_question1" value="qcm"/>
                    <label class="form-check-label" for="type_question1">QCM</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type_question" id="type_question2" value="vrai_faux"/>
                    <label class="form-check-label" for="type_question2">Vrai / Faux</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type_question" id="type_question3" value="ouverte"/>
                    <label class="form-check-label" for="type_question3">Question ouverte</label>
                </div>
            </div>

            <!-- Intitulé de la question -->
            <div class="form-group">
                <label for="QuestionIntitule">Intitulé de la question</label>
                <input type="text" name="question" class="form-control" required/><!--id="question"-->
                <div class="invalid-feedback">Veuillez entrer une question</div>
            </div>

            <!-- Vrai / Faux -->
            <div class="form-group"> 
                <label for="ReponseVraiFaux">Réponse dans le cas d'un Vrai/Faux</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="reponse_vraie" id="vrai_faux1" value="Vrai"/>
                    <label class="form-check-label" for="vrai_faux1">Vrai</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="reponse_vraie" id="vrai_faux2" value="Faux"/>
                    <label class="form-check-label" for="vrai_faux2">Faux</label>
                </div>
            </div>


            <!-- Réponse à la question -->
            <div class="form-group">
                <label for="ReponseOuverte">Réponse à la question dans le cas d'un QCM ou d'une question ouverte</label>
                <input type="text" name="reponse_vraie" class="form-control"/> <!--id="reponse_vraie"-->
            </div>

            <!-- Autres réponses (fausses) -->
            <div class="form-group">
                <label for="reponses_fausses">Autres réponses (fausses) dans les cas d'un QCM</label>
                <input type="text" name="reponse_fausse1" class="form-control"/><!--id="reponse_fausse1"-->
                <input type="text" name="reponse_fausse2" class="form-control"/><!--id="reponse_fausse2"-->
                <input type="text" name="reponse_fausse3" class="form-control"/><!--id="reponse_fausse3"-->
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
            
            </form>
        </div>
    </div>

</body>
</html>
<?php
    redirige("quizz_add.php");
}
else
    {
        include("includes/erreur.php");
    }
?>

