<?php

function acorda_snorlax() {

	//fazer o cara ou coroa 

	$resu = rand(0,1);

	if($resu == 0) {
		return true;
	}else {
		return false;
	}


}