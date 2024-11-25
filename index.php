<!doctype html>
<html lang=nl>

<?php include('includes/head.php')?>

<body>
	<div class="container">
		<div class="jumbotron">
			<h1 class="display-1"> takenlijst</h1>
		</div>
		<div class="row">
			<div class="col tegel knoppen">
				<p>cookies acepteren</p>
				<p>
					<button onclick="akoord()" class="btn-outline-dark btn-lg">akoord</button>
					<button onclick="nietakoord()" class="btn-outline-dark btn-lg">niet akoord</button>
				</p>
			</div>
		</div>

		
	</div>
	<script>
        function akoord() {
            window.location.href = 'home.php';
        }

        function nietakoord() {
			location.href = 'https://www.google.com'
 
        }
    </script>
</body>

</html>