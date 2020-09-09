<!-- ISAAK -->

<!DOCTYPE html>

<html lang="fr">

<head>
    <link rel="stylesheet" href="apparence/reservation.css">
    <link href="//db.onlinewebfonts.com/c/5973f5250d49662c29565c6345d6ddbe?family=LectraW01-Regular" rel="stylesheet" type="text/css"/>
    <link href="//db.onlinewebfonts.com/c/93dd2b4b2014d478b6faacd3b33900e9?family=Octant+Ligatures" rel="stylesheet" type="text/css"/>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

    <body>
        <?php include('content/header/header.php'); ?>

        <?php
            $connect = mysqli_connect("127.0.0.1", "root", "", "reservationsalles");
            if(isset($_POST["reserver"]))
            {
                $titre = $_POST["name"];
                $desc = $_POST["descrip"];
                $salle = $_POST["salle"];
                $type_event = $_POST["type_event"];
                $deb = $_POST["datedeb"]." ".$_POST["timedeb"];
                $fin = $_POST["datedeb"]." ".$_POST["timefin"];
                $id = $_SESSION["id"];

                $req = "SELECT * FROM reservation WHERE debut= '".$deb."' AND salle= '".$salle."'";

                $query = mysqli_query($connect, $req);
                $result = mysqli_fetch_all($query);

                if (empty($result)) {
                    $reqins = "INSERT INTO reservation (titre, description, salle, type_event, debut, fin, id_utilisateur) VALUES ('$titre', '$desc', '$salle', '$type_event', '$deb', '$fin', '$id')";
                    $queryins = mysqli_query($connect, $reqins);
                }

                else 
                {
                    echo "Cette salle est deja reservee, veuillez en choisir une autre ou un autre moment.";
                }

            }
        ?>

        <div class="planning-content">
            <?php include('content/planning/agenda.php'); ?>

            <?php
                if (!empty($_SESSION)) {
                    include('content/forms/reservation-form.php');
                }
                else {
                    echo "<span>Veuillez vous <a href='inscription.php'><u><b>inscrire</b></u></a> <br/> ou vous <a href='connexion.php'><u><b>connecter</b></u></a> pour reserver</span>";
                }
            ?>
            
            
        </div>
    </body>

</html>