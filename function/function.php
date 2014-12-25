<?php

/**
 * Get global config
 * @param string $key - the key of global config
 * @return mixed - the value of global config
 */
function C($key) {
	return $GLOBALS['CONFIG'][$key];
}

/**
 * For spl_autoload_register
 * @param string $class - the class name
 */
function autoload($class) {
	foreach (C('CLASS') as $v) {
		if (strpos($class, $v)) {
			require(strtolower($v) . '/' . $class . '.class.php');
			return;
		}
	}
	redirect(404);
}

/**
 * Format print array
 * @param array $arr - the array whick want to be print
 * @param bool $dump - if true, use var_dump() to print, 
 * 					   otherwise use print_r()
 * @param string $hr - if true, pirnt &lt;hr /&gt; in start and end
 */
function p($arr, $dump = false, $hr = false) {
	if ($hr) {
		echo '<hr />';
	}
	echo '<pre>';
	if ($dump) {
		var_dump($arr);
	} else {
		print_r($arr);
	}
	echo '</pre>';
	if ($hr) {
		echo '<hr />';
	}
}

/**
 * Redirect 
 * @param mixed $arg - if is int, redirect to /public/$arg.html,
 * 					   else redirect to $arg
 */
function redirect($arg) {
	if (is_int($arg)) {
		$arg = "/public/$arg.html";
	}
	header('Location: ' . $arg);
	die();
}


function display($path = null) {
	if (is_null($path)) {
		require 'view/' . C('CONTROLLER_NAME') . '/' . C('METHOD_NAME') . '.php';
	}
}

function sayHello() {
	echo "hello";
}
