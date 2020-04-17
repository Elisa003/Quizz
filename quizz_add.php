<?php
session_start();
require_once "includes/header.php";

//récupérer tous les thèmes
$bdd = getDb();
$themes = $bdd->query('select * from THEME');


if (isUserConnected()) {
?>
    <!doctype html>
    <html>
    <?php
    $titrePage = "Ajouter une question";
    ?>
    <body>
        <div class="conteneur">
            <h2 class="text-center">Ajouter une question</h2>
            <h5>Il faut un minimum de :</h5>
            <div class="well">
                <ul>
                    <li>10 questions pour le niveau facile</li>
                    <li>15 questions pour le niveau médium</li>
                    <li>20 questions pour le niveau difficile</li>
                </ul>


                <?php
                if (isset($error)) {
                ?>
                    <div class="alert alert-danger">
                        <strong>Erreur !</strong> <?= $error ?>
                    </div>
                <?php
                }
                ?>

                <form method="POST" action="quizz_added.php" class="needs-validation" novalidate>
                    <!-- Sélection du thème -->
                    <div class="form-group">
                        <label for="Theme">Sélectionner le thème de la question</label>
                        <select name="id_theme" class="form-control" required>
                            <option value=""></option>
                            <?php
                            //affichage du libelle pour chaque thème + du nbre de questions
                            foreach ($themes as $theme) {
                            ?>
                                <option value="<?= $theme['id_theme'] ?>"><?= $theme['libelle'] ?> (<?= $theme['nb_questions'] ?>)</option>
                            <?php
                            }
                            ?>
                            <option value="0">Nouveau</option>
                        </select>
                        <div class="invalid-feedback">Veuillez sélectionner le thème de votre question</div>
                    </div>

                    <!--Nom Thème si nouveau-->
                    <div class="form-group">
                        <label for="NomTheme">Nom du thème s'il est nouveau</label>
                        <input type="text" name="nom_theme" class="form-control" />
                    </div>

                    <!-- Type de question -->
                    <div class="form-group">
                        <label for="QuestionType" required>Type de question</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type_question" id="type_question1" value="qcm" />
                            <label class="form-check-label" for="type_question1">QCM</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type_question" id="type_question2" value="vrai_faux" />
                            <label class="form-check-label" for="type_question2">Vrai / Faux</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type_question" id="type_question3" value="ouverte" />
                            <label class="form-check-label" for="type_question3">Question ouverte</label>
                        </div>
                        <div class="invalid-feedback">Veuillez Sélectionner un type de question</div>
                    </div>

                    <!-- Intitulé de la question -->
                    <div class="form-group">
                        <label for="QuestionIntitule">Intitulé de la question</label>
                        <input type="text" name="question" class="form-control" required />
                        <!--id="question"-->
                        <div class="invalid-feedback">Veuillez entrer une question</div>
                    </div>

                    <!-- Vrai / Faux -->
                    <div class="form-group">
                        <label for="ReponseVraiFaux">Réponse dans le cas d'un Vrai/Faux</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="reponse_vraie_v/f" id="vrai_faux1" value="Vrai" />
                            <label class="form-check-label" for="vrai_faux1">Vrai</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="reponse_vraie_v/f" id="vrai_faux2" value="Faux" />
                            <label class="form-check-label" for="vrai_faux2">Faux</label>
                        </div>
                    </div>


                    <!-- Réponse à la question -->
                    <div class="form-group">
                        <label for="ReponseOuverte">Réponse à la question dans le cas d'un QCM ou d'une question ouverte</label>
                        <input type="text" name="reponse_vraie_autre" class="form-control" />
                        <!--id="reponse_vraie"-->
                    </div>

                    <!-- Autres réponses (fausses) -->
                    <div class="form-group">
                        <label for="reponses_fausses">Autres réponses (fausses) dans les cas d'un QCM</label>
                        <input type="text" name="reponse_fausse1" class="form-control" />
                        <!--id="reponse_fausse1"-->
                        <input type="text" name="reponse_fausse2" class="form-control" />
                        <!--id="reponse_fausse2"-->
                        <input type="text" name="reponse_fausse3" class="form-control" />
                        <!--id="reponse_fausse3"-->
                    </div>

                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                </form>
            </div>
        </div>

    </body>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

    </html>
<?php
} else {
    include("includes/erreur.php");
}
include("includes/footer.php");
?>