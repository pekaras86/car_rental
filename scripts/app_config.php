<?php

// otan exei tin timi true, oi selides pou emperiexoun afto to script
// leitourgoun se debug mode
define("DEBUG_MODE", true);
 
if (DEBUG_MODE) {
	error_reporting(E_ALL);
} else {
	error_reporting(0);
}

// stoixeia gia ti syndesi sti vasi mou
define("DATABASE_HOST", "");
define("DATABASE_USERNAME", "root");
define("DATABASE_PASSWORD", "KaraOglan86");
define("DATABASE_NAME", "thessaloniki_car_rental");

// to SITE ROOT tis efarmogis
define("SITE_ROOT", "/git_projects/car_rental/");


// anakatefthinsi sto error_page
function handle_error($user_error_message = NULL, $system_error_message = NULL) {   
	header("Location: " . SITE_ROOT . "scripts/show_error.php?" .
		   "error_message={$user_error_message}&" .
		   "system_error_message={$system_error_message}");  
		
	exit();
}




?>