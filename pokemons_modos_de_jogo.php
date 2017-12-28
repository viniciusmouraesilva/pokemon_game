<?php

function variar_ataque_monkey() {

	$resu = rand(0,1);

	if($resu == 0) {
		return 'trash';
	}else {
		return 'leer';
	}

}

function jogarMonkey($resu) {

	if($resu == 'trash') {

		if($_SESSION['snorlax']['efeito'] == 'leer') {
			
			$jogarMoeda = rand(0,1);

			if($jogarMoeda == 0) {
				$_SESSION['snorlax']['vida'][0] -= 8;	
			}else {
				$_SESSION['snorlax']['vida'][0] -= 7;	
			}
		}else {
			$_SESSION['snorlax']['vida'][0] -= 7;	
		}
	}else {
		$_SESSION['snorlax']['efeito'] = 'leer';	
	}

}

function variar_ataque_pikachu() {
	
	$resu = rand(0,1);

	if($resu == 0) {
		return 'thunder shock';
	}else {
		return 'leer';
	}
}

function jogarPikachu($resu) {

	if($resu == 'thunder shock') {

		if($_SESSION['snorlax']['efeito'] == 'leer') {
			
			$jogarMoeda = rand(0,1);

			$jogarMoedaEfeito = rand(0,1);

			if($jogarMoedaEfeito == 0) {
				$_SESSION['snorlax']['estado'] = 'eletrizado';
			}

			if($jogarMoeda == 0) {
				$_SESSION['snorlax']['vida'][0] -= 11;	
			}else {
				$_SESSION['snorlax']['vida'][0] -= 9;	
			}
		}else {
			$_SESSION['snorlax']['vida'][0] -= 9;	
		}
	}else {
		$_SESSION['snorlax']['efeito'] = 'leer';	
	}

}


