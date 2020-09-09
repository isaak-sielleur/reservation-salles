<?php 



function chiffre($mdp)
{
    $mdp="azerty".$mdp."cvbn";
    $mdp=hash('sha256',$mdp);
    return $mdp;
}

if(isset($_POST['inscri']))
{
    if(!empty($_POST['name'])&&!empty($_POST['password'])&&!empty($_POST['confirmpassword']))
    {
        if($_POST['password']==$_POST['confirmpassword'])
        {
            $link= mysqli_connect("127.0.0.1", "root", "", "reservationsalles");

            $requete="SELECT * FROM utilisateurs WHERE login = '".$_POST['name']."'";
            $query= mysqli_query($link, $requete);
            $resultat= mysqli_fetch_all($query, MYSQLI_ASSOC);

            if(empty($resultat))
            {
                //apres la verification login
                $password=chiffre($_POST['confirmpassword']);
                $requete= "INSERT INTO utilisateurs (login, password) VALUES ('".$_POST['name']."', '".$password."')";
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
<section class="form-inscription">

    <form action="inscription.php" method="post">

        <div>
            <label for="name">Votre identifiant :</label>
            <input type="text" name="name" autocomplete="off" value="<?php if(isset($erreur)) {echo $erreur;} ?>" required>
        </div>

        <div>
            <label for="password">Votre mot de passe :</label>
            <input type="password" name="password" required>
        </div>

        <div>
            <label for="password">Confirmez votre mot de passe :</label>
            <input type="password" name="confirmpassword" required>
        </div>
        
        <div>
            <button type="submit" name="inscri" >S'inscrire</button>
        </div>

    </form>

</section>