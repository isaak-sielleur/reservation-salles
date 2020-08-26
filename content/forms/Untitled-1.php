<table class="table">

    <thead>
        <tr>
            <th></th>
            <th>Lundi</th>
            <th>Mardi</th>
            <th>Mercredi</th>
            <th>Jeudi</th>
            <th>Vendredi</th>
            <th>Samedi</th>
            <th>Dimanche</th>
        </tr>
    </thead>

    <tbody>
    <?php
		$connexion = mysqli_connect("127.0.0.1", "root", "", "reservationsalles");
		$requete = "SELECT * FROM utilisateurs INNER JOIN reservations ON utilisateurs.id = reservations.id_utilisateur WHERE WEEK(reservations.debut) = WEEK(CURDATE())";
		$resultat = mysqli_query($connexion, $requete);

	?>

	<tr>
		<td>8h</td>
	</tr>
	<tr>
		<td>9h</td>
	</tr>
	<tr>
		<td>10h</td>
	</tr>
	<tr>
		<td>11h</td>
	</tr>
	<tr>
		<td>12h</td>
	</tr>
	<tr>
		<td>13h</td>
	</tr>
	<tr>
		<td>14h</td>
	</tr>
	<tr>
		<td>15h</td>
	</tr>
	<?php foreach($resultat as $intitules): ?>
		
		<tr>
			<p><?=$intitules['titre']?></p>
			<p><?=$intitules['description']?></p>
		</tr>
	<?php endforeach; ?>
    </tbody>
</table>

