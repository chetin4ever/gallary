<?php
	defined('DS') ? null : define('DS',DIRECTORY_SEPARATOR);
	defined('DS') ? null : define('SITE_ROOT',DS .'xampp' . DS .'htdocs'. DS .'gallary');
	defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', DS .'xampp'. DS .'htdocs' . DS . 'gallary'. DS .'gallary');
	echo INCLUDES_PATH;
	include("functions.php");
	include("new_config.php");
	include("database.php");
	include("db_object.php");
	include("user.php");
	include("photo.php");
	include("session.php");
?>
C:\xampp\htdocs\gallary\admin\font-awesome