<!-- ISAAK -->
<p class="plustxt">La reservation qui vous interesse :</p>

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

        <div class="descriptifs">
            <p>Salle-</p>
            <p><?= $reservation[3] ?></p>
        </div>

        <div class="descriptifs">
            <p>Type de l'évènement-</p>
            <p>Evenement ouvert au public</p>
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

<p class="plustxt">Historique des reservations :</p>