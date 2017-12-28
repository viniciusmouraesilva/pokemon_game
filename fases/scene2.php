<!DOCTYPE html>
<html lang="pt-br">
<head>
	<style>
		body {
			background-image: url('imagens/background.png');
			background-repeat: repeat;
			background-position: cover;
			background-size: 100%;
		}

		.enemy {
			display: flex;
			flex-flow: row wrap;
			justify-content: center;
			background-position: right;
			position: relative;
			top: -75px;
			left: 900px;
		}

		.snorlax {
			display: flex;
			flex-flow: row wrap;
			width: 22%;
			position: relative;
			top: 10px;
			left: 120px;
		}

		.enemy_status {
			text-align: right;
			margin-right: 35px;
		}

		.snorlax_status {
			position: relative;
			top: -195px;
		}

		p {
			font-size: 17px;
			font-family: arial, georgia, sans-serif;
		}

	</style>
</head>
<body>

	<p class="enemy_status">Pikachu</p>

	 <?php if(array_key_exists('ataque', $_SESSION)): ?>
		<p class="enemy_status">Ataque usado: <?php print $_SESSION['ataque']; ?></p>
	<?php endif; ?>

	<?php $life = $_SESSION['pikachu']['vida'][0]; ?>
	<p class="enemy_status"><?php print 'LP: ' . $life; ?></p>

	<?php $level = $_SESSION['pikachu']['level'][0]; ?>
	<p class="enemy_status">Level: <?php print $level; ?></p>

	<img src="imagens/pikachu.png" alt="monkey" class="enemy">

	<?php if(array_key_exists('tempo_dormindo',$_SESSION)): ?>
		<p class="snorlax_status">Turnos dorminado total: <?php print $_SESSION['tempo_dormindo']; ?></p>
	<?php endif; ?>

	<?php $life = $_SESSION['snorlax']['vida'][0]; ?>
	<p class="snorlax_status"><?php print 'LP: ' . $life; ?></p>

	<?php $level = $_SESSION['snorlax']['level'][0]; ?>
	<p class="snorlax_status">Level: <?php print $level; ?></p>

	<?php if($eletrizado):?>
		<p class="snorlax_status"><?php print $eletrizado; ?></p>
	<?php endif; ?>

	<?php $efeito = $_SESSION['snorlax']['efeito']; ?>
	<p class="snorlax_status">Sobre efeito de : <?php print $efeito; ?></p>

	<?php if($_SESSION['snorlax']['estado'] == 'eletrizado') : ?>
		<p class="snorlax_status">Estado: <?php print $_SESSION['snorlax']['estado']; ?></p>
	<?php endif; ?>

	<?php if(array_key_exists('ataque_snorlax', $_SESSION)): ?>
		<p class="snorlax_status">Ataque usado: <?php print $_SESSION['ataque_snorlax']; ?></p>
	<?php endif; ?>

	<img src="imagens/snorlax2.gif" alt="snorlax" class="snorlax">

	<p class="snorlax_status"><?php $ataque = $_SESSION['snorlax']['ataque'][0]; ?></p>
	
	<p class="snorlax_status">Ataque: <?php print $ataque; ?>
		
		<form method="POST">
			<input type="hidden" name="ataque" value="rest">
			<input type="submit" value="Usar" class="snorlax_status">
		</form>

	</p>

	<p class="snorlax_status"><?php $ataque = $_SESSION['snorlax']['ataque'][1]; ?></p>

	<p class="snorlax_status">Ataque: <?php print $ataque; ?>
		
		<form method="POST">
			<input type="hidden" name="ataque" value="body slam">
			<input type="submit" value="Usar" class="snorlax_status">
		</form>

	</p>

</body>
</html>