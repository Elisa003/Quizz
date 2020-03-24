<?php include("includes/header.php"); ?>

<?php if (isUserConnected())
    {
        ?>
        <table>
            <tr>
                <th>Thèmes</th>
                <th>Difficulté</th>
                <th>Score</th>
            </tr>
            <?php foreach ($scores as $score) 
                { 
                    ?>
                    <tr>
                        <th><?= $score['lib_theme'] ?></th>
                        <th><?= $score['lib_diff'] ?></th> <!--je sais pas si c'est bien not null-->
                        <?php if ($score['temps'] not null) 
                            {
                                ?>
                                <th><?= $score['temps'] ?></th>
                                <?php
                            }
                        else
                            {
                                ?>
                                <th><?= $score['points'] ?></th>
                                <?php
                            }
                        ?>
                                        
                    </tr>
                    <?php 
                }
            ?>
        </table>
        <?php
    }
else
    {
        include("includes/erreur.php");
    }
?>

<?php include("includes/footer.php"); ?>