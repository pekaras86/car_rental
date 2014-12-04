<?php

require 'app_config.php';  
	
//default error_message	
if ($_REQUEST['error_message'] == NULL) {
	$error_message = "something went wrong, and that's how you ended up here.";
} else {  //case error_message
	$error_message = preg_replace("/\\\\/", '',$_REQUEST['error_message']);
}

	
//mysqli_error() messages
//default system_error_message	
if ($_REQUEST['system_error_message'] == NULL) {
	$system_error_message = "No system-level error message was reported.";
} else {  //case system_error_message
	$system_error_message = preg_replace("/\\\\/", '',$_REQUEST['system_error_message']); 
}
	
	
echo $error_message;
echo $system_error_message;

?>





