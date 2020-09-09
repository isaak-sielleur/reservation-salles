<?php

    function chiffre($mdp)
    {
        $mdp="azerty".$mdp."cvbn";
        $mdp=hash('sha256',$mdp);
        return $mdp;
    }

    if(isset($_POST['connexion']))
    {
        if(!empty($_POST['pseudo']))
        {
            if(!empty($_POST['password']))
            {
                $link= mysqli_connect("127.0.0.1", "root", "", "reservationsalles");

                $password= chiffre($_POST['password']);

                $requete="SELECT * FROM utilisateurs WHERE login = '".$_POST['pseudo']."' && password = '".$password."'";
                $query= mysqli_query($link, $requete);
                $resultat= mysqli_fetch_all($query, MYSQLI_ASSOC);

                if(!empty($resultat))
                {   $_SESSION['login']=$_POST['pseudo'];
                    $_SESSION['id']=$resultat[0]['id'];
                   
                    header('Location: index.php');
                    
                }
            }
        }
    }

?>

<section class="form-connexion">

    <form action="connexion.php" method="post">

        <div>
            <label for="name">Votre identifiant :</label>
            <input type="text" id="name" class="form__field" name="pseudo" autocomplete="off" required>
        </div>


        <div>
            <label for="password">Votre mot de passe :</label>
            <input type="password" id="password" class="form__field" name="password" required>
        </div>

        <div>
            <button type="submit" name="connexion">Se connecter</button>
        </div>

    </form>

</section>