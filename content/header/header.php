<?php

    session_start();

     // FERMER LA SESSION
     if (isset($_GET['deco'])) {
        session_destroy();
        header("location:index.php");
    }

?>

<header>
    <nav class="menu-deroulant">
        <ul>
            <li id="ferme">
                <a class="home" href="index.php">Aller à l'accueil</a>
            </li>
            <li  id="ferme">
                <a class="calendrier" href="planning.php">Calendrier</a>
            </li>
            <li id="deroule">
                <a class="reserver" href="#">Espace réservations</a>
                <a href="prive.php">&nbsp ⇀ Evenements privés</a>
                <a href="public.php">&nbsp ⇀ Evenements publics</a>
                <a href="entreprise.php">&nbsp ⇀ Evenement d'entreprise</a>
            </li>
        </ul>
    </nav>

    <section class="nom">
        <main>
            <p>Avräm Bojan</p>
        </main>

        <div>
            <?php
                if(!isset($_SESSION['login']))
                { 
            ?>
            <a href="connexion.php">Sign IN</a>
            <p>&nbsp / &nbsp</p>
            <a href="inscription.php">Sign UP</a>
            <?php
                }
                else
                {
            ?>
            <a href="index.php?deco=true">Deconnexion</a>
            <?php
                }
            ?>
        </div>
    </section>
</header>