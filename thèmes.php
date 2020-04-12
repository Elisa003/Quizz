<?php 
include("includes/header.php"); 
$bdd=getDb();
$themes = $bdd->query('select * from THEME order by libelle'); 
?>

<?php if (isUserConnected())
    {
        foreach ($themes as $theme) 
            { 
                ?>
                <article>
                    <div class="dropdown ml-auto">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $theme['libelle'] ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <?php
                            if ($theme['nb_questions'] >= 10)
                            {
                                ?>
                                <a class="dropdown-item" href="questions.php?id1=<?=$theme['id_theme']?>?id2=1">Facile</a> <!--Vérifier si ça marche bien avec id1 et id2, j'ai pas pu le faire car la récupération de la bdd ne fonctionnait pas-->
                                <?php
                            }
                            if ($theme['nb_questions'] >= 15)
                            {
                                ?>
                                <a class="dropdown-item" href="questions.php?id1=<?=$theme['id_theme']?>?id2=2">Médium</a>
                                <?php
                            }
                            if ($theme['nb_questions'] >= 20)
                            {
                                ?>
                                <a class="dropdown-item" href="questions.php?id1=<?=$theme['id_theme']?>?id2=3">Difficile</a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </article>
                <?php 
            }
    }
else
    {
         include("includes/erreur.php");
    }
?>

<?php include("includes/footer.php"); ?>