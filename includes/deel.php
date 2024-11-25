
<div class="jumbotron">
			<h1 class="display-4">Klaar om deel te nemen? Shoot!</h1>
		</div>
<form method="post"  action="taken.php" >
    <div class="right-section">
        <label for="titel">titel van taak</label><br>
        <p><input required id="titel" type="text" name="titel" size="46"></p>

        <label for="datum">dead line</label><br>
        <p><input required id="datum" type="date" name="datum" size="46"></p>

        <label for="beschrijving">beschrijf u taak</label><br>
		<p><textarea required id="beschrijving" name="beschrijving" rows="5" cols="50"></textarea></p>
    
	<input type="submit" value="taken">
	</div>

    <div style="clear: both;"></div>

    <?php
        $servername = "localhost";
        $username = "root"; 
        $password = ""; 
        $dbname = "todo";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Verbinding mislukt: " . $conn->connect_error);
        }

        

        
        $conn->close();
?>

    
</form>

