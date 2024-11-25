
<div class="jumbotron">
			<h1 class="display-4">Klaar om deel te nemen? Shoot!</h1>
		</div>
<form method="post"  action="home.php?page=confirm" >
    <div class="left-section">
        <label for="naam">Naam</label><br>
        <p><input required id="naam" type="text" name="naam" size="46"></p>

        <label for="straat">straat</label><br>
        <p><input required id="straat" type="text" name="straat" size="46"></p>

        <label for="gemeente">gemeente</label><br>
        <p><input  required id="gemeente" type="text" name="gemeente" size="46"></p>

        <label for="postcode">postcode</label><br>
        <p><input required  id="postcode" type="number" name="postcode" size="46"></p>

        <label for="telefoon">telefoonnummer</label><br>
        <p><input required  id="telefoon" type="number" name="telefoon" size="46"></p>

        <label for="email">email</label><br>
        <p><input required  id="email" type="email" name="email" size="46"></p>

        <label for="geboorte">geboortedatum</label><br>
        <p><input required  id="geboorte" type="date" name="geboorte" size="46"></p>
    </div>

    <!-- Right section -->
    <div class="right-section">
        <label for="titel">titel van foto</label><br>
        <p><input required id="titel" type="text" name="titel" size="46"></p>

        <label for="camera">camera</label><br>
        <p><input required id="camera" type="text" name="camera" size="46"></p>

        <label for="lens">lens</label><br>
        <p><input required id="lens" type="text" name="lens" size="46"></p>

        <label for="beschrijving">beschrijf u foto</label><br>
		<p><textarea required id="beschrijving" name="beschrijving" rows="5" cols="50"></textarea></p>
    
	<input type="submit" value="deelnemen">
	</div>

    <div style="clear: both;"></div>
    
    
</form>
