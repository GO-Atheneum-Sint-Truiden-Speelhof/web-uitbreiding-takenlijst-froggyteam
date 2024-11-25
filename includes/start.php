<?php


$c_naam = 'cco_cookie';

if (isset($_COOKIE[$c_naam])) {

echo '<div class="row"><div class="col tegel"><p>Je hebt deze
website het laatst bezocht op '.$_COOKIE[$c_naam].'.</p></div>
</div>';

} else {

echo '<div class="row"><div class="col tegel"><p>Je hebt deze
website de laatste drie maanden niet be-zocht.</p></div></div>';

}

?>
<div class="jumbotron">
			<h1 class="display-4">CCO fotowedstrijd</h1>
		</div>
		<div class="row">
			<div class="col tegel">
				<h4>Meer over de wedstrijd</h4>
				<p><a href="wedstrijd.php"><img src="plaatjes/wedstrijd.jpg" alt="Meer over de wedstrijd" class="img-fluid rounded"></a></p>
			</div>
			<div class="col tegel">
				<h4>Wat kan je winnen?</h4>
				<p><a href="winnen.php"><img src="plaatjes/winnen.jpg" alt="Wat kan je winnen?" class="img-fluid rounded"></a>
			</div>
		</div>
		<div class="row">
			<div class="col tegel">
				<h4>Laureaat vorig jaar</h4>
				<p><a href="laureaat.php"><img src="plaatjes/laureaat.jpg" alt="De laureaat van vorig jaar" class="img-fluid rounded"></a></p>
			</div>
			<div class="col tegel">
				<h4>Neem deel</h4>
				<p><a href="deelnemen.php"><img src="plaatjes/deelnemen.jpg" alt="Neem deel aan de wedstrijd" class="img-fluid rounded"></a>
			</div>
		</div>
		<?php
			$c_naam = 'cco_cookie';
			$c_waarde = date("j/m/Y").' om '.date("G:i");
			$c_verloopt = time() + 60 * 60 * 24 * 90;
			setcookie($c_naam, $c_waarde, $c_verloopt);
		?>