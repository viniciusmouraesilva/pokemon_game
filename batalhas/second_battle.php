<?php
session_start();

$eletrizado = '';

if(!array_key_exists('snorlax',$_SESSION)) {

	$_SESSION['snorlax']['vida'][] = 40;
	$_SESSION['snorlax']['ataque'][] = 'rest';
	$_SESSION['snorlax']['ataque'][] = 'body slam';
	$_SESSION['snorlax']['estado'][] = 'sleep';
	$_SESSION['snorlax']['level'][] = 3;
	$_SESSION['snorlax']['exp'][] = 150;
	$_SESSION['snorlax']['efeito'] = '';

	$_SESSION['pikachu']['vida'][] = 35;
	$_SESSION['pikachu']['ataque'][] = 'thunder shock';
	$_SESSION['pikachu']['ataque'][] = 'Leer';
	$_SESSION['pikachu']['estado'][] = '';
	$_SESSION['pikachu']['level'][] = 3;
	$_SESSION['pikachu']['exp'][] = 120;
	$_SESSION['pikachu']['efeito'] = '';
	
}

if($_SESSION['snorlax']['vida'][0] <= 0) {

	if(isset($_SESSION['tempo_dormindo'])) { 
		$var = $_SESSION['tempo_dormindo']; 
	}

	session_destroy();

	setcookie('tempo_dormindo',"{$var}");

	header('Location:perdeu/perdeu_fase2.php');
	exit;
}elseif($_SESSION['pikachu']['vida'][0] <= 0) {
	session_destroy();

	header('Location:perdeu/por_enquanto_e_so.php');
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

if($_SESSION['snorlax']['estado'] == '' or $_SESSION['snorlax']['estado'] != 'sleep') {

	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		if(array_key_exists('ataque', $_POST)) {

			if($_POST['ataque'] == 'body slam') {

				$_SESSION['ataque_snorlax'] = 'body slam';

				$_SESSION['pikachu']['vida'][0] -= 8;

				require_once 'pokemons_modos_de_jogo.php';

				$resu = variar_ataque_pikachu();

				$_SESSION['ataque'] = $resu;

				jogarPikachu($resu);

				if($_SESSION['snorlax']['estado'] != 'eletrizado') {

					$_SESSION['snorlax']['estado'] = 'sleep';

				}

				header('Location:/pokemon_game/second_battle.php');
				exit;

			}elseif($_POST['ataque'] == 'rest') {

				$_SESSION['ataque_snorlax'] = 'rest';

				require_once 'pokemons_modos_de_jogo.php';

				if($_SESSION['snorlax']['vida'] <= 0) {
					header('Location:/pokemon_game/second_battle.php');
					exit;
				}

				if($_SESSION['snorlax']['estado'] != 'eletrizado') {

					$_SESSION['snorlax']['vida'][0] = 40;

					$resu = variar_ataque_pikachu();

					$_SESSION['ataque'] = $resu;

					jogarPikachu($resu);

					$_SESSION['snorlax']['estado'] = 'sleep';

					header('Location:/pokemon_game/second_battle.php');
					exit;

				}else {
					$eletrizado = 'Snorlax não pode dormir estando eletrizado.';
				}
			}
		}
	}

}else {

	require_once 'pokemons_modos_de_jogo.php';

	$resu = variar_ataque_pikachu();

	jogarPikachu($resu);

	$_SESSION['tempo_dormindo'] += 1;

	$_SESSION['snorlax']['estado'] = 'sleep'; 

	header('Location:/pokemon_game/second_battle.php');
	exit;

}

require_once 'fases/scene2.php';