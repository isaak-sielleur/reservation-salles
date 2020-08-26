<?php

	$connexion = mysqli_connect("127.0.0.1", "root", "", "reservationsalles");
	$requete = "SELECT titre, salle, type_event, reservation.id, login, DATE_FORMAT(debut, '%d'), DATE_FORMAT(debut, '%H'), DATE_FORMAT(debut, '%w') FROM reservation INNER JOIN utilisateurs ON reservation.id_utilisateur = utilisateurs.id WHERE DATE_FORMAT(NOW(), '%u')=DATE_FORMAT(debut, '%u')";
	$query = mysqli_query($connexion, $requete);
	$resultat = mysqli_fetch_all($query);

	for ($jourevent=0; $jourevent <count($resultat) ; $jourevent++) { 
		if ($resultat[$jourevent][7] == 0) {
			$resultat[$jourevent][7] = 7;
		}
	}

?>

<table>

	<tr class="jours">
		<td class="vide"></td>
		<td>Lundi</td>
		<td>Mardi</td>
		<td>Mercredi</td>
		<td>Jeudi</td>
		<td>Vendredi</td>
		<td>Samedi</td>
		<td>Dimanche</td>
	</tr>

	<tr class="jours">
		<td class="vide"></td>
		<td>Lundi</td>
		<td>Mardi</td>
		<td>Mercredi</td>
		<td>Jeudi</td>
		<td>Vendredi</td>
		<td>Samedi</td>
		<td>Dimanche</td>
	</tr>

	<?php

		for ($heures=8; $heures <= 19; $heures++) { 
	
	?>

		<tr class="heures">

			<td> <?= $heures ?>h-<?= $heures+1 ?>h </td>

			<?php

				for ($jours=1; $jours <= 7; $jours++) { 
	
			?>

					<td>
						<section class='flex'>
						<?php

							foreach ($resultat as $evenement) {
								if ($heures == $evenement[6] && $jours == $evenement[7]) {
									
						?>

							<div class="<?=$evenement[1]?>"> <div class="cachecache"> <p><?= $evenement[4]?></p> <p><?= $evenement[2]?></p> <p><?= $evenement[0]?></p> </div> </div>

						<?php
									
								}
							}

						?>
						</section>
					</td>

			<?php

				}

			?>

		</tr>

	<?php

		}

	?>

	


</table>