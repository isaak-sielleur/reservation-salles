<!-- ISAAK -->

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

	function get_day($week,$year,$format="d") 
	{

		$firstDayInYear=date("N",mktime(0,0,0,1,1,$year));

		if ($firstDayInYear<5)
		{
			$shift=-($firstDayInYear-1)*86400;
		} 	
		else
		{
			$shift=(8-$firstDayInYear)*86400;
		}
		

		if ($week>1)
		{
			$weekInSeconds=($week-1)*604800; 
		} 
		else 
		{
			$weekInSeconds=0;
		}

		$timestamp=array();
		
		for ($day=1; $day < 8 ; $day++) { 
			$jour=mktime(0,0,0,1,$day,$year)+$weekInSeconds+$shift;
			$jour=date($format,$jour);
			array_push($timestamp, $jour);
		}
		
		return $timestamp;

	}
		
		$tab_day = get_day(date('W'), date('Y'));
?>

<!-- MIXHAEL -->

<div class="blocklegend">

	<h1>Les vignettes :</h1>

	<p class="indication">Cliquez sur une vignette dans le calendrier pour en savoir plus</p>

	<div class="legende1">
		<p class="s1"></p>
		<h4>Malmont (100 personnes)</h4>
	</div>

	<div class="legende2">
		<p class="s2"></p>
		<h4>La verriere (200 personnes)</h4>
	</div>

	<div class="legende3">
		<p class="s3"></p>
		<h4>Mira (500 personnes)</h4>
	</div>
	
	<div class="legende4">
		<p class="s4"></p>
		<h4>Gargantua (1 000 personnes)</h4>
	</div>


</div>

<!-- ISAAK -->

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
		<?php foreach($tab_day as $key): ?>
			<td><?=$key?></td>
		<?php endforeach; ?>
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
						<section class="flex">
						<?php

							foreach ($resultat as $evenement) {
								if ($heures == $evenement[6] && $jours == $evenement[7]) {
									
						?>

							<a class="button <?=$evenement[1]?>" href="#popup<?=$evenement[3]?>"></a> 

							<div id="popup<?=$evenement[3]?>" class="overlay">
								<div class="popup">
									<h2>Nom de l'evenement : <i><?= $evenement[0]?></i></h2>
									<a class="close" href="#">&times;</a>
									<p>Createur de l'evenement - <b><?= $evenement[4]?></b></p> 
									<p>Categorie de l'evenement - <b><?= $evenement[2]?></b></p> 
									<a class="plus" href="<?= $evenement[2]?>.php?id=<?= $evenement[3]?>">En Savoir plus</a>
								</div>
							</div>

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


