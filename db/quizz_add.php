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
            <div class="form-group">
                <label for="">
            </div>
        </form>
    </div>

</body>
</html>