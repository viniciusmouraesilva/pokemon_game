<?php
session_start();

if(!array_key_exists('snorlax',$_SESSION)) {

	$_SESSION['snorlax']['vida'][] = 40;
	$_SESSION['snorlax']['ataque'][] = 'rest';
	$_SESSION['snorlax']['ataque'][] = 'body slam';
	$_SESSION['snorlax']['estado'][] = 'sleep';
	$_SESSION['snorlax']['level'][] = 1;
	$_SESSION['snorlax']['exp'][] = 0;
	$_SESSION['snorlax']['efeito'] = '';

	$_SESSION['monkey']['vida'][] = 25;
	$_SESSION['monkey']['ataque'][] = 'trash';
	$_SESSION['monkey']['ataque'][] = 'Leer';
	$_SESSION['monkey']['estado'][] = '';
	$_SESSION['monkey']['exp'][] = 0;
	$_SESSION['monkey']['efeito'] = '';
	
}

if($_SESSION['snorlax']['vida'][0] <= 0) {
	session_destroy();
	header('Location:perdeu/perdeu_fase1.php');
	exit;
}elseif($_SESSION['monkey']['vida'][0] <= 0) {
	session_destroy();
	header('Location:second_battle.php');
	exit;
}	

if($_SESSION['snorlax']['estado'] == 'sleep') {

	require_once 'helpers/helpers.php';

	$dormindo = acorda_snorlax();

	if($dormindo) {
		$_SESSION['snorlax']['estado'] = 'sleep';
	}else {
		$_SESSION['snorlax']['estado'] = '';
	}
}

if($_SESSION['snorlax']['estado'] == '') {

	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		if(array_key_exists('ataque', $_POST)) {

			if($_POST['ataque'] == 'body slam') {

				$_SESSION['monkey']['vida'][0] -= 8;

				$_SESSION['ataque_snorlax'] = 'body slam';

				require_once 'pokemons_modos_de_jogo.php';

				$resu = variar_ataque_monkey();

				$_SESSION['ataque'] = $resu;

				jogarMonkey($resu);

				$_SESSION['snorlax']['estado'] = 'sleep';
				header('Location:/pokemon_game/first_battle.php');
				exit;

			}elseif($_POST['ataque'] == 'rest') {

				$_SESSION['ataque_snorlax'] = 'rest';

				require_once 'pokemons_modos_de_jogo.php';

				$resu = variar_ataque_monkey();

				$_SESSION['ataque'] = $resu;

				jogarMonkey($resu);

				$_SESSION['snorlax']['vida'][0] = 40;
				$_SESSION['snorlax']['estado'] = 'sleep';
				header('Location:/pokemon_game/first_battle.php');
				exit;
			}

		}
	}

}else {

	require_once 'pokemons_modos_de_jogo.php';

	$resu = variar_ataque_monkey();

	$_SESSION['ataque'] = $resu;

	jogarMonkey($resu);

	$_SESSION['snorlax']['estado'] = 'sleep'; 

	header('Location:/pokemon_game/first_battle.php');
	exit;

}

require_once 'fases/scene1.php';