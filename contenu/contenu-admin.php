<?php

        // CONNEXION A LA BASE DE DONNEE
        $link= mysqli_connect("127.0.0.1", "root", "", "forum");

        // AFFICHER LES UTILISATEURS ET MODERATEURS
        $query= mysqli_query($link, "SELECT id, login FROM `utilisateurs` WHERE status_compte=2  AND id NOT LIKE '".$_SESSION['id']."'OR status_compte=3 AND id NOT LIKE '".$_SESSION['id']."'");
        $resultat1= mysqli_fetch_all($query, MYSQLI_ASSOC);

        // AFFICHER LES ADMINISTRATEURS ET MODERATEURS
        $query= mysqli_query($link, "SELECT id, login FROM `utilisateurs` WHERE status_compte=1  AND id NOT LIKE '".$_SESSION['id']."' OR status_compte=3 AND id NOT LIKE '".$_SESSION['id']."'");
        $resultat2= mysqli_fetch_all($query, MYSQLI_ASSOC);

        // AFFICHER LES UTILISATEURS ET ADMINISTRATEURS
        $query= mysqli_query($link, "SELECT id, login FROM `utilisateurs` WHERE status_compte=1 AND id NOT LIKE '".$_SESSION['id']."' OR status_compte=2 AND id NOT LIKE '".$_SESSION['id']."'");
        $resultat3= mysqli_fetch_all($query, MYSQLI_ASSOC);

        if (isset($_POST['admin'])) 
        {
            $query= mysqli_query($link, "UPDATE `utilisateurs` SET status_compte=1 WHERE id = '".$_POST['iduser']."'");
            header('location:../administration/admin.php');
        }

        if (isset($_POST['user'])) 
        {
            $query= mysqli_query($link, "UPDATE `utilisateurs` SET status_compte=2 WHERE id = '".$_POST['idadmin']."'");
            header('location:../administration/admin.php');
        }

        if (isset($_POST['modo'])) 
        {
            $query= mysqli_query($link, "UPDATE `utilisateurs` SET status_compte=3 WHERE id = '".$_POST['idmodo']."'");
            header('location:../administration/admin.php');
        }

?>

<p class="adminoptions">Gérer les attributions :</p>
<main>
    <form action="admin.php" method="post">
        <label class="adminoptions" for="titre">Donner droit administrateur :</label>
        <select name="iduser" id="">
            <?php foreach($resultat1 as $pseudos): ?>
                <option value="<?=$pseudos['id']?>"><?=$pseudos['login']?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" name="admin" value="Passer administrateur">
    </form>

    <form action="admin.php" method="post">
        <label class="adminoptions" for="titre">Donner droit moderateurs :</label>
        <select name="idmodo" id="">
            <?php foreach($resultat3 as $pseudos): ?>
                <option value="<?=$pseudos['id']?>"><?=$pseudos['login']?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" name="modo" value="Passer moderateur">
    </form>

    <form action="admin.php" method="post">
        <label class="adminoptions" for="titre">Rétrograder au rang utilisateur :</label>
        <select name="idadmin" id="">
            <?php foreach($resultat2 as $pseudos2): ?>
                <option value="<?=$pseudos2['id']?>"><?=$pseudos2['login']?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" name="user" value="Passer utilisateur">
    </form>
</main>

<br/>
<br/>

<main>
    <p class="adminoptions">Créer un nouveau Topic :</p>
    <form action="admin.php" method="post">
        <label class="adminoptions" for="titre">Nom du Topic :</label>
        <input type="text">

        <label class="adminoptions" for="titre">Sujet du Topic :</label>
        <input type="text">

        <label class="adminoptions" for="titre">Accessibilité :</label>
        <select name="status" id="">
            <option value="tous">Ouvert à tous</option>
            <option value="inscrits">Membres, administrateurs et moderateurs</option>
            <option value="adminitration">Administrateurs seulement</option>
            <option value="adminitration">Administrateurs et moderateurs seulement</option>
        </select>

        <input type="submit" name="topic" value="Publier">
    </form>
</main>

<br/>
<br/>

<main>
    <p class="adminoptions">Modifier un Topic :</p>
    <form action="admin.php" method="post">
        <label class="adminoptions" for="titre">Nom du Topic :</label>
        <select name="status" id="">
            <?php foreach($resultatsupr as $names): ?>
                <option value="<?=$names['id_topic']?>"><?=$names['name']?></option>
            <?php endforeach; ?>
        </select>

        <label class="adminoptions" for="titre">Nouveau nom du Topic :</label>
        <input type="text">

        <label class="adminoptions" for="titre">Nouveau sujet du Topic :</label>
        <input type="text">

        <label class="adminoptions" for="titre">Remanier l'accessibilité :</label>
        <select name="status" id="">
            <option value="inscrits">Membres et administrateurs</option>
            <option value="adminitration">Administrateurs seulement</option>
            <option value="tous">Ouvert à tous</option>

        <input type="submit" name="topic" value="Supprimer">
    </form>
</main>

<br/>
<br/>

<main>
    <p class="adminoptions">Supprimer un Topic :</p>
    <form action="admin.php" method="post">
        <label class="adminoptions" for="titre">Nom du Topic :</label>
        <select name="status" id="">
            <?php foreach($resultatsupr as $names): ?>
                <option value="<?=$names['id_topic']?>"><?=$names['name']?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit" name="topic" value="Supprimer">
    </form>
</main>