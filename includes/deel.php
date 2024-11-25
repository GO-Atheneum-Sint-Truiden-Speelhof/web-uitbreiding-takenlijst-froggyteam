
<div class="jumbotron">
			<h1 class="display-4">Klaar om deel te nemen? Shoot!</h1>
		</div>
<form method="post"  action="home.php?page=confirm" >
    <!-- Right section -->
    <div class="right-section">
        <label for="titel">titel van taak</label><br>
        <p><input required id="titel" type="text" name="titel" size="46"></p>

        <label for="datum">dead line</label><br>
        <p><input required id="datum" type="date" name="datum" size="46"></p>

        <label for="beschrijving">beschrijf u taak</label><br>
		<p><textarea required id="beschrijving" name="beschrijving" rows="5" cols="50"></textarea></p>
    
	<input type="submit" value="deelnemen">
	</div>

    <div style="clear: both;"></div>
    
    
</form>
