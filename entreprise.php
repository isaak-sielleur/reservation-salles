<!-- MICHAEL -->

<?php

    $connexion = mysqli_connect("127.0.0.1", "root", "", "reservationsalles");
    $requete = "SELECT *FROM reservation INNER JOIN utilisateurs WHERE type_event='entreprise'";
    $query = mysqli_query($connexion, $requete);
    $resultat = mysqli_fetch_all($query);

?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <link rel="stylesheet" href="apparence/reservation.css">
        <link href="//db.onlinewebfonts.com/c/21c58d749d8fc57d9897bc9cccdc9b7f?family=Bitter" rel="stylesheet" type="text/css" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>  

    <body>

        <?php include('content/header/header.php') ?>

        <section id="recapreservation">

            <?php 
                if (empty($resultat)) {
                    echo "<span class=span>Il n'y a rien ici pour le moment</span>";
                }
            ?>

            <?php foreach ($resultat as $reservation) : ?>

                <!-- ISAAK -->
                <?php

                    if (strpos($_SERVER['REQUEST_URI'], "$reservation[0]") !== false) {
                        include('content/text/plus.php');
                    }
                
                ?>
                <!-- MICHAEL -->

                <div class="bigblockres">

                    <div class="blockreserv">

                        <div class="descriptifs">
                            <p>Client-</p>
                            <p><?= $reservation[9] ?></p>
                        </div>

                        <div class="descriptifs">
                            <p>Nom de l'évènement-</p>
                            <p><?= $reservation[1] ?></p>
                        </div>

                        <div class="descriptifs">
                            <p>Déscription de l'évènement-</p>
                            <p><?= $reservation[2] ?></p>
                        </div>

                    <!-- ISAAK -->

                        <?php 
                            switch ($reservation[3]) {
                                case 'petite':
                                    $reservation[3]="Malmont (100 personnes)";
                                break;

                                case 'moyenne':
                                    $reservation[3]="La verriere (200 personnes)";
                                break;

                                case 'grande':
                                    $reservation[3]="Mira (500 personnes)";
                                break;

                                case 'tresgrande':
                                    $reservation[3]="Gargantua (1 000 personnes";
                                break;
                            }
                        ?>

                        <!-- MICHAEL -->

                        <div class="descriptifs">
                            <p>Salle-</p>
                            <p><?= $reservation[3] ?></p>
                        </div>

                        <div class="descriptifs">
                            <p>Type de l'évènement-</p>
                            <p>Evenement d'Entreprise</p>
                        </div>

                        <div class="descriptifs">
                            <p>Début-</p>
                            <p><?= $reservation[5] ?></p>
                        </div>

                        <div class="descriptifs">
                            <p>Fin-</p>
                            <p><?= $reservation[6] ?></p>
                        </div>

                    </div>

                </div>
                
            <?php endforeach ?>

        </section>

    </body>

</html>