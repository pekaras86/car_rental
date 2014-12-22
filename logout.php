<?php

setcookie('user_id', '', time()-(365*24*60*60));
setcookie('username', '', time()-(365*24*60*60));
setcookie('admin', '', time()-(365*24*60*60));

header('Location: index.php');






?>