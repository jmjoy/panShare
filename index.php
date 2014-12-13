<?php

// import Base file
require 'function/function.php';
$GLOBALS['CONFIG'] = require 'config/config.php';

// autoload 
spl_autoload_register('autoload');

// check Request_uri
if (!isset($_SERVER['REQUEST_URI'])) {
	redirect(403);
}
$uri_arr = explode('/', $_SERVER['REQUEST_URI']);
if (count($uri_arr) != 3) {
	redirect('/Index/index.html');
}
if (!$method = strstr(end($uri_arr), '.html', true)) {
	redirect('/Index/index.html');
}
$controller = $uri_arr[count($uri_arr) - 2] . 'Controller';

// Controller handle
$instace = new $controller();
if (!method_exists($instace, $method)) {
	redirect('/Index/index.html');
}

$GLOBALS['CONFIG']['CONTROLLER_NAME'] = $uri_arr[count($uri_arr) - 2];
$GLOBALS['CONFIG']['METHOD_NAME'] = $method;
session_start();

if (method_exists($instace, 'initialize')) {
	$instace->initialize();
}
$instace->$method();
