<?php
session_start();
include("includes/header.php");
$bdd = getDb();
//récupération de tous les thèmes
$themes = $bdd->query('select * from THEME order by libelle');

if (isUserConnected()) {
?>
    <h2>Liste des thèmes :</h2>
    <?php
    foreach ($themes as $theme) {
    ?>
        <article>
            <div class="dropdown ml-auto">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $theme['libelle'] ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?php
                    if ($theme['nb_questions'] >= 10) { //affichage du niveau facile si 10 questions min
                    ?>
                        <a class="dropdown-item" href="questions.php?id1=<?= $theme['id_theme'] ?>&id2=1">Facile</a>
                    <?php
                    }
                    if ($theme['nb_questions'] >= 15) { //affichage du niveau médium si 15 questions min
                    ?>
                        <a class="dropdown-item" href="questions.php?id1=<?= $theme['id_theme'] ?>&id2=2">Médium</a>
                    <?php
                    }
                    if ($theme['nb_questions'] >= 20) { //affichage du niveau difficile si 20 questions min
                    ?>
                        <a class="dropdown-item" href="questions.php?id1=<?= $theme['id_theme'] ?>&id2=3">Difficile</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </article>
<?php
    }
} else {
    include("includes/erreur.php");
}
include("includes/footer.php"); ?>

<html>

<body>

    <!-- jQuery -->
    <script src="lib/jquery-3.4.1.min.js"></script>
    <!-- Popper -->
    <script src="lib/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>