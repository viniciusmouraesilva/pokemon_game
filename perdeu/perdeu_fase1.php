<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Play Snorlax Game</title>

	<style>
		body {
			background-image: url('imagens/perdeu_jig.gif');

			background-position: center;
			background-repeat: no-repeat;
		} 

		h1 {
			text-align: center;
			position: relative;
			top: 250px;
			font-family: arial, sans-serif, georgia;
		}

		a {
			text-align: center;
			position: relative;
			top: 250px;
			left: 550px;
			background-color: blue;
			padding: 15px;
			color: white;
			border-radius: 6px; 
			text-decoration: none;
			font-family: arial, georgia, sans-serif;
		}
	</style>

</head>
<body>

	<h1>Você perdeu... </h1>

	<a href="../first_battle.php">Tentar Novamente</a>

	<?php if(isset($_COOKIE['tempo_dormindo'])): ?>
			
			<?php $total_tempo_dormindo = $_COOKIE['tempo_dormindo']; ?>
			
			<p>Total em turnos dormindo: <?php print $total_tempo_dormindo; ?>

			<?php setcookie('tempo_dormindo'); ?></p>
	<?php endif; ?>
</body>
</html>