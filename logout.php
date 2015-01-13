<?php

setcookie('user_id', '', time()-(365*24*60*60));
setcookie('username', '', time()-(365*24*60*60));
setcookie('password', '', time()-(365*24*60*60));
setcookie('admin', '', time()-(365*24*60*60));
setcookie('user', '', time()-(365*24*60*60));
setcookie('car_id', '', time()-(365*24*60*60));

header('Location: index.php');
