<!doctype html>
<html lang=nl>

<?php include('includes/head.php')?>

<body>
	<div class="container">
		<?php 
			include('includes/menu.php');
			
			session_start();
			if (!isset($_SESSION['user_id'])) {
				header("Location: login.php");
				exit;
			}
			
			echo "<h1>Welkom, gebruiker #" . $_SESSION['user_id'] . "</h1>";
			echo "<a href='logout.php'>Uitloggen</a>";
			
			include('includes/footer.php');
		?>
	</div>
</body>

</html>