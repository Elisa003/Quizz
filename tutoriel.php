<!--On arrive ici après l'inscription-->

<?php session_start();
include("includes/header.php"); ?>

<?php if (isUserConnected())
    {
        ?>
        <h3>Faire un QUIZZ</h3>
        <p>
            Pour lancer un quizz, cliquer sur "Voir tous les thèmes" lorsque vous êtes sur la page, puis choisissez la difficulté que vous souhaitez en appuyant sur le triangle à droite du thème choisi.</br>
            NB : Si aucune difficulté ne s'affiche, c'est que le nombre de questions de ce thème est insuffisant.</br>
            Une fois le quizz lancé, vous avez 1 minute et 30 secondes pour répondre à toutes les questions et valider vos réponses.</br>
            NB : La difficulté réside dans le nombre de questions.</br>
            Votre score correspond àvotre nombre de bonnes réponses, et dans le cas où vous faites un sans faute dans le temps imparti, il s'agira de votre temps.
        </p>
        <h3>Visualiser vos scores</h3>
        <p>
            Pour retrouver tous vos meilleurs scores, allez dans "Mes scores", dans l'onglet "Mon Compte".</br>
            Ce tableau est mis à jour à chaque quizz que vous faites.
        </p>
        <h3>Ajouter  une question ou un thème</h3>
        <p>
            Lorsque vous êtes administrateur, vous pouvez ajouter un thème ou une question à la base de données, en cliquant sur "Ajouter un thème/une question" sur la page d'accueil.</br>
            Il vous faudra rentrer les informations nécessaires dans les champs, en fonction du type de question.
        </p>
        <h3>Devenir administrateur</h3>
        <p>
            Pour devenir administrateur, il faut qu'un administrateur vous promeuve au rang d'administrateur.
        </p>
        <h3>Promouvoir un utilisateur administrateur</h3>
        <p>
            Pour promouvoir un utilisateur, cliquer sur "Gestion des utilisateurs" dans l'onglet "Mon Compte". Apparaît alors un tableau avec la liste des logins des utilisateurs ainsi que leurs droits.</br>
            Il vous suffit alors de cliquer sur "Passer administrateur" de la  ligne correspondante à l'utilisateur que vous voulez promouvoir.
        </p>
        <h3>Divers</h3>
        <p>
            Vous pouvez aussi vous déconnecter ou changer de mot de passe dans l'onglet "Mon Compte".</br>
            Lorsque vous cliquez sur le logo ou sur "QUIZZ" dans la barre de navigation depuis n'importe quelle page, vous reviendrez à la page d'accueil?</br>
            Vous pourez retrouver ce tutoriel sur la page d'accueil.
        </p>
        <h4><a href="index.php">Continuer</a></h4>
        
        <?php
    }
else
    {
        include("includes/erreur.php");
    }
?>

<?php include("includes/footer.php"); ?>