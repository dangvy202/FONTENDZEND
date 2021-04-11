<?php
error_reporting(E_ALL & ~E_NOTICE);
require_once 'define.php';
require_once 'define_notice.php';
function myload($clasName)
{
	require_once LIBRARY_PATH . "{$clasName}.php";
}
spl_autoload_register('myload');
Session::init();

$bootstrap = new Bootstrap();
$bootstrap->init();