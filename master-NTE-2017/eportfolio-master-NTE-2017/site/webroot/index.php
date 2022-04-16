<?php



define('WEBROOT', dirname(__FILE__)); 
define('ROOT', dirname(WEBROOT));
define('DS',DIRECTORY_SEPARATOR);
define('CORE',ROOT.DS.'core');

/*
 * système de commentaire
 */
define('VIEW',ROOT.DS.'view'.DS);
define('ELEMENTS',ROOT.DS.'view'.DS.'elements'.DS);



define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME'])));

require CORE.DS.'Autoload.php';
require CORE.DS.'includes.php';

new Dispatcher();




