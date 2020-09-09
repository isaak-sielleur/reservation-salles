<?php

function chiffre($mdp)
{
    $mdp="azerty".$mdp."cvbn";
    $mdp=hash('sha256',$mdp);
    return $mdp;
}

if(isset($_POST['inscription']))
{
    if(!empty($_POST['name'])&&!empty($_POST['password'])&&!empty($_POST['confirmpassword'])&&!empty($_POST['email']))
    {
        if($_POST['password']==$_POST['confirmpassword'])
        {
            $link= mysqli_connect("127.0.0.1", "root", "", "forum");

            $requete="SELECT * FROM utilisateurs WHERE login = '".$_POST['name']."'";
            $query= mysqli_query($link, $requete);
            $resultat= mysqli_fetch_all($query, MYSQLI_ASSOC);

            if(empty($resultat))
            {
                $password=chiffre($_POST['password']);
                $requete= "INSERT INTO utilisateurs (login, password, email) VALUES ('".$_POST['name']."', '".$password."','".$_POST['email']."')";
                $query= mysqli_query($link, $requete);
                header('Location: connexion.php');
            }
            else
            {
                $erreur= "Ce login est déjà utilisé, veuillez en choisir un autre";
                
            }
        }

        else
        {
            $erreur= "Les mot de passe ne sont pas identiques, veuillez réessayer";
        }
    }
}

?>

<div class="box">

    <div class="box-top">

        <div class="box-avatar">
            <img class="box-img" src="medias/clef.png">
        </div>

        <div class="box-title">S'inscrire</div>

        <div class="box-sub-title">Remise des clefs</div>

    </div>
    
    <form class="box-form" action="inscription.php" method="post">

        <div class="box-fields">

            <div class="box-field">
                <input type="text" id="name" class="box-text-field" name="name" required>
                <div class="box-placeholder">Votre identifiant</div>
                <img class="box-icon" src="medias/login.png">
                <div class="box-field-line"></div>
            </div>

            <div class="box-field">
                <input type="text" id="email" class="box-text-field" name="email" required>
                <div class="box-placeholder">Votre adresse mail</div>
                <img class="box-icon" src="medias/mail.png">
                <div class="box-field-line"></div>
            </div>

            <div class="box-field">
                <input type="password" id="password" class="box-text-field" name="password" required>
                <div class="box-placeholder">Votre mot de passe</div>
                <img class="box-icon" src="medias/mdp.png">
                <div class="box-field-line"></div>
            </div>

            <div class="box-field">
                <input type="password" id="confirmpassword" class="box-text-field" name="confirmpassword" required>
                <div class="box-placeholder">Verrifiez votre mot de passe</div>
                <img class="box-icon" src="medias/mdp.png">
                <div class="box-field-line"></div>
            </div>

        </div>

            <input type="submit" class="submit box-btn" name="inscription" value="Obtenir des clefs du TARDIS">

    </form>

</div>