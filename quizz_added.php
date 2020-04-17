<?php
session_start();
require_once "includes/functions.php";

$bdd = getDb();
$themes = $bdd->query('select * from THEME');


if(isUserConnected()){
    // Récupérer les infos du formulaire rempli par l'utilisateur
    if(isset($_POST['id_theme']) and isset($_POST['question']) and isset($_POST['type_question']) and (isset($_POST['reponse_vraie_v/f']) or isset($_POST['reponse_vraie_autre'])))
    {
        $id_theme = (int)escape($_POST['id_theme']);
        //echo "id_theme : " .$id_theme;
        $question_type = escape($_POST['type_question']);
        $question = escape($_POST['question']);
        if ($question_type == "vrai_faux")
        {
            $reponse_vraie = escape($_POST['reponse_vraie_v/f']);
        }
        else
        {
            $reponse_vraie = escape($_POST['reponse_vraie_autre']);
        }
        //echo "réponse vraie : " .$reponse_vraie;
        //cas d'un vrai/faux ou question ouverte
        if ($question_type != "qcm")
        {            
            $reponse_fausse1 = "";
            $reponse_fausse2 = "";
            $reponse_fausse3 = "";
        }
        //cas d'un QCM
        else
        {
            if (isset($_POST['reponse_fausse1']) and isset($_POST['reponse_fausse2']) and isset($_POST['reponse_fausse3']))
            {
                $reponse_fausse1 = escape($_POST['reponse_fausse1']);
                $reponse_fausse2 = escape($_POST['reponse_fausse2']);
                $reponse_fausse3 = escape($_POST['reponse_fausse3']);
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

                $requete = $bdd->prepare('select * from THEME where libelle=?');
                $requete->execute(array($nom_theme));
                $themes = $requete->fetch();
                $id_theme = $themes['id_theme']; 
            }
            // Mise à jour du nombre de questions dans la table THEME
            $requete = $bdd->prepare('select * from THEME where id_theme=?');
            $requete->execute(array($id_theme));
            $themes = $requete->fetch();

            $nbQuestion = $themes['nb_questions'];
            $nbQuestion = intval($nbQuestion) + 1;
            $requete = $bdd->prepare('update THEME set nb_questions=? where id_theme=?');
            $requete->execute(array($nbQuestion, $id_theme));

            // Insérer la question dans BDD           
            $stmt = $bdd->prepare('INSERT INTO QUESTION (id_theme, id_question, type, question, reponse_vraie, reponse_fausse1, reponse_fausse2, reponse_fausse3) 
            values (?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute(array($id_theme, $nbQuestion, $question_type, $question, $reponse_vraie, $reponse_fausse1, $reponse_fausse2, $reponse_fausse3));
        }
    }
}
redirige("quizz_add.php");?>
